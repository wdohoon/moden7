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
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
.index_wrap{width: 1919px;overflow:hidden;padding-top:154px;}
.swiper {width: 100%;}
.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper1{background: url('/img/index_swiper1.png');width: 100%;height: 740px;}
.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper2{background: url('/img/index_swiper2.png');width: 100%;height: 740px;}
.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper3{background: url('/img/index_swiper3.png');width: 100%;height: 740px;}
.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper4{background: url('/img/index_swiper4.png');width: 100%;height: 740px;}
.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper1 p{font-size: 24px;font-weight: 400;line-height: 24px;padding: 228px 0 19px 320px;}
.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper2 p,.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper3 p,.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper4 p{font-size: 24px;font-weight: 400;line-height: 24px;padding:0 0 43px 315px;}
.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper1 h1{font-size: 64px;font-weight: 500;line-height: 64px;letter-spacing: -0.04em; padding: 0 0 43px 315px;}
.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper2 h1,.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper3 h1,.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper4 h1{font-size: 40px;font-weight: 500;line-height: 64px;letter-spacing: -0.04em; padding: 228px 0 19px 320px;}
.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper1 a,.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper2 a,.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper3 a,.index_wrap .swiper .swiper-wrapper .swiper-slide .index_swiper4 a{width: 160px;height: 40px;border: 1px solid #3D3D3F;font-size: 12px;font-weight: 400;line-height: 14px;letter-spacing: -0.025em;display: flex;justify-content:center;align-items:center;margin-left:320px;}
.swiper-pagination-bullet-active{background: #4A3D39;width: 25px;border-radius:25px;}

.index_container{width: 1280px;margin:0 auto;margin-top: 140px;}
.index_container h4{font-size: 24px;font-weight: 700;line-height: 24px;margin-bottom:60px;}
.index_container .product{display: flex;gap:16px;}
.index_container .product .product_box .product_p1{font-size: 16px;font-weight: 700;line-height: 19.09px;letter-spacing: -0.02em;padding: 16px 0 8px 0;}
.index_container .product .product_box .product_p2{font-size: 14px;font-weight: 400;line-height: 16.71px;color:#707070;padding-bottom: 16px;}
.index_container .product .product_box .product_p3{font-size: 16px;font-weight: 700;line-height: 19.09px;}
.index_container .product .product_box .product_p3 span{color:#D91E1E;}
.index_container .product .product_box .product_p3 del{font-family: Pretendard;font-size: 14px;font-weight: 400;line-height: 16.71px;color:#C8C8C8;}
.index_container .goods{display: flex;justify-content:center;align-items:center;margin-top:80px;}
.index_container .goods a{width: 200px;height: 40px;border: 1px solid #BBBBBB;display: flex;justify-content:center;align-items:center;font-family: Pretendard;font-size: 12px;font-weight: 500;line-height: 14px;letter-spacing: -0.025em;}
.index_container .goods a:hover{background:#222222; color: #fff;}

.index_container .event{margin-top: 140px;}

.index_container .best{margin-top:110px;}
.index_container .best .best_boxs{display: flex; gap:25px; flex-wrap:wrap;}
.index_container .best .best_boxs .box_info{border:1px solid #D9D9D9;width: 236px;height: 76px;text-align:center;}
.index_container .best .best_boxs .box_info img{margin: 14px 10px 14px 18px;}
.index_container .best .best_boxs .box_info .box_p1{font-size: 14px;font-weight: 400;line-height: 14px;margin: 20px 0 8px; height: 36px;display: flex;flex-direction:column;gap:8px;}
.index_container .best .best_boxs .box_info .box_p2{font-size: 14px;font-weight: 400;line-height: 14px; color:#767676;}
.index_container .best .review{display: flex;justify-content: center;margin-top:80px;}
.index_container .best .review a{display: flex;width: 200px;height: 40px;border: 1px solid #BBBBBB;justify-content:center; align-items:center;font-family: Pretendard;font-size: 12px;font-weight: 500;line-height: 14px;letter-spacing: -0.025em;color:#6C6C6C;}
.index_container .best  .review a:hover{background:#222222;color:#fff;}

.brand_story{background: url('/img/index_brand.png'); color:#fff;text-align:center;height: 640px;margin-top:77px;}
.brand_story h1{font-size: 40px;font-weight: 700;line-height: 40px;padding: 90px 0 84px;}
.brand_story p{font-size: 24px;font-weight: 400;line-height: 38px;letter-spacing: -0.02em;padding-bottom:37px;}
.brand_story .brand_p1{font-size: 64px;font-weight: 300;line-height: 64px;letter-spacing: -0.04em;padding-bottom:56px;}

.cx_center{width: 1280px;margin:0 auto;height: 954px;}
.cx_center h4{font-size: 24px;font-weight: 700;line-height: 40px;padding: 140px 0 64px;}
.cx_center .cx_boxs{width: 633px;display: flex;flex-wrap:wrap; gap:17px; float:left;}
.cx_center .inquiry{background: url('/img/index_inquiry.png');width: 609px;height: 494px;float:right;}
.cx_center .inquiry h4{font-size: 20px;font-weight: 700;line-height: 23.87px;color:#D4D4D4; padding:38px 0 33px 68px;}
.cx_center .inquiry .input_box{width: 478px;height: 376.87px;margin:0 auto;display: flex;flex-wrap:wrap;justify-content: flex-end;}
.cx_center .inquiry .input_box input{background:#23272A; color:#999999;width: 478px;height: 41px; border:none;padding:11px;}
.cx_center .inquiry .input_box textarea{background:#23272A; color:#999999;width: 478px;height: 193px;border:none;resize:none; padding:13px;}
.cx_center .inquiry .input_box input[type=submit]{width:96px;height:40px;border: 1px solid #fff;font-size: 12px;font-weight: 500;text-align: center;color:#fff;}

.quick_menu p{font-size: 12px;font-weight: 400;line-height: 14px;letter-spacing: -0.025em;padding-top:10px;}
.quick_menu ul{display: flex;width: 185px;flex-wrap:wrap;}
.quick_menu .today li{border: 1px solid #D9D9D9;width: 90px;height: 80px;}
.quick_menu {position: fixed;top: 50%;right: 67px;transform: translateY(-50%);background-color: white;padding: 10px;z-index: 1000;}

</style>

<div class="index_wrap">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
				<div class="index_swiper1">
					<p>가늘고 힘없는 모발엔!</p>
					<h1>탈모 증상 완화 솔루션</h1>
					<a href="">자세히보기</a>
				</div>	
			</div>

			<div class="swiper-slide">
				<div class="index_swiper2">
					<h1 style="color:#235248;">최상의 원료와 효과, 안전성이 입증된 <br>프리미엄 탈모 토닉</h1>
					<p style="color:#235248;">실리콘 헤드를 통해 두피에 직접 유효 성분을 전달해 보세요.</p>
					<a href="">자세히보기</a>
				</div>	
			</div>

			<div class="swiper-slide">
				<div class="index_swiper3">
					<h1>두피를 부드럽게 케어하는 <br> 자극 없는 제뉴프 탈모 토닉</h1>
					<p>비오틴 유효성분과 자연유래 추출물로 두피에 자극없이 집중 케어 하세요.</p>
					<a href="">자세히보기</a>
				</div>	
			</div>

			<div class="swiper-slide">
				<div class="index_swiper4">
				</div>	
			</div>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<div class="index_container">
	<h4>PRODUCT</h4>

	<div class="product">
		<div class="product_box">
			<a href="/shop/item.php?it_id=1715923138">
				<img src="/img/index_product.png" alt="">
			</a>
			<p class="product_p1">제뉴프 헤어노틱 120ml</p>
			<p class="product_p2">설명/예시 텍스트 부분입니다.</p>
			<p class="product_p3"><span>33%</span> 33,000원 <del>49,000원</del></p>
		</div>

		<div class="product_box">
			<a href="/shop/item.php?it_id=1716181389">
				<img src="/img/index_product2.png" alt="">
			</a>
			<p class="product_p1">[37%할인] 제뉴프 헤어토닉 120ml 2SET</p>
			<p class="product_p2">설명/예시 텍스트 부분입니다.</p>
			<p class="product_p3"><span>37%</span> 62,000원 <del>98,000원</del></p>
		</div>

		<div class="product_box">
			<a href="/shop/item.php?it_id=1716181448">
				<img src="/img/index_product3.png" alt="">
			</a>
			<p class="product_p1">[추천] 제뉴프 헤어토닉 120ml 3SET+1</p>
			<p class="product_p2">설명/예시 텍스트 부분입니다.</p>
			<p class="product_p3"><span>45%</span> 108,000원 <del>196,000원</del></p>
		</div>
	</div>

	<div class="goods">
		<a href="">상품 보러가기</a>
	</div>

	<div class="event">
		<div class="swiper mySwiper">
			<div class="swiper-wrapper">

				<div class="swiper-slide">
					<img src="/img/index_event.png" alt="">
				</div>

				<div class="swiper-slide">
					<img src="/img/index_event.png" alt="">
				</div>

				<div class="swiper-slide">
					<img src="/img/index_event.png" alt="">
				</div>

				<div class="swiper-slide">
					<img src="/img/index_event.png" alt="">
				</div>

			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
<?php
// 데이터베이스에서 리뷰 데이터 가져오기
$sql = "SELECT r.wr_id, r.wr_subject, r.wr_content, f.bf_file 
        FROM g5_write_review r 
        LEFT JOIN g5_board_file f ON r.wr_id = f.wr_id AND f.bo_table = 'review' AND f.bf_no = 0
        ORDER BY r.wr_id DESC LIMIT 10";
$result = sql_query($sql);
$reviews = array();

while ($row = sql_fetch_array($result)) {
    $reviews[] = $row;
}
?>

<div class="best">
    <h4>REVIEW</h4>
    <div class="best_boxs">
        <?php foreach($reviews as $review) { ?>
            <div class="best_box">
			<a href="/bbs/board.php?bo_table=review&wr_id=<?php echo $review['wr_id']; ?>">
                <?php if ($review['bf_file']) { ?>
                    <img src="<?php echo G5_DATA_URL; ?>/file/review/<?php echo $review['bf_file']; ?>" alt="리뷰 이미지" style="width: 236px; height: 236px;">
                <?php } else { ?>
                    <img src="/img/default_image.png" alt="기본 이미지" style="width: 236px; height: 236px;">
                <?php } ?>
                
                    <div class="box_info">
                        <p class="box_p1"><?php echo $review['wr_subject']; ?>
                            <span class="box_p2">리뷰 보기 ></span>
                        </p>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
        <div class="review">
            <a href="/bbs/board.php?bo_table=review">리뷰 보기</a>
        </div>
</div>




</div>

<div class="brand_story">
	<h1>BRAND STORY</h1>
	<p class="brand_p1">탈모관리 이제 “<strong>집</strong>” 에서도</p>
	<p>제뉴프는 프리미엄 두피/탈모 관리 센터 탑스칼프의 <br>기술력을 바탕으로 시작된 두피 홈 케어 제품 전문 브랜드입니다.</p>
	<p>두피 홈 케어에 어려움을 느끼고 있었던 많은 분들에게 <br>프리미엄 탈모관리 센터의 케어를 집에서도  손 쉬운 사용을 통해  느껴 볼 수 있기를 원해 제뉴프가 기획됐습니다.</p>
</div>

<div class="cx_center">
	<h4>CX CENTER</h4>
	<div class="cx_boxs">
		<img src="/img/cx_1.png" alt="">
		<img src="/img/cx_2.png" alt="">
		<img src="/img/cx_3.png" alt="">
	</div>
	<form action="/bbs/write_update.php"></form>
	<div class="inquiry">
		<h4>빠른 문의</h4>
		<div class="input_box">
			<input type="text" placeholder="성함">
			<input type="text" placeholder="연락처">
			<textarea name="" id="" placeholder="문의내용"></textarea>
			<input type="submit" value="문의하기" >
		</div>
	</div>
</div>

<div class="quick_menu">
    <p>오늘 본 상품</p>
    <img src="/img/quickline.png" alt="">
    <ul class="today">
        <?php include(G5_SHOP_SKIN_PATH.'/boxtodayview.skin.php'); ?>
    </ul>
    <p>QUICK MENU</p>
    <img src="/img/quickline.png" alt="">
    <ul>
        <li><a href="/bbs/board.php?bo_table=announcement"><img src="/img/center.png" alt=""></a></li>
        <li><a href="/shop/cart.php"><img src="/img/shop.png" alt=""></a></li>
        <li><a href="/bbs/board.php?bo_table=inquiry"><img src="/img/qa.png" alt=""></a></li>
        <li><a href="/bbs/board.php?bo_table=event"><img src="/img/event.png" alt=""></a></li>
    </ul>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var mySwiper = new Swiper('.mySwiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
});
</script>

<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');