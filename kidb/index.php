<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>
<link rel="stylesheet" href="../css/index.css">
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script src="js/swiper.min.js"></script>

<script src="js/createjs.min.js"></script>
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
	
#popup{position:fixed; left:15%; top:30%; transform:translate(-50%, -50%);background-color:#fff; z-index:100;display: flex;flex-direction: column;}
#popup label{padding: 20px;position: relative;}
#popup input{margin: 0 20px 0 0;}
#popup button{position:absolute; right:5%; top:50%; transform:translateY(-50%);}
	.working_more{
		margin-top: 50px;
		display: flex;
		justify-content: center;
	}
	.working_more a{
		color: #fff;
		background: #002e6c;
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 20px;
		width: 145px;
		height: 50px;
	}
	.canvas_wrap {
		width: 100%; 
		max-width: 1920px;
		margin: 0 auto; 
	}

	#canvas {
		width: 100%; 
	}
	.archive_wrap{
		display: flex;
		gap:40px;
	}
	.archive{height: 100%;}
	.building_img{
		width: 710px;
		height: 432px;
	}


	@media(max-width: 1800px){
		.swiper-horizontal{
			height: 600px;
		}
		.building .archive h1,	.white_box h1{
			font-size: 32px;
		}
		.archive_wrap{
			gap:2.2222vw;
		}	
		.building_img{
			width: 39.4444vw;
			height: 24vw;
		}
	}
	@media(max-width: 1400px){
		.swiper-horizontal{height: 600px;}
		.building .archive h1,	.white_box h1{font-size: 28px;}
	}
	@media (max-width: 1024px) {
		.swiper-horizontal{height: auto;}
		.building .archive p{height: 210px;}
		.building_img{
			width: 100%;
			height: auto;
		}
	}

	@media(max-width: 768px){
		.swiper-horizontal{height: auto;}
		.building .archive p{height: 280px;}
		.canvas_wrap{
			width: 100%;
			max-width: 1920px;
			height: 700PX;
			display: flex;
			justify-content: center;
		}
		#canvas {
			width: 250%;
			height: 100%;
		}
		.building .archive h1{
			font-size: 5.9vw;
		}
		.building_img{
			width: 100%;
			height: auto;
		}
	}
	@media(max-width: 480px){
		.building .archive p{height: 390px;}
		#popup{ left:50% ;}
		#popup label{padding: 4.1667vw;}
		#popup input{margin: 0 4.1667vw 0 0;}
	}

/* 재생버튼 */
.arrow button.play{
	display:block;
	width: 50px;
	height: 45px;
	background:#002e6c ;
	position: relative;
	margin-right: 1px;
	margin-top: 1px;
}
.arrow button.play:before{
	content:'';
	position: absolute;
	left:50%;
	top:50%;
	transform:translate(-50%,-50%);
	width: 0px;
    height: 0px;
    border-left: 20px solid #fff;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
}

</style>

<!-- 팝업창 코드 -->
<div id="popup">
    <img src="/images/popip.png" alt="팝업 이미지">
    <label><input type="checkbox" id="chkPopup" style="display: none;"><button onclick="closePopup()">닫기</button></label>
</div>
<script>
    function setCookie(name, value, exp) {
        var date = new Date();
        date.setTime(date.getTime() + exp * 24 * 60 * 60 * 1000);
        document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/';
    }

    function getCookie(name) {
        var value = '; ' + document.cookie;
        var parts = value.split('; ' + name + '=');
        if (parts.length == 2) {
            var cookieValue = parts.pop().split(';').shift();
            console.log('쿠키 값:', cookieValue); // 콘솔 로그 추가
            return cookieValue;
        }
        return null;
    }

    function showPopup() {
        var hidePopup = getCookie('hidePopup');
        console.log('hidePopup:', hidePopup); // 콘솔 로그 추가
        if (!hidePopup) {
            document.getElementById('popup').style.display = 'flex';
        }
    }

    function closePopup() {
        var chkPopup = document.getElementById('chkPopup');
        if (chkPopup.checked) {
            setCookie('hidePopup', 'Y', 1);
        }
        document.getElementById('popup').style.display = 'none';
    }

    window.onload = function() {
        showPopup();
    };
</script>



