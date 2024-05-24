<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/naver_syndi.lib.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

// 빠른 문의 데이터를 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wr_subject'], $_POST['wr_name'], $_POST['wr_1'], $_POST['wr_content'])) {
    $wr_subject = trim($_POST['wr_subject']);
    $wr_name = trim($_POST['wr_name']);
    $wr_1 = trim($_POST['wr_1']);
    $wr_content = trim($_POST['wr_content']);

    if (!empty($wr_subject) && !empty($wr_name) && !empty($wr_1) && !empty($wr_content)) {
        // 데이터를 데이터베이스에 삽입
        $sql = "INSERT INTO g5_write_inquiry (wr_subject, wr_name, wr_1, wr_content, wr_datetime) VALUES ('$wr_subject', '$wr_name', '$wr_1', '$wr_content', '".G5_TIME_YMDHIS."')";
        sql_query($sql);

        // 성공 메시지와 함께 리디렉션
        alert('문의가 정상적으로 접수되었습니다.', G5_HTTP_BBS_URL . '/board.php?bo_table=inquiry');
        exit;
    } else {
        alert('모든 필드를 입력해 주세요.');
    }
} else {
    alert('올바른 방법으로 이용해 주세요.', G5_HTTP_BBS_URL . '/');
}

// 보안 토큰 검사
if (!isset($_POST['bo_table']) || !isset($_POST['wr_id'])) {
    alert('올바른 방법으로 이용해 주세요.', G5_HTTP_BBS_URL . '/');
}

check_write_token($_POST['bo_table']);

$g5['title'] = '게시글 저장';

$bo_table = $_POST['bo_table'];
$wr_id = $_POST['wr_id'];
$w = $_POST['w'];
$board = get_board_db($bo_table);
$write_table = $g5['write_prefix'] . $bo_table;

$wr = array();
if ($w == 'u' || $w == 'r') {
    $wr = get_write($write_table, $wr_id);
    if (!$wr['wr_id']) {
        alert("글이 존재하지 않습니다.\\n글이 삭제되었거나 이동하였을 수 있습니다.");
    }
}

if ($w == 'u') {
    if (get_session('ss_bo_table') != $bo_table || get_session('ss_wr_id') != $wr_id) {
        alert('올바른 방법으로 수정해 주세요.', G5_HTTP_BBS_URL . '/board.php?bo_table=' . $bo_table);
    }
}

$is_use_captcha = ((($board['bo_use_captcha'] && $w !== 'u') || $is_guest) && !$is_admin) ? 1 : 0;

if ($is_use_captcha && !chk_captcha()) {
    alert('자동등록방지 숫자가 틀렸습니다.');
}

$wr_name = '';
$wr_email = '';
$wr_homepage = '';
$mb_id = '';

if ($member['mb_id']) {
    $mb_id = $member['mb_id'];
    $wr_name = addslashes(clean_xss_tags($board['bo_use_name'] ? $member['mb_name'] : $member['mb_nick']));
    $wr_email = addslashes($member['mb_email']);
    $wr_homepage = addslashes(clean_xss_tags($member['mb_homepage']));
} else {
    $wr_name = clean_xss_tags(trim($_POST['wr_name']));
    $wr_email = get_email_address(trim($_POST['wr_email']));
}

$wr_subject = isset($_POST['wr_subject']) ? substr(trim($_POST['wr_subject']), 0, 255) : '';
$wr_subject = preg_replace("#[\\\]+$#", "", $wr_subject);

if ($wr_subject == '') {
    alert('제목을 입력하세요.');
}

$wr_content = isset($_POST['wr_content']) ? substr(trim($_POST['wr_content']), 0, 65536) : '';
$wr_content = preg_replace("#[\\\]+$#", "", $wr_content);

if ($wr_content == '') {
    alert('내용을 입력하세요.');
}

$wr_option = '';
$options = array();
if (isset($_POST['html'])) {
    $options[] = clean_xss_tags($_POST['html'], 1, 1);
}
if (isset($_POST['secret'])) {
    $options[] = clean_xss_tags($_POST['secret'], 1, 1);
}
if (isset($_POST['mail'])) {
    $options[] = clean_xss_tags($_POST['mail'], 1, 1);
}
$wr_option = implode(',', array_filter(array_map('trim', $options)));

@include_once($board_skin_path.'/write_update.head.skin.php');

run_event('write_update_before', $board, $wr_id, $w, $qstr);

