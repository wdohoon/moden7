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

<!-- } 콘텐츠 끝 -->

<style>
	.show1300{display: none;}
	.mo{display: none;}
	#ft{background: #2A2E37;}
	footer{
		width: 1240px;
		height: auto !important;
		margin: 0 auto;
		background: #2A2E37;
		padding: 30px 0;
	}
	footer .up{
		display: flex;
		justify-content:space-between;
		align-items:flex-start;
		width: 100%;
		text-align: left;
		margin-bottom: 30px;
	}
	footer .up .logo_ft{
		width: 84px;
		height: 27px;
	}
	footer .up .left,
	footer .up .right{
		width: 528px;
		padding: 0 30px;
		opacity: 0.8;
		font-weight: 300;
		color:#fff;
	}
	footer .up .left>ul,
	footer .up .right>ul{
		display: flex;
		gap:23px;
		width: 100%;
	}
	footer .up .left{position: relative;}
	footer .up .left:after{
		content:'';
		position: absolute;
		top:0;
		right:0;
		width: 1px;
		height:78px ;
		background: #565961;
	}
	footer .up .left:before{
		content:'';
		position: absolute;
		top:50%;
		left:0;
		transform:translateY(-50%);
		width: 1px;
		height:78px ;
		background: #565961;
	}
	footer .up .left ul li a,
	footer .up .right ul li a{
		color:#fff;
		font-weight: 300;
	}
	.down{
		position: relative;
		padding: 15px 0 30px;
	}
	.down:after{
		position: absolute;
		content:'';
		top:0;
		left:50%;
		transform:translateX(-50%);
		width: 1240px;
		height: 1px;
		background: #454951;
	}
	.down p{
		width: 1240px;
		margin: 0 auto;
		text-align: left;
		color:#fff;
		opacity: 0.5;
	}
	.down a{
		display: block;
		width: auto;
		text-align: left;
		color:#fff;
	}

	@media(max-width: 1300px){
		.show1300{display: block;}
		footer{width: 97.3846vw;}
		footer .up{margin-bottom: 2.3077vw;}
		footer .up .logo_ft{	width: 6.4615vw;	height: 2.0769vw;}
		footer .up .left,
		footer .up .right{	width: 40.6154vw;padding: 0 2.3077vw;	}
		footer .up .left>ul,
		footer .up .right>ul{gap:1vw;}
		footer .up .left:after{	width: 0.0769vw;	height:6.0000vw ;}
		footer .up .left:before{	width: 0.0769vw;	height:6.0000vw ;}
		.down{padding: 1.1538vw 0 2.3077vw;}
		.down:after{	width: 95.3846vw;	height: 0.0769vw;	}
		.down p{	width: 95.3846vw;}
	}

	@media(max-width: 1110px){
		.show1300{display: none;}
		footer .up{display: block;}
		footer .up .left,
		footer .up .right{width: 100%;padding:10px 0;display: flex;justify-content:space-between;}
		footer .up .left:after,
		footer .up .left:before{display: none;}
		footer .up .left>ul, footer .up .right>ul{width: 50%;}
	}

	@media(max-width: 920px){
		.show1300{display: block;}
		.mo{display: block;}	
		footer .up{display: block; text-align: center;}
		footer .up .logo_ft{	width: 84px;height: 27px;}
		footer .up .left,
		footer .up .right{width: 100%;padding:10px 0;display: block;font-size: 14px;}
		footer .up .left:after,
		footer .up .left:before{display: none;}
		footer .up .left>ul, footer .up .right>ul{width: 100%;display: block;}
		.down p{text-align: center;font-size: 14px;}
		footer .up .left ul li a,footer .up .right ul li a{	font-size: 14px;}
	}





</style>

<!-- 하단 시작 { -->
<div id="ft">
	<footer>
		<div class="up">
			<img src="../img/footer_logo.png" alt="" style="padding: 0;" class="logo_ft"> 
			<div class="left">
				<div class="txt">
					<p>KIDB 서울특별시 중구 명동 11길<br class="mo"> 20 서울 YWCA빌딩(신관)<br class="show1300"> 10층 (우 04538)</p>
					<p>KIDB채권 중개 KIDB FIXED INCOME<br class="mo"> BROKERAGE TEL : 02-771-4370</p>
				</div>	
				<ul>
					<li><a href="privacy.php">개인정보처리방침</a></li>
					<li><a href="information.php">신용정보활용체제</a></li>
					<li><a href="policy.php">정보교류차단정책</a></li>
					<li><a href="/consumer.php">소비자보호규정체제</a></li>
				</ul>
			</div>
			<div class="right">
				<div class="txt">
					<p>Seoul YWCA Bldg., 11th Fl. 20,<br class="mo"> Myeongdong 11-gil, <br class="show1300"> Jung-gu, Seoul, 04538 Korea</p>
					<p>KIDB자금중개 KIDB MONEY<br class="mo"> BROKERAGE TEL : 02-311-7500</p>
				</div>
				<ul>
					<li><a href="privacy2.php">개인정보처리방침</a></li>
					<li><a href="information2.php">신용정보활용체제</a></li>
				</ul>
			</div>
		</div>

	</footer>
	<div class="down">
			<p>COPYRIGHT ⓒ KIDB. ALL RIGHTS RESERVED.</p>
			<p><a href="/adm">관리자 로그인</a></p>
		</div>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<script>
// 화면 크기를 확인하고 필요한 줄바꿈을 추가 또는 제거합니다.
function handleFooterInfoText() {
    const footerInfo = document.querySelector('.footer_info');
    const windowWidth = window.innerWidth;

    if (windowWidth < 1024) {
        // 화면 폭이 768px보다 작을 때
        footerInfo.innerHTML = `KIDB채권중개 KIDB FIXED INCOME BROKERAGE <br>| Tel: 02-771-4370 | Fax: 02-6958-8665 <br>| 주소: 서울특별시 중구 명동 11길 20 서울 YWCA빌딩(신관) 12층 (우 04538)`;
    } else {
        // 화면 폭이 768px 이상일 때
        footerInfo.innerHTML = `KIDB채권중개 KIDB FIXED INCOME BROKERAGE | Tel: 02-771-4370 | Fax: 02-6958-8665 | 주소: 서울특별시 중구 명동 11길 20 서울 YWCA빌딩(신관) 12층 (우 04538)`;
    }
}

// 페이지 로드 및 창 크기 변경 이벤트에 대한 리스너를 추가합니다.
window.addEventListener('load', handleFooterInfoText);
window.addEventListener('resize', handleFooterInfoText);

// 페이지 로드 시 한 번 호출하여 초기 상태를 설정합니다.
handleFooterInfoText();

</script>

<?php
include_once(G5_PATH."/tail.sub.php");