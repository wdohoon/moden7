<html lang="ko" style="overscroll-behavior: none; scroll-behavior: auto;">
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/head.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/img/logo/nson_og_img.jpg">
    <meta property="og:title" content="주식회사 엔슨">
    <meta property="og:url" content="http://nsonlaser.com/kor">
    <meta property="og:description" content="우리는 끊임없는 의료기기 연구개발을 통해 당신의 아름다운 여정을 만들어가는 바디엔지니어 전문가들입니다">
    <meta name="description" content="우리는 끊임없는 의료기기 연구개발을 통해 당신의 아름다운 여정을 만들어가는 바디엔지니어 전문가들입니다">
    <meta property="og:site_name" content="주식회사 엔슨">

    <meta name="naver-site-verification" content="cae69a60e42de5dc3c63c542c6cd9cbed280dfe1">
    <!-- <link rel="icon" href="" /> -->
    <link rel="icon" type="image/png" href="/img/icon/nson_favi.png">
    <!-- FONT -->
    <link rel="stylesheet" href="/font/font.css">
    <!-- CSS -->
        <title>pento</title>
    <link rel="stylesheet" href="/utils/css/reset.css">
    <link rel="stylesheet" href="/utils/css/scroll.css">
    <link rel="stylesheet" href="/utils/plugin/swiper8.4.4/swiper.css">
    <link rel="stylesheet" href="/utils/plugin/malihuScroll/malihuScroll.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link href="https://fonts.cdnfonts.com/css/dashboard" rel="stylesheet">
	<link rel="stylesheet" as="style" crossorigin href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css" />
    <!-- SCRIPT -->
    <script src="utils/js/direct.js"></script>
    <script src="utils/plugin/gsap3.11.3/gsap.min.js"></script>
    <script src="utils/plugin/gsap3.11.3/ScrollTrigger.min.js"></script>
    <script src="utils/plugin/gsap3.11.3/ScrollSmoother.min.js"></script>
    <script src="utils/plugin/gsap3.11.3/DrawSVGPlugin.min.js"></script>
    <script src="utils/plugin/jquery.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="utils/plugin/malihuScroll/malihuScroll.js"></script>

    <script src="js/kjy_min.js"></script>
    <script src="js/subVisual.js"></script>

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "엔슨",
        "url": "https://nsonlaser.com/",
        "sameAs": [
            "https://www.youtube.com/@nsonlaser"

        ]
    }
    </script>
    <script type="text/javascript" src="https://nsonlaser.com/lib/js/itboard.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-ZGP656ER05"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-ZGP656ER05');
    </script>

</head>

<body class="vsc-initialized" style="height: 15122px; overscroll-behavior: none; scroll-behavior: auto;">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSNNSHX" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
<script>
h();

// 대메뉴 마우스오버

$('header nav .gnb>li').on('mouseover', function() {
    $('header').css('background-color', '#000');
    $('.depthWrap').stop().slideDown();
});

$('header nav .gnb>li').on('mouseleave', function() {
    $('header').removeAttr('style');
    $('.depthWrap').stop().slideUp();
});

$('.depthWrap').on('mouseover', function() {
    $('header').css('background-color', '#000');
    $('.depthWrap').stop().slideDown();
});
$('.depthWrap').on('mouseleave', function() {
    $('header').removeAttr('style');
    $('.depthWrap').stop().slideUp();
});


// 언어 선택 마우스오버(pc)
$('header nav .loc-menu .loc').mouseover(function() {
    var wp = $(window).innerWidth();

    if (wp >= 769) {
        $(this).find('.langWrap').stop().slideDown();
    }

});
$('header nav .loc-menu .loc').mouseleave(function() {
    var wp = $(window).innerWidth();

    if (wp >= 769) {
        $(this).find('.langWrap').stop().slideUp();
    }
});

// 언어 선택 클릭(mobile)
$('header nav .loc-menu .loc').click(function() {
    var wp = $(window).innerWidth();

    if (wp < 769) {
        $(this).find('.langWrap').slideToggle();
    }

});



// 전체메뉴
var hamchk = 0;

