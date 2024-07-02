<?php

	header( 'Location: http://bhidex.com/mining.php?coin=OKNA' );

include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');


include_once	"./lib/db.class.php";

$DB_LP = new DBCLASS;

$no = $member['mb_no'];
$name = $member['mb_name'];

$qry = "select * from miner where no = '$no';";
$DB_LP->select($qry);

$row = $DB_LP->get_data();

$stake = $row->stake;


$qry = "select * from coinprice;";
$DB_LP->select($qry);

$row = $DB_LP->get_data();
$ETHP = $row->ETH;
$USDTP = 1.02;
$OKNAP = $row->OKNA;


$qry = "select * from wallet where no = '$no';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$ethaddr = $row->ETH;


require_once './vendor/autoload.php';
use BlockSDK;

//$blockSDK = new BlockSDK("iHPg89hfHnJXG7noHiddBpMqHZvh2Lp6NjvTT49h");
$blockSDK = new BlockSDK("Iy5ZL1qnTEKX2OCITNMlBI2USFrMJC8SoJdEd8X2");
$ethClient = $blockSDK->createEthereum();

$addressBalance = $ethClient->getAddressBalance([
    "address" => $ethaddr
]);
$ETH = $addressBalance['payload']['balance'];


$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0x32EaEbAA73a6554588157d7d9d96A51813CbA64D",
    "from" => $ethaddr
]);

$OKNA = $erc20['payload']['balance'];


$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0xdAC17F958D2ee523a2206206994597C13D831ec7",
    "from" => $ethaddr
]);

$USDT = $erc20['payload']['balance'];

$qry = "update g5_member set mb_point = '$total_usd' where mb_no = '$no';";
$DB_LP->select($qry);

$qry = "update wallet set ETHN = '$ETH', OKNAN = '$OKNA', USDTN = '$USDT' where no = '$no';";
$DB_LP->select($qry);

$qry = "select * from miner where no = '$no';";
$cnt = $DB_LP->select($qry);
$row = $DB_LP->get_data();
$mine_okna = $row->okna;
$s_point = $row->s_point;
$b_point = $row->b_point;
$l_point = $row->c_point;

$OKNA2 = $OKNA + $b_point + $c_point + $l_point - $mine_okna;

$total_usd = $OKNA2 * $OKNAP + $ETHP * $ETH + $USDT * $USDTP;



$DB_LP->close();
?>
	
<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2>스테이킹</h2>
</header>
	
	
	<div class="mining">
		<div class="section">
			<div class="mine">
				<div class="my-mine"><img src="img/common/ico_user.svg"> <strong><?php echo $name; ?></strong> 님의 스테이킹 투입가능 자산</div>
				<div class="price">$ <?php echo number_format($total_usd,2);?></div>
			</div>
			
			<hr class="hr2">
			
			<div class="btns">
				<button onclick="location.href='/mining.php'" class="btn1 block btn-s ">스테이킹하기</button><!--location.href='/mining.php'-->
			</div>
			
		</div>
		
		<div class="list-btns mb50">
			<a href="/my_network.php">나의 네트워크</a>
			<a href="/my_reward.php">내 리워드 지급내역</a>
		</div>


	</div>
	
	
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>