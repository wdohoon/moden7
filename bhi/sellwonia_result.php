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

$amount = $_POST['amount'];
$acc = $_POST['acc'];
$accn = $_POST['accn'];
$name = $_POST['name'];
$no = $member['mb_no'];

$rdate = date('Y-m-d H:i:s');


$DB_LP = new DBCLASS;


$qry = "select * from fxinfo;";

$DB_LP->select($qry);
$row = $DB_LP->get_data();

$totalPrice = $row->cashsellPrice * $amount /  2;


$qry = "INSERT INTO sell_log VALUES ( '0', '$rdate','$no','$accn','$acc','$name','$amount','$totalPrice', '0');";
$cnt = $DB_LP->select($qry);


echo $qry;
echo "<br>";

$qry = "UPDATE g5_member SET mb_13 = mb_13 - $amount where mb_no = $no;";
$cnt = $DB_LP->select($qry);


$qry = "UPDATE g5_member SET mb_13 = mb_13 - $amount where mb_no = $no;";
$cnt = $DB_LP->select($qry);

$qry = "update wallet set  OKNAN = OKNAN - $amount where no = '$no';";
$DB_LP->select($qry);

echo $qry;
echo "<br>";

$DB_LP->close();

if ($err == 1 )
{
	header( 'Location: http://bhidex.com/sellwonia.php?coin=OKNA&ret=2' );
}
else if ($err == 3 )
{
	header( 'Location: http://bhidex.com/sellwonia.php?coin=OKNA&ret=3' );
}
else
{
	header( 'Location: http://bhidex.com/sellwonia.php?coin=OKNA&ret=1' );
}


?>