$('header nav .loc-menu .menu').click(function() {

    if (hamchk == 0) {
        $(this).addClass('active');
        $('header .ham').addClass('down');
        $('header').addClass('hamnav');
        $('header.scroll-down').addClass('tp');
        $('body').css('overflow', 'hidden');

        hamchk = 1;
    } else if (hamchk == 1) {
        $(this).removeClass('active');
        $('header .ham').removeClass('down');
        $('header').removeClass('hamnav');
        $('header.scroll-down').removeClass('tp');
        $('body').css('overflow', 'unset');


        hamchk = 0;
    }

});
</script>
<div id="smooth-wrapper" style="inset: 0px; width: 100%; height: 100%; position: fixed; overflow: hidden;">
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/header.php'; ?>
    <div id="smooth-content" style="translate: none; rotate: none; scale: none; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -395, 0, 1); box-sizing: border-box; width: 100%; overflow: visible;">

        <div class="_pento">
            <div class="pr_subvs">
                <div class="textloop">
                    <strong>Pento 9900 - Pento 9900 - </strong>
                    <strong>Pento 9900 - Pento 9900 - </strong>
                </div>

                <div class="bgimg">
                    <img src="img/product/pento_bg.png" alt="" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">
                </div>

                <div class="lefTxt">
                    <div class="wrap" max="1800">
                        <div class="txtin">
                            <dl>
                                <dt style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">빛으로 피부를 디자인하다</dt>
                                <dd style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">펜토 9900</dd>
                            </dl>
                            <p style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">High Level Beam Quality. Greater Stability</p>
                        </div>

                        <div class="scrolldown_">
                            <img src="img/product/pr_arrow.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="pto01">
                <div class="vidWrap">
                    <iframe src="https://player.vimeo.com/video/798578777?h=6daa2f99c8&amp;background=1" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" title="PENTO9900_5 (1119) 무자막.mp4" data-ready="true"></iframe>
                </div>
            </div>

            <div class="pto02">
                <div class="wrap" max="1800">
                    <div class="flexW">
                        <dl>
                            <dt style="translate: none; rotate: none; scale: none; transform: translate(-40px, 0px); opacity: 0;">product</dt>
                            <dd style="translate: none; rotate: none; scale: none; transform: translate(-40px, 0px); opacity: 0;">Pento <br>9900</dd>
                        </dl>
                        <ul class="prdinfo">
                            <li style="translate: none; rotate: none; scale: none; transform: translate(0px, 40px); opacity: 0;">
                                <h1>Purpose</h1>
                                <h2>레이저 빔을 통한 조직의 절개, 파괴, 제거</h2>
                            </li>
                            <li style="translate: none; rotate: none; scale: none; transform: translate(0px, 40px); opacity: 0;">
                                <h1>Type</h1>
                                <h2>Alexandrite &amp; Nd:YAG laser</h2>
                            </li>
                            <li style="translate: none; rotate: none; scale: none; transform: translate(0px, 40px); opacity: 0;">
                                <h1>info</h1>
                                <h2>
                                    PENTO 9900은 알렉산드라이트 755nm 와 엔디야그 1064nm 의 두 파장에서 조사되는 각각의 레이저 빔을 통해 조직의 절개, 파괴, 제거를
                                    목적으로 사용되는 레이저 수술기입니다. 환자의 피부 상태에 맞춰 출력되는 에너지 값을 섬세하게 조절 할 수 있으며 일정하고 균일한 '정량'의 에너지를
                                    출력하여 시술 시 효과를 극대화 할 수 있는 장점을 가지고 있습니다.
                                </h2>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pto03">
                <ul class="scrolls">
                    <li>
                        <div class="pin-spacer" style="order: 0; place-self: auto; grid-area: auto; z-index: auto; float: none; flex-shrink: 1; display: block; margin: 0px; inset: 0px; position: absolute; flex-basis: auto; overflow: visible; box-sizing: border-box; width: 956px; height: 1838px; padding: 0px 0px 919px;"><div class="ben" style="background-image: url(&quot;img/product/pento_se03_1.jpg&quot;); translate: none; rotate: none; scale: none; inset: 0px auto auto 0px; margin: 0px; max-width: 956px; width: 956px; max-height: 919px; height: 919px; padding: 0px; transform: translate(0px, 0px);"></div></div>
                    </li>
                    <li>
                        <div class="pin-spacer" style="order: 0; place-self: auto; grid-area: auto; z-index: auto; float: none; flex-shrink: 1; display: block; margin: 0px; inset: 0px; position: absolute; flex-basis: auto; overflow: visible; box-sizing: border-box; width: 956px; height: 1838px; padding: 0px 0px 919px;"><div class="ben" style="background-image: url(&quot;img/product/pento_se03_2.jpg&quot;); translate: none; rotate: none; scale: none; inset: 0px auto auto 0px; margin: 0px; max-width: 956px; width: 956px; max-height: 919px; height: 919px; padding: 0px; transform: translate(0px, 0px);"></div></div>
                    </li>
                    <li>
                        <div class="ben" style="background-image: url(img/product/pento_se03_3.jpg)"></div>
                    </li>
                </ul>
                <div class="pin-spacer" style="order: 0; place-self: auto; grid-area: auto; z-index: auto; float: none; flex-shrink: 1; display: flex; margin: 0px; inset: auto; position: relative; flex-basis: auto; overflow: visible; box-sizing: border-box; width: 956px; height: 919px; padding: 0px;"><div class="benefits" style="translate: none; rotate: none; scale: none; inset: 0px auto auto 0px; margin: 0px; max-width: 956px; width: 956px; max-height: 919px; height: 919px; padding: 99.84px 60px 99.84px 99.84px; transform: translate(0px, 0px);">
                    <dl>
                        <dt style="translate: none; rotate: none; scale: none; transform: translate(-10%, 0%); opacity: 0;">제품 장점</dt>
                        <dd style="translate: none; rotate: none; scale: none; transform: translate(-10%, 0%); opacity: 0;">product <br>benefits</dd>
                        <dd style="translate: none; rotate: none; scale: none; transform: translate(-10%, 0%); opacity: 0;">섬세한 디테일의 차이로 만들어진 듀얼 롱펄스 레이저 펜토</dd>
                    </dl>
                    <ul class="benlist">
                        <li class="">
                            <h1>(01)</h1>
                            <h2><img src="img/product/pento_arrows.png"> <span>Real Time Auto Calibration</span></h2>
                            <h3>실시간 자동 조정 기능</h3>
                        </li>
                        <li class="">
                            <h1>(02)</h1>
                            <h2><img src="img/product/pento_arrows.png"> <span>Direct ROD Resonance Technology</span>
                            </h2>
                            <h3>공명기술로 얼라인이 필요없는 라드</h3>
                        </li>
                        <li class="">
                            <h1>(03)</h1>
                            <h2><img src="img/product/pento_arrows.png"> <span>Superior Strong GCD Colling
                                    Effect</span></h2>
                            <h3>정확한 GCD 쿨링 시스템</h3>
                        </li>
                    </ul>
                </div></div>
            </div>

            <div class="pto03_mob">
                <div class="beneTit wrap" max="1280">
                    <dl>
                        
                        <dt style="translate: none; rotate: none; scale: none; transform: translate(-20%, 0%); opacity: 0;">제품 장점</dt>
                        <dd style="translate: none; rotate: none; scale: none; transform: translate(-20%, 0%); opacity: 0;">product <br>benefits</dd>
                    <dd style="translate: none; rotate: none; scale: none; transform: translate(-20%, 0%); opacity: 0;">섬세한 디테일의 차이로 만들어진 <br>듀얼 롱펄스 레이저 펜토</dd></dl>
                </div>
                <ul class="benemob">
                    <li>
                        <div class="beneSub">
                            <span>(01)</span>
                            <div class="listT">
                                
                                <div class="arr" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;"><img src="img/product/pento_arrows.png"></div>
                            <h1 style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">Real Time Auto Calibration</h1></div>
                        </div>

                        

                        <h2 style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">실시간 자동 조정 기능</h2><div class="beThb">
                            
                        <div class="__max" style="background-image: url(&quot;img/product/pento_se03_1.jpg&quot;); translate: none; rotate: none; scale: none; transform: translate(0px, 0px);"></div></div>

                    </li>
                    <li>
                        <div class="beneSub">
                            <span>(02)</span>
                            <div class="listT">
                                
                                <div class="arr" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;"><img src="img/product/pento_arrows.png"></div>
                            <h1 style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">Direct ROD Resonance Technology</h1></div>
                        </div>
                        

                        <h2 style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">공명기술로 얼라인이 필요없는 라드</h2><div class="beThb">
                            
                        <div class="__max" style="background-image: url(&quot;img/product/pento_se03_2.jpg&quot;); translate: none; rotate: none; scale: none; transform: translate(0px, 0px);"></div></div>

                    </li>
                    <li>
                        <div class="beneSub">
                            <span>(03)</span>
                            <div class="listT">
                                
                                <div class="arr" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;"><img src="img/product/pento_arrows.png"></div>
                            <h1 style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">Superior Strong GCD Colling Effect</h1></div>
                        </div>
                        

                        <h2 style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">정확한 GCD 쿨링 시스템</h2><div class="beThb">
                            
                        <div class="__max" style="background-image: url(&quot;img/product/pento_se03_3.jpg&quot;); translate: none; rotate: none; scale: none; transform: translate(0px, 0px);"></div></div>

                    </li>
                </ul>
            </div>
			<style>
				.flexW dt{translate: none; rotate: none; scale: none; transform: translate(-10%, 0%); opacity: 0;}
				.flexW dd{translate: none; rotate: none; scale: none; transform: translate(-10%, 0%); opacity: 0;}
				@media(max-width:480px){
					.flexW dt, .flexW dd{transform:none;}
				}
				@media screen and (max-width: 480px){
					._pento .pto04 .wrap .hand li .img {margin-top: 100px;}
				}
			</style>
            <div class="pto04">
                <div class="wrap" max="1280">
                    <dl>
                        <dt style="translate: none; rotate: none; scale: none; transform: translate(0%, 100%); opacity: 0;">제품 외관</dt>
                        <dd style="translate: none; rotate: none; scale: none; transform: translate(0%, 40%); opacity: 0;">pento <br>Handpiece</dd>
                    </dl>
                    <div class="flexW">
                        <div class="pic">
                            <div class="overf">
                                <div class="__max" style="translate: none; rotate: none; scale: none; transform: scale(1.2, 1.2);"></div>
                            </div>
                            <img src="img/product/pento_se04_pic.png" style="opacity: 0;">
                        </div>
                        <dl>
                            <dt>Feature</dt>
                            <dd>
                                PENTO9900 레이저는 전자적 기계적으로 최상의 상태를
                                유지하도록 제동제어 되며, 이를 통해 일정한 에너지와
                                안정적이고 균일한 빔을 만들어냅니다.
                            </dd>
                        </dl>
                    </div>
                    <ul class="hand" style="opacity: 0;">
                        <li>
                            <h1 style="translate: none; rotate: none; scale: none; transform: translate(0%, 40%); opacity: 0;">경통</h1>
                            <h2 style="translate: none; rotate: none; scale: none; transform: translate(0%, 40%); opacity: 0;">
                                경통은 핸드피스에 삽입되어 피부 면에서 레이저 빔이 특정 스폿 <br>
                                사이즈로 형성되도록 렌즈가 조합되어 있으며, 그 종류는 <br>
                                3, 5, 6, 8, 10, 12, 15, 18, 20, 22, 24mm로 총 11종류가 있습니다.
                            </h2>
                            <div class="img" style="translate: none; rotate: none; scale: none; transform: translate(0%, 20%); opacity: 0;">
                                <img src="img/product/pento_se04_f1.png">
                            </div>
                        </li>
                        <li>
                            <h1 style="translate: none; rotate: none; scale: none; transform: translate(0%, 40%); opacity: 0;">팁</h1>
                            <h2 style="translate: none; rotate: none; scale: none; transform: translate(0%, 40%); opacity: 0;">
                                경통에 결합하는 팁은 스폿 사이즈에 따라 4종류가 있으며 (3~5mm, 6~10mm, 12~15mm, 18~24mm) 해당 스폿 사이즈에 맞게 사용하여야
                                합니다. 팁에 사용 스폿 사이즈가 표기되어 있습니다.
                            </h2>
                            <div class="img" style="translate: none; rotate: none; scale: none; transform: translate(0%, 20%); opacity: 0;">
                                <img src="img/product/pento_se04_f2.png">
                            </div>
                            <p style="translate: none; rotate: none; scale: none; transform: translate(0%, 20%); opacity: 0;">
                                Standard: 3mm / 6mm / 8mm / <br>10mm / 12mm / 15mm / 18mm
                            </p>
                            <p style="translate: none; rotate: none; scale: none; transform: translate(0%, 20%); opacity: 0;">
                                Option: 5mm / 20mm / 22mm / 24mm
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pto05">
                <div class="wrap" max="1800">
                    <h1 style="translate: none; rotate: none; scale: none; transform: translate(0%, 60%); opacity: 0;">균일한 시술면적에 높은 품질의 <br>에너지를 전달합니다.</h1>
                    <ul class="energy">
                        <li style="translate: none; rotate: none; scale: none; transform: translate(0%, 20%); opacity: 0;">
                            <h2>Alexandrite 755nm</h2>
                            <img src="img/product/pento_se05_1.png">
                        </li>
                        <li style="translate: none; rotate: none; scale: none; transform: translate(0%, 20%); opacity: 0;">
                            <h2>nd:yag 1064nm</h2>
                            <img src="img/product/pento_se05_2.png">
                        </li>
                    </ul>
                </div>
            </div>

				<style>
					.pto06 .wrap .title span{translate: none; rotate: none; scale: none; transform: translate(-40%, 0%); opacity: 0;}
					.pto06 .wrap .title strong{translate: none; rotate: none; scale: none; transform: translate(-10%, 0%); opacity: 0;}
					.pto06 .wrap .title dt{translate: none; rotate: none; scale: none; transform: translate(-20%, 0%); opacity: 0;}
					.pto06 .wrap .title dd{translate: none; rotate: none; scale: none; transform: translate(-20%, 0%); opacity: 0;}
					@media(max-width:500px){
						.pto06 .wrap .title span,.pto06 .wrap .title strong,.pto06 .wrap .title dt,.pto06 .wrap .title dd{transform : none;}
					}
				</style>
            <div class="pto06">
                <div class="wrap" max="1800">
                    <div class="title">
                        <span>제품 외관</span>
                        <strong>product <br>exterior</strong>

                        <dl>
                            <dt>견고함과 안정감을 동시에 지니다</dt>
                            <dd>섬세한 디테일의 차이로 만들어진 듀얼 롱펄스 레이저 펜토</dd>
                        </dl>
                    </div>

                    <div class="imgWrap">
                        <div class="imgin">
                            <!-- <div class="__max" data-speed="1.5" style="background-image: url(/img/product/pento_se06_1_1.jpg)"></div> -->
                            <div class="img">
                                <img src="img/product/pento_se06_1_1.jpg" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
                            </div>

                        </div>
                        <div class="imgin">
                            <!-- <div class="__max" data-speed="1.2" style="background-image: url(/img/product/pento_se06_2_1.jpg)"></div> -->
                            <div class="img">
                                <img src="img/product/pento_se06_2_1_1.jpg" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
                            </div>
                        </div>
                        <div class="imgin">
                            <!-- <div class="__max"  data-speed="1.3" style="background-image: url(/img/product/pento_se06_3_1.jpg)"></div> -->
                            <div class="img">
                                <img src="img/product/pento_se06_3_1_1.jpg" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="pto07" style="background-position-x: 120%;">
                <div class="wrap" max="1800">
                    <ul class="fea">
                        <li style="translate: none; rotate: none; scale: none; opacity: 0; transform: translate(0%, 40%);">
                            <div class="fealist">
                                <strong>01</strong><span>뛰어난 안정성</span>
                            </div>
                            <div class="line" style="width: 0px; opacity: 0;"></div>
                            <p>자체냉각시스템으로 피부표면을 안전하게 보호합니다.</p>
                        </li>
                        <li style="translate: none; rotate: none; scale: none; opacity: 0; transform: translate(0%, 40%);">
                            <div class="fealist">
                                <strong>02</strong><span>안정적인 에너지</span>
                            </div>
                            <div class="line" style="width: 0px; opacity: 0;"></div>
                            <p>환자의 안전을 최우선으로 고려한 에너지를 공급합니다.</p>
                        </li>
                        <li style="translate: none; rotate: none; scale: none; opacity: 0; transform: translate(0%, 40%);">
                            <div class="fealist">
                                <strong>03</strong><span>빠른 시술시간</span>
                            </div>
                            <div class="line" style="width: 0px; opacity: 0;"></div>
                            <p>정량의 에너지를 발생하므로 빠른 시술이 가능합니다.</p>
                        </li>
                        <li style="translate: none; rotate: none; scale: none; opacity: 0; transform: translate(0%, 40%);">
                            <div class="fealist">
                                <strong>04</strong><span>사용이 편리한 직관적인 터치스크린</span>
                            </div>
                            <div class="line" style="width: 0px; opacity: 0;"></div>
                            <p>시안성이 우수한 GUI, 간결한 조작으로 시술자의 편리함을 제공합니다.</p>
                        </li>
                        <li style="translate: none; rotate: none; scale: none; opacity: 0; transform: translate(0%, 40%);">
                            <div class="fealist">
                                <strong>05</strong><span>다양한 펄스폭 </span>
                            </div>
                            <div class="line" style="width: 0px; opacity: 0;"></div>
                            <p>
                                다양한 펄스폭과 스폿사이즈를 통해 환자의 상태에 따라 여러가지 시술이 가능하며 <br>
                                11종의 스폿사이즈로 시술 시 올바르고 안전한 결과를 제공합니다.
                            </p>
                        </li>
                        <li style="translate: none; rotate: none; scale: none; opacity: 0; transform: translate(0%, 40%);">
                            <div class="fealist">
                                <strong>06</strong><span>냉각가스 &amp; 공기냉각 시스템 선택 사용</span>
                            </div>
                            <div class="line" style="width: 0px; opacity: 0;"></div>
                            <p>
                                급속냉매 ,cryogen 기반 냉각장치 또는 냉각공기 시스템 선택 사용으로 <br>
                                표피를 보호하며 시간을 절약 할 수 있습니다.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pto08">
                <div class="wrap" max="1280">

                    <div class="spec">
                        <h1 style="translate: none; rotate: none; scale: none; transform: translate(0%, 40%); opacity: 0;">SPEC</h1>
                        <table style="translate: none; rotate: none; scale: none; transform: translate(0%, 10%); opacity: 0;">
                            <colgroup>
                                <col width="25%">
                                <col width="37.5%">
                                <col width="37.5%">
                            </colgroup>

                            <tbody><tr>
                                <th>항목</th>
                                <th>Alexandrite</th>
                                <th class="bnone">Nd:YAG</th>
                            </tr>

                            <tr>
                                <th>Wavelength</th>
                                <td>755nm</td>
                                <td>1064nm</td>
                            </tr>

                            <tr>
                                <th>Pulse Width</th>
                                <td>250㎲ ~ 300ms</td>
                                <td>250㎲ ~ 300ms</td>
                            </tr>

                            <tr>
                                <th>Max Delivered Energy</th>
                                <td>60J</td>
                                <td>80J</td>
                            </tr>

                            <tr>
                                <th>Recommended Energy</th>
                                <td>3ms, 50J@2Hz</td>
                                <td>3ms, 60J@2Hz</td>
                            </tr>

                            <tr>
                                <th>Pulse Rate</th>
                                <td colspan="2">0.5, 1, 1.5, 2, 3, 4, 5, 6, 7, 8, 9, 10Hz</td>
                            </tr>

                            <tr>
                                <th>Beam Delivery</th>
                                <td colspan="2">Optical Fiber</td>
                            </tr>

                            <tr>
                                <th>Aiming Beam</th>
                                <td colspan="2">InGaN, 530nm, below 10mW</td>
                            </tr>

                            <tr>
                                <th>Spot Size</th>
                                <td colspan="2">3, 6, 8, 10, 12, 15, 18 mm (Option: 5, 20, 22, 24 mm)</td>
                            </tr>

                            <tr>
                                <th>Weight</th>
                                <td colspan="2">125kg</td>
                            </tr>

                            <tr>
                                <th>Dimension</th>
                                <td colspan="2">581(W) x 855(D) x 1229(H) mm</td>
                            </tr>

                            <tr>
                                <th>Electrical Requirements</th>
                                <td colspan="2">220VAC, 50/60Hz, 4.6KVA</td>
                            </tr>

                            <tr>
                                <th>Cooling System</th>
                                <td colspan="2">GCD Type (GAS Cooling Device) Handpiece</td>
                            </tr>
                        </tbody></table>
                    </div>


                    <div class="acc">
                        <h1 style="translate: none; rotate: none; scale: none; transform: translate(0%, 40%); opacity: 0;">ACCESSORIES</h1>
                        <table style="translate: none; rotate: none; scale: none; transform: translate(0%, 40%); opacity: 0;">
                            <colgroup>
                                <col width="25%">
                                <col width="70%">
                            </colgroup>

                            <tbody><tr>
                                <th>항목</th>
                                <th class="bnone">정보</th>
                            </tr>

                            <tr>
                                <th>Cooling Device (Option)</th>
                                <td>ACD Type (Air Cooling Device) Handpiece</td>
                            </tr>
                        </tbody></table>
                    </div>
                </div>
            </div>

            <div class="noti">
                <div class="wrap" max="1280">
                    <p>"이 제품은 의료기기이며, 사용 전 사용상의 주의사항과 사용방법을 반드시 읽고 사용하십시오."</p>
                    <h5>엔디야그레이저조사기 (PENTO9900)</h5>
                    <h5>광고심의필 심의번호 : 조합-2023-04-071</h5>
                </div>
            </div>
				<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php'; ?>
        </div>

        
