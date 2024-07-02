<?php






include_once "./phpqrcode/qrlib.php";
include_once	"./lib/db.class.php";

$DB_LP = new DBCLASS;

$qry = "select * from g5_member;";
$DB_LP->select($qry);

while($row = $DB_LP->get_data())
{


	$qrfile =  $row->mb_9;

	$linkurl  = "http://oknawallet.io/bbs/register_form.php?ref=".$qrfile;
	echo $qrfile;

	$filePath = "./qr/".$qrfile.".png";

	if(!file_exists($filePath)) 
	{
		QRcode::png($linkurl, $filePath);
	} 

}

$DB_LP->close();


?>
