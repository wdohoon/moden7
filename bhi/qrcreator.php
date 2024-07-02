<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');


if(!$member['mb_id']){
	alert("로그인후 접근 가능합니다","/");
}







include_once "./phpqrcode/qrlib.php";
include_once	"./lib/db.class.php";

$linkurl  = "http://oknawallet.io/bbs/register_form.php?ref=".$member['mb_9'];

$DB_LP = new DBCLASS;


$filePath = "./qr/".$member['mb_9'].".png";

if(!file_exists($filePath)) 
{
	QRcode::png($linkurl, $filePath);
} 


$DB_LP->close();

goto_url("/");
?>
