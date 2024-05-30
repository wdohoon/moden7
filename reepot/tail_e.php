<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/tail.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/tail.php');
    return;
}
?>
<style>
	#glovalFooter {
		display: block;
		position: relative;
		width: 100%;
		background-color: #F9F8F7;
		text-align: left;
		color: #35373A;
		font-size: 16px;
		z-index: 20;
	}
	#glovalFooter .minframe {
		max-width: 1560px;
		padding-right: 8%;
	}
	.gf-footer .gf-f-link > a:after,
	.gf-footer address span:after {
		background-color: #adadad;
	}
	#glovalFooter .gf-infoLink-section {
		padding-top: 35px;
		padding-bottom: 35px;
		background-color: #F5F4F4;
	}
	.gf-infoLink-section .gf-infoL-item {
		display: -webkit-box; display: -ms-flexbox; display: flex; 
		-webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; 
		-webkit-box-align: center; -ms-flex-align: center; align-items: center; 
	}
	.gf-infoLink-section .gf-infoL-item strong {
		display: block;
		padding-right: 35px;
		font-size: 1.125em;
	}
	.gf-infoLink-section .gf-infoL-item p {
		padding-left: 35px;
		padding-right: 35px;
		border-left: 1px solid #b5b5b5;
	}
	.gf-subscribe-form .input-group {
		position: relative;
		display: -webkit-box; display: -ms-flexbox; display: flex; 
		-webkit-box-align: stretch; -ms-flex-align: stretch; align-items: stretch; 
		width: 100%;
	}
	.gf-subscribe-form .input-group > input {
		-webkit-appearance: none;
		position: relative;
		-webkit-box-flex: 1;
			-ms-flex: 1 1 auto;
				flex: 1 1 auto;
		width: 18vw;
		min-width: 200px;
		height: 55px;
		border-radius: 0.3em;
		border-top-right-radius: 0;
		border-bottom-right-radius: 0;
		padding-left: 1em;
		padding-right: 1em;
		border: 1px solid #E1E0E1;
		font-size: 0.9375em;
		box-sizing: border-box;
		outline: 0;
	}
	.gf-subscribe-form .input-group > input::placeholder {
		font-size: 0.9375em;
	}
	.gf-subscribe-form .input-group > button {
		height: 55px;
		margin-right: -1px;
		padding: 1em 1em;
		background-color: #D5DBE7;
		border-radius: 0.3em;
		border-top-left-radius: 0;
		border-bottom-left-radius: 0;
		font-size: 0.9375em;
		font-weight: 400;
		white-space: nowrap;
	}
	.gf-subscribe-form .form-checkbox {
		margin-top: 10px;
		font-size: 0.9375em;
	}
	.form-checkbox input[type="checkbox"] {
		visibility: hidden;
		display: none;
	}
	.gf-subscribe-form .form-checkbox > label {
		position: relative;
		display: inline-block;
		cursor: pointer;
		padding-left: 30px;
		line-height: 22px;
		user-select: none;
	}
	.gf-subscribe-form .form-checkbox > label:before {
		content: "";
		display: inline-block;
		position: absolute;
		top: 0;
		left: 0;
		width: 22px;
		height: 22px;
		background-color: #fff;
		border: 1px solid #E1E0E1;
		border-radius: 0.3em;
		box-sizing: border-box;
	}
	.form-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #F4A66C;
	}
	.gf-subscribe-form .form-checkbox input[type="checkbox"]:checked + label:after {
		content: '✔';
		position: absolute;
		top: 50%;
		left: 0.3em;
		margin-top: -0.5em;
		font-size: 1em;
		line-height: 1;
		color: #F4A66C;
	}
	.gf-subscribe-form .form-checkbox > label a {
		color: #B1B4B9;
		display: inline-block;
		margin-left: 10px;
		text-decoration: underline;
	}
	.gf-subscribe-form .requir {
		display: inline-block;
		position: relative;
		padding-right: 0.7em;
	}
	.gf-subscribe-form .requir:before {
		content: '*';
		display: inline-block;
		position: absolute;
		top: 0;
		right:0;
		padding: 0;
		color: #B0C4E0;
	}

	#glovalFooter .gf-sitemap-section {
		padding-bottom: 50px;
		text-align: left;
	}
	.gf-sitemap-section .gf-sm-item {
		margin-top: 50px;
	}
	.gf-sm-item .gf-sm-depth1 {
		display: block;
		padding-top: 0.5em;
		padding-bottom: 1em;
		font-weight: 600;
	}
	.gf-sm-item .gf-sm-depth1 .icon {
		display: none;
		float: right;
		padding-right: 10px;
		padding-left: 10px;
		font-size: 1.5em;
		line-height: 0.7em;
		color: #707070;
		transition: 0.2s;
	}
	.gf-sm-item .gf-sm-depth1.active .icon  {
		transform: rotate(225deg);
	}
	.gf-sitemap-section .gf-sm-item .gf-sm-body {
		font-size: 0.85em;
	}
	.gf-sm-item li b {
		display: block;
		margin-bottom: 1em;
	}
	.gf-sm-item .gf-sm-depth2 {
		display: block;
		margin-bottom: 1em;
		line-height: 1.6;
	}
	.gf-sm-item .gf-sm-depth2:hover {
		text-decoration: underline;
	}
	#glovalFooter .gf-footer {
		padding-bottom: 30px;
		background-color: #F5F4F4;
		text-align: left;
		font-size: 0.9375em;
	}
	.gf-footer .gf-f-top {
		padding-top: 20px;
		padding-bottom: 20px;
		border-bottom: 1px solid #EEECEC;
		overflow: hidden;
	}
	.gf-footer .gf-f-top .gf-copyright {
		float: left;
		margin-top: 17px;
		margin-right: 28px;
		font-weight: 200;
	}
	.gf-footer .gf-f-top .gf-f-link {
		float: left;
		margin-top: 8px;
	}
	.gf-footer .gf-f-link > a {
		display: inline-block;
		position: relative;
		margin-right: 40px;
	}
	.gf-footer .gf-f-link > a:after {
		content: '';
		position: absolute;
		top: 50%;
		right: -20px;
		width: 1px;
		height: 1em;
		margin-top: -0.5em;
	}
	.gf-footer .gf-f-link > a:last-child:after {
		content: none;
	}
	.gf-footer .gf-f-top .gf-f-other {
		display: -webkit-box; display: -ms-flexbox; display: flex; 
		-webkit-box-align: center; -ms-flex-align: center; align-items: center; 
		float: right;
	}
	.gf-f-top .gf-f-other > a {
		padding: 5px;
		margin-right: 20px;
		cursor: pointer;
	}
	.gf-f-top .gf-f-other img {
		display: block;
		height: 23px;
		opacity: 0.7;
	}
	.gf-footer .f-lang {
		display: -webkit-box; display: -ms-flexbox; display: flex; 
		width: 160px;
		line-height: 2em;
		border-radius: 0.4em;
		overflow: hidden;
		font-size: 0.85em;
	}
	.gf-footer .f-lang > li {
		width: 50%;
	}
	.gf-footer .f-lang .f-lang-txt {
		display: block;
		text-align: center;
		background-color: #E9E9E9;
		line-height: 3em;
	}
	.gf-footer .f-lang .active .f-lang-txt {
		background-color: #D5DBE7;
	}
	.gf-footer .gf-copyright {
		margin-top: 30px;
		font-size: 0.93em;
	}
	.gf-footer address {
		margin-top: 1em;
	}
	.gf-footer address span {
		display: inline-block;
		position: relative;
		margin-right: 40px;
	}
	.gf-footer address span:after {
		content: '';
		position: absolute;
		top: 50%;
		right: -20px;
		width: 1px;
		height: 1em;
		margin-top: -0.5em;
	}
	.gf-footer address span:last-child:after {
		content: none;
	}

	/*ver dark*/
	.ver-dark #glovalFooter {
		background-color: #272727;
		color: #999999;
	}
	.ver-dark #glovalFooter .gf-infoLink-section,
	.ver-dark .gf-infoLink-section .gf-infoL-item p,
	.ver-dark .gf-subscribe-form .input-group > input,
	.ver-dark .gf-subscribe-form .form-checkbox > label:before,
	.ver-dark .gf-footer .gf-f-top {
		border-color: #555555;
	}
	.ver-dark .gf-subscribe-form .input-group > input,
	.ver-dark .gf-subscribe-form .form-checkbox > label:before {
		background-color: #272727;
	}
	.ver-dark .gf-subscribe-form .input-group > button {
		background-color: #89A5CB;
		color: #fff;
	}
	.ver-dark .gf-subscribe-form .input-group > input,
	.ver-dark .gf-infoLink-section .gf-infoL-item strong, 
	.ver-dark .gf-sm-item .gf-sm-depth1,
	.ver-dark .gf-subscribe-form .requir {
		color: #fff;
	}
	.ver-dark #glovalFooter .gf-infoLink-section,
	.ver-dark #glovalFooter .gf-footer {
		background-color: #2E2E2E;
	}
	.ver-dark .gf-footer .gf-f-link > a:after, 
	.ver-dark .gf-footer address span:after {
		background-color: #555555;
	}
	.ver-dark .gf-footer .gf-copyright,
	.ver-dark #glovalFooter address {
		color: #666666;
	}
	.ver-dark .gf-footer .f-lang .f-lang-txt {
		background-color: #444444;
		color: #fff;
	}
	.ver-dark .gf-footer .f-lang .active .f-lang-txt {
		background-color: #89A5CB;
	}
	.ver-dark .gf-f-top .gf-f-other object  {
		opacity: 1;
	}
