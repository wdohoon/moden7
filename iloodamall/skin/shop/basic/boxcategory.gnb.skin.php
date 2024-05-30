<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);

$mshop_categories = get_shop_category_array(true);
?>

<style>
#gnb_cm {height:70px;position:relative;z-index:10;background:#fff;border-bottom:1px solid #e8e8e8;}
.gnb_inner {width:1600px;margin:0 auto;}
#gnb_cm ul.gnb_1dep {text-align: center;}
#gnb_cm ul.gnb_1dep li {text-align: center;display:inline-block;padding:0 35px;line-height:70px;}
#gnb_cm ul.gnb_1dep li a {font-size: 16px;font-weight: 700;}
#gnb_cm ul.gnb_1dep li.on {}
#gnb_cm ul.gnb_1dep li.on a {}

#gnb_cm ul.gnb_1dep li.gnb_1dep_l {}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l:nth-child(4) {display: none;}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a {position:relative;}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a:after {content:"";display:block;width:100%;height:5px;background:#393939;position:absolute;left:0;bottom:-22px;}

/* 소메뉴 */
#gnb_cm .gnb_2dep {position:absolute;left:50%;transform:translateX(-50%);top:70px;width:100%;/* max-width:1920px; */height:60px;line-height:60px;;display: none;text-align: center;}
#gnb_cm .gnb_2dep:after {content:"";display:block;clear:both;}
#gnb_cm .gnb_2dep.on {display: block;}

#gnb_cm .gnb_2dep li.gnb_2dep_l {display:inline-block;line-height:60px;padding:0 14px;}
#gnb_cm .gnb_2dep li.gnb_2dep_l a {color:#000;border-bottom: 0;font-size: 14px;font-weight:500;line-height: 40px;position:relative;}

