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
	<h2>보내기</h2>
</header>
	
	
	<div class="mining">
		<div class="section">
			<div class="mine">
				<div class="num1"><strong>1234asdf1234asdf1234asdf1234</strong> 주소로</div>
				<div class="num2"><strong>999,999,999.0000 BTC</strong> 를(을)</div>
				<div class="num2"><strong>정률</strong> 로(으로)</div>
				<div class="num3">전송하시겠습니까?</div>
				<dl>
					<dt>전송 수수료 :</dt>
					<dd>1% = 999,999,999.0000 BTC</dd>
				</dl>
				<dl>
					<dt>실제 전송되는 금액 :</dt>
					<dd>99,999.0000BTC</dd>
				</dl>
				
				<hr class="hr2">
				
				<div class="btn-box">
					<button class="btn1 btn-s">예</button>
					<button class="btn2 btn-s"><a href="javascript:history.back();">취소</a></button>
				</div>
			</div>
			
		</div>
		
		

	</div>
	
	
	<div class="modal" id="modalAlert">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>알림</h5>
					<button class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="modal-logout">
						<strong>추가 하시겠습니까?</strong>
						<p class="txt2">추가하시려는 자산과 금액이 확실하신지 확인해 주세요.</p>
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
	$(".btn-box .btn1").click(function(){
		$('#modalAlert').modal();
	})
	$(".modal-footer .btn1").click(function(){
		location.href="/certification_1.php";
	})
	
		
	$('#Select1').change(function(){
		$('#Kind').text($(this).val());
		$('#Kind').addClass('active');
	})
	$('#Select2').change(function(){
		$('#Addr').text($(this).val());
		$('#Addr').addClass('active');
	})
	</script>
	
	
	
	
<?php	
	include(G5_PATH."/tail.php");	
?>
