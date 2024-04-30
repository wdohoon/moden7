<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet" href="../css/index.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
	.dates .info_wrapper{
		height: 100%;
		padding: 150px 260px 150px 260px;
	}
	.dates .info_wrapper .title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	.dates .info_wrapper .title h2{
		font-size: 44px;
		font-weight: bold;
		margin-bottom: 40px;
	}
	.dates .dates_wrap .dates_btn ul{
		display: flex;
		position: relative;
		font-size: 16px;
	}
	.dates .dates_wrap .dates_btn ul li{
		border: solid 1px #ccc;
		width: 172px;
		height: 60px;
		display: flex !important;
		align-items: center;
		justify-content: center;
		cursor: pointer;
	}
	.dates_wrap .dates_btn ul .ko,
	.dates_wrap .dates_btn ul .en{
		color: #ccc;
	}
	.dates_wrap .dates_btn ul .ko.active,
	.dates_wrap .dates_btn ul .en.active{
		font-weight: bold;
		background: #a0935e;
		color: #fff;
	}
	.dates .dates_wrap .border{
		border-bottom: solid 1px #ccc;
		margin: 40px 0 40px 0;
	}
	.dates .before .before_title,
	.dates .after .after_title{
		width: 25%;
		position: relative;
		top: 40px;
	}
	.dates .before .before_title h3,
	.dates .after .after_title h3{
		font-size: 40px;
		color: #002e6c;
		margin-right: 30px;
	}
	.dates .before .before_subs .before_sub h4,
	.dates .after .after_subs .after_sub h4{
		margin-bottom: 10px;
		font-size: 16px;
		font-weight: bold;
		color: #002e6c;
	}
	.dates .before .before_subs .before_sub  span,
	.dates .after .after_subs .after_sub span{
		font-size: 14px;
	}
	.dates .dates_wrap .before,
	.dates .dates_wrap .after{
		display: flex;
		height: auto;
		/* opacity:0.2; */
	}
	.dates .dates_wrap .after{
		padding: 150px 0 0 0;
		height: 700px;
	}
	.dates .before .before_subs,
	.dates .after .after_subs{
		width: 75%;
		display: flex;
		flex-wrap: wrap;
		align-items: center;
	}
	.dates .before .before_subs .before_sub,
	.dates .after .after_subs .after_sub{
		width: calc(33.33% - 20px);
        margin-right: 20px;
        margin-bottom: 20px;
	}
	.dates .dates_wrap .before_img img,
	.dates .dates_wrap .after_img img{
		width:100%;
	}
	.dates .dates_wrap .after_img{
		padding: 50px 0 50px 0;
	}

	.dates .before .before_title h3::before,
	.dates .after .after_title h3::before {
		content: "";
		display: inline-block;
		width: 20px;
		height: 20px; 
		background-color: #002e6c; 
		border: 5px solid #ccc; 
		border-radius: 50%; 
		margin-right: 10px; 
	}
	.dates .banner_wrap .banner ul{
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
	}
	.dates .banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.dates .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	.dates .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.dates .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.dates .banner_wrap .banner ul li a{
		color: #fff;
	}
	.dates .banner_mos {
		position: relative;
		width: 100%;
	}

	.dates .banner_mo ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
		border-bottom: solid 2px #fff;
	}

	.dates .banner_mo li {
		margin-right: 20px;
		width: 100%;
	}

	.dates .banner_mo a {
		text-decoration: none;
		color: #fff;
		padding: 30px;
		font-size: 20px;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.dates .all-dropdowns {
		display: none;
		background: #002e6c;
		position: absolute;
		width: 100%;
		top: 100%; /* 바로 아래에 나타나도록 설정 */
		left: 0;
		z-index: 2;
	}

	.dates .all-dropdowns ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.dates .all-dropdowns li {
		padding: 10px;
	}

	.dates .all-dropdowns ul {
		border-bottom: solid 2px #fff;
	}

	.dates .fixeds_mo{
		position: absolute;
		width: 90%;
		display: flex;
		align-items: center;
		margin: 0 30px 0 30px;
		background: #002e6c;
		height: 80px;
		top: 26.04vw;
	}
	.dates .fixeds_mo img{
		width: 10px;
		height: 10px;
	}
		@media (max-width: 1400px) {

		.dates .banner_wrap .banner ul{
			font-size: 1.64vw;
			height: 5.17vw;
		}
		.dates .banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		.dates .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		.dates .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}
		.dates .info_wrapper{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
	}

	@media (max-width: 1300px) {
		.dates .dates_wrap .after{
			height: 90vw;
		}
	}

	@media (max-width: 1200px) {
		.dates .before .before_title h3,
		.dates .after .after_title h3{
			font-size: 3.33vw;
		}
		.dates .before .before_title,
		.dates .after .after_title{
			width: 30%;
		}
	}
	@media (max-width: 1024px) {
		.dates .before .before_title h3,
		.dates .after .after_title h3{
			font-size: 4.33vw;
		}
		.dates .dates_wrap .before{
			height:auto;
			flex-direction: column;
		}
		.dates .dates_wrap .after{
			height:auto;
			flex-direction: column;
		}
		.dates .before .before_subs, 
		.dates .after .after_subs{
			margin-top: 80px;
		}
		.dates .before .before_title, 
		.dates .after .after_title{
			width: 100%;
		}
		.dates .before .before_subs,
		.dates .after .after_subs{
			width: 100%;
		}
		.dates .dates_wrap .after{
			padding: 50px 0 0 0;
		}
	}
	@media (max-width: 970px) {
		.dates .dates_wrap .before{
			height:auto;
		}
		.dates .dates_wrap .after{
			height:auto;
		}
	}
	@media (max-width: 768px) {
		.dates .info_wrapper{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
		.dates .dates_wrap .before{
			height:auto;
		}
		.dates .dates_wrap .after{
			height:auto;
		}
		.dates .before .before_subs .before_sub, 
		.dates .after .after_subs .after_sub{
			width: 100%;
		}
		.dates .before .before_title h3, 
		.dates .after .after_title h3{
			font-size: 5.33vw;
		}
		.dates .dates_wrap .dates_btn ul li{
			width: 100%;
		}
		.dates .banner_wrap{
			display: none;
		}
		.dates .banner_mo a{
			font-size: 16px;
		}
	}
	@media (min-width: 767px) {
		.dates .fixeds_mo{
			display: none;
		}
	}
	@media (max-width: 540px) {
		.dates .info_wrapper{
			padding: 20.67vw 2.67vw 0 2.67vw;
		}
		.dates .fixeds_mo{
			margin: 0 20px 0 20px;
		}
	}


</style>

<div class="dates">
	<?php 
		$sv_tit = 'KIDB';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/dates.php';
		$sv_title = 'DATES TO REMEMBER';
		include_once('./include/sv_01.php');
	
	?>

	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<li><a href="/whoweare.php">WHO WE ARE</a></li>
				<li class="first"><a href="/dates.php">DATES TO REMEMBER</a></li>
				<li><a href="/leadership.php">LEADERSHIP</a></li>
				<li class="fourth"><a href="/workingatkidb.php">WORKING AT KIDB</a></li>
			</ul>
		</div>
	</div>

	<div class="fixeds_mo">
		<div class="banner_mos">
			<div class="banner_mo">
				<ul>                            
					<li>
						<a href="dates.php" id="fixedIncomeBtn">DATES TO REMEMBER<img src="../img/drop.png" alt=""></a>
						<div class="all-dropdowns">
							<ul class="dropdown">
								<li><a href="/whoweare.php" style="padding: 20px;">WHO WE ARE</a></li>
							</ul>
							<ul class="dropdown2">
								<li><a href="/leadership.php" style="padding: 20px;">LEADERSHIP</a></li>
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

	<div class="info_wrapper">
		<div class="title">
			<span>CONNECTING THE WORLD</span>
			<h2>DATES TO REMEMBER</h2>
		</div>

	<div class="dates_wrap">
		<div class="dates_btn">
			<ul>
				<li class="ko button-toggle kor_ver active" data-target="kor_ver">연혁</li>
				<li class="en button-toggle en_ver" data-target="en_ver">History</li>
			</ul>
		</div>
		<div class="border"></div>

		<div class="kor_ver">
			<div class="before">
				<div class="before_title">
					<h3>현재 ~ 2010</h3>
				</div>
				<div class="before_subs">
					<div class="before_sub">
						<h4>2017.02.08</h4>
						<span>사채권에 대한 투자매매, 인수 업무 인가 취득(금융위)</span>
					</div>
					<div class="before_sub">
						<h4>2016.10.01</h4>
						<span>해외채권중개영업 업무개시</span>
					</div>
					<div class="before_sub">
						<h4>2012.04.25</h4>
						<span>KIDB자금중개 외국환중개 업무 인가 취득(재경부)</span>
					</div>
					<div class="before_sub">
						<h4>2011.06.01</h4>
						<span>KIDB자금중개 투자중개업(이자율을 기초자산으로 하는 장외파생상품, 기과눝자가 대상) 인가 취득(금융위)</span>
					</div>
					<div class="before_sub">
						<h4>2010.09.17</h4>
						<span>KIDB채권중개 금융투자협회 회원 가입</span>
					</div>
					<div class="before_sub">
						<h4>2010.08.23</h4>
						<span>KIDB채권중개 한국거래소 회원 가입</span>
					</div>
				</div>
			</div>
				<div class="before_img">
					<img src="../img/before.png" alt="">
				</div>

			<div class="after">
				<div class="after_title">
					<h3>2009 ~ 2000</h3>
				</div>
				<div class="after_subs">
					<div class="after_sub">
						<h4>2009.08.26</h4>
						<span>KIDB채권중개 투자매매업(국채,지압채,공사채,특수은행채 등의 특수채 전문투자자 대상) 및 투자중개업(채무증권중개,전문투자자 대상) 인가 취득(금강원)</span>
					</div>
					<div class="after_sub">
						<h4>2008.04.04</h4>
						<span>KIDB자금중개 증권예탁결제원의 우수고객으로 선정</span>
					</div>
					<div class="after_sub">
						<h4>2007.08.01</h4>
						<span>KIDB자금중개 REPO중개업무 개시</span>
					</div>
					<div class="after_sub">
						<h4>2006.11.15</h4>
						<span>KIDB_LCAP외국환중개 지분 매각</span>
					</div>
					<div class="after_sub">
						<h4>2006.01.20</h4>
						<span>KIDB자금중개 출차 승인(지분율 100%)2006.03.24일자로 금융감독위원회로부터 자금중개회사 설립 승인을 받아 2006.04.12일자로 영업개시</span>
					</div>
					<div class="after_sub">
						<h4>2004.10.07</h4>
						<span>KIDB_ICAP외국환중개 재경부로부터 외곡환중개업무 인가 취득</span>
					</div>
					<div class="after_sub">
						<h4>2004.02.27</h4>
						<span>KIDB_ICAP외국환중개에 대한 출자승인 취득(금감위)</span>
					</div>
					<div class="after_sub">
						<h4>2003.03.26</h4>
						<span>양도성예금증서 중개업무 신고서 수리 및 업무개시</span>
					</div>
					<div class="after_sub">
						<h4>2003.03.26</h4>
						<span>금융감독위원회로부터 증권업(채권중개 업무영위) 영위 허가</span>
					</div>
					<div class="after_sub">
						<h4>2000.08.18</h4>
						<span>영업개시</span>
					</div>
					<div class="after_sub">
						<h4>2000.08.14</h4>
						<span>금융감독위원회로부터 증권업(채권중개 업무영위) 영위 허가</span>
					</div>
					<div class="after_sub">
						<h4>2000.05.24</h4>
						<span>KIDB채권중개 설립</span>
					</div>
				</div>
			</div>
			<div class="after_img">
				<img src="../img/after.png" alt="">
			</div>
		</div>


		<!-- en -->
		<div class="en_ver">
			<div class="before">
				<div class="before_title">
					<h3>TODAY ~ 2010</h3>
				</div>
				<div class="before_subs">
					<div class="before_sub">
						<h4>FEB 8 2017</h4>
						<span>ACQUIRED LICENSE TO DEALAND UNDERWRITE CORPORATE BONDS FROM FSC</span>
					</div>
					<div class="before_sub">
						<h4>OCT 1 2016</h4>
						<span> COMMENCED NON-DOMESTIC CURRENCY BONDS BROKERAGE BUSINESS</span>
					</div>
					<div class="before_sub">
						<h4>APR 25 2012</h4>
						<span>KIDB MONEY BROKERAGE CO.ACQUIRED FX DERIVATIVES BROKERAGE LICENSE FROM MINISTRY OF FINANCE</span>
					</div>
					<div class="before_sub">
						<h4>JUN 01 2011</h4>
						<span>KIDB MONEY BROKERAGE CO.ACQUIRED IRS BROKERAGE LICENSE FROM FSC</span>
					</div>
					<div class="before_sub">
						<h4>SEP 17 2010</h4>
						<span>REGISTERED AS A MEMBER OF KOREA FINANCIAL INVESTMENT ASSOCIATION</span>
					</div>
					<div class="before_sub">
						<h4>AUG 23 2010</h4>
						<span>REGISTERED AS A MEMBER OF THE KOREA EXCHANGE</span>
					</div>
				</div>
			</div>
				<div class="before_img">
					<img src="../img/before.png" alt="">
				</div>

			<div class="after">
				<div class="after_title">
					<h3>2009 ~ 2000</h3>
				</div>
				<div class="after_subs">
					<div class="after_sub">
						<h4>AUG 26 2009</h4>
						<span>ACQUIRED GOVERNMENT, MUNICIPAL, CORPORATE, AND PUBLIC FINANCE BONDS BROKERAGE LICENSE</span>
					</div>
					<div class="after_sub">
						<h4>APR 4 2008</h4>
						<span>RECEIVED “BEST CLIENT FOR EXCELLENCE” FROM KOREA SECURITIES DEPOSITORY.</span>
					</div>
					<div class="after_sub">
						<h4>AUG 1 2007</h4>
						<span>COMMENCED REPO BROKERAGE BUSINESS WITH INITIATING KOREA’S FIRST REPO TRADE</span>
					</div>
					<div class="after_sub">
						<h4>NOV 15 2006</h4>
						<span>SOLD KIDB-ICAP SHARES TO ICAP</span>
					</div>
					<div class="after_sub">
						<h4>JAN 20 2006</h4>
						<span>ESTABLISHED KIDB MONEY BROKERAGE CORP. AS A FULLY OWNED SUBSIDIARY SERVICING CALL MONEY AND REPOS MAR 24 2006 ACQUIRED CALL MONEY AND REPO BROKERAGE LICENSE FROM THE FSS. APR 12 2006 KIDB MONEY BROKERAGE CO. COMMENCED TRADING</span>
					</div>
					<div class="after_sub">
						<h4>OCT 07 2004</h4>
						<span>ACQUIRED FX DERIVATIVES AND IRS BROKERAGE LICENSE FOR KIDB-ICAP FROM THE MINISTRY OF FINANCE AND FSC</span>
					</div>
					<div class="after_sub">
						<h4>FEB 27 2004</h4>
						<span>ACQUIRED THE APPROVAL FOR KIDB-ICAP JOINT VENTURE BY THE FSC</span>
					</div>
					<div class="after_sub">
						<h4>MAR 26 2003</h4>
						<span>COMMENCED CD (CERTIFICATE OF DEPOSIT)BROKERAGE BUSINESS</span>
					</div>
					<div class="after_sub">
						<h4>AUG 18 2000</h4>
						<span>Commenced trading</span>
					</div>
					<div class="after_sub">
						<h4>AUG 14 2000</h4>
						<span>ACQUIRED FIXED INCOME BROKERAGE LICENSE FROM THE FSC(FINANCIAL SERVICES COMMISSION)</span>
					</div>
					<div class="after_sub">
						<h4>MAY 24 2000</h4>
						<span>ESTABLISHED KIDB FIXED INCOME BROKERAGE CO.</span>
					</div>
				</div>
			</div>
			<div class="after_img">
				<img src="../img/after.png" alt="">
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		// 초기에 "kor_ver" 내용을 보이도록 설정
		$(".en_ver").hide();
		$(".kor_ver").show();

		// "kor_ver" 버튼을 클릭하면 연혁 스타일을 적용하고 "en_ver" 버튼 스타일을 원래대로 되돌립니다.
		$(".ko.button-toggle").click(function () {
			$(".en_ver").hide();
			$(".kor_ver").show();
			// 스타일 변경
			$(".ko.button-toggle").addClass("active");
			$(".en.button-toggle").removeClass("active");
		});

		// "en_ver" 버튼을 클릭하면 History 스타일을 적용하고 "kor_ver" 버튼 스타일을 원래대로 되돌립니다.
		$(".en.button-toggle").click(function () {
			$(".kor_ver").hide();
			$(".en_ver").show();
			// 스타일 변경
			$(".en.button-toggle").addClass("active");
			$(".ko.button-toggle").removeClass("active");
		});
	});

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