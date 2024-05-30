<?php
include_once('./_common.php');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/membership.php');
    return;
}

define("_INDEX_", TRUE);

include_once(G5_SHOP_PATH.'/shop.head.php');

?>

<style>
#wrapper {background: #fff;}
#container {width:100%;max-width:1920px;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/* sub_w */
.sub_w {}
.s_inner {width:1600px;margin:0 auto;}
.s_inner::after {content:"";display:block;clear:both;}

/* common */
.left {float:left;}
.right {float:right;}

/* 탑배너 */
.div01 {background: url('/images/mbs/member_top_01_cm.png')no-repeat center / cover;width:100%;height:400px}

/* 멤버쉽 혜택 */
.div02 {background: url('/images/mbs/card_img01.png')no-repeat center / cover;width:100%;height:355px;margin-top:-47px;}

.txt_box {padding-left: 140px;padding-top: 90px;}
.txt_box p {color:#fff;font-weight: 700;}
.txt_box p.tit {font-size: 48px;line-height:1.2em;position:relative;display:inline-block;margin-bottom:30px;}
.txt_box p.tit span {position:absolute;right:-40px;top:50%;transform:translateY(-50%);width:16px;height: 28px;background:url('/images/mbs/member_arr.png')no-repeat center / cover;}
.txt_box p.desc {color:#646363;font-size: 25px;line-height:36px;}

.card_box {padding-right:96px;padding-top: 90px;}
.card_box .card {}
.card_box .card img {width: 312px;height: 173px;}
.card_box .btn img {width: 14px;height: 149px;}
.card_box .card.vip {margin-right: 35px;}
.card_box .card.silver {margin-right: 20px;}

/* 포인트 제도 */
#point {padding-top: 110px;padding-bottom: 140px;}

.tit_wrap {text-align: center;background:url('/images/mbs/member_img.png')no-repeat center/ cover;width: 569px;height: 238px;margin:0 auto;padding-top: 40px;}
.tit_wrap .en_tit {font-size: 22px;font-weight: 900;line-height:1.2em;margin-bottom:30px;}
.tit_wrap .ko_tit {font-size: 60px;font-weight: 700;line-height:1.2em;}

.tit_icon {width: 1px;height: 65px;background:#000;margin:35px auto 70px;}

.ht {text-align: center;}
.ht.ht01 {margin-bottom: 150px;}
.ht.ht02 {margin-bottom: 200px;}
.ht.ht02_1 {margin-bottom: 80px;}
.ht .ht_num {margin:0 auto 60px;width: 90px;height: 90px;border-radius:3px;background:#000;padding-top: 15px;}
.ht .ht_num span {color:#fff;font-size: 20px;font-weight: 300;display: block;line-height:1.2em;}
.ht .ht_num span.num {font-size: 33px;font-weight: 900;}

.ht_info {font-size: 35px;font-weight: 900;line-height: 1.2em;margin-bottom: 80px;}

.ht01 .ht_img img {width: 480px;height: 190px;}
.ht02 .ht_img img {width: 500px;height: 210px;}

.mb.mb_vip {margin-bottom: 150px;}
.mb_lv {text-align: center;margin-bottom: 45px;}
.mb_lv span {font-size: 30px;font-weight: 700;display:block;}
.mb_lv span img {width: 139px;height: 134px;margin-top:20px;}

.mb_txt {width:965px;margin:0 auto;}
.mb_txt .mb_tit {color:#fff;font-size: 30px;font-weight: 400;line-height: 1em;background:#000;padding:30px 30px;word-break:keep-all;margin-bottom:35px;;}
.mb_txt .mb_tit span {font-size: 20px;font-weight: 500;margin-right:30px;position:relative;padding-right:30px;}
.mb_txt .mb_tit span:after {content:"";display:block;width:1px;height:20px;background:#fff;position:absolute;right:0;top:50%;transform:translateY(-50%);}

.ht_img.mb {margin-bottom:0px !important;}

.red{
	/* color:red; */
}
.coin_info{
	margin-top:60px;
	font-size:28px;
}
.coin_info h2{
	font-weight:800;
	font-size:44px;
	margin-bottom:20px;
}
.coin_info p{
	padding-top:10px;
}
.coin_info p b{
	color:#ffb954;
}
.ht_info2{
	font-size:24px;
	color:#ffb954;
}
@media (max-width: 1760px)  {
#wrapper {background: #fff;}
#container {width:100%;max-width:100%;}
#container .is_index {margin-left:0;}
/* sub_w */
.sub_w {}
.s_inner {width:90.9091vw;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

/* 탑배너 */
.div01 {background: url('/images/mbs/member_top_01_cm.png')no-repeat center / cover;width:100%;height:22.7273vw}

/* 멤버쉽 혜택 */
.div02 {background: url('/images/mbs/card_img01.png')no-repeat center / cover;width:100%;height:20.1705vw;margin-top:-2.6705vw;}

.txt_box {padding-left: 7.9545vw;padding-top: 5.1136vw;}
.txt_box p {}
.txt_box p.tit {font-size: 2.7273vw;line-height:1.2em;margin-bottom:1.7045vw;}
.txt_box p.tit span {right:-2.2727vw;top:50%;transform:translateY(-50%);width:0.9091vw;height: 1.5909vw;background:url('/images/mbs/member_arr.png')no-repeat center / cover;}
.txt_box p.desc {font-size: 1.4205vw;line-height:2.0455vw;}

.card_box {padding-right:5.4545vw;padding-top: 5.1136vw;}
.card_box .card {}
.card_box .card img {width: 17.7273vw;height: 9.8295vw;}
.card_box .btn img {width: 0.7955vw;height: 8.4659vw;}
.card_box .card.vip {margin-right: 1.9886vw;}
.card_box .card.silver {margin-right: 1.1364vw;}

/* 포인트 제도 */
#point {padding-top: 6.2500vw;padding-bottom: 7.9545vw;}

.tit_wrap {background:url('/images/mbs/member_img.png')no-repeat center/ cover;width: 32.3295vw;height: 13.5227vw;margin:0 auto;padding-top: 2.2727vw;}
.tit_wrap .en_tit {font-size: 1.2500vw;line-height:1.2em;margin-bottom:1.7045vw;}
.tit_wrap .ko_tit {font-size: 3.4091vw;line-height:1.2em;}

.tit_icon {width: 0.0568vw;height: 3.6932vw;background:#000;margin:1.9886vw auto 3.9773vw;}

.ht {}
.ht.ht01 {margin-bottom: 8.5227vw;}
.ht.ht02 {margin-bottom: 11.3636vw;}
.ht .ht_num {margin:0 auto 3.4091vw;width: 5.1136vw;height: 5.1136vw;border-radius:0.1705vw;background:#000;padding-top: 0.8523vw;}
.ht .ht_num span {font-size: 1.1364vw;line-height:1.2em;}
.ht .ht_num span.num {font-size: 1.8750vw;}

.ht_info {font-size: 1.9886vw;line-height: 1.2em;margin-bottom: 4.5455vw;}
.ht01 .ht_img img {width: 27.2727vw;height: 10.7955vw;}
.ht02 .ht_img img {width: 28.4091vw;height: 11.9318vw;}

.mb.mb_vip {margin-bottom: 8.5227vw;}
.mb_lv {margin-bottom: 2.5568vw;}
.mb_lv span {font-size: 1.7045vw;}
.mb_lv span img {width: 7.8977vw;height: 7.6136vw;margin-top:1.1364vw;}

.mb_txt {width:54.8295vw;margin:0 auto;}
.mb_txt .mb_tit {font-size: 1.7045vw;line-height: 1em;background:#000;padding:1.7045vw 1.7045vw;word-break:keep-all;margin-bottom:1.9886vw;;}
.mb_txt .mb_tit span {font-size: 1.1364vw;margin-right:1.7045vw;padding-right:1.7045vw;}
.mb_txt .mb_tit span:after {width:0.0568vw;height:1.1364vw;background:#fff;right:0;top:50%;transform:translateY(-50%);}

.ht_img.mb {margin-bottom:3.4091vw;}

}

@media (max-width: 1600px)  {
#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100.0000vw;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

/* 탑배너 */
.div01 {background: url('/images/mbs/member_top_01_cm.png')no-repeat center / cover;width:100%;height:25.0000vw}

/* 멤버쉽 혜택 */
.div02 {background: url('/images/mbs/card_img01.png')no-repeat center / cover;width:100%;height:22.1875vw;margin-top:-2.9375vw;}

.txt_box {padding-left: 8.7500vw;padding-top: 5.6250vw;}
.txt_box p {}
.txt_box p.tit {font-size: 3.0000vw;line-height:1.2em;margin-bottom:1.8750vw;}
.txt_box p.tit span {right:-2.5000vw;top:50%;transform:translateY(-50%);width:1.0000vw;height: 1.7500vw;background:url('/images/mbs/member_arr.png')no-repeat center / cover;}
.txt_box p.desc {font-size: 1.5625vw;line-height:2.2500vw;}

.card_box {padding-right:6.0000vw;padding-top: 5.6250vw;}
.card_box .card {}
.card_box .card img {width: 19.5000vw;height: 10.8125vw;}
.card_box .btn img {width: 0.8750vw;height: 9.3125vw;}
.card_box .card.vip {margin-right: 2.1875vw;}
.card_box .card.silver {margin-right: 1.2500vw;}

/* 포인트 제도 */
#point {padding-top: 6.8750vw;padding-bottom: 8.7500vw;}

.tit_wrap {background:url('/images/mbs/member_img.png')no-repeat center/ cover;width: 35.5625vw;height: 14.8750vw;margin:0 auto;padding-top: 2.5000vw;}
.tit_wrap .en_tit {font-size: 1.3750vw;line-height:1.2em;margin-bottom:1.8750vw;}
.tit_wrap .ko_tit {font-size: 3.7500vw;line-height:1.2em;}

.tit_icon {width: 0.0625vw;height: 4.0625vw;background:#000;margin:2.1875vw auto 4.3750vw;}

.ht {}
.ht.ht01 {margin-bottom: 9.3750vw;}
.ht.ht02 {margin-bottom: 12.5000vw;}
.ht .ht_num {margin:0 auto 3.7500vw;width: 5.6250vw;height: 5.6250vw;border-radius:0.1875vw;background:#000;padding-top: 0.9375vw;}
.ht .ht_num span {font-size: 1.2500vw;line-height:1.2em;}
.ht .ht_num span.num {font-size: 2.0625vw;}

.ht_info {font-size: 2.1875vw;line-height: 1.2em;margin-bottom: 5.0000vw;}
.ht01 .ht_img img {width: 30.0000vw;height: 11.8750vw;}
.ht02 .ht_img img {width: 31.2500vw;height: 13.1250vw;}

.mb.mb_vip {margin-bottom: 9.3750vw;}
.mb_lv {margin-bottom: 2.8125vw;}
.mb_lv span {font-size: 1.8750vw;}
.mb_lv span img {width: 8.6875vw;height: 8.3750vw;margin-top:1.2500vw;}

.mb_txt {width:60.3125vw;margin:0 auto;}
.mb_txt .mb_tit {font-size: 1.8750vw;line-height: 1em;background:#000;padding:1.8750vw 1.8750vw;word-break:keep-all;margin-bottom:2.1875vw;;}
.mb_txt .mb_tit span {font-size: 1.2500vw;margin-right:1.8750vw;padding-right:1.8750vw;}
.mb_txt .mb_tit span:after {width:0.0625vw;height:1.2500vw;background:#fff;right:0;top:50%;transform:translateY(-50%);}

.ht_img.mb {margin-bottom:3.7500vw;}
}

@media (max-width: 1400px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100%;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

/* 탑배너 */
.div01 {background: url('/images/mbs/member_top_01_cm.png')no-repeat center / cover;width:100%;height:28.5714vw}

/* 멤버쉽 혜택 */
.div02 {background: url('/images/mbs/card_img01.png')no-repeat center / cover;width:100%;height:25.3571vw;margin-top:-3.3571vw;}

.txt_box {padding-left: 6.8571vw;padding-top: 6.4286vw;}
.txt_box p {}
.txt_box p.tit {font-size: 3.4286vw;line-height:1.2em;margin-bottom:2.1429vw;}
.txt_box p.tit span {right:-2.8571vw;top:50%;transform:translateY(-50%);width:1.1429vw;height: 2.0000vw;background:url('/images/mbs/member_arr.png')no-repeat center / cover;}
.txt_box p.desc {font-size: 1.7857vw;line-height:2.5714vw;}

.card_box {padding-right:6.8571vw;padding-top: 6.4286vw;}
.card_box .card {}
.card_box .card img {width: 22.2857vw;height: 12.3571vw;}
.card_box .btn img {width: 1.0000vw;height: 10.6429vw;}
.card_box .card.vip {margin-right: 2.5000vw;}
.card_box .card.silver {margin-right: 1.4286vw;}

/* 포인트 제도 */
#point {padding-top: 7.8571vw;padding-bottom: 10.0000vw;}

.tit_wrap {background:url('/images/mbs/member_img.png')no-repeat center/ cover;width: 40.6429vw;height: 17.0000vw;margin:0 auto;padding-top: 2.8571vw;}
.tit_wrap .en_tit {font-size: 1.5714vw;line-height:1.2em;margin-bottom:2.1429vw;}
.tit_wrap .ko_tit {font-size: 4.2857vw;line-height:1.2em;}

.tit_icon {width: 0.0714vw;height: 4.6429vw;background:#000;margin:2.5000vw auto 5.0000vw;}

.ht {}
.ht.ht01 {margin-bottom: 10.7143vw;}
.ht.ht02 {margin-bottom: 14.2857vw;}
.ht .ht_num {margin:0 auto 4.2857vw;width: 6.4286vw;height: 6.4286vw;border-radius:0.2143vw;background:#000;padding-top: 1.0714vw;}
.ht .ht_num span {font-size: 1.4286vw;line-height:1.2em;}
.ht .ht_num span.num {font-size: 2.3571vw;}

.ht_info {font-size: 2.5000vw;line-height: 1.2em;margin-bottom: 5.7143vw;}
.ht01 .ht_img img {width: 34.2857vw;height: 13.5714vw;}
.ht02 .ht_img img {width: 35.7143vw;height: 15.0000vw;}

.mb.mb_vip {margin-bottom: 10.7143vw;}
.mb_lv {margin-bottom: 3.2143vw;}
.mb_lv span {font-size: 2.1429vw;}
.mb_lv span img {width: 9.9286vw;height: 9.5714vw;margin-top:1.4286vw;}

.mb_txt {width:68.9286vw;margin:0 auto;}
.mb_txt .mb_tit {font-size: 2.1429vw;line-height: 1em;background:#000;padding:2.1429vw 2.1429vw;word-break:keep-all;margin-bottom:2.5000vw;;}
.mb_txt .mb_tit span {font-size: 1.4286vw;margin-right:2.1429vw;padding-right:2.1429vw;}
.mb_txt .mb_tit span:after {width:0.0714vw;height:1.4286vw;background:#fff;right:0;top:50%;transform:translateY(-50%);}
.ht_img.mb {margin-bottom:4.2857vw;}
}

@media (max-width: 1024px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100%;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

/* 탑배너 */
.div01 {background: url('/images/mbs/member_top_01_cm_m.png')no-repeat center / cover;width:100%;height:39.0625vw}

/* 멤버쉽 혜택 */
.div02 {background: url('/images/mbs/card_img01.png')no-repeat center / cover;width:100%;height:34.6680vw;margin-top:-4.5898vw;}

.txt_box {padding-left: 2.9297vw;padding-top: 8.7891vw;}
.txt_box p {}
.txt_box p.tit {font-size: 4.6875vw;line-height:1.2em;margin-bottom:2.9297vw;}
.txt_box p.tit span {right:-3.9063vw;top:50%;transform:translateY(-50%);width:1.5625vw;height: 2.7344vw;background:url('/images/mbs/member_arr.png')no-repeat center / cover;}
.txt_box p.desc {font-size: 2.4414vw;line-height:3.5156vw;}

.card_box {padding-right:2.9297vw;padding-top: 8.7891vw;}
.card_box .card {}
.card_box .card img {width: 26.3672vw;height: 14.6484vw;}
.card_box .btn img {width: 1.3672vw;height: 14.5508vw;}
.card_box .card.vip {margin-right: 3.4180vw;}
.card_box .card.silver {margin-right: 1.9531vw;}

/* 포인트 제도 */
#point {padding-top: 10.7422vw;padding-bottom: 13.6719vw;}

.tit_wrap {background:url('/images/mbs/member_img.png')no-repeat center/ cover;width: 55.5664vw;height: 23.2422vw;margin:0 auto;padding-top: 3.9063vw;}
.tit_wrap .en_tit {font-size: 2.1484vw;line-height:1.2em;margin-bottom:2.9297vw;}
.tit_wrap .ko_tit {font-size: 5.8594vw;line-height:1.2em;}

.tit_icon {width: 0.0977vw;height: 6.3477vw;background:#000;margin:3.4180vw auto 6.8359vw;}

.ht {}
.ht.ht01 {margin-bottom: 14.6484vw;}
.ht.ht02 {margin-bottom: 19.5313vw;}
.ht .ht_num {margin:0 auto 5.8594vw;width: 8.7891vw;height: 8.7891vw;border-radius:0.2930vw;background:#000;padding-top: 1.4648vw;}
.ht .ht_num span {font-size: 1.9531vw;line-height:1.2em;}
.ht .ht_num span.num {font-size: 3.2227vw;}

.ht_info {font-size: 3.4180vw;line-height: 1.2em;margin-bottom: 7.8125vw;}
.ht01 .ht_img img {width: 46.8750vw;height: 18.5547vw;}
.ht02 .ht_img img {width: 48.8281vw;height: 20.5078vw;}

.mb.mb_vip {margin-bottom: 14.6484vw;}
.mb_lv {margin-bottom: 4.3945vw;}
.mb_lv span {font-size: 2.9297vw;}
.mb_lv span img {width: 13.5742vw;height: 13.0859vw;margin-top:1.9531vw;}

.mb_txt {width:94.2383vw;margin:0 auto;}
.mb_txt .mb_tit {font-size: 2.9297vw;line-height: 1em;background:#000;padding:2.9297vw 2.9297vw;word-break:keep-all;margin-bottom:3.4180vw;;}
.mb_txt .mb_tit span {font-size: 1.9531vw;margin-right:2.9297vw;padding-right:2.9297vw;}
.mb_txt .mb_tit span:after {width:0.0977vw;height:1.9531vw;background:#fff;right:0;top:50%;transform:translateY(-50%);}
.ht_img.mb {margin-bottom:5.8594vw;}
}

@media (max-width: 768px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100%;margin:0 auto;padding: 0 5.2083vw;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

/* 탑배너 */
.div01 {background: url('/images/mbs/member_top_01_cm_m.png')no-repeat left -49.4792vw center / cover;width:100%;height:52.0833vw}

/* 멤버쉽 혜택 */
.div02 {background: url('/images/mbs/card_img01.png')no-repeat center / cover;width:100%;height:auto;margin-top:-8.5104vw;padding-bottom:5.2083vw;}

.txt_box {padding-left:0;padding-top: 9.1146vw;width:48%;}
.txt_box p {}
.txt_box p.tit {font-size: 6.2500vw;line-height:1.2em;margin-bottom:3.9063vw;}
.txt_box p.tit span {right:-5.2083vw;top:50%;transform:translateY(-50%);width:2.0833vw;height: 3.6458vw;background:url('/images/mbs/member_arr.png')no-repeat center / cover;}
.txt_box p.desc {font-size: 3.2552vw;line-height:4.6875vw;}

.card_box {padding-right:0;padding-top: 9.1146vw;width:48%;}
.card_box .card {margin-bottom:2.6042vw;}
.card_box .left {float:right;}
.card_box .card img {width: 40.8854vw;height: 22.5260vw;}
.card_box .btn img {width: 1.8229vw;height: 19.4010vw;}
.btn2 img {width: 1.8229vw;height: 19.4010vw;}
.card_box .card.vip {margin-right:0;}
.card_box .card.silver {margin-right:0;}

.btn2 {margin-top:2.6042vw;}
/* 포인트 제도 */
#point {padding-top: 14.3229vw;padding-bottom: 18.2292vw;}

.tit_wrap {background:url('/images/mbs/member_img.png')no-repeat center/ cover;width: 74.0885vw;height: 30.9896vw;margin:0 auto;padding-top: 5.2083vw;}
.tit_wrap .en_tit {font-size: 2.8646vw;line-height:1.2em;margin-bottom:3.9063vw;}
.tit_wrap .ko_tit {font-size: 7.8125vw;line-height:1.2em;}

.tit_icon {width: 0.1302vw;height: 8.4635vw;background:#000;margin:4.5573vw auto 9.1146vw;}

.ht {}
.ht.ht01 {margin-bottom: 19.5313vw;}
.ht.ht02 {margin-bottom: 26.0417vw;}
.ht .ht_num {margin:0 auto 7.8125vw;width: 11.7188vw;height: 11.7188vw;border-radius:0.3906vw;background:#000;padding-top: 1.9531vw;}
.ht .ht_num span {font-size: 2.6042vw;line-height:1.2em;}
.ht .ht_num span.num {font-size: 4.2969vw;}

.ht_info {font-size: 4.5573vw;line-height: 1.2em;margin-bottom: 5.2083vw;}
.ht01 .ht_img img {width: 62.5000vw;height: 24.7396vw;}
.ht02 .ht_img img {width: 65.1042vw;height: 27.3438vw;}

.mb.mb_vip {margin-bottom: 19.5313vw;}
.mb_lv {margin-bottom: 5.8594vw;}
.mb_lv span {font-size: 3.9063vw;}
.mb_lv span img {width: 18.0990vw;height: 17.4479vw;margin-top:2.6042vw;}

.mb_txt {width:100%;margin:0 auto;}
.mb_txt .mb_tit {font-size: 3.9063vw;line-height: 1em;background:#000;padding:3.9063vw 3.9063vw;word-break:keep-all;margin-bottom:4.5573vw;;}
.mb_txt .mb_tit span {font-size: 2.6042vw;margin-right:3.9063vw;padding-right:3.9063vw;}
.mb_txt .mb_tit span:after {width:0.1302vw;height:2.6042vw;background:#fff;right:0;top:50%;transform:translateY(-50%);}

.ht_img.mb {margin-bottom:7.8125vw;}

.coin_info{
	margin-top:7.8125vw;
	font-size:4.0458vw;
}
.coin_info h2{
	
	font-size:5.7292vw;
	margin-bottom:2.6042vw;
}
.coin_info p{
	padding-top:1.3021vw;
}
.coin_info p b{
	
}
.ht_info2{
	font-size:4.1250vw;
	
}

}

@media (max-width: 480px)  {


}



</style>

<div class="sub_w">
	<!-- 탑 배너 -->
	<div class="sub_div div01">
	
	</div>
	
	<!-- 멤버쉽 혜택 -->
	<div class="sub_div div02">
		<div class="s_inner">
			<div class="left txt_box">
				<p class="tit">멤버쉽 혜택 <span class="sub_img"></span></p>
				<p class="desc">
					이루다몰 회원께 드리는 <br/>
					다양한 혜택을 받아보세요.
				</p>

				<div class="btn2 show720">
					<a href="#point"><img src="/images/mbs/card_icon.png" alt=""></a>
				</div>
			</div>
			<div class="right card_box">
				<div class="left card vip">
					<img src="/images/mbs/card_vip.png" alt="">
				</div>
				<div class="left card silver">
					<img src="/images/mbs/card_sil.png" alt="">
				</div>
				<div class="left btn hide720">
					<a href="#point"><img src="/images/mbs/card_icon.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>

	<!-- 멤버쉽 혜택 내용 -->
	<div id="point" class="sub_div div03 nanumS">
		<div class="s_inner">
			<div class="point_01">
				<div class="tit_wrap">
					<p class="en_tit">MEMBERSHIP</p>
					<p class="ko_tit">적립금 제도</p>
				</div>
				<div class="ht ht01 coin_info">
					<h2 class="nanumS">이루다 포인트 제도 안내</h2>
					<div class="">
						<p><strong>MP</strong><!--  (<b>M</b>arketing <b>P</b>oint) --></p>
						<p>이루다 쇼핑몰 내의 마케팅 서비스 신청시 사용가능<br><span class="red">소모품 구매불가</span></p>
					</div>
					<br>
					<div class="">
						<p><strong>PP</strong><!--  (<b>P</b>roduct <b>P</b>oint) --></p>
						<p>소모품 구매시 사용가능<br><span class="red">마케팅 서비스 구매시 이용불가</span></p>
					</div>
				</div>
				<div class="tit_icon"></div>
				<div class="ht ht01">
					<div class="ht_num">
						<span>혜택</span>
						<span class="num">01</span>
					</div>
					<div class="ht_info">첫 회원가입시 20,000 MP 지급<!-- <br/>보도자료 1회 무료권을 드립니다. --></div>
					<div class="ht_img mb"><img src="/images/mbs/coupon01.png" alt=""></div>
					<div class="ht_info2"><br>※소모품 구매시 사용 불가</div>
					<!-- <div class="ht_img"><img src="/images/mbs/coupon01_2.png" alt=""></div> -->
				</div>

				<div class="ht ht01">
					<div class="ht_num">
						<span>혜택</span>
						<span class="num">02</span>
					</div>
					<div class="ht_info">추천을 통해 가입시 두 사람에게 <br/>30,000 MP 지급</div>
					<div class="ht_img"><img src="/images/mbs/coupon02.png" alt=""></div>
					<div class="ht_info2"><br>※소모품 구매시 사용 불가</div>
				</div>

				<div class="ht ht02">
					<div class="ht_num">
						<span>혜택</span>
						<span class="num">03</span>
					</div>
					<div class="ht_info">설문조사를 하시면 100,000 MP 지급</div>
					<div class="ht_img"><img src="/images/mbs/coupon03_1.png" alt=""></div>
					<div class="ht_info2"><br>※소모품 구매시 사용 불가</div>
				</div>
			</div>

			<!-- <div class="point_01">
				<div class="tit_wrap">
					<p class="en_tit">MEMBERSHIP</p>
					<p class="ko_tit">포인트 제도</p>
				</div>
				<div class="tit_icon"></div>
				<div class="ht ht02">
					<div class="ht_info">제품 구매시 10% 포인트가 쌓입니다.</div>
					<div class="ht_img"><img src="/images/mbs/coupon04_1.png" alt=""></div>
				</div>
			</div> -->

			<div class="point_02">
				<div class="tit_wrap">
					<p class="en_tit">MEMBERSHIP</p>
					<p class="ko_tit">정품등록  제도</p>
				</div>
				<div class="tit_icon"></div>
				<div class="mb mb_vip">
					<div class="mb_lv">
						<span>VIP 회원 혜택</span>
						<span><img src="/images/mbs/vip_img.png" alt=""></span>
					</div>

				<div class="ht ht02_1">
					<div class="ht_info">정품인증을 하시면 적립금 100,000 MP 지급</div>
					<div class="ht_img"><img src="/images/mbs/coupon05_1.png" alt=""></div>
					<div class="ht_info2"><br>※소모품 구매시 사용 불가.</div>
				</div>

					<div class="mb_txt">
						<p class="mb_tit"><span>VIP 혜택</span> 크리에이티브 마케팅센터 이용</p>
						<p class="mb_tit"><span>VIP 혜택</span> 제품 A/S 보증</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- } content -->


<script>
$(document).ready(function() {

});
</script>


<?php
include_once(G5_PATH.'/tail.php');