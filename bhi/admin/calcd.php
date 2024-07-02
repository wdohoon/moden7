
<?php
include_once	"../lib/db.class.php";
include_once	"../lib/db.class2.php";

$DB_LP = new DBCLASS;
$DB_LP2 = new DBCLASS2;

$rdate = date('Y-m-d');



$qry = "select * from bd_config;";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$dfr = $row->d_fee_rate;
$dfp = $row->d_fee_per;
$wfp = $row->w_fee_per;
$usdcg = $row->USD_P;
$transfer_fee = $row->transfer_fee;


$qry = "select * from adm_buylog where confirm = '1' and coin_fee > 0;";
$DB_LP->select($qry);

$total_d = 0;
$total_dfr = 0;
$total_dfp = 0;
$total_hp = 0;
$total_part = 0;


$tdc = 0;
$twc = 0;

while ($row = $DB_LP->get_data())
{
	$tdc++;
	$shopid = $row->referral;

	$qry2 = "select * from shop where shopid = '$shopid';";
	$DB_LP2->select($qry2);
	$row2 = $DB_LP2->get_data();
	$part2 = $row2->uid;
	$shop_fee1 = $row2->fee;
	$dfr = $shop_fee1;

	echo "<br>".$qry2;


	$qry2 = "select * from partner2 where uid = '$part2';";
	$DB_LP2->select($qry2);
	$row2 = $DB_LP2->get_data();
	$part1 = $row2->rid;
	$p2_fee = $row2->fee;

	echo "<br>".$qry2;

	$qry2 = "select * from partner1 where uid = '$part1';";
	$DB_LP2->select($qry2);
	$row2 = $DB_LP2->get_data();
	$p1_fee = $row2->fee;

	echo "<br>".$qry2;

	$total_d = $total_d + $row->deposit;
	$total_dfr = $total_dfr + $row->fee  - $dfp;
	$total_part = $total_part + $row->deposit * $p1_fee * 0.01;
	$total_hp = $total_hp + ($row->fee - $row->deposit * $p1_fee * 0.01) - $dfp;

	$total_dfp = $total_dfp + $dfp;
	

	$qry2 = "select * from p_total_c where rdate = '$rdate' and uid = '$part1';";
	$DB_LP2->select($qry2);
	$row2 = $DB_LP2->get_data();

	$p1_fee_t = $row->deposit * ( $p1_fee - $p2_fee ) * 0.01;

	$total_d2 = $row->deposit;

	if ( $row2 )
	{
		$qry = "UPDATE p_total_c SET t_d = t_d + $total_d2, t_fee = t_fee + $p1_fee_t where rdate = '$rdate' and uid = '$part1';";
		$DB_LP2->select($qry);
		echo "<br>". "<br>";
		echo "<br>".$qry;
		echo "<br>". "<br>";

		$p1_fee_c = $p1_fee_t / $usdcg;

		$qry = "UPDATE user_info SET GOTG = GOTG + '$p1_fee_c' where email = '$part1';";
		$DB_LP2->select($qry);

	}
	else
	{

		$qry = "INSERT INTO p_total_c  VALUES ('0','$rdate','$part1','$total_d2', '$p1_fee', '$p1_fee_t','1');";
		$DB_LP2->select($qry);

		echo "<br>".$qry;

		$p1_fee_c = $p1_fee_t / $usdcg;
		$qry = "UPDATE user_info SET GOTG = GOTG + '$p1_fee_c' where email = '$part1';";
		$DB_LP2->select($qry);


	}

	$qry2 = "select * from p_total_c where rdate = '$rdate' and uid = '$part2';";
	$DB_LP2->select($qry2);
	$row2 = $DB_LP2->get_data();

	$p2_fee_t = $row->deposit * ( $p2_fee )* 0.01;

	if ( $row2 )
	{
		$qry = "UPDATE p_total_c SET t_d = t_d + $total_d2, t_fee = t_fee + $p2_fee_t where rdate = '$rdate' and uid = '$part2';";
		$DB_LP2->select($qry);
		echo "<br>". "<br>";
		echo "<br>".$qry;
		echo "<br>". "<br>";

		$p2_fee_c = $p2_fee_t / $usdcg;

		$qry = "UPDATE user_info SET GOTG = GOTG + '$p2_fee_c' where email = '$part2';";
		$DB_LP2->select($qry);

		

	}
	else
	{

		$qry = "INSERT INTO p_total_c  VALUES ('0','$rdate','$part2','$total_d2', '$p2_fee','$p2_fee_t','$part1');";
		$DB_LP2->select($qry);

		echo "<br>".$qry;

		$p2_fee_c = $p2_fee_t / $usdcg;

		$qry = "UPDATE user_info SET GOTG = GOTG + '$p2_fee_c' where email = '$part2';";
		$DB_LP2->select($qry);


	}


}




echo "<br>".$qry;

$qry = "select * from adm_selllog where confirm = '1';";
$DB_LP->select($qry);

$total_s = 0;
$total_tf = 0;
$total_wfp = 0;


while ($row = $DB_LP->get_data())
{
	$twc++;
	$total_s = $total_s + $row->amount;
	$total_tf = $total_tf + $row->amount * $transfer_fee;

	$total_wfp = $total_wfp + $wfp;
}

echo "<br>".$qry;

$qry = "update adm_buylog set confirm ='2';";
$DB_LP->select($qry);

$qry = "update adm_selllog set confirm ='2';";
$DB_LP->select($qry);



$qry = "select * from ho_total_c where rdate = '$rdate';";
$DB_LP->select($qry);

$row = $DB_LP->get_data();

if ( $row )
{

}
else
{
	$qry = "INSERT INTO ho_total_c VALUES ('0','$rdate','0','0','0','0','0','0','0','0','0','0')";
	$DB_LP->select($qry);
	
	echo "<br>".$qry;
}

$qry = "UPDATE `ho_total_c` SET t_d_c = t_d_c + $tdc,t_w_c = t_w_c + $twc,  total_deposit = total_deposit + $total_d, total_fee = total_fee + $total_dfr, h_fee = h_fee + $total_hp, p_fee = p_fee + $total_part, n_fee = n_fee + $total_dfp, total_withdraw = total_withdraw + $total_s ,w_fee = w_fee + $total_tf, wn_fee = wn_fee + $total_wfp where rdate = '$rdate';";

$DB_LP->select($qry);

echo "<br>".$qry;

$qry = "select * from user_info where email = 'jangkun1202@nate.com';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
//$j_Gotg = $row->GOTG + (($total_hp + $total_dfp) / $usdcg);
$j_Gotg = $row->GOTG + (($total_hp ) / $usdcg);

$qry = "UPDATE user_info SET GOTG = $j_Gotg where email = 'jangkun1202@nate.com';";
$DB_LP->select($qry);

$qry = "UPDATE user_info SET GOTG = GOTG + ($total_dfp / $usdcg) where email = 'jangkun1203@nate.com';";
$DB_LP->select($qry);



$DB_LP2->close();
$DB_LP->close();


?>
