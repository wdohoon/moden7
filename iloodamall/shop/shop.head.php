<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$q = isset($_GET['q']) ? clean_xss_tags($_GET['q'], 1, 1) : '';

$admin_accounts = ['admin', 'log_admin', 'sub_admin', 'as_admin', 'shop_admin', 'board_admin', 'member_admin','ilooda3','ilooda2'];
$is_admin = $is_member && in_array($member['mb_id'], $admin_accounts);

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');

add_javascript('<script src="'.G5_JS_URL.'/owlcarousel/owl.carousel.min.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/owlcarousel/owl.carousel.css">', 0);

//  자동 배송완료 만들기
    $beforedays = date("Y-m-d H:i:s", ( time() - (86400 * 3) ) ); // 86400초는 하루
    $sql22 = " select * from {$g5['g5_shop_cart_table']} where ct_status = '배송' and ct_time <= '$beforedays' ";

$result22 = sql_query($sql22);
    for ($i=0; $row22=sql_fetch_array($result22); $i++) {

/*
echo "update {$g5['g5_shop_cart_table']} set ct_status = '완료' where ct_id = '{$row22['ct_id']}' ";
echo "<br>";
echo "update {$g5['g5_shop_order_table']} set od_status = '완료' where  od_id = '{$row22['od_id']}' ";
echo "<br>";echo "<br>";
*/
sql_query("update {$g5['g5_shop_cart_table']} set ct_status = '완료' where ct_id = '{$row22['ct_id']}' ");  // 오더테이블
sql_query("update {$g5['g5_shop_order_table']} set od_status = '완료' where od_id = '{$row22['od_id']}' ");  // 카트테이블
}

?>
<?php
	if($is_member || $member['mb_level'] >= 2){

	} else {
		//alert('관리자 인증후 홈페이지 사용이 가능합니다.');
	}
	$sql = "select * from g5_shop_order where od_status = '주문' and od_settle_case = '무통장' and DATE_ADD(od_time, INTERVAL 3 DAY) < NOW() and od_kakao != 1";
	$result = sql_query($sql);

	for($i = 0; $row = sql_fetch_array($result); $i++){
		$od_name = $row['od_name'];
		$od_hp = $row['od_hp'];
		$od_id = $row['od_id'];
		$od_cart_price = $row['od_cart_price'];
		$od_bank_account = $row['od_bank_account'];
		include '../kakao/deposit_request.php';
		$sql = "update g5_shop_order set od_kakao = 1 where od_id = '$od_id'";
		sql_query($sql);
	}
