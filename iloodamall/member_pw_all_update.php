<?php
    include_once('./_common.php');
	
	// 관리자 외에 모든회원 비밀번호 변경하는 코드
    $mb_id = "admin"; // 변경하려는 사용자 ID
    $new_password = "1111"; // 새 비밀번호

    // 그누보드에서 비밀번호는 get_encrypt_string 함수를 이용하여 암호화됩니다.
    // 이 함수는 내부적으로 SHA256을 이용합니다.
    $new_password_hashed = get_encrypt_string($new_password);
	
	$sql = "select * from {$g5['member_table']} where mb_id != '{$mb_id}'";
	$result = sql_query($sql);
	for($i=0; $row = sql_fetch_array($result); $i++){
		$new_password_hashed = get_encrypt_string($new_password);
		
		$sql = "UPDATE {$g5['member_table']}
            SET mb_password = '".$new_password_hashed."'
            WHERE mb_id = '".$row['mb_id']."' ";

		//sql_query($sql);
	}
	// 개별로 비밀번호 변경하는 코드

    //$mb_id = "admin"; // 변경하려는 사용자 ID
    //$new_password = "your_password"; // 새 비밀번호

    // 그누보드에서 비밀번호는 get_encrypt_string 함수를 이용하여 암호화됩니다.
    // 이 함수는 내부적으로 SHA256을 이용합니다.
    //$new_password_hashed = get_encrypt_string($new_password);

    //$sql = "UPDATE {$g5['member_table']}
    //        SET mb_password = '".$new_password_hashed."'
    //        WHERE mb_id = '".$mb_id."' ";

    //sql_query($sql);
?>