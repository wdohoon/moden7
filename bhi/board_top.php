<?php
include_once('./_common.php');
?>
<!-- 메인페이지_프로그램_관리자전용 -->
<?php if($bo_table == 'notice') { 
$title = '공지사항';
include_once('./_head.php');
?>

<div class="tabs">
	<a href="<?php echo get_pretty_url('notice');?>" class="active">공지사항</a>
	<a href="<?php echo get_pretty_url('event');?>">이벤트</a>
</div>
<hr class="hr">
<?php
}
?>

<?php if($bo_table == 'event') { 
$title = '이벤트';
include_once('./_head.php');
?>

<div class="tabs">
	<a href="<?php echo get_pretty_url('notice');?>">공지사항</a>
	<a href="<?php echo get_pretty_url('event');?>" class="active">이벤트</a>
</div>
<hr class="hr">
<?php
}
?>

<?php if($bo_table == 'business') { 
$title = '경륜';
include_once('./_head.php');
?>

<div class="tabs">
	<a href="<?php echo get_pretty_url('business');?>" class="active">사업</a>
	<a href="<?php echo get_pretty_url('duty');?>">사역</a>
</div>
<hr class="hr">
<?php
}
?>

<?php if($bo_table == 'duty') {
$title = '경륜';
include_once('./_head.php');
?>
<div class="tabs">
	<a href="<?php echo get_pretty_url('business');?>">사업</a>
	<a href="<?php echo get_pretty_url('duty');?>" class="active">사역</a>
</div>
<hr class="hr">
<?php
}
?>

<?php if($bo_table == 'inquiry') {
include_once('./_head.php');
?>
<?php
}
?>

<?php if($bo_table == 'kyc') {
$title = 'KYC 인증';
include_once('./_head.php');
?>
<hr class="hr">
<?php
}
?>

<?php if($bo_table == 'mission') {
$title = '미션펀딩';
include_once('./head.sub.php');
?>	
<?php if(strpos($_SERVER['REQUEST_URI'], 'board.php') !== false) {?>
<style>
.header-fixed {height: 77px;}
</style>
<div class="header-fixed">
	<header>
		<div class="left">
			<a href="javascript:history.back();" class="prev"></a>
		</div>
		<h2 class="shop"><span>MISSION FUNDING</span></h2>
		<div class="right">
			<button><img src="/img/funding/ico_srch.svg"></button>
			<button class="btn-m"><a href="<?php echo G5_URL?>/mymission.php"><img src="/img/funding/ico_my.svg"></a></button>
		</div>
	</header>
	<?php if(!$wr_id) {?>
	<div class="tabs2">
		<a href="#" class="active">전체</a>
		<a href="#">인기글</a>
		<a href="#">펀딩공지</a>
		<div class="right">
			<a href="<?php echo short_url_clean(G5_BBS_URL.'/write.php?bo_table='.$bo_table); ?>">글쓰기</a>
		</div>
	</div>
	<?php }?>
</div>
<?php } else { ?>

<header>
	<div class="left">
		<a href="javascript:history.back();" class="close"></a>
	</div>
	<h2>글쓰기</h2>
</header>

<?php }?>



<?php
}
?>