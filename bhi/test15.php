<?php
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

// BlockSDK 객체 생성
$blockSDK = new BlockSDK("BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM");

// 이더리움 클라이언트를 BSC 클라이언트로 사용
$bscClient = $blockSDK->createEthereum();

// 새로운 지갑 주소 생성
$address = $bscClient->createAddress([
    "name" => "test"
]);

// 생성된 주소와 프라이빗 키 출력
$walletAddress = $address['payload']['address'];
$privateKey = $address['payload']['private_key'];

echo "Address: " . $walletAddress . "<br>";
echo "Private Key: " . $privateKey . "<br>";

// 지갑 잔액 확인
$balanceResponse = $bscClient->getAddressBalance([
    "address" => $walletAddress
]);

if (isset($balanceResponse['payload']['balance'])) {
    $balance = $balanceResponse['payload']['balance'];
    echo "Balance: " . $balance . " ETH<br>";
} else {
    echo "Failed to fetch wallet balance.<br>";
}

?>
