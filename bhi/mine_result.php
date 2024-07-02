<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');


include_once	"./lib/db.class.php";

$coin = $_GET['coin'];
$amount = $_GET['amount'];


if ( $coin == 'BHI' )
	$coin = 'OKNA';

$DB_LP = new DBCLASS;

$qry = "select * from coinprice;";
$DB_LP->select($qry);

$row = $DB_LP->get_data();
$ETHP = $row->ETH;
$USDTP = 1.02;
$OKNAP = $row->OKNA;

$no = $member['mb_no'];

$qry = "select * from wallet where no = '$no';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$ethaddr = $row->ETH;

require_once './vendor/autoload.php';
use BlockSDK;

//$blockSDK = new BlockSDK("iHPg89hfHnJXG7noHiddBpMqHZvh2Lp6NjvTT49h");
$blockSDK = new BlockSDK("Iy5ZL1qnTEKX2OCITNMlBI2USFrMJC8SoJdEd8X2");
$ethClient = $blockSDK->createEthereum();


$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0x32EaEbAA73a6554588157d7d9d96A51813CbA64D",
    "from" => $ethaddr
]);

$OKNA = $erc20['payload']['balance'];




$qry = "select * from miner where no = '$no';";
$cnt = $DB_LP->select($qry);
$row = $DB_LP->get_data();
$mine_okna = $row->okna;
$s_point = $row->s_point;
$b_point = $row->b_point;
$l_point = $row->c_point;

$OKNA2 = $OKNA + $b_point + $c_point + $l_point - $mine_okna;



$err = 0;
if ( $OKNA2 < $amount )
{
	$err = 1; // 수량 부족
}
else
{
	$OKNA = $OKNA2;
	$rdate = date('Y-m-d H:i:s');
	$qry = "select * from miner where no = '$no';";
	$cnt = $DB_LP->select($qry);
	$row = $DB_LP->get_data();
	$s_okna = $row->okna;
	$t_okna = $s_okna + $amount;

/*	if ( $OKNA - $s_okna  < $amount  )
	{
		$err = 1;
	}
	else  */
	{

		if ( $cnt == 0 )
		{
			$qry = "INSERT INTO miner VALUES ( '$no', '$rdate', '$t_okna', '0', '0', '0', '$t_okna', '0', '0', '0', '0', '1');";
			$cnt = $DB_LP->select($qry);
		}
		else
		{
			$qry = "UPDATE miner SET okna = '$t_okna', stake = '$t_okna' where no = '$no';";
			$cnt = $DB_LP->select($qry);

			echo $qry;
		}

		$qry = "INSERT INTO miner_log VALUES ( '0', '$no', '$rdate', '$coin', '$amount', '1','0');";
		$cnt = $DB_LP->select($qry);

		echo $qry;
	}
}


$DB_LP->close();

if ($err == 1 )
{
	header( 'Location: https://bhidex.com/mining_add.php?coin=OKNA&ret=2' );
}
else
{
	header( 'Location: https://bhidex.com/mining.php?coin=OKNA&ret=1' );
}







?>