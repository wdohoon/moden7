<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';
?>
<head>
<meta charset="UTF-8">
<link rel="canonical" href="https://www.ilooda.com/">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, minimal-ui">
<meta name="format-detection" content="telephone=no">
<title><?= $_title ? $_title.'::이루다' : '이루다, 건강하고 아름다운 삶을 위한 미용 의료 헬스케어' ?></title>
<meta name="description" content="<?= $_description?? '이루다는 피부 미용 헬스케어 분야의 혁신을 더해 새로운 길을 제시합니다.' ?>">
<meta name="keywords" content="이루다, 미용의료헬스케어, 의료기기, 레이저, 치료, secret rf, FRAXIS DUO, CuRAS, VIKINI">
<meta property="og:type"			content="website">
<meta property="og:url"				content="https://www.ilooda.com/">
<meta property="og:title"			content="<?= $_title ? $_title.'::이루다' : '이루다, 건강하고 아름다운 삶을 위한 미용 의료 헬스케어'?>">
<meta property="og:description"		content="<?= $_descriptionog?? '메디컬 에스테틱을 이끌어가는 피부 미용 분야  레이저, 고주파 기기 개발 전문기업' ?>">
<meta property="og:image"			content="/assets/img/thumbnail.png">
<meta property="og:site_name"		content="이루다">
<meta name="twitter:card"			content="summary">
<meta name="twitter:title"			content="<?= $_title ? $_title.'::이루다' : '이루다, 건강하고 아름다운 삶을 위한 미용 의료 헬스케어' ?>">
<meta name="twitter:site"			content="이루다">
<meta name="twitter:image"			content="/assets/img/thumbnail.png">
<meta name="twitter:description"	content="<?= $_descriptionog?? '메디컬 에스테틱을 이끌어가는 피부 미용 분야  레이저, 고주파 기기 개발 전문기업' ?>">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/assets/img/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/assets/img/ms-icon-144x144.png">

<!-- common css -->
<link rel="stylesheet" href="/assets/css/common.css?ver=0927">
<link rel="stylesheet" href="/assets/css/layout.css?ver=0927">
<!-- common js -->
<script src="/assets/vendor/jquery.min.js"></script>
<script src="/assets/vendor/browser-polyfill.min.js"></script>
<script src="/assets/lib/commonUI.js"></script>

<script src="/common/js/default.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D1VRFCMDND"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D1VRFCMDND');
</script>
<!-- 네이버 메타태그 2023-07-31 -->
<meta name="naver-site-verification" content="67e59eecf38a1fccf918f95f6b38881ddaefd9a8" />

<?= $_head ?? '' ?>
</head>