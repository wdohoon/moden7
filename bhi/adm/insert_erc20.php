<?php
$sub_menu = "200800";
include_once('./_common.php');
$g5['title'] = 'ERC-20 지급';
include_once ('./admin.head.php');

// API KEY 불러오기
$apiKey = "BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM";

// ERC-20 잔액 확인 함수 정의
function getErc20Balance($address, $contractAddress, $apiKey) {
    $url = "https://api.blocksdk.com/v2/eth/erc20-tokens/{$contractAddress}/{$address}/balance";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey"
    ));
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        echo "<script>alert('cURL Error: " . curl_error($ch) . "');</script>";
        return 0;
    }

    $data = json_decode($response, true);
    if (isset($data['payload']['balance'])) {
        return floatval($data['payload']['balance']);
    } else {
        echo "<script>alert('Error fetching balance: " . json_encode($data) . "');</script>";
        return 0;
    }
}

// 관리자 ERC-20 주소 및 잔액 가져오기
$sql = "SELECT eth FROM wallet_address WHERE no = (SELECT mb_no FROM g5_member WHERE mb_id = 'admin')";
$result = sql_fetch($sql);
$ethAddr = $result['eth'];
$contractAddress = '0xdac17f958d2ee523a2206206994597c13d831ec7'; // ERC-20 토큰의 컨트랙트 주소 (예: USDT)
$erc20Balance = getErc20Balance($ethAddr, $contractAddress, $apiKey);
?>

<style>
#point_mng {margin-top: 0;}
</style>

<section id="point_mng">
    <h2 class="h2_frm">회원 ERC-20 설정</h2>
    <h1>관리자 보유 ERC-20 <?php echo number_format($erc20Balance, 4);?> <span>USDT</span></h1>
    <form name="fpointlist2" method="post" id="fpointlist2" action="./insert_erc20_update.php" autocomplete="off">

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
