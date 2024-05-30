<?php

$url = "https://api.instagram.com/oauth/access_token/";
$post_data = array(

    "client_id" => "714081343655903", // 패이스북 개발자 페이지에서 설정한 앱의 id
    "client_secret" => "27f6e997e3a517e616ede03e59a04d3c", // 패이스북 개발자 페이지에서 설정한 앱의 시크릿 코드
    "grant_type" => "authorization_code",
    "redirect_uri" => "https://reepotlaser.com/", // 페이스북 개발자 페이지에서 설정한 홈페이지 주소
    "code" => "AQAVz3iga1rzQCqNHGp2euMIGRc_ZTLc9A0owp3X9pQOTbdFEL1Y6mVHuAm6TjQTUiZr_0mp7Xz_a82307x-SF3I3rMEBGgIkBLb3qpjs27PfOHGge2R3Y7lv_xHBQU7hEI12bIxHICPIAD1Xj9UIWsZClWlNxko9lpXCqgC6Mj-BWxYuo5bRHhLRuswOu_rFlVntbYRC4BIYWBCk_qtWg23Gyw9GD8I92utHdHa3_I1_Q", // 1시간 짜리 임시토큰

);

function post($url, $fields)

{

    $post_field_string = http_build_query($fields, '', '&');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);

    curl_setopt($ch, CURLOPT_POST, true);

    $response = curl_exec($ch);

    curl_close ($ch);

    return $response;

}



// post함수 호출

$result = post($url, $post_data);
$recv = json_decode($result , true);


echo "<br>=======<br>";

echo print_r($recv);

// 장기 엑세스 코드 (아래 주소로 접속하면 장기 접속 코드 생성)
//"https://graph.instagram.com/access_token
//  ?grant_type=ig_exchange_token
//  &client_secret={instagram-app-secret}
//  &access_token={short-lived-access-token}"
?>