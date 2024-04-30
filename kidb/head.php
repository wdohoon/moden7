<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

run_event('pre_head');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head.php');
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
<!-- 상단 시작 { -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../css/index.css">

<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
	<?php 
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
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>


</div> 
<!-- } 상단 끝 -->
<style>
header {
	width: 100%;
    z-index: 6;
    position: absolute;
}
header nav{
	width:100%;
	padding: 20px 0px 0px 150px;
	font-weight: bold;
}
header:hover nav a {
	color: #000 !important; 
}
header .logo {
    text-decoration: none;
    display: inline-block;
	position: relative;
	top: 50px;
	left: 20px;
    width: 106px;
    height: 34px;
	background: url(../img/header_logo.png) center center/cover;
	color: #fff;
}
header nav ul{
	font-size: 15px;
	width:100%;
	display: flex;
    align-items: baseline;
    justify-content: space-around;
}
header nav li {
	font-size: 16px;
    position: relative;
    display: inline-block;
    text-align: center;
}
.tab_menu:hover{
	color: #a0935e !important; 
    border-bottom: solid 2px #a0935e;
}

header nav ul li.dropdown:hover > .tab_menu {
    background: url(../img/header_hover.png);
	color: #a0935e; 
}

header nav ul li.dropdown:hover > .submenu {
    display: block; 
}

.header_hovers {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: -1; 
    object-fit: cover;
}
header:hover{
	width:100%;
	height: 320px;
    background: url(../img/header_hovers.png) no-repeat center center/cover;
}
header:hover .submenu {
    display: block; 
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline-block;
    position: relative;
}

nav ul li a{
    text-decoration: none;
    display: block;
    padding: 10px 50px;
}

.submenu li:not(:hover) a {
    text-decoration-color: #a0935e;
    justify-content: center;
}
.submenu li:hover a{
	color: #a0935e !important;
}

.submenu li:hover a {
    text-decoration: underline 2px;
	text-decoration-color: #a0935e;
}
.submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 50%;
	transform:translatex(-50%);
	width: auto;
}
.submenu li a {
    color: #fff;
    text-decoration: none;
    padding: 10px 20px; 
	display: flex !important;
	font-weight: 400;
}

.dropdown:hover .submenu {
    display: block;
}

.submenu li {
	white-space: nowrap;
}

.submenu-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
    display: none;
}
.tab_menu{
    color: #fff; 
	position:relative;
	bottom:10px;
}

#connecting img{
	width: 100%;
}
@media (max-width: 1280px) {
    /* 햄버거 아이콘 스타일링 추가 */
    #hamburger-menu {
        display: block;
        cursor: pointer;
        position: absolute;
		top: 1.9063vw;
		right: 4.9063vw;
		z-index: 5;
		width: 40px;
		height: 40px;
    }
	.ham_logo{
		position: absolute;
		top: 3.9063vw;
		left: 3.9063vw;
		z-index: 3;
		width: 20%;
	}
	.hams_logo{
		width: 20%;
	}
    .bar {
        width: 6.9063vw;
        height: 0.6906vw;
        margin: 0.7813vw 0;
        transition: 0.4s;
        background-color: #fff;
    }
    header nav {
        display: none;
    }
    header nav ul li {
        display: block;
        text-align: center;
        margin-bottom: 1.3021vw;
    }
    header nav ul li a {
        text-decoration: none;
        display: block;
        padding: 1.3021vw 0;
        color: #fff;
    }
    header nav ul li .submenu {
        display: none;
        position: relative;
        left: 0;
        top: 0;
        width: 100%;
        background-color: #333;
    }
    .submenu li {
        display: block;
        text-align: center;
    }
    .submenu li a {
        text-decoration: none;
        display: block;
        padding: 1.3021vw 0;
        color: #fff;
    }
    #hamburger-menu.opened .bar:nth-child(1) {
        transform: rotate(-45deg) translate(-5px, 6px);
    }
    #hamburger-menu.opened .bar:nth-child(2) {
        opacity: 0;
    }
    #hamburger-menu.opened .bar:nth-child(3) {
        transform: rotate(45deg) translate(-5px, -6px);
    }
    /* 햄버거 바 클릭 시 메뉴 보이기 */
    #hamburger-menu.opened + nav {
        display: block;
    }
	header:hover{
		background: none;
	}
	#menu{
		height: 170.0625vw;
	}
	#menu-overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-size: cover;
		z-index: 5; 
		display: none; 
	}
	.ham_menu{
		position: relative;
		z-index: 1000;
		padding: 3.2552vw;
		top: 10.2292vw;
		font-size: 5.2083vw;
	}
	.hams_logo{
		position: absolute;
		top: 3.9063vw;
		left: 3.9063vw;
		z-index: 11;
	}
	.ham_menu ul li ul li a{
		font-size: 2.6042vw;
		margin-right: 3.9063vw;
	}
	.ham_menu .ham_main{
		margin-top: 6.5104vw;
	}
	.ham_sub{
		display: flex;
		flex-wrap: wrap;
	}
	.ham_subs li{
		width: 100%;
	}
}

