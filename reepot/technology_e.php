
<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/technolog_e.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/technolog_e.php');
    return;
}

include_once(G5_PATH.'/head_e.php');
?>

<style>

/*공통*/
.m-only{display:none}
.sc_inner .txt-box{text-align: left;}
.elementore-heading{text-align: left;color: #4C4C4E;font-family: "KoPubWorldDotum", Sans-serif;font-size: 1.9vw;font-weight: 600;}
.elementore-description{text-align: left;color: #4C4C4E;font-family: "KoPubWorldDotum", Sans-serif;font-size: 1.3vw;font-weight: 400;line-height: 1.2;}
.s_con{width: 100%;position:relative}
.s_con-inner {  min-height: 60vw;  display: flex;align-items: center;}
.s_con-inner .box{text-align: left;margin: 0% 0% 0% 15%;}
.s_con-inner .box .text h2 {font-size: 2.6vw;font-weight: 600;line-height: 1.4em;}
.con09 .s_con-inner .box .text .widget-container2 {text-align: center;font-size: 0.833vw;font-weight: 400;margin-top: 30px;line-height: 1.5em;letter-spacing: 0px;}
/*.sc_01*/
.sc_01{background-image: url(/images/main-5.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_01 .sc_inner{min-height: 50vw;display: flex;flex-direction: column;justify-content: center;align-items: center;}
.sc_01 .elementore-heading{    text-align: center;}
.sc_01 .sc-txt{margin-top: 50px;}
.sc_01 .sc-txt .elementore-description{text-align:center;line-height:1.5}
/*.sc_02*/
.sc_02 .sc02-video{background: #000;}
.sc_02 video{width: 100%;}
/*sc_03*/
.sc_03 .sc_inner{min-height: 50vw;display: flex;align-items: center; }
.sc_03 .sc_inner.inner01 {background: url(/images/mid-carousel-1.png) no-repeat;background-size: 100% 100%;  background-size: cover;
    background-position: center;}
.sc_03 .sc_inner.inner02 {background: url(/images/Still_02_v5-1.png) no-repeat;background-size: 100% 100%;  background-size: cover;
    background-position: center;}
.sc_03 .sc_inner .txt-box{padding: 0% 0% 0% 20%;}
.sc_03 .sc_inner .elementor-heading{ font-size: 2.6vw;margin: 0% 0% 2.5% 0%;font-weight: 700;line-height: 1.4em;letter-spacing: -1px;}
.sc_03 .sc_inner .elementor-description{    font-size: 1.5vw;}
.sc_03 .sc_inner .elementor-heading span.ts{font-size:2vw}
.sc_03 .sc_inner.inner02 .elementor-description{color: #fff;}

/*.sc_04 */
.sc_04 {position:relative}
.sc_04 .sc_inner {min-height: 56vw; background: url(/images/autoderm-obj-1.jpg) no-repeat;background-position: center center;background-repeat: no-repeat;background-size: cover;padding: 38% 0% 0% 50%;}
.sc_04 .sc_inner .txt-box{    padding-right: 5%;}
.sc_04 .sc_inner .elementor-heading{margin: 0% 0% 2.5% 0%;
    padding: 3% 0% 0% 0%;font-size: 3.1vw;font-weight: 700;line-height: 1.2em;letter-spacing: -1px;}
.sc_04 .sc_inner .elementor-description{font-size: 1.3vw;font-weight: 400;line-height: 1.4em;letter-spacing: -0.5px;}
.sc_04 img{position:absolute}
.sc_04  .sc_04-img1{position: absolute;width: 6.6%;top: 64%;left: 53.7%;transform: translate(-50%,-50%);}
.sc_04  .sc_04-img2{position: absolute;width: 18%;top: 33%;left: 29%;transform: translate(-50%,-50%);}
.sc_04  .sc_04-img3{position: absolute;width: 30%;top: 39%;left: 31.8%;transform: translate(-50%,-50%);    width: 2.656vw;max-width: 2.656vw;}

/*.sc_05 */
.sc_05 {background:#000;padding: 100px 0px 0px 0px;}
.sc_05 .sc_inner{max-width: 1140px;margin: 0 auto;}
.sc_05 .sc_inner h2{margin: 0px 0px 30px 0px;color: #FFFFFF;font-size: 3.1250vw;font-weight: 600;}
.sc_05 .sc_inner .sc_05-top{position: relative;display: flex;flex-direction: column;align-items: center;}
.sc_05 .sc_inner .sc_05-top .elementor-video{width:100%}
.sc_05 .sc_inner .sc_05-top .video-bg{background-color: transparent;background-image: linear-gradient(180deg, #000000 30%, #FF000000 100%);position: absolute;top: 0;left: 0;height: 100px;width: 100%;}
.sc_05 .sc_inner .note{text-align: center;color: #AAAAAA; font-size: 1.417vw;font-weight: 400;line-height: 30px;}
.sc_05 .sc_inner .sc_05-bottom{padding: 100px 0px 100px 0px;max-width: 1280px;}
.sc_05 .sc_inner .sc_05-bottom ul{display: flex;color: #fff;}
.sc_05 .sc_inner .sc_05-bottom ul li{padding: 10px;}
.sc_05 .sc_inner .sc_05-bottom dl{margin-top: 10px;}
.sc_05 .sc_inner .sc_05-bottom dt{font-size: 24px;font-weight: 700;margin-bottom: 20px;}
.sc_05 .sc_inner .sc_05-bottom dd{color: #AAAAAA;font-size: 16px;font-weight: 400;line-height: 1.4em;}

/*.sc_06 */
.sc_06 {position:relative;background-color: #FFFFFF;background-image: url(/images/tec-mid-img2.png);background-position: center right;background-repeat: no-repeat;background-size: cover;}
.sc_06 .sc_inner{display: flex;align-items: center;min-height: 50vw;}
.sc_06 .sc_inner .sc-txt{padding: 0% 0% 2% 20%;}
.sc_06 .elementore-heading{font-size: 3.1vw;font-weight: 600;margin: 0% 0% 2.5% 0%;line-height: 1.4em;letter-spacing: 0px;}
.sc_06 .elementore-heading span{font-size: 2vw;}
.sc_06 .elementore-description{font-size: 1.3vw;font-weight: 400;line-height: 1.4em;}
.sc_06  .note{padding: 0% 0% 0% 20%;text-align: left;position: absolute;bottom: 50px;color: #CCCCCC; font-size: 1vw;font-weight: 400;line-height: 30px;}
.sc_06 .note img{width: 1vw;}

/*.sc_07 */
.sc_07 {background-color: #F8F8F8;}
.sc_07 .sc_inner{padding: 0% 14% 150px 20%;}
.sc_07 .elementore-heading{font-size: 2.6vw;font-weight: 600;line-height: 1.4em;letter-spacing: 1px;}
.sc_07 .sc-txt{margin: 0px 0px 0px 0px;padding: 150px 0px 30px 0px;}
.sc_07 .sc_inner ul{display: flex;}
.sc_07 .sc_inner ul li{width:33.33%;text-align: left;}
.sc_07 .sc_inner ul li .info{width:77%}
.sc_07 .sc_inner ul li .tit{font-size: 1vw;font-weight: 600;line-height: 1.5em;letter-spacing: 0px;margin-bottom:15px}
.sc_07 .sc_inner ul li .txt{text-align: right;color: #CCCCCC;font-family: "KoPubWorldDotum", Sans-serif;font-size: 0.83vw;font-weight: 400;}

.con09{background-image: url(/images/doctor-2.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.con09 .s_con-inner { align-items: flex-start;justify-content: center;}
.con09 .s_con-inner .box {margin: 0% ;text-align: center;padding: 0 4%}
.con09 .s_con-inner .box .text h2 {color:#4c4c4e;  font-size: 3.1vw;margin-top: 5.7292vw;}
.con09 .s_con-inner .box .text .widget-container2{text-align: center;font-weight: 400;margin-top: 2.6042vw;line-height: 1.5em;font-size:1.3vw;letter-spacing: 0px;}

.con10 .s_con-inner{min-height: 100%;display: block;justify-content: center;align-items: center;margin-top: 100px;margin-bottom: 100px;padding: 150px 0px 150px 0px;}
.con10 .s_con-inner .box{margin-left:0}
.con10 .box ul{display:flex; justify-content: space-between;    justify-content: space-evenly;    align-items: center;}
.con10 .box ul li {text-align: center;}
.con10 .box a{font-size: 1.25vw;font-weight: 400;position: relative;line-height: 40px;fill: #4C4C4E;transition: all 0.1s;color: #4C4C4E;}
.con10 .box a:hover {font-weight: 600;}
.con10 .box a:after{content: "";position: absolute;left: 0;bottom: -10px;width: 0px;height: 2px;margin: 5px 0 0;transition: all 0.2s ease-in-out;transition-duration: 0.3s;opacity: 0; background-color: #4C4C4E;}
.con10 .box a:hover:after{width: 100%;opacity: 1;}

@media only screen and (max-width: 1280px) {

}

@media only screen and (max-width:1040px) {
.elementore-heading {  font-size: 2.3vw;}
.elementore-description {   font-size: 1.5vw;}

.sc_03 .sc_inner .txt-box {padding: 0% 0% 0% 10%;}

.sc_04 .sc_inner .elementor-description {font-size: 1.5vw;}

.sc_06 .sc_inner .sc-txt {padding: 0% 0% 2% 15%;}
.sc_06 .elementore-heading {font-size: 4.1vw;}
.sc_06 .elementore-description {font-size: 1.5vw;}
.sc_06 .note {padding: 0% 0% 0% 15%; font-size: 1.2vw;}

.sc_07 .sc_inner {padding: 0% 5% 150px 10%;}
.sc_07 .sc_inner ul li .tit {font-size: 1.329vw;}
.sc_07 .sc_inner ul li .txt { font-size: 1.2vw;}

.con09 .s_con-inner .box .text h2 {font-size: 4.1vw;margin-top: 8.6538vw;}
.con09 .s_con-inner .box .text .widget-container2 {font-size: 1.3vw;margin-top: 2.8846vw;}
.con09 .s_con-inner { min-height: 75vw;}

.con10 .box a {font-size: 2.25vw;}
}

@media only screen and (max-width: 768px) {
.m-only{display:block}
.m-none{display:none}

.sc_01 {background-image: none;}
.sc_01 .sc-txt {margin-top: 0;margin-bottom:15.00vw}
.elementore-heading {font-size: 5.3vw;}
.elementore-description {font-size: 4.1vw;}

.sc_03 .sc_inner { height: 156.25vw;align-items: flex-end;justify-content: center;}
.sc_03 .sc_inner .txt-box {width:100%;text-align: center;padding: 0;}
.sc_03 .sc_inner .txt-box .grad{padding-bottom: 20.83vw;background: linear-gradient( to bottom, rgba(0, 0, 0, 0) 0, rgba(255, 255, 255, 0.3) 10%, rgba(255, 255, 255, 0.5) 25%, rgba(255, 255, 255, 0.8) 40%, rgba(255, 255, 255, 0.8) 50%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 1) 100% );}
.sc_03 .sc_inner .txt-box .grad2{    padding-bottom: 20.83vw;background: linear-gradient( to bottom, rgba(19,33,62, 0) 0, rgba(19,33,62, 0.3) 10%, rgba(19,33,62, 0.5) 25%, rgba(19,33,62, 0.8) 40%, rgba(19,33,62, 0.8) 50%, rgba(19,33,62, 0.9) 75%, rgba(19,33,62,1) 100% );}

.sc_03 .sc_inner .elementor-heading {font-size: 8.1vw;}
.sc_03 .sc_inner .elementor-description{font-size: 3.1vw;}
.sc_03 .sc_inner.inner02 .elementor-description { font-size: 3.1vw;margin:0 auto;width: 80%;}
.sc_03 .sc_inner .elementor-heading span.ts{font-size:7.1vw}
.sc_04 .sc_inner {padding: 0;background: none}
.sc_04 .sc_inner .sc_04-img4{position: static;}
.sc_04 .sc_inner .elementor-heading { font-size: 8.1vw;text-align:center;    margin: 0% 0% 5.86vw 0%;}
.sc_04 .sc_inner .elementor-description {font-size: 3.8vw;text-align:center;    width: 80%;margin: 0 auto 20.18vw;}
.sc_03 .sc_inner.inner01 {background: url(/images/mid-carousel-1v2.png) no-repeat;background-size: 100% 100%;  background-size: cover;background-position: center;}
.sc_03 .sc_inner.inner02 {background: url(/images/mid-carousel-2v2.png) no-repeat;background-size: 100% 100%;  background-size: cover;background-position: center;}

.sc_05 .sc_inner .sc_05-bottom ul {padding: 0 2vw; flex-direction: column;}
.sc_05 .sc_inner .sc_05-bottom ul li{display: flex;align-items: center;justify-content: space-around;    padding: 15px 10px;}
.sc_05 .sc_inner .sc_05-bottom dl { margin:0;width: 50%;}

.sc_06 {background-image:none}
.sc_06 .sc_inner { flex-direction: column;margin-top: 20.83vw;}
.sc_06 .elementore-heading {font-size: 8.1vw;}
.sc_06 .elementore-description {font-size: 3.8vw;    text-align: center;}
.sc_06 .sc_inner .sc-txt {padding: 0;width: 80%;}
.sc_06 .elementore-heading span {font-size: 5vw;}
.sc_06 .note {padding: 0% 0% 0% 3%;font-size: 2.5vw;color: #e9e9e9;}
.sc_06 .note img {width: 4.8vw;}

.sc_07 .sc_inner {padding: 0% 0 150px 5%;}
.sc_07 .elementore-heading {font-size: 6.6vw;}
.sc_07 .sc_inner ul { flex-direction: column;}
.sc_07 .sc_inner ul li {width: 100%;margin:20px 0;display: flex;flex-direction: column;align-items: center;}
.sc_07 .sc_inner ul li .tit {font-size: 3.329vw;}
.sc_07 .sc_inner ul li .txt {font-size: 3.2vw;}

.con09 {margin-top: 0;}
.con09 {margin-top: 0;background-image: url(/images/m-doctor-2.png);}
.con09 .s_con-inner {min-height: 154.25vw;align-items: flex-start;justify-content: center;}
.con09 .s_con-inner .box .text h2 {margin-top: 13.14vw;text-align: center;font-size: 8.21vw;}
.con09 .s_con-inner .box .text .widget-container2 {font-size: 3.125vw;margin-top: 6.8846vw;}

.con10 .s_con-inner { margin-top: 0;margin-bottom: 0;}
.con10 .box ul{display: flex;justify-content: space-evenly;flex-direction: column;align-items: center;}
.con10 .box ul li {margin: 30px 0;text-align: center;}
.con10 .box a {font-size: 4.25vw;}
}
@media only screen and (max-width: 480px) {
 .sc_05-bottom img{
	width: 58.3333vw;
 }

}
</style>

<div class="sub_technology">
  <div class="sc_01">
    <div class="sc_inner">
    <img src="/images/m-main-5.png" alt="" class="m-only">
      <div class="sc-txt">
        <div class="elementore-heading">Introducing VSLS, reepot’s core technology</div>
        <div class="elementore-description">
			reepot is a medical device featuring ilooda’s VSLS® technology <br>
			equipped to a Nd:YAG laser source with a 532nm wavelength.
		</div>
      </div>
    </div>
  </div>

 <div class="sc_02">
  <div class="sc_inner ">
    <div class="sc02-video">
      <video class="elementor-video" src="/video/ilooda_en_size_nocomment.mp4" autoplay="" controls="" muted="muted" playsinline="" controlsList="nodownload"></video>
    </div>
  </div>
</div>

<div class="sc_03">
  <div class="sc_inner inner01">
    <div class="txt-box">
    <div class="grad">
      <div class="elementor-heading">Experience intense cooling and <br>the smoothness of sapphire</div>
      <div class="elementor-description">VSLS® is reepot’s new energy model.</div>
      </div>
    </div>
  </div>
  <div class="sc_inner inner02">
    <div class="txt-box">
    <div class="grad grad2">
		<div class="elementor-heading">
			<!-- <span style="color:#fff">The contact cooling-type<br> vascular supercooling technology</span> -->
			<span style="color:#fff">CPTL, is a method of <br>contact cooling technology which </span>
		</div>
		<div class="elementor-description">
			<!-- protects the skin by continuously maintaining a set cooling <br> 
			temperature during the procedure and at the same time radiates safe and powerful energy. -->
			maintains a constant cooling temperature throughout treatment,<br> protecting the skin while facilitating a strong and stable energy output.
		</div>
      </div>
    </div>
  </div>
</div>

<div class="sc_04">
  <div class="sc_inner">
  <img src="/images/autoderm-obj-3.png" alt="" class="sc_04-img1">
  <img src="/images/autoderm-obj-1.png" alt="" class="sc_04-img2">
  <img src="/images/tec-new2-1.png" alt="" class="sc_04-img3">
    <img src="/images/m-autoderm-obj-1.png" alt="" class="sc_04-img4 m-only">

    <div class="txt-box">
      <div class="elementor-heading">AutoDerm® is</div>
		<div class="elementor-description">
			a location detection and tracking guidance technology that ensures the laser’s energy is transmitted only at the target		area. <br>
			The external medical camera facilitates safe treatment by employing real-time lesion data collection to adjust the energy transmitted to the target		location.
		</div>
    </div>
  </div>
</div>

<div class="sc_05" id="sc_05">
  <div class="sc_inner">
  <h2>Treatment Principles</h2>
   <div class="sc_05-top">
   <img src="/images/opacity.png" alt="" class="video-bg">
  <video class="elementor-video" src="/video/20220809-1.mp4" autoplay="" muted="muted" playsinline="" controlsList="nodownload"></video>
  <p class="note">*Image provided to assist with understanding</p>
  </div>
  <div class="sc_05-bottom">
    <ul>
      <li>
        <img src="/images/tec-movie-img.png" alt="">
        <dl>
          <dt>STEP 01</dt>
          <dd>Target area captured</dd>
        </dl>
      </li>
       <li>
        <img src="/images/tec-movie-img02.png" alt="">
        <dl>
          <dt>STEP 02</dt>
          <dd>Hypercooling applied to target area</dd>
        </dl>
      </li>
       <li>
        <img src="/images/tec-movie-img03.png" alt="">
        <dl>
          <dt>STEP 03</dt>
          <dd>Image recognition of target area</dd>
        </dl>
      </li>
       <li>
        <img src="/images/tec-movie-img04.png" alt="">
        <dl>
          <dt>STEP 04</dt>
          <dd>Laser output adjusted and <br>emitted to target area</dd>
        </dl>
      </li>
    </ul>
  </div>
  </div>
</div>

<div class="sc_06">
  <div class="sc_inner">

    <div class="sc-txt">
      <div class="elementore-heading">Our Smart Glasses (HMD) were</div>
      <div class="elementore-description">designed with a crystal clear display to allow users to intuitively control the VSLS function <br>from any viewing angle and in any treatment setting.</div>
    </div>
    <img src="/images/m-tec-mid-img2.png" alt="" class="m-only">
  </div>
  <p class="note"><img src="/images/find-icon.png" alt="">The Smart Glasses are not a medical device.</p>
</div>

<div class="sc_07">
  <div class="sc_inner">
    <div class="sc-txt">
      <div class="elementore-heading">ilooda holds American and Korean patients for the VSLS technology mechanism.</div>
    </div>
    <div class="sc_07-ul">
      <ul>
        <li>
          <img src="/images/tec-one-2.png" alt="" class="m-none">
          <img src="/images/tec-one-2_m.png" alt="" class="m-only">
          <div class="info">
          <p class="tit">LIGHT TREATMENT DEVICE USING <br>LESION IMAGE ANALYSIS, METHOD OF<br>DETECTING LESION POSITION THROUGH<br>LESION IMAGE ANAL YSIS FOR USE<br>THEREIN,AND COMPUTING DEVICE<br>READABLE RECORDING MEDIUM HAVING<br>THE SAME RECORDED THEREIN</p>
          <p class="txt">US 10,525,276</p>
          </div>
        </li>
        <li>
          <img src="/images/tec-two-1.png" alt="" class="m-none">
          <img src="/images/tec-two-1_m.png" alt="" class="m-only">
          <div class="info">
          <p class="tit">A light treatment device using lesion image analysis, method of detecting lesion position through lesion image analysis for use therein, and computing device readable recording medium having the same recorded therein</p>
          <p class="txt">KR 10-1580075</p>
          </div>
        </li>
        <li>
          <img src="/images/tec-three-1.png" alt="" class="m-none">
          <img src="/images/tec-three-1_m.png" alt="" class="m-only">
          <div class="info">
          <p class="tit">A light treatment device using lesion image analysis and handpiece used therein</p>
          <p class="txt">KR 10-1351138</p>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="s_con con09 section">
      <div class="s_con-inner">
        <div class="box">
          <div class="text">
          <h2 class="heading-title ">Consult with a doctor at your local hospital or clinic.</h2>
			<p class="widget-container2">Nd:YAG surgical laser<br>
				<!-- “As this product is a medical device,  <br class="m-only">be sure to read the Precautions for Use and How to Use before using.” ​ -->
				“This product is a medical device. Be sure to read the Precautions for Use and Instructions before using this product.” <br>
				Medical device advertisement examination completed Examination No.: Johap-2022-35-010<br>
				(Valid until Sep 29, 2025)
			</p>
          </div>
        </div>
      </div>
    </div>

    <div class="s_con con10 section">
      <div class="s_con-inner">
        <div class="box">
         <ul>
            <li><img src="/images/tec_1.png" alt=""><br><br><a href="/technology_e.php">Learn more about reepot </a></li>
            <li><img src="/images/tec_2.png" alt=""><br><br><a href="https://eng.ilooda.com/contact/">Concierge Center</a></li>
            <li><img src="/images/tec_3.png" alt=""><br><br><a href="/service_e.php">F&Q</a></li>
         </ul>
        </div>
      </div>
    </div>

<div>

<?php
include_once(G5_PATH.'/tail_e.php');