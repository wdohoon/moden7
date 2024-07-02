<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>
        













<a href="#" class="btn-top"></a>
	
<div class="navgation">
	<nav>
		<a href="/" class="m1">홈</a>
		<a href="<?php echo get_pretty_url('business');?>" class="m2">경륜</a>
		<a href="/my_wallet.php" class="m3">내 지갑</a>
		<a href="/mi_screen.php" class="m4">채굴</a>
		<a href="/setting.php" class="m5">설정</a>
	</nav>
</div>



<script>
	$(".myorder_go").click(function(){
		location.href="/shop/my_order.php";
	})
</script>


<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<!-- } 하단 끝 -->

<?php
include_once(G5_PATH.'/tail.sub.php');