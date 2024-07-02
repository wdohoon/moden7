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




if(!$_POST['mb_id']){
	alert('잘못된 접근입니다.','/');
}

?>

<!-- 회원정보 입력/수정 시작 { -->

<div class="register">
<script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
<?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
<script src="<?php echo G5_JS_URL ?>/certify.js?v=<?php echo G5_JS_VER; ?>"></script>
<?php } ?>

	<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url.'?ref='.$ref ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
	<input type="hidden" name="w" value="<?php echo $w ?>">
	<input type="hidden" name="url" value="<?php echo $urlencode ?>">
	<input type="hidden" name="agree" value="<?php echo $agree ?>">
	<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
	<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
	<input type="hidden" name="cert_no" value="">
	<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
	<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
	<input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
	<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
	<input type="hidden" name="ref" value="<?php echo $ref ?>">
	<?php }  ?>
	
	<div id="register_form" class="form_01">   
	    <div class="register">
			<div class="inner">
				<div class="inp-box lang">
<!---					<div class="lang">
						<button type="button" class="select1 block" id="BtnLangChoice"><img src="/img/common/ico_kr.png" alt="한국" class=""> +82  <span>국가를 선택해 주세요.</span></button>
					</div>  --->
				</div>
				<div class="inp-box type2">
					<input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" class="inp1" <?php echo $required ?> <?php echo $readonly ?> id="reg_mb_id" minlength="3" maxlength="20" placeholder="아이디를 입력해주세요" ">
