<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.register_form.js"></script>', 0);
if ($config['cf_cert_use'] && ($config['cf_cert_simple'] || $config['cf_cert_ipin'] || $config['cf_cert_hp']))
    add_javascript('<script src="'.G5_JS_URL.'/certify.js?v='.G5_JS_VER.'"></script>', 0);
?>

<style>

#container {width:100%;}
#wrapper_title {text-align: center;font-size:48px;padding:100px 0 60px;}
#container .register {width:1200px;margin:0 auto;padding:120px 0;}
/* 회원가입 입력 */
#register_form {background:#fff;margin-bottom:20px}
#register_form h2 {padding:0px;border-bottom:0px solid #dde7e9}
.register_form_inner {background:#f7f7f7;border:0px solid #dde7e9;border-radius:3px}
.register_form_inner ul {padding:0px}
.register_form_inner label.doctorlabel, .register_form_inner label.managerlabel{display: inline-block; line-height:24px; font-size:16px; margin-right: 1%; margin-bottom: 0;}
.register_form_inner .doctor{margin-right: 5%;}
.register_form_inner label.inline {display:inline}

#fregisterform .cert_desc {color:#3a8afd;}
#fregisterform .cert_req {margin-left:5px;line-height:35px;}
#fregisterform #msg_certify {margin:5px 0;padding:5px;border:1px solid #dbecff;background:#eaf4ff;text-align:center}
#fregisterform .frm_address {margin:5px 0 0}
#fregisterform #mb_addr3 {display:inline-block;margin:5px 0 0;vertical-align:middle}
#fregisterform #mb_addr_jibeon {display:block;margin:5px 0 0}
#fregisterform .btn_confirm {text-align:center}
#fregisterform .form_01 div {margin:0 0 20px}
#fregisterform .captcha {display:block;margin:5px 0 0}
#fregisterform .reg_mb_img_file img {max-width:100%;height:auto}
#reg_mb_icon, #reg_mb_img {float:right}

.register .btn_confirm .btn_submit {background:#0c0c0c;border-color:#0c0c0c}


.register #fregisterform #register_form ul input[type='radio'] {position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip: rect(0, 0, 0, 0);border: 0;}
.register #fregisterform #register_form ul input[type='radio']+label{display:block;position: relative;cursor:pointer;color:#b3b3b3;background:#fff;width:49.5%;text-align: center;height:50px;font-size:13px;line-height:50px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;float:left;margin:0;}
.register #fregisterform #register_form ul input[type='radio']+label.managerlabel {float:right;}
.register #fregisterform #register_form ul input[type='radio']+label:after {border:1px solid #b3b3b3;color:#b3b3b3;content: '';position: absolute;left:50%;top: 0px;width:100%;height: 50px;text-align: center;box-shadow: none;transform:translateX(-50%);}
.register #fregisterform #register_form ul input[type='radio']:checked+label {background:transparent ;color:#000;}
.register #fregisterform #register_form ul input[type='radio']:checked+label:after {border-color: #000;background:transparent url('/images/ck_icon.png')no-repeat right 5% center;}

.form_01 .frm_label{
	width: auto !important;
}
#reg_mb_2{
	width: 50%;
}
@media (max-width:1760px){
#wrapper_title {font-size:2.7273vw;padding:5.6818vw 0 3.4091vw;}
#container .register {width:68.1818vw;margin:0 auto;padding:6.8182vw 0;}
/* 회원가입 입력 */
#register_form {background:#fff;margin-bottom:1.1364vw}
#register_form h2 {padding:0.0000vw;border-bottom:0.0000vw solid #dde7e9}
.register_form_inner {background:#f7f7f7;border:0.0000vw solid #dde7e9;border-radius:0.1705vw}
.register_form_inner ul {padding:0.0000vw}
.register_form_inner label.doctorlabel, .register_form_inner label.managerlabel{ line-height:1.3636vw; font-size:0.9091vw; margin-right: 1%;}
.register_form_inner .doctor{margin-right: 5%;}
.register_form_inner label.inline {display:inline}

#fregisterform .cert_desc {}
#fregisterform .cert_req {margin-left:0.2841vw;line-height:1.9886vw;}
#fregisterform #msg_certify {margin:0.2841vw 0;padding:0.2841vw;border:0.0568vw solid #dbecff;background:#eaf4ff;text-align:center}
#fregisterform .frm_address {margin:0.2841vw 0 0}
#fregisterform #mb_addr3 {margin:0.2841vw 0 0;vertical-align:middle}
#fregisterform #mb_addr_jibeon {margin:0.2841vw 0 0}
#fregisterform .btn_confirm {text-align:center}
#fregisterform .form_01 div {margin:0 0 1.1364vw}
#fregisterform .captcha {margin:0.2841vw 0 0}
#fregisterform .reg_mb_img_file img {max-width:100%;height:auto}
#reg_mb_icon, #reg_mb_img {float:right}

.register .btn_confirm .btn_submit {background:#0c0c0c;border-color:#0c0c0c}


.register #fregisterform #register_form ul input[type='radio'] {width: 0.0568vw;height: 0.0568vw;padding: 0;margin: -0.0568vw;clip: rect(0, 0, 0, 0);border: 0;}
.register #fregisterform #register_form ul input[type='radio']+label{cursor:pointer;background:#fff;width:49.5%;height:2.8409vw;font-size:0.7386vw;line-height:2.8409vw;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;margin:0;}
.register #fregisterform #register_form ul input[type='radio']+label.managerlabel {}
.register #fregisterform #register_form ul input[type='radio']+label:after {border:0.0568vw solid #b3b3b3;left:50%;top: 0.0000vw;width:100%;height: 2.8409vw;box-shadow: none;transform:translateX(-50%);}
.register #fregisterform #register_form ul input[type='radio']:checked+label {background:transparent ;}
.register #fregisterform #register_form ul input[type='radio']:checked+label:after {border-background:transparent url('/images/ck_icon.png')no-repeat right 5% center;}


}

@media (max-width:1600px){
#wrapper_title {font-size:3.0000vw;padding:6.2500vw 0 3.7500vw;}
#container .register {width:75vw;margin:0 auto;padding:7.5000vw 0;}
/* 회원가입 입력 */
#register_form {background:#fff;margin-bottom:1.2500vw}
#register_form h2 {padding:0.0000vw;border-bottom:0.0000vw solid #dde7e9}
.register_form_inner {background:#f7f7f7;border:0.0000vw solid #dde7e9;border-radius:0.1875vw}
.register_form_inner ul {padding:0.0000vw}
.register_form_inner label.doctorlabel, .register_form_inner label.managerlabel{ line-height:1.5000vw; font-size:1.0000vw; margin-right: 1%;}
.register_form_inner .doctor{margin-right: 5%;}
.register_form_inner label.inline {display:inline}

#fregisterform .cert_desc {}
#fregisterform .cert_req {margin-left:0.3125vw;line-height:2.1875vw;}
#fregisterform #msg_certify {margin:0.3125vw 0;padding:0.3125vw;border:0.0625vw solid #dbecff;background:#eaf4ff;text-align:center}
#fregisterform .frm_address {margin:0.3125vw 0 0}
#fregisterform #mb_addr3 {margin:0.3125vw 0 0;vertical-align:middle}
#fregisterform #mb_addr_jibeon {margin:0.3125vw 0 0}
#fregisterform .btn_confirm {text-align:center}
#fregisterform .form_01 div {margin:0 0 1.2500vw}
#fregisterform .captcha {margin:0.3125vw 0 0}
#fregisterform .reg_mb_img_file img {max-width:100%;height:auto}
#reg_mb_icon, #reg_mb_img {float:right}

.register .btn_confirm .btn_submit {background:#0c0c0c;border-color:#0c0c0c}

.register #fregisterform #register_form ul input[type='radio'] {width: 0.0625vw;height: 0.0625vw;padding: 0;margin: -0.0625vw;clip: rect(0, 0, 0, 0);border: 0;}
.register #fregisterform #register_form ul input[type='radio']+label{cursor:pointer;background:#fff;width:49.5%;height:3.1250vw;font-size:0.8125vw;line-height:3.1250vw;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;margin:0;}
.register #fregisterform #register_form ul input[type='radio']+label.managerlabel {}
.register #fregisterform #register_form ul input[type='radio']+label:after {border:0.0625vw solid #b3b3b3;left:50%;top: 0.0000vw;width:100%;height: 3.1250vw;box-shadow: none;transform:translateX(-50%);}
.register #fregisterform #register_form ul input[type='radio']:checked+label {background:transparent ;}
.register #fregisterform #register_form ul input[type='radio']:checked+label:after {border-background:transparent url('/images/ck_icon.png')no-repeat right 5% center;}


}

@media (max-width:1400px){
#wrapper_title {font-size:3.4286vw;padding:7.1429vw 0 4.2857vw;}
#container .register {width:85.7143vw;margin:0 auto;padding:8.5714vw 0;}
/* 회원가입 입력 */
#register_form {background:#fff;margin-bottom:1.4286vw}
#register_form h2 {padding:0.0000vw;border-bottom:0.0000vw solid #dde7e9}
.register_form_inner {background:#f7f7f7;border:0.0000vw solid #dde7e9;border-radius:0.2143vw}
.register_form_inner ul {padding:0.0000vw}
.register_form_inner label.doctorlabel, .register_form_inner label.managerlabel { line-height:1.7143vw; font-size:1.1429vw; margin-right: 1%;}
.register_form_inner .doctor{margin-right: 5%;}
.register_form_inner label.inline {display:inline}

#fregisterform .cert_desc {}
#fregisterform .cert_req {margin-left:0.3571vw;line-height:2.5000vw;}
#fregisterform #msg_certify {margin:0.3571vw 0;padding:0.3571vw;border:0.0714vw solid #dbecff;background:#eaf4ff;text-align:center}
#fregisterform .frm_address {margin:0.3571vw 0 0}
#fregisterform #mb_addr3 {margin:0.3571vw 0 0;vertical-align:middle}
#fregisterform #mb_addr_jibeon {margin:0.3571vw 0 0}
#fregisterform .btn_confirm {text-align:center}
#fregisterform .form_01 div {margin:0 0 1.4286vw}
#fregisterform .captcha {margin:0.3571vw 0 0}
#fregisterform .reg_mb_img_file img {max-width:100%;height:auto}
#reg_mb_icon, #reg_mb_img {float:right}

.register .btn_confirm .btn_submit {background:#0c0c0c;border-color:#0c0c0c}

.register #fregisterform #register_form ul input[type='radio'] {width: 0.0714vw;height: 0.0714vw;padding: 0;margin: -0.0714vw;clip: rect(0, 0, 0, 0);border: 0;}
.register #fregisterform #register_form ul input[type='radio']+label{cursor:pointer;background:#fff;width:49.5%;height:3.5714vw;font-size:0.9286vw;line-height:3.5714vw;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;margin:0;}
.register #fregisterform #register_form ul input[type='radio']+label.managerlabel {}
.register #fregisterform #register_form ul input[type='radio']+label:after {border:0.0714vw solid #b3b3b3;left:50%;top: 0.0000vw;width:100%;height: 3.5714vw;box-shadow: none;transform:translateX(-50%);}
.register #fregisterform #register_form ul input[type='radio']:checked+label {background:transparent ;}
.register #fregisterform #register_form ul input[type='radio']:checked+label:after {border-background:transparent url('/images/ck_icon.png')no-repeat right 5% center;}


}

@media (max-width:1024px){
#wrapper_title {font-size:4.6875vw;padding:9.7656vw 0 5.8594vw;}
#container .register {margin:0 auto;padding:11.7188vw 0;}
/* 회원가입 입력 */
#register_form {background:#fff;margin-bottom:1.9531vw}
#register_form h2 {padding:0.0000vw;border-bottom:0.0000vw solid #dde7e9}
.register_form_inner {background:#f7f7f7;border:0.0000vw solid #dde7e9;border-radius:0.2930vw}
.register_form_inner ul {padding:0.0000vw}
.register_form_inner label.doctorlabel, .register_form_inner label.managerlabel { line-height:2.3438vw; font-size:1.5625vw; margin-right: 1%;}
.register_form_inner .doctor{margin-right: 5%;}
.register_form_inner label.inline {display:inline}

#fregisterform .cert_desc {}
#fregisterform .cert_req {margin-left:0.4883vw;line-height:3.4180vw;}
#fregisterform #msg_certify {margin:0.4883vw 0;padding:0.4883vw;border:0.0977vw solid #dbecff;background:#eaf4ff;text-align:center}
#fregisterform .frm_address {margin:0.4883vw 0 0}
#fregisterform #mb_addr3 {margin:0.4883vw 0 0;vertical-align:middle}
#fregisterform #mb_addr_jibeon {margin:0.4883vw 0 0}
#fregisterform .btn_confirm {text-align:center}
#fregisterform .form_01 div {margin:0 0 1.9531vw}
#fregisterform .captcha {margin:0.4883vw 0 0}
#fregisterform .reg_mb_img_file img {max-width:100%;height:auto}
#reg_mb_icon, #reg_mb_img {float:right}

.register .btn_confirm .btn_submit {background:#0c0c0c;border-color:#0c0c0c}

.register #fregisterform #register_form ul input[type='radio'] {width: 0.0977vw;height: 0.0977vw;padding: 0;margin: -0.0977vw;clip: rect(0, 0, 0, 0);border: 0;}
.register #fregisterform #register_form ul input[type='radio']+label{cursor:pointer;background:#fff;width:49.5%;height:4.8828vw;font-size:1.2695vw;line-height:4.8828vw;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;margin:0;}
.register #fregisterform #register_form ul input[type='radio']+label.managerlabel {}
.register #fregisterform #register_form ul input[type='radio']+label:after {border:0.0977vw solid #b3b3b3;left:50%;top: 0.0000vw;width:100%;height: 4.8828vw;box-shadow: none;transform:translateX(-50%);}
.register #fregisterform #register_form ul input[type='radio']:checked+label {background:transparent ;}
.register #fregisterform #register_form ul input[type='radio']:checked+label:after {border-background:transparent url('/images/ck_icon.png')no-repeat right 5% center;}

}

@media (max-width:768px){
#container{padding: 0 2.6042vw;}
#wrapper_title {font-size:6.2500vw;padding:13.0208vw 0 7.8125vw;}
#container .register {width:78.1250vw;margin:0 auto;padding:15.6250vw 0;}
/* 회원가입 입력 */
#register_form {background:#fff;margin-bottom:2.6042vw}
#register_form h2 {padding:0.0000vw;border-bottom:0.0000vw solid #dde7e9}
.register_form_inner {background:#f7f7f7;border:0.0000vw solid #dde7e9;border-radius:0.3906vw}
.register_form_inner ul {padding:0.0000vw}
.register_form_inner label.doctorlabel, .register_form_inner label.managerlabel { line-height:3.1250vw; font-size:2.0833vw; margin-right: 1%;}
.register_form_inner .doctor{margin-right: 3%;}
.register_form_inner label.inline {display:inline}

#fregisterform .cert_desc {}
#fregisterform .cert_req {margin-left:0.6510vw;line-height:4.5573vw;}
#fregisterform #msg_certify {margin:0.6510vw 0;padding:0.6510vw;border:0.1302vw solid #dbecff;background:#eaf4ff;text-align:center}
#fregisterform .frm_address {margin:0.6510vw 0 0}
#fregisterform #mb_addr3 {margin:0.6510vw 0 0;vertical-align:middle}
#fregisterform #mb_addr_jibeon {margin:0.6510vw 0 0}
#fregisterform .btn_confirm {text-align:center}
#fregisterform .form_01 div {margin:0 0 2.6042vw}
#fregisterform .captcha {margin:0.6510vw 0 0}
#fregisterform .reg_mb_img_file img {max-width:100%;height:auto}1
#reg_mb_icon, #reg_mb_img {float:right}

.register .btn_confirm .btn_submit {background:#0c0c0c;border-color:#0c0c0c}
.btn_close{color:#000;}


.register #fregisterform #register_form ul input[type='radio'] {width: 0.1302vw;height: 0.1302vw;padding: 0;margin: -0.1302vw;clip: rect(0, 0, 0, 0);border: 0;}
.register #fregisterform #register_form ul input[type='radio']+label{cursor:pointer;background:#fff;width:49.5%;height:6.5104vw;font-size:1.6927vw;line-height:6.5104vw;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;margin:0;}
.register #fregisterform #register_form ul input[type='radio']+label.managerlabel {}
.register #fregisterform #register_form ul input[type='radio']+label:after {border:0.1302vw solid #b3b3b3;left:50%;top: 0.0000vw;width:100%;height: 6.5104vw;box-shadow: none;transform:translateX(-50%);}
.register #fregisterform #register_form ul input[type='radio']:checked+label {background:transparent ;}
.register #fregisterform #register_form ul input[type='radio']:checked+label:after {border-background:transparent url('/images/ck_icon.png')no-repeat right 5% center;}


}

@media (max-width:480px){
#wrapper_title {font-size:10.0000vw;padding:20.8333vw 0 12.5000vw;}
#container .register {width:100%;margin:0 auto;padding:0 4.1667vw;padding:25.0000vw 0;}
/* 회원가입 입력 */
#register_form {background:#fff;margin-bottom:4.1667vw}
#register_form h2 {padding:0.0000vw;border-bottom:0.0000vw solid #dde7e9}
.register_form_inner {background:#f7f7f7;border:0.0000vw solid #dde7e9;border-radius:0.6250vw}
.register_form_inner ul {padding:0.0000vw}
.register_form_inner label.doctorlabel, .register_form_inner label.managerlabel { line-height:5.0000vw; font-size:3.3333vw; margin-right: 1%;}
.register_form_inner .doctor{margin-right: 3%;}
.register_form_inner label.inline {display:inline}

#fregisterform .cert_desc {}
#fregisterform .cert_req {margin-left:1.0417vw;line-height:7.2917vw;}
#fregisterform #msg_certify {margin:1.0417vw 0;padding:1.0417vw;border:0.2083vw solid #dbecff;background:#eaf4ff;text-align:center}
#fregisterform .frm_address {margin:1.0417vw 0 0}
#fregisterform #mb_addr3 {margin:1.0417vw 0 0;vertical-align:middle}
#fregisterform #mb_addr_jibeon {margin:1.0417vw 0 0}
#fregisterform .btn_confirm {text-align:center}
#fregisterform .form_01 div {margin:0 0 4.1667vw}
#fregisterform .captcha {margin:1.0417vw 0 0}
#fregisterform .reg_mb_img_file img {max-width:100%;height:auto}
#reg_mb_icon, #reg_mb_img {float:right}

.register .btn_confirm .btn_submit {background:#0c0c0c;border-color:#0c0c0c}

.register #fregisterform #register_form ul input[type='radio'] {width: 0.2083vw;height: 0.2083vw;padding: 0;margin: -0.2083vw;clip: rect(0, 0, 0, 0);border: 0;}
.register #fregisterform #register_form ul input[type='radio']+label{cursor:pointer;background:#fff;width:49.5%;height:10.4167vw;font-size:2.7083vw;line-height:10.4167vw;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;margin:0;}
.register #fregisterform #register_form ul input[type='radio']+label.managerlabel {}
.register #fregisterform #register_form ul input[type='radio']+label:after {border:0.2083vw solid #b3b3b3;left:50%;top: 0.0000vw;width:100%;height: 10.4167vw;box-shadow: none;transform:translateX(-50%);}
.register #fregisterform #register_form ul input[type='radio']:checked+label {background:transparent ;}
.register #fregisterform #register_form ul input[type='radio']:checked+label:after {border-background:transparent url('/images/ck_icon.png')no-repeat right 5% center;}


}

</style>
<!-- 회원정보 입력/수정 시작 { -->

<div class="register">


<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" class="regsubmit">



<?php

$mb_5 = $agree;
$mb_6 = $agree2;
$mb_7 = $mb_3;
$mb_8 = $mb_4;


?>

<input type="hidden" value="<?php echo $mb_5 ?>" name="mb_5">  <!-- 회원가입 약관  -->
<input type="hidden" value="<?php echo $mb_6 ?>" name="mb_6">  <!-- 개인정보수집  -->
<input type="hidden" value="<?php echo $mb_7 ?>" name="mb_7">  <!-- 마케팅 목정의 개인  -->
<input type="hidden" value="<?php echo $mb_8 ?>" name="mb_8">  <!-- 광고성정보 수신동의  -->


    
    
    	<input type="hidden" value="genuine" name="bo_table">
		<input type="hidden" id="wr_10" name="wr_10" value="1" />
                    
    	
                    
    
    
	<input type="hidden" name="w" value="<?php echo $w ?>">
	<input type="hidden" name="next" value="s">
	<input type="hidden" name="url" value="<?php echo $urlencode ?>">
	<input type="hidden" name="agree" value="<?php echo $agree ?>">
	<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
	<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
	<input type="hidden" name="cert_no" value="">
	<input type="hidden" name="cpnum" value="0">
	<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>

	<?php //if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
	<!-- <input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
	<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>"> -->
	<?php //}  ?>
	
	<div id="register_form" class="form_01">   
	    <div class="register_form_inner">
	        <h2>기본 정보 입력</h2>
	        <ul>
				<li>
	                <label for="reg_mb_1"><!-- 사업자명 --></label>
	                <input type="text" id="reg_mb_1" name="mb_1" value="<?php echo get_text($member['mb_1']) ?>" <?php echo $required ?> class="frm_input full_input <?php echo $required ?> " size="10" placeholder="사업자명">
	            </li>
				
				<li>
	                <label for="reg_mb_2"><!-- 사업자 등록번호 기재 --></label>
	                <input type="text" id="reg_mb_2" name="mb_2" value="<?php echo get_text($member['mb_2']) ?>" <?php echo $required ?> class="frm_input <?php echo $required ?> " size="10" maxlength="10" placeholder="사업자 등록번호 기재">
					<?php if($w == ''){?>
					<a href="javascript:;" class="checkBtn frm_input">중복확인</a>
					
					<script>
						 $(document).ready(function() {
							var mb_2;
							// #reg_mb_2 값이 변경될 때마다 mb_2 업데이트
							$("#reg_mb_2").on('input', function() {
								updateMb2Value();
							});

							function updateMb2Value() {
								mb_2 = $("#reg_mb_2").val();
								//console.log(mb_2);
							}

							// 초기화 시 한 번 호출
							updateMb2Value();

							$(".checkBtn").click(function() {
								updateMb2Value();
								if(mb_2 == ''){
									alert('사업자번호를 입력하세요');
									return false;
								}
								$.ajax({
									type: "POST",
									url: "../cpnum_check.php",
									data: {mb_2: mb_2},
									success: function(response) {
										const replacedStr = response.replace(/\\n/g, '\n'); // '\\n'을 '\n'으로 치환
										const parts = replacedStr.split('\n'); // '\n'으로 분할하여 배열에 담기

										alert(parts[0]); // alert로 출력
										// cpnum 인풋 필드의 값을 설정
										$('input[name="cpnum"]').val(parts[1]);
									}
								});
							});
						});
					</script>
	            </li>
				<?php }?>

				<li class="">
	                <label for="reg_mb_img" class="frm_label">
	                	사업자 등록증 사진 첨부
	                	<button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                	<span class="tooltip">사업자 등록증 사진을 첨부해주세요<br>
	                    gif, jpg, png파일만 가능하며 용량 <?php //echo number_format($config['cf_member_img_size']) ?>10mb 이하만 등록됩니다.</span>
	                </label>
	                <input type="file" name="mb_img" id="reg_mb_img" class="frm_input full_input <?php echo $required ?>">
	
	                <?php if ($w == 'u' && file_exists($mb_img_path)) {  ?>
	                <img src="<?php echo $mb_img_url ?>" alt="회원이미지">
	                <input type="checkbox" name="del_mb_img" value="1" id="del_mb_img" class="frm_input full_input <?php echo $required ?>"> 
	                <label for="del_mb_img" class="inline">삭제</label>
	                <?php }  ?>
	            
	            </li>

	            <li>
	                <label for="reg_mb_id">
	                    <!-- 아이디 (필수) -->
	                    <!-- <button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                    <span class="tooltip">영문자, 숫자, _ 만 입력 가능. 최소 3자이상 입력하세요.</span> -->
	                </label>
	                <input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" <?php echo $required ?> <?php echo $readonly ?> class="frm_input full_input <?php echo $required ?> <?php echo $readonly ?>" minlength="3" maxlength="20" placeholder="아이디">
	                <span id="msg_mb_id"></span>
	            </li>
	            <li class="left_input margin_input">
	                <label for="reg_mb_password"><!-- 비밀번호 (필수) --></label>
	                <input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> class="frm_input full_input <?php echo $required ?>" minlength="3" maxlength="20" placeholder="비밀번호">
	            </li>
	            <li class="left_input">
	                <label for="reg_mb_password_re"><!-- 비밀번호 확인 (필수) --></label>
	                <input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> class="frm_input full_input <?php echo $required ?>" minlength="3" maxlength="20" placeholder="비밀번호 확인">
	            </li>
				<li>
	                <label for="reg_mb_name"><!-- 이름 (필수) --><?php //echo $desc_name ?></label>
	                <input type="text" id="reg_mb_name" name="mb_name" value="<?php echo get_text($member['mb_name']) ?>" <?php echo $required ?> <?php echo $name_readonly; ?> class="frm_input full_input <?php echo $required ?> <?php echo $name_readonly ?>" size="10" placeholder="이름">
	            </li>
	            <!-- <?php if ($req_nick) {  ?>
	            <li>
	                <label for="reg_mb_nick">
	                	<button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                							<span class="tooltip">공백없이 한글,영문,숫자만 입력 가능 (한글2자, 영문4자 이상)<br> 닉네임을 바꾸시면 앞으로 <?php echo (int)$config['cf_nick_modify'] ?>일 이내에는 변경 할 수 없습니다.</span>
	                </label>
	                
	                                <input type="hidden" name="mb_nick_default" value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>">
	                                <input type="text" name="mb_nick" value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>" id="reg_mb_nick" required class="frm_input required nospace full_input" size="10" maxlength="20" placeholder="닉네임">
	                                <span id="msg_mb_nick"></span>
	            </li>
	            <?php }  ?> -->

				<!-- <li>
					<label for="reg_mb_3_1" class="" style="display: inline-block;">병원</label>
					<input type="radio" name="mb_3" value="병원" id="reg_mb_3_1" <?php echo $required ?>>
				
					<label for="reg_mb_3_2" class="" style="display: inline-block;">영업실장</label>
					<input type="radio" name="mb_3" value="영업실장" id="reg_mb_3_2" <?php echo $required ?>>
					            </li> -->
				
				<li>
	            <?php if ($config['cf_use_tel']) {  ?>
	            
	                <label for="reg_mb_tel">전화번호<?php if ($config['cf_req_tel']) { ?> (필수)<?php } ?></label>
	                <input type="text" name="mb_tel" value="<?php echo get_text($member['mb_tel']) ?>" id="reg_mb_tel" <?php echo $config['cf_req_tel']?"required":""; ?> class="frm_input full_input <?php echo $config['cf_req_tel']?"required":""; ?>" maxlength="20" placeholder="전화번호">
	            <?php }  ?>
				</li>
				<li>
	            <?php if ($config['cf_use_hp'] || ($config["cf_cert_use"] && ($config['cf_cert_hp'] || $config['cf_cert_simple']))) {  ?>
	                <label for="reg_mb_hp"><!-- 휴대폰번호 --><?php //if (!empty($hp_required)) { ?> <!-- (필수) --><?php //} ?><?php echo $desc_phone ?></label>
	                
	                <input type="text" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo $hp_required; ?> <?php echo $hp_readonly; ?> class="frm_input full_input <?php echo $hp_required; ?> <?php echo $hp_readonly; ?>" maxlength="11" placeholder="휴대폰번호">
	                <?php if ($config['cf_cert_use'] && ($config['cf_cert_hp'] || $config['cf_cert_simple'])) { ?>
	                <input type="hidden" name="old_mb_hp" value="<?php echo get_text($member['mb_hp']) ?>">
	                <?php } ?>
	            <?php }  ?>
	            </li>

				<li>
	                <label for="reg_mb_email"><!-- E-mail (필수) -->
	                
	                <?php if ($config['cf_use_email_certify']) {  ?>
	                <button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
					<span class="tooltip">
	                    <?php if ($w=='') { echo "E-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; }  ?>
	                    <?php if ($w=='u') { echo "E-mail 주소를 변경하시면 다시 인증하셔야 합니다."; }  ?>
	                </span>
	                <?php }  ?>
					</label>

	                <input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
	                <input type="text" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required class="frm_input email full_input required" size="70" maxlength="100" placeholder="E-mail">
	            </li>


	        </ul>
	    </div>

		<div class="tbl_frm01 tbl_wrap register_form_inner">
	        <h2>구분</h2>
			<ul>
				<li>
					
					<input type="radio" name="mb_10" value="DOCTOR" <?php if($member['mb_10']=='DOCTOR'){ echo 'checked'; } ?> id="reg_mb_10_1" <?php echo $required ?> class="doctor">
					<label for="reg_mb_10_1" class="doctorlabel" style="">DOCTOR</label>

					
					<input type="radio" name="mb_10" value="MANAGER" <?php if($member['mb_10']=='MANAGER'){ echo 'checked'; } ?> id="reg_mb_10_2" <?php echo $required ?> class="manager">
					<label for="reg_mb_10_2" class="managerlabel" style="">MANAGER</label>
				</li>
			</ul>
		</div>
	
	    <div class="tbl_frm01 tbl_wrap register_form_inner">
	        <h2>사업장주소</h2>
	        <ul>
	            <?php if ($config['cf_use_addr']) { ?>
	            <li>
	            	<!-- <label>주소 (필수)</label> -->
					<?php //if ($config['cf_req_addr']) { ?> <!-- (필수) --><?php //}  ?>
	                <label for="reg_mb_zip" class="sound_only">우편번호<?php echo $config['cf_req_addr']?' (필수)':''; ?></label>
	                <input type="text" name="mb_zip" value="<?php echo $member['mb_zip1'].$member['mb_zip2']; ?>" id="reg_mb_zip" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input twopart_input <?php echo $config['cf_req_addr']?"required":""; ?>" size="5" maxlength="6"  placeholder="우편번호">
	                <button type="button" class="btn_frmline" onclick="win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');" style="background:#333;">주소 검색</button><br>
	                <input type="text" name="mb_addr1" value="<?php echo get_text($member['mb_addr1']) ?>" id="reg_mb_addr1" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input frm_address full_input <?php echo $config['cf_req_addr']?"required":""; ?>" size="50"  placeholder="기본주소">
	                <label for="reg_mb_addr1" class="sound_only">기본주소<?php echo $config['cf_req_addr']?' (필수)':''; ?></label><br>
	                <input type="text" name="mb_addr2" value="<?php echo get_text($member['mb_addr2']) ?>" id="reg_mb_addr2" class="frm_input frm_address full_input" size="50" placeholder="상세주소">
	                <label for="reg_mb_addr2" class="sound_only">상세주소</label>
	                <br>
	                <input type="text" name="mb_addr3" value="<?php echo get_text($member['mb_addr3']) ?>" id="reg_mb_addr3" class="frm_input frm_address full_input" size="50" readonly="readonly" placeholder="참고항목">
	                <label for="reg_mb_addr3" class="sound_only">참고항목</label>
	                <input type="hidden" name="mb_addr_jibeon" value="<?php echo get_text($member['mb_addr_jibeon']); ?>">
	            </li>
	            <?php }  ?>
	        </ul>
	    </div>
	
	    <div class="tbl_frm01 tbl_wrap register_form_inner" >
	        <h2 style="display:none;">기타 개인설정</h2>
	        <ul>
	            <?php if ($config['cf_use_signature']) {  ?>
	            <li>
	                <label for="reg_mb_signature">서명<?php if ($config['cf_req_signature']){ ?> (필수)<?php } ?></label>
	                <textarea name="mb_signature" id="reg_mb_signature" <?php echo $config['cf_req_signature']?"required":""; ?> class="<?php echo $config['cf_req_signature']?"required":""; ?>"   placeholder="서명"><?php echo $member['mb_signature'] ?></textarea>
	            </li>
	            <?php }  ?>
	
	            <?php if ($config['cf_use_profile']) {  ?>
	            <li>
	                <label for="reg_mb_profile">자기소개</label>
	                <textarea name="mb_profile" id="reg_mb_profile" <?php echo $config['cf_req_profile']?"required":""; ?> class="<?php echo $config['cf_req_profile']?"required":""; ?>" placeholder="자기소개"><?php echo $member['mb_profile'] ?></textarea>
	            </li>
	            <?php }  ?>
	
	            <?php if ($config['cf_use_member_icon'] && $member['mb_level'] >= $config['cf_icon_level']) {  ?>
	            <li>
	                <label for="reg_mb_icon" class="frm_label">
	                	회원아이콘
	                	<button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                	<span class="tooltip">이미지 크기는 가로 <?php echo $config['cf_member_icon_width'] ?>픽셀, 세로 <?php echo $config['cf_member_icon_height'] ?>픽셀 이하로 해주세요.<br>
gif, jpg, png파일만 가능하며 용량 <?php echo number_format($config['cf_member_icon_size']) ?>바이트 이하만 등록됩니다.</span>
	                </label>
	                <input type="file" name="mb_icon" id="reg_mb_icon">
	
	                <?php if ($w == 'u' && file_exists($mb_icon_path)) {  ?>
	                <img src="<?php echo $mb_icon_url ?>" alt="회원아이콘">
	                <input type="checkbox" name="del_mb_icon" value="1" id="del_mb_icon">
	                <label for="del_mb_icon" class="inline">삭제</label>
	                <?php }  ?>
	            
	            </li>
	            <?php }  ?>
	
	            <?php if ($member['mb_level'] >= $config['cf_icon_level'] && $config['cf_member_img_size'] && $config['cf_member_img_width'] && $config['cf_member_img_height']) {  ?>
	            <li class="reg_mb_img_file">
	                <label for="reg_mb_img" class="frm_label">
	                	회원이미지
	                	<button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                	<span class="tooltip">이미지 크기는 가로 <?php echo $config['cf_member_img_width'] ?>픽셀, 세로 <?php echo $config['cf_member_img_height'] ?>픽셀 이하로 해주세요.<br>
	                    gif, jpg, png파일만 가능하며 용량 <?php echo number_format($config['cf_member_img_size']) ?>바이트 이하만 등록됩니다.</span>
	                </label>
	                <input type="file" name="mb_img" id="reg_mb_img">
	
	                <?php if ($w == 'u' && file_exists($mb_img_path)) {  ?>
	                <img src="<?php echo $mb_img_url ?>" alt="회원이미지">
	                <input type="checkbox" name="del_mb_img" value="1" id="del_mb_img">
	                <label for="del_mb_img" class="inline">삭제</label>
	                <?php }  ?>
	            
	            </li>
	            <?php } ?>

	            <li class="chk_box" style="display:none;">
		        	<input type="checkbox" name="mb_mailling" value="1" id="reg_mb_mailling" <?php echo ($w=='' || $member['mb_mailling'])?'checked':''; ?> class="selec_chk">
		            <label for="reg_mb_mailling">
		            	<span></span>
		            	<b class="sound_only">메일링서비스</b>
		            </label>
		            <span class="chk_li">정보 메일을 받겠습니다.</span>
		        </li>
	
				<?php if ($config['cf_use_hp']) { ?>
		        <li class="chk_box" style="display:none;">
		            <input type="checkbox" name="mb_sms" value="1" id="reg_mb_sms" <?php echo ($w=='' || $member['mb_sms'])?'checked':''; ?> class="selec_chk">
		        	<label for="reg_mb_sms">
		            	<span></span>
		            	<b class="sound_only">SMS 수신여부</b>
		            </label>        
		            <span class="chk_li">휴대폰 문자메세지를 받겠습니다.</span>
		        </li>
		        <?php } ?>
	
		        <?php if (isset($member['mb_open_date']) && $member['mb_open_date'] <= date("Y-m-d", G5_SERVER_TIME - ($config['cf_open_modify'] * 86400)) || empty($member['mb_open_date'])) { // 정보공개 수정일이 지났다면 수정가능 ?>
		        <li class="chk_box" style="display:none;">
		            <input type="checkbox" name="mb_open" value="1" id="reg_mb_open" <?php echo ($w=='' || $member['mb_open'])?'checked':''; ?> class="selec_chk">
		      		<label for="reg_mb_open">
		      			<span></span>
		      			<b class="sound_only">정보공개</b>
		      		</label>      
		            <span class="chk_li">다른분들이 나의 정보를 볼 수 있도록 합니다.</span>
		            <button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
		            <span class="tooltip">
		                정보공개를 바꾸시면 앞으로 <?php echo (int)$config['cf_open_modify'] ?>일 이내에는 변경이 안됩니다.
		            </span>
		            <input type="hidden" name="mb_open_default" value="<?php echo $member['mb_open'] ?>"> 
		        </li>		        
		        <?php } else { ?>
	            <li style="display:none;">
	                정보공개
	                <input type="hidden" name="mb_open" value="<?php echo $member['mb_open'] ?>">
	                <button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                <span class="tooltip">
	                    정보공개는 수정후 <?php echo (int)$config['cf_open_modify'] ?>일 이내, <?php echo date("Y년 m월 j일", isset($member['mb_open_date']) ? strtotime("{$member['mb_open_date']} 00:00:00")+$config['cf_open_modify']*86400:G5_SERVER_TIME+$config['cf_open_modify']*86400); ?> 까지는 변경이 안됩니다.<br>
	                    이렇게 하는 이유는 잦은 정보공개 수정으로 인하여 쪽지를 보낸 후 받지 않는 경우를 막기 위해서 입니다.
	                </span>
	                
	            </li>
	            <?php }  ?>
	
	            <?php
	            //회원정보 수정인 경우 소셜 계정 출력
	            if( $w == 'u' && function_exists('social_member_provider_manage') ){
	                social_member_provider_manage();
	            }
	            ?>
                
                <li>
                
                <h2>정품등록("선택사항")</h2>
                
               	<select name="input1" placeholder="제품을 선택하세요." class="full_input frm_input frm_address">
					<option value="reepot">reepot</option>
					<option value="curas hybrid">curas hybrid</option>
					<option value="secret MAX">secret MAX</option>
					<option value="fortra">fortra</option>
					<option value="secret DUO">secret DUO</option>
					<option value="secret RF">secret RF</option>
					<option value="fraxis">fraxis</option>
					<option value="fraxis DUO">fraxis DUO</option>
					<option value="n.core prime">n.core prime</option>
					<option value="n.core 3D">n.core 3D</option>
					<option value="pento">pento</option>
					<option value="veloce">veloce</option>
					<option value="hyzer me">hyzer me</option>
					<option value="acutron">acutron</option>
					<option value="redicapture">redicapture</option>
					<option value="healer1064">healer1064</option>
					<option value="vikini">vikini</option>
					<option value="velux">velux</option>
					<option value="ultra beaujet">ultra beaujet</option>
					<option value="i-graft">i-graft</option>
					<option value="cure.J">cure.J</option>
				</select>
                
               <input type="text" name="inputtext1" id="input1" value="" class="inputtext full_input frm_input frm_address" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;">              
                
                
                </li>
                
                
	            
	            <?php if ($w == "" && $config['cf_use_recommend']) {  ?>
	            <li>
	                <label for="reg_mb_recommend" class="sound_only">추천인아이디</label>
	                <input type="text" name="mb_recommend" id="reg_mb_recommend" class="frm_input" placeholder="추천인아이디">
	            </li>
	            <?php }  ?>
	
	            <li class="is_captcha_use">
	                자동등록방지
	                <?php echo captcha_html(); ?>
	            </li>
	        </ul>
	    </div>
	</div>
	<div class="btn_confirm">
		<?php if($w==''){ ?>
	    <button type="submit" id="btn_submit" class="btn_close" accesskey="s" name="action" value="survey" style="background:#333; color:#fff;">
			<a href="https://forms.gle/wyYwS7TfJ5y12Bje9" target="_blank" style="display:block;width:100%;height:100%;color:#fff;line-height:48px;">설문조사 하기</a>
		</button>
	    <button type="submit" id="btn_submit" class="btn_submit" accesskey="s" name="action" value="complete" style="background:#fff; color:#333;">회원가입 완료</button>
		<!-- <h4 style="clear:both; text-align:left; color:red; font-weight:600; font-size:1.3em;">※ 설문내용 작성 시 10만원 상당의 적립금을 드립니다.</h4> -->
		<?php }else{ ?>
		<a href="<?php echo G5_URL ?>" class="btn_close">취소</a>
		<button type="submit" id="btn_submit" class="btn_submit" accesskey="s">정보수정</button>
		<?php } ?>
	</div>
	</form>
</div>


<script>
$(function() {
    $("#reg_zip_find").css("display", "inline-block");
    var pageTypeParam = "pageType=register";

	<?php if($config['cf_cert_use'] && $config['cf_cert_simple']) { ?>
	// 이니시스 간편인증
	var url = "<?php echo G5_INICERT_URL; ?>/ini_request.php";
	var type = "";    
    var params = "";
    var request_url = "";

	$(".win_sa_cert").click(function() {
		if(!cert_confirm()) return false;
		type = $(this).data("type");
        params = "?directAgency=" + type + "&" + pageTypeParam;
        request_url = url + params;
        call_sa(request_url);
	});
    <?php } ?>

    <?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
    // 아이핀인증
    var params = "";
    $("#win_ipin_cert").click(function() {
		if(!cert_confirm()) return false;
        params = "?" + pageTypeParam;
        var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php"+params;
        certify_win_open('kcb-ipin', url);
        return;
    });

    <?php } ?>
    <?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
    // 휴대폰인증
    var params = "";
    $("#win_hp_cert").click(function() {
		if(!cert_confirm()) return false;
        params = "?" + pageTypeParam;
        <?php     
        switch($config['cf_cert_hp']) {
            case 'kcb':                
                $cert_url = G5_OKNAME_URL.'/hpcert1.php';
                $cert_type = 'kcb-hp';
                break;
            case 'kcp':
                $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
                $cert_type = 'kcp-hp';
                break;
            case 'lg':
                $cert_url = G5_LGXPAY_URL.'/AuthOnlyReq.php';
                $cert_type = 'lg-hp';
                break;
            default:
                echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
                echo 'return false;';
                break;
        }
        ?>
        
        certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>"+params);
        return;
    });
    <?php } ?>
});

$(document).on("keyup", "input[name='mb_id']", function() {
	$(this).val( $(this).val().replace(/[^0-9a-z_]+/i,"") );
});

$(document).on("keyup", "input[name='mb_1']", function() {
	$(this).val( $(this).val().replace(/[^ㄱ-힣]/gi,"") );
});

$(document).on("keyup", "input[name='mb_2']", function() {
	$(this).val( $(this).val().replace(/[^0-9]/gi,"") );
});

$(document).on("keyup", "input[name='mb_name']", function() {
	$(this).val( $(this).val().replace(/[^ㄱ-힣]/gi,"") );
});

$(document).on("keyup", "input[name='mb_hp']", function() {
	$(this).val( $(this).val().replace(/[^0-9]/gi,"") );
});

$(document).on("keyup", "input[name='mb_email']", function() {
	$(this).val( $(this).val().replace(/[^a-z0-9@_.-]/gi,"") );
});

$(document).on("keyup", "input[name='mb_recommend']", function() {
	$(this).val( $(this).val().replace(/[^0-9a-z_.-]/gi,"") );
});

</script>

<?php if($w==''){ ?>
<script>
/*
	$(".btn_close").click(function(){

		$(".regsubmit").attr("action","/bbs/register_form_update2.php");

	});
*/
</script>
<?php } ?>

<script>
// submit 최종 폼체크
function fregisterform_submit(f)
{	
	<?php if($w == ''){?>
	if (f.cpnum.value == 0) {
        alert("사업자번호 중복확인이 필요합니다.");
        f.mb_2.focus();
        return false;
    }
	<?php } ?>

    // 회원아이디 검사
    if (f.w.value == "") {
        var msg = reg_mb_id_check();
        if (msg) {
            alert(msg);
            f.mb_id.select();
            return false;
        }
    }

    if (f.w.value == "") {
        if (f.mb_password.value.length < 3) {
            alert("비밀번호를 3글자 이상 입력하십시오.");
            f.mb_password.focus();
            return false;
        }
    }
	
	

    if (f.mb_password.value != f.mb_password_re.value) {
        alert("비밀번호가 같지 않습니다.");
        f.mb_password_re.focus();
        return false;
    }

    if (f.mb_password.value.length > 0) {
        if (f.mb_password_re.value.length < 3) {
            alert("비밀번호를 3글자 이상 입력하십시오.");
            f.mb_password_re.focus();
            return false;
        }
    }

    // 이름 검사
    if (f.w.value=="") {
        if (f.mb_name.value.length < 1) {
            alert("이름을 입력하십시오.");
            f.mb_name.focus();
            return false;
        }

        /*
        var pattern = /([^가-힣\x20])/i;
        if (pattern.test(f.mb_name.value)) {
            alert("이름은 한글로 입력하십시오.");
            f.mb_name.select();
            return false;
        }
        */
    }

    <?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
    // 본인확인 체크
    if(f.cert_no.value=="") {
        alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
        return false;
    }
    <?php } ?>

    // 닉네임 검사
	/*
    if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
        var msg = reg_mb_nick_check();
        if (msg) {
            alert(msg);
            f.reg_mb_nick.select();
            return false;
        }
    }
	*/

    // E-mail 검사
    if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
        var msg = reg_mb_email_check();
        if (msg) {
            alert(msg);
            f.reg_mb_email.select();
            return false;
        }
    }

    <?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
    // 휴대폰번호 체크
    var msg = reg_mb_hp_check();
    if (msg) {
        alert(msg);
        f.reg_mb_hp.select();
        return false;
    }
    <?php } ?>

    if (typeof f.mb_icon != "undefined") {
        if (f.mb_icon.value) {
            if (!f.mb_icon.value.toLowerCase().match(/.(gif|jpe?g|png)$/i)) {
                alert("회원아이콘이 이미지 파일이 아닙니다.");
                f.mb_icon.focus();
                return false;
            }
        }
    }

    if (typeof f.mb_img != "undefined") {
        if (f.mb_img.value) {
            if (!f.mb_img.value.toLowerCase().match(/.(gif|jpe?g|png)$/i)) {
                alert("회원이미지가 이미지 파일이 아닙니다.");
                f.mb_img.focus();
                return false;
            }
        }
    }

    if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
        if (f.mb_id.value == f.mb_recommend.value) {
            alert("본인을 추천할 수 없습니다.");
            f.mb_recommend.focus();
            return false;
        }

        var msg = reg_mb_recommend_check();
        if (msg) {
            alert(msg);
            f.mb_recommend.select();
            return false;
        }
    }

    <?php echo chk_captcha_js();  ?>

    document.getElementById("btn_submit").disabled = "disabled";

	return true;
    
}

jQuery(function($){
	//tooltip
    $(document).on("click", ".tooltip_icon", function(e){
        $(this).next(".tooltip").fadeIn(400).css("display","inline-block");
    }).on("mouseout", ".tooltip_icon", function(e){
        $(this).next(".tooltip").fadeOut();
    });
});

</script>

<!-- } 회원정보 입력/수정 끝 -->