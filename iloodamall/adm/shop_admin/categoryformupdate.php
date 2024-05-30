<?php
$sub_menu = '400200';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "w");

$ca_include_head = isset($_POST['ca_include_head']) ? trim($_POST['ca_include_head']) : '';
$ca_include_tail = isset($_POST['ca_include_tail']) ? trim($_POST['ca_include_tail']) : '';
$ca_id = isset($_REQUEST['ca_id']) ? preg_replace('/[^0-9a-z]/i', '', $_REQUEST['ca_id']) : '';

if(!$ca_id){
    alert('분류 ID가 지정되지 않았습니다.', G5_SHOP_URL);
}

// 파일 유효성 검사
$include_files = ['ca_include_head' => $ca_include_head, 'ca_include_tail' => $ca_include_tail];
foreach ($include_files as $key => $file) {
    if ($file) {
        $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (!in_array($file_ext, ['php', 'htm', 'html'])) {
            alert("파일 {$key}은(는) php, htm, html 확장자만 가능합니다.");
        }
    }
}

// 로그 함수
function log_history($action, $ca_id) {
    global $g5, $member;
    $sql = "INSERT INTO g5_login_history_save
            (login_id, user_name, user_ip, accessed_page, history_datetime, action, target_id) 
            VALUES 
            ('{$member['mb_id']}', '{$member['mb_name']}', '{$_SERVER['REMOTE_ADDR']}', '분류 관리', NOW(), '{$action}', '{$ca_id}')";
    sql_query($sql);
}

// 폼 값 검증 및 할당
$check_str_keys = [
    'ca_order' => 'int', 'ca_img_width' => 'int', 'ca_img_height' => 'int', 'ca_name' => 'str', 
    'ca_mb_id' => 'str', 'ca_nocoupon' => 'str', 'ca_mobile_skin_dir' => 'str', 'ca_skin' => 'str', 
    'ca_mobile_skin' => 'str', 'ca_list_mod' => 'int', 'ca_list_row' => 'int', 'ca_mobile_img_width' => 'int', 
    'ca_mobile_img_height' => 'int', 'ca_mobile_list_mod' => 'int', 'ca_mobile_list_row' => 'int', 
    'ca_sell_email' => 'str', 'ca_use' => 'int', 'ca_stock_qty' => 'int', 'ca_explan_html' => 'int', 
    'ca_cert_use' => 'int', 'ca_adult_use' => 'int', 'ca_skin_dir' => 'str'
];

foreach($check_str_keys as $key => $type){
    $$key = $type === 'int' ? (int) ($_POST[$key] ?? 0) : clean_xss_tags($_POST[$key] ?? '', 1);
}

$ca_head_html = $_POST['ca_head_html'] ?? '';
$ca_tail_html = $_POST['ca_tail_html'] ?? '';
$ca_mobile_head_html = $_POST['ca_mobile_head_html'] ?? '';
$ca_mobile_tail_html = $_POST['ca_mobile_tail_html'] ?? '';

// 처리
if ($w == 'd') {
    if ($is_admin != 'super') {
        alert("최고관리자만 분류를 삭제할 수 있습니다.");
    }

    // 분류 삭제
    $sql = "DELETE FROM {$g5['g5_shop_category_table']} WHERE ca_id = '$ca_id'";
    sql_query($sql);
    log_history('삭제', $ca_id);
    goto_url("./categorylist.php?$qstr");
}

$sql_common = "SET ca_order = '$ca_order', ca_skin_dir = '$ca_skin_dir', ... ";

if ($w == '') {
    $sql = "INSERT INTO {$g5['g5_shop_category_table']} SET ca_id = '$ca_id', ca_name = '$ca_name', $sql_common";
    sql_query($sql);
    log_history('추가', $ca_name);
} else if ($w == 'u') {
    $sql = "UPDATE {$g5['g5_shop_category_table']} SET ca_name = '$ca_name', $sql_common WHERE ca_id = '$ca_id'";
    sql_query($sql);
    log_history('수정', $ca_name);
}

goto_url("./categoryform.php?w=u&ca_id=$ca_id&$qstr");