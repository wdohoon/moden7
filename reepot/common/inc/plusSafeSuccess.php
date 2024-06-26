<?php
    //**************************************************************************************************************
    //NICE평가정보 Copyright(c) KOREA INFOMATION SERVICE INC. ALL RIGHTS RESERVED
    
    //서비스명 :  체크플러스 - 안심본인인증 서비스
    //페이지명 :  체크플러스 - 결과 페이지
    
    //보안을 위해 제공해드리는 샘플페이지는 서비스 적용 후 서버에서 삭제해 주시기 바랍니다.
    //인증 후 결과값이 null로 나오는 부분은 관리담당자에게 문의 바랍니다.	
    //**************************************************************************************************************
    
//	session_start();
//
//	include_once $_SERVER['DOCUMENT_ROOT'] . '/common/inc/function.php';

	include_once $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';
	
    $sitecode = "BU958";				// NICE로부터 부여받은 사이트 코드
    $sitepasswd = "rKr7LOTicCcZ";				// NICE로부터 부여받은 사이트 패스워드
    
    // Linux = /절대경로/ , Window = D:\\절대경로\\ , D:\절대경로\
    $cb_encode_path = "/home/ilooda/CPClient_32bit";
		
    $enc_data = $_REQUEST["EncodeData"];		// 암호화된 결과 데이타

	// 응답값 
	$response = array();

	//////////////////////////////////////////////// 문자열 점검///////////////////////////////////////////////
    if(preg_match('~[^0-9a-zA-Z+/=]~', $enc_data, $match)) {
		$response['code'] = -1;
		$response['msg'] = "입력 값 확인이 필요합니다";

		echo json_encode($response);
		exit;
	} // 문자열 점검 추가. 
    if(base64_encode(base64_decode($enc_data))!=$enc_data) {
		$response['code'] = -1;
		$response['msg'] = "입력 값 확인이 필요합니다";
		echo json_encode($response);
		exit;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
		
    if ($enc_data != "") {

        $plaindata = `$cb_encode_path DEC $sitecode $sitepasswd $enc_data`;		// 암호화된 결과 데이터의 복호화

        if ($plaindata == -1){
			$response['code'] = -1;
			$response['msg'] = "암/복호화 시스템 오류";
        }else if ($plaindata == -4){
			$response['code'] = -1;
			$response['msg'] = "복호화 처리 오류";
        }else if ($plaindata == -5){
			$response['code'] = -1;
			$response['msg'] = "HASH값 불일치 - 복호화 데이터는 리턴됨";
        }else if ($plaindata == -6){
			$response['code'] = -1;
			$response['msg'] = "복호화 데이터 오류";
        }else if ($plaindata == -9){
			$response['code'] = -1;
			$response['msg'] = "입력값 오류";
        }else if ($plaindata == -12){
			$response['code'] = -1;
			$response['msg'] = "사이트 비밀번호 오류";
        }else{
            // 복호화가 정상적일 경우 데이터를 파싱합니다.
            $requestnumber = GetValue($plaindata , "REQ_SEQ");

			if(strcmp($_SESSION["REQ_SEQ"], $requestnumber) != 0) {
				$response['code'] = -1;
				$response['msg'] = '세션값이 다릅니다. 올바른 경로로 접근하시기 바랍니다.';
            } else {
				$response['code'] = 1;
				$response['data'] = array(
						'name' => urldecode(GetValue($plaindata , "UTF8_NAME")),
						'mobile' => GetValue($plaindata , "MOBILE_NO")
					);
			}
        }
    }
?>
<script>
	alert('본인인증이 완료되었습니다.');
	var data = {
		code: "<?=$response['code'] ?>",
		msg: "<?=$response['msg'] ?>",
		name: "<?=$response['data']['name'] ?>",
		mobile: "<?=$response['data']['mobile'] ?>"
	};
	window.opener.getValueFromPlusSafe(data);
	window.close();
</script>