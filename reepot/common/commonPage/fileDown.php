<?php
if (!$_GET['downFile'] || !$_GET['fileName']) {
	echo '<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">';
	echo '잘못된 접근입니다.';
	exit;
}

include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/FileManager.class.php';

$common['FileManager']			=	new FileManager();

$downFilePath					=	$_GET['downFile'];
$downFileName					=	$_GET['fileName'];
//echo $downFilePath.'<br>';
//echo $downFileName.'<br>';
$common['FileManager']->fileDownload($downFilePath, $downFileName);
//echo $common['FileManager'];
?>