<?php
include_once('./_common.php');
require_once(G5_SHOP_PATH.'/settle_nicepay.inc.php');
require_once(G5_SHOP_PATH.'/nicepay/lib/NicepayLite.php');

$Moid           = $_REQUEST['Moid'];
$_POST['MID']   = $default['de_nicepay_mid'];

if($tx == 'personalpay') {
    $od = sql_fetch(" select * from {$g5['g5_shop_personalpay_table']} where pp_id = '$Moid' ");
    if (!$od)
        die('<p id="scash_empty">개인결제 내역이 존재하지 않습니다.</p>');

    if($od['pp_cash'] == 1)
        alert('이미 등록된 현금영수증 입니다.');

    $buyername = $od['pp_name'];
    $goodname  = $od['pp_name'].'님 개인결제';
    $amt_tot   = (int)$od['pp_receipt_price'];
    $amt_sup   = (int)round(($amt_tot * 10) / 11);
    $amt_svc   = 0;
    $amt_tax   = (int)($amt_tot - $amt_sup);
} else {
    $od = sql_fetch(" select * from {$g5['g5_shop_order_table']} where od_id = '$Moid' ");
    if (!$od)
        die('<p id="scash_empty">주문서가 존재하지 않습니다.</p>');

    if($od['od_cash'] == 1)
        alert('이미 등록된 현금영수증 입니다.');

    $buyername = $od['od_name'];
    $goods     = get_goods($od['od_id']);
    $goodname  = $goods['full_name'];
    $amt_tot   = (int)$od['od_tax_mny'] + (int)$od['od_vat_mny'] + (int)$od['od_free_mny'];
    $amt_sup   = (int)$od['od_tax_mny'] + (int)$od['od_free_mny'];
    $amt_tax   = (int)$od['od_vat_mny'];
    $amt_svc   = 0;
}

$nicepay = new NicepayLite;

//로그를 저장할 디렉토리를 설정하십시요.
$nicepay->m_NicepayHome = $g_conf_home_dir.'/log';

/**************************************
* 3. 결제 요청 파라미터 설정	      *
***************************************/
$nicepay->m_charSet             = '';
$nicepay->m_GoodsName           = iconv('utf-8', 'euc-kr', $GoodsName);
$nicepay->m_MID                 = $_POST['MID'];
$nicepay->m_Moid                = $Moid;
$nicepay->m_BuyerName           = iconv('utf-8', 'euc-kr', $BuyerName);
$nicepay->m_Amt                 = $amt_tot; // 상품금액
$nicepay->m_ReceiptAmt          = $amt_tot; // 거래금액 총합
$nicepay->m_ReceiptSupplyAmt    = $amt_sup; // 공급가액
$nicepay->m_ReceiptVAT          = $amt_tax; // 부가가치세
$nicepay->m_ReceiptSupplyAmt    = $amt_sup; // 공급가액
$nicepay->m_ReceiptServiceAmt   = $amt_svc; // 봉사료
$nicepay->m_ReceiptType         = $_REQUEST['ReceiptType']; // (1. 소득공제, 2. 지출증빙)
$nicepay->m_ReceiptTypeNo       = $_REQUEST['ReceiptTypeNo'];
if($default['de_tax_flag_use']) {
    $nicepay->m_ReceiptTaxFreeAmt   = $od['od_free_mny']; // 현금영수증면세 금액
}

$nicepay->m_ActionType          = 'PYO';
$nicepay->m_PayMethod           = 'RECEIPT';
$nicepay->m_LicenseKey          = $g_conf_mer_key;
$nicepay->startAction();

/** 4. 결과 */
$resultCode = $nicepay->m_ResultData['ResultCode']; // 결과코드 (정상 :2001(취소성공), 2211(환불성공), 그 외 에러)
$resultMsg  = $nicepay->m_ResultData['ResultMsg'];  // 결과메시지
$authDate   = $nicepay->m_ResultData['AuthDate'];   // 취소금액
$authCode   = $nicepay->m_ResultData['AuthCode'];   // 취소시간
$tid        = $nicepay->m_ResultData['TID'];        // TID

$res_cd     = $resultCode;
$res_msg    = iconv_utf8($resultMsg);
$od_id      = $Moid;

// DB 반영
if($res_cd == '7001') {

    $cash = array();
    $cash['tid']       = $tid;
    $cash['AuthDate']  = $authDate;
    $cash_info = serialize($cash);

    if($tx == 'personalpay') {
        $sql = " update {$g5['g5_shop_personalpay_table']}
                    set pp_cash = '1',
                        pp_cash_no = '$tid',
                        pp_cash_info = '$cash_info'
                  where pp_id = '$od_id' ";
    } else {
        $sql = " update {$g5['g5_shop_order_table']}
                    set od_cash = '1',
                        od_cash_no = '$tid',
                        od_cash_info = '$cash_info'
                  where od_id = '$od_id' ";
    }

    $result = sql_query($sql, false);
}

$g5['title'] = '현금영수증 발급';
include_once(G5_PATH.'/head.sub.php');
?>

<script>
function viewReceipt(TID) // 현금 영수증 출력
{
    var status = "toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=yes,width=414,height=622";
     window.open("https://npg.nicepay.co.kr/issue/IssueLoader.do?TID="+TID+"&type=1","popupIssue",status);
}
</script>

<div id="lg_req_tx" class="new_win">
    <h1 id="win_title">현금영수증 - 나이스페이</h1>

    <div class="tbl_head01 tbl_wrap">
        <table>
        <colgroup>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row">거래 아이디</th>
            <td><?php echo $tid; ?></td>
        </tr>
        <tr>
            <th scope="row">발급 시간</th>
            <td><?php echo preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3 \\4:\\5:\\6",$authDate); ?></td>
        </tr>
        <tr>
            <th scope="row">결과 내용</th>
            <td><?php echo '['.$resultCode.'] '. $resultMsg;?></td>
        </tr>
        <tr>
            <th scope="row">현금영수증 URL</th>
            <td>
                <button type="button" name="receiptView" class="btn_frmline" onClick="viewReceipt('<?php echo $tid;?>');">영수증 확인</button>
                <p>영수증 확인은 실 등록의 경우에만 가능합니다.</p>
            </td>
        </tr>
        </tbody>
        </table>
    </div>

</div>

<?php
include_once(G5_PATH.'/tail.sub.php');
?>