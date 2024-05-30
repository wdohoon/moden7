<!-- 23. 03. 24 브랜드 퍼블리싱 완료 --> 
<?php
$common['wwwPath'] = $_SERVER['DOCUMENT_ROOT'];
?>
<div class="global-head">
	<div id="glovalnavSection">
		<nav id="glovalnavTop">
			<div class="gn-content">
				<ul class="gn-list">
					<li class="gn-item gn-top <?if($_active_nav== 'investor'){ echo 'on'; } ?>">
						<a class="depth1-item"><span class="gn-item-txt">투자자용</span></a>
						<div class="depth2-box">
							<a href="/investor/finance.php" class="gn-link">재무 정보</a>
							<a href="/investor/notice.php" class="gn-link">공시 정보</a>
							<!-- <a href="/investor/stock.php" class="gn-link">주가 정보</a> -->
							<a href="/investor/irNews.php" class="gn-link">IR 뉴스</a>
						</div>
					</li>
					<li class="gn-item gn-top <?if($_active_nav== 'patient'){ echo 'on'; } ?>">
						<a class="depth1-item"><span class="gn-item-txt">환자용</span></a>
						<div class="depth2-box">
							<a href="/patient/" class="gn-link">Treatments&Therapies</a>
						</div>
					</li>
					<li class="gn-item gn-top <?if($_active_nav== 'newsroom'){ echo 'on'; } ?>">
						<a href="/newsRoom.php" class="depth1-item"><span class="gn-item-txt">뉴스룸</span></a>
					</li>
					<li class="gn-item gn-top <?if($_active_nav== 'career'){ echo 'on'; } ?>">
						<a href="/career/" class="depth1-item"><span class="gn-item-txt">함께 이루자</span></a>
					</li>
					<li class="gn-item gn-top __lang">
						<a class="depth1-item"></a>
						<div class="depth2-box">
							<a href="/" class="gn-link">KOR</a>
							<a id="" class="gn-link goEnHomepage">ENG</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<nav id="glovalnav">
			<div class="gn-content">
				<div class="gn-lang">
					<span class="lang_triger"></span>
					<div class="lang_body">
						<a href="/" class="gn-link">KOR</a>
						<a id="goEnHomepage" class="gn-link">ENG</a>
					</div>
				</div>
				<div id="gnToggle">
					<div class="bar-icon bar-top">
						<span class="bar"></span>
					</div>
					<div class="bar-icon bar-bottom">
						<span class="bar"></span>
					</div>
				</div>
				<h1 class="gn-logo"><a href="/" class="gn-link"><span class="sr-only">ilooda</span></a></h1>
				<ul class="gn-list">
					<li class="gn-item depth1 <?if($_active_nav== 'ilooda'){ echo 'on'; } ?>">
						<a class="depth1-item"><span class="gn-item-txt">우리의 역량</span></a>
						<div class="depth2-box">
							<a href="/ilooda/RnD.php" class="gn-link">창조적 R&D 경쟁력</a>
							<a href="/ilooda/innovation.php" class="gn-link">더 나은 치료를 위한 혁신</a>
							<a href="/ilooda/platform.php" class="gn-link">지속가능한 미래 플랫폼</a>
							<a href="/ilooda/RA.php" class="gn-link">임상·인허가 전문 그룹</a>
						</div>
					</li>
					<li class="gn-item depth1 <?if($_active_nav== 'treatment'){ echo 'on'; } ?>">
						<a class="depth1-item"><span class="gn-item-txt">치료</span></a>
						<div class="depth2-box">
							<a href="/treatment/" class="gn-link">제품 포트폴리오</a>
							<!-- <a href="/treatment/pipeline.php" class="gn-link">임상 파이프 라인</a> -->
						</div>
					</li>
					<li class="gn-item depth1 gn-brand-item  <?if($_active_nav== 'medical'){ echo 'on'; } ?>">
						<a class="depth1-item"><span class="gn-item-txt">브랜드</span></a>
						<div class="depth2-box brand-layer">
							<div class="minframe">
								<div class="gn-brand-box">
									<strong class="__tit">Aesthetic</strong>
									<ul class="row">
										<li class="col-4 col-sm-6">
											<a href="https://reepotlaser.com/" target="_blank" class="gnb-link" style="background-image:url(/assets/img/brand/reepot.png)">
												<span>
													<img src="/assets/img/aesthetic/reepot.svg" alt="reepot" class="reepot">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a class="gnb-link" style="background-image:url(/assets/img/brand/curas-hybrid.png)">
												<span>
													<img src="/assets/img/aesthetic/curashybrid.svg" alt="curas-hybrid" class="curas-hybrid">
												</span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a class="gnb-link" style="background-image:url(/assets/img/brand/pento.png)">
												<span>
													<img src="/assets/img/aesthetic/pento.svg" alt="pento" class="pento">
												</span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a class="gnb-link" style="background-image:url(/assets/img/brand/ncore_3d.png)">
												<span>
													<img src="/assets/img/aesthetic/n.core 3D.svg" alt="n.core 3D" class="ncore-3d">
												</span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a class="gnb-link" style="background-image:url(/assets/img/brand/ncore_prime.png)">
												<span>
													<img src="/assets/img/aesthetic/n.core PRIME.svg" alt="n.core PRIME" class="ncore-prime">
												</span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="http://hyzerme.com/" target="_blank" class="gnb-link" style="background-image:url(/assets/img/brand/hyzer-me.png)">
												<span>
													<img src="/assets/img/aesthetic/hyzer me.svg" alt="hyzer-me" class="hyzer-me">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="/brand/secretRF.php" class="gnb-link" style="background-image:url(/assets/img/brand/secret.png)">
												<span>
													<!-- <img src="/assets/img/aesthetic/secret RF.svg" alt="secret RF" style="max-width: 65%;"><br> -->
													<img src="/assets/img/aesthetic/secret DUO.svg" alt="secret DUO" class="secret-duo">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="/brand/veloce.php" class="gnb-link" style="background-image:url(/assets/img/brand/veloce.png)">
												<span>
													<img src="/assets/img/aesthetic/veloce.svg" alt="veloce" class="veloce">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="/brand/fraxis.php" class="gnb-link" style="background-image:url(/assets/img/brand/fraxis.png)">
												<span>
													<img src="/assets/img/aesthetic/fraxis DUO.svg" alt="fraxis DUO" class="fraxis-duo">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="/brand/healer.php" class="gnb-link" style="background-image:url(/assets/img/brand/healer.png)">
												<span>
													<img src="/assets/img/aesthetic/healer1064.svg" alt="healer1064" class="healer">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="/brand/vikini.php" class="gnb-link" style="background-image:url(/assets/img/brand/vikini.png)">
												<span>
													<img src="/assets/img/aesthetic/vikini.svg" alt="vikini" class="vikini">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="/brand/curas.php" class="gnb-link" style="background-image:url(/assets/img/brand/curas.png)">
												<span>
													<img src="/assets/img/aesthetic/curas.svg" alt="curas" class="curas">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="/brand/ultraBeaujet.php" class="gnb-link" style="background-image:url(/assets/img/brand/ultra.png)">
												<span>
													<img src="/assets/img/aesthetic/ultra beaujet.svg" alt="ultra beaujet" class="ultra-beaujet">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="/brand/igraft.php" class="gnb-link" style="background-image:url(/assets/img/brand/igraft.png)">
												<span>
													<img src="/assets/img/aesthetic/i-graft.svg" alt="i-graft" class="i-graft">
												</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
									</ul>
								</div>
								<div class="gn-brand-box">
									<strong class="__tit">Home care</strong>
									<ul class="row">
										<li class="col-4 col-sm-6">
											<a href="https://nuuz.co.kr/index.html" class="gnb-link" style="background-image:url(/assets/img/brand/device.png)">
												<span>nuuz device</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="https://nuuz.co.kr/category/%ED%99%94%EC%9E%A5%ED%92%88/25/" class="gnb-link" style="background-image:url(/assets/img/brand/cosmetic.png)">
												<span>nuuz cosmetic</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
									</ul>
								</div>
								<div class="gn-brand-box">
									<strong class="__tit">Medical</strong>
									<ul class="row">
										<li class="col-4 col-sm-6">
											<a href="brand/cure-j.php" target="_blank"  class="gnb-link" style="background-image:url(/assets/img/brand/cure-j.png)">
												<span>Cure.j</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
										<li class="col-4 col-sm-6">
											<a href="/brand/acutron.php" class="gnb-link" style="background-image:url(/assets/img/brand/acutron.png)">
												<span>ACUTRON</span>
												<span class="__hover"><img src="/assets/img/i/add-round.png" alt=""></span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li class="gn-item depth1 <?if($_active_nav== 'service'){ echo 'on'; } ?>">
						<a class="depth1-item"><span class="gn-item-txt">서비스</span></a>
						<div class="depth2-box">
							<a href="/service/educationCenter.php" class="gn-link">교육 훈련 센터</a>
							<a href="/service/support.php" class="gn-link">서비스 지원</a>
							<a href="/service/webinar.php" class="gn-link">웨비나</a>
							<a href="/reference.php" class="gn-link">컨시어지</a>
						</div>
					</li>
					<li class="gn-item depth1 <?if($_active_nav== 'vision'){ echo 'on'; } ?>">
						<a class="depth1-item"><span class="gn-item-txt">우리의 비전</span></a>
						<div class="depth2-box">
							<a href="/vision/ourMission.php" class="gn-link">우리의 미션</a>
							<a href="/vision/" class="gn-link">우리의 비전</a>
							<a href="/vision/global.php" class="gn-link">글로벌 네트워크</a>
							<a href="/vision/glance.php" class="gn-link">사업 성과</a>
							<a href="/vision/responsibility.php" class="gn-link">사회적 책임</a>
							<a href="/vision/CI.php" class="gn-link">CI</a>
						</div>
					</li>
					<li class="gn-item gn-mobile-last <?if($_active_nav== 'investor'){ echo 'on'; } ?>">
						<a class="depth1-item"><span class="gn-item-txt">투자자용</span></a>
						<div class="depth2-box">
							<a href="/investor/finance.php" class="gn-link">재무 정보</a>
							<a href="/investor/notice.php" class="gn-link">공시 정보</a>
							<!-- <a href="/investor/stock.php" class="gn-link">주가 정보</a> -->
							<a href="/investor/irNews.php" class="gn-link">IR 뉴스</a>
						</div>
					</li>
					<li class="gn-item gn-mobile-last <?if($_active_nav== 'patient'){ echo 'on'; } ?>">
						<a class="depth1-item"><span class="gn-item-txt">환자용</span></a>
						<div class="depth2-box">
							<a href="/patient/" class="gn-link">Treatments&Therapies</a>
						</div>
					</li>
					<li class="gn-item gn-mobile-last <?if($_active_nav== 'newsroom'){ echo 'on'; } ?>">
						<a href="/newsRoom.php" class="depth1-item noTow"><span class="gn-item-txt">뉴스룸</span></a>
					</li>
					<li class="gn-item gn-mobile-last <?if($_active_nav== 'career'){ echo 'on'; } ?>">
						<a href="/career/" class="depth1-item noTow"><span class="gn-item-txt">함께 이루자</span></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>