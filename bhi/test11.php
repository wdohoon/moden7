<?php

// 이더리움
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

$blockSDK = new BlockSDK("BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM");

$ethClient = $blockSDK->createEthereum();

// 새로운 지갑 주소 생성
$address = $ethClient->createAddress([
    "name" => "test"
]);

// 생성된 주소와 프라이빗 키 출력
echo "Address: " . $address['payload']['address'] . "<br>";
echo "ID: " . $address['payload']['id'] . "<br>";
echo "Private Key: " . $address['payload']['private_key'] . "<br>";

// 잔액 확인
$addressBalance = $ethClient->getAddressBalance([
    "address" => $address['payload']['address']
]);

if ($addressBalance['state']['success']) {
    echo "Balance: " . $addressBalance['payload']['balance'] . "<br>";
    echo "Unconfirmed Balance: " . $addressBalance['payload']['unconfirmed_balance'] . "<br>";
} else {
    echo "Error fetching balance: " . $addressBalance['state']['code'] . "<br>";
}

?>