@media (min-width: 1280px) {
	.ham_menu{
		display: none;
	}

}
 @media (max-width: 768px) {
	header .logo{
		display: none;
	}
	.bar{
		width: 7.9063vw;
		height: 0.6906vw;
		margin: 1.213vw 0;
	}
	#hamburger-menu{
		right: 0.9063vw;
	}
} 
 @media (max-width: 480px) {
 	.bar{
		width: 7.9063vw;
		height: 0.6906vw;
		margin: 1.213vw 0;
	}
	#hamburger-menu{
		right: 0.9063vw;
	}
	.ham_menu ul li ul li a {
		font-size: 3.1042vw;
		margin-right: 3.9063vw;
	}
	#menu{
		height: 180.0625vw;
	}

 }
	.login{height: 20px;display: flex; gap:20px;}
</style>

<?php if ($is_member) { 
    // 현재 로그인한 사용자의 정보를 가져옴
    $mb_info = get_member($member['mb_id']);

    // 로그인 메뉴를 표시
    ?>   
    <ul class="login">
        <li><a href="/bbs/logout.php">로그아웃</a></li>
        <?php
            if ($mb_info['mb_id'] == 'manager1') {
                echo '<li><a href="/bbs/board.php?bo_table=reousrces_2">Fixed Income</a></li>';
            } elseif ($mb_info['mb_id'] == 'manager2') {
                echo '<li><a href="/bbs/board.php?bo_table=money">Money Market</a></li>';
            } elseif ($mb_info['mb_id'] == 'manager3') {
                echo '<li><a href="/bbs/board.php?bo_table=resources">Derivatives</a></li>';
            } elseif ($mb_info['mb_id'] == 'manager4') {
                echo '<li><a href="/bbs/board.php?bo_table=archive">Notice</a></li>';
				echo '<li><a href="/bbs/board.php?bo_table=COMPLAINT">COMPLAINT</a></li>';
            } elseif ($mb_info['mb_id'] == 'admin') {
                echo '<li><a href="/adm">관리자페이지</a></li>';
			}
        ?>
    </ul>
<?php } ?>


