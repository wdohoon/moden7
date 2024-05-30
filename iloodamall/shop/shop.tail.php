<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>
        
	</div>      <!-- } #container 끝 -->
</div>
<!-- } 전체 콘텐츠 끝 -->

<style>
/* 하단 레이아웃 */
#ft {background:#353739;margin:0 auto;text-align:center;position:relative;}
#ft_wr {width:1600px;max-width: 1600px;margin:0 auto;padding:80px 0 60px;position:relative;display:inline-block;text-align:left}
#ft_wr:after {display:block;visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:32px;color: #fff;line-height: 1;margin-bottom: 25px;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {float: right;width:650px;color: #fff;position: relative;}
#ft_inquiry p {font-size: 15px;font-weight: 100;margin-top: 32px;margin-bottom: 20px;}
#ft_inquiry input[type="text"] {width: 650px;height: 50px;border: 1px solid #fff;font-size: 13px;color: #fff;margin-bottom: 13px;background: none;padding-left: 20px;}
#ft_inquiry input[type="text"]::placeholder {color: #fff;}
#ft_inquiry textarea {width: 650px;height:200px;border: 1px solid #fff;font-size: 13px;color: #fff;margin-bottom: 13px;background: none;padding-left: 20px;padding-top: 15px;}
#ft_inquiry textarea::placeholder {color: #fff;}
#ft_inquiry .chk_box {margin-top: 0px;}
#ft_inquiry .chk_box input[type="checkbox"] {width:15px;height:15px;border:1px solid #fff;position:relative;opacity:1;z-index:1;}
#ft_inquiry .chk_box input[type="checkbox"] + label {position:relative;padding-left:0px;color:#fff;font-size: 14px;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {position:absolute;top:4px;left:0;width:15px;height:15px;display:block;margin:0;background:none;border:1px solid #6e6e6e;border-radius:0px}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-color:none;border-radius:0px}
#ft_inquiry input[type="submit"] {width: 165px;height: 42px;border: 1px solid #7b7b7b;border-radius: 21px;font-size: 12px;color: #fff;background: none;position: absolute;right:0px;bottom:-20px;cursor:pointer;}

/* company */ 
#ft_company {float: left;width:100%;font-weight:400;color:#fff;line-height:23px;}
.ft_logo {margin-bottom:70px;}
.ft_logo img {width: 261px;}
#ft_company .ft_tel {margin-top: 65px;}
#ft_company .ft_tel:after {content:"";display:block;clear:both;}
#ft_company .ft_tel li {float: left;position: relative;}
#ft_company .ft_tel li:first-child {margin-right:40px;padding-right:40px;font-size: 16px;}
#ft_company .ft_tel li:first-child:after {content: '';display: block;clear: both;width: 1px;height: 46px;background: #626262;position: absolute;right: 0;top: 8px;}
#ft_company .ft_tel li span {display:block;margin-bottom:10px;color:#fff;font-size:18px;font-weight:700;}
#ft_company .ft_tel li strong {font-size:25px;color: #bdb8fe;}
#ft_company .ft_tel li p {font-size: 15px;font-weight: 300;line-height: 28px;}
#ft_company .ft_info {font-size: 15px;font-weight: 300;color: #fff;line-height:36px;}
#ft_company .ft_info b {display: block;font-size: 16px;font-weight: 700;}
#ft_company .ft_info span {margin: 0 10px;}

#ft_copy {text-align: left;width: 600px;margin: 0;padding:20px 0 20px;color: #fff;font-size: 13px;font-weight:700;border-top: 0px;}

