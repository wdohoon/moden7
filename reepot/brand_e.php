<?php
include_once('./_common.php');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/brand_e.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/brand_e.php');
    return;
}

define("_INDEX_", TRUE);

include_once(G5_PATH.'/head_e.php');
?>

<link rel="stylesheet" href="/css/fullpage.min.css" media="all">
<script type="text/javascript" src="/js/fullpage.min.js"></script>

<style>
.global-head {
	 height: 110px; 
	 width: 100%;
	font-size: 16px;    
	position:absolute;
	left: 0;
	top:0;	

}

.s_con{width: 100%;position:relative}
.s_con-inner {display: flex;align-items: center;}
.s_con-inner .box{text-align: left;margin: 0% 0% 0% 15%;}
.m-only{display:none}
.sc_top a{}
.s_con-inner .box .text h2{color: #4C4C4E;font-family: "KoPubWorldDotum", Sans-serif;font-size: 3.1250vw;font-weight: 600;line-height: 1.4em;}
.s_con-inner .box .text h2{margin-top: 15px;}

.sc_top .sc_box{position: relative;}
.sc_top .img-box .box-inner .elementor-slide-heading{line-height: 1.4;font-family: "KoPubWorldDotum", Sans-serif;font-size: 2.6042vw;font-weight: 600;text-decoration: none;}
.sc_top .img-box .box-inner .elementor-slide-description{font-family: "KoPubWorldDotum", Sans-serif;font-size: 1.0417vw;font-weight: 400;text-decoration: none;line-height: 1.5em;margin-top: 1.0417vw;}

.sc_top .img-box .d-sq{border:2px solid #fff;padding:10px}
.sc_top .img-box .box-inner{padding-left: 18.5208vw;display: flex;text-align: left;}
.sc_top .img-box .box-inner div.sc{padding-top: 0;margin-bottom: 30px;}
.sc_top .img-box02 .box-inner{display: flex; justify-content: center;padding: 0;text-align: center;padding-top: 0;    height: 100%;align-items: center;}
.sc_top .img-box02 .box-inner div.sc{padding-top: 0;margin-bottom: 0;}
.sc_top .img-box03 .box-inner{padding-left: 16.5208vw;}
.sc_top .img-box03 .box-inner div.sc{margin-bottom: 30px;color: #fff;  padding-bottom:2.4375vw;}
.sc_top .img-box03 .box-inner .elementor-slide-description{font-size: 1.0417vw;}
.sc_top .img-box04 .box-inner{padding-left: 0;display: flex;text-align: left;justify-content: center;    align-items: center;}
.sc_top .img-box04 .box-inner div.sc{margin-top: -170px;padding-top: 0;color: #fff; }
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading{text-align:center}
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading img:first-of-type{width: 60px;display: block;    margin: 0 auto;}
.sc_top .img-box05 .box-inner { justify-content: flex-end;}
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading img:last-of-type{width: 16vw;}
.sc_top .img-box05 .box-inner div.sc{padding-right: 10%;text-align: right;padding-bottom: 5.25vw;color:#fff}
.sc_top .img-box06 .box-inner div.sc{padding-right: 0;text-align: right;padding-bottom: 5.25vw;color:#fff;text-align:left;}
.sc_top .img-box07 .box-inner div.sc{padding-right: 0;text-align: right;padding-bottom: 3.0417vw;color:#fff}
.sc_top .img-box08 .box-inner div.sc{padding-right: 0;text-align: right;padding-bottom: 4.0417vw;color:#fff}
.sc_top .img-box09 .box-inner div.sc{padding-bottom: 6.0417vw;margin-bottom: 30px;color: #fff; text-align:center;}
.sc_top .img-box10{background: url(/images/main-99.png) no-repeat;background-position: right;background-size: cover;}
/* .sc_top .img-box10{background: url(/images/main-99.png) no-repeat;background-position: right;background-size: cover;} */
.sc_top.s_con1 .img-box .box-inner div.sc{}
.sc_top.s_con2 .img-box{height:100%}

.s_con1{background: url(/images/main.png) no-repeat;background-position: center ;background-size: cover;}
.s_con2{background: rgb(255,255,255);background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(86,102,124,1) 100%);}
.s_con3{background: url(/images/main-2.png) no-repeat;background-position: right ;background-position-y: center;background-size: cover;}
.s_con4{background: url(/images/main-3.png) no-repeat;background-position: right ;background-size: cover;}
.s_con5{background: url(/images/main-4.png) no-repeat;background-position: center ;;background-size: cover;}
.s_con6{background: url(/images/main-55.png) no-repeat;background-position: bottom ;background-size: cover;}
.s_con7{background: url(/images/main-66.png) no-repeat;background-position: bottom ;background-size: cover;}
.s_con8{background: url(/images/main-77.png) no-repeat;background-position: bottom ;background-size: cover;}
.s_con9{background: url(/images/main-88.png) no-repeat;background-position: bottom ;background-size: cover;}

.s_con3 .fp-tableCell,
.s_con5 .fp-tableCell,
.s_con6 .fp-tableCell,
.s_con7 .fp-tableCell,
.s_con8 .fp-tableCell,
.s_con9 .fp-tableCell{
    vertical-align: bottom;
}
.s_con9 .box-inner{
	padding:0 !important;
	text-align:center;
	justify-content:center;
}
/*s_con2 스와이프*/
  .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;    background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(86,102,124,1) 100%);
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

/*.con09*/
.con09{}
.con09 .s_con-inner { align-items: flex-start;justify-content: center;}
.con09 .s_con-inner .box {margin: 0% ;}

.con09 .s_con-inner .box .text .widget-container2{text-align: center;margin-bottom: 10vw;font-size: 0.9375vw;font-weight: 400;margin-top: 30px;line-height: 1.5em;letter-spacing: 0px;}
.con09 .box-list{display: flex;justify-content: space-between;    margin-top: -48px;}
.con09 .box-list li{text-align:center; width: 33.3333%;}
.con09 .box-list a{display: flex;flex-direction: column;align-items: center;color: #27aae1;font-size: 1.0938vw;}
.con09 .box-list a img{margin-bottom:25px}
.con09 .widget-container3{text-align: center;padding: 25px 0;margin-top: 85px;border: 1px solid #ebebeb;border-radius: 26px;font-size: 0.9375vw;}

@media only screen and (max-width: 1280px) {
.s_con-inner .box .text h2 {font-size: 3.6vw;text-align: center;}

.sc_top .img-box03 .box-inner div.sc {padding-top: 36.4375vw;}
.sc_top .img-box05 .box-inner div.sc {padding-top: 47.25vw;}
.sc_top .img-box06 .box-inner div.sc, .sc_top .img-box07 .box-inner div.sc,.sc_top .img-box08 .box-inner div.sc,.sc_top .img-box09 .box-inner div.sc{padding-top: 46.0417vw;}
.con09 .s_con-inner .box .text .widget-container2 {text-align: center;font-size: 1.8vw;}
.con09 .s_con-inner .box .text h2 {margin-top:4vw}
.con10 .box ul {display: flex;min-width: 768px;}

.con09 .box-list a { font-size: 1.6vw;}
.con09 .widget-container3 { font-size: 1.375vw;}
}

@media only screen and (max-width: 1040px) {
.t-none{display:none}
.sc_top .img-box01 .box-inner {padding-left: 5%;}
.sc_top .img-box .box-inner .elementor-slide-heading{font-size: 4.6vw;}
.sc_top .img-box .box-inner .elementor-slide-description{font-size: 2vw;}
.sc_top .img-box .box-inner {padding-left: 5%;}
.s_con4.sc_top .img-box .box-inner ,.s_con2.sc_top .img-box .box-inner {padding-left:0}

.sc_top .img-box03 .box-inner {padding-left: 5%;}
.sc_top .img-box03 .box-inner div.sc {padding-top: 45.4375vw;}

.sc_top .img-box05 .box-inner div.sc {padding-top: 60.25vw;}

.sc_top .img-box06 .box-inner div.sc, .sc_top .img-box07 .box-inner div.sc, .sc_top .img-box08 .box-inner div.sc, .sc_top .img-box09 .box-inner div.sc {padding-top: 53.0417vw;}
.sc_top .img-box02 {padding: 0 4%;}
.con09 .s_con-inner .box .text h2 {margin-top:0}
}

@media only screen and (max-width: 768px) {
.m-only{display:block}
.m-none{display:none}

.s_con-inner {min-height: 108vw;}
.s_con-inner .box .text h2 {font-size: 7.8vw;padding: 0 2%;}

.fp-section.fp-table, .fp-slide.fp-table,.fp-tableCell,.sc_top .sc_box { height: 166.5vw !important;}
.s_con2.sc_top .sc_box{display: flex;align-items: center;}
.s_con1 {background: url(/images/m-main.png) no-repeat;background-position: center right;background-size: cover;}
.sc_top .img-box01 .box-inner {padding-left: 0;justify-content: center;text-align: center;}
.sc_top .img-box01 .box-inner div.sc{padding-top: 20.3vw;}

.sc_top .img-box02 .box-inner { padding:0;}

.s_con3 {background: url(/images/m-main-2.png) no-repeat;background-size: cover;}
.sc_top .img-box03 .box-inner{padding-left:0;justify-content: center;}
.sc_top .img-box03 .box-inner div.sc{padding-top: 85.33vw;line-height: 1.3;text-align: center;}
.sc_top .img-box03 .box-inner .elementor-slide-heading {font-size: 8.33vw;line-height: 1.2;}

.s_con4 {background: url(/images/m-main-3.png) no-repeat;background-size: cover;}
.sc_top .img-box04 .box-inner div.sc{margin-top:0}
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading img:first-of-type {margin-top: 22.2222vw;}
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading img:last-of-type {width: 40vw;}
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading {text-align: center;}

.s_con5 {background: url(/images/m-main-4.png) no-repeat;background-position: right;background-size: cover;}
.sc_top .img-box05 .box-inner{padding-left: 15%;display: flex;text-align: left;justify-content: flex-start;;}
.sc_top .img-box05 .box-inner div.sc {padding-right: 10%;text-align: right;padding-top: 133vw;}

.sc_top .img-box06 .box-inner {padding-left: 0;justify-content: center;}
.s_con6 {background: url(/images/m-main-55.png) no-repeat;background-position: right;background-size: cover;}
.sc_top .img-box06 .box-inner div.sc{text-align: center;padding-top: 120vw;}

.s_con7 {background: url(/images/m-main-66.png) no-repeat;background-position: right;background-size: cover;}
.s_con7.sc_top .img-box .box-inner{    justify-content: center;padding:0}

.sc_top .img-box07 .box-inner div.sc,.sc_top .img-box08 .box-inner div.sc{padding-top: 130vw;}

.s_con8 {background: url(/images/m-main-77.png) no-repeat;background-position: right;background-size: cover;}
.s_con8.sc_top .img-box .box-inner{    justify-content: center;padding:0}

.s_con9 {background: url(/images/m-main-88.png) no-repeat;background-position: right;background-size: cover;}
.sc_top .img-box09 { background-position: center;}
.sc_top .img-box09 .box-inner {padding-left: 0;justify-content: center;}
.sc_top .img-box09 .box-inner div.sc{padding-top: 110vw;  text-align: center;}
.sc_top .img-box09 .box-inner .elementor-slide-heading {line-height: 1.2;}


.sc_top .img-box .box-inner .elementor-slide-heading {font-size: 8.33vw; }
.sc_top .img-box .box-inner .elementor-slide-description{font-size: 3.91vw;width: 100%;text-align: center;    margin-top: 30px;}
.sc_top .img-box02 .box-inner .elementor-slide-heading {font-size: 6.94vw;}

.con09 {height: 300px !important;}
.con09 .s_con-inner {min-height: auto;}
.con09 .fp-tableCell {height: 300px !important;}
.con09 .s_con-inner .box .text .widget-container2 {text-align: center;font-size: 3.1256vw;padding: 0 2%;}
.con09 {margin-top: 0; background-image: none}
.con09 .box-list { flex-direction: column;align-items: center;}
.con09 .box-list a{ font-size:4.00vw;  margin: 20px 0;}
.con09 .widget-container3 {font-size: 3.1256vw;margin: 50px 4%;}
}
</style>

<div id="fullpage">
  <div class="s_con s_con1 section sc_top">
      <div class="sc_box">
        <div class="img-box img-box01">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">Can you picture<br class="m-only"> yourself here?<br> Your very own Querencia</div>
				<div class="elementor-slide-description">
					<!-- Querencia is a Spanish word that means a place <br class="m-only">
					where you can focus on yourself <br class="m-none">
					in the midst of a busy and intense daily life,that is,  <br class="m-only">
					your own space of rest and healing.  -->
					Querencia is a Spanish word that refers to a space of leisure and healing,<br class="m-none">
					A place where you can fully focus on yourself <br class="m-none">
					amid the hustle and bustle of everyday life.
				</div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <!-- <div class="s_con s_con2 section sc_top">
      <div class="sc_box">
        <div class="img-box img-box02">
          <div class="box-inner">
            <div class="sc">
  				<div class="elementor-slide-heading">
  					In a rapidly changing world, <br>the way we think and feel is also evolving day by day.
  				</div>
  
            </div>
          </div>
        </div>
      </div>
  </div> -->

  <div class="s_con s_con2 section sc_top">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="sc_box">
            <div class="img-box img-box02">
             <div class="box-inner">
              <div class="sc">
               <div class="elementor-slide-heading">In a rapidly changing world, <br class="t-none">the way we think and feel is also evolving day by day.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="sc_box">
            <div class="img-box img-box02">
             <div class="box-inner">
              <div class="sc">
               <div class="elementor-slide-heading">
				   Those who spent their lives in the pursuit of countless goals <br class="m-none">
				   have now begun searching for ways <br class="m-none"> to look after themselves and get the most out of life.
				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
<div class="swiper-slide">
        <div class="sc_box">
            <div class="img-box img-box02">
             <div class="box-inner">
              <div class="sc">
               <div class="elementor-slide-heading">During the pandemic, <br>we both experienced healing and learned <br>the inherent value of healing.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
  </div>

  <div class="s_con s_con3 section sc_top">
      <div class="sc_box">
        <div class="img-box img-box03">
          <div class="box-inner">
            <div class="sc">
				<div class="elementor-slide-heading">
					<!-- You’ve been dreaming of<br>
					Agewell <span class="m-none"> · </span><br class="m-only">
					Feelwell<span class="m-none "> · </span><br class="m-only">
					Bewell -->
					What you’ve always dreamed of: <br>
					Aging well,<br class="m-only"> Feeling well,<br class="m-only"> and Being well
				</div>
				<div class="elementor-slide-description">
					<!-- Now, experience finding the healthy energy<br> 
					you need to take care of yourself<br class="m-only"> 
					and live as yourself at reepot's Querencia.   -->
					Experience the healthy energy to look after yourself <br class="m-only"> and live your best life in reepot’s Querencia.
				</div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="s_con s_con4 section sc_top">
      <div class="sc_box">
        <div class="img-box img-box04">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">
                <img decoding="async" src="/images/quotes.png" style="width:60px; margin-bottom:30px;">
                <p> Can reepot really put a brighter smile on my face?</p>
                <img decoding="async" src="/images/Of-course.png" >
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="s_con s_con5 section sc_top">
      <div class="sc_box">
        <div class="img-box img-box05">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">The excitement of a first encounter</div>

            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="s_con s_con6 section sc_top">
      <div class="sc_box">
        <div class="img-box img-box06">
          <div class="box-inner">
            <div class="sc">
				<div class="elementor-slide-heading">
					<!-- Look forward to your day,<br> every day -->
					Making you<br> look forward to every day
				</div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="s_con s_con7 section sc_top">
      <div class="sc_box">
        <div class="img-box img-box07">
          <div class="box-inner">
            <div class="sc">
				<div class="elementor-slide-heading">
					<!-- My own  <span class="d-sq">resting space</span> -->
					Your own <span class="d-sq">resting space</span>
				</div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="s_con s_con8 section sc_top">
      <div class="sc_box">
        <div class="img-box img-box08">
          <div class="box-inner">
            <div class="sc">
				<div class="elementor-slide-heading">
					<!-- My own  <span class="d-sq">healing time</span> -->
					Your own <span class="d-sq">healing time</span>
				</div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="s_con s_con9 section sc_top">
      <div class="sc_box">
        <div class="img-box img-box09">
          <div class="box-inner">
            <div class="sc">
				<div class="elementor-slide-heading">
					<!-- Whenever you are together<br>
					Agewell <span class="m-none"> · </span><br class="m-only">
					Feelwell<span class="m-none "> · </span><br class="m-only">
					Bewell -->
					Join us and experience a life of<br class="m-none"> Aging well, Feeling well, and Being well
				</div>
            </div>
          </div>
        </div>
      </div>
  </div>

<!--con09-->
  <div class="s_con con09 section">
      <div class="s_con-inner">
        <div class="box">
          <div class="text">
          <h2 class="heading-title ">Consult with a doctor at your local hospital or clinic.</span></h2>
			<p class="widget-container2">Nd:YAG surgical laser<br>
			“This product is a medical device. Be sure to read the Precautions for Use and Instructions before using this product.” <br>
				Medical device advertisement examination completed Examination No.: Johap-2022-35-010<br>
				(Valid until Sep 29, 2025)
			</p>
          </div>
          <ul class="box-list">
            <li><img src="/images/tec_1.png" alt=""><br><br><a href="/technology_e.php">Learn more about reepot </a></li>
            <li><img src="/images/tec_2.png" alt=""><br><br><a href="https://eng.ilooda.com/contact/">Concierge Center</a></li>
            <li><img src="/images/tec_3.png" alt=""><br><br><a href="/service_e.php">F&Q</a></li>
         </ul>
        </div>
      </div>
    </div>

  <div class=" section">
    <?php
    include_once(G5_PATH.'/tail_e.php');
    ?>
  </div>
</div> <!-- #fullpage 끝 -->

<script type="text/javascript">
new fullpage('#fullpage', {
	//options here
	autoScrolling:true,
	scrollHorizontally: true,
	responsiveWidth: 769,
	'onLeave': function(origin, destination, direction, trigger){
		if(destination.index == 2 || destination.index == 3|| destination.index == 4){
			$('#hd').addClass('onn');
		}else {
			$('#hd').removeClass('onn');
		}
	}
});

$('.scrollindex').on('click', function(){
	fullpage_api.moveTo(1);
})

const Swiper_1 = new Swiper('.main2', {
	//loop:true,
	slidesPerView:'auto',
	/*
	spaceBetween: 13,
	breakpoints: { //반응형 조건 속성
        1380: { //1600 이상일 경우
          slidesPerView: 4, //레이아웃 3열
        },
        720: {
          slidesPerView: 2,
		  spaceBetween: 20,
        },
     },
	 */
	speed: 700,
	navigation: {
		nextEl: '.next',
		prevEl: '.prev',
	},
});

</script>

 <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
        mousewheel: true,
    });
  </script>

