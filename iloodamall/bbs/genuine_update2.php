<?php 
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

	$wr_1 = explode(',',$wr_1);
	$wr_1 = array_unique(array_values(array_filter($wr_1)));

	$wr_2 = explode(',',$wr_2);
	$wr_2 = array_unique(array_values(array_filter($wr_2)));

	//print_r2($wr_1)."<br>";
	//print_r2($wr_2)."<br>";
	if(!$wr_1 || !$wr_2){
		alert('시리얼 넘버를 입력하세요.');
	}

	$sql = "select * from g5_write_genuine where mb_id = '{$member['mb_id']}'";
	$row = sql_fetch($sql);
	
	$p_name = explode(',',$row['wr_1']);
	$s_number = explode(',',$row['wr_2']);
	
	foreach ($wr_2 as $value) {
		if (in_array($value, $s_number)) {
			alert($value.'는 이미 등록된 시리얼 넘버입니다');
		}
	}

	foreach ($wr_1 as $value) {
		if (!in_array($value, $p_name)) {
			$p_name[] = $value; // wr_1에만 있는 값을 추가
		}
	}

	$arr = array();
	
	$mb_id = $member['mb_id'];
	$po_point = '100000';
	$po_content = '정품등록 적립금';
	$expire = isset($_POST['po_expire_term']) ? preg_replace('/[^0-9]/', '', $_POST['po_expire_term']) : '';


	for($v = 0 ; $v < count($wr_2) ; $v++) {
		$ssql = " select * from g5_write_serial where wr_1 = '{$wr_2[$v]}' ";
		$fet = sql_fetch($ssql);
		
		if($wr_2[$v] == $fet['wr_1']){		//사용자가 등록한 값들이 실제 시리얼넘버랑 겹치면

			$arr[] = $wr_2[$v];

			$arr = array_unique(array_values(array_filter($arr)));

			insert_point2($mb_id, $po_point, $po_content, '@passive', $mb_id, $member['mb_id'] . '-' . uniqid(''), $expire);

		}else{ // 관리자 승인이 필요한 정품등록이면 포인트 지급 x
			$arr[] = $wr_2[$v];

			$arr = array_unique(array_values(array_filter($arr)));
				
			$wr_3 = 1;

			//alert('입력하신 시리얼 넘버('.$wr_2[$v].')가 일치하지 않습니다.');
		}

	}
	foreach ($arr as $value) {
		if (!in_array($value, $s_number)) {
			$s_number[] = $value;
		}
	}

	$jbstr1 = implode( ',', $p_name);
	$jbstr2 = implode( ',', $s_number);

	$wr_1 = $jbstr1;
	$wr_2 = $jbstr2;
	
	//$sql = " update g5_write_genuine
	//			set  wr_1 = '{$wr_1}',
	//				 wr_2 = '{$wr_2}'
	//		  where wr_id = '{$wr_id}'
	//				and mb_id = '{$member['mb_id']}' ";
	//sql_query($sql);
	
	if($wr_3 == 1){ // 관리자 승인이 필요한 정품등록이면 텍스트 다르게
		alert("정품등록 신청이 완료되었습니다.\\n관리자 승인이 필요한 정품번호이며\\n승인완료 시 포인트가 지급됩니다.");
	} else {
		alert("정품등록 신청이 완료되었습니다.\\n실제 등록된 제품이면 등록 현황은 마이페이지에서 확인가능하시며\\n완료 시 A/S신청과 가이드영상, 병원마케팅센터 사용가능합니다.");
	}

