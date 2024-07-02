<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<style>
.header-fixed{display: ;}
.tabs2{display: none;}
.navgation{display: none;}
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

#smart_editor2{width:500px !important}
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

	<div class="write-wrap">
			<!-- <div class="tit">성명</div>
			<div class="mb10">
				<input type="text" class="inp1 block" name="wr_name" value="<?php echo $member['mb_name'] ? $member['mb_name'] : '';?>">
			</div> -->
			<!-- <div class="tit">번호</div>
			<div class="inp-box mb10">
				<button class="lang"><img src="/img/common/ico_kr.png"> <span>+82</span></button>
				<input type="tel" class="inp1 block" name="wr_1" value="<?php echo $member['mb_id'] ? $member['mb_id'] : '';?>">
			</div> -->
			
			<!-- <div class="tit">이메일주소</div>
			<div class="mb10">
				<input type="text" class="inp1 block" name="wr_email" value="<?php echo $member['mb_email'] ? $member['mb_email'] : '';?>">
			</div> -->
						
			<!-- div class="tit">제목 (Subject)</div>
			<div class="mb10">
				<input type="text" class="inp1 block" name="wr_subject" value="">
			</div> -->

			<div class="box">
				<div class="tit">제목</div>
				<div class="subj"><input type="text" class="inp-write" name="wr_subject" value="<?php echo $write['wr_subject'];?>"></div>
			</div>

			<!-- <div class="box" id="sticker">
				<div class="tit">편집</div>
				<div class="subj">
					<a href="#">사진첨부</a>
					<a href="#">글편집</a>
					<a href="#">동영상링크첨부</a>
					<a href="#">이모티콘</a>
				</div>
			</div> -->
			
			<!-- <div class="tit">내용 (Content)</div>
			<div class="mb10">
				<textarea class="textarea" name="wr_content"></textarea>
			</div> -->

			<!-- <div class="text">
				<textarea class="textarea" name="wr_content"><?php echo $write['wr_content'];?></textarea>
			</div> -->

			 <div class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
				<?php if($write_min || $write_max) { ?>
				<!-- 최소/최대 글자 수 사용 시 -->
				<p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
				<?php } ?>
				<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
				<?php if($write_min || $write_max) { ?>
				<!-- 최소/최대 글자 수 사용 시 -->
				<div id="char_count_wrap"><span id="char_count"></span>글자</div>
				<?php } ?>
			</div>
			
			<!-- <div class="files filebox">
				<input class="upload-name" value="첨부파일" placeholder="첨부파일">
				<label for="file" class="btn1">파일첨부</label> 
				<input type="file" id="file" name="bf_file[]" id="bf_file_1" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능">
			</div> -->
			
			<!-- <input type="submit" value="문의하기" id="btn_submit" accesskey="s" class="btn1 block" style="border: none;"> -->
			<div class="fixed-btn type2">
				<div class="in">
					<button type="button" class="bg-gray">미리보기</button>
					<button class="okay" type="button">글 등록</button>
				</div>
			</div>
	</div>
	
	<div class="modal" id="modalAlert">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>알림</h5>
					<button class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="modal-logout">
						<strong>등록 하시겠습니까?</strong>
						<div class="text-left">
							<p class="txt2 mb5">-심사를 통해 미션펀딩 홈화면에 자동으로 게시됩니다.</p>
							<p class="txt2 mb5">-심사승인까지 최대 2~3일까지 소요될 수 있습니다.</p>
							<p class="txt2 ">-심사과정은 회원가입시 입력하신 회원님의 이메일주소로 발송됩니다.</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn1 block btn-s" type="submit" value="글 등록" accesskey="s">예</button>
					<button class="btn2 block btn-s" data-dismiss="modal">취소</button>
				</div>
			</div>
		</div>
	</div>



	<script>
	$('.okay').click(function(){
		$('#modalAlert').modal();
		$("#sticker").sticky({topSpacing:0});
	});
	</script>

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