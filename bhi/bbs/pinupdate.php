<?php
include_once('./_common.php');



if($_POST['w']=="u"){

	if($member['mb_id'] && $_POST['new_pin']){
		sql_query("update g5_member set mb_10 = '".$_POST['new_pin']."' where mb_id='".$member['mb_id']."'");
		alert("핀번호를 변경하셨습니다.","/mypage.php");

	}else{
		alert("잘못된 접근입니다.","/");
	}


}else{


$mb_id = $_POST['mb_id'];
$mb_10 = $_POST['mb_10'];

if($member['mb_id']==$mb_id){
	if($mb_10){
		sql_query("update g5_member set mb_10 = '".$mb_10."' where mb_id='".$mb_id."'");
		alert("핀번호를 변경하셨습니다.","/");
	}else{		
		alert("잘못된 접근입니다.","/");
	}
}

}
?>
