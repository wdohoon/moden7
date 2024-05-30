<?php
$sub_menu = '400800';
include_once('./_common.php');

check_demo();

auth_check_menu($auth, $sub_menu, 'd');

check_admin_token();

$count = (isset($_POST['chk']) && is_array($_POST['chk'])) ? count($_POST['chk']) : 0;
if (!$count)
    alert('선택삭제 하실 항목을 하나 이상 선택해 주세요.');

// 로그 저장 함수
function log_coupon_action($action, $cp_id) {
    global $g5, $member;
    $sql = "INSERT INTO g5_login_history_save
                (login_id, user_name, user_ip, accessed_page, history_datetime, action, target_id)
            VALUES
                ('{$member['mb_id']}', '{$member['mb_name']}', '{$_SERVER['REMOTE_ADDR']}', '쿠폰 삭제', NOW(), '$action', '$cp_id')";
    sql_query($sql);
}

for ($i = 0; $i < $count; $i++) {
    // 실제 번호를 넘김
    $k = isset($_POST['chk'][$i]) ? (int) $_POST['chk'][$i] : 0;
    $cp_id = isset($_POST['cp_id'][$k]) ? preg_replace('/[^a-z0-9_\-]/i', '', $_POST['cp_id'][$k]) : '';

    $sql = "DELETE FROM {$g5['g5_shop_coupon_table']} WHERE cp_id = '$cp_id'";
    sql_query($sql);

    // 로그 기록
    log_coupon_action('삭제', $cp_id);
}

goto_url('./couponlist.php?'.$qstr);
