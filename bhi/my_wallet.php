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
include_once(G5_PATH.'/head.php');
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
    $apiKey = "5u4a1dq58g0gogs8g4sgo0800sskc400wcgk0osck84cs0swswc084k88o04808k"; // 여기에 실제 API 키를 입력하세요
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
}
*/
$btcPrice = getCoinPrice('bitcoin');
$ethPrice = getCoinPrice('ethereum');
$usdtErcPrice = getCoinPrice('tether');
$usdtTrcPrice = getCoinPrice('tether'); // 정확한 TRC-20 USDT 시세 가져오기
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
$usdtAddr = $row->usdt_address;

include_once(G5_PATH.'/vendor/autoload.php');
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

$total_usd = $ETH * $ethPrice + $USDT_ERC * $usdtErcPrice + $USDT_BEP * $usdtBepPrice + $TRX * $trxPrice + $USDT_TRC * $usdtTrcPrice + $BTC * $btcPrice;

$qry = "UPDATE g5_member SET mb_point = '$total_usd' WHERE mb_no = '$no';";
$DB_LP->select($qry);
?>
<style>
#wallets{background: #F1F1F5;padding:82px 0;}
.wallet{width: 67vw;height: 900px;background:#fff; border-radius:16px;margin:0 auto;}
.wallet h1{font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: center;padding:45px;}
.wallet .mine{background: #4896EC;width: 90%;height: 10%;border-radius:8px;margin:0 auto;display: flex;align-items:center;}
.wallet .list1 .head{background:#fff; color:#000;}
.wallet .mine dl{width: 100%;color:#fff;font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: center;}
.wallet .list1 .head{color:#CACAD7;border-bottom: 1px solid #CACAD7;width: 90%;margin:0 auto;padding: 70px 20px 7px;font-size: 16px;font-weight: 400;line-height: 24px;text-align: left;}
.wallet .list1 .head div{color:#000;}
.wallet .list1 .body{width: 93%;margin:0 auto;}

@media screen and (max-width: 1024px) {
	.wallet{width: 85vw;}
	.wallet .mine dl{font-size: 20px;}
}
</style>	

<div id="wallets">
	<div class="wallet">
		<h1>내 지갑</h1>	
		<div class="mine">
			<dl>
				<dt>총 자산</dt>
				<dd><?php echo number_format($total_usd, 4);?> <small>USD</small></dd>
			</dl>
		</div>
		<div class="list1">
			<div class="head">
				<div>코인</div>
				<div>USD가치</div>
			</div>
			<div class="body">
				<ul>
					<li>
						<a href="/my_wallet_view.php?coin=BTC">
							<div class="coin">
								<span><img src="img/common/btc.svg"></span>
								<strong>BTC</strong>
							</div>
							<div class="val">
								<strong><?php echo number_format($BTC, 4);?> BTC</strong>
								<p>=<?php echo number_format($BTC * $btcPrice, 4);?> USD</p>
							</div>
						</a>
					</li>
					<li>
						<a href="/my_wallet_view.php?coin=ETH">
							<div class="coin">
								<span><img src="img/common/eth.svg"></span>
								<strong>ETH</strong>
							</div>
							<div class="val">
								<strong><?php echo number_format($ETH,4);?> ETH</strong>
								<p>=<?php echo number_format($ETH * $ethPrice, 4);?> USD</p>
							</div>
						</a>
					</li>
					<li>
						<a href="/my_wallet_view.php?coin=TRX">
							<div class="coin">
								<span><img src="https://cryptologos.cc/logos/tron-trx-logo.png?v=025"></span>
								<strong>TRX</strong>
							</div>
							<div class="val">
								<strong><?php echo number_format($TRX,4);?> TRX</strong>
								<p>=<?php echo number_format($TRX * $trxPrice, 4);?> USD</p>
							</div>
						</a>
					</li>
					<li>
						<a href="/my_wallet_view.php?coin=USDT-ERC">
							<div class="coin">
								<span><img src="img/common/usdt.svg"></span>
								<strong>USDT (ERC-20)</strong>
							</div>
							<div class="val">
								<strong><?php echo number_format($USDT_ERC,4);?> USDT</strong>
								<p>=<?php echo number_format($USDT_ERC * $usdtErcPrice, 4);?> USD</p>
							</div>
						</a>
					</li>
					<li>
						<a href="/my_wallet_view.php?coin=USDT-TRC">
							<div class="coin">
								<span><img src="img/common/usdt.svg"></span>
								<strong>USDT (TRC-20)</strong>
							</div>
							<div class="val">
								<strong><?php echo number_format($USDT_TRC,4);?> USDT</strong>
								<p>=<?php echo number_format($USDT_TRC * $usdtTrcPrice, 4);?> USD</p>
							</div>
						</a>
					</li>
<!-- 					<li>
						<a href="/my_wallet_view.php?coin=USDT-BEP">
							<div class="coin">
								<span><img src="img/common/usdt.svg"></span>
								<strong>USDT (BEP-20)</strong>
							</div>
							<div class="val">
								<strong><?php echo number_format($USDT_BEP,4);?> USDT</strong>
								<p>=<?php echo number_format($USDT_BEP * $usdtBepPrice, 4);?> USD</p>
							</div>
						</a>
					</li> -->
					<!-- 필요에 따라 다른 코인 추가 -->
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
include(G5_PATH."/tail.php");	
?>
