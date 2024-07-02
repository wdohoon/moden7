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

if ( $ret == 2 )
{
	echo "<script>alert('사용 가능한 잔액보다 더 많은 코인을 채굴 신청 하셨습니다.');</script>";
}

$coin = $_GET['coin'];

$DB_LP = new DBCLASS;

$no = $member['mb_no'];
$name = $member['mb_name'];


$qry = "select * from coinprice;";
$DB_LP->select($qry);

$row = $DB_LP->get_data();
$ETHP = $row->ETH;
$USDTP = 1.02;
$OKNAP = $row->OKNA;


$qry = "select * from wallet where no = '$no';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$ethaddr = $row->ETH;

$qry = "select * from miner where no = '$no';";
$DB_LP->select($qry);

$row = $DB_LP->get_data();

$stake = $row->stake;
$s_okna = $row->okna;

require_once './vendor/autoload.php';
use BlockSDK;

//$blockSDK = new BlockSDK("iHPg89hfHnJXG7noHiddBpMqHZvh2Lp6NjvTT49h");
$blockSDK = new BlockSDK("Iy5ZL1qnTEKX2OCITNMlBI2USFrMJC8SoJdEd8X2");
$ethClient = $blockSDK->createEthereum();
$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0x32EaEbAA73a6554588157d7d9d96A51813CbA64D",
    "from" => $ethaddr
]);


$OKNA = $erc20['payload']['balance'];

$coinn = "BTC";

if ( $coin == NULL )
{
	$coin = "OKNA";
}

if ( $coin == 'ETH' )
{
	$amount = $ETH;
	$total_a = $ETH * $ETHP;
	 $sel = 1;
	 $coinn = "ETH";
}
else if ( $coin == 'USDT' )
{
	$amount = $USDT;
	$total_a = $USDT * $USDTP;
	 $sel = 2;
	 $coinn = "USDT";
}
else if ( $coin == 'OKNA' )
{
	$amount = $OKNA;
	$total_a = $OKNA * $OKNAP;
	$sel = 3;
	$coinn = "BHI";

	$c_amount = $amount - $s_okna;
	$t_amount = $c_amount * $OKNAP;

	$total_s = $s_okna * $OKNAP;


	$qry = "select * from miner where no = '$no';";
	$cnt = $DB_LP->select($qry);
	$row = $DB_LP->get_data();
	$mine_okna = $row->okna;
	$s_point = $row->s_point;
	$b_point = $row->b_point;
	$l_point = $row->c_point;

	$OKNA2 = $OKNA + $b_point + $c_point + $l_point - $mine_okna;

	
	$t_amount = $OKNA2 * $OKNAP;
	$c_amount = $OKNA2;
}


$DB_LP->close();
?>
	
	
<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2>채굴</h2>
</header>
	
	
	<div class="mining">
		<div class="section">
			<div class="mine">
				<div class="use-price">사용 가능잔액</div>
				<div class="price"><?php echo number_format($c_amount, 4 ); ?> <?php echo $coinn; ?></div>
				<div class="price2"> <?php echo number_format($t_amount, 4 ); ?> USD</div>
			</div>
			
		</div>
		<!---
		<div class="section">
			<div class="box1">
				<strong id="Kind">채굴에 추가하실 자산을 선택해 주세요.</strong>
				<button class="btn1">선택</button>
				<select class="select">
					<option>BTC</option>
					<option>ETH</option>
					<option>OKNA</option>
					<option>USDT</option>
				</select>
			</div>
		</div>
		---->
		<div class="section">
			<div class="count-box">
				<input type="text" id = "amount" name = "amount" class="inp1 text-right" placeholder="추가하실 수량을 입력해 주세요." style="width:100%;" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
			</div>
		</div>
		
		<div class="section">
			<div class="bank-status">
				<dl>
					<dt>기존 잔고 : </dt>
					<dd><?php echo number_format($total_s, 4 );?> USD</dd>
				</dl>
<!--				<dl>
					<dt>추가 예정 : </dt>
					<dd>999,999.0000 USD</dd>
				</dl>
				<dl>
					<dt>추가 후 잔고 : </dt>
					<dd>999,999.0000 USD</dd>
				</dl>  -->
			</div>
		</div>
		
		<button class="btn3 btn-s block miningaddgo">채굴하기</button>
		

	</div>
	
	
	<div class="modal" id="modalAlert">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>알림</h5>
					<button class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="modal-logout">
						<strong>추가 하시겠습니까?</strong>
						<p class="txt2">추가하시려는 자산과 금액이 확실하신지 확인해 주세요.</p>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn1 block btn-s" data-dismiss="modal">예</button>
					<button class="btn2 block btn-s" data-dismiss="modal">취소</button>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<script>
	$(".miningaddgo").click(function(){
		
		if(!$("#amount").val() || $("#amount").val()==0 || $("#amount").val()=='0'){
			alert("수량을 입력해주세요");
			return false;
		}
		
		
        var priceval = $("#amount").val();
		
		if(priceval.search(/[^0-9]$/)!=-1){
			alert("숫자만 입력해주세요");
			return false;
		}
		
		$('#modalAlert').modal();
	})
	$(".modal-footer .btn1").click(function(){
		
		const amount = document.getElementById('amount').value;
		var coin = '<?php echo $coinn;?>';
		var url = "/mine_result.php?amount=" + amount + "&coin=" + coin;
		location.href=url;
	})
	//$('#modalAlert').modal();
		
	$('.box1 .select').change(function(){
		$('#Kind').text($(this).val());
		$('#Kind').addClass('active');
	})
	</script>
	
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>