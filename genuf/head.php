<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

run_event('pre_head');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<style>
#hd{overflow:hidden;}
.popup{position:fixed;background: #F3EDED;height: 70px;}
.popuplayer{display: flex;text-align:center;justify-content:center;align-items:center;height: 70px;font-weight:bold;font-size:20px;}
.popuplayer p{color: #3D3D3F;}
.popuplayer img{position:absolute;right:320px;cursor:pointer;}

.hd_container{position:fixed;top: 0; width: 100%; z-index: 2;height: 154px;background:#fff;}
.hd_container:hover{height: 330px; background:#fff;}
.hd_container .hds{padding: 0 320px;display: flex;justify-content: space-between;}
.hd_container .hds .hd_left ul{display: flex;gap: 43px;font-size: 20px;font-weight: 600;line-height: 23.87px;}
.hd_container .hds .hd_left ul .drop{display: flex;flex-direction: column;gap:20px;margin-top:60px;font-size: 14px;font-weight: 500;line-height: 16.71px; display: none;z-index:1;}
.hd_container .hds .hd_left img{margin: 40px 0;}
.hd_container .hds .hd_right ul{display: flex;font-size: 14px;font-weight: 400;line-height: 16.71px;gap: 24px;margin : 44.5px 0;justify-content: flex-end;}
.hd_container .hds .hd_left:hover .drop {display: flex;}
</style>

<!-- 상단 시작 { -->
<div id="hd">
<?php 
	$mAgent = array("iPhone","iPod","Android","Blackberry", "Opera Mini", "Windows ce", "Nokia", "sony" );
	$chkMobile = false;
	for($i=0; $i<sizeof($mAgent); $i++){
		if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
			$chkMobile = true;
			break;
		}
	}
	if(defined('_INDEX_')) { // index에서만 실행
		if($chkMobile){
			include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
		}else{
			include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
		}
	} 
	?>
	<div class="popup">
		<div class="popuplayer">
			<p>팝업 레이어 부분입니다. 문구수정가능</p>
			<img src="/img/hd_x.png" alt="">
		 </div>
	</div>

	<div class="hd_container">

		 <div class="hds">
			 <div class="hd_left">
				<a href="/index.php"><img src="/img/hd_logo.png" alt=""></a>

				<ul>
					<li>
						<a href="/shop/list.php?ca_id=10">SHOP</a>
						<ul class="drop">
							<li><a href="/shop/list.php?ca_id=10">ALL</a></li>
						</ul>
					</li>
					<li>
						<a href="/bbs/board.php?bo_table=review">REVIEW</a>
						<ul class="drop">
							<li><a href="/bbs/board.php?bo_table=review">상품리뷰</a></li>
						</ul>
					</li>
					<li>
						<a href="/bbs/board.php?bo_table=event">EVENT</a>
						<ul class="drop">
							<li><a href="/bbs/board.php?bo_table=event">이벤트</a></li>
						</ul>
					</li>
					<li>
						<a href="/bbs/board.php?bo_table=announcement">CX CENTER</a>
						<ul class="drop">
							<li><a href="/bbs/board.php?bo_table=announcement">공지사항</a></li>
							<li><a href="/bbs/board.php?bo_table=faq">자주하는 질문</a></li>
							<li><a href="/bbs/board.php?bo_table=inquiry">1:1문의</a></li>
						</ul>
					</li>
					<li>
						<a href="/1_1.php">BRAND STORY</a>
						<ul class="drop">
							<li><a href="/1_1.php">브랜드 스토리</a></li>
						</ul>
					</li>
				</ul>
			 </div>
			 <div class="hd_right">
				<ul>
					<?php if($is_member) {?>
						<li><a href="<?php echo G5_SHOP_URL; ?>/mypage.php">MY PAGE</a></li>
						<li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
					<?php } else { ?>
						<li><a href="">주문조회</a></li>
						<li><a href="/bbs/login.php">로그인</a></li>
						<li><a href="/bbs/register.php">회원가입</a></li>
					<?php } ?>
				</ul>
				<ul>
					<li><a href="/shop/mypage.php"><img src="/img/hd_member.png" alt=""></a></li>
					<li><a href="/shop/cart.php"><img src="/img/hd_shop.png" alt=""></a></li>
				</ul>
			 </div>
		 </div>

	</div>


</div>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }