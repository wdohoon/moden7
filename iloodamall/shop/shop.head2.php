<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$q = isset($_GET['q']) ? clean_xss_tags($_GET['q'], 1, 1) : '';

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/shop.head2.php');
    return;
}

include_once(G5_PATH.'/head.sub2.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');

add_javascript('<script src="'.G5_JS_URL.'/owlcarousel/owl.carousel.min.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/owlcarousel/owl.carousel.css">', 0);
?>

<style>
#hd {background:#fff;}
#hd_wrapper {width:1600px;height:124px;}

/* logo */
#logo {padding: 0; position:absolute;left:0%;top:50%;transform:translateY(-50%);}
#logo img {width:991px;}

/* util */
#hd_util {position:absolute;right:0;top:10px}
#hd_util:after {display:block;visibility:hidden;clear:both;content:""}
#hd_util li {float:left;font-size:14px;line-height:36px;position:relative;text-align:center;padding:0 18px;}
#hd_util li::after {content:"";display:block;width:1px;height:14px;background:#8f8f8f;position:absolute;right:0;top:50%;transform:translateY(-50%)}
#hd_util li.no-line::after {display: none;}
#hd_util li:last-child {padding-right:0;}
#hd_util li a {display:inline-block;color:#919191;font-size: 14px;}
#hd_util li.genuine {background:#000;width:80px;padding:0;border-radius:5px}
#hd_util li.genuine a {color:#fff;display: block;}
#hd_util li.select {width:120px;height:36px;margin-left:10px;}
#hd_util li select {height:36px;border:1px solid #555;border-radius:5px;padding-left:10px;width:120px;position:absolute;left:0;top:0}