<!---					<button type="button" class="btn1 f12 ccertification_head" >인증번호전송</button> -->
					<!-- <button class="btn1 f13" disabled></button> -->
				</div>
				<div class="inp-box type2 hidechw" style="display: none;">
					<input type="text" name="" value="" class="inp1 code_number" id="" minlength="3" maxlength="20" placeholder="인증번호 6자리를 입력해주세요">
					<button type="button" class="btn1 f12 ccertification_head_re" >인증번호확인</button>
				</div>
				<div class="form-desc">*영문 숫자 4~16자리를 입력하세요. 특수문자(!,@,#,$,*)사용은 불가능 합니다.</div>
				<div class="mb20"><button type="submit" class="btn1 block btn_submit" id="btn_submit" accesskey="s" style="background:#707070;"><?php echo $w==''?'다음':'내정보수정'; ?></button></div>
				<div class="have">이미 회원이십니까? <a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo $urlencode; ?>">로그인</a></div>
			</div>
		</div>

		
		<!--  국가선택 레이어 -->
		<div class="layer-lang">
			<header>
				<div class="left">
					<a href="#" class="close"></a>
				</div>
				<h2>국가선택</h2>
			</header>
			<div class="search">
				<div class="head">
					<input type="text" class="inp-srch" placeholder="Search">
					<button class="btn-srch"></button>
				</div>
				<div class="body">
					<ul>
						<li>
							<a href="javascript:;" class="country">
								<span><img src="/img/common/ico_kr.png"></span>
								<p>Republic of Korea</p>
								<em>+82</em>
							</a>
						</li>
						<!-- <li>
							<a href="javascript:;" class="country">
								<span><img src="/img/common/ico_kr.png"></span>
								<p>United States of America</p>
								<em>+82</em>
							</a>
						</li>
						<li>
							<a href="javascript:;" class="country">
								<span><img src="/img/common/ico_kr.png"></span>
								<p>japan</p>
								<em>+82</em>
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!--  // 국가선택 레이어 -->

	</div>
	</form>
</div>



<script>
var country_select=0; // 국가 선택 했나 안했나?


var codenum = 0;
var thisnum = 0;
	$('.ccertification_head').click(function(){
		codenum = 1;
/*
		if(country_select=='0'){
			alert('국가를 선택해주세요');
			return false;
		} 

		var chwExp = /^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?[0-9]{3,4}-?[0-9]{4}$/;
		var telhp = $("#reg_mb_id").val();
		 
		if( !chwExp.test(telhp) ) {
			alert('핸드폰번호를 정확히 입력해주세요');
			return false;
		}

*/
		
		$.ajax({ 
		url: "/certi_ex.php", 
		type: "POST", 
		cache: false,
		data:{'hphp':$("#reg_mb_id").val()},
		success: function(data) {
			if(data=='ok'){
				$("#reg_mb_id").prop('readonly',true);
				$("#reg_mb_id").css({
					'background':'#555',
					'color':'#fff'
				});
				thisnum = 1;
				$(".hidechw").show();				
				
				$('.ccertification_head').hide();
				//$(".certi_boxhead>p").text('3분안에 코드를 입력해주세요');
			}else if(data=='111'){
				alert('재요청은 요청후 3분지나야 가능합니다.');
				return false;
			}else if(data=='404'){
				alert('알수없는 오류/n다시 요청해 주세요');
				location.href=location.href;
			}else{
				alert(data);
			} 
		},
		dataType:"html"
		});
	})

	$('.ccertification_headre').click(function(){
		 
        if(codenum==1){
			alert('이미 확인되었습니다.');
			return false;
		}

		$.ajax({ 
		url: "/certi_ex.php", 
		type: "POST", 
		cache: false,
		data:{'hphp':$("#reg_mb_id").val()},
		success: function(data) {
			if(data=='ok'){
				$('.ccertification_head').hide();
				$('.ccertification_head_re').show();
				//$(".certi_boxhead>p").text('3분안에 코드를 입력해주세요');
			}else if(data=='111'){
				alert('재요청은 요청후 3분지나야 가능합니다.');
				return false;
			}else if(data=='404'){
				alert('알수없는 오류/n다시 요청해 주세요');
				location.href=location.href;
			}else{
				alert(data);
			} 
		},
		dataType:"html"
		});
	})
	
	$('.ccertification_head_re').click(function(){
		
		if(codenum==1){
			alert('이미 확인되었습니다.');
			return false;
		}
		var code6s = $(".code_number").val();
		
		if(code6s=='' || code6s.length!=6){
			alert('코드 6자리를 입력해주세요');
			return false;
		}
		$.ajax({ 
		url: "/certi_ex_re.php", 
		type: "POST", 
		cache: false,
		data:{code:code6s},
		success: function(data) {
			if(data=='100'){
				
				$(".code_number").prop('readonly',true);
				$(".code_number").css({
					'background':'#555',
					'color':'#fff'
				});
				
				$(".ccertification_head_re").text('인증완료');
				//$(".certi_boxhead>p").text('본인확인 되었습니다.');
				codenum = 1;
				//$(".code_number").prop('disabled',true);
				//echo "502";//502면 유효기간 만료 
				//echo '200'; // 200이면 코드 불일치 or 지난 코드
				//echo "100";//100이면 코드 일치 
				$(".ccertification_headre").hide();
			}else if(data=='502'){
				alert('유효시간 3분이 만료된 코드입니다. 다시 받아주세요.');
				location.href=location.href;
				
			}else if(data=='200'){
				alert('코드 불일치 다시 입력해주세요');
				
				
				
			}
		},
		dataType:"html"
		});
	})

	/*인증하기 끝*//*인증하기 끝*/
</script>



<script>

	
	
	$(".country").click(function(){
		var thisp = $(this).children("p").text();
		var thisem = $(this).children("em").text();
		var thisimg = $(this).children("span").children("img").attr("src");
		var htmlwrite = "<img src='"+thisimg+"' alt=''> "+thisem+"  <span>"+thisp+"</span>";
		$("#BtnLangChoice").html(htmlwrite);
		$('.layer-lang').fadeOut(300);
		country_select = 1;
	})

	$('#BtnLangChoice').click(function(){
		$('.layer-lang').fadeIn(300);
	})
	$('.layer-lang .close').click(function(){
		$('.layer-lang').fadeOut(300);
	});

$(function() {
    $("#reg_zip_find").css("display", "inline-block");

    <?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
    // 아이핀인증
    $("#win_ipin_cert").click(function() {
        if(!cert_confirm())
            return false;

        var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php";
        certify_win_open('kcb-ipin', url);
        return;
    });

    <?php } ?>
    <?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
    // 휴대폰인증
    $("#win_hp_cert").click(function() {
        if(!cert_confirm())
            return false;

        <?php
        switch($config['cf_cert_hp']) {
            case 'kcb':
                $cert_url = G5_OKNAME_URL.'/hpcert1.php';
                $cert_type = 'kcb-hp';
                break;
            case 'kcp':
                $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
                $cert_type = 'kcp-hp';
                break;
            case 'lg':
                $cert_url = G5_LGXPAY_URL.'/AuthOnlyReq.php';
                $cert_type = 'lg-hp';
                break;
            default:
                echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
                echo 'return false;';
                break;
        }
        ?>

        certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
        return;
    });
    <?php } ?>
});

// submit 최종 폼체크
function fregisterform_submit(f)
{	
	/*
	if(country_select=='0'){
		alert('국가를 선택해주세요');
		return false;
	}
*/
	codenum = 1;
	if(codenum==0){
		if(thisnum == 0){	
			
			$("#reg_mb_id").css({
				'background':'#fff',
				'color':'#333'
			});
		
		}else{
		
			$("#reg_mb_id").prop('readonly',true);
			$("#reg_mb_id").css({
				'background':'#555',
				'color':'#fff'
			});

		}		
		alert('핸드폰인증후 회원가입이 가능합니다.');
		return false;
   }

	country_select = 82;

	if(country_select=='0'){
		alert("국가를 선택해주세요.");
		return false;
	}else if(!$("#reg_mb_id").val()){
		alert("휴대폰번호를 입력해주세요.");
		return false;
	}

	//alert("국가선택 핸드폰번호 다 적었군");
	//return false;






    return true;
}

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