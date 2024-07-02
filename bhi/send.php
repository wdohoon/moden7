<?php
include_once('./_common.php');

if (!$is_member) {
    echo "<script>
            alert('로그인이 필요합니다.');
            window.location.href = '/index.php';
          </script>";
    exit;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once "./lib/db.class.php";
include_once(G5_PATH.'/head.php');
include_once(G5_PATH.'/vendor/autoload.php');

// 데이터베이스 클래스 초기화
$DB_LP = new DBCLASS;

$ret = $_GET['ret'] ?? null;
$coin = $_GET['coin'] ?? null;
if ($ret == 1) {
    echo "<script>alert('G-POINT 구매가 신청 되었습니다.');</script>";
}

// 관리자 지갑 주소 설정
$adminWallets = [
    'btc' => 'bc1qyrsv86d7jm208qhq7gyyk0nfnct2qtsug6fn5e',
    'eth' => '0xa2323459198a720d6152057e7a0972fadc20cf9d',
    'trx' => 'TNH3R2P9FDeMimrPTaUzWrr3KMpuChv2fq',
    'usdt-erc' => '0xa2323459198a720d6152057e7a0972fadc20cf9d',
    'usdt-trc' => 'TNH3R2P9FDeMimrPTaUzWrr3KMpuChv2fq',
];

// 캐시 파일 경로 설정
$cacheDir = G5_PATH . '/cache';
$cacheFile = $cacheDir . '/coin_prices.json';
$cacheTime = 60;

// 캐시 디렉토리가 없는 경우 생성
if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0755, true);
}

try {
    // 캐시 파일이 존재하고 유효한 경우 캐시 데이터를 사용
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {
        $coinPrices = json_decode(file_get_contents($cacheFile), true);
    } else {
        function getCoinPrices($coinIds) {
            $ids = implode(',', $coinIds);
            $url = "https://api.coingecko.com/api/v3/simple/price?ids={$ids}&vs_currencies=krw";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);
            return json_decode($response, true);
        }
        $coinIds = ['bitcoin', 'ethereum', 'tether', 'ripple', 'tron'];
        $coinPrices = getCoinPrices($coinIds);
        file_put_contents($cacheFile, json_encode($coinPrices)); // 캐시 파일 업데이트
    }

    // 각 코인의 시세를 변수에 할당
    $btcPrice = $coinPrices['bitcoin']['krw'];
    $ethPrice = $coinPrices['ethereum']['krw'];
    $usdtErcPrice = $coinPrices['tether']['krw'];
    $usdtTrcPrice = $coinPrices['tether']['krw'];
    $xrpPrice = $coinPrices['ripple']['krw'];
    $trxPrice = isset($coinPrices['tron']['krw']) ? $coinPrices['tron']['krw'] : 0;

    // 잔액 가져오기 함수
    function getTronBalance($address) {
        $url = "https://api.trongrid.io/v1/accounts/$address";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        return isset($data['data'][0]['balance']) ? $data['data'][0]['balance'] / 1000000 : 0;
    }

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

    function getBitcoinBalance($address) {
        $url = "https://blockchain.info/q/addressbalance/$address";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        if (is_numeric($response)) {
            return $response / 100000000;
        } else {
            return 0;
        }
    }

    function getEthereumGasPrice() {
        $url = "https://api.blocksdk.com/v2/eth/info";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "x-api-key: BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM"
        ));
        $response = curl_exec($ch);
        $gasData = json_decode($response, true);
        curl_close($ch);
        return isset($gasData['payload']['high_gwei']) ? $gasData['payload']['high_gwei'] : null;
    }

    $no = $member['mb_no'];
    $qry = "SELECT * FROM wallet_address WHERE no = '$no';";
    $DB_LP->select($qry);
    $row = $DB_LP->get_data();
    $btcAddr = $row->bit;
    $ethAddr = $row->eth;
    $trxAddr = $row->trx;
    $ethPrivateKey = $row->eth_privary;
    $trxPrivateKey = $row->trx_privary;

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
    $USDT_TRC = getTrc20Balance($trxAddr, 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t');

    // Get Bitcoin balance
    $BTC = getBitcoinBalance($btcAddr);

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$DB_LP->close();

// 코인 전송 함수들
function sendTrc20Token($fromAddress, $toAddress, $amount, $token, $privateKey) {
    $apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k";
    $url = "https://api.chaingateway.io/v2/tron/transactions/trc20";

    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "contractaddress" => $token,
        "privatekey" => $privateKey
    );

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

    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data['data']['txid'])) {
            return $data['data']['txid'];
        } else {
            echo "Error in transaction: " . json_encode($data);
            return false;
        }
    }
}

