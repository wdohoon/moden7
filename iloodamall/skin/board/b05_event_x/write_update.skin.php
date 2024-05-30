<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once(G5_LIB_PATH.'/mailer.lib.php');

$sql = " update $write_table
		set wr_11    = '".$_POST['wr_11']."',
			wr_12    = '".$_POST['wr_12']."',
			wr_13    = '".$_POST['wr_13']."',
			wr_14    = '".$_POST['wr_14']."',
			wr_15    = '".$_POST['wr_15']."',
			wr_16    = '".$_POST['wr_16']."',
			wr_17    = '".$_POST['wr_17']."',
			wr_18    = '".$_POST['wr_18']."',
			wr_19    = '".$_POST['wr_19']."'
		where wr_id = ".$wr_id." ";
sql_query($sql);


//alert('Thank you for applying.',G5_URL);
//alert('등록이 완료되었습니다.');

?>