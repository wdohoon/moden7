 <?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet" href="../css/index.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/index.js"></script>



<style>
	.moneys .banner_wrap .banner ul{
		display: flex;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
		padding-left: 260px;
	}
	.moneys .banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.moneys .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	.moneys .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.moneys .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.moneys .banner_wrap .banner ul li a{
		color: #fff;
	}

	/* mos */
	.moneys .banner_mos {
		position: relative;
		width: 100%;
	}

	.moneys .banner_mo ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
	}

	.moneys .banner_mo li {
		margin-right: 20px;
		width: 100%;
	}

	.moneys .banner_mo a {
		text-decoration: none;
		color: #fff;
		padding: 30px;
		font-size: 20px;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.moneys .all-dropdowns {
		display: none;
		background: #002e6c;
		position: absolute;
		width: 100%;
		top: 100%; /* 바로 아래에 나타나도록 설정 */
		left: 0;
		z-index: 2;
	}

	.moneys .all-dropdowns ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.moneys .all-dropdowns li {
		padding: 10px;
	}

	.moneys .all-dropdowns ul {
		border-bottom: solid 2px #fff;
	}

	.moneys .fixeds_mo{
		position: absolute;
		width: 90%;
		display: flex;
		align-items: center;
		margin: 0 30px 0 30px;
		background: #002e6c;
		height: 80px;
		top: 26.04vw;
	}
	.moneys .fixeds_mo img{
		width: 10px;
		height: 10px;
	}

	.moneys .info_wrapper{
		height: 100%;
		padding: 150px 260px 150px 260px;
	}
	.moneys .info_wrapper .title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	.moneys .info_wrapper .title h2{
		font-size: 44px;
		font-weight: bold;
		margin-bottom: 40px;
	}
	.moneys .info_wrapper .title{
		border-bottom: solid 1px #e3e3e3;
	}
	.moneys .info_wrapper .info{
		display: flex;
		margin-top: 40px;
		gap: 40px;
	}
	.moneys .info_wrapper .info .left,
	.moneys .info_wrapper .info .right{
		width: 50%;
	}

	.moneys .info_wrapper .info .right span{
		font-size: 24px;
		font-weight: bold;
	}
	.moneys .info_wrapper .info .right p{
		font-size: 16px;
		line-height: 2;
	}
	.moneys .info_wrapper .info .left span{
		font-size: 24px;
		font-weight: bold;
	}
	.moneys .info_wrapper .info .left p{
		font-size: 16px;
		line-height: 2;
	}
	.moneys .info_wrapper .diagram_wrap{
		padding-top: 120px;
	}
	.moneys .info_wrapper .diagram_wrap .kidb_img{
		position: absolute;
		left: 0;
		top: 76.32vw;
		opacity: 0.5;
		z-index: -1;
	}
	.moneys .info_wrapper .sub_wrap{
		margin-top: 60px;
	}
	.moneys .info_wrapper .sub_wrap .sub_tit{
		font-size: 16px;
		font-weight: bold;
		display: flex;
		justify-content: center;
		padding: 40px 0 40px 0;
	}
	.moneys .info_wrapper .sub_wrap ul{
		display: flex;
		font-size: 16px;
	}
	.moneys .info_wrapper .sub_wrap ul li{
		cursor: pointer;
		width: 175px;
		border: solid 1px #ccc;
		height: 60px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
    .moneys .info_wrapper .sub_wrap ul li:first-child.active {
		color: #fff;
        background-color: #a0935e;
        font-weight: bold;
    }
    .moneys .info_wrapper .sub_wrap ul li.active {
		color: #fff;
        background-color: #a0935e;
        font-weight: bold;
    }
	.moneys .info_wrapper .sub_wrap .sub_details .sub_detail{
		display: flex;
		padding-top: 60px;
	}
	.moneys .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit span{
		font-size: 28px;
		font-weight: bold;
	}
	.moneys .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit p{
		font-size: 14px;
		color: #777;
	}
	.moneys .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit{
		width: 40%;
	}
	.moneys .info_wrapper .sub_wrap .sub_details .sub_detail .detail_ko{
		width: 100%;
		margin-right: 30px;
		font-size: 16px;
	}
	.moneys .info_wrapper .sub_wrap .sub_details .sub_detail .detail_en{
		width: 100%;
		font-size: 16px;
	}
	.moneys .depo_imgs{
		padding: 60px 0 150px 0;
	}
	.moneys .depo_imgs .depo_img{
		width: 100%;
	}
	.moneys .depo_imgs .depo_img img{
		width: 100%;
		border: solid 1px #ccc;
	}
	.moneys .krw_imgs{
		padding: 60px 0 150px 0;
	}
	.moneys .krw_imgs .krw_img{
		width: 100%;
	}
	.moneys .krw_imgs .krw_img img{
		width: 100%;
	}
	.moneys .repo_imgs{
		padding: 60px 0 150px 0;
	}
	.moneys .repo_imgs .repo_img{
		width: 100%;
	}
	.moneys .repo_imgs .repo_img img{
		width: 100%;
	}
	.who_bg .who_box span{
		font-size: 25px !important;
	}
	.info img{
		z-index: -1;
		position: absolute;
		left:0;
		top: 1500px;
		opacity: 1.5;
	}
	@media (max-width: 1400px) {
		.moneys .info_wrapper{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		.moneys .banner_wrap .banner ul{
			padding-left: 8.6vw;
			height: 5.17vw;
		}
		.moneys .banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		.moneys .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		.moneys .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}

		.moneys .info_wrapper .info .left,
		.moneys .info_wrapper .info .right{
			width: 100%;
		}
	}


	@media (max-width: 768px) {
		.moneys .info_wrapper{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
		.moneys .info_wrapper .info{
			flex-wrap: wrap;
		}
		.moneys .info_wrapper .sub_wrap .sub_details .sub_detail{
			flex-wrap: wrap;
			gap: 40px;
		}
	}

	@media (max-width: 767px) {
		.moneys .banner_wrap{
			display: none;
		}
		.moneys .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit{
			width: 100%;
		}
	}
	@media (min-width: 768px) {
		.moneys .fixeds_mo{
			display: none;
		}
	}
</style>

<div class="moneys">
	<?php 
		$sv_tit = 'MONEY MARKET';
		$sv_links = '/moneymarket.php';
		$sv_titles = 'MONEY MARKET';
		$sv_link = '/moneymarket.php';
		$sv_title = 'MONEY MARKET';
		include_once('./include/sv_03.php');
	
	?>
	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<li class="first"><a href="/moneymarket.php">MONEY MARKET</a></li>
				<!-- <li class="second"><a href="/derivatives.php">DERIVATIVES</a></li> -->
				<li class="fourth"><a href="/bbs/board.php?bo_table=money">RESOURCES</a></li>
			</ul>
		</div>
	</div>

	<div class="fixeds_mo">
		<div class="banner_mos">
			<div class="banner_mo">
				<ul>                            
					<li>
						<a href="/moneymarket.php" id="fixedIncomeBtn">MONEY MARKET<img src="../img/drop.png" alt=""></a>
						<div class="all-dropdowns">
							<ul class="dropdown">
								<li><a href="/derivatives.php" style="padding: 20px;">DERIVATIVES</a></li>
							</ul>
							<ul class="dropdown2">
								<li><a href="/bbs/board.php?bo_table=resources" style="padding: 20px;">RESOURCES</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

<!-- depo -->

	<div class="contact">
		<div class="info_wrapper">
			<div class="title">
				<span>CONNECTING THE WORLD</span>
				<h2>MONEY MARKET</h2>
			</div>
					<div class="info">
			<img src="../img/who_kidb.png" alt="">
		</div>
			<div class="info">
				<div class="left">
					<span>자금시장</span><br>
					<p>KIDB는 국내외 다양한 기관 투자자들에게 원화콜과 REPO에 대하여 중개 서비스를 제공합니다.</p>
				</div>
				<div class="right">
					<span>Money Market</span><br>
					<p>KIDB provides brokerage service of KRW Call and REPO to local institurional investors.</p>
				</div>
			</div>

			<div class="sub_wrap">
				<ul>
					<li>KRW Call</li>
					<li>Repo</li>
					<li>Depo</li>
				</ul>

				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>KRW CALL</span>
							<!-- <p>단기외화자금</p> -->
						</div>
						<div class="detail_ko">
							<p>원화 Call은 은행 및 기타 금융기관(증권, 자산운용사 등)이 상호간 초단기 자금 차입/대여를 하는 거래입니다. 주로 지급준비금 과부족 및 보유 잉여자금 등 해소를 위해 90일 이내의 일시적 자금 조절을 하는 수단으로 이용됩니다.</p>
						</div>
						<div class="detail_en">
							<p>KRW Call market is where financial institutions (banks, securities and asset management firms) lend or borrow their short-term funds. It is often used to adjust their temporary excess or deficit of funds with maturities from overnight to a maximum of 90 days.</p>
						</div>
					</div>
				</div>

				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>REPO</span>
							<p>환매조건부매매</p>
						</div>
						<div class="detail_ko">
							<p>REPO는 금융기관간에 채권 등 유가증권을 담보로 매도(매수) 거래 이후 일정기간(1일 이상) 경과 후 원래 매도(매수) 금액에 계약된 이자금액을 합하여 다시 매수(매도) 할 것을 조건으로 하는 거래입니다. 주로 장외시장에서 금융기관간에 단기자금 과부족을 조절하기 위하여 이용됩니다.</p>
						</div>
						<div class="detail_en">
							<p>Repo(repurchase agreement) is a transaction where securities such as bonds are posted as collaterals to the buyer with an agreement that the seller buys back the securities at a certain time at a certain price (principle plus interest) and vice versa. It is often used to adjust short term excess or deficit of funds in OTC market.</p>
						</div>
					</div>
				</div>

				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>DEPO</span>
							<p>단기외화자금</p>
						</div>
						<div class="detail_ko">
							<p>단기외화자금거래는 금융기관 간 1년 이내의 일정 기간동안 특정 통화를 대여나 차입한 후 만기일에 원금과 이자를 상환하는 거래를 의미합니다. 외화자금 거래에 있어 거의 대부분을 차지하는 달러화 이외에도 급격히 거래가 증가하고 있는 위안화거래, 유로화, 엔화 등 다양한 국제통화들을 거래하며, 국내 소재 은행들 뿐만 아니라 뉴욕, 런던, 도쿄, 홍콩, 싱가포르 등 각지에있는 글로벌 은행들과 거래를 하고 있습니다.</p>
						</div>
						<div class="detail_en">
							<p>Depo is a foreign currency-denominated deposit, which is lent or borrowed for a certain period of time and received or repaid with the interest payment. Most actively traded foreign currency is USD but trades in other currencies such as CNY, EUR, and JPY etc are rapidly growing as well. Depos are mostly traded by local commercial banks and branches of foreign banks onshore, but participation from banks in overseas countries like Hong Kong, Singapore and China also takes up a significant share.</p>
						</div>
					</div>

				</div>
			</div>
			<div class="depo_imgs">
				<div class="depo_img">
					<img src="../img/krw.png" alt="">
					<img src="../img/repo.png" alt="">
					<img src="../img/depo.png" alt="">
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function () {
    // 초기에 국고채 스타일 적용
    $("ul li:first-child").addClass("active");
});
</script>

<script>
    $(document).ready(function () {
        var fixedIncomeBtn = $("#fixedIncomeBtn");
        var resourcesDropdown = $("#resourcesDropdown");

        // 초기에는 RESOURCES를 숨깁니다.
        resourcesDropdown.hide();

        fixedIncomeBtn.click(function (e) {
            e.preventDefault();
            resourcesDropdown.toggle(); // FIXED INCOME 버튼 클릭 시 RESOURCES를 토글하여 표시/숨깁니다.
        });
    });

	$(document).ready(function () {
		// 모든 드롭다운을 숨깁니다.
		$(".all-dropdowns").hide();

		// fixedIncomeBtn 클릭 이벤트 핸들러
		$("#fixedIncomeBtn").click(function (e) {
			e.preventDefault();
			// all-dropdowns 클래스를 가진 요소를 토글합니다.
			$(".all-dropdowns").toggle();
		});
	});


    // 나머지 코드는 그대로 유지합니다.
    $(document).ready(function () {
        $("ul li:first-child").addClass("active");
    });

    $(document).ready(function () {
        $(".sub_details").hide();
        $(".sub_details:first").show();
        $("ul li").click(function () {
            $("ul li").removeClass("active");
            $(this).addClass("active");

            $(".sub_details").hide();
            var index = $(this).index();
            $(".sub_details").eq(index).show();
        });
    });

	$(document).ready(function () {
    // 초기에는 모든 이미지를 숨깁니다.
    $(".depo_img img").hide();
    // 첫 번째 이미지 (KRW) 만 표시합니다.
    $(".depo_img img").eq(0).show();

    $("ul li").click(function () {
        // 모든 탭의 활성 상태를 제거하고 현재 클릭한 탭만 활성화합니다.
        $("ul li").removeClass("active");
        $(this).addClass("active");

        // 모든 이미지를 숨깁니다.
        $(".depo_img img").hide();

        // 클릭한 탭에 해당하는 이미지만 표시합니다.
        var index = $(this).index();
        $(".depo_img img").eq(index).show();
    });
});

$(document).ready(function() {
    // 이미지 소스 변경 함수
    function updateImageSource() {
        var width = $(window).width();
        if (width <= 768) {
            // 화면 크기가 768픽셀 이하일 때 이미지 변경
            $("img[src='../img/krw.png']").attr('src', '../img/krw_mo.png');
            $("img[src='../img/repo.png']").attr('src', '../img/repo_mo.png');
            $("img[src='../img/depo.png']").attr('src', '../img/depo_mo.png');
        } else {
            // 화면 크기가 768픽셀 초과일 때 원래 이미지로 변경
            $("img[src='../img/krw_mo.png']").attr('src', '../img/krw.png');
            $("img[src='../img/repo_mo.png']").attr('src', '../img/repo.png');
            $("img[src='../img/depo_mo.png']").attr('src', '../img/depo.png');
        }
    }

    // 초기 로드 시 이미지 소스 업데이트
    updateImageSource();

    // 화면 크기 변경 시 이미지 소스 업데이트
    $(window).resize(function() {
        updateImageSource();
    });
});

</script>

<script src="../js/index.js"></script>


<?php
include_once(G5_PATH.'/tail.php');