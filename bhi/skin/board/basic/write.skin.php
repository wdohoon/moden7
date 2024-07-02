<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<style>
.filebox .upload-name {
    display: inline-block;
    height: 40px;
    padding: 0 10px;
    vertical-align: middle;
    width: 90%;
	border: none;
    color: #999999;
}

.filebox input[type="file"] {
    position: absolute;
    width: 0;
    height: 0;
    padding: 0;
    overflow: hidden;
    border: 0;
}
.name{
	display: flex; 
	gap:10px;
}
.labels, .col3{
	display:flex;
	gap:10px;
}
.labels label, .col3 .col{
	width: 33.3333%;
	padding:7px 0;
}
.txt-radio + span,  .col3 .col input{
	width: 100%;
}
#bo_w{padding:5vw;background:#F1F1F5;}
.inner{background:#fff;padding:40px;border-radius:8px;}
.inner h1{font-size: 20px;font-weight: 600;line-height: 28px;letter-spacing: -0.025em;text-align: center;border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:16px 0;position:relative;}
.left a{position:absolute;left:10px;background:url('/skin/board/basic/img/vector.png');width: 30px;height: 26px;}
.board-write .tit{font-size: 20px;font-weight: 600;line-height: 28px;letter-spacing: -0.025em;text-align: left;color:#111111;padding:30px 0 16px;}
.board-write .inp1{border: 1px solid #E5E5EC;padding:12px;}
.txt-radio + span{height: 45px;display: flex;justify-content:center;align-items:center;font-size: 14px;font-weight: 400;line-height: 20px;letter-spacing: -0.025em;}
.board-write .files{border: 1px solid #E5E5EC;}
</style>
<section id="bo_w">
    <h2 class="sound_only"><?php echo $g5['title'] ?></h2>
	<div class="board-write">
		<div class="inner">
			<!-- 게시물 작성/수정 시작 { -->
			<form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
			<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
			<input type="hidden" name="w" value="<?php echo $w ?>">
			<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
			<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
			<input type="hidden" name="stx" value="<?php echo $stx ?>">
			<input type="hidden" name="spt" value="<?php echo $spt ?>">
			<input type="hidden" name="sst" value="<?php echo $sst ?>">
			<input type="hidden" name="sod" value="<?php echo $sod ?>">
			<input type="hidden" name="page" value="<?php echo $page ?>">
			<input type="hidden" name="wr_subject" value="<?php echo $member['mb_id'];?>님의 KYC인증">
			<input type="hidden" name="wr_content" class="code" value="">
			<h1> 
				<div class="left">
					<a href="javascript:history.back();" class="prev"></a>
				</div> 
				KYC 인증
			</h1>
			<div class="tit">국가</div>
			<div class="mb10">
				<?php include_once(G5_PATH.'/country_select.php'); ?>
				<script>
					var country = "<?php echo $write['wr_1'];?>";
					
					window.onload = function() {
						// JavaScript 변수 country의 값을 가져온다
						var selectedCountry = country;

						// select 요소를 가져온다
						var selectElement = document.getElementById("wr_1");

						// select 요소의 각 option을 순회하며 값이 일치하는 option을 선택한다
						for (var i = 0; i < selectElement.options.length; i++) {
							if (selectElement.options[i].getAttribute("data-countryCode") === selectedCountry) {
								selectElement.options[i].selected = true;
								break;
							}
						}
						updateHiddenInput();
					};

					function updateHiddenInput() {
						// 선택한 옵션 요소 가져오기
						var selectElement = document.getElementById("wr_1");
						var selectedOption = selectElement.options[selectElement.selectedIndex];

						// value와 data-countryCode 가져오기
						var countryCode = selectedOption.getAttribute("data-countryCode");

						// hidden input 요소 업데이트
						var hiddenInput = document.querySelector("input.code");
						hiddenInput.value = countryCode;
					}
				</script>
			</div>
			<div class="tit">성명</div>
			<div class="mb10 name">
				<input type="text" class="inp1 block" name="wr_2" value="<?php echo $write['wr_2'] ? $write['wr_2'] : '';?>" placeholder="이름">
				<input type="text" class="inp1 block" name="wr_3" value="<?php echo $write['wr_3'] ? $write['wr_3'] : '';?>" placeholder="성">
			</div>
			<div class="tit">신분증 유형</div>
			<div class="inp-box mb10"><!-- 
				<button class="lang"><img src="/img/common/ico_kr.png"> <span>+82</span></button>
				<input type="tel" class="inp1 block" name="wr_1" value="<?php echo $member['mb_id'] ? $member['mb_id'] : '';?>"> -->
				<div class="labels">
					<label><input type="radio" class="txt-radio" name="wr_4" value="신분증" <?php echo $write['wr_4'] == '신분증' ? 'checked' : '';?>><span>신분증</span></label>
					<label><input type="radio" class="txt-radio" name="wr_4" value="운전면허증" <?php echo $write['wr_4'] == '운전면허증' ? 'checked' : '';?>><span>운전면허증</span></label>
					<label><input type="radio" class="txt-radio" name="wr_4" value="여권" <?php echo $write['wr_4'] == '여권' ? 'checked' : '';?>><span>여권</span></label>
				</div>
			</div>
				
			<div class="tit">라이센스 번호</div>
			<div class="mb10">
				<input type="text" class="inp1 block" name="wr_5" value="<?php echo $write['wr_5'] ? $write['wr_5'] : '';?>">
			</div>

			<div class="tit">생년월일</div>
			<div class="col3">
				<div class="col"><input type="text" name="wr_6" id="wr_6" required="" minlength="4" maxlength="4" class="inp" placeholder="연(예:1970)"
				value="<?php echo $write['wr_6'] ? $write['wr_6'] : '';?>" ></div>
				<div class="col"><input type="text" name="wr_7" id="wr_7" required="" minlength="2" maxlength="2" class="inp" placeholder="월(예:01)"
				value="<?php echo $write['wr_7'] ? $write['wr_7'] : '';?>"></div>
				<div class="col"><input type="text" name="wr_8" id="wr_8" required="" minlength="2" maxlength="2" class="inp" placeholder="일(예:05)"
				value="<?php echo $write['wr_8'] ? $write['wr_8'] : '';?>"></div>
			</div>
					

			<!-- 
			<div class="tit">내용 (Content)</div>
			<div class="mb10">
				<textarea class="textarea" name="wr_content"></textarea>
			</div> -->

			<div class="tit"><br></div>

			<div class="files filebox">
					<input class="upload-name" value="첨부파일" placeholder="첨부파일">
					<label for="file" class="btn1">파일첨부</label> 
					<input type="file" id="file" name="bf_file[]" id="bf_file_1" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능">
				</div>


			<?php if ($is_use_captcha) { //자동등록방지  ?>
			<div class="write_div">
				<?php echo $captcha_html ?>
			</div>
			<?php } ?>

			<div class="btn_confirm write_div">
				<a href="<?php echo get_pretty_url($bo_table); ?>" class="btn_cancel btn">취소</a>
				<button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn">작성완료</button>
			</div>
			</form>

			<script>
			$("#file").on('change',function(){
				var fileName = $("#file").val().split("\\");
				$(".upload-name").val(fileName[fileName.length-1]);
			});

			<?php if($write_min || $write_max) { ?>
			// 글자수 제한
			var char_min = parseInt(<?php echo $write_min; ?>); // 최소
			var char_max = parseInt(<?php echo $write_max; ?>); // 최대
			check_byte("wr_content", "char_count");

			$(function() {
				$("#wr_content").on("keyup", function() {
					check_byte("wr_content", "char_count");
				});
			});

			<?php } ?>
			function html_auto_br(obj)
			{
				if (obj.checked) {
					result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
					if (result)
						obj.value = "html2";
					else
						obj.value = "html1";
				}
				else
					obj.value = "";
			}

			function fwrite_submit(f)
			{
				<?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

				var subject = "";
				var content = "";
				$.ajax({
					url: g5_bbs_url+"/ajax.filter.php",
					type: "POST",
					data: {
						"subject": f.wr_subject.value,
						"content": f.wr_content.value
					},
					dataType: "json",
					async: false,
					cache: false,
					success: function(data, textStatus) {
						subject = data.subject;
						content = data.content;
					}
				});

				if (subject) {
					alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
					f.wr_subject.focus();
					return false;
				}

				if (content) {
					alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
					if (typeof(ed_wr_content) != "undefined")
						ed_wr_content.returnFalse();
					else
						f.wr_content.focus();
					return false;
				}

				if (document.getElementById("char_count")) {
					if (char_min > 0 || char_max > 0) {
						var cnt = parseInt(check_byte("wr_content", "char_count"));
						if (char_min > 0 && char_min > cnt) {
							alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
							return false;
						}
						else if (char_max > 0 && char_max < cnt) {
							alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
							return false;
						}
					}
				}

				<?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

				document.getElementById("btn_submit").disabled = "disabled";

				return true;
			}
			</script>
		</div>
	</div>
</section>
<!-- } 게시물 작성/수정 끝 -->