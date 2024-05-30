<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
// 최고관리자
if ($member['mb_id'] == 'admin') $is_admin = 'super';
// 최고관리자
if ($member['mb_id'] == 'ilooda1') $is_admin = 'super';
// 최고관리자
if ($member['mb_id'] == 'ilooda2') $is_admin = 'super';
// 최고관리자
if ($member['mb_id'] == 'ilooda3') $is_admin = 'super';
// 최고관리자
if ($member['mb_id'] == 'ilooda4') $is_admin = 'super';
// 최고관리자
if ($member['mb_id'] == 'sub_admin') $is_admin = 'super';

if ($member['mb_id'] == 'log_admin' && isset($_GET['call']) && $_GET['call'] == 'login_history_list') {
    $is_admin = 'super';
}
?>