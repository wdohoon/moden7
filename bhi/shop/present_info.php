<?php
include_once('./_common.php');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/index.php');
    return;
}

define("_INDEX_", TRUE);

include_once(G5_PATH.'/head.sub.php');


$this_item = sql_fetch("select * from g5_shop_item where it_id='".$_GET['it_id']."'");

?>



<header>
	<h2>선물하기</h2>
	<div class="right">
		<button><img src="/img/shop/ico_close.svg"></button>
	</div>
</header>
	
	<form action="/shop/present.php" method="get" class="present_form_info">
		<input type="text" name="price" value="<?php echo $_GET['price']?>">
		<input type="text" name="ea" value="<?php echo $_GET['ea']?>">
		<input type="text" name="ea_price" value="<?php echo $_GET['ea_price']?>">
		<input type="text" name="it_id" value="<?php echo $_GET['it_id']?>">
		<input type="text" name="mb_id" value="<?php echo $member['mb_id']?>">
		
		<div class="recive">
			<div class="inner">
				<div class="t1">선물 받으시는 분의 이름과 휴대폰 번호를 입력해주세요.<br>입력하시는 휴대폰 번호로 쿠폰정보가 전송됩니다.</div>
				<div class="inp-box">
					<strong>이름</strong>
					<input type="text" name="r_name" class="inp inpName" value="홍삼순">
				</div>
				<div class="inp-box">
					<strong>휴대폰</strong>
					<input type="tel" name="r_phone" class="inp inpPhone" value="01023456788">
				</div>
				<div class="description2">
					<h3>유의사항 <img src="/img/shop/ico_tip.svg"></h3>
					<div>
						<p>▶ 대한민국(+82) 휴대폰 번호로만 쿠폰 선물이 가능합니다.</p>
						<p>▶ 유의사항유의사항유의사항유의사항유의사항유의사항</p>
						<p>▶ 유의사항유의사항유의사항유의사항유의사항유의사항</p>
						<p>▶ 유의사항유의사항유의사항유의사항유의사항유의사항</p>
					</div>
				</div>
			</div>
		</div>
	</form>
	
	
	<div class="fixed-btn">
		<div class="in">
			<button>다음</button>
		</div>
	</div>



<script>
	$(".right button").click(function(){
		history.go(-1);
	})
	
	$(".in button").click(function(){
		var yname = $(".inpName").val();
		var yphone = $(".inpPhone").val();
		if(!yname || !yphone){
			alert('이름과 휴대폰번호를 입력해주세요');
			return false;
		}else{
			$(".present_form_info").submit();
		}
	})


</script>

	
<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');?>