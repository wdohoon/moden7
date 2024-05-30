<?php
$sub_menu = "300200";
require_once './_common.php';

auth_check_menu($auth, $sub_menu, 'w');

check_demo();
check_admin_token();

$post_chk = isset($_POST['chk']) ? (array)$_POST['chk'] : array();
$post_group_id = isset($_POST['group_id']) ? (array)$_POST['group_id'] : array();
$act_button = isset($_POST['act_button']) ? $_POST['act_button'] : '';

if (count($post_chk) < 1) {
    alert($act_button . '할 게시판그룹을 1개 이상 선택해 주세요.');
}

for ($i = 0; $i < count($post_chk); $i++) {
    $k = (int) $post_chk[$i];
    $gr_id = preg_replace('/[^a-z0-9_]/i', '', $post_group_id[$k]);
    $gr_subject = isset($_POST['gr_subject'][$k]) ? strip_tags(clean_xss_tags($_POST['gr_subject'][$k])) : '';
    $gr_admin = isset($_POST['gr_admin'][$k]) ? clean_xss_tags($_POST['gr_admin'][$k], 1, 1) : '';
    $gr_device = isset($_POST['gr_device'][$k]) ? clean_xss_tags($_POST['gr_device'][$k], 1, 1) : 'both';
    $gr_use_access = isset($_POST['gr_use_access'][$k]) ? (int)$_POST['gr_use_access'][$k] : 0;
    $gr_order = isset($_POST['gr_order'][$k]) ? (int)$_POST['gr_order'][$k] : 0;

    if ($act_button == '선택수정') {
        $sql = "UPDATE {$g5['group_table']}
                SET gr_subject = '{$gr_subject}',
                    gr_admin = '{$gr_admin}',
                    gr_device = '{$gr_device}',
                    gr_use_access = '{$gr_use_access}',
                    gr_order = '{$gr_order}'
                WHERE gr_id = '{$gr_id}'";
        sql_query($sql);
        log_group_action('수정', $gr_id);
    } elseif ($act_button == '선택삭제') {
        sql_query("DELETE FROM {$g5['group_table']} WHERE gr_id = '{$gr_id}'");
        sql_query("DELETE FROM {$g5['group_member_table']} WHERE gr_id = '{$gr_id}'");
        log_group_action('삭제', $gr_id);
    }
}

function log_group_action($action, $group_id) {
    global $g5, $member;
    $sql = "INSERT INTO g5_login_history_save (
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
                '게시판그룹관리', 
                NOW(), 
                '{$action}', 
                '{$group_id}'
            )";
    sql_query($sql);
}


run_event('admin_boardgroup_list_update', $act_button, $post_chk, $post_group_id, $qstr);

goto_url('./boardgroup_list.php?' . $qstr);