.gnb_wrap {border-top:1px solid #f6f6f6;position:relative;z-index:20;}
.gnb_wrap.off {z-index:4;}
.search_icon {position:absolute;right:160px;top:20px;z-index:99;}
.search_icon img {width:25px;}

.black_bg {position: fixed; width: 100%; height: 100%; background: rgba(0,0,0,.5); z-index: 9998; top: 0; left: 0; display: none;}


/* 모바일 header */
.right_menu {position: fixed; left: -100%; top: 0; height: 100%;  background: #fff; width: 80%; z-index: 9999; transition:all 0.3s; -webkit-transition:all 0.3s; -moz-transition:all 0.3s;}
.right_menu.on {left: 0;}
.right_menu .menu_close {position: absolute; right: -90px; top: 22px;}
.right_menu .menu_detail {overflow-y: auto; height: 100%; padding: 20px 0;}
.right_menu .menu_detail .menu_logo {text-align: center;}
.right_menu .menu_detail .menu_logo img {width:314px;}
.right_menu .menu_detail .login_wrap {margin: 30px 20px; padding: 25px 0; border-top: 1px solid #dedede; border-bottom: 1px solid #dedede;}
.right_menu .menu_detail .login_wrap > ul > li {float:left; width: 49%; margin-right: 2%; margin-bottom: 2%;}
.right_menu .menu_detail .login_wrap > ul > li:nth-child(2n) {margin-right: 0;}
.right_menu .menu_detail .login_wrap > ul > li > a {display: block; width: 100%; height: 64px; line-height: 64px; color: #231f20; text-align: center; background: #f2f2f2; font-size:22px; }

.right_menu .menu_detail .menu_wrap {margin-top: 20px;}
.right_menu .menu_detail .menu_wrap > ul > li {position: relative;}
.right_menu .menu_detail .menu_wrap > ul > li:first-child > a {border-top: 1px solid #f0f0f0;}
.right_menu .menu_detail .menu_wrap > ul > li > a {display: inline-block; text-transform:uppercase; width: 100%; padding-left: 20px; height: 75px; line-height: 75px; font-size: 28px; color: #393939; border-bottom: 1px solid #f0f0f0; background: url(/images/m_arrow.png) no-repeat right 20px center;}
.right_menu .menu_detail .menu_wrap > ul > li > ul {display: none; border-bottom: 1px solid #f0f0f0; padding: 20px 0;}
.right_menu .menu_detail .menu_wrap > ul > li > ul > li {}
.right_menu .menu_detail .menu_wrap > ul > li > ul > li:last-child {}
.right_menu .menu_detail .menu_wrap > ul > li > ul > li > a {font-size: 24px; text-transform:uppercase; color: #3e3e3e; padding-left: 30px; line-height: 45px; display:block; font-weight: 300;}

.other {margin-top:10px;padding-top:25px;border-top:1px solid #dedede;}
.other:after {content:"";display: block;clear: both;}
.other div {float:left;}
.other div.genuine {width:154px;height:48px;line-height:48px;text-align: center;background:#000;}
.other div.genuine a {color:#fff;font-size: 18px;}

.other div.select {margin-left: 20px;}
.other div.select select {width:243px;height:48px;line-height:48px;border:1px solid #000;padding:0 10px;font-size: 18px;}
.other div.select select option {}


@media (max-width: 1760px)  {
#hd_wrapper {width:90.9091vw;height:7.0455vw;}

/* logo */
#logo {}
#logo img {width:56.3068vw}
/* util */
#hd_util {right:0;top:0.5682vw}
#hd_util:after {}
#hd_util li {font-size:0.7955vw;line-height:2.0455vw;padding:0 1.0227vw;}
#hd_util li::after {width:0.0568vw;height:0.7955vw;right:0;top:50%;}
#hd_util li a {font-size: 0.7955vw;}
#hd_util li.genuine {width:4.5455vw;padding:0;border-radius:0.2841vw}
#hd_util li.select {width:6.8182vw;height:2.0455vw;margin-left:0.5682vw;}
#hd_util li select {height:2.0455vw;border:0.0568vw solid #555;border-radius:0.2841vw;padding-left:0.5682vw;width:6.8182vw;}

.gnb_wrap {border-top:0.0568vw solid #f6f6f6;}
.search_icon {right:4.5455vw;top:1.1364vw;}
.search_icon img {width:1.4205vw;}
}

@media (max-width: 1600px)  {
#hd_wrapper {width:100%;height:7.7500vw;padding:0 2.5000vw}

/* logo */
#logo {top:50%;}
#logo img {width:61.9375vw}

/* util */
#hd_util {right:2.5000vw;top:0.6250vw}
#hd_util:after {}
#hd_util li {font-size:0.8750vw;line-height:2.2500vw;padding:0 1.1250vw;}
#hd_util li::after {width:0.0625vw;height:0.8750vw;right:0;top:50%;}
#hd_util li a {font-size: 0.8750vw;}
#hd_util li.genuine {width:5.0000vw;padding:0;border-radius:0.3125vw}
#hd_util li.select {width:7.5000vw;height:2.2500vw;margin-left:0.6250vw;}
#hd_util li select {height:2.2500vw;border:0.0625vw solid #555;border-radius:0.3125vw;padding-left:0.6250vw;width:7.5000vw;}

.gnb_wrap {border-top:0.0625vw solid #f6f6f6;}
.search_icon {right:2.5000vw;top:1.2500vw;}
.search_icon img {width:1.5625vw;}
}

@media (max-width: 1400px)  {
#hd_wrapper {width:100%;height:8.8571vw;padding:0 2.8571vw}

/* logo */
#logo {top:50%;}
#logo img {width:70.7857vw}

/* util */
#hd_util {right:2.8571vw;top:0.7143vw}
#hd_util:after {}
#hd_util li {font-size:1.0000vw;line-height:2.5714vw;padding:0 1.2857vw;}
#hd_util li::after {width:0.0714vw;height:1.0000vw;right:0;top:50%;}
#hd_util li a {font-size: 1.0000vw;}
#hd_util li.genuine {width:5.7143vw;padding:0;border-radius:0.3571vw}
#hd_util li.select {width:8.5714vw;height:2.5714vw;margin-left:0.7143vw;}
#hd_util li select {height:2.5714vw;border:0.0714vw solid #555;border-radius:0.3571vw;padding-left:0.7143vw;width:8.5714vw;}

.gnb_wrap {border-top:0.0714vw solid #f6f6f6;}
.search_icon {right:2.8571vw;top:1.4286vw;}
.search_icon img {width:1.7857vw;}
}

@media (max-width: 1024px)  {
#hd_wrapper {width:100%;height:12.1094vw;padding:0 3.9063vw}

/* logo */
#logo {top:50%;}
#logo img {width:96.7773vw}

/* util */
#hd_util {right:3.9063vw;top:0.9766vw}
#hd_util:after {}
#hd_util li {font-size:1.3672vw;line-height:3.5156vw;padding:0 1.7578vw;}
#hd_util li::after {width:0.0977vw;height:1.3672vw;right:0;top:50%;}
#hd_util li a {font-size: 1.1719vw;}
#hd_util li.genuine {width:7.8125vw;padding:0;border-radius:0.4883vw}
#hd_util li.select {width:11.7188vw;height:3.5156vw;margin-left:0.9766vw;}
#hd_util li select {height:3.5156vw;border:0.0977vw solid #555;border-radius:0.4883vw;padding-left:0.9766vw;width:11.7188vw;}

.gnb_wrap {border-top:0.0977vw solid #f6f6f6;}
.search_icon {right:3.9063vw;top:1.9531vw;}
.search_icon img {width:2.4414vw;}
}

@media (max-width: 768px)  {

#hd_wrapper {width:100%;height:16.1458vw;padding:0 2.6042vw;}

/* logo */
#logo {}
#logo img {width:100%}

}

@media (max-width: 480px)  {

}

</style>	

<?php
 if($ca_id == 10){
	$sub = '0';
 } else if($ca_id == 20) {
	$sub = '1';
 } else if($ca_id == 30) {
	$sub = '2';
 } else if($ca_id == 40) {
	$sub = '3';
 } else if($ca_id == 50) {
	$sub = '4';
 } else if($ca_id == 60) {
	$sub = '5';
 } else if($ca_id == 70) {
	$sub = '6';
 } else if($type == 3) {
	$sub = '7';
 } else {
	$sub = '8';
 }
?>

<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

	<?php if(defined('_INDEX_')) { // index에서만 실행
		include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
	}
	?>

    <div id="hd_wrapper">
        <div id="logo">
        	<a href="/creative-marketing/list.php?ca_id=40"><img src="/images/marketing_hdlogo.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>
    </div>
	

</div>
<!-- } 상단 끝 -->

<div id="side_menu" style="display: none;">
	<ul id="quick">
		<li><button class="btn_sm_cl1 btn_sm"><i class="fa fa-user-o" aria-hidden="true"></i><span class="qk_tit">마이메뉴</span></button></li>
		<li><button class="btn_sm_cl2 btn_sm"><i class="fa fa-archive" aria-hidden="true"></i><span class="qk_tit">오늘 본 상품</span></button></li>
		<li><button class="btn_sm_cl3 btn_sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="qk_tit">장바구니</span></button></li>
		<li><button class="btn_sm_cl4 btn_sm"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="qk_tit">위시리스트</span></button></li>
    </ul>
    <button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>
    <div id="tabs_con">
	    <div class="side_mn_wr1 qk_con">
	    	<div class="qk_con_wr">
	    		<?php echo outlogin('shop_side'); // 아웃로그인 ?>
		        <ul class="side_tnb">
		        	<?php if ($is_member) { ?>
					<li><a href="<?php echo G5_SHOP_URL; ?>/mypage.php">마이페이지</a></li>
		            <?php } ?>
					<li><a href="<?php echo G5_SHOP_URL; ?>/orderinquiry.php">주문내역</a></li>
					<li><a href="<?php echo G5_BBS_URL ?>/faq.php">FAQ</a></li>
		            <li><a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a></li>
		            <li><a href="<?php echo G5_SHOP_URL ?>/personalpay.php">개인결제</a></li>
		            <li><a href="<?php echo G5_SHOP_URL ?>/itemuselist.php">사용후기</a></li>
		            <li><a href="<?php echo G5_SHOP_URL ?>/itemqalist.php">상품문의</a></li>
		            <li><a href="<?php echo G5_SHOP_URL; ?>/couponzone.php">쿠폰존</a></li>
		        </ul>
	        	<?php // include_once(G5_SHOP_SKIN_PATH.'/boxcommunity.skin.php'); // 커뮤니티 ?>
	    		<button type="button" class="con_close"><i class="fa fa-times-circle" aria-hidden="true"></i><span class="sound_only">나의정보 닫기</span></button>
	    	</div>
	    </div>
	    <div class="side_mn_wr2 qk_con">
	    	<div class="qk_con_wr">
	        	<?php include(G5_SHOP_SKIN_PATH.'/boxtodayview.skin.php'); // 오늘 본 상품 ?>
	    		<button type="button" class="con_close"><i class="fa fa-times-circle" aria-hidden="true"></i><span class="sound_only">오늘 본 상품 닫기</span></button>
	    	</div>
	    </div>
	    <div class="side_mn_wr3 qk_con">
	    	<div class="qk_con_wr">
	        	<?php include_once(G5_SHOP_SKIN_PATH.'/boxcart.skin.php'); // 장바구니 ?>
	    		<button type="button" class="con_close"><i class="fa fa-times-circle" aria-hidden="true"></i><span class="sound_only">장바구니 닫기</span></button>
	    	</div>
	    </div>
	    <div class="side_mn_wr4 qk_con">
	    	<div class="qk_con_wr">
	        	<?php include_once(G5_SHOP_SKIN_PATH.'/boxwish.skin.php'); // 위시리스트 ?>
	    		<button type="button" class="con_close"><i class="fa fa-times-circle" aria-hidden="true"></i><span class="sound_only">위시리스트 닫기</span></button>
	    	</div>
	    </div>
    </div>
</div>
<div class="black_bg"></div>
<script>
jQuery(function ($){
	$(".btn_member_mn").on("click", function() {
        $(".member_mn").toggle();
        $(".btn_member_mn").toggleClass("btn_member_mn_on");
    });
    
    var active_class = "btn_sm_on",
        side_btn_el = "#quick .btn_sm",
        quick_container = ".qk_con";

    $(document).on("click", side_btn_el, function(e){
        e.preventDefault();

        var $this = $(this);
        
        if (!$this.hasClass(active_class)) {
            $(side_btn_el).removeClass(active_class);
            $this.addClass(active_class);
        }

        if( $this.hasClass("btn_sm_cl1") ){
            $(".side_mn_wr1").show();
        } else if( $this.hasClass("btn_sm_cl2") ){
            $(".side_mn_wr2").show();
        } else if( $this.hasClass("btn_sm_cl3") ){
            $(".side_mn_wr3").show();
        } else if( $this.hasClass("btn_sm_cl4") ){
            $(".side_mn_wr4").show();
        }
    }).on("click", ".con_close", function(e){
        $(quick_container).hide();
        $(side_btn_el).removeClass(active_class);
    });

    $(document).mouseup(function (e){
        var container = $(quick_container),
            mn_container = $(".shop_login");
        if( container.has(e.target).length === 0){
            container.hide();
            $(side_btn_el).removeClass(active_class);
        }
        if( mn_container.has(e.target).length === 0){
            $(".member_mn").hide();
            $(".btn_member_mn").removeClass("btn_member_mn_on");
        }
    });

    $("#top_btn").on("click", function() {
        $("html, body").animate({scrollTop:0}, '500');
        return false;
    });
});
</script>

<script>
    $(".ham").on("click", function() {
        $(".right_menu").addClass('on');
		$(".black_bg").fadeIn();
    });

    $(".menu_close, .black_bg").on("click", function() {
        $(".right_menu").removeClass('on');
		$(".black_bg").fadeOut();
    });
     $(".cate_bg").on("click", function() {
        $(".menu").hide();
    });
	$(".right_menu .menu_detail .menu_wrap > ul > li > a").click(function(){
		$(this).parent('li').find('> ul').slideToggle();
		$(this).parent('li').siblings('li').find('> ul').slideUp();
	})
</script>

<?php
    $wrapper_class = array();
    if( defined('G5_IS_COMMUNITY_PAGE') && G5_IS_COMMUNITY_PAGE ){
        $wrapper_class[] = 'is_community';
    }
?>

<style>
.slidebanner .swiper-slide{width: 700px; position: relative;}
.slidebanner .swiper-slide p{width: 100%; height:100%; background: rgba(0,0,0,0.5); position: absolute; top:0; left:0; border-radius:30px;}
.slidebanner .swiper-slide-active p{display: none;}
#slidebanner .optionbox{ width: 230px; margin:0 auto; margin-top: 25px; display:flex; justify-content:center; align-items:center;}
#slidebanner .pagination_fraction{text-align: center; font-size: 16px; font-weight: bold;}

@media (max-width:1760px)  {

.slidebanner .swiper-slide{width: 39.7727vw; }
.slidebanner .swiper-slide p{border-radius:1.7045vw;}
.slidebanner .swiper-slide-active p{}
#slidebanner .optionbox{ width: 13.0682vw; margin-top: 1.4205vw;}
#slidebanner .pagination_fraction{ font-size: 0.9091vw; }

}

@media (max-width:1600px)  {

.slidebanner .swiper-slide{width: 43.7500vw; }
.slidebanner .swiper-slide p{border-radius:1.8750vw;}
.slidebanner .swiper-slide-active p{}
#slidebanner .optionbox{ width: 14.3750vw; margin-top: 1.5625vw;}
#slidebanner .pagination_fraction{ font-size: 1.0000vw; }

}

@media (max-width:1400px)  {

.slidebanner .swiper-slide{width: 50.0000vw; }
.slidebanner .swiper-slide p{border-radius:2.1429vw;}
.slidebanner .swiper-slide-active p{}
#slidebanner .optionbox{ width: 16.4286vw; margin-top: 1.7857vw;}
#slidebanner .pagination_fraction{ font-size: 1.1429vw; }

}

@media (max-width:1024px)  {

.slidebanner .swiper-slide{width: 68.3594vw; }
.slidebanner .swiper-slide p{border-radius:2.9297vw;}
.slidebanner .swiper-slide-active p{}
#slidebanner .optionbox{ width: 22.4609vw; margin-top: 2.4414vw;}
#slidebanner .pagination_fraction{ font-size: 1.5625vw; }

}

@media (max-width:768px)  {

.slidebanner .swiper-slide{width: 91.1458vw; }
.slidebanner .swiper-slide p{display: none;}
.slidebanner .swiper-slide-active p{}
#slidebanner .optionbox{ width: 29.9479vw; margin:0 auto; margin-top: 3.2552vw; }
#slidebanner .pagination_fraction{ font-size: 2.0833vw; }

}

@media (max-width:480px)  {

.slidebanner .swiper-slide p{display: none;}
.slidebanner .swiper-slide-active p{}
#slidebanner .optionbox{width: 47.9167vw; margin:0 auto; margin-top: 5.2083vw;}
#slidebanner .pagination_fraction{ font-size: 4vw; }

}
</style>

<!-- 전체 콘텐츠 시작 { -->
<div id="wrapper" class="">
	<!-- 배너 -->
	<div id="slidebanner" style="<?php if($_GET['it_id']) echo 'display:none;' ?>">
		<div class="swiper-container slidebanner">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><a href="/creative-marketing/item.php?it_id=1695021821"><img src="/images/slide1.png" alt=""></a><p></p></div>
				<div class="swiper-slide"><a href="/creative-marketing/item.php?it_id=1695022677"><img src="/images/slide3.png" alt=""></a><p></p></div>
				<div class="swiper-slide"><a href="/creative-marketing/item.php?it_id=1695022603"><img src="/images/slide2.png" alt=""></a><p></p></div>
			</div>
		</div>
		<div class="optionbox">
			<a href="javascript:;" class="prev"><img src="/images/prev.png" alt=""></a>
			<div class="pagination_fraction"></div>
			<a href="javascript:;" class="next"><img src="/images/next.png" alt=""></a>
		</div>
	</div>
	


    <!-- #container 시작 { -->
    <div id="container">

        