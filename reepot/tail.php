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
          <span class="news">뉴스레터 구독 신청</span>
        </div>
				<p>
					이루다의 뉴스레터를 구독 신청하시면<br/>
					중요한 기사, 웨비나 주요 일정, 신제품 소식 등을 이메일로 받아보실 수 있습니다.
				</p>
				<div class="gf-subscribe-form">
					<div class="input-group">
						<input type="email" class="form-control" id="mailAddr" name="mailAddr" value="" placeholder="이메일을 입력해 주세요.">
						<button type="button" onClick="formMail_ft();">구독 신청</button>
					</div>
					<div class="form-checkbox">
						<input type="checkbox" class="form-control" id="isMail" name="isMail" value="Y">
						<label for="isMail">
							<span class="requir">개인정보 수집·이용 동의</span> <a onclick="newsPolicyPop()">자세히 보기</a>
						</label>
					</div>
				</div>
			</div>
		</div>
	</section>
	</form>
	<section class="gf-sitemap-section">

		<div class="minframe ilooda-frame">

			<div class="row">
				<div class="col col-sm-12">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head"><span>우리의 역량</span><span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://www.ilooda.com/ilooda/RnD.php" class="gf-sm-depth2">창조적 R&D 경쟁력</a></li>
							<li><a href="https://www.ilooda.com/ilooda/innovation.php" class="gf-sm-depth2">더 나은 치료를 위한 혁신</a></li>
							<li><a href="https://www.ilooda.com/ilooda/platform.php" class="gf-sm-depth2">지속가능한 미래 플랫폼</a></li>
							<li><a href="https://www.ilooda.com/ilooda/RA.php" class="gf-sm-depth2">임상·인허가 전문 그룹</a></li>
						</ul>
					</div>
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">치료<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://www.ilooda.com/treatment/" class="gf-sm-depth2">제품 포트폴리오</a></li>
							<!-- <li><a href="/treatment/pipeline.php" class="gf-sm-depth2">임상 파이프 라인</a></li> -->
						</ul>
					</div>
				</div>
				<div class="col col-sm-12">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">브랜드<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><b>Aesthetic</b></li>
							<li><a href="" target="_blank" class="gf-sm-depth2">reepot</a></li>
							<li><a href="" target="_blank" class="gf-sm-depth2">hyzer me</a></li>
							<li><a href="https://www.ilooda.com/brand/secretRF.php" class="gf-sm-depth2">Secret RF + Secret DUO</a></li>
							<li><a href="https://www.ilooda.com/brand/veloce.php" class="gf-sm-depth2">VELOCE</a></li>
							<li><a href="https://www.ilooda.com/brand/fraxis.php" class="gf-sm-depth2">FRAXIS + FRAXIS DUO</a></li>
							<li><a href="https://www.ilooda.com/brand/healer.php" class="gf-sm-depth2">Healer1064</a></li>
							<li><a href="https://www.ilooda.com/brand/vikini.php" class="gf-sm-depth2">VIKINI</a></li>
							<li><a href="https://www.ilooda.com/brand/curas.php" class="gf-sm-depth2">CuRAS</a></li>
							<li><a href="https://www.ilooda.com/brand/ultraBeaujet.php" class="gf-sm-depth2">Ultra Beaujet</a></li>
							<li><a href="https://www.ilooda.com/brand/igraft.php" class="gf-sm-depth2">i-graft</a></li>
							<li><b>Ophthalmic</b></li>
							<li><a href="https://www.ilooda.com/brand/acutron.php" class="gf-sm-depth2">ACUTRON</a></li>
						</ul>
					</div>
				</div>
				<div class="col col-sm-12">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">서비스<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://www.ilooda.com/service/educationCenter.php" class="gf-sm-depth2">교육 훈련 센터 </a></li>
							<li><a href="https://www.ilooda.com/service/support.php" class="gf-sm-depth2">서비스 지원</a></li>
							<li><a href="https://www.ilooda.com/service/webinar.php" class="gf-sm-depth2">웨비나</a></li>
							<li><a href="https://iloodamall.com/" class="gf-sm-depth2">컨시어지</a></li>
						</ul>
					</div>
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">우리의 비전<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://www.ilooda.com/vision/ourMission.php" class="gf-sm-depth2">우리의 미션</a></li>
							<li><a href="https://www.ilooda.com/vision/" class="gf-sm-depth2">우리의 비전</a></li>
							<li><a href="https://www.ilooda.com/vision/global.php" class="gf-sm-depth2">글로벌 네트워크</a></li>
							<li><a href="https://www.ilooda.com/vision/glance.php" class="gf-sm-depth2">사업 성과</a></li>
							<li><a href="https://www.ilooda.com/vision/responsibility.php" class="gf-sm-depth2">사회적 책임</a></li>
							<li><a href="https://www.ilooda.com/vision/CI.php" class="gf-sm-depth2">CI</a></li>
						</ul>
					</div>
				</div>
				<div class="col col-sm-12">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">투자자용<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://www.ilooda.com/investor/finance.php" class="gf-sm-depth2">재무 정보</a></li>
							<li><a href="https://www.ilooda.com/investor/notice.php" class="gf-sm-depth2">공시 정보</a></li>
							<!-- <li><a href="/investor/stock.php" class="gf-sm-depth2">주가 정보</a></li> -->
							<li><a href="https://www.ilooda.com/investor/irNews.php" class="gf-sm-depth2">IR 뉴스</a></li>
						</ul>
					</div>
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">환자용<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://www.ilooda.com/patient/" class="gf-sm-depth2">Treatments&Therapies</a></li>
						</ul>
					</div>
				</div>
				<div class="col hidden-sm">
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">뉴스룸<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://www.ilooda.com/newsRoom.php" class="gf-sm-depth2">뉴스룸</a></li>
						</ul>
					</div>
					<div class="gf-sm-item">
						<b class="gf-sm-depth1" data-role="accordion-head">함께 이루자<span class="icon">+</span></b>
						<ul class="gf-sm-body" data-role="accordion-body">
							<li><a href="https://www.ilooda.com/career/" class="gf-sm-depth2">함께 이루자</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 visible-sm">
					<div class="gf-sm-item">
						<a href="https://www.ilooda.com/newsRoom.php" class="gf-sm-depth1">뉴스룸</a>
					</div>
					<div class="gf-sm-item">
						<a href="https://www.ilooda.com/career/" class="gf-sm-depth1">함께 이루자</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="gf-footer">
		<div class="gf-f-top">
			<div class="minframe minframe-pa">
				<div class="gf-f-link">
					<a href="https://ilooda.com/contact/"><b>고객센터  /  FAQs </b></a>
					<!-- <a href="/reference.php"><b>자료실</b></a> 2022-05-23 미노출 요청-->
					<a href="https://ilooda.com/policy/" class="break-point">이용약관</a> <span class="br-sm"></span>
					<a href="https://ilooda.com/policy/privacy.php">개인정보처리방침</a>
					<a href="https://ilooda.com/policy/cookies.php">쿠키사용 고지</a>
				</div>
				<div class="gf-f-other">


          <div class="elementor-column  elementor-top-column elementor-element elementor-element-a5e5032" data-id="a5e5032" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-d69be1c elementor-widget__width-auto elementor-widget-mobile__width-auto elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-html" data-id="d69be1c" data-element_type="widget" data-widget_type="html.default">
				<div class="elementor-widget-container">
			<div style="text-align:center;">
