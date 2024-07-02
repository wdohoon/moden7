<?php

$apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k"; // 여기에 실제 API 키를 입력하세요
$tronAddress = "TNH3R2P9FDeMimrPTaUzWrr3KMpuChv2fq";

// TRX 잔액 조회
$trxCurl = curl_init();

curl_setopt_array($trxCurl, [
    CURLOPT_URL => "https://api.chaingateway.io/v2/tron/balances/$tronAddress",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: $apiKey",
        "Content-Type: application/json"
    ]
]);

$trxResponse = curl_exec($trxCurl);
if (curl_errno($trxCurl)) {
    die('Error: ' . curl_error($trxCurl));
}
curl_close($trxCurl);

$trxData = json_decode($trxResponse, true);

// API 응답 데이터 출력
echo "<pre>";
print_r($trxData);
echo "</pre>";

// TRX 잔액 확인
if (isset($trxData['data']) && isset($trxData['data'][0]['balance'])) {
    $trxBalance = $trxData['data'][0]['balance'] / 1000000; // TRX는 소수점 6자리까지 지원하므로 변환 필요
    $trxBalanceInUSD = $trxBalance * 0.1162; // 현재 TRX 가격을 적용, 실시간으로 가져오려면 별도의 API가 필요

    echo "TRX (TRX)<br>";
    echo "$trxBalance (Available: $trxBalance)<br>";
    echo "≈ $" . number_format($trxBalanceInUSD, 2) . "<br>";
} else {
    echo "TRX balance not found.<br>";
}

// USDT 잔액 조회
$usdtCurl = curl_init();

curl_setopt_array($usdtCurl, [
    CURLOPT_URL => "https://api.chaingateway.io/v2/tron/balances/$tronAddress/trc20/TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: $apiKey",
        "Content-Type: application/json"
    ]
]);

$usdtResponse = curl_exec($usdtCurl);
if (curl_errno($usdtCurl)) {
    die('Error: ' . curl_error($usdtCurl));
}
curl_close($usdtCurl);

$usdtData = json_decode($usdtResponse, true);

// API 응답 데이터 출력
echo "<pre>";
print_r($usdtData);
echo "</pre>";

// USDT 잔액 확인
if (isset($usdtData['data']) && isset($usdtData['data']['balance'])) {
    $usdtBalance = $usdtData['data']['balance'];
    $usdtBalanceInUSD = $usdtBalance * 1.0; // USDT는 항상 1 USD

    echo "<br>Tether USD (USDT)TRC20<br>";
    echo "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t<br>";
    echo "Open in New Tab<br>";
    echo "Edit Private Name<br>";
    echo "Copy Address<br>";
    echo "Show QR Code<br>";
    echo "$usdtBalance<br>";
    echo "≈ $" . number_format($usdtBalanceInUSD, 2) . "<br>";
} else {
    echo "USDT balance not found.<br>";
}

?>
