<?php
// 트론

// API 키 설정
$api_key = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k";

// ChainGateway.io Tron 지갑 생성 함수
function createTronWallet($api_key) {
    $url = "https://api.chaingateway.io/v2/tron/addresses";

    $headers = [
        "Content-Type: application/json",
        "Authorization: $api_key"
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpcode == 200) {
        $wallet_info = json_decode($response, true);
        curl_close($ch);
        return $wallet_info;
    } else {
        curl_close($ch);
        throw new Exception("Error creating wallet: $httpcode, $response");
    }
}

// Tron 지갑의 잔액 확인 함수
function getTronWalletBalance($address) {
    $url = "https://api.trongrid.io/v1/accounts/$address";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpcode == 200) {
        $balance_info = json_decode($response, true);
        curl_close($ch);
        return $balance_info;
    } else {
        curl_close($ch);
        throw new Exception("Error fetching balance: $httpcode, $response");
    }
}

try {
    // Tron 지갑 생성
    $tron_wallet = createTronWallet($api_key);

    echo "Tron Wallet Created Successfully<br>";
    echo "Full response: <pre>" . print_r($tron_wallet, true) . "</pre><br>";

    if (isset($tron_wallet['data']['address'])) {
        $tron_address = $tron_wallet['data']['address'];
        echo "Address: " . $tron_address . "<br>";
    } else {
        throw new Exception("Address not found");
    }

    if (isset($tron_wallet['data']['privateKey'])) {
        echo "Private Key: " . $tron_wallet['data']['privateKey'] . "<br>";
    } else {
        throw new Exception("Private Key not found");
    }

    // Tron 지갑의 잔액 확인
    $balance_info = getTronWalletBalance($tron_address);

    if (isset($balance_info['data'][0]['balance'])) {
        $balance = $balance_info['data'][0]['balance'] / 1000000; // TRX는 소수점 6자리까지 지원하므로 변환 필요
        echo "Balance: " . $balance . " TRX<br>";
    } else {
        echo "Balance not found<br>";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
