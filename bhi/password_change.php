<?php
include_once('./_common.php');
//$g5['title'] = '';
$title = '비밀번호 찾기';

if($member['mb_id']){
	alert("잘못된 접근입니다.","/");
}

include_once('./head.php');
?>

<style>
	.register{padding:10vw;}
</style>
	<!-- <header>
		<div class="left">
			<a href="javascript:history.back();" class="prev"></a>
		</div>
		<h2>암호재설1정</h2>
	</header> -->
	<form action="/bbs/register_form_update_re.php" method="post" id="new_pass_form">
		<input type="hidden" name="w" value="u">
		<input type="hidden" name="re_url" value="/">
		<input type="hidden" name="mb_idt" class="cg_id" value="">
		

	<div class="register register_passchange">
		<div class="inner">
			
			

			<div class="tit">핸드폰번호(ID)</div>
			<input type="tel" name="mb_id" value="" class="inp small block" id="reg_mb_id" minlength="3" maxlength="20" placeholder="휴대폰 번호 숫자만 입력해주세요" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">

			<div class="box1 hidechw">SMS Auth<a href="javascript:;" class="ccertification_head">인증번호 전송</a></div>
			<div class="box1 showchw" style="display: none;">SMS Auth <a href="javascript:;" class="ccertification_head_re">인증번호 확인</a></div>



			<div class="mb10"><input type="text" class="code_number inp small block" placeholder="인증번호를 입력해 주세요."></div>
			


			<div class="tit">새 비밀번호</div>
			<div class="mb15"><input type="password" name="new_pass" class="new_pass inp block" placeholder="새 암호를 입력해 주세요 (4~32자)"></div>
			
			<div class="tit">새 비밀번호 확인</div>
			<div class="mb15"><input type="password" name="new_pass_re" class="inp block new_pass_re" placeholder="새 암호를 다시 입력해 주세요 (4~32자)"></div>
			
			
			
			<div class="mb20"><button type="button" class="btn1 block pass_change_bt">완료</button></div>
			<div class="have">이미 회원이십니까? <a href="/bbs/login.php">로그인</a></div>
		</div>
	</div>

	</form>
	
	
	<div class="modal" id="modalAlert">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>알림</h5>
					<!--<button class="close" data-dismiss="modal"></button>-->
				</div>
				<div class="modal-body">
					<div class="txt1 text-center">암호 재설정 성공</div>
				</div>
				<div class="modal-footer">
					<button class="btn1 block" data-dismiss="modal">완료</button>
				</div>
			</div>
		</div>
	</div>


	
	
	<script>
	
	
	var codenum = 0;
    var thisnum = 0;
	$('.ccertification_head').click(function(){
		
		
		if(!$("#reg_mb_id").val()){
			alert("핸드폰번호(ID)를 입력해주세요");
			return false;
		}
		


		
		$.ajax({ 
		url: "/certi_ex_change.php", 
		type: "POST", 
		cache: false,
		data:{'hphp':$("#reg_mb_id").val()},
		success: function(data) {
			if(data=='ok'){
				
				thisnum = 1;
				$(".showchw").show();
				$(".hidechw").hide();				
				
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


	function chkchk(){	//password
		if(codenum==0){
			alert("인증후 이용해주세요.");
			return false;
		}
		var okno = confirm("비밀번호를 변경하시겠습니까?");
		if(okno == true){
			if(!$('.new_pass').val()){
				alert("새 비밀번호를 입력해주세요.");
				return false;
			}
			if(!$('.new_pass_re').val()){
				alert("새 비밀번호 확인을 입력해주세요.");
				return false;
			}
			if($('.new_pass').val() !== $('.new_pass_re').val()){
				alert("새 비밀빈호가 서로 다릅니다");
				return false;
			}	
			
			$(".cg_id").val($("#reg_mb_id").val());		
			
			if(!$(".cg_id").val()){
				alert("핸드폰번호(ID)가 없습니다.")
				return false;
			}


			$("#new_pass_form").submit()

		}else if(okno == false){
		  
		}		
		return false;	
	}


	
	$(".pass_change_bt").click(function(){
		chkchk();
	})


	</script>
	
	
	


<?php
include_once(G5_PATH.'/tail.php');
?>