<?php

// 이더리움
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

$blockSDK = new BlockSDK("BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM");

$ethClient = $blockSDK->createEthereum();

// 이더리움 주소 잔액 확인
$address = "0x528179ea37c29f514ac6e5951ab1f8c53a7989f5";
$addressBalance = $ethClient->getAddressBalance([
    "address" => $address
]);

if ($addressBalance['state']['success']) {
    echo "Address: " . $address . "<br>";
    echo "Balance: " . $addressBalance['payload']['balance'] . " ETH<br>";
    echo "Unconfirmed Balance: " . $addressBalance['payload']['unconfirmed_balance'] . " ETH<br>";
} else {
    echo "Error fetching balance: " . $addressBalance['state']['code'] . "<br>";
}

// ERC-20 토큰 잔액 확인
$tokenAddress = "0xdac17f958d2ee523a2206206994597c13d831ec7"; // USDT 토큰 계약 주소
$erc20Balance = $ethClient->getErc20Balance([
    "contract_address" => $tokenAddress,
    "from" => $address
]);

if ($erc20Balance['state']['success']) {
    echo "<br>ERC-20 Token Balance<br>";
    echo "Token Address: " . $tokenAddress . "<br>";
    echo "Balance: " . $erc20Balance['payload']['balance'] . " USDT<br>";
} else {
    echo "Error fetching token balance: " . $erc20Balance['state']['code'] . "<br>";
}

?>
