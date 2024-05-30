<?php include_once ("./_common.php");
include_once ("./w_common.php");

$g5['title'] = "워드프레스 변환 프로그램";

include_once (G5_PATH.'/head.sub.php');


$file = $_FILES['file'];

if($file['size'] == 0) die("파일이 업로드 되지 않았습니다.");

if(!preg_match("/\.xml$/i", $file['name'])) die("xml 파일이 아닙니다. ($file[name])");


if(isset($file) && ($file['error'] == UPLOAD_ERR_OK)) {


				//$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
				$uploadfile = $uploaddir.basename($file['tmp_name']);


				if(move_uploaded_file($file['tmp_name'], $uploadfile)) {
								echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
				} else {
								print "파일 업로드 공격의 가능성이 있습니다!\n";
				}


}


 ?>

<style type="text/css">
<!--
.id_alert{background: #FF0000 top right no-repeat !important;color:white}
-->
</style>
<form method='post' onsubmit='return form_submit(this);' enctype="multipart/form-data">
    <input type="hidden" name="uploadfile" value="<?= $uploadfile ?>" />

<table>
    <caption>게시판그룹 생성</caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>
    <tr>
        <th scope="row"><label for="gr_id">그룹 ID<strong class="sound_only"> 필수</strong></label></th>
        <td><input type="text" name="gr_id" value="wordpress" id="gr_id" required="" class="required alnum_ frm_input" maxlength="10" style="cursor: auto;">
            영문자, 숫자, _ 만 가능 (공백없이)        </td>
    </tr>
    <tr>
        <th scope="row"><label for="gr_subject">그룹 제목<strong class="sound_only"> 필수</strong></label></th>
        <td>
            <input type="text" name="gr_subject"  value="워드프레스 이전 그룹" id="gr_subject" required="" class="required frm_input" size="80">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="gr_device">접속기기</label></th>
        <td>
            <span class="frm_info">PC 와 모바일 사용을 구분합니다.</span>
            <select id="gr_device" name="gr_device">
                <option value="both" selected="">PC와 모바일에서 모두 사용</option>
                <option value="pc">PC 전용</option>
                <option value="mobile">모바일 전용</option>
            </select>
        </td>
    </tr>

        </tbody>
    </table>

<hr />
<br /><br /><br />


<table>
    <caption>게시판 생성</caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>
<? foreach($xml->channel->children() as $child) {
				if($child->wp__category_nicename) {


								word_write('<tr><th scope="row">게시판 ID </th><td>');

								//'영문자, 숫자, _ 만 가능 (공백없이 20자 이내)
								if(!preg_match("/^([A-Za-z0-9_]{1,20})$/", $child->wp__category_nicename)) {
												word_write('<input type="text" name="bo_table_arr[]" value="'.$child->wp__category_nicename.
																'" size=100 class="id_alert"  /> 사용할 수없는 값입니다. 바꿔주세요.', 1);
								} else {
												word_write('<input type="text" name="bo_table_arr[]" value="'.$child->wp__category_nicename.'" size=100 /> ', 1);
								}
								word_write('<input type="hidden" name="bo_table_arr_ori[]" value="'.$child->wp__category_nicename.'" size=100 /> ', 1);
								word_write('</td></tr>');


								word_write('<tr><th scope="row">게시판 제목 </th><td>');
								word_write('<input type="text" name="bo_subject_arr[]" value="'.$child->wp__cat_name.'" /> ');
								word_write('</td></tr>');
								word_write('<th colspan="2" style="border-bottom: solid;"></th>');


				}

} ?>

        </tbody>
    </table>






    <!-- 게시판 설정 항목 (기본값) -->
    <input type="hidden" name="bo_device" value="both" />
    <input type="hidden" name="bo_mobile_skin" value="basic" />
    <input type="hidden" name="bo_skin" value="basic" />
    <input type="hidden" name="bo_upload_size" value="1048576" />
    <input type="hidden" name="bo_image_width" value="600" />
    <input type="hidden" name="bo_gallery_width" value="174" />
    <input type="hidden" name="bo_mobile_gallery_width" value="125" />
    <input type="hidden" name="bo_gallery_height" value="124" />
    <input type="hidden" name="bo_hot" value="100" />
    <input type="hidden" name="bo_mobile_gallery_height" value="100" />
    <input type="hidden" name="bo_table_width" value="100" />
    <input type="hidden" name="bo_subject_len" value="60" />
    <input type="hidden" name="bo_mobile_subject_len" value="30" />
    <input type="hidden" name="bo_new" value="24" />
    <input type="hidden" name="bo_mobile_page_rows" value="15" />
    <input type="hidden" name="bo_page_rows" value="15" />
    <input type="hidden" name="bo_gallery_cols" value="4" />
    <input type="hidden" name="bo_upload_count" value="2" />
    <input type="hidden" name="bo_comment_level" value="1" />
    <input type="hidden" name="bo_count_delete" value="1" />
    <input type="hidden" name="bo_count_modify" value="1" />
    <input type="hidden" name="bo_download_level" value="1" />
    <input type="hidden" name="bo_html_level" value="1" />
    <input type="hidden" name="bo_link_level" value="1" />
    <input type="hidden" name="bo_list_level" value="1" />
    <input type="hidden" name="bo_read_level" value="1" />
    <input type="hidden" name="bo_reply_level" value="1" />
    <input type="hidden" name="bo_reply_order" value="1" />
    <input type="hidden" name="bo_upload_level" value="1" />
    <input type="hidden" name="bo_use_search" value="1" />
    <input type="hidden" name="bo_write_level" value="1" />
    <input type="hidden" name="bo_comment_point" value="0" />
    <input type="hidden" name="bo_download_point" value="0" />
    <input type="hidden" name="bo_read_point" value="0" />
    <input type="hidden" name="bo_use_secret" value="0" />
    <input type="hidden" name="bo_write_point" value="0" />
    <input type="hidden" name="bo_include_tail" value="_tail.php" />
    <input type="hidden" name="bo_include_head" value="_head.php" />


    <p><input type=submit value='다 음'></p>
</form>


<script>
function form_submit(f)
{
    alert('조금 오래 걸립니다. 브라우져 닫지 마세요');
    f.action = 'wordpress_step2.php';
    return true;
}
</script>