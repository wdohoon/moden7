<?php
include_once('./_common.php');

//hd - gnb sub - gnb hover
if($bo_table == 'portfolio') $sub = '3' and $hd = '0';
if($bo_table == 'notice') $on = '3';
if($bo_table == 'faq') $on = '3';
if($bo_table == 'inquiry') $on = '3';
if($bo_table == 'mb_inquiry') $on = '3';
if($bo_table == 'as') $on = '1';
if($bo_table == 'event') $on = '3';
if($bo_table == 'marketing') $on = '0';
if($bo_table == 'brand') $on = '2';
if($bo_table == 'media') $on = '1';
if($bo_table == 'webzine') $on = '1';


include_once(G5_PATH.'/head.php');
?>

<style>
.content {width:100%;padding-bottom:70px;}
.sub_wrap {width:1320px;margin:0 auto;padding-top: 80px;}

.newbox {margin-bottom:30px; display: flex; align-items:center;}
.board_txt2 {margin-right: 55px;}
.board_txt{margin-bottom:30px;}
.board_txt p.b_tit, .board_txt2 p.b_tit {color:#b1b4b9; font-size: 60px;font-weight: 700;line-height:1.2em;}
.board_txt p.b_desc, .board_txt2 p.b_desc {font-size: 26px;font-weight: 400;line-height: 40px;}

.board_title {font-size: 48px;font-weight: 600;color:#b1b4b9;text-align: center;margin-bottom: 50px;}

@media (max-width: 1760px)  {
.sub_wrap {width:75.0000vw;margin:0 auto;padding-top: 4.5455vw;}

.newbox {margin-bottom:1.7045vw;}
.board_txt2 {margin-right: 3.1250vw;}
.board_txt {margin-bottom:1.7045vw;}
.board_txt p.b_tit, .board_txt2 p.b_tit {font-size: 3.4091vw;line-height:1.2em;}
.board_txt p.b_desc, .board_txt2 p.b_desc {font-size: 1.4773vw;line-height: 2.2727vw;}

.board_title {font-size: 2.7273vw;margin-bottom: 2.8409vw;}

}

@media (max-width: 1600px)  {
.sub_wrap {width:82.5000vw;margin:0 auto;padding-top: 5.0000vw;}

.newbox{margin-bottom:1.8750vw;}
.board_txt2 {margin-right: 3.4375vw;}
.board_txt {margin-bottom:1.8750vw;}
.board_txt p.b_tit, .board_txt2 p.b_tit {font-size: 3.7500vw;line-height:1.2em;}
.board_txt p.b_desc, .board_txt2 p.b_desc {font-size: 1.6250vw;line-height: 2.5000vw;}

.board_title {font-size: 3.0000vw;margin-bottom: 3.1250vw;}

}

@media (max-width: 1400px)  {
.sub_wrap {width:100%;margin:0 auto;padding:0 4.2857vw;padding-top: 5.7143vw;}

.newbox {margin-bottom:2.1429vw;}
.board_txt2 {margin-right: 3.9286vw;}
.board_txt {margin-bottom:2.1429vw;}
.board_txt p.b_tit, .board_txt2 p.b_tit {font-size: 4.2857vw;line-height:1.2em;}
.board_txt p.b_desc, .board_txt2 p.b_desc {font-size: 1.8571vw;line-height: 2.8571vw;}

.board_title {font-size: 3.4286vw;margin-bottom: 3.5714vw;}

}

@media (max-width: 1024px)  {
.sub_wrap {width:100%;margin:0 auto;padding:0 5.8594vw;padding-top:5.8594vw;}

.newbox {margin-bottom:2.9297vw;}
.board_txt2 {margin-right: 5.3711vw;}
.board_txt {margin-bottom:2.9297vw;}
.board_txt p.b_tit, .board_txt2 p.b_tit {font-size: 5.8594vw;line-height:1.2em;}
.board_txt p.b_desc, .board_txt2 p.b_desc {font-size: 2.5391vw;line-height: 3.9063vw;}

.board_title {font-size: 4.6875vw;margin-bottom: 4.8828vw;}

}

@media (max-width: 768px)  {
.sub_wrap {width:100%;margin:0 auto;padding:0 5.2083vw;padding-top:7.8125vw;}

.newbox {margin-bottom:3.9063vw;}
.board_txt2 {width:50%;	margin-right: 0;}
.board_txt {margin-bottom:3.9063vw;}
.board_txt p.b_tit, .board_txt2 p.b_tit {font-size: 7.8125vw;line-height:1.2em;}
.board_txt p.b_desc, .board_txt2 p.b_desc {font-size: 3.3854vw;line-height: 5.2083vw;}

.board_title {font-size: 6.2500vw;margin-bottom: 6.5104vw;}

}

@media (max-width: 480px)  {
.sub_wrap {width:100%;margin:0 auto;padding:0 5.2083vw;padding-top:12.5000vw;}

.newbox {margin-bottom:3.9063vw;}
.board_txt {margin-bottom:3.9063vw;}
.board_txt p.b_tit, .board_txt2 p.b_tit {font-size: 8.3333vw;line-height:1.2em;}
.board_txt p.b_desc, .board_txt2 p.b_desc {font-size: 3.7500vw;line-height: 5.0000vw;}

.board_title {font-size: 7.5000vw;margin-bottom: 8.3333vw;}

}
.banner_img{
	display: none;
}
</style>

<?php if($bo_table == 'event'){
	//include_once(G5_PATH.'/include/sv06.php'); ?>
	<div class="content">

	<div class="sub_wrap">
		<div class="board_txt">
			<p class="b_tit">EVENT</p>
			<p class="b_desc">이루다에서 매주 회의 후 이벤트를 결정하여 <br/>회원님들께 많은 혜택과 즐거움을 드리는 공간입니다 많이 참여해주세요.</p>
		</div>
<?php } else if($bo_table == 'inquiry'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">

	<div class="sub_wrap">
		<p class="board_title">1:1문의</p>
<?php } else if($bo_table == 'marketing'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<style>
	#container {width:100%;}
	</style>
	<div class="content">

	<div class="sub_wrap">
		<div class="newbox">
			<div class="board_txt2">
				<p class="b_tit">마케팅 자료</p>
			</div>
<?php } else if($bo_table == 'brand'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">

	<div class="sub_wrap">
		<p class="board_title">브랜드 소개</p>
<?php } else if($bo_table == 'notice'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">공지사항</p>
<?php } else if($bo_table == 'mb_inquiry'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">문의게시판</p>
<?php } else if($bo_table == 'as'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">A/S 신청</p>
<?php } else if($bo_table == 'faq'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">자주하는질문</p>
<?php } else if($bo_table == 'media'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">미디어</p>
<?php } else if($bo_table == 'webzine'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">이루다 소개</p>
<?php } else if($bo_table == 'guide'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">가이드 영상</p>
<?php } else if($bo_table == 'couponlist'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">쿠폰관리</p>
<?php } else if($bo_table == 'genuine'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">정품등록승인</p>
<?php } else if($bo_table == 'serial'){
	//include_once(G5_PATH.'/include/sv04.php'); ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">시리얼넘버 현황</p>
<?php } else if($bo_table == 'guardians'){
	//alert('준비중입니다.');
	include_once(G5_PATH.'/include/sv00_cm.php'); ?>
	<div class="content" style="padding:0;">

<?php } else if($bo_table == 'product_application'){ ?>
	<div class="content">
	
	<div class="sub_wrap">
		<p class="board_title">데모신청 목록</p>
<?php }?>

