<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

require_once(G5_SHOP_PATH.'/settle_'.$default['de_pg_service'].'.inc.php');
require_once(G5_SHOP_PATH.'/settle_kakaopay.inc.php');

if( $default['de_inicis_lpay_use'] ){   //이니시스 Lpay 사용시
    require_once(G5_SHOP_PATH.'/inicis/lpay_common.php');
}

// 결제대행사별 코드 include (스크립트 등)
require_once(G5_SHOP_PATH.'/'.$default['de_pg_service'].'/orderform.1.php');

if( $default['de_inicis_lpay_use'] ){   //이니시스 L.pay 사용시
    require_once(G5_SHOP_PATH.'/inicis/lpay_form.1.php');
}

if($is_kakaopay_use) {
    require_once(G5_SHOP_PATH.'/kakaopay/orderform.1.php');
}
?>
<style>
.sc1200 {
    overflow: hidden;
    position: relative;
    width: 100%;
    max-width: 1600px;
    height: 100%;
    margin: 0 auto;
}

/* 주문서, 장바구니, 주문내역 상품정보 반응형 모바일 작업 */
.mo_sod_con { display: none; }
.sod_list_div { position: relative; /* margin: 10px 0; */ background: #fff; border-bottom: 1px solid #ccc; }
.sod_list_div .name_div { border-bottom: 1px solid #dcdcdc; line-height: 1.3em; padding: 10px 0px; font-size: 1.083em; }
.sod_list_div .item_div { position: relative; margin: 10px 0; padding-left: 100px; min-height: 100px; }
.sod_list_div .total_img { position: absolute; top: 0; left: 0;  }
.sod_list_div .total_img img { width: 100%;height: auto }
.sod_list_div .option_div li { padding-left: 10px; background: url(../img/bullet.gif) no-repeat 3px 50%; color: #777; margin: 3px 0; line-height: 1.3em;word-break:keep-all }
.sod_list_div .div_prqty { margin: 10px 0px; border-top: 1px solid #dcdcdc; padding: 10px 0 0; }
.sod_list_div .div_prqty:after { display: block; visibility: hidden; clear: both; content: ''; }
.sod_list_div .div_prqty_sp { float: left; width: 50%; display: block; line-height: 20px; padding: 0 7px; text-align: right; }
.sod_list_div .div_prqty_sp span { float: left; }
.sod_list_div .prqty_sc, .sod_list_div .prqty_price { border-right: 1px solid #dcdcdc; }
.sod_list_div .price_div { background: #f5f5f5; border: 1px solid #e2e2e2; display: block; clear: both; margin: 10px 0; text-align: right; padding: 5px 10px; line-height: 20px; }
.sod_list_div .price_div span { float: left;display:inline-block;line-height:20px }
.sod_list_div .price_div strong { font-size: 1.25em; color: #000; }
.sod_list_div .prqty_stat { position: absolute; top: 0; right: 0; padding: 3px 5px; background: #6583c5; color: #fff; }


/* 주문내역 상태설명 보기 */
#sod_sts_wrap2{margin:10px}
#sod_sts_wrap2 .btn_wr{border-top:1px solid #bbb;text-align:center}
#sod_sts_explan_open2{padding: 0 10px;height: 30px;border: 1px solid #bbb;border-top:1px solid #e6e6e6;margin-top:-1px;color: #333;background:none;font-size:14px}
#sod_sts_explan2{display:none}
#sod_fin_legend2{background:#f7f7f7;;margin:0 0 10px;padding:10px;line-height:20px}
#sod_fin_legend2:after {display:block;visibility:hidden;clear:both;content:""}
#sod_fin_legend2 dt{float:left;width:20%}
#sod_fin_legend2 dd{float:left;width:80%}

/* 모바일 주문내역 include  */
#sod_v_info { margin: 0 0 30px;
    padding: 10px;
    border: 3px solid #f1592a;
    font-size: 14px;font-weight:500;line-height:1.3em;word-break:keep-all}

#sod_inquiry li {background:#fff;border:1px solid #ccc;padding:15px;margin-bottom:10px;position:relative;border-radius:5px;font-size:15px;}
#sod_inquiry li .idtime_link{font-weight:bold;font-size:1.167em}
#sod_inquiry li .idtime_time{position:absolute;top:15px;right:15px;color:#999}
#sod_inquiry li .inquiry_name{margin:10px 0;color:#666;line-height:1.3em;}
#sod_inquiry li .inquiry_price{font-size:1.25em;font-weight:bold}
#sod_inquiry li .inv_status{display:block;text-align:center;margin:5px 0 0;font-weight:bold}
#sod_inquiry li .inv_inv{margin:10px 0 0;display:block;border:1px solid #c4c5cc;color:#666}
#sod_inquiry li .inv_inv i{width:30px;height:30px;line-height:30px;background:#f3f3f3;text-align:center;color:#555;font-size:15px;margin-right:5px}

#sod_inquiry .status_01{display:block;background:#fda83c;color:#fff !important;line-height:30px;}
#sod_inquiry .status_02{display:block;background:#ff6f6f;color:#fff !important;line-height:30px;}
#sod_inquiry .status_03{display:block;background:#5bd085;color:#fff !important;line-height:30px;}
#sod_inquiry .status_04{display:block;background:#6fa8ff;color:#fff !important;line-height:30px;}
#sod_inquiry .status_05{display:block;background:#333;color:#fff !important;line-height:30px;}
#sod_inquiry .status_06{display:block;background:#f3f3f3;border:1px solid #ddd;color:#666 !important;line-height:30px;font-weight:bold}

@media (max-width: 1480px)  {
.sc{width: 93.75vw;}
.sc01{width: 93.75vw;}
.sc1200{width: 93.75vw;}
.con_inner {padding:5.4688vw 0 5.4688vw;}
.con_inner01{padding:10.1351vw 0 4.7297vw}
.con_inner02{padding-top:11.7188vw 0 11.7188vw}
.new_sc_wrap {padding: 18.3594vw 0 10.9375vw;}
.sv{width:100%;max-width:129.7297vw;height:13.2432vw;margin:0 auto}
.sv_tx01{font-size:2.1622vw;left:50%;top:50%;transform:translate(-50%,-50%);font-weight:300}
.sv_tx02{font-size:3.7162vw;}
.sv_tx03{font-sizE:1.0938vw;padding-top:0.7813vw;}
.sv_tx03 span{width:0.0781vw;height:0.7813vw;background:#999;margin:0 0.7813vw;}
.sv01{height:28.3784vw !important;}
.sv02,.sv022{height:28.3784vw !important;background-size: cover;background-position: center;}
.sv0222{height:28.3784vw !important;}
.sv03{height:21.6216vw !important;}
.sv04{height:28.3784vw !important;}
.sv05{height:21.6216vw !important;}
.sv06{height:21.6216vw !important;}
.sv07{height:28.3784vw !important;}
.sv08{height:28.3784vw !important;}
.hd_sch_wr {padding:2.3438vw 0;width:34.7656vw;margin-left:5.0781vw}
.shop_title01{font-size:3.5156vw;padding-bottom: 2.3438vw;}
.sub_title02{font-size:3.7162vw;}
.sub_title02:after{background:#d70c2a;width:2.3649vw;height:0.1351vw;margin:1.6892vw auto;}
.header_wrap .inner{width:100%;margin:0 auto;height: 9.4595vw;}
#hd_sch h3 {font-size:0;line-height:0;overflow:hidden}
#hd_sch {border-radius:2.3438vw;overflow:hidden}
#hd_sch #sch_str {width:15.6250vw;height:3.5156vw;padding-left:1.1719vw;border-radius:2.3438vw 0 0 2.3438vw;background:#fff;border:0;border-right:0;font-size:1.3281vw;color:#fff}
#hd_sch #sch_submit {width:3.9063vw;height:3.5156vw;border:0;background:#fff;border-radius:0 2.3438vw 2.3438vw 0;cursor:pointer;font-size:1.2500vw}
.frm_input {height:5.0405vw}
/* 주문서작성 */
#sod_frm {margin-top:5.4688vw;}
.sub_title01{font-size:1.7568vw;padding-bottom: 3.3784vw;font-weight:400}
}



@media (max-width: 1024px) {
.container {padding-left: 20px;padding-right: 20px;}
/* header */
.header_inner {padding:0px 20px;}
.header_wrap .inner {padding:0;text-align:center;}
.pc_sod_con { display: none !important; }
.mo_sod_con { display: block !important; }

/*장바구니*/
.sod_list_div {font-size:15px;}
#sod_bsk_list #mod_option_frm {
    min-width: 596px;
    left: 110px;
    margin-left: 0px;
}
/*장바구니 끝*/

/*마이페이지 위시리스트*/
.list_02 li { width: 25%; margin: 0 0 15px; padding: 0 5px; }

/*마이페이지 위시리스트*/

/*위시리스트*/
.list_04 li{float:left;width:33.3333%;margin:0;padding:0px 5px 15px;}
 }

@media (max-width: 768px) {
.sc {width: 92.1875vw;}
.sc01{width: 92.1875vw;}
.sc1200 {width: 92.1875vw;}
.con_inner{padding:11.2903vw 0 11.2903vw;}
.con_inner01{padding:21.1864vw 0 9.8870vw}
.con_inner02{padding:24.1935vw 0 24.1935vw}
.new_sc_wrap {padding: 37.9032vw 0 22.5806vw;}
.sv{width:100%;max-width:271.1864vw;height:27.6836vw;margin:0 auto;background-size:cover;background-position: center;}
.sv01{height:45.1977vw !important;background-size: cover;}
.sv02,.sv022,.sv0222{height:45.1977vw !important;background-size: cover;}
.sv03{height:45.1977vw !important;background-size: cover;}
.sv04{height:45.1977vw !important;background-size: cover;}
.sv05{height:45.1977vw !important;background-size: cover;}
.sv06{height:45.1977vw !important;background-size: cover;}
.sv07{height:45.1977vw !important;background-size: cover;}
.sv08{height:45.1977vw !important;background-size: cover;}
.sv_tx01{font-size:6.1250vw;left:50%;top:50%;transform:translate(-50%,-50%);font-weight:300}
.sv_tx02{font-size:6.1250vw;left:50%;top:50%;transform:translate(-50%,-50%);}
.sv_tx03{font-sizE:1.9774vw;padding-top:1.4124vw;}
.sv_tx03 span{width:0.1412vw;height:1.4124vw;background:#999;margin:0 1.4124vw;}
/* .sv_tx03{font-size:3.2258vw;left:50%;top:74%;transform:translate(-50%);font-weight:100} */
.shop_title01{font-size:7.2581vw;padding-bottom: 4.8387vw;}
.sub_title02{font-size:7.7684vw;}
.sub_title02:after{background:#d70c2a;width:4.9435vw;height:0.2825vw;margin:3.5311vw auto;}
.sub_title01{font-size:5.6723vw;padding-bottom: 7.0621vw;font-weight:400}
.frm_input {height:8.3559vw}
.block768{display:block !important;}
.container {padding-left: 0px;padding-right: 0px;}
.for_pc01 {display:none !important;}
.for_mo01 {display:block !important;}
.empty_list {padding:80px 0 !important;color:#666;text-align:center;font-size:15px;}
/* header */
.header_wrap .inner{width:100%;margin:0 auto;height:14.1243vw;}
.header_inner  {padding:0px 15px}
#hd_sch {border-radius:4.8387vw;overflow:hidden;border: 1px solid #e1e1e1;}
#hd_sch #sch_str {width:32.2581vw;height:7.2581vw;padding-left:2.4194vw;border-radius:4.8387vw 0 0 4.8387vw;background:#fff;border:0;border-right:0;font-size:2.7419vw;color:#000}
#hd_sch #sch_submit {width:8.0645vw;height:7.2581vw;border:0;background:#fff;border-radius:0 4.8387vw 4.8387vw 0;cursor:pointer;font-size:2.5806vw}
.new_win .new_win_con {margin:3.2258vw 0;padding:3.2258vw}
/* 주문서작성 */
#sod_frm {margin-top:11.2903vw;}
#sod_frm section h2{padding: 3.2258vw;}
#sod_frm .tbl_frm01 th{width:20%;}
#sod_frm #od_name, #sod_frm #od_tel, #sod_frm #od_hp, #sod_frm #od_pwd, #sod_frm #od_b_name, #sod_frm #od_b_tel, #sod_frm #od_b_hp, #sod_frm #ad_subject, #sod_frm #od_hope_date{width:100%;}
#sod_frm .tbl_frm01 th, #sod_frm .tbl_frm01 td{padding:1.4124vw 0}
#sod_frm .tbl_frm01 td .btn_address {width: 18.0791vw;height: 8.3559vw;}
/*장바구니*/
.sod_list_div {font-size:14px;}
#sod_bsk_list #mod_option_frm{width:90%;max-width:727px;min-width:auto;left:50%;transform: translate(-50%);margin-left:0;font-size:13px}
#sit_opt_added li {padding-right:0;}
#sit_opt_added li .opt_name {display:block;margin:5px 0 10px;}
#sit_opt_added li .opt_count {    overflow:hidden;display:block;position: relative;
    top: auto;
    right: auto;
    margin-top: 0;margin:5px 0 10px;}
	#sit_opt_added .num_input {width:60px;}
	#sit_opt_added .sit_opt_prc {width:90px;padding-right: 30px;;}
#sod_bsk_act{margin-top: 4.8387vw;}
#sod_bsk #sod_bsk_tot {font-size:13px;padding:12px 10px}
#sod_bsk_act .btn_submit {height:13.0645vw;padding:0 1.6129vw;width:33.8065vw;font-size:3.4194vw !important;}
#sod_bsk_act .btn01 {height:13.0645vw;line-height:13.0645vw;padding:0 1.6129vw;width:33.8065vw;font-size:3.4194vw;}
.btn_cart_del button {font-size:14px}
#mod_option_frm h2 {padding:0 3.2258vw;line-height:8.0645vw;font-size:1.25em}
.option_wr {padding:3.2258vw 3.2258vw 0}
.option_wr h3 {font-size:1.167em;margin-bottom:1.6129vw}
.option_wr .get_item_options,
.option_wr .get_item_supply {margin-bottom:1.6129vw}
.option_wr label {margin:1.6129vw 0 0.8065vw}
.option_wr select {width:100%;border:0.1613vw solid #d4d4d4;height:7.7419vw}

#sit_opt_added {margin:0;padding:0;border-bottom:0;list-style:none}
#sit_opt_added li {padding:1.6129vw 2.4194vw;background:#f9f9f9;border:0.1613vw solid #e6e9ed;margin:1.6129vw 0;position:relative}
#sit_opt_added li:after {visibility:hidden;clear:both;content:""}
#sit_opt_added li .opt_name {line-height:4.5161vw;font-weight:bold;font-size:3.4011vw}
#sit_opt_added li .opt_count {}
#sit_opt_added button {width:4.8387vw;height:4.8387vw;border-radius:0;background:#fff;font-size: 2.4194vw;padding:0}
#sit_opt_added button:hover {color:#000}
#sit_opt_added .num_input {font-size: 3.2599vw;border:0;line-height: 4.8387vw;height:4.8387vw;border-top:0.1613vw solid #e4e4e4;border-bottom:0.1613vw solid #e4e4e4;text-align:center}
#sit_opt_added .sit_opt_del {right:0;top:0;font-size:2.4194vw;border:0;border-left:0.1613vw solid #e6e9ed;border-bottom:0.1613vw solid #e6e9ed}
#sit_opt_added .sit_opt_del:hover {color:#be334a}
#sit_opt_added .sit_opt_prc {padding-right:4.8387vw;width:auto;line-height:4.8387vw;font-size:2.4194vw;font-weight:bold}

#mod_option_frm #sit_sel_option {margin:3.2258vw 3.2258vw 1.6129vw}
#mod_option_frm #sit_tot_price {margin:0 3.2258vw 3.2258vw}
#mod_option_frm #sit_opt_added {}
#mod_option_frm .btn_confirm {margin:0 3.2258vw 3.2258vw;background:yellow}
#mod_option_frm .btn_confirm .btn_submit {width:16.1290vw;height:6.4516vw;font-size:1.167em;cursor:pointer;background:#000;border:0}
#mod_option_frm .btn_confirm .btn_close {top:0;right:0;width:8.0645vw;height:8.0645vw;border:0;background:none;font-size:1.25em;border-radius:0}

/*장바구니 끝*/

/*마이페이지 -정보*/
#smb_my_act li a {line-height:25px;padding:0 5px;font-size:13px;}
.op01 {overflow:hidden;float:none;width:100%;}
.op02 {overflow:hidden;float:none;width:100%;}
#smb_my_ov .my_ov_name {padding:0 10px;line-height:35px;font-size:14px;}
#smb_my_ov .my_ov_name img {margin:5px 0}
#smb_my_ov .cou_pt dt {width:auto;line-height:35px;font-size:14px;}
#smb_my_ov .cou_pt dd {width:auto;min-width:80px;padding-left:10px;padding-right:10px;line-height:35px;font-size:14px;}
#smb_my_ov .op_area {font-size:13px;}
#smb_my_ov .op_area dt {width:40%;}
#smb_my_ov .op_area dd {width:60% !important;}
/*마이페이지 -정보*/
/*마이페이지 -주문내역*/
#sod_inquiry li {font-size:14px;padding:15px 10px;}
#sod_inquiry li .idtime_time {right:10px;font-size:13px;}
/*마이페이지 -주문내역*/
/*마이페이지 위시리스트*/
.list_02 li { width: 33.3333%; margin: 0 0 15px; padding: 0 5px; }
.smb_my_tit a {font-size:14px;}
/*마이페이지 위시리스트*/

/*주문내역조회*/
#sod_v_info {font-size:14px;padding:8px;letter-spacing:-0.1px;/* text-align:center; */}
.sod_v_info_block {display:block;}

/*주문내역상세*/
#sod_fin_no {font-size:14px;padding:12px 10px}
.sod_left {font-size:13px;}
.sod_right {font-size:14px; word-break:keep-all;}

#sod_fin_cancelfrm {padding: 10px;font-size:14px;}
.sod_right{width:100%;}

/* 위시위시 */
#sod_ws li .wish_info{border-bottom:0}
/* 장바구니 */
#mb_login_notmb{width:100%;}
/* 주문하기 */
#sod_frm  #sod_bsk_tot li{font-size: 3.9806vw;background:#fff;width:100%;height:auto;padding:2.4194vw 0}
#sod_frm  #sod_bsk_tot li:after {visibility:hidden;clear:both;content:""}
#sod_frm  #sod_bsk_tot li span{margin-bottom:0.8065vw;}
#sod_frm  #sod_bsk_tot .sod_bsk_sell,#sod_frm  #sod_bsk_tot .sod_bsk_coupon{border-right:0.1613vw solid #e7ebf1}
#sod_frm  #sod_bsk_tot .sod_bsk_point,#sod_frm  #sod_bsk_tot .sod_bsk_cnt{width:100%;clear:both;height:10.4516vw;padding:0 2.4194vw;line-height:10.4516vw;font-size: 3.9806vw;}
#sod_frm  #sod_bsk_tot li:last-child {border-bottom:0 none}
#sod_frm  #sod_bsk_tot .sod_bsk_point span,#sod_frm  #sod_bsk_tot .sod_bsk_cnt span {margin:0;line-height:10.4516vw;}
#sod_frm  #sod_bsk_tot .sod_bsk_coupon:before{top:0;left:50%; transform:translate(-50%,-50%);width:3.2258vw;height:3.2258vw;background:#fff;border-radius:50%;border:0.1613vw solid #e7ebf1;font-size: 2.5806vw;line-height: 2.2581vw;}
#sod_frm  #sod_bsk_tot .sod_bsk_dvr:before{content:"+";top:0;left:50%; transform:translate(-50%,-50%);width:3.2258vw;height:3.2258vw;background:#fff;border-radius:50%;border:0.1613vw solid #e7ebf1;font-size: 2.5806vw;line-height: 2.2581vw;}
#sod_frm  #sod_bsk_tot .sod_bsk_cnt strong{font-size:1.25em}
#od_tot_price {background:#e5f0ff;line-height:3.2258vw;padding:2.4194vw}
#od_tot_price span {    line-height: 4.0323vw;}
.sod_right #od_tot_price{font-size: 3.9806vw;}
#forderform .od_pay_buttons_el{margin:3.2258vw 0;background:#fff;padding:1.6129vw}
#forderform .od_pay_buttons_el h3{font-size:3.9806vw;margin:0.0000vw 0 0.8065vw}
#od_pay_sl .lb_icon{padding:0;text-align: center;height: 12.6774vw;line-height: 12.6774vw;margin:0}
#forderform .od_pay_buttons_el h3{margin:0 0 10px}
#display_pay_button{background:#fff;padding:3.2258vw}
#display_pay_button .btn_submit{width:100%;height:13.0645vw;cursor:pointer;border:0;border-radius: 0;}
#display_pay_button .btn_cancel{background:0 0;width:100%;height:13.0645vw;line-height:13.0645vw;font-size:4.2194vw;margin:.8065vw 0;}
}


@media (max-width: 460px) {
.hd_pops_footer button{font-size:11px;}
.sub_title001{font-size:9.7826vw;padding: 21.7391vw 0 10.8696vw !important;}
.container {padding-left: 15px;padding-right: 15px;}

#sod_bsk #sod_bsk_tot {font-size:12px;padding:0;letter-spacing:-0.8px} 
#sod_bsk #sod_bsk_tot li {overflow:hidden;width:100%;border:0;padding:5px 0 ;text-align:left;border-bottom:0px solid #e6e2e2 !important;}
#sod_bsk #sod_bsk_tot li span {float:none;width:50%;display:inline-block;margin:0}
/* 장바구니 */
#sod_bsk #sod_bsk_tot li{padding:0;font-size: 3.9032vw;height: 13.8710vw;line-height: 13.8710vw;}
#sod_bsk #sod_bsk_tot li:after{height: 4.8387vw;}
#sod_bsk #sod_bsk_tot li span{font-size: 3.9032vw;}
/*마이페이지 -주문내역*/
#sod_inquiry li {font-size:13px;padding:15px 10px;}
/*마이페이지 -주문내역*/

/*마이페이지 위시리스트*/
.list_02 li { width: 50%; margin: 0 0 15px; padding: 0 5px; }
.smb_my_tit a {font-size:14px;}
/*마이페이지 위시리스트*/

/* 로그인로그인 */
.mb_log_cate .login{padding: 4.3478vw 0;}
.mb_log_cate .join{padding: 4.3478vw 0;}
#mb_login_od{padding: 8.6957vw 0.0000vw 0.0000vw !important;}
#login_fs{padding: 8.6957vw 0.0000vw 0.0000vw !important;}
.mbskin .btn_submit{height: 9.7826vw;}
#mb_login_odinfo p{padding-top:20px;}
#login_password_lost{border-right:0 !important}
/* 로그인로그인 */

/* 리스트 */

}
/* 클리어 */
.clearfix{*zoom: 1;}
.clearfix:after{content: '';display: block;clear: both;}


.sv_tx02{font-size: 40px;text-align:center;padding-top: 80px;}
.mo_sod_con{display: none;}
#sod_frm{margin-bottom: 80px;}
.sod_bsk_sell,.sod_bsk_dvr,.sod_bsk_coupon{width: 33.3333% !important;height: 90px !important;}

@media only screen and (max-width: 998px) { 
	.tbl_head03{display: none;}
	.mo_sod_con{display: block;}

}

@media only screen and (max-width: 998px) { 
	.tbl_head03{display: none;}
	.mo_sod_con{display: block;padding: 0 20px 50px 20px;}
	.sod_left{width: 93.9vw;padding: 0 10px;margin-right: 0 !important;}
	.sod_right{width: 93.9vw;padding: 0 10px;}

	.sod_bsk_sell,.sod_bsk_dvr span,.sod_bsk_sell,.sod_bsk_dvr strong,.sod_bsk_coupon strong{font-size: 18px;}
	.sod_bsk_point span,.sod_bsk_point strong,.sod_bsk_cnt span,.sod_bsk_cnt strong,#od_tot_price span,.sod_bsk_coupon span{font-size: 16px;}
	
	.pay_tbl tr{font-size: 16px;}
	.pay_tbl th{width: 110px !important;}
	.lb_icon{font-size: 16px;}
	}
</style>
<div class="sc1200 con_inner">
	<form name="forderform" id="forderform" method="post" action="<?php echo $order_action_url; ?>" autocomplete="off">
		<div id="sod_frm">
			<!-- 주문상품 확인 시작 { -->
			<div class="tbl_head03 tbl_wrap od_prd_list pc_sod_con">
				<table id="sod_list">
					<thead>
					<tr>
						<th scope="col">상품명</th>
						<th scope="col">총수량</th>
						<th scope="col">판매가</th>
						<th scope="col">소계</th>
						<th scope="col">포인트</th>
						<th scope="col">배송비</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$tot_point = 0;
					$tot_sell_price = 0;

					$goods = $goods_it_id = "";
					$goods_count = -1;

					// $s_cart_id 로 현재 장바구니 자료 쿼리
					$sql = " select a.ct_id,
									a.it_id,
									a.it_name,
									a.ct_price,
									a.ct_point,
									a.ct_qty,
									a.ct_status,
									a.ct_send_cost,
									a.it_sc_type,
									b.ca_id,
									b.ca_id2,
									b.ca_id3,
									b.it_notax
							   from {$g5['g5_shop_cart_table']} a left join {$g5['g5_shop_item_table']} b on ( a.it_id = b.it_id )
							  where a.od_id = '$s_cart_id'
								and a.ct_select = '1' ";
					$sql .= " group by a.it_id ";
					$sql .= " order by a.ct_id ";
					$result = sql_query($sql);

					$good_info = '';
					$it_send_cost = 0;
					$it_cp_count = 0;

					$comm_tax_mny = 0; // 과세금액
					$comm_vat_mny = 0; // 부가세
					$comm_free_mny = 0; // 면세금액
					$tot_tax_mny = 0;
					$mo_sod_list = array();
					for ($i=0; $row=sql_fetch_array($result); $i++)
					{
						$mo_sod_list[] = $row;
						// 합계금액 계산
						$sql = " select SUM(IF(io_type = 1, (io_price * ct_qty), ((ct_price + io_price) * ct_qty))) as price,
										SUM(ct_point * ct_qty) as point,
										SUM(ct_qty) as qty
									from {$g5['g5_shop_cart_table']}
									where it_id = '{$row['it_id']}'
									  and od_id = '$s_cart_id' ";
						$sum = sql_fetch($sql);

						if (!$goods)
						{
							//$goods = addslashes($row[it_name]);
							//$goods = get_text($row[it_name]);
							$goods = preg_replace("/\'|\"|\||\,|\&|\;/", "", $row['it_name']);
							$goods_it_id = $row['it_id'];
						}
						$goods_count++;

						// 에스크로 상품정보
						if($default['de_escrow_use']) {
							if ($i>0)
								$good_info .= chr(30);
							$good_info .= "seq=".($i+1).chr(31);
							$good_info .= "ordr_numb={$od_id}_".sprintf("%04d", $i).chr(31);
							$good_info .= "good_name=".addslashes($row['it_name']).chr(31);
							$good_info .= "good_cntx=".$row['ct_qty'].chr(31);
							$good_info .= "good_amtx=".$row['ct_price'].chr(31);
						}

						$image = get_it_image($row['it_id'], 80, 80);

						$it_name = '<b>' . stripslashes($row['it_name']) . '</b>';
						$it_options = print_item_options($row['it_id'], $s_cart_id);
						if($it_options) {
							$it_name .= '<div class="sod_opt">'.$it_options.'</div>';
						}

						// 복합과세금액
						if($default['de_tax_flag_use']) {
							if($row['it_notax']) {
								$comm_free_mny += $sum['price'];
							} else {
								$tot_tax_mny += $sum['price'];
							}
						}

						$point      = $sum['point'];
						$sell_price = $sum['price'];

						// 쿠폰
						$cp_button = '';
						if($is_member) {
							$cp_count = 0;

							$sql = " select cp_id
										from {$g5['g5_shop_coupon_table']}
										where mb_id IN ( '{$member['mb_id']}', '전체회원' )
										  and cp_start <= '".G5_TIME_YMD."'
										  and cp_end >= '".G5_TIME_YMD."'
										  and cp_minimum <= '$sell_price'
										  and (
												( cp_method = '0' and cp_target = '{$row['it_id']}' )
												OR
												( cp_method = '1' and ( cp_target IN ( '{$row['ca_id']}', '{$row['ca_id2']}', '{$row['ca_id3']}' ) ) )
											  ) ";
							$res = sql_query($sql);

							for($k=0; $cp=sql_fetch_array($res); $k++) {
								if(is_used_coupon($member['mb_id'], $cp['cp_id']))
									continue;

								$cp_count++;
							}

							if($cp_count) {
								$cp_button = '<button type="button" class="cp_btn">쿠폰적용</button>';
								$it_cp_count++;
							}
						}

						// 배송비
						switch($row['ct_send_cost'])
						{
							case 1:
								$ct_send_cost = '착불';
								break;
							case 2:
								$ct_send_cost = '무료';
								break;
							default:
								$ct_send_cost = '선불';
								break;
						}

						// 조건부무료
						if($row['it_sc_type'] == 2) {
							$sendcost = get_item_sendcost($row['it_id'], $sum['price'], $sum['qty'], $s_cart_id);

							if($sendcost == 0)
								$ct_send_cost = '무료';
						}
					?>

					<tr>

						<td class="td_prd">
							<div class="sod_img"><?php echo $image; ?></div>
							<div class="sod_name">
								<input type="hidden" name="it_id[<?php echo $i; ?>]"    value="<?php echo $row['it_id']; ?>">
								<input type="hidden" name="it_name[<?php echo $i; ?>]"  value="<?php echo get_text($row['it_name']); ?>">
								<input type="hidden" name="it_price[<?php echo $i; ?>]" value="<?php echo $sell_price; ?>">
								<input type="hidden" name="cp_id[<?php echo $i; ?>]" value="">
								<input type="hidden" name="cp_price[<?php echo $i; ?>]" value="0">
								<?php if($default['de_tax_flag_use']) { ?>
								<input type="hidden" name="it_notax[<?php echo $i; ?>]" value="<?php echo $row['it_notax']; ?>">
								<?php } ?>
								<?php echo $it_name; ?>
								<?php echo $cp_button; ?>

							 </div>
						</td>
						<td class="td_num"><?php echo number_format($sum['qty']); ?></td>
						<td class="td_numbig  text_right"><?php echo number_format($row['ct_price']); ?></td>
						<td class="td_numbig  text_right"><span class="total_price"><?php echo number_format($sell_price); ?></span></td>
						<td class="td_numbig  text_right"><?php echo number_format($point); ?></td>
						<td class="td_dvr"><?php echo $ct_send_cost; ?></td>
					</tr>

					<?php
						$tot_point      += $point;
						$tot_sell_price += $sell_price;
					} // for 끝

					if ($i == 0) {
						//echo '<tr><td colspan="7" class="empty_table">장바구니에 담긴 상품이 없습니다.</td></tr>';
						alert('장바구니가 비어 있습니다.', G5_SHOP_URL.'/cart.php');
					} else {
						// 배송비 계산
						$send_cost = get_sendcost($s_cart_id);
					}

					// 복합과세처리
					if($default['de_tax_flag_use']) {
						$comm_tax_mny = round(($tot_tax_mny + $send_cost) / 1.1);
						$comm_vat_mny = ($tot_tax_mny + $send_cost) - $comm_tax_mny;
					}
					?>
					</tbody>
				</table>
			</div>
			<div class="mo_sod_con">
				<?php
				$qq = 0;
				$it_cp_count = 0;
				foreach( $mo_sod_list as $row ){
					// 합계금액 계산
					$sql = " select SUM(IF(io_type = 1, (io_price * ct_qty), ((ct_price + io_price) * ct_qty))) as price,
									SUM(ct_point * ct_qty) as point,
									SUM(ct_qty) as qty
								from {$g5['g5_shop_cart_table']}
								where it_id = '{$row['it_id']}'
								  and od_id = '$s_cart_id' ";
					$sum = sql_fetch($sql);

					$image = get_it_image($row['it_id'], 80, 80);
					$it_options = print_item_options($row['it_id'], $s_cart_id);

					$point      = $sum['point'];
					$sell_price = $sum['price'];

					// 쿠폰
					if($is_member) {
						$cp_button = '';
						$cp_count = 0;

						$sql = " select cp_id
									from {$g5['g5_shop_coupon_table']}
									where mb_id IN ( '{$member['mb_id']}', '전체회원' )
									  and cp_start <= '".G5_TIME_YMD."'
									  and cp_end >= '".G5_TIME_YMD."'
									  and cp_minimum <= '$sell_price'
									  and (
											( cp_method = '0' and cp_target = '{$row['it_id']}' )
											OR
											( cp_method = '1' and ( cp_target IN ( '{$row['ca_id']}', '{$row['ca_id2']}', '{$row['ca_id3']}' ) ) )
										  ) ";
						$res = sql_query($sql);

						for($k=0; $cp=sql_fetch_array($res); $k++) {
							if(is_used_coupon($member['mb_id'], $cp['cp_id']))
								continue;

							$cp_count++;
						}

						if($cp_count) {
							$cp_button = '<button type="button" class="cp_btn" id="mod_cp_'.$row['it_id'].'">쿠폰적용</button>';
							$it_cp_count++;
						}
					}

					// 배송비
					switch($row['ct_send_cost'])
					{
						case 1:
							$ct_send_cost = '착불';
							break;
						case 2:
							$ct_send_cost = '무료';
							break;
						default:
							$ct_send_cost = '선불';
							break;
					}

					// 조건부무료
					if($row['it_sc_type'] == 2) {
						$sendcost = get_item_sendcost($row['it_id'], $sum['price'], $sum['qty'], $s_cart_id);

						if($sendcost == 0)
							$ct_send_cost = '무료';
					}
				?>
				<div class="sod_list_div">
					<div class="name_div">
						<?php echo '<b>' . stripslashes($row['it_name']) . '</b>'; ?>			
					</div>
					<div class="item_div">
						<span class="total_img"><?php echo $image; ?></span>
						<div class="option_div"><?php echo $it_options; ?></div>
						<div class="li_mod" ><?php echo $cp_button; ?></div>
					</div>

					<div class="div_prqty">
						<span class="prqty_price div_prqty_sp"><span>판매가 </span><?php echo number_format($row['ct_price']); ?></span>
						<span class="prqty_qty div_prqty_sp"><span>수량 </span><?php echo number_format($sum['qty']); ?></span>
						<span class="prqty_sc div_prqty_sp"><span>배송비 </span><?php echo $ct_send_cost; ?></span>
						<?php if($config['cf_use_point']) { ?>
						 <span class="total_point div_prqty_sp"><span>적립포인트 </span><strong><?php echo number_format($sum['point']); ?></strong></span>
						 <?php } ?>

					</div>
					<div class="price_div"><span>주문금액 </span><strong><?php echo number_format($sell_price); ?></strong></div>
				</div>
				<?php
				$qq++;
				}
				?>
			</div>
			<?php if ($goods_count) $goods .= ' 외 '.$goods_count.'건'; ?>
			<!-- } 주문상품 확인 끝 -->

			<div class="sod_left">
				<input type="hidden" name="od_price"    value="<?php echo $tot_sell_price; ?>">
				<input type="hidden" name="org_od_price"    value="<?php echo $tot_sell_price; ?>">
				<input type="hidden" name="od_send_cost" value="<?php echo $send_cost; ?>">
				<input type="hidden" name="od_send_cost2" value="0">
				<input type="hidden" name="item_coupon" value="0">
				<input type="hidden" name="od_coupon" value="0">
				<input type="hidden" name="od_send_coupon" value="0">
				<input type="hidden" name="od_goods_name" value="<?php echo $goods; ?>">

				<?php
				// 결제대행사별 코드 include (결제대행사 정보 필드)
				require_once(G5_SHOP_PATH.'/'.$default['de_pg_service'].'/orderform.2.php');

				if($is_kakaopay_use) {
					require_once(G5_SHOP_PATH.'/kakaopay/orderform.2.php');
				}
				?>

				<!-- 주문하시는 분 입력 시작 { -->
				<section id="sod_frm_orderer">
					<h2>주문하시는 분</h2>

					<div class="tbl_frm01 tbl_wrap">
						<table>
						<tbody>
						<tr>
							<th scope="row"><label for="od_name">이름<strong class="sound_only"> 필수</strong></label></th>
							<td><input type="text" name="od_name" value="<?php echo get_text($member['mb_name']); ?>" id="od_name" required class="frm_input required" maxlength="20"></td>
						</tr>

						<?php if (!$is_member) { // 비회원이면 ?>
						<tr>
							<th scope="row"><label for="od_pwd">비밀번호</label></th>
							<td>
								<span class="frm_info">영,숫자 3~20자 (주문서 조회시 필요)</span>
								<input type="password" name="od_pwd" id="od_pwd" required class="frm_input required" maxlength="20">
							</td>
						</tr>
						<?php } ?>

						<tr>
							<th scope="row"><label for="od_tel">전화번호<strong class="sound_only"> 필수</strong></label></th>
							<td><input type="text" name="od_tel" value="<?php echo get_text($member['mb_tel']); ?>" id="od_tel" required class="frm_input required" maxlength="20"></td>
						</tr>
						<tr>
							<th scope="row"><label for="od_hp">핸드폰</label></th>
							<td><input type="text" name="od_hp" value="<?php echo get_text($member['mb_hp']); ?>" id="od_hp" class="frm_input" maxlength="20"></td>
						</tr>
						<tr>
							<th scope="row">주소</th>
							<td>
								<label for="od_zip" class="sound_only">우편번호<strong class="sound_only"> 필수</strong></label>
								<input type="text" name="od_zip" value="<?php echo $member['mb_zip1'].$member['mb_zip2']; ?>" id="od_zip" required class="frm_input required" size="8" maxlength="6" placeholder="우편번호">
								<button type="button" class="btn_address" onclick="win_zip('forderform', 'od_zip', 'od_addr1', 'od_addr2', 'od_addr3', 'od_addr_jibeon');">주소 검색</button><br>
								<input type="text" name="od_addr1" value="<?php echo get_text($member['mb_addr1']) ?>" id="od_addr1" required class="frm_input frm_address required" size="60" placeholder="기본주소">
								<label for="od_addr1" class="sound_only">기본주소<strong class="sound_only"> 필수</strong></label><br>
								<input type="text" name="od_addr2" value="<?php echo get_text($member['mb_addr2']) ?>" id="od_addr2" class="frm_input frm_address" size="60" placeholder="상세주소">
								<label for="od_addr2" class="sound_only">상세주소</label>
								<br>
								<input type="text" name="od_addr3" value="<?php echo get_text($member['mb_addr3']) ?>" id="od_addr3" class="frm_input frm_address" size="60" readonly="readonly" placeholder="참고항목">
								<label for="od_addr3" class="sound_only">참고항목</label><br>
								<input type="hidden" name="od_addr_jibeon" value="<?php echo get_text($member['mb_addr_jibeon']); ?>">
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="od_email">E-mail<strong class="sound_only"> 필수</strong></label></th>
							<td><input type="text" name="od_email" value="<?php echo $member['mb_email']; ?>" id="od_email" required class="frm_input required" size="35" maxlength="100"></td>
						</tr>

						<?php if ($default['de_hope_date_use']) { // 배송희망일 사용 ?>
						<tr>
							<th scope="row"><label for="od_hope_date">희망배송일</label></th>
							<td>
								<!-- <select name="od_hope_date" id="od_hope_date">
								<option value="">선택하십시오.</option>
								<?php
								for ($i=0; $i<7; $i++) {
									$sdate = date("Y-m-d", time()+86400*($default['de_hope_date_after']+$i));
									echo '<option value="'.$sdate.'">'.$sdate.' ('.get_yoil($sdate).')</option>'.PHP_EOL;
								}
								?>
								</select> -->
								<input type="text" name="od_hope_date" value="" id="od_hope_date" required class="frm_input required" size="11" maxlength="10" readonly="readonly"> 이후로 배송 바랍니다.
							</td>
						</tr>
						<?php } ?>
						</tbody>
						</table>
					</div>
				</section>
				<!-- } 주문하시는 분 입력 끝 -->

				<!-- 받으시는 분 입력 시작 { -->
				<section id="sod_frm_taker">
					<h2>받으시는 분</h2>

					<div class="tbl_frm01 tbl_wrap">
						<table>
						<tbody>
						<?php
						if($is_member) {
							// 배송지 이력
							$addr_list = '';
							$sep = chr(30);

							// 주문자와 동일
							$addr_list .= '<input type="radio" name="ad_sel_addr" value="same" id="ad_sel_addr_same">'.PHP_EOL;
							$addr_list .= '<label for="ad_sel_addr_same">주문자와 동일</label>'.PHP_EOL;

							// 기본배송지
							$sql = " select *
										from {$g5['g5_shop_order_address_table']}
										where mb_id = '{$member['mb_id']}'
										  and ad_default = '1' ";
							$row = sql_fetch($sql);
							if($row['ad_id']) {
								$val1 = $row['ad_name'].$sep.$row['ad_tel'].$sep.$row['ad_hp'].$sep.$row['ad_zip1'].$sep.$row['ad_zip2'].$sep.$row['ad_addr1'].$sep.$row['ad_addr2'].$sep.$row['ad_addr3'].$sep.$row['ad_jibeon'].$sep.$row['ad_subject'];
								$addr_list .= '<input type="radio" name="ad_sel_addr" value="'.get_text($val1).'" id="ad_sel_addr_def">'.PHP_EOL;
								$addr_list .= '<label for="ad_sel_addr_def">기본배송지</label>'.PHP_EOL;
							}

							// 최근배송지
							$sql = " select *
										from {$g5['g5_shop_order_address_table']}
										where mb_id = '{$member['mb_id']}'
										  and ad_default = '0'
										order by ad_id desc
										limit 1 ";
							$result = sql_query($sql);
							for($i=0; $row=sql_fetch_array($result); $i++) {
								$val1 = $row['ad_name'].$sep.$row['ad_tel'].$sep.$row['ad_hp'].$sep.$row['ad_zip1'].$sep.$row['ad_zip2'].$sep.$row['ad_addr1'].$sep.$row['ad_addr2'].$sep.$row['ad_addr3'].$sep.$row['ad_jibeon'].$sep.$row['ad_subject'];
								$val2 = '<label for="ad_sel_addr_'.($i+1).'">최근배송지('.($row['ad_subject'] ? $row['ad_subject'] : $row['ad_name']).')</label>';
								$addr_list .= '<input type="radio" name="ad_sel_addr" value="'.get_text($val1).'" id="ad_sel_addr_'.($i+1).'"> '.PHP_EOL.$val2.PHP_EOL;
							}

							$addr_list .= '<input type="radio" name="ad_sel_addr" value="new" id="od_sel_addr_new">'.PHP_EOL;
							$addr_list .= '<label for="od_sel_addr_new">신규배송지</label>'.PHP_EOL;

							$addr_list .='<a href="'.G5_SHOP_URL.'/orderaddress.php" id="order_address" class="btn_frmline">배송지목록</a>';
						} else {
							// 주문자와 동일
							$addr_list .= '<input type="checkbox" name="ad_sel_addr" value="same" id="ad_sel_addr_same">'.PHP_EOL;
							$addr_list .= '<label for="ad_sel_addr_same">주문자와 동일</label>'.PHP_EOL;
						}
						?>
						<tr>
							<th scope="row">배송지선택</th>
							<td>
								<?php echo $addr_list; ?>
							</td>
						</tr>
						<?php if($is_member) { ?>
						<tr>
							<th scope="row"><label for="ad_subject">배송지명</label></th>
							<td>
								<input type="text" name="ad_subject" id="ad_subject" class="frm_input" maxlength="20">
								<input type="checkbox" name="ad_default" id="ad_default" value="1">
								<label for="ad_default">기본배송지로 설정</label>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<th scope="row"><label for="od_b_name">이름<strong class="sound_only"> 필수</strong></label></th>
							<td><input type="text" name="od_b_name" id="od_b_name" required class="frm_input required" maxlength="20"></td>
						</tr>
						<tr>
							<th scope="row"><label for="od_b_tel">전화번호<strong class="sound_only"> 필수</strong></label></th>
							<td><input type="text" name="od_b_tel" id="od_b_tel" required class="frm_input required" maxlength="20"></td>
						</tr>
						<tr>
							<th scope="row"><label for="od_b_hp">핸드폰</label></th>
							<td><input type="text" name="od_b_hp" id="od_b_hp" class="frm_input" maxlength="20"></td>
						</tr>
						<tr>
							<th scope="row">주소</th>
							<td id="sod_frm_addr">
								<label for="od_b_zip" class="sound_only">우편번호<strong class="sound_only"> 필수</strong></label>
								<input type="text" name="od_b_zip" id="od_b_zip" required class="frm_input required" size="8" maxlength="6" placeholder="우편번호">
								<button type="button" class="btn_address" onclick="win_zip('forderform', 'od_b_zip', 'od_b_addr1', 'od_b_addr2', 'od_b_addr3', 'od_b_addr_jibeon');">주소 검색</button><br>
								<input type="text" name="od_b_addr1" id="od_b_addr1" required class="frm_input frm_address required" size="60" placeholder="기본주소">
								<label for="od_b_addr1" class="sound_only">기본주소<strong> 필수</strong></label><br>
								<input type="text" name="od_b_addr2" id="od_b_addr2" class="frm_input frm_address" size="60" placeholder="상세주소">
								<label for="od_b_addr2" class="sound_only">상세주소</label>
								<br>
								<input type="text" name="od_b_addr3" id="od_b_addr3" readonly="readonly" class="frm_input frm_address" size="60" placeholder="참고항목">
								<label for="od_b_addr3" class="sound_only">참고항목</label><br>
								<input type="hidden" name="od_b_addr_jibeon" value="">
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="od_memo">전하실말씀</label></th>
							<td><textarea name="od_memo" id="od_memo"></textarea></td>
						</tr>
						</tbody>
						</table>
					</div>
				</section>
				<!-- } 받으시는 분 입력 끝 -->
			</div>

			<div class="sod_right">
				<!-- 주문상품 합계 시작 { -->
				<div id="sod_bsk_tot">
					<ul>
						<li class="sod_bsk_sell">
							<span>주문</span>
							<strong><?php echo number_format($tot_sell_price); ?></strong>원
						</li>
						<li class="sod_bsk_coupon">
							<span>쿠폰할인</span>
							<strong id="ct_tot_coupon">0</strong>원
						</li>
						<li class="sod_bsk_dvr">
							<span>배송비</span>
							<strong><?php echo number_format($send_cost); ?></strong>원
						</li>
						<li class="sod_bsk_point">
							<span>포인트</span>
							<strong><?php echo number_format($tot_point); ?></strong>점
						</li>
					   <li class="sod_bsk_cnt">
							<span>총계</span>
							<?php $tot_price = $tot_sell_price + $send_cost; // 총계 = 주문상품금액합계 + 배송비 ?>
							<strong id="ct_tot_price"><?php echo number_format($tot_price); ?></strong>원
						</li>

					</ul>
				</div>
				<!-- } 주문상품 합계 끝 -->


				<!-- 결제정보 입력 시작 { -->
				<?php
				$oc_cnt = $sc_cnt = 0;
				if($is_member) {
					// 주문쿠폰
					$sql = " select cp_id
								from {$g5['g5_shop_coupon_table']}
								where mb_id IN ( '{$member['mb_id']}', '전체회원' )
								  and cp_method = '2'
								  and cp_start <= '".G5_TIME_YMD."'
								  and cp_end >= '".G5_TIME_YMD."'
								  and cp_minimum <= '$tot_sell_price' ";
					$res = sql_query($sql);

					for($k=0; $cp=sql_fetch_array($res); $k++) {
						if(is_used_coupon($member['mb_id'], $cp['cp_id']))
							continue;

						$oc_cnt++;
					}

					if($send_cost > 0) {
						// 배송비쿠폰
						$sql = " select cp_id
									from {$g5['g5_shop_coupon_table']}
									where mb_id IN ( '{$member['mb_id']}', '전체회원' )
									  and cp_method = '3'
									  and cp_start <= '".G5_TIME_YMD."'
									  and cp_end >= '".G5_TIME_YMD."'
									  and cp_minimum <= '$tot_sell_price' ";
						$res = sql_query($sql);

						for($k=0; $cp=sql_fetch_array($res); $k++) {
							if(is_used_coupon($member['mb_id'], $cp['cp_id']))
								continue;

							$sc_cnt++;
						}
					}
				}
				?>

				<section id="sod_frm_pay">
					<h2>결제정보</h2>

					<div class="pay_tbl">
						<table>
						<tbody>
						<?php if($oc_cnt > 0) { ?>
						<tr>
							<th scope="row">주문할인</th>
							<td>
								<strong id="od_cp_price">0</strong>원
								<input type="hidden" name="od_cp_id" value="">
								<button type="button" id="od_coupon_btn" class="btn_frmline">쿠폰적용</button>
							</td>
						</tr>
						<?php } ?>
						<?php if($sc_cnt > 0) { ?>
						<tr>
							<th scope="row">배송비할인</th>
							<td>
								<strong id="sc_cp_price">0</strong>원
								<input type="hidden" name="sc_cp_id" value="">
								<button type="button" id="sc_coupon_btn" class="btn_frmline">쿠폰적용</button>
							</td>
						</tr>
						<?php } ?>

						<tr>
							<th>추가배송비</th>
							<td><strong id="od_send_cost2">0</strong>원<br>(지역에 따라 추가되는 도선료 등의 배송비입니다.)</td>
						</tr>
						</tbody>
						</table>
					</div>
					<div id="od_tot_price">
						<span>총 주문금액</span>
						<strong class="print_price"><?php echo number_format($tot_price); ?></strong>원
					</div>

					<div id="od_pay_sl">
						<h3>결제수단</h3>
						<?php
						if (!$default['de_card_point'])
							echo '<p id="sod_frm_pt_alert"><strong>무통장입금</strong> 이외의 결제 수단으로 결제하시는 경우 포인트를 적립해드리지 않습니다.</p>';

						$multi_settle == 0;
						$checked = '';

						$escrow_title = "";
						if ($default['de_escrow_use']) {
							$escrow_title = "에스크로<br>";
						}

						if ($is_kakaopay_use || $default['de_bank_use'] || $default['de_vbank_use'] || $default['de_iche_use'] || $default['de_card_use'] || $default['de_hp_use'] || $default['de_easy_pay_use'] || $default['de_inicis_lpay_use']) {
							echo '<fieldset id="sod_frm_paysel">';
							echo '<legend>결제방법 선택</legend>';
						}

						// 카카오페이
						if($is_kakaopay_use) {
							$multi_settle++;
							echo '<input type="radio" id="od_settle_kakaopay" name="od_settle_case" value="KAKAOPAY" '.$checked.'> <label for="od_settle_kakaopay" class="kakaopay_icon lb_icon">KAKAOPAY</label>'.PHP_EOL;
							$checked = '';
						}

						// 무통장입금 사용
						if ($default['de_bank_use']) {
							$multi_settle++;
							echo '<input type="radio" id="od_settle_bank" name="od_settle_case" value="무통장" '.$checked.'> <label for="od_settle_bank" class="lb_icon bank_icon">무통장입금</label>'.PHP_EOL;
							$checked = '';
						}

						// 가상계좌 사용
						if ($default['de_vbank_use']) {
							$multi_settle++;
							echo '<input type="radio" id="od_settle_vbank" name="od_settle_case" value="가상계좌" '.$checked.'> <label for="od_settle_vbank" class="lb_icon vbank_icon">'.$escrow_title.'가상계좌</label>'.PHP_EOL;
							$checked = '';
						}

						// 계좌이체 사용
						if ($default['de_iche_use']) {
							$multi_settle++;
							echo '<input type="radio" id="od_settle_iche" name="od_settle_case" value="계좌이체" '.$checked.'> <label for="od_settle_iche" class="lb_icon iche_icon">'.$escrow_title.'계좌이체</label>'.PHP_EOL;
							$checked = '';
						}

						// 휴대폰 사용
						if ($default['de_hp_use']) {
							$multi_settle++;
							echo '<input type="radio" id="od_settle_hp" name="od_settle_case" value="휴대폰" '.$checked.'> <label for="od_settle_hp" class="lb_icon hp_icon">휴대폰</label>'.PHP_EOL;
							$checked = '';
						}

						// 신용카드 사용
						if ($default['de_card_use']) {
							$multi_settle++;
							echo '<input type="radio" id="od_settle_card" name="od_settle_case" value="신용카드" '.$checked.'> <label for="od_settle_card" class="lb_icon card_icon">신용카드</label>'.PHP_EOL;
							$checked = '';
						}

						// PG 간편결제
						if($default['de_easy_pay_use']) {
							switch($default['de_pg_service']) {
								case 'lg':
									$pg_easy_pay_name = 'PAYNOW';
									break;
								case 'inicis':
									$pg_easy_pay_name = 'KPAY';
									break;
								default:
									$pg_easy_pay_name = 'PAYCO';
									break;
							}

							$multi_settle++;
							echo '<input type="radio" id="od_settle_easy_pay" name="od_settle_case" value="간편결제" '.$checked.'> <label for="od_settle_easy_pay" class="'.$pg_easy_pay_name.' lb_icon">'.$pg_easy_pay_name.'</label>'.PHP_EOL;
							$checked = '';
						}

						//이니시스 Lpay
						if($default['de_inicis_lpay_use']) {
							echo '<input type="radio" id="od_settle_inicislpay" data-case="lpay" name="od_settle_case" value="lpay" '.$checked.'> <label for="od_settle_inicislpay" class="inicis_lpay lb_icon">L.pay</label>'.PHP_EOL;
							$checked = '';
						}

						$temp_point = 0;
						// 회원이면서 포인트사용이면
						if ($is_member && $config['cf_use_point'])
						{
							// 포인트 결제 사용 포인트보다 회원의 포인트가 크다면
							if ($member['mb_point'] >= $default['de_settle_min_point'])
							{
								$temp_point = (int)$default['de_settle_max_point'];

								if($temp_point > (int)$tot_sell_price)
									$temp_point = (int)$tot_sell_price;

								if($temp_point > (int)$member['mb_point'])
									$temp_point = (int)$member['mb_point'];

								$point_unit = (int)$default['de_settle_point_unit'];
								$temp_point = (int)((int)($temp_point / $point_unit) * $point_unit);
						?>
						<div class="sod_frm_point">
							<div>
								<label for="od_temp_point">사용 포인트(<?php echo $point_unit; ?>점 단위)</label>
								<input type="hidden" name="max_temp_point" value="<?php echo $temp_point; ?>">
								<input type="text" name="od_temp_point" value="0" id="od_temp_point"  size="7"> 점
							</div>
							<div id="sod_frm_pt">
								<span><strong>보유포인트</strong><?php echo display_point($member['mb_point']); ?></span>
								<span class="max_point_box"><strong>최대 사용 가능 포인트</strong><em id="use_max_point"><?php echo display_point($temp_point); ?></em></span>
							</div>
						</div>
						<?php
							$multi_settle++;
							}
						}

						if ($default['de_bank_use']) {
							// 은행계좌를 배열로 만든후
							$str = explode("\n", trim($default['de_bank_account']));
							if (count($str) <= 1)
							{
								$bank_account = '<input type="hidden" name="od_bank_account" value="'.$str[0].'">'.$str[0].PHP_EOL;
							}
							else
							{
								$bank_account = '<select name="od_bank_account" id="od_bank_account">'.PHP_EOL;
								$bank_account .= '<option value="">선택하십시오.</option>';
								for ($i=0; $i<count($str); $i++)
								{
									//$str[$i] = str_replace("\r", "", $str[$i]);
									$str[$i] = trim($str[$i]);
									$bank_account .= '<option value="'.$str[$i].'">'.$str[$i].'</option>'.PHP_EOL;
								}
								$bank_account .= '</select>'.PHP_EOL;
							}
							echo '<div id="settle_bank" style="display:none">';
							echo '<label for="od_bank_account" class="sound_only">입금할 계좌</label>';
							echo $bank_account;
							echo '<br><label for="od_deposit_name">입금자명</label> ';
							echo '<input type="text" name="od_deposit_name" id="od_deposit_name" size="10" maxlength="20">';
							echo '</div>';
						}

						if ($is_kakaopay_use || $default['de_bank_use'] || $default['de_vbank_use'] || $default['de_iche_use'] || $default['de_card_use'] || $default['de_hp_use'] || $default['de_easy_pay_use'] || $default['de_inicis_lpay_use'] ) {
							echo '</fieldset>';
						}

						if ($multi_settle == 0)
							echo '<p>결제할 방법이 없습니다.<br>운영자에게 알려주시면 감사하겠습니다.</p>';
						?>
					</div>
				</section>
				<!-- } 결제 정보 입력 끝 -->

				<?php
				// 결제대행사별 코드 include (주문버튼)
				require_once(G5_SHOP_PATH.'/'.$default['de_pg_service'].'/orderform.3.php');

				if($is_kakaopay_use) {
					require_once(G5_SHOP_PATH.'/kakaopay/orderform.3.php');
				}
				?>

				<?php
				if ($default['de_escrow_use']) {
					// 결제대행사별 코드 include (에스크로 안내)
					require_once(G5_SHOP_PATH.'/'.$default['de_pg_service'].'/orderform.4.php');
				}
				?>
			</div>

		</div>
	</form>
</div>
<?php
if( $default['de_inicis_lpay_use'] ){   //이니시스 L.pay 사용시
    require_once(G5_SHOP_PATH.'/inicis/lpay_order.script.php');
}
?>
<script>
var zipcode = "";
var form_action_url = "<?php echo $order_action_url; ?>";

$(function() {
    var $cp_btn_el;
    var $cp_row_el;

    $(".cp_btn").click(function() {
        $cp_btn_el = $(this);
        $cp_row_el = $(this).closest("tr");
        $("#cp_frm").remove();
        var it_id = $cp_btn_el.closest("tr").find("input[name^=it_id]").val();

        $.post(
            "./orderitemcoupon.php",
            { it_id: it_id,  sw_direct: "<?php echo $sw_direct; ?>" },
            function(data) {
                $cp_btn_el.after(data);
            }
        );
    });

    $(document).on("click", ".cp_apply", function() {
        var $el = $(this).closest("tr");
        var cp_id = $el.find("input[name='f_cp_id[]']").val();
        var price = $el.find("input[name='f_cp_prc[]']").val();
        var subj = $el.find("input[name='f_cp_subj[]']").val();
        var sell_price;

        if(parseInt(price) == 0) {
            if(!confirm(subj+"쿠폰의 할인 금액은 "+price+"원입니다.\n쿠폰을 적용하시겠습니까?")) {
                return false;
            }
        }

        // 이미 사용한 쿠폰이 있는지
        var cp_dup = false;
        var cp_dup_idx;
        var $cp_dup_el;
        $("input[name^=cp_id]").each(function(index) {
            var id = $(this).val();

            if(id == cp_id) {
                cp_dup_idx = index;
                cp_dup = true;
                $cp_dup_el = $(this).closest("tr");;

                return false;
            }
        });

        if(cp_dup) {
            var it_name = $("input[name='it_name["+cp_dup_idx+"]']").val();
            if(!confirm(subj+ "쿠폰은 "+it_name+"에 사용되었습니다.\n"+it_name+"의 쿠폰을 취소한 후 적용하시겠습니까?")) {
                return false;
            } else {
                coupon_cancel($cp_dup_el);
                $("#cp_frm").remove();
                $cp_dup_el.find(".cp_btn").text("적용").focus();
                $cp_dup_el.find(".cp_cancel").remove();
            }
        }

        var $s_el = $cp_row_el.find(".total_price");;
        sell_price = parseInt($cp_row_el.find("input[name^=it_price]").val());
        sell_price = sell_price - parseInt(price);
        if(sell_price < 0) {
            alert("쿠폰할인금액이 상품 주문금액보다 크므로 쿠폰을 적용할 수 없습니다.");
            return false;
        }
        $s_el.text(number_format(String(sell_price)));
        $cp_row_el.find("input[name^=cp_id]").val(cp_id);
        $cp_row_el.find("input[name^=cp_price]").val(price);

        calculate_total_price();
        $("#cp_frm").remove();
        $cp_btn_el.text("변경").focus();
        if(!$cp_row_el.find(".cp_cancel").size())
            $cp_btn_el.after("<button type=\"button\" class=\"cp_cancel\">취소</button>");
    });

    $(document).on("click", "#cp_close", function() {
        $("#cp_frm").remove();
        $cp_btn_el.focus();
    });

    $(document).on("click", ".cp_cancel", function() {
        coupon_cancel($(this).closest("tr"));
        calculate_total_price();
        $("#cp_frm").remove();
        $(this).closest("tr").find(".cp_btn").text("적용").focus();
        $(this).remove();
    });

    $("#od_coupon_btn").click(function() {
        $("#od_coupon_frm").remove();
        var $this = $(this);
        var price = parseInt($("input[name=org_od_price]").val()) - parseInt($("input[name=item_coupon]").val());
        if(price <= 0) {
            alert('상품금액이 0원이므로 쿠폰을 사용할 수 없습니다.');
            return false;
        }
        $.post(
            "./ordercoupon.php",
            { price: price },
            function(data) {
                $this.after(data);
            }
        );
    });

    $(document).on("click", ".od_cp_apply", function() {
        var $el = $(this).closest("tr");
        var cp_id = $el.find("input[name='o_cp_id[]']").val();
        var price = parseInt($el.find("input[name='o_cp_prc[]']").val());
        var subj = $el.find("input[name='o_cp_subj[]']").val();
        var send_cost = $("input[name=od_send_cost]").val();
        var item_coupon = parseInt($("input[name=item_coupon]").val());
        var od_price = parseInt($("input[name=org_od_price]").val()) - item_coupon;

        if(price == 0) {
            if(!confirm(subj+"쿠폰의 할인 금액은 "+price+"원입니다.\n쿠폰을 적용하시겠습니까?")) {
                return false;
            }
        }

        if(od_price - price <= 0) {
            alert("쿠폰할인금액이 주문금액보다 크므로 쿠폰을 적용할 수 없습니다.");
            return false;
        }

        $("input[name=sc_cp_id]").val("");
        $("#sc_coupon_btn").text("쿠폰적용");
        $("#sc_coupon_cancel").remove();

        $("input[name=od_price]").val(od_price - price);
        $("input[name=od_cp_id]").val(cp_id);
        $("input[name=od_coupon]").val(price);
        $("input[name=od_send_coupon]").val(0);
        $("#od_cp_price").text(number_format(String(price)));
        $("#sc_cp_price").text(0);
        calculate_order_price();
        $("#od_coupon_frm").remove();
        $("#od_coupon_btn").text("변경").focus();
        if(!$("#od_coupon_cancel").size())
            $("#od_coupon_btn").after("<button type=\"button\" id=\"od_coupon_cancel\" class=\"cp_cancel\">취소</button>");
    });

    $(document).on("click", "#od_coupon_close", function() {
        $("#od_coupon_frm").remove();
        $("#od_coupon_btn").focus();
    });

    $(document).on("click", "#od_coupon_cancel", function() {
        var org_price = $("input[name=org_od_price]").val();
        var item_coupon = parseInt($("input[name=item_coupon]").val());
        $("input[name=od_price]").val(org_price - item_coupon);
        $("input[name=sc_cp_id]").val("");
        $("input[name=od_coupon]").val(0);
        $("input[name=od_send_coupon]").val(0);
        $("#od_cp_price").text(0);
        $("#sc_cp_price").text(0);
        calculate_order_price();
        $("#od_coupon_frm").remove();
        $("#od_coupon_btn").text("쿠폰적용").focus();
        $(this).remove();
        $("#sc_coupon_btn").text("쿠폰적용");
        $("#sc_coupon_cancel").remove();
    });

    $("#sc_coupon_btn").click(function() {
        $("#sc_coupon_frm").remove();
        var $this = $(this);
        var price = parseInt($("input[name=od_price]").val());
        var send_cost = parseInt($("input[name=od_send_cost]").val());
        $.post(
            "./ordersendcostcoupon.php",
            { price: price, send_cost: send_cost },
            function(data) {
                $this.after(data);
            }
        );
    });

    $(document).on("click", ".sc_cp_apply", function() {
        var $el = $(this).closest("tr");
        var cp_id = $el.find("input[name='s_cp_id[]']").val();
        var price = parseInt($el.find("input[name='s_cp_prc[]']").val());
        var subj = $el.find("input[name='s_cp_subj[]']").val();
        var send_cost = parseInt($("input[name=od_send_cost]").val());

        if(parseInt(price) == 0) {
            if(!confirm(subj+"쿠폰의 할인 금액은 "+price+"원입니다.\n쿠폰을 적용하시겠습니까?")) {
                return false;
            }
        }

        $("input[name=sc_cp_id]").val(cp_id);
        $("input[name=od_send_coupon]").val(price);
        $("#sc_cp_price").text(number_format(String(price)));
        calculate_order_price();
        $("#sc_coupon_frm").remove();
        $("#sc_coupon_btn").text("변경").focus();
        if(!$("#sc_coupon_cancel").size())
            $("#sc_coupon_btn").after("<button type=\"button\" id=\"sc_coupon_cancel\" class=\"cp_cancel\">취소</button>");
    });

    $(document).on("click", "#sc_coupon_close", function() {
        $("#sc_coupon_frm").remove();
        $("#sc_coupon_btn").focus();
    });

    $(document).on("click", "#sc_coupon_cancel", function() {
        $("input[name=od_send_coupon]").val(0);
        $("#sc_cp_price").text(0);
        calculate_order_price();
        $("#sc_coupon_frm").remove();
        $("#sc_coupon_btn").text("쿠폰적용").focus();
        $(this).remove();
    });

    $("#od_b_addr2").focus(function() {
        var zip = $("#od_b_zip").val().replace(/[^0-9]/g, "");
        if(zip == "")
            return false;

        var code = String(zip);

        if(zipcode == code)
            return false;

        zipcode = code;
        calculate_sendcost(code);
    });

    $("#od_settle_bank").on("click", function() {
        $("[name=od_deposit_name]").val( $("[name=od_name]").val() );
        $("#settle_bank").show();
    });

    $("#od_settle_iche,#od_settle_card,#od_settle_vbank,#od_settle_hp,#od_settle_easy_pay,#od_settle_kakaopay").bind("click", function() {
        $("#settle_bank").hide();
    });

    // 배송지선택
    $("input[name=ad_sel_addr]").on("click", function() {
        var addr = $(this).val().split(String.fromCharCode(30));

        if (addr[0] == "same") {
            gumae2baesong();
        } else {
            if(addr[0] == "new") {
                for(i=0; i<10; i++) {
                    addr[i] = "";
                }
            }

            var f = document.forderform;
            f.od_b_name.value        = addr[0];
            f.od_b_tel.value         = addr[1];
            f.od_b_hp.value          = addr[2];
            f.od_b_zip.value         = addr[3] + addr[4];
            f.od_b_addr1.value       = addr[5];
            f.od_b_addr2.value       = addr[6];
            f.od_b_addr3.value       = addr[7];
            f.od_b_addr_jibeon.value = addr[8];
            f.ad_subject.value       = addr[9];

            var zip1 = addr[3].replace(/[^0-9]/g, "");
            var zip2 = addr[4].replace(/[^0-9]/g, "");

            var code = String(zip1) + String(zip2);

            if(zipcode != code) {
                calculate_sendcost(code);
            }
        }
    });

    // 배송지목록
    $("#order_address").on("click", function() {
        var url = this.href;
        window.open(url, "win_address", "left=100,top=100,width=800,height=600,scrollbars=1");
        return false;
    });
});

function coupon_cancel($el)
{
    var $dup_sell_el = $el.find(".total_price");
    var $dup_price_el = $el.find("input[name^=cp_price]");
    var org_sell_price = $el.find("input[name^=it_price]").val();

    $dup_sell_el.text(number_format(String(org_sell_price)));
    $dup_price_el.val(0);
    $el.find("input[name^=cp_id]").val("");
}

function calculate_total_price()
{
    var $it_prc = $("input[name^=it_price]");
    var $cp_prc = $("input[name^=cp_price]");
    var tot_sell_price = sell_price = tot_cp_price = 0;
    var it_price, cp_price, it_notax;
    var tot_mny = comm_tax_mny = comm_vat_mny = comm_free_mny = tax_mny = vat_mny = 0;
    var send_cost = parseInt($("input[name=od_send_cost]").val());

    $it_prc.each(function(index) {
        it_price = parseInt($(this).val());
        cp_price = parseInt($cp_prc.eq(index).val());
        sell_price += it_price;
        tot_cp_price += cp_price;
    });

    tot_sell_price = sell_price - tot_cp_price + send_cost;

    $("#ct_tot_coupon").text(number_format(String(tot_cp_price)));
    $("#ct_tot_price").text(number_format(String(tot_sell_price)));

    $("input[name=good_mny]").val(tot_sell_price);
    $("input[name=od_price]").val(sell_price - tot_cp_price);
    $("input[name=item_coupon]").val(tot_cp_price);
    $("input[name=od_coupon]").val(0);
    $("input[name=od_send_coupon]").val(0);
    <?php if($oc_cnt > 0) { ?>
    $("input[name=od_cp_id]").val("");
    $("#od_cp_price").text(0);
    if($("#od_coupon_cancel").size()) {
        $("#od_coupon_btn").text("쿠폰적용");
        $("#od_coupon_cancel").remove();
    }
    <?php } ?>
    <?php if($sc_cnt > 0) { ?>
    $("input[name=sc_cp_id]").val("");
    $("#sc_cp_price").text(0);
    if($("#sc_coupon_cancel").size()) {
        $("#sc_coupon_btn").text("쿠폰적용");
        $("#sc_coupon_cancel").remove();
    }
    <?php } ?>
    $("input[name=od_temp_point]").val(0);
    <?php if($temp_point > 0 && $is_member) { ?>
    calculate_temp_point();
    <?php } ?>
    calculate_order_price();
}

function calculate_order_price()
{
    var sell_price = parseInt($("input[name=od_price]").val());
    var send_cost = parseInt($("input[name=od_send_cost]").val());
    var send_cost2 = parseInt($("input[name=od_send_cost2]").val());
    var send_coupon = parseInt($("input[name=od_send_coupon]").val());
    var tot_price = sell_price + send_cost + send_cost2 - send_coupon;

    $("input[name=good_mny]").val(tot_price);
    $("#od_tot_price .print_price").text(number_format(String(tot_price)));
    <?php if($temp_point > 0 && $is_member) { ?>
    calculate_temp_point();
    <?php } ?>
}

function calculate_temp_point()
{
    var sell_price = parseInt($("input[name=od_price]").val());
    var mb_point = parseInt(<?php echo $member['mb_point']; ?>);
    var max_point = parseInt(<?php echo $default['de_settle_max_point']; ?>);
    var point_unit = parseInt(<?php echo $default['de_settle_point_unit']; ?>);
    var temp_point = max_point;

    if(temp_point > sell_price)
        temp_point = sell_price;

    if(temp_point > mb_point)
        temp_point = mb_point;

    temp_point = parseInt(temp_point / point_unit) * point_unit;

    $("#use_max_point").text(number_format(String(temp_point))+"점");
    $("input[name=max_temp_point]").val(temp_point);
}

function calculate_sendcost(code)
{
    $.post(
        "./ordersendcost.php",
        { zipcode: code },
        function(data) {
            $("input[name=od_send_cost2]").val(data);
            $("#od_send_cost2").text(number_format(String(data)));

            zipcode = code;

            calculate_order_price();
        }
    );
}

function calculate_tax()
{
    var $it_prc = $("input[name^=it_price]");
    var $cp_prc = $("input[name^=cp_price]");
    var sell_price = tot_cp_price = 0;
    var it_price, cp_price, it_notax;
    var tot_mny = comm_free_mny = tax_mny = vat_mny = 0;
    var send_cost = parseInt($("input[name=od_send_cost]").val());
    var send_cost2 = parseInt($("input[name=od_send_cost2]").val());
    var od_coupon = parseInt($("input[name=od_coupon]").val());
    var send_coupon = parseInt($("input[name=od_send_coupon]").val());
    var temp_point = 0;

    $it_prc.each(function(index) {
        it_price = parseInt($(this).val());
        cp_price = parseInt($cp_prc.eq(index).val());
        sell_price += it_price;
        tot_cp_price += cp_price;
        it_notax = $("input[name^=it_notax]").eq(index).val();
        if(it_notax == "1") {
            comm_free_mny += (it_price - cp_price);
        } else {
            tot_mny += (it_price - cp_price);
        }
    });

    if($("input[name=od_temp_point]").size())
        temp_point = parseInt($("input[name=od_temp_point]").val());

    tot_mny += (send_cost + send_cost2 - od_coupon - send_coupon - temp_point);
    if(tot_mny < 0) {
        comm_free_mny = comm_free_mny + tot_mny;
        tot_mny = 0;
    }

    tax_mny = Math.round(tot_mny / 1.1);
    vat_mny = tot_mny - tax_mny;
    $("input[name=comm_tax_mny]").val(tax_mny);
    $("input[name=comm_vat_mny]").val(vat_mny);
    $("input[name=comm_free_mny]").val(comm_free_mny);
}

function forderform_check(f)
{
    // 재고체크
    var stock_msg = order_stock_check();
    if(stock_msg != "") {
        alert(stock_msg);
        return false;
    }

    errmsg = "";
    errfld = "";
    var deffld = "";

    check_field(f.od_name, "주문하시는 분 이름을 입력하십시오.");
    if (typeof(f.od_pwd) != 'undefined')
    {
        clear_field(f.od_pwd);
        if( (f.od_pwd.value.length<3) || (f.od_pwd.value.search(/([^A-Za-z0-9]+)/)!=-1) )
            error_field(f.od_pwd, "회원이 아니신 경우 주문서 조회시 필요한 비밀번호를 3자리 이상 입력해 주십시오.");
    }
    check_field(f.od_tel, "주문하시는 분 전화번호를 입력하십시오.");
    check_field(f.od_addr1, "주소검색을 이용하여 주문하시는 분 주소를 입력하십시오.");
    //check_field(f.od_addr2, " 주문하시는 분의 상세주소를 입력하십시오.");
    check_field(f.od_zip, "");

    clear_field(f.od_email);
    if(f.od_email.value=='' || f.od_email.value.search(/(\S+)@(\S+)\.(\S+)/) == -1)
        error_field(f.od_email, "E-mail을 바르게 입력해 주십시오.");

    if (typeof(f.od_hope_date) != "undefined")
    {
        clear_field(f.od_hope_date);
        if (!f.od_hope_date.value)
            error_field(f.od_hope_date, "희망배송일을 선택하여 주십시오.");
    }

    check_field(f.od_b_name, "받으시는 분 이름을 입력하십시오.");
    check_field(f.od_b_tel, "받으시는 분 전화번호를 입력하십시오.");
    check_field(f.od_b_addr1, "주소검색을 이용하여 받으시는 분 주소를 입력하십시오.");
    //check_field(f.od_b_addr2, "받으시는 분의 상세주소를 입력하십시오.");
    check_field(f.od_b_zip, "");

    var od_settle_bank = document.getElementById("od_settle_bank");
    if (od_settle_bank) {
        if (od_settle_bank.checked) {
            check_field(f.od_bank_account, "계좌번호를 선택하세요.");
            check_field(f.od_deposit_name, "입금자명을 입력하세요.");
        }
    }

    // 배송비를 받지 않거나 더 받는 경우 아래식에 + 또는 - 로 대입
    f.od_send_cost.value = parseInt(f.od_send_cost.value);

    if (errmsg)
    {
        alert(errmsg);
        errfld.focus();
        return false;
    }

    var settle_case = document.getElementsByName("od_settle_case");
    var settle_check = false;
    var settle_method = "";
    for (i=0; i<settle_case.length; i++)
    {
        if (settle_case[i].checked)
        {
            settle_check = true;
            settle_method = settle_case[i].value;
            break;
        }
    }
    if (!settle_check)
    {
        alert("결제방식을 선택하십시오.");
        return false;
    }

    var od_price = parseInt(f.od_price.value);
    var send_cost = parseInt(f.od_send_cost.value);
    var send_cost2 = parseInt(f.od_send_cost2.value);
    var send_coupon = parseInt(f.od_send_coupon.value);

    var max_point = 0;
    if (typeof(f.max_temp_point) != "undefined")
        max_point  = parseInt(f.max_temp_point.value);

    var temp_point = 0;
    if (typeof(f.od_temp_point) != "undefined") {
        if (f.od_temp_point.value)
        {
            var point_unit = parseInt(<?php echo $default['de_settle_point_unit']; ?>);
            temp_point = parseInt(f.od_temp_point.value);

            if (temp_point < 0) {
                alert("포인트를 0 이상 입력하세요.");
                f.od_temp_point.select();
                return false;
            }

            if (temp_point > od_price) {
                alert("상품 주문금액(배송비 제외) 보다 많이 포인트결제할 수 없습니다.");
                f.od_temp_point.select();
                return false;
            }

            if (temp_point > <?php echo (int)$member['mb_point']; ?>) {
                alert("회원님의 포인트보다 많이 결제할 수 없습니다.");
                f.od_temp_point.select();
                return false;
            }

            if (temp_point > max_point) {
                alert(max_point + "점 이상 결제할 수 없습니다.");
                f.od_temp_point.select();
                return false;
            }

            if (parseInt(parseInt(temp_point / point_unit) * point_unit) != temp_point) {
                alert("포인트를 "+String(point_unit)+"점 단위로 입력하세요.");
                f.od_temp_point.select();
                return false;
            }

            // pg 결제 금액에서 포인트 금액 차감
            if(settle_method != "무통장") {
                f.good_mny.value = od_price + send_cost + send_cost2 - send_coupon - temp_point;
            }
        }
    }

    var tot_price = od_price + send_cost + send_cost2 - send_coupon - temp_point;

    if (document.getElementById("od_settle_iche")) {
        if (document.getElementById("od_settle_iche").checked) {
            if (tot_price < 150) {
                alert("계좌이체는 150원 이상 결제가 가능합니다.");
                return false;
            }
        }
    }

    if (document.getElementById("od_settle_card")) {
        if (document.getElementById("od_settle_card").checked) {
            if (tot_price < 1000) {
                alert("신용카드는 1000원 이상 결제가 가능합니다.");
                return false;
            }
        }
    }

    if (document.getElementById("od_settle_hp")) {
        if (document.getElementById("od_settle_hp").checked) {
            if (tot_price < 350) {
                alert("휴대폰은 350원 이상 결제가 가능합니다.");
                return false;
            }
        }
    }

    <?php if($default['de_tax_flag_use']) { ?>
    calculate_tax();
    <?php } ?>

    <?php if($default['de_pg_service'] == 'inicis') { ?>
    if( f.action != form_action_url ){
        f.action = form_action_url;
        f.removeAttribute("target");
        f.removeAttribute("accept-charset");
    }
    <?php } ?>

    // 카카오페이 지불
    if(settle_method == "KAKAOPAY") {
        <?php if($default['de_tax_flag_use']) { ?>
        f.SupplyAmt.value = parseInt(f.comm_tax_mny.value) + parseInt(f.comm_free_mny.value);
        f.GoodsVat.value  = parseInt(f.comm_vat_mny.value);
        <?php } ?>
        getTxnId(f);
        return false;
    }

    var form_order_method = '';

    if( settle_method == "lpay" ){      //이니시스 L.pay 이면 ( 이니시스의 삼성페이는 모바일에서만 단독실행 가능함 )
        form_order_method = 'samsungpay';
    }

    if( jQuery(f).triggerHandler("form_sumbit_order_"+form_order_method) !== false ) {

        // pay_method 설정
        <?php if($default['de_pg_service'] == 'kcp') { ?>
        f.site_cd.value = f.def_site_cd.value;
        f.payco_direct.value = "";
        switch(settle_method)
        {
            case "계좌이체":
                f.pay_method.value   = "010000000000";
                break;
            case "가상계좌":
                f.pay_method.value   = "001000000000";
                break;
            case "휴대폰":
                f.pay_method.value   = "000010000000";
                break;
            case "신용카드":
                f.pay_method.value   = "100000000000";
                break;
            case "간편결제":
                <?php if($default['de_card_test']) { ?>
                f.site_cd.value      = "S6729";
                <?php } ?>
                f.pay_method.value   = "100000000000";
                f.payco_direct.value = "Y";
                break;
            default:
                f.pay_method.value   = "무통장";
                break;
        }
        <?php } else if($default['de_pg_service'] == 'lg') { ?>
        f.LGD_EASYPAY_ONLY.value = "";
        if(typeof f.LGD_CUSTOM_USABLEPAY === "undefined") {
            var input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "LGD_CUSTOM_USABLEPAY");
            input.setAttribute("value", "");
            f.LGD_EASYPAY_ONLY.parentNode.insertBefore(input, f.LGD_EASYPAY_ONLY);
        }

        switch(settle_method)
        {
            case "계좌이체":
                f.LGD_CUSTOM_FIRSTPAY.value = "SC0030";
                f.LGD_CUSTOM_USABLEPAY.value = "SC0030";
                break;
            case "가상계좌":
                f.LGD_CUSTOM_FIRSTPAY.value = "SC0040";
                f.LGD_CUSTOM_USABLEPAY.value = "SC0040";
                break;
            case "휴대폰":
                f.LGD_CUSTOM_FIRSTPAY.value = "SC0060";
                f.LGD_CUSTOM_USABLEPAY.value = "SC0060";
                break;
            case "신용카드":
                f.LGD_CUSTOM_FIRSTPAY.value = "SC0010";
                f.LGD_CUSTOM_USABLEPAY.value = "SC0010";
                break;
            case "간편결제":
                var elm = f.LGD_CUSTOM_USABLEPAY;
                if(elm.parentNode)
                    elm.parentNode.removeChild(elm);
                f.LGD_EASYPAY_ONLY.value = "PAYNOW";
                break;
            default:
                f.LGD_CUSTOM_FIRSTPAY.value = "무통장";
                break;
        }
        <?php }  else if($default['de_pg_service'] == 'inicis') { ?>
        switch(settle_method)
        {
            case "계좌이체":
                f.gopaymethod.value = "DirectBank";
                break;
            case "가상계좌":
                f.gopaymethod.value = "VBank";
                break;
            case "휴대폰":
                f.gopaymethod.value = "HPP";
                break;
            case "신용카드":
                f.gopaymethod.value = "Card";
                f.acceptmethod.value = f.acceptmethod.value.replace(":useescrow", "");
                break;
            case "간편결제":
                f.gopaymethod.value = "Kpay";
                break;
            case "lpay":
                f.gopaymethod.value = "onlylpay";
                f.acceptmethod.value = f.acceptmethod.value+":cardonly";
                break;
            default:
                f.gopaymethod.value = "무통장";
                break;
        }
        <?php } ?>

        // 결제정보설정
        <?php if($default['de_pg_service'] == 'kcp') { ?>
        f.buyr_name.value = f.od_name.value;
        f.buyr_mail.value = f.od_email.value;
        f.buyr_tel1.value = f.od_tel.value;
        f.buyr_tel2.value = f.od_hp.value;
        f.rcvr_name.value = f.od_b_name.value;
        f.rcvr_tel1.value = f.od_b_tel.value;
        f.rcvr_tel2.value = f.od_b_hp.value;
        f.rcvr_mail.value = f.od_email.value;
        f.rcvr_zipx.value = f.od_b_zip.value;
        f.rcvr_add1.value = f.od_b_addr1.value;
        f.rcvr_add2.value = f.od_b_addr2.value;

        if(f.pay_method.value != "무통장") {
            jsf__pay( f );
        } else {
            f.submit();
        }
        <?php } ?>
        <?php if($default['de_pg_service'] == 'lg') { ?>
        f.LGD_BUYER.value = f.od_name.value;
        f.LGD_BUYEREMAIL.value = f.od_email.value;
        f.LGD_BUYERPHONE.value = f.od_hp.value;
        f.LGD_AMOUNT.value = f.good_mny.value;
        f.LGD_RECEIVER.value = f.od_b_name.value;
        f.LGD_RECEIVERPHONE.value = f.od_b_hp.value;
        <?php if($default['de_escrow_use']) { ?>
        f.LGD_ESCROW_ZIPCODE.value = f.od_b_zip.value;
        f.LGD_ESCROW_ADDRESS1.value = f.od_b_addr1.value;
        f.LGD_ESCROW_ADDRESS2.value = f.od_b_addr2.value;
        f.LGD_ESCROW_BUYERPHONE.value = f.od_hp.value;
        <?php } ?>
        <?php if($default['de_tax_flag_use']) { ?>
        f.LGD_TAXFREEAMOUNT.value = f.comm_free_mny.value;
        <?php } ?>

        if(f.LGD_CUSTOM_FIRSTPAY.value != "무통장") {
            launchCrossPlatform(f);
        } else {
            f.submit();
        }
        <?php } ?>
        <?php if($default['de_pg_service'] == 'inicis') { ?>
        f.price.value       = f.good_mny.value;
        <?php if($default['de_tax_flag_use']) { ?>
        f.tax.value         = f.comm_vat_mny.value;
        f.taxfree.value     = f.comm_free_mny.value;
        <?php } ?>
        f.buyername.value   = f.od_name.value;
        f.buyeremail.value  = f.od_email.value;
        f.buyertel.value    = f.od_hp.value ? f.od_hp.value : f.od_tel.value;
        f.recvname.value    = f.od_b_name.value;
        f.recvtel.value     = f.od_b_hp.value ? f.od_b_hp.value : f.od_b_tel.value;
        f.recvpostnum.value = f.od_b_zip.value;
        f.recvaddr.value    = f.od_b_addr1.value + " " +f.od_b_addr2.value;

        if(f.gopaymethod.value != "무통장") {
            // 주문정보 임시저장
            var order_data = $(f).serialize();
            var save_result = "";
            $.ajax({
                type: "POST",
                data: order_data,
                url: g5_url+"/shop/ajax.orderdatasave.php",
                cache: false,
                async: false,
                success: function(data) {
                    save_result = data;
                }
            });

            if(save_result) {
                alert(save_result);
                return false;
            }

            if(!make_signature(f))
                return false;
            
            paybtn(f);
        } else {
            f.submit();
        }
        <?php } ?>

        <?php if($default['de_pg_service'] == 'nicepay') { // acefive ?>
        switch(settle_method)
        {
            case "계좌이체":
                f.PayMethod.value = "BANK";
                break;
            case "가상계좌":
                f.PayMethod.value = "VBANK";
                break;
            case "휴대폰":
                f.PayMethod.value = "CELLPHONE";
                break;
            case "신용카드":
                f.PayMethod.value = "CARD";
                break;
            default:
                f.PayMethod.value = "무통장";
                break;
        }

        // 결제정보설정
        f.Amt.value = f.good_mny.value;
        f.BuyerName.value = f.od_name.value;
        f.BuyerEmail.value = f.od_email.value;
        f.BuyerTel.value = f.od_tel.value;
        f.BuyerAddr.value = f.od_b_addr1.value + f.od_b_addr2.value;
        f.BuyerPostNo.value = f.od_b_zip.value;

        $.ajax({
            type: "post",
            data: {'Amt': f.Amt.value, 'edate': f.EdiDate.value},
            url: "<?php echo G5_SHOP_URL?>/nicepay/orderform.enc.php",
            cache: false,
            async: false,
            dataType: "json",
            success : function(req) {
                f.EncryptData.value = req.resdata;
            }
        });

        if(f.PayMethod.value != "무통장") {

            if(nicepay( f )) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }

        <?php } ?>
    }

}

// 구매자 정보와 동일합니다.
function gumae2baesong() {
    var f = document.forderform;

    f.od_b_name.value = f.od_name.value;
    f.od_b_tel.value  = f.od_tel.value;
    f.od_b_hp.value   = f.od_hp.value;
    f.od_b_zip.value  = f.od_zip.value;
    f.od_b_addr1.value = f.od_addr1.value;
    f.od_b_addr2.value = f.od_addr2.value;
    f.od_b_addr3.value = f.od_addr3.value;
    f.od_b_addr_jibeon.value = f.od_addr_jibeon.value;

    calculate_sendcost(String(f.od_b_zip.value));
}

<?php if ($default['de_hope_date_use']) { ?>
$(function(){
    $("#od_hope_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", minDate: "+<?php echo (int)$default['de_hope_date_after']; ?>d;", maxDate: "+<?php echo (int)$default['de_hope_date_after'] + 6; ?>d;" });
});
<?php } ?>
</script>