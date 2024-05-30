<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_CSS_URL.'/style.css">', 0);
?>

<style>
#sit {}

#sit_ov_from {background:#fff;border-bottom:1px solid #e3e3e3;clear:both}
#sit_ov_wrap {width:1600px;padding-top:100px;}
#sit_ov {width:700px;}
#sit_ov p.product_title {font-size: 30px;font-weight: 500;margin-bottom: 20px;}

#sit_ov div.info_box {float:right;width:580px;}
#sit_ov div.info_box p.desc {font-size: 16px;font-weight: 400;line-height: 30px;}
#sit_ov div.info_box p.after {position:relative;}
#sit_ov div.info_box p.after:after {display:block;position:absolute;left:-115px;top:0;color:#999;}
#sit_ov div.info_box p.basic_n:after {content:"제품명"}
#sit_ov div.info_box p.brand_n:after {content:"브랜드"}
#sit_ov div.info_box p.size_n:after {content:"규격"}
#sit_ov div.info_box p.date_n{line-height: 1; margin-top: 10px;}
<?php if($it['it_id'] == '1691560535'){
	
} else {
	echo '#sit_ov div.info_box p.date_n:after {content:"설치 희망일"; line-height: 30px;}';
}?>


#sit_ov div.info_box p.after input {height:30px;}

#sit_ov div.price_box {float:right;width:580px;position:relative;}
#sit_ov div.price_box.price {height:608px}
#sit_ov div.price_box.price:after {content:"제작사양";display:block;position:absolute;left:-115px;top:5px;color:#999;font-size: 16px;font-weight: 400;line-height: 30px;}
#sit_ov div.price_box.inquiry {margin-top:15px;height:560px}
<?php if($it['it_id'] == '1691560535'){
	echo '#sit_ov div.price_box.inquiry:after {content:"※ 리팟은 현재 데모 운영을 하지 않습니다.\00000a제품에 대한 상세한 정보는 가디언즈 프로그램을 통해 확인하실 수 있습니다."; display:block;position:absolute;left:-115px;top:0px;color:#999;font-size: 20px !important;font-weight: 400;line-height: 2 !important; white-space: break-spaces;word-break: keep-all;}';
} else {
	echo '#sit_ov div.price_box.inquiry:after {content:"요청 메모란";display:block;position:absolute;left:-115px;top:0px;color:#999;font-size: 16px;font-weight: 400;line-height: 1;}';
}?>
#sit_ov div.price_box .sit_option {padding:0;}
#sit_ov div.price_box .sit_option label {display: none;}
#sit_ov div.price_box .sit_option select {margin:0;}
#sit_ov div.price_box #sit_ov_btn {position:absolute;bottom:0;width:100%;}
#sit_ov div.price_box #sit_ov_btn button {width:49%;margin-right:0;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_cart {margin-bottom:0;}
#sit_ov div.price_box #sit_ov_btn a {width:49%;margin-bottom:0;}
#sit_ov div.price_box #sit_ov_btn a.linkbtn{background: #b1b4b9; text-align: center; display: block; width:100%; height: 50px; line-height: 50px; margin-bottom: 10px; font-weight: bold; font-size: 1.6em; border:1px solid #b1b4b9; border-radius: 3px; color: #fff;}
#sit_ov div.price_box #sit_ov_btn #btn_submit {float:left;display: inline-block;width: 49%;height: 50px;line-height: 50px;color: #fff;font-size: 1.6em;margin-right:2%;border: 1px solid #b1b4b9;text-align: center;background:#b1b4b9;cursor:pointer;border-radius: 3px;font-weight: bold;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_buy {width:100%;background:#b1b4b9;border-color:#b1b4b9;margin-top: 10px;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_cart {margin-right:2%;}
#sit_ov div.price_box .textarea {margin-bottom:10px;}
<?php if($it['it_id'] == '1691560535'){?>
	#sit_ov div.price_box .textarea textarea {width:100%;border:0 !important;background:#white !important;padding:20px;font-size: 14px;font-weight: 400;resize:none; pointer-events: none;}
<?php } else { ?>
	#sit_ov div.price_box .textarea textarea {width:100%;border:1px solid #ebebeb;background:#fafafa;padding:20px;font-size: 14px;font-weight: 400;resize:none}
<?php }?>

#sit_tab .tab_tit li {display:inline-block;float:left;width:255px}
#sit_tab .tab_tit li button {display:block;width:100%;position:relative;font-size:1.2em;padding:10px 15px;border:0;color:#666;background:#f9f8f7;line-height:38px;text-align:center;z-index:1}
#sit_tab .tab_tit li .selected {background:#b1b4b9;z-index:2;border-bottom-color:#fff;color:#fff;font-weight:bold}


#sit_pvi {float:left;position:relative;}
#sit_pvi_big {text-align:center;border:1px solid #e9e9e9;}
#sit_pvi_big a {display:none}
#sit_pvi_big a.visible {display:block}
#sit_pvi_big #popup_item_image {display:inline-block;position:absolute;bottom:0;right:0;width:43px;height:43px;line-height:43px;background:#fff;color:#8c9195;border:1px solid #e0e0e0;font-size:1.4em}
#sit_pvi_big img {width:700px;height:auto}
#sit_pvi_thumb {margin:0;padding:0;list-style:none;text-align:center;margin-top:20px;}
#sit_pvi_thumb:after {display:block;visibility:hidden;clear:both;content:""}
#sit_pvi_thumb li {float:left;margin:0 15px 15px 0}
#sit_pvi_thumb img {border:1px solid #dbdbdb}
#sit_pvi_thumb img:hover {border:1px solid #010101}

#sit_pvi_nwbig {padding:10px 0;text-align:center}
#sit_pvi_nwbig span {display:none}
#sit_pvi_nwbig span.visible {display:inline}
#sit_pvi_nw ul {margin:0 0 20px;text-align:center;padding:0 10px;list-style:none}
#sit_pvi_nw ul:after {display:block;visibility:hidden;clear:both;content:""}
#sit_pvi_nw li {display:inline-block;margin:0 0 1px 1px}
#sit_pvi_nw li img {width:60px;height:60px}

.sit_info {}

/* 상세페이지 맨하단 브랜드사이트 바로가기 버튼 */
#sit .maxbottombtn{background: #b1b4b9; text-align: center; display: block; width:580px; height: 50px; line-height: 50px; margin:50px auto; font-weight: bold; font-size: 1.6em; border:1px solid #b1b4b9; border-radius: 3px; color: #fff;}


@media (max-width:1760px){
#sit {}

#sit_ov_from {border-bottom:0.0568vw solid #e3e3e3;clear:both}
#sit_ov_wrap {width:90.9091vw;padding-top:5.6818vw;}
#sit_ov {width:39.7727vw;}
#sit_ov p.product_title {font-size: 1.7045vw;margin-bottom: 1.1364vw;}

#sit_ov div.info_box {width:32.9545vw;}
#sit_ov div.info_box p.desc {font-size: 0.9091vw;line-height: 1.7045vw;}
#sit_ov div.info_box p.after {}
#sit_ov div.info_box p.after:after {left:-6.5341vw;top:0;}
#sit_ov div.info_box p.date_n{line-height: 1; margin-top: 0.5682vw;}
#sit_ov div.info_box p.date_n:after {line-height: 1.7045vw;}

#sit_ov div.info_box p.after input {height:1.7045vw;}

#sit_ov div.price_box {width:32.9545vw;}
#sit_ov div.price_box.price {height: 34.5455vw;}
#sit_ov div.price_box.price:after {left:-6.5341vw;top:0.2841vw;font-size: 0.9091vw;line-height: 1.7045vw;}
#sit_ov div.price_box.inquiry {margin-top:0.8523vw;height:31.8182vw}
#sit_ov div.price_box.inquiry:after {left:-6.5341vw;top:0vw;font-size: 0.9091vw;line-height: 1;}
#sit_ov div.price_box .sit_option {padding:0;}
#sit_ov div.price_box .sit_option label {}
#sit_ov div.price_box .sit_option select {margin:0;}
#sit_ov div.price_box #sit_ov_btn{}
#sit_ov div.price_box #sit_ov_btn button {width:49%;margin-right:0;height: 2.8409vw;line-height: 2.8409vw;font-size: 1.6em;border: 0.0568vw solid #b1b4b9;border-radius: 0.1705vw;}
#sit_ov div.price_box #sit_ov_btn a {width:49%;height: 2.8409vw;line-height: 2.8409vw;font-size: 1.6em;border: 0.0568vw solid #b1b4b9;border-radius: 0.1705vw;}
#sit_ov div.price_box #sit_ov_btn a.linkbtn{background: #b1b4b9;   width:100%; height: 2.9412vw; line-height: 2.9412vw; margin-bottom: 0.5882vw;  font-size: 1.6em; border:0.0588vw solid #b1b4b9; border-radius: 0.1765vw; }
#sit_ov div.price_box #sit_ov_btn #btn_submit {width: 49%;height: 2.8409vw;line-height: 2.8409vw;font-size: 1.6em;border: 0.0568vw solid #b1b4b9;border-radius: 0.1705vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_buy {width:100%;border-margin-top: 0.5682vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_cart {margin-right:2%;}
#sit_ov div.price_box .textarea {margin-bottom:0.5682vw;}
#sit_ov div.price_box .textarea textarea {width:100%;border:0.0568vw solid #ebebeb;padding:1.1364vw;font-size: 0.7955vw;}

#sit_tab .tab_tit li {width:14.4886vw}
#sit_tab .tab_tit li button {width:100%;font-size:1.2em;padding:0.5682vw 0.8523vw;line-height:2.1591vw;}
#sit_tab .tab_tit li .selected {}

#sit_pvi {position:relative}
#sit_pvi_big {text-align:center}
#sit_pvi_big a {display:none}
#sit_pvi_big a.visible {display:block}
#sit_pvi_big #popup_item_image {bottom:0;right:0;width:2.4432vw;height:2.4432vw;line-height:2.4432vw;background:#fff;border:0.0568vw solid #e0e0e0;font-size:1.4em}
#sit_pvi_big img {width:39.7727vw;height:auto}
#sit_pvi_thumb {margin:0;padding:0;list-style:none;text-align:center;margin-top:1.1364vw;}
#sit_pvi_thumb:after {visibility:hidden;clear:both;content:""}
#sit_pvi_thumb li {margin:0 0.8523vw 0.8523vw 0}
#sit_pvi_thumb img {border:0.0568vw solid #dbdbdb}
#sit_pvi_thumb img:hover {border:0.0568vw solid #010101}

#sit_pvi_nwbig {padding:0.5682vw 0;text-align:center}
#sit_pvi_nwbig span {display:none}
#sit_pvi_nwbig span.visible {display:inline}
#sit_pvi_nw ul {margin:0 0 1.1364vw;padding:0 0.5682vw;list-style:none}
#sit_pvi_nw ul:after {visibility:hidden;clear:both;content:""}
#sit_pvi_nw li {margin:0 0 0.0568vw 0.0568vw}
#sit_pvi_nw li img {width:3.4091vw;height:3.4091vw}

/* 상세페이지 맨하단 브랜드사이트 바로가기 버튼 */
#sit .maxbottombtn{background: #b1b4b9;   width:32.9545vw; height: 2.8409vw; line-height: 2.8409vw; margin:2.8409vw auto;  font-size: 1.6em; border:0.0568vw solid #b1b4b9; border-radius: 0.1705vw; }

}

@media (max-width:1600px){
#sit {}

#sit_ov_from {border-bottom:0.0625vw solid #e3e3e3;clear:both}
#sit_ov_wrap {width:100.0000vw;padding:0 2.5000vw;padding-top:6.2500vw;}
#sit_ov {width:43.7500vw;}
#sit_ov p.product_title {font-size: 1.8750vw;margin-bottom: 1.2500vw;}

#sit_ov div.info_box {width:36.2500vw;}
#sit_ov div.info_box p.desc {font-size: 1.0000vw;line-height: 1.8750vw;}
#sit_ov div.info_box p.after {}
#sit_ov div.info_box p.after:after {left:-7.1875vw;top:0;}
#sit_ov div.info_box p.date_n{line-height: 1; margin-top: 0.6250vw;}
#sit_ov div.info_box p.date_n:after {line-height: 1.8750vw;}

#sit_ov div.info_box p.after input {height:1.8750vw;}

#sit_ov div.price_box {width:36.2500vw;}
#sit_ov div.price_box.price {height:38.0000vw;}
#sit_ov div.price_box.price:after {left:-7.1875vw;top:0.3125vw;font-size: 1.0000vw;line-height: 1.8750vw;}
#sit_ov div.price_box.inquiry {margin-top:0.9375vw;height: 35.0000vw;}
#sit_ov div.price_box.inquiry:after {left:-7.1875vw;top:0vw;font-size: 1.0000vw;line-height: 1;}
#sit_ov div.price_box .sit_option {padding:0;}
#sit_ov div.price_box .sit_option label {}
#sit_ov div.price_box .sit_option select {margin:0;}

#sit_ov div.price_box #sit_ov_btn button {width:49%;margin-right:0;height: 3.1250vw;line-height: 3.1250vw;font-size: 1.6em;border: 0.0625vw solid #b1b4b9;border-radius: 0.1875vw;}
#sit_ov div.price_box #sit_ov_btn a {width: 49%;height: 3.1250vw;line-height: 3.1250vw;font-size: 1.6em;border: 0.0625vw solid #b1b4b9;border-radius: 0.1875vw;}
#sit_ov div.price_box #sit_ov_btn a.linkbtn{background: #b1b4b9;   width:100%; height: 3.1250vw; line-height: 3.1250vw; margin-bottom: 0.6250vw;  font-size: 1.6em; border:0.0625vw solid #b1b4b9; border-radius: 0.1875vw; }
#sit_ov div.price_box #sit_ov_btn #btn_submit {width: 49%;height: 3.1250vw;line-height: 3.1250vw;font-size: 1.6em;border: 0.0625vw solid #b1b4b9;border-radius: 0.1875vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_buy {width:100%;border-margin-top: 0.6250vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_cart {margin-right:2%;}
#sit_ov div.price_box .textarea {margin-bottom:0.6250vw;}
#sit_ov div.price_box .textarea textarea {width:100%;border:0.0625vw solid #ebebeb;padding:1.2500vw;font-size: 0.8750vw;}

#sit_tab .tab_tit li {width:15.9375vw}
#sit_tab .tab_tit li button {width:100%;font-size:1.2em;padding:0.6250vw 0.9375vw;line-height:2.3750vw;}
#sit_tab .tab_tit li .selected {}

#sit_pvi {position:relative;width:43.7500vw}
#sit_pvi_big {text-align:center}
#sit_pvi_big a {display:none}
#sit_pvi_big a.visible {display:block}
#sit_pvi_big #popup_item_image {bottom:0;right:0;width:2.6875vw;height:2.6875vw;line-height:2.6875vw;background:#fff;border:0.0625vw solid #e0e0e0;font-size:1.4em}
#sit_pvi_big img {width:43.7500vw;height:auto}
#sit_pvi_thumb {margin:0;padding:0;list-style:none;text-align:center;margin-top:1.2500vw;}
#sit_pvi_thumb:after {visibility:hidden;clear:both;content:""}
#sit_pvi_thumb li {margin:0 0.9375vw 0.9375vw 0}
#sit_pvi_thumb img {border:0.0625vw solid #dbdbdb}
#sit_pvi_thumb img:hover {border:0.0625vw solid #010101}

#sit_pvi_nwbig {padding:0.6250vw 0;text-align:center}
#sit_pvi_nwbig span {display:none}
#sit_pvi_nwbig span.visible {display:inline}
#sit_pvi_nw ul {margin:0 0 1.2500vw;padding:0 0.6250vw;list-style:none}
#sit_pvi_nw ul:after {visibility:hidden;clear:both;content:""}
#sit_pvi_nw li {margin:0 0 0.0625vw 0.0625vw}
#sit_pvi_nw li img {width:3.7500vw;height:3.7500vw}

/* 상세페이지 맨하단 브랜드사이트 바로가기 버튼 */
#sit .maxbottombtn{background: #b1b4b9;   width:36.2500vw; height: 3.1250vw; line-height: 3.1250vw; margin:3.1250vw auto;  font-size: 1.6em; border:0.0625vw solid #b1b4b9; border-radius: 0.1875vw; }

}

@media (max-width:1400px){
#sit {}

#sit_ov_from {border-bottom:0.0714vw solid #e3e3e3;clear:both}
#sit_ov_wrap {width:100%;padding:0 2.8571vw;padding-top:7.1429vw;}
#sit_ov {width:42.8571vw;}
#sit_ov p.product_title {font-size: 2.1429vw;margin-bottom: 1.4286vw;}

#sit_ov div.info_box {width:34.2857vw;}
#sit_ov div.info_box p.desc {font-size: 1.1429vw;line-height: 2.1429vw;}
#sit_ov div.info_box p.after {}
#sit_ov div.info_box p.after:after {left:-8.2143vw;top:0;}
#sit_ov div.info_box p.date_n{line-height: 1; margin-top: 0.7143vw;}
#sit_ov div.info_box p.date_n:after {line-height: 2.1429vw;}

#sit_ov div.info_box p.after input {height:2.1429vw;}

#sit_ov div.price_box {width:34.2857vw;}
#sit_ov div.price_box.price {height:39.8571vw;}
#sit_ov div.price_box.price:after {left:-8.2143vw;top:0.3571vw;font-size: 1.1429vw;line-height: 2.1429vw;}
#sit_ov div.price_box.inquiry {margin-top:1.0714vw;height:36.4286vw;}
#sit_ov div.price_box.inquiry:after {left:-8.2143vw;top:0vw;font-size: 1.1429vw;line-height: 1;}
#sit_ov div.price_box .sit_option {padding:0;}
#sit_ov div.price_box .sit_option label {}
#sit_ov div.price_box .sit_option select {margin:0;}
#sit_ov div.price_box #sit_ov_btn{bottom:-3vw;}
#sit_ov div.price_box #sit_ov_btn button {width:49%;margin-right:0;height: 3.5714vw;line-height: 3.5714vw;font-size: 1.6em;border: 0.0714vw solid #b1b4b9;border-radius: 0.2143vw;}
#sit_ov div.price_box #sit_ov_btn a {width: 49%;height: 3.5714vw;line-height: 3.5714vw;font-size: 1.6em;border: 0.0714vw solid #b1b4b9;border-radius: 0.2143vw;}
#sit_ov div.price_box #sit_ov_btn a.linkbtn{background: #b1b4b9;   width:100%; height: 3.5714vw; line-height: 3.5714vw; margin-bottom: 0.7143vw;  font-size: 1.6em; border:0.0714vw solid #b1b4b9; border-radius: 0.2143vw; }
#sit_ov div.price_box #sit_ov_btn #btn_submit {width: 49%;height: 3.5714vw;line-height: 3.5714vw;font-size: 1.6em;border: 0.0714vw solid #b1b4b9;border-radius: 0.2143vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_buy {width:100%;border-margin-top: 0.7143vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_cart {margin-right:2%;}
#sit_ov div.price_box .textarea {margin-bottom:0.7143vw;}
#sit_ov div.price_box .textarea textarea {width:100%;border:0.0714vw solid #ebebeb;padding:1.4286vw;font-size: 1.0000vw;}

#sit_tab .tab_tit li {width:18.2143vw}
#sit_tab .tab_tit li button {width:100%;font-size:1.2em;padding:0.7143vw 1.0714vw;line-height:2.7143vw;}
#sit_tab .tab_tit li .selected {}

#sit_pvi {width:46.4286vw;}
#sit_pvi_big {text-align:center}
#sit_pvi_big a {display:none}
#sit_pvi_big a.visible {display:block}
#sit_pvi_big #popup_item_image {bottom:0;right:0;width:3.0714vw;height:3.0714vw;line-height:3.0714vw;background:#fff;border:0.0714vw solid #e0e0e0;font-size:1.4em}
#sit_pvi_big img {width:46.4286vw;height:auto}
#sit_pvi_thumb {margin:0;padding:0;list-style:none;text-align:center;margin-top:1.4286vw;}
#sit_pvi_thumb:after {visibility:hidden;clear:both;content:""}
#sit_pvi_thumb li {margin:0 1.0714vw 1.0714vw 0}
#sit_pvi_thumb img {border:0.0714vw solid #dbdbdb}
#sit_pvi_thumb img:hover {border:0.0714vw solid #010101}

#sit_pvi_nwbig {padding:0.7143vw 0;text-align:center}
#sit_pvi_nwbig span {display:none}
#sit_pvi_nwbig span.visible {display:inline}
#sit_pvi_nw ul {margin:0 0 1.4286vw;padding:0 0.7143vw;list-style:none}
#sit_pvi_nw ul:after {visibility:hidden;clear:both;content:""}
#sit_pvi_nw li {margin:0 0 0.0714vw 0.0714vw}
#sit_pvi_nw li img {width:4.2857vw;height:4.2857vw}

/* 상세페이지 맨하단 브랜드사이트 바로가기 버튼 */
#sit .maxbottombtn{background: #b1b4b9;   width:41.4286vw; height: 3.5714vw; line-height: 3.5714vw; margin:3.5714vw auto;  font-size: 1.6em; border:0.0714vw solid #b1b4b9; border-radius: 0.2143vw; }

}

@media (max-width:1024px){
#sit {}

#sit_ov_from {border-bottom:0.0977vw solid #e3e3e3;clear:both}
#sit_ov_wrap {width:100%;padding-top:9.7656vw;}
#sit_ov {width:44.9219vw;}
#sit_ov p.product_title {font-size: 2.9297vw;margin-bottom: 1.9531vw;}

#sit_ov div.info_box {width:33.3984vw;}
#sit_ov div.info_box p.desc {font-size: 1.5625vw;line-height: 2.9297vw;}
#sit_ov div.info_box p.after {}
#sit_ov div.info_box p.after:after {left:-11.2305vw;top:0;}
#sit_ov div.info_box p.date_n{line-height: 1; margin-top: 0.9766vw;}
#sit_ov div.info_box p.date_n:after {line-height: 2.9297vw;}

#sit_ov div.info_box p.after input {height:2.9297vw;}

#sit_ov div.price_box {width:33.3984vw;}
#sit_ov div.price_box.price:after {left:-11.2305vw;top:0.4883vw;font-size: 1.5625vw;line-height: 2.9297vw;}
#sit_ov div.price_box.inquiry {margin-top:1.4648vw;height:auto;}
#sit_ov div.price_box.inquiry:after {left:-11.2305vw;top:0vw;font-size: 1.5625vw;line-height: 1;}
#sit_ov div.price_box .sit_option {padding:0;}
#sit_ov div.price_box .sit_option label {}
#sit_ov div.price_box .sit_option select {margin:0;}
#sit_ov div.price_box #sit_ov_btn {position:relative; bottom:-1vw;}
#sit_ov div.price_box #sit_ov_btn button {width:49%;margin-right:0;height: 4.8828vw;line-height: 4.8828vw;font-size: 1.6em;border: 0.0977vw solid #b1b4b9;border-radius: 0.2930vw;}
#sit_ov div.price_box #sit_ov_btn a {width: 49%;height: 3.8828vw;line-height: 3.8828vw;font-size: 1.3em;border: 0.0977vw solid #b1b4b9;border-radius: 0.2930vw;}
#sit_ov div.price_box #sit_ov_btn a.linkbtn{background: #b1b4b9;   width:100%; height: 3.8828vw; line-height: 3.8828vw; margin-bottom: 0.9766vw;  font-size: 1.3em; border:0.0977vw solid #b1b4b9; border-radius: 0.2930vw; }
#sit_ov div.price_box #sit_ov_btn #btn_submit {width: 49%;height: 3.8828vw;line-height: 3.8828vw;font-size: 1.3em;border: 0.0977vw solid #b1b4b9;border-radius: 0.2930vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_buy {width:100%;border-margin-top: 0.9766vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_cart {margin-right:2%;}
#sit_ov div.price_box .textarea {margin-bottom:0.9766vw;}
#sit_ov div.price_box .textarea textarea {width:100%;border:0.0977vw solid #ebebeb;padding:1.9531vw;font-size: 1.3672vw;}

#sit_tab .tab_tit li {width:24.9023vw}
#sit_tab .tab_tit li button {width:100%;font-size:1.2em;padding:0.9766vw 1.4648vw;line-height:3.7109vw;}
#sit_tab .tab_tit li .selected {}

#sit_pvi {width:50%;}
#sit_pvi_big {text-align:center}
#sit_pvi_big a {display:none}
#sit_pvi_big a.visible {display:block}
#sit_pvi_big #popup_item_image {bottom:0;right:0;width:4.1992vw;height:4.1992vw;line-height:4.1992vw;background:#fff;border:0.0977vw solid #e0e0e0;font-size:1.4em}
#sit_pvi_big img {width:78.1250vw;height:auto}
#sit_pvi_thumb {margin:0;padding:0;list-style:none;text-align:center;margin-top:1.9531vw;}
#sit_pvi_thumb:after {visibility:hidden;clear:both;content:""}
#sit_pvi_thumb li {margin:0 1.4648vw 1.4648vw 0}
#sit_pvi_thumb img {border:0.0977vw solid #dbdbdb}
#sit_pvi_thumb img:hover {border:0.0977vw solid #010101}

#sit_pvi_nwbig {padding:0.9766vw 0;text-align:center}
#sit_pvi_nwbig span {display:none}
#sit_pvi_nwbig span.visible {display:inline}
#sit_pvi_nw ul {margin:0 0 1.9531vw;padding:0 0.9766vw;list-style:none}
#sit_pvi_nw ul:after {visibility:hidden;clear:both;content:""}
#sit_pvi_nw li {margin:0 0 0.0977vw 0.0977vw}
#sit_pvi_nw li img {width:5.8594vw;height:5.8594vw}

/* 상세페이지 맨하단 브랜드사이트 바로가기 버튼 */
#sit .maxbottombtn{background: #b1b4b9;   width:56.6406vw; height: 4.8828vw; line-height: 4.8828vw; margin:4.8828vw auto;  font-size: 1.6em; border:0.0977vw solid #b1b4b9; border-radius: 0.2930vw; }

}

@media (max-width:768px){
#sit {}

#sit_ov_from {border-bottom:0.1302vw solid #e3e3e3;clear:both}
#sit_ov_wrap {width:100%;padding-top:13.0208vw;}
#sit_ov {float:none;width:100%;}
#sit_ov:after {content:"";display:block;clear:both;}
#sit_ov p.product_title {font-size: 3.9063vw;margin-bottom: 2.6042vw;}

#sit_ov div.info_box {width:100%;float:none;}
#sit_ov div.info_box p.desc {font-size: 2.0833vw;line-height: 3.9063vw;text-align: right;}
#sit_ov div.info_box p.after {}
#sit_ov div.info_box p.after:after {left:0;top:0;}
#sit_ov div.info_box p.date_n{line-height: 3.9063vw; margin-top: 0vw;}
#sit_ov div.info_box p.date_n:after {line-height: 3.9063vw;}

#sit_ov div.info_box p.after input {height:3.9063vw;font-size: 2.0833vw;width: 16.9271vw;}

#sit_ov div.price_box {width:100%;float:none;margin-top:5.2083vw;}
#sit_ov div.price_box.price:after {left:0;top:-4.4271vw;font-size: 2.0833vw;line-height: 3.9063vw;}
#sit_ov div.price_box.inquiry {margin-top:5.2083vw;}
#sit_ov div.price_box.inquiry:after {left:0;top:-4.4271vw;font-size: 2.0833vw;line-height: 1;}
#sit_ov div.price_box .sit_option {padding:0;}
#sit_ov div.price_box .sit_option label {}
#sit_ov div.price_box .sit_option select {margin:0;}
#sit_ov div.price_box #sit_ov_btn button {width:49%;margin-right:0;height: 6.5104vw;line-height: 6.5104vw;font-size: 1.2em;border: 0.1302vw solid #b1b4b9;border-radius: 0.3906vw;}
#sit_ov div.price_box #sit_ov_btn a {width: 49%;height: 6.5104vw;line-height: 6.5104vw;font-size: 1.2em;border: 0.1302vw solid #b1b4b9;border-radius: 0.3906vw;}
#sit_ov div.price_box #sit_ov_btn a.linkbtn{width: 100%; height: 6.5104vw;line-height: 6.5104vw;font-size: 1.2em;border: 0.1302vw solid #b1b4b9;border-radius: 0.3906vw; }
#sit_ov div.price_box #sit_ov_btn #btn_submit {width: 49%;height: 6.5104vw;line-height: 6.5104vw;font-size: 1.2em;border: 0.1302vw solid #b1b4b9;border-radius: 0.3906vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_buy {width:100%;border-margin-top: 1.3021vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_cart {margin-right:2%;}
#sit_ov div.price_box .textarea {margin-bottom:1.3021vw;}
#sit_ov div.price_box .textarea textarea {width:100%;border:0.1302vw solid #ebebeb;padding:2.6042vw;font-size: 1.8229vw;}

#sit_tab .tab_tit li {width:33.3333%}
#sit_tab .tab_tit li button {width:100%;font-size:1.2em;padding:1.3021vw 1.9531vw;line-height:4.9479vw;}
#sit_tab .tab_tit li .selected {}

#sit_pvi {width:100%;float:none;}
#sit_pvi_big {text-align:center}
#sit_pvi_big a {display:none}
#sit_pvi_big a.visible {display:block}
#sit_pvi_big #popup_item_image {bottom:0;right:0;width:5.5990vw;height:5.5990vw;line-height:5.5990vw;background:#fff;border:0.1302vw solid #e0e0e0;font-size:1.4em}
#sit_pvi_big img {width:104.1667vw;height:auto}
#sit_pvi_thumb {margin:0;padding:0;list-style:none;text-align:center;margin-top:2.6042vw;}
#sit_pvi_thumb:after {visibility:hidden;clear:both;content:""}
#sit_pvi_thumb li {margin:0 1.9531vw 1.9531vw 0}
#sit_pvi_thumb img {border:0.1302vw solid #dbdbdb}
#sit_pvi_thumb img:hover {border:0.1302vw solid #010101}

#sit_pvi_nwbig {padding:1.3021vw 0;text-align:center}
#sit_pvi_nwbig span {display:none}
#sit_pvi_nwbig span.visible {display:inline}
#sit_pvi_nw ul {margin:0 0 2.6042vw;padding:0 1.3021vw;list-style:none}
#sit_pvi_nw ul:after {visibility:hidden;clear:both;content:""}
#sit_pvi_nw li {margin:0 0 0.1302vw 0.1302vw}
#sit_pvi_nw li img {width:7.8125vw;height:7.8125vw}

/* 상세페이지 맨하단 브랜드사이트 바로가기 버튼 */
#sit .maxbottombtn{background: #b1b4b9;   width:75.5208vw; height: 9.7656vw; line-height: 9.7656vw; margin:6.5104vw auto;  font-size: 1.8em; border:0.1302vw solid #b1b4b9; border-radius: 0.3906vw; }

}

@media (max-width:480px){
#sit {}

#sit_ov_from {border-bottom:0.2083vw solid #e3e3e3;clear:both}
#sit_ov_wrap {width:100%;padding-top:20.8333vw;}
#sit_ov {width:100%;}
#sit_ov:after {clear:both;}
#sit_ov p.product_title {font-size: 6.2500vw;margin-bottom: 4.1667vw;}

#sit_ov div.info_box {width:100%;}
#sit_ov div.info_box p.desc {font-size: 3.33vw;line-height: 4.9063vw;}
#sit_ov div.info_box p.after {}
#sit_ov div.info_box p.after:after {left:0;top:0;}
#sit_ov div.info_box p.date_n{line-height: 4.9063vw; margin-top: 0vw;}
#sit_ov div.info_box p.date_n:after {line-height: 4.9063vw;}

#sit_ov div.info_box p.after input {height:3.9063vw;font-size: 3.33vw;width: 25vw;}

#sit_ov div.price_box {width:100%;margin-top:5.2083vw;}
#sit_ov div.price_box.price:after {left:0;top:-4.4271vw;font-size: 3.33vw;line-height: 3.9063vw;}
#sit_ov div.price_box.inquiry {margin-top:5.2083vw;}
#sit_ov div.price_box.inquiry:after {left:0;top:-4.4271vw;font-size: 3.33vw;line-height: 1;}
#sit_ov div.price_box .sit_option {padding:0;}
#sit_ov div.price_box .sit_option label {}
#sit_ov div.price_box .sit_option select {margin:0;}
#sit_ov div.price_box #sit_ov_btn button {width:49%;margin-right:0;height: 10.4167vw;line-height: 10.4167vw;font-size: 1.2em;border: 0.2083vw solid #b1b4b9;border-radius: 0.6250vw;}
#sit_ov div.price_box #sit_ov_btn a {width:49%;height: 10.4167vw;line-height: 10.4167vw;font-size: 1.2em;border: 0.2083vw solid #b1b4b9;border-radius: 0.6250vw;}
#sit_ov div.price_box #sit_ov_btn a.linkbtn{width: 100%;height: 10.4167vw;line-height: 10.4167vw;font-size: 1.2em;border: 0.2083vw solid #b1b4b9;border-radius: 0.6250vw;}
#sit_ov div.price_box #sit_ov_btn #btn_submit {width: 49%;height: 10.4167vw;line-height: 10.4167vw;font-size: 1.2em;border: 0.2083vw solid #b1b4b9;border-radius: 0.6250vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_buy {width:100%;border-margin-top: 2.0833vw;}
#sit_ov div.price_box #sit_ov_btn button.sit_btn_cart {margin-right:2%;}
#sit_ov div.price_box .textarea {margin-bottom:2.0833vw;}
#sit_ov div.price_box .textarea textarea {width:100%;border:0.2083vw solid #ebebeb;padding:4.1667vw;font-size: 2.9167vw;}

#sit_tab .tab_tit li {width:33.3333%}
#sit_tab .tab_tit li button {width:100%;font-size:1.2em;padding:2.0833vw 3.1250vw;line-height:7.9167vw;}
#sit_tab .tab_tit li .selected {}

#sit_pvi {width:100%;}
#sit_pvi_big {text-align:center}
#sit_pvi_big a {display:none}
#sit_pvi_big a.visible {display:block}
#sit_pvi_big #popup_item_image {bottom:0;right:0;width:8.9583vw;height:8.9583vw;line-height:8.9583vw;background:#fff;border:0.2083vw solid #e0e0e0;font-size:1.4em}
#sit_pvi_big img {width:166.6667vw;height:auto}
#sit_pvi_thumb {margin:0;padding:0;list-style:none;text-align:center;margin-top:4.1667vw;}
#sit_pvi_thumb:after {visibility:hidden;clear:both;content:""}
#sit_pvi_thumb li {margin:0 3.1250vw 3.1250vw 0}
#sit_pvi_thumb img {border:0.2083vw solid #dbdbdb;width:12.5000vw;}
#sit_pvi_thumb img:hover {border:0.2083vw solid #010101}

#sit_pvi_nwbig {padding:2.0833vw 0;text-align:center}
#sit_pvi_nwbig span {display:none}
#sit_pvi_nwbig span.visible {display:inline}
#sit_pvi_nw ul {margin:0 0 4.1667vw;padding:0 2.0833vw;list-style:none}
#sit_pvi_nw ul:after {visibility:hidden;clear:both;content:""}
#sit_pvi_nw li {margin:0 0 0.2083vw 0.2083vw}
#sit_pvi_nw li img {width:12.5000vw;height:12.5000vw}

/* 상세페이지 맨하단 브랜드사이트 바로가기 버튼 */
#sit .maxbottombtn{background: #b1b4b9;   width:83.3333vw; height: 15.6250vw; line-height: 15.6250vw; margin:10.4167vw auto;  font-size: 1.8em; border:0.2083vw solid #b1b4b9; border-radius: 0.6250vw; }

}
</style>
<div id="sit_ov_from">
	<?php if(!$it['it_tel_inq']) { ?>
	<form name="fitem" method="post" action="<?php echo $action_url; ?>" onsubmit="return fitem_submit(this);">
	
	<input type="hidden" name="it_id[]" value="<?php echo $it_id; ?>">
	<input type="hidden" name="sw_direct">
	<input type="hidden" name="url">
	<?php } ?>
	<div id="sit_ov_wrap">
	    <!-- 상품이미지 미리보기 시작 { -->
	    <div id="sit_pvi">
	        <div id="sit_pvi_big">
	        <?php
	        $big_img_count = 0;
	        $thumbnails = array();
	        for($i=1; $i<=10; $i++) {
	            if(!$it['it_img'.$i])
	                continue;
	
	            $img = get_it_thumbnail($it['it_img'.$i], $default['de_mimg_width'], $default['de_mimg_height']);
	
	            if($img) {
	                // 썸네일
	                $thumb = get_it_thumbnail($it['it_img'.$i], 70, 70);
	                $thumbnails[] = $thumb;
	                $big_img_count++;
	
	                echo '<a href="'.G5_SHOP_URL.'/largeimage.php?it_id='.$it['it_id'].'&amp;no='.$i.'" target="_blank" class="popup_item_image">'.$img.'</a>';
	            }
	        }
	
	        if($big_img_count == 0) {
	            echo '<img src="'.G5_SHOP_URL.'/img/no_image.gif" alt="">';
	        }
	        ?>
	        <!-- <a href="<?php echo G5_SHOP_URL; ?>/largeimage.php?it_id=<?php echo $it['it_id']; ?>&amp;no=1" target="_blank" id="popup_item_image" class="popup_item_image"><i class="fa fa-search-plus" aria-hidden="true"></i><span class="sound_only">확대보기</span></a> -->
	        </div>
	        <?php
	        // 썸네일
	        $thumb1 = true;
	        $thumb_count = 0;
	        $total_count = count($thumbnails);
	        if($total_count > 0) {
	            echo '<ul id="sit_pvi_thumb">';
	            foreach($thumbnails as $val) {
	                $thumb_count++;
	                $sit_pvi_last ='';
	                if ($thumb_count % 5 == 0) $sit_pvi_last = 'class="li_last"';
	                    echo '<li '.$sit_pvi_last.'>';
	                    echo '<a href="'.G5_SHOP_URL.'/largeimage.php?it_id='.$it['it_id'].'&amp;no='.$thumb_count.'" target="_blank" class="popup_item_image img_thumb">'.$val.'<span class="sound_only"> '.$thumb_count.'번째 이미지 새창</span></a>';
	                    echo '</li>';
	            }
	            echo '</ul>';
	        }
	        ?>
	    </div>
	    <!-- } 상품이미지 미리보기 끝 -->
	
	    <!-- 상품 요약정보 및 구매 시작 { -->
	    <section id="sit_ov" class="2017_renewal_itemform">
			<?php if($it['it_tel_inq']) { ?>
			<form action="/bbs/write_update.php" method="post" class="qe_form clearfix" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" value="product_application" name="bo_table">
				<input type="hidden" id="mb_id" name="mb_id" value="<?php echo $member['mb_id']?>" />
				<input type="hidden" id="wr_name" name="wr_name" value="<?php echo $member['mb_name']?>" />
				<input type="hidden" id="wr_10" name="wr_10" value="1" />
				<input type="hidden" id="wr_1" name="wr_1" value="의료기기 문의" /> <!-- 문의종류 -->
				<input type="hidden" id="wr_2" name="wr_2" value="<?php echo $member['mb_hp']?>" /> <!-- 연락처 -->
				<input type="hidden" id="wr_3" name="wr_3" value="<?php echo $it['it_brand']?>" />  <!-- 제품 브랜드 -->
				<input type="hidden" id="wr_4" name="wr_4" value="<?php echo $it['it_id']?>" />  <!-- 제품 id -->
				<input type="hidden" id="wr_5" name="wr_5" value="<?php echo $it['ca_name']?>" />  <!-- 제품 분류 -->
				<input type="hidden" id="wr_6" name="wr_6" value="<?php echo $it['it_basic']?>" />  <!-- 제품 설명 -->
				<input type="hidden" id="wr_7" name="wr_7" value="<?php echo $it['it_name']?>" />  <!-- 제품 명 -->
				<input type="hidden" id="wr_subject" name="wr_subject" value="<?php echo $member['mb_id']?>" /> <!-- 제목 -->
			<?php } ?>
			<p class="product_title"><?php echo $it['ca_name']?></p>
			
			<div class="info_box">
				<p class="desc after basic_n"><?php echo $it['it_name']?></p>
				<?php if ($it['it_brand']) { ?>
				<p class="desc after brand_n"><?php echo $it['it_brand']?></p>
				<?php } ?>
				<?php if ($it['it_model']) { ?>
				<!-- <p class="desc after size_n"><?php //echo $it['it_model']?></p> -->
				<?php } ?>
				<?php if($it['it_tel_inq']) { ?>
				<p class="desc after date_n" style="<?php if($it['it_id'] == '1691560535') echo 'display:none;'?>">
					<input type="date" name="wr_8" id="wr_8" placeholder="제품명" required class="frm_input" maxLength="40" onKeyUp="result(this);"> - 
					<input type="date" name="wr_9" id="wr_9" placeholder="제품 시리얼 넘버" required class="frm_input" maxLength="40" onKeyUp="result(this);">
				</p>
				<?php } ?>
			</div>
			<?php if($it['it_tel_inq']) { ?>
			<div class="price_box inquiry">
				<div class="textarea" style="<?php if($it['it_id'] == '1691560535') //echo 'display:none'?>">
					<textarea name="wr_content" id="wr_content" cols="30" rows="10" placeholder=""></textarea>	
				</div>
			<?php } else { ?>
			<div class="price_box price">
			<?php } ?>
	        <h2 id="sit_title" style="display:none;"><?php echo stripslashes($it['it_name']); ?> <span class="sound_only">요약정보 및 구매</span></h2>
	        <p id="sit_desc" style="display:none;"><?php echo $it['it_basic']; ?></p>
	        <?php if($is_orderable) { ?>
	        <p id="sit_opt_info" style="display:none;">
	            상품 선택옵션 <?php echo $option_count; ?> 개, 추가옵션 <?php echo $supply_count; ?> 개
	        </p>
	        <?php } ?>
	        
	        <div id="sit_star_sns" style="display: none;">
	            <?php if ($star_score) { ?>
	            <span class="sound_only">고객평점</span> 
	            <img src="<?php echo G5_SHOP_URL; ?>/img/s_star<?php echo $star_score?>.png" alt="" class="sit_star" width="100">
	            <span class="sound_only">별<?php echo $star_score?>개</span> 
	            <?php } ?>
	            
	            <span class="">사용후기 <?php echo $it['it_use_cnt']; ?> 개</span>
	            
	            <div id="sit_btn_opt">
	            	<span id="btn_wish"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="sound_only">위시리스트</span><span class="btn_wish_num"><?php echo get_wishlist_count_by_item($it['it_id']); ?></span></span>
	            	<button type="button" class="btn_sns_share"><i class="fa fa-share-alt" aria-hidden="true"></i><span class="sound_only">sns 공유</span></button>
	            	<div class="sns_area">
	            		<?php echo $sns_share_links; ?>
	            		<a href="javascript:popup_item_recommend('<?php echo $it['it_id']; ?>');" id="sit_btn_rec"><i class="fa fa-envelope-o" aria-hidden="true"></i><span class="sound_only">추천하기</span></a>
	            	</div>
	        	</div>
	        </div>

	        <script>
	        $(".btn_sns_share").click(function(){
	            $(".sns_area").show();
	        });
	        $(document).mouseup(function (e){
	            var container = $(".sns_area");
	            if( container.has(e.target).length === 0)
	            container.hide();
	        });
	        </script>

	        <!-- <div class="sit_info" style="display: none;"> -->
	        <div class="sit_info" style="display: <?php if($it['ca_id'] == 10) echo 'none'; ?>;">
	            <table class="sit_ov_tbl">
	            <colgroup>
	                <col class="grid_3">
	                <col>
	            </colgroup>
	            <tbody>
	            
	            <?php if (!$it['it_use']) { // 판매가능이 아닐 경우 ?>
	            <tr>
	                <th scope="row">판매가격</th>
	                <td>판매중지</td>
	            </tr>
	            <?php } else if ($it['it_tel_inq']) { // 전화문의일 경우 ?>
					<?php if($it['ca_id'] == 10){ } else{?>
						<tr>
							<th scope="row">판매가격</th>
							<td>전화문의</td>
						</tr>
					<?php } ?>
	            <?php } else { // 전화문의가 아닐 경우?>
	            <?php if ($it['it_cust_price']) { ?>
	            <tr>
	                <th scope="row">시중가격</th>
	                <td><?php echo display_price($it['it_cust_price']); ?></td>
	            </tr>
	            <?php } // 시중가격 끝 ?>
	
	            <tr class="tr_price">
	                <th scope="row">판매가격</th>
	                <td>
	                    <strong><?php echo display_price(get_price($it)); ?></strong>
	                    <input type="hidden" id="it_price" value="<?php echo get_price($it); ?>">
	                </td>
	            </tr>
	            <?php } ?>
	            	
	            <?php if ($it['it_maker']) { ?>
	            <tr>
	                <th scope="row">제조사</th>
	                <td><?php echo $it['it_maker']; ?></td>
	            </tr>
	            <?php } ?>
	
	            <?php if ($it['it_origin']) { ?>
	            <tr>
	                <th scope="row">원산지</th>
	                <td><?php echo $it['it_origin']; ?></td>
	            </tr>
	            <?php } ?>
	
	            <?php if ($it['it_brand']) { ?>
					<?php if($it['ca_id'] == 10){ } else{?>
						<tr>
							<th scope="row">브랜드</th>
							<td><?php echo $it['it_brand']; ?></td>
						</tr>
					<?php } ?>
	            <?php } ?>
	
	            <?php if ($it['it_model']) { ?>
	            <tr>
	                <th scope="row">구매단위</th>
	                <td><?php echo $it['it_model']; ?></td>
	            </tr>
	            <?php } ?>

	            <?php
	            /* 재고 표시하는 경우 주석 해제
	            <tr>
	                <th scope="row">재고수량</th>
	                <td><?php echo number_format(get_it_stock_qty($it_id)); ?> 개</td>
	            </tr>
	            */
	            ?>
	
	            <?php if ($config['cf_use_point']) { // 포인트 사용한다면 ?>
	            <!-- <tr>
	                <th scope="row">포인트</th>
	                <td>
	                    <?php
	                    if($it['it_point_type'] == 2) {
	                        echo '구매금액(추가옵션 제외)의 '.$it['it_point'].'%';
	                    } else {
	                        $it_point = get_item_point($it);
	                        echo number_format($it_point).'점';
	                    }
	                    ?>
	                </td>
	            </tr> -->
	            <?php } ?>
	            <?php
	            $ct_send_cost_label = '배송비결제';
	
	            if($it['it_sc_type'] == 1)
	                $sc_method = '무료배송';
	            else {
	                if($it['it_sc_method'] == 1)
	                    $sc_method = '수령후 지불';
	                else if($it['it_sc_method'] == 2) {
	                    $ct_send_cost_label = '<label for="ct_send_cost">배송비결제</label>';
	                    $sc_method = '<select name="ct_send_cost" id="ct_send_cost">
	                                      <option value="0">주문시 결제</option>
	                                      <option value="1">수령후 지불</option>
	                                  </select>';
	                }
	                else
	                    $sc_method = '주문시 결제';
	            }
	            ?>
	            <tr>
					<?php if($it['ca_id'] == 10){ } else{?>
						<th><?php echo $ct_send_cost_label; ?></th>
						<td><?php echo $sc_method; ?></td>
					<?php } ?>
	            </tr>
	            <?php if($it['it_buy_min_qty']) { ?>
	            <tr>
	                <th>최소구매수량</th>
	                <td><?php echo number_format($it['it_buy_min_qty']); ?> 개</td>
	            </tr>
	            <?php } ?>
	            <?php if($it['it_buy_max_qty']) { ?>
	            <tr>
	                <th>최대구매수량</th>
	                <td><?php echo number_format($it['it_buy_max_qty']); ?> 개</td>
	            </tr>
	            <?php } ?>
	            </tbody>
	            </table>
	        </div>

	        <?php
	        if($option_item) {
	        ?>
	        <!-- 선택옵션 시작 { -->
	        <section class="sit_option">
	            <!-- <h3>선택옵션</h3> -->
	 
	            <?php // 선택옵션
	            echo $option_item;
	            ?>
	        </section>
	        <!-- } 선택옵션 끝 -->
	        <?php
	        }
	        ?>
	
	        <?php
	        if($supply_item) {
	        ?>
	        <!-- 추가옵션 시작 { -->
	        <section  class="sit_option">
	            <!-- <h3>추가옵션</h3> -->
	            <?php // 추가옵션
	            echo $supply_item;
	            ?>
	        </section>
	        <!-- } 추가옵션 끝 -->
	        <?php
	        }
	        ?>
	
	        <?php if ($is_orderable) { ?>
	        <!-- 선택된 옵션 시작 { -->
	        <!-- <section id="sit_sel_option" style="display: none;"> -->
	        <section id="sit_sel_option">
	            <h3>선택된 옵션</h3>
	            <?php
	            if(!$option_item) {
	                if(!$it['it_buy_min_qty'])
	                    $it['it_buy_min_qty'] = 1;
	            ?>
	            <ul id="sit_opt_added">
	                <li class="sit_opt_list">
	                    <input type="hidden" name="io_type[<?php echo $it_id; ?>][]" value="0">
	                    <input type="hidden" name="io_id[<?php echo $it_id; ?>][]" value="">
	                    <input type="hidden" name="io_value[<?php echo $it_id; ?>][]" value="<?php echo $it['it_name']; ?>">
	                    <input type="hidden" class="io_price" value="0">
	                    <input type="hidden" class="io_stock" value="<?php echo $it['it_stock_qty']; ?>">
	                    <div class="opt_name">
	                        <span class="sit_opt_subj"><?php echo $it['it_name']; ?></span>
	                    </div>
	                    <div class="opt_count">
	                        <label for="ct_qty_<?php echo $i; ?>" class="sound_only">수량</label>
							<button type="button" class="sit_qty_minus"><i class="fa fa-minus" aria-hidden="true"></i><span class="sound_only">감소</span></button>
	                        <input type="text" name="ct_qty[<?php echo $it_id; ?>][]" value="<?php echo $it['it_buy_min_qty']; ?>" id="ct_qty_<?php echo $i; ?>" class="num_input" size="5">
	                        <button type="button" class="sit_qty_plus"><i class="fa fa-plus" aria-hidden="true"></i><span class="sound_only">증가</span></button>
	                        <span class="sit_opt_prc">+0원</span>
	                    </div>
	                </li>
	            </ul>
	            <script>
	            $(function() {
	                price_calculate();
	            });
	            </script>
	            <?php } ?>
	        </section>
	        <!-- } 선택된 옵션 끝 -->
	
	        <!-- 총 구매액 -->
	        <div id="sit_tot_price"></div>
	        <?php } ?>
	
	        <?php if($is_soldout) { ?>
	        <p id="sit_ov_soldout">상품의 재고가 부족하여 구매할 수 없습니다.</p>
	        <?php } ?>
	
	        <div id="sit_ov_btn">
				
	            <?php if ($is_orderable) { ?>
	            
					<button type="submit" onclick="document.pressed=this.value;" value="즉시구매" class="sit_btn_buy">즉시구매</button>
					<button type="submit" onclick="document.pressed=this.value;" value="장바구니" class="sit_btn_cart">장바구니</button>
	            <?php } else { ?>
					<?php if($it['it_link']){ ?>
						<a href="<?php echo $it['it_link']; ?>" class="linkbtn" target="_blank">브랜드사이트 바로가기</a>
					<?php } ?>
					<?php if($it['it_id'] == '1691560535'){?>
						<a href="/bbs/write.php?bo_table=guardians" id="btn_submit" style="width:100%;">가디언즈 신청</a>
					<?php } else { ?>
						<input type="submit" value="데모신청" id="btn_submit" accesskey="s" class="" style="width:100%;">
					<?php } ?>
				<?php } ?>
			<?php  if($it['ca_id'] == '10') {
			} else {?>
				<a href="javascript:item_wish(document.fitem, '<?php echo $it['it_id']; ?>');" class="sit_btn_wish"><!-- <i class="fa fa-heart-o" aria-hidden="true"></i> -->관심상품<span class="sound_only">위시리스트</span></a>
	            	<?php } ?>
	            <?php if(!$is_orderable && $it['it_soldout'] && $it['it_stock_sms']) { ?>
	            <a href="javascript:popup_stocksms('<?php echo $it['it_id']; ?>');" id="sit_btn_alm">재입고알림</a>
	            <?php } ?>
	            <?php if ($naverpay_button_js) { ?>
	            <div class="itemform-naverpay"><?php echo $naverpay_request_js.$naverpay_button_js; ?></div>
	            <?php } ?>
	        </div>
			</div>
	        <script>
	        // 상품보관
	        function item_wish(f, it_id)
	        {
	            f.url.value = "<?php echo G5_SHOP_URL; ?>/wishupdate.php?it_id="+it_id;
	            f.action = "<?php echo G5_SHOP_URL; ?>/wishupdate.php";
	            f.submit();
	        }
	
	        // 추천메일
	        function popup_item_recommend(it_id)
	        {
	            if (!g5_is_member)
	            {
	                if (confirm("회원만 추천하실 수 있습니다."))
	                    document.location.href = "<?php echo G5_BBS_URL; ?>/login.php?url=<?php echo urlencode(shop_item_url($it_id)); ?>";
	            }
	            else
	            {
	                url = "./itemrecommend.php?it_id=" + it_id;
	                opt = "scrollbars=yes,width=616,height=420,top=10,left=10";
	                popup_window(url, "itemrecommend", opt);
	            }
	        }
	
	        // 재입고SMS 알림
	        function popup_stocksms(it_id)
	        {
	            url = "<?php echo G5_SHOP_URL; ?>/itemstocksms.php?it_id=" + it_id;
	            opt = "scrollbars=yes,width=616,height=420,top=10,left=10";
	            popup_window(url, "itemstocksms", opt);
	        }
	        </script>
			<?php if($it['it_tel_inq']) { ?>
			</form>
			<?php } ?>
	    </section>
	    <!-- } 상품 요약정보 및 구매 끝 -->
	</div>
	<!-- 다른 상품 보기 시작 { -->
    <div id="sit_siblings">
	    <?php
	    if ($prev_href || $next_href) {
	        echo $prev_href.$prev_title.$prev_href2;
	        echo $next_href.$next_title.$next_href2;
	    } else {
	        echo '<span class="sound_only">이 분류에 등록된 다른 상품이 없습니다.</span>';
	    }
	    ?>
	</div>   
    <!-- } 다른 상품 보기 끝 -->
	<?php if(!$it['it_tel_inq']) { ?>
	</form>
	<?php } ?>
</div>

<script>
$(function(){
    // 상품이미지 첫번째 링크
    $("#sit_pvi_big a:first").addClass("visible");

    // 상품이미지 미리보기 (썸네일에 마우스 오버시)
    $("#sit_pvi .img_thumb").bind("mouseover focus", function(){
        var idx = $("#sit_pvi .img_thumb").index($(this));
        $("#sit_pvi_big a.visible").removeClass("visible");
        $("#sit_pvi_big a:eq("+idx+")").addClass("visible");
    });

    // 상품이미지 크게보기
    $(".popup_item_image").click(function() {
        var url = $(this).attr("href");
        var top = 10;
        var left = 10;
        var opt = 'scrollbars=yes,top='+top+',left='+left;
        popup_window(url, "largeimage", opt);

        return false;
    });
});

function fsubmit_check(f)
{
    // 판매가격이 0 보다 작다면
    if (document.getElementById("it_price").value < 0) {
        alert("전화로 문의해 주시면 감사하겠습니다.");
        return false;
    }

    if($(".sit_opt_list").length < 1) {
        alert("상품의 선택옵션을 선택해 주십시오.");
        return false;
    }

    var val, io_type, result = true;
    var sum_qty = 0;
    var min_qty = parseInt(<?php echo $it['it_buy_min_qty']; ?>);
    var max_qty = parseInt(<?php echo $it['it_buy_max_qty']; ?>);
    var $el_type = $("input[name^=io_type]");

    $("input[name^=ct_qty]").each(function(index) {
        val = $(this).val();

        if(val.length < 1) {
            alert("수량을 입력해 주십시오.");
            result = false;
            return false;
        }

        if(val.replace(/[0-9]/g, "").length > 0) {
            alert("수량은 숫자로 입력해 주십시오.");
            result = false;
            return false;
        }

        if(parseInt(val.replace(/[^0-9]/g, "")) < 1) {
            alert("수량은 1이상 입력해 주십시오.");
            result = false;
            return false;
        }

        io_type = $el_type.eq(index).val();
        if(io_type == "0")
            sum_qty += parseInt(val);
    });

    if(!result) {
        return false;
    }

    if(min_qty > 0 && sum_qty < min_qty) {
        alert("선택옵션 개수 총합 "+number_format(String(min_qty))+"개 이상 주문해 주십시오.");
        return false;
    }

    if(max_qty > 0 && sum_qty > max_qty) {
        alert("선택옵션 개수 총합 "+number_format(String(max_qty))+"개 이하로 주문해 주십시오.");
        return false;
    }

    return true;
}

// 바로구매, 장바구니 폼 전송
function fitem_submit(f)
{
    f.action = "<?php echo $action_url; ?>";
    f.target = "";

    if (document.pressed == "장바구니") {
        f.sw_direct.value = 0;
    } else { // 바로구매
        f.sw_direct.value = 1;
    }

    // 판매가격이 0 보다 작다면
    if (document.getElementById("it_price").value < 0) {
        alert("전화로 문의해 주시면 감사하겠습니다.");
        return false;
    }

    if($(".sit_opt_list").length < 1) {
        alert("상품의 선택옵션을 선택해 주십시오.");
        return false;
    }

    var val, io_type, result = true;
    var sum_qty = 0;
    var min_qty = parseInt(<?php echo $it['it_buy_min_qty']; ?>);
    var max_qty = parseInt(<?php echo $it['it_buy_max_qty']; ?>);
    var $el_type = $("input[name^=io_type]");

    $("input[name^=ct_qty]").each(function(index) {
        val = $(this).val();

        if(val.length < 1) {
            alert("수량을 입력해 주십시오.");
            result = false;
            return false;
        }

        if(val.replace(/[0-9]/g, "").length > 0) {
            alert("수량은 숫자로 입력해 주십시오.");
            result = false;
            return false;
        }

        if(parseInt(val.replace(/[^0-9]/g, "")) < 1) {
            alert("수량은 1이상 입력해 주십시오.");
            result = false;
            return false;
        }

        io_type = $el_type.eq(index).val();
        if(io_type == "0")
            sum_qty += parseInt(val);
    });

    if(!result) {
        return false;
    }

    if(min_qty > 0 && sum_qty < min_qty) {
        alert("선택옵션 개수 총합 "+number_format(String(min_qty))+"개 이상 주문해 주십시오.");
        return false;
    }

    if(max_qty > 0 && sum_qty > max_qty) {
        alert("선택옵션 개수 총합 "+number_format(String(max_qty))+"개 이하로 주문해 주십시오.");
        return false;
    }

    return true;
}
</script>
<?php /* 2017 리뉴얼한 테마 적용 스크립트입니다. 기존 스크립트를 오버라이드 합니다. */ ?>
<script src="<?php echo G5_JS_URL; ?>/shop.override.js"></script>