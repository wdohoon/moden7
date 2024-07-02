<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
	
<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2>인증</h2>
</header>
	
	<div class="register">
		<div class="inner">
			<div class="inp-box lang">
				<div class="lang">
					<button class="select1 block"><img src="img/common/ico_kr.png" alt="한국"> +82  <span>국가를 선택해 주세요.</span></button>
				</div>
			</div>
			<div class="inp-box type2">
				<input type="tel" class="inp1" value="01034511192">
				<button class="btn1 f12">인증번호전송</button>
			</div>
			<div class="form-desc">*본인확인 절차이며, 다른 용도로 사용되지 않습니다. </div>
			
			<div class="inp-box type2">
				<input type="tel" class="inp1" placeholder="인증번호를 입력해 주세요.">
				<button class="btn1 f12" disabled >인증하기</button>
			</div>
			
			<div class="mb20"><button class="btn1 block" disabled>다음</button></div>
		</div>
	</div>
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>
