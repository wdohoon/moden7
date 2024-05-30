<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 테마 head.sub.php 파일
if(!defined('G5_IS_ADMIN') && defined('G5_THEME_PATH') && is_file(G5_THEME_PATH.'/head.sub.php')) {
    require_once(G5_THEME_PATH.'/head.sub.php');
    return;
}

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    // 상태바에 표시될 제목
    $g5_head_title = implode(' | ', array_filter(array($g5['title'], $config['cf_title'])));
}

$g5['title'] = strip_tags($g5['title']);
$g5_head_title = strip_tags($g5_head_title);

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/


?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
<meta name="naver-site-verification" content="46878d33ad43339c7dd33add7ee0dd642a3c59d3" />
<?php
if (G5_IS_MOBILE) {
    echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10">'.PHP_EOL;
    echo '<meta name="HandheldFriendly" content="true">'.PHP_EOL;
    echo '<meta name="format-detection" content="telephone=no">'.PHP_EOL;
} else {
    echo '<meta name="viewport" content="width=device-width,initial-scale=1.0">'.PHP_EOL;
    echo '<meta http-equiv="imagetoolbar" content="no">'.PHP_EOL;
    echo '<meta http-equiv="X-UA-Compatible" content="IE=Edge">'.PHP_EOL;
}

if($config['cf_add_meta'])
    echo $config['cf_add_meta'].PHP_EOL;
