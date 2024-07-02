<?php
include_once('./_common.php');
if (!$is_member) {
    echo "<script>
            alert('로그인이 필요합니다.');
            window.location.href = '/index.php';
          </script>";
    exit;
}
include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once "./lib/db.class.php";
include_once(G5_PATH.'/head.php');


$ret = $_GET['ret'];

if ($ret == 1) {
    echo "<script>alert('G-POINT 판매가 신청 되었습니다.');</script>";
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

$qry = "select * from miner where no = '$no';";
$DB_LP->select($qry);

$row = $DB_LP->get_data();

$stake = $row->stake * $OKNAP;
$c_point = $row->c_point;

$s_point = $row->s_point;
$b_point = $row->b_point;
$l_point = $row->l_point;

$sum_p = $s_point + $b_point + $l_point + $c_point;

$coinn = "USDT";

$a_bonus = $row->a_bonus;
$sdate = $row->sdate;

$text = "0%";

if ($stake > 0) {
    $text = $c_point / ($stake * 2) * 100;
    $text = $text."%";
}

$s_p = $stake * 1.2 / 365;

$recommend = sql_query("select * from g5_member where mb_recommend='".$member['mb_9']."'");
$mynum = sql_num_rows($recommend);
$totalj = 0;
$data = array();
if($mynum>0){
    for($i=0;$row=sql_fetch_array($recommend);$i++) {

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

$qry = "select * from wallet where no = '$no';";
$DB_LP->select($qry);

$row3 = $DB_LP->get_data();

$ETH = $row3->ETHN;
$OKNA = $row3->OKNAN;
$USDT= $row3->USDTN;

$qry = "select * from cywallet where no = '$no';";
$DB_LP->select($qry);

$row3 = $DB_LP->get_data();

$BTC= $BTC + $row3->BTC;
$ETH = $ETH + $row3->ETH;
$USDT= $USDT + $row3->USDT;
$USDC= $USDC + $row3->USDC;
$XRP= $XRP + $row3->XRP;
$TRX= $TRX + $row3->TRX;
$OKNA = $OKNA + $row3->OKNA;

$qry = "select * from miner where no = '$no';";
$cnt = $DB_LP->select($qry);
$row = $DB_LP->get_data();
$mine_okna = $row->okna;
$s_point = $row->s_point;
$b_point = $row->b_point;
$l_point = $row->c_point;

$OKNA2 = $OKNA + $b_point + $c_point + $l_point - $mine_okna;

$total_usd = $OKNA2 * $OKNAP + $ETHP * $ETH + $USDT * $USDTP;

$qry = "select * from miner where no = '$no';";
$cnt = $DB_LP->select($qry);
$row = $DB_LP->get_data();
$mine_okna = $row->okna;
$s_point = $row->s_point;
$b_point = $row->b_point;
$l_point = $row->c_point;

$OKNA2 = $OKNA + $b_point + $c_point + $l_point - $mine_okna;

$total_usd = $OKNA2 * $OKNAP + $ETHP * $ETH + $USDT * $USDTP;

$DB_LP->close();
?>

<style>
body{background: #F1F1F5;}
.my_container{width: 67vw;margin:4vw auto;background:#fff;padding:2vw;border-radius:16px;}
.header .left{display: flex;justify-content:center;align-items:center;}
.header h2{font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: left;padding-bottom:20px;}
.mining .section1 .mine{background: linear-gradient(90deg, #F59D31 0%, #FA7E0C 100%);border-radius:16px;width: 100%;height: 200px;}
.mining .section .mine .price{font-size: 48px;font-weight: 600;line-height: 62px;letter-spacing: -0.025em;color:#fff;text-align:center;padding-top:20px;}
.mining .section .mine .my-mine{color:#fff;font-size: 20px;font-weight: 500;line-height: 24px;letter-spacing: -0.025em;text-align: left;}
.section2{padding:20px 0 26px;}
.inp1{width: 90%;height: 56px;border-bottom:1px solid #E5E5EC;font-size: 16px;font-weight: 400;line-height: 24px;color:#767676;}
.btn1{width: 90%;height: 60px;border-radius:8px;width: 100%;font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;text-align: center;}
.list-btns{width: 67vw;margin:4vw auto;background:#fff;padding:2vw;border-radius:16px;}
.modal{margin:10%;}
@media screen and (max-width: 1024px) {
    .my_container{width: 90%;}
    .list-btns{width: 90%;}
}
</style> 

<div class="my_container">
    <div class="header">
        <div class="left">
        </div>
        <h2>G-POINT 판매</h2>
    </div>

    <div class="mining">
        <div class="section">
            <div class="section1">
                <div class="mine">
                    <div class="my-mine"><strong><?php echo $name;?></strong> 님의 판매 가능 G-POINT 자산</div>
                    <div class="price"> <?php echo number_format($member['mb_point'], 4); ?> G</div>
                </div>
            </div>
            <form method="post" action="process_sell.php" name="form">
                <div class="section2">
                    <div class="count-box">
                        <input type="text" id="amount" name="amount" class="inp1 text-right" placeholder="판매하실 수량을 입력하세요." style="width:100%;" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
                    </div>
                    <div class="count-box">
                        <input type="text" id="accn" name="accn" class="inp1 text-right" placeholder="은행명을 입력하세요." style="width:100%;">
                    </div>
                    <div class="count-box">
                        <input type="text" id="acc" name="acc" class="inp1 text-right" placeholder="계좌번호를 입력하세요." style="width:100%;" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
                    </div>
                    <div class="count-box">
                        <input type="text" id="name" name="name" class="inp1 text-right" placeholder="예금주를 입력하세요." style="width:100%;">
                    </div>
                </div>
                
                <div class="btns">
                    <button type="submit" class="btn1 block btn-s mb15">판매하기</button>
                </div>  
            </form>
        </div>
    </div>  

    <div class="modal" id="modalAlert">
        <div class="modal-dialog" style="max-width:800px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>판매 완료</h5>
                </div>
                <div class="modal-body">
                    <div class="txt1 text-center">G-POINT 판매가 신청 되었습니다.</div>
                </div>
                <div class="modal-footer">
                    <button class="btn1 block" data-dismiss="modal">확인</button>
                </div>
            </div>
        </div>
    </div>
</div>  

<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form[name='form']");
    const modal = document.getElementById("modalAlert");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        form.submit();
    });

    const closeModal = document.querySelector(".modal .btn1");
    closeModal.addEventListener("click", function() {
        modal.style.display = "none";
    });
});
</script>

<div class="list-btns mb50">
    <a href="/my_selllist.php">내 판매내역</a>
</div>

<?php
include_once(G5_PATH.'/tail.php');
?>
