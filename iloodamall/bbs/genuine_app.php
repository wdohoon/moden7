<?php
	require_once './_common.php';
	
	$pd_name = $_GET['pd_name'];
	$pd_num = $_GET['pd_num'];
	$mb_id = $_GET['mb_id'];
	//echo $p_name.'<br>';

	$row = sql_fetch("select * from genuine_list where mb_id = '$mb_id' and pd_name = '$pd_name' and pd_num = '$pd_num' and division = 2");
	//print_r2($row);
	//exit;

	if($row){
		alert('이미 승인한 게시글입니다.');
	}

	$sql = "update genuine_list set division = 2 where mb_id = '$mb_id' and pd_name = '$pd_name' and pd_num = '$pd_num'";
	sql_query($sql);

	//echo $sql;
	if($mb_id == 'admin' || $mb_id == 'ilooda1'  || $mb_id == 'ilooda2'  || $mb_id == 'ilooda3'  || $mb_id == 'ilooda4' ){

	} else {
		$sql2 = " update g5_member set  mb_level = '3' where mb_id = '$mb_id' ";
		sql_query($sql2);
	}
	
	$po_point = '100000';
	$po_content = '정품등록 적립금';
	insert_point2($mb_id, $po_point, $po_content, '@passive', $mb_id, $member['mb_id'] . '-' . uniqid(''), $expire);

	alert('승인완료되었습니다.');
	exit;
?>