<header>
    <div id="hamburger-menu" class="closed">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
	    <a href="/index.php" class="logo"></a>
    <nav>
        <ul>
            <li class="dropdown">
                <a href="/whoweare.php" class="tab_menu">KIDB</a>
                <ul class="submenu">
                    <li><a href="/whoweare.php">WHO WE ARE</a></li>
                    <li><a href="/dates.php">DATES TO REMEMBER</a></li>
                    <li><a href="/leadership.php">LEADERSHIP</a></li>
                    <li><a href="/workingatkidb.php">WORKING AT KIDB</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="/fixedincome.php" class="tab_menu">FIXED INCOME</a>
                <ul class="submenu">
				    <li><a href="/fixedincome.php" onMouseOver='this.innerHTML="채권시장"' onMouseOut='this.innerHTML="FIXED INCOME"'>FIXED INCOME</a></li>
                    <li><a href="/bbs/board.php?bo_table=reousrces_2" onMouseOver='this.innerHTML="자료실"' onMouseOut='this.innerHTML="RESOURCES"'>RESOURCES</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="/moneymarket.php" class="tab_menu">MONEY MARKET</a>
                <ul class="submenu">
                    <li><a href="/moneymarket.php" onMouseOver='this.innerHTML="자금시장"' onMouseOut='this.innerHTML="MONEY MARKET"'>MONEY MARKET</a></li>
                    <li><a href="/bbs/board.php?bo_table=money" onMouseOver='this.innerHTML="자료실"' onMouseOut='this.innerHTML="RESOURCES"'>RESOURCES</a></li>
                </ul>
            </li>
			<li class="dropdown">
                <a href="/derivatives.php" class="tab_menu">DERIVATIVES</a>
                <ul class="submenu">
                    <li><a href="/derivatives.php" onMouseOver='this.innerHTML="파생시장"' onMouseOut='this.innerHTML="DERIVATIVES"'>DERIVATIVES</a></li>
                    <li><a href="/bbs/board.php?bo_table=resources" onMouseOver='this.innerHTML="자료실"' onMouseOut='this.innerHTML="RESOURCES"'>RESOURCES</a></li>
                </ul>
            </li>
			<li class="dropdown">
                <a href="/contactus.php" class="tab_menu">CONTACT US</a>
                <ul class="submenu">
                    <li><a href="/contactus.php" onMouseOver='this.innerHTML="문의처"' onMouseOut='this.innerHTML="CONTACT US"'>CONTACT US</a></li>
                    <li><a href="/bbs/write.php?bo_table=inquiry" onMouseOver='this.innerHTML="온라인문의"' onMouseOut='this.innerHTML="INQUIRY"'>INQUIRY</a></li>
                </ul>
            </li>
			<li class="dropdown">
                <a href="/bbs/board.php?bo_table=archive" class="tab_menu">NOTICE</a>
                <ul class="submenu">
                    <li><a href="/bbs/board.php?bo_table=archive" onMouseOver='this.innerHTML="공지"' onMouseOut='this.innerHTML="NOTICE"'>NOTICE</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<div id="menu-overlay"></div>
<div class="ham_logo">
    <a href="/index.php" class=""><img src="../img/ham_logo.png" alt=""></a>
</div>
<div class="hams_logo" style="display: none;">
    <a href="/index.php" class=""><img src="../img/hams_logo.png" alt=""></a>
</div>
<div id="menu">
	<div class="ham_menu">
		<ul>
            <li class="ham_main">
                <a href="/index.php" class="">KIDB</a>
                <ul class="ham_sub" style="flex-wrap: wrap">
                    <li><a href="/whoweare.php">- WHO WE ARE</a></li>
                    <li><a href="/dates.php">- DATES TO REMEMBER</a></li>
                    <li><a href="/leadership.php">- LEADERSHIP</a></li>
                    <li><a href="/workingatkidb.php">- WORKING AT KIDB</a></li>
                </ul>
            </li>
            <li class="ham_main">
                <a href="/fixedincome.php" class="">FIXED INCOME</a>
                <ul class="ham_sub ham_subs">
				    <li style="margin-right:30px;"><a href="/fixedincome.php" >- FIXED INCOME (채권시장)</a></li>
                    <li><a href="/bbs/board.php?bo_table=reousrces_2">- RESOURCES (자료실)</a></li>
                </ul>
            </li>
            <li class="ham_main">
                <a href="/moneymarket.php" class="">MONEY MARKET</a>
                <ul class="ham_sub ham_subs">
                    <li style="margin-right:30px;"><a href="/moneymarket.php">- MONEY MARKET (자금시장)</a></li>
                    <li><a href="/bbs/board.php?bo_table=resources">- RESOURCES (자료실)</a></li>
                </ul>
            </li>
			<li class="ham_main">
                <a href="/derivatives.php">DERIVATIVES</a>
                <ul class="ham_sub ham_subs">
                    <li style="margin-right:30px;"><a href="/derivatives.php">- DERIVATIVES (파생시장)</a></li>
                    <li><a href="/bbs/board.php?bo_table=resources">- RESOURCES (자료실)</a></li>
                </ul>
            </li>
			<li class="ham_main">
                <a href="/contactus.php">CONTACT US</a>
                <ul class="ham_sub">
                    <li style="margin-right:30px;"><a href="/contactus.php">- CONTACT US</a></li>
                    <li><a href="/bbs/write.php?bo_table=inquiry">- INQUIRY</a></li>
                </ul>
            </li>
            <li class="ham_main"><a href="/bbs/board.php?bo_table=archive">NOTICE</a></li>
        </ul>
	</div>
</div>
<!-- jQuery 라이브러리 추가 -->


