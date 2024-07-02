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

$btcPrice = getCoinPrice('bitcoin');
$ethPrice = getCoinPrice('ethereum');
$usdtErcPrice = getCoinPrice('tether');
$usdtTrcPrice = getCoinPrice('usd-coin');
$usdtBepPrice = getCoinPrice('binance-usd');
$xrpPrice = getCoinPrice('ripple');
$trxPrice = getCoinPrice('tron');

$qry = "select * from coinprice;";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$OKNAP = $row->OKNA;

$no = $member['mb_no'];

$qry = "select * from wallet where no = '$no';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$ethaddr = $row->ETH;

include_once(G5_PATH.'/vendor/autoload.php');
$blockSDK = new BlockSDK("BKTRx8T0JSjL6daC91lDEkJtdhcKx4hJiPpIuJKM");

$ethClient = $blockSDK->createEthereum();
$addressBalance = $ethClient->getAddressBalance([
    "address" => $ethaddr
]);
$ETH = $addressBalance['payload']['balance'];

$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0x32EaEbAA73a6554588157d7d9d96A51813CbA64D",
    "from" => $ethaddr
]);
$OKNA = $erc20['payload']['balance'] + $member['mb_13'];

$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0xdAC17F958D2ee523a2206206994597C13D831ec7",
    "from" => $ethaddr
]);
$USDT = $erc20['payload']['balance'];

$qry = "update g5_member set mb_point = '$total_usd' where mb_no = '$no';";
$DB_LP->select($qry);

$qry = "update wallet set ETHN = '$ETH', OKNAN = '$OKNA', USDTN = '$USDT' where no = '$no';";
$DB_LP->select($qry);

$qry = "select * from cywallet where no = '$no';";
$DB_LP->select($qry);
$row3 = $DB_LP->get_data();
$BTC= $BTC + $row3->BTC;
$ETH = $ETH + $row3->ETH;
$USDT= $USDT + $row3->USDT;
$USDC= $USDC + $row3->USDC;
$XRP= $XRP + $row3->XRP;
$TRX= $TRX + $row3->TRX;
$OKNA = $OKNA + $row3->OKNA;

$qry = "select * from miner where no = '$no';";
$cnt = $DB_LP->select($qry);
$row = $DB_LP->get_data();
$mine_okna = $row->okna;
$s_point = $row->s_point;
$b_point = $row->b_point;
$l_point = $row->c_point;

$OKNA2 = $OKNA + $b_point + $c_point + $l_point - $mine_okna;

$total_usd = $OKNA2 * $OKNAP + $ETH * $ethPrice + $USDT * $usdtErcPrice + $BTC * $btcPrice + $TRX * $trxPrice;

$DB_LP->close();
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
								<strong><?php echo number_format($BTC, 4);?>BTC</strong>
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
								<strong><?php echo number_format($USDT,4);?> USDT</strong>
								<p>=<?php echo number_format($USDT * $usdtErcPrice, 4);?> USD</p>
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
								<strong><?php echo number_format($USDT,4);?> USDT</strong>
								<p>=<?php echo number_format($USDT * $usdtTrcPrice, 4);?> USD</p>
							</div>
						</a>
					</li>
					<li>
						<a href="/my_wallet_view.php?coin=USDT-BEP">
							<div class="coin">
								<span><img src="img/common/usdt.svg"></span>
								<strong>USDT (BEP-20)</strong>
							</div>
							<div class="val">
								<strong><?php echo number_format($USDT,4);?> USDT</strong>
								<p>=<?php echo number_format($USDT * $usdtBepPrice, 4);?> USD</p>
							</div>
						</a>
					</li>
					<!-- 필요에 따라 다른 코인 추가 -->
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
include(G5_PATH."/tail.php");	
?>
