<?php

// API Key 불러오기
$apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k";

// 비트코인 지갑 생성 함수 정의
function createBitcoinWallet($password, $apiKey) {
    $url = "https://api.chaingateway.io/v2/bitcoin/wallets";
    $postData = json_encode(["password" => $password]);

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Authorization: $apiKey"
        ],
    ]);

    $response = curl_exec($ch);
    $err = curl_error($ch);

    curl_close($ch);

    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        return json_decode($response, true);
    }
}

// 비트코인 지갑 생성 요청
$walletData = createBitcoinWallet("1234", $apiKey);

// 응답 데이터를 확인하여 디버깅
echo "<pre>";
print_r($walletData);
echo "</pre>";

if ($walletData && isset($walletData['address']) && isset($walletData['privatekey']) && isset($walletData['wif'])) {
    echo "Wallet Address: " . $walletData['address'] . "<br>";
    echo "Private Key: " . $walletData['privatekey'] . "<br>";
    echo "WIF: " . $walletData['wif'] . "<br>";
} else {
    echo "Failed to create Bitcoin wallet or missing expected response fields.";
}
?>
