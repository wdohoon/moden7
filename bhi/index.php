<?php
include_once "./phpqrcode/qrlib.php";
include_once "./lib/db.class.php";
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

include_once(G5_PATH.'/head.php');

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
}*/

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
} 

// ERC-20 잔액 확인
$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0xdAC17F958D2ee523a2206206994597C13D831ec7",
    "from" => $ethAddr
]);
if ($erc20['state']['success']) {
    $USDT_ERC = $erc20['payload']['balance'];
} 

// Get TRON balance
$TRX = getTronBalance($trxAddr);

// TRC-20 잔액 확인
$USDT_TRC = getTrc20Balance($trxAddr, 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t'); // 여기에 TRC-20 USDT 컨트랙트 주소를 입력하세요

// BEP-20 잔액 확인
//$USDT_BEP = getBep20Balance($bscAddr, '0x55d398326f99059ff775485246999027b3197955'); // 여기에 BEP-20 USDT 컨트랙트 주소를 입력하세요

// Get Bitcoin balance
$BTC = getBitcoinBalance($btcAddr);



//$total_usd = ($ETH * $ethPrice) + ($USDT_ERC * $usdtErcPrice) + ($USDT_BEP * $usdtBepPrice) + ($TRX * $trxPrice) + ($USDT_TRC * $usdtTrcPrice) + ($BTC * $btcPrice);   /// 이부분 다시 처리해야함. 

// 값이 있는지 없는지 확인하고 있으면 값을 처리하고 () 괄호 넣고 뭔가 이상함.

//echo $total_usd ;   // 이값이 0 이나옴. 여기에 나오는계산식에서 변수에 값이 있는지 없는지 if로 만들고 값이 있을때만 계산되도록 해야함.


//$qry = "UPDATE g5_member SET mb_point = '$total_usd' WHERE mb_no = '$no';";
//$DB_LP->select($qry);

// 그래서 로그인하면 무조건 0 이 나옴.




?>
<style>
.main{background-color: #090909;}
.main .section1 {background: url('/img/index_bg1.png') no-repeat center center;text-align: center;color:#fff;}
.main .section1 .section1_tit h1{font-size: 40px;font-weight: 600;line-height: 52px;letter-spacing: -0.025em;text-align: center;color:#fff;padding: 143px 0 10px;}
.main .section1 .section1_tit p{font-size: 24px;font-weight: 400;line-height: 34px;letter-spacing: -0.025em;text-align: center;padding-bottom:114px;}
.main .section1 .section1_menu ul{display: flex;justify-content: center;align-items: center;gap:6vw;border-bottom: 1px solid #FFFFFF80;padding-bottom:16px;width: 67vw;margin:0 auto;flex-wrap:wrap;}
.main .section1 .section1_menu ul li{font-size: 18px;font-weight: 600;line-height: 26px;letter-spacing: -0.025em;text-align: center;cursor: pointer;}
.main .section1 .section1_graph{background:#fff; width: 57vw;margin:0 auto;padding: 1vw 1vw 2vw;border-radius:10px;margin-top:20px;}
.main .section1 .section1_graph .pay{color:#000;padding:22px 0;text-align:left;}
.main .section1 .section1_graph .pay .ps{display: flex;gap:1vw;}
.main .section1 .section1_graph .pay .ps p{width: 50%;height: 4vw;margin-top:8px;background: #E9E9E9;padding:13px;display: flex;align-items:center;justify-content:space-between;color:#767676;}

.section2{background: url('/img/section2_bg.png') no-repeat center center;text-align: center;}
.section2 .section2_tit h1{color:#fff;font-size: 40px;font-weight: 600;line-height: 52px;letter-spacing: -0.025em;text-align: center;padding-top:182px;}
.section2 .section2_tit p{color:#fff;font-size: 24px;font-weight: 400;line-height: 34px;letter-spacing: -0.025em;text-align: center;padding: 10px 0 60px;}
.section2 .boxs{display:flex;flex-wrap:wrap;width: 900px;gap:20px;margin:0 auto;padding-bottom:160px;}
.section2 .boxs .box{background:#fff;width: 413px;height: 250px;border-radius:16px;padding:34px;}
.section2 .boxs .box h4{font-size: 24px;font-weight: 600;line-height: 34px;text-align: center;margin:10px;}
.section2 .boxs .box p{font-size: 16px;font-weight: 400;line-height: 24px;letter-spacing: -0.025em;text-align: center;}

.section3{background: url('/img/section3_bg.png') no-repeat center center;text-align: center;}
.section3 .section3_info{padding:10vw 0 9vw;}
.section3 h1{color:#fff;font-size: 40px;font-weight: 600;line-height: 56px;letter-spacing: -0.025em;text-align: center;padding-bottom:46px;}
.section3 a{padding: 10px 30px;background: #DB8D14;color:#fff;font-size: 20px;font-weight: 600;line-height: 56px;text-align: center;border-radius:25px;}

.section4{background: url('/img/section4_bg.png') no-repeat center center;text-align: center;}
.section4 h1{font-size: 40px;font-weight: 600;line-height: 52px;letter-spacing: -0.025em;text-align: center;color:#fff;padding:13vw 0 5vw;}
.section4 .boxs{display: flex;gap:20px;justify-content:center;padding-bottom:110px;flex-wrap:wrap;}
.section4 .boxs .box{background: #FFF;width: 400px;height: 460px;border-radius: 16px;padding: 100px 0;}
.section4 .boxs .box h4{padding:24px;font-size: 24px;font-weight: 600;line-height: 34px;letter-spacing: -0.025em;text-align: center;}
.section4 .boxs .box p{font-size: 16px;font-weight: 400;line-height: 24px;letter-spacing: -0.025em;text-align: center;}
.section4 .boxs .box .inq{margin-top:5%;}
.section4 .boxs .box a{font-size: 16px;font-weight: 600;line-height: 34px;letter-spacing: -0.025em;text-align: center;}

@media screen and (max-width: 1400px) {
    .main .section1 .section1_graph{width: 90%;}
}
@media screen and (max-width: 1260px){
    .section4{background: url('/img/section4_mo1.png') no-repeat center center;text-align: center;}
}
@media screen and (max-width: 1200px){
    .main .section1 .section1_graph .pay .ps p{height: 6vw;}
    .section2 .boxs{width: auto;display: flex;justify-content: center;}
    .section2 .boxs .box{width: 34vw;}
}
@media screen and (max-width: 865px){
    .section2 .boxs .box{width: 90%;}
}
@media (max-width: 768px) {
	.main .section1 .section1_graph .pay .ps p{height: 8vw;}
	.main {  background: #f4f4f4;  background-color: #090909;}
	.section1_tit {margin: 0 1.5rem;}
	.main .section1 .section1_tit h1 {  font-size: 1.5rem;  font-weight: 600;  line-height: 2.5rem;  letter-spacing: -0.025em;  text-align: center;  color: #fff;  padding: 4.5rem 0 1.5rem;}
	.main .section1 .section1_tit p {  font-size: 1rem; font-weight: 400; line-height: 1.5rem;letter-spacing: -0.025em;text-align: center;padding-bottom: 3rem;}
	
	.section2_tit {margin: 0 1.5rem;}

	.section2 .section2_tit h1 {
		color: #fff;
		font-size: 1.5rem;
		font-weight: 600;
		line-height: 2.5rem;
		letter-spacing: -0.025em;
		text-align: center;
		padding-top: 4.5rem;
	}

	.section2 .section2_tit p {
		color: #fff;
		font-size: 1rem;
		font-weight: 400;
		line-height: 34px;
		letter-spacing: -0.025em;
		text-align: center;
		padding: 1.5rem 0 3rem;
	}

	.section2 .boxs {
	   padding-bottom: 6rem;
	}
	
	.section3 .section3_info {
		padding: 25vw 0 25vw;
	}

	.section3 h1 {
		color: #fff;
		font-size: 1.5rem;
		font-weight: 600;
		line-height: 2.5rem;
		letter-spacing: -0.025em;
		text-align: center;
		padding-bottom: 2.5rem;
	}

	.section3 a {
		padding: 10px 30px;
		background: #DB8D14;
		color: #fff;
		font-size: 1.25rem;
		font-weight: 600;
		line-height: 2.5rem;
		text-align: center;
		border-radius: 1.5rem;
	}

	.section4 h1 {
		font-size: 1.5rem;
		font-weight: 600;
		line-height: 2.5rem;
		letter-spacing: -0.025em;
		text-align: center;
		color: #fff;
		padding: 4.5rem 0 4.5rem;
	}
	.section4 .boxs {
		display: flex;
		gap: 20px;
		justify-content: center;
		padding-bottom: 6rem;
		flex-wrap: wrap;
	}
}
@media screen and (max-width: 480px){
    .main .section1 .section1_graph .pay .ps p{height: 12vw;}
    .section4 .boxs .box{width:90%;}
}

</style>
<div class="main">
    <section class="section1">
        <div class="section1_tit">
            <h1>글로벌 게임 유저를 위한 신뢰되는 암호화폐 P2P 거래소 플랫폼</h1>
            <p>BHI 거래소는 완전히 무료로 사용이 가능한 멀티 지갑을 지원 합니다.</p>
        </div>
        <div class="section1_menu">
            <ul>
                <li data-coin="BTCUSD" data-name="Bitcoin" data-image="/img/index_bit.png">Bitcoin</li>
                <li data-coin="ETHUSD" data-name="Ethereum" data-image="/img/index_eth.png">Ethereum</li>
                <li data-coin="TRXUSD" data-name="TRX" data-image="/img/index_trx.png">TRX</li>
                <!-- <li data-coin="XRPUSD" data-name="XRP" data-image="/img/index_xrp.png">XRP</li> -->
                <li data-coin="USDTUSD" data-name="USDT (ERC-20)" data-image="/img/index_usdt.png">USDT (ERC-20)</li>
                <li data-coin="USDTTUSD" data-name="USDT (TRC-20)" data-image="/img/index_usdt.png">USDT (TRC-20)</li>
                <!-- <li data-coin="USDTBUSD" data-name="USDT (BEP-20)" data-image="/img/index_usdt.png">USDT (BEP-20)</li> -->
            </ul>
        </div>
        <div class="section1_graph">
            <!-- TradingView Widget BEGIN -->
            <div id="tradingview_widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">

            function loadTradingViewWidget(symbol) {
                new TradingView.widget({
                    "container_id": "tradingview_widget",
                    "width": "100%",
                    "height": "400",
                    "symbol": symbol,
                    "interval": "D",
                    "timezone": "Etc/UTC",
                    "theme": "dark",
                    "style": "1",
                    "locale": "kr",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "allow_symbol_change": true,
                    "details": true,
                    "hotlist": true,
                    "calendar": true,
                    "studies": [
                        "RSI@tv-basicstudies"
                    ],
                    "hide_side_toolbar": false,
                    "show_popup_button": true,
                    "popup_width": "1000",
                    "popup_height": "650"
                });
            }

            function updateCoinInfo(name, image) {
                document.getElementById('coin_name').innerText = name + " 잔액(0.00$)";
                document.getElementById('coin_image').src = image;
            }

            document.addEventListener("DOMContentLoaded", function() {
                // Load initial widget with default coin (Bitcoin)
                loadTradingViewWidget("BTCUSD");
                updateCoinInfo("Bitcoin", "/img/index_bit.png");

                // Add click event listeners to menu items
                document.querySelectorAll('.section1_menu ul li').forEach(function(item) {
                    item.addEventListener('click', function() {
                        var coin = this.getAttribute('data-coin');
                        var name = this.getAttribute('data-name');
                        var image = this.getAttribute('data-image');
                        loadTradingViewWidget(coin);
                        updateCoinInfo(name, image);
                    });
                });
            });
            </script>
<script type="text/javascript">
function updateCoinInfo(name, image, balance, usdValue) {
    document.getElementById('coin_name').innerText = name + " 잔액(" + usdValue.toFixed(2) + "$)";
    document.getElementById('coin_image').src = image;
    document.getElementById('coin_balance').innerText = balance.toFixed(4);
    document.getElementById('coin_usd').innerText = usdValue.toFixed(4);
}

document.addEventListener("DOMContentLoaded", function() {
    // 코인 잔액과 가격 데이터
    var coinData = {
        'BTCUSD': {
            balance: <?php echo $BTC; ?>,
            usdValue: <?php echo $BTC * $btcPrice; ?>
        },
        'ETHUSD': {
            balance: <?php echo $ETH; ?>,
            usdValue: <?php echo $ETH * $ethPrice; ?>
        },
        'TRXUSD': {
            balance: <?php echo $TRX; ?>,
            usdValue: <?php echo $TRX * $trxPrice; ?>
        },
        'USDTUSD': {
            balance: <?php echo $USDT_ERC; ?>,
            usdValue: <?php echo $USDT_ERC * $usdtErcPrice; ?>
        },
        'USDTTUSD': {
            balance: <?php echo $USDT_TRC; ?>,
            usdValue: <?php echo $USDT_TRC * $usdtTrcPrice; ?>
        },
       /* 'USDTBUSD': {
            balance: <?php echo $USDT_BEP; ?>,
            usdValue: <?php echo $USDT_BEP * $usdtBepPrice; ?>
        }*/
    };

    // 초기 로드 시 Bitcoin 잔액 표시
    updateCoinInfo("Bitcoin", "/img/index_bit.png", coinData['BTCUSD'].balance, coinData['BTCUSD'].usdValue);

    // Add click event listeners to menu items
    document.querySelectorAll('.section1_menu ul li').forEach(function(item) {
        item.addEventListener('click', function() {
            var coin = this.getAttribute('data-coin');
            var name = this.getAttribute('data-name');
            var image = this.getAttribute('data-image');
            var balance = coinData[coin].balance;
            var usdValue = coinData[coin].usdValue;

            loadTradingViewWidget(coin);
            updateCoinInfo(name, image, balance, usdValue);
        });
    });
});
</script>

            <!-- TradingView Widget END -->
			<div class="pay">
				<p id="coin_name">Bitcoin 잔액(0.00$)</p>
				<div class="ps">
					<p><img id="coin_image" src="/img/index_bit.png" alt=""> <span id="coin_balance">0.0000</span></p>
					<p><img src="/img/index_d.png" alt=""> <span id="coin_usd">0.0000 USD</span> </p>
				</div>
			</div>

        </div>
    </section>

    <section class="section2">
        <div class="section2_tit">
            <h1>글로벌 게임 유저를 위한 플랫폼 <br> 간편하고 안전하게 암호화폐를 거래, 송금, 환전, 보관하세요</h1>
            <p>BHI 멀티 지갑 무료 서비스</p>
        </div>
        <div class="boxs">
            <div class="box">
                <img src="/img/section2_1.png" alt="">
                <h4>사기 방지</h4>
                <p>BHI 멀티 지갑의 보안시스템</p>
                <p>사고를 예방하는데 도움이 됩니다.</p>
            </div>
            <div class="box">
                <img src="/img/section2_2.png" alt="">
                <h4>보안</h4>
                <p>우리팀은 사용자가 사기를 식별하고</p>
                <p>피할 수 있도록 돕습니다.</p>
            </div>
            <div class="box">
                <img src="/img/section2_3.png" alt="">
                <h4>수수료 0%</h4>
                <p>수수료가 전혀 없는 효율적인</p>
                <p>블록체인 지갑을 통한 거래</p>
            </div>
            <div class="box">
                <img src="/img/section2_4.png" alt="">
                <h4>실시간 반영</h4>
                <p>거래 후 즉시 적용되는 피드백으로</p>
                <p>신용도 관리</p>
            </div>
        </div>
    </section>

	<section class="section3">
		<div class="section3_info">
			<h1>코인을 이용한 완전한 자유로움 <br> 저희와 함께 하시면 보안 시스템, 결제성, 편의성의 <br> 모든 혜택을 누릴 수 있습니다.</h1>
			<a href="#" id="create_wallet_button">지갑 생성하기</a>
		</div>
	</section>

	<section class="section4">
		<h1>결제 수단을 선택해 주세요 <br> 그리고 암호화폐를 필요한 곳으로 편리하게 이체하세요</h1>
		<div class="boxs">
			<div class="box">
				<img src="/img/section4_1.png" alt="">
				<h4>계좌 이체</h4>
				<p>계좌 이체를 통해 <br> 가장 빠르게 코인을 구매하세요.</p>
				<div class="inq">
					<a href="/bbs/write.php?bo_table=transfer&type=계좌이체">문의하기</a>
				</div>
			</div>  
			<div class="box">
				<img src="/img/section4_2.png" alt="">
				<h4>가상 자산 이체</h4>
				<p>다른 암호화폐는 비트코인, 이더리움, USDT를 통해 <br> 획득할 수 있습니다.</p>
				<div class="inq">
					<a href="/bbs/write.php?bo_table=transfer&type=가상자산이체">문의하기</a>
				</div>
			</div>  
			<div class="box">
				<img src="/img/section4_3.png" alt="">
				<h4>기타 이체</h4>
				<p>실물 화폐로 <br> 계정을 결제할 수 있습니다.</p>
				<div class="inq">
					<a href="/bbs/write.php?bo_table=transfer&type=기타이체">문의하기</a>
				</div>
			</div>  
		</div>
	</section>
<script>
document.getElementById('create_wallet_button').addEventListener('click', function(event) {
    event.preventDefault(); // 기본 동작을 막습니다.

    // PHP 변수로부터 로그인 상태를 가져옵니다.
    var isLoggedIn = <?php echo json_encode(isset($member['mb_id']) && $member['mb_id'] !== ''); ?>;

    if (isLoggedIn) {
        window.location.href = "/my_wallet.php"; // 로그인된 사용자의 지갑 페이지 URL로 리다이렉트
    } else {
        window.location.href = "/bbs/register.php"; // 비로그인 사용자의 회원가입 페이지 URL로 리다이렉트
    }
});
</script>

</div>
<?php
include_once(G5_PATH.'/tail.php');
?>
