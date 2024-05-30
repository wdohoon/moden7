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
#ft {background:#fff;margin:0 auto;text-align:center;position:relative; border-top:1px solid #cccccc;}
#ft_wr {width:1600px;max-width: 1600px;margin:0 auto;padding:30px 0;position:relative;display:inline-block;text-align:left}
#ft_wr:after {display:block;visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:32px;color: #fff;line-height: 1;margin-bottom: 25px;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {float: right;width:650px;color: #fff;position: relative;}
#ft_inquiry p {font-size: 15px;font-weight: 100;margin-top: 32px;margin-bottom: 20px;}
#ft_inquiry input[type="text"] {width: 650px;height: 50px;border: 1px solid #fff;font-size: 13px;color: #fff;margin-bottom: 13px;background: none;padding-left: 20px;}
#ft_inquiry input[type="text"]::placeholder {color: #fff;}
#ft_inquiry textarea {width: 650px;height:100px;border: 1px solid #fff;font-size: 13px;color: #fff;margin-bottom: 13px;background: none;padding-left: 20px;padding-top: 15px;}
#ft_inquiry textarea::placeholder {color: #fff;}
#ft_inquiry .chk_box {margin-top: 0px;}
#ft_inquiry .chk_box input[type="checkbox"] {width:15px;height:15px;border:1px solid #fff;position:relative;opacity:1;z-index:1;}
#ft_inquiry .chk_box input[type="checkbox"] + label {position:relative;padding-left:0px;color:#fff;font-size: 14px;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {position:absolute;top:4px;left:0;width:15px;height:15px;display:block;margin:0;background:none;border:1px solid #6e6e6e;border-radius:0px}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-color:none;border-radius:0px}
#ft_inquiry input[type="submit"] {width: 165px;height: 42px;border: 1px solid #7b7b7b;border-radius: 21px;font-size: 12px;color: #fff;background: none;position: absolute;right:0px;bottom:-20px;cursor:pointer;}

/* company */ 
#ft_company {font-weight:400;color:#fff;line-height:23px;overflow: hidden;}
.ft_logo {float: left;margin-right: 40px;}
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

#ft_copy {float: left; color:#a6a6a6; text-align: left;width: 600px;margin: 0;padding:0;font-size: 13px;font-weight:700;border-top: 0px;}