<script>
$('._notice').click(function() {
    alert("준비중입니다.");
    return false;
});

$('footer .b_f .family').click(function() {
    $('footer .b_f .family>ul').slideToggle();
});
</script>    </div>
</div>


<script>
gsap.registerPlugin(ScrollTrigger);
ScrollSmoother.create({
    smooth: 1,
    effects: true
});
</script>

<script>
function headerUp() {
    var lastScroll = 0;
    $(window).scroll(function() {
        var ws = $(this).scrollTop();
        if (ws > lastScroll) { // 스크롤 아래방향시
            $('header').addClass('up');
        } else { // 스크롤 위방향시
            $('header').removeClass('up');
        }
        lastScroll = ws;
    });
}

$(window).load(function() {
    // 페이지 로드 시 헤더노출 초기설정
    $('header').removeClass('up');
    headerUp();

    // 채용페이지 서브탭메뉴
    $('.subtab').addClass('active');
    $('ul.product__h').addClass('active');
});



// 비쥬얼
gsap.set('.pr_subvs .lefTxt .wrap dl dt', {
    opacity: 0,
    y: 40
});
gsap.set('.pr_subvs .lefTxt .wrap dl dd', {
    opacity: 0,
    y: 40
});
gsap.set('.pr_subvs .lefTxt .wrap p', {
    opacity: 0,
    y: 40
});
gsap.set('.pr_subvs .bgimg img', {
    opacity: 0,
    y: 100
});

var vsani = gsap.timeline();

vsani
    .to('.pr_subvs .bgimg img', {
        opacity: 1,
        y: 0,
        duration: 1
    })
    .to('.pr_subvs .lefTxt .wrap dl dt', {
        opacity: 1,
        y: 0
    }, '-=100%')
    .to('.pr_subvs .lefTxt .wrap dl dd', {
        opacity: 1,
        y: 0
    }, '-=50%')
    .to('.pr_subvs .lefTxt .wrap p', {
        opacity: 1,
        y: 0
    }, '-=50%')

ScrollTrigger.create({
    trigger: '.pr_subvs',
    start: 'top center',
    onEnter: function() {
        vsani.play();
    }
})


// se02

gsap.set('._pento .pto02 .flexW dl dt', {
    opacity: 0,
    x: -40
});
gsap.set('._pento .pto02 .flexW dl dd', {
    opacity: 0,
    x: -40
});
gsap.set('._pento .pto02 .flexW .prdinfo li', {
    opacity: 0,
    y: 40
});

var pen02 = gsap.timeline();

pen02
    .to('._pento .pto02 .flexW dl dt', {
        opacity: 1,
        x: 0
    })
    .to('._pento .pto02 .flexW dl dd', {
        opacity: 1,
        x: 0
    }, '-=50%')
    .to('._pento .pto02 .flexW .prdinfo li:nth-of-type(1)', {
        opacity: 1,
        y: 0
    }, '-=100%')
    .to('._pento .pto02 .flexW .prdinfo li:nth-of-type(2)', {
        opacity: 1,
        y: 0
    }, '-=50%')
    .to('._pento .pto02 .flexW .prdinfo li:nth-of-type(3)', {
        opacity: 1,
        y: 0
    }, '-=50%')

pen02.pause();

ScrollTrigger.create({
    trigger: '._pento .pto02',
    start: 'top center',
    onEnter: function() {
        pen02.play();
    },
    onLeaveBack: function() {
        pen02.reverse();
    }
})



// se03 pin

gsap.to('._pento .pto03 .scrolls', {
    scrollTrigger: {
        trigger: '._pento .pto03 .benefits',
        endTrigger: '._pento .pto03',
        start: 'top top',
        end: 'bottom bottom',
        scrub: 1,
        pin: true,
    }
});

gsap.to('._pento .pto03 .scrolls', {
    scrollTrigger: {
        trigger: '._pento .pto03 .scrolls li:first-of-type .ben',
        endTrigger: '._pento .pto03 .scrolls li:first-of-type',
        start: 'top top',
        end: 'bottom top',
        // markers: true,
        scrub: 1,
        pin: true,
    }
});

gsap.to('._pento .pto03 .scrolls', {
    scrollTrigger: {
        trigger: '._pento .pto03 .scrolls li:nth-of-type(2) .ben',
        endTrigger: '._pento .pto03 .scrolls li:nth-of-type(2)',
        start: 'top top',
        end: 'bottom top',
        // markers: true,
        scrub: 1,
        pin: true,
    }
});

$('._pento .pto03 .scrolls li').each(function(i, item) { // 사이드메뉴 활성화
    ScrollTrigger.create({
        trigger: item,
        start: 'top center',
        end: 'bottom center',
        // markers: true,
        toggleClass: {
            targets: $('._pento .pto03 .benefits .benlist li').eq(i),
            className: "on"
        },
    });
});

// se03 motion

gsap.set('._pento .pto03 .benefits dl dt', {
    opacity: 0,
    xPercent: -10
});
gsap.set('._pento .pto03 .benefits dl dd:first-of-type', {
    opacity: 0,
    xPercent: -10
});
gsap.set('._pento .pto03 .benefits dl dd:last-of-type', {
    opacity: 0,
    xPercent: -10
});

