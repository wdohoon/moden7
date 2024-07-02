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



<div class="prd-view">
		<div class="head">
			<h3><?php echo $this_item['it_name'];?></h3>
			<div class="img"><img src="/data/item/<?php echo $this_item['it_img1'];?>"></div>
			<div class="subj"><?php echo $this_item['it_name'];?></div>
			<div class="dc">
				<strong>99%</strong>
				<del><?php echo $this_item['it_cust_price'];?> OKNA</del>
			</div>
			<div class="price"><?php echo $this_item['it_price'];?> OKNA</div>
			<div class="desc">*개당 99,999,999.9999 Pts 활동보너스가 적립됩니다.</div>
		</div>
	</div>
	
	<hr class="hr">
	
	
	<div class="prd-view">
		<div class="body">
			<h3>상품상세</h3>			
			<div class="text">
				<?php echo $this_item['it_explan'];?>
			</div>
		</div>
	</div>
	
	<hr class="hr">


	<form id="buy_form" action="/shop/goome.php" class="" method="get">
		<input type="text" name="ea" value="1" class="ea">
		<input type="text" name="price" value="<?php echo $this_item['it_price'];?>" class="t_price">
		<input type="text" name="ea_price" value="<?php echo $this_item['it_price'];?>" class="ea_price">
		<input type="text" name="it_id" value="<?php echo $this_item['it_id'];?>" class="it_id">

	</form>
	<form id="present_form" action="/shop/present_info.php" class="" method="get">
		<input type="text" name="ea" value="1" class="ea">
		<input type="text" name="price" value="<?php echo $this_item['it_price'];?>" class="t_price">
		<input type="text" name="ea_price" value="<?php echo $this_item['it_price'];?>" class="ea_price">
		<input type="text" name="it_id" value="<?php echo $this_item['it_id'];?>" class="it_id">
	</form>


	
	<div class="prd-view margin">
		<div class="description">
			<h3>[쇼핑가이드]</h3>
			<div class="box">
				<h4>[배송]</h4>
				<div>배송 방법: 택배<br>
배송 지역: 전국지역<br>
배송비: 2,500원<br>
배송 기간: 영업일 기준 2일 ~ 5일<br>
배송 안내: 산간벽지나 도서지방 또는 국제배송의 경우 추가금액을 지불하셔야 하는 경우가 있습니다.<br>
고객님께서 주문하신 상품은 입금확인후 배송해 드립니다. 다만, 상품종류에 따라서 상품의 배송이 다소 지연될 수 있습니다.
				</div>
				
				<h4>[교환 및 반품]</h4>
				<div><strong>교환 및 반품 주소</strong><br>
- 서울특별시 강남구 역삼동 00빌딩 1000호 테헤란로 99길 [12345]<br><br>

<strong>교환 및 반품이 가능한 경우</strong><br>
-상품을 공급 받으신 날로부터 3일 이내, 포장을 개봉하였거나 포장이 훼손되어 상품가치가 상실된 경우에는 교환/반품이 불가능합니다.<br>
-공급 받으신 상품 및 용역의 내용이 표시 및 광고 내용과 다르거나 다르게 이행된 경우에는 공급 받으신 날로부터 3일 이내<br><br>

<strong>교환 및 반품이 불가능한 경우</strong><br>
-고객님의 책임 있는 사유로 상품 등이 멸실 또는 훼손된 경우. 단, 상품의 내용을 확인하기 위하여 포장 등을 훼손한 경우는 제외<br>
-포장을 개봉하였거나 포장이 훼손되어 상품가치가 상실된 경우<br>
-고객님의 사용 또는 일부 소비에 의하여 상품의 가치가 현저히 감소한 경우<br>
-시간의 경과에 의하여 재판매가 곤란할 정도로 상품 등의 가치가 현저히 감소한 경우<br>
-복제가 가능한 상품 등의 포장을 훼손한 경우<br>
(자세한 내용은 게시판 또는 [Viva Studio] 홈페이지를 이용해 주시기 바랍니다.<br>
*고객님의 마음이 바뀌어 교환, 반품을 하실 경우 상품반송 비용은 고객님께서 부담하셔야 합니다. (색상 교환, 사이즈 교환 등 포함)
				</div>
				<h4 class="f16">[입점자정보]</h4>
				<div><strong>상호명: Viva Studio ㅣ 대표자: 홍길동 ㅣ 사업자등록번호: 111-11-12345 ㅣ전화번호: 010-1111-1111 ㅣ 이메일: hongildong@hongildong.com ㅣ 사업장주소: 서울시 강남구 역삼동 테헤란로 99-99 00빌딩 111호 ㅣ 통신판매업신고번호: 2000 서울강남-0099 ㅣ 기타: 홈페이지 (www.abcd.com)</strong>

				</div>
			</div>
		</div>
	</div>
	
	
	
	
	<div class="order-fixed">
		<div class="length">
			<strong>주문수량</strong>
			<div class="num">
				<button class="minusbt">-</button>
				<input type="tel" class="inp-num ea_num" value="1">
				<button class="plusbt">+</button>
			</div>
		</div>
		<div class="price">
			<del class="delbesoo"><?php echo $this_item['it_cust_price']?> OKNA</del>
			<span class="">총</span>
			<strong class="pricebesoo"><?php echo $this_item['it_price']?> OKNA</strong>
		</div>
		<div class="txt">총 299,999,999.9777 Pts 활동보너스가 적립됩니다.</div>
		<div class="btns">
			<button class="btn-buy">구매하기</button><!--disabled-->
			<button class="btn-prs">선물하기</button>
		</div>
	</div>








<script>
	var swi = 1;
	var oneCustPrice = "<?php echo $this_item['it_cust_price']?>";
	var onePrice = "<?php echo $this_item['it_price']?>";


	$(".ea").val(swi);
	$(".t_price").val((onePrice*swi));
	$(".ea_price").val(onePrice);



	$(".plusbt").click(function(){
		swi = swi +1;

		$(".ea_num").val(swi);
		$(".pricebesoo").text((onePrice*swi)+" OKNA");
		$(".delbesoo").text((oneCustPrice*swi)+" OKNA");

		$(".ea").val(swi);
		$(".t_price").val((onePrice*swi));
		$(".ea_price").val(onePrice);

		
	})

	$(".minusbt").click(function(){
		swi = swi-1;
		if(swi<1){
			swi = 1;
			alert('1개이상 누르세요');
			return false;
		}
		$(".ea_num").val(swi);
		$(".pricebesoo").text((onePrice*swi)+" OKNA");
		$(".delbesoo").text((oneCustPrice*swi)+" OKNA");
		
		$(".ea").val(swi);
		$(".t_price").val((onePrice*swi));
		$(".ea_price").val(onePrice);

	})

	$(".btn-buy").click(function(){
		//alert();
		$("#buy_form").submit();
	})
	$(".btn-prs").click(function(){
		
		$("#present_form").submit();
	})

</script>


<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');