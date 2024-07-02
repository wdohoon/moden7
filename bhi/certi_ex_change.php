<?php
include_once('./_common.php');


function GenerateString()  
{  
	 
	$string_generated =  mt_rand(100000,999999);  
	return $string_generated;  
}  



if(!$member['mb_id'] && $_POST['hphp']){

		$sqlmm = sql_fetch("select mb_id from g5_member where mb_id='".$_POST['hphp']."' ");
		if(!$sqlmm['mb_id']){
			echo "가입 회원이 아닙니다.";
			exit;
		}
	
}





$ransoo = GenerateString();

$mb_id_ex = $_SERVER["REMOTE_ADDR"];

//$dabi = "SELECT TIMESTAMPDIFF(second, '".$sqresult[datetime]."', '".G5_TIME_YMDHIS."') AS time_diff"; 
$sql_my_certi = "select * from smsok where mb_id='$mb_id_ex' and status='보냄' order by numbers desc limit 0,25";
$sqlcerti = sql_query($sql_my_certi);
$sqlcerti_r = sql_num_rows($sqlcerti);

if($sqlcerti_r>0){
	
	$vas = 0;
	$vvv = 0;
	for($i=0;$i<$sqlcerti_r;$i++){
		
		$sq[$i] = sql_fetch_array($sqlcerti);
		$dabi = "SELECT TIMESTAMPDIFF(second, '".$sq[$i][datetime]."', '".G5_TIME_YMDHIS."') AS time_diff";
		$dabid = sql_fetch($dabi);
		if(($dabid[time_diff]/60)<10){// 10분안에 3번이상시 
			$vas = $vas+1;
		}
		if($i==0){
			$vvv = ($dabid[time_diff]/60);
		}
	}


	if($vas>=3){
		echo '10분안에 인증코드 3개초과 불가 합니다.\n잠시후 다시 이용해주세요';
		exit;
	
	}

	if($vas<3 && $vvv<3){
		echo '111';
		exit;
	}

}



  /******************** 인증정보 ********************/ 
                    
  $sms_url = "http://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL 
                    
        $sms['user_id'] = base64_encode("oknawallet1"); //SMS sorbochwnsms 아이디.
	   //qorcndrl1
	   //a04e47bc09e97301c0f99cc889a361b0
       $sms['secure'] = base64_encode("375d2cd8fe30693907aafcaa08ffa8a1") ;// 897f04c348bdchw433e16626a2154f6a4ff 인증키 



      $sms['msg'] =  base64_encode(strip_tags(stripslashes($ransoo."\nBHIDEX입니다\n본인인증을 위해 인증번호를\n입력해주세요\n")));	


                    $sms['rphone'] = base64_encode($_POST['hphp']);  // 받는사람 010-4304-1983
                    $sms['sphone1'] = base64_encode("010");    //보내는사람 발신자 번호 등록되어있어야함. 
                    $sms['sphone2'] = base64_encode("4304");  //보내는사람 발신자 번호 등록되어있어야함. 
                    $sms['sphone3'] = base64_encode("1983");  //보내는사람 발신자 번호 등록되어있어야함.  
                
                 $sms['rdate'] = base64_encode($_POST['rdate']); 
                    $sms['rtime'] = base64_encode($_POST['rtime']); 
                    $sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다. 
                    $sms['returnurl'] = base64_encode($_POST['returnurl']); 
                    $sms['testflag'] = base64_encode($_POST['testflag']); 
                    $sms['destination'] = base64_encode($_POST['destination']); 
                    $returnurl = $_POST['returnurl']; 
                    $sms['repeatFlag'] = base64_encode($_POST['repeatFlag']); 
                    $sms['repeatNum'] = base64_encode($_POST['repeatNum']); 
                    $sms['repeatTime'] = base64_encode($_POST['repeatTime']); 
                    $sms['smsType'] = base64_encode($_POST['smsType']); // LMS일경우 L 

                    $nointeractive = $_POST['nointeractive']; //사용할 경우 : 1, 성공시 대화상자(alert)를 생략 

                    $host_info = explode("/", $sms_url); 
                    $host = $host_info[2]; 
                    $path = $host_info[3]; 

                    srand((double)microtime()*1000000); 
                    $boundary = "---------------------".substr(md5(rand(0,32000)),0,10); 
                    //print_r($sms); 

                    // 헤더 생성 
                    $header = "POST /".$path ." HTTP/1.0\r\n"; 
                    $header .= "Host: ".$host."\r\n"; 
                    $header .= "Content-type: multipart/form-data, boundary=".$boundary."\r\n"; 

                    // 본문 생성 
                    foreach($sms AS $index => $value){ 
                        $data .="--$boundary\r\n"; 
                        $data .= "Content-Disposition: form-data; name=\"".$index."\"\r\n"; 
                        $data .= "\r\n".$value."\r\n"; 
                        $data .="--$boundary\r\n"; 
                    } 
                    $header .= "Content-length: " . strlen($data) . "\r\n\r\n"; 

                    $fp = fsockopen($host, 80); 

                    if ($fp) { 
                        fputs($fp, $header.$data); 
                        $rsp = ''; 
                        while(!feof($fp)) { 
                            $rsp .= fgets($fp,8192); 
                        } 
                        fclose($fp);
						

						$sql = "insert into smsok (cer_num,mb_id,datetime,status,result) values 
						 ('$ransoo','$mb_id_ex','".G5_TIME_YMDHIS."','보냄','') ";
						$sqresult = sql_query($sql);
						echo 'ok';



                    }else{
						echo '404';
					} 


//////////////////////문자메세지 끝//////////////////////////////////




?>