<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>
<link rel="stylesheet" href="../css/index.css">
<style>
	.ship .banner_wrap .banner ul{
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
	}
	.ship .banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.ship .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	.ship .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.ship .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.ship .banner_wrap .banner ul li a{
		color: #fff;
	}
	.ship .info_wrap{
		height: 100%;
		padding: 150px 260px 150px 260px;
	}
	.ship .info_wrap .title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	.ship .info_wrap .title h2{
		font-size: 44px;
		font-weight: bold;
		margin-bottom: 40px;
	}

	.ship .info_wrap .solid{
		border: solid 1px #e3e3e3;
		margin: 40px 0 40px 0;
	}

	.ship .banner_mos {
		position: relative;
		width: 100%;
	}

	.ship .banner_mo ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
	}

	.ship .banner_mo li {
		margin-right: 20px;
		width: 100%;
	}

	.ship .banner_mo a {
		text-decoration: none;
		color: #fff;
		padding: 30px;
		font-size: 20px;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.ship .all-dropdowns {
		display: none;
		background: #002e6c;
		position: absolute;
		width: 100%;
		top: 100%; /* 바로 아래에 나타나도록 설정 */
		left: 0;
		z-index: 2;
	}

	.ship .all-dropdowns ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.ship .all-dropdowns li {
		padding: 10px;
	}

	.ship .all-dropdowns ul {
		border-bottom: solid 2px #fff;
	}

	.ship .fixeds_mo{
		position: absolute;
		width: 90%;
		display: flex;
		align-items: center;
		margin: 0 30px 0 30px;
		background: #002e6c;
		height: 80px;
		top: 26.04vw;
	}
	.info_wrap .employee_wrap{
		display: flex;
		gap: 40px;
		line-height: 2;
		flex-wrap: wrap;
	}
	.info_wrap .employee_wrap .picture{
		width: 560px;
	}
	.info_wrap .employee_wrap .picture img{
		width: 560px;
	}
	.info_wrap .employee_wrap .employee_info .names{
		font-size: 18px;
		display: flex;
		flex-direction: column;
	}
	.info_wrap .employee_wrap .employee_info .names span{
		font-size: 32px;
		color: #002e6c;
	}
	.info_wrap .employee_wrap .employee_info .edu_wrap{
	    display: flex;
		gap: 40px;
		flex-wrap: wrap;
	}
	.info_wrap .employee_wrap .employee_info .edu_wrap .education,
	.info_wrap .employee_wrap .employee_info .edu_wrap .career{
		margin-top: 50px;
		display: flex;
		flex-direction: column;
	}

	.info_wrap .employee_wrap .employee_info .edu_wrap span{
		font-size: 24px;
		font-weight: bold;
	}
	.info_wrap .employee_wrap .employee_info .edu_wrap p{
		font-size: 16px;
		color: #303030;
		opacity: 0.6;
	}
	.info_wrap .home_btn{
		display: flex;
		justify-content: center;
		font-size: 16px;
	}
	.info_wrap .home_btn a{
		border-bottom: solid 2px #ccc;
	}
	.info img{
		z-index: -1;
		position: absolute;
		left:0;
		top: 50%;
	}
	.employee_info p{
		word-break: break-word;
	}
	@media (max-width: 1400px) {
		.ship .info_wrap{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}

		.ship .banner_wrap .banner ul{
			font-size: 1.64vw;
			height: 5.17vw;
		}
		.ship .banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		.ship .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		.ship .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}

	}
	@media (max-width: 768px) {
		.ship .banner_wrap{
			display: none;
		}
		.ship .info_wrap{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}

	}
	@media (min-width: 767px) {
		.ship .fixeds_mo{
			display: none;
		}
	}
	@media (max-width: 540px) {
		.ship .fixeds_mo{
			margin: 0 20px 0 20px;
		}
	}
</style>
<div class="ship">

	<?php 
		$sv_tit = 'KIDB';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/leadership.php';
		$sv_title = 'LEADERSHIP';
		include_once('./include/sv_01.php');
	?>

	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<li><a href="/whoweare.php">WHO WE ARE</a></li>
				<li><a href="/dates.php">DATES TO REMEMBER</a></li>
				<li class="first"><a href="/leadership.php">LEADERSHIP</a></li>
				<li class="fourth"><a href="/workingatkidb.php">WORKING AT KIDB</a></li>
			</ul>
		</div>
	</div>

	<div class="fixeds_mo">
		<div class="banner_mos">
			<div class="banner_mo">
				<ul>                            
					<li>
						<a href="/leadership.php" id="fixedIncomeBtn">LEADERSHIP<img src="../img/drop.png" alt=""></a>
						<div class="all-dropdowns">
							<ul class="dropdown">
								<li><a href="/whoweare.php" style="padding: 20px;">WHO WE ARE</a></li>
							</ul>
							<ul class="dropdown2">
								<li><a href="/dates.php" style="padding: 20px;">DATES TO REMEMBER</a></li>
							</ul>
							<ul class="dropdown3">
								<li><a href="/workingatkidb.php" style="padding: 20px;">WORKING AT KIDB</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<?php 
	$wr_id = $_GET['wr_id'];

	$sql ="select * from g5_write_leadership where wr_id = '$wr_id' ";
	$row = sql_fetch($sql);
	
	$sql2 = "select * from g5_board_file where bo_table = 'leadership' and wr_id = '$wr_id'";
	$row2 = sql_fetch($sql2);
	?>
	<div class="info_wrap">
		<div class="title">
			<span>CONNECTING THE WORLD</span>
			<h2>LEADERSHIP</h2>
		</div>

		<div class="solid"></div>

		<div class="employee_wrap">
			<div class="picture">
				<img src="/data/file/leadership/<?php echo $row2['bf_file'];?>" alt="">
			</div>
			<div class="info">
				<img src="../img/who_kidb.png" alt="">
			</div>
			<div class="employee_info">
				<div class="names">
					<span><?php echo str_replace('&nbsp;',' ',$row['wr_8']); ?></span>
					<?php echo str_replace('&nbsp;',' ',$row['wr_1']); ?>
				</div>

				<div class="edu_wrap">
					<div class="education">
						<?php // echo str_replace('&nbsp;',' ', $row['wr_2']); ?>
						<?php  //echo str_replace('&nbsp;',' ',$row['wr_3']); ?>
						<?php echo $row['wr_2']; ?>
						<?php echo $row['wr_3']; ?>
					</div>
				</div>

				<div class="names" style="margin-top: 100px;">
					<span><?php echo str_replace('&nbsp;',' ',$row['wr_4']); ?></span>
					<?php echo str_replace('&nbsp;',' ',$row['wr_5']); ?>
				</div>

				<div class="edu_wrap">
					<div class="education">
						<?php //echo str_replace('&nbsp;',' ',$row['wr_6']); ?>
						<?php //echo str_replace('&nbsp;',' ',$row['wr_7']); ?>
						<?php echo $row['wr_6']; ?>
						<?php echo $row['wr_7']; ?>
					</div>
				</div>

			</div>
		</div>
		<div class="solid"></div>
		<div class="home_btn">
			<a href="leadership.php">목록으로</a>
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