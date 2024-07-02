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
include_once(G5_PATH.'/head.php');
include_once "./lib/db.class.php";

$DB_LP = new DBCLASS;

// 상태 값을 처리하는 함수
function get_status($status_code) {
    switch ($status_code) {
        case '1':
            return array('status' => '진행중', 'class' => 'status-progress');
        case '2':
            return array('status' => '완료', 'class' => 'status-completed');
        case '3':
            return array('status' => '환불', 'class' => 'status-refund');
        default:
            return array('status' => '진행중', 'class' => 'status-progress');
    }
}

// 구매 내역
$qry = "SELECT * FROM g5_write_b08 WHERE mb_id = '$member[mb_id]' ORDER BY `wr_datetime` DESC;";
$DB_LP->select($qry);
$buy_data = array();
while ($row = $DB_LP->get_data()) {
    $status_info = get_status($row->wr_6);
    $buy_data[] = array(
        'rdate' => date('Y-m-d', strtotime($row->wr_datetime)),
        'type' => "구매",
        'amount' => (float) $row->wr_3,
        'amountp' => (float) $row->wr_4,
        'gpoint' => (float) $row->wr_5,
        'status' => $status_info['status'],
        'status_class' => $status_info['class']
    );
}

// 판매 내역
$qry = "SELECT * FROM g5_write_sell WHERE mb_id = '$member[mb_id]' ORDER BY `wr_datetime` DESC;";
$DB_LP->select($qry);
$sell_data = array();
while ($row = $DB_LP->get_data()) {
    $status_info = get_status($row->wr_6);
    $sell_data[] = array(
        'rdate' => date('Y-m-d', strtotime($row->wr_datetime)),
        'type' => "판매",
        'amount' => (float) $row->wr_1,
        'amountp' => (float) $row->wr_1,
        'status' => $status_info['status'],
        'status_class' => $status_info['class']
    );
}

// 스왑 내역
$qry = "SELECT * FROM g5_write_swap WHERE mb_id = '$member[mb_id]' ORDER BY `wr_datetime` DESC;";
$DB_LP->select($qry);
$swap_data = array();
while ($row = $DB_LP->get_data()) {
    $status_info = get_status($row->wr_6);
    $swap_data[] = array(
        'rdate' => date('Y-m-d', strtotime($row->wr_datetime)),
        'type' => "스왑",
        'amount' => (float) $row->wr_1,
        'amountp' => (float) $row->wr_1,
        'status' => $status_info['status'],
        'status_class' => $status_info['class']
    );
}

$DB_LP->close();
?>

<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/plugin/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/front.js"></script>

<style>
body{background: #F1F1F5;}
.my_container{width: 67vw;margin:4vw auto;background:#fff;padding:2vw;border-radius:16px;}
.header{display: flex; justify-content:space-between;background: var(--Line-Light_Color, #F1F1F5);align-items:center;padding:31px;}
.header h2{font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: center;}
.pay .head{padding:40px 0 70px;}
.pay .head ul{display: flex;justify-content:space-between;text-align:center;}
.pay .head ul li{color: var(--Font-02_black, #111);text-align: center;font-size: 18px;font-style: normal;font-weight: 600;line-height: 26px; letter-spacing: -0.45px;width: 33%;border-bottom: 2px solid var(--Button-Black, #F1F1F5);padding:16px;cursor:pointer;}
.pay .head ul li.active {border-bottom: 2px solid black;}
dt{color: var(--Font-03_Gray, #505050) !important;font-size: 16px;font-style: normal;font-weight: 400;line-height: 24px; letter-spacing: -0.4px;}
dd{color: var(--Font-03_Gray, #505050);text-align: right;font-size: 16px;font-style: normal;font-weight: 400;line-height: 24px; letter-spacing: -0.4px;}
dd span{margin-left:24px;border: 1px solid var(--Line-Regular_Color, #E5E5EC);color: var(--Font-02_black, #111);font-size: 11px;font-style: normal;font-weight: 400;line-height: 16px;letter-spacing: -0.275px;padding:2px 4px;}
</style>

<div class="my_container">
    <div class="header">
        <a href="javascript:history.back();" class="prev"><img src="/img/vector.png" alt=""></a>
        <h2>G-POINT 거래내역</h2>
        <a href="/index.php"><img src="/img/home.png" alt=""></a>    
    </div>
    
    <div class="pay border1">
        <div class="head">
            <ul class="tab-menu">
                <li class="active" data-tab="buy">구매 내역</li>
                <li data-tab="sell">판매 내역</li>
                <li data-tab="swap">스왑 내역</li>
            </ul>
        </div>
        <div class="list">
            <div class="tab-content" id="buy">
                <ul>
                    <?php 
                        foreach ($buy_data as $item) {
                    ?>
                    <li>
                        <div class="box">
                            <dl>
                                <dt><?php echo $item['type'];?></dt>
                                <dd><?php echo number_format($item['amountp'], 4);?> (<?php echo number_format($item['gpoint'], 4);?> G-POINT) <span class="<?php echo $item['status_class'];?>"><?php echo $item['status'];?></span></dd>
                            </dl>
                            <dl class="date">
                                <dt><?php echo $item['rdate'];?> </dt>
                            </dl>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="tab-content" id="sell" style="display:none;">
                <ul>
                    <?php 
                        foreach ($sell_data as $item) {
                    ?>
                    <li>
                        <div class="box">
                            <dl>
                                <dt><?php echo $item['type'];?></dt>
                                <dd><?php echo number_format($item['amountp'], 4);?> (<?php echo number_format($item['amount'], 4);?> G-POINT) <span class="<?php echo $item['status_class'];?>"><?php echo $item['status'];?></span></dd>
                            </dl>
                            <dl class="date">
                                <dt><?php echo $item['rdate'];?> </dt>
                            </dl>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="tab-content" id="swap" style="display:none;">
                <ul>
                    <?php 
                        foreach ($swap_data as $item) {
                    ?>
                    <li>
                        <div class="box">
                            <dl>
                                <dt><?php echo $item['type'];?></dt>
                                <dd><?php echo number_format($item['amountp'], 4);?> (<?php echo number_format($item['amount'], 4);?> G-POINT) <span class="<?php echo $item['status_class'];?>"><?php echo $item['status'];?></span></dd>
                            </dl>
                            <dl class="date">
                                <dt><?php echo $item['rdate'];?> </dt>
                            </dl>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".tab-menu li");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach(tab => {
        tab.addEventListener("click", function() {
            const target = this.getAttribute("data-tab");

            // 탭 활성화 상태 변경
            tabs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");

            // 콘텐츠 표시 상태 변경
            contents.forEach(content => {
                if (content.id === target) {
                    content.style.display = "block";
                } else {
                    content.style.display = "none";
                }
            });
        });
    });
});
</script>

<?php
include_once(G5_PATH.'/tail.php');
?>
