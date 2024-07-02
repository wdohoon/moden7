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

include_once(G5_SHOP_PATH.'/shop.head.php');


$this_item = sql_fetch("select * from g5_shop_item where it_id='".$_GET['it_id']."'");

?>


<div class="order-list">
	<div class="list-head">
		<h2>결제하기</h2>
	</div>
	<div class="payment-result">
		<div><img src="/img/shop/ico1.svg"> <?php echo $this_item['it_name'];?> <img src="/img/shop/ico2.svg"></div>
		<p><span class="red"><?php echo $_GET['ea'];?>개</span> 결제가 완료되었습니다.</p>
	</div>
	
</div>

<div class="bottom-btns">
	<div>
		<a href="/shop/" class="btn-type1">쇼핑 더 하기</a>
		<a href="/shop/my_order.php" class="btn-type2">내 구매내역</a>
	</div>
</div>



<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');?>