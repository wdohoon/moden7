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
<style>
	.btns .btn1.bg-red a{color: #fff;}
</style>	
<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2>내 참여현황</h2>
</header>
	
	
	
	
	
	<div class="funding-status">
		<ul class="funding-list type2">
			<li>
				<div class="item">
					<div class="img"><img src="img/funding/tmp_thum.jpg"></div>
					<div class="text">
						<h3>필리핀 선교현장을 위한 미션제목 미션 제목 미션 제목 미션제목 미션제목</h3>
						<div class="etc">
							<div class="date">2021-11-22 12:33</div>
							<div class="code black">미션코드 : adasdasdd</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="tabs3">
			<a href="#" class="active">내 기부현황</a>
			<a href="#">내 펀딩현황</a>
		</div>
		
		<div class="status-wrap">
			<div class="cont">
				<div class="f-status">
					<dl>
						<dt>내 참여 기부자산</dt>
						<dd>999,999,999 OKNA<small>= 999,999,999 USD</small></dd>
					</dl>
					<hr>
					<dl>
						<dt class="red">사랑리워드 페이백</dt>
						<dd>999,999,999 OKNA<small>= 999,999,999 USD</small></dd>
					</dl>
				</div>
				
				
			</div>
			<div class="cont" style="display: none">
				<div class="mining">
					<div class="section">
						<div class="mine">
							<div class="my-mine"><img src="img/common/ico_user.svg"> <strong>홍길동</strong> 님의 펀딩하기 투입자산</div>
							<div class="price">$ 999,999,999.9999</div>
						</div>

						<hr class="hr2">

						<div class="acc-mining">
							<div class="flex mb15">
								<div class="tit red">누적 펀딩</div>
								<div class="price">$999,999,999.9999 / 999,999,999.9999 </div>
							</div>
							<div class="progress">
								<em style="width:80%"></em>
							</div>
						</div>

						<hr class="hr2">

						<div class="reword">
							<dl class="total">
								<dt class="red">사랑 리워드</dt>
								<dd>$ 999,999,999.0000 (일)</dd>					
							</dl>
						</div>

						<hr class="hr2">

						<div class="flex type2">
							<div class="tit red">시작 (갱신일) :</div>
							<div class="txt">2099-12-31 15:46</div>
						</div>
						<hr class="hr2">

						<div class="desc1">* 채굴된 자산은 익일 08시 (GMT +9)에 일괄 지급됩니다.</div>

						<div class="btns">
							<button class="btn1 bg-red block btn-s mb15"><a href="/mypun_choo.php">펀딩 자산 추가하기</a></button>
							<button class="btn3 block btn-s">해지하기</button>
						</div>

					</div>


				</div>
				
				
			</div>
				
				
		</div>
	</div>
	
	
	
	
	
	<script>
	$('.tabs3 a').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('.status-wrap > div').eq($(this).index()).fadeIn(300).siblings().hide();
		return false;
	})
	</script>
	
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>