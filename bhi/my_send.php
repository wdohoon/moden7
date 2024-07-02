<?php
include_once('./_common.php');
include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_PATH.'/head.php');
include_once(G5_PATH.'/vendor/autoload.php');

$coin = $_GET['coin'] ?? 'OKNA'; // 기본값을 OKNA로 설정

include_once "./lib/db.class.php";

$DB_LP = new DBCLASS;

// 코인 시세 가져오기 함수
function getCoinPrice($coinId) {
    $url = "https://api.coingecko.com/api/v3/simple/price?ids={$coinId}&vs_currencies=usd";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return $data[$coinId]['usd'];
}

// TRON 잔액 가져오기 함수
function getTronBalance($address) {
    $url = "https://api.trongrid.io/v1/accounts/$address";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return isset($data['data'][0]['balance']) ? $data['data'][0]['balance'] / 1000000 : 0; // TRX balance is in SUN (1 TRX = 1,000,000 SUN)
}

// TRC-20 잔액 가져오기 함수
function getTrc20Balance($address, $token) {
    $apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k"; 
    $url = "https://api.chaingateway.io/v2/tron/balances/$address/trc20/$token";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $apiKey",
        "Content-Type: application/json"
    ));
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        echo "cURL Error #:" . $err;
        return 0;
    } else {
        $data = json_decode($response, true);
        if (isset($data['data']) && isset($data['data']['balance'])) {
            return $data['data']['balance'];
        } else {
            return 0;
        }
    }
}

// 비트코인 잔액 가져오기 함수
function getBitcoinBalance($address) {
    $url = "https://blockchain.info/q/addressbalance/$address";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    if (is_numeric($response)) {
        return $response / 100000000; // Convert satoshis to BTC
    } else {
        return 0;
    }
}

// BEP-20 잔액 가져오기 함수
/*function getBep20Balance($address, $contractAddress) {
    $apiKey = "BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM"; // 여기에 실제 BlockSDK API 키를 입력하세요
    $url = "https://api.blocksdk.com/v2/bsc/bep20-tokens/$contractAddress/$address/balance";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "x-api-key: $apiKey"
    ));
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        echo "cURL Error #:" . $err;
        return 0;
    } else {
        $data = json_decode($response, true);
        if (isset($data['payload']['balance'])) {
            return $data['payload']['balance'];
        } else {
            return 0;
        }
    }
}*/

$btcPrice = getCoinPrice('bitcoin');
$ethPrice = getCoinPrice('ethereum');
$usdtErcPrice = getCoinPrice('tether');
$usdtTrcPrice = getCoinPrice('tether'); 
//$usdtBepPrice = getCoinPrice('binance-usd');
$xrpPrice = getCoinPrice('ripple');
$trxPrice = getCoinPrice('tron');

$no = $member['mb_no'];

$qry = "SELECT * FROM wallet_address WHERE no = '$no';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();

$btcAddr = $row->bit;
$ethAddr = $row->eth;
$trxAddr = $row->trx;
$bscAddr = $row->binance;

$blockSDK = new BlockSDK("BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM");

// Get Ethereum balance
$ethClient = $blockSDK->createEthereum();
$addressBalance = $ethClient->getAddressBalance(["address" => $ethAddr]);
if ($addressBalance['state']['success']) {
    $ETH = $addressBalance['payload']['balance'];
} else {
    echo "Error fetching Ethereum balance: " . $addressBalance['state']['code'] . "<br>";
}

// ERC-20 잔액 확인
$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0xdAC17F958D2ee523a2206206994597C13D831ec7",
    "from" => $ethAddr
]);
if ($erc20['state']['success']) {
    $USDT_ERC = $erc20['payload']['balance'];
} else {
    echo "Error fetching ERC-20 balance: " . $erc20['state']['code'] . "<br>";
}

// Get TRON balance
$TRX = getTronBalance($trxAddr);

