<?php
require_once './_common.php';

$bo_table = $_POST['bo_table'];
$updated_fields = [];

// 기존 데이터를 불러옴
$sql = "SELECT * FROM g5_board WHERE bo_table = '".sql_real_escape_string($bo_table)."'";
$prev_row = sql_fetch($sql);

$fields_to_check = [
    'day1' => 'bo_1_subj', 'name1' => 'bo_1', 'name1_2' => 'bo_1_2', 'name1_3' => 'bo_1_3',
    'day2' => 'bo_2_subj', 'name2' => 'bo_2', 'name2_2' => 'bo_2_2', 'name2_3' => 'bo_2_3',
    'day3' => 'bo_3_subj', 'name3' => 'bo_3', 'name3_2' => 'bo_3_2', 'name3_3' => 'bo_3_3',
    'day4' => 'bo_4_subj', 'name4' => 'bo_4', 'name4_2' => 'bo_4_2', 'name4_3' => 'bo_4_3',
    'day5' => 'bo_5_subj', 'name5' => 'bo_5', 'name5_2' => 'bo_5_2', 'name5_3' => 'bo_5_3',
    'tel' => 'bo_6'
];

// 각 필드를 체크하고 변화가 있으면 업데이트
foreach ($fields_to_check as $post_key => $db_field) {
    $current_value = $_POST[$post_key];
    if ($prev_row[$db_field] != $current_value) {
        $updated_fields[] = $db_field;
        $sql = "UPDATE g5_board SET $db_field = '".sql_real_escape_string($current_value)."' WHERE bo_table = '".sql_real_escape_string($bo_table)."'";
        sql_query($sql);
    }
}

if (count($updated_fields) > 0) {
    // 업데이트된 필드가 있으면 로그 기록
    $action = "업데이트";
    $target_id = implode(', ', $updated_fields); // 업데이트된 필드들을 쉼표로 구분하여 저장
    $sql_log = "INSERT INTO g5_login_history_save (
                    login_id, user_name, user_ip, accessed_page, history_datetime, action, target_id
                ) VALUES (
                    '{$member['mb_id']}', '{$member['mb_name']}', '{$_SERVER['REMOTE_ADDR']}', '가디언즈 강연 목록', NOW(), '{$action}', '{$target_id}'
                )";
    sql_query($sql_log);
}

$redirect_url = G5_ADMIN_URL.'/guardians_form.php';
goto_url($redirect_url);
?>
