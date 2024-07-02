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
			<a href="/mypun_my_participation.php">내 기부현황</a>
			<a href="#" class="active">내 펀딩현황</a>
		</div>
		
		<div class="status-wrap">
			<div class="cont" style="display: none">
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
			<div class="cont">
				<div class="mining funding">
		
		
					<div class="section">
						<h3>펀딩하실 수량을 입력해 주세요.</h3>
						<div class="count-box">
							<input type="text" class="inp1 text-right" value="999,999,999.0000" style="width:100%;">
							<strong>OKNA</strong>
						</div>
						<div class="bank-status2">
							<div>
								<dl>
									<dt>나의 OKNA잔고 : </dt>
									<dd>
										999,999.0000 OKNA
										<small> =999,999,999.0000 USD</small>
									</dd>
								</dl>
								<dl>
									<dt>펀딩가능수량 :</dt>
									<dd>999,999,999 OKNA</dd>
								</dl>
							</div>				
						</div>
					</div>
					<div class="section">
						<div class="bank-status">
							<dl>
								<dt>기존 펀딩 투입자산 :</dt>
								<dd>0 OKNA</dd>
							</dl>
							<dl>
								<dt>펀딩 추가 예정 :</dt>
								<dd>999,999.0000 OKNA<small>=999,999 USD</small></dd>
							</dl>
							<dl>
								<dt>펀딩 추가 후 투입자산 :</dt>
								<dd>999,999.0000 USD<small>=999,999 USD</small></dd>
							</dl>
						</div>
					</div>




					<button class="btn-type1 bg-red block">다음</button>



				</div>
				
				
			</div>
				
				
		</div>
	</div>
	
	
	<div class="modal" id="modal5">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>알림</h5>
					<button class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="modal-logout">
						<strong>펀딩 자산을 추가 하시겠습니까?</strong>
						<p class="txt2">금액이 확실하신지 확인해 주세요.</p>
					</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn1 block btn-s bg-red ">확인</button>
					<button class="btn2 block btn-s" data-dismiss="modal">취소</button>
				</div>
			</div>
		</div>
	</div>

	<script>
	$(".btn-type1").click(function(){
		$('#modal5').modal();
	})
	
	$(".modal-footer .btn1").click(function(){
		location.href="/certification_1.php";
	})
	</script>
	
	
	<script>
	/*$('.tabs3 a').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('.status-wrap > div').eq($(this).index()).fadeIn(300).siblings().hide();
		return false;
	})*/
	</script>
	
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>