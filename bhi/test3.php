<?php

// 바이낸스 스마트 체인
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

$blockSDK = new BlockSDK("BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM");

$bscClient = $blockSDK->createEthereum(); // BSC는 이더리움 클라이언트로 작동

// 바이낸스 스마트 체인 주소 잔액 확인
$address = "0xd6bf2c22cff024a7aca70a29c15dbb6d0424db1b";
$addressBalance = $bscClient->getAddressBalance([
    "address" => $address
]);

if ($addressBalance['state']['success']) {
    echo "Address: " . $address . "<br>";
    echo "Balance: " . $addressBalance['payload']['balance'] . " BNB<br>";
    echo "Unconfirmed Balance: " . $addressBalance['payload']['unconfirmed_balance'] . " BNB<br>";
} else {
    echo "Error fetching balance: " . $addressBalance['state']['code'] . "<br>";
}

// BEP-20 토큰 잔액 확인
$tokenAddress = "0xdac17f958d2ee523a2206206994597c13d831ec7"; // USDT 토큰 계약 주소
$erc20 = $bscClient->getErc20Balance([
    "contract_address" => $tokenAddress,
    "from" => $address
]);

if ($erc20['state']['success']) {
    echo "<br>BEP-20 Token Balance<br>";
    echo "Token Address: " . $tokenAddress . "<br>";
    echo "Balance: " . $erc20['payload']['balance'] . " USDT<br>";
} else {
    echo "Error fetching token balance: " . $erc20['state']['code'] . "<br>";
}

?>
