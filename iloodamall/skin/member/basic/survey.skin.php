<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.register_form.js"></script>', 0);
if ($config['cf_cert_use'] && ($config['cf_cert_simple'] || $config['cf_cert_ipin'] || $config['cf_cert_hp']))
    add_javascript('<script src="'.G5_JS_URL.'/certify.js?v='.G5_JS_VER.'"></script>', 0);
?>

<?php 
	if(!$is_admin){
		alert('관리자만 접근 가능합니다.');
	}

?>

<style>
	.hide768{display: block;}
	.show768,
	.hied_ex,
	#wrapper_title{display: none;}
	.hied_ex.on{display:initial;}
	#container{min-height:unset;}
	.poll{font-family:'NanumSquareNeo';}	
	.poll-top{width: 100%; line-height:143px; text-align:center; background:#c4c4c4; font-size:20px;}
	.poll-info{width: 100%; padding: 0 20px; background: #ededed; word-break:keep-all;}
	.poll-info .poll_mid{margin:0 auto; max-width:1080px; padding-top:120px;font-size:20px; line-height:28px}
	.poll-info .poll_mid .poll-tit{font-size:30px; font-weight:bold; margin-bottom:30px;}
	.poll-info .poll_mid .poll-desc{font-size:18px; margin-bottom:100px;} 
	.poll-info .poll_mid .input-tit{display:block; font-size:24px; font-weight:700;}
	.poll-info .poll_mid .out-tit{margin-top:60px;}
	.poll-info .poll_mid .out-tit2{margin-top:45px;}
	.poll-info .poll_mid .input-box{position:relative; background: white; padding:45px; margin-top:20px;}
	.poll-info .poll_mid .input-box:nth-child(4)::after{content:'* 표시는 필수 질문입니다.'; position:absolute; right:0; top:-45px; font-size:16px;}
	.poll-info .poll_mid .input-box:nth-child(6){padding-top:0;}
	.poll-info .poll_mid .input-box .input-tit{font-size:20px;}
	.poll-info .poll_mid .input-box input{background: white; height:65px; line-height:65px; text-indent:20px; width: 100%; border:1px solid black;}
	.poll-info .poll_mid .input-box .input-box-top{display:flex; width:100%; flex-wrap:wrap; justify-content:space-between;}
	.poll-info .poll_mid .input-box .input-box-top li{width: 48.5%;}
	.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-bottom:5px;font-size:20px;}
	.poll-info .poll_mid .input-box .select-box{display:flex; flex-wrap:wrap;text-align:left; justify-content:space-between;}
	.poll-info .poll_mid .input-box .select-box li{width: 100%;}
	.poll-info .poll_mid .input-box .select-box label{font-size:18px; font-weight:500; margin:0 10px;}
	.poll-info .poll_mid .input-box .select-box input[type="checkbox"],
	.poll-info .poll_mid .input-box .select-box input[type="radio"]{height: 25px; width: 25px; min-width: 25px; margin:10px 0;  accent-color:black;}
	.poll-info .poll_mid .input-box .select-box input[type="text"],
	.poll-info .poll_mid .input-box .impression{height: 40px; width: 300px; border: 1px solid #ebebeb; font-size:16px;}
	.poll-info .poll_mid .input-box .impression{margin-top:25px; width: 100%;}
	.poll-info .poll_mid .input-box .select-box.ser_equi{margin-top:10px;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li{width: 305px; margin-bottom:0px;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(-n+6){margin-bottom:70px;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li label{margin:0; font-size:14px;}
	.poll-info .poll_mid .input-box .select-box.ser_equi .ser_equi_box{display:flex;}
	.poll-info .poll_mid .input-box .select-box.ser_equi .ser_equi_box label{padding-left:10px; padding-top:5px;white-space:nowrap;}
	.poll-info .poll_mid .input-box .select-box .star{border-radius:0;}
	.poll-info .poll_mid .input-box-title{width: 100%; background:#dedede; line-height:90px; padding-left:40px; margin-top:20px; font-weight:bold; font-size:22px;}
	.poll-info .poll_mid .input-box-title+.input-box{margin:0;}
	.poll-info .poll_mid .submit-box{padding:100px 0; width: 100%; text-align:center;}
	.poll-info .poll_mid .submit-box .submit-btn{width: 270px; line-height:80px; background: #000; color:#fff; font-size:30px; font-weight:400;}
	@media (max-width:1140px){
	.poll-top{line-height:12.5439vw;  font-size:1.7544vw;}
	.poll-info{padding: 0 1.7544vw; }
	.poll-info .poll_mid {padding-top:10.5263vw;font-size:1.7544vw; line-height:2.4561vw}
	.poll-info .poll_mid .poll-tit{font-size:2.6316vw; margin-bottom:2.6316vw;}
	.poll-info .poll_mid .poll-desc{font-size:1.5789vw; margin-bottom:8.7719vw;}
	.poll-info .poll_mid .input-tit{font-size:2.1053vw;}
	.poll-info .poll_mid .out-tit{margin-top:5.2632vw;}
	.poll-info .poll_mid .out-tit2{margin-top:3.9474vw;}
	.poll-info .poll_mid .input-box{padding:3.9474vw; margin-top:1.7544vw;}
	.poll-info .poll_mid .input-box:nth-child(4)::after{top:-3.5088vw; font-size:1.4035vw;}
	.poll-info .poll_mid .input-box .input-tit{font-size:1.7544vw;}
	.poll-info .poll_mid .input-box input{height:5.7018vw; line-height:5.7018vw; text-indent:1.7544vw;}
	.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-bottom:0.4386vw;font-size:1.7544vw;}
	.poll-info .poll_mid .input-box .select-box label{font-size:1.5789vw;  margin:0 0.8772vw;}
	.poll-info .poll_mid .input-box .select-box input[type="checkbox"],
	.poll-info .poll_mid .input-box .select-box input[type="radio"]{height: 2.1930vw; width: 2.1930vw; min-width: 2.1930vw; margin:0.8772vw 0;}
	.poll-info .poll_mid .input-box .select-box input[type="text"],
	.poll-info .poll_mid .input-box .impression{height: 3.5088vw; width: 26.3158vw; font-size:1.4035vw;}
	.poll-info .poll_mid .input-box .impression{margin-top:2.1930vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi{margin-top:0.8772vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li{width: 26.7544vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(-n+6){margin-bottom:6.1404vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li label{margin:0; font-size:1.2281vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi .ser_equi_box label{padding-left:0.8772vw; padding-top:0.4386vw;}
	.poll-info .poll_mid .input-box-title{line-height:7.8947vw; padding-left:3.5088vw; margin-top:1.7544vw;  font-size:1.9298vw;}
	.poll-info .poll_mid .input-box-title+.input-box{margin:0;}
	.poll-info .poll_mid .submit-box{padding:8.7719vw 0;}
	.poll-info .poll_mid .submit-box .submit-btn{width: 23.6842vw; line-height:7.0175vw; font-size:2.6316vw; }
	}
	@media (max-width:768px){
	.show768{display: block;}
	.hide768{display: none;}
	.poll-top{line-height:18.6198vw;font-size:2.6042vw;}
	.poll-info{width: 100%; padding: 0 2.6042vw; background: #ededed;}
	.poll-info .poll_mid{margin:0 auto; padding-top:15.6250vw;font-size:2.6042vw; line-height:3.6458vw;}
	.poll-info .poll_mid .poll-tit{font-size:4.4271vw; font-weight:bold; margin-bottom:3.9063vw; text-align:center;}
	.poll-info .poll_mid .poll-desc{ ;font-size:2.3438vw; margin-bottom:13.0208vw; word-break:keep-all; text-align:center;} 
	.poll-info .poll_mid .input-tit{display:block; font-size:3.1250vw; font-weight:700;}
	.poll-info .poll_mid .out-tit{margin-top:7.8125vw;}
	.poll-info .poll_mid .out-tit2{margin-top:5.8594vw;}
	.poll-info .poll_mid .input-box{position:relative; background: white; padding:5.8594vw; margin-top:2.6042vw;}
	.poll-info .poll_mid .input-box:nth-child(4)::after{content:'* 표시는 필수 질문입니다.'; position:absolute; right:0; top:-5.8594vw; font-size:2.0833vw;}
	.poll-info .poll_mid .input-box .input-tit{font-size:2.6042vw;}
	.poll-info .poll_mid .input-box input{background: white; height:8.4635vw; line-height:8.4635vw; text-indent:2.6042vw; width: 100%; border:0.1302vw solid black;}
	.poll-info .poll_mid .input-box .input-box-top{display:flex; width:100%; flex-wrap:wrap; justify-content:space-between;}
	.poll-info .poll_mid .input-box .input-box-top li{width: 48.5%;}
	.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-bottom:0.6510vw;font-size:2.6042vw;}
	.poll-info .poll_mid .input-box .select-box{display:flex; flex-wrap:wrap;text-align:left; justify-content:space-between;}
	.poll-info .poll_mid .input-box .select-box li{width: 100%;}
	.poll-info .poll_mid .input-box .select-box label{font-size:2.3438vw; font-weight:500; margin:0 1.3021vw;}
	.poll-info .poll_mid .input-box .select-box input[type="checkbox"],
	.poll-info .poll_mid .input-box .select-box input[type="radio"]{height: 3.2552vw; width: 3.2552vw; min-width: 3.2552vw; margin:1.3021vw 0;  accent-color:black;}
	.poll-info .poll_mid .input-box .select-box input[type="text"],
	.poll-info .poll_mid .input-box .impression{height: 5.2083vw; width: 39.0625vw; border: 0.1302vw solid #ebebeb; font-size:2.0833vw;}
	.poll-info .poll_mid .input-box .impression{margin-top:3.2552vw; width: 100%;}
	.poll-info .poll_mid .input-box .select-box.ser_equi{margin-top:1.3021vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li{width: 37.7604vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(-n+6){margin-bottom:9.1146vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(3){/* width: 100%;  */text-align:center;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(3) img{width:37.7604vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(3) .ser_equi_box{width: 100%; justify-content: center;}
	.poll-info .poll_mid .input-box .select-box.ser_equi li label{margin:0; font-size:1.8229vw;}
	.poll-info .poll_mid .input-box .select-box.ser_equi .ser_equi_box{display:flex;}
	.poll-info .poll_mid .input-box .select-box.ser_equi .ser_equi_box label{padding-left:1.3021vw; padding-top:0.6510vw;white-space:nowrap;}
	.poll-info .poll_mid .input-box .select-box .star{border-radius:0;}
	.poll-info .poll_mid .input-box-title{display: flex; align-items:center;width: 100%; background:#dedede; height:11.7188vw; line-height:unset; padding-left:5.2083vw; margin-top:2.6042vw; font-weight:bold; font-size:2.8646vw;}
	.poll-info .poll_mid .input-box-title+.input-box{margin:0;}
	.poll-info .poll_mid .submit-box{padding:13.0208vw 0; width: 100%; text-align:center;}
	.poll-info .poll_mid .submit-box .submit-btn{width: 35.1563vw; line-height:10.4167vw; background: #000; color:#fff; font-size:3.9063vw; font-weight:400;}
	}
	
	@media (max-width:480px){
		.poll-top{width: 100%; height: 29.1667vw;line-height:6.2500vw; padding:0 4.1667vw; display: flex; align-items:center; font-size:4.1667vw;}
		.poll-info{width: 100%; padding: 0 2.0833vw; background: #ededed; word-break:keep-all;}
		.poll-info .poll_mid{margin:0 auto; padding-top:25.0000vw;font-size:4.1667vw; line-height:5.8333vw}
		.poll-info .poll_mid .poll-tit{font-size:5.0000vw; font-weight:bold; margin-bottom:6.2500vw;}
		.poll-info .poll_mid .poll-desc{font-size:3.1250vw; margin-bottom:20.8333vw;} 
		.poll-info .poll_mid .input-tit{display:block; font-size:5.0000vw; font-weight:700;}
		.poll-info .poll_mid .out-tit{margin-top:6.2500vw;}
		.poll-info .poll_mid .out-tit2{margin-top:4.1667vw;}
		.poll-info .poll_mid .out-tit3{margin-top:4.1667vw;}
		.poll-info .poll_mid .input-box{position:relative; background: white; padding:4.1667vw; margin-top:4.1667vw;}
		.poll-info .poll_mid .input-box:nth-child(4)::after{content:'* 표시는 필수 질문입니다.'; position:absolute; right:0; top:-9.3750vw; font-size:3.3333vw;}
		.poll-info .poll_mid .input-box:nth-child(6){padding-top:0;}
		.poll-info .poll_mid .input-box .input-tit{font-size:3.7500vw;}
		.poll-info .poll_mid .input-box input{background: white; height:9.3750vw; font-size:3.7500vw; line-height:9.3750vw; text-indent:4.1667vw; width: 100%; border:0.2083vw solid black;}
		.poll-info .poll_mid .input-box .input-box-top{display:flex; width:100%; flex-wrap:wrap; justify-content:space-between;}
		.poll-info .poll_mid .input-box .input-box-top li{width: 100%;}
		.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-bottom:1.0417vw;font-size:4.1667vw;}
		.poll-info .poll_mid .input-box .select-box{display:flex; flex-wrap:wrap;text-align:left; justify-content:center;}
		.poll-info .poll_mid .input-box .select-box li{width: 100%;}
		.poll-info .poll_mid .input-box .select-box label{font-size:3.7500vw; font-weight:500; margin:0 2.0833vw;}
		.poll-info .poll_mid .input-box .select-box input[type="checkbox"],
		.poll-info .poll_mid .input-box .select-box input[type="radio"]{height: 5.2083vw; width: 5.2083vw; min-width: 5.2083vw; margin:2.0833vw 0;  accent-color:black;}
		.poll-info .poll_mid .input-box .select-box input[type="text"],
		.poll-info .poll_mid .input-box .impression{height: 8.3333vw; width: 62.5000vw; border: 0.2083vw solid #ebebeb; font-size:3.3333vw;}
		.poll-info .poll_mid .input-box .impression{margin-top:5.2083vw; width: 100%;}
		.poll-info .poll_mid .input-box .select-box.ser_equi{margin-top:2.0833vw;}
		.poll-info .poll_mid .input-box .select-box.ser_equi li{width: 90%; margin-bottom:0.0000vw; text-align:center;}
		.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(-n+4){margin-bottom:6.2500vw;}
		.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(3){width: 90%;}
		.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(3) img{width: unset;}
		.poll-info .poll_mid .input-box .select-box.ser_equi li:nth-child(3) .ser_equi_box,
		.poll-info .poll_mid .input-box .select-box.ser_equi li .ser_equi_box { width: 100%; justify-content: left;padding-left: 7.5000vw;}
		.poll-info .poll_mid .input-box .select-box.ser_equi li label{margin:0; font-size:2.9167vw;}
		.poll-info .poll_mid .input-box .select-box.ser_equi .ser_equi_box{display:flex;}
		.poll-info .poll_mid .input-box .select-box.ser_equi .ser_equi_box label{padding-left:2.0833vw; padding-top:1.0417vw;white-space:nowrap;}
		.poll-info .poll_mid .input-box .select-box .star{border-radius:0;}
		.poll-info .poll_mid .input-box .select-box span{display: block; width: 100%;text-align:left; font-size:3.3333vw;}
		.poll-info .poll_mid .input-box-title{width: 100%; background:#dedede; height:18.7500vw; padding:0.0000vw 4.1667vw; text-align:center; margin-top:4.1667vw; font-weight:bold; font-size:4.1667vw;}
		.poll-info .poll_mid .input-box-title+.input-box{margin:0;}
		.poll-info .poll_mid .submit-box{padding:20.8333vw 0; width: 100%; text-align:center;}
		.poll-info .poll_mid .submit-box .submit-btn{width: 41.6667vw; line-height:12.5000vw; background: #000; color:#fff; font-size:5.0000vw; font-weight:400;}

	}
</style>

	</div>
</div>
<!-- form태그 action Url은 '/bbs/survey_update.php' 로 해주세용 -->
<form id="fregisterform" name="fregisterform" action="<?php echo $survey_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
	<input type="hidden" name="z" value="survey">

	
	<div class="poll">
		<div class="poll-top">
			<p>아래 설문 작성시 마케팅 적립금 10만원의 혜택을 받으실 수 있습니다.</p>
		</div>
		<!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScsF-ov3BDHXrc6A1H8vkCZrBlKvTL4zVZtOvzaw83gsYSM_g/viewform?embedded=true" width="100%" height="800px" frameborder="0" marginheight="0" marginwidth="0">로드 중…</iframe> -->
		<div class="poll-info">
			<div class="poll_mid">
				<p class="poll-tit">이루다 설문조사</p>
				<p class="poll-desc">
					이루다몰에 방문하신 원장님들의 의견을 청취하여 더 나은 의료 문화를 만들기 위해 설문조사를 실시합니다.<br>	
					원장님들의 고견은 더욱 발전하는 피부미용 의료환경을 만들어 감에 큰 도움이 됩니다.<br>	
					많은 관심과 협조 부탁 드립니다. 감사합니다.
				</p>
				<span class="input-tit">이메일 *</span>
				<div class="input-box">
					<input type="text" name="wr_email" id="ser_email" <?php echo $required ?> value="<?php echo $member['mb_email']; ?>" size="10" placeholder="OOOO@naver.com">
				</div>

				<span class="input-tit out-tit">병원 현황</span>
				<div class="input-box">
					<ul class="input-box-top">
						<li>
							<span class="input-tit out-tit2">병원명 *</span>
							<input type="text" name="wr_subject" id="ser_hospital"<?php echo $required ?>size="10" value="<?php echo $member['mb_1']; ?>" placeholder="내 답변">
						</li>
						<li>
							<span class="input-tit out-tit2">연락처 *</span>
						<input type="text" name="wr_1" id="ser_tel"<?php echo $required ?>size="10" value="<?php echo $member['mb_hp']; ?>" placeholder="내 답변">
						</li>
						<li>
							<span class="input-tit out-tit2">성함 *</span>
						<input type="text" name="wr_name" id="ser_name"<?php echo $required ?>size="10" value="<?php echo $member['mb_name']; ?>" placeholder="내 답변">
						</li>
						<li>
							<span class="input-tit out-tit2">주소(지역만 작성 혹은 상세주소) *</span>
						<input type="text" name="wr_2" id="ser_addr"<?php echo $required ?>size="10" placeholder="내 답변">
						</li>
					</ul>
					
					
					<span class="input-tit out-tit">병원 운영 기간은 어떻게 되십니까? *  </span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_3" id="hos_year1" <?php echo $required ?> value="1~5년">
							<label for="hos_year1">1~5년</label>
						</li>
						<li>
							<input type="radio" name="wr_4" id="hos_year2" <?php echo $required ?> value="6년~10년">
							<label for="hos_year2">6년~10년</label>
						</li>
						<li>
							<input type="radio" name="wr_5" id="hos_year3" <?php echo $required ?> value="11년~15년">
							<label for="hos_year3">11년~15년</label>
						</li>
						<li>
							<input type="radio" name="wr_6" id="hos_year4" <?php echo $required ?> value="16년 이상">
							<label for="hos_year4">16년 이상</label>
						</li>
					</ul>

					<span class="input-tit out-tit">현재 병원에서 환자들의 선호도가 높은 시술 종류는 무엇입니까? (중복체크 가능)</span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_7" id="ser_tt_type1" value="색소치료">
							<label for="ser_tt_type1">색소치료</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_8" id="ser_tt_type2" value="리프팅 탄력">
							<label for="ser_tt_type2">리프팅 탄력</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_9" id="ser_tt_type3" value="모공">
							<label for="ser_tt_type3">모공</label>
						</li>
						<li>
							<input type="checkbox" name="wr_10" id="ser_tt_type4" value="트러블">
							<label for="ser_tt_type4">트러블</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_11" id="ser_tt_type5" value="기타">
							<label for="ser_tt_type5">기타</label>	
							<input type="text" name="wr_11_text" class="ser_tt_type5 hied_ex" placeholder="기타 선호하는 시술을 입력해 주세요.">
						</li>
					</ul>
					
					<span class="input-tit out-tit">병원 고객 선호도가 높은 시술은 무엇입니까? (중복체크 가능)</span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_12" id="ser_tt_type11" value="색소치료">
							<label for="ser_tt_type11">색소치료</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_13" id="ser_tt_type22" value="리프팅 탄력">
							<label for="ser_tt_type22">리프팅 탄력</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_14" id="ser_tt_type33" value="모공">
							<label for="ser_tt_type33">모공 트러블</label>
						</li>
						<li>
							<input type="checkbox" name="wr_15" id="ser_tt_type44" value="기타">
							<label for="ser_tt_type44">기타</label>	
							<input type="text" name="wr_15_text" class="ser_tt_type44 hied_ex" placeholder="기타 선호하는 시술을 입력해 주세요.">
						</li>
					</ul>
					<!-- <span class="input-tit out-tit">월 평균 병원 매출 현황은 어떻게 되십니까?</span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_8" id="ser_sales1" value="500만원 이하">
							<label for="ser_sales1">500만원 이하</label>
						</li>
						<li>
							<input type="radio" name="wr_8" id="ser_sales2" value="500 ~ 1,000만원">
							<label for="ser_sales2">500 ~ 1,000만원</label>
						</li>
						<li>
							<input type="radio" name="wr_8" id="ser_sales3" value="1,000 ~ 2,000만원">
							<label for="ser_sales3">1,000 ~ 2,000만원</label>
						</li>
						<li>
							<input type="radio" name="wr_8" id="ser_sales4" value="2,000 ~ 3,000만원">
							<label for="ser_sales4">2,000 ~ 3,000만원</label>
						</li>
						<li>
							<input type="radio" name="wr_8" id="ser_sales5" value="3,000만원 이상">
							<label for="ser_sales5">3,000만원 이상</label>
						</li>
						<li>
							<input type="radio" name="wr_8" id="ser_sales6" value="기타"> 
							<label for="ser_sales6">기타</label>
							<input type="text" name="wr_8_text" class="ser_sales6 hied_ex" placeholder="기타 답변을 입력해 주세요.">
						</li>
					</ul> -->
				</div>
				<span class="input-tit out-tit">색소치료</span>
				<div class="input-box">
					
					<span class="input-tit ">색소치료 시 사용하는 장비는 무엇입니까? </span>
					<div class="input-box" style=" padding-top:0; padding-left:0; padding-right:0;">
						<input type="text" name="wr_16" id="care" <?php echo $required ?> value="">
					</div>

					<span class="input-tit ">위 제품을 선택한 이유는 무엇인가요? (중복체크 가능)</span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_17" id="ser_t2_type1" value="고객의 요청">
							<label for="ser_t2_type1">고객의 요청</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_18" id="ser_t2_type2" value="이미 구입한 장비">
							<label for="ser_t2_type2">이미 구입한 장비</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_19" id="ser_t2_type3" value="장비의 성능과 효과">
							<label for="ser_t2_type3">장비의 성능과 효과</label>
						</li>
						<li>
							<input type="checkbox" name="wr_20" id="ser_t2_type4" value="동료의사의 추천">
							<label for="ser_t2_type4">동료의사의 추천</label>
						</li>
						<li>
							<input type="checkbox" name="wr_21" id="ser_t2_type5" value="영업사원">
							<label for="ser_t2_type5">영업사원</label>
						</li>
						<li>
							<input type="checkbox" name="wr_22" id="ser_t2_type6" value="기타">
							<label for="ser_t2_type6">기타</label>	
							<input type="text" name="wr_22_text" class="ser_t2_type6 hied_ex" placeholder="기타 선호하는 시술을 입력해 주세요.">
						</li>
					</ul>

					<span class="input-tit out-tit">색소치료 시술을 위해 장비를 구매할 의향이 있나요? 있다면 어떤 장비를 구매할 의향인가요?</span>
					<div class="input-box" style=" padding-top:0; padding-left:0; padding-right:0;">
						<input type="text" name="wr_23" id="care" <?php echo $required ?> value="">
					</div>

					<span class="input-tit ">위 장비 구매를 희망하는 이유는 무엇입니까? (중복 체크 가능)  </span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_24" id="ser_decreased_sales1" value="고객의 요청">
							<label for="ser_decreased_sales1">고객의 요청</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_25" id="ser_decreased_sales2" value="이미 구입한 장비">
							<label for="ser_decreased_sales2">이미 구입한 장비</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_26" id="ser_decreased_sales3" value="장비의 성능과 효과">
							<label for="ser_decreased_sales3">장비의 성능과 효과</label>
						</li>
						<li>
							<input type="checkbox" name="wr_27" id="ser_decreased_sales4" value="동료의사의 추천">
							<label for="ser_decreased_sales4">동료의사의 추천</label>
						</li>
						<li>
							<input type="checkbox" name="wr_28" id="ser_decreased_sales5" value="영업사원">
							<label for="ser_decreased_sales5">영업사원</label>
						</li>
						<li>
							<input type="checkbox" name="wr_29" id="ser_decreased_sales6" value="기타">
							<label for="ser_decreased_sales6">기타</label>	
							<input type="text" name="wr_29_text" class="ser_decreased_sales6 hied_ex" placeholder="기타 선호하는 시술을 입력해 주세요.">
						</li>
					</ul>
					
					<!-- <span class="input-tit out-tit">코로나 팬데믹  전 후 비교 시, 병원 매출이 얼마나 증가 하셨나요? *  </span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_11" id="ser_sales_growth1" <?php echo $required ?> value="10% 이하">
							<label for="ser_sales_growth1">10% 이하</label>
						</li>
						<li>
							<input type="radio" name="wr_11" id="ser_sales_growth2" <?php echo $required ?> value="10~20%">
							<label for="ser_sales_growth2">10~20%</label>
						</li>
						<li>
							<input type="radio" name="wr_11" id="ser_sales_growth3" <?php echo $required ?> value="20~30%">
							<label for="ser_sales_growth3">20~30%</label>
						</li>
						<li>
							<input type="radio" name="wr_11" id="ser_sales_growth4" <?php echo $required ?> value="30~40%">
							<label for="ser_sales_growth4">30~40%</label>
						</li>
						<li>
							<input type="radio" name="wr_11" id="ser_sales_growth5" <?php echo $required ?> value="50% 이상">
							<label for="ser_sales_growth5">50% 이상</label>
						</li>
					</ul> -->
				</div>

				<span class="input-tit out-tit">(주)이루다 인지도 조사</span>
				<div class="input-box">
					
					<span class="input-tit">(주)이루다 라는 회사를 알고 있습니까?</span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_30" id="ser_company1" value="네">
							<label for="ser_company1">네</label>
						</li>
						<li>
							<input type="radio" name="wr_31" id="ser_company2" value="아니오">
							<label for="ser_company2">아니오</label>
						</li>
					</ul>
					
					<span class="input-tit out-tit">(주)이루다의 제품이나 서비스를 어떻게 알게 되었나요? (중복 체크 가능)</span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_32" id="ser_decreased_sales1" value="온,오프라인 광고 및 잡지">
							<label for="ser_decreased_sales1">온,오프라인 광고 및 잡지</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_33" id="ser_decreased_sales2" value="학회 강연">
							<label for="ser_decreased_sales2">학회 강연</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_34" id="ser_decreased_sales3" value="동료의사의 추천">
							<label for="ser_decreased_sales3">동료의사의 추천</label>
						</li>
						<li>
							<input type="checkbox" name="wr_35" id="ser_decreased_sales4" value="영업 사원">
							<label for="ser_decreased_sales4">영업 사원</label>
						</li>
						<li>
							<input type="checkbox" name="wr_36" id="ser_decreased_sales5" value="병원 임직원">
							<label for="ser_decreased_sales5">병원 임직원</label>
						</li>
						<li>
							<input type="checkbox" name="wr_37" id="ser_decreased_sales6" value="병원 방문 고객">
							<label for="ser_decreased_sales6">병원 방문 고객</label>
						</li>
						<li>
							<input type="checkbox" name="wr_38" id="ser_decreased_sales7" value="기타">
							<label for="ser_decreased_sales7">기타</label>	
							<input type="text" name="wr_38_text" class="ser_decreased_sales7 hied_ex" placeholder="기타 선호하는 시술을 입력해 주세요.">
						</li>
					</ul>

					<span class="input-tit out-tit">병원에서 보유하고 있는 이루다 제품이 있습니까? *  </span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_39" id="ser_possess1" value="네">
							<label for="ser_possess1">네</label>
						</li>
						<li>
							<input type="radio" name="wr_40" id="ser_possess2" value="아니오">
							<label for="ser_possess2">아니오</label>
						</li>
					</ul>
				</div>

				<span class="input-tit out-tit">(주)이루다 장비 보유 조사</span>
				<div class="input-box">
					<span class="input-tit">보유하고 있는 이루다 제품을 체크해주세요.</span>
					<ul class="select-box ser_equi">
						<li>
							<label for="ser_equi_possess1"><img src="/images/survey_1.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_41" id="ser_equi_possess1" value="reepot _ Q-532nm 레이저 [냉각기술을 이용한 색소치료]">
								<label for="ser_equi_possess1">1. reepot _ Q-532nm 레이저 <br>[냉각기술을 이용한 색소치료]</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess2"><img src="/images/survey_2.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_42" id="ser_equi_possess2" value="CuRAS _ 532nm/1064nm 파장대를 이용한 멀티펄스  Nd:YAG Laser">
								<label for="ser_equi_possess2">2. CuRAS _ 532nm/1064nm 파장대를 <br>이용한 멀티펄스  Nd:YAG Laser</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess3"><img src="/images/survey_3.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_43" id="ser_equi_possess3" value="Secret RF & Secret DUO_ Micro Needle RF의 결합 Secret RF & DUO : 1540mm 레이저">
								<label for="ser_equi_possess3">3. Secret RF & Secret DUO_ Micro Needle<br>RF의 결합 Secret RF & DUO : 1540mm 레이저</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess4"><img src="/images/survey_4.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_44" id="ser_equi_possess4" value="N-Core 3D / N-Core Prime _ 755,808,1064 3파장 레이저/근적외선 에너지를 이용한 리프팅">
								<label for="ser_equi_possess4">4. N-Core 3D / N-Core Prime _<br>755,808,1064 3파장 레이저 /<br>근적외선 에너지를 이용한 리프팅</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess5"><img src="/images/survey_5.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_45" id="ser_equi_possess5" value="VIKINI _ 사파이어 쿨링시스템을 장착한 High power 808nm Diode Laser">
								<label for="ser_equi_possess5">5. VIKINI _ 사파이어 쿨링시스템을 장착한<br>High power 808nm Diode Laser</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess6"><img src="/images/survey_6.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_46" id="ser_equi_possess6" value="VIKINI _ 사파이어 쿨링시스템을 장착한 High power 808nm Diode Laser">
								<label for="ser_equi_possess6">5. VIKINI _ 사파이어 쿨링시스템을 장착한<br>High power 808nm Diode Laser</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess7"><img src="/images/survey_7.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_47" id="ser_equi_possess7" value="VIKINI _ 사파이어 쿨링시스템을 장착한 High power 808nm Diode Laser">
								<label for="ser_equi_possess7">5. VIKINI _ 사파이어 쿨링시스템을 장착한<br>High power 808nm Diode Laser</label>
							</div>
						</li>
						<li>
							<input type="checkbox" name="wr_48" id="ser_equi_possess8" value="기타">
							<label for="ser_equi_possess8">기타</label>	
							<input type="text" name="wr_48_text" class="ser_equi_possess8 hied_ex" placeholder="기타 답변을 해주세요.">
						</li>
						<li class="hide768"></li>
					</ul>
				</div>
				
				<span class="input-tit out-tit">(주)이루다 만족도 조사</span>
				<div class="input-box">
					<span class="input-tit">이루다 제품의 전체 만족도를 체크해주세요*  </span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_49" id="ser_star1" <?php echo $required ?> value="1">
							<label for="ser_star1">★☆☆☆☆</label>
						</li>
						<li>
							<input type="radio" name="wr_49" id="ser_star2" <?php echo $required ?> value="2">
							<label for="ser_star2">★★☆☆☆</label>
						</li>
						<li>
							<input type="radio" name="wr_49" id="ser_star3" <?php echo $required ?> value="3">
							<label for="ser_star3">★★★☆☆</label>
						</li>
						<li>
							<input type="radio" name="wr_49" id="ser_star4" <?php echo $required ?> value="4">
							<label for="ser_star4">★★★★☆</label>
						</li>
						<li>
							<input type="radio" name="wr_49" id="ser_star5" <?php echo $required ?> value="5">
							<label for="ser_star5">★★★★★</label>
						</li>
						<span>※ 1개 이하의 옵션을 선택해야 합니다.</span>
					</ul>
					
					<span class="input-tit out-tit">이루다 제품에 만족하신다면 이유는 무엇입니까?</span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_50" id="ser_satis1" value="성능">
							<label for="ser_satis1">성능</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_51" id="ser_satis2" value="가격">
							<label for="ser_satis2">가격</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_52" id="ser_satis3" value="디자인">
							<label for="ser_satis3">디자인</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_53" id="ser_satis4" value="편의성">
							<label for="ser_satis4">편의성</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_54" id="ser_satis5" value="서비스">
							<label for="ser_satis5">서비스</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_55" id="ser_satis6" value="기타">
							<label for="ser_satis6">기타</label>	
							<input type="text" name="wr_55_text" class="ser_satis6 hied_ex" placeholder="기타 답변을 해주세요.">
						</li>
					</ul>
					
					<span class="input-tit out-tit">이루다 제품에 불만족 하신다면 이유는 무엇입니까?</span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_56" id="ser_satis7" value="성능">
							<label for="ser_satis7">성능</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_57" id="ser_satis8" value="가격">
							<label for="ser_satis8">가격</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_58" id="ser_satis9" value="디자인">
							<label for="ser_satis9">디자인</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_59" id="ser_satis10" value="편의성">
							<label for="ser_satis10">편의성</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_60" id="ser_satis11" value="서비스">
							<label for="ser_satis11">서비스</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_61" id="ser_satis12" value="기타">
							<label for="ser_satis12">기타</label>	
							<input type="text" name="wr_61_text" class="ser_satis12 hied_ex" placeholder="기타 답변을 해주세요.">
						</li>
					</ul>

					<span class="input-tit out-tit">이루다 제품을 다른 사람에게 추천할 의향이 있으신가요?  </span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_62" id="ser_good1" <?php echo $required ?> value="네">
							<label for="ser_good1">네</label>
						</li>
						<li>
							<input type="radio" name="wr_62" id="ser_good2" <?php echo $required ?> value="아니요">
							<label for="ser_good2">아니요</label>
						</li>
						<li>
							<input type="radio" name="wr_62" id="ser_good3" value="기타">
							<label for="ser_good3">기타</label>	
							<input type="text" name="wr_62_text" class="ser_good3 hied_ex" placeholder="기타 답변을 해주세요.">
						</li>
					</ul>
					
					<span class="input-tit out-tit">이루다 제품을 추천할 의향이 있으시다면, 그 이유는 무엇인가요?</span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_63" id="ser_satis13" value="성능">
							<label for="ser_satis13">성능</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_64" id="ser_satis14" value="가격">
							<label for="ser_satis14">가격</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_65" id="ser_satis15" value="디자인">
							<label for="ser_satis15">디자인</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_66" id="ser_satis16" value="편의성">
							<label for="ser_satis16">편의성</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_67" id="ser_satis17" value="서비스">
							<label for="ser_satis17">서비스</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_68" id="ser_satis18" value="기타">
							<label for="ser_satis18">기타</label>	
							<input type="text" name="wr_68_text" class="ser_satis18 hied_ex" placeholder="기타 답변을 해주세요.">
						</li>
					</ul>

					<span class="input-tit out-tit">이루다 제품 또는 서비스에서 개선되어야 할 부분이 있다면 무엇인지 알려주세요.</span>
					<div class="input-box" style=" padding-top:0; padding-left:0; padding-right:0;">
						<input type="text" name="wr_69" id="care" <?php echo $required ?> value="" size="100">
					</div>
				</div>
				
				<span class="input-tit out-tit">이루다 마케팅 서비스 관련</span>
				<div class="input-box">
					<span class="input-tit">이루다 마케팅 콘텐츠를 보시거나, 들어보신적이 있나요?</span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_70" id="ser_event1" value="네">
							<label for="ser_event1">네</label>
						</li>
						<li>
							<input type="radio" name="wr_70" id="ser_event2" value="아니오">
							<label for="ser_event2">아니오</label>
						</li>
						<li>
							<input type="radio" name="wr_70" id="ser_event3" value="기타">
							<label for="ser_event3">기타</label>	
							<input type="text" name="wr_70_text" class="ser_event3 hied_ex" placeholder="기타 답변을 해주세요.">
						</li>
					</ul>

					<span class="input-tit out-tit">이루다 제품 또는 서비스를 어떤 미디어나 플랫폼을 통해 더 자주 접할 수 있었으면 좋겠다고 생각하시나요?</span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_71" id="ser_plat1" value="TV 광고 및 잡지">
							<label for="ser_plat1">TV 광고 및 잡지</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_72" id="ser_plat2" value="온라인 광고 및 잡지">
							<label for="ser_plat2">온라인 광고 및 잡지</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_73" id="ser_plat3" value="SNS 미디어">
							<label for="ser_plat3">SNS 미디어</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_74" id="ser_plat4" value="오프라인 행사">
							<label for="ser_plat4">오프라인 행사</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_75" id="ser_plat5" value="학회 및 강연">
							<label for="ser_plat5">학회 및 강연</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_76" id="ser_plat6" value="제품 소규모 세미나">
							<label for="ser_plat6">제품 소규모 세미나</label>	
						</li>
					</ul>

					<span class="input-tit out-tit">피부미용 트렌드나 시장에 대한 피드백이나 의견을 자주 공유하는 플랫폼은 무엇인가요?</span>
					<ul class="select-box">
						<li>
							<input type="checkbox" name="wr_77" id="ser_plat7" value="카카오톡 대화방">
							<label for="ser_plat7">카카오톡 대화방</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_78" id="ser_plat8" value="페이스북 메신저 혹은 게시물, 댓글">
							<label for="ser_plat8">페이스북 메신저 혹은 게시물, 댓글</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_79" id="ser_plat9" value="인스타그램 게시물, 댓글 혹은 DM">
							<label for="ser_plat9">인스타그램 게시물, 댓글 혹은 DM</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_80" id="ser_plat10" value="오프라인 모임">
							<label for="ser_plat10">오프라인 모임</label>	
						</li>
						<li>
							<input type="checkbox" name="wr_81" id="ser_plat11" value="기타">
							<label for="ser_plat11">기타</label>	
							<input type="text" name="wr_81_text" class="ser_plat11 hied_ex" placeholder="기타 답변을 해주세요.">
						</li>
					</ul>

					<span class="input-tit out-tit">이루다 마케팅 콘텐츠에 대한 제안이나 의견을 공유해 주세요.</span>
					<div class="input-box" style=" padding-top:0; padding-left:0; padding-right:0;">
						<input type="text" name="wr_82" id="care" <?php echo $required ?> value="" size="100">
					</div>
				</div>

				<span class="input-tit out-tit">이루다 리팟 레이저 가디언즈 행사 안내</span>
				<div class="input-box-title">
					<span>이루다에서는 월 1~2회 원장님들을 모시고 리팟 가디언즈 행사를 진행하고 있습니다.</span>
				</div>
				<div class="input-box">
					<span class="input-tit">리팟레이저의 시술 원리 및 원장님들의 강의와 임상, 리팟 시술을 직접 확인하실 수 있는<br>가디언즈 행사에 참여 할 의사가 있습니까? *</span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_83" id="ser_event1" value="네">
							<label for="ser_event1">네</label>
						</li>
						<li>
							<input type="radio" name="wr_83" id="ser_event2" value="아니오">
							<label for="ser_event2">아니오</label>
						</li>
					</ul>
				</div>

				<span class="input-tit out-tit">가디언즈 초정장 발송 정보</span>
				<div class="input-box-title">
					<span>아래에 정보를 기입 후 가디언즈 무료 초정장 및 다양한 혜택을 받아보세요.</span>
				</div>
				<div class="input-box">
					<ul class="input-box-top">
						<li>
							<span class="input-tit">병원명 *</span>
							<input type="text" name="wr_84" id="ser_hospital"<?php echo $required ?>size="10" value="<?php echo $mb_1; ?>" placeholder="내 답변">
						</li>
						<li>
							<span class="input-tit">의사(담당자)성함 *</span>
						<input type="text" name="wr_85" id="ser_tel"<?php echo $required ?>size="10" placeholder="내 답변">
						</li>
						<li>
							<span class="input-tit out-tit2">연락처 *</span>
						<input type="text" name="wr_86" id="ser_name"<?php echo $required ?>size="10" placeholder="내 답변">
						</li>
					</ul>
				</div>

				<span class="input-tit out-tit">이루다 제품 데모 신청 희망 여부</span>
				<div class="input-box-title">
					<span>이루다는 데모 지원을 해드리고 있습니다. 관심 있는 이루다 제품을 체크해주세요.</span>
				</div>
				<div class="input-box">
				
					<span class="input-tit">데모를 신청하고 싶은 (주)이루다 제품이 있으십니까? *</span>
					<ul class="select-box">
						<li>
							<input type="radio" name="wr_87" id="ser_product1" value="네">
							<label for="ser_product1">네</label>
						</li>
						<li>
							<input type="radio" name="wr_87" id="ser_product2" value="아니오">
							<label for="ser_product2">아니오</label>
						</li>
					</ul>

					<span class="input-tit out-tit">데모를 신청하고 싶은 (주)이루다 제품이 있으십니까?</span>
					<ul class="select-box ser_equi">
						<li>
							<label for="ser_equi_possess6"><img src="/images/survey_1.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_88" id="ser_equi_possess6" value="reepot _ Q-532nm 레이저 [냉각기술을 이용한 색소치료]">
								<label for="ser_equi_possess6">1. reepot _ Q-532nm 레이저 <br>[냉각기술을 이용한 색소치료]</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess7"><img src="/images/survey_2.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_89" id="ser_equi_possess7" value="CuRAS _ 532nm/1064nm 파장대를 이용한 멀티펄스  Nd:YAG Laser">
								<label for="ser_equi_possess7">2. CuRAS _ 532nm/1064nm 파장대를 <br>이용한 멀티펄스  Nd:YAG Laser</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess9"><img src="/images/survey_4.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_90" id="ser_equi_possess9" value="N-Core 3D / N-Core Prime _ 755,808,1064 3파장 레이저/근적외선 에너지를 이용한 리프팅">
								<label for="ser_equi_possess9">3. N-Core 3D / N-Core Prime _<br>755,808,1064 3파장 레이저 /<br>근적외선 에너지를 이용한 리프팅</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess10"><img src="/images/survey_6.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_91" id="ser_equi_possess10" value="Healer 1064">
								<label for="ser_equi_possess10">4. Healer 1064</label>
							</div>
						</li>
						<li>
							<label for="ser_equi_possess11"><img src="/images/survey_7.png" alt=""></label>
							<div class="ser_equi_box">
								<input type="checkBox" name="wr_92" id="ser_equi_possess10" value="I-GRAFT">
								<label for="ser_equi_possess10">5. I-GRAFT</label>
							</div>
						</li>
						<li>
							<input type="checkbox" name="wr_92" id="ser_equi_possess9" value="기타">
							<label for="ser_equi_possess9">기타</label>	
							<input type="text" name="wr_92_text" class="ser_equi_possess9 hied_ex" placeholder="기타 답변을 해주세요.">
						</li>
						<li class="hide768"></li>
					</ul>
				</div>

				
				<span class="input-tit out-tit">이루다 Survey에 응답해주셔서 감사합니다.</span>
				<div class="input-box-title">
					<span>마지막으로 (주)이루다라는 브랜드의 첫인상은 어떠한지 솔직한 내용을 남겨주세요</span>
				</div>
				<div class="input-box">
					<span class="input-tit">마지막으로 (주)이루다는 어떤 느낌 입니까?<br>
					ex) 색소케어 글로벌no.1 / 냉각기술 / </span>
					<input type="text" name="wr_93" id="ser_last" class="impression" placeholder="기타 선호하는 시술을 입력해 주세요.">
				</div>
				<div class="submit-box">
					<input type="submit" value="제출하기" class="submit-btn">
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	$(document).ready(function() {
		$('input[type="checkBox"]').change(function() {
			if ($(this).val() === '기타') {
				var radioId = $(this).attr('id');
				var elements = $('.' + radioId);

				if ($(this).is(':checked')) {
					elements.addClass('on');
				} else {
					elements.removeClass('on');
				}
			}
		});
		$('input[type="radio"]').change(function() {
			if ($(this).val() === '기타') {
				var radioId = $(this).attr('id');
				var elements = $('.' + radioId);

				if ($(this).is(':checked')) {
					elements.addClass('on');
				}
			}
			else{
				$('.ser_sales6').removeClass('on');
			}
		});
	});
</script>
<script>
$(document).on("keyup", "input[name='wr_name']", function() {
	$(this).val( $(this).val().replace(/[^ㄱ-힣a-z_]/gi,"") );
});

$(document).on("keyup", "input[name='wr_38']", function() {
	$(this).val( $(this).val().replace(/[^ㄱ-힣]/gi,"") );
});

$(document).on("keyup", "input[name='wr_1']", function() {
	$(this).val( $(this).val().replace(/[^0-9]/gi,"") );
});

$(document).on("keyup", "input[name='wr_39']", function() {
	$(this).val( $(this).val().replace(/[^0-9]/gi,"") );
});

$(document).on("keyup", "input[name='wr_email']", function() {
	$(this).val( $(this).val().replace(/[^a-z0-9@_.-]/gi,"") );
});

// submit 최종 폼체크(필요시 사용)
function fregisterform_submit(f)
{
	

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}
</script>