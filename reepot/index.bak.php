<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>

<style>
.m-only{display:none}
.page .entry-header {margin-bottom: 0;}
#primary {margin: 0;}
.elementor-element-m001 .swiper-slide01 .swiper-inner .elementor-slide-heading { padding-top: 21.3542vw;}
.elementor-element-m001 .swiper-slide02 .swiper-inner .elementor-slide-heading{padding-top: 35.6771vw;}
.elementor-element-m001 .swiper-slide04 .elementor-slide-heading { padding-top: 45.8333vw;}
.elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn{margin-top:20px}
.elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn01{background:#f5f4f4;color:#8b8a8a;border:0 ; width: 25%;line-height: 50px;border-radius: 10px;}
.elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn02{background:#27aae1;color:#fff; border:0; width: 25%;line-height: 50px;border-radius: 10px;}
.elementor-13 .elementor-element.elementor-element-a5c9d98 .elementor-container {  padding: 100px 3.41vw ;}
.elementor-13 .elementor-element.elementor-element-28dbebb > .elementor-element-populated { margin-right: 1vw;}
.elementor-13 .elementor-element.elementor-element-d612fe7 > .elementor-element-populated{margin-left:1vw}
.elementor-element-m001.m002 .swiper-slide01{background-size: cover;background-position: center;}
.elementor-element-2c51296{position:relative}
.elementor-element-2c51296 .video-text{position: absolute;top: 0;right: 21px;z-index: 23;color: #fff;font-size: 1vw;}
.elementor-element-m001 .swiper-slide01{background-position: center;}
.elementor-element-m001 .swiper-slide02,.elementor-element-m001 .swiper-slide03 {background-position: right;background-size: cover;}
.elementor-element-m001 .swiper-slide04{background-position: center;}
.swiper-pagination{margin-right: -32px;}

.elementor-element-m001 .swiper-slide03 .swiper-inner .elementor-slide-heading img{width:16vw}
.elementor-element-m001.m002 .swiper-slide02 .swiper-inner .elementor-slide-heading .ts{font-size: 2.1vw;}
.elementor-element-m001 .elementor-slide-description {margin-top: 20px;}

@media only screen and (max-width: 1280px) {
}

@media only screen and (max-width: 1040px) {
.t-none{display:none}
.elementor-element-m001 .elementor-slide-heading { font-size: 4.6vw;}
.elementor-element-m001 .elementor-slide-description { font-size: 2vw;}
.elementor-13 .elementor-element.elementor-element-d905230 .elementor-heading-title,.elementor-13 .elementor-element.elementor-element-887463e .elementor-heading-title { font-size: 2.5vw;}
.elementor-13 .elementor-element.elementor-element-d905230 .elementor-heading-title span, .elementor-13 .elementor-element.elementor-element-887463e .elementor-heading-title span {font-size: 2vw;}
.elementor-element-m001.m002 .swiper-slide01 .swiper-inner {padding-left: 0;display: flex;align-items: flex-end;}
.elementor-element-m001.m002 .swiper-slide01 .swiper-slide-inner{position: relative;display: flex;flex-direction: column;justify-content: flex-end;height: 500px;}
.elementor-element-m001.m002 .swiper-slide01 .swiper-inner .elementor-slide-heading {font-size:6.6vw;margin:0;display: flex;justify-content: center;text-align:center;padding: 19% 0 15%;}
.elementor-element-m001.m002 .swiper-slide02 .swiper-inner .elementor-slide-heading .ts {font-size: 4.1vw;}
.elementor-element-m001.m002 .elementor-slide-description{text-align:center; position: relative;font-size:3.42vw;bottom: 125px;}
.elementor-element-m001.m002 .swiper-pagination {  margin-right: -12px;}
.elementor-element-m001.m002 .elementor-slide-heading.heading2 {font-size:6.6vw;margin:0;display: flex;justify-content: center;text-align:center;padding: 19% 0 15%;}
.elementor-element-m001.m002 .elementor-slide-description.description2{;text-align:center; position: relative;font-size:3.4vw;bottom: 9%;}
.elementor-element-m001 .swiper-slide02 .swiper-inner,.elementor-element-m001 .swiper-slide01 .swiper-inner {padding-left: 5%;}
.elementor-element-m001.m002 .swiper-slide02 .swiper-inner{padding-left: 0;}
.elementor-element-m001.m002 .swiper-slide02 .swiper-slide-inner {display: flex;flex-direction: column;justify-content: flex-end;}
.elementor-element-2c51296 .video-text{font-size: 2.2vw;}

}

@media only screen and (max-width: 720px) {
.m-only{display:block}
.m-none{display:none}

.elementor-element-m001,.elementor-element-m001.m002 { height: 166.5vw;}
.elementor-element-m001 .swiper-slide01 {background: url(/images/m-main.png) no-repeat;background-size: cover;}
.elementor-element-m001 .swiper-slide02 {background: url(/images/m-main-2.png) no-repeat;background-size: cover;}
.elementor-element-m001 .swiper-slide03 {background: url(/images/m-main-3.png) no-repeat;background-size: cover;}
.elementor-element-m001 .swiper-slide04 {background: url(/images/m-main-4.png) no-repeat;background-size: cover;}
.elementor-element-m001 .swiper-slide02 .swiper-inner .elementor-slide-heading {padding-top: 83.33vw;line-height: 1.3;text-align: center;}
.elementor-element-m001 .swiper-slide03 .swiper-inner .elementor-slide-heading img:first-of-type {margin-top: 22.2222vw;}
.elementor-element-m001 .swiper-slide01 .swiper-inner {padding-left: 0;}
.swiper-slide01 .swiper-slide-inner {color: #4C4C4E;display: flex;flex-direction: column;align-items: center;text-align: center;}
.elementor-element-m001 .elementor-slide-heading { font-size: 8.33vw;}
.elementor-element-m001.m002 .swiper-slide02 {background: url(/images/m-Still_02_v5-1.png) no-repeat;background-size: cover;background-position: center;}
.elementor-element-m001 .swiper-slide02 .swiper-inner .elementor-slide-description{margin-top:40px}
.elementor-element-m001.m002 .swiper-slide02 .swiper-inner .elementor-slide-heading{font-size:8vw}
.elementor-element-m001 .swiper-slide02 .swiper-inner, .elementor-element-m001 .swiper-slide01 .swiper-inner {padding-left: 0;}
.elementor-element-m001.m002 .swiper-slide02 .swiper-inner .elementor-slide-heading .ts{font-size:7vw}
.elementor-element-m001 .elementor-slide-description {font-size: 3.91vw;width: 100%;text-align: center;}
#sb_instagram .sbi_imgs ul { flex-direction: column;}
#sb_instagram .sbi_imgs ul li {  width: 100%;}
.elementor-13 .elementor-element.elementor-element-a5c9d98{margin-bottom:100px}
.elementor-element-m001 .swiper-slide01 .swiper-inner .elementor-slide-heading{padding-top:20.13vw;margin:0}
.elementor-13 .elementor-element.elementor-element-d905230 .elementor-heading-title span, .elementor-13 .elementor-element.elementor-element-887463e .elementor-heading-title span { display: block;margin-top:10px}
.elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn01, .elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn02{width:48%}
.elementor-13 .elementor-element.elementor-element-d905230 .elementor-heading-title, .elementor-13 .elementor-element.elementor-element-887463e .elementor-heading-title {font-size: 5.5vw;margin-bottom: 50px;}
.elementor-13 .elementor-element.elementor-element-d905230 .elementor-heading-title span, .elementor-13 .elementor-element.elementor-element-887463e .elementor-heading-title span {font-size: 3.2vw;}
.elementor-element-m001.m002 .swiper-slide01 {   background: url(/images/m-mid-carousel-1.png) no-repeat;background-size: cover;background-position: center;}
.elementor-element-m001.m002 .swiper-slide01 .swiper-inner .elementor-slide-heading {width:100%;font-size: 8vw;padding: 22% 0;}
.elementor-element-m001.m002 .elementor-slide-description{ font-size: 4.1vw;}

.elementor-element-m001.m002 .elementor-slide-heading.heading2 {font-size: 5vw;padding: 22% 0;}
.elementor-element-m001.m002 .elementor-slide-description.description2 { font-size: 3.5vw;}
.elementor-element-m001 .swiper-slide03 .swiper-inner .elementor-slide-heading img{width:40vw}
.elementor-element-m001 .swiper-slide04 .elementor-slide-heading {  padding-top: 137vw;}
}

@media only screen and (max-width: 650px) {
.elementor-element-m001.m002 .swiper-slide01 .swiper-inner .elementor-slide-heading,.elementor-element-m001.m002 .elementor-slide-heading.heading2  {padding: 22% 0;}
.elementor-element-m001.m002 .elementor-slide-description,.elementor-element-m001.m002 .elementor-slide-description.description2{ font-size: 3.5vw;bottom: 17vw}
}

@media only screen and (max-width: 480px) {
.elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn01, .elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn02{width:100%;margin:5px 0}

}
@media only screen and (max-width: 400px) {
.elementor-element-m001.m002 .swiper-slide01 .swiper-inner .elementor-slide-heading,.elementor-element-m001.m002 .elementor-slide-heading.heading2 {padding: 28% 0;}
.elementor-element-m001.m002 .elementor-slide-description, .elementor-element-m001.m002 .elementor-slide-description.description2 { bottom: 25vw;}
.sc_05 .sc_inner .sc_05-bottom ul li { flex-direction: column;}
}

</style>

<body class="before-load scrollUI-body">
  <div class="container ">
		<div id="content" class="site-content">
		  <div class="ast-container">
        <div id="primary" class="content-area primary">
					<main id="main" class="site-main">
            <article class="post-13 page type-page status-publish ast-article-single" id="post-13"  itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
              <header class="entry-header ast-header-without-markup"></header><!-- .entry-header -->
              <div class="entry-content clear" itemprop="text">
                <div data-elementor-type="wp-page" data-elementor-id="13" class="elementor elementor-13">

                  <section class="elementor-element-m001">
                    <!-- Swiper -->
                    <div class="swiper mySwiper mySwiper01">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-slide01">
                          <div class="swiper-inner">
                            <a class="swiper-slide-inner" href="/brand.php">
                            <div class="elementor-slide-heading">어디인가요?<br>당신의 케렌시아</div>
                            <div class="elementor-slide-description">바쁘고 치열한 일상 속에서 오직 나에게<br class="m-only"> 집중 할 수 있는 곳, <br class="m-none">케렌시아란 자신만의 휴식과 <br class="m-only">치유 공간을 의미하는 스페인어입니다. </div>
                            </a>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-slide02">
                          <div class="swiper-inner">
                            <a class="swiper-slide-inner" href="/brand.php">
                            <div class="elementor-slide-heading">당신이 꿈꾸던<br>Agewell <span class="m-none "> · </span><br class="m-only">Feelwell<span class="m-none "> · </span><br class="m-only">Bewell</div>
                            <div class="elementor-slide-description">이제 리팟의 케렌시아에서<br class="m-none">자신을 돌보고<br class="m-only"> 나답게 살아갈 건강한 에너지를 만나보세요.</div>
                            </a>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-slide03">
                          <div class="swiper-inner">
                            <a class="swiper-slide-inner" href="/brand.php">
                            <div class="elementor-slide-heading"><img decoding="async" src="/images/quotes.png" style="width:60px; margin-bottom:30px;">리팟, 정말 내가 더 많이 웃게 될까?<br><br><img decoding="async" src="/images/Of-course.png" ></div>
                            </a>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-slide04">
                          <div class="swiper-inner">
                            <a class="swiper-slide-inner" href="/brand.php">
                            <div class="elementor-slide-heading">처음 만나는 설렘</div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-pagination"></div>
                    </div>
                  </section>

                  <section class="elementor-section elementor-top-section elementor-element elementor-element-2c51296 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="2c51296" data-element_type="section" data-settings="{&quot;jet_parallax_layout_list&quot;:[]}">
                    <div class="elementor-container elementor-column-gap-default">
                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9906939" data-id="9906939" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                          <div class="elementor-element elementor-element-c5f9a70 elementor-aspect-ratio-169 elementor-widget elementor-widget-video" data-id="c5f9a70" data-element_type="widget" data-settings="{&quot;video_type&quot;:&quot;hosted&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;play_on_mobile&quot;:&quot;yes&quot;,&quot;mute&quot;:&quot;yes&quot;,&quot;controls&quot;:&quot;yes&quot;,&quot;aspect_ratio&quot;:&quot;169&quot;}" data-widget_type="video.default">
                            <div class="elementor-widget-container">
                              <div class="video-text">이해를 돕기 위해 연출된 이미지로 실제 제품과 다를 수 있습니다.</div>
                              <div class="e-hosted-video elementor-wrapper elementor-fit-aspect-ratio elementor-open-inline">
                                <video class="elementor-video" src="/video/ilooda_en_size_nocomment.mp4" autoplay="" controls="" muted="muted" playsinline="" controlsList="nodownload"></video>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>

                  <section class="elementor-element-m001 m002">
                    <!-- Swiper -->
                    <div class="swiper mySwiper mySwiper02">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-slide01">
                          <div class="swiper-inner">
                            <a class="swiper-slide-inner " href="/technolog.php">
                            <div class="elementor-slide-heading ">강력한 쿨링과<br>부드러운 사파이어를<br> 경험해 보세요</div>
                            <div class="elementor-slide-description ">VSLS® 은 리팟의 새로운 에너지 모델입니다. </div>
                            </a>
                          </div>
                        </div>
                        <div class="swiper-slide swiper-slide02">
                          <div class="swiper-inner">
                            <a class="swiper-slide-inner " href="/technolog.php">
                            <div class="elementor-slide-heading heading2"><span style="color:#fff">콘택트 쿨링 방식<span class="ts">의</span><br>혈관 과냉각 기술<span class="ts">은</span></span></div>
                            <div class="elementor-slide-description description2">시술 시간 동안 설정된 냉각 온도를 지속적으로 유지하여 <br>피부를 보호하는 동시에 안전하고 강력한 에너지를 조사할 수 있습니다. </div>
                            </a>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-pagination"></div>
                  </section>

                  <section class="elementor-section elementor-top-section elementor-element elementor-element-a5c9d98 elementor-section-full_width elementor-hidden-mobile elementor-hidden-tablet elementor-section-height-default elementor-section-height-default" data-id="a5c9d98" data-element_type="section" data-settings="{&quot;jet_parallax_layout_list&quot;:[]}">
                    <div class="elementor-container elementor-column-gap-default">
                      <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-28dbebb animated-slow" data-id="28dbebb" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;, &quot;animation&quot;:&quot;none&quot;}">
                        <div class="elementor-widget-wrap elementor-element-populated">
                          <div class="elementor-element elementor-element-ef1c998 elementor-widget elementor-widget-html" data-id="ef1c998" data-element_type="widget" data-widget_type="html.default">
                           <div class="elementor-widget-container">
                            <a href="/technolog.php">
                            <img decoding="async" src="/images/마스크-그룹-401.png" width="100%;"></a>
                          </div>
                        </div>
                        <div class="elementor-element elementor-element-d905230 elementor-widget elementor-widget-heading" data-id="d905230" data-element_type="widget" data-widget_type="heading.default">
                          <div class="elementor-widget-container">
                           <h2 class="elementor-heading-title elementor-size-default">시술 원리 <span>리팟의 핵심 기술 VSLS®에 대한 자세한 정보를 탐구하세요.</span></h2>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-d612fe7 animated-slow" data-id="d612fe7" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;none&quot;}">
                      <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-d15fedd elementor-widget elementor-widget-html" data-id="d15fedd" data-element_type="widget" data-widget_type="html.default">
                          <div class="elementor-widget-container">
                           <a href="/certification.php">
                           <img decoding="async" src="/images/그룹-1273.png" width="100%;"></a>
                          </div>
                        </div>
                        <div class="elementor-element elementor-element-887463e elementor-widget elementor-widget-heading" data-id="887463e" data-element_type="widget" data-widget_type="heading.default">
                          <div class="elementor-widget-container">
                           <h2 class="elementor-heading-title elementor-size-default">정품 인증 <span>QR코드로 리팟 정품 트리트먼트 팁 사용을 확인하세요.</span></h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>




                  <section class="elementor-section elementor-top-section elementor-element elementor-element-2443450 elementor-hidden-mobile elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="2443450" data-element_type="section" data-settings="{&quot;jet_parallax_layout_list&quot;:[],&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-83a0b56" data-id="83a0b56" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-8553a40 elementor-widget elementor-widget-html" data-id="8553a40" data-element_type="widget" data-widget_type="html.default">
                          <div class="elementor-widget-container">
                            <a href="/reepot.php"><img decoding="async" src="/images/main__tech1_pc.png" class="m-none" width="100%"><img decoding="async" src="/images/main__tech1_m.png" class="m-only" width="100%"></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>

                  <section class="elementor-section elementor-top-section elementor-element elementor-element-13bce0a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="13bce0a" data-element_type="section" data-settings="{&quot;jet_parallax_layout_list&quot;:[],&quot;animation_tablet&quot;:&quot;fadeInUp&quot;,&quot;animation_mobile&quot;:&quot;fadeInUp&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0687265" data-id="0687265" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated elementor-05">
                          <div class="elementor-element elementor-element-6d70fb7 elementor-widget elementor-widget-heading" data-id="6d70fb7" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                              <h1 class="elementor-heading-title elementor-size-default">STAY CONNECTED WITH ilooda</h1>
                            </div>
                          </div>
                          <div class="elementor-element elementor-element-419a1a2 elementor-widget elementor-widget-text-editor" data-id="419a1a2" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">리팟의 소셜미디어 콘텐츠를 팔로우 하세요</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>

                  <section class="elementor-section elementor-top-section elementor-element elementor-element-c6e246b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c6e246b" data-element_type="section" data-settings="{&quot;jet_parallax_layout_list&quot;:[]}">
                    <div class="elementor-container elementor-column-gap-default">
                      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b9048df" data-id="b9048df" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                          <div class="elementor-element elementor-element-0acd36e elementor-widget elementor-widget-shortcode" data-id="0acd36e" data-element_type="widget" data-widget_type="shortcode.default">
                            <div class="elementor-widget-container">
                              <div class="elementor-shortcode">
                                <div id="sb_instagram"  class="sbi sbi_mob_col_1 sbi_tab_col_3 sbi_col_3 sbi_width_resp" style="padding-bottom: 12px;" data-feedid="*1"  data-res="auto" data-cols="3" data-colsmobile="1" data-colstablet="3" data-num="3" data-nummobile="3" data-header-size="small" data-shortcode-atts="{&quot;feed&quot;:&quot;1&quot;}"  data-postid="13" data-locatornonce="480dacdb05" data-options="{&quot;grid&quot;:true,&quot;avatars&quot;:{&quot;ilooda.official&quot;:&quot;&quot;,&quot;LCLilooda.official&quot;:0},&quot;disablelightbox&quot;:true,&quot;colsmobile&quot;:1,&quot;colstablet&quot;:&quot;3&quot;,&quot;captionsize&quot;:12,&quot;captionlength&quot;:49}" data-sbi-flags="favorLocal">
                                  <div id="sbi_imgs" >
                                    <ul>
                                      <li><a href=""><img src="/images/sbi_imgs01.jpg" alt=""></a></li>
                                      <li><a href=""><img src="/images/sbi_imgs02.jpg" alt=""></a></li>
                                      <li><a href=""><img src="/images/sbi_imgs03.jpg" alt=""></a></li>
                                    </ul>
                                    <div id="instagram"></div>
                                  </div>
                                  <div class="sns-btn">
                                    <a href="https://www.instagram.com/ilooda.official/" target="_blank"  class="btn01">INSTAGRAM 더보기</a>
                                    <button class="btn02" id="insta-btn02"><img src="/images/sns-btn.png" alt=""> Follow on Instagram</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>



            </article>
          </main>
        </div>
      </div>
    </div>
  </div>
</body>

 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
 <script>
    var swiper = new Swiper(".mySwiper01", {
      loop: true,
      pagination: {
      el: ".swiper-pagination",
         clickable: true,
      },
      autoplay: {
      delay: 2000,
      disableOnInteraction: false
      },

    });

    var swiper = new Swiper(".mySwiper02", {
      loop: true,
      pagination: {
      el: ".swiper-pagination",
      },
    });


</script>
<script>
	//인스타그램 토큰 갱신할때마다 관리자페이지 여분필드1(cf_1) 에서 날짜 갱신해주세요.(22-10-06 최초 작성)

	var token = "<?php echo $config['ins_key_token'];?>";
	$.ajax({
		type: "GET",
		dataType: "jsonp",
		cache: false,
		url: "https://graph.instagram.com/me/media?access_token=" + token + "&fields=id,caption,media_type,media_url,thumbnail_url,permalink",

		success: function(response) {
			console.log(response);
			if (response.data != undefined && response.data.length > 0) {
				for(i = 0; i < response.data.length; i++){
					if(response.data[i]){
						var item = response.data[i];
						var image_url = "";
						var post = "";

						if(item.media_type === "VIDEO"){
							image_url = item.thumbnail_url;
						}else{
							image_url = item.media_url;
						}

						post += '<div class="swiper-slide relative '+i+'">';
							post += '<div class="instagram_item instagram_item'+i+'">';
								post += '';
								    //post += '<p>'+ item.caption +'';
								post += '';
							post += '</div>';
						post += '</div>';

						$('#instagram').append(post);

            $('#insta-btn02').on("click", function () {
              $('#instagram').append(post);
            });
					}else{
						// if no curent item
						show_fallback('#insta-item-'+i)
					}
				}
			}else{
				// if api error
				show_fallback('.instagram-item')
			}


		},
		error :function(){
			// if http error
			show_fallback('.instagram-item')
		}

	});

	function show_fallback(el){
		$(el).addClass('loaded fallback');
	}

function arrOrder(key) {
    return function(a, b) {
        if (a[key] > b[key]) {
            return 1;
        } else if (a[key] < b[key]) {
            return -1;
        }

        return 0;
    }
}
</script>

<?php
include_once(G5_PATH.'/tail.php');