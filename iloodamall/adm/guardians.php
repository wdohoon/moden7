<?php
$sub_menu = "300120";
require_once './_common.php';

// 관리자 로그인 체크 및 메뉴 권한 체크
auth_check_menu($auth, $sub_menu, 'r', 'w', 'd');

$admin_ids = array('admin', 'log_admin', 'sub_admin', 'as_admin', 'shop_admin', 'board_admin', 'member_admin');

// 로그인한 사용자의 ID가 $admin_ids 배열에 있는지 확인
if (in_array($member['mb_id'], $admin_ids)) {
    $login_id = $member['mb_id']; 
    $mb_name = $member['mb_name'];  
    $user_ip = $_SERVER['REMOTE_ADDR'];  
    $accessed_page = "가디언즈 관리";
    $history_datetime = date('Y-m-d H:i:s'); 
	$action = "조회";

    // 데이터베이스에 접속 기록 삽입
    $sql = "INSERT INTO g5_login_history_save (login_id, user_name, user_ip, accessed_page, history_datetime, action) 
            VALUES ('{$login_id}', '{$mb_name}', '{$user_ip}', '{$accessed_page}', '{$history_datetime}', '{$action}')";
    sql_query($sql);
}
?>

<?
$g5['title'] = '가디언즈 관리';
require_once './admin.head.php';
?>
<style>
	.btn_wrap{display: flex; justify-content:center; align-items:center; gap:30px; min-height:700px;}	
	.btn_wrap a{width: 45%; border:1px solid; text-align:center; line-height:10; border-radius:10px; font-size:2em;}
</style>
<div class="btn_wrap">
	<a href="<?php echo G5_BBS_URL ?>/write.php?w=u&bo_table=guardians_adm&wr_id=1&page=">가디언즈 배너 관리</a>
	<a href="<?php echo G5_ADMIN_URL ?>/guardians_form.php">가디언즈 강연 목록 관리</a>
</div>
<?php
require_once './admin.tail.php';