<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$id								=	allTags($_POST['id']);

echo json_encode(array('result'=>$common['MemberManager']->chkIDDuplication($id)));
?>