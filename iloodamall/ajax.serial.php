<?php
include_once('./_common.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$wr_id = $_POST['wr_id'];
$mb_id = $_POST['mb_id'];
$serial = $_POST['serial'];

$sql2 = " select * from g5_write_serial where wr_1 like '%{$serial}%' ";
$result2 = sql_query($sql2);
$row2 = sql_fetch_array($result2);

//첫 실행이면 내용 집어넣구 trycount 를 1로 시작
//sql_query("insert into roulette_point (mb_id,point1,click_time,trycount) VALUES ('".$member['mb_id']."','".$_POST['soo']."','".G5_TIME_YMDHIS."','".$get."')");

if($serial == $row2['wr_1']){
	echo $row2['wr_1'];exit;
}else{
	echo "not-brand";exit;
}

//$sql = " update g5_write_genuine set wr_3 = '{$row2['wr_1']}' where wr_id = '{$wr_id}' and mb_id = '{$mb_id}' ";

//sql_query($sql);

?>