?>
<title><?php echo $g5_head_title; ?></title>
<?php
if (defined('G5_IS_ADMIN')) {
    if(!defined('_THEME_PREVIEW_'))
        echo '<link rel="stylesheet" href="'.run_replace('head_css_url', G5_ADMIN_URL.'/css/admin.css?ver='.G5_CSS_VER, G5_URL).'">'.PHP_EOL;
} else {
    $shop_css = '';
    if (defined('_SHOP_')) $shop_css = '_shop';
    echo '<link rel="stylesheet" href="'.run_replace('head_css_url', G5_CSS_URL.'/'.(G5_IS_MOBILE?'mobile':'default').$shop_css.'.css?ver='.G5_CSS_VER, G5_URL).'">'.PHP_EOL;
}
?>
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
<?php if(defined('G5_USE_SHOP') && G5_USE_SHOP) { ?>
var g5_shop_url = "<?php echo G5_SHOP_URL; ?>";
<?php } ?>
<?php if(defined('G5_IS_ADMIN')) { ?>
var g5_admin_url = "<?php echo G5_ADMIN_URL; ?>";
<?php } ?>
</script>
<?php
add_javascript('<script src="'.G5_JS_URL.'/jquery-1.12.4.min.js"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery-migrate-1.4.1.min.js"></script>', 0);
if (defined('_SHOP_')) {
    if(!G5_IS_MOBILE) {
        add_javascript('<script src="'.G5_JS_URL.'/jquery.shop.menu.js?ver='.G5_JS_VER.'"></script>', 0);
    }
} else {
    add_javascript('<script src="'.G5_JS_URL.'/jquery.menu.js?ver='.G5_JS_VER.'"></script>', 0);
}
add_javascript('<script src="'.G5_JS_URL.'/common.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/wrest.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/placeholders.min.js"></script>', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/font-awesome/css/font-awesome.min.css">', 0);

if(G5_IS_MOBILE) {
    add_javascript('<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>', 1); // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN'))
    echo $config['cf_add_script'];
?>
<meta name='robots' content='max-image-preview:large' />
<meta name="framework" content="weLaunch 4.1.24" />
<meta property="og:type" content=" website ">
<meta property="og:url" content="https://reepotlaser.com/">
<meta property="og:image" content="/wp-content/uploads/2023/08/og-images.png">
<title>함께 라면 당신은 언제나 Agewell ㆍFeelwellㆍ Bewell</title>
<meta name="description" content="쿨링 방식의 VSLS® 기술을 3가지 모드로 안전하고 섬세하게">
<meta property="og:title" content="처음 만나는 설렘, 리팟">
<meta property="og:description" content="쿨링 방식의 VSLS® 기술을 3가지 모드로 안전하고 섬세하게">
<link rel="icon" href="https://reepotlaser.com/wp-content/uploads/2022/08/apple-icon-120x120-1.png" sizes="32x32" />
<link rel="icon" href="https://reepotlaser.com/wp-content/uploads/2022/08/apple-icon-120x120-1.png" sizes="192x192" />
<link rel="apple-touch-icon" href="https://reepotlaser.com/wp-content/uploads/2022/08/apple-icon-120x120-1.png" />
<meta name="msapplication-TileImage" content="https://reepotlaser.com/wp-content/uploads/2022/08/apple-icon-120x120-1.png" />
<meta name="naver-site-verification" content="46878d33ad43339c7dd33add7ee0dd642a3c59d3" />
<!-- common js -->
<script src="/js/jquery.min.js"></script>
<script src="/js/browser-polyfill.min.js"></script>
<script src="/js/commonUI.js"></script>
<script src="/js/default.js"></script>
<script src="/js/hoverintent-js.min.js"></script>
<script src="/js/imagesloaded.min.js"></script>
<script src="/js/underscore.min.js"></script>
<script src="/js/wp-emoji-release.min.js"></script>
<script src="/js/backbone.min.js"></script>
<script src="/js/wp_swiper.js"></script>
<script>
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/reepotlaser.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.3.1"}};
/*! This file is auto-generated */
!function(i,n){var o,s,e;function c(e){try{var t={supportTests:e,timestamp:(new Date).valueOf()};sessionStorage.setItem(o,JSON.stringify(t))}catch(e){}}function p(e,t,n){e.clearRect(0,0,e.canvas.width,e.canvas.height),e.fillText(t,0,0);var t=new Uint32Array(e.getImageData(0,0,e.canvas.width,e.canvas.height).data),r=(e.clearRect(0,0,e.canvas.width,e.canvas.height),e.fillText(n,0,0),new Uint32Array(e.getImageData(0,0,e.canvas.width,e.canvas.height).data));return t.every(function(e,t){return e===r[t]})}function u(e,t,n){switch(t){case"flag":return n(e,"\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f","\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f")?!1:!n(e,"\ud83c\uddfa\ud83c\uddf3","\ud83c\uddfa\u200b\ud83c\uddf3")&&!n(e,"\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f","\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");case"emoji":return!n(e,"\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff","\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff")}return!1}function f(e,t,n){var r="undefined"!=typeof WorkerGlobalScope&&self instanceof WorkerGlobalScope?new OffscreenCanvas(300,150):i.createElement("canvas"),a=r.getContext("2d",{willReadFrequently:!0}),o=(a.textBaseline="top",a.font="600 32px Arial",{});return e.forEach(function(e){o[e]=t(a,e,n)}),o}function t(e){var t=i.createElement("script");t.src=e,t.defer=!0,i.head.appendChild(t)}"undefined"!=typeof Promise&&(o="wpEmojiSettingsSupports",s=["flag","emoji"],n.supports={everything:!0,everythingExceptFlag:!0},e=new Promise(function(e){i.addEventListener("DOMContentLoaded",e,{once:!0})}),new Promise(function(t){var n=function(){try{var e=JSON.parse(sessionStorage.getItem(o));if("object"==typeof e&&"number"==typeof e.timestamp&&(new Date).valueOf()<e.timestamp+604800&&"object"==typeof e.supportTests)return e.supportTests}catch(e){}return null}();if(!n){if("undefined"!=typeof Worker&&"undefined"!=typeof OffscreenCanvas&&"undefined"!=typeof URL&&URL.createObjectURL&&"undefined"!=typeof Blob)try{var e="postMessage("+f.toString()+"("+[JSON.stringify(s),u.toString(),p.toString()].join(",")+"));",r=new Blob([e],{type:"text/javascript"}),a=new Worker(URL.createObjectURL(r),{name:"wpTestEmojiSupports"});return void(a.onmessage=function(e){c(n=e.data),a.terminate(),t(n)})}catch(e){}c(n=f(s,u,p))}t(n)}).then(function(e){for(var t in e)n.supports[t]=e[t],n.supports.everything=n.supports.everything&&n.supports[t],"flag"!==t&&(n.supports.everythingExceptFlag=n.supports.everythingExceptFlag&&n.supports[t]);n.supports.everythingExceptFlag=n.supports.everythingExceptFlag&&!n.supports.flag,n.DOMReady=!1,n.readyCallback=function(){n.DOMReady=!0}}).then(function(){return e}).then(function(){var e;n.supports.everything||(n.readyCallback(),(e=n.source||{}).concatemoji?t(e.concatemoji):e.wpemoji&&e.twemoji&&(t(e.twemoji),t(e.wpemoji)))}))}((window,document),window._wpemojiSettings);
</script>

<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-243501603-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-243501603-1');
  gtag('config', 'G-PYVX8RHEXG');
</script>
<script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-PYVX8RHEXG&amp;l=dataLayer&amp;cx=c"></script>
<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
<script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-1SCV1340FS&amp;l=dataLayer&amp;cx=c"></script>
<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
<script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-1SCV1340FS&amp;l=dataLayer&amp;cx=c"></script>

<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/54/6/intl/ko_ALL/common.js"></script>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/54/6/intl/ko_ALL/util.js"></script>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/54/6/intl/ko_ALL/geocoder.js"></script>




<script id="wp-i18n-js-after">
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
</script>
<script type='text/javascript' src='https://reepotlaser.com/wp-content/plugins/elementor-pro/assets/js/notes/notes.min.js?ver=3.7.3' id='elementor-pro-notes-js'></script>
<script id="elementor-pro-notes-app-initiator-js-before">
var elementorNotesConfig = {"route":{"title":"Home page","url":"\/?p=13","note_url_pattern":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-pro-notes-proxy&note-id={{NOTE_ID}}","post_id":13,"is_elementor_library":false},"direction":"ltr","is_debug":false,"current_user_can":{"create":true,"create_users":true},"urls":{"admin_url_create_user":"https:\/\/reepotlaser.com\/wp-admin\/user-new.php","avatar_defaults":{"24":"https:\/\/secure.gravatar.com\/avatar\/?s=24&d=mm&r=g","48":"https:\/\/secure.gravatar.com\/avatar\/?s=48&d=mm&r=g","96":"https:\/\/secure.gravatar.com\/avatar\/?s=96&d=mm&r=g"}}};
</script>
<script type='text/javascript' id='pa-admin-bar-js-extra'>
/* <![CDATA[ */
var PaDynamicAssets = {"nonce":"12ac4a5b19","post_id":"13","ajaxurl":"https:\/\/reepotlaser.com\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<script type='text/javascript' id='astra-addon-js-js-extra'>
/* <![CDATA[ */
var astraAddon = {"sticky_active":"","svgIconClose":"<span class=\"ast-icon icon-close\"><svg viewBox=\"0 0 512 512\" aria-hidden=\"true\" role=\"img\" version=\"1.1\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\" xmlns:xlink=\"http:\/\/www.w3.org\/1999\/xlink\" width=\"18px\" height=\"18px\">\n                                <path d=\"M71.029 71.029c9.373-9.372 24.569-9.372 33.942 0L256 222.059l151.029-151.03c9.373-9.372 24.569-9.372 33.942 0 9.372 9.373 9.372 24.569 0 33.942L289.941 256l151.03 151.029c9.372 9.373 9.372 24.569 0 33.942-9.373 9.372-24.569 9.372-33.942 0L256 289.941l-151.029 151.03c-9.373 9.372-24.569 9.372-33.942 0-9.372-9.373-9.372-24.569 0-33.942L222.059 256 71.029 104.971c-9.372-9.373-9.372-24.569 0-33.942z\" \/>\n                            <\/svg><\/span>","header_main_stick":"0","header_above_stick":"0","header_below_stick":"0","stick_header_meta":"","header_main_stick_meta":"","header_above_stick_meta":"","header_below_stick_meta":"","sticky_header_on_devices":"desktop","sticky_header_style":"none","sticky_hide_on_scroll":"0","break_point":"921","tablet_break_point":"921","mobile_break_point":"544","header_main_shrink":"1","header_logo_width":"","responsive_header_logo_width":{"desktop":160,"tablet":151,"mobile":102},"stick_origin_position":"","site_layout":"ast-full-width-layout","site_content_width":"1560","site_layout_padded_width":"1200","site_layout_box_width":"1200","header_builder_active":"1","component_limit":"10","is_header_builder_active":"1"};
/* ]]> */
</script>
<script type='text/javascript' id='jet-menu-public-scripts-js-extra'>
/* <![CDATA[ */
var jetMenuPublicSettings = {"version":"2.1.7","ajaxUrl":"https:\/\/reepotlaser.com\/wp-admin\/admin-ajax.php","isMobile":"false","templateApiUrl":"https:\/\/reepotlaser.com\/wp-json\/jet-menu-api\/v1\/elementor-template","menuItemsApiUrl":"https:\/\/reepotlaser.com\/wp-json\/jet-menu-api\/v1\/get-menu-items","restNonce":"6dbc01a063","devMode":"true","wpmlLanguageCode":"","menuSettings":{"jetMenuRollUp":"true","jetMenuMouseleaveDelay":500,"jetMenuMegaWidthType":"container","jetMenuMegaWidthSelector":"","jetMenuMegaOpenSubType":"hover","jetMenuMegaAjax":"false"}};
/* ]]> */
</script>
<script type='text/javascript' src='https://reepotlaser.com/wp-content/plugins/jet-menu/assets/public/js/legacy/jet-menu-public-scripts.js?ver=2.1.7' id='jet-menu-public-scripts-js'></script>
<script id="jet-menu-public-scripts-js-after">
function CxCSSCollector(){"use strict";var t,e=window.CxCollectedCSS;void 0!==e&&((t=document.createElement("style")).setAttribute("title",e.title),t.setAttribute("type",e.type),t.textContent=e.css,document.head.appendChild(t))}CxCSSCollector();
</script>
<script type='text/javascript' id='cffscripts-js-extra'>
/* <![CDATA[ */
var cffOptions = {"placeholder":"https:\/\/reepotlaser.com\/wp-content\/plugins\/custom-facebook-feed\/assets\/img\/placeholder.png"};
/* ]]> */
</script>
<script type='text/javascript' id='wp-api-request-js-extra'>
/* <![CDATA[ */
var wpApiSettings = {"root":"https:\/\/reepotlaser.com\/wp-json\/","nonce":"6dbc01a063","versionString":"wp\/v2\/"};
/* ]]> */
</script>
<script type='text/javascript' id='elementor-common-js-translations'>
( function( domain, translations ) {
	var localeData = translations.locale_data[ domain ] || translations.locale_data.messages;
	localeData[""].domain = domain;
	wp.i18n.setLocaleData( localeData, domain );
} )( "elementor", {"translation-revision-date":"2021-12-16 13:21:38+0000","generator":"GlotPress\/4.0.0-alpha.1","domain":"messages","locale_data":{"messages":{"":{"domain":"messages","plural-forms":"nplurals=1; plural=0;","lang":"ko_KR"},"Unable to connect":["\uc5f0\uacb0\ud560 \uc218 \uc5c6\uc74c"],"Finder":["\ud30c\uc778\ub354"],"Enable":["\uc0ac\uc6a9"]}},"comment":{"reference":"assets\/js\/common.js"}} );
</script>
<script id="elementor-common-js-before">
var elementorCommonConfig = {"version":"3.6.8","isRTL":false,"isDebug":false,"isElementorDebug":false,"activeModules":["ajax","finder","connect","event-tracker"],"experimentalFeatures":{"e_dom_optimization":true,"e_optimized_assets_loading":true,"e_optimized_css_loading":true,"a11y_improvements":true,"e_import_export":true,"additional_custom_breakpoints":true,"e_hidden_wordpress_widgets":true,"theme_builder_v2":true,"landing-pages":true,"elements-color-picker":true,"favorite-widgets":true,"admin-top-bar":true,"page-transitions":true,"notes":true,"form-submissions":true,"e_scroll_snap":true},"urls":{"assets":"https:\/\/reepotlaser.com\/wp-content\/plugins\/elementor\/assets\/","rest":"https:\/\/reepotlaser.com\/wp-json\/"},"filesUpload":{"unfilteredFiles":false},"library_connect":{"is_connected":true,"subscription_plans":{"0":{"label":null,"promotion_url":null,"color":null},"1":{"label":"Pro","promotion_url":"https:\/\/elementor.com\/pro\/?utm_source=template-library&utm_medium=wp-dash&utm_campaign=gopro","color":"#92003B"},"20":{"label":"Expert","promotion_url":"https:\/\/elementor.com\/pro\/?utm_source=template-library&utm_medium=wp-dash&utm_campaign=goexpert","color":"#010051"}},"base_access_level":0,"current_access_level":0},"ajax":{"url":"https:\/\/reepotlaser.com\/wp-admin\/admin-ajax.php","nonce":"49d6218c5f"},"finder":{"data":{"edit":{"title":"\ud3b8\uc9d1","dynamic":true,"name":"edit"},"general":{"title":"\uc77c\ubc18","dynamic":false,"items":{"saved-templates":{"title":"\uc800\uc7a5\ub41c \ud15c\ud50c\ub9bf","icon":"library-save","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?post_type=elementor_library&tabs_group=library","keywords":["template","section","page","library"]},"system-info":{"title":"\uc2dc\uc2a4\ud15c \uc815\ubcf4","icon":"info-circle-o","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-system-info","keywords":["system","info","environment","elementor"]},"role-manager":{"title":"\uc5ed\ud560 \uad00\ub9ac\uc790","icon":"person","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-role-manager","keywords":["role","manager","user","elementor"]},"knowledge-base":{"title":"\uc9c0\uc2dd \ubca0\uc774\uc2a4","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=go_knowledge_base_site","keywords":["help","knowledge","docs","elementor"]},"theme-builder":{"title":"\ud14c\ub9c8 \ube4c\ub354","icon":"library-save","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-app&ver=3.6.8#\/site-editor","keywords":["template","header","footer","single","archive","search","404","library"]},"kit-library":{"title":"Kit Library","icon":"kit-parts","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-app&ver=3.6.8#\/kit-library","keywords":["kit library","kit","library","site parts","parts","assets","templates"]},"popups":{"title":"Popups","icon":"library-save","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?post_type=elementor_library&tabs_group=popup&elementor_library_type=popup","keywords":["template","popup","library"]}},"name":"general"},"create":{"title":"\ub9cc\ub4e4\uae30","dynamic":false,"items":{"page":{"title":"Add New Page Template","icon":"plus-circle-o","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?action=elementor_new_post&post_type=elementor_library&template_type=page&_wpnonce=4299f7a047","keywords":["Add New Page Template","post","page","template","new","create"]},"wp-post":{"title":"\uc0c8 \uae00 \ucd94\uac00","icon":"plus-circle-o","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?action=elementor_new_post&post_type=post&template_type=wp-post&_wpnonce=4299f7a047","keywords":["\uc0c8 \uae00 \ucd94\uac00","post","page","template","new","create"]},"wp-page":{"title":"\uc0c8 \ud398\uc774\uc9c0 \ucd94\uac00","icon":"plus-circle-o","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?action=elementor_new_post&post_type=page&template_type=wp-page&_wpnonce=4299f7a047","keywords":["\uc0c8 \ud398\uc774\uc9c0 \ucd94\uac00","post","page","template","new","create"]},"landing-page":{"title":"\uc0c8 Landing Page \ucd94\uac00","icon":"plus-circle-o","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?action=elementor_new_post&post_type=e-landing-page&template_type=landing-page&_wpnonce=4299f7a047#library","keywords":["\uc0c8 Landing Page \ucd94\uac00","post","page","template","new","create"]},"jet-menu":{"title":"\uc0c8 Mega Menu Item \ucd94\uac00","icon":"plus-circle-o","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?action=elementor_new_post&post_type=jet-menu&_wpnonce=4299f7a047","keywords":["\uc0c8 Mega Menu Item \ucd94\uac00","post","page","template","new","create"]},"astra-advanced-hook":{"title":"\uc0c8 Custom Layout \ucd94\uac00","icon":"plus-circle-o","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?action=elementor_new_post&post_type=astra-advanced-hook&_wpnonce=4299f7a047","keywords":["\uc0c8 Custom Layout \ucd94\uac00","post","page","template","new","create"]},"popups":{"title":"Add New Popup","icon":"plus-circle-o","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?post_type=elementor_library&tabs_group=popup&elementor_library_type=popup#add_new","keywords":["template","theme","popup","new","create"]},"theme-template":{"title":"Add New Theme Template","icon":"plus-circle-o","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-app&ver=3.6.8#\/site-editor\/add-new","keywords":["template","theme","new","create"]}},"name":"create"},"site":{"title":"\uc0ac\uc774\ud2b8","dynamic":false,"items":{"homepage":{"title":"\ud648\ud398\uc774\uc9c0","url":"https:\/\/reepotlaser.com","icon":"home-heart","keywords":["home","page"]},"wordpress-dashboard":{"title":"\uc54c\ub9bc\ud310","icon":"dashboard","url":"https:\/\/reepotlaser.com\/wp-admin\/","keywords":["dashboard","wordpress"]},"wordpress-menus":{"title":"\uba54\ub274","icon":"wordpress","url":"https:\/\/reepotlaser.com\/wp-admin\/nav-menus.php","keywords":["menu","wordpress"]},"wordpress-themes":{"title":"\ud14c\ub9c8","icon":"wordpress","url":"https:\/\/reepotlaser.com\/wp-admin\/themes.php","keywords":["themes","wordpress"]},"wordpress-customizer":{"title":"\uc0ac\uc6a9\uc790 \uc815\uc758 \ud558\uae30","icon":"wordpress","url":"https:\/\/reepotlaser.com\/wp-admin\/customize.php","keywords":["customizer","wordpress"]},"wordpress-plugins":{"title":"\ud50c\ub7ec\uadf8\uc778","icon":"wordpress","url":"https:\/\/reepotlaser.com\/wp-admin\/plugins.php","keywords":["plugins","wordpress"]},"wordpress-users":{"title":"\uc0ac\uc6a9\uc790","icon":"wordpress","url":"https:\/\/reepotlaser.com\/wp-admin\/users.php","keywords":["users","profile","wordpress"]}},"name":"site"},"settings":{"title":"\uc124\uc815","dynamic":false,"items":{"general-settings":{"title":"\uc77c\ubc18 \uc124\uc815","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor","keywords":["general","settings","elementor"]},"advanced":{"title":"\uace0\uae09","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor#tab-advanced","keywords":["advanced","settings","elementor"]},"experiments":{"title":"Experiments","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor#tab-experiments","keywords":["settings","elementor","experiments"]},"custom-fonts":{"title":"Custom Fonts","icon":"typography","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?post_type=elementor_font","keywords":["custom","fonts","elementor"]},"custom-icons":{"title":"Custom Icons","icon":"favorite","url":"https:\/\/reepotlaser.com\/wp-admin\/edit.php?post_type=elementor_icons","keywords":["custom","icons","elementor"]}},"name":"settings"},"tools":{"title":"\ub3c4\uad6c","dynamic":false,"items":{"tools":{"title":"\ub3c4\uad6c","icon":"tools","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-tools","keywords":["tools","regenerate css","safe mode","debug bar","sync library","elementor"]},"replace-url":{"title":"URL \ubc14\uafb8\uae30","icon":"tools","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-tools#tab-replace_url","keywords":["tools","replace url","domain","elementor"]},"maintenance-mode":{"title":"\uc720\uc9c0 \uad00\ub9ac \ubaa8\ub4dc","icon":"tools","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-tools#tab-maintenance_mode","keywords":["tools","maintenance","coming soon","elementor"]},"import-export":{"title":"Import Export","icon":"import-export","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-tools#tab-import-export-kit","keywords":["tools","import export","import","export","kit"]},"version-control":{"title":"\ubc84\uc804 \uad00\ub9ac","icon":"time-line","url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-tools#tab-versions","keywords":["tools","version","control","rollback","beta","elementor"]}},"name":"tools"}}},"connect":[],"event-tracker":{"isUserDataShared":true}};
</script>
<script id="elementor-app-loader-js-before">
var elementorAppConfig = {"menu_url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-app&ver=3.6.8#\/site-editor","assets_url":"https:\/\/reepotlaser.com\/wp-content\/plugins\/elementor\/assets\/","return_url":"https:\/\/reepotlaser.com\/wp-admin\/","hasPro":true,"admin_url":"https:\/\/reepotlaser.com\/wp-admin\/","login_url":"https:\/\/reepotlaser.com\/wp-login.php","base_url":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-app&ver=3.6.8","site-editor":[],"import-export":[],"kit-library":[],"onboarding":[]};
</script>
<script type='text/javascript' id='wordpress-store-locator-public-js-extra'>
/* <![CDATA[ */
var store_locator_options = {"last_tab":"","enable":"1","apiKey":"AIzaSyANJ_P0Wh6SBwE7cm4N5F9ESbL8VXoaroo","buttonModalTitle":"\ubcd1\uc6d0\ucc3e\uae30","excel2007":"0","layout":"2","advancedLayout":"0","searchBoxColumns":"6","resultListColumns":"3","mapColumns":"9","mapEnabled":"1","mapAutoHeight":"1","mapHeight":"400","mapFullHeight":"0","mapDistanceUnit":"km","mapDefaultLat":"37.5165476","mapDefaultLng":"127.0369984","mapDefaultType":"ROADMAP","mapDefaultZoom":"9","mapRadiusSteps":"1,5,10,25,50","mapRadius":"5","mapDrawRadiusCircle":"0","mapDrawRadiusCircleFillColor":"#004DE8","mapDrawRadiusCircleFillOpacity":"27","mapDrawRadiusCircleStrokeColor":"#004DE8","mapDrawRadiusCircleStrokeOpacity":"62","mapRadiusToZoom":"1","mapExtendRadius":"0","mapPanToOnHover":"0","mapMarkerClusterer":"0","mapMarkerClustererMaxZoom":"-1","mapMarkerClustererSize":"-1","mapDefaultIcon":"https:\/\/maps.google.com\/mapfiles\/marker_grey.png","mapDefaultIconHover":"https:\/\/maps.google.com\/mapfiles\/ms\/icons\/blue-dot.png","mapDefaultUserIcon":"https:\/\/demos.welaunch.io\/wordpress-store-locator\/wp-content\/uploads\/sites\/11\/2021\/03\/home2.png","mapDisablePanControl":"0","mapDisableZoomControl":"0","mapDisableScaleControl":"0","mapDisableStreetViewControl":"0","mapDisableFullscreenControl":"0","mapDisableMapTypeControl":"0","mapStyling":"","infowindowEnabled":"1","infowindowCheckClosed":"1","infowindowOpenOnMouseover":"1","infowindowLinkAction":"storepage","infowindowLinkActionNewTab":"0","infowwindowWidth":"350","infowindowDetailsColumns":"12","infowindowImageColumns":"6","infowindowOpeningHoursColumns":"6","resultListEnabled":"1","resultListItemColumns":"12","resultListItemLayout":"oneColumn","resultListOrder":"distance","resultListOrderAllStores":"distance","resultListScrollTo":"0","resultListAllHideDistance":"0","resultListShowTitle":"0","resultListShowTitleText":"Results","resultListFilterOpen":"1","resultListAutoHeight":"1","resultListHover":"1","resultListNoResultsText":"\uac80\uc0c9\ub41c \ubcd1\uc6d0\uc774 \uc5c6\uc2b5\ub2c8\ub2e4.","resultListMax":"100","resultListMin":"0","resultListLinkAction":"storepage","resultListLinkActionNewTab":"0","resultListIconEnabled":"0","resultListIcon":"fas fa-map-marker","resultListIconSize":"fa-3x","resultListIconColor":"#000000","resultListPremiumIconEnabled":"1","resultListPremiumIcon":"fas fa-star","resultListPremiumIconSize":"fa-3x","resultListPremiumIconColor":"#FFFF00","searchColumns":"oneColumn","searchBoxFields":{"enabled":{"placebo":"placebo","search_title":"Title & Active Filter","store_name_search":"Store Name Search","address_field":"Address Field","filter":"Filters","search_button":"Search Button"},"disabled":{"placebo":"placebo","along_route":"Along Route"}},"searchBoxAddressBelowFields":{"enabled":{"placebo":"placebo","my_position":"My Position","reset_filters":"Reset Filters","all_stores":"Get All Stores"},"disabled":{"placebo":"placebo"}},"searchBoxEmptyAddressByDefault":"0","searchBoxAutolocate":"1","searchBoxAutolocateIP":"1","searchBoxSaveAutolocate":"1","searchBoxAutolocateShowAlert":"1","searchBoxAutocomplete":"1","searchBoxAutocompleteFirstResultOnEnter":"1","autocompleteType":"geocode","autocompleteCountryRestrict":"","searchBoxAddressText":"\uc8fc\uc18c","searchBoxAddressPlaceholder":"\uc8fc\uc18c\ub97c \uc785\ub825\ud558\uc138\uc694","searchBoxStoreNameSearchText":"\ubcd1\uc6d0\uc774\ub984","searchBoxStoreNameSearchPlaceholder":"\ubcd1\uc6d0\uc774\ub984\uc744 \uc785\ub825\ud558\uc138\uc694","searchBoxAlongRouteTitle":"Search Along Route","searchBoxAlongRouteButtonText":"\uac80\uc0c9","searchBoxAlongRouteRadius":"2","searchBoxAlongRouteWaypointsInterval":"15","searchBoxGetMyPositionText":"\ub0b4\uc704\uce58","searchBoxResetFiltersText":"\ucd08\uae30\ud654","searchButtonText":"\uac80\uc0c9\ud558\uae30","searchBoxShowShowAllStoresKeepFilter":"0","searchBoxShowShowAllStoresText":"\ubaa8\ub4e0\ubcd1\uc6d0\ubcf4\uae30","searchBoxShowShowAllStoresZoom":"10","searchBoxShowShowAllStoresLat":"37.5165476","searchBoxShowShowAllStoresLng":"127.0369984","filterColumns":"oneColumn","filterFields":{"enabled":{"placebo":"placebo","radius_filter":"Radius Filter","store_categories":"Store Categories","store_filter":"Store filter"},"disabled":{"placebo":"placebo","online_offline":"Online \/ Offline Stores"}},"searchBoxShowFilterOpen":"1","searchBoxDefaultCategory":"","showFilterCategoriesAsImage":"1","searchBoxShowRadius":"1","searchBoxShowFilter":"1","searchBoxCategoriesText":"\uce74\ud14c\uace0\ub9ac","searchBoxRadiusText":"\ubc18\uacbd","storeFilterColumns":"oneColumn","showStoreFilterTitle":"0","onlineOfflineAllText":"All","onlineStoreText":"Online Store","offlineStoreText":"Local Retailer","onlineOfflineZoom":"4","onlineOfflineLat":"52.520008","onlineOfflineLng":"13.404954","loadingIcon":"fas fa-spinner","loadingAnimation":"fa-spin","loadingIconSize":"fa-3x","loadingIconColor":"#000000","loadingOverlayColor":"#FFFFFF","loadingOverlayTransparency":"0.8","showName":"1","showRating":"1","showRatingLinkToForm":"1","showExcerpt":"1","showDescription":"1","showDescriptionStripShortcodes":"0","showDescriptionVisualComposer":"1","showStreet":"1","showZip":"1","showCity":"1","showRegion":"1","showCountry":"1","showAddressStyle":"","showCustomMetaFieldAfterAddress":"","showWebsite":"1","showWebsiteText":"\ud648\ud398\uc774\uc9c0","showEmail":"1","showEmailText":"\uc774\uba54\uc77c","showEmailPlaceholder":"0","showTelephone":"1","showTelephoneText":"\uc804\ud654","showMobile":"0","showMobileText":"Mobile","showFax":"0","showFaxText":"Fax","showDistance":"0","showDistanceText":"Distance","showStoreCategories":"0","showStoreFilter":"0","showContactStoreText":"\ubc29\ubb38","showGetDirection":"1","showGetDirectionText":"\uae38\ucc3e\uae30","showChooseInventory":"0","showChooseInventoryText":"Choose Inventory","showGetDirectionEmptySource":"0","showCallNow":"1","showCallNowText":"\uc804\ud654\uac78\uae30","showVisitWebsite":"0","showVisitWebsiteText":"Visit Website","showWriteEmail":"0","showWriteEmailText":"Write Email","showShowOnMap":"0","showShowOnMapText":"Show on Map","showVisitStore":"0","showVisitStoreText":"Visit Store","showChat":"0","showChatText":"Chat Store","showImage":"0","imageDimensions":{"width":"150px","height":"100px","units":"px"},"imagePosition":"store-locator-order-first","showOpeningHours":"0","showOpeningHoursText":"Opening Hours","showOpeningHoursClock":"o'Clock","showOpeningHoursMonday":"Monday","showOpeningHoursTuesday":"Tuesday","showOpeningHoursWednesday":"Wednesday","showOpeningHoursThursday":"Thursday","showOpeningHoursFriday":"Friday","showOpeningHoursSaturday":"Saturday","showOpeningHoursSunday":"Sunday","showOpeningHours2":"0","showOpeningHours2Text":"Opening Hours","showOpeningHours2Clock":"o'Clock","showOpeningHours2Monday":"Monday","showOpeningHours2Tuesday":"Tuesday","showOpeningHours2Wednesday":"Wednesday","showOpeningHours2Thursday":"Thursday","showOpeningHours2Friday":"Friday","showOpeningHours2Saturday":"Saturday","showOpeningHours2Sunday":"Sunday","singleStorePage":"1","singleStorenMapIcon":"https:\/\/maps.google.com\/mapfiles\/marker_grey.png","singleStoreAppendCity":"1","singleStoreShowOpeningHours":"1","singleStoreContactStore":"1","singleStoreShowRating":"1","singleStoreShowMap":"1","singleStoreShowMapHeadline":"Find on Map","singleStoreShowMapZoom":"10","singleStoreShowMapDisablePanControl":"0","singleStoreShowMapDisableZoomControl":"0","singleStoreShowMapDisableScaleControl":"0","singleStoreShowMapDisableStreetViewControl":"0","singleStoreShowMapDisableFullscreenControl":"0","singleStoreShowMapDisableMapTypeControl":"0","singleStoreLivePosition":"0","singleStoreLivePositionActionButton":"1","singleStoreLivePositionActionButtonText":"Live Location","singleStoreLivePositionHideMapHeadline":"0","singleStoreLivePositionLatField":"wordpress_store_locator_live_lat","singleStoreLivePositionLngField":"wordpress_store_locator_live_lng","singleStoreLivePositionMapIcon":"https:\/\/maps.google.com\/mapfiles\/marker_grey.png","singleStoreLivePositionInterval":"2000","buttonEnabled":"1","buttonText":"Find in Store","buttonPosition":"woocommerce_single_product_summary","buttonAction":"1","buttonActionURL":"","buttonActionURLTarget":"_self","buttonModalPosition":"wp_footer","buttonModalSize":"","defaultAddress1":"","defaultAddress2":"","defaultZIP":"","defaultCity":"","defaultRegion":"","defaultCountry":"","defaultTelephone":"","defaultMobile":"","defaultFax":"","defaultEmail":"info@","defaultWebsite":"http:\/\/","defaultChat":"","defaultRanking":"10","defaultOpen":"08:00","defaultClose":"17:00","filterQueryOperator":"AND","disableReplaceState":"0","useOutputBuffering":"1","doNotLoadBootstrap":"0","doNotLoadFontAwesome":"0","customCSS":"","customJS":"","showCustomFields":[],"ajax_url":"https:\/\/reepotlaser.com\/wp-admin\/admin-ajax.php","trans_select_store":"Select Store","trans_your_position":"Your Position!"};
/* ]]> */
</script>
<script type='text/javascript' id='sbi_scripts-js-extra'>
/* <![CDATA[ */
var sb_instagram_js_options = {"font_method":"svg","resized_url":"https:\/\/reepotlaser.com\/wp-content\/uploads\/sb-instagram-feed-images\/","placeholder":"https:\/\/reepotlaser.com\/wp-content\/plugins\/instagram-feed-pro\/img\/placeholder.png","br_adjust":"1"};
var sbiTranslations = {"share":"Share"};
/* ]]> */
</script>
<script id="elementor-pro-frontend-js-before">
var ElementorProFrontendConfig = {"ajaxurl":"https:\/\/reepotlaser.com\/wp-admin\/admin-ajax.php","nonce":"a4992a585d","urls":{"assets":"https:\/\/reepotlaser.com\/wp-content\/plugins\/elementor-pro\/assets\/","rest":"https:\/\/reepotlaser.com\/wp-json\/"},"shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"mix":{"title":"Mix"},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"}},"facebook_sdk":{"lang":"ko_KR","app_id":""},"lottie":{"defaultAnimationUrl":"https:\/\/reepotlaser.com\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"}};
</script>
<script id="elementor-frontend-js-before">
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"\ud398\uc774\uc2a4\ubd81 \uacf5\uc720","shareOnTwitter":"\ud2b8\uc704\ud130 \uacf5\uc720","pinIt":"\uace0\uc815\ud558\uae30","download":"Download","downloadImage":"\uc774\ubbf8\uc9c0 \ub2e4\uc6b4\ub85c\ub4dc","fullscreen":"\uc804\uccb4\ud654\uba74","zoom":"\uc90c","share":"\uacf5\uc720","playVideo":"\ube44\ub514\uc624 \uc7ac\uc0dd","previous":"\uc774\uc804","next":"\ub2e4\uc74c","close":"\ub2eb\uae30"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"\ubaa8\ubc14\uc77c","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Extra","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"\ud0dc\ube14\ub9bf","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Extra","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.6.8","is_static":false,"experimentalFeatures":{"e_dom_optimization":true,"e_optimized_assets_loading":true,"e_optimized_css_loading":true,"a11y_improvements":true,"e_import_export":true,"additional_custom_breakpoints":true,"e_hidden_wordpress_widgets":true,"theme_builder_v2":true,"landing-pages":true,"elements-color-picker":true,"favorite-widgets":true,"admin-top-bar":true,"page-transitions":true,"notes":true,"form-submissions":true,"e_scroll_snap":true},"urls":{"assets":"https:\/\/reepotlaser.com\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"viewport_mobile":767,"viewport_tablet":1024,"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":13,"title":"%EB%A6%AC%ED%8C%9F%EB%A0%88%EC%9D%B4%EC%A0%80%EC%99%80%20%ED%95%A8%EA%BB%98%EB%9D%BC%EB%A9%B4%20%EC%96%B8%EC%A0%9C%EB%82%98%20Agewell%20%E3%86%8DFeelwell%E3%86%8D%20Bewell","excerpt":"","featuredImage":false},"user":{"roles":["administrator"]}};
</script>
<script type='text/javascript' id='jet-elements-js-extra'>
/* <![CDATA[ */
var jetElements = {"ajaxUrl":"https:\/\/reepotlaser.com\/wp-admin\/admin-ajax.php","isMobile":"false","templateApiUrl":"https:\/\/reepotlaser.com\/wp-json\/jet-elements-api\/v1\/elementor-template","devMode":"true","messages":{"invalidMail":"Please specify a valid e-mail"}};
/* ]]> */
</script>
<script id="elementor-admin-bar-js-before">
var elementorAdminBarConfig = {"elementor_edit_page":{"id":"elementor_edit_page","title":"\ud3b8\uc9d1\ud558\uae30","href":"https:\/\/reepotlaser.com\/wp-admin\/post.php?post=13&action=elementor","children":{"171":{"id":"elementor_edit_doc_171","title":"Footer-menu","sub_title":"Footer","href":"https:\/\/reepotlaser.com\/wp-admin\/post.php?post=171&action=elementor"},"172":{"id":"elementor_site_settings","title":"Site Settings","sub_title":"\uc0ac\uc774\ud2b8","href":"https:\/\/reepotlaser.com\/wp-admin\/post.php?post=13&action=elementor#e:run:panel\/global\/open","class":"elementor-site-settings","parent_class":"elementor-second-section"},"173":{"id":"elementor_app_site_editor","title":"\ud14c\ub9c8 \ube4c\ub354","sub_title":"\uc0ac\uc774\ud2b8","href":"https:\/\/reepotlaser.com\/wp-admin\/admin.php?page=elementor-app&ver=3.6.8#\/site-editor","class":"elementor-app-link","parent_class":"elementor-second-section"}}}};
</script>
<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
			<script>
	(function() {
		var request, b = document.body, c = 'className', cs = 'customize-support', rcs = new RegExp('(^|\\s+)(no-)?'+cs+'(\\s+|$)');

			request = true;

		b[c] = b[c].replace( rcs, ' ' );
		// The customizer requires postMessage and CORS (if the site is cross domain).
		b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
	}());
</script>

<?php if(!$no_css){?>
<link rel='dns-prefetch' href='//maps.googleapis.com' />
<link rel='dns-prefetch' href='//cdnjs.cloudflare.com' />
<link rel='dns-prefetch' href='//maxcdn.bootstrapcdn.com' />
<link rel="alternate" type="application/rss+xml" title=" &raquo; 피드" href="https://reepotlaser.com/feed/" />
<link rel="alternate" type="application/rss+xml" title=" &raquo; 댓글 피드" href="https://reepotlaser.com/comments/feed/" />

<!--  <link rel="stylesheet" href="https://static.gabia.com/responsive/assets/common/scss/common.css"> -->

<link rel="stylesheet" href="/css/head.sub.css">

<!-- 여기 -->
<link rel='stylesheet' id='wp-block-library-css' href='https://reepotlaser.com/wp-includes/css/dist/block-library/style.min.css?ver=6.3.1' media='all' />
<link rel='stylesheet' id='jet-menu-astra-css' href='https://reepotlaser.com/wp-content/plugins/jet-menu/integration/themes/astra/assets/css/style.css?ver=2.1.7' media='all' />
<link rel='stylesheet' id='astra-theme-css-css' href='https://reepotlaser.com/wp-content/themes/astra/assets/css/minified/main.min.css?ver=3.9.1' media='all' />
<link rel='stylesheet' id='sbi_styles-css' href='https://reepotlaser.com/wp-content/plugins/instagram-feed-pro/css/sbi-styles.min.css?ver=6.2.4' media='all' />
<link rel='stylesheet' id='pa-global-css' href='https://reepotlaser.com/wp-content/plugins/premium-addons-pro/assets/frontend/min-css/pa-global.min.css?ver=2.8.3' media='all' />
<!-- common css -->
<link rel="stylesheet" href="/css/common.css">
<link rel="stylesheet" href="/css/layout.css">
<link rel="stylesheet" href="/css/wp.css">

<link rel='dns-prefetch' href='/maps.googleapis.com' />
<link rel='dns-prefetch' href='/cdnjs.cloudflare.com' />
<link rel='dns-prefetch' href='/maxcdn.bootstrapcdn.com' />
<?php } ?>




  <!-- Google tag (gtag.js) -->


</head>
<body<?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?>>
<?php
if ($is_member) { // 회원이라면 로그인 중이라는 메세지를 출력해준다.
    $sr_admin_msg = '';
    if ($is_admin == 'super') $sr_admin_msg = "최고관리자 ";
    else if ($is_admin == 'group') $sr_admin_msg = "그룹관리자 ";
    else if ($is_admin == 'board') $sr_admin_msg = "게시판관리자 ";

    echo '<div id="hd_login_msg">'.$sr_admin_msg.get_text($member['mb_nick']).'님 로그인 중 ';
    echo '<a href="'.G5_BBS_URL.'/logout.php">로그아웃</a></div>';
}