// TRC-20 잔액 확인
$USDT_TRC = getTrc20Balance($trxAddr, 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t'); // 여기에 TRC-20 USDT 컨트랙트 주소를 입력하세요

// BEP-20 잔액 확인
//$USDT_BEP = getBep20Balance($bscAddr, '0x55d398326f99059ff775485246999027b3197955'); // 여기에 BEP-20 USDT 컨트랙트 주소를 입력하세요

// Get Bitcoin balance
$BTC = getBitcoinBalance($btcAddr);

//$total_usd = $ETH * $ethPrice + $USDT_ERC * $usdtErcPrice + $USDT_BEP * $usdtBepPrice + $TRX * $trxPrice + $USDT_TRC * $usdtTrcPrice + $BTC * $btcPrice;

//$qry = "UPDATE g5_member SET mb_point = '$total_usd' WHERE mb_no = '$no';";
$DB_LP->select($qry);

$amount = 0;
$total_a = 0;

switch ($coin) {
    case 'ETH':
        $amount = $ETH;
        $total_a = $ETH * $ethPrice;
        break;
    case 'USDT-ERC':
        $amount = $USDT_ERC;
        $total_a = $USDT_ERC * $usdtErcPrice;
        break;
    case 'USDT-TRC':
        $amount = $USDT_TRC;
        $total_a = $USDT_TRC * $usdtTrcPrice;
        break;
    case 'USDT-BEP':
        $amount = $USDT_BEP;
        $total_a = $USDT_BEP * $usdtBepPrice;
        break;
    case 'BTC':
        $amount = $BTC;
        $total_a = $BTC * $btcPrice;
        break;
    case 'TRX':
        $amount = $TRX;
        $total_a = $TRX * $trxPrice;
        break;
}

// 유저 정보를 가져옵니다
$no = $member['mb_no'];

$qry = "SELECT * FROM wallet_address WHERE no = '$no';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();

if ($row) {
    $trxAddr = $row->trx;
    $trxPrivateKey = $row->trx_privary;
    $ethAddr = $row->eth;
    $ethPrivateKey = $row->eth_privary;
} else {
    echo "Error fetching wallet address data";
    exit;
}

$blockSDK = new BlockSDK("BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM");

$DB_LP->close();

// TRC-20 토큰을 보내는 함수
function sendTrc20Token($fromAddress, $toAddress, $amount, $token, $privateKey) {
    $apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k"; // 여기에 실제 API 키를 입력하세요
    $url = "https://api.chaingateway.io/v2/tron/transactions/trc20";

    // 요청 본문 데이터 생성
    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "contractaddress" => $token,
        "privatekey" => $privateKey
    );


    // CURL을 사용하여 API에 요청 보내기
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $apiKey",
        "Content-Type: application/json",
        "Accept: application/json"
    ));
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // 요청 결과 확인 및 디버깅 정보 출력
    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        echo "<pre>Response Data: " . json_encode($data, JSON_PRETTY_PRINT) . "</pre>";
        if (isset($data['data']['txid'])) {
            return $data['data']['txid'];
        } else {
            return false;
        }
    }
}

// TRX를 보내는 함수
function sendTrx($fromAddress, $toAddress, $amount, $privateKey) {
    $apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k"; // 여기에 실제 API 키를 입력하세요
    $url = "https://api.chaingateway.io/v2/tron/transactions";

    // 요청 본문 데이터 생성
    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "privatekey" => $privateKey
    );


    // CURL을 사용하여 API에 요청 보내기
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $apiKey",
        "Content-Type: application/json",
        "Accept: application/json"
    ));
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // 요청 결과 확인 및 디버깅 정보 출력
    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data['data']['txid'])) {
            return $data['data']['txid'];
        } else {
            return false;
        }
    }
}

// 비트코인을 보내는 함수
function sendBitcoin($toAddress, $amount, $walletName, $password, $subtractFee, $speed) {
    $apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k"; // 여기에 실제 API 키를 입력하세요
    $url = "https://api.chaingateway.io/v2/bitcoin/transactions";

    // 요청 본문 데이터 생성
    $requestData = array(
        "to" => $toAddress,
        "amount" => $amount,
        "walletname" => $walletName,
        "password" => $password,
        "subtractfee" => $subtractFee,
        "speed" => $speed
    );


    // CURL을 사용하여 API에 요청 보내기
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $apiKey",
        "Content-Type: application/json",
        "Accept: application/json"
    ));
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // 요청 결과 확인 및 디버깅 정보 출력
    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data['txid'])) {
            return $data['txid'];
        } else {
            return false;
        }
    }
}