<select onchange="openUrl(this);" class="selectFamilySite filter-design" style="width:100px">
    <option value="">Family Site</option>
    <option value="http://www.ilooda.com">ilooda</option>
    <option value="https://www.iloodamall.com">ilooda mall</option>
    <option value="http://www.hyzerme.com">hyzer me</option>
</select>
</div>
<script>
    function openUrl(s){
        var url = s.options[s.selectedIndex].value;
        if (url=="yet")
            alert('준비중 입니다.');
        else if (url=="/")
            location.href="/";
        else if (url!="")
            window.open(url,'_blank');
    }
</script>		</div>
				</div>

				<div class="elementor-element elementor-element-0d345ef elementor-widget__width-auto elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-html" data-id="0d345ef" data-element_type="widget" data-widget_type="html.default">
				<div class="elementor-widget-container">
			<select onchange="openUrl(this);" class="selectLanguage" style="width:100px">
    <option value="">Language</option>
    <option value="/">한국어</option>
    <option value="yet">English</option>
</select>		</div>
				</div>

					</div>
		</div>

				</div>
			</div>
		</div>

    <div class="f-inner-m minframe minframe-pa">
			<div class="left">
        <a href="" ><img src="/images/logo-tablet.png" alt=""></a>
        <img src="/images/view6.gif" alt="" class="view6">
      </div>
      <div class="right">
        <ul>
          <li><a href="https://www.facebook.com/creativeilooda"><img src="/images/facebook.png" alt=""></a></li>
          <li><a href="https://www.instagram.com/ilooda.official"><img src="/images/circle-1.png" alt=""></a></li>
          <li><a href="https://www.youtube.com/channel/UCGAwsVKufwicLi5leOEzZJQ"><img src="/images/youtube.png" alt=""></a></li>
          <li><a href="https://pf.kakao.com/_irvxls"><img src="/images/kakao.png" alt=""></a></li>
          <li><a href="https://vimeo.com/user153508039"><img src="/images/v.png" alt=""></a></li>
          <li><a href="https://www.pinterest.co.kr/ilooda_official"><img src="/images/pinterest.png" alt=""></a></li>
          <li class="mall"><a href="https://www.iloodamall.com/" target="_blank" style="color:#27AAE1;">iloodamall</a></li>
        </ul>

      </div>
		</div>

		<div class="minframe">
			<div class="gf-copyright"><span>COPYRIGHT Ⓒ <span id="hjNowYear"></span> ILOODA ALL RIGHTS RESERVED.</span></div>
			<address>
				<span>대표 : 김용한</span>
				<span>사업자등록번호 : 123-86-07799</span>
				<span>개인정보관리자 : 원종빈</span>
				<span>대표번호 : +82-31-278-4660</span>
				<span>메일 : info@ilooda.com</span>
				<span>주소 : 경기도 안양시 만안구 덕천로 152번길 25, B동 9층</span>
			</address>
		</div>
	</section>
</footer>

<div id="goEnPop" class="modal">
	<div class="modal-inner">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close">&times;</button>
			</div>
			<div class="modal-body">
				<img src="/images/logo-3.png" alt="ilooda">
				<h4>리팟 인터내셔날 웹사이트로 이동합니다.</h4>
				<p class="__inner-cont-txt">
					해당 사이트는 해외 고객만을 위한 컨텐츠로 구성되어 있으며,<br class="visible-lg">
					대한민국의 의료기기 광고 심의 및 규제를 받는<br class="visible-lg"> 컨텐츠와 그 내용이 상이할 수 있습니다.
				</p>
				<div class="modal-btn-box">
					<a href="/index_e.php" target="_blank"  class="go-en-btn" >영문 웹사이트 <span class="arrow"></span></a>
				</div>
			</div>
		</div>
	</div>
</div>

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
</script>
<script src="/js/hyzerme.js"></script>
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