function sendTrx($fromAddress, $toAddress, $amount, $privateKey) {
    $apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k";
    $url = "https://api.chaingateway.io/v2/tron/transactions";

    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "privatekey" => $privateKey
    );

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

    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data['data']['txid'])) {
            return $data['data']['txid'];
        } else {
            echo "Error in transaction: " . json_encode($data);
            return false;
        }
    }
}

function sendBitcoin($toAddress, $amount, $walletName, $password, $subtractFee, $speed) {
    $apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k";
    $url = "https://api.chaingateway.io/v2/bitcoin/transactions";

    $requestData = array(
        "to" => $toAddress,
        "amount" => $amount,
        "walletname" => $walletName,
        "password" => $password,
        "subtractfee" => $subtractFee,
        "speed" => $speed
    );

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

    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        if (isset($data['txid'])) {
            return $data['txid'];
        } else {
            echo "Error in transaction: " . json_encode($data);
            return false;
        }
    }
}

function sendEth($fromAddress, $toAddress, $amount, $privateKey) {
    $apiKey = "BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM";
    $url = "https://api.blocksdk.com/v2/eth/addresses/$fromAddress/sendtoaddress";

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

    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "private_key" => $privateKey,
        "gas_limit" => 21000,
        "gwei" => $highGwei
    );

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
    $apiKey = "BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM";
    $url = "https://api.blocksdk.com/v2/eth/erc20-tokens/$contractAddress/$fromAddress/transfer";

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
    $gasLimit = 90000;
    $gasPrice = $highGwei * pow(10, 9);
    $totalGasCost = $gasLimit * $gasPrice;

    if ($totalGasCost > $balance) {
        echo "Insufficient funds for gas. You need at least " . ($totalGasCost / pow(10, 18)) . " ETH to cover the gas fees.";
        return false;
    }

    $requestData = array(
        "from" => $fromAddress,
        "to" => $toAddress,
        "amount" => $amount,
        "private_key" => $privateKey,
        "gas_limit" => $gasLimit,
        "gwei" => $highGwei
    );

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

