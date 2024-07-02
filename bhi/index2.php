<?php
include_once "./phpqrcode/qrlib.php";
//include 'inc_head.php';
include_once	"./lib/db.class.php";

//if ( !$jb_login )
//	header('Location: ./login.php');




include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

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


$qry = "select * from fxinfo;";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$buyPrice = $row->cashbuyPrice / 2;
$chagnePrice = $row->changePrice;
$sellPrice = $row->cashsellPrice / 2;




$qry = "select * from wallet where no = '$no';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$ethaddr = $row->ETH;


require_once './vendor/autoload.php';
use BlockSDK;

//$blockSDK = new BlockSDK("iHPg89hfHnJXG7noHiddBpMqHZvh2Lp6NjvTT49h");
$blockSDK = new BlockSDK("Iy5ZL1qnTEKX2OCITNMlBI2USFrMJC8SoJdEd8X2");

$ethClient = $blockSDK->createEthereum();

$addressBalance = $ethClient->getAddressBalance([
    "address" => $ethaddr
]);
$ETH = $addressBalance['payload']['balance'];


$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0x32EaEbAA73a6554588157d7d9d96A51813CbA64D",
    "from" => $ethaddr
]);

$OKNA = $erc20['payload']['balance'];

$OKNA = $member['mb_13'];

//echo "OKNA : ".$OKNA;

$erc20 = $ethClient->getErc20Balance([
    "contract_address" => "0xdAC17F958D2ee523a2206206994597C13D831ec7",
    "from" => $ethaddr
]);

$USDT = $erc20['payload']['balance'];

$total_usd = $OKNA * $OKNAP + $ETHP * $ETH + $USDT * $USDTP;

//echo " - ".$total_usd;

$qry = "update g5_member set mb_point = '$total_usd' where mb_no = '$no';";
$DB_LP->select($qry);

$qry = "update wallet set ETHN = '$ETH', OKNAN = '$OKNA', USDTN = '$USDT' where no = '$no';";
$DB_LP->select($qry);


$qry = "select * from miner where no = '$no';";
$cnt = $DB_LP->select($qry);
$row = $DB_LP->get_data();
$mine_okna = $row->okna;
$s_point = $row->s_point;
$b_point = $row->b_point;
$l_point = $row->c_point;

$OKNA2 = $OKNA + $b_point + $c_point + $l_point - $mine_okna;

$total_usd = $OKNA2 * $OKNAP + $ETHP * $ETH + $USDT * $USDTP;

if(!$member['mb_10'] && $member['mb_id'] ){


	$linkurl  = "http://bhidex.com/bbs/register_form.php?ref=".$member['mb_9'];

	$filePath = "./qr/".$member['mb_9'].".png";

	if(!file_exists($filePath)) 
	{
		QRcode::png($linkurl, $filePath);
	} 

}


$DB_LP->close();

?>

<div class="main">
<!-- 상단 시작 { -->
	<div class="head">

		<h1><a href="/"><img src="/img/common/main_logo.png" alt="OIKONOMIA WALLET"></a></h1>
		<div>
			<!-- <?php if($is_admin) { ?><a href="/adm/" style="color:red;" target="_blank">ADMIN</a><?php } ?> -->
			<?php if($is_member) { ?>
			<!---	<a href="<?php echo G5_BBS_URL ?>/logout.php" style="color:red;">LOGOUT       </a> --->
				<a href="<?php echo G5_URL ?>/mypage.php"><img src="/img/common/ico_main_me.svg"></a>
				<!-- <li><a href="/mypage.php">MYPAGE</a></li> -->
			<?php } else { ?>
				
				<a href="<?php echo G5_URL ?>/mypage.php"><img src="/img/common/ico_sub_me.svg"></a>
				<!-- <a href="<?php echo G5_BBS_URL ?>/register.php" style="color:white;">JOIN</a> -->
			<?php } ?>
		</div>
	</div>
<!-- } 상단 끝 -->

