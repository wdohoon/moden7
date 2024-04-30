<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>


<style>
	.working .banner_wrap .banner ul{
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
	}
	.working .banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.working .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	.working .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.working .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.working .banner_wrap .banner ul li a{
		color: #fff;
	}
	.working .info_wrapper{
		height: 100%;
		padding: 150px 260px 150px 260px;
	}
	.working .video_wrap{
		padding: 0 260px 150px 260px;
	}
	.working .info_wrapper .title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	.working .info_wrapper .title h2{
		font-size: 44px;
		font-weight: bold;
		margin-bottom: 40px;
	}
	.working .info_wrapper .title{
		border-bottom: solid 1px #e3e3e3;
	}
	.working .info_wrapper .info{
		display: flex;
		margin-top: 40px;
		gap: 40px;
	}
	.working .info_wrapper .info .left{
		width: 50%;
	}
	.working .info_wrapper .info .right{
		width: 50%;
	}
	.working .info_wrapper .info .right h4{
		font-size: 24px;
		font-weight: bold;
	}
	.working .info_wrapper .info .right p{
		font-size: 16px;
		word-break: keep-all;
		line-height: 2;
		margin-bottom:20px;
	}
	.working .info_wrapper .info .left h4{
		font-size: 24px;
		font-weight: bold;
	}
	.working .info_wrapper .info .left p{
		font-size: 16px;		
		line-height: 2;
		margin-bottom:20px;
	}
	.working .video_wrap .video_title ul{
		display: flex;
		position: relative;
		font-size: 16px;
	}
	.working .video_wrap .video_title ul li{
		border: solid 1px #ccc;
		width: 172px;
		height: 60px;
		display: flex;
		align-items: center;
		justify-content: center;
		background: #a0935e;
		color: #fff;
		font-weight: bold;
	}
	.working .video_wrap .video{
		margin: 0 0 50px 0;
	}
