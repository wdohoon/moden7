<?php
include_once('./_common.php');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/index.php');
    return;
}

define("_INDEX_", TRUE);

include_once(G5_SHOP_PATH.'/shop.head.php');



?>


<div class="order-list">
	<div class="list-head">
		<h2>구매 내역</h2>
	</div>
	<div class="order-item">
		<div class="num">
			<p>주문번호: 12341234123412341234</p>
			<p><strong>주문일시</strong> 2019.10.22 19:14:36</p>
		</div>
		<div class="to">To.나</div>
		<div class="info">
			<div class="img"><p><img src="/img/shop/tmp1.jpg"></p></div>
			<dl>
				<dt>네이버페이 5,000원</dt>
				<dd>주문수량: 3개</dd>
			</dl>
			<div class="stat">
				<div class="t1">[결제완료]</div>
				<div class="btns">
					<a href="javascript:;" class="refund_pop">환불문의</a>
				</div>
			</div>
		</div>
		<div class="price-box">
			<div class="box">
				<dl>
					<dt>주문금액</dt>
					<dd><strong>222,222,222 OKNA</strong></dd>
				</dl>
				<dl>
					<dt>활동보너스 적립</dt>
					<dd><b>222,222,222 Pts</b></dd>
				</dl>
			</div>
		</div>
	</div>
	
	
	
	<div class="page">
		<a href="#" class="prev">&lt;</a>
		<span>1 / 20</span>
		<a href="#" class="next">&gt;</a>
	</div>
	
</div>


<div class="modal" id="modalRefund">
	<div class="modal-dialog" style="max-width:800px">
		
	</div>
</div>


<script>
$(".refund_pop").click(function(){
	alert('아작스');
	$(".modal-dialog").html('');
	
	$.ajax({

	url: "/shop/refoud_ajax.php",
	type: "POST",
	data: {'data':'yy'},
	success: function(msg){
	 
		$(".modal-dialog").html(msg);
	    $('#modalRefund').modal();
	  }
	});


	//
	
	
	
})

</script>



<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');?>