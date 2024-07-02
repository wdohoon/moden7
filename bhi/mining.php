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

$ret = $_GET['ret'];

if ( $ret == 1 )
{
	echo "<script>alert('스테이킹 자산이 성공적으로 추가 되었습니다.');</script>";
}

$DB_LP = new DBCLASS;

$no = $member['mb_no'];
$name = $member['mb_name'];


$qry = "select * from coinprice;";
$DB_LP->select($qry);

$row = $DB_LP->get_data();
$ETHP = $row->ETH;
$USDTP = 1.02;
$OKNAP = $row->OKNA;
$OKNAP = 0.6;


$qry = "select * from miner where no = '$no';";
$DB_LP->select($qry);

$row = $DB_LP->get_data();

$stake = $row->stake * $OKNAP;
$c_point = $row->c_point;

$s_point = $row->s_point;
$b_point = $row->b_point;
$l_point = $row->l_point;

$sum_p = $s_point + $b_point + $l_point + $c_point;



$a_bonus = $row->a_bonus;
$sdate = $row->sdate;

$text = "0%";

if ( $stake > 0 )
{
	$text = $c_point / ($stake * 2) * 100;	
	$text = $text."%";
}

$s_p = $stake * 1.2 / 365;

$recommend = sql_query("select * from g5_member where mb_recommend='".$member['mb_9']."'");
$mynum = sql_num_rows($recommend);
$totalj = 0;
$data = array();
if($mynum>0){
	for($i=0;$row=sql_fetch_array($recommend);$i++)
	{

		$mno = $row['mb_no'];

		$qry = "select * from miner where no = '$mno';";
		$cnt = $DB_LP->select($qry);
		$row2 = $DB_LP->get_data();
		$mine_okna = $row2->okna;
		$stake2 = $row2->stake * $OKNAP;

		$s_p2 = $stake2 * 1.2 / 365;


		$b_p = $b_p+$s_p2;


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
	<h2>스테이킹</h2>
</header>
	
	
	<div class="mining">
		<div class="section">
			<div class="mine">
				<div class="my-mine"><img src="/img/common/ico_user.svg"> <strong><?php echo $name;?></strong> 님의 현재 스테이킹 자산</div>
			<!--	<div class="price">$ <?php echo number_format($c_point * $OKNAP, 4 );?></div> -->
				<div class="price">$ <?php echo number_format($stake, 4 );?></div>
			</div>
			
			<hr class="hr2">
			
			<div class="acc-mining">
				<div class="flex mb15">
					<div class="tit">누적 스테이킹</div>
					<div class="price">$ <?php echo number_format($sum_p *$OKNAP, 4 );?> / <?php echo number_format($stake * 2, 4 );?> </div>
				</div>
				<div class="progress">
					<em style="width:<?php echo $text;?>"></em>
				</div>
			</div>
			
			<hr class="hr2">
			
			<div class="reword">
				<div class="tit mb5">리워드</div>
				<dl>
					<dt>믿음 리워드 :</dt>
					<dd> $ <?php echo number_format($s_p, 4 );?> (일)</dd>					
				</dl>
				<dl>
					<dt>소망 리워드 :</dt>
					<dd> $ <?php echo number_format($b_p , 4 );?> (일)</dd>					
				</dl>
				<dl>
					<dt>사랑 리워드 :</dt>
					<dd> $ <?php echo number_format($l_point* $OKNAP, 4 );?> (일)</dd>					
				</dl>
				<dl class="total">
					<dt>총 리워드 (일)</dt>
					<dd>$ <?php echo number_format($s_p + $b_p, 4 );?> (일)</dd>					
				</dl>
			</div>
			
			<hr class="hr2">
			
			<div class="flex type2">
				<div class="tit">활동보너스</div>
				<div class="txt"><?php echo number_format($a_bonus, 4 );?> Pts</div>
			</div>
			
			<hr class="hr2">
			
			<div class="flex type2">
				<div class="tit">시작 (갱신일) :</div>
				<div class="txt"><?php echo $sdate;?></div>
			</div>
			<hr class="hr2">
			
			<div class="desc1">* 스테이킹된 자산은 익일 08시 (GMT +9)에 일괄 지급됩니다.</div>
		
			<div class="section">
				<div class="box1">
					<strong id="Kind">스테이킹에 추가하실 자산을 선택해 주세요.</strong>
					<button class="btn1">선택</button>
					<select class="select">
						<option value = "BTC">BTC</option>
						<option value = "ETH">ETH</option>
						<option value = "BHI" selected>BHI</option>
						<option value = "USDT">USDT</option>
					</select>
				</div>
			</div>
			
			<div class="btns">
				<button onclick="location.href='/mining_add.php'" class="btn1 block btn-s mb15">스테이킹 자산 추가하기</button>
				<button class="btn3 block btn-s">해지하기</button>
			</div>
			
		</div>
		
		<div class="list-btns mb50">
			<a href="/my_network.php">나의 네트워크</a>
			<a href="/my_reward.php">내 리워드 지급내역</a>
		</div>


	</div>
	
	
	
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>