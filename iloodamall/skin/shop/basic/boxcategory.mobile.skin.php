<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);

$mshop_categories = get_shop_category_array(true);
?>

<style>
.right_menu  ul.m_gnb_1dep li.m_gnb_1dep_l:nth-child(4) {display: none;}
.right_menu .menu_detail .menu_wrap > ul > li:first-of-type > ul > li:nth-of-type(1),
.right_menu .menu_detail .menu_wrap > ul > li:first-of-type > ul > li:nth-of-type(2),
.right_menu .menu_detail .menu_wrap > ul > li:first-of-type > ul > li:nth-of-type(3),
.right_menu .menu_detail .menu_wrap > ul > li:first-of-type > ul > li:nth-of-type(4),
.right_menu .menu_detail .menu_wrap > ul > li:first-of-type > ul > li:nth-of-type(5),
.right_menu .menu_detail .menu_wrap > ul > li:first-of-type > ul > li:nth-of-type(6) {display:none}
</style>

<ul class="m_gnb_1dep">
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
	<li class="m_gnb_1dep_l<?php echo $sub == $i ? ' on' : '';?>" style="z-index:<?php echo $gnb_zindex; ?>">
		<!-- <a href="<?php echo $row['url']; ?>" class=""><?php echo $row['ca_name']; ?></a> -->
		<a href="javascript:;" class=""><?php echo $row['ca_name']; ?></a>
		<?php
		$j=0;
		foreach($cate1 as $key=>$cate2) {
		if( empty($cate2) || $key === 'text' ) continue;

		$row2 = $cate2['text'];

		if ($j==0) echo '<ul class="m_gnb_2dep" style="z-index:'.$gnb_zindex.'">';
			switch ($row['ca_name']) {
			    case '데모신청':
				$ca_num = 10;
				break;

			    case '소모품':
				$ca_num = 20;
				break;

			    case '코스메틱':
				$ca_num = 30;
				break;

			    default:
				// 다른 경우에 대한 처리
				break;
			}	
		?>
			<?php 
				if($j==0) echo '<li class="m_gnb_2dep_l"><a href="/shop/list.php?ca_id='.$ca_num.'">전체</a></li> ';

				if($row['ca_name'] == '데모신청'){
					echo '<li class="m_gnb_2dep_l"><a href="/shop/list.php?ca_id='.$ca_num.'">전체</a></li> ';
				} else {
			?>
			 <li class="m_gnb_2dep_l"><a href="<?php echo $row2['url']; ?>&it_10=1" class=""><?php echo $row2['ca_name']; ?></a></li>
			 <?php } ?>
		<?php $j++; }   //end for
		//if ($j>0) echo '<li class="m_gnb_2dep_l"><a href="/shop/list.php?ca_id=10">전체</a></li> </ul>';
		if ($j>0) echo '</ul>';
		?>

	</li>
	<?php $i++; }   //end for ?>
	<?php if($member['mb_level'] >= 2){?>
	<li class="m_gnb_1dep_l<?php echo $on == '0' ? ' on' : '';?>">
		<!-- <a href="<?php echo get_pretty_url('inquiry'); ?>">마케팅 자료</a> -->
		<a href="javascript:;">마케팅 자료</a>
		<ul class="m_gnb_2dep" style="z-index:999;">
			<li class="m_gnb_2dep_l">
				<a href="<?php echo get_pretty_url('marketing'); ?>">마케팅 자료</a>
			</li>
		</ul>
	</li>
	<?php }?>
	<li class="m_gnb_1dep_l<?php echo $on == '1' ? ' on' : '';?>" style="display: none;">
		<!-- <a href="<?php echo get_pretty_url('inquiry'); ?>">미디어</a> -->
		<a href="javascript:;">미디어</a>
		<ul class="m_gnb_2dep" style="z-index:999;">
			<li class="m_gnb_2dep_l">
				<a href="<?php echo get_pretty_url('media'); ?>">미디어(영상)</a>
				<a href="<?php echo get_pretty_url('webzine'); ?>">이루다 스토리</a>
			</li>
		</ul>
	</li>

	<li class="m_gnb_1dep_l<?php echo $on == '2' ? ' on' : '';?>" style="display: none;">
		<!-- <a href="<?php echo get_pretty_url('inquiry'); ?>">brand story</a> -->
		<a href="javascript:;">brand story</a>
		<ul class="m_gnb_2dep" style="z-index:999;">
			<li class="m_gnb_2dep_l">
				<a href="<?php echo G5_SHOP_URL ?>/brandstory.php">brand story</a>
				<!-- <a href="<?php echo get_pretty_url('inquiry'); ?>">리팟</a>
				<a href="<?php echo get_pretty_url('inquiry'); ?>">하이저미</a>
				<a href="<?php echo get_pretty_url('inquiry'); ?>">시크릿</a>
				<a href="<?php echo get_pretty_url('inquiry'); ?>">엔코어</a>
				<a href="<?php echo get_pretty_url('inquiry'); ?>">펜토</a>
				<a href="<?php echo get_pretty_url('inquiry'); ?>">울트라뷰젯</a>
				<a href="<?php echo get_pretty_url('inquiry'); ?>">아이그래프트</a>
				<a href="<?php echo get_pretty_url('inquiry'); ?>">기타</a> -->
			</li>
		</ul>
	</li>

	<li class="m_gnb_1dep_l<?php echo $on == '3' ? ' on' : '';?>">
		<!-- <a href="<?php echo get_pretty_url('inquiry'); ?>">고객센터</a> -->
		<a href="javascript:;">고객센터</a>
		<ul class="m_gnb_2dep" style="z-index:999;">
			<li class="m_gnb_2dep_l">
				<a href="<?php echo get_pretty_url('notice'); ?>">공지사항</a>
				<a href="<?php echo get_pretty_url('faq'); ?>">FAQ</a>
				<a href="<?php echo get_pretty_url('inquiry'); ?>">1:1문의</a>
				<!-- <a href="<?php echo get_pretty_url('mb_inquiry'); ?>">회원문의</a> -->
			</li>
		</ul>
	</li>
	<?php if($member['mb_level'] == '3') { ?>

	<li class="m_gnb_1dep_l<?php echo $on == '4' ? ' on' : '';?>">
		<a href="javascript:;">가이드영상</a>
		<ul class="m_gnb_2dep" style="z-index:999;">
			<li class="m_gnb_2dep_l">
				<a href="/shop/guide.php">가이드영상</a>
			</li>
		</ul>
	</li>
	<li class="m_gnb_1dep_l<?php echo $on == '5' ? ' on' : '';?>">
		<a href="javascript:;">A/S센터</a>
		<ul class="m_gnb_2dep" style="z-index:999;">
			<li class="m_gnb_2dep_l">
				<a href="/bbs/write.php?bo_table=as">A/S센터</a>
			</li>
		</ul>
	</li>
	<?php } ?>
</ul>