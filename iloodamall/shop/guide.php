<?php
include_once('./_common.php');

//정품인증회원만 노출
$mygenuine = sql_fetch("select * from g5_write_genuine where mb_id = '{$member['mb_id']}'");

if(!$is_admin){
	if(!$mygenuine['mb_id']){ 
		alert("정품인증 회원만 접속 가능합니다.", G5_SHOP_URL."/genuine.php");
	}
}

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/guide.php');
    return;
}

//define("_INDEX_", TRUE);

$on = '1';

include_once(G5_SHOP_PATH.'/shop.head.php');

?>

<style>
#wrapper {background: #fff;}
#container {width:100%;max-width:1920px;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/* sub_w */
.sub_w {}
.s_inner {width:1600px;margin:0 auto;}
.s_inner::after {content:"";display:block;clear:both;}

/* common */
.left {float:left;}
.right {float:right;}

.sub_div {}
.sub_title {color:#b1b4b9; font-size: 48px;font-weight: 700;text-align: center;padding:100px 0 50px;font-family: 'Noto Sans KR', sans-serif !important;}


.video_list {width:1320px;margin:0 auto;padding:50px 0px 110px;}
.video_list ul {display: flex; flex-wrap:wrap;}
.video_list ul:after {content:"";display:block;clear:both;}
.video_list ul li {width:440px;height:250px;float:left;padding:5px;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); z-index:99999;}
.store_pop {position: relative;width:1280px; height:720px; position:fixed; top:50%; left:50%; transform: translate(-50%, -50%);z-index:99;background:#fff;}


.tab_title{width: 1386px; text-align: center;margin:30px auto 0; display:flex; justify-content:flex-start; align-items:center; flex-wrap: wrap;}
.tab_title li {cursor: pointer;width: 126px;height: 40px;text-align: center;line-height: 40px;font-size: 16px;background: #EBEBEB;color: #434343;border:1px solid #E3E3E3;font-family: 'NanumSquareNeo'; padding:0 4px;}
.tab_title li.on {background: #fff; height: 50px;}

.tab_title1{width: 1386px;margin:0 auto; display:flex; justify-content:flex-start; align-items:center; flex-wrap: wrap;text-align:center;height: 100px; border:solid 1px #E3E3E3; border-top: none;}
.tab_title1 li {cursor: pointer;width: 126px;height: 40px;line-height: 40px;font-size: 16px;font-family: 'NanumSquareNeo'; margin-bottom: 1%; padding:0 4px;}
.tab_title1 li.on {color: #000; font-weight:800;}

.tab_cont {clear: both;}
.tab_cont > div {display: none;text-align: center;}
.tab_cont > div.on {display: block;}


@media (max-width: 1760px)  {
#wrapper {background: #fff;}
#container {width:100%;max-width:100%;}
#container .is_index {margin-left:0;}
/* sub_w */
.sub_w {}
.s_inner {width:90.9091vw;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 2.7273vw;padding:5.6818vw 0 2.8409vw;}


.video_list {width:75.0000vw;margin:0 auto;padding:2.8409vw 0.0000vw 6.2500vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:25.0000vw;height:14.2045vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:72.7273vw; height:40.9091vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

.tab_title{width: 75.0000vw; margin:1.7045vw auto 0; align-items:center; flex-wrap: wrap;}
.tab_title li {cursor: pointer;width: 7.1591vw;height: 2.2727vw;line-height: 2.2727vw;font-size: 0.9091vw;}

.tab_title1{width: 75.0000vw; margin:1.7045vw auto 0; flex-wrap: wrap; gap:0.3409vw;}
.tab_title1 li {cursor: pointer;width: 7.1591vw;height: 2.2727vw;line-height: 2.2727vw;margin-bottom: 1%; padding:0 0.2273vw;}
}

@media (max-width: 1600px)  {
#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100.0000vw;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 3.0000vw;padding:6.2500vw 0 3.1250vw;}

.video_list {width:82.5000vw;margin:0 auto;padding:3.1250vw 0.0000vw 6.8750vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:27.5000vw;height:15.6250vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:80.0000vw; height:45.0000vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

.tab_title{width: 82.5000vw; margin:1.8750vw auto 0; align-items:center; flex-wrap: wrap;}
.tab_title li {cursor: pointer;width: 7.8750vw;height: 2.5000vw;line-height: 2.5000vw;font-size: 1vw;}

}

@media (max-width: 1400px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100%;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 3.4286vw;padding:7.1429vw 0 3.5714vw;}

.video_list {width:94.2857vw;margin:0 auto;padding:3.5714vw 0.0000vw 7.8571vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:31.4286vw;height:17.8571vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:91.4286vw; height:51.4286vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

.tab_title{width: 94.2857vw; margin:2.1429vw auto 0; align-items:center; flex-wrap: wrap;}
.tab_title li {cursor: pointer;width: 9.0000vw;height: 2.8571vw;line-height: 2.8571vw;font-size: 1.1429vw;}

}

@media (max-width: 1024px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100%;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 4.6875vw;padding:9.7656vw 0 4.8828vw;}

.video_list {width:100%;margin:0 auto;padding:4.8828vw 3.9063vw 10.7422vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:33.3333%;height:auto;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:93.7500vw; height:52.7344vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

.tab_title{width: 100%; margin:2.9297vw auto 0; align-items:center; flex-wrap: wrap; padding: 0vw 3.9063vw}
.tab_title li {cursor: pointer;width: 12.3047vw;height: 3.9063vw;line-height: 3.9063vw;font-size: 1.5625vw;}

}

@media (max-width: 768px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100%;margin:0 auto;padding: 0 5.2083vw;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 6.2500vw;padding:13.0208vw 0 6.5104vw;}

.video_list {width:100%;margin:0 auto;padding:6.5104vw 0vw 14.3229vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:50%;height:auto;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:83.3333vw; height:46.8750vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}


.tab_title li.on{height: auto !important;border-bottom:none;}
.tab_title{width: 100%;margin:3.9063vw auto 0; justify-content:flex-start; align-items:center; flex-wrap: wrap;padding: 0;}
.tab_title li {cursor: pointer;width:25%;height: 5.2083vw;line-height: 5.2083vw;font-size: 2.2135vw;}
.tab_title1{display:flex;justify-content:space-between;width: 100%;}
.tab_title1 li{text-align: center;width: 33%;}

}

@media (max-width: 480px)  {

.sub_div {}
.sub_title {font-size: 10.0000vw;padding:16.6667vw 0 10.4167vw;}

.video_list {width:100%;margin:0 auto;padding:10.4167vw 0.0000vw 22.9167vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:50%;height:auto;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

.tab_title{margin:6.2500vw auto 0;padding: 0;}
.tab_title li {cursor: pointer;width: 29.2500vw;height: 8.3333vw;line-height: 8.3333vw;font-size: 3.5417vw;}

}

.tab_title li.on{background: #fff;height: auto;border-bottom:none;height: 50px;}
.tab_title li.on:first-child{background: #fff;height: 50px;border-bottom:none;border-right:none;}
.tab_title li.on:nth-child(n+2):nth-child(-n+10) {
    border-right: none;
    border-bottom: none;
	border-left:none;
}

        #videoPopup {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
			z-index:999;
        }

        #videoContainer {
            position: relative;
            width: 70%; /* 비디오 컨테이너 너비 조정 */
        }

        video {
            width: 100%;
            height: auto;
        }

        #closeButton {
            position: absolute;
            left: 5px;
            top: 5px;
			width: 25px;
            cursor: pointer;
            font-size: 20px;
            color: white;
			background:#000;
			opacity:0.5;
        }

        #thanksText {
            position: absolute;
            top: 40%; /* 상단에서 50% 위치 */
            left: 50%; /* 왼쪽에서 50% 위치 */
            transform: translate(-50%, -50%); /* 정확한 중앙 정렬을 위해 */
            color: white;
            font-size: 24px;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
        }
#thanksText, #watermark {
    position: absolute;
    color: white;
    /* 추가적인 스타일링 */
}

#watermark {
    top: 0;
    right: 0;
    font-size: 14px;
}
.fullscreen-active {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: black;
}
:fullscreen #thanksText, :fullscreen #watermark {
    position: absolute;
    color: white;
    z-index: 2147483647; /* 다른 요소들 위에 보이도록 함 */
}
video::-webkit-media-controls-fullscreen-button {
    display: none;
}
video::-moz-full-screen-button {
    display: none;
}

</style>

<div class="sub_w">

	<!-- 탑 배너 -->
	<div class="sub_div div01">
		<p class="sub_title">제품 가이드</p>
		<div class="s_inner">
			<ul class="tab_title">
				<li data-category="reepot">reepot</li>
				<li data-category="curashybrid">curas hybrid</li>
				<li data-category="secretMAX">secret MAX</li>
				<li data-category="fortra">fortra</li>
				<li data-category="secretDUO">secret DUO</li>
				<li data-category="secretRF">secret RF</li>
				<li data-category="n.core3D">n.core 3D</li>
				<li data-category="pento">pento</li>
				<li data-category="veloce">veloce</li>
				<li data-category="fraxisDUO">fraxis DUO</li>
				<li data-category="hyzerme">hyzer me</li>
				<li data-category="acutron">acutron</li>
				<li data-category="reticapture">reticapture</li>
			</ul>
			<ul class="tab_title1">
				<li>전체</li>
				<li class="tab" data-tab="story">스토리</li>
				<li class="tab" data-tab="guide">가이드</li>
			</ul>
			<div id="tab_cont" class="tab_cont">
				<div class="video_list on" id="videoList">
					<div id="videoPopup">

						<div id="videoContainer">
							<video id="videoPlayer" controls controlsList="nodownload" disablePictureInPicture>
								<source src="" type="video/mp4">
							</video>
							<div id="closeButton" style="cursor:pointer; z-index:1000;">X</div>
							<div id="thanksText"><?php echo $member['mb_id']?></div>
							<div id="watermark">디지털 포렌식 워터마크, 영상유포시 출처 확인됩니다.</div>
						</div>
					</div>
<!-- 					<div id="videoPopup">
						<div id="videoContainer">
							<div id="closeButton" style="cursor:pointer; z-index:1000;">닫기</div>
							<div id="thanksText"><?php echo $member['mb_id']?></div>
							<div id="watermark" style="position: absolute; top: 0; right: 0; color: white; font-size: 14px;">디지털 포렌식 워터마크(Digital Forensic Watermark),영상유포시 출처 확인됩니다.</div>
							<video id="videoPlayer" controls controlsList="nodownload" disablePictureInPicture>
								<source src="" type="video/mp4">
							</video>
						</div>
					</div> -->

					<!-- reepot -->
					<ul class="video_wrapper video_list reepot">
						<!-- reepot 스토리 -->
						<li data-category="reepot" class="story">
							<div id="videoThumbnail42" style="position: relative; cursor: pointer;"class="videoBtn" data-video="42">
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/1_%EB%A6%AC%ED%8C%9F%EA%B0%90%EB%8F%99%ED%9B%84%EA%B8%B0_%EA%B9%80%EC%83%81%EC%97%BD.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
						<li data-category="reepot" class="story">
							<div id="videoThumbnail43" style="position: relative; cursor: pointer;"class="videoBtn" data-video="43">
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/1_%EB%A6%AC%ED%8C%9F%EA%B0%90%EB%8F%99%ED%9B%84%EA%B8%B0_%EA%B9%80%EC%98%81%EC%A7%84.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
						<li data-category="reepot" class="story">
							<div id="videoThumbnail44" style="position: relative; cursor: pointer;"class="videoBtn" data-video="44">
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/1_%EB%A6%AC%ED%8C%9F%EA%B0%90%EB%8F%99%ED%9B%84%EA%B8%B0_%EC%9C%A4%EC%A0%95%ED%98%84.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
						<li data-category="reepot" class="story">
							<div id="videoThumbnail45" style="position: relative; cursor: pointer;"class="videoBtn" data-video="45">
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/1_%EB%A6%AC%ED%8C%9F%EA%B0%90%EB%8F%99%ED%9B%84%EA%B8%B0_%EC%B5%9C%EC%8A%B9.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
						<li data-category="reepot" class="story">
							<div id="videoThumbnail46" style="position: relative; cursor: pointer;"class="videoBtn" data-video="46">
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4_%EC%98%81%EC%83%81_%EC%8D%B8%EB%84%A4%EC%9D%BC_%EA%B9%80%EC%98%81%EC%A7%84_%EB%82%B4%EA%B0%80+%EC%83%9D%EA%B0%81%ED%95%9C+%EB%A6%AC%ED%8C%9F+%EC%8B%9C%EC%88%A0%EC%9D%98+%EC%9E%A5%EC%A0%90.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="story">
							<div id="videoThumbnail41" style="position: relative; cursor: pointer;"class="videoBtn" data-video="1">
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EB%A6%AC%ED%8C%9F%EC%9D%84+%EC%95%8C%EA%B2%8C+%EB%90%98%EB%8A%94+%EC%B2%AB+%EA%B1%B8%EC%9D%8C+reepot+guardians+%EC%86%8C%EA%B0%9C+%EC%98%81%EC%83%81.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="story">
							<div id="videoThumbnail40" style="position: relative; cursor: pointer;"class="videoBtn" data-video="2" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%83%88%EB%A1%9C%EC%9A%B4+%EA%B8%B0%EC%88%A0%2C+%EC%83%88%EB%A1%9C%EC%9A%B4+%EA%B2%B0%EA%B3%BC%EB%AC%BC+reepot+Interview.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

<!-- 						<li data-category="reepot" class="story">
							<div id="videoThumbnail39" style="position: relative; cursor: pointer;"class="videoBtn" data-video="3" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EA%B9%80%EC%98%81%EC%A7%84+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+%EB%A6%AC%ED%8C%9F+%EC%86%8C%EA%B0%9C.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li> -->

						<li data-category="reepot" class="story">
							<div id="videoThumbnail38" style="position: relative; cursor: pointer;"class="videoBtn" data-video="4"  >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EC%9B%90%EC%9E%A5%EB%8B%98%EB%93%A4%EC%9D%98+%EB%82%B4%EA%B0%80+%EA%B2%BD%ED%97%98%ED%95%9C+%EB%A6%AC%ED%8C%9F.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="story">
							<div id="videoThumbnail37" style="position: relative; cursor: pointer;"class="videoBtn" data-video="5" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EC%9C%A4%EC%A0%95%ED%98%84+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+reepot+%EC%86%8C%EA%B0%9C.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

<!-- 						<li data-category="reepot" class="story">
							<div id="videoThumbnail36" style="position: relative; cursor: pointer;"class="videoBtn" data-video="6" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EC%B5%9C%EC%8A%B9+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+%EA%B8%B0%EC%96%B5%EC%97%90+%EB%82%A8%EB%8A%94+%ED%99%98%EC%9E%90.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li> -->

						<li data-category="reepot" class="story">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail35" style="position: relative; cursor: pointer;"class="videoBtn" data-video="7" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4%EC%99%80+%EC%9B%90%EC%9E%A5%EB%8B%98%EB%93%A4%EC%9D%B4+%ED%95%A8%EA%BB%98%ED%95%9C+%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%26+%EA%B0%80%EB%94%94%EC%96%B8%EC%A6%88+%ED%94%84%EB%A1%9C%EA%B7%B8%EB%9E%A8.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="story">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail34" style="position: relative; cursor: pointer;"class="videoBtn" data-video="8" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/ilooda+ON+reepot+Chief+Class.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
						<!-- reepot 가이드 -->
						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail33" style="position: relative; cursor: pointer;"class="videoBtn" data-video="9" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/ilooda+reepot+solution+-+%EC%83%81%EB%8B%B4%EA%B0%80%EC%9D%B4%EB%93%9C.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail32" style="position: relative; cursor: pointer;"class="videoBtn" data-video="10" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/ilooda+reepot+solution+-+%EC%83%89%EC%86%8C+%ED%99%98%EC%9E%90%EC%9D%98+%EC%A2%85%EB%A5%98.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail31" style="position: relative; cursor: pointer;"class="videoBtn" data-video="11" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/ilooda+reepot+solution+-+PIH%EC%97%90+%EA%B4%80%ED%95%9C+%EA%B3%A0%EC%B0%B0.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail30" style="position: relative; cursor: pointer;"class="videoBtn" data-video="12" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/reepot+3D+Treatment+Guide.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail29" style="position: relative; cursor: pointer;"class="videoBtn" data-video="13" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/reepot+Treatment+Guide+PART.+1.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail28" style="position: relative; cursor: pointer;"class="videoBtn" data-video="14" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/reepot+Treatment+Guide+PART.+2.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail27" style="position: relative; cursor: pointer;"class="videoBtn" data-video="15" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+1.+ilooda+reepot+solution+-+%EA%B8%B0%EB%8C%80%EC%B9%98%EB%A5%BC+%EB%82%AE%EC%B6%94%EA%B3%A0%2C+%ED%99%95%EC%8B%A0%EC%9D%84+%EC%A0%9C%EA%B3%B5%ED%95%98%EB%9D%BC.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail26" style="position: relative; cursor: pointer;"class="videoBtn" data-video="16" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+2.+ilooda+reepot+solution+-+%EB%93%80%EC%96%B4%EB%8D%A4%EC%9D%84+%EC%9C%A0%EC%A7%80%ED%95%98%EB%9D%BC.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail25" style="position: relative; cursor: pointer;"class="videoBtn" data-video="17" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+3.+ilooda+reepot+solution+-+%EC%A7%84%ED%94%BC%EC%83%89%EC%86%8C%EC%99%80+PIH%EB%A5%BC+%EA%B5%AC%EB%B3%84%ED%95%98%EA%B3%A0%2C+%EC%98%88%EC%B8%A1%ED%95%98%EB%9D%BC.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail24" style="position: relative; cursor: pointer;"class="videoBtn" data-video="18" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+4.+ilooda+reepot+solution+-+%EC%8A%A4%ED%82%A8%EB%B6%80%EC%8A%A4%ED%84%B0%EB%A5%BC+%ED%99%9C%EC%9A%A9%ED%95%98%EB%9D%BC.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail23" style="position: relative; cursor: pointer;"class="videoBtn" data-video="19" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+5.+ilooda+reepot+solution+-+%EC%A7%84%ED%94%BC%EC%A1%B0%EC%A7%81%EC%97%90+%EB%94%B0%EB%A5%B8+%EB%A0%88%EC%9D%B4%EC%A0%80+%EC%B9%98%EB%A3%8C%EB%A5%BC+%ED%99%9C%EC%9A%A9%ED%95%98%EB%9D%BC.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail22" style="position: relative; cursor: pointer;"class="videoBtn" data-video="20" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+6.+ilooda+reepot+solution+-+%EB%82%B4%EC%9B%90%EC%9D%B4+%ED%9E%98%EB%93%A0+%EA%B2%BD%EC%9A%B0%EC%97%90%EB%8A%94.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="reepot" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail21" style="position: relative; cursor: pointer;"class="videoBtn" data-video="21" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+7.+ilooda+reepot+solution+-+%ED%99%98%EC%9E%90%EB%A5%BC+%EB%AF%BF%EC%A7%80%EB%A7%88%EB%9D%BC.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					</ul>

					<!-- hyzer me 스토리 -->
					<ul class=" video_wrapper video_list hyzerme" style="display:none;">
						<li data-category="hyzerme"  class="story">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail20" style="position: relative; cursor: pointer;"class="videoBtn" data-video="22" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/11.+hyzer+me/%EC%8A%A4%ED%86%A0%EB%A6%AC/Latest+HIFU+Technology+hyzer+me.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="hyzerme"  class="story">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail19" style="position: relative; cursor: pointer;"class="videoBtn" data-video="23" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/11.+hyzer+me/%EC%8A%A4%ED%86%A0%EB%A6%AC/The+future+is+here+hyzer+me.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					</ul>
					<!-- secret RF 가이드 -->
					<ul class="video_wrapper video_list secretRF" style="display:none;">
						<li data-category="secretRF" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail18" style="position: relative; cursor: pointer;"class="videoBtn" data-video="24" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/2.+secret+RF/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+secret+RF+Dr.+Lais+Mutti.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					<!-- secret RF 스토리 -->
						<li data-category="secretRF"  class="story">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail17" style="position: relative; cursor: pointer;"class="videoBtn" data-video="25" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/2.+secret+RF/%EC%8A%A4%ED%86%A0%EB%A6%AC/I+love+secret+RF+Challenge.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					</ul>

					<!-- secret DUO 가이드 -->
					<ul class="video_wrapper video_list secretDUO" style="display:none;">
						<li data-category="secretDUO" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail16" style="position: relative; cursor: pointer;"class="videoBtn" data-video="26" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/secret+DUO+Treatment+Guide+Eye+Bag+Treatment.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="secretDUO" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail15" style="position: relative; cursor: pointer;"class="videoBtn" data-video="27" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/secret+DUO+Treatment+Guide+Face+Rejuvenation.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="secretDUO" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail14" style="position: relative; cursor: pointer;"class="videoBtn" data-video="28" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/secret+DUO+Treatment+Guide+Neck+Tightening.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="secretDUO" class="guide">
							<div id="videoThumbnail13" style="position: relative; cursor: pointer;"class="videoBtn" data-video="29" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/secret+DUO+Treatment+Guide+Veins+Treatment.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="secretDUO" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail12" style="position: relative; cursor: pointer;"class="videoBtn" data-video="30" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+secret+DUO+Dr.+Renata+Costa.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
						<li data-category="secretDUO" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail11" style="position: relative; cursor: pointer;"class="videoBtn" data-video="31" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/Total+Aesthetic+Solution+secret+DUO.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					</ul>
					<!-- pento 가이드 -->
					<ul class="video_wrapper video_list pento" style="display:none;">
						<li data-category="pento" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail10" style="position: relative; cursor: pointer;" class="videoBtn" data-video="32" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/5.+PENTO/%EA%B0%80%EC%9D%B4%EB%93%9C/pento+9900+Guide.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					</ul>
					<!-- veloce 가이드 -->
					<ul class="video_wrapper video_list veloce" style="display:none;">
						<li data-category="veloce" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail9" style="position: relative; cursor: pointer;"class="videoBtn" data-video="33" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/7.+VELOCE/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+veloce+Dr.+Erol+KOC.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
						<li data-category="veloce" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail8" style="position: relative; cursor: pointer;"class="videoBtn" data-video="34">
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/7.+VELOCE/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+veloce+Dr.+Ersin.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
						<li data-category="veloce" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail7" style="position: relative; cursor: pointer;"class="videoBtn" data-video="35" ">
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/7.+VELOCE/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+veloce+Dr.+Sehriyar+Nazari.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					</ul>

					<!-- n.core3D 가이드 -->
					<ul class="video_wrapper video_list n.core3D" style="display:none;">
						<li data-category="n.core3D" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail6" style="position: relative; cursor: pointer;" class="videoBtn" data-video="36" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/8.+N.CORE+3D/%EA%B0%80%EC%9D%B4%EB%93%9C/n.core+3D+Guide.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					<!-- n.core3D 스토리 -->
						<li data-category="n.core3D"  class="story">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail5" style="position: relative; cursor: pointer;" class="videoBtn" data-video="37" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/8.+N.CORE+3D/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EA%B9%80%EA%B8%B0%EB%B2%94+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+n.core+3D+%EC%86%8C%EA%B0%9C.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					</ul>

					<!-- curas hybrid 가이드 -->
					<ul class=" video_wrapper video_list curashybrid" style="display:none;">
						<li data-category="curashybrid" class="guide">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail4" style="position: relative; cursor: pointer;" class="videoBtn" data-video="38" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/9.+cuRAS+hybrid/%EA%B0%80%EC%9D%B4%EB%93%9C/curas+hybrid+Guide.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>
					<!-- curas hybrid 스토리 -->
						<li data-category="curashybrid"  class="story">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail3" style="position: relative; cursor: pointer;" class="videoBtn" data-video="39" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/9.+cuRAS+hybrid/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EA%B9%80%EC%83%81%EC%97%BD+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+curas+hybrid+%EC%86%8C%EA%B0%9C.png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="curashybrid"  class="story">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail2"style="position: relative; cursor: pointer;" class="videoBtn" data-video="40" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/9.+cuRAS+hybrid/%EC%8A%A4%ED%86%A0%EB%A6%AC/curas+hybrid+'Time+doesn't+flow+(en).png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

						<li data-category="curashybrid"  class="story">
							<!-- 썸네일 이미지 -->
							<div id="videoThumbnail1" style="position: relative; cursor: pointer;" class="videoBtn" data-video="41" >
								<img src="https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/9.+cuRAS+hybrid/%EC%8A%A4%ED%86%A0%EB%A6%AC/curas+hybrid+%EC%8B%9C%EA%B0%84%EC%9D%80+%ED%9D%90%EB%A5%B4%EC%A7%80+%EC%95%8A%EB%8A%94%EB%8B%A4+(%EA%B5%AD%EB%AC%B8).png" alt="Video Thumbnail" width="100%" height="100%">
							</div>
						</li>

					</ul>
				</div>
			</div>

		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    // 비디오 경로 설정
    const videoPaths = {
			1:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EB%A6%AC%ED%8C%9F%EC%9D%84+%EC%95%8C%EA%B2%8C+%EB%90%98%EB%8A%94+%EC%B2%AB+%EA%B1%B8%EC%9D%8C+reepot+guardians+%EC%86%8C%EA%B0%9C+%EC%98%81%EC%83%81.mp4',
			2:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%83%88%EB%A1%9C%EC%9A%B4+%EA%B8%B0%EC%88%A0%2C+%EC%83%88%EB%A1%9C%EC%9A%B4+%EA%B2%B0%EA%B3%BC%EB%AC%BC+reepot+Interview.mp4',
			3:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EA%B9%80%EC%98%81%EC%A7%84+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+%EB%A6%AC%ED%8C%9F+%EC%86%8C%EA%B0%9C.mp4',
			4:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EC%9B%90%EC%9E%A5%EB%8B%98%EB%93%A4%EC%9D%98+%EB%82%B4%EA%B0%80+%EA%B2%BD%ED%97%98%ED%95%9C+%EB%A6%AC%ED%8C%9F.mp4',
			5:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EC%9C%A4%EC%A0%95%ED%98%84+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+reepot+%EC%86%8C%EA%B0%9C.mp4',
			6:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EC%B5%9C%EC%8A%B9+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+%EA%B8%B0%EC%96%B5%EC%97%90+%EB%82%A8%EB%8A%94+%ED%99%98%EC%9E%90.mp4',
			7:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4%EC%99%80+%EC%9B%90%EC%9E%A5%EB%8B%98%EB%93%A4%EC%9D%B4+%ED%95%A8%EA%BB%98%ED%95%9C+%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%26+%EA%B0%80%EB%94%94%EC%96%B8%EC%A6%88+%ED%94%84%EB%A1%9C%EA%B7%B8%EB%9E%A8.mp4',
			8:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/ilooda+ON+reepot+Chief+Class.mp4',
			9:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/ilooda+reepot+solution+-+%EC%83%81%EB%8B%B4%EA%B0%80%EC%9D%B4%EB%93%9C.mp4',
			10:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/ilooda+reepot+solution+-+%EC%83%89%EC%86%8C+%ED%99%98%EC%9E%90%EC%9D%98+%EC%A2%85%EB%A5%98.mp4',
			11:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/ilooda+reepot+solution+-+PIH%EC%97%90+%EA%B4%80%ED%95%9C+%EA%B3%A0%EC%B0%B0.mp4',
			12:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/reepot+3D+Treatment+Guide.mp4',
			13:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/reepot+Treatment+Guide+PART.+1.mp4',
			14:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/reepot+Treatment+Guide+PART.+2.mp4',
			15:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+1.+ilooda+reepot+solution+-+%EA%B8%B0%EB%8C%80%EC%B9%98%EB%A5%BC+%EB%82%AE%EC%B6%94%EA%B3%A0%2C+%ED%99%95%EC%8B%A0%EC%9D%84+%EC%A0%9C%EA%B3%B5%ED%95%98%EB%9D%BC.mp4',
			16:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+2.+ilooda+reepot+solution+-+%EB%93%80%EC%96%B4%EB%8D%A4%EC%9D%84+%EC%9C%A0%EC%A7%80%ED%95%98%EB%9D%BC.mp4',
			17:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+3.+ilooda+reepot+solution+-+%EC%A7%84%ED%94%BC%EC%83%89%EC%86%8C%EC%99%80+PIH%EB%A5%BC+%EA%B5%AC%EB%B3%84%ED%95%98%EA%B3%A0%2C+%EC%98%88%EC%B8%A1%ED%95%98%EB%9D%BC.mp4',
			18:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+4.+ilooda+reepot+solution+-+%EC%8A%A4%ED%82%A8%EB%B6%80%EC%8A%A4%ED%84%B0%EB%A5%BC+%ED%99%9C%EC%9A%A9%ED%95%98%EB%9D%BC.mp4',
			19:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+5.+ilooda+reepot+solution+-+%EC%A7%84%ED%94%BC%EC%A1%B0%EC%A7%81%EC%97%90+%EB%94%B0%EB%A5%B8+%EB%A0%88%EC%9D%B4%EC%A0%80+%EC%B9%98%EB%A3%8C%EB%A5%BC+%ED%99%9C%EC%9A%A9%ED%95%98%EB%9D%BC.mp4',
			20:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+6.+ilooda+reepot+solution+-+%EB%82%B4%EC%9B%90%EC%9D%B4+%ED%9E%98%EB%93%A0+%EA%B2%BD%EC%9A%B0%EC%97%90%EB%8A%94.mp4',
			21:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EA%B0%80%EC%9D%B4%EB%93%9C/Strategy+7.+ilooda+reepot+solution+-+%ED%99%98%EC%9E%90%EB%A5%BC+%EB%AF%BF%EC%A7%80%EB%A7%88%EB%9D%BC.mp4',
			22:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/11.+hyzer+me/%EC%8A%A4%ED%86%A0%EB%A6%AC/Latest+HIFU+Technology+hyzer+me.mp4',
			23:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/11.+hyzer+me/%EC%8A%A4%ED%86%A0%EB%A6%AC/The+future+is+here+hyzer+me.mp4',
			24:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/2.+secret+RF/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+secret+RF+Dr.+Lais+Mutti.mp4',
			25:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/2.+secret+RF/%EC%8A%A4%ED%86%A0%EB%A6%AC/I+love+secret+RF+Challenge.mp4',
			26:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/secret+DUO+Treatment+Guide+Eye+Bag+Treatment.mp4',
			27:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/secret+DUO+Treatment+Guide+Face+Rejuvenation.mp4',
			28:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/secret+DUO+Treatment+Guide+Neck+Tightening.mp4',
			29:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/secret+DUO+Treatment+Guide+Veins+Treatment.mp4',
			30:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+secret+DUO+Dr.+Renata+Costa.mp4',
			31:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/4.+secret+DUO/%EA%B0%80%EC%9D%B4%EB%93%9C/Total+Aesthetic+Solution+secret+DUO.mp4',
			32:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/5.+PENTO/%EA%B0%80%EC%9D%B4%EB%93%9C/pento+9900+Guide.mp4',
			33:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/7.+VELOCE/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+veloce+Dr.+Erol+KOC.mp4',
			34:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/7.+VELOCE/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+veloce+Dr.+Ersin.mp4',
			35:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/7.+VELOCE/%EA%B0%80%EC%9D%B4%EB%93%9C/Testimonial+veloce+Dr.+Sehriyar+Nazari.mp4',
			36:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/8.+N.CORE+3D/%EA%B0%80%EC%9D%B4%EB%93%9C/n.core+3D+Guide.mp4',
			37:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/8.+N.CORE+3D/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EA%B9%80%EA%B8%B0%EB%B2%94+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+n.core+3D+%EC%86%8C%EA%B0%9C.mp4',
			38:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/9.+cuRAS+hybrid/%EA%B0%80%EC%9D%B4%EB%93%9C/curas+hybrid+Guide.mp4',
			39:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/9.+cuRAS+hybrid/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4+%EC%9E%90%EB%AC%B8%EB%8B%A8+%EA%B9%80%EC%83%81%EC%97%BD+%EC%9B%90%EC%9E%A5%EB%8B%98%EC%9D%98+curas+hybrid+%EC%86%8C%EA%B0%9C.mp4',
			40:"https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/9.+cuRAS+hybrid/%EC%8A%A4%ED%86%A0%EB%A6%AC/curas+hybrid+'Time+doesn't+flow+(en).mp4",
			41:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/9.+cuRAS+hybrid/%EC%8A%A4%ED%86%A0%EB%A6%AC/curas+hybrid+%EC%8B%9C%EA%B0%84%EC%9D%80+%ED%9D%90%EB%A5%B4%EC%A7%80+%EC%95%8A%EB%8A%94%EB%8B%A4+(%EA%B5%AD%EB%AC%B8).mp4',
			42:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/1_%EB%A6%AC%ED%8C%9F%EA%B0%90%EB%8F%99%ED%9B%84%EA%B8%B0_%EA%B9%80%EC%83%81%EC%97%BD.mp4',
			43:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/1_%EB%A6%AC%ED%8C%9F%EA%B0%90%EB%8F%99%ED%9B%84%EA%B8%B0_%EA%B9%80%EC%98%81%EC%A7%84.mp4',
			44:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/1_%EB%A6%AC%ED%8C%9F%EA%B0%90%EB%8F%99%ED%9B%84%EA%B8%B0_%EC%9C%A4%EC%A0%95%ED%98%84.mp4',
			45:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/1_%EB%A6%AC%ED%8C%9F%EA%B0%90%EB%8F%99%ED%9B%84%EA%B8%B0_%EC%B5%9C%EC%8A%B9.mp4',
			46:'https://ilooda.s3.ap-northeast-2.amazonaws.com/%EC%98%81%EC%83%81(%EA%B3%A0%ED%95%B4%EC%83%81)/1.+reepot/%EC%8A%A4%ED%86%A0%EB%A6%AC/%EC%9D%B4%EB%A3%A8%EB%8B%A4_%EC%98%81%EC%83%81_%EC%8D%B8%EB%84%A4%EC%9D%BC_%EA%B9%80%EC%98%81%EC%A7%84_%EB%82%B4%EA%B0%80+%EC%83%9D%EA%B0%81%ED%95%9C+%EB%A6%AC%ED%8C%9F+%EC%8B%9C%EC%88%A0%EC%9D%98+%EC%9E%A5%EC%A0%90.mp4',
    };

    document.querySelectorAll('.videoBtn').forEach(button => {
        button.addEventListener('click', function() {
            const videoNum = this.getAttribute('data-video');
            const videoSrc = videoPaths[videoNum];
            const videoPlayer = document.getElementById('videoPlayer');
            videoPlayer.src = videoSrc;
            videoPlayer.play(); // 비디오 자동 재생
            document.getElementById('videoPopup').style.display = 'flex';
        });
    });
 }); 



