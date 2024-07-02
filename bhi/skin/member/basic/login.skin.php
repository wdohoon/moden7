<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

include_once(G5_PATH.'/head.php');
?>

<style>
form{background:#F6F6F6;padding:13vw 0;}
.login-wrap{width: 90%;margin:0 auto;background:#fff;height: 751px;border-radius: 16px}
.blues{background: #4896EC;width: 100%;height: 94px;border-radius: 16px 16px 0 0;}
.logo a{font-size: 56px;font-weight: 500;line-height: 34px;letter-spacing: -0.025em;text-align: center;display: flex;align-items:center;justify-content:center;margin:84px 0 64px;}
.inp-box{display: flex;justify-content:center;}
.inp-box input{width: 80%;}
.btn1{width: 80%;height: 72px;background: #4896EC;}
.mb20{display: flex;justify-content:center;}
.sky{color: #4896EC;}

@media screen and (max-width: 875px) {
	
}
</style>
<!-- 로그인 시작 { -->
<form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
<input type="hidden" name="url" value="<?php echo $login_url ?>">
		<div class="login-wrap">
			<div class="blues"></div>
			<div class="logo"><a href="/"><img src="/skin/member/basic/img/login_icon.png" alt="">BHICOINZ</a></div>
			<div class="inner">
<!----				<div class="inp-box lang"> --->
				<div class="inp-box">
<!---					<div class="lang">
						<button type="button" class="select" id="BtnLangChoice"><img src="/img/common/ico_kr.png" alt="한국"> +82</button>
					</div> --->
					<input type="tel" class="inp" name="mb_id" id="login_id" placeholder="아이디를" size="20" maxLength="20">
					
				</div>
				<div class="inp-box">
					<input type="password" class="inp" name="mb_password" id="login_pw" size="20" maxLength="20" placeholder="비밀번호">
				</div>
				<!---
				<div class="inp-box">
					<input type="password" class="inp danger" name="mb_password" id="login_pw" size="20" maxLength="20" placeholder="비밀번호" style="width:100%">
				</div>
				--->
				<div class="mb20"><button class="btn1 block" type="submit">로그인</button></div>
				
				<div class="etc">
					<a href="<?php echo G5_BBS_URL ?>/register_form.php" class="sky">회원가입</a>
					<a href="/password_change.php" target="_blank" id="" class="gray">비밀번호 찾기</a>
				</div>
			</div>
		</div>
		
		
		<!--  국가선택 레이어 -->
		<div class="layer-lang">
			<header>
				<div class="left">
					<a href="#" class="close"></a>
				</div>
				<h2>국가선택</h2>
			</header>
			<div class="search">
				<div class="head">
					<input type="text" class="inp-srch" placeholder="Search">
					<button class="btn-srch"></button>
				</div>
				<div class="body">
					<ul>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+982</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span><img src="img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--  // 국가선택 레이어 -->
</form>

<script>
	$('#BtnLangChoice').click(function(){
		$('.layer-lang').fadeIn(300);
	})
	$('.layer-lang .close').click(function(){
		$('.layer-lang').fadeOut(300);
	});

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
include_once(G5_PATH.'/tail.php');
