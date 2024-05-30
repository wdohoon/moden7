<?php
include_once('./_common.php');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/brandstory.php');
    return;
}

define("_INDEX_", TRUE);

$on = '2';

include_once(G5_SHOP_PATH.'/shop.head.php');

?>

<style>
#wrapper {background: #fff;}
#container {width:100%;max-width:1920px;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/* sub_w */
.sub_w {padding:100px 0;}
.sub_div {width:100%;margin:0 auto;max-width:1320px;margin-bottom: 70px;}
.sub_div_btn {width:100%;margin:0 auto;max-width:1320px;height:40px;position:relative;}
.brand_btn {padding:0 10px;;height:40px;line-height:40px;text-align: center;position:absolute;right:0;bottom:0;border:1px solid #0c0c0c;font-size: 16px;font-weight: 400;}

.brand_tit {font-size: 60px;font-weight: 700;margin-bottom: 50px;}

.brand_wrap {}
.brand_wrap ul {}
.brand_wrap ul:after {content:"";display:block;clear:both;}
.brand_wrap ul li {width:405px;height:540px;float:left;margin-right: 52.5px;margin-bottom: 50px;position:relative;overflow:hidden;}
.brand_wrap ul li:nth-child(3n) {margin-right:0;}
.brand_wrap ul li a::before {content:"";display:block;width:52px;height:52px;background:url('/images/more_btn.png')no-repeat center / cover;position:absolute;left:50%;top:-50%;transform:translate(-50%,-50%);z-index:5;}
.brand_wrap ul li a::after {content:"";display:block;width: 100%;height:100%;background:rgba(0,0,0,0.5);position:absolute;left:0;bottom:-100%;transition:0.4s ease;z-index:4;}
.brand_wrap ul li a:hover::after {content:"";display:block;width: 100%;height:100%;background:rgba(0,0,0,0.5);position:absolute;left:0;bottom:0;}
.brand_wrap ul li a:hover::before {position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a {display:block;}
.brand_wrap ul li .txt_div {position:absolute;top:55px;left:45px;z-index:2;}
.brand_wrap ul li .txt_div p {font-size: 24px;font-weight: 700;word-break:keep-all;}

@media (max-width: 1760px)  {
#wrapper {background: #fff;}
#container {width:100%;max-width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {padding:5.6818vw 0;}
.sub_div {width:100%;margin:0 auto;max-width:75.0000vw;margin-bottom:3.9773vw;}

.brand_tit {font-size: 3.4091vw;margin-bottom: 2.8409vw;}

.brand_wrap {}
.brand_wrap ul {}
.brand_wrap ul:after {clear:both;}
.brand_wrap ul li {width:23.0114vw;height:30.6818vw;margin-right: 2.9830vw;margin-bottom: 2.8409vw;}
.brand_wrap ul li:nth-child(3n) {margin-right:0;}
.brand_wrap ul li a::before {width:2.9545vw;height:2.9545vw;background:url('/images/more_btn.png')no-repeat center / cover;left:50%;top:-50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:-100%;transition:0.4s ease;}
.brand_wrap ul li a:hover::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:0;}
.brand_wrap ul li a:hover::before {left:50%;top:50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a {}
.brand_wrap ul li .txt_div {top:3.1250vw;left:2.5568vw;}
.brand_wrap ul li .txt_div p {font-size: 1.3636vw;}

.sub_div_btn {width:100%;margin:0 auto;max-width:75.0000vw;height:2.2727vw;}
.brand_btn {padding:0 0.5682vw;;height:2.2727vw;line-height:2.2727vw;right:0;bottom:0;border:0.0568vw solid #0c0c0c;font-size: 0.9091vw;}


}

@media (max-width: 1600px)  {
#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {padding:6.2500vw 0;}
.sub_div {width:100%;margin:0 auto;max-width:82.5000vw;margin-bottom:4.3750vw;}

.brand_tit {font-size: 3.7500vw;margin-bottom: 3.1250vw;}

.brand_wrap {}
.brand_wrap ul {}
.brand_wrap ul:after {clear:both;}
.brand_wrap ul li {width:25.3125vw;height:33.7500vw;margin-right: 3.2813vw;margin-bottom: 3.1250vw;}
.brand_wrap ul li:nth-child(3n) {margin-right:0;}
.brand_wrap ul li a::before {width:3.2500vw;height:3.2500vw;background:url('/images/more_btn.png')no-repeat center / cover;left:50%;top:-50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:-100%;transition:0.4s ease;}
.brand_wrap ul li a:hover::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:0;}
.brand_wrap ul li a:hover::before {left:50%;top:50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a {}
.brand_wrap ul li .txt_div {top:3.4375vw;left:2.8125vw;}
.brand_wrap ul li .txt_div p {font-size: 1.5000vw;}

.sub_div_btn {width:100%;margin:0 auto;max-width:82.5000vw;height:2.5000vw;}
.brand_btn {padding:0 0.6250vw;;height:2.5000vw;line-height:2.5000vw;right:0;bottom:0;border:0.0625vw solid #0c0c0c;font-size: 1.0000vw;}


}

@media (max-width: 1400px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {padding:7.1429vw 0;}
.sub_div {width:100%;margin:0 auto;max-width:94.2857vw;margin-bottom: 5.0000vw;}

.brand_tit {font-size: 4.2857vw;margin-bottom: 3.5714vw;}

.brand_wrap {}
.brand_wrap ul {}
.brand_wrap ul:after {clear:both;}
.brand_wrap ul li {width:28.9286vw;height:38.5714vw;margin-right: 3.7500vw;margin-bottom: 3.5714vw;}
.brand_wrap ul li:nth-child(3n) {margin-right:0;}
.brand_wrap ul li a::before {width:3.7143vw;height:3.7143vw;background:url('/images/more_btn.png')no-repeat center / cover;left:50%;top:-50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:-100%;transition:0.4s ease;}
.brand_wrap ul li a:hover::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:0;}
.brand_wrap ul li a:hover::before {left:50%;top:50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a {}
.brand_wrap ul li .txt_div {top:3.9286vw;left:3.2143vw;}
.brand_wrap ul li .txt_div p {font-size: 1.7143vw;}

.sub_div_btn {width:100%;margin:0 auto;max-width:94.2857vw;height:2.8571vw;}
.brand_btn {padding:0 0.7143vw;;height:2.8571vw;line-height:2.8571vw;right:0;bottom:0;border:0.0714vw solid #0c0c0c;font-size: 1.1429vw;}


}

@media (max-width: 1024px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {padding:9.7656vw 0;}
.sub_div {width:100%;margin:0 auto;max-width:100%;padding:0 3.9063vw;margin-bottom:6.8359vw;}

.brand_tit {font-size: 5.8594vw;margin-bottom: 4.8828vw;}

.brand_wrap {}
.brand_wrap ul {}
.brand_wrap ul:after {clear:both;}
.brand_wrap ul li {width:28.1250vw;height:37.5000vw;margin-right: 3.9063vw;margin-bottom: 3.9063vw;}
.brand_wrap ul li:nth-child(3n) {margin-right:0;}
.brand_wrap ul li a::before {width:5.0781vw;height:5.0781vw;background:url('/images/more_btn.png')no-repeat center / cover;left:50%;top:-50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:-100%;transition:0.4s ease;}
.brand_wrap ul li a:hover::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:0;}
.brand_wrap ul li a:hover::before {left:50%;top:50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a {}
.brand_wrap ul li .txt_div {top:5.3711vw;left:4.3945vw;}
.brand_wrap ul li .txt_div p {font-size: 2.3438vw;}

.sub_div_btn {width:100%;margin:0 auto;max-width:100%;padding:0 3.9063vw;height:3.9063vw;}
.brand_btn {padding:0 0.9766vw;;height:3.9063vw;line-height:3.9063vw;right:0;bottom:0;border:0.0977vw solid #0c0c0c;font-size: 1.5625vw;}


}

@media (max-width: 768px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {padding:13.0208vw 0;}
.sub_div {width:100%;margin:0 auto;max-width:100%;padding:0 5.2083vw;margin-bottom:7.8125vw;}

.brand_tit {font-size: 7.8125vw;margin-bottom: 6.5104vw;}

.brand_wrap {}
.brand_wrap ul {}
.brand_wrap ul:after {clear:both;}
.brand_wrap ul li {width:42.1875vw;height:56.2500vw;margin-right: 5.2083vw;margin-bottom: 5.2083vw;}
.brand_wrap ul li:nth-child(3n) {margin-right:5.2083vw;}
.brand_wrap ul li:nth-child(2n) {margin-right:0;}
.brand_wrap ul li a::before {width:6.7708vw;height:6.7708vw;background:url('/images/more_btn.png')no-repeat center / cover;left:50%;top:-50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:-100%;transition:0.4s ease;}
.brand_wrap ul li a:hover::after {width: 100%;height:100%;background:rgba(0,0,0,0.5);left:0;bottom:0;}
.brand_wrap ul li a:hover::before {left:50%;top:50%;transform:translate(-50%,-50%);}
.brand_wrap ul li a {}
.brand_wrap ul li .txt_div {top:5.2083vw;left:3.9063vw;}
.brand_wrap ul li .txt_div p {font-size: 3.1250vw;}

.sub_div_btn {width:100%;margin:0 auto;max-width:100%;padding:0 5.2083vw;height:5.2083vw;}
.brand_btn {padding:0 1.3021vw;;height:5.2083vw;line-height:5.2083vw;right:0;bottom:0;border:0.1302vw solid #0c0c0c;font-size: 2.0833vw;}

}

@media (max-width: 480px)  {


}



</style>

<div class="sub_w">
	<!-- 탑 배너 -->
	<div class="sub_div div01">
		<p class="brand_tit mont">Aesthetic</p>
		<div class="brand_wrap">
			<ul>
				<?php 
				$sql = " select * from g5_write_brand where ca_name = 'Aesthetic' order by wr_id desc";
				$result = sql_query($sql);
				$total = sql_num_rows($result);
				for($i = 0 ; $brand = sql_fetch_array($result) ; $i++) {
				$thumb_pf = get_list_thumbnail('brand', $brand['wr_id'], 405, 540, false, true, 'center', false, '80/0.5/3');
				if($thumb_pf['src']) {
					$img_content = '<div class="thumb_div"><img src="'.$thumb_pf['src'].'" alt="'.$thumb_pf['alt'].'" ></div>';
				}
				?>
					<li>
						<!-- <a href="<?php echo get_pretty_url('brand', $brand['wr_id']);?>"> -->
						<a href="<?php echo $brand['wr_link1']?>" target="_blank">
							<?php		
							$wr_cnt = sql_fetch(" select * from g5_board_file where wr_id = '{$brand['wr_id']}' and bf_no = '1' ");
							?>
							<?php
							echo $img_content;	
							?>
						</a>
						<div class="txt_div">
							<p class="mont"><?php echo $brand['wr_1']?></p>
						</div>
					</li>
				<?php }

				if($total == 0) echo '<li class="no_list">게시글이 없습니다.</li>';
				?>
			</ul>
		</div>
	</div>
	
	<div class="sub_div div01">
		<p class="brand_tit mont">Home care</p>
		<div class="brand_wrap">
			<ul>
				<?php 
				$sql = " select * from g5_write_brand where ca_name = 'Home care' order by wr_id desc";
				$result = sql_query($sql);
				$total = sql_num_rows($result);
				for($i = 0 ; $brand = sql_fetch_array($result) ; $i++) {
				$thumb_pf = get_list_thumbnail('brand', $brand['wr_id'], 405, 540, false, true, 'center', false, '80/0.5/3');
				if($thumb_pf['src']) {
					$img_content = '<div class="thumb_div"><img src="'.$thumb_pf['src'].'" alt="'.$thumb_pf['alt'].'" ></div>';
				}
				?>
					<li>
						<!-- <a href="<?php echo get_pretty_url('brand', $brand['wr_id']);?>"> -->
						<a href="<?php echo $brand['wr_link1']?>" target="_blank">
							<?php		
							$wr_cnt = sql_fetch(" select * from g5_board_file where wr_id = '{$brand['wr_id']}' and bf_no = '1' ");
							?>
							<?php
							echo $img_content;	
							?>
						</a>
						<div class="txt_div">
							<p class="mont"><?php echo $brand['wr_1']?></p>
						</div>
					</li>
				<?php }

				if($total == 0) echo '<li class="no_list">게시글이 없습니다.</li>';
				?>
			</ul>
		</div>
	</div>

	<div class="sub_div div01">
		<p class="brand_tit mont">Medical</p>
		<div class="brand_wrap">
			<ul>
				<?php 
				$sql = " select * from g5_write_brand where ca_name = 'Medical' order by wr_id desc";
				$result = sql_query($sql);
				$total = sql_num_rows($result);
				for($i = 0 ; $brand = sql_fetch_array($result) ; $i++) {
				$thumb_pf = get_list_thumbnail('brand', $brand['wr_id'], 405, 540, false, true, 'center', false, '80/0.5/3');
				if($thumb_pf['src']) {
					$img_content = '<div class="thumb_div"><img src="'.$thumb_pf['src'].'" alt="'.$thumb_pf['alt'].'" ></div>';
				}
				?>
					<li>
						<!-- <a href="<?php echo get_pretty_url('brand', $brand['wr_id']);?>"> -->
						<a href="<?php echo $brand['wr_link1']?>" target="_blank">
							<?php		
							$wr_cnt = sql_fetch(" select * from g5_board_file where wr_id = '{$brand['wr_id']}' and bf_no = '1' ");
							?>
							<?php
							echo $img_content;	
							?>
						</a>
						<div class="txt_div">
							<p class="mont"><?php echo $brand['wr_1']?></p>
						</div>
					</li>
				<?php }

				if($total == 0) echo '<li class="no_list">게시글이 없습니다.</li>';
				?>
			</ul>
		</div>
	</div>
	<?php if($is_admin) { ?>
	<!-- <div class="sub_div_btn">
	<a href="<?php echo G5_BBS_URL ?>/write.php?bo_table=brand" class="brand_btn">브랜드 추가하기</a>
	</div> -->
	<?php } ?>
</div>

<!-- } content -->


<script>
$(document).ready(function() {

});
</script>


<?php
include_once(G5_PATH.'/tail.php');