let pen03 = gsap.timeline();
pen03
    .to('._pento .pto03 .benefits dl dt', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    })
    .to('._pento .pto03 .benefits dl dd:first-of-type', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=50%')
    .to('._pento .pto03 .benefits dl dd:last-of-type', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=50%');

pen03.pause();

ScrollTrigger.create({
    trigger: '._pento .pto03',
    start: 'top center',
    onEnter: function() {
        pen03.play();
    },
    onLeaveBack: function() {
        pen03.reverse();
    }
})

// mobile
gsap.set('._pento .pto03_mob .beneTit dl dt', {
    opacity: 0,
    xPercent: -20
});
gsap.set('._pento .pto03_mob .beneTit dl dd:first-of-type', {
    opacity: 0,
    xPercent: -20
});
gsap.set('._pento .pto03_mob .beneTit dl dd:last-of-type', {
    opacity: 0,
    xPercent: -20
});

let pen03mob = gsap.timeline();
pen03mob
    .to('._pento .pto03_mob .beneTit dl dt', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    })
    .to('._pento .pto03_mob .beneTit dl dd:first-of-type', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=50%')
    .to('._pento .pto03_mob .beneTit dl dd:last-of-type', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=50%');

pen03mob.pause();

ScrollTrigger.create({
    trigger: '._pento .pto03',
    start: 'top center',
    onEnter: function() {
        pen03mob.play();
    },
    onLeaveBack: function() {
        pen03mob.reverse();
    }
})


gsap.set('._pento .pto03_mob .benemob li:nth-of-type(1) .beneSub .listT .arr', {
    opacity: 0,
    xPercent: -50
});
gsap.set('._pento .pto03_mob .benemob li:nth-of-type(1) .beneSub .listT h1', {
    opacity: 0,
    xPercent: 20
});
gsap.set('._pento .pto03_mob .benemob li:nth-of-type(1) h2', {
    opacity: 0,
    xPercent: 20
});
gsap.set('._pento .pto03_mob .benemob li:nth-of-type(1) .beThb .__max', {
    scale: 1.05
});

let pen03_1 = gsap.timeline();
pen03_1
    .to('._pento .pto03_mob .benemob li:nth-of-type(1) .beThb .__max', {
        scale: 1,
        duration: .6
    })
    .to('._pento .pto03_mob .benemob li:nth-of-type(1) .beneSub .listT .arr', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=80%')
    .to('._pento .pto03_mob .benemob li:nth-of-type(1) .beneSub .listT h1', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=80%')
    .to('._pento .pto03_mob .benemob li:nth-of-type(1) h2', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=80%')

;

pen03_1.pause();

ScrollTrigger.create({
    trigger: '._pento .pto03_mob .benemob li:nth-of-type(1)',
    start: 'top center',
    onEnter: function() {
        pen03_1.play();
    },
    onLeaveBack: function() {
        pen03_1.reverse();
    }
})

gsap.set('._pento .pto03_mob .benemob li:nth-of-type(2) .beneSub .listT .arr', {
    opacity: 0,
    xPercent: -50
});
gsap.set('._pento .pto03_mob .benemob li:nth-of-type(2) .beneSub .listT h1', {
    opacity: 0,
    xPercent: 20
});
gsap.set('._pento .pto03_mob .benemob li:nth-of-type(2) h2', {
    opacity: 0,
    xPercent: 20
});
gsap.set('._pento .pto03_mob .benemob li:nth-of-type(2) .beThb .__max', {
    scale: 1.05
});

let pen03_2 = gsap.timeline();
pen03_2
    .to('._pento .pto03_mob .benemob li:nth-of-type(2) .beThb .__max', {
        scale: 1,
        duration: .6
    })
    .to('._pento .pto03_mob .benemob li:nth-of-type(2) .beneSub .listT .arr', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=80%')
    .to('._pento .pto03_mob .benemob li:nth-of-type(2) .beneSub .listT h1', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=80%')
    .to('._pento .pto03_mob .benemob li:nth-of-type(2) h2', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=80%')

;

pen03_2.pause();

ScrollTrigger.create({
    trigger: '._pento .pto03_mob .benemob li:nth-of-type(2)',
    start: 'top center',
    onEnter: function() {
        pen03_2.play();
    },
    onLeaveBack: function() {
        pen03_2.reverse();
    }
})

gsap.set('._pento .pto03_mob .benemob li:nth-of-type(3) .beneSub .listT .arr', {
    opacity: 0,
    xPercent: -50
});
gsap.set('._pento .pto03_mob .benemob li:nth-of-type(3) .beneSub .listT h1', {
    opacity: 0,
    xPercent: 20
});
gsap.set('._pento .pto03_mob .benemob li:nth-of-type(3) h2', {
    opacity: 0,
    xPercent: 20
});
gsap.set('._pento .pto03_mob .benemob li:nth-of-type(3) .beThb .__max', {
    scale: 1.05
});

let pen03_3 = gsap.timeline();
pen03_3
    .to('._pento .pto03_mob .benemob li:nth-of-type(3) .beThb .__max', {
        scale: 1,
        duration: .6
    })
    .to('._pento .pto03_mob .benemob li:nth-of-type(3) .beneSub .listT .arr', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=80%')
    .to('._pento .pto03_mob .benemob li:nth-of-type(3) .beneSub .listT h1', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=80%')
    .to('._pento .pto03_mob .benemob li:nth-of-type(3) h2', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=80%')

;

pen03_3.pause();

ScrollTrigger.create({
    trigger: '._pento .pto03_mob .benemob li:nth-of-type(3)',
    start: 'top center',
    onEnter: function() {
        pen03_3.play();
    },
    onLeaveBack: function() {
        pen03_3.reverse();
    }
})


//se04 motion
gsap.set('._pento .pto04 .wrap>dl dt', {
    opacity: 0,
    yPercent: 100
});
gsap.set('._pento .pto04 .wrap>dl dd', {
    opacity: 0,
    yPercent: 40
});


let pen04 = gsap.timeline();
pen04
    .to('._pento .pto04 .wrap>dl dt', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    })
    .to('._pento .pto04 .wrap>dl dd', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    }, '-=50%');
pen04.pause();

ScrollTrigger.create({
    trigger: '._pento .pto04',
    start: 'top center',
    onEnter: function() {
        pen04.play();
    },
    onLeaveBack: function() {
        pen04.reverse();
    }
})


gsap.set('._pento .pto04 .wrap .flexW .pic .__max', {
    scale: 1.2
});
gsap.set('._pento .pto04 .wrap .flexW .pic img', {
    opacity: 0
});
gsap.set('._pento .pto04 .wrap .flexW dl dt', {
    opacity: 0,
    xPercent: -10
});
gsap.set('._pento .pto04 .wrap .flexW dl dd', {
    opacity: 0,
    xPercent: -10
});

let pen04_1 = gsap.timeline();
pen04_1
    .to('._pento .pto04 .wrap .flexW .pic .__max', {
        scale: 1,
        duration: .6,
        ease: "power1.inout"
    })
    .to('._pento .pto04 .wrap .flexW .pic img', {
        opacity: 1,
        duration: .6,
        ease: "power1.inout"
    }, '-=50%')
    .to('._pento .pto04 .wrap .flexW dl dt', {
        opacity: 1,
        xPercent: 0,
        duration: .8,
        ease: "power1.inout"
    }, '-=50%')
    .to('._pento .pto04 .wrap .flexW dl dd', {
        opacity: 1,
        xPercent: 0,
        duration: .8,
        ease: "power1.inout"
    }, '-=50%');

pen04_1.pause();

ScrollTrigger.create({
    trigger: '._pento .pto04 .wrap .flexW .pic',
    start: 'top center',
    onEnter: function() {
        pen04_1.play();
    },
    onLeaveBack: function() {
        pen04_1.reverse();
    }
})


gsap.set('._pento .pto04 .wrap .hand', {
    opacity: 0
});
gsap.set('._pento .pto04 .wrap .hand li h1', {
    opacity: 0,
    yPercent: 40
});
gsap.set('._pento .pto04 .wrap .hand li h2', {
    opacity: 0,
    yPercent: 40
});
gsap.set('._pento .pto04 .wrap .hand li .img', {
    opacity: 0,
    yPercent: 20
});
gsap.set('._pento .pto04 .wrap .hand li p', {
    opacity: 0,
    yPercent: 20
});

let pen04_2 = gsap.timeline();
pen04_2
    .to('._pento .pto04 .wrap .hand', {
        opacity: 1,
        duration: .6
    })
    .to('._pento .pto04 .wrap .hand li h1', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    }, '-=50%')
    .to('._pento .pto04 .wrap .hand li h2', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    }, '-=50%')
    .to('._pento .pto04 .wrap .hand li .img', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    }, '-=50%')
    .to('._pento .pto04 .wrap .hand li p', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    }, '-=50%');

pen04_2.pause();

ScrollTrigger.create({
    trigger: '._pento .pto04 .wrap .hand',
    start: 'top center',
    onEnter: function() {
        pen04_2.play();
    },
    onLeaveBack: function() {
        pen04_2.reverse();
    }
})


// se05

gsap.set('._pento .pto05 h1', {
    opacity: 0,
    yPercent: 60
});
gsap.set('._pento .pto05 .energy li:nth-of-type(1)', {
    opacity: 0,
    yPercent: 20
});
gsap.set('._pento .pto05 .energy li:nth-of-type(2)', {
    opacity: 0,
    yPercent: 20
});

let pen05 = gsap.timeline();
pen05
    .to('._pento .pto05 h1', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    })
    .to('._pento .pto05 .energy li:nth-of-type(1)', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    }, '-=50%')
    .to('._pento .pto05 .energy li:nth-of-type(2)', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    }, '-=50%');

pen05.pause();

ScrollTrigger.create({
    trigger: '._pento .pto05',
    start: 'top center',
    onEnter: function() {
        pen05.play();
    },
    onLeaveBack: function() {
        pen05.reverse();
    }
})

// se06

gsap.set('._pento .pto06 .title span', {
    opacity: 0,
    xPercent: -40
});
gsap.set('._pento .pto06 .title strong', {
    opacity: 0,
    xPercent: -10
});
gsap.set('._pento .pto06 .title dl dt', {
    opacity: 0,
    xPercent: -20
});
gsap.set('._pento .pto06 .title dl dd', {
    opacity: 0,
    xPercent: -20
});

let pen06 = gsap.timeline();
pen06
    .to('._pento .pto06 .title span', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    })
    .to('._pento .pto06 .title strong', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=50%')
    .to('._pento .pto06 .title dl dt', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=50%')
    .to('._pento .pto06 .title dl dd', {
        opacity: 1,
        xPercent: 0,
        duration: .8
    }, '-=50%');

pen06.pause();

ScrollTrigger.create({
    trigger: '._pento .pto06',
    start: 'top center',
    onEnter: function() {
        pen06.play();
    },
    onLeaveBack: function() {
        pen06.reverse();
    }
})

// gsap.set('._pento .pto06 .imgWrap .imgin:nth-of-type(1) .__max', { scale: 1.1 });
// gsap.set('._pento .pto06 .imgWrap .imgin:nth-of-type(2) .__max', { scale: 1.1 });
// gsap.set('._pento .pto06 .imgWrap .imgin:nth-of-type(3) .__max', { scale: 1.1 });

// let pen06_1 = gsap.timeline();
// pen06_1
//     .to('._pento .pto06 .imgWrap .imgin:nth-of-type(1) .__max', { scale: 1, duration: .8 })
//     ;

// pen06_1.pause();

// ScrollTrigger.create({
//     trigger: '._pento .pto06 .imgWrap .imgin:nth-of-type(1)',
//     start:'top center',
//     onEnter: function(){
//         pen06_1.play();
//     },
//     onLeaveBack: function(){
//         pen06_1.reverse();
//     }
// })

// let pen06_2 = gsap.timeline();
// pen06_2
//     .to('._pento .pto06 .imgWrap .imgin:nth-of-type(2) .__max', { scale: 1, duration: .8 })
//     ;

// pen06_2.pause();

// ScrollTrigger.create({
//     trigger: '._pento .pto06 .imgWrap .imgin:nth-of-type(2)',
//     start:'top center',
//     onEnter: function(){
//         pen06_2.play();
//     },
//     onLeaveBack: function(){
//         pen06_2.reverse();
//     }
// })

// let pen06_3 = gsap.timeline();
// pen06_3
//     .to('._pento .pto06 .imgWrap .imgin:nth-of-type(3) .__max', { scale: 1, duration: .8 })
//     ;

// pen06_3.pause();

// ScrollTrigger.create({
//     trigger: '._pento .pto06 .imgWrap .imgin:nth-of-type(3)',
//     start:'top center',
//     onEnter: function(){
//         pen06_3.play();
//     },
//     onLeaveBack: function(){
//         pen06_3.reverse();
//     }
// })

gsap.to('._pento .pto06 .imgWrap .imgin:nth-of-type(1) img', {
    scrollTrigger: {
        trigger: '._pento .pto06 .imgWrap .imgin:nth-of-type(1)',
        start: 'top center',
        end: 'bottom top',
        scrub: 1,
    },
    yPercent: -10
})

gsap.to('._pento .pto06 .imgWrap .imgin:nth-of-type(2) img', {
    scrollTrigger: {
        trigger: '._pento .pto06 .imgWrap .imgin:nth-of-type(2)',
        start: 'top center',
        end: 'bottom top',
        scrub: 1,
    },
    xPercent: -10
})

gsap.to('._pento .pto06 .imgWrap .imgin:nth-of-type(3) img', {
    scrollTrigger: {
        trigger: '._pento .pto06 .imgWrap .imgin:nth-of-type(3)',
        start: 'top center',
        end: 'bottom top',
        scrub: 1,
    },
    yPercent: -10
})


// se07
gsap.set('._pento .pto07', {
    'background-position-x': '120%'
});

var pen07 = gsap.timeline();

pen07
    .to('._pento .pto07', {
        'background-position-x': '100%',
        duration: .8
    })

pen07.pause();

ScrollTrigger.create({
    trigger: '._pento .pto07',
    start: 'top top',
    onEnter: function() {
        pen07.play();
    },
    onLeaveBack: function() {
        pen07.reverse();
    }
})

// se07 ul li
const liList = document.querySelectorAll('._pento .pto07 .fea li');
const lineList = document.querySelectorAll('._pento .pto07 .fea li .line');

ScrollTrigger.create({
    trigger: '._pento .pto07',
    end: 'bottom bottom',
});

liList.forEach(item => {
    gsap.set(item, {
        yPercent: 20,
        opacity: 0
    });

    ScrollTrigger.create({
        trigger: item,
        start: 'top-=100% center',
        invalidateOnRefresh: true,
        onEnter: () => {
            gsap.to(item, {
                yPercent: 0,
                opacity: 1
            });
        },
        onLeaveBack: () => {
            gsap.to(item, {
                yPercent: 40,
                opacity: 0
            });
        }
    });

});

lineList.forEach(item => {
    gsap.set(item, {
        opacity: 0,
        width: 0
    });

    ScrollTrigger.create({
        trigger: item,
        start: 'top center',
        invalidateOnRefresh: true,
        onEnter: () => {
            gsap.to(item, {
                opacity: 1,
                width: '100%'
            });
        },
        onLeaveBack: () => {
            gsap.to(item, {
                opacity: 0,
                width: 0
            });
        }
    });

});


// se08-1
gsap.set('._pento .pto08 .spec h1', {
    opacity: 0,
    yPercent: 40
});
gsap.set('._pento .pto08 .spec table', {
    opacity: 0,
    yPercent: 10
});

let pen08_1 = gsap.timeline();
pen08_1
    .to('._pento .pto08 .spec h1', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    })
    .to('._pento .pto08 .spec table', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    }, '-=50%');

pen08_1.pause();

ScrollTrigger.create({
    trigger: '._pento .pto08 .spec',
    start: 'top center',
    onEnter: function() {
        pen08_1.play();
    },
    onLeaveBack: function() {
        pen08_1.reverse();
    }
})


// se08-2
gsap.set('._pento .pto08 .acc h1', {
    opacity: 0,
    yPercent: 40
});
gsap.set('._pento .pto08 .acc table', {
    opacity: 0,
    yPercent: 40
});

let pen08_2 = gsap.timeline();
pen08_2
    .to('._pento .pto08 .acc h1', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    })
    .to('._pento .pto08 .acc table', {
        opacity: 1,
        yPercent: 0,
        duration: .8
    }, '-=50%');

pen08_2.pause();

ScrollTrigger.create({
    trigger: '._pento .pto08 .acc',
    start: 'top center',
    onEnter: function() {
        pen08_2.play();
    },
    onLeaveBack: function() {
        pen08_2.reverse();
    }
})
</script>




<div class="click-modal kor">
            
    <div class="closebg"></div>

    <div class="cont">
        <div class="close">
            <i class="ri-close-line"></i>
        </div>
        <h2>개인정보처리방침</h2>
        <div class="scroll mCustomScrollbar _mCS_1 mCS_no_scrollbar"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: 350px;"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position: relative; top: 0px; left: 0px;" dir="ltr">
            <div class="tbx">
                “(주)엔슨”(이하 “회사”)는 개인정보보호법에 따라 이용자의 개인정보 보호 및 권익을 보호하고 개인정보와 관련한 이용자의 고충을 원활하게 처리할 수 있도록 다음과 같은 처리방침을 두고 있습니다. 고객님의 정보는 개인의 소중한 자산인 동시에 회사 운영의 중요한 자료가 됩니다. 그러므로 회사는 운영상의 모든 과정에서 고객님의 개인정보를 보호하는데 최선의 노력을 다할 것을 약속 드립니다. 회사는 개인정보처리방침을 개정하는 경우 웹사이트를 통하여 공지할 것입니다. <br>
                <br>
                <p>제 1장. 개인정보 수집 동의절차</p>
                회사는 귀하께서 웹사이트의 개인정보보호방침 또는 이용약관의 내용에 대해 (동의한다)버튼 또는 (동의하지 않는다)버튼을 클릭할 수 있는 절차를 마련하여 (동의한다)버튼을 클릭하면 개인정보 수집에 대해 동의한 것으로 봅니다.
                <br>
                <br>
                <p>제 2장. 개인정보의 수집 및 이용 목적</p> 
                회사는 개인정보를 다음의 목적을 위해 활용합니다. 처리한 개인정보는 다음의 목적 이외의 용도로는 사용되지 않으며 이용 목적이 변경될 시 사전동의를 구할 예정입니다. <br>
                가. 이름, 이메일, 전화번호, 휴대폰번호 : 문의에 대한 처리 및 결과 회신, 고지사항 전달, 본인 의사 확인, 불만 처리 등 원활한 의사소통 경로의 확보, 서비스 부정이용 방지, 접속 빈도파악, 회원제 서비스 이용에 따른 본인 식별 절차, 이벤트 및 광고성 정보 제공 및 참여기회 제공, 접속 빈도파악 또는 회원의 서비스이용에 대한 통계<br>
                나. 주소 : 경품과 물품 배송에 대한 정확한 배송지의 확보
                <br>
                <br>
                <p>제 3장. 광고정보의 전송</p> 
                가. 회사는 귀하의 명시적인 수신거부의사에 반하여 영리목적의 광고성 정보를 전송하지 않습니다.<br>
                나. 회사는 약관변경, 기타 서비스 이용에 관한 변경사항, 새로운 서비스/신상품이나 이벤트 정보, 기타 상품정보 등을 전자우편, 휴대폰 문자전송 기타 전지적 전송매체 등의 방법으로 알려드립니다. 이 경우 관련 법령상 명시사항 및 명시방법을 준수합니다.<br>
                다. 회사는 상품정보 안내 등 온라인 마케팅을 위해 광고성 정보를 전자우편 등으로 전송하는 경우전자 우편의 제목란 및 본문란에 귀하가 쉽게 알아 볼 수 있도록 조치합니다.
                <br>
                <br>
                <p>제 4장. 개인정보의 수집범위</p> 
                회사는 별도의 회원가입 절차 없이 대부분의 콘텐츠에 자유롭게 접근할 수 있습니다. 회원제 서비스를 이용하고자 할 경우 다음의 정보를 입력해 주셔야 합니다.<br>
                가. 개인정보 수집항목 : 이름, 이메일, 전화번호, 휴대폰번호SMS 수신여부, 서비스 이용기록, 접속로그, 받는 고객 정보(이름, 전화번호, 주소, 이메일)<br>
                나. 개인정보 수집방법 : 홈페이지 내 문의 및 게시판 이용 등
                <br>
                <br>
                <p>제 5장. 개인정보의 보유 및 이용기간</p> 
                회사는 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 단, 다음의 정보에 대해서는 아래의 이유로 명시한 기간 동안 보존합니다.<br>
                <br>
                -보존항목 : 이름, 이메일, 전화번호, 휴대폰번호<br>
                -보존근거 : 불량 회원의 부정한 이용의 재발 방지<br>
                -보존기간 : 1개월<br>
                <br>
                그리고 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다. <br>
                소비자의 불만 또는 분쟁처리에 관한 기록 : 3년 (전자상거래 등에서의 소비자보호에 관한 법률)
                <br>
                <br>
                <p>제 6장. 개인정보의 파기 절차 및 방법</p> 
                회사는 원칙적으로 개인정보 처리목적이 달성된 경우에는 지체 없이 해당 개인정보를 파기합니다. 파기의 절차, 기한 및 방법은 다음과 같습니다.
                <br>
                <br>
                -파기절차<br>
                회원님이 회원가입 등을 위해 입력하신 정보는 목적 달성 후 별도의 DB로 옮겨져(종이의 경우 별도의 서류함) 내부 방침 및 기타 관련 법령에 의한 정보보호 사유에 따라(보유 및 이용기간 참조) 일정 기간 저장 된 후 파기합니다. 별도 DB로 옮겨진 개인정보는 법률에 의한 경우가 아니고서는 보유 이외의 다른 목적으로 이용되지 않습니다.<br>
                -파기기한<br>
                이용자의 개인정보는 개인정보의 보유기간이 경과된 경우에는 보유기간의 종료일로부터 5일 이내에, 개인정보의 처리 목적 달성, 해당 서비스의 폐지, 사업의 종료 등 그 개인정보가 불필요하게 되었을 때에는 개인정보의 처리가 불필요한 것으로 인정되는 날로부터 5일 이내에 그 개인정보를 파기합니다.<br>
                -파기방법<br>
                전자적 파일 형태의 정보는 기록을 재생할 수 없는 기술적 방법을 사용합니다.

                <br>
                <br>
                <p>제 7장. 개인정보의 안전성 확보 조치</p> 
                회사는 개인정보보호법 제29조에 따라 다음과 같이 안전성 확보에 필요한 조치를 하고 있습니다.<br>
                가. 개인정보 취급 직원의 최소화 및 교육개인정보를 취급하는 직원을 지정하고 담당자에 한정시켜 최소화 하여 개인정보를 관리하는 대책을 시행하고 있습니다.<br>
                나. 개인정보의 암호화이용자의 개인정보는 비밀번호는 암호화 되어 저장 및 관리되고 있어, 본인만이 알 수 있으며 중요한 데이터는 파일 및 전송 데이터를 암호화 하거나 파일 잠금 기능을 사용하는 등의 별도 보안기능을 사용하고 있습니다.
                <br>
                <br>
                <p>제 8장. 개인정보 보호책임자 작성</p> 
                회사는 고객님께서 정보를 안전하게 이용할 수 있도록 최선을 다하고 있습니다. 고객님의 개인정보를 취급하는 책임자는 다음과 같으며 개인정보 관련 문의사항에 신속하고 성실하게 답변해드리고 있습니다.
                <br>
                <br>
                ▶ 개인정보보호 담당자<br>
                이름 : 류승연<br>
                소속/직위 : 마케팅팀/프로<br>
                e-mail : rsy@nsonlaser.com<br>
                전화번호 : 053-857-5995<br>
                정보 주체께서는 회사 서비스를 이용하시면서 발생한 모든 개인정보 보호 관련 문의, 불만처리, 피해구제 등에 관한 사항을 개인정보 보호책임자 및 담당자에게 문의하실 수 있습니다.
                <br>
                <br>
                <p>제 9장. 의견수렴 및 불만처리</p> 
                회사는 회원님의 의견을 소중하게 생각하며, 회원님은 의문사항으로부터 언제나 성실한 답변을 받을 권리가 있습니다. 회사는 회원님과의 원활한 의사소통을 위해 고객센터를 운영하고 있습니다.<br>
                <br>
                실시간 상담 및 전화상담은 영업시간에만 가능합니다. 이메일 및 우편을 이용한 상담은 수신 후 24시간 내에 성실하게 답변 드리겠습니다. 다만, 근무시간 이후 또는 주말 및 공휴일에는 익일 처리하는 것을 원칙으로 합니다.도용된 개인정보에 대한 회사의 조치는 다음과 같습니다.<br>
                <br>
                1. 이용자가 타인의 기타 개인정보를 도용하여 회원가입 등을 하였음을 알게 된 때에는 지체 없이 해당 아이디에 대한 서비스 이용정지 또는 회원탈퇴 등 필요한 조치를 취합니다.<br>
                2. 자신의 개인정보 도용을 인지한 이용자가 해당 아이디에 대해 서비스 이용정지 또는 회원탈퇴를 요구하는 경우에는 즉시 조치를 취합니다.<br>
                기타 개인정보에 관한 상담이 필요한 경우에는 개인정보침해신고센터, 대검찰청 인터넷범죄수사센터, 경찰청 사이버테러대응센터 등으로 문의하실 수 있습니다.<br>
                <br>
                개인정보침해센터 (http://www.118.or.kr)대검찰청<br>
                인터넷범죄수사센터 (http://icic.sppo.go.kr)경찰<br>사이버테러대응센터 (http://www.police.go.kr/ctrc/ctrc_main.htm)
                <br>
                <br>
                <p>제 10장. 고지의 의무</p> 
                이 개인정보처리방침은 시행일로부터 적용되며, 법령 및 방침에 따른 변경내용의 추가, 삭제 및 정정이 있는 경우에는 변경사항의 시행 7일 전부터 공지사항을 통하여 고지할 것입니다.
            </div>
        </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; display: block; height: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
    </div>
</div>

<div class="click-modal eng">
        
    <div class="closebg"></div>

    <div class="cont">
        <div class="close">
            <i class="ri-close-line"></i>
        </div>
        <h2>Privacy Policy</h2>
        <div class="scroll mCustomScrollbar _mCS_2 mCS_no_scrollbar"><div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: 350px;"><div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
            <div class="tbx">
                NSON (here there after referred as “Company”) has established the following Privacy Policy in accordance with the “Personal Information Protection Act” to safeguard the personal information and rights of the Users and efficiently deal with Users’ grievances related to personal information. Customers’ information is a valuable resource and at the same time an important information for the management of the Company. Therefore, the Company promises to make utmost effort to protect the customers’ personal information in every stage while managing these information. The Company will notify the Privacy Policy statement via our website in the case of any amendment. <br>
                <br>
                <p>Article 1. Consent Procedure for Personal Information Collection</p>
                The Company has a separate procedure for you to click “I agree” or “I don’t agree” button regarding the content of the Privacy Policy or terms of service, where if you click the "I agree" button, it is deemed that you have agreed to the Company’s collection of your personal information.
                <br>
                <br>
                <p>Article 2. Purpose of Collection and Use of Personal Information</p> 
                The Company uses the personal information for the purposes described below. Any personal information processed shall not be used for purposes other than what is stated below; provided, that your prior consent will be sought in case there are changes to originally prescribed purposes.<br>
                1. Name, email, phone number, mobile phone number: to reply regarding any inquiries, give notifications, confirm, establish active communication channel for customer services, prevent fraudulent use, identify frequency of visits, check personal identification for membership service, provide information on promotions and opportunities for participation of event,&nbsp;identify frequency of visit or to obtain statistics on the member’s use of services.<br>
                2. Address: to secure the shipping information giveaways and purchased products.
                <br>
                <br>
                <p>Article 3. Advertisement Information Transmission</p> 
                1. The Company does not send any commercial information for profit purposes against your explicit refusal to receive email.<br>
                2. The Company informs you about and changes of the terms, other changes regarding use of services, new service or product, event information, other product information through electronic transmission media such as email, mobile phone, and SMS. In such case, we comply with the items and methods to specify in accordance to the relevant laws and regulation.<br>
                3. When sending any commercial information for profit purposes through e-mail, such as product information, the Company takes necessary measures in the subject reply sections of the e-mail for you to recognize it easily.
                <br>
                <br>
                <p>Article 4. Scope of Personal Information Collection</p> 
                You can freely access most of our contents without signing up. If you would like to use the Company’s membership services, you must enter the following information:<br>
                1. Items of Personal Information Collection: name, e-mail, phone number, mobile phone numberSMS receipt consent, service usage history, visit logs, recipient information (name, phone number, address, e-mail)<br>
                2. Methods of Personal Information Collection: using inquiry board in the home page and etc.
                <br>
                <br>
                <p>Article 5. Period of Retaining and Utilizing Personal Information</p> 
                The Company dispose the personal information without delay once the purpose of its collection and use has been attained.
                However, the following information is stored for specified period by the reason as follows:<br>
                <br>
                -Items retained: name, e-mail, phone number, mobile phone number<br>
                -Basis of retainment: prevention of fraudulent use of rogue members<br>
                -period of retainment: one month<br>
                <br>
                According to the provisions of the relevant laws, if necessary, the Company retains the member information for a certain period of time specified by the relevant statutes as follows:<br>
                Records on processing of consumers’ complaints or disputes: three years (Act on the Consumer Protection in Electronic Commerce)
                <br>
                <br>
                <p>Article 6. Procedures and Methods for Destroying Personal Information</p> 
                In principle, the Company dispose the information without delay once the purpose of process of personal information is attained. The dispose procedure and method are as follows.
                <br>
                <br>
                -Dispose procedure<br>
                The information that you provide for sign-up is moved to a separate database (a separate file box for papers) after the information is used for the intended purpose, stored for certain period of time for reasons of information protection under internal policy and relevant legislation and destroyed. The information transferred to a separate database is not used for any other purpose than being retained unless specified by law.<br>
                -Disposal period<br>
                personal information of the Users shall be disposed within the 5 days since the expiration date of the retention period, and in the case where the personal information is no longer necessary, such as fulfillment of purpose of personal information processing, discontinuation of relevant services or closure of business, etc., personal information is destroyed within the 5 days since the day when such information becomes of no use.<br>
                -Dispose method<br>
                The personal information stored in files is deleted in technical ways that prevent any recovery of the record.

                <br>
                <br>
                <p>Article 7.&nbsp;Securing Safety of Personal Information</p> 
                Under safety article 29 of Personal Information Protection Act, the Company takes measures to secure safety as follows.<br>
                1.&nbsp;Minimization and education of the person in charge of personal information management <br>
                The Company is implementing measures to manage personal information by designating and minimizing personnel handling personnel.<br>
                2. Encryption of personal information <br>
                Personal information of User is encrypted and stored; and the Company also uses separate security features, such asencryption when storing and delivering for important data.
                <br>
                <br>
                <p>Article 8. Response of&nbsp;the Person in Charge of Personal Information Protection</p> 
                The Company does its best to make sure customers can safely use its service. The person in charge of customers’ personal information is as follows. The person in charge will respond quickly and sincerely to any personal information related inquiries.
                <br>
                <br>
                ▶ Person in charge of personal information<br>
                Name: Seung Yeon Ryu<br>
                Position: Marketing Department<br>
                e-mail: nson@nsonlaser.com<br>
                Telephone: 053-857-5995<br>
                The information subject may inquire about all personal information protection related matters, complaint handling, damage relief, etc. that occurred using the Company’s service to the person in charge of personal information protection and department in charge
                <br>
                <br>
                <p>Article 9. Feedback Procedure and Complaint Handling</p> 
                The Company values the customers’ opinions and believe that customers have rights to receive sincere response to their inquiries. The Company operates customer service center for active communication with the customers.<br>
                <br>
                Real-time counseling and phone call counseling are available only during the business hour. In the case of counseling through e-mail or post, we will return the response within 24 hours after receiving it. However, if inquiries are received after the working hours or during the weekends and holidays, it will be processed next day.<br>
                The Company takes the following measures on misused personal information.
                <br>
                <br>
                1. If the Company finds that User signed up by abusing other’s personal information, the Company will take necessary measure such as service discontinuation and the account deletion for the ID in concern.<br>
                2. If User notices one’s personal information abuse and requests for discontinuation of service use or account deletion for the ID in concern the Company will immediately take the measure.<br>
                If you need other personal information related consultation, you can also contact&nbsp;KISA PRIVACY center, Supreme Prosecutors’ Office Cybercrime Investigation Department, and Korean National Police Agency cyber terror response center.<br>
                <br>
                KISA PRIVACY center (http://www.118.or.kr)<br>
                Supreme Prosecutors’ Office Cybercrime Investigation Department&nbsp;&nbsp;&nbsp;(http://icic.sppo.go.kr)<br>
                Korean National Police Agency cyber terror response center(http://www.police.go.kr/ctrc/ctrc_main.htm)
                <br>
                <br>
                <p>Article 10. Duty of Notification</p> 
                The current Privacy Policy is implemented at the date of issue and in the case of any addition of modification, deletion, and revision under laws and regulations, the Company will notify seven days before its implementation through announcement.
            </div>
        </div><div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; display: block; height: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
    </div>

</div>

<script src="/utils/plugin/malihuScroll/malihuScroll.js"></script>
<script>
    // 모달 관련
    $('.click-modal .scroll').mCustomScrollbar();


    // 국문 모달
    function modalClose(){
        $('.click-modal').hide();
    }
    function modalOpen(){
        $('.click-modal.kor').show();
    }

    // 모달끄기
    $('.click-modal .cont .close').click(modalClose);
    $('.click-modal .closebg').click(modalClose);

    // 모달켜기
    $('footer .b_f .rbx .link.kor').click(modalOpen);




    // 영문 모달
    function modalClose2(){
        $('.click-modal').hide();
    }
    function modalOpen2(){
        $('.click-modal.eng').show();
    }

    // 모달끄기
    $('.click-modal .cont .close').click(modalClose2);
    $('.click-modal .closebg').click(modalClose2);

    // 모달켜기
    $('footer .b_f .rbx .link.eng').click(modalOpen2);

</script>


<div id="yt_article_summary_widget_wrapper" class="yt_article_summary_widget_wrapper" style="display: none;">
        <div id="yt_article_summary_widget" class="yt_article_summary_widget"><svg style="filter: brightness(0.8);" width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="path-1-outside-1_3606_3145" maskUnits="userSpaceOnUse" x="1" y="1" width="22" height="22" fill="black">
                <rect fill="white" x="1" y="1" width="22" height="22"></rect>
                <path d="M20.6816 10.1843C20.9588 9.34066 21.0063 8.4399 20.8192 7.57245C20.6321 6.70499 20.217 5.90134 19.6157 5.24216C19.0143 4.58298 18.2478 4.09146 17.393 3.81692C16.5382 3.54238 15.6253 3.49449 14.7459 3.67805C14.1453 3.01747 13.379 2.52468 12.524 2.24931C11.669 1.97394 10.7555 1.92571 9.87559 2.10947C8.99568 2.29324 8.18039 2.70252 7.51181 3.29608C6.84323 3.88965 6.34499 4.64654 6.06725 5.49055C5.18642 5.67292 4.3699 6.08122 3.70003 6.67426C3.03017 7.26731 2.53064 8.02413 2.25182 8.86842C1.97299 9.71271 1.92474 10.6146 2.11192 11.4832C2.2991 12.3517 2.71509 13.1562 3.31795 13.8155C3.09309 14.4899 3.01633 15.2037 3.09278 15.9095C3.16924 16.6154 3.39716 17.2971 3.76139 17.9093C4.30169 18.8351 5.12567 19.568 6.11483 20.0027C7.104 20.4373 8.20738 20.5512 9.26631 20.328C9.74353 20.8568 10.3291 21.2796 10.9844 21.5684C11.6396 21.8571 12.3495 22.0053 13.0672 22.003C14.1516 22.003 15.2081 21.6635 16.0847 21.0334C16.9612 20.4034 17.6125 19.5152 17.9449 18.4968C18.649 18.3539 19.3141 18.0649 19.8962 17.6489C20.4784 17.233 20.9642 16.6997 21.3214 16.0843C21.8585 15.1598 22.0858 14.0915 21.9709 13.032C21.856 11.9724 21.4048 10.9758 20.6816 10.1843ZM13.0798 20.6968C12.191 20.6968 11.3302 20.3894 10.6473 19.828L10.7677 19.7593L14.8029 17.4593C14.9069 17.4047 14.9935 17.3225 15.0528 17.2221C15.1121 17.1216 15.1418 17.0068 15.1386 16.8905V11.2655L16.8427 12.2405C16.8517 12.2441 16.8594 12.2501 16.865 12.2579C16.8706 12.2656 16.8739 12.2748 16.8744 12.2843V16.9343C16.876 17.4289 16.7785 17.9189 16.5875 18.3761C16.3964 18.8333 16.1156 19.2488 15.7611 19.5985C15.4067 19.9482 14.9856 20.2253 14.5222 20.4138C14.0588 20.6023 13.5621 20.6984 13.0608 20.6968H13.0798ZM4.90165 17.2593C4.46164 16.5029 4.3026 15.6189 4.45188 14.7593L4.57224 14.828L8.60749 17.128C8.70379 17.1829 8.81303 17.2118 8.92423 17.2118C9.03543 17.2118 9.14467 17.1829 9.24097 17.128L14.1758 14.3218V16.253C14.1797 16.2608 14.1817 16.2694 14.1817 16.278C14.1817 16.2867 14.1797 16.2953 14.1758 16.303L10.0962 18.628C9.66403 18.8748 9.18685 19.0352 8.69188 19.0999C8.19692 19.1647 7.69387 19.1326 7.21148 19.0055C6.72909 18.8784 6.27681 18.6587 5.88048 18.3591C5.48415 18.0595 5.15154 17.6858 4.90165 17.2593ZM3.83741 8.5843C4.28764 7.82089 4.99655 7.23878 5.83919 6.94055V11.6718C5.83595 11.7857 5.86434 11.8983 5.92128 11.9975C5.97823 12.0966 6.06156 12.1785 6.16227 12.2343L11.0717 15.028L9.36766 16.003C9.34918 16.0092 9.32914 16.0092 9.31065 16.003L5.23106 13.678C4.36041 13.1812 3.72487 12.3642 3.46364 11.4059C3.20242 10.4476 3.33682 9.42624 3.83741 8.56555V8.5843ZM17.8563 11.7968L12.9278 8.9718L14.6319 8.00305C14.6403 7.99741 14.6502 7.99439 14.6604 7.99439C14.6705 7.99439 14.6805 7.99741 14.6889 8.00305L18.7685 10.328C19.3915 10.684 19.8992 11.2072 20.2325 11.8368C20.5659 12.4664 20.7111 13.1764 20.6514 13.8843C20.5916 14.5921 20.3294 15.2687 19.8951 15.8352C19.4608 16.4017 18.8724 16.8349 18.1983 17.0843V12.353C18.1946 12.2391 18.1612 12.1281 18.1013 12.0306C18.0414 11.9332 17.957 11.8527 17.8563 11.7968ZM19.554 9.2968L19.4336 9.2218L15.4047 6.9093C15.3047 6.84846 15.1896 6.81624 15.0721 6.81624C14.9547 6.81624 14.8395 6.84846 14.7396 6.9093L9.8111 9.71555V7.75305C9.8061 7.7445 9.80346 7.7348 9.80346 7.72492C9.80346 7.71505 9.8061 7.70535 9.8111 7.6968L13.897 5.37805C14.5222 5.02257 15.2371 4.85003 15.958 4.88059C16.6789 4.91115 17.3762 5.14356 17.9682 5.55064C18.5601 5.95772 19.0225 6.52265 19.301 7.17939C19.5796 7.83614 19.663 8.55755 19.5413 9.2593L19.554 9.2968ZM8.87989 12.7218L7.1695 11.753C7.15339 11.7405 7.1422 11.7228 7.13782 11.703V7.06555C7.13785 6.35289 7.34371 5.65499 7.73128 5.0536C8.11885 4.45222 8.67209 3.97224 9.32619 3.6699C9.98029 3.36756 10.7082 3.25537 11.4246 3.34647C12.141 3.43757 12.8162 3.7282 13.3712 4.1843L13.2636 4.25305L9.21563 6.55305C9.11158 6.60765 9.02504 6.68981 8.96573 6.79029C8.90642 6.89076 8.87669 7.00557 8.87989 7.1218V12.7218ZM9.80476 10.753L11.9966 9.50305L14.1948 10.753V13.253L11.9966 14.503L9.79843 13.253L9.80476 10.753Z"></path>
                </mask>
                <path d="M20.6816 10.1843C20.9588 9.34066 21.0063 8.4399 20.8192 7.57245C20.6321 6.70499 20.217 5.90134 19.6157 5.24216C19.0143 4.58298 18.2478 4.09146 17.393 3.81692C16.5382 3.54238 15.6253 3.49449 14.7459 3.67805C14.1453 3.01747 13.379 2.52468 12.524 2.24931C11.669 1.97394 10.7555 1.92571 9.87559 2.10947C8.99568 2.29324 8.18039 2.70252 7.51181 3.29608C6.84323 3.88965 6.34499 4.64654 6.06725 5.49055C5.18642 5.67292 4.3699 6.08122 3.70003 6.67426C3.03017 7.26731 2.53064 8.02413 2.25182 8.86842C1.97299 9.71271 1.92474 10.6146 2.11192 11.4832C2.2991 12.3517 2.71509 13.1562 3.31795 13.8155C3.09309 14.4899 3.01633 15.2037 3.09278 15.9095C3.16924 16.6154 3.39716 17.2971 3.76139 17.9093C4.30169 18.8351 5.12567 19.568 6.11483 20.0027C7.104 20.4373 8.20738 20.5512 9.26631 20.328C9.74353 20.8568 10.3291 21.2796 10.9844 21.5684C11.6396 21.8571 12.3495 22.0053 13.0672 22.003C14.1516 22.003 15.2081 21.6635 16.0847 21.0334C16.9612 20.4034 17.6125 19.5152 17.9449 18.4968C18.649 18.3539 19.3141 18.0649 19.8962 17.6489C20.4784 17.233 20.9642 16.6997 21.3214 16.0843C21.8585 15.1598 22.0858 14.0915 21.9709 13.032C21.856 11.9724 21.4048 10.9758 20.6816 10.1843ZM13.0798 20.6968C12.191 20.6968 11.3302 20.3894 10.6473 19.828L10.7677 19.7593L14.8029 17.4593C14.9069 17.4047 14.9935 17.3225 15.0528 17.2221C15.1121 17.1216 15.1418 17.0068 15.1386 16.8905V11.2655L16.8427 12.2405C16.8517 12.2441 16.8594 12.2501 16.865 12.2579C16.8706 12.2656 16.8739 12.2748 16.8744 12.2843V16.9343C16.876 17.4289 16.7785 17.9189 16.5875 18.3761C16.3964 18.8333 16.1156 19.2488 15.7611 19.5985C15.4067 19.9482 14.9856 20.2253 14.5222 20.4138C14.0588 20.6023 13.5621 20.6984 13.0608 20.6968H13.0798ZM4.90165 17.2593C4.46164 16.5029 4.3026 15.6189 4.45188 14.7593L4.57224 14.828L8.60749 17.128C8.70379 17.1829 8.81303 17.2118 8.92423 17.2118C9.03543 17.2118 9.14467 17.1829 9.24097 17.128L14.1758 14.3218V16.253C14.1797 16.2608 14.1817 16.2694 14.1817 16.278C14.1817 16.2867 14.1797 16.2953 14.1758 16.303L10.0962 18.628C9.66403 18.8748 9.18685 19.0352 8.69188 19.0999C8.19692 19.1647 7.69387 19.1326 7.21148 19.0055C6.72909 18.8784 6.27681 18.6587 5.88048 18.3591C5.48415 18.0595 5.15154 17.6858 4.90165 17.2593ZM3.83741 8.5843C4.28764 7.82089 4.99655 7.23878 5.83919 6.94055V11.6718C5.83595 11.7857 5.86434 11.8983 5.92128 11.9975C5.97823 12.0966 6.06156 12.1785 6.16227 12.2343L11.0717 15.028L9.36766 16.003C9.34918 16.0092 9.32914 16.0092 9.31065 16.003L5.23106 13.678C4.36041 13.1812 3.72487 12.3642 3.46364 11.4059C3.20242 10.4476 3.33682 9.42624 3.83741 8.56555V8.5843ZM17.8563 11.7968L12.9278 8.9718L14.6319 8.00305C14.6403 7.99741 14.6502 7.99439 14.6604 7.99439C14.6705 7.99439 14.6805 7.99741 14.6889 8.00305L18.7685 10.328C19.3915 10.684 19.8992 11.2072 20.2325 11.8368C20.5659 12.4664 20.7111 13.1764 20.6514 13.8843C20.5916 14.5921 20.3294 15.2687 19.8951 15.8352C19.4608 16.4017 18.8724 16.8349 18.1983 17.0843V12.353C18.1946 12.2391 18.1612 12.1281 18.1013 12.0306C18.0414 11.9332 17.957 11.8527 17.8563 11.7968ZM19.554 9.2968L19.4336 9.2218L15.4047 6.9093C15.3047 6.84846 15.1896 6.81624 15.0721 6.81624C14.9547 6.81624 14.8395 6.84846 14.7396 6.9093L9.8111 9.71555V7.75305C9.8061 7.7445 9.80346 7.7348 9.80346 7.72492C9.80346 7.71505 9.8061 7.70535 9.8111 7.6968L13.897 5.37805C14.5222 5.02257 15.2371 4.85003 15.958 4.88059C16.6789 4.91115 17.3762 5.14356 17.9682 5.55064C18.5601 5.95772 19.0225 6.52265 19.301 7.17939C19.5796 7.83614 19.663 8.55755 19.5413 9.2593L19.554 9.2968ZM8.87989 12.7218L7.1695 11.753C7.15339 11.7405 7.1422 11.7228 7.13782 11.703V7.06555C7.13785 6.35289 7.34371 5.65499 7.73128 5.0536C8.11885 4.45222 8.67209 3.97224 9.32619 3.6699C9.98029 3.36756 10.7082 3.25537 11.4246 3.34647C12.141 3.43757 12.8162 3.7282 13.3712 4.1843L13.2636 4.25305L9.21563 6.55305C9.11158 6.60765 9.02504 6.68981 8.96573 6.79029C8.90642 6.89076 8.87669 7.00557 8.87989 7.1218V12.7218ZM9.80476 10.753L11.9966 9.50305L14.1948 10.753V13.253L11.9966 14.503L9.79843 13.253L9.80476 10.753Z" fill="#828282"></path>
                <path d="M20.6816 10.1843C20.9588 9.34066 21.0063 8.4399 20.8192 7.57245C20.6321 6.70499 20.217 5.90134 19.6157 5.24216C19.0143 4.58298 18.2478 4.09146 17.393 3.81692C16.5382 3.54238 15.6253 3.49449 14.7459 3.67805C14.1453 3.01747 13.379 2.52468 12.524 2.24931C11.669 1.97394 10.7555 1.92571 9.87559 2.10947C8.99568 2.29324 8.18039 2.70252 7.51181 3.29608C6.84323 3.88965 6.34499 4.64654 6.06725 5.49055C5.18642 5.67292 4.3699 6.08122 3.70003 6.67426C3.03017 7.26731 2.53064 8.02413 2.25182 8.86842C1.97299 9.71271 1.92474 10.6146 2.11192 11.4832C2.2991 12.3517 2.71509 13.1562 3.31795 13.8155C3.09309 14.4899 3.01633 15.2037 3.09278 15.9095C3.16924 16.6154 3.39716 17.2971 3.76139 17.9093C4.30169 18.8351 5.12567 19.568 6.11483 20.0027C7.104 20.4373 8.20738 20.5512 9.26631 20.328C9.74353 20.8568 10.3291 21.2796 10.9844 21.5684C11.6396 21.8571 12.3495 22.0053 13.0672 22.003C14.1516 22.003 15.2081 21.6635 16.0847 21.0334C16.9612 20.4034 17.6125 19.5152 17.9449 18.4968C18.649 18.3539 19.3141 18.0649 19.8962 17.6489C20.4784 17.233 20.9642 16.6997 21.3214 16.0843C21.8585 15.1598 22.0858 14.0915 21.9709 13.032C21.856 11.9724 21.4048 10.9758 20.6816 10.1843ZM13.0798 20.6968C12.191 20.6968 11.3302 20.3894 10.6473 19.828L10.7677 19.7593L14.8029 17.4593C14.9069 17.4047 14.9935 17.3225 15.0528 17.2221C15.1121 17.1216 15.1418 17.0068 15.1386 16.8905V11.2655L16.8427 12.2405C16.8517 12.2441 16.8594 12.2501 16.865 12.2579C16.8706 12.2656 16.8739 12.2748 16.8744 12.2843V16.9343C16.876 17.4289 16.7785 17.9189 16.5875 18.3761C16.3964 18.8333 16.1156 19.2488 15.7611 19.5985C15.4067 19.9482 14.9856 20.2253 14.5222 20.4138C14.0588 20.6023 13.5621 20.6984 13.0608 20.6968H13.0798ZM4.90165 17.2593C4.46164 16.5029 4.3026 15.6189 4.45188 14.7593L4.57224 14.828L8.60749 17.128C8.70379 17.1829 8.81303 17.2118 8.92423 17.2118C9.03543 17.2118 9.14467 17.1829 9.24097 17.128L14.1758 14.3218V16.253C14.1797 16.2608 14.1817 16.2694 14.1817 16.278C14.1817 16.2867 14.1797 16.2953 14.1758 16.303L10.0962 18.628C9.66403 18.8748 9.18685 19.0352 8.69188 19.0999C8.19692 19.1647 7.69387 19.1326 7.21148 19.0055C6.72909 18.8784 6.27681 18.6587 5.88048 18.3591C5.48415 18.0595 5.15154 17.6858 4.90165 17.2593ZM3.83741 8.5843C4.28764 7.82089 4.99655 7.23878 5.83919 6.94055V11.6718C5.83595 11.7857 5.86434 11.8983 5.92128 11.9975C5.97823 12.0966 6.06156 12.1785 6.16227 12.2343L11.0717 15.028L9.36766 16.003C9.34918 16.0092 9.32914 16.0092 9.31065 16.003L5.23106 13.678C4.36041 13.1812 3.72487 12.3642 3.46364 11.4059C3.20242 10.4476 3.33682 9.42624 3.83741 8.56555V8.5843ZM17.8563 11.7968L12.9278 8.9718L14.6319 8.00305C14.6403 7.99741 14.6502 7.99439 14.6604 7.99439C14.6705 7.99439 14.6805 7.99741 14.6889 8.00305L18.7685 10.328C19.3915 10.684 19.8992 11.2072 20.2325 11.8368C20.5659 12.4664 20.7111 13.1764 20.6514 13.8843C20.5916 14.5921 20.3294 15.2687 19.8951 15.8352C19.4608 16.4017 18.8724 16.8349 18.1983 17.0843V12.353C18.1946 12.2391 18.1612 12.1281 18.1013 12.0306C18.0414 11.9332 17.957 11.8527 17.8563 11.7968ZM19.554 9.2968L19.4336 9.2218L15.4047 6.9093C15.3047 6.84846 15.1896 6.81624 15.0721 6.81624C14.9547 6.81624 14.8395 6.84846 14.7396 6.9093L9.8111 9.71555V7.75305C9.8061 7.7445 9.80346 7.7348 9.80346 7.72492C9.80346 7.71505 9.8061 7.70535 9.8111 7.6968L13.897 5.37805C14.5222 5.02257 15.2371 4.85003 15.958 4.88059C16.6789 4.91115 17.3762 5.14356 17.9682 5.55064C18.5601 5.95772 19.0225 6.52265 19.301 7.17939C19.5796 7.83614 19.663 8.55755 19.5413 9.2593L19.554 9.2968ZM8.87989 12.7218L7.1695 11.753C7.15339 11.7405 7.1422 11.7228 7.13782 11.703V7.06555C7.13785 6.35289 7.34371 5.65499 7.73128 5.0536C8.11885 4.45222 8.67209 3.97224 9.32619 3.6699C9.98029 3.36756 10.7082 3.25537 11.4246 3.34647C12.141 3.43757 12.8162 3.7282 13.3712 4.1843L13.2636 4.25305L9.21563 6.55305C9.11158 6.60765 9.02504 6.68981 8.96573 6.79029C8.90642 6.89076 8.87669 7.00557 8.87989 7.1218V12.7218ZM9.80476 10.753L11.9966 9.50305L14.1948 10.753V13.253L11.9966 14.503L9.79843 13.253L9.80476 10.753Z" stroke="#828282" stroke-width="0.2" mask="url(#path-1-outside-1_3606_3145)"></path>
            </svg></div>
        <div id="yt_article_summary_close_button" class="yt_article_summary_close_button">×</div>
    </div>

	</body></html>