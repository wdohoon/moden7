<?php
$sub_menu = "200700";
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');
$g5['title'] = 'TRX 지급';
include_once ('./admin.head.php');

// API KEY 불러오기
$chainGatewayApiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k"; // ChainGateway API 키

// TRON 잔액 가져오기 함수 정의
function getTronBalance($address) {
    $url = "https://api.trongrid.io/v1/accounts/$address";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return isset($data['data'][0]['balance']) ? $data['data'][0]['balance'] / 1000000 : 0; // TRX balance is in SUN (1 TRX = 1,000,000 SUN)
}

// 관리자 트론 잔액 가져오기
$sql = "SELECT trx FROM wallet_address WHERE no = (SELECT mb_no FROM g5_member WHERE mb_id = 'admin')";
$result = sql_fetch($sql);
$trxAddr = $result['trx'];
$trxBalance = getTronBalance($trxAddr); // 관리자의 트론 잔액 가져오기 함수 호출

?>

<style>
#point_mng {margin-top: 0;}
</style>

<section id="point_mng">
    <h2 class="h2_frm">회원 TRX 설정</h2>
    <h1>관리자 보유 TRX <?php echo number_format($trxBalance, 4);?> <span>TRX</span></h1>
    <form name="fpointlist2" method="post" id="fpointlist2" action="./insert_trx_update.php" autocomplete="off">

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <colgroup>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="mb_id">회원아이디<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="mb_id" value="<?php echo $mb_id ?>" id="mb_id" class="required frm_input" required></td>
        </tr>
        <tr>
            <th scope="row"><label for="qty">수량<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="qty" id="qty" placeholder="0" required class="frm_input" maxLength="40" onKeyUp="removeChar(event);inputNumberFormat(this);" onKeyDown="inputNumberFormat(this);"></td>
        </tr>
        <tr>
            <th scope="row"><label for="wallet_address">받는 주소<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wallet_address" id="wallet_address" required class="required frm_input" size="80"></td>
        </tr>
        </tbody>
        </table>
    </div>

    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="확인" class="btn_submit btn">
    </div>

    </form>

</section>

<?php
include_once ('./admin.tail.php');
?>