?>
<style>
/*사이드 메뉴*/
#side_menu{position:fixed;top:0;right:0;z-index:99999;height:100%;background:#fff;}
.side_menu_wr{display:none;width:236px;overflow-y:auto;height: 100%;border-left:1px solid #d6d6d6;}
#btn_sidemenu{/* position:absolute;top:50%;left:-47px;width:39px;height:39px;margin-top:-20px;background:none;border:0px solid #cdcdcd;border-right:0;font-size:14px */}
#side_menu .side_menu_shop{padding:10px 20px;border-bottom:1px solid #f3f3f3}
#side_menu .btn_side_shop{position:relative;background:none;border:0;width:100%;height:30px;text-align:left;font-weight:bold}
#side_menu .btn_side_shop span{position:absolute;top:5px;right:0;padding:0 5px;line-height:20px;border-radius:10px;color:#fff;background:#ed1c24}
#side_menu .side_menu_shop .op_area{ display:none;border-top:1px solid #f3f3f3;margin:5px 0}
#side_menu .side_menu_shop .op_area h2{position:absolute;font-size:0;line-height:0;overflow:hidden}
#side_menu .side_menu_shop .op_area li{border-bottom:1px solid #f3f3f3;position:relative;padding:10px 0;min-height:80px;padding-left:70px}
#side_menu .side_menu_shop .op_area li .prd_img{position:absolute;top:10px;left:0px;}
#side_menu .side_menu_shop .op_area li .prd_cost{display:block;font-weight:bold;margin:3px 0 0}
#side_menu .side_menu_shop .op_area  .li_empty{padding:50px 0;padding-left:0;color:#999;border-bottom:1px solid #f3f3f3;text-align:center}

#tabs_con {height:100%;text-align:left}

.side_mn_wr1 {display:none;width:230px;overflow-y:auto;height:100%}
.side_mn_wr2 {display:none;width:230px;overflow-y:auto;height:100%}
.side_mn_wr3 {display:none;width:230px;overflow-y:auto;height:100%}
.side_mn_wr4 {display:none;width:230px;overflow-y:auto;height:100%}
.btn_sm_on i {color:#222}

.qk_con {display:none;position:relative;width:230px;height:100%;background:#fff;border-left:1px solid #f0f0f0}
.qk_con h2.s_h2 {position:relative;margin:0;font-size:1.25em;padding:15px;border-bottom:1px solid #e5e7ea}
.qk_con h2.s_h2 span {display:inline-block;min-width:20px;padding:2px 8px;border-radius:30px;text-align:center;background:#eff5ff;color:#3b8afc;font-size:0.7em;font-weight:normal;vertical-align:text-bottom}
.qk_con_wr {padding:0;height:100%;overflow-y:auto}
.qk_con_wr .btn_side_shop {position:relative;width:100%;height:30px;background:none;border:0;text-align:left;font-weight:bold}
.qk_con_wr .btn_side_shop span {position:absolute;top:5px;right:0;padding:0 5px;line-height:20px;border-radius:10px;color:#fff;background:#ed1c24}
.qk_con_wr .con_close {position:fixed;top:0;right:230px;width:50px;height:50px;border:0;background:none;font-size:25px;color:#dedede}
.qk_con_wr .con_close:hover {color:rgba(0,0,0,0.8)}
.qk_con_wr .side_tnb {padding:25px}
.qk_con_wr .side_tnb li a {display:block;line-height:28px;color:#465168;padding:5px 0}
.qk_con_wr .side_tnb li:hover a {color:#222}

#category {display:none;position:absolute;border:1px solid #c5d6da;width:100%;background:#fff;z-index:1000;-webkit-box-shadow:0 2px 5px rgba(0,0,0,0.2);
-moz-box-shadow:0 2px 5px rgba(0,0,0,0.2);
box-shadow:0 2px 5px rgba(0,0,0,0.2)}
#category h2 {font-size:1.3em;padding:15px 20px;border-bottom:1px solid #e7eeef}
#category ul:after {display:block;visibility:hidden;clear:both;content:""}
#category ul li:nth-child(5n+1) {border-left:0}
#category .cate_li_1 {float:left;width:20%;min-height:150px;padding:20px;border-left:1px solid #e7eeef}
#category .cate_li_1_a {font-size:1.2em;display:block;position:relative;margin-bottom:10px;font-weight:bold;color:#222}
#category .cate_li_2 {line-height:2em}
#category .cate_li_2 a {color:#555}
#category .close_btn {position:absolute;top:0;right:0;width:50px;height:50px;background:#fff;color:#b6b9bb;border:0;vertical-align:top;font-size:18px}
#category_all_bg {display:none;background:rgba(0,0,0,0.1);width:100%;height:100%;position:fixed;left:0;top:0;z-index:999}
#category .no-cate{text-align:center;padding:15px}

/* header */
/* side quick */
.side_menu_wr {}
.new_side_box_wrap {padding:100px 0px 0px 28px;}
.new_side_box01 {margin-bottom:10px}
.new_side_title {line-height:36px;border-bottom:1px solid #171717;color:#171717;font-size:12px;text-align:left;font-weight:400;}
.new_side_con01 {padding:18px 0px;}
.new_side_con01 ul {overflow:hidden;}
.new_side_con01 ul li {float:left;border:1px solid #dedede;border-left:0;border-top:0;}
.new_side_con01 ul li:nth-child(2n-1) {border-left:1px solid #dedede;}
.new_side_con01 ul li:nth-child(1),.new_side_con01 ul li:nth-child(2) {border-top:1px solid #dedede;}
.nsc_btn {display:block;width:90px;height:80px;background-repeat:no-repeat;background-position:center top 15px;text-align:center;padding-top:58px;font-size:12px;color:#737373;background-color:#fff;line-height:1.3m;
 -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
    -ms-transition: all 0.20s ease-in-out;
    -o-transition: all 0.20s ease-in-out;
}

/* 메뉴 오픈시 상단 */
.nsc_btn01 {background-image:url('/images/quick02_icon01.png');}
.nsc_btn02 {background-image:url('/images/quick02_icon02.png');}
.nsc_btn03 {background-image:url('/images/quick02_icon03_v1.png');}
.nsc_btn04 {background-image:url('/images/quick02_icon04.png');}
.nsc_btn05 {background-image:url('/images/quick02_icon05.png');}
.nsc_btn06 {background-image:url('/images/quick02_icon06.png');}
.nsc_btn07 {background-image:url('/images/quick02_icon07.png');}
.nsc_btn08 {background-image:url('/images/quick02_icon08.png');}
.nsc_btn09 {background-image:url('/images/quick02_icon09.png');}
.nsc_btn:hover {color:#fff;background-color:#737373}
.nsc_btn01:hover {background-image:url('/images/quick02_icon01_on.png');}
.nsc_btn02:hover {background-image:url('/images/quick02_icon02_on.png');}
.nsc_btn03:hover {background-image:url('/images/quick02_icon03_on_v1.png');}
.nsc_btn04:hover {background-image:url('/images/quick02_icon04_on.png');}
.nsc_btn05:hover {background-image:url('/images/quick02_icon05_on.png');}
.nsc_btn06:hover {background-image:url('/images/quick02_icon06_on.png');}
.nsc_btn07:hover {background-image:url('/images/quick02_icon07_on.png');}
.nsc_btn08:hover {background-image:url('/images/quick02_icon08_on.png');}
.nsc_btn09:hover {background-image:url('/images/quick02_icon09_on.png');}

.new_side_btn01 {display:block;width:182px;line-height:24px;text-align:Center;margin-left:0px;color:#676767;font-size:10px;margin-bottom:3px;border:1px solid #dedede}


.new_side_con02 {padding:12px 0px 22px;}
.new_side_text01 {font-size:15px;;line-height:1.4em;color:#181818;text-align:left;font-weight:500;margin-bottom:10px}
.new_side_text02 {font-size:11px;;line-height:1.6em;color:#676767;text-align:left;font-weight:400;}
.new_side_text03 {font-size:11px;;line-height:1.4em;color:#676767;text-align:left;font-weight:400;margin-top:10px}

.new_side_con0201 {margin-top:15px;}
.new_side_con0201 ul {overflow:hidden;}
.new_side_con0201 ul li {float:left;}
.new_side_con0201 ul li a {display:block;width:92px;margin:0px auto;text-align:Center;border:1px solid #dedede;}

.side_menu_btn_box {position:absolute;top:48%;left:-60px;
   -webkit-transform: translate(0px,-50%);
    -ms-transform: translate(0px,-50%);
    transform: translate(0px,-50%);
}

.side_menu_btn_box ul li {;}
#btn_sidemenu {display:block; width:46px;height:46px;text-align:center;border:0;background:none;}
.quick_show {width:46px;height:46px;background:url(/images/side_menu.png) no-repeat;background-position:Center;border:1px solid #373737;border-radius:23px;background-color:#fff;}
.quick_show.quick_close {width:46px;height:46px;background:url(/images/side_close.png) no-repeat;background-position:Center;background-color:#fff;border-radius:23px;}


.new_side_box03 {padding:30px 0 80px;/* padding-right:25px */;text-align:left;}
#hd {background:#fff;}
#hd_wrapper {width:100%;height:155px;position:relative;z-index:99;background:#fff;}
#hd_wrapper.on {border-bottom:1px solid #e5e5e5;}
.pc_wrap {width:1600px;margin:0 auto;}
.util_wrap {height:65px;position:relative;}
.util_wrap:after {content:"";display:block;clear:both;}
/* logo */
#logo {float:none;padding:0px 0 0;/* position:absolute;left:0;top:50%;transform:translateY(-50%); */}
#logo img {width:150px;}
/* util */
#hd_util {position:absolute;right:0;top:25px;}
#hd_util:after {display:block;visibility:hidden;clear:both;content:""}
#hd_util li {float:left;font-size:14px;line-height:24px;position:relative;text-align:center;padding:0 18px;}
#hd_util li::after {content:"";display:block;width:1px;height:14px;background:#8f8f8f;position:absolute;right:0;top:50%;transform:translateY(-50%)}
#hd_util li.no-line::after {display: none;}
#hd_util li:last-child {padding-right:0;}
#hd_util li a {display:inline-block;color:#666;font-size: 12px;font-weight:500; color:#000;}
#hd_util li.genuine {background:#000;width:80px;padding:0; margin-right: 10px;}
#hd_util li.genuine a {color:#fff;display: block;}
#hd_util li.ilooda{ padding: 0;}
#hd_util li.ilooda a{display: block;border:1px solid #000; height: 24px;padding:0 5px;position:relative;width:120px;}
#hd_util li.ilooda a img{max-width:100%;height:auto;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%)}
#hd_util li.select {width:120px;height:24px;margin-left:10px;}
#hd_util li select {height:24px;border:1px solid #000;padding-left:10px;padding-bottom: 3px;width:120px;position:absolute;left:0;top:0; font-size: 12px;}

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
.other div {}
.other div.ilooda {width:100%;height:48px;line-height:48px;text-align: center;}
.other div.ilooda a {color:#fff;font-size: 18px; display: block;}

/* 새로운 header */
.header_bg {display: none;background:#fff;width:100%;height:540px;position:absolute;left:0;top:0;z-index:98;}
.gnb_box {height:90px;position:relative;z-index:99;}
.gnb_box:after {content:"";display:block;clear:both;}
.gnb_box #logo {float:left;padding-top:34px;}
.gnb_box .gnb_wrapper {float:left;margin-left: 30px;}
.gnb_box .gnb_wrapper:after {content:"";display:block;clear:both;}
.gnb_box .gnb_wrapper > li {float:left;position:relative;}
.gnb_box .gnb_wrapper > li.act:after {content:"";display:block;position:absolute;left:50%;bottom:1px;transform:translateX(-50%);width:85px;height:3px;background:#f4a66c ;}
.gnb_box .gnb_wrapper > li > a {padding:0 30px;font-size: 18px;font-weight: 500;letter-spacing:-0.02em;display:block;line-height:90px;}
.gnb_box .gnb_wrapper > li .lnb_wrapper {display:none;padding-top:20px;position:absolute;left:0;top:90px;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li {padding-left:30px;line-height:32px;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li a {font-size: 14px; font-weight: 500;}

.gnb_box .jungfum {background:#d4dbe7;height: 40px;line-height:40px;font-size: 18px;font-weight: 500;text-align: center;display:block;width:210px;position:absolute;right:0;top:50%;transform:translateY(-50%);border-radius:50px;}
@media (max-width: 1760px)  {
#hd {background:#fff;}
#hd_wrapper {width:100%;height:8.8068vw;background:#fff;}
#hd_wrapper.on {border-bottom:0.0568vw solid #e5e5e5;}
.pc_wrap {width:90.9091vw;margin:0 auto;}

.util_wrap {height:3.6932vw;}

.util_wrap:after {clear:both;}
/* logo */
#logo {padding:0.0000vw 0 0;/* left:0;top:50%;transform:translateY(-50%); */}
#logo img {width:8.5227vw;}
/* util */
#hd_util {}
#hd_util:after {visibility:hidden;clear:both;content:""}
#hd_util li {font-size:0.7955vw;line-height:1.4773vw;padding:0 1.0227vw;}
#hd_util li::after {width:0.0568vw;height:0.7955vw;background:#8f8f8f;right:0;top:50%;transform:translateY(-50%)}
#hd_util li.no-line::after {}
#hd_util li:last-child {padding-right:0;}
#hd_util li a {font-size: 0.6818vw;}
#hd_util li.genuine {background:#000;width:4.5455vw;padding:0; margin-right: 0.5682vw;}
#hd_util li.genuine a {}
#hd_util li.ilooda{ padding: 0;}
#hd_util li.ilooda a{border:0.0568vw solid #000; height: 1.4773vw;padding:0 0.2841vw;width:6.8182vw;}
#hd_util li.ilooda a img{max-width:100%;height:auto;left:50%;top:50%;transform:translate(-50%,-50%)}
#hd_util li.select {width:6.8182vw;height:1.4773vw;margin-left:0.5682vw;}
#hd_util li select {height:1.4773vw;border:0.0568vw solid #000;padding-left:0.5682vw;width:6.8182vw;left:0;top:0;font-size: 0.6818vw; }

.gnb_wrap {border-top:0.0568vw solid #f6f6f6;}
.gnb_wrap.off {}
.search_icon {right:9.0909vw;top:1.1364vw;}
.search_icon img {width:1.4205vw;}

.black_bg { width: 100%; height: 100%; background: rgba(0,0,0,.5);  top: 0; left: 0; }


.other {margin-top:0.5682vw;padding-top:1.4205vw;border-top:0.0568vw solid #dedede;}
.other:after {clear: both;}
.other div {}
.other div.ilooda {width:100%;height:2.7273vw;line-height:2.7273vw;}
.other div.ilooda a {font-size: 1.0227vw; }

/* 새로운 header */
.header_bg {background:#fff;width:100%;height:30.6818vw;left:0;top:0;}
.gnb_box {height:5.1136vw;}
.gnb_box:after {clear:both;}
.gnb_box #logo {padding-top:1.9318vw;}
.gnb_box .gnb_wrapper {margin-left: 1.7045vw;}
.gnb_box .gnb_wrapper:after {clear:both;}
.gnb_box .gnb_wrapper > li {}
.gnb_box .gnb_wrapper > li.act:after {left:50%;bottom:0.0568vw;transform:translateX(-50%);width:4.8295vw;height:0.1705vw;background:#f4a66c ;}
.gnb_box .gnb_wrapper > li > a {padding:0 1.7045vw;font-size: 1.0227vw;letter-spacing:-0.02em;line-height:5.1136vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper {padding-top:1.1364vw;left:0;top:5.1136vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li {padding-left:1.7045vw;line-height:1.8182vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li a {font-size: 0.7955vw;}

.gnb_box .jungfum {background:#d4dbe7;height: 2.2727vw;line-height:2.2727vw;font-size: 1.0227vw;width:11.9318vw;right:0;top:50%;transform:translateY(-50%);border-radius:2.8409vw;}
}

@media (max-width: 1600px)  {
#hd {background:#fff;}
#hd_wrapper {width:100%;height:9.6875vw;background:#fff;}
#hd_wrapper.on {border-bottom:0.0625vw solid #e5e5e5;}
.pc_wrap {width:100%;margin:0 auto;padding:0 1.2500vw}
.util_wrap {height:4.0625vw;}
.util_wrap:after {clear:both;}
/* logo */
#logo {padding:0.0000vw 0 0;/* left:0;top:50%;transform:translateY(-50%); */}
#logo img {width:9.3750vw;}
/* util */
#hd_util {}
#hd_util:after {visibility:hidden;clear:both;content:""}
#hd_util li {font-size:0.8750vw;line-height:1.6250vw;padding:0 1.1250vw;}
#hd_util li::after {width:0.0625vw;height:0.8750vw;background:#8f8f8f;right:0;top:50%;transform:translateY(-50%)}
#hd_util li.no-line::after {}
#hd_util li:last-child {padding-right:0;}
#hd_util li a {font-size: 0.7500vw;}
#hd_util li.genuine {background:#000;width:5.0000vw;padding:0; margin-right: 0.6250vw;}
#hd_util li.genuine a {}
#hd_util li.ilooda{ padding: 0;}
#hd_util li.ilooda a{border:0.0625vw solid #000; height: 1.6250vw;padding:0 0.3125vw;width:7.5000vw;}
#hd_util li.ilooda a img{max-width:100%;height:auto;left:50%;top:50%;transform:translate(-50%,-50%)}
#hd_util li.select {width:7.5000vw;height:1.6250vw;margin-left:0.6250vw;}
#hd_util li select {height:1.6250vw;border:0.0625vw solid #000;padding-left:0.6250vw;width:7.5000vw;left:0;top:0;font-size: 0.7500vw;}

.gnb_wrap {border-top:0.0625vw solid #f6f6f6;}
.gnb_wrap.off {}
.search_icon {right:10.0000vw;top:1.2500vw;}
.search_icon img {width:1.5625vw;}

.black_bg { width: 100%; height: 100%; background: rgba(0,0,0,.5);  top: 0; left: 0; }

.other {margin-top:0.6250vw;padding-top:1.5625vw;border-top:0.0625vw solid #dedede;}
.other:after {clear: both;}
.other div {}
.other div.ilooda {width:100%;height:3.0000vw;line-height:3.0000vw;}
.other div.ilooda a {font-size: 1.1250vw; }

/* 새로운 header */
.header_bg {background:#fff;width:100%;height:33.7500vw;left:0;top:0;}
.gnb_box {height:5.6250vw;}
.gnb_box:after {clear:both;}
.gnb_box #logo {padding-top:2.1250vw;}
.gnb_box .gnb_wrapper {margin-left: 1.8750vw;}
.gnb_box .gnb_wrapper:after {clear:both;}
.gnb_box .gnb_wrapper > li {}
.gnb_box .gnb_wrapper > li.act:after {left:50%;bottom:0.0625vw;transform:translateX(-50%);width:5.3125vw;height:0.1875vw;background:#f4a66c ;}
.gnb_box .gnb_wrapper > li > a {padding:0 1.8750vw;font-size: 1.1250vw;letter-spacing:-0.02em;line-height:5.6250vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper {padding-top:1.2500vw;left:0;top:5.6250vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li {padding-left:1.8750vw;line-height:2vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li a {font-size: 0.8750vw;}

.gnb_box .jungfum {background:#d4dbe7;height: 2.5000vw;line-height:2.5000vw;font-size: 1.1250vw;width:13.1250vw;right:0;top:50%;transform:translateY(-50%);border-radius:3.1250vw;}
}

@media (max-width: 1400px)  {
#hd {background:#fff;}
#hd_wrapper {width:100%;height:11.0714vw;background:#fff;}
#hd_wrapper.on {border-bottom:0.0714vw solid #e5e5e5;}
.pc_wrap {width:100%;margin:0 auto;padding:0 1.4286vw}
.util_wrap {height:4.5714vw;}
.util_wrap:after {clear:both;}
/* logo */
#logo {padding:0.0000vw 0 0;/* left:0;top:50%;transform:translateY(-50%); */}
#logo img {width:10.7143vw;}
/* util */
#hd_util {}
#hd_util:after {visibility:hidden;clear:both;content:""}
#hd_util li {font-size:1.0000vw;line-height:1.8571vw;padding:0 1.2857vw;}
#hd_util li::after {width:0.0714vw;height:1.0000vw;background:#8f8f8f;right:0;top:50%;transform:translateY(-50%)}
#hd_util li.no-line::after {}
#hd_util li:last-child {padding-right:0;}
#hd_util li a {font-size: 0.8571vw;}
#hd_util li.genuine {background:#000;width:5.7143vw;padding:0; margin-right: 0.7143vw;}
#hd_util li.genuine a {}
#hd_util li.ilooda{ padding: 0;}
#hd_util li.ilooda a{border:0.0714vw solid #000; height: 1.8571vw;padding:0 0.3571vw;width:8.5714vw;}
#hd_util li.ilooda a img{max-width:100%;height:auto;left:50%;top:50%;transform:translate(-50%,-50%)}
#hd_util li.select {width:8.5714vw;height:1.8571vw;margin-left:0.7143vw;}
#hd_util li select {height:1.8571vw;border:0.0714vw solid #000;padding-left:0.7143vw;width:8.5714vw;left:0;top:0;font-size: 0.8571vw;}

.gnb_wrap {border-top:0.0714vw solid #f6f6f6;}
.gnb_wrap.off {}
.search_icon {right:11.4286vw;top:1.4286vw;}
.search_icon img {width:1.7857vw;}

.black_bg { width: 100%; height: 100%; background: rgba(0,0,0,.5);  top: 0; left: 0; }

.other {margin-top:0.7143vw;padding-top:1.7857vw;border-top:0.0714vw solid #dedede;}
.other:after {clear: both;}
.other div {}
.other div.ilooda {width:100%;height:3.4286vw;line-height:3.4286vw;}
.other div.ilooda a {font-size: 1.2857vw; }

/* 새로운 header */
.header_bg {background:#fff;width:100%;height:38.5714vw;left:0;top:0;}
.gnb_box {height:6.4286vw;}
.gnb_box:after {clear:both;}
.gnb_box #logo {padding-top:2.4286vw;}
.gnb_box .gnb_wrapper {margin-left: 2.1429vw;}
.gnb_box .gnb_wrapper:after {clear:both;}
.gnb_box .gnb_wrapper > li {}
.gnb_box .gnb_wrapper > li.act:after {left:50%;bottom:0.0714vw;transform:translateX(-50%);width:6.0714vw;height:0.2143vw;background:#f4a66c ;}
.gnb_box .gnb_wrapper > li > a {padding:0 2.1429vw;font-size: 1.2857vw;letter-spacing:-0.02em;line-height:6.4286vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper {padding-top:1.4286vw;left:0;top:6.4286vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li {padding-left:2.1429vw;line-height:2.2857vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li a {font-size: 1.0000vw;}

.gnb_box .jungfum {background:#d4dbe7;height: 2.8571vw;line-height:2.8571vw;font-size: 1.2857vw;width:15.0000vw;right:0;top:50%;transform:translateY(-50%);border-radius:3.5714vw;}
}

@media (max-width: 1024px)  {
#hd {background:#fff;}
#hd_wrapper {width:100%;height:15.1367vw;background:#fff;}
#hd_wrapper.on {border-bottom:0.0977vw solid #e5e5e5;}
.pc_wrap {width:100%;margin:0 auto;padding:0 1.9531vw}
.util_wrap {height:6.2477vw;}
.util_wrap:after {clear:both;}
/* logo */
#logo {padding:0.0000vw 0 0;/* left:0;top:50%;transform:translateY(-50%); */}
#logo img {width:14.6484vw;}
/* util */
#hd_util {}
#hd_util:after {visibility:hidden;clear:both;content:""}
#hd_util li {font-size:1.3672vw;line-height:2.5391vw;padding:0 1.7578vw;}
#hd_util li::after {width:0.0977vw;height:1.3672vw;background:#8f8f8f;right:0;top:50%;transform:translateY(-50%)}
#hd_util li.no-line::after {}
#hd_util li:last-child {padding-right:0;}
#hd_util li a {font-size: 1.1719vw;}
#hd_util li.genuine {background:#000;width:7.8125vw;padding:0; margin-right: 0.9766vw;}
#hd_util li.genuine a {}
#hd_util li.ilooda{ padding: 0;}
#hd_util li.ilooda a{border:0.0977vw solid #000; height: 2.5391vw;padding:0 0.4883vw;width:11.7188vw;}
#hd_util li.ilooda a img{max-width:100%;height:auto;left:50%;top:50%;transform:translate(-50%,-50%)}
#hd_util li.select {width:11.7188vw;height:2.5391vw;margin-left:0.9766vw;}
#hd_util li select {height:2.5391vw;border:0.0977vw solid #000;padding-left:0.9766vw;width:11.7188vw;left:0;top:0;font-size: 1.1719vw;}

.gnb_wrap {border-top:0.0977vw solid #f6f6f6;}
.gnb_wrap.off {}
.search_icon {right:15.6250vw;top:1.9531vw;}
.search_icon img {width:2.4414vw;}

.black_bg { width: 100%; height: 100%; background: rgba(0,0,0,.5);  top: 0; left: 0; }

.other {margin-top:0.9766vw;padding-top:2.4414vw;border-top:0.0977vw solid #dedede;}
.other:after {clear: both;}
.other div {}
.other div.ilooda {width:100%;height:4.6875vw;line-height:4.6875vw;}
.other div.ilooda a {font-size: 1.7578vw; }

/* 새로운 header */
.header_bg {background:#fff;width:100%;height:52.7344vw;left:0;top:0;}
.gnb_box {height:8.7891vw;}
.gnb_box:after {clear:both;}
.gnb_box #logo {padding-top:3.3203vw;}
.gnb_box .gnb_wrapper {margin-left: 2.9297vw;}
.gnb_box .gnb_wrapper:after {clear:both;}
.gnb_box .gnb_wrapper > li {}
.gnb_box .gnb_wrapper > li.act:after {left:50%;bottom:0.0977vw;transform:translateX(-50%);width:8.3008vw;height:0.2930vw;background:#f4a66c ;}
.gnb_box .gnb_wrapper > li > a {padding:0 2.9297vw;font-size: 1.3672vw;letter-spacing:-0.02em;line-height:8.7891vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper {padding-top:1.9531vw;left:0;top:8.7891vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li {padding-left:2.9297vw;line-height:3.1250vw;}
.gnb_box .gnb_wrapper > li .lnb_wrapper li a {font-size: 1.3672vw;}

.gnb_box .jungfum {background:#d4dbe7;height: 3.9063vw;line-height:3.9063vw;font-size: 1.7578vw;width:20.5078vw;right:0;top:50%;transform:translateY(-50%);border-radius:4.8828vw;display: none;}
}

@media (max-width: 768px)  {
body{overflow-x:hidden;}
/**/
.show720 {display: block !important;}
.mshow720 {display: block !important;}
.hide720 {display: none !important;}

.ham {position:absolute;left:2.6042vw;top:50%;transform:translateY(-50%);}
.ham img {width:5.8594vw;}

.mo_util {position:absolute;right:2.6042vw;top:50%;transform:translateY(-50%);}
.mo_util ul {}
.mo_util ul:after {content:"";display:block;}
.mo_util ul li {float:left;margin-left:2.6042vw;position:relative;}
.mo_util ul li:last-child {padding-right:2.6042vw;}
.mo_util ul li span {position:absolute;right:0;top:-5px;border-radius:50%;width:4.4271vw;height:4.4271vw;background:#000;color:#fff;text-align: center;line-height:4.4271vw;display:block;}
.mo_util img {width:3.9063vw;}

#hd_wrapper {width:100%;height:15.6250vw;padding:0 2.6042vw;border-bottom:1px solid #ccc;}

/* logo */
#logo {position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);}
#logo img {width:19.5313vw;}

/* util */
#hd_util {display: none;}
.gnb_wrap {display: none;}
.search_icon {display: none;}

/* 모바일 header */
.right_menu { left: -100%; top: 0; height: 100%; width: 80%;  transition:all 0.3s; -webkit-transition:all 0.3s; -moz-transition:all 0.3s;}
.right_menu.on {left: 0;}
.right_menu .menu_close { right: -11.7188vw; top: 2.8646vw;}
.right_menu .menu_close img { width:9.1146vw;}
.right_menu .menu_detail {overflow-y: auto; height: 100%; padding: 2.6042vw 0;}
.right_menu .menu_detail .menu_logo img {width:40.8854vw;}

.right_menu .menu_detail .login_wrap {margin: 3.9063vw 2.6042vw; padding: 3.2552vw 0; border-top: 0.1302vw solid #dedede; border-bottom: 0.1302vw solid #dedede;}
.right_menu .menu_detail .login_wrap > ul > li { width: 49%; margin-right: 2%; margin-bottom: 2%;}
.right_menu .menu_detail .login_wrap > ul > li:nth-child(2n) {margin-right: 0;}
.right_menu .menu_detail .login_wrap > ul > li > a { width: 100%; height: 8.3333vw; line-height: 8.3333vw;font-size:2.8646vw; }

.right_menu .menu_detail .menu_wrap {margin-top: 2.6042vw;}
.right_menu .menu_detail .menu_wrap > ul > li:first-child > a {border-top: 0.1302vw solid #f0f0f0;}
.right_menu .menu_detail .menu_wrap > ul > li > a { text-transform:uppercase; width: 100%; padding-left: 2.6042vw; height: 9.7656vw; line-height: 9.7656vw; font-size: 3.6458vw;  border-bottom: 0.1302vw solid #f0f0f0; background: url(/images/m_arrow.png) no-repeat right 2.6042vw center;}
.right_menu .menu_detail .menu_wrap > ul > li > ul { border-bottom: 0.1302vw solid #f0f0f0; padding: 2.6042vw 0;}
.right_menu .menu_detail .menu_wrap > ul > li > ul > li > a {font-size: 3.1250vw; text-transform:uppercase;  padding-left: 3.9063vw; line-height: 5.8594vw;  }

.other {margin-top:1.3021vw;padding-top:3.2552vw;border-top:0.1302vw solid #dedede;}
.other:after {clear: both;}
.other div {}
.other div.ilooda {width:100%;height:9.7656vw;line-height:9.7656vw;}
.other div.ilooda a {font-size: 2.3438vw;}

}

@media (max-width: 480px)  {
#logo img {width:31.2500vw;}
}
#hd_util li:nth-child(4)::after {
    display: none;
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
		<div class="pc_wrap hide720">
			<div class="util_wrap">
				<ul id="hd_util">
					<?php if($is_member) { ?>
						<?php if($is_admin) { ?>
						<li><a href="/adm"><?echo "관리자";?></a></li>
						<li><a href="<?php echo G5_BBS_URL ?>/logout.php">LOGOUT</a></li>
						<li><a href="<?php echo G5_SHOP_URL; ?>/mypage.php">MY PAGE</a></li>
						<?php }else { ?>
						<li><a href="<?php echo G5_SHOP_URL; ?>/mypage.php">MY PAGE</a></li>
						<li><a href="<?php echo G5_BBS_URL ?>/logout.php">LOGOUT</a></li>
						<?php } ?>
					<?php } else { ?>
						<li><a href="<?php echo G5_BBS_URL; ?>/login.php?url=<?php echo $urlencode; ?>">LOGIN</a></li>
					<?php } ?>
					<li class="<?php  if(!$is_member) echo 'no-line'?>"><a href="<?php echo G5_SHOP_URL ?>/cart.php">CART</a></li>

					<?php if($member['mb_level'] >= '3') { ?>
						<!-- <li><a href="<?php echo G5_SHOP_URL ?>/membership.php">멤버쉽혜택</a></li> -->
						<!-- <li class="no-line"><a href="/creative-marketing/list.php?ca_id=40" target="_blank">병원마케팅센터</a></li> -->
					<?php }  ?>
					<?if ($is_member){ ?>
						<!-- <li class="no-line"><a href="https://docs.google.com/forms/d/1fF0vCaqsUUe4sWuvTxtfcV2JkWKSNhuKfWn4VcIS664/edit">설문조사</a></li> -->
						<!-- <li class="no-line"><a href="<?php echo G5_HTTP_BBS_URL.'/survey.php?id='.$member['mb_id']?>">설문조사</a></li> -->
						<!-- <li class="no-line"><a href="https://forms.gle/HNqz5L3rCGLiuKz78 ">설문조사</a></li> -->
						
						<!-- <li class="no-line"><a href="<?php echo G5_SHOP_URL ?>/membership.php">멤버쉽혜택</a></li> -->
					<?php } ?>
					<!-- <li class="no-line genuine"><a href="<?php echo G5_SHOP_URL ?>/genuine.php">정품등록</a></li> -->
					<li class="no-line ilooda"><a href="https://www.ilooda.com/" target="_blank"><img src="/images/ilooda_3.png" alt=""></a></li>
					<li class="select no-line">
						<select onchange="if(this.value) window.open(this.value);">
							<option value="">Famliy Site</option>
							<option value="https://reepotlaser.com/">reepot</option>
							<option value="https://hyzerme.com/">hyzer me</option>
							<option value="https://ilooda.com/brand/secretRF.php">secret RF</option>
							<option value="https://ilooda.com/brand/veloce.php">veloce</option>
							<option value="https://ilooda.com/brand/fraxis.php">fraxis</option>
							<option value="https://ilooda.com/brand/healer1064.php">healer 1064</option>
							<option value="https://ilooda.com/brand/vikini.php">vikini</option>
							<option value="https://ilooda.com/brand/curas.php">curas</option>
							<option value="https://ilooda.com/brand/ultraBeaujet.php">ultraBeaujet</option>
							<option value="https://ilooda.com/brand/igraft.php">igraft</option>
							<option value="https://nuuz.co.kr/index.html">nuuz device</option>
							<option value="https://nuuz.co.kr/category/%ED%99%94%EC%9E%A5%ED%92%88/25/">nuuz cosmetic</option>
							<option value="https://ilooda.com/brand/cure-j.php">cure-j</option>
							<option value="https://ilooda.com/brand/acutron.php">acutron</option>
						</select>
					</li>
				</ul>
			</div>
			<div class="gnb_box">
				<div id="logo">
					<!-- <a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/logo_img" alt="<?php echo $config['cf_title']; ?>"></a> -->
					<a href="<?php echo G5_SHOP_URL; ?>/"><img src="/images/logo_cm.png" alt="<?php echo $config['cf_title']; ?>"></a>
				</div>
				<ul class="gnb_wrapper">
					<li>
						<a href="/shop/list.php?ca_id=10">데모신청</a>
						<ul class="lnb_wrapper">
							<li><a href="/shop/list.php?ca_id=10">전체</a></li>
							<!-- <li><a href="/shop/list.php?ca_id=1010">색소</a></li>
							<li><a href="/shop/list.php?ca_id=1020">피부미용</a></li>
							<li><a href="/shop/list.php?ca_id=1030">바디 컨투어링</a></li>
							<li><a href="/shop/list.php?ca_id=1040">제모</a></li>
							<li><a href="/shop/list.php?ca_id=1050">복합장비</a></li>
							<li><a href="/shop/list.php?ca_id=1060">타과</a></li> -->
						</ul>
					</li>
					<li>
						<a href="/shop/list.php?ca_id=20">소모품</a>
						<ul class="lnb_wrapper">
							<li><a href="/shop/list.php?ca_id=20">전체</a></li>
							<li><a href="/shop/list.php?ca_id=2020">시크릿</a></li>
							<li><a href="/shop/list.php?ca_id=2030">리팟</a></li>
							<li><a href="/shop/list.php?ca_id=2040">엔코어</a></li>
							<li><a href="/shop/list.php?ca_id=2050">펜토</a></li>
							<li><a href="/shop/list.php?ca_id=2060">울트라뷰젯</a></li>
							<li><a href="/shop/list.php?ca_id=2070">아이그래프트</a></li>
							<li><a href="/shop/list.php?ca_id=2010">하이저미</a></li>
							<li><a href="/shop/list.php?ca_id=2080">기타</a></li>
						</ul>
					</li>
					<li>
						<a href="/shop/list.php?ca_id=30">코스메틱</a>
						<ul class="lnb_wrapper">
							<li><a href="/shop/list.php?ca_id=3010">리팟</a></li>
						</ul>
					</li>
					<?php if($member['mb_level'] >= 2){?>
					<li>
						<a href="<?php echo get_pretty_url('marketing'); ?>">마케팅 자료</a>
						<ul class="lnb_wrapper">
							<li><a href="<?php echo get_pretty_url('marketing'); ?>">마케팅 자료</a></li>
						</ul>
					</li>
					<?php }?>
					<li>
						<a href="<?php echo get_pretty_url('notice'); ?>">고객센터</a>
						<ul class="lnb_wrapper">
							<li><a href="<?php echo get_pretty_url('notice'); ?>">공지사항</a></li>
							<li><a href="<?php echo get_pretty_url('faq'); ?>">자주하는질문</a></li>
							<li><a href="/bbs/write.php?bo_table=inquiry">1:1문의</a></li>
							<!-- <li><a href="/bbs/write.php?bo_table=mb_inquiry">회원문의</a></li> -->
						</ul>
					</li>
					<?php if($member['mb_level'] >= '3') { ?>
					<li>
						<a href="/shop/guide.php">제품 가이드</a>
						<ul class="lnb_wrapper">
							<li><a href="/shop/guide.php">제품 가이드</a></li>
						</ul>
					</li>
					<?php } ?>
					<li>
						<a href="/bbs/write.php?bo_table=as">A/S센터</a>
						<ul class="lnb_wrapper">
							<li><a href="/bbs/write.php?bo_table=as">A/S센터</a></li>
						</ul>
					</li>
					
				</ul>
				<a href="<?php echo G5_SHOP_URL; ?>/genuine.php" class="jungfum">정품등록하기</a>
			</div>
		</div>
        <div id="logo" class="show720">
			<!-- <a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/logo_img" alt="<?php echo $config['cf_title']; ?>"></a> -->
			<a href="<?php echo G5_SHOP_URL; ?>/"><img src="/images/logo_cm.png" alt="<?php echo $config['cf_title']; ?>"></a>
		</div>
		<div class="ham show720">
			<a href="javascript:;"><img src="/images/ham.png" alt=""></a>
		</div>

		<div class="mo_util show720">
			<ul>
				<li><a href="<?php echo G5_SHOP_URL; ?>/mypage.php"><img src="/images/m_my.png" alt=""></a></li>
				<li><a href="<?php echo G5_SHOP_URL; ?>/cart.php"><img src="/images/m_cart.png" alt=""><span class="count"><?php echo get_boxcart_datas_count(); ?></span></a></li>
			</ul>
		</div>
    </div>

	<div class="header_bg"></div>
</div>
<!-- } 상단 끝 -->


<div id="side_menu" class="hide720">
	<div class="side_menu_btn_box">
		<ul>
			<li><a href="javascript:;" id="btn_sidemenu" class="btn_sidemenu_cl"><div class="quick_show"></div><span class="sound_only">사이드메뉴버튼</span></a></li>
		</ul>
	</div>

    <script>
    $(function() {
        $("#top_btn1").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });
    </script>

    <div class="side_menu_wr scr_new">
		<div class="new_side_box_wrap">
			<div class="new_side_box01">
				<div class="new_side_title">QUICK MENU</div>
				<div class="new_side_con01">
					<ul>
						<li><a class="nsc_btn nsc_btn01" href="https://www.instagram.com/ilooda.official/" target="_blank">인스타</a></li>
						<li><a class="nsc_btn nsc_btn02" href="https://pf.kakao.com/_irvxls" target="_blank">카카오톡 상담</a></li>
						<!-- <li><a class="nsc_btn nsc_btn09" href="https://www.pinterest.co.kr/ilooda_official/" target="_blank">CS CENTER</a></li> -->
						<li><a class="nsc_btn nsc_btn04" href="https://www.youtube.com/channel/UCGAwsVKufwicLi5leOEzZJQ" target="_blank">유튜브</a></li>
						<li><a class="nsc_btn nsc_btn07" href="https://www.facebook.com/creativeilooda" target="_blank">페이스북</a></li>
						<!-- <li><a class="nsc_btn nsc_btn08" href="https://vimeo.com/user153508039" target="_blank">CS CENTER</a></li> -->
						<li><a class="nsc_btn nsc_btn03" href="mailto:info@ilooda.com">이메일</a></li>
						<!-- <li><a class="nsc_btn nsc_btn05" href="javascript:alert('준비중입니다.');" target="_blank">배송조회</a></li> -->
						<li><a class="nsc_btn nsc_btn06" href="<?php echo G5_SHOP_URL ?>/cart.php">장바구니</a></li>
					</ul>
				</div>

			</div>
			<div class="new_side_box02">
				<div class="new_side_title">CS센터</div>
				<div class="new_side_con02">
					<p class="new_side_text01">031-468-6808</p>
					<!-- <p class="new_side_text01"><?php echo $default['de_admin_company_tel']; ?></p> -->
					<p class="new_side_text02">운영시간</p>
					<p class="new_side_text02">월요일-금요일</p>
					<p class="new_side_text02">오전 10:00 ~ 오후 17:00</p>
					<p class="new_side_text02">점심시간 오후 12:30 ~ 13:30</p>
					<p class="new_side_text03">토, 일요일 및 공휴일 휴무</p>

					<div class="new_side_con0201">
						<a href="/bbs/board.php?bo_table=faq" class="new_side_btn01">자주하는질문</a>
						<a href="/shop/mypage.php" class="new_side_btn01">MY PAGE</a>
					</div>
				</div>

			</div>
			<div class="new_side_box03">
				<?php include(G5_SHOP_SKIN_PATH.'/boxtodayview.skin.php'); // 오늘 본 상품 ?>
			</div>
		</div>
    </div>

</div>

<div class="right_menu">
	<a href="javascript:;" class="menu_close"><img src="/images/menu_close.png" alt=""></a>
	<div class="menu_detail">
		<div class="menu_logo">
			<img src="/images/logo.png" alt="">
		</div>

		<div class="menu_wrap">
			<?php include_once(G5_SHOP_SKIN_PATH.'/boxcategory.mobile.skin.php'); // 상품분류 ?>
		</div>

		<div class="login_wrap">
			<ul class="clearfix">
				<?php if ($is_member) { ?>
				<?php if ($is_admin) {  ?>
				<li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/"><b>관리자</b></a></li>
				<?php } else { ?>
				<!-- <li><a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php">MODIFY</a></li> -->
				<li><a href="/shop/cart.php">CART</a></li>
				<?php } ?>
				<li><a href="<?php echo G5_BBS_URL; ?>/logout.php?url=shop">LOGOUT</a></li>
				<?php } else { ?>
				<li><a href="<?php echo G5_BBS_URL; ?>/login.php?url=<?php echo $urlencode; ?>">LOGIN</a></li>
				<li><a href="<?php echo G5_BBS_URL ?>/register.php" id="snb_join">JOIN</a></li>
				<?php } ?>
				<li><a href="<?php echo G5_SHOP_URL; ?>/mypage.php">MY PAGE</a></li>
				<!-- <li><a href="<?php echo G5_SHOP_URL; ?>/membership.php">멤버쉽혜택</a></li> -->

				<?php if($member['mb_level'] >= '3') { ?>
				<!-- <li><a href="https://forms.gle/Umn8vDkHbHQ69QHB8" target="_blank">설문조사</a></li> -->
				<!-- <li><a href="/creative-marketing/list.php?ca_id=40" target="_blank">병원마케팅센터</a></li> -->
				<li><a href="/shop/guide.php" target="_blank">제품 가이드</a></li>
				<li><a href="/bbs/write.php?bo_table=as" target="_blank">A/S센터</a></li>
				<?php }?>
				<li><a href="<?php echo G5_SHOP_URL; ?>/genuine.php">정품등록</a></li>

			</ul>
			<div class="other">
				<div class="ilooda"><a href="https://www.ilooda.com" target="_blank"><img src="/images/ilooda.png" alt=""></a></div>
			</div>
		</div>
	</div> <!-- //menu_detail -->
</div>
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
					<li><a href="<?php echo G5_BBS_URL ?>/faq.php">자주하는질문</a></li>
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
$(function (){
	//
	$('.gnb_wrapper > li').on('mouseenter',function(){
		$('#hd_wrapper').addClass('on');
		$('.header_bg').stop().fadeIn(400);
		$('.gnb_wrapper > li').find('ul').stop().fadeIn(1000);
		$('.gnb_wrapper > li').removeClass('act');
		$(this).addClass('act');
	});

	$('#hd').on('mouseleave',function(){
		$('#hd_wrapper').removeClass('on');
		$('.lnb_wrapper').stop().fadeOut(200);
		$('.header_bg').stop().fadeOut(400);
		$('.gnb_wrapper > li').removeClass('act');

	});

	//
    $(".btn_sidemenu_cl").on("click", function() {
        $(".side_menu_wr").toggle();
        $(".quick_show").toggleClass("quick_close")
    });

    $(".btn_side_shop").on("click", function() {
        $(this).next(".op_area").slideToggle(300).siblings(".op_area").slideUp();
    });
	$(".show_search").click(function() {
		$("#hd_sch").stop().fadeIn(300);
		$("#sch_str").focus();

	});
	$(".search_close").click(function() {
		$("#hd_sch").stop().fadeOut(300);

	});

	$('.detail_search').on('click',function(){
		$('.test').show();
	});

	$('.close_box').on('click',function(){
		$('.test').hide();
	});

	$('.search_tab a').on('click',function(){
		$('.search_tab a').removeClass('on');
		$(this).addClass('on');
	});

	$('.popular').on('click',function(){
		$('.ajax_box').addClass('off');
		$('.ajax_box2').addClass('on');
	});

	$('.custom').on('click',function(){
		$('.ajax_box').removeClass('off');
		$('.ajax_box2').removeClass('on');
	});

	$('.all_wrap').on('click',function(){
		$('.test').hide();
	});
});
</script>

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
<!-- 전체 콘텐츠 시작 { -->
<div id="wrapper" class="<?php echo implode(' ', $wrapper_class); ?>">
    <!-- #container 시작 { -->
    <div id="container">

