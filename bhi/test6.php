<?php

$apiToken = 'BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM';
$baseUrl = 'https://mainnet-api.blocksdk.com/v3/eth'; // 메인넷 엔드포인트 사용
$fromAddress = '0x528179Ea37c29F514ac6e5951aB1f8c53a7989f5';
$toAddress = '0x532a4CBc529884C66d212AE7a7e34Fc461817A9C';
$privateKey = '0xd9abc41e7f461fff6c08f166721133db2ad8197a58fb8031dabf16d5569f46ae';

// 계정 잔액 확인
$balanceUrl = $baseUrl . '/address/' . $fromAddress . '/balance?api_token=' . $apiToken;
$balanceResponse = sendGetRequest($balanceUrl);
$balanceData = json_decode($balanceResponse, true);

if (!$balanceData || !isset($balanceData['payload']['balance'])) {
    echo 'Error fetching balance: Invalid response format';
    echo 'Response: ' . $balanceResponse;
    exit;
}

$balance = $balanceData['payload']['balance'];
echo 'Balance: ' . $balance . "\n";

// nonce 값 가져오기
$nonceUrl = $baseUrl . '/address/' . $fromAddress . '/nonce?api_token=' . $apiToken;
$nonceResponse = sendGetRequest($nonceUrl);
$nonceData = json_decode($nonceResponse, true);

if (!$nonceData || !isset($nonceData['payload']['nonce'])) {
    echo 'Error fetching nonce: Invalid response format';
    echo 'Response: ' . $nonceResponse;
    $nonce = 0; // 기본값 설정
} else {
    $nonce = $nonceData['payload']['nonce'];
}

echo 'Nonce: ' . $nonce . "\n";

// 트랜잭션 금액 및 가스 비용 계산
$gasLimit = '21000';
$gasPrice = '10000000000'; // 10 Gwei
$totalGasCost = bcmul($gasLimit, $gasPrice); // 가스 비용 계산
$amount = bcsub($balance, $totalGasCost); // 전송 가능 금액 계산

if (bccomp($amount, '0') <= 0) {
    echo 'Not enough balance to cover the transaction and gas fees.';
    exit;
}

// 트랜잭션 생성 및 서명
$transactionData = [
    'from' => $fromAddress,
    'to' => $toAddress,
    'value' => '0x' . dechex($amount),
    'gas' => '0x' . dechex($gasLimit),
    'gasPrice' => '0x' . dechex($gasPrice),
    'nonce' => '0x' . dechex($nonce),
    'chainId' => 1
];

$signedTransaction = signTransaction($transactionData, $privateKey);

// 서명된 트랜잭션 전송
$sendTransactionUrl = $baseUrl . '/transaction/send?api_token=' . $apiToken;
$sendTransactionResponse = sendPostRequest($sendTransactionUrl, ['hex' => $signedTransaction]);
$sendTransactionData = json_decode($sendTransactionResponse, true);

if (!$sendTransactionData || !isset($sendTransactionData['payload']['hash'])) {
    echo 'Error sending transaction: Invalid response format';
    echo 'Response: ' . $sendTransactionResponse;
    exit;
}

echo 'Transaction sent: ' . $sendTransactionData['payload']['hash'] . "\n";

// GET 요청을 보내는 함수
function sendGetRequest($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// POST 요청을 보내는 함수
function sendPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// 트랜잭션 서명 함수
function signTransaction($transactionData, $privateKey)
{
    // 트랜잭션 데이터를 RLP 인코딩하고 개인 키로 서명하는 로직이 필요합니다.
    // 이를 위해서 외부 서명 서비스 또는 JavaScript 라이브러리를 사용할 수 있습니다.
    // 여기서는 서명된 트랜잭션을 직접 생성하는 대신 예제 문자열을 반환합니다.

    // 예시: 실제로는 올바르게 서명된 트랜잭션 HEX가 필요합니다.
    return '0xSIGNED_TRANSACTION_HEX';
}