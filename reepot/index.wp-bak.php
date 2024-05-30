<?
include_once ("./_common.php");
include_once ("./w_common.php");

$g5['title'] = "워드프레스 변환 프로그램";

include_once(G5_PATH.'/head.sub.php');


?>

<div style='margin:10px; padding:10px; border:5px solid #ff6600;'>
    <h1><?=$g5['title']?></h1>

    <form method='post' onsubmit='return form_submit(this);' enctype="multipart/form-data">
    <!--게시판 그룹 설정 항목
    <input type="hidden" name="gr_subject" value="워드프레스 이전 그룹" />
    <input type="hidden" name="gr_id" value="wordpress" />
    <input type="hidden" name="gr_device" value="both" />
    -->



    <!-- 게시판 설정 항목 (기본값) -->
<!--
    <input type="hidden" name="bo_subject" value="" />
    <input type="hidden" name="bo_table" value="" />
    <input type="hidden" name="gr_id" value="wordpress" />
-->
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



    <p>
        워드프레스 내보내기 기능으로(모든 컨텐츠) 다운받은 xml 파일을 업로드 하세요.<br/>

        주의) 이미 등록한 경우 다시 업로드 하시면 기존에 등록된 메이크샵 자료는 모두 삭제하고 다시 등록됩니다.<br/>
        주의) 이 프로그램으로 변환을 마친 경우 해당 프로그램은 반드시 삭제해 주시기 바랍니다.<br/>
        주의) 적립금은 적립되지 않으므로 수동 적립해 주시기 바랍니다.
    </p>
    <p><input type=file name=file size=80></p>
    <p><input type=submit value='xml 파일 업로드'></p>
    </form>


</div>

<script>
function form_submit(f)
{
    if (!/\.xml/i.test(f.file.value)) {
        alert('워드프레스 xml 파일을 업로드 하시기 바랍니다.');
        return false;
    }

    //f.action = 'wordpress_update.php';
    //f.action = 'test.php';
    f.action = 'wordpress_step1.php';
    return true;
}
</script>

<?
include_once(G5_PATH.'/tail.sub.php');
?>