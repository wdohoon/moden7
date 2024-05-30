<?php 
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

	$wr_1 = explode(',',$wr_1);
	$wr_1 = array_unique(array_values(array_filter($wr_1)));

	$wr_2 = explode(',',$wr_2);
	$wr_2 = array_unique(array_values(array_filter($wr_2)));

	//print_r2($wr_1)."<br>";
	//print_r2($wr_2)."<br>";
	
	$sql_h = " select * from genuine_list where mb_id = '{$member['mb_id']}' ";
	$result_h = sql_query($sql_h);

	//for($i = 0; $history = sql_fetch_array($result_h); $i++){
		//if($history['pd_name'] == )
	//}

	if(!$wr_1 || !$wr_2){
		alert('시리얼 넘버를 입력하세요');
	}

	$po_point = '100000';
	$po_content = '정품등록 적립금';
	$arr = array();

	for($v = 0 ; $v < count($wr_2) ; $v++) {
		$sql_h = sql_fetch(" select * from genuine_list where mb_id = '{$member['mb_id']}' and pd_name = '{$wr_1[$v]}' and pd_num = '{$wr_2[$v]}'");
		if($sql_h){
			alert($wr_1[$v].' / '.$wr_2[$v].'는 이미 등록한 값입니다.');
		}

		$ssql = " select * from g5_write_serial where wr_1 = '{$wr_2[$v]}' ";
		$fet = sql_fetch($ssql);
		
		if($wr_2[$v] == $fet['wr_1']){	//사용자가 등록한 값들이 실제 시리얼넘버랑 겹치면

			$arr[] = $wr_2[$v];

			$arr = array_unique(array_values(array_filter($arr)));

			insert_point2($mb_id, $po_point, $po_content, '@passive', $mb_id, $member['mb_id'] . '-' . uniqid(''), $expire);

			$wr_3 = 0;

		}else{ // 관리자 승인이 필요한 정품등록이면 포인트 지급 x
			$arr[] = $wr_2[$v];

			$arr = array_unique(array_values(array_filter($arr)));
				
			$wr_3 = 1;

			//alert('입력하신 시리얼 넘버('.$wr_2[$v].')가 일치하지 않습니다.');
		}
		
		$sql_kkk = "select * from genuine_list where pd_name = '{$wr_1[$v]}' and pd_num = '{$wr_2[$v]}' order by no desc ";
		$row_kkk = sql_fetch($sql_kkk);
		
		if($row_kkk){
			
			$number  = $row_kkk['number'] + 1;
			
		}else{
			
			$number  = 1;
			
			
			}
		
		$wr_date = date("Y-m-d");
		
		
		$sql = "insert into genuine_list 
		 			set mb_id = '{$member['mb_id']}',
						pd_name = '{$wr_1[$v]}',
						pd_num = '{$wr_2[$v]}',
						division = '$wr_3',
						number  = '$number',
						wr_date = '$wr_date'
						
						
						";
		//echo $sql;
		sql_query($sql);
	}

	$jbstr1 = implode( ',', $wr_1);

	$jbstr2 = implode( ',', $arr);

	$wr_1 = $jbstr1;
	$wr_2 = $jbstr2;

	//echo $wr_2."<br>";
	if($wr_3 == 1){ // 관리자 승인이 필요한 정품등록이면 회원등급 상승 x 0 = 자동승인 , 1 = 수동승인대기, 2 = 수동승인완료

	} else {
		if($member['mb_id'] == 'admin' || $member['mb_id'] == 'ilooda1'  || $member['mb_id'] == 'ilooda2'  || $member['mb_id'] == 'ilooda3'  || $member['mb_id'] == 'ilooda4' ){

		} else {
			$sql = " update g5_member
						set  mb_level = '3'
					  where mb_id = '{$member['mb_id']}' ";
			sql_query($sql);
		}
	}

	
	//exit;

