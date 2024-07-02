<?php
include_once('./_common.php');

// API KEY 불러오기
$apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k";

// TRC-20 잔액 확인 함수 정의
function getTrc20Balance($address, $contractAddress, $apiKey) {
    $url = "https://api.chaingateway.io/v2/tron/balances/$address/trc20/$contractAddress";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $apiKey",
        "Accept: application/json"
    ));
    $response = curl_exec($ch);

    if ($response === false) {
        $err = curl_error($ch);
        curl_close($ch);
        echo "<script>alert('cURL Error: $err');</script>";
        return 0;
    }

    curl_close($ch);
    $data = json_decode($response, true);

    // 디버그: 응답 데이터 확인
    echo "<script>console.log('Response Data: " . json_encode($data) . "');</script>";

    if (isset($data['data']) && isset($data['data']['balance'])) {
        return floatval($data['data']['balance']);
    } else {
        echo "<script>alert('Error fetching balance: " . json_encode($data) . "');</script>";
        return 0;
    }
}

// TRC-20 토큰 전송 함수 정의
function sendTrc20Token($fromAddress, $toAddress, $amount, $token, $privateKey, $apiKey) {
    $url = "https://api.chaingateway.io/v2/tron/transactions/trc20";
    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "contractaddress" => $token,
        "privatekey" => $privateKey
    );

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

    // 관리자 TRC-20 주소 및 프라이빗 키 가져오기
    $sql = "SELECT trx, trx_privary FROM wallet_address WHERE no = (SELECT mb_no FROM g5_member WHERE mb_id = 'admin')";
    $result = sql_fetch($sql);
    $from_addr = $result['trx'];
    $private_key = $result['trx_privary'];

    // 사용자 정보 가져오기
    $sql01 = "SELECT * FROM g5_member WHERE mb_id = '$to_id'";
    $member = sql_fetch($sql01);

    // 사용자의 TRC-20 주소 가져오기
    $sql02 = "SELECT trx FROM wallet_address WHERE no = '{$member['mb_no']}'";
    $wallet = sql_fetch($sql02);
    $to_wallet_addr = $wallet['trx'];

    if ($to_wallet_addr != $to_addr) {
        echo "<script>alert('아이디와 받는주소가 맞지 않습니다.');</script>";
        exit;
    }

    $contractAddress = 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t'; // TRC-20 토큰의 컨트랙트 주소 (예: USDT)
    $trxBalance = getTrc20Balance($from_addr, $contractAddress, $apiKey);

    if ($trxBalance < $amount) {
        echo "<script>alert('잔고가 부족합니다. 필요 금액: " . number_format($amount, 2) . " USDT');</script>";
        exit;
    } else {
        $txHash = sendTrc20Token($from_addr, $to_addr, $amount, $contractAddress, $private_key, $apiKey);

        if ($txHash) {
            // DB에 log 저장
            $sql = "INSERT INTO tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) VALUES ('admin', '{$to_id}', '{$txHash}', 'withdrawal', 'TRC-20', '{$amount}')";
            sql_query($sql);

            echo "<script>alert('USDT가 지급되었습니다.'); window.location.href = './insert_trc20.php';</script>";
        } else {
            echo "<script>alert('출금 오류가 발생했습니다. 재시도하시기 바랍니다.');</script>";
        }
    }
}
?>
