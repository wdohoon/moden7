<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

include_once	"./lib/db.class.php";

$DB_LP = new DBCLASS;



$qry = "select * from coinprice;";
$DB_LP->select($qry);

$row = $DB_LP->get_data();
$ETHP = $row->ETH;
$USDTP = 1.02;
$OKNAP = $row->OKNA;


//echo "select * from g5_member where mb_recommend=".$member['mb_9'];

$recommend = sql_query("select * from g5_member where mb_recommend='".$member['mb_9']."'");
$mynum = sql_num_rows($recommend);
$totalj = 0;
$data = array();
if($mynum>0){
	for($i=0;$row=sql_fetch_array($recommend);$i++)
	{


		$data[$i]['mb_name'] = $row['mb_name'];
		$data[$i]['mb_id'] = $row['mb_id'];
//		$data[$i]['mb_point'] = $row['mb_point'];
//		$totalj = $totalj+$row['mb_point'];


		$mno = $row['mb_no'];

		$qry = "select * from miner where no = '$mno';";
		$cnt = $DB_LP->select($qry);
		$row2 = $DB_LP->get_data();
		$mine_okna = $row2->okna;

		$data[$i]['mb_point'] = $mine_okna * $OKNAP;
		$totalj = $totalj+$mine_okna * $OKNAP;


	}

}
$recommend_list = sql_query("select * from g5_member where mb_recommend='".$member['mb_9']."'");
$mynum_list = sql_num_rows($recommend_list);

$DB_LP->close();
?>
	
<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2>나의 네트워크</h2>
</header>
	
	
	<div class="network">
		<div class="list2">
			<div class="mine">
				<dl>
					<dt>총 <?php echo $mynum;?>명</dt>
					<dd>총 자산 <?php echo number_format($totalj);?> $</dd>
				</dl>
			</div>
			<div class="body">
				
				<ul>
					<?php
					 if($mynum>0){
						for($i=0;$i<$mynum;$i++){

		
					?>
					<li>
						<div class="box">
							<div class="info">
								<p class="lang"><img src="img/common/ico_kr.png"></p>
								<dl>
									<dt><?php echo $data[$i]['mb_name']?></dt>
									<dd><?php echo substr($data[$i]['mb_id'],0,3)?>****<?php echo substr($data[$i]['mb_id'],7,4)?></dd>
								</dl>
							</div>
							<div class="val"><?php echo $data[$i]['mb_point']=='0'?'0':number_format($data[$i]['mb_point'])?> $</div>
						</div>
					</li>
					<?php						
						}
					}else{
					?>
					<li>
						<div class="box" style="display:block">
							<div style="text-align:center;line-height:50px;">데이터가 없습니다.</div>
						</div>
					</li>



					<?php }?>
					
				</ul>
			</div>
		</div>
	</div>
	
	
	
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>