</script>





<script>

document.getElementById('closeButton').addEventListener('click', function() {
    const videoPopup = document.getElementById('videoPopup');
    const videoPlayer = document.getElementById('videoPlayer');

    if (videoPlayer) {
        videoPlayer.pause(); // 비디오 일시정지
        videoPlayer.currentTime = 0; // 비디오 재생 시간을 처음으로 설정
        videoPlayer.src = ''; // 비디오 소스 제거
    }

    if (videoPopup) {
        videoPopup.style.display = 'none'; // 비디오 팝업 숨기기
    }
});


document.addEventListener('DOMContentLoaded', function() {
    // 초기 활성 탭 설정
    setActiveTab('reepot');
    setActiveSubTab('전체');

    // 모든 메인 탭에 클릭 이벤트 리스너 추가
    document.querySelectorAll('.tab_title li').forEach(function(tab) {
        tab.addEventListener('click', function() {
            setActiveTab(tab.getAttribute('data-category'));
        });
    });

    // 모든 서브 탭에 클릭 이벤트 리스너 추가
    document.querySelectorAll('.tab_title1 li').forEach(function(tab) {
        tab.addEventListener('click', function() {
            setActiveSubTab(tab.textContent.trim());
        });
    });
});


function setActiveTab(category) {
    // 활성 탭 업데이트
    document.querySelectorAll('.tab_title li').forEach(function(tab) {
        tab.classList.remove('on');
        if (tab.getAttribute('data-category') === category) {
            tab.classList.add('on');
        }
    });

    // 관련 내용 표시/숨기기
    document.querySelectorAll('.video_list ul').forEach(function(content) {
        if (content.classList.contains(category)) {
            content.style.display = 'block';
        } else {
            content.style.display = 'none';
        }
    });

    // 메인 탭 변경 시 기본적으로 '전체' 서브 탭 활성화
    setActiveSubTab('전체');
}

