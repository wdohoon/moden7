<?php
	include('./_common.php');
	include(G5_PATH."/head_mission.php");
	
?>
	
	<div class="mining funding">
		<div class="list-head mb10">
			<h2>기부하기</h2>
		</div>
		<div class="section">
			<div class="funding-list">
				<ul>
					<li>
						<a href="#" class="item">
							<div class="img"><img src="img/funding/tmp_thum.jpg"></div>
							<div class="text">
								<h3>필리핀 선교현장을 위한 미션제목 미션 제목 미션 제목 미션제목 미션제목</h3>
								<div class="etc">
									<div class="date">2021-11-22 12:33</div>
									<div class="code">미션코드 : abasdasd</div>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="section">
			<h3>기부하실 수량을 입력해 주세요.</h3>
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
						<dt>기여가능수량 :</dt>
						<dd>999,999,999 OKNA</dd>
					</dl>
					<dl>
						<dt class="blue">사랑리워드 적립 :</dt>
						<dd class="blue">299,999,999 OKNA</dd>
					</dl>
				</div>				
			</div>
		</div>
		
		<div class="section">
			<h4>응원의 메시지를 남겨주세요 !</h4>
			<textarea class="textarea" placeholder="댓글을 남겨보세요."></textarea>
		</div>
		
		
		<button class="btn-type1  block">다음</button>
		
		<div class="caution">
			<div class="tit">기부하기 안내</div>
			<div class="txt">* 기부하기 안내 기부하기 안내<br>
* 기부하기 안내 기부하기 안내<br>
* 기부하기 안내 기부하기 안내<br>
* 기부하기 안내 기부하기 안내<br>
* 기부하기 안내 기부하기 안내<br>
			</div>
		</div>
		

	</div>
	
	
	
	<div class="modal" id="modal1">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>알림</h5>
					<button class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="modal-logout">
						<strong>기부 하시겠습니까?</strong>
						<p class="txt2">금액이 확실하신지 확인해 주세요.</p>
					</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn1 block btn-s" data-dismiss="modal">예</button>
					<button class="btn2 block btn-s" data-dismiss="modal">취소</button>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	<script>
	
	$(".btn-type1").click(function(){
		$('#modal1').modal();
	})

	$(".modal-footer .btn1").click(function(){
		location.href="/certification_1.php";
	})



	// 탭 기능
	$('.tabs2 > a').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('.funding-list > div').eq($(this).index()).fadeIn(300).siblings().hide();
		return false;
	});
	</script>
	
	

<?php	
	include(G5_PATH."/tail.php");	
?>