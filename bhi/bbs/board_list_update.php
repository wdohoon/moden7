<?php
include_once('./_common.php');

$count = (isset($_POST['chk_wr_id']) && is_array($_POST['chk_wr_id'])) ? count($_POST['chk_wr_id']) : 0;
$post_btn_submit = isset($_POST['btn_submit']) ? clean_xss_tags($_POST['btn_submit'], 1, 1) : '';

if(!$count && $post_btn_submit !== '선택저장') {
    alert(addcslashes($post_btn_submit, '"\\/').' 하실 항목을 하나 이상 선택하세요.');
}

if($post_btn_submit === '선택삭제') {
    include './delete_all.php';
} else if($post_btn_submit === '선택복사') {
    $sw = 'copy';
    include './move.php';
} else if($post_btn_submit === '선택이동') {
    $sw = 'move';
    include './move.php';
} else if($post_btn_submit === '선택저장') {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'wr_') === 0) {
            $wr_id = str_replace('wr_', '', $key);
            $wr_status = trim($value);

            // 데이터베이스에 저장
            $sql = "UPDATE {$write_table} SET wr_6 = '".sql_real_escape_string($wr_status)."' WHERE wr_id = '".sql_real_escape_string($wr_id)."'";
            sql_query($sql);
        }
    }
    alert('상태가 저장되었습니다.', G5_BBS_URL.'/board.php?bo_table='.$bo_table);
} else {
    alert('올바른 방법으로 이용해 주세요.');
}
