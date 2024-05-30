<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<style type="text/css">
.dong_p {display:inline-block;}
.dong_select_wrap {display:inline-block;}
.dong_select {width:12%;min-width:115px;height:34px;background:#fff !important;margin-right:3px;}
.dong_input001 {width:25%;min-width:110px;}

/*추가*/
#container_title{font-size: 3.333em;margin: 0 auto 70px;color: #000;}
#bo_w{width:1200px;margin:160px auto}
.jtbl_frm01 td {display:flex;}

 @media (max-width: 1280px) {
#bo_w {
    width: 100%;
    padding: 0 4%;
    margin: 160px auto;
}
 }
@media (min-width: 1100px) {

 }

 @media (max-width: 1024px) {

 }

@media (max-width: 767px) {
.dong_select_wrap {display:block;margin-bottom:5px}
.dong_select {width:46%;margin-bottom:5px;min-width:auto;}
.dong_p {width:100%;line-height:34px;margin-bottom:5px}
.dong_p span {display:inline-block;width:25%;max-width:50px}
.dong_input001 {width:64%;min-width:110px;}
 }
 @media (max-width: 460px) {
.jtbl_frm01 th {width:95px}
.jtbl_frm01 td {padding:7px 5px}
 }
</style>
<script>

		function fwrite_submits(){
		//alert (document.fwrite.wr_1.value);
		location.href ="write.php?bo_table=<?=$bo_table?>&ddd="+document.fwrite.ca_name.value;
		//document.body.scrollTop = document.body.scrollHeight;
		}

</script>



<section id="bo_w">
   <h2 id="container_title">병원등록</h2>

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
	 <input type="hidden" name="wr_subject" value="매장명">
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
            <td><input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input email"  maxlength="100"></td>
        </tr>
        <?php } ?>

        <?php if ($is_homepage) { ?>
        <tr>
            <th scope="row"><label for="wr_homepage">홈페이지</label></th>
            <td><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input" ></td>
        </tr>
        <?php } ?>



        <?php if ($is_category) { ?>
        <tr>
            <th scope="row"><label for="ca_name">지역(검색)<strong class="sound_only"></strong></label></th>

            <td>

          <?

		  if($w=="u"){

		?>


		   <input type="text" class="frm_input store_sel03" name="ca_name" value="<?=$write['ca_name']?>" readonly="readonly" />

           <input type="text" class="frm_input store_sel03" name="wr_2" value="<?=$write['wr_2']?>" readonly="readonly" />



		<?
			  }else{

		  ?>
          <div class="dong_select_wrap">
			<select class="dong_select" style="" name="ca_name" id="ca_name" required class="required" onchange="fwrite_submits(this)">

	        <option value="">선택하세요</option>

			<?

			$sql_mo="SELECT DISTINCT  wr_1 FROM post_k order by wr_3 asc";


			  $result_mo = sql_query($sql_mo);

			  $total_record_mo=sql_num_rows($result_mo);


            for($i=0;$i<$total_record_mo;$i++){

				//mysql_data_seek($result_mo,$i);

				$row_mo=sql_fetch_array($result_mo);
			?>

            <option value="<?=$row_mo['wr_1']?>" <? if($row_mo['wr_1'] == $ddd) echo " selected "; ?>><?=$row_mo['wr_1']?></option>


			<?}?>




		</select>



			<select class="dong_select" style="" name="wr_2" id="wr_2" class="store_sel02">

	        <option value="">선택하세요</option>

			<?

			if($ddd){

			$sql_mo2="SELECT DISTINCT wr_2 FROM post_k where wr_1='$ddd'";
			$result_mo2 = sql_query($sql_mo2);

		  $total_record_mo2=sql_num_rows($result_mo2);


            for($i=0;$i<$total_record_mo2;$i++){


				$row_mo2=sql_fetch_array($result_mo2);

			?>

            <option value="<?=$row_mo2['wr_2']?>"><?=$row_mo2['wr_2']?></option>

			<?
				}
			}
			?>



		</select>
        </div>
        <?
			  }
		?>

		<span class="dong_p"><span>매장명 : </span><input style="" type="text" class="frm_input store_sel03 dong_input001" name="wr_3" value="<?=$write['wr_3']?>" />   </span>
            </td>
        </tr>
        <?php } ?>
        <tr>
        	<th>매장주소1</th>
            <td><input style="width:45%;min-width:180px;" type="text" class="frm_input store_sel03 frm_input" name="wr_9"  value="<?=$write['wr_9']?>"  />
           <p style="padding:5px;line-height:1.2em"> ex> 서울 강남구 테헤란로 26길 10</p></td>
        </tr>
		<tr>
        	<th>매장주소2</th>
            <td><input style="width:45%;min-width:180px;" type="text" class="frm_input store_sel03 frm_input" name="wr_10"  value="<?=$write['wr_10']?>"  />
           <p style="padding:5px;line-height:1.2em"> ex> 성보빌딩 지하 1층</p></td>
        </tr>
        <tr>
        	<th>위도</th>
            <td><input  style="width:25%;min-width:180px;" type="text" class="frm_input store_sel03" name="wr_7"  value="<?=$write['wr_7']?>"  /><div style="margin-top:10px;">
					<a href="http://lalo.esran.com/" target="_blank" style="color:green;">좌표 알려주는 홈페이지 클릭!</a>
				</div></td>
        </tr>
        <tr>
        	<th>경도</th>
            <td><input  style="width:25%;min-width:180px;" type="text" class="frm_input store_sel03" name="wr_8"  value="<?=$write['wr_8']?>"  /></td>
        </tr>



	  <tr>
        <th>영업시간</th>
        <td><input  style="width:100%;min-width:180px;" type="text" class="frm_input store_sel03" name="wr_4"  value="<?=$write['wr_4']?>"  />
        </tr>
            <tr>
    <tr>
			<th>전화번호</th>
			<td><input  style="width:25%;min-width:180px;" type="text" class="frm_input store_sel03" name="wr_5"  value="<?=$write['wr_5']?>"  />
		</tr>
<style type="text/css">
#wr_content {width:99% !important;}
</style>
      <tr>
            <th scope="row"><label for="wr_content">내용<strong class="sound_only">필수</strong></label></th>
            <td class="wr_content">

                <?php if($write_min || $write_max) { ?>
                최소/최대 글자 수 사용 시
                <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                <?php } ?>
                <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                <?php if($write_min || $write_max) { ?>
                최소/최대 글자 수 사용 시
                <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                <?php } ?>
            </td>
        </tr>

        <?php //for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
     <!--    <tr>
            <th scope="row"><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></th>
            <td><input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input" ></td>
        </tr> -->
        <?php //} ?>

        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <tr>
            <th scope="row">파일 #<?php echo $i+1 ?></th>
            <td>
                <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" >
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