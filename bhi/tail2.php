<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/tail.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/tail.php');
    return;
}
?>

<script>
		
	
</script>

<!-- 하단 시작 { -->
<div class="navgation">
	<nav>
		<a href="/" class="m1">홈</a>
		<a href="/coinswap.php" class="m2">코인스왑</a>
		<a href="/my_wallet.php" class="m3">내 지갑</a>
		<a href="/mi_screen.php" class="m4">스테이킹</a>
		<a href="/setting.php" class="m5">설정</a>
	</nav>
</div>
<!-- } 하단 끝 -->

<script>
$('#modalPin').modal();
		
	$('.box1 .select').change(function(){
		$('#Kind').text($(this).val());
		$('#Kind').addClass('active');
	});

$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>




<?php
include_once(G5_PATH."/tail.sub.php");