<?php
include_once('./_common.php');

$sqlll = " select * from g5_write_{$bo_table} where wr_id = {$wr_id} ";
$row = sql_fetch($sqlll);


//아래 항목들은 genuine 테이블에서 해당되는 내용
//wr_2 = 유저가 등록신청한 모든 시리얼넘버
//wr_3 = 정품인증이 완료된 시리얼넘버(관리자가 승인해줘야함)
//wr_4 = 정품인증 완료된 시리얼넘버의 브랜드명 모음

// 완료
if($s == 'c') {

	if($row['wr_3']){		//이미 기존에 정품인증 해서 브랜드가 등록되어있으면,
		$all_po = $row['wr_3'].','.$first.','.$second.','.$third.','.$fouth.','.$fifth;
		$all_po2 = explode(',', $all_po);
		$po = array_unique(array_values(array_filter($all_po2)));		//중복제거,빈값제거 및 배열 앞으로 당기기

		$sql = "update g5_write_{$bo_table} set wr_9 = '1' where wr_id = {$wr_id}";
		$sql2 = "update g5_member set mb_level = 3 where mb_id = {$row['mb_id']} ";

	}else{		//첫 등록이면
		$all_po = $first.'|'.$second.'|'.$third.'|'.$fouth.'|'.$fifth;
		$all_po2 = explode('|',$all_po);
		$po = array_values(array_filter($all_po2));
	}

	$arr = array();
	$arr2 = array();

	for($i = 0 ; $i < count($po) ; $i++) {
		$hi = sql_fetch(" SELECT * FROM g5_write_serial WHERE wr_2 = '{$po[$i]}' ");

		$arr[] = $hi['wr_3'];
		$arr2[] = $hi['wr_1'];
	}

	$jbstr = implode( ',', $po);
	$jbstr2 = implode( ',', $arr);
	$jbstr3 = implode( ',', $arr2);

	echo $jbstr."<br>";
	echo $jbstr2."<br>";
	echo $jbstr3."<br>";


	$sql3 = " update g5_write_{$bo_table} set wr_3 = '{$jbstr}' where wr_id = {$wr_id} ";
	$sql4 = " update g5_write_{$bo_table} set wr_4 = '{$jbstr2}' where wr_id = {$wr_id} ";
	$sql4 = " update g5_write_{$bo_table} set wr_1 = '{$jbstr3}' where wr_id = {$wr_id} ";
	
	/*
	if($row['wr_9'] == 1) {
		$sql = "update g5_write_{$bo_table} set wr_9 = '' where wr_id = {$wr_id}";
		$sql2 = "update g5_member set mb_level = 2 where mb_id = {$row['mb_id']} ";
		$sql3 = " update g5_write_{$bo_table} set wr_3 = '' where wr_id = {$wr_id} ";
	} else {
		
	}
	*/
}


sql_query($sql);
sql_query($sql2);
sql_query($sql3);
sql_query($sql4);
sql_query($sql5);



//goto_url('./board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id);