function sendEth($fromAddress, $toAddress, $amount, $privateKey) {
    $apiKey = "BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM"; // 여기에 실제 BlockSDK API 키를 입력하세요
    $url = "https://api.blocksdk.com/v2/eth/addresses/$fromAddress/sendtoaddress";

    // 가스비 정보 가져오기
    $gasInfoUrl = "https://api.blocksdk.com/v2/eth/info";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $gasInfoUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey"
    ));
    $response = curl_exec($ch);
    $gasData = json_decode($response, true);
    curl_close($ch);

    if (!$gasData || !isset($gasData['payload']['high_gwei'])) {
        echo "Error fetching gas info: " . json_encode($gasData);
        return false;
    }

    $highGwei = $gasData['payload']['high_gwei'];

    // 요청 본문 데이터 생성
    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "private_key" => $privateKey,
        "gas_limit" => 21000,
        "gwei" => $highGwei
    );

    // CURL을 사용하여 API에 요청 보내기
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey",
        "Content-Type: application/json",
        "Accept: application/json"
    ));
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // 요청 결과 확인 및 디버깅 정보 출력
    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data['payload']['hash'])) {
            return $data['payload']['hash'];
        } else {
            echo "Error in transaction: " . json_encode($data);
            return false;
        }
    }
}


function sendErc20Token($fromAddress, $toAddress, $amount, $contractAddress, $privateKey) {
    $apiKey = "BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM"; // 여기에 실제 BlockSDK API 키를 입력하세요
    $url = "https://api.blocksdk.com/v2/eth/erc20-tokens/$contractAddress/$fromAddress/transfer";

    // 가스비 정보 가져오기
    $gasInfoUrl = "https://api.blocksdk.com/v2/eth/info";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $gasInfoUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey"
    ));
    $response = curl_exec($ch);
    $gasData = json_decode($response, true);
    curl_close($ch);

    if (!$gasData || !isset($gasData['payload']['high_gwei'])) {
        echo "Error fetching gas info: " . json_encode($gasData);
        return false;
    }

    $highGwei = $gasData['payload']['high_gwei'];

    // 잔액 확인
    $balanceUrl = "https://api.blocksdk.com/v2/eth/addresses/$fromAddress/balance";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $balanceUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey"
    ));
    $balanceResponse = curl_exec($ch);
    $balanceData = json_decode($balanceResponse, true);
    curl_close($ch);

    if (!$balanceData || !isset($balanceData['payload']['balance'])) {
        echo "Error fetching balance: " . json_encode($balanceData);
        return false;
    }

    $balance = $balanceData['payload']['balance'];
    $gasLimit = 90000; // ERC-20 전송에 필요한 가스 한도
    $gasPrice = $highGwei * pow(10, 9);
    $totalGasCost = $gasLimit * $gasPrice;

    if ($totalGasCost > $balance) {
        echo "Insufficient funds for gas. You need at least " . ($totalGasCost / pow(10, 18)) . " ETH to cover the gas fees.";
        return false;
    }

    // 요청 본문 데이터 생성
    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "private_key" => $privateKey,
        "gas_limit" => $gasLimit,
        "gwei" => $highGwei
    );

    // CURL을 사용하여 API에 요청 보내기
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey",
        "Content-Type: application/json",
        "Accept: application/json"
    ));
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // 요청 결과 확인 및 디버깅 정보 출력
    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data['payload']['hash'])) {
            return $data['payload']['hash'];
        } else {
            echo "Error in transaction: " . json_encode($data);
            return false;
        }
    }
}



