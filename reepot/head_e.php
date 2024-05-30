<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

run_event('pre_head');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head_e.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head_e.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
/*
//wp-bak
if(is_file($uploadfile)) {

				$f_tmp = file_get_contents($uploadfile);
				$f_tmp = str_replace("wp:", "wp__", $f_tmp);
				$f_tmp = str_replace("content:", "content__", $f_tmp);

				$xml = simplexml_load_string($f_tmp, 'SimpleXMLElement', LIBXML_NOCDATA | LIBXML_NOBLANKS);

				if($xml === false) {
								//deal with error
								echo 'error';
								exit;
				}

} else {
				alert('업로드 파일이 없음');
}*/


$mAgent = array("iPhone","iPod","Android","Blackberry", "Opera Mini", "Windows ce", "Nokia", "sony" );
	$chkMobile = false;
	for($i=0; $i<sizeof($mAgent); $i++){
		if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
			$chkMobile = true;
			break;
		}
	}
	if(defined('_INDEX_')) { // index에서만 실행
		if($chkMobile){
			include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
		}else{
			include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
		}
	}
?>


<!-- 상단 시작 { -->
<!-- <div class="loading">
    <svg class="loading-circle">
      <circle cx="50%" cy="50%" r="25"></circle>
    </svg>
  </div> -->

	<div class="global-head">
    <div id="glovalnavSection">
      <nav id="glovalnavTop">
        <div class="gn-content">
          <ul class="gn-list">
            <li class="gn-item gn-top ">
              <a class="depth1-item"><span class="gn-item-txt">Investors</span><svg class="ast-arrow-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="10px" height="10px" viewBox="57 35.171 26 16.043" enable-background="new 57 35.171 26 16.043" xml:space="preserve">
                <path d="M57.5,38.193l12.5,12.5l12.5-12.5l-2.5-2.5l-10,10l-10-10L57.5,38.193z"></path>
                </svg></a>
              <div class="depth2-box">
                <a href="https://eng.ilooda.com/investor/finance.php" class="gn-link">Annual Reports</a>
                <a href="https://eng.ilooda.com/investor/notice.php">Disclosure Information</a>
                <!-- <a href="/investor/stock.php" class="gn-link">주가 정보</a> -->
                <a href="https://eng.ilooda.com/investor/irNews.php" class="gn-link">NewsPress Releases</a>
              </div>
            </li>
            <li class="gn-item gn-top ">
              <a class="depth1-item"><span class="gn-item-txt">Patients</span><svg class="ast-arrow-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="10px" height="10px" viewBox="57 35.171 26 16.043" enable-background="new 57 35.171 26 16.043" xml:space="preserve">
                <path d="M57.5,38.193l12.5,12.5l12.5-12.5l-2.5-2.5l-10,10l-10-10L57.5,38.193z"></path>
                </svg></a>
              <div class="depth2-box">
                <a href="https://eng.ilooda.com/patient/" class="gn-link">Treatments&Therapies</a>
              </div>
            </li>
            <li class="gn-item gn-top ">
              <a href="https://eng.ilooda.com/newsRoom.php" class="depth1-item"><span class="gn-item-txt">NewsRoom</span></a>
            </li>
            <li class="gn-item gn-top ">
              <a href="https://eng.ilooda.com/career/" class="depth1-item"><span class="gn-item-txt">Career</span></a>
            </li>
             <li class="gn-item gn-top __lang">
              <a class="depth1-item"></a>
              <div class="depth2-box">
                <a href="/" class="gn-link">KOR</a>
                <a id="" class="gn-link goEnHomepage">ENG</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <nav id="glovalnav">
        <div class="gn-content">
          <div class="gn-lang">
            <span class="lang_triger"></span>
            <div class="lang_body">
              <a href="/" class="gn-link">KOR</a>
            <!-- 	<a id="goEnHomepage" class="gn-link">ENG</a> -->
              <a id="" class="gn-link goEnHomepage">ENG</a>
            </div>
          </div>
          <div id="gnToggle">
            <div class="bar-icon bar-top">
              <span class="bar"></span>
            </div>
            <div class="bar-icon bar-bottom">
              <span class="bar"></span>
            </div>
          </div>
          <h1 class="gn-logo"><a href="index_e.php" class="gn-link"><span class="sr-only">ilooda</span></a></h1>
          <ul class="gn-list">
            <li class="gn-item depth1 ">
              <a href="/reepot_e.php" class="depth1-item"><span class="gn-item-txt">reepot</span></a>

            </li>
            <li class="gn-item depth1 ">
              <a  href="/brand_e.php" class="depth1-item"><span class="gn-item-txt">brand</span></a>

            </li>
            <li class="gn-item depth1 gn-brand-item  on">
              <a  href="/technology_e.php" class="depth1-item"><span class="gn-item-txt">technology</span></a>

            </li>
            <li class="gn-item depth1 ">
              <a  href="/certification_e.php" class="depth1-item"><span class="gn-item-txt">certification</span></a>

            </li>
            <li class="gn-item depth1 ">
              <a  href="/service_e.php" class="depth1-item"><span class="gn-item-txt">service</span></a>

            </li>

          </ul>
         <button class="rule-toggle-button" onclick="toggleDisable()"> <svg class="ast-mobile-svg ast-menu-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 13h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 7h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 19h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path></svg>
         <svg class="ast-mobile-svg ast-close-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path></svg>
         </button>
        </div>
      </nav>

      <nav class="glovalnav-m disable">
        <div class="gn-content">
          <ul class="gn-list">
            <li class="gn-item depth1 ">
              <a href="/reepot_e.php" class="depth1-item"><span class="gn-item-txt">reepot</span></a>

            </li>
            <li class="gn-item depth1 ">
              <a  href="/brand_e.php" class="depth1-item"><span class="gn-item-txt">brand</span></a>

            </li>
            <li class="gn-item depth1 gn-brand-item  on">
              <a  href="/technology_e.php" class="depth1-item"><span class="gn-item-txt">technology</span></a>

            </li>
            <li class="gn-item depth1 ">
              <a  href="/certification_e.php" class="depth1-item"><span class="gn-item-txt">certification</span></a>

            </li>
            <li class="gn-item depth1 ">
              <a  href="/service_e.php" class="depth1-item"><span class="gn-item-txt">service</span></a>

            </li>

          </ul>

        </div>
      </nav>
    </div>
  </div>
<script>
function toggleDisable() {
  var divElement = document.querySelector('.glovalnav-m');

  divElement.classList.toggle('disable');

}
</script>
<!-- } 상단 끝 -->

<!-- 콘텐츠 시작 { -->
