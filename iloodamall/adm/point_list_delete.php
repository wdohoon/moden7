<?php
$sub_menu = '200200';
require_once './_common.php';

check_demo();

auth_check_menu($auth, $sub_menu, 'd');

check_admin_token();

$count = (isset($_POST['chk']) && is_array($_POST['chk'])) ? count($_POST['chk']) : 0;
if (!$count) {
    alert($_POST['act_button'] . ' 하실 항목을 하나 이상 체크하세요.');
}

for ($i = 0; $i < $count; $i++) {
    $k = $_POST['chk'][$i];
    $po_id = (int) $_POST['po_id'][$k];

    // 포인트 내역정보 조회
    $sql = "SELECT * FROM {$g5['point_table']} WHERE po_id = '{$po_id}'";
    $row = sql_fetch($sql);

    if (!$row['po_id']) {
        continue;
    }

    // 포인트 내역 삭제
    $sql = "DELETE FROM {$g5['point_table']} WHERE po_id = '{$po_id}'";
    sql_query($sql);

    // 로그 기록
    $sql_log = "INSERT INTO g5_login_history_save (
                    login_id, 
                    user_name, 
                    user_ip, 
                    accessed_page, 
                    history_datetime, 
                    action, 
                    target_id
                ) VALUES (
                    '{$member['mb_id']}', 
                    '{$member['mb_name']}', 
                    '{$_SERVER['REMOTE_ADDR']}', 
                    'PP관리', 
                    NOW(), 
                    '삭제', 
                    '{$row['mb_id']}'
                )";
    sql_query($sql_log);

    // po_mb_point에 반영
    $sql = "UPDATE {$g5['point_table']}
                SET po_mb_point = po_mb_point - '{$row['po_point']}'
                WHERE mb_id = '{$row['mb_id']}'
                  AND po_id > '{$po_id}'";
    sql_query($sql);

    // 포인트 UPDATE
    $sum_point = get_point_sum($row['mb_id']);
    $sql = "UPDATE {$g5['member_table']} SET mb_point = '$sum_point' WHERE mb_id = '{$row['mb_id']}'";
    sql_query($sql);
}

goto_url('./point_list.php?' . $qstr);


