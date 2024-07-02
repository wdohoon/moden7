<?php
$sub_menu = "300001";
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check_menu($auth, $sub_menu, 'r');

$g5['title'] = '배너설정';
include_once ('./admin.head.php');
?>



123


<?php
include_once ('./admin.tail.php');