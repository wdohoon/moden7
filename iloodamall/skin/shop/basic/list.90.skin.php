<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);

// 장바구니 또는 위시리스트 ajax 스크립트
add_javascript('<script src="'.G5_JS_URL.'/shop.list.action.js"></script>', 10);

?>


<style>
.sct_90  {}
.sct_90 li {width:400px;margin-right:15px;margin-bottom:70px;}
.sct_90 li .sct_img {position:relative;}
.sct_90 li .sct_img a {display:block;width: 100%;height: 100%;}
.sct_90 li .sct_bottom {position:relative;margin-top:15px;}
.sct_90 li .sct_bottom .sct_txt {letter-spacing:-0.04em;}
.sct_90 li .sct_bottom .sct_txt .sct_title {font-size:20px;color:#3d3d3d;margin-bottom:5px;line-height:30px;}
.sct_90 li .sct_bottom .sct_txt .sct_basic {font-size: 20px;color:#aeaeae;}
.sct_90 li .sct_bottom .sct_txt p {color:#b1b4b9; font-size: 20px;font-weight: 700;margin-top:5px;}
.sct_90 li .sct_bottom .sct_btn {position:absolute;right:10px;top:0;z-index:99;}
.sct_90 li .sct_bottom .sct_btn button {background:transparent;border:none;}
.sct_90 li .sct_bottom .sct_btn button.btn_cart.sct_cart {margin-right:5px;}

.iconicon {position:absolute;left:5px;top:5px;z-index:9;}
.sct_90 li .sct_img .blbl {margin-right:5px;}
@media (max-width: 1760px)  {
.sct_90  {}
.sct_90 li {width:22.7273vw;margin-right:0.8523vw;margin-bottom:3.9773vw;}
.sct_90 li .sct_img {}
.sct_90 li .sct_bottom {position:relative;}
.sct_90 li .sct_bottom .sct_txt {letter-spacing:-0.04em;}
.sct_90 li .sct_bottom .sct_txt .sct_title {font-size:1.1364vw;color:#3d3d3d;margin-bottom:0.2841vw;line-height:1.7045vw;}
.sct_90 li .sct_bottom .sct_txt .sct_basic {font-size: 1.1364vw;color:#aeaeae;}
.sct_90 li .sct_bottom .sct_txt p {font-size: 1.1364vw;font-weight: 700;margin-top:0.2841vw;}
.sct_90 li .sct_bottom .sct_btn {position:absolute;right:0.5682vw;top:0;z-index:99;}
.sct_90 li .sct_bottom .sct_btn button {background:transparent;border:none;}
}

@media (max-width: 1600px)  {
.sct_90  {}
.sct_90 li {width:25.0000vw;margin-right:0.9375vw;margin-bottom:4.3750vw;}
.sct_90 li .sct_img {}
.sct_90 li .sct_bottom {}
.sct_90 li .sct_bottom .sct_txt {letter-spacing:-0.04em;}
.sct_90 li .sct_bottom .sct_txt .sct_title {font-size:1.2500vw;margin-bottom:0.3125vw;line-height:1.8750vw;}
.sct_90 li .sct_bottom .sct_txt .sct_basic {font-size: 1.2500vw;}
.sct_90 li .sct_bottom .sct_txt p {font-size: 1.2500vw;margin-top:0.3125vw;}
.sct_90 li .sct_bottom .sct_btn {right:0.6250vw;top:0;}
.sct_90 li .sct_bottom .sct_btn button {background:transparent;border:none;}

}

@media (max-width: 1400px)  {
.sct_90  {}
.sct_90 li {width:28.5714vw;margin-right:1.0714vw;margin-bottom:5.0000vw;}
.sct_90 li .sct_img {}
.sct_90 li .sct_bottom {}
.sct_90 li .sct_bottom .sct_txt {letter-spacing:-0.04em;}
.sct_90 li .sct_bottom .sct_txt .sct_title {font-size:1.4286vw;margin-bottom:0.3571vw;line-height:2.1429vw;}
.sct_90 li .sct_bottom .sct_txt .sct_basic {font-size: 1.4286vw;}
.sct_90 li .sct_bottom .sct_txt p {font-size: 1.4286vw;margin-top:0.3571vw;}
.sct_90 li .sct_bottom .sct_btn {right:0.7143vw;top:0;}
.sct_90 li .sct_bottom .sct_btn button {background:transparent;border:none;}

}

@media (max-width: 1024px)  {
.sct_90  {}
.sct_90 li {width:39.0625vw;margin-right:1.4648vw;margin-bottom:6.8359vw;}
.sct_90 li .sct_img {}
.sct_90 li .sct_bottom {}
.sct_90 li .sct_bottom .sct_txt {letter-spacing:-0.04em;}
.sct_90 li .sct_bottom .sct_txt .sct_title {font-size:1.9531vw;margin-bottom:0.4883vw;line-height:2.9297vw;}
.sct_90 li .sct_bottom .sct_txt .sct_basic {font-size: 1.9531vw;}
.sct_90 li .sct_bottom .sct_txt p {font-size: 1.9531vw;margin-top:0.4883vw;}
.sct_90 li .sct_bottom .sct_btn {right:0.9766vw;top:0;}
.sct_90 li .sct_bottom .sct_btn button {background:transparent;border:none;}

}

@media (max-width: 768px)  {

}

@media (max-width: 480px)  {

}
</style>
<!-- 상품진열 20 시작 { -->
<?php
$i=0;
foreach((array) $list as $row){

    if( empty($row) ) continue;
    $i++;

    $item_link_href = shop_item_url($row['it_id']);
    $star_score = $row['it_use_avg'] ? (int) get_star($row['it_use_avg']) : '';

    if ($this->list_mod >= 2) { // 1줄 이미지 : 2개 이상
        if ($i%$this->list_mod == 0) $sct_last = ' sct_last'; // 줄 마지막
        else if ($i%$this->list_mod == 1) $sct_last = ' sct_clear'; // 줄 첫번째
        else $sct_last = '';
    } else { // 1줄 이미지 : 1개
        $sct_last = ' sct_clear';
    }

    if ($i == 1) {
        if ($this->css) {
            echo "<ul class=\"{$this->css} swiper-wrapper\">\n";
        } else {
            echo "<ul class=\"sct sct_90 swiper-wrapper\">\n";
        }
    }

    echo "<li class=\"sct_li{$sct_last} swiper-slide\" data-css=\"nocss\">\n";

    if ($this->href) {
        echo "<div class=\"sct_img\"><a href=\"{$item_link_href}\" class=\"sct_a\">\n";
    }
	
	echo "<div class=\"iconicon\">\n";
		if($row['it_type3'] == '1'){
			echo "<img src='/images/icon/new.png' alt='' class='blbl'>";			
		}
		if($row['it_type4'] == '1'){
			echo "<img src='/images/icon/best.png' alt='' class='blbl'>";			
		}
	echo "</div>\n";
    if ($this->href) {
        //echo "<a href=\"{$item_link_href}\"><span><img src=\"/images/icon_view.png\" alt=\"자세히보기\"></span>\n";
    }

    if ($this->view_it_img) {
        echo get_it_image($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
    }
	
    if ($this->href) {
        echo "</a></div>\n";
    }
	
	echo "<div class=\"cart-layer\"></div>\n";

    if ($this->view_it_icon) {
        echo "<div class=\"sct_icon\">".item_icon($row)."</div>\n";
    }

    if ($this->view_it_id) {
        echo "<div class=\"sct_id\">&lt;".stripslashes($row['it_id'])."&gt;</div>\n";
    }
	
	
	
	echo "<div class=\"sct_bottom\">\n";

    if ($this->href) {
        echo "<div class=\"sct_txt\"><a href=\"{$item_link_href}\" class=\"sct_a\">\n";
    }

    if ($this->view_it_name) {
		echo "<div class=\"sct_title\">".stripslashes($row['it_name'])."</div>\n";
    }
	
	if ($this->view_it_basic && $row['it_basic']) {
        echo "<div class=\"sct_basic\">".stripslashes($row['it_basic'])."</div>\n";
    }

    if ($this->href) {
        echo "</a></div>\n";
    }
	
	if(!$row['it_tel_inq']) {
		if ( !$is_soldout ){    // 품절 상태가 아니면 출력합니다.
			echo "<div class=\"sct_btn list-10-btn\">
				<button type=\"button\" class=\"btn_cart sct_cart\" data-it_id=\"{$row['it_id']}\"><img src='/images/cart.png' alt=''></button>\n";
			echo "<button type=\"button\" class=\"btn_wish\" data-it_id=\"{$row['it_id']}\"><img src='/images/wish.png' alt=''></button>\n";
			echo "</div>\n";
		}
	} else {
	
	}
	
	echo "<div class=\"sct_txt\"><a href=\"{$item_link_href}\" class=\"sct_a\">\n";
	if($row['it_tel_inq'] == '1'){
		echo "<p>문의</p>\n";
	}else {
		if($member['mb_id']){
			echo "<p>".display_price(get_price($row), $row['it_tel_inq'])."</p>\n";
		} else {
			echo "<p>문의</p>\n";
			//echo "<p>".display_price($row['it_cust_price'])."</p>\n";
		}
		//echo "<p>".display_price($row['it_cust_price'])."</p>\n";
		//echo display_price(get_price($row), $row['it_tel_inq'])."\n";
	}
	echo "</a></div>\n";

	if($this ->href) {
		//echo "<div class=\"sct_basic\">ID : ".stripslashes($config['cf_10'])."</div>\n";
	}
    if ($this->view_it_basic && $row['it_basic']) {
        //echo "<div class=\"sct_basic\">".stripslashes($row['it_basic'])."</div>\n";
		//echo "<div class=\"sct_basic\">ID : ".stripslashes($config['cf_10'])."</div>\n";
    }


    if ($this->view_sns) {
        $sns_url  = $item_link_href;
        $sns_title = get_text($row['it_name']).' | '.get_text($config['cf_title']);
        echo "<div class=\"sct_sns\">";
        echo get_sns_share_link('facebook', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/sns_fb_s.png');
        echo get_sns_share_link('twitter', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/sns_twt_s.png');
        echo get_sns_share_link('googleplus', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/sns_goo_s.png');
        echo "</div>\n";
    }
	
	// 위시리스트 + 공유 버튼 시작
        //echo "<div class=\"sct_op_btn\">\n";
       // echo "<button type=\"button\" class=\"btn_wish\" data-it_id=\"{$row['it_id']}\"><span class=\"sound_only\">위시리스트</span><i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i></button>\n";
        
        //echo "</div>\n";
        // 위시리스트 + 공유 버튼 끝
	echo "</div>";
    echo "</li>\n";
}

if ($i >= 1) echo "</ul>\n";

if($i == 0) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
?>
<!-- } 상품진열 20 끝 -->