</style>
<!-- } 콘텐츠 끝 -->

<!-- 하단 시작 { -->

<footer id="glovalFooter">
	<form id="frmMail_ft" name="frmMail_ft" method="post" style="margin-top:0;margin-bottom:0" onsubmit="return false;">
	<input type="hidden" id="blank"					name="blank"				value="">
	<input type="hidden" id="pageID"				name="pageID"				value="1">
	<section class="gf-infoLink-section">
		<div class="minframe">
			<div class="gf-infoL-item">
        <div class="left">
          <h2>LET'S KEEP IN TOUCH  </h2>
          <br class="p-hide">
          <span class="news">Subscribe to our newsletter</span>
        </div>
				<P>
					Subscribe to ilooda’s newsletter to receive emails with important articles, <br>
					scheduled webinars and news about upcoming products.
				</P>
				<div class="gf-subscribe-form">
					<div class="input-group">
						<input type="email" class="form-control" id="mailAddr" name="mailAddr" value="" placeholder="Enter email address.">
						<button type="button" onClick="formMail_ft();">Subscribe</button>
					</div>
					<div class="form-checkbox">
						<input type="checkbox" class="form-control" id="isMail" name="isMail" value="Y">
						<label for="isMail">
							<span class="requir">
								I consent to the collection and use of my personal information
							</span> <a onclick="newsPolicyPop()">Learn more</a>
						</label>
					</div>
				</div>
			</div>
		</div>
	</section>
	</form>
	<section class="gf-sitemap-section">
		<div class="minframe">
			<div class="row">
				<div class="col col-sm-12">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head"><span>Why ilooda</span><span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://eng.ilooda.com/ilooda/RnD.php" class="gf-sm-depth2">Technical Capability</a></li>
							<li><a href="https://eng.ilooda.com/ilooda/innovation.php" class="gf-sm-depth2">Treatment Innovation</a></li>
							<li><a href="https://eng.ilooda.com/ilooda/platform.php" class="gf-sm-depth2">Road to Sustainability</a></li>
							<li><a href="https://eng.ilooda.com/ilooda/RA.php" class="gf-sm-depth2">Expertise on RA</a></li>
						</ul>
					</div>
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">Treatments<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
						<li><a href="https://eng.ilooda.com/treatment/" class="gf-sm-depth2">Laser Hair Removal</a></li>
							<li><a href="https://eng.ilooda.com/treatment/skin.php" class="gf-sm-depth2">Skin Resurfacing & Rejuvenation</a></li>
							<li><a href="https://eng.ilooda.com/treatment/scar.php" class="gf-sm-depth2">Scar Treatment</a></li>
							<li><a href="https://eng.ilooda.com/treatment/vascular.php" class="gf-sm-depth2">Vascular</a></li>
							<li><a href="https://eng.ilooda.com/treatment/tattooRemoval.php" class="gf-sm-depth2">Tattoo Removal</a></li>
							<li><a href="https://eng.ilooda.com/treatment/pigmented.php" class="gf-sm-depth2">Pigmented Lesions</a></li>
						</ul>
					</div>
				</div>
				<div class="col col-sm-12">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">Medical<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><b>Aesthetic</b></li>
							<li><a href="" target="_blank" class="gf-sm-depth2">reepot</a></li>
							<li><a href="https://hyzerme.com/" target="_blank" class="gf-sm-depth2">hyzer me</a></li>
							<li><a href="https://eng.ilooda.com/brand/secretRF.php" class="gf-sm-depth2">Secret RF + Secret DUO</a></li>
							<li><a href="https://eng.ilooda.com/brand/veloce.php" class="gf-sm-depth2">VELOCE</a></li>
							<li><a href="https://eng.ilooda.com/brand/fraxis.php" class="gf-sm-depth2">FRAXIS + FRAXIS DUO</a></li>
							<li><a href="https://eng.ilooda.com/brand/healer.php" class="gf-sm-depth2">Healer1064</a></li>
							<li><a href="https://eng.ilooda.com/brand/vikini.php" class="gf-sm-depth2">VIKINI</a></li>
							<li><a href="https://eng.ilooda.com/brand/ultraBeaujet.php" class="gf-sm-depth2">Ultra Beaujet</a></li>
							<li><a href="https://eng.ilooda.com/brand/iris.php" class="gf-sm-depth2">IRIS</a></li>
              <li><a href="https://eng.ilooda.com/brand/curas.php" class="gf-sm-depth2">CuRAS</a></li>
							<li><a href="https://eng.ilooda.com/brand/velux.php" class="gf-sm-depth2">VeLux</a></li>
							<li><a href="https://eng.ilooda.com/brand/pento.php" class="gf-sm-depth2">PENTO</a></li>


							<li><b>Ophthalmic</b></li>
							<li><a href="https://eng.ilooda.com/brand/acutron.php" class="gf-sm-depth2">ACUTRON</a></li>
              <li><a href="https://eng.ilooda.com/brand/reticapture.php" class="gf-sm-depth2">RetiCapture</a></li>

						</ul>
					</div>
				</div>
				<div class="col col-sm-12">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">Services<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://eng.ilooda.com/service/webinar.php" class="gf-sm-depth2">Webinars </a></li>
							<li><a href="https://eng.ilooda.com/service/blog.php" class="gf-sm-depth2">Blogs</a></li>

						</ul>
					</div>
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">All About Vision<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://eng.ilooda.com/vision/ourMission.php" class="gf-sm-depth2">Transforming Healthcare</a></li>
							<li><a href="https://eng.ilooda.com/vision/" class="gf-sm-depth2">Patient Quality of Life</a></li>
							<li><a href="https://eng.ilooda.com/vision/global.php" class="gf-sm-depth2">Global Presence</a></li>
							<li><a href="https://eng.ilooda.com/vision/glance.php" class="gf-sm-depth2">ilooda at a Glance</a></li>
							<li><a href="https://eng.ilooda.com/vision/responsibility.php" class="gf-sm-depth2">Social Responsibility</a></li>
							<li><a href="https://eng.ilooda.com/vision/CI.php" class="gf-sm-depth2">CI</a></li>
						</ul>
					</div>
				</div>
				<div class="col col-sm-12">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">Investors<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://eng.ilooda.com/investor/finance.php" class="gf-sm-depth2">Annual Reports</a></li>
							<li><a href="https://eng.ilooda.com/investor/notice.php" class="gf-sm-depth2">Disclosure Information</a></li>
							<!-- <li><a href="/investor/stock.php" class="gf-sm-depth2">주가 정보</a></li> -->
							<li><a href="https://eng.ilooda.com/investor/irNews.php" class="gf-sm-depth2">NewsPress Releases</a></li>
						</ul>
					</div>
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">Patients<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://eng.ilooda.com/patient/" class="gf-sm-depth2">Treatments&Therapies</a></li>
						</ul>
					</div>
				</div>
				<div class="col hidden-sm">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">Newsroom<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://eng.ilooda.com/newsRoom.php" class="gf-sm-depth2">Newsroom</a></li>
						</ul>
					</div>
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">Careers<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://eng.ilooda.com/career/" class="gf-sm-depth2">Careers</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 visible-sm">
					<div class="gf-sm-item">
						<a href="https://eng.ilooda.com/newsRoom.php" class="gf-sm-depth1">Newsroom</a>
					</div>
					<div class="gf-sm-item">
						<a href="https://eng.ilooda.com/career/" class="gf-sm-depth1">Careers</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="gf-footer">
		<div class="gf-f-top">
			<div class="minframe">
				<div class="gf-f-link">
					<a href="/contact/"><b>Contact US</b></a>
					<a href="/policy/" class="break-point">Legal Information</a> <span class="br-sm"></span>
					<a href="/policy/privacy.php">Privacy Statement</a>
					<a href="/policy/cookies.php">Cookie Use  Notice</a>
				</div>
				<div class="gf-f-other">
					<a href="https://www.facebook.com/Creative-Ilooda-1236696389716003" target="_blank">
						<figure>
							<img src="/images/facebook.png" alt="">
							<figcaption class="sr-only">facebook</figcaption>
						</figure>
					</a>
					<a href="https://www.instagram.com/ilooda.global/" target="_blank">
						<figure>
							<img src="/images/circle-1.png" alt="">
							<figcaption class="sr-only">instagram</figcaption>
						</figure>
					</a>
					<a href="https://www.youtube.com/channel/UCGAwsVKufwicLi5leOEzZJQ" target="_blank">
						<figure>
							<img src="/images/youtube.png" alt="">
							<figcaption class="sr-only">youtube</figcaption>
						</figure>
					</a>
					<a href="https://vimeo.com/user153508039" target="_blank">
						<figure>
							<img src="/images/v.png" alt="">
							<figcaption class="sr-only">vimeo</figcaption>
						</figure>
					</a>
					<a href="https://www.pinterest.co.kr/ilooda_official" target="_blank">
						<figure>
							<img src="/images/pinterest.png" alt="">
							<figcaption class="sr-only">pinterest</figcaption>
						</figure>
					</a>
					<ul class="f-lang">
						<li class="active"><span class="f-lang-txt">ENG</span></li>
						<li><a href="https://www.ilooda.com/" target="_blank" class="f-lang-txt">KOR</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="minframe">
			<div class="gf-copyright"><span>COPYRIGHT Ⓒ <span id="hjNowYear"></span> ILOODA ALL RIGHTS RESERVED.</span></div>
			<address>
				<span>CEO: Yong-Han Kim</span>
				<span>Employer Identification Number: 123-86-07799</span>
				<span>Personal Information Manager: Won Jong Bin</span>
				<span>General Directory Number : +82-31-278-4660</span>
				<span>Email: info@ilooda.com</span>
				<span>Address: Building B. 9 floor,  IS BIZ Tower Central 25, Deokcheon-ro 152beon-gil, Manan-gu, Anyang-si, Gyeonggi-do, Korea</span>
			</address>
		</div>
	</section>

<script>
	var hjNow = new Date();
	var hjNowYear = hjNow.getFullYear();
	$('#hjNowYear').html(hjNowYear);
</script>
<script>
	(function(){
		var langToggle = document.querySelector("#glovalnav .gn-lang");
		var modal = document.getElementById("goEnPop");
		var openBtn = document.querySelectorAll(".goEnHomepage");
		var closeBtn = document.querySelector("#goEnPop .close");

		if(modal){
			for(var i = 0; i < openBtn.length; i++){
				openBtn[i].onclick = function() {
					modal.classList.add('open');
					$('html').addClass('is-scroll-lock');
				}
			}
			if(openBtn){
				closeBtn.onclick = function() {
					modal.classList.remove('open');
					$('html').removeClass('is-scroll-lock');
				}
			}

			window.onclick = function(event) {
				if (event.target == modal) {
					modal.classList.remove('open');
					$('html').removeClass('is-scroll-lock');
				}
			}
		}
		langToggle.onclick = function(){
			langToggle.classList.toggle('active');
		}
	})();
</script>
<script type='text/javascript'>
//<![CDATA[
function formMail_ft()
{
	var frm						=	document.frmMail_ft;

	if ( frm.mailAddr.value == "" ) {
		alert("이메일을 입력해 주세요.");
		frm.mailAddr.focus();
		return false;
	}

	var mail					=	frm.mailAddr.value;
	if ( !email_check(mail) ) {
		alert("이메일 형식을 올바르게 입력해 주세요.");
		frm.mailAddr.focus();
		return false;
	}

	if ( mail.indexOf("hanmail.net") != -1 ) {
		alert("다음 메일로는 뉴스레터를 받을 수 없습니다. 다른 메일을 입력해 주세요.");
		frm.mailAddr.focus();
		return false;
	}

	if ( frm.isMail.checked == false ) {
		alert("개인정보 수집·이용에 동의해 주세요.");
		frm.isMail.focus();
		return false;
	}

	/*
	frm.target					=	"procFrame";
	frm.action					=	"/newsMailProc.php";
	frm.submit();
	*/

	var form					=	document.querySelector("#frmMail_ft");
	var postDate				=	new FormData(form);

	$.ajax({
		url						:	"/newsMailProc.php",
		type					:	"POST",
		data					:	postDate,
		dataType				:	"html",
		//contentType			:	"application/x-www-form-urlencoded; charset=UTF-8",
		async					:	true,
		cache					:	false,
		contentType				:	false,
		processData				:	false,
		success					:	function (data)
		{
			//console.log(data);
			rsDate				=	data.replace( /(\s*)/g, "" );
			if (rsDate == "Y") {
				alert("뉴스레터를 신청해 주셔서 감사합니다.\n입력하신 메일로 인증 메일이 발송되었습니다.\n인증 메일을 확인하여 이메일 인증을 완료해야 뉴스레터를 받으실 수 있습니다.");
				location.href	=	"/";
			} else {
				alert("저장시 에러가 발생하였습니다. 다시 시도해 주세요.");
			}
		}
	});
}

function email_check( email )
{
	var regex					=	/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return (email != '' && email != 'undefined' && regex.test(email));
}
//]]>
</script>	<script src="/js/hyzerme.js"></script>
	<script>
		//언어 탭버튼
		$(function() {
			$('ul.tab_wrap li').click(function() {
				var activeTab = $(this).attr('data-tab');
				$('ul.tab_wrap li').removeClass('on');
				$('.tabcont').removeClass('on');
				$(this).addClass('on');
				$('#' + activeTab).addClass('on');
			})
		});
	</script>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>
	<div id="goTop">
	<a href="javascript:;" title="상단으로">
		<span class="sr-only">상단으로</span>
	</a>
</div>
<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_PATH."/tail.sub.php");