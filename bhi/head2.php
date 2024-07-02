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

<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2><?php echo $title; ?></h2>
	<div class="right" style="top:10px;">
		<!-- <?php if($is_admin) { ?><a href="/adm/" style="color:red;" target="_blank">ADMIN</a><?php } ?> -->
		<?php if($is_member) { ?>
			<a href="<?php echo G5_BBS_URL ?>/logout.php" style="color:red;">LOGOUT</a>
			<a href="<?php echo G5_URL ?>/mypage.php"><img src="/img/common/ico_sub_me.svg"></a>
			<!-- <li><a href="/mypage.php">MYPAGE</a></li> -->
		<?php } else { ?>
			
			<a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo $urlencode; ?>"><img src="/img/common/ico_sub_me.svg"></a>
			<!-- <a href="<?php echo G5_BBS_URL ?>/register.php" style="color:white;">JOIN</a> -->
		<?php } ?>
		
	</div>
</header>

<script>

</script>


