<?php
include_once('./_common.php');

$count = (isset($_POST['chk_wr_id']) && is_array($_POST['chk_wr_id'])) ? count($_POST['chk_wr_id']) : 0;
$post_btn_submit = isset($_POST['btn_submit']) ? clean_xss_tags($_POST['btn_submit'], 1, 1) : '';

if (!$count) {
    alert(addcslashes($post_btn_submit, '"\\/').' 하실 항목을 하나 이상 선택하세요.');
}

for ($i = 0; $i < $count; $i++) {
    $wr_id = clean_xss_tags($_POST['chk_wr_id'][$i], 1, 1);

    // 해당 wr_id에 대한 mb_id 가져오기
    $sql = "SELECT mb_id FROM {$g5['write_genuine_table']} WHERE wr_id = '{$wr_id}'";
    $result = sql_query($sql);
    if ($result) {
        $row = sql_fetch_assoc($result);
        $mb_id = $row['mb_id'];
    } 

    switch ($post_btn_submit) {
        case '선택삭제':
            $sql2 = "DELETE FROM {$g5['write_table']} WHERE wr_id = '{$wr_id}'";
            sql_query($sql2);
            log_action($member['mb_id'], $member['mb_name'], '삭제', $wr_id);
            include './delete_all.php';
            break;
        case '선택복사':
            log_action($member['mb_id'], $member['mb_name'], '복사', $wr_id);
            include './move.php';
            break;
        case '선택이동':
            log_action($member['mb_id'], $member['mb_name'], '이동', $wr_id);
            include './move.php';
            break;
        case '선택저장':
            log_action($member['mb_id'], $member['mb_name'], '수정', $wr_id);
            include './save.php';
            break;
        default:
            alert('올바른 방법으로 이용해 주세요.');
            break;
    }
}

function log_action($login_id, $user_name, $action, $target_id) {
    global $g5;

    $sql = "INSERT INTO g5_login_history_save (
                login_id, 
                user_name, 
                user_ip, 
                accessed_page, 
                history_datetime, 
                action, 
                target_id
            ) VALUES (
                '{$login_id}', 
                '{$user_name}', 
                '{$_SERVER['REMOTE_ADDR']}', 
                '데모신청 목록', 
                NOW(), 
                '{$action}', 
                '{$target_id}'
            )";
    sql_query($sql);
}
