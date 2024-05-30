<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

include_once(G5_PATH.'/board_top.php');

?>

<style>
#wrapper_title {display: none;}
.mbskin {position: relative;margin: 100px auto 0;width: 610px;text-align: center;padding-bottom:220px;}
.mbskin .mbskin_box {border:0;}
.title_name {font-size: 60px;font-weight: 700;margin-bottom:60px; color:#b1b4b9;}
.login_tit {font-size: 34px;font-weight: 400;margin-bottom: 20px;}
.join {width: 100%;line-height:45px;height: 45px;font-weight: bold;font-size: 1.25em;display: block;border:1px solid #eaeaea;margin-bottom:15px;color:#606060;}


/* 로그인 */
#mb_login {}
#mb_login h1 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#login_fs {padding:0px}
#mb_login #login_fs .frm_input {margin:0 0 10px}
#mb_login #login_fs .btn_submit {margin:0 0 5px;background:#b1b4b9;border:1px solid #b1b4b9;height: 45px;}

#login_info {}
#login_info:after {display:block;visibility:hidden;clear:both;content:""}
#login_info .login_if_auto {float:left}
#login_info .login_if_auto label {vertical-align:baseline;padding-left:5px}
#login_info .login_if_lpl {float:right}
#login_info .login_if_lpl a {margin-left:10px;}
#login_password_lost {display:inline-block;border:1px solid #d5d9dd;color:#3a8afd;border-radius:2px;padding:2px 5px;line-height:20px}

#mb_login_notmb {margin:30px auto;padding:20px 30px}
#mb_login_notmb h2 {font-size:1.25em;margin:20px 0 10px}
#guest_privacy {border:1px solid #ccc;text-align:left;line-height:1.6em;color:#666;background:#fafafa;padding:10px;height:150px;margin:10px 0;overflow-y:auto}
#mb_login_notmb .btn_submit {display:block;text-align:center;line-height:45px}

#mb_login_od_wr {margin:30px auto;padding:20px 30px}
#mb_login_od_wr h2 {font-size:1.25em;margin:20px 0 10px}
#mb_login_od_wr .frm_input {margin:10px 0 0}
#mb_login_od_wr p {background:#f3f3f3;margin:20px 0 0;padding:15px 20px;line-height:1.5em}

#mb_login #sns_login {margin-top:0;border-color:#edeaea;padding:25px}
#mb_login #sns_login:after {display:block;visibility:hidden;clear:both;content:""}
#mb_login #sns_login h3 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#mb_login #sns_login .sns-wrap {margin:0 !important}
#mb_login #sns_login .sns-icon {width:49% !important;float:left !important}
#mb_login #sns_login .sns-icon:nth-child(odd) {margin-right:2%}
#mb_login #sns_login .txt {font-size:0.95em;padding-left:5px !important;border-left:0 !important}

@media (max-width:1760px){
#wrapper_title {}
.mbskin {margin: 5.6818vw auto 0;width: 34.6591vw;padding-bottom:12.5000vw;}
.mbskin .mbskin_box {border:0;}
.title_name {font-size: 3.4091vw;margin-bottom:3.4091vw;}
.login_tit {font-size: 1.9318vw;margin-bottom: 1.1364vw;}
.join {width: 100%;line-height:2.5568vw;height: 2.5568vw;font-size: 1.25em;border:0.0568vw solid #eaeaea;margin-bottom:0.8523vw;}


/* 로그인 */
#mb_login {}
#mb_login h1 {font-size:0;line-height:0;overflow:hidden}
#login_fs {padding:0.0000vw}
#mb_login #login_fs .frm_input {margin:0 0 0.5682vw}
#mb_login #login_fs .btn_submit {margin:0 0 0.2841vw;background:#b1b4b9;border:0.0568vw solid #b1b4b9;height: 2.5568vw;}

#login_info {}
#login_info:after {visibility:hidden;clear:both;content:""}
#login_info .login_if_auto {float:left}
#login_info .login_if_auto label {padding-left:0.2841vw}
#login_info .login_if_lpl {float:right}
#login_info .login_if_lpl a {margin-left:0.5682vw;}
#login_password_lost {border:0.0568vw solid #d5d9dd;border-radius:0.1136vw;padding:0.1136vw 0.2841vw;line-height:1.1364vw}

#mb_login_notmb {margin:1.7045vw auto;padding:1.1364vw 1.7045vw}
#mb_login_notmb h2 {font-size:1.25em;margin:1.1364vw 0 0.5682vw}
#guest_privacy {border:0.0568vw solid #ccc;line-height:1.6em;background:#fafafa;padding:0.5682vw;height:8.5227vw;margin:0.5682vw 0;overflow-y:auto}
#mb_login_notmb .btn_submit {line-height:2.5568vw}

#mb_login_od_wr {margin:1.7045vw auto;padding:1.1364vw 1.7045vw}
#mb_login_od_wr h2 {font-size:1.25em;margin:1.1364vw 0 0.5682vw}
#mb_login_od_wr .frm_input {margin:0.5682vw 0 0}
#mb_login_od_wr p {background:#f3f3f3;margin:1.1364vw 0 0;padding:0.8523vw 1.1364vw;line-height:1.5em}

#mb_login #sns_login {margin-top:0;border-padding:1.4205vw}
#mb_login #sns_login:after {visibility:hidden;clear:both;content:""}
#mb_login #sns_login h3 {font-size:0;line-height:0;overflow:hidden}
#mb_login #sns_login .sns-wrap {margin:0 !important}
#mb_login #sns_login .sns-icon {width:49% !important;float:left !important}
#mb_login #sns_login .sns-icon:nth-child(odd) {margin-right:2%}
#mb_login #sns_login .txt {font-size:0.95em;padding-left:0.2841vw !important;border-left:0 !important}

}

@media (max-width:1600px){
#wrapper_title {}
.mbskin {margin: 6.2500vw auto 0;width: 38.1250vw;padding-bottom:13.7500vw;}
.mbskin .mbskin_box {border:0;}
.title_name {font-size: 3.7500vw;margin-bottom:3.7500vw;}
.login_tit {font-size: 2.1250vw;margin-bottom: 1.2500vw;}
.join {width: 100%;line-height:2.8125vw;height: 2.8125vw;font-size: 1.25em;border:0.0625vw solid #eaeaea;margin-bottom:0.9375vw;}


/* 로그인 */
#mb_login {}
#mb_login h1 {font-size:0;line-height:0;overflow:hidden}
#login_fs {padding:0.0000vw}
#mb_login #login_fs .frm_input {margin:0 0 0.6250vw}
#mb_login #login_fs .btn_submit {margin:0 0 0.3125vw;background:#b1b4b9;border:0.0625vw solid #b1b4b9;height: 2.8125vw;}

#login_info {}
#login_info:after {visibility:hidden;clear:both;content:""}
#login_info .login_if_auto {float:left}
#login_info .login_if_auto label {padding-left:0.3125vw}
#login_info .login_if_lpl {float:right}
#login_info .login_if_lpl a {margin-left:0.6250vw;}
#login_password_lost {border:0.0625vw solid #d5d9dd;border-radius:0.1250vw;padding:0.1250vw 0.3125vw;line-height:1.2500vw}

#mb_login_notmb {margin:1.8750vw auto;padding:1.2500vw 1.8750vw}
#mb_login_notmb h2 {font-size:1.25em;margin:1.2500vw 0 0.6250vw}
#guest_privacy {border:0.0625vw solid #ccc;line-height:1.6em;background:#fafafa;padding:0.6250vw;height:9.3750vw;margin:0.6250vw 0;overflow-y:auto}
#mb_login_notmb .btn_submit {line-height:2.8125vw}

#mb_login_od_wr {margin:1.8750vw auto;padding:1.2500vw 1.8750vw}
#mb_login_od_wr h2 {font-size:1.25em;margin:1.2500vw 0 0.6250vw}
#mb_login_od_wr .frm_input {margin:0.6250vw 0 0}
#mb_login_od_wr p {background:#f3f3f3;margin:1.2500vw 0 0;padding:0.9375vw 1.2500vw;line-height:1.5em}

#mb_login #sns_login {margin-top:0;border-padding:1.5625vw}
#mb_login #sns_login:after {visibility:hidden;clear:both;content:""}
#mb_login #sns_login h3 {font-size:0;line-height:0;overflow:hidden}
#mb_login #sns_login .sns-wrap {margin:0 !important}
#mb_login #sns_login .sns-icon {width:49% !important;float:left !important}
#mb_login #sns_login .sns-icon:nth-child(odd) {margin-right:2%}
#mb_login #sns_login .txt {font-size:0.95em;padding-left:0.3125vw !important;border-left:0 !important}

}

@media (max-width:1400px){
#wrapper_title {}
.mbskin {margin: 7.1429vw auto 0;width: 43.5714vw;padding-bottom:15.7143vw;}
.mbskin .mbskin_box {border:0;}
.title_name {font-size: 4.2857vw;margin-bottom:4.2857vw;}
.login_tit {font-size: 2.4286vw;margin-bottom: 1.4286vw;}
.join {width: 100%;line-height:3.2143vw;height: 3.2143vw;font-size: 1.25em;border:0.0714vw solid #eaeaea;margin-bottom:1.0714vw;}


/* 로그인 */
#mb_login {}
#mb_login h1 {font-size:0;line-height:0;overflow:hidden}
#login_fs {padding:0.0000vw}
#mb_login #login_fs .frm_input {margin:0 0 0.7143vw}
#mb_login #login_fs .btn_submit {margin:0 0 0.3571vw;background:#b1b4b9;border:0.0714vw solid #b1b4b9;height: 3.2143vw;}

#login_info {}
#login_info:after {visibility:hidden;clear:both;content:""}
#login_info .login_if_auto {float:left}
#login_info .login_if_auto label {padding-left:0.3571vw}
#login_info .login_if_lpl {float:right}
#login_info .login_if_lpl a {margin-left:0.7143vw;}
#login_password_lost {border:0.0714vw solid #d5d9dd;border-radius:0.1429vw;padding:0.1429vw 0.3571vw;line-height:1.4286vw}

#mb_login_notmb {margin:2.1429vw auto;padding:1.4286vw 2.1429vw}
#mb_login_notmb h2 {font-size:1.25em;margin:1.4286vw 0 0.7143vw}
#guest_privacy {border:0.0714vw solid #ccc;line-height:1.6em;background:#fafafa;padding:0.7143vw;height:10.7143vw;margin:0.7143vw 0;overflow-y:auto}
#mb_login_notmb .btn_submit {line-height:3.2143vw}

#mb_login_od_wr {margin:2.1429vw auto;padding:1.4286vw 2.1429vw}
#mb_login_od_wr h2 {font-size:1.25em;margin:1.4286vw 0 0.7143vw}
#mb_login_od_wr .frm_input {margin:0.7143vw 0 0}
#mb_login_od_wr p {background:#f3f3f3;margin:1.4286vw 0 0;padding:1.0714vw 1.4286vw;line-height:1.5em}

#mb_login #sns_login {margin-top:0;border-padding:1.7857vw}
#mb_login #sns_login:after {visibility:hidden;clear:both;content:""}
#mb_login #sns_login h3 {font-size:0;line-height:0;overflow:hidden}
#mb_login #sns_login .sns-wrap {margin:0 !important}
#mb_login #sns_login .sns-icon {width:49% !important;float:left !important}
#mb_login #sns_login .sns-icon:nth-child(odd) {margin-right:2%}
#mb_login #sns_login .txt {font-size:0.95em;padding-left:0.3571vw !important;border-left:0 !important}

}

@media (max-width:1024px){
#wrapper_title {}
.mbskin {margin: 9.7656vw auto 0;width: 59.5703vw;padding-bottom:21.4844vw;}
.mbskin .mbskin_box {border:0;}
.title_name {font-size: 5.8594vw;margin-bottom:5.8594vw;}
.login_tit {font-size: 3.3203vw;margin-bottom: 1.9531vw;}
.join {width: 100%;line-height:4.3945vw;height: 4.3945vw;font-size: 1.25em;border:0.0977vw solid #eaeaea;margin-bottom:1.4648vw;}


/* 로그인 */
#mb_login {}
#mb_login h1 {font-size:0;line-height:0;overflow:hidden}
#login_fs {padding:0.0000vw}
#mb_login #login_fs .frm_input {margin:0 0 0.9766vw}
#mb_login #login_fs .btn_submit {margin:0 0 0.4883vw;background:#b1b4b9;border:0.0977vw solid #b1b4b9;height: 4.3945vw;}

#login_info {}
#login_info:after {visibility:hidden;clear:both;content:""}
#login_info .login_if_auto {float:left}
#login_info .login_if_auto label {padding-left:0.4883vw}
#login_info .login_if_lpl {float:right}
#login_info .login_if_lpl a {margin-left:0.9766vw;}
#login_password_lost {border:0.0977vw solid #d5d9dd;border-radius:0.1953vw;padding:0.1953vw 0.4883vw;line-height:1.9531vw}

#mb_login_notmb {margin:2.9297vw auto;padding:1.9531vw 2.9297vw}
#mb_login_notmb h2 {font-size:1.25em;margin:1.9531vw 0 0.9766vw}
#guest_privacy {border:0.0977vw solid #ccc;line-height:1.6em;background:#fafafa;padding:0.9766vw;height:14.6484vw;margin:0.9766vw 0;overflow-y:auto}
#mb_login_notmb .btn_submit {line-height:4.3945vw}

#mb_login_od_wr {margin:2.9297vw auto;padding:1.9531vw 2.9297vw}
#mb_login_od_wr h2 {font-size:1.25em;margin:1.9531vw 0 0.9766vw}
#mb_login_od_wr .frm_input {margin:0.9766vw 0 0}
#mb_login_od_wr p {background:#f3f3f3;margin:1.9531vw 0 0;padding:1.4648vw 1.9531vw;line-height:1.5em}

#mb_login #sns_login {margin-top:0;border-padding:2.4414vw}
#mb_login #sns_login:after {visibility:hidden;clear:both;content:""}
#mb_login #sns_login h3 {font-size:0;line-height:0;overflow:hidden}
#mb_login #sns_login .sns-wrap {margin:0 !important}
#mb_login #sns_login .sns-icon {width:49% !important;float:left !important}
#mb_login #sns_login .sns-icon:nth-child(odd) {margin-right:2%}
#mb_login #sns_login .txt {font-size:0.95em;padding-left:0.4883vw !important;border-left:0 !important}

}

@media (max-width:768px){
#wrapper_title {}
.mbskin {margin: 13.0208vw auto 0;width: 79.4271vw;padding-bottom:28.6458vw;}
.mbskin .mbskin_box {border:0;}
.title_name {font-size: 7.8125vw;margin-bottom:7.8125vw;}
.login_tit {font-size: 4.4271vw;margin-bottom: 2.6042vw;}
.join {width: 100%;line-height:6.5104vw;height: 6.5104vw;font-size: 1.25em;border:0.1302vw solid #eaeaea;margin-bottom:1.9531vw;}


/* 로그인 */
#mb_login {}
#mb_login h1 {font-size:0;line-height:0;overflow:hidden}
#login_fs {padding:0.0000vw}
#mb_login #login_fs .frm_input {margin:0 0 1.3021vw}
#mb_login #login_fs .btn_submit {margin:0 0 0.6510vw;background:#b1b4b9;border:0.1302vw solid #b1b4b9;height: 6.5104vw;}

#login_info {}
#login_info:after {visibility:hidden;clear:both;content:""}
#login_info .login_if_auto {float:left}
#login_info .login_if_auto label {padding-left:0.6510vw}
#login_info .login_if_lpl {float:right}
#login_info .login_if_lpl a {margin-left:1.3021vw;}
#login_password_lost {border:0.1302vw solid #d5d9dd;border-radius:0.2604vw;padding:0.2604vw 0.6510vw;line-height:2.6042vw}

#mb_login_notmb {margin:3.9063vw auto;padding:2.6042vw 3.9063vw}
#mb_login_notmb h2 {font-size:1.25em;margin:2.6042vw 0 1.3021vw}
#guest_privacy {border:0.1302vw solid #ccc;line-height:1.6em;background:#fafafa;padding:1.3021vw;height:19.5313vw;margin:1.3021vw 0;overflow-y:auto}
#mb_login_notmb .btn_submit {line-height:5.8594vw}

#mb_login_od_wr {margin:3.9063vw auto;padding:2.6042vw 3.9063vw}
#mb_login_od_wr h2 {font-size:1.25em;margin:2.6042vw 0 1.3021vw}
#mb_login_od_wr .frm_input {margin:1.3021vw 0 0}
#mb_login_od_wr p {background:#f3f3f3;margin:2.6042vw 0 0;padding:1.9531vw 2.6042vw;line-height:1.5em}

#mb_login #sns_login {margin-top:0;border-padding:3.2552vw}
#mb_login #sns_login:after {visibility:hidden;clear:both;content:""}
#mb_login #sns_login h3 {font-size:0;line-height:0;overflow:hidden}
#mb_login #sns_login .sns-wrap {margin:0 !important}
#mb_login #sns_login .sns-icon {width:49% !important;float:left !important}
#mb_login #sns_login .sns-icon:nth-child(odd) {margin-right:2%}
#mb_login #sns_login .txt {font-size:0.95em;padding-left:0.6510vw !important;border-left:0 !important}

}

@media (max-width:480px){
#wrapper_title {}
.mbskin {margin: 20.8333vw auto 0;width: 100%;padding:0 4.1667vw 33.3333vw}
.mbskin .mbskin_box {border:0;}
.title_name {font-size: 10.0000vw;margin-bottom:12.5000vw;}
.login_tit {font-size: 6.6667vw;margin-bottom: 4.1667vw;}
.join {width: 100%;line-height:10.4167vw;height: 10.4167vw;font-size: 1.25em;border:0.2083vw solid #eaeaea;margin-bottom:3.1250vw;}


/* 로그인 */
#mb_login {}
#mb_login h1 {font-size:0;line-height:0;overflow:hidden}
#login_fs {padding:0.0000vw}
#mb_login #login_fs .frm_input {margin:0 0 2.0833vw}
#mb_login #login_fs .btn_submit {margin:0 0 1.0417vw;background:#b1b4b9;border:0.2083vw solid #b1b4b9;height: 10.4167vw;}

#login_info {}
#login_info:after {visibility:hidden;clear:both;content:""}
#login_info .login_if_auto {float:left}
#login_info .login_if_auto label {padding-left:1.0417vw}
#login_info .login_if_lpl {float:right}
#login_info .login_if_lpl a {margin-left:2.0833vw;}
#login_password_lost {border:0.2083vw solid #d5d9dd;border-radius:0.4167vw;padding:0.4167vw 1.0417vw;line-height:4.1667vw}

#mb_login_notmb {margin:6.2500vw auto;padding:4.1667vw 6.2500vw}
#mb_login_notmb h2 {font-size:1.25em;margin:4.1667vw 0 2.0833vw}
#guest_privacy {border:0.2083vw solid #ccc;line-height:1.6em;background:#fafafa;padding:2.0833vw;height:31.2500vw;margin:2.0833vw 0;overflow-y:auto}
#mb_login_notmb .btn_submit {line-height:9.3750vw}

#mb_login_od_wr {margin:6.2500vw auto;padding:4.1667vw 6.2500vw}
#mb_login_od_wr h2 {font-size:1.25em;margin:4.1667vw 0 2.0833vw}
#mb_login_od_wr .frm_input {margin:2.0833vw 0 0}
#mb_login_od_wr p {background:#f3f3f3;margin:4.1667vw 0 0;padding:3.1250vw 4.1667vw;line-height:1.5em}

#mb_login #sns_login {margin-top:0;border-padding:5.2083vw}
#mb_login #sns_login:after {visibility:hidden;clear:both;content:""}
#mb_login #sns_login h3 {font-size:0;line-height:0;overflow:hidden}
#mb_login #sns_login .sns-wrap {margin:0 !important}
#mb_login #sns_login .sns-icon {width:49% !important;float:left !important}
#mb_login #sns_login .sns-icon:nth-child(odd) {margin-right:2%}
#mb_login #sns_login .txt {font-size:0.95em;padding-left:1.0417vw !important;border-left:0 !important}

}

</style>
<!-- 로그인 시작 { -->
<div id="mb_login" class="mbskin">
	<p class="title_name mont">LOGIN</p>
    <div class="mbskin_box">
        <p class="login_tit"><?php echo $g5['title'] ?></p>

        <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
        <input type="hidden" name="url" value="<?php echo $login_url ?>">
        
        <fieldset id="login_fs">
            <legend>회원로그인</legend>
            <label for="login_id" class="sound_only">회원아이디<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="mb_id" id="login_id" required class="frm_input required" size="20" maxLength="20" placeholder="아이디">
            <label for="login_pw" class="sound_only">비밀번호<strong class="sound_only"> 필수</strong></label>
            <input type="password" name="mb_password" id="login_pw" required class="frm_input required" size="20" maxLength="20" placeholder="비밀번호">
            <button type="submit" class="btn_submit">로그인</button>
			<a href="<?php echo G5_BBS_URL ?>/register.php" class="join">회원가입</a>
            <div id="login_info">
				<div class="login_if_auto chk_box">
                    <input type="checkbox" name="auto_login" id="login_auto_login" class="selec_chk">
                    <label for="login_auto_login"><span></span> 자동로그인</label>  
                </div>
                <div class="login_if_lpl">
					<a href="<?php echo G5_BBS_URL ?>/password_lost.php">아이디 찾기</a>
					<a href="">비밀번호 재설정</a>
                    <!-- <a href="<?php echo G5_BBS_URL ?>/register.php" class="join">회원가입</a> -->
                    <!-- <a href="/shop/register_before.php" class="join">회원가입</a> -->
                </div>
            </div>
        </fieldset> 
        </form>
        <?php @include_once(get_social_skin_path().'/social_login.skin.php'); // 소셜로그인 사용시 소셜로그인 버튼 ?>
    </div>

    <?php // 쇼핑몰 사용시 여기부터 ?>
    <?php if (isset($default['de_level_sell']) && $default['de_level_sell'] == 1) { // 상품구입 권한 ?>

	<!-- 주문하기, 신청하기 -->
	<?php if (preg_match("/orderform.php/", $url)) { ?>
    <section id="mb_login_notmb">
        <h2>비회원 구매</h2>
        <p>비회원으로 주문하시는 경우 포인트는 지급하지 않습니다.</p>

        <div id="guest_privacy">
            <?php echo conv_content($default['de_guest_privacy'], $config['cf_editor']); ?>
        </div>
		
		<div class="chk_box">
			<input type="checkbox" id="agree" value="1" class="selec_chk">
        	<label for="agree"><span></span> 개인정보수집에 대한 내용을 읽었으며 이에 동의합니다.</label>
		</div>
		
        <div class="btn_confirm">
            <a href="javascript:guest_submit(document.flogin);" class="btn_submit">비회원으로 구매하기</a>
        </div>

        <script>
        function guest_submit(f)
        {
            if (document.getElementById('agree')) {
                if (!document.getElementById('agree').checked) {
                    alert("개인정보수집에 대한 내용을 읽고 이에 동의하셔야 합니다.");
                    return;
                }
            }

            f.url.value = "<?php echo $url; ?>";
            f.action = "<?php echo $url; ?>";
            f.submit();
        }
        </script>
    </section>

    <?php } else if (preg_match("/orderinquiry.php$/", $url)) { ?>
    <div id="mb_login_od_wr">
        <h2>비회원 주문조회 </h2>

        <fieldset id="mb_login_od">
            <legend>비회원 주문조회</legend>

            <form name="forderinquiry" method="post" action="<?php echo urldecode($url); ?>" autocomplete="off">

            <label for="od_id" class="od_id sound_only">주문서번호<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="od_id" value="<?php echo $od_id; ?>" id="od_id" required class="frm_input required" size="20" placeholder="주문서번호">
            <label for="od_pwd" class="od_pwd sound_only">비밀번호 <strong>필수</strong></label>
            <input type="password" name="od_pwd" size="20" id="od_pwd" required class="frm_input required" placeholder="비밀번호">
            <button type="submit" class="btn_submit">확인</button>

            </form>
        </fieldset>

        <section id="mb_login_odinfo">
            <p>메일로 발송해드린 주문서의 <strong>주문번호</strong> 및 주문 시 입력하신 <strong>비밀번호</strong>를 정확히 입력해주십시오.</p>
        </section>

    </div>
    <?php } ?>

    <?php } ?>
    <?php // 쇼핑몰 사용시 여기까지 반드시 복사해 넣으세요 ?>

</div>

<script>
jQuery(function($){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f)
{
    if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>
<!-- } 로그인 끝 -->

<?php

include_once(G5_PATH.'/board_bottom.php');

?>