function setActiveSubTab(subTabName) {
    // 활성 서브 탭 업데이트
    document.querySelectorAll('.tab_title1 li').forEach(function(tab) {
        tab.classList.remove('on');
        if (tab.textContent.trim() === subTabName) {
            tab.classList.add('on');
        }
    });

    // 서브 탭에 따라 콘텐츠 표시/숨기기
    document.querySelectorAll('.video_wrapper li').forEach(function(item) {
        if (subTabName === '전체') {
            item.style.display = 'block';
        } else if (item.classList.contains(subTabName)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // 모든 탭에 대한 클릭 이벤트 리스너 설정
    document.querySelectorAll('.tab').forEach(function(tab) {
        tab.addEventListener('click', function() {
            var selectedTab = tab.getAttribute('data-tab');
            showContent(selectedTab);
        });
    });
});

function showContent(selectedTab) {
    // 모든 아이템 숨기기
    document.querySelectorAll('.video_wrapper li').forEach(function(item) {
        item.style.display = 'none';
    });

    // 선택된 탭에 해당하는 아이템만 표시
    document.querySelectorAll('.video_wrapper li.' + selectedTab).forEach(function(item) {
        item.style.display = 'block';
    });
}


// 전체 화면 상태 감지 함수
function handleFullscreenChange() {
    var isFullscreen = document.fullscreenElement !== null;
    var thanksText = document.getElementById('thanksText');
    var watermark = document.getElementById('watermark');

    if (isFullscreen) {
        // 전체 화면일 때 위치 조정
        thanksText.style.bottom = '20px';
        thanksText.style.left = '20px';
        watermark.style.top = '20px';
        watermark.style.right = '20px';
    } else {
        // 전체 화면이 아닐 때 원래 위치로 복귀
        thanksText.style.bottom = '';
        thanksText.style.left = '';
        watermark.style.top = '';
        watermark.style.right = '';
    }
}

// 전체 화면 변화 이벤트 리스너 등록
document.addEventListener('fullscreenchange', handleFullscreenChange);

</script>


<?php
include_once(G5_PATH.'/tail.php');