/*function sendBep20Token($fromAddress, $toAddress, $amount, $contractAddress, $privateKey) {
    $apiKey = "BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM"; // 여기에 실제 BlockSDK API 키를 입력하세요
    $url = "https://api.blocksdk.com/v2/bsc/bep20-tokens/$contractAddress/$fromAddress/transfer";

    // 가스비 정보 가져오기
    $gasInfoUrl = "https://api.blocksdk.com/v2/bsc/info";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $gasInfoUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey"
    ));
    $response = curl_exec($ch);
    $gasData = json_decode($response, true);
    curl_close($ch);

    if (!$gasData || !isset($gasData['payload']['gwei'])) {
        echo "Error fetching gas info: " . json_encode($gasData);
        return false;
    }

    $gwei = $gasData['payload']['gwei'];

    // 잔액 확인
    $balanceUrl = "https://api.blocksdk.com/v2/bsc/addresses/$fromAddress/balance";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $balanceUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey"
    ));
    $balanceResponse = curl_exec($ch);
    $balanceData = json_decode($balanceResponse, true);
    curl_close($ch);

    if (!$balanceData || !isset($balanceData['payload']['balance'])) {
        echo "Error fetching balance: " . json_encode($balanceData);
        return false;
    }

    $balance = $balanceData['payload']['balance'];
    $gasLimit = 90000; // BEP-20 전송에 필요한 가스 한도
    $gasPrice = $gwei * pow(10, 9);
    $totalGasCost = $gasLimit * $gasPrice;

    if ($totalGasCost > $balance) {
        echo "Insufficient funds for gas. You need at least " . ($totalGasCost / pow(10, 18)) . " BNB to cover the gas fees.";
        return false;
    }

    // 요청 본문 데이터 생성
    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "private_key" => $privateKey,
        "gas_limit" => $gasLimit,
        "gwei" => $gwei
    );

    // 요청 본문에 프라이빗 키가 있는지 확인
    if (empty($privateKey)) {
        echo "Error: Private Key is missing.";
        return false;
    }

    // CURL을 사용하여 API에 요청 보내기
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: $apiKey",
        "Content-Type: application/json",
        "Accept: application/json"
    ));
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // 요청 결과 확인 및 디버깅 정보 출력
    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data['payload']['hash'])) {
            return $data['payload']['hash'];
        } else {
            echo "Error in transaction: " . json_encode($data);
            return false;
        }
    }
}
*/
// 사용자가 전송을 요청했을 때 실행되는 부분
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $toAddress = $_POST['addr'];
    $amount = $_POST['num'];
    $coinType = $_POST['coinn'];

    // 입력값 유효성 검사
    if (empty($toAddress) || empty($amount) || !is_numeric($amount) || $amount <= 0) {
        echo "Invalid input. Please check the address and amount.";
        exit;
    }

    // 코인 종류에 따라 전송 방식 선택
    if ($coinType == 'TRX') {
        $txHash = sendTrx($trxAddr, $toAddress, $amount, $trxPrivateKey);
    } else if ($coinType == 'USDT-TRC') {
        $token = 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t';
        $txHash = sendTrc20Token($trxAddr, $toAddress, $amount, $token, $trxPrivateKey);
    } else if ($coinType == 'BTC') {
        $walletName = "moden7_7432158";
        $password = "1234";
        $subtractFee = false;
        $speed = "fast";
        $txHash = sendBitcoin($toAddress, $amount, $walletName, $password, $subtractFee, $speed);
    } else if ($coinType == 'ETH') {
        $txHash = sendEth($ethAddr, $toAddress, $amount, $ethPrivateKey);
    } else if ($coinType == 'USDT-ERC') {
        $contractAddress = '0xdAC17F958D2ee523a2206206994597C13D831ec7';
        $txHash = sendErc20Token($ethAddr, $toAddress, $amount, $contractAddress, $ethPrivateKey);
    } /*else if ($coinType == 'USDT-BEP') {
        $contractAddress = '0x55d398326f99059ff775485246999027b3197955';
        $txHash = sendBep20Token($bscAddr, $toAddress, $amount, $contractAddress, $bscPrivateKey);
    }*/

    // 거래 결과 출력
    if ($txHash) {
        echo "Transaction successful! Hash: " . $txHash;
    } else {
        echo "Transaction failed! Please check your inputs and try again.";
    }
}



?>