<div class="body">
	<div id="connecting">
		<div class="canvas_wrap">
			<canvas id="canvas" width="1920" height="1080"></canvas>
		</div>
	</div>

	<div class="swiper first-slider">
		<div class="swiper-wrapper">

			<div class="swiper-slide">
				<div class="building">
					<div class="archive_wrap">
						<div class="archive">
							<span></span>
							<h1>KIDB is Korea's leading intermediary in the wholesale financial markets providing exceptional service for our clients.</h1>
							<p class="archive_no">KIDB는 외환위기 후 IMF의 권고사항으로 2000년 채권 유통시장의 선진화를 위하여 
							현 미래에셋대우,삼성,NH투자,대신,유안타증권 등이 공동으로 설립한
							채권,REPO,파생상품 중개 등 금융기관 간 중개시장을 선도하는 종합금융중개회사입니다.
							</p>
							<div class="custom-pagination arrow">
								<div class="arrows">					
									<button class="custom-back"><img src="../img/left.png" alt=""></button>
									<button class="custom-prev2"><img src="../img/stop.png" alt=""></button>
									<button class="play"></button>
									<button class="custom-next"><img src="../img/right.png" alt=""></button>
								</div>
							</div>
						</div>
						<div class="building_img">
							<img src="../img/archive_mo.png" alt="" class="img_none">					
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="building">
					<div class="archive_wrap">
						<div class="archive">
							<span></span>
							<h1>KIDB is Korea's leading intermediary in the wholesale financial markets providing exceptional service for our clients.</h1>
							<p class="archive_no">KIDB는 금융시장에 대한 빠르고 정확한 정보 제공 및 고객들의 트레이딩 수요를
							파악하고 그 과정에서 시장의 투명성과 유동성을 제고하며 원활한 가격 결정기능을
							수행합니다. 신뢰를 바탕으로 하는 금융 중개기관으로서 고객, 주주, 임직원,
							그리고 사회에 대한 책임을 충실히 이행하여 기업의 가치를 증대해 나가고자 합니다.
							</p>
							<div class="custom-pagination arrow">
								<div class="arrows">					
									<button class="custom-back"><img src="../img/left.png" alt=""></button>
									<button class="custom-prev2"><img src="../img/stop.png" alt=""></button>
									<button class="play"></button>
									<button class="custom-next"><img src="../img/right.png" alt=""></button>
								</div>
							</div>
						</div>
						<div class="building_img">
							<img src="../img/archive_mo.png" alt="" class="img_none">					
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="section2">
		<div class="swiper finance-slider">
			<div class="swiper-wrapper">

				<ul class="swiper-slide">
					<li class="img_wrap">
						<div class="blue_box">
							<img src="../img/ch.png" alt="">
							<div class="more">
								<span>채권시장 자료실</span>
								<a href="/bbs/board.php?bo_table=reousrces_2" class="shortcut_btn">MORE</a>
							</div>
						</div>
					</li>
					<li class="text_wrap">
						<div class="white_box">
							<div class="comments">
								<div class="ment">
									<h1>채권시장</h1>
									<span class="no1">Korea's No.1 Brokerage Firm</span>
									<br>
									<p class="p2">KIDB는 국내외 다양한 금융회사등 전문투자자들에게 원화채권,외화채권의 중개,인수매매 서비스를 제공합니다.</p>
								</div>
								<div class="white_boxs">
									<div class="white_box_btn">
										<div class="custom-pagination arrow">
											<button class="custom-back2"><img src="../img/left.png" alt=""></button>
											<button class="custom-prev2"><img src="../img/stop.png" alt=""></button>
											<button class="play"></button>
											<button class="custom-next2"><img src="../img/right.png" alt=""></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>

				<ul class="swiper-slide">
					<li class="img_wrap">
						<div class="blue_box">
							<img src="../img/ja.png" alt="">
							<div class="more">
								<span class="comments">자금시장 자료실</span>
								<a href="/bbs/board.php?bo_table=resources" class="shortcut_btn">MORE</a>
							</div>
						</div>
					</li>
					<li class="text_wrap">
						<div class="white_box">
							<div class="comments">
								<div class="ment">
									<h1>자금시장</h1>
									<span class="no1">Korea's No.1 Brokerage Firm</span>
									<br>
									<p class="p2">KIDB는 국내외 다양한 기관 투자자들에게 원화콜과 REPO에 대하여 중개 서비스를 제공합니다.</p>
								</div>
								<div class="white_boxs">
									<div class="white_box_btn">
										<div class="custom-pagination arrow">
											<button class="custom-back2"><img src="../img/left.png" alt=""></button>
											<button class="custom-prev2"><img src="../img/stop.png" alt=""></button>
											<button class="play"></button>
											<button class="custom-next2"><img src="../img/right.png" alt=""></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
				
				<ul class="swiper-slide">
					<li class="img_wrap">
						<div class="blue_box">
							<img src="../img/pa.png" alt="">
							<div class="more">
								<span class="comments">파생시장 자료실</span>
								<a href="/bbs/board.php?bo_table=resources" class="shortcut_btn">MORE</a>
							</div>
						</div>
					</li>
					<li class="text_wrap">
						<div class="white_box">
							<div class="comments">	
								<div class="ment">
									<h1>파생시장</h1>
									<span class="no1">Korea's No.1 Brokerage Firm</span>
									<br>
									<p class="p2">KIDB는 국내외 다양한 기관 투자자들에게 IRS, CRS, FX swap, FRA, MAR 등 다양한 파생상품에 대하여 중개서비스를 제공합니다.</p>
								</div>
								<div class="white_boxs">
									<div class="white_box_btn">
										<div class="custom-pagination arrow">
											<button class="custom-back2"><img src="../img/left.png" alt=""></button>
											<button class="custom-prev2"><img src="../img/stop.png" alt=""></button>
											<button class="play"></button>
											<button class="custom-next2"><img src="../img/right.png" alt=""></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</li>
				</ul>

			</div>
		</div>



	</div>

	<div class="workings">
		<div class="working">
			<div class="kidb">
				<h1>Working at KIDB</h1>
				<h4>Korea's No.1 Brokerage Firm</h4>
				<span>KIDB는 회사의 성공이 직원들로부터 비롯된다고 믿습니다.</span>
				<p id="kidb_text">KIDB는 '회사의 미래는 결국 사람에게 달려있다' 는 확신을 가지고 있습니다.</p>
				<div class="working_more">
					<a href="/workingatkidb.php">MORE</a>
				</div>
			</div>
		</div>
	</div>



