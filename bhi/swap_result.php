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
$coin2 = $_GET['coin2'];
$amount = $_GET['amount'];


if ( $coin == 'BHI' )
	$coin = 'OKNA';

if ( $coin2 == 'BHI' )
	$coin2 = 'OKNA';


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


$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0xdAC17F958D2ee523a2206206994597C13D831ec7",
    "from" => $ethaddr
]);

$USDT = $erc20['payload']['balance'];


$qry = "select * from cywallet where no = '$no';";
$DB_LP->select($qry);

$row3 = $DB_LP->get_data();

if( $row3 )
{
	$BTC= $USDT + $row3->BTC;
	$ETH = $ETH + $row3->ETH;
	$USDT= $USDT + $row3->USDT;
	$USDC= $USDC + $row3->USDC;
	$XRP= $XRP + $row3->XRP;
	$TRX= $TRX + $row3->TRX;
	$OKNA = $OKNA + $row3->OKNA;
	
}
else
{
	$qry = "INSERT INTO cywallet VALUES ( '$no', '0','0','0','0','0','0','0');";
	$cnt = $DB_LP->select($qry);
}


$err = 3;

$s_amt = 0;


if ( $coin == 'USDT' )
{
	$s_amt = $USDT;
	$err = 0;	

}

if ( $coin == 'OKNA' )
{
	$s_amt = $OKNA;
	$err = 0;
}


if ( $coin2 == 'USDT' )
{

	$err = 0;	

}

if ( $coin2 == 'OKNA' )
{
	$err = 0;
}




if ( $err == 0 )
{


	if ( $s_amt < $amount )
	{
		$err = 1; // 수량 부족
	}
	else
	{
		{

			$rdate = date('Y-m-d H:i:s');
			
			{
				$qry = "INSERT INTO swaplog VALUES ( '$no', '$rdate', '$coin', '$coin2', '$amount');";
				$cnt = $DB_LP->select($qry);

				echo $qry;


				$qry = "UPDATE cywallet SET $coin = $coin - $amount, $coin2 = $coin2 + $amount where no = '$no';";
				$cnt = $DB_LP->select($qry);

				echo $qry;

			}
		}

	}

}

$DB_LP->close();


if ($err == 1 )
{
	header( 'Location: http://bhidex.com/coinswap.php?coin=OKNA&ret=2' );
}
else if ($err == 3 )
{
	header( 'Location: http://bhidex.com/coinswap.php?coin=OKNA&ret=3' );
}
else
{
	header( 'Location: http://bhidex.com/coinswap.php?coin=OKNA&ret=1' );
}








?>