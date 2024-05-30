<?php
include_once('./_common.php');

//그냥 페이지 접속했을떄 막게끔 코드추갇해야됌
if (isset($_SESSION['ss_mb_reg']))
    $mb = get_member($_SESSION['ss_mb_reg']);

// 회원정보가 없다면 초기 페이지로 이동
$id = $_GET['id'];

if($id){
	$mb = get_member($id);
}
$sql_survey = "select * from g5_survey where mb_id = '$id'";
$row_survey = sql_fetch($sql_survey);
if($row_survey){
	alert('이미 설문조사를 한 이력이 있습니다.');
}
//echo $sql_survey;
//print_r2($mb);
//exit;
if (!$mb['mb_id']){
	alert('설문조사는 회원가입 단계에서만 참여하실 수 있습니다.');
	//goto_url(G5_URL);
}
    

$g5['title'] = '설문조사';
$survey_action_url = G5_HTTPS_BBS_URL.'/survey_update.php';
include_once('./_head.php');
include_once($member_skin_path.'/survey.skin.php');
include_once('./_tail.php');

