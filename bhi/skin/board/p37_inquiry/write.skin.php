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
body{background:url('/img/inquiry_bg.png')no-repeat center center;}
#bo_w{width: 50%;margin:0 auto;}
.inner{background:#fff;height: 700px;border-radius:16px;padding: 50px 24px;}
.board-write h1{font-size: 40px;font-weight: 600;line-height: 52px;letter-spacing: -0.025em;text-align: center;padding: 140px 0 8px;}
.board-write p{font-size: 20px;font-weight: 400;line-height: 28px;letter-spacing: -0.025em;text-align: center;padding-bottom:77px;}
.board-write .tit{font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;text-align: left;color:#111111;padding-bottom:8px;}
.mb10 input{background: #F1F1F5;border:none;width: 100%;height: 64px;border-radius: 4px;padding:19px;margin-bottom:32px;}
.board-write .inp1{padding-left:19px;}
.mb10 textarea{background: #F1F1F5;border:none;border-radius: 4px;padding:19px;height: 353px !important;}
.btn1{width: 107px;height:40px;border-radius: 4px;background: #4896EC;}
.agree{margin-top:20px;}
.flex{display: flex;justify-content:space-between;align-items:center;flex-wrap:wrap;}
.board-write p{padding-bottom:0;}
.checkbox + p em{width: 20px;height: 20px;}

@media screen and (max-width: 1280px) {
	#bo_w{width: 90%;}
}
</style>

<section id="bo_w">
    <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

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

	<div class="board-write">
	
		<h1>온라인 문의</h1>
		<p>BHI 거래소는 완전히 무료로 사용이 가능한 멀티 지갑을 지원 합니다.</p>
		<div class="inner">
			<!-- <div class="tit">성명</div>
			<div class="mb10">
				<input type="text" class="inp1 block" name="wr_name" value="<?php echo $member['mb_name'] ? $member['mb_name'] : '';?>">
			</div> -->
				<input type="hidden" class="inp1 block" name="wr_subject" value="온라인 문의">

			<div class="tit">연락처 / 이메일</div>
			<div class="mb10">
				<input type="tel" class="inp1 block" name="wr_1" value="" placeholder="010-0000-0000" required	>
			</div>
			
			<!-- <div class="tit">이메일주소</div>
			<div class="mb10">
				<input type="text" class="inp1 block" name="wr_email" value="<?php echo $member['mb_email'] ? $member['mb_email'] : '';?>">
			</div>
						
			<div class="tit">제목 (Subject)</div>
			<div class="mb10">
				<input type="text" class="inp1 block" name="wr_subject" value="">
			</div> -->
			
			<div class="tit">내용</div>
			<div class="mb10">
				<textarea class="textarea" name="wr_content" required></textarea>
			</div>
			
			<!-- <div class="files filebox">
				<input class="upload-name" value="첨부파일" placeholder="첨부파일">
				<label for="file" class="btn1">파일첨부</label> 
				<input type="file" id="file" name="bf_file[]" id="bf_file_1" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능">
			</div> -->
				<div class="agree">
				<div class="flex"><label><input type="checkbox" class="checkbox" id="chk_agree2" required><p><em></em><span>개인정보 수집동의 약관에 동의합니다.</span></p> <a href="#" data-toggle="modal" data-target="#modalPrv">개인정보 수집동의 약관 보기</a></label>
				<input type="submit" value="문의하기" id="btn_submit" accesskey="s" class="btn1 block" style="border: none;">
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

    <script>
	$("#file").on('change',function(){
		var fileName = $("#file").val().split("\\");
		$(".upload-name").val(fileName[fileName.length-1]);
	});
	
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
</section>
<!-- } 게시물 작성/수정 끝 -->