// 사용자가 전송을 요청했을 때 실행되는 부분
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $toAddress = $adminWallets[$_POST['coin']];
    $amount = $_POST['amount'];
    $coinType = $_POST['coin'];

    if (empty($toAddress) || empty($amount) || !is_numeric($amount) || $amount <= 0) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    alert('Invalid input. Please check the address and amount.');
                });
              </script>";
        exit;
    }

    $txHash = null;
    switch ($coinType) {
        case 'trx':
            $txHash = sendTrx($trxAddr, $toAddress, $amount, $trxPrivateKey);
            break;
        case 'usdt-trc':
            $token = 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t';
            $txHash = sendTrc20Token($trxAddr, $toAddress, $amount, $token, $trxPrivateKey);
            break;
        case 'btc':
            $walletName = "moden7_7432158";
            $password = "1234";
            $subtractFee = false;
            $speed = "fast";
            $txHash = sendBitcoin($toAddress, $amount, $walletName, $password, $subtractFee, $speed);
            break;
        case 'eth':
            $txHash = sendEth($ethAddr, $toAddress, $amount, $ethPrivateKey);
            break;
        case 'usdt-erc':
            $contractAddress = '0xdAC17F958D2ee523a2206206994597C13D831ec7';
            $txHash = sendErc20Token($ethAddr, $toAddress, $amount, $contractAddress, $ethPrivateKey);
            break;
    }

    if ($txHash) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    alert('Transaction successful! Hash: $txHash');
                    window.location.href = '/my_selllist.php';
                });
              </script>";
    } else {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    alert('Transaction failed! Please check your inputs and try again.');
                    window.location.href = window.location.href;
                });
              </script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 폼 데이터 받기
    $coin = $_POST['coin'];
    $amount = $_POST['amount'];
    $current_balance = $_POST['current_balance'];
    $g_point_value = $_POST['g_point_value'];
    $coin_name = $_POST['coin_name'];
    $member_id = $member['mb_id'];
    $member_name = $member['mb_name'];

    $wr_subject = "구매 요청: $coin";
    $wr_content = "구매 수량: $amount";

    // wr_num 값을 가장 큰 값에서 1 증가시키도록 설정
    $result = sql_fetch("SELECT IFNULL(MAX(wr_num), 0) + 1 AS max_wr_num FROM g5_write_b08");
    $max_wr_num = $result['max_wr_num'];

    // 데이터베이스에 데이터 삽입
    $sql = "INSERT INTO g5_write_b08 
            (wr_num, wr_reply, wr_parent, wr_is_comment, ca_name, wr_option, wr_subject, wr_content, mb_id, wr_name, wr_datetime, wr_ip, wr_1, wr_2, wr_3, wr_4, wr_5) 
            VALUES 
            ('$max_wr_num', '', 0, 0, '구매', '', '$wr_subject', '$wr_content', '$member_id', '$member_name', NOW(), '{$_SERVER['REMOTE_ADDR']}', '$coin', '$current_balance', '$coin_name', '$amount', '$g_point_value')";

    if (sql_query($sql)) {
        echo "<script>alert('구매 요청이 성공적으로 처리되었습니다.'); location.href='/my_selllist.php';</script>";
    } else {
        echo "<script>alert('구매 요청 처리 중 오류가 발생했습니다.'); history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>G-POINT 구매하기</title>
    <style>
        body{background: #F1F1F5;}
        .my_container{width: 67vw;margin:4vw auto;background:#fff;padding:2vw;border-radius:16px;}
        .header .left{display: flex;justify-content:center;align-items:center;}
        .header h2{font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: center;padding-bottom:32px;border-bottom:1px solid #E5E5EC;}
        .mining .section1 .mine{background: linear-gradient(90deg, #F59D31 0%, #FA7E0C 100%);border-radius:16px;width: 100%;height: 200px;}
        .mining .section .mine .price{font-size: 48px;font-weight: 600;line-height: 62px;letter-spacing: -0.025em;color:#fff;text-align:center;padding-top:20px;}
        .mining .section .mine .my-mine{color:#fff;font-size: 20px;font-weight: 500;line-height: 24px;letter-spacing: -0.025em;text-align: left;}
        .section2{padding:20px 0 26px;}
        .inp1{width: 90%;height: 56px;border-bottom:1px solid #E5E5EC;font-size: 16px;font-weight: 400;line-height: 24px;color:#767676;}
        .btn1{height: 60px;border-radius:8px;width: 100%;font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;text-align: center;}
        .list-btns{width: 67vw;margin:4vw auto;background:#fff;padding:2vw;border-radius:16px;}
        .modal{margin:10%;}
        select{width: 100%;}
        .mining .section h4{font-size: 18px;font-weight: 600;line-height: 26px;letter-spacing: -0.025em;padding:46px 0 16px;}
        .mb15 p{color: var(--System-Black-600, #666);font-size: 16px;font-style: normal;font-weight: 400;line-height: 24px;letter-spacing: -0.4px;padding:8px 0 24px 20px;}
        .mb15 span{color: var(--System-SkyBlue-900, #225796);font-size: 16px;font-style: normal;font-weight: 400;line-height: 24px;letter-spacing: -0.4px;}
        .section2{display: flex;width: 100%;height: 72px;padding: 12px 16px;justify-content: space-between;border-radius: 8px;border: 1px solid var(--Line-Regular_Color, #ccc);color: var(--Font-02_black, #111);font-size: 16px;font-style: normal;font-weight: 400;line-height: 24px;}
        .section2 .price{display: flex;align-items:center;color: var (--Font-02_black, #111);font-size: 18px;font-style: normal;font-weight: 400;line-height: 26px;letter-spacing: -0.45px;}
        .section3 p{color: var(--Font-02_black, #111);font-size: 18px;font-style: normal;font-weight: 600;line-height: 18px; letter-spacing: -0.45px;padding:24px 0 16px;}
        .section3 .quantity{display: flex;align-items:center;color: var (--Font-02_black, #111);font-size: 16px;font-style: normal;font-weight: 400;line-height: 24px; letter-spacing: -0.4px;gap:10px;padding-bottom:70px;}
        .section3 .quantity span,.section3 .quantity input{display: flex;width: 50%;height: 56px;padding: 12px 16px;justify-content: flex-end;border-radius: 8px;border: 1px solid var(--Line-Light_Color, #ccc);align-items:center;}

        @media screen and (max-width: 1024px) {
            .my_container{width: 90%;}
            .list-btns{width: 90%;}
        }
    </style>
</head>
<body>
<div class="my_container">
    <div class="header">
        <div class="left"></div>
        <h2>G-POINT 구매하기</h2>
    </div>

    <div class="mining">
        <div class="section">
            <h4>간편거래</h4>
            <form method="post" action="send.php" name="form">
                <div class="mb15">
                    <select class="select" id="coinSelect" name="coin">
                        <option value="btc" data-price="<?php echo $btcPrice; ?>" data-balance="<?php echo $BTC; ?>">비트코인</option>
                        <option value="eth" data-price="<?php echo $ethPrice; ?>" data-balance="<?php echo $ETH; ?>">이더리움</option>
                        <option value="trx" data-price="<?php echo $trxPrice; ?>" data-balance="<?php echo $TRX; ?>">TRX</option>
                        <option value="usdt-erc" data-price="<?php echo $usdtErcPrice; ?>" data-balance="<?php echo $USDT_ERC; ?>">USDT (ERC-20)</option>
                        <option value="usdt-trc" data-price="<?php echo $usdtTrcPrice; ?>" data-balance="<?php echo $USDT_TRC; ?>">USDT (TRC-20)</option>
                    </select>
                    <p id="priceDisplay"></p>
                </div>

                <div class="section2">
                    <p>현재 잔고</p>
                    <div class="price">
                        <span class="change_price" id="currentBalance"></span> 
                        <span class="change_ex" id="coinNameDisplay"></span>
                    </div>
                </div>

                <div class="section3">
                    <p>구매수량</p>
                    <div class="quantity">
                        <input type="text" id="amountInput" name="amount" placeholder="0" required> = <span id="gPointDisplay">G-POINT</span>
                    </div>
                </div>

                <input type="hidden" id="currentBalanceInput" name="current_balance">
                <input type="hidden" id="gPointValueInput" name="g_point_value">
                <input type="hidden" id="coinNameInput" name="coin_name">

                <div class="btns">
                    <button type="submit" class="btn1 block btn-s mb15">구매하기</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="modalAlert">
        <div class="modal-dialog" style="max-width:800px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>구매 완료</h5>
                </div>
                <div class="modal-body">
                    <div class="txt1 text-center">구매가 완료 되었습니다. <br>관리자 확인 후 빠르게 처리 하도록 하겠습니다.</div>
                </div>
                <div class="modal-footer">
                    <button class="btn1 block" data-dismiss="modal">확인</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="list-btns mb50">
    <a href="/my_selllist.php">내 구매내역</a>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form[name='form']");
    const coinSelect = document.getElementById("coinSelect");
    const priceDisplay = document.getElementById("priceDisplay");
    const amountInput = document.getElementById("amountInput");
    const gPointDisplay = document.getElementById("gPointDisplay");
    const coinNameDisplay = document.getElementById("coinNameDisplay");
    const currentBalanceInput = document.getElementById("currentBalanceInput");
    const gPointValueInput = document.getElementById("gPointValueInput");
    const coinNameInput = document.getElementById("coinNameInput");
    const currentBalance = document.getElementById("currentBalance");

    coinSelect.addEventListener("change", function() {
        updatePriceDisplay();
        updateGPointDisplay();
        updateCoinNameDisplay();
        updateHiddenFields();
        updateCurrentBalance();
    });

    amountInput.addEventListener("input", function() {
        updateGPointDisplay();
        updateHiddenFields();
        validateAmount();
    });

    function updatePriceDisplay() {
        const selectedOption = coinSelect.options[coinSelect.selectedIndex];
        const price = selectedOption.getAttribute("data-price");
        const coinName = selectedOption.text;
        if (price > 0) {
            priceDisplay.innerHTML = `1 ${coinName} = <span>${new Intl.NumberFormat('en-US', { minimumFractionDigits: 4, maximumFractionDigits: 4 }).format(price)} KRW</span>`;
        } else {
            priceDisplay.innerHTML = `${coinName} 시세 정보를 가져올 수 없습니다. <span id="refreshPrice" style="cursor:pointer; color:#4896EC;">시세 확인</span>`;
            document.getElementById("refreshPrice").addEventListener("click", function() {
                location.reload();
            });
        }
    }

    function updateGPointDisplay() {
        const gPointValue = calculateGPoint();
        gPointDisplay.innerText = `${new Intl.NumberFormat('en-US', { minimumFractionDigits: 4, maximumFractionDigits: 4 }).format(gPointValue)} G-POINT`;
    }

    function calculateGPoint() {
        const selectedOption = coinSelect.options[coinSelect.selectedIndex];
        const price = parseFloat(selectedOption.getAttribute("data-price"));
        const amount = parseFloat(amountInput.value);
        return (!isNaN(price) && !isNaN(amount)) ? (amount * price) : 0;
    }

    function updateCoinNameDisplay() {
        const selectedOption = coinSelect.options[coinSelect.selectedIndex];
        const coinName = selectedOption.text;
    }

    function updateCurrentBalance() {
        const selectedOption = coinSelect.options[coinSelect.selectedIndex];
        const balance = parseFloat(selectedOption.getAttribute("data-balance"));
        currentBalance.innerText = balance ? `${new Intl.NumberFormat('en-US', { minimumFractionDigits: 4, maximumFractionDigits: 4 }).format(balance)} ${selectedOption.text}` : "0";
    }

    function updateHiddenFields() {
        const balance = parseFloat(currentBalance.innerText.replace(/,/g, ''));
        const gPointValue = calculateGPoint();
        const coinName = coinSelect.options[coinSelect.selectedIndex].text;

        currentBalanceInput.value = balance;
        gPointValueInput.value = gPointValue;
        coinNameInput.value = coinName;
    }

    function validateAmount() {
        const selectedOption = coinSelect.options[coinSelect.selectedIndex];
        const balance = parseFloat(selectedOption.getAttribute("data-balance"));
        const amount = parseFloat(amountInput.value);

        if (amount > balance) {
            alert("한도를 초과하였습니다.");
            amountInput.value = balance;
            updateGPointDisplay();
            updateHiddenFields();
        }
    }

    coinSelect.dispatchEvent(new Event("change"));
});
</script>

</body>
</html>

<?php
include_once(G5_PATH.'/tail.php');
?>
