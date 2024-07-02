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



$hotproduct=sql_query("select * from g5_shop_item where it_type4='1' order by it_order asc limit 0,6");
$newproduct=sql_query("select * from g5_shop_item where it_type3='1' order by it_order asc limit 0,6");


$hotnum = sql_num_rows($hotproduct);
$newnum = sql_num_rows($newproduct);

?>




<?php 
$bannerimg= sql_query("select * from g5_write_banner2 order by wr_id asc");

$bannersql = sql_num_rows($bannerimg);
?>

<div class="shop-banner">
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php if($bannersql>0){
				for($i=0;$row=sql_fetch_array($bannerimg);$i++){
					$imgsrc="";
					$imgsrc = sql_fetch("select bf_file from g5_board_file where bo_table='banner2' and  wr_id='".$row['wr_id']."' and bf_no='0'");
					
					
					

			?>
			<div class="swiper-slide">
				<a href="<?php echo $row['wr_link1']?>">
					<img src="/data/file/banner2/<?php echo $imgsrc['bf_file']?>">
				</a>
			</div>
			<?php }}?>	

		</div>
	</div>
	<div class="swiper-pagination"></div>
</div>


	
	<div class="prd-list">
		<div class="head">
			<h2>인기상품</h2>
			<a href="/shop/items.php?type=hot" class="btn-more">더보기 &gt;</a>
		</div>
		<?php if($hotnum>0){?>
		
		<ul>
			<?php for($i=0;$row=sql_fetch_array($hotproduct);$i++){?>
			<li>
				<?php if($row['it_soldout']!=='0'){?>
				<a href="#">
				<?php }else{?>
				<a href="/shop/shop_view.php?it_id=<?php echo $row['it_id']?>">
				<?php }?>
					<div class="img"><p><img src="/data/item/<?php echo $row['it_img1']?>" alt="이미지"></p>
					<?php if($row['it_soldout']!=='0'){?>
					<div class="soldout">품절</div>
					<?php }?>
					</div>
					<div class="subj"><?php echo $row['it_name']?></div>
					<div class="price"><?php echo $row['it_price']?> OKNA</div>
				</a>
			</li>
			<?php }?>
		</ul>
		
		<?php }?>
	</div>
	
	<hr class="hr">
	
	<div class="prd-list">
		<div class="head">
			<h2>새상품</h2>
			<a href="/shop/items.php?type=new" class="btn-more">더보기 &gt;</a>
		</div>
		<?php if($newnum>0){?>
		<ul>
			<?php for($i=0;$row=sql_fetch_array($newproduct);$i++){?>
			<li>
				<?php if($row['it_soldout']!=='0'){?>
				<a href="#">
				<?php }else{?>
				<a href="/shop/shop_view.php?it_id=<?php echo $row['it_id']?>">
				<?php }?>
					<div class="img"><p><img src="/data/item/<?php echo $row['it_img1']?>" alt="이미지"></p>
					<?php if($row['it_soldout']!=='0'){?>
					<div class="soldout">품절</div>
					<?php }?>
					</div>
					<div class="subj"><?php echo $row['it_name']?></div>
					<div class="price"><?php echo $row['it_price']?> OKNA</div>
				</a>
			</li>
			<?php }?>
		</ul>
		<?php }?>
	</div>





<script>
// 배너 슬라이더
var swiper = new Swiper(".shop-banner .swiper-container", {
	autoplay: {
		delay: 3000,
		disableOnInteraction: false,
		},
	pagination: {
	el: ".shop-banner  .swiper-pagination",
		clickable: true,
	}
});
</script>




<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');