if ($w == '' || $w == 'r') {
    if (isset($_SESSION['ss_datetime'])) {
        if ($_SESSION['ss_datetime'] >= (G5_SERVER_TIME - $config['cf_delay_sec']) && !$is_admin) {
            alert('너무 빠른 시간내에 게시물을 연속해서 올릴 수 없습니다.');
        }
    }
    set_session("ss_datetime", G5_SERVER_TIME);
}

if (!isset($_POST['wr_subject']) || !trim($_POST['wr_subject'])) {
    alert('제목을 입력해 주세요.');
}

$wr_seo_title = exist_seo_title_recursive('bbs', generate_seo_title($wr_subject), $write_table, $wr_id);

if ($w == '' || $w == 'r') {
    $sql = "INSERT INTO $write_table
            SET wr_num = " . ($w == 'r' ? "'$wr_num'" : "(SELECT IFNULL(MIN(wr_num) - 1, -1) FROM $write_table as sq)") . ",
                wr_reply = '$wr_reply',
                wr_comment = 0,
                ca_name = '$ca_name',
                wr_option = '$wr_option',
                wr_subject = '$wr_subject',
                wr_content = '$wr_content',
                wr_seo_title = '$wr_seo_title',
                wr_link1 = '$wr_link1',
                wr_link2 = '$wr_link2',
                wr_link1_hit = 0,
                wr_link2_hit = 0,
                wr_hit = 0,
                wr_good = 0,
                wr_nogood = 0,
                mb_id = '{$mb_id}',
                wr_password = '$wr_password',
                wr_name = '$wr_name',
                wr_email = '$wr_email',
                wr_homepage = '$wr_homepage',
                wr_datetime = '" . G5_TIME_YMDHIS . "',
                wr_last = '" . G5_TIME_YMDHIS . "',
                wr_ip = '{$_SERVER['REMOTE_ADDR']}',
                wr_1 = '$wr_1',
                wr_2 = '$wr_2',
                wr_3 = '$wr_3',
                wr_4 = '$wr_4',
                wr_5 = '$wr_5',
                wr_6 = '$wr_6',
                wr_7 = '$wr_7',
                wr_8 = '$wr_8',
                wr_9 = '$wr_9',
                wr_10 = '$wr_10'";
    sql_query($sql);
    $wr_id = sql_insert_id();
    sql_query("UPDATE $write_table SET wr_parent = '$wr_id' WHERE wr_id = '$wr_id'");
    sql_query("INSERT INTO {$g5['board_new_table']} (bo_table, wr_id, wr_parent, bn_datetime, mb_id) VALUES ('{$bo_table}', '{$wr_id}', '{$wr_id}', '" . G5_TIME_YMDHIS . "', '{$mb_id}')");
    sql_query("UPDATE {$g5['board_table']} SET bo_count_write = bo_count_write + 1 WHERE bo_table = '{$bo_table}'");
    if ($w == '') {
        insert_point($mb_id, $board['bo_write_point'], "{$board['bo_subject']} {$wr_id} 글쓰기", $bo_table, $wr_id, '쓰기');
    } else {
        insert_point($mb_id, $board['bo_comment_point'], "{$board['bo_subject']} {$wr_id} 글답변", $bo_table, $wr_id, '쓰기');
    }
} else if ($w == 'u') {
    $sql = "UPDATE {$write_table}
            SET ca_name = '{$ca_name}',
                wr_option = '{$wr_option}',
                wr_subject = '{$wr_subject}',
                wr_content = '{$wr_content}',
                wr_seo_title = '$wr_seo_title',
                wr_link1 = '{$wr_link1}',
                wr_link2 = '{$wr_link2}',
                mb_id = '{$mb_id}',
                wr_name = '{$wr_name}',
                wr_email = '{$wr_email}',
                wr_homepage = '{$wr_homepage}',
                wr_1 = '{$wr_1}',
                wr_2 = '{$wr_2}',
                wr_3 = '{$wr_3}',
                wr_4 = '{$wr_4}',
                wr_5 = '{$wr_5}',
                wr_6 = '{$wr_6}',
                wr_7 = '{$wr_7}',
                wr_8 = '{$wr_8}',
                wr_9 = '{$wr_9}',
                wr_10 = '{$wr_10}'
            WHERE wr_id = '{$wr_id}'";
    sql_query($sql);
    $sql = "UPDATE {$write_table} SET ca_name = '{$ca_name}' WHERE wr_parent = '{$wr_id}'";
    sql_query($sql);
}

$bo_notice = board_notice($board['bo_notice'], $wr_id, $notice);
sql_query("UPDATE {$g5['board_table']} SET bo_notice = '{$bo_notice}' WHERE bo_table = '{$bo_table}'");

