<?php
// 비트코인
$walletId = "moden7_7432158"; // 앞서 생성된 비트코인 지갑 ID
$apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k"; // 실제 API 키

// Step 1: 지갑 주소 생성
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.chaingateway.io/v2/bitcoin/wallets/$walletId/addresses",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{}",
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "Authorization: $apiKey"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  die("cURL Error #:" . $err);
} else {
  $responseData = json_decode($response, true);
  if (isset($responseData['ok']) && $responseData['ok'] && isset($responseData['data']['address'])) {
    $walletAddress = $responseData['data']['address'];
  } else {
    die("Failed to create wallet address.");
  }
}

// Step 2: 프라이빗 키 추출
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.chaingateway.io/v2/bitcoin/wallets/$walletId/addresses/$walletAddress/export",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode(["password" => "test123"]), // 필요 시 비밀번호 수정
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "Authorization: $apiKey"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  die("cURL Error #:" . $err);
} else {
  $responseData = json_decode($response, true);
  if (isset($responseData['ok']) && $responseData['ok'] && isset($responseData['data']['private_key'])) {
    $privateKey = $responseData['data']['private_key'];
  } else {
    die("Failed to export private key.");
  }
}

// 주소와 프라이빗 키 출력
echo "Address: " . $walletAddress . "\n";
echo "<br>";
echo "Private Key: " . $privateKey . "\n";
echo "<br>";
// Step 3: 지갑 잔액 확인
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.chaingateway.io/v2/bitcoin/addresses/$walletAddress/balance",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "Authorization: $apiKey"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  die("cURL Error #:" . $err);
} else {
  $responseData = json_decode($response, true);
  if (isset($responseData['ok']) && $responseData['ok'] && isset($responseData['data']['balance'])) {
    $balance = $responseData['data']['balance'];
    echo "Balance: " . $balance . " BTC\n";
  } else {
    die("Failed to fetch wallet balance.");
  }
}
?>
