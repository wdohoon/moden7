<?php



include_once	"../lib/db.class.php";

$d_fee_rate = $_POST['d_fee_rate'];
$d_fee_per = $_POST['d_fee_per'];
$w_fee_per = $_POST['w_fee_per'];
$transfer_fee = $_POST['transfer_fee'];
$check_p2p = $_POST['check_p2p'];
$check_p2c = $_POST['check_p2c'];
$min_w_money = $_POST['min_w_money'];
$max_w_money = $_POST['max_w_money'];
$min_t_coin = $_POST['min_t_coin'];
$max_t_coin = $_POST['max_t_coin'];


$DB_LP = new DBCLASS;

$qry2 = "UPDATE bd_config SET d_fee_rate = '$d_fee_rate', d_fee_per = '$d_fee_per', w_fee_per = '$w_fee_per', transfer_fee = '$transfer_fee',  check_p2p = '$check_p2p', check_p2c = '$check_p2c', min_w_money = '$min_w_money', max_w_money = '$max_w_money', min_t_coin = '$min_t_coin', max_t_coin = '$max_t_coin';";
$DB_LP->select($qry2);

echo $qry2;

$DB_LP->close();


header('Location: https://bit-dex.io/adm/fee_config.html?ret=1');

?>