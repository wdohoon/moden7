

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
    echo "<script>alert('스왑이 완료 되었습니다.');</script>";
}

if ($ret == 2) {
    echo "<script>alert('코인 잔액이 부족 합니다.');</script>";
}

if ($ret == 3) {
    echo "<script>alert('스왑 점검중인 코인 입니다.');</script>";
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
.mining{width: 846px;margin:150px auto 32px;background:#fff;border-radius:8px; padding: 40px 40px 25px;}
.mining h1{font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: center;padding-bottom:40px;}
.mine{background: linear-gradient(90deg, #F59D31 0%, #FA7E0C 100%);border-radius:16px;width: 100%;height: 200px;}
.my-mine{font-size: 24px;font-weight: 400;line-height: 34px;letter-spacing: -0.025em;text-align: center;color:#fff;}
.price{font-size: 48px;font-weight: 600;line-height: 62px;letter-spacing: -0.025em;text-align: center;color:#fff;}
.price1{font-size: 20px;font-weight: 400;line-height: 28px;letter-spacing: -0.025em;text-align: center;color:#fff;}
.section p{font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025e;padding: 28px 0 8px;}
.count-box input{background: #F1F1F5;border:none;border-radius:4px;padding:20px;font-size: 18px;font-weight: 400;line-height: 26px;height: 66px;}
.count-boxs textarea{background: #F1F1F5;border:none;border-radius:4px;padding:20px;font-size: 18px;font-weight: 400;line-height: 26px;height: 257px;width: 100%;}
.btns button{background: #4896EC;font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;text-align: center;}
.list-btns{width: 846px;height: 244px;border-radius:16px;background: #FFFFFF;margin:0 auto 150px;}
.list-btns a{font-size: 16px;font-weight: 400;line-height: 24px;letter-spacing: -0.025em;text-align: left;color:#111111;padding:20px;width: 90%;margin:0 auto;}

@media screen and (max-width: 1024px) {
    .mining{width: 90%;}
    .list-btns{width: 90%;}
}
</style>

<div class="mining">
    <h1>G-POINT 스왑신청</h1>
    <div class="section">
        <div class="mine">
            <div class="my-mine">나의 BHC 스왑신청 가능 잔고</div>
            <div class="price"> <?php echo number_format($member['mb_point'], 4); ?> G</div>
            <div class="price price1"> <?php echo number_format($total_usd, 4 );?> $ / <?php echo number_format($c_point * $OKNAP, 4 );?> ￦</div>
        </div>
        
        <form method="post" action="process_swap.php" name="form">
            <div class="section">
                <div class="count-box">
                    <p>수량</p>
                    <input type="text" id="amount" name="amount" class="inp1 text-right" style="width:100%;" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" placeholder="0">
                </div>
            </div>

            <div class="section">
                <div class="count-box count-boxs">
                    <p>내용</p>
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="1. 코인으로 스왑을 원하실 경우 코인명 및 받는 주소를 기재해주세요.

2. 다른 사이트의 포인트로 스왑을 원할경우 사이트 주소와 해당 아이디를 입력해주세요."></textarea>
                </div>
            </div>
            
            <div class="btns">
                <button type="submit" class="btn3 btn-s block">신청하기</button>
            </div>
        </form>
    </div>
</div>  

<div class="modal" id="modalAlert">
    <div class="modal-dialog" style="max-width:800px">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-logout">
                    <strong>스왑 신청 완료</strong>
                    <p class="txt2">신청 완료하였습니다. <br> 관리자 확인 후 빠른 시간 내에 처리하겠습니다.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn1 block btn-s" data-dismiss="modal">확인</button>
            </div>
        </div>
    </div>
</div>

<div class="list-btns mb50">
    <a href="/my_selllist.php">내 스왑 내역</a>
</div>

<?php
include_once(G5_PATH.'/tail.php');
?>
