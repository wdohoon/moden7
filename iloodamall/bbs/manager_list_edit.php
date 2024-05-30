<?php
include_once('./_common.php');

$manager_id = $_POST['manager_id'];
//echo $manager_id;
$sql = "update g5_member set mb_1 = '',mb_2 = '' where mb_id = '{$manager_id}'";
sql_query($sql);
?>