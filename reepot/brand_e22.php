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
.s_con{width: 100%;position:relative}
.s_con-inner {min-height: 60vw;display: flex;align-items: center;}
.s_con-inner .box{text-align: left;margin: 0% 0% 0% 15%;}
.m-only{display:none}
.sc_top a{}
.s_con-inner .box .text h2{color: #4C4C4E;font-family: "KoPubWorldDotum", Sans-serif;font-size: 2.6vw;font-weight: 600;line-height: 1.4em;}
.s_con-inner .box .text h2{margin-top: 15px;}

.sc_top .sc_box{position: relative;height: 1050px;}
.sc_top .img-box {background-position: right;background-size: cover;height: 100%;}
.sc_top .img-box .box-inner .elementor-slide-heading{font-family: "KoPubWorldDotum", Sans-serif;font-size: 2.6vw;font-weight: 600;text-decoration: none;line-height: 1.4em;}
.sc_top .img-box .box-inner .elementor-slide-description{font-family: "KoPubWorldDotum", Sans-serif;font-size: 1vw;font-weight: 400;text-decoration: none;line-height: 1.5em;margin-top: 20px;}
.sc_top .img-box .d-sq{border:2px solid #fff;padding:10px}
.sc_top .img-box01{background: url(/images/main.png) no-repeat;background-position: center;background-size: cover;}
.sc_top .img-box .box-inner{padding-left: 15%;display: flex;text-align: left;}
.sc_top .img-box .box-inner div.sc{padding-top: 26%;margin-bottom: 30px;}
.sc_top .img-box02 .box-inner{text-align: center;display: flex;justify-content: center;align-items: center;padding: 0;}
.sc_top .img-box02 .box-inner div.sc{padding-top: 0;margin-bottom: 0;}
.sc_top .img-box02{background: rgb(255,255,255);background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(86,102,124,1) 100%);}
.sc_top .img-box02{display: flex;justify-content: center;align-items: center;}
.sc_top .img-box03 .box-inner div.sc,.sc_top .img-box06 .box-inner div.sc,.sc_top .img-box07 .box-inner div.sc,.sc_top .img-box08 .box-inner div.sc,.sc_top .img-box09 .box-inner div.sc{padding-top: 700px;margin-bottom: 30px;color: #fff;}
.sc_top .img-box03{background: url(/images/main-2.png) no-repeat;background-position: right;background-size: cover;}
.sc_top .img-box04 .box-inner{padding-left: 0;display: flex;text-align: left;justify-content: center;}
.sc_top .img-box04 .box-inner div.sc{padding-top: 0;color: #fff;}
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading{display: flex;flex-direction: column;align-items: center;}
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading img:first-of-type{width: 60px;margin-bottom: 30px;margin-top: 187px;display: block;}
.sc_top .img-box05 .box-inner { justify-content: flex-end;}
.sc_top .img-box05 .box-inner div.sc{padding-right: 10%;text-align: right;padding-top: 800px;color:#fff}
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading img:last-of-type{width: 16vw;}
.sc_top .img-box04{background: url(/images/main-3.png) no-repeat;background-position: right;background-size: cover;}
.sc_top .img-box05{background: url(/images/main-4.png) no-repeat;    background-position: center;;background-size: cover;}
.sc_top .img-box06{background: url(/images/main-55.png) no-repeat;background-position: right;background-size: cover;}
.sc_top .img-box07{background: url(/images/main-66.png) no-repeat;background-position: right;background-size: cover;}
.sc_top .img-box08{background: url(/images/main-77.png) no-repeat;background-position: right;background-size: cover;}
.sc_top .img-box09{background: url(/images/main-88.png) no-repeat;background-position: right;background-size: cover;}
.sc_top .img-box10{background: url(/images/main-99.png) no-repeat;background-position: right;background-size: cover;}


/*.con09*/
.con09{margin-top:100px;background-image: url(/images/doctor-2.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.con09 .s_con-inner { align-items: flex-start;justify-content: center;}
.con09 .s_con-inner .box {margin: 0% ;}
.con09 .s_con-inner .box .text h2 {margin-top:10vw}
.con09 .s_con-inner .box .text .widget-container2{text-align: center;    font-size: 0.833vw;font-weight: 400;    margin-top: 30px;line-height: 1.5em;letter-spacing: 0px;}

.con10 .s_con-inner{min-height: 100%;
    display: flex;    justify-content: center;
    align-items: center;
    margin-top: 100px;
    margin-bottom: 100px;
    padding: 150px 0px 150px 0px;}
.con10 .s_con-inner .box{margin-left:0}
.con10 .box ul{display:flex;    min-width: 1400px;
    justify-content: space-between;}
.con10 .box ul li {text-align: center;}
.con10 .box a{    font-size: 1.25vw;
    font-weight: 400;position: relative;
    line-height: 40px;
    fill: #4C4C4E;    transition: all 0.1s;
    color: #4C4C4E;}
.con10 .box a:hover {
    font-weight: 600;
}
.con10 .box a:after{
  content: "";
  position: absolute;
  left: 0;
  bottom: -10px;
  width: 0px;
  height: 2px;
  margin: 5px 0 0;
  transition: all 0.2s ease-in-out;
  transition-duration: 0.3s;
  opacity: 0;
  background-color: #4C4C4E;
}
.con10 .box a:hover:after{
  width: 100%;
  opacity: 1;
}
@media only screen and (max-width: 1280px) {
.s_con-inner .box .text h2 {font-size: 3.6vw;text-align: center;}
.sc_top .img-box .box-inner .elementor-slide-heading {font-size: 3.1vw;}
.sc_top .img-box .box-inner .elementor-slide-description { font-size: 1.5vw;}

.con09 .s_con-inner .box .text .widget-container2 {text-align: center;font-size: 1.8vw;}
.con09 .s_con-inner .box .text h2 {margin-top:4vw}
.con10 .box ul {display: flex;min-width: 768px;}
.con10 .box ul li {text-align: center;}
.con10 .box a {font-size: 2.25vw;}

}

@media only screen and (max-width: 1040px) {
.t-none{display:none}
.sc_top .img-box01 .box-inner {padding-left: 5%;}
.sc_top .img-box .box-inner .elementor-slide-heading{font-size: 4.6vw;}
.sc_top .img-box .box-inner .elementor-slide-description{font-size: 2vw;}

.sc_top .img-box02 {padding: 0 4%;}
.con09 .s_con-inner .box .text h2 {margin-top:0}

}

@media only screen and (max-width: 720px) {
.m-only{display:block}
.m-none{display:none}

.s_con-inner {min-height: 108vw;}
.s_con-inner .box .text h2 {font-size: 7.8vw;padding: 0 2%;}

.sc_top .img-box01 {background: url(/images/m-main.png) no-repeat;background-position: center right;}
.sc_top .img-box01 .box-inner {padding-left: 0;justify-content: center;text-align: center;}
.sc_top .img-box01 .box-inner div.sc{padding: 160px 2% 0;}

.sc_top .img-box03 {background: url(/images/m-main-2.png) no-repeat;}
.sc_top .img-box03 .box-inner{padding-left:0;    justify-content: center;}
.sc_top .img-box03 .box-inner div.sc{padding: 595px 2% 0;line-height: 1.3;text-align: center;}
.sc_top .img-box03 .box-inner .elementor-slide-heading {font-size: 8.33vw;line-height: 1.2;}
.sc_top .img-box04 {background: url(/images/m-main-3.png) no-repeat;}

.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading img:last-of-type {width: 40vw;}
.sc_top .img-box04 .box-inner div.sc .elementor-slide-heading {text-align: center;padding:0 2%}
.sc_top .img-box05 {background: url(/images/m-main-4.png) no-repeat;background-position: right;}
.sc_top .img-box05 .box-inner{padding-left: 15%;display: flex;text-align: left;justify-content: flex-end;}
.sc_top .img-box05 .box-inner div.sc {  padding-right: 10%;text-align: right;padding-top: 900px;}
.sc_top .img-box06 .box-inner {padding-left: 0;justify-content: center;}
.sc_top .img-box06 {background: url(/images/m-main-55.png) no-repeat;background-position: right;}
.sc_top .img-box06 .box-inner div.sc{text-align: center;padding-top: 800px;}
.sc_top .img-box07 {background: url(/images/m-main-66.png) no-repeat;background-position: right;}
.sc_top .img-box07 .box-inner div.sc,.sc_top .img-box08 .box-inner div.sc{    padding-top: 860px;}
.sc_top .img-box08 {background: url(/images/m-main-77.png) no-repeat;background-position: right;}
.sc_top .img-box09 {background: url(/images/m-main-88.png) no-repeat;background-position: right;}
.sc_top .img-box09 { background-position: center;}
.sc_top .img-box09 .box-inner {padding-left: 0;    justify-content: center;}
.sc_top .img-box09 .box-inner div.sc{      padding-top: 635px;  text-align: center;}
.sc_top .img-box09 .box-inner .elementor-slide-heading {line-height: 1.2;}
.sc_top .img-box .box-inner .elementor-slide-heading {font-size: 7.33vw;}
.sc_top .img-box .box-inner .elementor-slide-description{font-size: 3.91vw;width: 100%;text-align: center;    margin-top: 30px;}

.sc_top .img-box02 .box-inner .elementor-slide-heading {font-size: 6.94vw;}
.con09 {height: 300px !important;}
.con09 .s_con-inner {min-height: auto;}
.con09 .fp-tableCell {height: 300px !important;}
.con09 .s_con-inner .box .text .widget-container2 {text-align: center;font-size: 4vw;padding: 0 2%;}
.con09 {margin-top: 0; background-image: none}
.con09 .s_con-inner .box .text h2 {margin-top: 6rem;}

.con10 {height:26% !important;}
.con10 .fp-tableCell {height: 26% !important;}
.con10 .s_con-inner{margin-top: 75px;padding-top: 0;}
.con10 .box ul {display: flex;min-width: auto;flex-direction: column;align-items: center;}
.con10 .box ul li {margin: 2vw 0;}
.con10 .box a {font-size: 4.25vw;}
}
</style>

<div id="fullpage">
  <div class="s_con section sc_top">
      <div class="sc_box">
        <div class="img-box img-box01">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">Where is your Querencia?</div>
              <div class="elementor-slide-description"> Querencia is a Spanish word that means a place <br class="m-only"> where you can focus on yourself <br class="m-none"> in the midst of a busy and intense daily life,that is,  <br class="m-only">your own space of rest and healing.</div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="s_con section sc_top">
      <div class="sc_box">
        <div class="img-box img-box02">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">As the world is changing rapidly, <br>our thoughts and desires are also changing day by day.</div>

            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="s_con section sc_top">
      <div class="sc_box">
        <div class="img-box img-box03">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">You’ve been dreaming of<br>Agewell <span class="m-none"> · </span><br class="m-only">Feelwell<span class="m-none "> · </span><br class="m-only">Bewell</div>
              <div class="elementor-slide-description">Now, experience finding the healthy energy<br> you need to take care of yourself<br class="m-only">  and live as yourself at reepot's Querencia. </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="s_con section sc_top">
      <div class="sc_box">
        <div class="img-box img-box04">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading"><img decoding="async" src="/images/quotes.png" style="width:60px; margin-bottom:30px;">reepot, is this really going to make me smile more?<br><br><img decoding="async" src="/images/Of-course.png" ></div>

            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="s_con section sc_top">
      <div class="sc_box">
        <div class="img-box img-box05">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">The excitement of the first experience</div>

            </div>
          </div>
        </div>
      </div>
  </div>
   <div class="s_con section sc_top">
      <div class="sc_box">
        <div class="img-box img-box06">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">Look forward to your day, every day</div>
            </div>
          </div>
        </div>
      </div>
  </div>
   <div class="s_con section sc_top">
      <div class="sc_box">
        <div class="img-box img-box07">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">My own  <span class="d-sq">resting space</span></div>
            </div>
          </div>
        </div>
      </div>
  </div>
   <div class="s_con section sc_top">
      <div class="sc_box">
        <div class="img-box img-box08">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">My own  <span class="d-sq">healing time</span></div>
            </div>
          </div>
        </div>
      </div>
  </div>
   <div class="s_con section sc_top">
      <div class="sc_box">
        <div class="img-box img-box09">
          <div class="box-inner">
            <div class="sc">
              <div class="elementor-slide-heading">Whenever you are together <br>Agewell <span class="m-none"> · </span><br class="m-only">Feelwell<span class="m-none "> · </span><br class="m-only">Bewell</div>
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
          <h2 class="heading-title ">Consult with the director of a nearby hospital•clinic.</span></h2>
          <p class="widget-container2">Nd:YAG laser Surgical Unit<br>
           “As this product is a medical device,  <br class="m-only">be sure to read the Precautions for Use and How to Use before using.” ​</p>
          </div>
        </div>
      </div>
    </div>

    <div class="s_con con10 section">
      <div class="s_con-inner">
        <div class="box">
         <ul>
            <li><a href="/technolog_e.php">About VSL®,<br>reepot core technology</a></li>
            <li><a href="/bbs/board.php?bo_table=p29_e">Find reepot<br> Querencia</a></li>
            <li><a href="/service_e.php">Frequently <br>Asked<br> Questions</a></li>
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

