<?php
$sub_menu = "200600";
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

// API KEY 불러오기
$apiKey = "BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM";

// BlockSDK를 사용하여 이더리움 잔액 가져오기 함수 정의
function getEthereumBalance($address, $apiKey) {
    $url = "https://api.blocksdk.com/v2/eth/addresses/$address/balance";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey"
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    if (isset($data['payload']['balance'])) {
        return floatval($data['payload']['balance']);
    } else {
        return 0;
    }
}

// 이더리움을 보내는 함수 정의
function sendEth($fromAddress, $toAddress, $amount, $privateKey) {
    $apiKey = "BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM"; // 여기에 실제 BlockSDK API 키를 입력하세요
    $url = "https://api.blocksdk.com/v2/eth/addresses/$fromAddress/sendtoaddress";

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
        "gas_limit" => 21000,
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

    // 관리자 이더리움 주소 및 프라이빗 키 가져오기
    $sql = "SELECT eth, eth_privary FROM wallet_address WHERE no = (SELECT mb_no FROM g5_member WHERE mb_id = 'admin')";
    $result = sql_fetch($sql);
    $from_addr = $result['eth'];
    $private_key = $result['eth_privary'];

    // 관리자 이더리움 잔액 확인
    $ethBalance = getEthereumBalance($from_addr, $apiKey);

    // 사용자 정보 가져오기
    $sql01 = "SELECT * FROM g5_member WHERE mb_id = '$to_id'";
    $member = sql_fetch($sql01);

    // 사용자의 이더리움 주소 가져오기
    $sql02 = "SELECT eth FROM wallet_address WHERE no = '{$member['mb_no']}'";
    $wallet = sql_fetch($sql02);
    $to_wallet_addr = $wallet['eth'];

    if ($to_wallet_addr != $to_addr) {
        echo "<script>alert('아이디와 받는주소가 맞지 않습니다.');</script>";
        exit;
    }

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
        exit;
    }

    $gasLimit = 21000; // 일반적인 트랜잭션의 가스 한도
    $gasPrice = $gasData['payload']['high_gwei']; // 높은 가스비 선택
    $estimatedFee = $gasLimit * $gasPrice / 1000000000; // 가스 비용 (ETH)
    $totalAmountNeeded = $amount + $estimatedFee;

    if ($ethBalance < $totalAmountNeeded) {
        echo "<script>alert('잔고가 부족합니다. 필요 금액: " . number_format($totalAmountNeeded, 8) . " ETH');</script>";
        exit;
    } else {
        $txHash = sendEth($from_addr, $to_addr, $amount, $private_key);

        if ($txHash) {
            // DB에 log 저장
            $sql = "INSERT INTO tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) VALUES ('admin', '{$to_id}', '{$txHash}', 'withdrawal', 'ETH', '{$amount}')";
            sql_query($sql);

            echo "<script>alert('ETH가 지급되었습니다.'); window.location.href = 'https://bhidex.gabia.io/adm/insert_eth.php';</script>";
        } else {
            echo "<script>alert('출금 오류가 발생했습니다. 재시도하시기 바랍니다.'); window.location.href = 'https://bhidex.gabia.io/adm/insert_eth.php';</script>";
        }
    }
}
?>