<script>
$(document).ready(function() {
    // 헤더에 마우스를 올렸을 때 서브메뉴를 항상 보여주는 기능
    $('header').hover(
        function() {
            // 모든 서브메뉴를 표시합니다
            $('.submenu').stop(true, true).slideDown('fast');
        },
        function() {
            // 모든 서브메뉴를 숨깁니다
            $('.submenu').stop(true, true).slideUp('fast');
        }
    );
});

$(document).ready(function() {
    // 화면 크기가 1280px 초과일 때만 로고 이미지 변경
    if ($(window).width() > 1280) {
        $('header').hover(
            function() {
                // 호버 시 헤더의 로고 이미지 변경
                $('.logo').css('background-image', 'url(../img/drop_logo.png)');
                
                // 네비게이션 바의 모든 텍스트를 검정색으로 변경
                $('header nav a').css('color', '#000');
            },
            function() {
                // 마우스를 떼면 다시 원래의 로고 이미지로 돌아감
                $('.logo').css('background-image', 'url(../img/header_logo.png)');
                
                // 네비게이션 바의 모든 텍스트를 다시 원래의 색상으로 돌아감
                $('header nav a').css('color', '#fff'); // 원하는 색상으로 변경 가능
            }
        );
    }

    // 나머지 스크립트는 여기에 있어야 합니다.


    // 햄버거 메뉴를 초기에 숨김
    $('#menu').hide();

    // 햄버거 버튼 클릭 시 메뉴 토글
    $('#hamburger-menu').click(function() {
        $('#menu').slideToggle('fast');
    });

    $(window).resize(function() {
        if ($(window).width() > 1280) {
            $('#menu').removeAttr('style');
        }
    });
});


$(document).ready(function() {
    var isClosed = true;

    $('#hamburger-menu').click(function() {
        if (isClosed) {
            // 햄버거 메뉴가 열리면 fixeds_mo 요소를 숨깁니다.
            $('.fixeds_mo').hide();
        } else {
            // 햄버거 메뉴가 닫히면 fixeds_mo 요소를 다시 보여줍니다.
            //$('.fixeds_mo').show();
        }

        // isClosed 변수를 토글합니다.
        isClosed = !isClosed;
    });

    // 창 크기가 변경될 때의 처리
    $(window).resize(function() {
        if ($(window).width() > 1280) {
            // 창 크기가 1280px 이상이면 fixeds_mo를 다시 보여주고,
            // 햄버거 메뉴 상태를 초기화합니다.
            $('#hamburger-menu').html('<div class="bar"></div><div class="bar"></div><div class="bar"></div>');
            isClosed = true;
        }
    });
});

$(document).ready(function() {
    var isClosed = true;

    $('#hamburger-menu').click(function() {
        if (isClosed) {
            // 햄버거 아이콘을 "X"로 변경
            $('#hamburger-menu').html('<img src="../img/x.png">');
            // 메뉴를 보여줍니다.
            $('#menu').slideDown('fast');
            // ham_logo를 숨깁니다.
            $('.ham_logo').hide();
            // hams_logo를 표시합니다.
            $('.hams_logo').show();
        } else {
            // 햄버거 아이콘을 다시 원래대로 변경
            $('#hamburger-menu').html('<div class="bar"></div><div class="bar"></div><div class="bar"></div>');
            // 메뉴를 숨깁니다.
            $('#menu').hide();
            // hams_logo를 숨깁니다.
            $('.hams_logo').hide();
            // ham_logo를 표시합니다.
            $('.ham_logo').show();
        }

        // isClosed 변수를 토글
        isClosed = !isClosed;
    });

    $(window).resize(function() {
        if ($(window).width() > 1280) {
            // 창 크기가 768px보다 크면 메뉴를 숨깁니다.
            $('#menu').hide();
            // 햄버거 아이콘을 원래대로 변경
            $('#hamburger-menu').html('<div class="bar"></div><div class="bar"></div><div class="bar"></div>');
            // hams_logo를 숨깁니다.
            $('.hams_logo').hide();
            // ham_logo를 표시합니다.
            $('.ham_logo').show();
            // isClosed 변수를 true로 설정
            isClosed = true;
        }
    });
});

</script>



<hr>

<!-- 콘텐츠 시작 { -->
