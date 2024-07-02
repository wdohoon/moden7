<?php

$walletAddress = "bc1qyrsv86d7jm208qhq7gyyk0nfnct2qtsug6fn5e"; // 확인할 비트코인 지갑 주소

// 비트코인 지갑 잔액 확인
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://blockchain.info/q/addressbalance/$walletAddress",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if (is_numeric($response)) {
        $balance = $response;
        echo "Balance: " . $balance . " satoshis\n";
        echo "Balance: " . ($balance / 100000000) . " BTC\n";
    } else {
        echo "Failed to fetch wallet balance. Response data:\n";
        print_r($response);
    }
}
?>