.ft_line {display: inline-block;margin: 0 10px;width: 1px;height: 12px;background:#fff;}

.sns_icon {}
.sns_icon:after {content:"";display:block;clear:both;}
.sns_icon li {float:left;margin-right:15px;opacity:0.6;}
.sns_icon li img {width: 25px;height: 25px;}


#ft_company .info_box_wrap{display: flex;gap:20px; margin-top:25px;}
#ft_company .info_box_wrap .info_box{border:solid 1px #fff; width: 520px; height: 140px; padding:16px;}
#ft_company .info_box_wrap .info_box .six{font-size:16px;}
#ft_company .info_box_wrap .info_box .four{font-size:40px;font-weight:700;}
#ft_company .info_box_wrap .info_box .two{font-size:20px;}
@media (max-width: 1760px)  {
/* 하단 레이아웃 */
#ft {background:#353739;margin:0 auto;}
#ft_wr {width:90.9091vw;max-width: 90.9091vw;margin:0 auto;padding:4.5455vw 0 3.4091vw;text-align:left}
#ft_wr:after {visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:1.8182vw;line-height: 1;margin-bottom: 1.4205vw;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {width:36.9318vw;}
#ft_inquiry p {font-size: 0.8523vw;margin-top: 1.8182vw;margin-bottom: 1.1364vw;}
#ft_inquiry input[type="text"] {width: 36.9318vw;height: 2.8409vw;border: 0.0568vw solid #fff;font-size: 0.7386vw;margin-bottom: 0.7386vw;background: none;padding-left: 1.1364vw;}
#ft_inquiry input[type="text"]::placeholder {}
#ft_inquiry textarea {width: 36.9318vw;height:11.3636vw;border: 0.0568vw solid #fff;font-size: 0.7386vw;margin-bottom: 0.7386vw;background: none;padding-left: 1.1364vw;padding-top: 0.8523vw;}
#ft_inquiry textarea::placeholder {}
#ft_inquiry .chk_box {margin-top: 0.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label {padding-left:0.0000vw;font-size: 0.7955vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {top:0.2273vw;left:0;width:0.8523vw;height:0.8523vw;margin:0;background:none;border:0.0568vw solid #6e6e6e;border-radius:0.0000vw}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-border-radius:0.0000vw}
#ft_inquiry input[type="submit"] {width: 9.3750vw;height: 2.3864vw;border: 0.0568vw solid #7b7b7b;border-radius: 1.1932vw;font-size: 0.6818vw;background: none;right:0.0000vw;bottom:-1.1364vw;cursor:pointer;}

/* company */ 
#ft_company {width:100%;line-height:1.3068vw;}
.ft_logo {margin-bottom:3.9773vw;}
.ft_logo img {width: 14.8295vw;}
#ft_company .ft_tel {margin-top: 3.6932vw;}
#ft_company .ft_tel:after {clear:both;}
#ft_company .ft_tel li {}
#ft_company .ft_tel li:first-child {margin-right:2.2727vw;padding-right:2.2727vw;font-size: 0.9091vw;}
#ft_company .ft_tel li:first-child:after {clear: both;width: 0.0568vw;height: 2.6136vw;background: #626262;right: 0;top: 0.4545vw;}
#ft_company .ft_tel li span {margin-bottom:0.5682vw;font-size:1.0227vw;}
#ft_company .ft_tel li strong {font-size:1.4205vw;}
#ft_company .ft_tel li p {font-size: 0.8523vw;line-height: 1.5909vw;}
#ft_company .ft_info {font-size: 0.8523vw;line-height:2.0455vw;}
#ft_company .ft_info b {font-size: 0.9091vw;}
#ft_company .ft_info span {margin: 0 0.5682vw;}

#ft_copy {width: 34.0909vw;margin: 0;padding:1.1364vw 0 1.1364vw;font-size: 0.7386vw;border-top: 0.0000vw;}

.ft_line {margin: 0 0.5682vw;width: 0.0568vw;height: 0.6818vw;background:#fff;}

.sns_icon {}
.sns_icon:after {clear:both;}
.sns_icon li {margin-right:0.8523vw;opacity:0.6;}
.sns_icon li img {width: 1.4205vw;height: 1.4205vw;}

}
#ft_company .info_box_wrap{gap:1.1vw; margin-top:1.4vw;}
#ft_company .info_box_wrap .info_box{border:solid 0.1vw #fff; width: 29.5vw; height: 8.0vw; padding:0.9vw;}
#ft_company .info_box_wrap .info_box .six{font-size:0.9vw;}
#ft_company .info_box_wrap .info_box .four{font-size:2.3vw;}
#ft_company .info_box_wrap .info_box .two{font-size:1vw;}
@media (max-width: 1600px)  {
/* 하단 레이아웃 */
#ft {background:#353739;margin:0 auto;padding:0 2.5000vw}
#ft_wr {width:100%;max-width: 100.0000vw;margin:0 auto;padding:5.0000vw 0 3.7500vw;text-align:left}
#ft_wr:after {visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:2.0000vw;line-height: 1;margin-bottom: 1.5625vw;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {width:40%;margin-right:7.3750vw;}
#ft_inquiry p {font-size: 0.9375vw;margin-top: 2.0000vw;margin-bottom: 1.2500vw;}
#ft_inquiry input[type="text"] {width: 40.6250vw;height: 3.1250vw;border: 0.0625vw solid #fff;font-size: 0.8125vw;margin-bottom: 0.8125vw;background: none;padding-left: 1.2500vw;}
#ft_inquiry input[type="text"]::placeholder {}
#ft_inquiry textarea {width: 40.6250vw;height:12.5000vw;border: 0.0625vw solid #fff;font-size: 0.8125vw;margin-bottom: 0.8125vw;background: none;padding-left: 1.2500vw;padding-top: 0.9375vw;}
#ft_inquiry textarea::placeholder {}
#ft_inquiry .chk_box {margin-top: 0.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label {padding-left:0.0000vw;font-size: 0.8750vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {top:0.2500vw;left:0;width:0.9375vw;height:0.9375vw;margin:0;background:none;border:0.0625vw solid #6e6e6e;border-radius:0.0000vw}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-border-radius:0.0000vw}
#ft_inquiry input[type="submit"] {width: 10.3125vw;height: 2.6250vw;border: 0.0625vw solid #7b7b7b;border-radius: 1.3125vw;font-size: 0.7500vw;background: none;right:0.0000vw;bottom:-1.2500vw;cursor:pointer;}

/* company */ 
#ft_company {width:100%;line-height:1.4375vw;}
.ft_logo {margin-bottom:4.3750vw;}
.ft_logo img {width: 16.3125vw;}
#ft_company .ft_tel {margin-top: 4.0625vw;}
#ft_company .ft_tel:after {clear:both;}
#ft_company .ft_tel li {}
#ft_company .ft_tel li:first-child {margin-right:2.5000vw;padding-right:2.5000vw;font-size: 1.0000vw;}
#ft_company .ft_tel li:first-child:after {clear: both;width: 0.0625vw;height: 2.8750vw;background: #626262;right: 0;top: 0.5000vw;}
#ft_company .ft_tel li span {margin-bottom:0.6250vw;font-size:1.1250vw;}
#ft_company .ft_tel li strong {font-size:1.5625vw;}
#ft_company .ft_tel li p {font-size: 0.9375vw;line-height: 1.7500vw;}
#ft_company .ft_info {font-size: 0.9375vw;line-height:2.2500vw;}
#ft_company .ft_info b {font-size: 1.0000vw;}
#ft_company .ft_info span {margin: 0 0.6250vw;}

#ft_copy {width: 37.5000vw;margin: 0;padding:1.2500vw 0 1.2500vw;font-size: 0.8125vw;border-top: 0.0000vw;}

.ft_line {margin: 0 0.6250vw;width: 0.0625vw;height: 0.7500vw;background:#fff;}

.sns_icon {}
.sns_icon:after {clear:both;}
.sns_icon li {margin-right:0.9375vw;opacity:0.6;}
.sns_icon li img {width: 1.5625vw;height: 1.5625vw;}

#ft_company .info_box_wrap .info_box{border:solid 0.1vw #fff; width: 29.5vw; height: 9.0vw; padding:0.9vw;}
}

@media (max-width: 1400px)  {
/* 하단 레이아웃 */
#ft {background:#353739;margin:0 auto;padding:0 2.8571vw}
#ft_wr {width:100%;max-width: 114.2857vw;margin:0 auto;padding:5.7143vw 0 4.2857vw;text-align:left}
#ft_wr:after {visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:2.2857vw;line-height: 1;margin-bottom: 1.7857vw;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {width:46%;margin-right:0;}
#ft_inquiry p {font-size: 1.0714vw;margin-top: 2.2857vw;margin-bottom: 1.4286vw;}
#ft_inquiry input[type="text"] {width: 100%;height: 3.5714vw;border: 0.0714vw solid #fff;font-size: 0.9286vw;margin-bottom: 0.9286vw;background: none;padding-left: 1.4286vw;}
#ft_inquiry input[type="text"]::placeholder {}
#ft_inquiry textarea {width: 100%;height:14.2857vw;border: 0.0714vw solid #fff;font-size: 0.9286vw;margin-bottom: 0.9286vw;background: none;padding-left: 1.4286vw;padding-top: 1.0714vw;}
#ft_inquiry textarea::placeholder {}
#ft_inquiry .chk_box {margin-top: 0.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label {padding-left:0.0000vw;font-size: 1.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {top:0.2857vw;left:0;width:1.0714vw;height:1.0714vw;margin:0;background:none;border:0.0714vw solid #6e6e6e;border-radius:0.0000vw}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-border-radius:0.0000vw}
#ft_inquiry input[type="submit"] {width: 11.7857vw;height: 3.0000vw;border: 0.0714vw solid #7b7b7b;border-radius: 1.5000vw;font-size: 0.8571vw;background: none;right:0.0000vw;bottom:-1.4286vw;cursor:pointer;}

/* company */ 
#ft_company {width:100%;line-height:1.6429vw;}
.ft_logo {margin-bottom:5.0000vw;}
.ft_logo img {width: 18.6429vw;}
#ft_company .ft_tel {margin-top: 4.6429vw;}
#ft_company .ft_tel:after {clear:both;}
#ft_company .ft_tel li {}
#ft_company .ft_tel li:first-child {margin-right:2.8571vw;padding-right:2.8571vw;font-size: 1.1429vw;}
#ft_company .ft_tel li:first-child:after {clear: both;width: 0.0714vw;height: 3.2857vw;background: #626262;right: 0;top: 0.5714vw;}
#ft_company .ft_tel li span {margin-bottom:0.7143vw;font-size:1.2857vw;}
#ft_company .ft_tel li strong {font-size:1.7857vw;}
#ft_company .ft_tel li p {font-size: 1.0714vw;line-height: 2.0000vw;}
#ft_company .ft_info {font-size: 1.0114vw;line-height:2.5714vw;}
#ft_company .ft_info b {font-size: 1.1429vw;}
#ft_company .ft_info span {margin: 0 0.7143vw;}

#ft_copy {width: 42.8571vw;margin: 0;padding:1.4286vw 0 1.4286vw;font-size: 0.9286vw;border-top: 0.0000vw;}

.ft_line {margin: 0 0.7143vw;width: 0.0714vw;height: 0.8571vw;background:#fff;}

.sns_icon {}
.sns_icon:after {clear:both;}
.sns_icon li {margin-right:1.0714vw;opacity:0.6;}
.sns_icon li img {width: 1.7857vw;height: 1.7857vw;}

}

@media (max-width: 1024px)  {
/* 하단 레이아웃 */
#ft {background:#353739;margin:0 auto;padding:0 3.9063vw}
#ft_wr {width:100%;max-width: 156.2500vw;margin:0 auto;padding:7.8125vw 0 5.8594vw;text-align:left}
#ft_wr:after {visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:3.1250vw;line-height: 1;margin-bottom: 2.4414vw;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {width:100%;float:none;margin-bottom:5.8594vw;}
#ft_inquiry p {font-size: 1.4648vw;margin-top: 3.1250vw;margin-bottom: 1.9531vw;}
#ft_inquiry input[type="text"] {width: 100%;height: 4.8828vw;border: 0.0977vw solid #fff;font-size: 1.2695vw;margin-bottom: 1.2695vw;background: none;padding-left: 1.9531vw;}
#ft_inquiry input[type="text"]::placeholder {}
#ft_inquiry textarea {width: 100%;height:19.5313vw;border: 0.0977vw solid #fff;font-size: 1.2695vw;margin-bottom: 1.2695vw;background: none;padding-left: 1.9531vw;padding-top: 1.4648vw;}
#ft_inquiry textarea::placeholder {}
#ft_inquiry .chk_box {margin-top: 0.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label {padding-left:0.0000vw;font-size: 1.3672vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {top:0.3906vw;left:0;width:1.4648vw;height:1.4648vw;margin:0;background:none;border:0.0977vw solid #6e6e6e;border-radius:0.0000vw}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-border-radius:0.0000vw}
#ft_inquiry input[type="submit"] {width: 16.1133vw;height: 4.1016vw;border: 0.0977vw solid #7b7b7b;border-radius: 2.0508vw;font-size: 1.1719vw;background: none;right:0.0000vw;bottom:-1.9531vw;cursor:pointer;}

/* company */ 
#ft_company {width:100%;float:none;line-height:2.2461vw;}
.ft_logo {margin-bottom:6.8359vw;}
.ft_logo img {width: 25.4883vw;}
#ft_company .ft_tel {margin-top: 6.3477vw;}
#ft_company .ft_tel:after {clear:both;}
#ft_company .ft_tel li {}
#ft_company .ft_tel li:first-child {margin-right:3.9063vw;padding-right:3.9063vw;font-size: 1.5625vw;}
#ft_company .ft_tel li:first-child:after {clear: both;width: 0.0977vw;height: 4.4922vw;background: #626262;right: 0;top: 0.7813vw;}
#ft_company .ft_tel li span {margin-bottom:0.9766vw;font-size:1.7578vw;}
#ft_company .ft_tel li strong {font-size:2.4414vw;}
#ft_company .ft_tel li p {font-size: 1.4648vw;line-height: 2.7344vw;}
#ft_company .ft_info {font-size: 1.4648vw;line-height:3.5156vw;}
#ft_company .ft_info b {font-size: 1.5625vw;}
#ft_company .ft_info span {margin: 0 0.9766vw;}

#ft_copy {width: 58.5938vw;margin: 0;padding:1.9531vw 0 1.9531vw;font-size: 1.2695vw;border-top: 0.0000vw;}

.ft_line {margin: 0 0.9766vw;width: 0.0977vw;height: 1.1719vw;background:#fff;}

.sns_icon {}
.sns_icon:after {clear:both;}
.sns_icon li {margin-right:1.4648vw;opacity:0.6;}
.sns_icon li img {width: 2.4414vw;height: 2.4414vw;}

#ft_company .info_box_wrap .info_box{border:solid 0.1vw #fff; width: 29.5vw; height: 10.0vw; padding:0.9vw;}
}

@media (max-width: 768px)  {
/* 하단 레이아웃 */
#ft {background:#353739;margin:0 auto;padding:0 5.2083vw}
#ft_wr {width:100%;max-width: 208.3333vw;margin:0 auto;padding:10.4167vw 0 7.8125vw;text-align:left}
#ft_wr:after {visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:4.2969vw;line-height: 1;margin-bottom: 3.2552vw;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {width:100%;margin-bottom:7.8125vw;}
#ft_inquiry p {font-size: 2.8646vw;margin-top: 4.1667vw;margin-bottom: 2.6042vw;}
#ft_inquiry input[type="text"] {width: 100%;height: 6.5104vw;border: 0.1302vw solid #fff;font-size: 1.6927vw;margin-bottom: 1.6927vw;background: none;padding-left: 2.6042vw;}
#ft_inquiry input[type="text"]::placeholder {}
#ft_inquiry textarea {width: 100%;height:13.0208vw;border: 0.1302vw solid #fff;font-size: 1.6927vw;margin-bottom: 1.6927vw;background: none;padding-left: 2.6042vw;padding-top: 1.9531vw;}
#ft_inquiry textarea::placeholder {}
#ft_inquiry .chk_box {margin-top: 0.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label {padding-left:0.0000vw;font-size: 1.8229vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {top:0.5208vw;left:0;width:1.9531vw;height:1.9531vw;margin:0;background:none;border:0.1302vw solid #6e6e6e;border-radius:0.0000vw}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-border-radius:0.0000vw}
#ft_inquiry input[type="submit"] {width: 21.4844vw;height: 5.4688vw;border: 0.1302vw solid #7b7b7b;border-radius: 2.7344vw;font-size: 1.5625vw;background: none;right:0.0000vw;bottom:-2.6042vw;cursor:pointer;}

/* company */ 
#ft_company {width:100%;line-height:2.9948vw;}
.ft_logo {margin-bottom:7.8125vw;text-align: center;}
.ft_logo img {width: 23.4375vw;}
#ft_company .ft_tel {margin-top: 8.4635vw;}
#ft_company .ft_tel:after {clear:both;}
#ft_company .ft_tel li {}
#ft_company .ft_tel li:first-child {margin-right:5.2083vw;padding-right:5.2083vw;font-size: 2.0833vw;}
#ft_company .ft_tel li:first-child:after {clear: both;width: 0.1302vw;height: 5.9896vw;background: #626262;right: 0;top: 1.0417vw;}
#ft_company .ft_tel li span {margin-bottom:1.3021vw;font-size:2.3438vw;}
#ft_company .ft_tel li strong {font-size:3.2552vw;}
#ft_company .ft_tel li p {font-size: 1.9531vw;line-height: 3.6458vw;}
#ft_company .ft_info {font-size: 2.5042vw;line-height:4.6875vw; word-break:keep-all;}
#ft_company .ft_info b {font-size: 2.0833vw;}
#ft_company .ft_info span {margin: 0 1.3021vw;}

#ft_copy {width: 78.1250vw;margin: 0;padding:2.6042vw 0 2.6042vw;font-size: 2.3438vw;border-top: 0.0000vw;}

.ft_line {margin: 0 1.3021vw;width: 0.1302vw;height: 1.5625vw;background:#fff;}

.sns_icon {}
.sns_icon:after {clear:both;}
.sns_icon li {margin-right:1.9531vw;opacity:0.6;}
.sns_icon li img {width: 3.2552vw;height: 3.2552vw;}

#ft_company .info_box_wrap{flex-direction: column;}
#ft_company .info_box_wrap .info_box {border: solid 0.1vw #fff;width: 100%;height: 15vw;padding: 0.9vw; text-align:center; line-height:1.2;}
#ft_company .info_box_wrap .info_box .six{font-size: 2.540vw;}
#ft_company .info_box_wrap .info_box .four{font-size: 3.540vw;}
#ft_company .info_box_wrap .info_box .two{font-size: 2.540vw;}
}

@media (max-width: 480px)  {

}


</style>


<div id="ft" class="hide720">
	<div class="inner1400">
    <div id="ft_wr">

<!-- 		<div id="ft_inquiry">
		        	<h2>INQUIRY</h2>
			<p>언제든지 문의주시면 친절하게 답변드리겠습니다.</p>
			<div class="ft_inquiry">
				<form id="fwrite" name="fwrite" autocomplete="off" style="" action="/bbs/write_update.php" method="post" class="clearfix" onsubmit="return qk_submit(this);">
					<input type="hidden" value="inquiry" name="bo_table">
					<input type="hidden" value="빠른 문의입니다." name="wr_subject">
					<input type="hidden" value="1" name="wr_10">
					<input type="hidden" value="기타 문의" name="wr_1">
					<div class="inquiry_box inquiry_box01">
						<label for="wr_name_quick" class="sound_only">성함</label>
						<input type="text" name="wr_name" value="" id="wr_name_quick" required placeholder="Name *">
					</div>
					<div class="inquiry_box inquiry_box02">
						<label for="wr_email_quick" class="sound_only">이메일</label>
						<input type="text" name="wr_email" value="" id="wr_email_quick" required placeholder="E-mail *">
					</div> 
					<div class="inquiry_box inquiry_box03">
						<label for="wr_content_quick" class="sound_only">내용</label>
						<textarea name="wr_content" id="wr_content_quick" placeholder="Message *"></textarea>
					</div>
					<div class="inq_agree chk_box">
						<input type="checkbox" class="" id="chk_agree">
						<label for="chk_agree"> 개인정보수집 이용 동의</label>	
					</div>
					<div class="send_box">
						<input type="submit" accesskey="s" value="SEND MESSAGE" class="main_submit">
					</div>
				</form>
				<script>
				function qk_submit(f){
					if(document.getElementById("chk_agree").checked == false){
						alert('개인정보 처리 방침을 동의해주세요.');
						return false;
					}
		
					return true;
				}
				</script>
			</div>
		</div> -->

		<div id="ft_company">
			<div class="ft_logo">
				<img src="/images/f_logo.png" alt="">
			</div>
	        <p class="ft_info">
				<b class="mont">주식회사 이루다</b>
				<!-- 상호명 : <?php echo $default['de_admin_company_name']; ?><span class="ft_line"></span> -->
				대표 : <?php echo $default['de_admin_company_owner']; ?> <span class="ft_line"></span> 
				주소 : <?php echo $default['de_admin_company_addr']; ?> <br>
				사업자등록번호 : <?php echo $default['de_admin_company_saupja_no']; ?> <span class="ft_line"></span>
				통신판매업신고 : <?php echo $default['de_admin_tongsin_no']; ?>
				개인정보보호책임자 : <?php echo $default['de_admin_info_name']; ?>
				대표 메일 : <?php echo $default['de_admin_info_email']; ?><br>
				운영 시간 : 월-금 오전 10:00 - 오후 5:00시 (점심시간 오후 12:30 - 13:30)<span class="ft_line"></span>주말/공휴일 휴무<br>
				<div class="info_box_wrap">
					<div class="info_box">
						<p class="six">고객 센터</p><br>
						<p class="four">031-468-6808</p>
					</div>
					<div class="info_box">
						<p class="six" style="margin-bottom:1vw;">입금계좌 안내</p>
						<p class="four" style="margin-bottom:1vw;">279801-04-303177</p>
						<p class="six">국민은행 예금주 : 주식회사 이루다</p>
					</div>
					<div class="info_box">
						<p class="six" style="margin-bottom:1vw;">반품주소 안내</p>
						<p class="two">경기도 안양시 만안구 덕천로 152번길 25 </p><p class="two"> 안양 아이에스BIZ타워센트럴 9층 <strong>A동 이루다몰 반품센터</strong></p>
					</div>
				</div>
			</p>
			<div id="ft_copy">COPYRIGHT &copy; 2023 ILOODA ALL RIGHTS RESERVED.</div>
			<ul class="sns_icon">
				<li><a href="https://pf.kakao.com/_irvxls" target="_blank"><img src="/images/ft_img001.png" alt=""></a></li>
				<li><a href="https://www.instagram.com/ilooda.official/" target="_blank"><img src="/images/ft_img002.png" alt=""></a></li>
				<!-- <li><a href="" target="_blank"><img src="/images/ft_img003.png" alt=""></a></li> -->
				<li><a href="https://www.youtube.com/channel/UCGAwsVKufwicLi5leOEzZJQ" target="_blank"><img src="/images/ft_img004.png" alt=""></a></li>
				<li><a href="https://www.facebook.com/creativeilooda" target="_blank"><img src="/images/ft_img005.png" alt=""></a></li>
				<!-- <li><a href="https://vimeo.com/user153508039" target="_blank"><img src="/images/ft_img006.png" alt=""></a></li> -->
				<!-- <li><a href="https://www.pinterest.co.kr/ilooda_official/" target="_blank"><img src="/images/ft_img007.png" alt=""></a></li> -->
			</ul>
	    </div>

    </div>
	</div>
</div>

<div id="ft" class="show720">
	<div class="inner1400">
    <div id="ft_wr">
		<div class="ft_logo">
			<img src="/images/f_logo.png" alt="">
		</div>
<!-- 		<div id="ft_inquiry">
		        	<h2>INQUIRY</h2>
			<p>언제든지 문의주시면 친절하게 답변드리겠습니다.</p>
			<div class="ft_inquiry">
				<form id="fwrite" name="fwrite" autocomplete="off" style="" action="/bbs/write_update.php" method="post" class="clearfix" onsubmit="return qk_submit(this);">
					<input type="hidden" value="inquiry" name="bo_table">
					<input type="hidden" value="빠른 문의입니다." name="wr_subject">
					<input type="hidden" value="1" name="wr_10">
					<input type="hidden" value="기타 문의" name="wr_1">
					<div class="inquiry_box inquiry_box01">
						<label for="wr_name_quick" class="sound_only">성함</label>
						<input type="text" name="wr_name" value="" id="wr_name_quick" required placeholder="Name *">
					</div>
					<div class="inquiry_box inquiry_box02">
						<label for="wr_email_quick" class="sound_only">이메일</label>
						<input type="text" name="wr_email" value="" id="wr_email_quick" required placeholder="E-mail *">
					</div> 
					<div class="inquiry_box inquiry_box03">
						<label for="wr_content_quick" class="sound_only">내용</label>
						<textarea name="wr_content" id="wr_content_quick" placeholder="Message *"></textarea>
					</div>
					<div class="inq_agree chk_box">
						<input type="checkbox" class="" id="chk_agree">
						<label for="chk_agree"> 개인정보수집 이용 동의</label>	
					</div>
					<div class="send_box">
						<input type="submit" accesskey="s" value="SEND MESSAGE" class="main_submit">
					</div>
				</form>
				<script>
				function qk_submit(f){
					if(document.getElementById("chk_agree").checked == false){
						alert('개인정보 처리 방침을 동의해주세요.');
						return false;
					}
		
					return true;
				}
				</script>
			</div>
		</div> -->
		
		<div id="ft_company">
	        <p class="ft_info">
				<b class="mont">주식회사 이루다</b>
				<!-- 상호명 : <?php echo $default['de_admin_company_name']; ?><span class="ft_line"></span> -->
				대표 : <?php echo $default['de_admin_company_owner']; ?> <span class="ft_line"></span> 
				주소 : <?php echo $default['de_admin_company_addr']; ?> <br>
				사업자등록번호 : <?php echo $default['de_admin_company_saupja_no']; ?> <span class="ft_line"></span>
				통신판매업신고 : <?php echo $default['de_admin_tongsin_no']; ?>
				개인정보보호책임자 : <?php echo $default['de_admin_info_name']; ?>
				대표 메일 : <?php echo $default['de_admin_info_email']; ?><br>
				운영 시간 : 월-금 오전 10:00 - 오후 5:00시 (점심시간 오후 12:30 - 13:30) <br>주말/공휴일 휴무<br>
				<div class="info_box_wrap">
					<div class="info_box">
						<p class="six">고객 센터</p><br>
						<p class="four">031-468-6808</p>
					</div>
					<div class="info_box">
						<p class="six" style="margin-bottom:1vw;">입금계좌 안내</p>
						<p class="four" style="margin-bottom:1vw;">279801-04-303177</p>
						<p class="six">국민은행 예금주 : 주식회사 이루다</p>
					</div>
					<div class="info_box">
						<p class="six" style="margin-bottom:1vw;">반품주소 안내</p>
						<p class="two">경기도 안양시 만안구 덕천로 152번길 25 </p><p class="two"> 안양 아이에스BIZ타워센트럴 9층 <strong>A동 이루다몰 반품센터</strong></p>
					</div>
				</div>
			</p>
			<div id="ft_copy">COPYRIGHT &copy; 2023 ILOODA ALL RIGHTS RESERVED.</div>

			<ul class="sns_icon">
				<li><a href=""><img src="/images/ft_img001.png" alt=""></a></li>
				<li><a href=""><img src="/images/ft_img002.png" alt=""></a></li>
				<li><a href=""><img src="/images/ft_img003.png" alt=""></a></li>
				<li><a href=""><img src="/images/ft_img004.png" alt=""></a></li>
				<li><a href=""><img src="/images/ft_img005.png" alt=""></a></li>
				<!-- <li><a href=""><img src="/images/ft_img006.png" alt=""></a></li>
				<li><a href=""><img src="/images/ft_img007.png" alt=""></a></li> -->
			</ul>

	    </div>

    </div>
	</div>
</div>

<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<!-- } 하단 끝 -->

<?php
include_once(G5_PATH.'/tail.sub.php');