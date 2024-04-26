<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>
<link rel="stylesheet" href="../css/index.css">
<style>
	.ship .ship_bg{
		background: url(../img/who_bg.png) no-repeat center center/cover;
		height: 600px;
	}
	.ship .ship_bg img{
		position: absolute;
		top: 160px;
		left: 760px;
		opacity: 0.1;
		width: 860px;
		height: 260px;
	}
	.ship .ship_bg .ship_box{
		position: relative;
		width: 320px;
		height: 320px;
		background: #002e6c;
		color: #fff;
		padding: 50px;
		top: 160px;
		left: 270px;
	}
	.ship .ship_bg .ship_box p a{
		color: #fff;
		font-size: 13px;
	}
	.ship .ship_bg .ship_box span{
		position:relative;
		top:20px;
		font-size: 44px;
		font-weight: bold;
	}
	.ship .ship_bg .ship_box p{
		position:relative;
		top: 135px;
	}
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
		line-height: 2;
	}
	.ship .info_wrap .title{
		line-height: 1.2;
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
	
	.ship .info_wrap .info img{
		z-index: -1;
		position: absolute;
		left:0;
	}
	.ship .info_wrap .leaders{
		gap: 60px;
		display: flex;
		flex-direction: column;
	}
	.ship .info_wrap .income,
	.ship .info_wrap .markets{
		margin-top: 120px;
	}
	.ship .info_wrap .income .income_title,
	.ship .info_wrap .markets .market .market_title{
		gap: 10px;
		display: flex;
		align-items: center;
		flex-wrap: wrap;
	}
	.ship .info_wrap .income .income_title h3,
	.ship .info_wrap .markets .market .market_title h3{
		font-size: 28px;
		color: #002e6c;
	}
	.ship .info_wrap .income .income_title h4,
	.ship .info_wrap .markets .market .market_title h4{
		font-size: 20px;
		color: #002e6c;
	}
	.ship .info_wrap .income .income_sub_title,
	.ship .info_wrap .markets .market .market_sub_title,
	.ship .info_wrap .markets .market .markets_sub_title{
		gap: 10px;
		display: flex;
		align-items: center;
		margin-bottom: 60px;
		flex-wrap:wrap;
	}
	.ship .info_wrap .income .income_sub_title span,
	.ship .info_wrap .markets .market .market_sub_title span,
	.ship .info_wrap .markets .market .markets_sub_title span{
		font-size: 20px;
		color: #002e6c;
		font-weight: bold;
	}
	.ship .info_wrap .income .income_sub_title p,
	.ship .info_wrap .markets .market .market_sub_title p,
	.ship .info_wrap .markets .market .markets_sub_title p{
		font-size: 18px;
		color: #002e6c;
		font-weight: bold;
	}	
	.ship .info_wrap .leaders .leader,
	.ship .info_wrap .bonds .bond,
	.ship .info_wrap .funds .fund,
	.ship .info_wrap .derivations .derivation{
		width: 320px;
		display: flex;
		flex-direction: column;
	}

	.ship .info_wrap .leaders .leader p,
	.ship .info_wrap .bonds .bond p,
	.ship .info_wrap .funds .fund p,
	.ship .info_wrap .derivations .derivation p{
		font-size: 14px;
	}
	.ship .info_wrap .leaders .leader span,
	.ship .info_wrap .bonds .bond span,
	.ship .info_wrap .funds .fund span,
	.ship .info_wrap .derivations .derivation span{
		font-size: 20px;
		color: #002e6c;
		font-weight: bold;
		margin-top: 10px;
	}

	.ship .info_wrap .solid{
		border: solid 1px #e3e3e3;
		margin: 40px 0 40px 0;
	}
	.ship .info_wrap .solid2{
		border: solid 1px #e3e3e3;
		margin: 20px 0 20px 0;
	}
	.ship .info_wrap .income .bonds,
	.ship .info_wrap .markets .market .funds,
	.ship .info_wrap .markets .market .derivations{
		display: flex;
		gap: 40px;
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
	.ship .fixeds_mo img{
		width: 10px;
		height: 10px;
	}
	@media (max-width: 1920px) {
		.ship .ship_bg .ship_box{
			top: 8.33vw;
			left: 14.06vw;
		}
	}
	@media (max-width: 1680px) {
		.ship .ship_bg .ship_box{
			left: 10.06vw;
		}
		.ship .ship_bg img{
			top: 9.52vw;
			left: 45.24vw;
			opacity: 0.1;
			width: 51.19vw;
			height: 15.48vw;
		}
	}
	@media (max-width: 1400px) {
		.ship .info_wrap{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		.ship .ship_bg{
			height: 31.25vw;
		}
		.ship .ship_bg .ship_box{
			width: 16.67vw;
			height: 16.67vw;
			padding: 2.60vw;
			top: 8.33vw;
			left: 12.06vw;
		}
		.ship .ship_bg .ship_box p a{
			font-size: 0.78vw;
		}
		.ship .ship_bg .ship_box span{
			top:1.04vw;
			font-size: 2.79vw;
		}
		.ship .ship_bg .ship_box p{
			display: flex;
			top: 6.03vw;
			gap: 1px;	
			align-items: center;
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
		.ship .info_wrap .income .bonds,
		.ship .info_wrap .markets .market .funds,
		.ship .info_wrap .markets .market .derivations{
			flex-wrap: wrap;
		}
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

	<div class="info_wrap">
		<div class="title">
			<span>CONNECTING THE WORLD</span>
			<h2>LEADERSHIP</h2>
		</div>
		<div class="solid"></div>
		<div class="info">
			<img src="../img/who_kidb.png" alt="">
		</div>
		<div class="leaders">
			<!-- <div class="leader">
				<img src="../img/soo.png" alt="">
				<span>오영수</span>
				<p>KIDB 회장</p>
			</div>
			<div class="leader">
				<img src="../img/young.png" alt="">
				<span>황호영</span>
				<p>KIDB 채권중개/자금중개 대표이사</p>
			</div>
			<div class="leader">
				<img src="../img/jeong.png" alt="">
				<span>오윤정</span>
				<p>KIDB 채권중개/자금중개 부사장</p>
			</div> -->
				<?php
				$sql = "select * from g5_write_leadership where ca_name = '경영진' ";
				$result = sql_query($sql);
				
				for($i=0; $row = sql_fetch_array($result); $i++){
					$sql  = "select * from g5_board_file where bo_table = 'leadership' and wr_id = '{$row['wr_id']}'";
					$herf = sql_fetch($sql);
				?>
				<a class="leader" href="/leadership_view.php?wr_id=<?php echo $row['wr_id'];?>">
					<img src="/data/file/leadership/<?php echo $herf['bf_file'];?>" alt="">
					<span><?php echo $row['wr_8']; ?></span>
					<p><?php echo $row['wr_1']; ?></p>
				</a>
				<?php } ?> 
		</div>

		<div class="income">
			<div class="income_title">
				<h3>KIDB 채권중개</h3>
				<h4>KIDB Fixed Income Brokerage Co.</h4>
			</div>
			<div class="solid2"></div>
			<div class="income_sub_title">
				<span>채권시장본부</span>
				<p>Fixed Income Market Dept.</p>
			</div>
			<div class="bonds">
				<!-- <div class="bond">
					<img src="../img/auk.png" alt="">
					<span>김상억</span>
					<p>채권시장본부 본부장</p>
				</div>
				<div class="bond">
					<img src="../img/tae.png" alt="">
					<span>장병태</span>
					<p>채권시장본부 전무</p>
				</div> -->
				<?php
				$sql = "select * from g5_write_leadership where ca_name = '채권시장본부' ";
				$result = sql_query($sql);
				
				for($i=0; $row = sql_fetch_array($result); $i++){
					$sql  = "select * from g5_board_file where bo_table = 'leadership' and wr_id = '{$row['wr_id']}'";
					$herf = sql_fetch($sql);
				?>
				<a class="bond" href="/leadership_view.php?wr_id=<?php echo $row['wr_id'];?>">
					<img src="/data/file/leadership/<?php echo $herf['bf_file'];?>" alt="">
					<span><?php echo $row['wr_8']; ?></span>
					<p><?php echo $row['wr_1']; ?></p>
				</a>
			<?php } ?> 
			</div>
		</div>
		
		<div class="markets">
			<div class="market">
				<div class="market_title">
					<h3>KIDB 자금중개</h3>
					<h4>KIDB Money Market Brokerage Co.</h4>
				</div>
				<div class="solid2"></div>
				<div class="market_sub_title">
					<span>자금시장본부</span>
					<p>Money Market Dept.</p>
				</div>
				<div class="funds">
<!-- 					<div class="fund">
						<img src="../img/gon.png" alt="">
						<span>김대곤</span>
						<p>자금시장본부 본부장</p>
					</div>
					<div class="fund">
						<img src="../img/hyun.png" alt="">
						<span>박재현</span>
						<p>자금시장본부 이사</p>
					</div> -->
					<?php
					$sql = "select * from g5_write_leadership where ca_name = '자금시장본부' ";
					$result = sql_query($sql);
					
					for($i=0; $row = sql_fetch_array($result); $i++){
						$sql  = "select * from g5_board_file where bo_table = 'leadership' and wr_id = '{$row['wr_id']}'";
						$herf = sql_fetch($sql);
					?>
					<a class="fund" href="/leadership_view.php?wr_id=<?php echo $row['wr_id'];?>">
						<img src="/data/file/leadership/<?php echo $herf['bf_file'];?>" alt="">
						<span><?php echo $row['wr_8']; ?></span>
						<p><?php echo $row['wr_1']; ?></p>
					</a>
				<?php } ?> 
				</div>
				<div class="solid2"></div>
				<div class="markets_sub_title">
					<span>파생시장본부</span>
					<p>Derivatives Market Dept.</p>
				</div>
				<div class="derivations">
<!-- 					<div class="derivation">
						<img src="../img/woon.png" alt="">
						<span>이종운</span>
						<p>파생시장본부 본부장</p>
					</div>
					<div class="derivation">
						<img src="../img/sik.png" alt="">
						<span>변혜식</span>
						<p>파생시장본부 전무/이자율파생시장 부문장</p>
					</div>
					<div class="derivation">
						<img src="../img/park.png" alt="">
						<span>박재현</span>
						<p>파생시장본무 상무/외환파생시장 부문장</p>
					</div> -->
					<?php
					$sql = "select * from g5_write_leadership where ca_name = '파생시장본부' ";
					$result = sql_query($sql);
					
					for($i=0; $row = sql_fetch_array($result); $i++){
						$sql  = "select * from g5_board_file where bo_table = 'leadership' and wr_id = '{$row['wr_id']}'";
						$herf = sql_fetch($sql);
					?>
					<a class="derivation" href="/leadership_view.php?wr_id=<?php echo $row['wr_id'];?>">
						<img src="/data/file/leadership/<?php echo $herf['bf_file'];?>" alt="">
						<span><?php echo $row['wr_8']; ?></span>
						<p><?php echo $row['wr_1']; ?></p>
					</a>
				<?php } ?> 
				</div>

			</div>
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