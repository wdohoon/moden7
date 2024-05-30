<?
	@include_once('./_common.php');
	$sql = "update g5_member set mb_1 = '',mb_2 = '' where mb_id = '{$member['mb_id']}'";
	sql_query($sql);
?>