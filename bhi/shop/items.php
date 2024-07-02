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
	
<?php
if($_GET['type']){
	include(G5_SHOP_PATH."/include/items_type.php");	
}else if($_GET['ca_name']){
	include(G5_SHOP_PATH."/include/items_ca.php");
}else{
	include(G5_SHOP_PATH."/include/items_all.php");
}
?>








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
include_once(G5_SHOP_PATH.'/shop.tail.php');?>