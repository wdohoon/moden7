<?php
include_once('./_common.php');

$code6s = $_POST[code];
$mb_id_ex = $_SERVER["REMOTE_ADDR"];

$sql_my_c = "select * from g5_member where mb_id='$mb_id_ex'";
$sql_my_r = sql_fetch($sql_my_c);


$sql = "select * from smsok where status='보냄' and result='' and mb_id='$mb_id_ex' and cer_num='$code6s' order by numbers 
 desc limit 0,1";
$sqresult = sql_fetch($sql);

if($sqresult[mb_id]){

	$dabi = "SELECT TIMESTAMPDIFF(second, '".$sqresult[datetime]."', '".G5_TIME_YMDHIS."') AS time_diff"; 
	$sqresult4 = sql_fetch($dabi);
		if(($sqresult4[time_diff]/60)>3){
			$sql3 = "update smsok set result='3분지남',status='실패' where numbers='$sqresult[numbers]' ";
			sql_query($sql3);
			echo "502";//502면 유효기간 만료 
		}else{ //시간내 코드 ㅇㅋ 이면
			$sql3 = "update smsok set result='인증완료',status='성공' where numbers='$sqresult[numbers]' ";
			sql_query($sql3);
			echo "100";//100이면 코드 일치 
		}
}else{
	
	echo '200'; // 200이면 코드 불일치 or 지난 코드

}
//echo "502";//502면 유효기간 만료 
//echo '200'; // 200이면 코드 불일치 or 지난 코드
//echo "100";//100이면 코드 일치 




?>