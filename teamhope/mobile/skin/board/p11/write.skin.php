<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<style>
	#bo_w{
		width: 1280px;
		padding:200px 0 200px 0;
		margin: 0 auto;
	}
	.sound_only{color:red;}
	.auto_wrap{display: flex;}
</style>

<section id="bo_w">
    <h2 id="container_title"><?php //echo $g5['title'] ?></h2>

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
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>

    <div class="jtbl_frm01 tbl_wrap">
        <table>
        <tbody>
        <?php if ($is_name) { ?>
        <tr>
            <th scope="row"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input" size="10" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_password) { ?>
        <tr>
            <th scope="row"><label for="wr_password">비밀번호<strong class="sound_only">필수</strong></label></th>
            <td><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_email) { ?>
        <tr>
            <th scope="row"><label for="wr_email">이메일</label></th>
            <td><input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input email" size="50" maxlength="100"></td>
        </tr>
        <?php } ?>

        <?php if ($is_homepage) { ?>
        <tr>
            <th scope="row"><label for="wr_homepage">홈페이지</label></th>
            <td><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input" size="50"></td>
        </tr>
        <?php } ?>

        <!-- <?php if ($option) { ?>
        <tr>
            <th scope="row">옵션</th>
            <td><?php echo $option ?></td>
        </tr>
        <?php } ?> -->

        <?php if ($is_category) { ?>
        <tr>
            <th scope="row"><label for="ca_name">분류<strong class="sound_only">필수</strong></label></th>
            <td>
                <select name="ca_name" id="ca_name" required class="required" >
                    <option value="">선택하세요</option>
                    <?php echo $category_option ?>
                </select>
            </td>
        </tr>
        <?php } ?>

        <tr>
            <th scope="row"><label for="wr_subject">국문 이름<strong class="sound_only">*</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input" size="50" maxlength="255">
                </div>
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="wr_content">영문 이름<strong class="sound_only">*</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <input type="text" name="wr_content" value="" id="wr_content" required class="frm_input" size="50" maxlength="255">
                </div>
            </td>
        </tr>
		
		<tr>
            <th scope="row"><label for="wr_1">생년월일<strong class="sound_only">*</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <input type="text" name="wr_1" value="" id="wr_1" required class="frm_input" size="50" maxlength="255">
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="wr_2">키<strong class="sound_only">*</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <input type="text" name="wr_2" value="" id="wr_2" required class="frm_input" size="50" maxlength="255">
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="wr_3">MOVIE</label></th>
            <td>
                <div id="autosave_wrapper">
					<div class="auto_wrap">
						<p>연도</p><input type="text" name="wr_3" value="" id="wr_3"  class="frm_input" size="50" maxlength="255">
						<p>제목</p><input type="text" name="wr_4" value="" id="wr_4"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						<p>연도</p><input type="text" name="wr_5" value="" id="wr_5"  class="frm_input" size="50" maxlength="255">
						<p>제목</p><input type="text" name="wr_6" value="" id="wr_6"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						<p>연도</p><input type="text" name="wr_7" value="" id="wr_7"  class="frm_input" size="50" maxlength="255">
						<p>제목</p><input type="text" name="wr_8" value="" id="wr_8"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						<p>연도</p><input type="text" name="wr_9" value="" id="wr_9"  class="frm_input" size="50" maxlength="255">
						<p>제목</p><input type="text" name="wr_10" value="" id="wr_10"  class="frm_input" size="50" maxlength="255">
					</div>
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="wr_11">TV SERIES</label></th>
            <td>
                <div id="autosave_wrapper">
				<div class="auto_wrap">
						연도<input type="text" name="wr_11" value="" id="wr_11"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_12" value="" id="wr_12"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_13" value="" id="wr_13"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_14" value="" id="wr_14"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_15" value="" id="wr_15"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_16" value="" id="wr_16"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_17" value="" id="wr_17"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_18" value="" id="wr_18"  class="frm_input" size="50" maxlength="255">
					</div>
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="wr_19">AWARDS</label></th>
            <td>
                <div id="autosave_wrapper">
					<div class="auto_wrap">
						연도<input type="text" name="wr_19" value="" id="wr_19"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_20" value="" id="wr_20"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_21" value="" id="wr_21"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_22" value="" id="wr_22"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_23" value="" id="wr_23"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_24" value="" id="wr_24"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_25" value="" id="wr_25"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_26" value="" id="wr_26"  class="frm_input" size="50" maxlength="255">
					</div>
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="wr_27">ADVERTISEMENT & AMBASSADOR</label></th>
            <td>
                <div id="autosave_wrapper">
					<div class="auto_wrap">
						연도<input type="text" name="wr_27" value="" id="wr_27"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_28" value="" id="wr_28"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_29" value="" id="wr_29"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_30" value="" id="wr_30"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_31" value="" id="wr_31"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_32" value="" id="wr_32"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_33" value="" id="wr_33"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_34" value="" id="wr_34"  class="frm_input" size="50" maxlength="255">
					</div>
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="wr_35">MAGAZINE</label></th>
            <td>
                <div id="autosave_wrapper">
					<div class="auto_wrap">
						연도<input type="text" name="wr_35" value="" id="wr_35"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_36" value="" id="wr_36"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_37" value="" id="wr_37"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_38" value="" id="wr_38"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_39" value="" id="wr_39"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_40" value="" id="wr_40"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_41" value="" id="wr_41"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_42" value="" id="wr_42"  class="frm_input" size="50" maxlength="255">
					</div>
                </div>
            </td>
        </tr>

		<tr>
            <th scope="row"><label for="wr_43">ETC</label></th>
            <td>
                <div id="autosave_wrapper">
					<div class="auto_wrap">
						연도<input type="text" name="wr_43" value="" id="wr_43"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_44" value="" id="wr_44"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_45" value="" id="wr_45"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_46" value="" id="wr_46"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_47" value="" id="wr_47"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_48" value="" id="wr_48"  class="frm_input" size="50" maxlength="255">
					</div>
					<div class="auto_wrap">
						연도<input type="text" name="wr_49" value="" id="wr_49"  class="frm_input" size="50" maxlength="255">
						제목<input type="text" name="wr_50" value="" id="wr_50"  class="frm_input" size="50" maxlength="255">
					</div>
                </div>
            </td>
        </tr>

        <!-- <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
        <tr>
            <th scope="row"><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></th>
            <td><input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input" size="50"></td>
        </tr>
        <?php } ?> -->

        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <tr>
            <th scope="row">이미지 #<?php echo $i+1 ?></th>
            <td>
                <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" size="50">
                <?php } ?>
                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>

        <?php if ($is_guest) { //자동등록방지  ?>
        <tr>
            <th scope="row">자동등록방지</th>
            <td>
                <?php echo $captcha_html ?>
            </td>
        </tr>
        <?php } ?>

        </tbody>
        </table>
    </div>

    <div class="btn_confirm">
      <span class="jbutton large black"><input type="submit" value="작성완료" id="btn_submit" accesskey="s" /></span>
      <span class="jbutton large black"><a href="./board.php?bo_table=<?php echo $bo_table ?>">취소</a></span>    </div>
  </form>

    <script>
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
</section>
<!-- } 게시물 작성/수정 끝 -->