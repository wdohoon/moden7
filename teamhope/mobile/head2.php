<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<style>
header {
    position: absolute;
    z-index: 2;
    margin: 0 auto;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
	padding: 20px 30px;
}
.header-logo {
    width: 100%;
    display: flex;
    justify-content: space-between;
	padding: 20px 30px 20px 0;
}
.header-logo img {
    width: 135px;
    height: 35px;
}
.hamburger-menu {
    display: flex;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
	justify-content:center;
}
.hamburger-menu .bar {
    width: 35px;
    height: 5px;
    background-color: #ccc;
}
.full-screen-menu {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    z-index: 1000;
    flex-direction: column;
}
.full-screen-menu ul {
    list-style-type: none;
    padding: 0;
	padding: 0 40px;
}
.full-screen-menu ul li {
    margin: 20px 0;
}
.full-screen-menu ul li a,
#prCenter{
    color: #000;
    text-decoration: none;
    font-size: 30px;
	cursor:pointer;
}
.full-screen-menu .header-logo{padding:40px 30px;}
#container{min-height:auto}

/* X 모양으로 변환되는 햄버거 메뉴 스타일 */
.hamburger-menu.active .bar:nth-child(2) {
    opacity: 0;
}

.hamburger-menu.active .bar:nth-child(1) {
    transform: translateY(10px) rotate(45deg);
}

.hamburger-menu.active .bar:nth-child(3) {
    transform: translateY(-10px) rotate(-45deg);
}
#noticeSection{padding: 0 40px;}
#noticeSection a{color: #777;}
</style>

<div id="wrapper">
    <header>
        <div class="header-logo">
            <a href="/index.php"><img src="/images/blue_logo.png" alt="Logo"></a>
        </div>
        <div class="hamburger-menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>

    <div class="full-screen-menu">
		<div class="header-logo" style="display: flex;"	>
            <a href="/index.php"><img src="/images/blue_logo.png" alt="Logo"></a>
			<div class="hamburger-menu">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>
        </div>
        <ul>
            <li><a href="/company.php">COMPANY</a></li>
            <li><a href="/bbs/board.php?bo_table=p11">ARTIST</a></li>
			<li id="prCenter">PR CENTER</li>
			<div id="noticeSection">
				<li><a href="/bbs/board.php?bo_table=media">NOTICE</a></li>
				<li><a href="/bbs/board.php?bo_table=news">NEWS</a></li>
				<li><a href="/bbs/board.php?bo_table=p53">MEDIA</a></li>
			</div>
            <li><a href="/bbs/board.php?bo_table=board">SCHEDULE</a></li>
            <li><a href="/audition.php">AUDITION</a></li>
        </ul>
		
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var hamburgers = document.querySelectorAll('.hamburger-menu'); // 모든 햄버거 메뉴 선택
    var fullScreenMenu = document.querySelector('.full-screen-menu');

    hamburgers.forEach(function (hamburger) { // 각 햄버거 메뉴에 대해 이벤트 리스너 추가
        hamburger.addEventListener('click', function () {
            // 'X' 모양으로 변경
            hamburgers.forEach(function (ham) { ham.classList.toggle('active'); });

            if(fullScreenMenu.style.display === 'flex') {
                fullScreenMenu.style.display = 'none';
            } else {
                fullScreenMenu.style.display = 'flex';
            }
        });
    });

    fullScreenMenu.addEventListener('click', function (e) {
        if (e.target.tagName === 'A' || e.target === fullScreenMenu) {
            fullScreenMenu.style.display = 'none';
            hamburgers.forEach(function (ham) { ham.classList.remove('active'); }); // 메뉴 닫힐 때 'X' 모양 복귀
        }
    });
});


</script>

    <div id="container">
        <?php if (!defined("_INDEX_")) { ?>
            <h2 id="container_title" class="top" title="<?php echo get_text($g5['title']); ?>">
                <a href="javascript:history.back();"><i class="fa fa-chevron-left" aria-hidden="true"></i><span class="sound_only">뒤로가기</span></a> <?php echo get_head_title($g5['title']); ?>
            </h2>
        <?php } ?>
        <!-- 페이지 내용 -->
    </div>
</div>


