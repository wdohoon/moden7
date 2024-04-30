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

<style>
	header{
		position:absolute;
		z-index:2;
		margin:0 auto;
		padding: 2.1vw 16.7vw;
	}
	header .head_wrap{
		display: flex;
	}
	header .head_wrap .head_lg{
		width: 140px;
		height: 40px;
	}
	header .head_wrap .head_lg img{
		width: 135px;
		height: 35px;
	}
	header .head_wrap .head_ul{
		padding-left: 7.8vw;
		display: flex;
		gap: 75px;
		align-items: center;
	}
	header .head_wrap .head_ul li a{
		font-size: 16px; 
	}
	header .head_wrap .head_ul select {
		background: transparent;
		border: none; 
		outline: none; 
		width: 70px; 
		font-size: 14px; 
	}
	header .head_wrap .head_ul select option{
		color: #fff;
	}
	header .head_wrap .head_ul li:last-child{
		position: relative;
		right: -150px;
	}
	.not-main-header .head_wrap .head_ul li a,
	.not-main-header .head_wrap .head_ul select {
		color: #fff;
	}

	/* 드롭다운 메뉴 스타일 */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        z-index: 1;
		width: 100%;
		text-align:center;
    }

    .dropdown-content a {
		padding: 20px 0 0 0;
        color: black;
        text-decoration: none;
        display: block;
    }
	.dropbtn{color:#fff;}
    .dropdown:hover .dropdown-content {display: block;}
</style>

<div id="wrapper">
    <div id="container_wr">
		<header class="<?php echo !defined('index.php') ? 'not-main-header' : ''; ?>">
			<div class="head_wrap">
				<div class="head_lg">
					<a href="/index.php"><img src="/images/blue_logo.png" alt=""></a>
				</div>
				<ul class="head_ul">
					<li><a href="/company.php">COMPANY</a></li>
					<li><a href="/bbs/board.php?bo_table=p11">ARTIST</a></li>
					<li class="dropdown">
						<div class="dropbtn"><a href="/bbs/board.php?bo_table=media">PR CENTER</a></div>
						<div class="dropdown-content">
							<a href="/bbs/board.php?bo_table=media">NOTICE</a>
							<a href="/bbs/board.php?bo_table=news">NEWS</a>
							<a href="/bbs/board.php?bo_table=p53">MEDIA</a>
						</div>
					</li>
					<li><a href="/bbs/board.php?bo_table=board">SCHEDULE</a></li>
					<li><a href="/audition.php">AUDITION</a></li>
					<li>
						<img src="/images/head_la.png" alt="">
						<select name="" id="">
							<option value="KR">KR</option>
							<option value="EN">EN</option>
						</select>
					</li>
				</ul>
			</div>
		</header>

		
    <div id="container">
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }