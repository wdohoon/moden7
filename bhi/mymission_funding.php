<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
	
<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2>펀딩현황</h2>
</header>

	
	<div class="funding-status">
		<ul class="funding-list">
			<li>
				<div class="item">
					<div class="img"><img src="img/funding/tmp_thum.jpg"></div>
					<div class="text">
						<h3>필리핀 선교현장을 위한 미션제목 미션 제목 미션 제목 미션제목 미션제목</h3>
						<div class="etc">
							<div class="date">2021-11-22 12:33</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="tabs3">
			<a href="#" class="active">기부현황</a>
			<a href="#">펀딩현황</a>
		</div>
		
		<div class="status-wrap">
			<div class="cont">
				<div class="f-status">
					<dl>
						<dt>총 기부 참여자</dt>
						<dd>9,999명</dd>
					</dl>
					<dl>
						<dt>총 기부 참여자산</dt>
						<dd>999,999,999 OKNA<small>= 999,999,999 USD</small></dd>
					</dl>
					<hr>
					<dl>
						<dt class="blue">실제 정산 자산</dt>
						<dd>999,999,999 OKNA<small>= 999,999,999 USD</small></dd>
					</dl>
				</div>
				<div class="history">
					<ul>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
							</a>
						</li>
					</ul>
					<div class="more"><button>더보기 <img src="img/funding/ico_more.svg"></button></div>
				</div>
				
			</div>
			<div class="cont" style="display: none">
				<div class="f-status">
					<dl>
						<dt>총 기부 참여자</dt>
						<dd>9,999명</dd>
					</dl>
					<dl>
						<dt>총 기부 참여자산</dt>
						<dd>999,999,999 OKNA<small>= 999,999,999 USD</small></dd>
					</dl>
					<hr>
					<dl>
						<dt class="blue">실제 정산 자산</dt>
						<dd>999,999,999 OKNA<small>= 999,999,999 USD</small></dd>
					</dl>
					<dl>
						<dt class="red">일 지급 사랑리워드</dt>
						<dd>999,999,999 OKNA<small>= 999,999,999 USD</small></dd>
					</dl>
				</div>
				<div class="history">
					<ul>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
								<div class="subj">
									<div class="name red">일 지급 사랑리워드</div>
									<div class="coin red">999,999,999.9999 OKNA<br>= 999,999,999 USD</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
								<div class="subj">
									<div class="name red">일 지급 사랑리워드</div>
									<div class="coin red">999,999,999.9999 OKNA<br>= 999,999,999 USD</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
								<div class="subj">
									<div class="name red">일 지급 사랑리워드</div>
									<div class="coin red">999,999,999.9999 OKNA<br>= 999,999,999 USD</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
								<div class="subj">
									<div class="name red">일 지급 사랑리워드</div>
									<div class="coin red">999,999,999.9999 OKNA<br>= 999,999,999 USD</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="date">2021-12-12 13:33</div>
								<div class="subj">
									<div class="name">홍*동(010-****-*478)님</div>
									<div class="coin">999,999,999.9999 OKNA 참여</div>
								</div>
								<div class="subj">
									<div class="name red">일 지급 사랑리워드</div>
									<div class="coin red">999,999,999.9999 OKNA<br>= 999,999,999 USD</div>
								</div>
							</a>
						</li>
					</ul>
					<div class="more"><button>더보기 <img src="img/funding/ico_more.svg"></button></div>
				</div>
				
			</div>
				
				
		</div>
	</div>
	


	<script>
	$('.tabs3 a').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('.status-wrap > div').eq($(this).index()).fadeIn(300).siblings().hide();
		return false;
	})
	</script>


	
<?php
include_once(G5_PATH.'/tail.php');
?>