<style>
body{background: #F1F1F5;}
.my_container{width: 67vw;margin:4vw auto;background:#fff;padding:2vw;border-radius:16px;}
.btns .btn1.bg-red a{color: #fff;}
.mining .section .count-box.type2 .inp1{padding-right: 44px;}
.header .left{display: flex;justify-content:center;align-items:center;}
.header h2{font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: center;padding-bottom:20px;}
.mining .section1{background: linear-gradient(90deg, #F59D31 0%, #FA7E0C 100%);border-radius:16px;}
.mining .section .mine .use-price{font-size: 24px;font-weight: 600;line-height: 34px;letter-spacing: -0.025em;color:#fff;}
.mining .section .mine .price{font-size: 48px;font-weight: 600;line-height: 62px;letter-spacing: -0.025em;color:#fff;text-align:center;}
.mining .section .mine .price2{font-size: 18px;font-weight: 400;line-height: 26px;letter-spacing: -0.025em;color:#fff;}
.inp1{padding:0;border-bottom:1px solid #E5E5EC;}
.section2{padding:60px 0 8px;}
.section3{padding-bottom:32px;}
.btn1{width:100px;height: 36px;margin-bottom:32px;font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;text-align: center;}
.buttons{display: flex;justify-content:center;align-items:center;}
.caution{background: #F1F1F5;border:none;padding:12px 32px 24px;}
.caution .tit{font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;}
.caution .txt{font-size: 14px;font-weight: 400;line-height: 20px;letter-spacing: -0.025em;text-align: left;padding:12px 6px;}
.modal-header h5{font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;text-align: center;padding:21px;border-bottom:1px solid #999999;}
.modal-logout strong{font-size: 14px;font-weight: 400;line-height: 20px;letter-spacing: -0.025em;text-align: center;padding:0;border:none;}
.modal-logout .txt2{font-size: 14px;font-weight: 400;line-height: 20px;letter-spacing: -0.025em;text-align: center;padding:0;}
.gr{background:#fff; border:1px solid #E5E5EC;color:#111;}
.modal-footer{width: auto;gap:8px;}
.btn2{width: 240px;height: 48px;border-radius: 8px;background: #4896EC;color:#fff;}
.mining .section .count-box.type2 .inp1{padding-right:80px;}
@media screen and (max-width: 768px) {
	.my_container{width: 90%;}
}
</style>	

<div class="my_container">
	<div class="header">
		<a href="javascript:history.back();" class="prev"><img src="/img/vector.png" alt=""></a>
		<div class="left">
			<h2>보내기</h2>
		</div>
	</div>
	
	<div class="mining">
		<form action="" method="post" class="send_form">
			<div class="section section1">
				<div class="mine">
					<div class="use-price">나의 <span class="change_ex"><?php echo $coin;?></span> 출금 가능 잔고</div>
					<div class="price"><span class="change_price"><?php echo number_format($amount,4);?></span> <span class="change_ex"><?php echo $coin;?></span></div>
					<div class="price2"><span class="change_price"><?php echo number_format($total_a,4);?></span> USD</div>
				</div>
			</div>		
			<div class="section section2">
				<div class="box1 type2">
					<input type="text" name="addr" class="inp1" style="flex:1; " placeholder="출금주소를 입력해 주세요.">
				</div>
			</div>				
			<div class="section section3">
				<div class="count-box type2">
					<input type="hidden" name="coinn" id="coinn" class="inp1 text-right" value="<?php echo $coin;?>" style="width:100%;">
					<input type="text" name="num" id="price" class="inp1 text-right" value="" style="width:100%;">
					<strong><span class="change_ex"><?php echo $coin;?></span></strong>
				</div>
			</div>		
			<div class="buttons">
				<button type="submit" class="btn1 btn-s block nextbtgo btn2">보내기</button>
			</div>
		</form>
		
		<div class="caution">
			<div class="tit">자산 전송 안내</div>
			<div class="txt">
				• 출금주소를 꼭 확인해 주세요.<br>
				• 보내시는 수량을 꼭 확인해 주세요.<br>
			</div>
		</div>
	</div>
</div>	
	
<script>
$('#Select1').change(function(){
	$('#Kind').text($(this).val());
	$('#Kind').addClass('active');
	if($(this).val()=="" || !$(this).val()){
		$(".jango_hide").hide();
		return false;
	}else{
		var $sel_d = $(this).val();

		window.location.href = 'https://bhidex.com/my_send.php?coin=' + $(this).val();
	}
})

function chkform(){
	var swi = 0;
	$("input[name=ra1]").each(function(){
		if($(this).prop("checked")==true){
			if($(this).val()=="정률"){
				$(".send_form").attr("action","/my_send_1.php");
			}else if($(this).val()=="가스비"){
				$(".send_form").attr("action","/my_send_2.php");
			}
		swi = 1;
		}	
	})

	if(!$("#price").val() || $("#price").val()==0 || $("#price").val()=='0'){
		alert("금액을 입력해주세요");
		return false;
	}
	
	var priceval = $("#price").val();
	
	if(priceval.search(/[^0-9]$/)!=-1){
		alert("숫자만 입력해주세요");
		return false;
	}
	$(".send_form").submit();
}

$(".godsyy").click(function(){
	chkform();
})

$('#Select2').change(function(){
	$('#Addr').text($(this).val());
	$('#Addr').addClass('active');
})

$(".nextbtgo").click(function(){
	$('#modalAlert').modal();
})
</script>

<?php	
include(G5_PATH."/tail.php");	
?>
