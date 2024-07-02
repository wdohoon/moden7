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
<style>
.header-fixed {height: 77px;}
</style>
<?
$pathchw = trim($_SERVER['REQUEST_URI']);
//echo 'path:'.$path;
if (strpos($pathchw,"/mission_search.php") !== false){ 
$pun_title = "no";

} 
if (strpos($pathchw,"/mission_give.php") !== false){ 
$pun_title = "no";
}
if (strpos($pathchw,"/mission_pun.php") !== false){ 
$pun_title = "no";
}

if($pun_title=="no"){
?>
<style>
.header-fixed {height: 45px;}
</style>
<?php	
}
?>

<div class="header-fixed">
	<header>
		<div class="left">
			<a href="javascript:history.back();" class="prev"></a>
		</div>
		<h2 class="shop"><span>MISSION FUNDING</span></h2>
		<div class="right">
			<button><a href="<?php echo G5_URL?>/mission_search.php"><img src="/img/funding/ico_srch.svg"></a></button>
			<button class=""><a href="<?php echo G5_URL?>/mymission.php"><img src="/img/funding/ico_my.svg"></a></button>
		</div>
	</header>
	<?php if(!$wr_id && !$pun_title) {
		
	?>
	<div class="tabs2">
		<a href="/bbs/board.php?bo_table=mission" class="<?php if($_GET['bo_table']=="mission" && !$_GET['hot']){echo "active";}?>">전체</a>
		<a href="/bbs/board.php?bo_table=mission&hot=Y" class="<?php if($_GET['bo_table']=="mission" && $_GET['hot']){echo "active";}?>">인기글</a>
		<a href="/bbs/board.php?bo_table=mission_notice" class="<?php if($_GET['bo_table']=="mission_notice"){echo "active";}?>">펀딩공지</a>
		<?php if($is_admin){?>
		<div class="right">
			<a href="<?php echo short_url_clean(G5_BBS_URL.'/write.php?bo_table='.$bo_table); ?>">글쓰기</a>
		</div>
		<?php }?>
	</div>
	<?php }?>
</div>


