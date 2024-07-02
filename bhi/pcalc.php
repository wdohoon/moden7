<?php
/*include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
*/

include_once	"./lib/db.class.php";
include_once	"./lib/db.class2.php";

$passwd = $_GET['passwd'];

$rdate = date( 'Y-m-d H:i:s' );
//if ( $passwd == 'cjswowns' )
{
	
	$DB_LP = new DBCLASS;
	$DB_LP2 = new DBCLASS2;

	$qry = "select * from miner;";
	$DB_LP->select($qry);

	while( $row = $DB_LP->get_data() )
	{
		$stake = $row->stake;
		$cp = $row->c_point;
		$bp = $row->b_point;

		$max_cp = $stake * 2;
		$no = $row->no;
		$coin = "OKNA";

		if ( $cp < $max_cp )
		{
			// ¹ÏÀ½
//			$b_p = $stake * 1.2 / 365;
			$b_p = $stake * 0.6 / 365;

			$qry = "INSERT INTO mine_p_log VALUES ( '0', '$no', '$rdate', '1', '$coin', '$b_p','$no');";
			$cnt = $DB_LP2->select($qry);

			$bp = $bp + $b_p;

			$qry = "UPDATE miner SET b_point = '$bp' where no = '$no';";		
			$DB_LP2->select($qry);

			// ¼Ò¸Á
			$qry = "select * from g5_member where mb_no = '$no';";
			$DB_LP2->select($qry);
			$row2 = $DB_LP2->get_data();
			$mb_ret = $row2->mb_recommend;
			
			echo $qry;
						echo "<br>";

			$qry = "select * from g5_member where mb_9 = '$mb_ret';";
			$DB_LP2->select($qry);
			$row2 = $DB_LP2->get_data();
			$rno = $row2->mb_no;

			echo $qry;
						echo "<br>";

			$qry = "select * from miner where no = '$rno';";
			$DB_LP2->select($qry);
			$row2 = $DB_LP2->get_data();
			$cp2 = $row2->c_point;

//			$cp2 = $cp2 + $b_p;
			$cp2 = $cp2 + $b_p / 5.0;


			echo $qry;
			echo "<br>";

			$qry = "INSERT INTO mine_p_log VALUES ( '0', '$rno', '$rdate', '2', '$coin', '$b_p','$rno');";
			$cnt = $DB_LP2->select($qry);

			$qry = "UPDATE miner SET c_point = '$cp2' where no = '$rno';";		
			$DB_LP2->select($qry);

			// ¹ÏÀ½

		}
			
	


	}


}



$DB_LP->close();



?>