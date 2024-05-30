<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index_e.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index_e.php');
    return;
}

include_once(G5_PATH.'/head_e.php');
?>

<style>
.m-only{display:none}
.page .entry-header {margin-bottom: 0;}
#primary {margin: 0;}
.elementor-element-m001 .swiper-slide01 .swiper-inner .elementor-slide-heading { padding-top: 21.3542vw;}
.elementor-element-m001 .swiper-slide02 .swiper-inner .elementor-slide-heading{padding-top: 35.6771vw;}
.elementor-element-m001 .swiper-slide04 .elementor-slide-heading { padding-top: 45.8333vw;}
.elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn{margin-top:20px;display: flex;align-items: center;justify-content: center;}
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

#sb_instagram #instagram{display:flex;flex-wrap: wrap;}
#sb_instagram #instagram .thumb-box{color:#000;width: 33.33%;height:413px;padding:0.5%}
#sb_instagram #instagram .thumb.bg-cover{display: block;width: 100%;height: 100%;background-size: 100%;}
#sb_instagram #instagram .thumb.bg-cover .thumb-content,
#sb_instagram #instagram .thumb.bg-cover .text.center,
#sb_instagram #instagram .thumb.bg-cover a{display: block;width: 100%;height: 100%;}

#sb_instagram .insta-more-box{background: #27aae1;color: #fff;border: 0;width: 25%;line-height: 50px;border-radius: 10px;color:#fff;    margin-left: 15px;padding: 7px 0px;}
#sb_instagram .insta-more-box .con.title.center{display: flex;align-items: center;justify-content: center;}


@media only screen and (max-width: 1280px) {
#sb_instagram #instagram .thumb-box{ height: 100%;}
#sb_instagram #instagram .thumb.bg-cover { height: 32.2656vw;}

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

.elementor-element-m001 .swiper-slide01 .swiper-inner .elementor-slide-heading{padding-top:20.13vw;margin:0}
.elementor-13 .elementor-element.elementor-element-d905230 .elementor-heading-title span, .elementor-13 .elementor-element.elementor-element-887463e .elementor-heading-title span { display: block;margin-top:10px}
.elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn01, .elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn02{width:48%}
.elementor-13 .elementor-element.elementor-element-6d70fb7 .elementor-heading-title { margin: 0;}
.elementor-13 .elementor-element.elementor-element-d905230 .elementor-heading-title, .elementor-13 .elementor-element.elementor-element-887463e .elementor-heading-title {font-size: 5.5vw;margin-bottom: 50px;}
.elementor-13 .elementor-element.elementor-element-d905230 .elementor-heading-title span, .elementor-13 .elementor-element.elementor-element-887463e .elementor-heading-title span {font-size: 3.2vw;}
.elementor-element-m001.m002 .swiper-slide01 {   background: url(/images/m-mid-carousel-1.png) no-repeat;background-size: cover;background-position: center;}
.elementor-element-m001.m002 .swiper-slide01 .swiper-inner .elementor-slide-heading {width:100%;font-size: 8vw;padding: 22% 0;}
.elementor-element-m001.m002 .elementor-slide-description{ font-size: 4.1vw;}

.elementor-element-m001.m002 .elementor-slide-heading.heading2 {font-size: 5vw;padding: 22% 0;}
.elementor-element-m001.m002 .elementor-slide-description.description2 { font-size: 3.5vw;}
.elementor-element-m001 .swiper-slide03 .swiper-inner .elementor-slide-heading img{width:40vw}
.elementor-element-m001 .swiper-slide04 .elementor-slide-heading {  padding-top: 137vw;}

#sb_instagram #instagram { flex-direction: column;}
#sb_instagram #instagram .thumb-box { width: 100%;}
#sb_instagram #instagram .thumb.bg-cover{height:93.2656vw}
#sb_instagram .insta-more-box {width: 48%;}
}

@media only screen and (max-width: 650px) {
.elementor-element-m001.m002 .swiper-slide01 .swiper-inner .elementor-slide-heading,.elementor-element-m001.m002 .elementor-slide-heading.heading2  {padding: 22% 0;}
.elementor-element-m001.m002 .elementor-slide-description,.elementor-element-m001.m002 .elementor-slide-description.description2{ font-size: 3.5vw;bottom: 17vw}
}

