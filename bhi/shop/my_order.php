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


$this_item = sql_fetch("select * from g5_shop_item where it_id='".$_GET['it_id']."'");

?>


<div class="order-head">
	<div class="inner">
		<div class="head">
			<h2>내 주문정보</h2>
		</div>
		<div class="body">
			<dl>
				<dt>이름:</dt>
				<dd><input type="text" class="inp-order" value="홍길동" readonly></dd>
			</dl>
			<dl>
				<dt>이메일:</dt>
				<dd><input type="text" class="inp-order" value="Gildong1920@naver.com" readonly></dd>
			</dl>
			<dl>
				<dt>연락처:</dt>
				<dd><input type="text" class="inp-order" value="010-1111-2222" readonly></dd>
			</dl>
			<dl class="last">
				<dt>내 OKNA주소:</dt>
				<dd><input type="text" class="inp-order" value="abwe0987ga98hasdv 89h0asdadfb24ej983ihg98y" readonly></dd>
			</dl>
		</div>
	</div>
</div>

<hr class="hr">

<div class="order-list">
	<div class="list-head">
		<h2>구매 내역<small>[최근 3건]</small></h2>
		<a href="/shop/my_order_all.php" class="btn-right">더보기 &gt;</a>
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
					<a href="javascript:;" class="refund_pop" data-orderid="">환불문의</a>
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
	
	
	
	<div class="more">
		<a href="/shop/" class="btn-type1">쇼핑 더 하기</a>
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