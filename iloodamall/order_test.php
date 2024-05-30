<?

require_once './_common.php';

//  자동 주문취소 만들기
$orderDay = date('Y-m-d H:i:s', strtotime('-7 days'));
//$beforedays = date('Y-m-d H:i:s', G5_SERVER_TIME - ($default['de_point_days'] * 172800));
$sql22 = " select * from {$g5['g5_shop_cart_table']} where ct_status = '주문' and ct_time <= '$orderDay' ";
echo $orderDay.'<br>';
echo $sql22;
$result22 = sql_query($sql22);
for ($i=0; $row22=sql_fetch_array($result22); $i++) {
	echo "update {$g5['g5_shop_cart_table']} set ct_status = '취소' where ct_id = '{$row22['ct_id']}' <br>";
	echo "update {$g5['g5_shop_order_table']} set od_status = '취소' where od_id = '{$row22['od_id']}'  <br>";
	//sql_query("update {$g5['g5_shop_cart_table']} set ct_status = '취소' where ct_id = '{$row22['ct_id']}' ");  
	//sql_query("update {$g5['g5_shop_order_table']} set od_status = '취소' where od_id = '{$row22['od_id']}' ");  
}

$sql = "select * from genuine_list where mb_id = '{$member['mb_id']}'";
$result = sql_query($sql);
echo $sql;
//print_r2($result);
$pd_result = array();

for($j=0; $row = sql_fetch_array($result); $i++){
	//print_r2($row);
	$pd_name = $row['pd_name'];
    $pd_num = $row['pd_num'];
    
    // $pd_name을 키로 사용하여 $pd_num을 추가
    if (!isset($pd_result[$pd_name])) {
        $pd_result[$pd_name] = array();
    }
    
    $pd_result[$pd_name][] = $pd_num;
}
print_r2($pd_result);


// 배열 루프
//foreach ($row as $item) {
//	print_r2($item);
//    $pd_name = $item['pd_name'];
//    $pd_num = $item['pd_num'];
    
    // $pd_name을 키로 사용하여 $pd_num을 추가
//    if (!isset($pd_result[$pd_name])) {
//        $pd_result[$pd_name] = array();
//    }
    
//    $pd_result[$pd_name][] = $pd_num;
//}

// 결과 출력
foreach ($pd_result as $pd_name => $pd_nums) {
    $pd_nums_str = implode(', ', $pd_nums);
    echo "<br>$pd_name = $pd_nums_str<br>";
}

?>