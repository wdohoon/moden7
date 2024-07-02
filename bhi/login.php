<!doctype html>
<html> 
<head>
<meta charset="utf-8">
<title>BHIDEX</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="css/front.css">
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/plugin/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/front.js"></script>

</head>
<body>
	
	<div class="login-wrap">
		<div class="logo">BHIDEX</div>
		<div class="inner">
			<div class="inp-box lang">
			<div class="lang">
				<button class="select" id="BtnLangChoice"><img src="img/common/ico_kr.png" alt="한국"> +82</button>
			</div>
				<input type="tel" class="inp" placeholder="휴대폰 번호 혹은 이메일 주소를 입력해주세요." style="width:100%; ">
			</div>
			<div class="inp-box">
				<input type="password" class="inp" placeholder="비밀번호" style="width:100%">
			</div>
			
			<div class="inp-box">
				<input type="password" class="inp danger" placeholder="비밀번호" style="width:100%">
			</div>
			
			<div class="mb20"><button class="btn1 block">로그인</button></div>
			
			<div class="etc">
				<a href="./bbs/register_form.php" class="blue">회원가입</a>
				<a href="#" class="gray">암호 재설정</a>
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
							<span><img src="img/common/ico_jp.png"></span>
							<p>JAPAN</p>
							<em>+81</em>
						</a>
					</li>

				</ul>
			</div>
		</div>
	</div>
	<!--  // 국가선택 레이어 -->
	
	<script>
	$('#BtnLangChoice').click(function(){
		$('.layer-lang').fadeIn(300);
	})
	$('.layer-lang .close').click(function(){
		$('.layer-lang').fadeOut(300);
	})
	</script>
	

</body>
</html>