@media only screen and (max-width: 480px) {
.elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn01, .elementor-13 .elementor-element.elementor-element-c6e246b .sns-btn .btn02{width:100%;margin:5px 0}
#sb_instagram .insta-more-box {width: 100%;}
}

@media only screen and (max-width: 400px) {
.elementor-element-m001.m002 .swiper-slide01 .swiper-inner .elementor-slide-heading,.elementor-element-m001.m002 .elementor-slide-heading.heading2 {padding: 28% 0;}
.elementor-element-m001.m002 .elementor-slide-description, .elementor-element-m001.m002 .elementor-slide-description.description2 { bottom: 25vw;}
.sc_05 .sc_inner .sc_05-bottom ul li { flex-direction: column;}
}

</style>

<body class="before-load scrollUI-body">
  <div class="container ">
  <!-- #masthead -->
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
        <a class="swiper-slide-inner" href="/brand_e.php">
          <div class="elementor-slide-heading">Can you picture <br class="m-only">  yourself here?<br>Your very own  <br class="m-only"> Querencia</div>
          <div class="elementor-slide-description">  
			<!-- Querencia is a Spanish word that means a place <br class="m-only"> 
			where you can focus on yourself <br class="m-none"> 
			in the midst of a busy and intense daily life,that is,  <br class="m-only">
			your own space of rest and healing. 
			<br> -->
			Querencia is a Spanish word that refers to a space of leisure and healing, <br class="m-none"> 
			A place where you can fully focus on yourself amid the hustle and bustle of everyday life.
		  </div>

         </a>
        </div>
      </div>
      <div class="swiper-slide swiper-slide02">
        <div class="swiper-inner">
        <a class="swiper-slide-inner" href="/brand_e.php">
        <div class="elementor-slide-heading">
			<!-- You’ve been dreaming of<br>
			Agewell <span class="m-none "> · </span><br class="m-only">Feelwell<span class="m-none "> · </span><br class="m-only">Bewell -->
			What you’ve always<br> dreamed of – Aging well,<br class="m-none "> Feeling well, <br class="m-only">and Being well
		</div>
        <div class="elementor-slide-description">
			<!-- Now, experience finding the healthy energy<br>
			you need to take care of yourself<br class="m-only">  and live as yourself at reepot's Querencia. -->
			Experience the healthy energy to look after yourself  <br class="m-only"> and live your best life in reepot’s Querencia.
		</div>
         </a>
        </div>
      </div>
      <div class="swiper-slide swiper-slide03">
        <div class="swiper-inner">
        <a class="swiper-slide-inner" href="/brand_e.php">
        <div class="elementor-slide-heading"><img decoding="async" src="/images/quotes.png" style="width:60px; margin-bottom:30px;">
			Can reepot really put a brighter smile on my face?<br><br>
			<img decoding="async" src="/images/Of-course.png" >
		</div>
         </a>
        </div>
      </div>
      <div class="swiper-slide swiper-slide04">
      <div class="swiper-inner">
        <a class="swiper-slide-inner" href="/brand_e.php">
        <div class="elementor-slide-heading">The excitement of a first encounter</div>
         </a>
        </div>
      </div>

    </div>
    <div class="swiper-pagination"></div>
     <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  </div>

  </section>




    <section class="elementor-section elementor-top-section elementor-element elementor-element-2c51296 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="2c51296" data-element_type="section" data-settings="{&quot;jet_parallax_layout_list&quot;:[]}">
    <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9906939" data-id="9906939" data-element_type="column">
        <div class="elementor-widget-wrap elementor-element-populated">
          <div class="elementor-element elementor-element-c5f9a70 elementor-aspect-ratio-169 elementor-widget elementor-widget-video" data-id="c5f9a70" data-element_type="widget" data-settings="{&quot;video_type&quot;:&quot;hosted&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;play_on_mobile&quot;:&quot;yes&quot;,&quot;mute&quot;:&quot;yes&quot;,&quot;controls&quot;:&quot;yes&quot;,&quot;aspect_ratio&quot;:&quot;169&quot;}" data-widget_type="video.default">
            <div class="elementor-widget-container">
              <div class="video-text">
				<!-- This image has been created for illustrative purposes and may differ from the actual product. -->
				This image was generated to assist with understanding and may differ from the actual product.
			</div>
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
        <a class="swiper-slide-inner " href="/technolog_e.php">
          <div class="elementor-slide-heading ">
			<!-- Explore powerful <br> cooling and <br> soft sapphire -->
			Experience intense cooling <br class="m-none ">and the smoothness of sapphire
		  </div>
          <div class="elementor-slide-description ">VSLS is reepot’s new energy model. </div>
         </a>
        </div>
      </div>
      <div class="swiper-slide swiper-slide02">
        <div class="swiper-inner">
        <a class="swiper-slide-inner " href="/technolog_e.php">
        <div class="elementor-slide-heading heading2"><span style="color:#fff"> CPTL, </span></div>
        <div class="elementor-slide-description description2">
			<!-- protects the skin by continuously maintaining a set cooling <br>
			temperature during the procedure and at the same time radiates safe and powerful energy. -->
			is a method of contact cooling technology whichmaintains <br>
			a constant cooling temperature throughout treatment, <br>
			protecting the skin while facilitating a strong and stable energy output.
		</div>
         </a>
        </div>
      </div>

    </div>
    <div class="swiper-pagination"></div>
     <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  </div>

  </section>
  <section class="elementor-section elementor-top-section elementor-element elementor-element-a5c9d98 elementor-section-full_width elementor-hidden-mobile elementor-hidden-tablet elementor-section-height-default elementor-section-height-default" data-id="a5c9d98" data-element_type="section" data-settings="{&quot;jet_parallax_layout_list&quot;:[]}">
  <div class="elementor-container elementor-column-gap-default">
    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-28dbebb animated-slow" data-id="28dbebb" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;none&quot;}">
      <div class="elementor-widget-wrap elementor-element-populated">
        <div class="elementor-element elementor-element-ef1c998 elementor-widget elementor-widget-html" data-id="ef1c998" data-element_type="widget" data-widget_type="html.default">
          <div class="elementor-widget-container">
            <a href="/technology_e.php#sc_05">
            <img decoding="async" src="/images/마스크-그룹-401.png" width="100%;"></a>
          </div>
        </div>
        <div class="elementor-element elementor-element-d905230 elementor-widget elementor-widget-heading" data-id="d905230" data-element_type="widget" data-widget_type="heading.default">
          <div class="elementor-widget-container">
            <h2 class="elementor-heading-title elementor-size-default">
				<!-- Treatment principle <span>Explore more information about VSLS®, the core technology of reepot.</span> -->
				Treatment Principles<br><span>Learn more about VSLS®, reepot’s core technology.</span>
			</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-d612fe7 animated-slow" data-id="d612fe7" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;none&quot;}">
      <div class="elementor-widget-wrap elementor-element-populated">
        <div class="elementor-element elementor-element-d15fedd elementor-widget elementor-widget-html" data-id="d15fedd" data-element_type="widget" data-widget_type="html.default">
          <div class="elementor-widget-container">
            <a href="/certification_e.php">
            <img decoding="async" src="/images/그룹-1273.png" width="100%;"></a>
          </div>
        </div>
        <div class="elementor-element elementor-element-887463e elementor-widget elementor-widget-heading" data-id="887463e" data-element_type="widget" data-widget_type="heading.default">
          <div class="elementor-widget-container">
            <h2 class="elementor-heading-title elementor-size-default">
				Certification <br><span>Make sure you are using certified reepot treatment tips by scanning the QR code.</span>
			</h2>
          </div>
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
          <a href="/reepot_e.php"><img decoding="async" src="/images/main__tech1_pc.png" class="m-none" width="100%"><img decoding="async" src="/images/main__tech1_m.png" class="m-only" width="100%"></a>
        </div>
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
        <div class="elementor-widget-container">
          Follow ‘reepot’ on social media.
        </div>
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
				<!--   <div id="sbi_imgs" >
					<div class="list">
					  <div id="instagram" class="list-style default"></div>
					</div>
				  </div> -->
				  <div id="instagram" class=""></div>

				   <div class="sns-btn">
					<!-- <a href="https://www.instagram.com/ilooda.official/" target="_blank"  class="btn01">INSTAGRAM 더보기</a> -->
				  <!--   <button class="btn02" id="insta-btn02"><img src="/images/sns-btn.png" alt=""> Follow on Instagram</button> -->
				  </div>
			  </div>
			</div>

		  </div>
		</div>
	  </div>
	</div>
  </div>

