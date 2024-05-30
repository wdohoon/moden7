<?php
$sub_menu = '400400';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "w");

// 주문정보
$sql = " select *
            from {$g5['g5_shop_order_table']}
            where od_misu = '0'
              and od_status = '준비'
            order by od_id desc ";
$result = sql_query($sql);

if(!@sql_num_rows($result))
    alert_close('배송처리할 주문 내역이 없습니다.');

if(! function_exists('column_char')) {
    function column_char($i) {
        return chr( 65 + $i );
    }
}

    include_once(G5_LIB_PATH.'/PHPExcel.php');
    
    //$headers = array('주문번호', '주문자명', '주문자전화1', '주문자전화2', '배송자명', '배송지전화1', '배송지전화2', '배송지주소', '배송회사', '운송장번호');
    $headers = array('주문번호','운송장번호','배송회사', '회원명', '상호', '상품명', '상품수량', '배송메세지', '수취인', '수취인 전화번호', '수취인 핸드폰번호', '수취인 주소', 'LOT 번호');
    $widths  = array(18, 20, 20, 15, 15, 30, 10, 30, 15, 15, 15, 50, 20);
    $header_bgcolor = 'FFABCDEF';
    $last_char = column_char(count($headers) - 1);
    $rows = array();

    for($i=1; $row=sql_fetch_array($result); $i++) {
		$memmem = sql_fetch(" select * from g5_member where mb_id = '{$row['mb_id']}' ");
		$itit = sql_query(" select * from g5_shop_cart where od_id = '{$row['od_id']}' and ct_status != '취소'");
		for($j=0; $itrow = sql_fetch_array($itit); $j++){
			if($itrow['io_id'] != ''){
				$it_name = $itrow['it_name'].' / 옵션 : '.$itrow['io_id'];
			} else{
				$it_name = $itrow['it_name'];
			}
			$rows[] = 
				array(' '.$row['od_id'],
						$row['od_invoice'],
						$row['od_delivery_company'],
						$row['od_name'],
						$memmem['mb_1'],
						preg_replace("/\"/", "&#034;", $it_name),
						' '.$itrow['ct_qty'],
						$row['od_memo'], 
						$row['od_b_name'], 
						' '.$row['od_b_tel'], 
						' '.$row['od_b_hp'],							 
						print_address($row['od_b_addr1'], $row['od_b_addr2'], $row['od_b_addr3'], $row['od_b_addr_jibeon']),
						$row['od_lotnumber']
						);
		}
    }

    $data = array_merge(array($headers), $rows);

    $excel = new PHPExcel();
    $excel->setActiveSheetIndex(0)->getStyle( "A1:{$last_char}1" )->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB($header_bgcolor);
    $excel->setActiveSheetIndex(0)->getStyle( "A:$last_char" )->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setWrapText(true);
    foreach($widths as $i => $w) $excel->setActiveSheetIndex(0)->getColumnDimension( column_char($i) )->setWidth($w);
    $excel->getActiveSheet()->fromArray($data,NULL,'A1');

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"deliverylist-".date("ymd", time()).".xls\"");
    header("Cache-Control: max-age=0");

    $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
    $writer->save('php://output');
