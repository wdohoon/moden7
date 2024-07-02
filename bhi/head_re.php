<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

run_event('pre_head');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<?
$pathchw = trim($_SERVER['REQUEST_URI']);
//echo 'path:'.$path;
if (strpos($pathchw,"/mymission.php") !== false || strpos($pathchw,"/mymission_history.php") !== false){ 

$pun_title = "나의 미션펀딩";


} 


?>

<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2><?php echo $pun_title;?></h2>
</header>