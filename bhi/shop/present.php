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




	
	
	
	<div class="order-list">
		<div class="list-head">
			<h2>결제하기</h2>
		</div>
		<div class="order-item type2">
			<div class="info">
				<div class="img"><p><img src="/data/item/<?php echo $this_item['it_img1'];?>"></p></div>
				<dl>
					<dt><?php echo $this_item['it_name'];?></dt>
					<dd>주문수량: <?php echo $_GET['ea'];?>개</dd>
				</dl>
			</div>
			<div class="price-box">
				<div class="box">
					<dl>
						<dt>총 상품금액</dt>
						<dd><strong class="black"><?php echo $_GET['price'];?> OKNA</strong></dd>
					</dl>
					<dl>
						<dt>할인예상금액</dt>
						<dd><strong>- 222,222 OKNA</strong></dd>
					</dl>
				</div>
				<div class="box">
					<dl>
						<dt class="f13">최종 주문금액</dt>
						<dd><b><?php echo $_GET['price'];?> OKNA</b></dd>
					</dl>
					<dl>
						<dt class="normal">적립 활동보너스</dt>
						<dd class="normal">+ 222,222 Pts</dd>
					</dl>
				</div>
			</div>
		</div>
		
		<div  class="order-recive">
			<h2><strong>선물 받으시는 분</strong><a href="/shop/present_info.php?ea=<?php echo $_GET['ea']?>&price=<?php echo $_GET['price']?>&ea_price=<?php echo $_GET['ea_price']?>&it_id=<?php echo $_GET['it_id']?>" class="modify_pinfo">수정</a></h2>
			<div class="box">
				<dl>
					<dt>이름: </dt>
					<dd><?php echo $_GET['r_name'];?></dd>
				</dl>
				<dl>
					<dt>휴대폰: </dt>
					<dd><?php echo $_GET['r_phone'];?></dd>
				</dl>
			</div>
		</div>
		
	</div>
	
	
	
	
	<div class="fixed-btn">
		<div class="in">
			<button>결제하기</button>
		</div>
	</div>


	
	<div class="modal" id="modalAlert1">
		<form action="/shop/present_update.php" method="post" id="present_update">		
			<input type="text" name="price" value="<?php echo $_GET['price']?>">
			<input type="text" name="ea" value="<?php echo $_GET['ea']?>">
			<input type="text" name="ea_price" value="<?php echo $_GET['ea_price']?>">
			<input type="text" name="it_id" value="<?php echo $_GET['it_id']?>">
			<input type="text" name="mb_id" value="<?php echo $member['mb_id']?>">
			<input type="text" class="inp-r" name="r_name" value="<?php echo $_GET['r_name'];?>">
			<input type="tel" class="inp-r" name="r_phone" value="<?php echo $_GET['r_phone'];?>">


			<div class="modal-dialog" style="max-width:800px">
				<div class="modal-content">
					<div class="modal-header">
						<h5>알림</h5>
						<button class="close" data-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<div class="modal-logout">
							<strong>결제 하시겠습니까?</strong>
							<p class="txt2">결제하시려는 상품과 금액이 확실하신지 확인해 주세요.</p>
						</div>
						<div class="modal-inps">
							<div class="tit">핀번호</div>
							<input type="tel" class="inp" placeholder="4자리 핀번호를 입력해 주세요.">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn1 block btn-s" data-dismiss="modal">예</button>
						<button class="btn2 block btn-s" data-dismiss="modal">취소</button>
					</div>
				</div>
			</div>
		</form>
	</div>


	

	
	<script>
	$(".modify_pinfo").click(function(){
	
	
	})


	$(".fixed-btn .in button").click(function(){
	
		$('#modalAlert1').modal();

	})
	$(".modal-footer .btn1").click(function(){
	
		var inpp = $(".modal-inps .inp").val();
		if(!inpp){
		alert('핀번호를 4자리를 입력해주세요');
		return false;
		}else{
		$("#present_update").submit();
		}

	})
	
	</script>




<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');?>