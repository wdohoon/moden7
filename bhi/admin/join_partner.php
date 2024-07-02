<?php



include_once	"../lib/db.class.php";

$partner1 = $_POST['partner1'];
$partner = $_POST['partner'];
$pfee = $_POST['pfee'];
$no = $_POST['no'];
$type = $_POST['type'];

$DB_LP = new DBCLASS;

if ( $pfee == NULL )
	$pfee = 0;

$ret = 0;

$qry2 = "select * from partner1 where uid = '$partner';";
$DB_LP->select($qry2);
$row = $DB_LP->get_data();
if ( $row ) $ret = 1;


$qry2 = "select * from partner2 where uid = '$partner';";
$DB_LP->select($qry2);
$row = $DB_LP->get_data();
if ( $row ) $ret = 1;

$qry2 = "select * from shop where shopid = '$partner';";
$DB_LP->select($qry2);
$row = $DB_LP->get_data();
if ( $row ) $ret = 1;

if ( $ret == 0 )
{



	$qry2 = "select * from user_info where email = '$partner';";
	$DB_LP->select($qry2);
	$row = $DB_LP->get_data();
	$no = $row->no;

	if ( $row )
	{	

		if ( $type == 3 )
		{
			$qry2 = "select * from partner2 where uid = '$partner1';";
			$DB_LP->select($qry2);
			$row = $DB_LP->get_data();
			$p2_fee = $row->fee;
			$part1 = $row->rid;

			$qry2 = "select * from partner1 where uid = '$part1';";
			$DB_LP->select($qry2);
			$row = $DB_LP->get_data();
			$p1_fee = $row->fee;
				
			if ( $p1_fee > $pfee )
			{
				$ret = 4;
			}
			else
			{

				$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$apikey = "B";
				$var_size = strlen($chars);
				echo "Random string ="; 
				for( $x = 0; $x < 11; $x++ ) {  
					$random_str= $chars[ rand( 0, $var_size - 1 ) ];  
					$apikey = $apikey.$random_str;
					echo $random_str;  
				}

				$rdate = date( 'Y-m-d h:i:s');
				$qry2 = "insert into shop values ( '$no','$rdate','$partner1','$partner','$pfee','1', '$apikey');";
				$DB_LP->select($qry2);
			}
		}
		else if ( $type == 2 )
		{
			$no = $row->no;

			$qry2 = "select * from partner1 where uid = '$partner1';";
			$DB_LP->select($qry2);
			$row = $DB_LP->get_data();
			$p1_fee = $row->fee;
			
			if ( $p1_fee < $pfee )
			{
				$ret = 3;
			}
			else
			{
				$rdate = date( 'Y-m-d h:i:s');
				$qry2 = "insert into partner2 values ( '$no','$rdate','$partner1','$partner','$pfee','1');";
				$DB_LP->select($qry2);
			}
		} 
		else 	if ( $type == 1 )
		{
			$no = $row->no;
			$rdate = date( 'Y-m-d h:i:s');
			$qry2 = "insert into partner1 values ( '$no','$rdate','$partner','$pfee','1');";
			$DB_LP->select($qry2);
		}



		echo $qry2;
		
	}
	else
		$ret = 1;

}

$DB_LP->close();

if ( $type == 1 )
{
	if ( $ret == 3 )
		header('Location: https://bit-dex.io/adm/addpartner.html?type=1&ret=3');
	else if ( $ret == 1 )
		header('Location: https://bit-dex.io/adm/addpartner.html?type=1&ret=1');
	else
		header('Location: https://bit-dex.io/adm/addpartner.html?type=1&ret=2');

}


if ( $type == 2 )
{
	if ( $ret == 3 )
		header('Location: https://bit-dex.io/adm/addpartner.html?type=2&ret=3');
	else if ( $ret == 1 )
		header('Location: https://bit-dex.io/adm/addpartner.html?type=2&ret=1');
	else
		header('Location: https://bit-dex.io/adm/addpartner.html?type=2&ret=2');

}


if ( $type == 3 )
{
	if ( $ret == 4 )
		header('Location: https://bit-dex.io/adm/addpartner.html?type=3&ret=4');
	else if ( $ret == 3 )
		header('Location: https://bit-dex.io/adm/addpartner.html?type=3&ret=3');
	else if ( $ret == 1 )
		header('Location: https://bit-dex.io/adm/addpartner.html?type=3&ret=1');
	else
		header('Location: https://bit-dex.io/adm/addpartner.html?type=3&ret=2');

}

?>