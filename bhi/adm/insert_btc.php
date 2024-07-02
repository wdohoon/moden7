<?php
$sub_menu = "200500";
include_once('./_common.php');

$g5['title'] = 'BTC 지급';
include_once ('./admin.head.php');

// 비트코인 잔액 가져오기 함수 정의
function getBitcoinBalance($address) {
    $url = "https://blockchain.info/q/addressbalance/$address";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    if (is_numeric($response)) {
        return $response / 100000000; // Convert satoshis to BTC
    } else {
        return 0;
    }
}

// 관리자 비트코인 주소 가져오기
$sql = "SELECT bit FROM wallet_address WHERE no = (SELECT mb_no FROM g5_member WHERE mb_id = 'admin')";
$result = sql_fetch($sql);
$btcAddr = $result['bit'];
$btcBalance = getBitcoinBalance($btcAddr); // 관리자의 비트코인 잔액 가져오기 함수 호출

?>

<style>
#point_mng {margin-top: 0;}
</style>

<section id="point_mng">
    <h2 class="h2_frm">회원 BTC 설정</h2>
    <h1>관리자 보유 BTC <?php echo number_format($btcBalance, 4);?> <span>BTC</span></h1>
    <form name="fpointlist2" method="post" id="fpointlist2" action="./insert_btc_update.php" autocomplete="off">

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
