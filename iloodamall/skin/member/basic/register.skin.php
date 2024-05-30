<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<style>
#container{width:1200px;}
#wrapper_title {text-align: center;padding:100px 0px 60px;font-size: 60px;}
/* 회원가입 약관 */
.register {margin:0 auto;width:100%;padding:100px 0;}
.register:after {display:block;visibility:hidden;clear:both;content:""}
.register .btn_confirm .btn_submit,
.register .btn_confirm .btn_close {float:left;height:50px !important;width:49.5%;font-weight:bold;font-size:1.083em}
.register .btn_confirm {text-align:left}
.register .btn_confirm .btn_submit {margin-left:1%;background:#333;border-color:#333}

#fregister p {position:relative;text-align:center;color:#fff;height:50px;line-height:50px;font-size:1.1em;background:#333;margin:0 0 10px;border-radius:0px;font-weight:bold}
#fregister p:before {content:"";position:absolute;top:0;left:0;width:5px;height:50px;border-radius:0px;background:#333}
#fregister p i {font-size:1.2em;vertical-align:middle}
#fregister section {margin:10px auto 15px;border:1px solid #dde7e9;position:relative;border-radius:3px}
#fregister_chkall {position:relative;text-align:center;background:#f5f7fa;line-height:50px;border:1px solid #e5e9f0;border-radius:3px;margin-bottom:15px}
#fregister h2 {text-align:left;padding:20px;border-bottom:1px solid #dde7e9;font-size:1.2em}
#fregister textarea {display:block;padding:20px;width:100%;height:150px;background:#fff;border:0;line-height:1.6em}
#fregister_private {position:relative}
#fregister_private div {padding:20px;background:#fff}
#fregister_private table {width:100%;border-collapse:collapse;font-size:1em;}
#fregister_private table caption {position:absolute;font-size:0;line-height:0;overflow:hidden}
#fregister_private table th {background:#f7f7f9;width:33.33%;color:#000;padding:10px;border:1px solid #d8dbdf}
#fregister_private table td {border:1px solid #e7e9ec;padding:10px;border-top:0}

.fregister_agree {position:absolute;top:0;right:0}
.fregister_agree input[type="checkbox"] + label {color:#676e70}
.fregister_agree input[type="checkbox"] + label:hover {color:#333}
.fregister_agree input[type="checkbox"] + label span {position:absolute;top:20px;right:15px;width:17px;height:17px;display:block;background:#fff;border:1px solid #999;border-radius:3px}
.fregister_agree input[type="checkbox"]:checked + label {color:#000}
.fregister_agree input[type="checkbox"]:checked + label span {background:url('/images/icon/chk_cm.png') no-repeat 50% 50% #333;border-color:#333;border-radius:3px}
.fregister_agree.chk_all input[type="checkbox"] + label span {top:18px}

.chk_li {padding-left:20px}

#sns_register .login-sns,
#sns_register h2 {border:0 !important}


@media (max-width:1760px){
#container{width:68.1818vw;}
#wrapper_title {padding:5.6818vw 0.0000vw 3.4091vw;font-size: 3.4091vw;}
/* 회원가입 약관 */
.register {margin:0 auto;width:100%;padding:5.6818vw 3.4091vw ;}
.register:after {visibility:hidden;clear:both;content:""}
.register .btn_confirm .btn_submit,
.register .btn_confirm .btn_close {height:2.8409vw !important;width:49.5%;font-size:1.083em}
.register .btn_confirm {text-align:left}
.register .btn_confirm .btn_submit {margin-left:1%;background:#333;border-color:#333}

#fregister p {height:2.8409vw;line-height:2.8409vw;font-size:1.1em;background:#333;margin:0 0 0.5682vw;border-radius:0.0000vw;font-weight:bold}
#fregister p:before {top:0;left:0;width:0.2841vw;height:2.8409vw;border-radius:0.0000vw;background:#333}
#fregister p i {font-size:1.2em;vertical-align:middle}
#fregister section {margin:0.5682vw auto 0.8523vw;border:0.0568vw solid #dde7e9;border-radius:0.1705vw}
#fregister_chkall {background:#f5f7fa;line-height:2.8409vw;border:0.0568vw solid #e5e9f0;border-radius:0.1705vw;margin-bottom:0.8523vw}
#fregister h2 {padding:1.1364vw;border-bottom:0.0568vw solid #dde7e9;font-size:1.2em}
#fregister textarea {padding:1.1364vw;width:100%;height:8.5227vw;background:#fff;border:0;line-height:1.6em}
#fregister_private {position:relative}
#fregister_private div {padding:1.1364vw;background:#fff}
#fregister_private table {width:100%;font-size:1em;}
#fregister_private table caption {font-size:0;line-height:0;overflow:hidden}
#fregister_private table th {background:#f7f7f9;width:33.33%;padding:0.5682vw;border:0.0568vw solid #d8dbdf}
#fregister_private table td {border:0.0568vw solid #e7e9ec;padding:0.5682vw;border-top:0}

.fregister_agree {top:0;right:0}
.fregister_agree input[type="checkbox"] + label {color:#676e70}
.fregister_agree input[type="checkbox"] + label:hover {color:#333}
.fregister_agree input[type="checkbox"] + label span {top:1.1364vw;right:0.8523vw;width:0.9659vw;height:0.9659vw;background:#fff;border:0.0568vw solid #999;border-radius:0.1705vw}
.fregister_agree input[type="checkbox"]:checked + label {color:#000}
.fregister_agree input[type="checkbox"]:checked + label span {background:url('/images/icon/chk_cm.png') no-repeat 50% 50% #333;border-border-radius:0.1705vw}
.fregister_agree.chk_all input[type="checkbox"] + label span {top:1.0227vw}

.chk_li {padding-left:1.1364vw}

#sns_register .login-sns,
#sns_register h2 {border:0 !important}

}

@media (max-width:1600px){
#container{width:75vw;}
#wrapper_title {padding:6.2500vw 0.0000vw 3.7500vw;font-size: 3.7500vw;}
/* 회원가입 약관 */
.register {margin:0 auto;width:100%;padding:6.2500vw 3.7500vw ;}
.register:after {visibility:hidden;clear:both;content:""}
.register .btn_confirm .btn_submit,
.register .btn_confirm .btn_close {height:3.1250vw !important;width:49.5%;font-size:1.083em}
.register .btn_confirm {text-align:left}
.register .btn_confirm .btn_submit {margin-left:1%;background:#333;border-color:#333}

#fregister p {height:3.1250vw;line-height:3.1250vw;font-size:1.1em;background:#333;margin:0 0 0.6250vw;border-radius:0.0000vw;font-weight:bold}
#fregister p:before {top:0;left:0;width:0.3125vw;height:3.1250vw;border-radius:0.0000vw;background:#333}
#fregister p i {font-size:1.2em;vertical-align:middle}
#fregister section {margin:0.6250vw auto 0.9375vw;border:0.0625vw solid #dde7e9;border-radius:0.1875vw}
#fregister_chkall {background:#f5f7fa;line-height:3.1250vw;border:0.0625vw solid #e5e9f0;border-radius:0.1875vw;margin-bottom:0.9375vw}
#fregister h2 {padding:1.2500vw;border-bottom:0.0625vw solid #dde7e9;font-size:1.2em}
#fregister textarea {padding:1.2500vw;width:100%;height:9.3750vw;background:#fff;border:0;line-height:1.6em}
#fregister_private {position:relative}
#fregister_private div {padding:1.2500vw;background:#fff}
#fregister_private table {width:100%;font-size:1em;}
#fregister_private table caption {font-size:0;line-height:0;overflow:hidden}
#fregister_private table th {background:#f7f7f9;width:33.33%;padding:0.6250vw;border:0.0625vw solid #d8dbdf}
#fregister_private table td {border:0.0625vw solid #e7e9ec;padding:0.6250vw;border-top:0}

.fregister_agree {top:0;right:0}
.fregister_agree input[type="checkbox"] + label {color:#676e70}
.fregister_agree input[type="checkbox"] + label:hover {color:#333}
.fregister_agree input[type="checkbox"] + label span {top:1.2500vw;right:0.9375vw;width:1.0625vw;height:1.0625vw;background:#fff;border:0.0625vw solid #999;border-radius:0.1875vw}
.fregister_agree input[type="checkbox"]:checked + label {color:#000}
.fregister_agree input[type="checkbox"]:checked + label span {background:url('/images/icon/chk_cm.png') no-repeat 50% 50% #333;border-border-radius:0.1875vw}
.fregister_agree.chk_all input[type="checkbox"] + label span {top:1.1250vw}

.chk_li {padding-left:1.2500vw}

#sns_register .login-sns,
#sns_register h2 {border:0 !important}

}

@media (max-width:1400px){
#container{width:85.7143vw;}
#wrapper_title {padding:7.1429vw 0.0000vw 4.2857vw;font-size: 4.2857vw;}
/* 회원가입 약관 */
.register {margin:0 auto;width:100%;padding:7.1429vw 4.2857vw ;}
.register:after {visibility:hidden;clear:both;content:""}
.register .btn_confirm .btn_submit,
.register .btn_confirm .btn_close {height:3.5714vw !important;width:49.5%;font-size:1.083em}
.register .btn_confirm {text-align:left}
.register .btn_confirm .btn_submit {margin-left:1%;background:#333;border-color:#333}

#fregister p {height:3.5714vw;line-height:3.5714vw;font-size:1.1em;background:#333;margin:0 0 0.7143vw;border-radius:0.0000vw;font-weight:bold}
#fregister p:before {top:0;left:0;width:0.3571vw;height:3.5714vw;border-radius:0.0000vw;background:#333}
#fregister p i {font-size:1.2em;vertical-align:middle}
#fregister section {margin:0.7143vw auto 1.0714vw;border:0.0714vw solid #dde7e9;border-radius:0.2143vw}
#fregister_chkall {background:#f5f7fa;line-height:3.5714vw;border:0.0714vw solid #e5e9f0;border-radius:0.2143vw;margin-bottom:1.0714vw}
#fregister h2 {padding:1.4286vw;border-bottom:0.0714vw solid #dde7e9;font-size:1.2em}
#fregister textarea {padding:1.4286vw;width:100%;height:10.7143vw;background:#fff;border:0;line-height:1.6em}
#fregister_private {position:relative}
#fregister_private div {padding:1.4286vw;background:#fff}
#fregister_private table {width:100%;font-size:1em;}
#fregister_private table caption {font-size:0;line-height:0;overflow:hidden}
#fregister_private table th {background:#f7f7f9;width:33.33%;padding:0.7143vw;border:0.0714vw solid #d8dbdf}
#fregister_private table td {border:0.0714vw solid #e7e9ec;padding:0.7143vw;border-top:0}

.fregister_agree {top:0;right:0}
.fregister_agree input[type="checkbox"] + label {color:#676e70}
.fregister_agree input[type="checkbox"] + label:hover {color:#333}
.fregister_agree input[type="checkbox"] + label span {top:1.4286vw;right:1.0714vw;width:1.2143vw;height:1.2143vw;background:#fff;border:0.0714vw solid #999;border-radius:0.2143vw}
.fregister_agree input[type="checkbox"]:checked + label {color:#000}
.fregister_agree input[type="checkbox"]:checked + label span {background:url('/images/icon/chk_cm.png') no-repeat 50% 50% #333;border-border-radius:0.2143vw}
.fregister_agree.chk_all input[type="checkbox"] + label span {top:1.2857vw}

.chk_li {padding-left:1.4286vw}

#sns_register .login-sns,
#sns_register h2 {border:0 !important}

}

@media (max-width:1024px){
#container{width:100vw;}
#wrapper_title {padding:9.7656vw 0.0000vw 5.8594vw;font-size: 5.8594vw;}
/* 회원가입 약관 */
.register {margin:0 auto;width:100%;padding:9.7656vw 5.8594vw ;}
.register:after {visibility:hidden;clear:both;content:""}
.register .btn_confirm .btn_submit,
.register .btn_confirm .btn_close {height:4.8828vw !important;width:49.5%;font-size:1.083em}
.register .btn_confirm {text-align:left}
.register .btn_confirm .btn_submit {margin-left:1%;background:#333;border-color:#333}

#fregister p {height:4.8828vw;line-height:4.8828vw;font-size:1.1em;background:#333;margin:0 0 0.9766vw;border-radius:0.0000vw;font-weight:bold}
#fregister p:before {top:0;left:0;width:0.4883vw;height:4.8828vw;border-radius:0.0000vw;background:#333}
#fregister p i {font-size:1.2em;vertical-align:middle}
#fregister section {margin:0.9766vw auto 1.4648vw;border:0.0977vw solid #dde7e9;border-radius:0.2930vw}
#fregister_chkall {background:#f5f7fa;line-height:4.8828vw;border:0.0977vw solid #e5e9f0;border-radius:0.2930vw;margin-bottom:1.4648vw}
#fregister h2 {padding:1.9531vw;border-bottom:0.0977vw solid #dde7e9;font-size:1.2em}
#fregister textarea {padding:1.9531vw;width:100%;height:14.6484vw;background:#fff;border:0;line-height:1.6em}
#fregister_private {position:relative}
#fregister_private div {padding:1.9531vw;background:#fff}
#fregister_private table {width:100%;font-size:1em;}
#fregister_private table caption {font-size:0;line-height:0;overflow:hidden}
#fregister_private table th {background:#f7f7f9;width:33.33%;padding:0.9766vw;border:0.0977vw solid #d8dbdf}
#fregister_private table td {border:0.0977vw solid #e7e9ec;padding:0.9766vw;border-top:0}

.fregister_agree {top:0;right:0}
.fregister_agree input[type="checkbox"] + label {color:#676e70}
.fregister_agree input[type="checkbox"] + label:hover {color:#333}
.fregister_agree input[type="checkbox"] + label span {top:1.9531vw;right:1.4648vw;width:1.6602vw;height:1.6602vw;background:#fff;border:0.0977vw solid #999;border-radius:0.2930vw}
.fregister_agree input[type="checkbox"]:checked + label {color:#000}
.fregister_agree input[type="checkbox"]:checked + label span {background:url('/images/icon/chk_cm.png') no-repeat 50% 50% #333;border-border-radius:0.2930vw}
.fregister_agree.chk_all input[type="checkbox"] + label span {top:1.7578vw}

.chk_li {padding-left:1.9531vw}

#sns_register .login-sns,
#sns_register h2 {border:0 !important}

}

@media (max-width:768px){

#wrapper_title {padding:13.0208vw 0.0000vw 7.8125vw;font-size: 7.8125vw;}
/* 회원가입 약관 */
.register {margin:0 auto;width:100%;padding:13.0208vw 2.6042vw ;}
.register:after {visibility:hidden;clear:both;content:""}
.register .btn_confirm .btn_submit,
.register .btn_confirm .btn_close {height:6.5104vw !important;width:49.5%;font-size:1.083em;line-height:6.5104vw;}
.register .btn_confirm {text-align:left}
.register .btn_confirm .btn_submit {margin-left:1%;background:#333;border-color:#333}

#fregister p {height:auto;line-height:1.2em;font-size:1.1em;background:#333;margin:0 0 1.3021vw;border-radius:0.0000vw;font-weight:bold;padding:2.6042vw 0;word-break:keep-all;}
#fregister p:before {top:0;left:0;width:0.6510vw;height:6.5104vw;border-radius:0.0000vw;background:#333}
#fregister p i {font-size:1.2em;vertical-align:middle}
#fregister section {margin:1.3021vw auto 1.9531vw;border:0.1302vw solid #dde7e9;border-radius:0.3906vw}
#fregister_chkall {background:#f5f7fa;line-height:6.5104vw;border:0.1302vw solid #e5e9f0;border-radius:0.3906vw;margin-bottom:1.9531vw}
#fregister h2 {padding:2.6042vw;border-bottom:0.1302vw solid #dde7e9;font-size:1.2em}
#fregister textarea {padding:2.6042vw;width:100%;height:19.5313vw;background:#fff;border:0;line-height:1.6em}
#fregister_private {position:relative}
#fregister_private div {padding:2.6042vw;background:#fff}
#fregister_private table {width:100%;font-size:1em;}
#fregister_private table caption {font-size:0;line-height:0;overflow:hidden}
#fregister_private table th {background:#f7f7f9;width:33.33%;padding:1.3021vw;border:0.1302vw solid #d8dbdf}
#fregister_private table td {border:0.1302vw solid #e7e9ec;padding:1.3021vw;border-top:0}

.fregister_agree {top:0;right:0}
.fregister_agree input[type="checkbox"] + label {color:#676e70}
.fregister_agree input[type="checkbox"] + label:hover {color:#333}
.fregister_agree input[type="checkbox"] + label span {top:2.6042vw;right:1.9531vw;width:2.2135vw;height:2.2135vw;background:#fff;border:0.1302vw solid #999;border-radius:0.3906vw}
.fregister_agree input[type="checkbox"]:checked + label {color:#000}
.fregister_agree input[type="checkbox"]:checked + label span {background:url('/images/icon/chk_cm.png') no-repeat 50% 50% #333;border-border-radius:0.3906vw}
.fregister_agree.chk_all input[type="checkbox"] + label span {top:2.3438vw}

.chk_li {padding-left:2.6042vw}

#sns_register .login-sns,
#sns_register h2 {border:0 !important}

}

@media (max-width:480px){
#wrapper_title {padding:12.5000vw 0.0000vw 12.5000vw;font-size: 10.0000vw;}
/* 회원가입 약관 */
.register {margin:0 auto;width:100%;padding:12.5000vw 4.1667vw ;}
.register:after {visibility:hidden;clear:both;content:""}
.register .btn_confirm .btn_submit,
.register .btn_confirm .btn_close {height:10.4167vw !important;width:49.5%;font-size:1.083em;line-height:10.4167vw ;}
.register .btn_confirm {text-align:left}
.register .btn_confirm .btn_submit {margin-left:1%;background:#333;border-color:#333}

#fregister p {height:auto;line-height:1.2em;font-size:1.1em;background:#333;margin:0 0 2.0833vw;border-radius:0.0000vw;font-weight:bold;padding:4.1667vw 0;}
#fregister p:before {top:0;left:0;width:1.0417vw;height:10.4167vw;border-radius:0.0000vw;background:#333}
#fregister p i {font-size:1.2em;vertical-align:middle}
#fregister section {margin:2.0833vw auto 3.1250vw;border:0.2083vw solid #dde7e9;border-radius:0.6250vw}
#fregister_chkall {background:#f5f7fa;line-height:10.4167vw;border:0.2083vw solid #e5e9f0;border-radius:0.6250vw;margin-bottom:3.1250vw}
#fregister h2 {padding:4.1667vw;border-bottom:0.2083vw solid #dde7e9;font-size:1.2em}
#fregister textarea {padding:4.1667vw;width:100%;height:31.2500vw;background:#fff;border:0;line-height:1.6em}
#fregister_private {position:relative}
#fregister_private div {padding:4.1667vw;background:#fff}
#fregister_private table {width:100%;font-size:1em;}
#fregister_private table caption {font-size:0;line-height:0;overflow:hidden}
#fregister_private table th {background:#f7f7f9;width:33.33%;padding:2.0833vw;border:0.2083vw solid #d8dbdf}
#fregister_private table td {border:0.2083vw solid #e7e9ec;padding:2.0833vw;border-top:0}

.fregister_agree {top:0;right:0}
.fregister_agree input[type="checkbox"] + label {color:#676e70}
.fregister_agree input[type="checkbox"] + label:hover {color:#333}
.fregister_agree input[type="checkbox"] + label span {top:4.1667vw;right:3.1250vw;width:3.5417vw;height:3.5417vw;background:#fff;border:0.2083vw solid #999;border-radius:0.6250vw}
.fregister_agree input[type="checkbox"]:checked + label {color:#000}
.fregister_agree input[type="checkbox"]:checked + label span {background:url('/images/icon/chk_cm.png') no-repeat 50% 50% #333;border-border-radius:0.6250vw}
.fregister_agree.chk_all input[type="checkbox"] + label span {top:3.7500vw}

.chk_li {padding-left:4.1667vw}

#sns_register .login-sns,
#sns_register h2 {border:0 !important}

}

</style>
<!-- 회원가입약관 동의 시작 { -->
<div class="register">

    <form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

    <p><i class="fa fa-check-circle" aria-hidden="true"></i> 회원가입약관 및 개인정보 수집 및 이용의 내용에 동의하셔야 회원가입 하실 수 있습니다.</p>
    
    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_register.skin.php');
    ?>
    <section id="fregister_term">
        <h2>회원가입약관</h2>
        <textarea readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
        <fieldset class="fregister_agree">
            <input type="checkbox" name="agree" value="1" id="agree11" class="selec_chk">
            <label for="agree11"><span></span><b class="sound_only">회원가입약관의 내용에 동의합니다.</b></label>
        </fieldset>
    </section>

    <section id="fregister_private">
        <h2>개인정보 수집 및 이용</h2>
        <div>
            <table>
                <caption>개인정보 수집 및 이용</caption>
                <thead>
                <tr>
                    <th>목적</th>
                    <th>항목</th>
                    <th>보유기간</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>이용자 식별 및 본인여부 확인</td>
                    <td>아이디, 이름, 비밀번호<?php echo ($config['cf_cert_use'])? ", 생년월일, 휴대폰 번호(본인인증 할 때만, 아이핀 제외), 암호화된 개인식별부호(CI)" : ""; ?></td>
                    <td>회원 탈퇴 시까지</td>
                </tr>
                <tr>
                    <td>고객서비스 이용에 관한 통지,<br>CS대응을 위한 이용자 식별</td>
                    <td>연락처 (이메일, 휴대전화번호)</td>
                    <td>회원 탈퇴 시까지</td>
                </tr>
                </tbody>
            </table>
        </div>

        <fieldset class="fregister_agree">
            <input type="checkbox" name="agree2" value="1" id="agree21" class="selec_chk">
            <label for="agree21"><span></span><b class="sound_only">개인정보 수집 및 이용의 내용에 동의합니다.</b></label>
       </fieldset>
    </section>

<section id="fregister_private">
    <h2>[선택] 마케팅 목적의 개인정보 수집 동의</h2>
    <div >
		<span>- 이용목적 : 이루다몰 DB를 이용하는 고객 맞춤형 마케팅 및 프로모션</span><br>
		<span>- 수집항목 : 이름, 연락처, 이메일 주소, 병원명, 병원주소</span><br>
		<span>- 이용기간 : 회원 탈퇴 시 파기 / 마케팅 목적의 개인정보 수집 거부 시</span><br>
		<span>※ 마케팅 목적의 개인정보 수집에 동의할 수 있습니다만, 그 경우 맞춤형 서비스와 프로모션 정보를 받으실 수 없습니다.</span>
    </div>

    <fieldset class="fregister_agree">
        <input type="checkbox" name="mb_3" value="1" id="agree22" class="selec_chk">
        <label for="agree22"><span></span><b class="sound_only">개인정보 수집 및 이용의 내용에 동의합니다.</b></label>
    </fieldset>
</section>

<section id="fregister_private">
    <h2>[선택] 광고성 정보 수신 동의</h2>
    <div>
        <span>이루다몰은 회원님이 수집 및 이용에 동의한 개인정보를 이용하여 SMS 메시지, 카카오 채널을 통한 메시지, 이메일 등 다양한 전송 매체를 통해 오전 9시부터 오후 6시까지 공지 및 광고를 전송할 수 있습니다<c style="border-bottom:solid 1px #000;">(SMS 발송 시 광고성 정보 무료 거부 신청 가능, 카카오톡 채널 발송 시 채널 차단을 통한 광고성 정보 거부 신청이 가능함을 알려드립니다.)</c></span>
    </div>

    <fieldset class="fregister_agree">
        <input type="checkbox" name="mb_4" value="1" id="agree23" class="selec_chk">
        <label for="agree23"><span></span><b class="sound_only">광고성 정보 수신에 대한 내용에 동의합니다.</b></label>
    </fieldset>
</section>

	<div id="fregister_chkall" class="chk_all fregister_agree">
        <input type="checkbox" name="chk_all" id="chk_all" class="selec_chk">
        <label for="chk_all"><span></span>회원가입 약관에 모두 동의합니다</label>
    </div>
	    
    <div class="btn_confirm">
    	<a href="<?php echo G5_URL ?>" class="btn_close">취소</a>
        <button type="submit" class="btn_submit">회원가입</button>
    </div>

    </form>

    <script>
    function fregister_submit(f)
    {
        if (!f.agree.checked) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("개인정보 수집 및 이용의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree2.focus();
            return false;
        }

        return true;
    }
    
    jQuery(function($){
        // 모두선택
        $("input[id=chk_all]").click(function() {
            if ($(this).prop('checked')) {
                $("input[id^=agree]").prop('checked', true);
            } else {
                $("input[id^=agree]").prop("checked", false);
            }
        });
    });

    </script>


</div>
<!-- } 회원가입 약관 동의 끝 -->