<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.first-slider', {
        effect: 'fade', 
        loop: true, 
		slidesPerView: 1,
        navigation: {
            nextEl: '.custom-next',
            prevEl: '.custom-back'
        },	
		autoplay : {
			delay : 10000, 
			disableOnInteraction : false, 
		},

    });

	

	var swiper = new Swiper('.finance-slider', {
        effect: 'fade', 
        loop: true,
		slidesPerView: 1,
        navigation: {
            nextEl: '.custom-next2',
            prevEl: '.custom-back2'
        },	 
		autoplay : {
			delay : 10000, 
			disableOnInteraction : false, 
		},
    });
	
	// finance-slider 자동 재생 시작, 정지
	$('.finance-slider .custom-prev2').on('click', function() {
	  var swiperInstance = $('.finance-slider')[0].swiper;
	  swiperInstance.autoplay.stop();
	});

	$('.finance-slider .play').on('click', function() {
	  var swiperInstance = $('.finance-slider')[0].swiper;
	  swiperInstance.autoplay.start();
	});

	// first-slider 자동 재생 시작, 정지
	$('.first-slider .custom-prev2').on('click', function() {
	  var swiperInstance = $('.first-slider')[0].swiper;
	  swiperInstance.autoplay.stop();
	});

	$('.first-slider .play').on('click', function() {
	  var swiperInstance = $('.first-slider')[0].swiper;
	  swiperInstance.autoplay.start();
	});

</script>

<script>
// 윈도우 크기가 변경될 때 이벤트를 감지합니다.
window.addEventListener('resize', function() {
    // 현재 윈도우의 가로 크기를 얻습니다.
    var windowWidth = window.innerWidth;

    // 가로 크기가 768px 미만인 경우
    if (windowWidth < 768) {
        // 이미지 엘리먼트를 찾아서 src 속성을 변경합니다.
        var connectingImage = document.getElementById('connectingImage');
        if (connectingImage) {
            connectingImage.src = '../img/connecting_mo.png';
        }
    } else {
        // 가로 크기가 768px 이상인 경우
        // 이미지를 원래 이미지로 변경하거나 다른 작업을 수행합니다.
        var connectingImage = document.getElementById('connectingImage');
        if (connectingImage) {
            connectingImage.src = '../img/connecting.png';
        }
    }
});

// 페이지 로드 시 초기 설정을 위해 한 번 실행합니다.
window.dispatchEvent(new Event('resize'));
</script>

<script>
	function addBreakTag() {
		var kidbText = document.getElementById("kidb_text");
		var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

		if (windowWidth <= 768) {
			kidbText.innerHTML = "KIDB는 '회사의 미래는 결국 사람에게 달려있다'는<br> 확신을 가지고 있습니다.";
		} else {
			kidbText.innerHTML = "KIDB는 '회사의 미래는 결국 사람에게 달려있다'는 확신을 가지고 있습니다.";
		}
	}
	window.onload = addBreakTag;
	window.onresize = addBreakTag;
</script>


<?php
include_once(G5_PATH.'/tail.php');