.menuBar {display: none;width:100%;max-width:1920px;background:#fff;height:60px;position:absolute;z-index:9;border-bottom:1px solid #d8d8d8;}
.menuBar.on {height:60px;position:absolute;}


@media (max-width: 1760px)  {
#gnb_cm {height:3.9773vw;background:#fff;border-bottom:0.0568vw solid #e8e8e8;}
.gnb_inner {width:90.9091vw;margin:0 auto;}
#gnb_cm ul.gnb_1dep {}
#gnb_cm ul.gnb_1dep li {padding:0 1.9886vw;line-height:3.9773vw;}
#gnb_cm ul.gnb_1dep li a {font-size: 0.9091vw;}
#gnb_cm ul.gnb_1dep li.on {}
#gnb_cm ul.gnb_1dep li.on a {}

#gnb_cm ul.gnb_1dep li.gnb_1dep_l {}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a {}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a:after {width:100%;height:0.2841vw;background:#393939;left:0;bottom:-1.2500vw;}

/* 소메뉴 */
#gnb_cm .gnb_2dep {left:50%;transform:translateX(-50%);top:3.9773vw;bottom:-3.4091vw;/* width:68.1818vw;max-width:109.0909vw; */height:3.4091vw;line-height:3.4091vw;;}
#gnb_cm .gnb_2dep:after {clear:both;}
#gnb_cm .gnb_2dep.on {}

#gnb_cm .gnb_2dep li.gnb_2dep_l {line-height:3.4091vw;padding:0 0.7955vw;}
#gnb_cm .gnb_2dep li.gnb_2dep_l a {border-bottom: 0;font-size: 0.7955vw;line-height: 2.2727vw;}

.menuBar {width:100%;max-width:109.0909vw;background:#fff;height:0.0000vw;bottom:0.0000vw;transition:all 0.5s;border-bottom:0.0568vw solid #d8d8d8;}
.menuBar.on {height:3.4091vw;}

}

@media (max-width: 1600px)  {
#gnb_cm {height:4.3750vw;background:#fff;border-bottom:0.0625vw solid #e8e8e8;}
.gnb_inner {width:100.0000vw;margin:0 auto;}
#gnb_cm ul.gnb_1dep {}
#gnb_cm ul.gnb_1dep li {padding:0 2.1875vw;line-height:4.3750vw;}
#gnb_cm ul.gnb_1dep li a {font-size: 1.0000vw;}
#gnb_cm ul.gnb_1dep li.on {}
#gnb_cm ul.gnb_1dep li.on a {}

#gnb_cm ul.gnb_1dep li.gnb_1dep_l {}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a {}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a:after {width:100%;height:0.3125vw;background:#393939;left:0;bottom:-1.3750vw;}

/* 소메뉴 */
#gnb_cm .gnb_2dep {left:50%;transform:translateX(-50%);top:4.3750vw;bottom:-3.7500vw;/* width:75.0000vw;max-width:120.0000vw; */height:3.7500vw;line-height:3.7500vw;;}
#gnb_cm .gnb_2dep:after {clear:both;}
#gnb_cm .gnb_2dep.on {}

#gnb_cm .gnb_2dep li.gnb_2dep_l {line-height:3.7500vw;padding:0 0.8750vw;}
#gnb_cm .gnb_2dep li.gnb_2dep_l a {border-bottom: 0;font-size: 0.8750vw;line-height: 2.5000vw;}

.menuBar {width:100%;max-width:120.0000vw;background:#fff;height:0.0000vw;bottom:0.0000vw;transition:all 0.5s;border-bottom:0.0625vw solid #d8d8d8;}
.menuBar.on {height:3.7500vw;}

}

@media (max-width: 1400px)  {
#gnb_cm {height:5.0000vw;background:#fff;border-bottom:0.0714vw solid #e8e8e8;}
.gnb_inner {width:100%;margin:0 auto;}
#gnb_cm ul.gnb_1dep {}
#gnb_cm ul.gnb_1dep li {padding:0 2.5000vw;line-height:5.0000vw;}
#gnb_cm ul.gnb_1dep li a {font-size: 1.1429vw;}
#gnb_cm ul.gnb_1dep li.on {}
#gnb_cm ul.gnb_1dep li.on a {}

#gnb_cm ul.gnb_1dep li.gnb_1dep_l {}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a {}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a:after {width:100%;height:0.3571vw;background:#393939;left:0;bottom:-1.5714vw;}

/* 소메뉴 */
#gnb_cm .gnb_2dep {background: ;left:50%;transform:translateX(-50%);top:5.0000vw;bottom:-4.2857vw;/* width:85.7143vw;max-width:137.1429vw; */height:4.2857vw;line-height:4.2857vw;;}
#gnb_cm .gnb_2dep:after {clear:both;}
#gnb_cm .gnb_2dep.on {}

#gnb_cm .gnb_2dep li.gnb_2dep_l {line-height:4.2857vw;padding:0 1.0000vw;}
#gnb_cm .gnb_2dep li.gnb_2dep_l a {border-bottom: 0;font-size: 1.0000vw;line-height: 2.8571vw;}

.menuBar {width:100%;max-width:137.1429vw;background:#fff;height:0.0000vw;bottom:0.0000vw;transition:all 0.5s;border-bottom:0.0714vw solid #d8d8d8;}
.menuBar.on {height:4.2857vw;}

}

@media (max-width: 1024px)  {
#gnb_cm {height:6.8359vw;background:#fff;border-bottom:0.0977vw solid #e8e8e8;}
.gnb_inner {width:100%;margin:0 auto;}
#gnb_cm ul.gnb_1dep {}
#gnb_cm ul.gnb_1dep li {padding:0 3.4180vw;line-height:6.8359vw;}
#gnb_cm ul.gnb_1dep li a {font-size: 1.3672vw;}
#gnb_cm ul.gnb_1dep li.on {}
#gnb_cm ul.gnb_1dep li.on a {}

#gnb_cm ul.gnb_1dep li.gnb_1dep_l {}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a {}
#gnb_cm ul.gnb_1dep li.gnb_1dep_l.on > a:after {width:100%;height:0.4883vw;background:#393939;left:0;bottom:-2.1484vw;}

/* 소메뉴 */
#gnb_cm .gnb_2dep {left:50%;transform:translateX(-50%);top:6.8359vw;bottom:-5.8594vw;/* width:117.1875vw;max-width:187.5000vw; */height:5.8594vw;line-height:5.8594vw;;}
#gnb_cm .gnb_2dep:after {clear:both;}
#gnb_cm .gnb_2dep.on {}

#gnb_cm .gnb_2dep li.gnb_2dep_l {line-height:5.8594vw;padding:0 1.3672vw;}
#gnb_cm .gnb_2dep li.gnb_2dep_l a {border-bottom: 0;font-size: 1.3672vw;line-height: 3.9063vw;}

.menuBar {width:100%;max-width:187.5000vw;background:#fff;height:0.0000vw;bottom:0.0000vw;transition:all 0.5s;border-bottom:0.0977vw solid #d8d8d8;}
.menuBar.on {height:5.8594vw;}
}

@media (max-width: 768px)  {

}

@media (max-width: 480px)  {

}

</style>

<!-- 쇼핑몰 카테고리 시작 { -->

<nav id="gnb_cm">
	<div class="gnb_inner">
		<ul class="gnb_1dep">
			<?php
			// 1단계 분류 판매 가능한 것만
			$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
			$i = 0;
			foreach($mshop_categories as $cate1) {
				if( empty($cate1) ) continue;

				$row = $cate1['text'];
				$gnb_zindex -= 1; // html 구조에서 앞선 gnb_1dli 에 더 높은 z-index 값 부여
				// 2단계 분류 판매 가능한 것만
				$count = ((int) count($cate1)) - 1;
			?>
			<li class="gnb_1dep_l<?php echo $sub == $i ? ' on' : '';?>" style="z-index:<?php echo $gnb_zindex; ?>">
				<a href="<?php echo $row['url']; ?>" class=""><?php echo $row['ca_name']; ?></a>
				<?php
				$j=0;
				foreach($cate1 as $key=>$cate2) {
				if( empty($cate2) || $key === 'text' ) continue;
				
				$row2 = $cate2['text'];

				if ($j==0) echo '<ul class="gnb_2dep" style="z-index:'.$gnb_zindex.'">';
				?>
					<li class="gnb_2dep_l"><a href="<?php echo $row2['url']; ?>&it_10=1" class=""><?php echo $row2['ca_name']; ?></a></li>
				<?php $j++; }   //end for
				if ($j>0) echo '</ul>';
				?>
			</li>
			<?php $i++; }   //end for ?>
			
			<li class="gnb_1dep_l<?php echo $on == '0' ? ' on' : '';?>">
				<a href="<?php echo get_pretty_url('marketing'); ?>">마케팅 자료</a>
				<ul class="gnb_2dep" style="z-index:999;">
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('marketing'); ?>">마케팅 자료</a>
					</li>
				</ul>
			</li>

			<li class="gnb_1dep_l<?php echo $on == '2' ? ' on' : '';?>">
				<a href="<?php echo G5_SHOP_URL ?>/brandstory.php">brand story</a>
				<ul class="gnb_2dep" style="z-index:999;">
					<li class="gnb_2dep_l">
						<a href="<?php echo G5_SHOP_URL ?>/brandstory.php">brand story</a>
					</li>
				</ul>
				<!-- <a href="<?php echo get_pretty_url('brand'); ?>">brand story</a> -->
				<!-- <ul class="gnb_2dep" style="z-index:999;">
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('inquiry'); ?>">리팟</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('inquiry'); ?>">하이저미</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('inquiry'); ?>">시크릿</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('inquiry'); ?>">엔코어</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('inquiry'); ?>">펜토</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('inquiry'); ?>">울트라뷰젯</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('inquiry'); ?>">아이그래프트</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('inquiry'); ?>">기타</a>
					</li>
				</ul> -->
			</li>

			<!-- <li class="gnb_1dep_l<?php echo $on == '1' ? ' on' : '';?>">
				<a href="<?php echo get_pretty_url('media'); ?>">미디어</a>
				<ul class="gnb_2dep" style="z-index:999;">
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('media'); ?>">미디어(영상)</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('webzine'); ?>">이루다 스토리</a>
					</li>
				</ul>
			</li> -->

			<li class="gnb_1dep_l<?php echo $on == '3' ? ' on' : '';?>">
				<a href="<?php echo get_pretty_url('notice'); ?>">고객센터</a>
				<ul class="gnb_2dep" style="z-index:999;">
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('notice'); ?>">공지사항</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('faq'); ?>">FAQ</a>
					</li>
					<li class="gnb_2dep_l">
						<!-- <a href="<?php echo get_pretty_url('inquiry'); ?>">1:1문의</a> -->
						<a href="/bbs/write.php?bo_table=inquiry">1:1문의</a>
					</li>
					<li class="gnb_2dep_l">
						<!-- <a href="<?php echo get_pretty_url('mb_inquiry'); ?>">문의</a> -->
						<a href="/bbs/write.php?bo_table=mb_inquiry">문의</a>
					</li>
				</ul>
			</li>

			<!-- 정품인증회원만 노출 -->
			<?php 
				$mygenuine = sql_fetch("select * from g5_write_genuine where mb_id = '{$member['mb_id']}' and wr_9 = '1' ");

				if($mygenuine['mb_id']){ 
			?>
			<li class="gnb_1dep_l<?php echo $on == '1' ? ' on' : '';?>">
				<a href="<?php echo get_pretty_url('as'); ?>">미디어</a>
				<ul class="gnb_2dep" style="z-index:999;">
					<li class="gnb_2dep_l">
						<a href="<?php echo G5_SHOP_URL.'/guide.php'; ?>">가이드영상</a>
					</li>
					<li class="gnb_2dep_l">
						<a href="<?php echo get_pretty_url('as'); ?>">A/S 신청</a>
					</li>
				</ul>
			</li>
			<?php } ?>
		</ul>
	</div>
</nav>

<div class="menuBar<?php echo $chk == '1' ? ' on' : '';?>"></div>
<!-- } 쇼핑몰 카테고리 끝 -->


<script>
$(function(){
	$('.gnb_1dep_l').on('mouseenter',function(){
		//$('.menuBar').addClass('on');
		$('.menuBar').stop().slideDown(300);;
		$('.gnb_2dep').hide();
		$(this).find('ul').show();
		//$(this).find('ul').stop().slideDown(300);;
	});

	$('.gnb_wrap').on('mouseleave',function(){
		//$('.menuBar').removeClass('on');
		$('.menuBar').stop().slideUp(300);
		$('.gnb_2dep').hide();
		//$('.gnb_2dep').stop().slideUp(300);
	});

});
</script>