<div class="inner">
	<div class="my">
		<div class="name-box">
			<div class="name"><?php echo $member['mb_name']?>님의 스테이킹 투입가능 자산 <a href="#" onClick="top.location='javascript:location.reload()'"><img src="/img/common/ico_refresh.svg"></a></div>
			<div class="btns"><a href="#"></a></div>
		</div>
		<div class="value">
			<strong><?php echo number_format($total_usd, 4);?></strong>
			<small>USD</small><br>
			<small><?php echo "≒ ".number_format($total_usd * $buyPrice * 2,1). " 원 "; ?></small>
		</div>
		<div class="send-rcv">
			<a href="/my_send.php">보내기</a>
			<a href="/receive.php">받기</a>
		</div>
	</div>
	
	<div class="main-btns">
		<a href="/my_wallet.php">
			<i><img src="/img/common/ico_home_btn1.svg"></i>
			<p>내 지갑</p>
		</a>
		<a href="/mi_screen.php">
			<i><img src="/img/common/ico_home_btn2.svg"></i>
			<p>스테이킹</p>
		</a>
		<a href="/my_network.php">
			<i><img src="/img/common/ico_home_btn3.svg"></i>
			<p>네트워크</p>
		</a>
	</div>
	<div class="latest">
		<h3>공지사항 <img src="/img/common/ico_home_news.svg"></h3>				
		<ul>
			<?php 
				$sql = ' select * from g5_write_notice order by wr_id desc limit 0,2 ';
				$result = sql_query($sql);
				$row = sql_fetch($sql);
				$total = sql_num_rows($result);

				for($i = 0 ; $nt = sql_fetch_array($result) ; $i++) {
					
				?>		
					<li><a href="<?php echo get_pretty_url('notice');?>"><?php echo $nt['wr_subject']; ?></a></li>
			<?php } ?>
		</ul>
	</div>

	<?php 
	$bannerimg= sql_query("select * from g5_write_banner1 order by wr_id asc");
	
	$bannersql = sql_num_rows($bannerimg);
	?>
	
	<div class="banner">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php if($bannersql>0){
					for($i=0;$row=sql_fetch_array($bannerimg);$i++){
						$imgsrc="";
						$imgsrc = sql_fetch("select bf_file from g5_board_file where bo_table='banner1' and  wr_id='".$row['wr_id']."' and bf_no='0'");
						
						
						

				?>
				<div class="swiper-slide">
					<a href="<?php echo $row['wr_link1']?>">
<!---						<img src="/data/file/banner1/<?php echo $imgsrc['bf_file']?>">  -->

							<img src="https://m.verygoodtour.com/Images/2013/Mypage/c_shinhan.png">
					</a>
				</div>
				<?php }}?>	

			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
	<div class="bn-box">
		<!-- <a href="<?php echo get_pretty_url('mission');?>">-->
		<a href="http://nftpic.co.kr/#/home" onfocus="this.blur()" target = "_blank">
		<img src="/img/common/bn1.png"><p><strong>BHI 구매 ( <?php echo $buyPrice."원/BHI"; ?> ) <br>		</strong></p></a>
		<a href="<?php echo G5_URL ?>/sellwonia.php" onfocus="this.blur()"><img src="/img/common/bn2.png"><p><strong>BHI 판매 ( <?php echo $sellPrice."원/BHI"; ?> )<br></strong></p></a>
	</div>
</div>

</div><!-- main 끝-->


<?php
if(!$member['mb_10'] && $member['mb_id'] ){
	

//$member['mb_10'] 핀번호
?>
<div class="modal" id="modalPin">
	<form action="/bbs/pinupdate.php" method="post" id="pinupdate">
	<input type="hidden" name="mb_id" value="<?php echo $member['mb_id']?>">
	<div class="modal-dialog" style="max-width:800px">
		<div class="modal-content">
			<div class="modal-header">
				<h5>알림</h5>
				<button class="close" data-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<div class="modal-pin">
					<div class="t1">핀 번호 등록</div>
					<div class="t2">* (필수) 원활한 거래를 핀번호 4자리를 등록해 주세요.</div>
					<div class="t3">핀 번호</div>
					<div class="mb10"><input type="text" class="inp small mb10chk1" name="mb_10" style="width:100%" placeholder="4자리 핀번호를 입력해 주세요."></div>
					<div class="t3">핀 번호</div>
					<div class=""><input type="text" class="inp small mb10chk2" style="width:100%" placeholder="4자리 핀번호를 입력해 주세요."></div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn1 block f15" data-dismiss="modal">완료</button>
			</div>
		</div>
	</div>
	</form>
</div>


<script>
	$(".modal-footer .btn1").click(function(){
		var sswi = 0;
		var ss = $(".mb10chk1").val();
		var sss = $(".mb10chk2").val();
		if(!ss || !sss){
			alert('핀번호를 입력해주세요');
			return false;
		}else if(ss!==sss){
			alert('서로 다릅니다');
			return false;
		}else if(ss.length!==4){
			alert('4자리 숫자를 입력해주세요');
			return false;
		}else{
			$("#pinupdate").submit();		
		}

	})
</script>
<?php }?>


<script>
	

	// 배너 슬라이더
	var swiper = new Swiper(".banner .swiper-container", {
		autoplay: {
			delay: 3000,
			disableOnInteraction: false,
			},
		pagination: {
		el: ".banner .swiper-pagination",
			clickable: true,
		}
	});
</script>

<?php
include_once(G5_PATH.'/tail.php');