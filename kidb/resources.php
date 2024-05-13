<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet" href="../css/index.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/index.js"></script>



<style>
	.fixeds .banner_wrap .banner ul{
		display: flex;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
	}
	.fixeds .banner_wrap .banner ul li{
		height: 80px;
		width: 340px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.fixeds .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
		margin-left: 260px;
	}
	.fixeds .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.fixeds .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.fixeds .banner_wrap .banner ul li a{
		color: #fff;
	}

	/* mos */
	.fixeds .banner_mos {
		position: relative;
		width: 100%;
	}

	.fixeds .banner_mo ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
	}

	.fixeds .banner_mo li {
		margin-right: 20px;
		width: 100%;
	}

	.fixeds .banner_mo a {
		text-decoration: none;
		color: #fff;
		padding: 30px;
		font-size: 20px;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}


	.fixeds .dropdown {
		position: absolute;
		top: 85px;
		left: 0;
		display: none;
		background: #002e6c;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		z-index: 1;
		width: 100%; 
		height: 80px;
	}

	.fixeds .banner_mo li:hover .dropdown {
		display: block;
	}

	.fixeds .dropdown li {
		display: flex;
		padding: 10px;
		width: 100%; 
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
	.fixeds .fixeds_mo img{
		width: 10px;
		height: 10px;
	}

	.fixeds .info_wrapper{
		height: 100%;
		padding: 200px;
	}
	.fixeds .info_wrapper .title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	.fixeds .info_wrapper .title h2{
		font-size: 44px;
		font-weight: bold;
		margin-bottom: 40px;
	}
	.fixeds .info_wrapper .title{
		border-bottom: solid 1px #e3e3e3;
	}
	.fixeds .info_wrapper .info{
		display: flex;
		margin-top: 40px;
		gap: 40px;
	}
	.fixeds .info_wrapper .info .left{
		width: 40%;
	}
	.fixeds .info_wrapper .info .right{
		width: 40%;
	}
	.fixeds .info_wrapper .info .right span{
		font-size: 24px;
		font-weight: bold;
	}
	.fixeds .info_wrapper .info .right p{
		font-size: 16px;
		line-height: 2;
	}
	.fixeds .info_wrapper .info .left span{
		font-size: 24px;
		font-weight: bold;
	}
	.fixeds .info_wrapper .info .left p{
		font-size: 16px;
		line-height: 2;
	}
	.fixeds .info_wrapper .diagram_wrap{
		padding-top: 120px;
	}
	.fixeds .info_wrapper .diagram_wrap .kidb_img{
		position: absolute;
		left: 0;
		top: 76.32vw;
		opacity: 0.5;
		z-index: -1;
	}
	.fixeds .info_wrapper .sub_wrap .sub_tit{
		font-size: 16px;
		font-weight: bold;
		display: flex;
		justify-content: center;
		padding: 40px 0 40px 0;
	}
	.fixeds .info_wrapper .sub_wrap ul{
		display: flex;
		font-size: 16px;
		justify-content: center;
		cursor: pointer;
	}
	.fixeds .info_wrapper .sub_wrap ul li{
		width: 100%;
		border: solid 1px #ccc;
		height: 60px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
    .fixeds .info_wrapper .sub_wrap ul li:first-child.active {
		color: #fff;
        background-color: #a0935e;
        font-weight: bold;
    }
    .fixeds .info_wrapper .sub_wrap ul li.active {
		color: #fff;
        background-color: #a0935e;
        font-weight: bold;
    }
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail{
		display: flex;
		padding-top: 60px;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit span{
		font-size: 28px;
		font-weight: bold;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit p{
		font-size: 14px;
		color: #ccc;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit{
		width: 40%;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_ko{
		width: 100%;
		margin-right: 30px;
		font-size: 16px;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_en{
		width: 100%;
		font-size: 16px;
	}
	@media (max-width: 1400px) {
		.fixeds .banner_wrap .banner ul{
			font-size: 1.54vw;
			height: 5.17vw;
		}
		.fixeds .banner_wrap .banner ul li{
			height: 5.17vw;
			width: 18.71vw;
			border-left: solid 0.05vw #335889;
		}
		.fixeds .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		.fixeds .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}
		.fixeds .banner_wrap .banner ul .first{
			margin-left: 18.57vw;
		}
		.fixeds .info_wrapper .info .left,
		.fixeds .info_wrapper .info .right{
			width: 100%;
		}
	}
	@media (max-width: 1200px) {
		.fixeds .info_wrapper{
			padding: 10.29vw;
		}
	}
	@media (max-width: 950px) {
		.fixeds .info_wrapper .sub_wrap ul{
			font-size: 14px;
		}
		.fixeds .info_wrapper{
			padding: 7.29vw;
		}
	}
	@media (max-width: 768px) {
		.fixeds .info_wrapper .info{
			flex-wrap: wrap;
		}
		.fixeds .info_wrapper .sub_wrap{
			display: none;
		}
	}

	@media (max-width: 767px) {
		.fixeds .banner_wrap{
			display: none;
		}
	}
	@media (min-width: 768px) {
		.fixeds .fixeds_mo{
			display: none;
		}
	}
</style>

<div class="fixeds">
	<?php 
		$sv_tit = 'FIXED IN COME';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/fixedincome.php';
		$sv_title = 'FIXED IN COME';
		include_once('./include/sv_01.php');
	?>
	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<li class="first"><a href="/fixedincome.php">FIXED INCOME</a></li>
				<li class="fourth"><a href="/resources.php">RESOURCES</a></li>
			</ul>
		</div>
	</div>

    <div class="fixeds_mo">
        <div class="banner_mos">
            <div class="banner_mo">
                <ul>
                    <li>
                        <a href="/fixedincome.php" id="fixedIncomeBtn">FIXED INCOME <img src="../img/drop.png" alt=""></a>
                        <ul class="dropdown" id="resourcesDropdown">
                            <li><a href="/resources.php" style="padding: 20px;">RESOURCES</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

	<div class="contact">
		<div class="info_wrapper">
			<div class="title">
				<span>CONNECTING THE WORLD</span>
				<h2>FIXED INCOME</h2>
			</div>
			<div class="info">
				<div class="left">
					<span>채권시장</span><br>
					<p>KIDV는 국내외 다양한 금융회사등 전문투자자들에게 원화채권,외화채권의 중개,인수매매 서비스를 제공합니다.</p>
				</div>
				<div class="right">
					<span>FIXED IN COME</span><br>
					<p>KIDB는 국내외 다양한 금융회사등 전문투자자들에게 원호채권,외화채권의 중개,인수매매 서비스를 제공합니다.</p>
				</div>
			</div>
			<div class="diagram_wrap">
				<img src="../img/who_kidb.png" alt="" class="kidb_img">
				<div class="diagram">
					<img src="../img/diagram.png" alt="">
				</div>
			</div>
			<div class="sub_wrap">
				<div class="sub_tit">
					<h4>KIDB가 인수,중개하는 채권 상품은 다음과 같습니다.</h4>
				</div>
				<ul>
					<li>국고채</li>
					<li>통화안정증권</li>
					<li>은행채</li>
					<li>공사채</li>
					<li>회사채</li>
					<li>구조화채권</li>
					<li>FRN</li>
					<li>ABS</li>
				</ul>
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>국고채</span>
							<p>(Government Bonds)</p>
						</div>
						<div class="detail_ko">
							<p>정부에서 공공목적으로 필요한 자금 확보를 위해 발행하는 채권입니다.  입찰은 국고채 전문 딜러들과 금융기관 수요로 이루어지며 입찰은 월간 단위 정기적으로 3년 ~ 30년물을, 50년물은 시장 수요에 따라 발행합니다.</p>
						</div>
						<div class="detail_en">
							<p>A government bond or "'sovereign bond"' is a debt security issued by a government to support government spending. Korean government bonds with tenors ranging from 3 year to 30 year are issued on a monthly basis, while 50 year tenors are issued irregularly depending on the demand. Bidding participants are limited to primary dealers.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	

</div>


<script src="../js/index.js"></script>


<?php
include_once(G5_PATH.'/tail.php');