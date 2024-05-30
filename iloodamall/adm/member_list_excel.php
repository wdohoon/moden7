<?php
$sub_menu = '400400';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "w");

// 회원정보
//$sql = " select * from g5_member where mb_hp != '' order by mb_no desc ";
			
$sql = " select * from g5_member order by mb_no desc ";
$result = sql_query($sql);

if(! function_exists('column_char')) {
    function column_char($i) {
        return chr( 65 + $i );
    }
}

    include_once(G5_LIB_PATH.'/PHPExcel.php');
    
    $headers = array('아이디','이름','소속병원','사업자 등록번호','분류','정품등록제품','권한(레벨)','휴대폰','이메일','가입일','MP','PP','회원가입 약관','개인정보수집','마케팅 목적의 개인정보동의','광고성정보 수신동의');
    $widths  = array(20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20);
    $header_bgcolor = 'FFABCDEF';
    $last_char = column_char(count($headers) - 1);
    $rows = array();

    for($i=1; $row=sql_fetch_array($result); $i++) {

		$result2 = sql_query("SELECT * FROM genuine_list WHERE mb_id = '{$row['mb_id']}' AND (division = 0 OR division = 2)");
		$genuine_values = array();
		while ($row2 = sql_fetch_array($result2)) {
			$genuine_values[] = $row2['pd_name'];
		}
		$genuine_unique = array_unique($genuine_values);
		$genuine_all = implode('/', $genuine_unique);

		$auth_level = '';
			if ($row['mb_level'] == 2) {
				$auth_level = '승인';
			} elseif ($row['mb_level'] == 1) {
				$auth_level = '미승인';
			} elseif ($row['mb_level'] == 3) {
				$auth_level = '승인';
			} else {
				$auth_level = '없음';
			}

		$rows[] = 
			array(' '.$row['mb_id'],
					$row['mb_name'],
					$row['mb_1'],
					$row['mb_2'],
					$row['mb_10'],
					$genuine_all,
					$auth_level,
					$row['mb_hp'],
					$row['mb_email'],
					$row['mb_nick_date'],
					$row['mb_point2'],
					$row['mb_point'],
					
					$row['mb_5'],
					$row['mb_6'],
					$row['mb_7'],
					$row['mb_8']
					
					
					
					);
    }

    $data = array_merge(array($headers), $rows);

    $excel = new PHPExcel();
    $excel->setActiveSheetIndex(0)->getStyle( "A1:{$last_char}1" )->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB($header_bgcolor);
    $excel->setActiveSheetIndex(0)->getStyle( "A:$last_char" )->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true);
    foreach($widths as $i => $w) $excel->setActiveSheetIndex(0)->getColumnDimension( column_char($i) )->setWidth($w);
    $excel->getActiveSheet()->fromArray($data,NULL,'A1');

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"회원 목록-".date("ymd", time()).".xls\"");
    header("Cache-Control: max-age=0");

    $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
    $writer->save('php://output');
