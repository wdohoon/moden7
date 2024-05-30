
<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/technolog.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/technolog.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>

<style>

/*공통*/
.m-only{display:none}
.sc_inner .txt-box{text-align: left;}
.elementore-heading{text-align: left;color: #4C4C4E;font-family: "KoPubWorldDotum", Sans-serif;font-size: 1.9vw;font-weight: 600;}
.elementore-description{text-align: left;color: #4C4C4E;font-family: "KoPubWorldDotum", Sans-serif;font-size: 1vw;font-weight: 400;line-height: 1.2;}

.s_con{width: 100%;position:relative}
.s_con-inner {  min-height: 60vw;  display: flex;align-items: center;}
.s_con-inner .box{text-align: left;margin: 0% 0% 0% 15%;}
.s_con-inner .box .text h2 {font-size: 2.6vw;font-weight: 600;line-height: 1.4em;}
.con09 .s_con-inner .box .text .widget-container2 {text-align: center;font-size: 0.833vw;font-weight: 400;margin-top: 30px;line-height: 1.5em;letter-spacing: 0px;}

/*.sc_01*/
.sc_01{background-image: url(/images/main-5.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_01 .sc_inner{min-height: 50vw;display: flex;flex-direction: column;justify-content: center;align-items: center;}
.sc_01 .sc-txt{margin-top: 50px;}
.sc_01 .sc-txt .elementore-description{text-align:center;line-height:1.5}

/*.sc_02*/
.sc_02 .sc02-video{background: #000;}
.sc_02 video{width: 100%;}

/*sc_03*/
.sc_03 .sc_inner{min-height: 50vw;display: flex;align-items: center; }
.sc_03 .sc_inner.inner01 {background: url(/images/mid-carousel-1.png) no-repeat;background-size: 100% 100%;  background-size: cover;background-position: center;height:1080px}
.sc_03 .sc_inner.inner02 {background: url(/images/Still_02_v5-1.png) no-repeat;background-size: 100% 100%;  background-size: cover;background-position: center;height:1080px}
.sc_03 .sc_inner .txt-box{padding: 0% 0% 0% 20%;}
.sc_03 .sc_inner .elementor-heading{ font-size: 2.6vw;margin: 0% 0% 2.5% 0%;font-weight: 700;line-height: 1.4em;letter-spacing: -1px;}
.sc_03 .sc_inner .elementor-heading span.ts{font-size:2vw}
.sc_03 .sc_inner.inner02 .elementor-description{color: #fff;}

/*.sc_04 */
.sc_04 {position:relative}
.sc_04 .sc_inner {min-height: 56vw; background: url(/images/autoderm-obj-1.jpg) no-repeat;background-position: center center;background-repeat: no-repeat;background-size: cover;padding: 38% 0% 0% 50%;}
.sc_04 .sc_inner .elementor-heading{margin: 0% 0% 2.5% 0%;padding: 3% 0% 0% 0%;font-size: 3.1vw;font-weight: 700;line-height: 1.2em;letter-spacing: -1px;}
.sc_04 .sc_inner .elementor-description{font-size: 1vw;font-weight: 400;line-height: 1.4em;letter-spacing: -0.5px;}
.sc_04 img{position:absolute}
.sc_04  .sc_04-img1{position: absolute;width: 6.6%;top: 64%;left: 53.7%;transform: translate(-50%,-50%);}
.sc_04  .sc_04-img2{position: absolute;width: 18%;top: 33%;left: 29%;transform: translate(-50%,-50%);}
.sc_04  .sc_04-img3{position: absolute;width: 30%;top: 39%;left: 31.8%;transform: translate(-50%,-50%);    width: 2.656vw;max-width: 2.656vw;}

/*.sc_05 */
.sc_05 {background:#000;padding: 100px 0px 0px 0px;}
.sc_05 .sc_inner{max-width: 1140px;margin: 0 auto;}
.sc_05 .sc_inner h2{margin: 0px 0px 30px 0px;color: #FFFFFF;font-size: 60px;font-weight: 600;}
.sc_05 .sc_inner .sc_05-top{position: relative;display: flex;flex-direction: column;align-items: center;}
.sc_05 .sc_inner .sc_05-top .elementor-video{width:100%}
.sc_05 .sc_inner .sc_05-top .video-bg{background-color: transparent;background-image: linear-gradient(180deg, #000000 30%, #FF000000 100%);position: absolute;top: 0;left: 0;height: 100px;width: 100%;}
.sc_05 .sc_inner .note{text-align: center;color: #AAAAAA; font-size: 20px;font-weight: 400;line-height: 30px;}
.sc_05 .sc_inner .sc_05-bottom{padding: 100px 0px 100px 0px;max-width: 1280px;}
.sc_05 .sc_inner .sc_05-bottom ul{display: flex;color: #fff;}
.sc_05 .sc_inner .sc_05-bottom ul li{padding: 10px;}
.sc_05 .sc_inner .sc_05-bottom dl{margin-top: 10px;}
.sc_05 .sc_inner .sc_05-bottom dt{font-size: 24px;font-weight: 700;margin-bottom: 20px;}
.sc_05 .sc_inner .sc_05-bottom dd{color: #AAAAAA;font-size: 20px;font-weight: 400;line-height: 1.4em;}

/*.sc_06 */
.sc_06 {position:relative;background-color: #FFFFFF;background-image: url(/images/tec-mid-img2.png);background-position: center right;background-repeat: no-repeat;background-size: cover;}
.sc_06 .sc_inner{display: flex;align-items: center;min-height: 50vw;}
.sc_06 .sc_inner .sc-txt{padding: 0% 0% 2% 20%;}
.sc_06 .elementore-heading{font-size: 3.1vw;font-weight: 600;margin: 0% 0% 2.5% 0%;line-height: 1.4em;letter-spacing: 0px;}
.sc_06 .elementore-heading span{font-size: 2vw;}
.sc_06 .elementore-description{font-size: 1vw;font-weight: 400;line-height: 1.4em;}
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
.sc_07 .sc_inner ul li .tit{font-size: 0.729vw;font-weight: 600;line-height: 1.5em;letter-spacing: 0px;margin-bottom:15px}
.sc_07 .sc_inner ul li .txt{text-align: right;color: #CCCCCC;font-family: "KoPubWorldDotum", Sans-serif;font-size: 0.83vw;font-weight: 400;}

.con09 .s_con-inner .box .text h2 {font-size: 3.1vw;margin-top: 130px;color:#4c4c4e}
/*.con09*/
.con09 .s_con-inner { align-items: flex-start;justify-content: center;}
.con09 .s_con-inner .box {margin: 0% ;}

.con09 .s_con-inner .box .text .widget-container2{text-align: center;margin-bottom: 10vw;font-size: 0.9375vw;font-weight: 400;margin-top: 30px;line-height: 1.5em;letter-spacing: 0px;}
.con09 .box-list{display: flex;justify-content: space-between;    margin-top: -48px;}
.con09 .box-list a{display: flex;flex-direction: column;align-items: center;color: #27aae1;font-size: 1.0938vw;}
.con09 .box-list a img{margin-bottom:25px}
.con09 .widget-container3{text-align: center;padding: 25px 0;margin-top: 85px;border: 1px solid #ebebeb;border-radius: 26px;font-size: 0.9375vw;}

.con10 .s_con-inner{min-height: 100%;display: block;justify-content: center;align-items: center;margin-top: 100px;margin-bottom: 100px;padding: 150px 0px 150px 0px;}
.con10 .s_con-inner .box{margin-left:0}
.con10 .box ul{display:flex; justify-content: space-between;justify-content: space-evenly;}
.con10 .box ul li{}
.con10 .box a{font-size: 1.25vw;font-weight: 400;position: relative;line-height: 40px;fill: #4C4C4E;transition: all 0.1s;color: #4C4C4E;}
.con10 .box a:hover {font-weight: 600;}
.con10 .box a:after{content: "";position: absolute;left: 0;bottom: -10px;width: 0px;height: 2px;margin: 5px 0 0;transition: all 0.2s ease-in-out;transition-duration: 0.3s;opacity: 0;background-color: #4C4C4E;}
.con10 .box a:hover:after{width: 100%;opacity: 1;}

@media only screen and (max-width: 1280px) {
.con09 .box-list a { font-size: 1.6vw;}
.con09 .widget-container3 { font-size: 1.375vw;}

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

.con09 .s_con-inner {height: 75vw;    padding-top: 150px;}
.con09 .s_con-inner .box .text h2 {font-size: 4.1vw;margin-top: 90px;}
.con09 .s_con-inner .box .text .widget-container2 {font-size: 1.3vw;}
.con09 .s_con-inner .box .text h2 {margin-top:0}
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
.sc_03 .sc_inner .txt-box .grad2{padding-bottom: 20.83vw;background: linear-gradient( to bottom, rgba(19,33,62, 0) 0, rgba(19,33,62, 0.3) 10%, rgba(19,33,62, 0.5) 25%, rgba(19,33,62, 0.8) 40%, rgba(19,33,62, 0.8) 50%, rgba(19,33,62, 0.9) 75%, rgba(19,33,62,1) 100% );}

.sc_03 .sc_inner .elementor-heading {font-size: 8.1vw;}
.sc_03 .sc_inner .elementor-description{font-size: 3.1vw;}
.sc_03 .sc_inner.inner01{height:156.2500vw}
.sc_03 .sc_inner.inner02{height:156.2500vw}
.sc_03 .sc_inner.inner02 .elementor-description { font-size: 3.1vw;margin:0 auto;width: 80%;}
.sc_03 .sc_inner .elementor-heading span.ts{font-size:7.1vw}
.sc_03 .sc_inner.inner01 {background: url(/images/mid-carousel-1v2.png) no-repeat;background-size: 100% 100%;  background-size: cover;background-position: center;}
.sc_03 .sc_inner.inner02 {background: url(/images/mid-carousel-2v2.png) no-repeat;background-size: 100% 100%;  background-size: cover;background-position: center;}

.sc_04 .sc_inner {padding: 0;background: none}
.sc_04 .sc_inner .sc_04-img4{position: static;}
.sc_04 .sc_inner .elementor-heading { font-size: 8.1vw;text-align:center;margin: 0% 0% 5.86vw 0%;}
.sc_04 .sc_inner .elementor-description {font-size: 3.8vw;text-align:center;width: 80%;margin: 0 auto 20.18vw;}

.sc_05 .sc_inner h2 { font-size: 7.8125vw;}

.sc_05 .sc_inner .sc_05-bottom ul {padding: 0 2vw; flex-direction: column;}
.sc_05 .sc_inner .sc_05-bottom ul li{display: flex;align-items: center;justify-content: space-around;    padding: 15px 10px;}
.sc_05 .sc_inner .sc_05-bottom dl { margin:0;width: 50%;}
.sc_05 .sc_inner .sc_05-bottom dt { font-size: 5.2083vw;}
.sc_05 .sc_inner .sc_05-bottom dd {  font-size: 3.9063vw;}

.sc_06 {background-image:none}
.sc_06 .sc_inner { flex-direction: column;margin-top: 20.83vw;}
.sc_06 .elementore-heading {font-size: 8.1vw;    text-align: center;}
.sc_06 .elementore-description {font-size: 3.8vw;text-align: center;}
.sc_06 .sc_inner .sc-txt {padding: 0;width: 80%;}
.sc_06 .elementore-heading span {font-size: 5vw;}
.sc_06 .note {padding: 0% 0% 0% 3%;font-size: 2.5vw;color: #e9e9e9;}
.sc_06 .note img {width: 4.8vw;}

.sc_07 .sc_inner {padding: 0% 4% 150px 4%;}
.sc_07 .elementore-heading {font-size: 6.6vw;}
.sc_07 .sc_inner ul { flex-direction: column;}
.sc_07 .sc_inner ul li .info {width: 100%;}
.sc_07 .sc_inner ul li {width: 100%;margin:20px 0;display: flex;flex-direction: column;align-items: flex-start;}
.sc_07 .sc_inner ul li  img{ margin: 0 auto;}
.sc_07 .sc_inner ul li .tit {font-size: 3.329vw;}
.sc_07 .sc_inner ul li .txt {font-size: 3.2vw;}

.con09 .s_con-inner {height: auto;}
.con09 .s_con-inner .box .text h2 { text-align: center;font-size: 7.8vw;}
.con09 .fp-tableCell {height: 300px !important;}
.con09 .s_con-inner .box .text .widget-container2 {text-align: center;font-size: 3.1256vw;padding: 0 2%;}
.con09 {margin-top: 0; background-image: none}
.con09 .box-list { flex-direction: column;align-items: center;}
.con09 .box-list a{ font-size:4.00vw;  margin: 20px 0;}
.con09 .widget-container3 {font-size: 3.1256vw;margin: 50px 4%;}

.con10 .s_con-inner { margin-top: 0;margin-bottom: 0;}
.con10 .box ul{display: flex;justify-content: space-evenly;flex-direction: column;align-items: center;}
.con10 .box ul li {margin: 30px 0;}
.con10 .box a {font-size: 4.25vw;}
}

@media only screen and (max-width: 450px) {
.sc_05 .sc_inner .sc_05-bottom ul li {     padding: 20px 10px;flex-direction: column;}
.sc_05 .sc_inner .sc_05-bottom dt { margin-bottom: 5px;}
}
</style>

<div class="sub_technology">
  <div class="sc_01">
    <div class="sc_inner">
    <img src="/images/m-main-5.png" alt="" class="m-only">
      <div class="sc-txt">
        <div class="elementore-heading">리팟의 핵심 기술 VSLS를 소개합니다</div>
        <div class="elementore-description">리팟은 532nm 파장의 Nd:YAG 레이저 소스에<br>이루다의 VSLS® 을 적용한 의료기기입니다. </div>
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
      <div class="elementor-heading">강력한 쿨링과<br>부드러운 사파이어를<br> 경험해 보세요</div>
      <div class="elementor-description">VSLS® 은 리팟의 새로운 에너지 모델입니다. </div>
      </div>
    </div>
  </div>
  <div class="sc_inner inner02">
    <div class="txt-box">
    <div class="grad grad2">
      <div class="elementor-heading"><span style="color:#fff">콘택트 쿨링 방식<span class="ts">의</span><br>혈관 과냉각 기술<span class="ts">은</span></span></div>
      <div class="elementor-description">
        시술 시간 동안 설정된 냉각 온도를 지속적으로 유지하여 <br>
        피부를 보호하는 동시에 안전하고 강력한 에너지를 조사할 수 있습니다.
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
      <div class="elementor-heading">AutoDerm® 은</div>
      <div class="elementor-description">
       타깃에만 레이저 에너지를 조사하는 위치 인식 및 추적 가이드 기술입니다.<br>체외형 의료용 카메라를 통해 실시간으로 수집한 병변 데이터를 기반으로<br class="m-none">타깃에 맞춰 에너지를 조절해 안전한 시술을 지원합니다.
      </div>
    </div>
  </div>
</div>

<div class="sc_05" id="sc_05">
  <div class="sc_inner">
  <h2>시술원리</h2>
   <div class="sc_05-top">
   <img src="/images/opacity.png" alt="" class="video-bg">
  <video class="elementor-video" src="/video/20220809-1.mp4" autoplay="" muted="muted" playsinline="" controlsList="nodownload"></video>
  <p class="note">*이해를 돕기 위한 이미지 화면입니다</p>
  </div>
  <div class="sc_05-bottom">
    <ul>
      <li>
        <img src="/images/tec-movie-img.png" alt="">
        <dl>
          <dt>STEP 01</dt>
          <dd>타깃 촬영</dd>
        </dl>
      </li>
       <li>
        <img src="/images/tec-movie-img02.png" alt="">
        <dl>
          <dt>STEP 02</dt>
          <dd>타깃 부위 과냉각</dd>
        </dl>
      </li>
       <li>
        <img src="/images/tec-movie-img03.png" alt="">
        <dl>
          <dt>STEP 03</dt>
          <dd>타깃 부위 영상 인식</dd>
        </dl>
      </li>
       <li>
        <img src="/images/tec-movie-img04.png" alt="">
        <dl>
          <dt>STEP 04</dt>
          <dd>타깃에 따라<br>레이저 출력 제어 및 조사</dd>
        </dl>
      </li>
    </ul>
  </div>
  </div>
</div>

<div class="sc_06">
  <div class="sc_inner">

    <div class="sc-txt">
      <div class="elementore-heading">스마트글라스(HMD)<span>는</span></div>
      <div class="elementore-description">어떠한 시야각과 시술 환경에서도<br class="m-only"> 시술자에게 선명한 디스플레이로<br class="m-none">VSLS 기능을<br class="m-only"> 직관적으로 제어할 수 있도록 고안 되었습니다.</div>
    </div>
    <img src="/images/m-tec-mid-img2.png" alt="" class="m-only">
  </div>
  <p class="note"><img src="/images/find-icon.png" alt=""> 스마트 글라스는 의료기기가 아닙니다.</p>
</div>

<div class="sc_07">
  <div class="sc_inner">
    <div class="sc-txt">
      <div class="elementore-heading">이루다는 VSLS 기술 메커니즘에대한<br class="m-none"> 미국, 대한민국 특허권을 보유하고 있습니다</div>
    </div>
    <div class="sc_07-ul">
      <ul>
        <li>
          <img src="/images/tec-one-2.png" alt="" class="m-none">
          <img src="/images/tec-one-2_m.png" alt="" class="m-only">
          <div class="info">
          <p class="tit">LIGHT TREATMENT DEVICE USING <br class="m-none">LESION IMAGE ANALYSIS, METHOD OF<br class="m-none">DETECTING LESION POSITION THROUGH<br class="m-none">LESION IMAGE ANAL YSIS FOR USE<br class="m-none">THEREIN,AND COMPUTING DEVICE<br class="m-none">READABLE RECORDING MEDIUM HAVING<br class="m-none">THE SAME RECORDED THEREIN</p>
          <p class="txt">US 10,525,276</p>
          </div>
        </li>
        <li>
          <img src="/images/tec-two-1.png" alt="" class="m-none">
          <img src="/images/tec-two-1_m.png" alt="" class="m-only">
          <div class="info">
          <p class="tit">병변 영상 분석을 통한 광 치료 장치,<br class="m-none">이에 이용되는 병변 영상 분석에 의한 병변 위치<br class="m-none">검출방법 및 이를 기록한 컴퓨팅 장치에 의해<br class="m-none">판독 가능한 기록 매체</p>
          <p class="txt">KR 10-1580075</p>
          </div>
        </li>
        <li>
          <img src="/images/tec-three-1.png" alt="" class="m-none">
          <img src="/images/tec-three-1_m.png" alt="" class="m-only">
          <div class="info">
          <p class="tit">병변 영상 분석을 통한 광 치료 장치 및<br class="m-none">이에 이용되는 핸드피스</p>
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
          <h2 class="heading-title ">가까운 병·의원 원장님과 상담하세요</span></h2>
          <p class="widget-container2">엔디야그레이저수술기<br>
            " 이 제품은 의료기기이며, 사용 전 사용상의 <br class="m-only">주의사항과 사용방법을 반드시 읽고 사용하십시오."</p>
          </div>
          <ul class="box-list">
            <li><a href="/bbs/board.php?bo_table=p29"><img src="/images/con09_box-list01.png" alt="">병원찾기</a></li>
            <li><a href="/technology.php"><img src="/images/con09_box-list02.png" alt="">리팟 핵심 기술 VSLS® 탐구하기</a></li>
            <li><a href="/service.php"><img src="/images/con09_box-list03.png" alt="">자주 묻는 질문</a></li>
         </ul>
         <p class="widget-container3">  심의 승인 번호 (조합-2022-35-011) / <br class="m-only">유효기간 (2025-09-29)​</p>
        </div>
      </div>
    </div>


<div>

<?php
include_once(G5_PATH.'/tail.php');