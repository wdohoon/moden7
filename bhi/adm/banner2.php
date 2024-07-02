<?php
$sub_menu = "300002";
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check_menu($auth, $sub_menu, 'r');

$g5['title'] = '쇼핑몰배너설정';
include_once ('./admin.head.php');
?>





<?php
include_once ('./admin.tail.php');