</section>

 </div>
</div>
<!-- .entry-content .clear -->
</article><!-- #post-## -->
</main><!-- #main -->
</div><!-- #primary -->
</div> <!-- ast-container -->
</div><!-- #content -->
</div>

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
  const TARGET_QUERY = "#instagram"; // 타깃이 되는 jQuery 선택자
  const TARGET_QUERY2 = ".sns-btn";
  const TARGET_A_QUERY = "#instagram_a"; // 타깃이 되는 jQuery 선택자 (링크)
  const INSTA_URL = "https://www.instagram.com/ilooda.official/";
  const TOKEN =
    "IGQWRPMnVid3lucktfNDZAZANnFRVVh2MlRCNnZALTWhuTktFNmlpYnNwWWV6NXZA4WVVVYzAxdm9FTlBzaVZAwZAzJWb2JCdFhSeGNLUE9tTVFEUXEwZA0tDbjUzM2g4cmoySE1FalVWUmFzLU1jdwZDZD";
  const FIRST_LOAD_COUNT = 3; // 처음에 로딩할 글 수
  const ONCE_LOAD_COUNT = 3; // 한 번 클릭 시 추가될 글 수
  const MAX_LOAD_COUNT = 51; // 최대로 로딩할 글 수

  const API_URI = "https://graph.instagram.com";

  function getInstaApiDataUrl(token) {
    return `${API_URI}/v18.0/me/media?access_token=${token}&fields=id,caption,media_type,media_url,thumbnail_url,permalink,timestamp`;
  }

  function getInstaApiRefreshUrl(token) {
    return `${API_URI}/refresh_access_token?grant_type=ig_refresh_token&access_token=${token}`;
  }

  function insta_fetchAjax(
    url,
    successFunction = (res) => {},
    errorFunction = (err) => {}
  ) {
    $.ajax({
      type: "GET",
      dataType: "jsonp",
      cache: true,
      url: url,
      success: successFunction,
      error: errorFunction,
    });
  }

  let nowLoadedPostCount = 0; // 현재 로딩된 포스트 개수
  let wantToLoadPostCount = 0; // 현재 로딩되길 바라는 포스트 개수
  let allInstaData = []; // 현재 로딩된 전체 데이터 배열
  let lastPagingNext = ""; // 마지막 로딩 시 다음 배열

  function insta_add_list(res) {
    if (res.data == undefined || res.data.length <= 0) {
      // if api error
      insta_show_fallback();
      return;
    }

    // 아래 줄에서 어떤 타입의 글을 보여주고, 보여주지 않을 지 결정.
    // data에 어떤 유형이 있는지/어떤 유형을 추가할 수 있는지는 api 문서 참고
    // https://developers.facebook.com/docs/instagram-basic-display-api/reference/media#fields
    allInstaData.push(
      ...res.data.filter((data) => data.media_type !== "VIDEO")
    );

    if (wantToLoadPostCount < FIRST_LOAD_COUNT)
      wantToLoadPostCount = FIRST_LOAD_COUNT;
    else if (wantToLoadPostCount <= nowLoadedPostCount)
      wantToLoadPostCount += ONCE_LOAD_COUNT;

    if (wantToLoadPostCount > MAX_LOAD_COUNT)
      wantToLoadPostCount = MAX_LOAD_COUNT;

    if (wantToLoadPostCount > allInstaData.length) {
      insta_next_list(res.paging.next);
      return;
    }

    for (; nowLoadedPostCount < wantToLoadPostCount; nowLoadedPostCount++) {
      if (allInstaData[nowLoadedPostCount] == undefined) break;
      insta_add_component(allInstaData[nowLoadedPostCount]);
    }
      console.log(res);

    // 마지막 버튼 생성
    if (res.paging.next == undefined || nowLoadedPostCount >= MAX_LOAD_COUNT) {
      // 만약 페이징 다음이 없거나(보여줄 글이 더이상 없거나) || 현재 로딩된 포스트가 최대 로딩할 포스트 수와 같을 경우
      // 인스타로 갈 수 있도록 버튼 내용을 변경.
      insta_add_button(`window.open('${INSTA_URL}')`, "INSTAGRAM 더보기");
    } else {
      insta_add_button(
        `insta_next_list('${res.paging.next}'); this.remove();`, // 다음 목록을 추가하고 버튼을 삭제.
        "Follow on Instagram"
      );
    }
  }

  function insta_add_component(data) {
    const item = insta_data_convert_data(data);
    const postHtml = `

      <div class="thumb-box">
        <div class="thumb bg-cover" style="background-image: url('${item.image_url}');background-repeat: no-repeat;">
          <div class="thumb-content">
            <div class="text center">
              <a class="tt" target="_blank" rel="noopener" href="${item.permalink}"> </a>
            </div>
            <div class="point-box instagram-bg"></div>
          </div>
        </div>
      </div>

    `;
    $(TARGET_QUERY).append(postHtml);
  }

  function insta_data_convert_data(item) {
    // ajax로 가져온 데이터를 html에 바로 넣을 수 있도록 예쁘게 가공한다.
    let caption = item.caption.split("\n")[0]; // 첫 번째 줄만 자른다
    let caption_maxLength = 20;
    if (caption.length > caption_maxLength)
      caption = caption.substring(0, caption_maxLength) + "…";

    // 이미지 대표 url 가져오기
    let image_url = "";
    if (item.media_type === "VIDEO") {
      image_url = item.thumbnail_url;
    } else {
      image_url = item.media_url;
    }

    // 날짜를 텍스트로 계산하기 위해 new Date로 time 생성
    const time = new Date(Date.parse(item.timestamp));

    // 가공한 데이터 리턴
    return {
      image_url: image_url,
      permalink: item.permalink,
      caption: caption,
      year: time.getFullYear(),
      month: String(time.getMonth() + 1).padStart(2, "0"),
      date: String(time.getDate()).padStart(2, "0"),
    };
  }

  function insta_add_button(btn_action, btn_txt) {
    const btnHtml = `
      <button class="thumb-box insta-more-box" onclick="${btn_action}">
        <div class="con title center"><img src="/images/sns-btn.png" alt=""><span class="center">${btn_txt}</span></div>
        <div class="thumb bg-cover instagram-bg"></div>
      </button>
        `;
    $(TARGET_QUERY2).append(btnHtml);
  }

  function insta_next_list(url) {
    insta_fetchAjax(url, dataRefreshFunction, dataErrorFunction);
  }

  function insta_show_fallback() {
    // 오류가 났을 경우 상황에 맞게 클래스 추가
    $(TARGET_QUERY).addClass("loaded fallback");
  }

  /************************
   * 실행부
   ************************/

  const dataRefreshFunction = (res) => {
    // 데이터를 불러왔을 때 실행할 부분
    // console.log(res);
    insta_add_list(res);
  };

  const dataErrorFunction = (err) => {
    // 실패 시 실행할 부분
    console.log(err);
    insta_show_fallback();
  };

  $(TARGET_A_QUERY).attr("href", INSTA_URL);

  insta_fetchAjax(
    getInstaApiDataUrl(TOKEN),
    dataRefreshFunction,
    dataErrorFunction
  );

  insta_fetchAjax(
    getInstaApiRefreshUrl(TOKEN),
    (res) => {
      // console.log("토큰 연장 성공 ");
    },
    dataErrorFunction
  );
</script>

<?php
include_once(G5_PATH.'/tail_e.php');