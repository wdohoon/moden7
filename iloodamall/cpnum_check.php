<?php
	include_once('./_common.php');

	$num = $_POST['mb_2'];

	$sql = "SELECT * FROM g5_member WHERE REPLACE(mb_2, '-', '') = '$num'";
	$row = sql_fetch($sql);
	if($row){
		$text = '해당 사업자번호로 생성된 계정이 있습니다.';
		$result = 0;
		//echo $sql;
	} else {
		$text = '사용 가능한 사업자번호입니다.';
		$result = 1;
		//echo $sql;
	}
	echo $text.'\\n';
	echo $result;
?>