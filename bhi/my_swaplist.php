
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


$no = $member['mb_no'];



$qry = "select * from swaplog where no = '$no' ORDER BY `rdate` DESC;";
$DB_LP->select($qry);

$data = array();

$idx = 0;
while( $row = $DB_LP->get_data() )
{
	$data[$idx]['rdate'] = $row->rdate;

	$data[$idx]['type'] = "<font color = 'red'>교환</font>";

	$data[$idx]['coin'] = $row->scoin."<->".$row->ocoin;
	$data[$idx]['amount'] = $row->amount;
	$data[$idx]['amountp'] = $row->amount;
	$idx++;
}


//print_r( $data );



$DB_LP->close();
?>

<!doctype html>
<html> 
<head>
<meta charset="utf-8">
<title>BHIDEX</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="css/front.css">
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/plugin/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/front.js"></script>

</head>
<body>
	
	<header>
		<div class="left">
			<a href="javascript:history.back();" class="prev"></a>
		</div>
		<h2>나의 교환내역</h2>
	</header>
	
	
	<div class="pay border1">
		<div class="filter-btns">
			<button class="btn-filter">전체 / 최신순</button> 
		</div>
		<div class="head">교환내역</div>
		<div class="list">
			<ul>
				<?php 
					for ( $i = 0; $i < $idx; $i++ )
					{
				?>
				<li>
					<div class="box">
						<dl>
							<dt><strong><?php echo $data[$i]['type'];?></strong></dt>
							<dd><?php echo  number_format( $data[$i]['amount'], 4 )." ".$data[$i]['coin'];?> </dd>
						</dl>
						<dl class="date">
							<dt><?php echo $data[$i]['rdate'];?> </dt>
							<dd>= <?php echo  number_format( $data[$i]['amountp'], 4 );?> USD</dd>
						</dl>
					</div>
				</li>

				<?php
					}
				?>
			</ul>
		</div>
	</div>
	
	<div class="bg-filter"></div>
	<div class="layer-fliter">
		<div class="head">
			<h3>필터</h3>
			<button class="btn-close"></button>
		</div>
		<div class="body">
			<h4>거래유형</h4>
			<div class="btns">
				<label><input type="radio" class="radio-txt2" name="ra1" checked><span>전체</span></label>
				<label><input type="radio" class="radio-txt2" name="ra1"><span>믿음</span></label>
				<label><input type="radio" class="radio-txt2" name="ra1"><span>소망</span></label>
				<label><input type="radio" class="radio-txt2" name="ra1"><span>사랑</span></label>
			</div>
			<h4>지급시간</h4>
			<div class="btns">
				<label><input type="radio" class="radio-txt2" name="ra2" checked><span>최신순</span></label>
				<label><input type="radio" class="radio-txt2" name="ra2"><span>과거순</span></label>
			</div>
			<div class="btn-box">
				<button class="btn1">확인</button>
			</div>
		</div>
	</div>
	<script>
/*
	$('.filter-btns .btn-filter').click(function(){
		$('.bg-filter').fadeIn(300);
		$('.layer-fliter').fadeIn(300);
	});
	$('.layer-fliter .btn-close, .bg-filter').click(function(){
		$('.bg-filter').fadeOut(300);
		$('.layer-fliter').fadeOut(300);
 	}); */
	</script>
	
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>
	
	
</body>
</html>
