<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet" href="../css/index.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
	 .banner_wrap .banner ul{
		display: flex;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
		padding-left: 260px;
	}
	 .banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	 .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	 .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	 .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	 .banner_wrap .banner ul li a{
		color: #fff;
	}

	.contacts .info_wrapper{
		height: 100%;
		padding: 150px 260px 150px 260px;
	}
	.contacts .info_wrapper .title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	.contacts .info_wrapper .title {
		font-size: 44px;
		font-weight: bold;
		margin-bottom: 40px;
	}
	.contacts .info_wrapper .info{
		display: flex;
		margin-top: 40px;
		gap: 40px;
	}
	.contacts .info_wrapper .info .left{
		width: 39%;
	}
	.contacts .info_wrapper .info .right{
		width: 38%;
	}
	.contacts .info_wrapper .info .right span{
		font-size: 18px;
	}
	.contacts .info_wrapper .info .right p{
		font-size: 16px;
		line-height: 2;
	}
	.contacts .info_wrapper .info .left span{
		font-size: 18px;
	}
	.contacts .info_wrapper .info .left p{
		font-size: 16px;
		line-height: 2;
	}
	.contacts .info_wrapper .info img{
		position: absolute;
		z-index: -1;
		bottom: 320px;
		left: 0;
	}
	.contacts .contact .info_wrapper .sub_tit{
		font-size: 24px;
		margin-top: 40px;
	}
	.contacts .contact .info_wrapper .map_wrap{
		margin-top: 50px;
	}
	.who_bg .who_box span{
		font-size: 26px !important;
	}
	.info img{
		z-index: -1;
		position: absolute;
		left:0;
		top: 50%;
	}	
	.banner_wrap  ul{
		background: #002e6c;
		height: 80px;
	}
	 .banner_wrap  ul li{
		height: 80px;
		width: 350px;
	}
	.fixeds .fixeds_mo{
		position: absolute;
		width: 90%;
		display: flex;
		align-items: center;
		margin: 0 30px 0 30px;
		background: #002e6c;
		height: 80px;
		top: 26.04vw;
	}

	@media (max-width: 1568px) {
		.contacts .info_wrapper .info .left{
			width: 40%;
		}
		.contacts .info_wrapper .info .right{
			width: 40%;
		}
	}

	@media (max-width: 1400px) {
		.banner_wrap ul{
			height: 5.17vw;	
		}
		.contacts .info_wrapper{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		.contacts .info_wrapper .info{
			margin-top: 5.08vw;
		}
		 .banner_wrap .banner ul{
			padding-left: 8.6vw;
		}
		 .info_wrapper{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		 .banner_wrap .banner ul{
			font-size: 1.54vw;
			height: 5.17vw;
		}
		 .banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		 .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		 .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}
	}
	@media (max-width: 1280px) {
		.contacts .info_wrapper .info .left{
			width: 50%;
		}
		.contacts .info_wrapper .info .right{
			width: 50%;
		}
	}

	@media (max-width: 1024px) {
		.contacts .contact .info_wrapper .map_wrap .map iframe{
			width: 80vw;
			height: 60vw;
		}
	}

	@media (max-width: 768px){
		.contacts .info_wrapper .info{
			flex-wrap: wrap;
		}
		.contacts .info_wrapper .info .left{
			width: 100%;
		}
		.contacts .info_wrapper .info .right{
			width: 100%;
		}
		.contacts .info_wrapper{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
	}
	@media (max-width: 767px) {
			.banner_wrap{
				display: none;
			}
		}
</style>

<div class="contacts">
	<?php 
		$sv_tit = 'CONTACT US';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/contactus.php';
		$sv_title = 'CONTACT US';
		include_once('./include/sv_05.php');
	
	?>
	<div class="info">
		<img src="../img/who_kidb.png" alt="">
	</div>
	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<li class="first"><a href="/bbs/board.php?bo_table=resources">Contact Us</a></li>
				<li class="fourth"><a href="/bbs/write.php?bo_table=inquiry">Inquiry</a></li>
			</ul>
		</div>
	</div>

	<div class="contact">
		<div class="info_wrapper">
			<div class="title">
				<span>KOREA'S NO.1 BROKERAGE FIRM</span>
				<h2>CONTACT US</h2>
			</div>
			<div class="solid"></div>	
			<div class="sub_tit">
				<p><strong>KIDB</strong>를 찾아오시는 길입니다.</p>
			</div>
			<div class="info">
				<div class="left">
					<span><strong>KIDB</strong> 채권중개(주)</span><br>
					<p>KIDB 서울특별시 중구 명동 11길 20 서울 YWCA빌딩(신관) 10층 (우 04538)</p>
					<p>SEOUL YWCA BLDG., 10TH FL. 20, MYEONGDONG 11-GIL, JUNG-GU, SEOUL, 04538 KOREA </p>
					<p>TEL +82-2-771-4370		EMAIL INFO@KIDBBOND.NET</p>
				</div>
				<div class="right">
					<span><strong>KIDB</strong> 자금중개(주)</span><br>
					<p>KIDB 서울특별시 중구 명동 11길 20 서울 YWCA빌딩(신관) 8층 (우 04538)</p>
					<p>SEOUL YWCA BLDG., 8TH FL. 20, MYEONGDONG 11-GIL, JUNG-GU, SEOUL, 04538 KOREA</p>
					<p>TEL +82-2-311-7500		EMAIL INFO@KIDBMBC.CO.KR</p>
				</div>
			</div>
			<div class="map_wrap">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.584259613424!2d126.98356087632307!3d37.564857624223656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca2ef8b22a4af%3A0x6d842ed3203a935b!2zS0lEQuyxhOq2jOykkeqwnCDrs7jsgqw!5e0!3m2!1sko!2skr!4v1704871385992!5m2!1sko!2skr" width="920" height="520" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>

</div>


<?php
include_once(G5_PATH.'/tail.php');