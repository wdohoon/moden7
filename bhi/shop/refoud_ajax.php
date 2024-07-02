<?php
include_once('./_common.php');
?>

<div class="modal-content">
	<div class="modal-header">
		<h5>환불문의</h5>
		<button class="close" data-dismiss="modal"></button>
	</div>
	<div class="modal-body">
		<div class="order-list">
			<div class="order-item">
				<div class="num">
					<p>주문번호: 12341234123412341234</p>
					<p><strong>주문일시</strong> 2019.10.22 19:14:36</p>
				</div>
				<div class="info">
					<div class="img"><p><img src="/img/shop/tmp1.jpg"></p></div>
					<dl>
						<dt>네이버페이 5,000원</dt>
						<dd>주문수량: 3개</dd>
					</dl>
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
		</div>
		<div class="refund-box">
			<div class="refund1">
				<h6>사유선택</h6>
				<select class="select">
					<option>주문실수</option>
					<option>옵션</option>
					<option>옵션</option>
				</select>
			</div>
			<h6 class="mb5">상세사유</h6>
			<div class="textarea-box">
				<textarea class="textarea">상세사유 상세사유 상세사유 상세사유 상세사유 상세사유 상세사유 상세사유 상세사유 상세사유 상세사유 </textarea>
			</div>
			<div class="order-head">
				<div class="inner">
					<div class="head">
						<h2>환불 받으실 정보</h2>
					</div>
					<div class="body">
						<dl>
							<dt>이름:</dt>
							<dd><input type="text" class="inp-order" value="홍길동" ></dd>
						</dl>
						<dl>
							<dt>이메일:</dt>
							<dd><input type="text" class="inp-order" value="Gildong1920@naver.com" ></dd>
						</dl>
						<dl>
							<dt>연락처:</dt>
							<dd><input type="text" class="inp-order" value="010-1111-2222" ></dd>
						</dl>
						<dl class="last">
							<dt>내 OKNA주소:</dt>
							<dd><input type="text" class="inp-order" value="abwe0987ga98hasdv 89h0asdadfb24ej983ihg98y" ></dd>
						</dl>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn1 block btn-s" >신청하기</button>
	</div>
</div>