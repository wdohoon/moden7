<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
if(!$is_admin) {
	if ($w =='' && $bo_table == 'profile') {
		$wr_cnt = sql_fetch(" select count(wr_id) as cnt from {$write_table} where wr_is_comment=0 and mb_id = '{$member['mb_id']}' ");
		if ($wr_cnt['cnt']) {
		   alert("프로필 등록은 한번만 할 수 있습니다.");
	   }
	}
}
?>