.ft_line {display: inline-block;margin: 0 10px;width: 1px;height: 12px;background:#fff;}


@media (max-width: 1760px)  {
/* 하단 레이아웃 */
#ft {background:#fff;margin:0 auto; border-top:0.0568vw solid #cccccc;}
#ft_wr {width:90.9091vw;max-width: 90.9091vw;margin:0 auto;padding:1.7045vw 0;text-align:left}
#ft_wr:after {visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:1.8182vw;line-height: 1;margin-bottom: 1.4205vw;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {width:36.9318vw;}
#ft_inquiry p {font-size: 0.8523vw;margin-top: 1.8182vw;margin-bottom: 1.1364vw;}
#ft_inquiry input[type="text"] {width: 36.9318vw;height: 2.8409vw;border: 0.0568vw solid #fff;font-size: 0.7386vw;margin-bottom: 0.7386vw;background: none;padding-left: 1.1364vw;}
#ft_inquiry input[type="text"]::placeholder {}
#ft_inquiry textarea {width: 36.9318vw;height:5.6818vw;border: 0.0568vw solid #fff;font-size: 0.7386vw;margin-bottom: 0.7386vw;background: none;padding-left: 1.1364vw;padding-top: 0.8523vw;}
#ft_inquiry textarea::placeholder {}
#ft_inquiry .chk_box {margin-top: 0.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label {padding-left:0.0000vw;font-size: 0.7955vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {top:0.2273vw;left:0;width:0.8523vw;height:0.8523vw;margin:0;background:none;border:0.0568vw solid #6e6e6e;border-radius:0.0000vw}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-border-radius:0.0000vw}
#ft_inquiry input[type="submit"] {width: 9.3750vw;height: 2.3864vw;border: 0.0568vw solid #7b7b7b;border-radius: 1.1932vw;font-size: 0.6818vw;background: none;right:0.0000vw;bottom:-1.1364vw;cursor:pointer;}

/* company */ 
#ft_company {line-height:1.3068vw;}
.ft_logo {margin-right: 2.2727vw;}
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

#ft_copy {width: 34.0909vw;margin: 0;font-size: 0.7386vw;border-top: 0.0000vw;}

.ft_line {margin: 0 0.5682vw;width: 0.0568vw;height: 0.6818vw;background:#fff;}
}

@media (max-width: 1600px)  {
/* 하단 레이아웃 */
#ft {background:#fff;margin:0 auto;padding:0 2.5000vw;border-top:0.0625vw solid #cccccc;}
#ft_wr {width:100%;max-width: 100.0000vw;margin:0 auto;padding:1.8750vw 0;text-align:left}
#ft_wr:after {visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:2.0000vw;line-height: 1;margin-bottom: 1.5625vw;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {width:40%;margin-right:7.3750vw;}
#ft_inquiry p {font-size: 0.9375vw;margin-top: 2.0000vw;margin-bottom: 1.2500vw;}
#ft_inquiry input[type="text"] {width: 40.6250vw;height: 3.1250vw;border: 0.0625vw solid #fff;font-size: 0.8125vw;margin-bottom: 0.8125vw;background: none;padding-left: 1.2500vw;}
#ft_inquiry input[type="text"]::placeholder {}
#ft_inquiry textarea {width: 40.6250vw;height:6.2500vw;border: 0.0625vw solid #fff;font-size: 0.8125vw;margin-bottom: 0.8125vw;background: none;padding-left: 1.2500vw;padding-top: 0.9375vw;}
#ft_inquiry textarea::placeholder {}
#ft_inquiry .chk_box {margin-top: 0.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label {padding-left:0.0000vw;font-size: 0.8750vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {top:0.2500vw;left:0;width:0.9375vw;height:0.9375vw;margin:0;background:none;border:0.0625vw solid #6e6e6e;border-radius:0.0000vw}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-border-radius:0.0000vw}
#ft_inquiry input[type="submit"] {width: 10.3125vw;height: 2.6250vw;border: 0.0625vw solid #7b7b7b;border-radius: 1.3125vw;font-size: 0.7500vw;background: none;right:0.0000vw;bottom:-1.2500vw;cursor:pointer;}

/* company */ 
#ft_company {line-height:1.4375vw;}
.ft_logo {margin-right: 2.5000vw;}
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

#ft_copy {width: 37.5000vw;margin: 0;font-size: 0.8125vw;border-top: 0.0000vw;}

.ft_line {margin: 0 0.6250vw;width: 0.0625vw;height: 0.7500vw;background:#fff;}
}

@media (max-width: 1400px)  {
/* 하단 레이아웃 */
#ft {background:#fff;margin:0 auto;padding:0 2.8571vw; border-top:0.0714vw solid #cccccc;}
#ft_wr {width:100%;max-width: 114.2857vw;margin:0 auto;padding:2.1429vw 0;text-align:left}
#ft_wr:after {visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:2.2857vw;line-height: 1;margin-bottom: 1.7857vw;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {width:46%;margin-right:0;}
#ft_inquiry p {font-size: 1.0714vw;margin-top: 2.2857vw;margin-bottom: 1.4286vw;}
#ft_inquiry input[type="text"] {width: 100%;height: 3.5714vw;border: 0.0714vw solid #fff;font-size: 0.9286vw;margin-bottom: 0.9286vw;background: none;padding-left: 1.4286vw;}
#ft_inquiry input[type="text"]::placeholder {}
#ft_inquiry textarea {width: 100%;height:7.1429vw;border: 0.0714vw solid #fff;font-size: 0.9286vw;margin-bottom: 0.9286vw;background: none;padding-left: 1.4286vw;padding-top: 1.0714vw;}
#ft_inquiry textarea::placeholder {}
#ft_inquiry .chk_box {margin-top: 0.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label {padding-left:0.0000vw;font-size: 1.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {top:0.2857vw;left:0;width:1.0714vw;height:1.0714vw;margin:0;background:none;border:0.0714vw solid #6e6e6e;border-radius:0.0000vw}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-border-radius:0.0000vw}
#ft_inquiry input[type="submit"] {width: 11.7857vw;height: 3.0000vw;border: 0.0714vw solid #7b7b7b;border-radius: 1.5000vw;font-size: 0.8571vw;background: none;right:0.0000vw;bottom:-1.4286vw;cursor:pointer;}

/* company */ 
#ft_company {line-height:1.6429vw;}
.ft_logo {margin-right: 2.8571vw;}
.ft_logo img {width: 18.6429vw;}
#ft_company .ft_tel {margin-top: 4.6429vw;}
#ft_company .ft_tel:after {clear:both;}
#ft_company .ft_tel li {}
#ft_company .ft_tel li:first-child {margin-right:2.8571vw;padding-right:2.8571vw;font-size: 1.1429vw;}
#ft_company .ft_tel li:first-child:after {clear: both;width: 0.0714vw;height: 3.2857vw;background: #626262;right: 0;top: 0.5714vw;}
#ft_company .ft_tel li span {margin-bottom:0.7143vw;font-size:1.2857vw;}
#ft_company .ft_tel li strong {font-size:1.7857vw;}
#ft_company .ft_tel li p {font-size: 1.0714vw;line-height: 2.0000vw;}
#ft_company .ft_info {font-size: 1.0714vw;line-height:2.5714vw;}
#ft_company .ft_info b {font-size: 1.1429vw;}
#ft_company .ft_info span {margin: 0 0.7143vw;}

#ft_copy {width: 42.8571vw;margin: 0;font-size: 0.9286vw;border-top: 0.0000vw;}

.ft_line {margin: 0 0.7143vw;width: 0.0714vw;height: 0.8571vw;background:#fff;}
}

@media (max-width: 1024px)  {
/* 하단 레이아웃 */
#ft {background:#fff;margin:0 auto;padding:0 3.9063vw; border-top:0.0977vw solid #cccccc;}
#ft_wr {width:100%;max-width: 156.2500vw;margin:0 auto;padding:2.9297vw 0;text-align:left}
#ft_wr:after {visibility:hidden;clear:both;content:""}
#ft_wr h2 {font-size:3.1250vw;line-height: 1;margin-bottom: 2.4414vw;font-family: 'Noto Sans KR', sans-serif;}

/* inquiry */
#ft_inquiry {width:100%;float:none;margin-bottom:5.8594vw;}
#ft_inquiry p {font-size: 1.4648vw;margin-top: 3.1250vw;margin-bottom: 1.9531vw;}
#ft_inquiry input[type="text"] {width: 100%;height: 4.8828vw;border: 0.0977vw solid #fff;font-size: 1.2695vw;margin-bottom: 1.2695vw;background: none;padding-left: 1.9531vw;}
#ft_inquiry input[type="text"]::placeholder {}
#ft_inquiry textarea {width: 100%;height:9.7656vw;border: 0.0977vw solid #fff;font-size: 1.2695vw;margin-bottom: 1.2695vw;background: none;padding-left: 1.9531vw;padding-top: 1.4648vw;}
#ft_inquiry textarea::placeholder {}
#ft_inquiry .chk_box {margin-top: 0.0000vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label {padding-left:0.0000vw;font-size: 1.3672vw;}
#ft_inquiry .chk_box input[type="checkbox"] + label span {top:0.3906vw;left:0;width:1.4648vw;height:1.4648vw;margin:0;background:none;border:0.0977vw solid #6e6e6e;border-radius:0.0000vw}
#ft_inquiry .chk_box input[type="checkbox"]:checked + label span {background:url('../img/chk.png') no-repeat 50% 50%;border-border-radius:0.0000vw}
#ft_inquiry input[type="submit"] {width: 16.1133vw;height: 4.1016vw;border: 0.0977vw solid #7b7b7b;border-radius: 2.0508vw;font-size: 1.1719vw;background: none;right:0.0000vw;bottom:-1.9531vw;cursor:pointer;}

/* company */ 
#ft_company {float:none;line-height:2.2461vw;}
.ft_logo {margin-right: 3.9063vw;}
.ft_logo img {width: 100%}
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

#ft_copy {width: 58.5938vw;margin: 0;font-size: 1.2695vw;border-top: 0.0000vw;}

.ft_line {margin: 0 0.9766vw;width: 0.0977vw;height: 1.1719vw;background:#fff;}
}

@media (max-width: 768px)  {
/* 하단 레이아웃 */
#ft {background:#fff;margin:0 auto;padding:0 5.2083vw; border-top:0.1302vw solid #cccccc;}
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
.ft_logo {margin-bottom:0vw;text-align: left;margin-right: 0;}
.ft_logo img {width: 23.4375vw;}
#ft_company .ft_tel {margin-top: 8.4635vw;}
#ft_company .ft_tel:after {clear:both;}
#ft_company .ft_tel li {}
#ft_company .ft_tel li:first-child {margin-right:5.2083vw;padding-right:5.2083vw;font-size: 2.0833vw;}
#ft_company .ft_tel li:first-child:after {clear: both;width: 0.1302vw;height: 5.9896vw;background: #626262;right: 0;top: 1.0417vw;}
#ft_company .ft_tel li span {margin-bottom:1.3021vw;font-size:2.3438vw;}
#ft_company .ft_tel li strong {font-size:3.2552vw;}
#ft_company .ft_tel li p {font-size: 1.9531vw;line-height: 3.6458vw;}
#ft_company .ft_info {font-size: 2.6042vw;line-height:4.6875vw;}
#ft_company .ft_info b {font-size: 2.0833vw;}
#ft_company .ft_info span {margin: 0 1.3021vw;}

#ft_copy {width: 78.1250vw;margin: 0;padding:2.6042vw 0 2.6042vw;font-size: 2.3438vw;border-top: 0.0000vw;}

.ft_line {margin: 0 1.3021vw;width: 0.1302vw;height: 1.5625vw;background:#fff;}
}

@media (max-width: 480px)  {

}


</style>


<div id="ft" class="hide720">
	<div class="inner1400">
    <div id="ft_wr">

		<div id="ft_company">
			<div class="ft_logo">
				<img src="/images/marketing_logo_v1.png" alt="<?php echo $config['cf_title']; ?>">
			</div>
			<div id="ft_copy">서울시 강남구 논현로 135길 10 크리에이티비젼 | MANAGER@CREATIVISION.CO.KR<br>COPYRIGHT &copy; 2023 Creative-Marketing ALL RIGHTS RESERVED.</div>
	    </div>

    </div>
	</div>
</div>

<div id="ft" class="show720">
	<div class="inner1400">
    <div id="ft_wr">
		<div class="ft_logo">
			<img src="/images/marketing_logo_v1.png" alt="<?php echo $config['cf_title']; ?>">
		</div>
		<div id="ft_copy">서울시 강남구 논현로 135길 10 크리에이티비젼 | MANAGER@CREATIVISION.CO.KR<br>COPYRIGHT &copy; 2023 Creative-Marketing ALL RIGHTS RESERVED.</div>

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