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

$ret = $_GET['ret'];
if ($ret == 200) {
    echo "<script>alert('코인 전송에 성공 하였습니다.');</script>";
} else if ($ret == 999) {
    echo "<script>alert('코인 전송에 실패 하였습니다. 잔고를 확인해 주세요.');</script>";
}

$coin = $_GET['coin'];
$coin_l = strtolower($coin);
$coin_n = $coin;
$imgt = "img/common/".$coin_l.".svg";

include_once "./lib/db.class.php";
$DB_LP = new DBCLASS;

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

$amount = 0;
$total_a = 0;
$price = 0;
$data = array();
$cnt = 0;

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
function getBep20Balance($address, $contractAddress) {
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

$btcPrice = getCoinPrice('bitcoin');
$ethPrice = getCoinPrice('ethereum');
$usdtErcPrice = getCoinPrice('tether');
$usdtTrcPrice = getCoinPrice('tether'); // 정확한 TRC-20 USDT 시세 가져오기
$usdtBepPrice = getCoinPrice('binance-usd');
$xrpPrice = getCoinPrice('ripple');
$trxPrice = getCoinPrice('tron');

$price = 0;

if ($coin == 'ETH') {
    $ethClient = $blockSDK->createEthereum();
    $addressBalance = $ethClient->getAddressBalance(["address" => $ethAddr]);
    $amount = $addressBalance['payload']['balance'];
    $price = getCoinPrice('ethereum');
    $total_a = $amount * $price;
} else if ($coin == 'USDT-ERC') {
    $ethClient = $blockSDK->createEthereum();
    $erc20 = $ethClient->getErc20Balance([
        "contract_address" => "0xdAC17F958D2ee523a2206206994597C13D831ec7",
        "from" => $ethAddr
    ]);
    $amount = $erc20['payload']['balance'];
    $price = getCoinPrice('tether');
    $total_a = $amount * $price;
} else if ($coin == 'USDT-TRC') {
    $amount = getTrc20Balance($trxAddr, "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t");
    $price = getCoinPrice('tether');
    $total_a = $amount * $price;
} else if ($coin == 'USDT-BEP') {
    $amount = getBep20Balance($bscAddr, '0x55d398326f99059ff775485246999027b3197955');
    $price = getCoinPrice('binance-usd');
    $total_a = $amount * $price;
} else if ($coin == 'BTC') {
    $amount = getBitcoinBalance($btcAddr);
    $price = getCoinPrice('bitcoin');
    $total_a = $amount * $price;
} else if ($coin == 'TRX') {
    $amount = getTronBalance($trxAddr);
    $price = getCoinPrice('tron');
    $total_a = $amount * $price;
}

$DB_LP->close();
?>

<style>
body{background: #F1F1F5;}
.my_container{width: 67vw;margin:4vw auto;background:#fff;padding:2vw;border-radius:16px;}
.header .left{display: flex;justify-content:center;align-items:center;}
.header h2{font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: center;}

.send{border: 1px solid #E5E5EC;background:#E5E5EC;width: 86px;height: 32px;border-radius: 2px;}
.send a{font-size: 12px;font-weight: 400;line-height: 18px;letter-spacing: -0.025em;text-align: center;}
.bank-head .tit{font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;padding-top:32px;}
.bank-head .tit span{font-size: 16px;font-weight: 400;line-height: 24px;letter-spacing: -0.025em;color:#999999;}
.bank-head .amount{display: flex;gap:20px;padding:12px 0 32px;border-bottom:1px solid #F1F1F5;}
.bank-head .amount .box{width: 50%;height: 60px;border-radius: 4px;background: #F1F1F5;display: flex;align-items:center;justify-content:space-between;padding:12px;}
.bank-head .amount .box p{height: 60px;display: flex;align-items:center;font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;text-align: center;color:#999999;}
.pay .head{font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;padding-top:24px;}
</style>

<div class="my_container">
    <div class="header">
        <a href="javascript:history.back();" class="prev"><img src="/img/vector.png" alt=""></a>
        <div class="left">
            <h2><?php echo $coin_n; ?></h2>
        </div>
    </div>

    <div class="graph">
        <div id="coinChart" style="width: 100%; height: 300px;"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            let symbol = "<?php echo $coin; ?>";
            if (symbol === "USDT-ERC" || symbol === "USDT-TRC" || symbol === "USDT-BEP") {
                symbol = "USDTUSD";
            } else if (symbol === "ETH") {
                symbol = "ETHUSD";
            } else if (symbol === "BTC") {
                symbol = "BTCUSD";
            }

            new TradingView.widget({
                "container_id": "coinChart",
                "width": "100%",
                "height": "300",
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
        });
        </script>

        <div class="right">
            <button class="send"><a href="/my_send.php?coin=<?php echo $coin;?>"><img src="img/up.png"> 보내기</a></button>
            <button class="send"><a href="/receive.php?coin=<?php echo $coin;?>"><img src="img/down.png"> 받기</a></button>
        </div>
    </div>

    <div class="bank-head">
        <div class="tit"><?php echo $coin_n; ?> 잔액 <span>( <?php echo number_format($price,2).' $'; ?> )</span></div>
        <div class="amount">
            <div class="box">
                <i><img src="<?php echo $imgt;?>"></i>
                <p><?php echo number_format($amount,4);?></p>
            </div>
            <div class="box">
                <i><img src="/img/index_d.png" alt=""></i>
                <p><?php echo number_format($total_a,4);?></p>
            </div>
        </div>
    </div>
    
    <div class="pay">
        <div class="head">지급내역</div>
        <div class="list">
            <ul>
                <?php
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i]['type'] == 1) {
                ?>
                        <li>
                            <div class="box blue">
                                <dl>
                                    <dt><strong>입금</strong></dt>
                                    <dd><?php echo number_format($data[$i]['amount'],4)." ".$coin;?></dd>
                                </dl>
                                <dl class="date">
                                    <dt><?php echo $data[$i]['rdate'];?></dt>
                                    <dd>= <?php echo number_format($data[$i]['value']);?> USD</dd>
                                </dl>
                                <div class="stat">
                                    <div class="tbox">
                                        <p>대상</p>
                                        <p><?php echo $data[$i]['addr'];?></p>
                                    </div>
                                    <div class="tbox">
                                        <p>상태</p>
                                        <p>입금완료 <a href="https://etherscan.io/tx/<?php echo $data[$i]['txhash'];?>" class="link" target="_blank">[TX Hash]<?php echo $data[$i]['txhash'];?></a></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                <?php
                    } else if ($data[$i]['type'] == 3) {
                ?>
                        <li>
                            <div class="box blue">
                                <dl>
                                    <dt><strong><font color='red'>스테이킹</font></strong></dt>
                                    <dd><?php echo number_format($data[$i]['amount'],4)." ".$coin;?></dd>
                                </dl>
                                <dl class="date">
                                    <dt><?php echo $data[$i]['rdate'];?></dt>
                                    <dd>= <?php echo number_format($data[$i]['value']);?> USD</dd>
                                </dl>
                                <div class="stat">
                                    <div class="tbox">
                                        <p>대상</p>
                                        <p><?php echo $data[$i]['addr'];?></p>
                                    </div>
                                    <div class="tbox">
                                        <p>상태</p>
                                        <p>스테이킹 <a href="https://etherscan.io/tx/<?php echo $data[$i]['txhash'];?>" class="link" target="_blank">[TX Hash]<?php echo $data[$i]['txhash'];?></a></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                <?php
                    } else {
                ?>
                        <li>
                            <div class="box red">
                                <dl>
                                    <dt><strong>출금</strong></dt>
                                    <dd><?php echo number_format($data[$i]['amount'],4)." ".$coin;?></dd>
                                </dl>
                                <dl class="date">
                                    <dt><?php echo $data[$i]['rdate'];?></dt>
                                    <dd>= <?php echo number_format($data[$i]['value']);?> USD</dd>
                                </dl>
                                <div class="stat">
                                    <div class="tbox">
                                        <p>대상</p>
                                        <p><?php echo $data[$i]['addr'];?></p>
                                    </div>
                                    <div class="tbox">
                                        <p>상태</p>
                                        <p>출금완료 <a href="https://etherscan.io/tx/<?php echo $data[$i]['txhash'];?>" class="link" target="_blank">[TX Hash]<?php echo $data[$i]['txhash'];?></a></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php include(G5_PATH."/tail.php"); ?>
