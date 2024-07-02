<?php
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

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

// ERC-20 토큰을 보내는 함수 정의
function sendErc20Token($fromAddress, $toAddress, $amount, $contractAddress, $privateKey, $apiKey) {
    $url = "https://api.blocksdk.com/v2/eth/erc20-tokens/{$contractAddress}/{$fromAddress}/transfer";

    // 가스비 정보 가져오기
    $gasInfoUrl = "https://api.blocksdk.com/v2/eth/info";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $gasInfoUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey"
    ));
    $response = curl_exec($ch);
    $gasData = json_decode($response, true);
    curl_close($ch);

    if (!$gasData || !isset($gasData['payload']['high_gwei'])) {
        echo "<script>alert('Error fetching gas info: " . json_encode($gasData) . "');</script>";
        return false;
    }

    $highGwei = $gasData['payload']['high_gwei'];

    // 요청 본문 데이터 생성
    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "private_key" => $privateKey,
        "gas_limit" => 90000,
        "gwei" => $highGwei
    );

    // CURL을 사용하여 API에 요청 보내기
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey",
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
        if (isset($data['payload']['hash'])) {
            return $data['payload']['hash'];
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
    $contractAddress = '0xdac17f958d2ee523a2206206994597c13d831ec7'; // ERC-20 토큰의 컨트랙트 주소 (예: USDT)

    // 관리자 ERC-20 주소 및 프라이빗 키 가져오기
    $sql = "SELECT eth, eth_privary FROM wallet_address WHERE no = (SELECT mb_no FROM g5_member WHERE mb_id = 'admin')";
    $result = sql_fetch($sql);
    $from_addr = $result['eth'];
    $private_key = $result['eth_privary'];

    // 관리자 ERC-20 잔액 확인
    $erc20Balance = getErc20Balance($from_addr, $contractAddress, $apiKey);

    // 사용자 정보 가져오기
    $sql01 = "SELECT * FROM g5_member WHERE mb_id = '$to_id'";
    $member = sql_fetch($sql01);

    // 사용자의 ERC-20 주소 가져오기
    $sql02 = "SELECT eth FROM wallet_address WHERE no = '{$member['mb_no']}'";
    $wallet = sql_fetch($sql02);
    $to_wallet_addr = $wallet['eth'];

    if ($to_wallet_addr != $to_addr) {
        echo "<script>alert('아이디와 받는 주소가 맞지 않습니다.');</script>";
        exit;
    }

    if ($erc20Balance < $amount) {
        echo "<script>alert('잔고가 부족합니다. 필요 금액: " . number_format($amount, 2) . " USDT');</script>";
        exit;
    } else {
        $txHash = sendErc20Token($from_addr, $to_addr, $amount, $contractAddress, $private_key, $apiKey);

        if ($txHash) {
            // DB에 log 저장
            $sql = "INSERT INTO tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) VALUES ('admin', '{$to_id}', '{$txHash}', 'withdrawal', 'USDT', '{$amount}')";
            sql_query($sql);

            echo "<script>alert('USDT가 지급되었습니다.'); window.location.href = 'insert_erc20.php';</script>";
        } else {
            echo "<script>alert('출금 오류가 발생했습니다. 재시도하시기 바랍니다.');</script>";
        }
    }
}
?>
