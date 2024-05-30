<?php
include './common/commonPage/_header.php';

$pageID								  =	allTags($_REQUEST['p']);
$mailAddr							  =	allTags($_REQUEST['i']);

$success							  =	$common['BoardManager']->setNewsLetterRequestAuthProc($pageID, $mailAddr);

$goURL								  =	'https://' . $common['wwwURL'];
if($_REQUEST['h'] == 'repot') $goURL  =	'http://ilooda-repotlaser.triupcorp.com';


$common['CommonManager']->goPage($goURL, $msg = '이메일이 인증되었습니다.', 'frame');

include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>