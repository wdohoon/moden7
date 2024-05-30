<?php
include './common/commonPage/_header.php';

foreach($_POST as $key=>$post) $_POST[$key] = allTags($post);

$success						=	$common['BoardManager']->setNewsLetterRequestProc($_POST);
//print_r($success);
//exit();

if ( $success->isResult() ) {
	$nameFrom					=	$common['sendName'];
	$mailFrom					=	$common['sendMail'];
	$mailTo						=	allTags($_POST['mailAddr']);
	$pageID						=	allTags($_POST['pageID']);


	$headers					.=	"From: ". $nameFrom ." <". $mailFrom .">" . "\n";
	$headers					.=	"Return-Path: " . $mailFrom . "\n";
	$headers					.=	"MIME-Version: 1.0" . "\n";
	$headers					.=	"X-Priority: 3" . "\n";
	$headers					.=	"X-MSMail-Priority: Normal" . "\n";
	$headers					.=	"X-Mailer: PHP " . phpversion() . "\n";
	$headers					.=	"Content-Type: text/html; charset=utf-8";

	$subject					=	'이루다 뉴스레터 인증 메일입니다.';
	$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

	//$authFile					=	$_SERVER['DOCUMENT_ROOT'] . '/auth.html';
	//$fp							=	fopen($authFile, 'r') or die("파일을 열 수 없습니다！");
	//$contents					=	fread($fp, filesize($authFile));

	$contents					=	'<!doctype html>';
	$contents					.=	'<html lang="ko">';
	$contents					.=	'<head>';
	$contents					.=	'<meta charset="utf-8">';
	$contents					.=	'<title>이메일 인증 메일</title>';
	$contents					.=	'<style>';
	$contents					.=	'	address {';
	$contents					.=	'		font-style: normal;';
	$contents					.=	'	}';
	$contents					.=	'	address span {';
	$contents					.=	'		display: inline-block;';
	$contents					.=	'		margin-right: 5px;';
	$contents					.=	'	}';
	$contents					.=	'</style>';
	$contents					.=	'</head>';
	$contents					.=	'<body>';
	$contents					.=	'<div style="margin:30px auto; width:600px; border:10px solid #f7f7f7">';
	$contents					.=	'	<div style="border:1px solid #dedede">';
	$contents					.=	'		<h1 style="padding:30px;  background:#f7f7f7; color:#555; font-size:1.4em">이메일 인증 메일입니다.</h1>';
	$contents					.=	'		<div style="padding:30px 30px 50px; min-height:200px;  border-bottom:1px solid #eee">';
	$contents					.=	'			<p>';
	$contents					.=	'				아래의 버튼을 클릭하면 인증이 완료됩니다.<br/>';
	$contents					.=	'			</p>';
	$contents					.=	'			<a href="https://' . $common['wwwURL'] . '/mailAuth.php?p=' . $pageID . '&i=' . $mailTo . '" target="_blank" style="display:block; padding:30px 0; background:#484848; color:#fff; text-decoration:none; text-align:center">이메일 인증</a>';
	$contents					.=	'			<p>';
	$contents					.=	'				성원에 보답하고자 더욱 열심히 하겠습니다.<br/>';
	$contents					.=	'				감사합니다.';
	$contents					.=	'			</p>';
	$contents					.=	'		</div>';
	$contents					.=	'		<footer style="text-align:center; padding:30px; font-size: 0.9em;">';
	$contents					.=	'			<figure><img src="https://' . $common['wwwURL'] . '/assets/img/logo.svg" alt="ilooda"></figure>';
	$contents					.=	'			<address>';
	$contents					.=	'				<span>대표 : 김용한</span>';
	$contents					.=	'				<span>사업자등록번호 : 123-86-07799</span>';
	$contents					.=	'				<span>개인정보관리자 : 이진현</span>';
	$contents					.=	'				<span>대표번호 : 031-278-4660</span>';
	$contents					.=	'				<span>메일 : ilooda@ilooda.com</span>';
	$contents					.=	'				<span>주소 : 경기도 수원시 장안구 장안로458번길 120(이목동)</span>';
	$contents					.=	'			</address>';
	$contents					.=	'		</footer>';
	$contents					.=	'	</div>';
	$contents					.=	'</div>';
	$contents					.=	'</body>';
	$contents					.=	'</html>';
	

	$result						=	mail($mailTo, $subject, $contents, $headers);

	echo 'Y';
} else {
	echo 'N';
}

include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>