<?php
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

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

// TRON을 보내는 함수 정의
function sendTrx($fromAddress, $toAddress, $amount, $privateKey, $apiKey) {
    $url = "https://api.chaingateway.io/v2/tron/transactions";

    // 요청 본문 데이터 생성
    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "privatekey" => $privateKey
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
        if (isset($data['data']['txid'])) {
            return $data['data']['txid'];
        } else {
            echo "<script>alert('Transaction Error: " . json_encode($data) . "');</script>";
            return false;
        }
    }
}

// POST 요청이 들어왔을 때 실행
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to_id = $_POST['mb_id'];
    $to_addr = $_POST['wallet_address'];
    $amount = preg_replace('/[^0-9.]/', '', $_POST['qty']); // 수량 입력값 처리

    // 관리자 트론 주소 및 프라이빗 키 가져오기
    $sql = "SELECT trx, trx_privary FROM wallet_address WHERE no = (SELECT mb_no FROM g5_member WHERE mb_id = 'admin')";
    $result = sql_fetch($sql);
    $from_addr = $result['trx'];
    $private_key = $result['trx_privary'];

    // 관리자 트론 잔액 확인
    $trxBalance = getTronBalance($from_addr);

    // 사용자 정보 가져오기
    $sql01 = "SELECT * FROM g5_member WHERE mb_id = '$to_id'";
    $member = sql_fetch($sql01);

    // 사용자의 트론 주소 가져오기
    $sql02 = "SELECT trx FROM wallet_address WHERE no = '{$member['mb_no']}'";
    $wallet = sql_fetch($sql02);
    $to_wallet_addr = $wallet['trx'];

    if ($to_wallet_addr != $to_addr) {
        echo "<script>alert('아이디와 받는주소가 맞지 않습니다.');</script>";
        exit;
    }

    if ($trxBalance < $amount) {
        echo "<script>alert('잔고가 부족합니다. 필요 금액: " . number_format($amount, 2) . " TRX');</script>";
        exit;
    } else {
        $txHash = sendTrx($from_addr, $to_addr, $amount, $private_key, $chainGatewayApiKey);

        if ($txHash) {
            // DB에 log 저장
            $sql = "INSERT INTO tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) VALUES ('admin', '{$to_id}', '{$txHash}', 'withdrawal', 'TRX', '{$amount}')";
            sql_query($sql);

            echo "<script>alert('TRX가 지급되었습니다.'); window.location.href = 'https://bhidex.gabia.io/adm/insert_trx.php';</script>";
        } else {
            echo "<script>alert('출금 오류가 발생했습니다. 재시도하시기 바랍니다.');  window.location.href = 'https://bhidex.gabia.io/adm/insert_trx.php'; </script>";
        }
    }
}
?>
