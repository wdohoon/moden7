<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$q = isset($_GET['q']) ? clean_xss_tags($_GET['q'], 1, 1) : '';

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');

add_javascript('<script src="'.G5_JS_URL.'/owlcarousel/owl.carousel.min.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/owlcarousel/owl.carousel.css">', 0);
?>


<?php 
$shopcate = sql_query("select * from g5_shop_category where length(ca_id)=2 order by ca_id asc");
$shopcatesoo = sql_num_rows($shopcate);
?>


<header>
		<div class="left">
			<a href="javascript:history.back();" class="prev"></a>
		</div>
		<h2 class="shop"><span>COUPON</span> MALL</h2>
		<div class="right">
			<button class="myorder_go"><img src="/img/shop/ico_tik.svg"></button>
			<button class="btn-m"><img src="/img/shop/ico_m.svg"></button>
		</div>
	</header>
	<div class="m-gnb">
		<nav>
		<ul>
			<li>
				<a href="/shop/items.php" class="btn-dep1">전체보기</a>
			</li>
			<li>
				<a href="/shop/items.php?type=hot" class="btn-dep1">인기상품</a>
			</li>
			<li>
				<a href="/shop/items.php?type=new" class="btn-dep1">새 상품</a>
			</li>
			
			<?php if($shopcatesoo>0){
				for($i=0;$row=sql_fetch_array($shopcate);$i++){
					$rr="";
					$rrn="";
					$rr = sql_query("select * from g5_shop_category where ca_id<>'".$row['ca_id']."' and ca_id like '".$row['ca_id']."%' and length(ca_id)=4
					order by ca_id asc");
					$rrn = sql_num_rows($rr);
			?>
			<li>
				<a href="javascript:;" class="btn-dep1 flip"><?php echo $row['ca_name'];?></a>
				<div class="dep2">
					<?php if($rrn>0){?>
					<ul>
						<?php for($k=0;$row=sql_fetch_array($rr);$k++){?>
						<li><a href="/shop/items.php?ca_name=<?php echo $row['ca_id'];?>" class="btn-dep2"><?php echo $row['ca_name'];?></a></li>
						
						<?php }?>	
					</ul>
					<?php }?>	

				</div>
			</li>
			<?php }}?>		
		</ul>
		</nav>
		<div class="etc">
			<a href="/agree1.php">이용약관</a>
			<a href="/agree2.php">개인정보 처리방침</a>
			<a href="/csc.php">고객센터</a>
		</div>
	</div>
	<div class="bg-m"></div>
	<div class="shop-search">
		<input type="text" class="inp-srch" placeholder="원하시는 아이템을 찾아보세요">
		<a href="/shop/shop_search.php">링크</a>
	</div>

