<?

include_once('./_common.php');

//인스타 토큰 자동갱신
$today_date = date("Y-m-d H:i:s"); //오늘
$chk_date = date("Y-m-d H:i:s", strtotime("+1 months", strtotime($config['last_ins_date']))); // 최종갱신일자에서 1달째되는 날자.
$ins_token = ''; //업데이트할 인스타 토큰을 담는 변수.

//$today_date = "2023-07-17 13:57:16"; 임시로 날자 설정
if($chk_date < $today_date){ //발급일자+1달 보다 오늘이 클때
 
    //인스타토큰을 갱신
    $url = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=".$config['ins_key_token'];
 
    $ch = curl_init();                            
    curl_setopt($ch, CURLOPT_URL, $url);            
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);     
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
    $response = curl_exec($ch);        
    curl_close($ch);
 
    $res = json_decode($response); //json 디코드
    $ins_token = $res->access_token;
    //$res->token_type:토큰타입, $res->expires_in:만료기간도 있으니 같이 저장해둬도 좋을것같습니다. 
	
	//echo $url.'<br>';
	//print_r($res).'<br>';
	
    //ins token과 오늘의 시간을 주고 업데이트.
    $inskey_update_query = "update g5_config
            set ins_key_token = '{$ins_token}', 
            last_ins_date = '{$today_date}' ";

    sql_query($inskey_update_query);
}
?>