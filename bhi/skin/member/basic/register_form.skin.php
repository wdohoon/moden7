<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$ref = $_GET["ref"];


// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
//echo $mb_id;

$pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$referral = '';
for ($i =0 ; $i < 8; $i++ )
{
	$referral .= $pattern[rand(0,26)];
}


?>
<style>
body{background: #F1F1F5;}
.register{background:#fff;width: 55vw;margin:5vw auto 5vw;padding:0;border-radius:8px;}
.register h1{font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: center;padding: 40px 0 23px;}
.register .inp-box1{padding-right: 0;}
.register .col3{display: block;}
.register .col3 p{font-size: 12px;font-weight: 400;line-height: 18px;letter-spacing: -0.025em;text-align: left;color:#999999;padding: 10px 0;}
.cols input {border: none !important; border-bottom: 1px solid #ccc !important; outline: none; box-sizing: border-box; margin: 10px 0;width: 100%;border-radius:0;}
.have{padding-bottom: 40px;}
.inner{width: 90%;margin:0 auto;}
.col{display: flex;width: 100%;}
.txt-radio + span{width: 15%;}
.labels{width: 85%;}
.col3s{display: flex;gap:16px;width: 85%;}
.register .nowrap{border-bottom:1px solid #ccc;padding: 8px 0 8px;}
.register .tit{margin:0; width: 15%;font-size: 16px;font-weight: 400;line-height: 24px;letter-spacing: -0.025em;text-align: left;}
.inp{width: 100%;}
.m56{width: 56%;}
.register .email{width: 56%;}
#reg_mb_email{width: 50%;}
select{width: 50%;}
.pin h1{font-size: 20px;font-weight: 600;line-height: 28px;letter-spacing: -0.025em;text-align: left;}
.pin p{font-size: 12px;font-weight: 400;line-height: 20px;text-align: left;color:#DC0000;border-bottom:1px solid #ccc;padding-bottom:8px;}
.flex{display: flex;align-items: center;padding: 8px 0;border-bottom:1px solid #ccc;}
.register .agree{padding-top:20px;}
.checkbox + p span{font-size: 16px;font-weight: 400;line-height: 20px;text-align: center;color:#505050;}
.register .agree a{font-size: 16px;font-weight: 400;line-height: 20px;text-align: center;color:#8A8A8A;}
.register .agree > div{display: flex;align-items:center;gap:8px;}
.checkbox + p em{width: 20px;height: 20px;}
.checkbox:checked + p em {background: #4896EC;border-color: #4896EC;}
.register .have{font-size: 12px;font-weight: 400;line-height: 12px;text-align: center;}
.register .have a{color:#1F489B;padding-left:8px;}
.btn1{background: #4896EC;width:71px;height: 34px;display: flex;align-items:center;justify-content:center;border-radius:0;font-size: 13px;font-weight: 400;line-height: 18px;letter-spacing: -0.025em;text-align: center;}
.mb20{display: flex;justify-content:center;}
.txt-radio:checked + span{background: #4896EC;border-color: #4896EC;}

@media screen and (max-width: 1024px) {
	.register{width: 100%;}
	.register .tit{width: 20%;}
}
@media screen and (max-width: 750px) {
	.register .tit{width: 30%;}
	.labels{width: 70%;}
	.col3s{width: 70%;}
	.register .col3 .col .inp{width: 50%;}
	.txt-radio + span{width: 30%;}
}
@media screen and (max-width: 480px) {
	.col3s{flex-wrap:wrap;}
	.register .nowrap{display: block;}
	.register .email{width: 100%;}
}
</style>
<!-- 회원정보 입력/수정 시작 { -->

<div class="register">
<script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
<?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
<script src="<?php echo G5_JS_URL ?>/certify.js?v=<?php echo G5_JS_VER; ?>"></script>
<?php } ?>

	<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
	<input type="hidden" name="w" value="<?php echo $w ?>">
	<input type="hidden" name="url" value="<?php echo $urlencode ?>">
	<input type="hidden" name="agree" value="<?php echo $agree ?>">
	<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
	<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
	<input type="hidden" name="cert_no" value="">
	<input type="hidden" name="mb_id" value="<?php echo $mb_id;?>">
	<!-- <?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?> -->
	<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
	<input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
	<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
	<?php }  ?>

	<div class="register">
		<h1>회원가입</h1>
		<div class="inner">
			<div class="col3">
				<div class="cols">
					<input type="text" class="inp" id="reg_mb_id" name="mb_id" value="<?php echo get_text($member['mb_id']) ?>" <?php echo $required ?> <?php echo $readonly; ?> maxlength="10" size="10" placeholder="아이디를 입력해주세요">
				</div>
				<p>*영문 숫자 4~16자리를 입력하세요. 특수문자(!,@,#,$,*)사용은 불가능 합니다.</p>
				<!-- <div class="col"><input type="text" class="inp danger" id="reg_mb_name" name="mb_1" value="<?php echo get_text($member['mb_1']) ?>" <?php echo $required ?> <?php echo $readonly; ?> maxlength="10" size="10" placeholder="성"></div>
				<div class="col"><input type="text" class="inp" id="reg_mb_name" name="mb_2" value="<?php echo get_text($member['mb_2']) ?>" <?php echo $readonly; ?> maxlength="20" size="10" placeholder="미들(선택)"></div> -->
				<div class="nowrap">
				<div class="tit">성명</div>
				<div class="col"><input type="text" class="inp" id="reg_mb_name" name="mb_name" value="<?php echo get_text($member['mb_name']) ?>" <?php echo $required ?> <?php echo $readonly; ?> maxlength="10" size="10" placeholder="이름"></div>
				</div>
			</div>
			
			<div class="nowrap mb15">
				<div class="tit">성별</div>
				<div class="labels">
					<label><input type="radio" class="txt-radio" name="mb_sex"  value="M" <? if($member['mb_sex'] == "M") echo "checked"; ?> ><span>남자</span></label>
					<label><input type="radio" class="txt-radio" name="mb_sex"  value="F" <? if($member['mb_sex'] == "F") echo "checked"; ?>><span>여자</span></label>
				</div>
			</div>

			<div class="nowrap mb15">
				<div class="tit">생년월일</div>
				<div class="col3s">
					<div class="col"><input type="text" name="mb_4" id="reg_mb_4" <?php echo $required ?> minlength="4" maxlength="4" class="inp" placeholder="연(예:1970)"></div>
					<div class="col"><input type="text" name="mb_5" id="reg_mb_5" <?php echo $required ?> minlength="2" maxlength="2" class="inp" placeholder="월(예:01)"></div>
					<div class="col"><input type="text" name="mb_6" id="reg_mb_6" <?php echo $required ?> minlength="2" maxlength="2" class="inp" placeholder="일(예:05)"></div>
				</div>
			</div>
			
			<div class="nowrap mb15">
				<div class="tit">비밀번호</div>
				<div class="mb15 m56"><input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> minlength="3" maxlength="20" class="inp block" placeholder="비밀번호 4~32 자"></div>
			</div>
			<div class="nowrap mb15">
				<div class="tit">비밀번호 확인</div>
				<div class="mb15 m56"><input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> minlength="3" maxlength="20" class="inp block" placeholder="비밀번호 4~32 자"></div>
			</div>

			<div class="nowrap mb15">
				<div class="tit">이메일주소</div>
				<div class="email mb5">
					<input type="hidden" name="mb_9" value="<?php echo $referral;?>">
					<input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
					<input type="text" name="mb_7" value="<?php echo isset($member['mb_7'])?$member['mb_7']:''; ?>" id="reg_mb_email" class="inp block" size="70" maxlength="100" placeholder="">
					<span>@</span>
					<select class="select" name="mb_8">
						<option>직접입력</option>
						<option value="naver.com">naver.com</option>
						<option value="gmail.com">gmail.com</option>
						<option value="daum.net">daum.net</option>
					</select>
					<!-- <button type="button" class="btn1 f12">인증번호전송</button> -->
				</div>
			</div>
			<!-- [개발] 직접입력 선택시 span 과 select 삭제할것 -->
			
			<!-- <div class="f11 gray mb10">*본인확인 절차이며, 다른 용도로 사용되지 않습니다.</div> -->
			
			<!-- <div class="inp-box type2">
				<input type="tel" class="inp1" value="">
				<span>04:48</span>
				<button type="button" class="btn1 f12">인증하기</button>
			</div> -->

			<div class="nowrap mb15">
				<div class="tit">초대코드(선택)</div>
				<div class="mb15 m56">
					<div class="inp-box1">
						<input type="text" class="inp block" name="mb_recommend" placeholder="" value = "<?php echo $ref;?>">
						<!-- <button type="button" class="btn-qr"></button> -->
					</div>
				</div>
			</div>
			
			<div class="pin">
				<h1>핀 번호</h1>
				<p>* (필수) 원활한 거래를 위해 핀 번호 4자리를 등록해 주세요.</p>			
			</div>
			<div class="flex">
				<div class="tit">핀 번호</div>
				<div class="mb15 m56">
					<div class="inp-box1">
						<input type="text" class="inp block" name="mb_1" placeholder="" value = "<?php echo $member['mb_1']?>">
					</div>
				</div>
			</div>
			<div class="flex">
				<div class="tit">핀 번호 확인</div>
				<div class="mb15 m56">
					<div class="inp-box1">
						<input type="text" class="inp block" name="mb_2" placeholder="" value = "<?php echo $member['mb_2']?>">
					</div>
				</div>
			</div>

			
			<div class="agree">
				<div><label><input type="checkbox" class="checkbox" id="chk_agree1"><p><em></em><span>이용약관에 동의합니다.</span></p></label> <a href="#" data-toggle="modal" data-target="#modalTerms">이용 약관 보기</a></div>
				<div><label><input type="checkbox" class="checkbox" id="chk_agree2"><p><em></em><span>개인정보 수집동의 약관에 동의합니다.</span></p></label> <a href="#" data-toggle="modal" data-target="#modalPrv">개인정보 수집동의 약관 보기</a></div>
			</div>
			
			
			<div class="mb20"><button type="submit" id="btn_submit" class="btn1 block btn_submit" accesskey="s"><?php echo $w==''?'완료':'내정보수정'; ?></button></div>
			<div class="have">이미 회원이십니까? <a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo $urlencode; ?>">로그인</a></div>
		</div>
	</div>

	<div class="modal" id="modalTerms">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>이용약관</h5>
					<button class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="terms-txt">
						<?php echo $config['cf_stipulation']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal" id="modalPrv">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>개인정보 수집동의 약관</h5>
					<button class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="terms-txt"><?php echo $config['cf_privacy']; ?></div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

<script>
<script>
// submit 최종 폼체크
function fregisterform_submit(f)
{
    var p = document.getElementById('reg_mb_password'); 
    var p_cf = document.getElementById('reg_mb_password_re'); 
    var pin = document.getElementsByName('mb_1')[0];
    var pin_cf = document.getElementsByName('mb_2')[0];

    if (p.value != p_cf.value) {  // 비밀번호 확인 
        alert("비밀번호가 일치하지 않습니다. 확인해 주세요"); 
        p_cf.focus(); 
        return false; 
    } 

    if (pin.value != pin_cf.value) {  // 핀 번호 확인 
        alert("핀 번호가 일치하지 않습니다. 확인해 주세요"); 
        pin_cf.focus(); 
        return false; 
    }

    if(document.getElementById("chk_agree1").checked == false){
        alert('이용약관에 동의해주세요.');
        return false;
    }

    if(document.getElementById("chk_agree2").checked == false){
        alert('개인정보 수집동의 약관에 동의해주세요.');
        return false;
    }
    return true;
}
</script>


jQuery(function($){
	//tooltip
    $(document).on("click", ".tooltip_icon", function(e){
        $(this).next(".tooltip").fadeIn(400).css("display","inline-block");
    }).on("mouseout", ".tooltip_icon", function(e){
        $(this).next(".tooltip").fadeOut();
    });
});

</script>

<!-- } 회원정보 입력/수정 끝 -->