if (!$group['gr_use_access'] && $board['bo_read_level'] < 2 && !$secret) {
    naver_syndi_ping($bo_table, $wr_id);
}

$row = sql_fetch("SELECT max(bf_no) as max_bf_no FROM {$g5['board_file_table']} WHERE bo_table = '{$bo_table}' AND wr_id = '{$wr_id}'");
for ($i = (int)$row['max_bf_no']; $i >= 0; $i--) {
    $row2 = sql_fetch("SELECT bf_file FROM {$g5['board_file_table']} WHERE bo_table = '{$bo_table}' AND wr_id = '{$wr_id}' AND bf_no = '{$i}'");
    if (isset($row2['bf_file']) && $row2['bf_file']) break;
    sql_query("DELETE FROM {$g5['board_file_table']} WHERE bo_table = '{$bo_table}' AND wr_id = '{$wr_id}' AND bf_no = '{$i}'");
}

$row = sql_fetch("SELECT count(*) as cnt FROM {$g5['board_file_table']} WHERE bo_table = '{$bo_table}' AND wr_id = '{$wr_id}'");
sql_query("UPDATE {$write_table} SET wr_file = '{$row['cnt']}' WHERE wr_id = '{$wr_id}'");

sql_query("DELETE FROM {$g5['autosave_table']} WHERE as_uid = '{$uid}'");

if ($secret) {
    if (!$wr_num) {
        $write = get_write($write_table, $wr_id, true);
        $wr_num = $write['wr_num'];
    }
    set_session("ss_secret_{$bo_table}_{$wr_num}", TRUE);
}

if (!($w == 'u' || $w == 'cu') && $config['cf_email_use'] && $board['bo_use_email']) {
    $super_admin = get_admin('super');
    $group_admin = get_admin('group');
    $board_admin = get_admin('board');
    $wr_subject = get_text(stripslashes($wr_subject));
    $tmp_html = 0;
    if (strstr($html, 'html1')) $tmp_html = 1;
    else if (strstr($html, 'html2')) $tmp_html = 2;
    $wr_content = conv_content(conv_unescape_nl(stripslashes($wr_content)), $tmp_html);
    $warr = array('' => '입력', 'u' => '수정', 'r' => '답변', 'c' => '코멘트', 'cu' => '코멘트 수정');
    $str = $warr[$w];
    $subject = '[' . $config['cf_title'] . '] ' . $board['bo_subject'] . ' 게시판에 ' . $str . '글이 올라왔습니다.';
    $link_url = get_pretty_url($bo_table, $wr_id, $qstr);
    include_once(G5_LIB_PATH . '/mailer.lib.php');
    ob_start();
    include_once('./write_update_mail.php');
    $content = ob_get_contents();
    ob_end_clean();
    $array_email = array();
    if ($config['cf_email_wr_board_admin']) $array_email[] = $board_admin['mb_email'];
    if ($config['cf_email_wr_group_admin']) $array_email[] = $group_admin['mb_email'];
    if ($config['cf_email_wr_super_admin']) $array_email[] = $super_admin['mb_email'];
    if ($config['cf_email_wr_write']) {
        if ($w == '') $wr['wr_email'] = $wr_email;
        $array_email[] = $wr['wr_email'];
    }
    if (isset($wr['wr_option']) && isset($wr['wr_email'])) {
        if (strstr($wr['wr_option'], 'mail') && $wr['wr_email']) $array_email[] = $wr['wr_email'];
    }
    $unique_email = array_unique($array_email);
    $unique_email = run_replace('write_update_mail_list', array_values($unique_email), $board, $wr_id);
    for ($i = 0; $i < count($unique_email); $i++) {
        mailer($wr_name, $wr_email, $unique_email[$i], $subject, $content, 1);
    }
}

@include_once($board_skin_path . '/write_update.skin.php');
@include_once($board_skin_path . '/write_update.tail.skin.php');

delete_cache_latest($bo_table);

$redirect_url = run_replace('write_update_move_url', short_url_clean(G5_HTTP_BBS_URL . '/board.php?bo_table=' . $bo_table . '&amp;wr_id=' . $wr_id . $qstr), $board, $wr_id, $w, $qstr, $file_upload_msg);

run_event('write_update_after', $board, $wr_id, $w, $qstr, $redirect_url);

if ($file_upload_msg)
    alert($file_upload_msg, $redirect_url);
else
    goto_url($redirect_url);
?>