/* 10 */
	.working .banner_wrap .banner ul{
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
	}
	.working .banner_wrap .banner ul li{
		height: 80px;
		width: 340px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.working .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	.working .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.working .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.working .banner_wrap .banner ul li a{
		color: #fff;
	}
	.working .banner_mos {
		position: relative;
		width: 100%;
	}

	.working .banner_mo ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
		border-bottom: solid 2px #fff;
	}

	.working .banner_mo li {
		margin-right: 20px;
		width: 100%;
	}

	.working .banner_mo a {
		text-decoration: none;
		color: #fff;
		padding: 30px;
		font-size: 20px;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.working .all-dropdowns {
		display: none;
		background: #002e6c;
		position: absolute;
		width: 100%;
		top: 100%; /* 바로 아래에 나타나도록 설정 */
		left: 0;
		z-index: 2;
	}

	.working .all-dropdowns ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.working .all-dropdowns li {
		padding: 10px;
	}

	.working .all-dropdowns ul {
		border-bottom: solid 2px #fff;
	}

	.working .fixeds_mo{
		position: absolute;
		width: 90%;
		display: flex;
		align-items: center;
		margin: 0 30px 0 30px;
		background: #002e6c;
		height: 80px;
		top: 26.04vw;
	}
	.working .fixeds_mo img{
		width: 10px;
		height: 10px;
	}
	.info img{
		z-index: -1;
		position: absolute;
		left:0;
	}
 	@media (max-width: 1720px) {
	 	.video > iframe{
			width: 100%;
			height: 41vw;
		}
	} 
	/* 1q */
	@media (max-width: 1400px) {
		.working .banner_wrap .banner ul{
			font-size: 1.64vw;
			height: 5.17vw;
		}
		.working .banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		.working .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		.working .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}
		.working .info_wrapper,
		.working .video_wrap{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		.working .info_wrapper .title{
			border-bottom: solid 0.05vw #e3e3e3;
		}
		.working .info_wrapper .info{
			margin-top: 2.08vw;
			gap: 2.08vw;
		}
		.working .info_wrapper .info{
			margin-top: 5.21vw;
			gap: 5.21vw;
		}
	}
	@media (max-width: 1024px) {
		.working .info_wrapper .info{
			flex-wrap: wrap;
		}
		.working .info_wrapper .info .left{
			width: 100%
		}
		.working .info_wrapper .info .right{
			width: 100%
		}
	}	
	@media (max-width: 768px) {
		.working .info_wrapper .title h2{
			font-size: 6.73vw
		}
		.working .banner_wrap{
			display: none;
		}
		.working .banner_mo a{
			font-size: 16px;
		}
		.working .info_wrapper,
		.working .video_wrap{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
	}
	@media (min-width: 767px) {
		.working .fixeds_mo{
			display: none;
		}
	}

</style>
<div class="working">

	<?php 
		$sv_tit = 'KIDB';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/workingatkidb.php';
		$sv_title = 'WORKING AT KIDB';
		include_once('./include/sv_01.php');
	?>

	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<li><a href="/whoweare.php">WHO WE ARE</a></li>
				<li><a href="/dates.php">DATES TO REMEMBER</a></li>
				<li><a href="/leadership.php">LEADERSHIP</a></li>
				<li class="first fourth"><a href="/workingatkidb.php">WORKING AT KIDB</a></li>
			</ul>
		</div>
	</div>

	<div class="fixeds_mo">
		<div class="banner_mos">
			<div class="banner_mo">
				<ul>                            
					<li>
						<a href="/workingatkidb.php" id="fixedIncomeBtn">WORKING AT KIDB<img src="../img/drop.png" alt=""></a>
						<div class="all-dropdowns">
							<ul class="dropdown">
								<li><a href="/whoweare.php" style="padding: 20px;">WHO WE ARE</a></li>
							</ul>
							<ul class="dropdown2">
								<li><a href="/dates.php" style="padding: 20px;">DATES TO REMEMBER</a></li>
							</ul>
							<ul class="dropdown3">
								<li><a href="/leadership.php" style="padding: 20px;">LEADERSHIP</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="info_wrapper">
		<div class="title">
			<span>CONNECTING THE WORLD</span>
			<h2>WORKING AT KIDB</h2>
		</div>
		<div class="info">
			<div class="left">
				<h4>KIDB가 추구하는 핵심 가치</h4><br>
				<p>KIDB는 회사의 성공은 직원들의 자질과 능력으로 이루어진다는 확신을 가지고 있습니다. 서로 존중하는
					기업 문화를 바탕으로 공정하고 동등한 일터를 만드는 것은 KIDB가 추구하는 핵심 가치입니다. </p>
				<p>KIDB는 고객 지향적인 사고방식과 문제 해결능력을 갖춘 기업가형 인재를 찾습니다.
					어떠한 압박 속에서도 전문성을 발휘해 해결책을 찾아내는 인재와 함께 하고자 합니다.</p>
				<p>KIDB는 '회사의 미래는 결국 사람에게 달려있다' 는 확신을 가지고 채용을 진행합니다.</p>
			</div>
			<div class="right">
				<h4>KIDB's Core values</h4><br>
				<p>We believe that our success depends on the caliber and skills of who we employ. 
					Creating a respectful, fair, and equal working environment for our employees within a 
					family like ambiance has been and will continue to be our goal as an organization.</p>
				<p>We look for people who, in addition to having a range of technical skills, are
					customer and solutions focused, entrepreneurial, professional, and being able to
					work under pressure. We believe that our recruitment procedure will bring those who will 
					fuel the future growth of our business and shape our success for many years to come.</p>
			</div>
		</div>
	</div>

		<div class="info">
			<img src="../img/who_kidb.png" alt="">
		</div>

	<div class="video_wrap">
		<div class="video_title">
			<ul>
				<li>홍보영상</li>
			</ul>
		</div>
		<div class="video">
			<iframe width="1280" height="720" src="https://play.smartucc.kr/player.php?origin=056e832bd90bdb0196d264e4fb7aebe5&width=1280&height=720" style="border: none;" allowfullscreen></iframe>
		</div>
	</div>

</div>

<script>
	$(document).ready(function () {
        var fixedIncomeBtn = $("#fixedIncomeBtn");
        var resourcesDropdown = $("#resourcesDropdown");

        // 초기에는 RESOURCES를 숨깁니다.
        resourcesDropdown.hide();

        fixedIncomeBtn.click(function (e) {
            e.preventDefault();
            resourcesDropdown.toggle(); // FIXED INCOME 버튼 클릭 시 RESOURCES를 토글하여 표시/숨깁니다.
        });
    });

	$(document).ready(function () {
		// 모든 드롭다운을 숨깁니다.
		$(".all-dropdowns").hide();

		// fixedIncomeBtn 클릭 이벤트 핸들러
		$("#fixedIncomeBtn").click(function (e) {
			e.preventDefault();
			// all-dropdowns 클래스를 가진 요소를 토글합니다.
			$(".all-dropdowns").toggle();
		});
	});

</script>


<?php
include_once(G5_PATH.'/tail.php');