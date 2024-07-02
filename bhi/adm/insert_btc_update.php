<?php
$sub_menu = "200500";
include_once("./_common.php");
include_once(G5_PATH.'/vendor/autoload.php');

// API KEY 불러오기
include_once(G5_PATH.'/api_key.php');

// 기존의 비트코인 전송 함수
function sendBitcoin($toAddress, $amount, $walletName, $password, $subtractFee, $speed) {
    $apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k"; // 여기에 실제 API 키를 입력하세요
    $url = "https://api.chaingateway.io/v2/bitcoin/transactions";

    // 요청 본문 데이터 생성
    $requestData = array(
        "to" => $toAddress,
        "amount" => $amount,
        "walletname" => $walletName,
        "password" => $password,
        "subtractfee" => $subtractFee,
        "speed" => $speed
    );

    // CURL을 사용하여 API에 요청 보내기
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $apiKey",
        "Content-Type: application/json",
        "Accept: application/json"
    ));
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // 요청 결과 확인 및 디버깅 정보 출력
    if ($err) {
        echo "<script>alert('cURL Error #: " . $err . "');</script>";
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data['txid'])) {
            return $data['txid'];
        } else {
            echo "<script>alert('Transaction Error: " . json_encode($data) . "');</script>";
            return false;
        }
    }
}

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

$type = 'withdrawal';
$coin = 'BTC';
$amount = floatval(preg_replace('/[^0-9.]/', '', $_POST['qty']));
$to_id = $_POST['mb_id'];
$to_addr = $_POST['wallet_address'];

// 관리자 비트코인 주소 가져오기
$sql = "SELECT bit FROM wallet_address WHERE no = (SELECT mb_no FROM g5_member WHERE mb_id = 'admin')";
$result = sql_fetch($sql);
$from_addr = $result['bit'];
$adm = get_member('admin');
$private_key = Decrypt($adm['private_key'], $adm['mb_id']);

// 관리자 비트코인 잔액 확인
$btcBalance = getBitcoinBalance($from_addr); // 비트코인 잔액 가져오기 함수 호출

// 사용자 정보 가져오기
$sql01 = "SELECT * FROM g5_member WHERE mb_id = '$to_id'";
$member = sql_fetch($sql01);

// 사용자의 비트코인 주소 가져오기
$sql02 = "SELECT bit FROM wallet_address WHERE no = '{$member['mb_no']}'";
$wallet = sql_fetch($sql02);
$to_mb_id = $member['mb_id'];
$to_wallet_addr = $wallet['bit'];

// 디버깅 정보 출력
$debug_info = "관리자 잔액: " . $btcBalance . " BTC\\n";
$debug_info .= "전송할 금액: " . $amount . " BTC\\n";
$debug_info .= "회원 아이디: $to_id\\n";
$debug_info .= "입력한 지갑 주소: $to_addr\\n";
$debug_info .= "데이터베이스 지갑 주소: $to_wallet_addr";

echo "<script>alert('$debug_info');</script>";

if ($to_wallet_addr != $to_addr) {
    echo "<script>alert('아이디와 받는주소가 맞지 않습니다.');</script>";
    exit;
}

if ($btcBalance < $amount) {
    echo "<script>alert('잔고가 부족합니다.');</script>";
    exit;
} else {
    $txHash = sendBitcoin($to_addr, $amount, 'moden7_7432158', '1234', false, 'fast');

    if ($txHash) {
        // DB에 log 저장
        $sql = " insert into tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) values ('admin', '{$to_id}', '{$txHash}', '{$type}', '{$coin}', '{$amount}') ";
        sql_query($sql);

        echo "<script>alert('BTC가 지급되었습니다.'); window.location.href = 'https://bhidex.gabia.io/adm/insert_btc.php';</script>";
    } else {
        echo "<script>alert('출금 오류가 발생했습니다. 재시도하시기 바랍니다.'); window.location.href = 'https://bhidex.gabia.io/adm/insert_btc.php';</script>";
    }
}
?>
