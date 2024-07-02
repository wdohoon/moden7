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
	<h2>인증</h2>
</header>
	
	<!-- <div class="register">
		<div class="inner">
			<div class="inp-box lang">
				<div class="lang">
					<button class="select1 block"><img src="img/common/ico_kr.png" alt="한국"> +82  <span>국가를 선택해 주세요.</span></button>
				</div>
			</div>
			<div class="inp-box type2">
				<input type="tel" class="inp1" placeholder="휴대폰 번호">
				<button class="btn1 f12" >인증번호전송</button>
			</div>
			<div class="form-desc">*본인확인 절차이며, 다른 용도로 사용되지 않습니다. </div>
			
			
			<div class="mb20"><button class="btn1 block" disabled>다음</button></div>
		</div>
	</div> -->
	<form action="" action="post" class="certi_form" onsubmit="return chkform();">
	<div class="register">
		<div class="inner">
			<div class="inp-box lang">
				<div class="lang">
					<button type="button" class="select1 block" id="BtnLangChoice"><img src="/img/common/ico_kr.png" alt="한국" class=""> +82  <span>국가를 선택해 주세요.</span></button>
				</div>
			</div>
			<div class="inp-box type2">
				<input type="tel" name="mb_id" value="<?php echo $member['mb_id'] ?>" class="inp1" required readonly id="reg_mb_id" minlength="3" maxlength="20" placeholder="휴대폰 번호">
				<button type="button" class="btn1 f12 ccertification_head" >인증번호전송</button>
				<!-- <button class="btn1 f13" disabled></button> -->
			</div>
			<div class="inp-box type2 hidechw" style="display: none;">
				<input type="text" name="" value="" class="inp1 code_number" id="" minlength="3" maxlength="20" placeholder="인증번호 6자리를 입력해주세요">
				<button type="button" class="btn1 f12 ccertification_head_re" >인증번호확인</button>
			</div>
			<div class="form-desc">*본인확인 절차이며, 다른 용도로 사용되지 않습니다. </div>
			<div class="mb20"><button type="submit" class="btn1 block btn_submit" id="btn_submit" accesskey="s" style="background:#707070;"><?php echo $w==''?'다음':'내정보수정'; ?></button></div>
			<!-- <div class="have">이미 회원이십니까? <a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo $urlencode; ?>">로그인</a></div> -->
		</div>
	</div>
	</form>
	
	

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





<script>
var country_select=0; // 국가 선택 했나 안했나?


var codenum = 0;
var thisnum = 0;
	$('.ccertification_head').click(function(){
		

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



function chkform(){
	
	
	
	
	if(codenum==0){
	alert('인증안했음. 설정하세요');
	return false;
	}else{
	alert('인증했음. 설정하세요');
	return false;	
	}





	alert();

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

   // 인증 종류에 따라 서브밋을 달리
   $(".certi_form").attr("action","넘어갈주소");
   
   return true;
   

}






</script>


<?php
include_once(G5_PATH.'/tail.php');
?>
