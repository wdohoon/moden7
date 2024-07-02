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
	<h2>고객센터</h2>
</header>
	
	
	<form action="/bbs/write_update_this.php" method="post" class="" onsubmit="return gosgos()" enctype="multipart/form-data" autocomplete="off">
		<input type="hidden" name="bo_table" value="inquiry">
		<input type="hidden" name="" value="">
	
		<div class="board-write">
			<div class="inner">
				<div class="tit">성명</div>
				<div class="mb10">
					<input type="text" name="wr_name" class="inp1 block gumsa_1" value="<?php echo $member['mb_name']?>">
				</div>
				<div class="tit">아이디 (핸드폰번호)</div>
				<div class="inp-box mb10">
					<button class="lang"><img src="img/common/ico_kr.png"> <span>+82</span></button>
					<input type="tel" class="inp1 block gumsa_2" name="mb_id" value="<?php echo $member['mb_id'];?>">
				</div>
				
				<div class="tit">이메일주소</div>
				<div class="mb10">
					<input type="text" class="inp1 block gumsa_3" name="wr_email" value="<?php echo $member['mb_email'];?>">
				</div>
				

				
				
				<div class="tit">제목 (Subject)</div>
				<div class="mb10">
					<input type="text" name="wr_subject" class="inp1 block gumsa_4" value="">
				</div>
				
				<div class="tit">내용 (Content)</div>
				<div class="mb10">
					<textarea class="textarea gumsa_5" name="wr_content"></textarea>
				</div>
				
				<div class="files">
					<ul>
						<li class="file_name_li"></li>
					</ul>
					<button type="button" class="btn1 btn11">파일첨부</button>
					<input type="file" style="display: none;" name="bf_file[]" id="bf_file_0" title="파일첨부 0 : 용량 11111 이하만 업로드 가능" class="frm_file ">
				</div>
				
				<button type="submit" class="btn1 block">문의하기</button>
			</div>
		</div>
	</form>	
	

	<script>
		

		function gosgos(){
			if(!$(".gumsa_1").val()){
				alert("성명을 입력해주세요");
				return false;
			}
			if(!$(".gumsa_2").val()){
				alert("아이디(핸드폰번호)를 입력해주세요");
				return false;
			}
			if(!$(".gumsa_3").val()){
				alert("메일주소를 입력해주세요");
				return false;
			}
			if(!$(".gumsa_4").val()){
				alert("제목을 입력해주세요");
				return false;
			}
			if(!$(".gumsa_5").val()){
				alert("내용을 입력해주세요");
				return false;
			}

			return true;
		}

		$(".btn11").click(function(){
			$("#bf_file_0").click();
		})
		$("#bf_file_0").change(function(){
			$(".file_name_li").text($(this).val());
		})	
		
	</script>
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>