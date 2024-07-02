<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

$title = '내 정보';
include_once('./_head.php');

if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_URL."/mypage.php"));

include_once "./lib/db.class.php";

$DB_LP = new DBCLASS;

$qry = "select * from coinprice;";
$DB_LP->select($qry);

$row = $DB_LP->get_data();
$ETHP = $row->ETH;
$USDTP = 1.02;
$OKNAP = $row->OKNA;

$no = $member['mb_no'];

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
<style>
.myinfo{padding:5vw 10vw;}
.myinfo .section{padding: 2vw 4vw;}
.myinfo .title2{font-size: 20px;font-weight: 600;line-height: 28px;letter-spacing: -0.025em;text-align: left;color:#111111;display: flex;align-items:center;margin:0;border-top: 1px solid #E5E5EC;border-bottom: 1px solid #E5E5EC;padding: 8px 0;gap:3vw;}
.myinfo .title{font-size: 20px;font-weight: 600;line-height: 28px;letter-spacing: -0.025em;text-align: left;color:#111111;border-bottom:1px solid #E5E5EC;margin:0;padding-bottom:8px;}
.block{width: 50%;}
.flex{display: flex;align-items:center;padding: 10px 0;border-bottom:1px solid #E5E5EC;gap:20px;}
.myinfo .tit{font-size: 16px;font-weight: 400;line-height: 24px;letter-spacing: -0.025em;text-align: left;color:#111111;width: 20%;margin:0;}
.myinfo .inp-box1{width: 80%;}
.inp.small{width: 28vw;height:44px;display: flex;align-items:center;}
.pass_change_bt{width: 71px;height: 34px;margin-top:30px;}
.leavebt{width: 71px;height: 34px;}
.center_btn{display: flex;justify-content:center;margin-top:30px;}
.mine{background: linear-gradient(90deg, #F59D31 0%, #FA7E0C 100%);border-radius:16px;width: 100%;height: 200px;}
.my-mine{font-size: 24px;font-weight: 400;line-height: 34px;letter-spacing: -0.025em;text-align: center;color:#fff;}
.price{font-size: 48px;font-weight: 600;line-height: 62px;letter-spacing: -0.025em;text-align: center;color:#fff;}
.price1{font-size: 20px;font-weight: 400;line-height: 28px;letter-spacing: -0.025em;text-align: center;color:#fff;}
.pay .head{padding:40px 0 70px;display: flex;justify-content:space-between;flex-wrap:wrap;}
.pay .head ul{display: flex;justify-content:space-between;text-align:center;width: 40%;}
.pay .head ul li{color: var(--Font-02_black, #111);text-align: center;font-size: 18px;font-style: normal;font-weight: 600;line-height: 26px; letter-spacing: -0.45px;width: 33%;border-bottom: 2px solid var(--Button-Black, #F1F1F5);padding:16px;cursor:pointer;}
.pay .head ul li.active {border-bottom: 2px solid black;}
dt{color: var(--Font-03_Gray, #505050) !important;font-size: 16px;font-style: normal;font-weight: 400;line-height: 24px; letter-spacing: -0.4px;}
dd{color: var(--Font-03_Gray, #505050);text-align: right;font-size: 16px;font-style: normal;font-weight: 400;line-height: 24px; letter-spacing: -0.4px;}
dd span{margin-left:24px;border: 1px solid var(--Line-Regular_Color, #E5E5EC);color: var(--Font-02_black, #111);font-size: 11px;font-style: normal;font-weight: 400;line-height: 16px;letter-spacing: -0.275px;padding:2px 4px;}
.mine_container{border-radius: 8px;border: 1px solid var(--Line-Regular_Color, #E5E5EC);background: var(--Font-01_White, #FFF);margin-bottom:20px;}
.mines_container{width: 90%;margin:0 auto;padding: 2vw;}
.mine .minee{padding:36px 0;}
.pay .head a{border-radius: 4px;background: var(--System-Blue-500, #4896EC);display: flex;width: 180px;height: 34px;padding: 8px 16px;justify-content: center;align-items: center;overflow: hidden;color: var(--Font-01_White, #FFF);text-align: center;font-size: 16px;font-style: normal;font-weight: 400;line-height: 24px; letter-spacing: -0.4px;}
.title2 a{display: flex;align-items:center;justify-content:center;}
@media screen and (max-width: 1200px) {
	.pay .head ul{width: 50%;}
}
@media screen and (max-width: 1024px) {
	.myinfo .tit{width: 30%;}
}
@media screen and (max-width: 924px) {
	.pay .head ul{width: 60%;}
}
@media screen and (max-width: 765px) {
	.pay .head ul{width: 100%;}
	.pay .head a{margin-top:20px;}
}
</style>
	<div class="myinfo">
		<form action="/bbs/register_form_update.php" method="post" id="new_pass_form">
		
		<div class="section section1">
			<div class="title title2">
				KYC 인증
				<a href="/bbs/write.php?bo_table=kyc" class="btn1 block f15">인증하기</a>
			</div>
		</div>

		<div class="section">
			<div class="title">회원 정보</div>
			<div class="flex">
				<div class="tit">아이디 (휴대폰 번호)</div>
				<div class="inp-box1 ">
					<input type="text" readonly class="inp small block" id="reg_mb_id" value="<?php echo $member['mb_id'];?>">
				</div>
			</div>	

			<div class="mb10">
				<div class="flex">
					<div class="tit">성명</div>
					<input type="text" class="inp small block" name="mb_name" readonly value="<?php echo $member['mb_name'];?>">
				</div>
				<div class="flex">
					<div class="tit">생년월일</div>
					<input type="text" class="inp small block" name="mb_birth" readonly value="<?php echo $member['mb_birth'];?>">
				</div>
			</div>
			<div class="flex">
				<div class="tit">이메일주소</div>
				<div class=""><input type="text" class="inp small block" name="mb_email" readonly value="<?php echo $member['mb_email'];?>"></div>
			</div>
		</div>
		
		<input type="hidden" name="w" value="u">
		<input type="hidden" name="re_url" value="mypage">
		<input type="hidden" name="mb_id" value="<?php echo $member['mb_id'];?>">
		<input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'];?>">
		<div class="section">
			<div class="title">비밀번호 변경</div>

			<div class="flex">
				<div class="tit">현재 비밀번호</div>
				<div class="mb10"><input type="password" name="old_pass" value="" class="old_pass inp small block" placeholder="현재 비밀번호를 입력해 주세요."></div>
			</div>
			
			<div class="flex">
				<div class="tit">새 비밀번호</div>
				<div class="mb10"><input type="password" name="new_pass" value="" class="new_pass inp small block" placeholder="새 비밀번호를 입력해 주세요."></div>
			</div>
			
			<div class="flex">
				<div class="tit">새 비밀번호 확인</div>
				<div class="mb10"><input type="password" name="" value="" class="new_pass_re inp small block" placeholder="새 비밀번호를 다시 입력해 주세요."></div>
			</div>
			
			<button type="button" class="btn1 block f15 pass_change_bt">확인</button>
		</div>
		</form>

		<div class="mine_container">
			<div class="mines_container">
				<div class="mine">
					<div class="minee">
						<div class="my-mine">나의 G-POINT 잔고</div>
                                        
                        

                        
                        
						<div class="price"> <?php echo number_format($member['mb_point'], 4); ?> G</div>
						<div class="price price1"> <?php echo number_format($total_usd, 4 );?> $ / <?php echo number_format($c_point * $OKNAP, 4 );?> ￦</div>
					</div>
				</div>
				<div class="pay border1">
					<div class="head">
						<ul class="tab-menu">
							<li class="active" data-tab="buy">구매 내역</li>
							<li data-tab="sell">판매 내역</li>
							<li data-tab="swap">스왑 내역</li>
						</ul>
						<a href="/coinswap.php">G-POINT SWAP 신청</a>
					</div>
					<div class="list">
						<div class="tab-content" id="buy">
							<ul>
								<?php foreach ($buy_data as $item) { ?>
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
								<?php } ?>
							</ul>
						</div>
						<div class="tab-content" id="sell" style="display:none;">
							<ul>
								<?php foreach ($sell_data as $item) { ?>
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
								<?php } ?>
							</ul>
						</div>
						<div class="tab-content" id="swap" style="display:none;">
							<ul>
								<?php foreach ($swap_data as $item) { ?>
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
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<form action="/bbs/member_leave_pin.php" method="post" id="leave_pin_form">
			<div class="section">
				<div class="title">회원탈퇴</div>
				<div class="flex">
					<div class="tit">핀번호</div>
					<div class="mb10"><input type="text" name="pin" class="inp small block leavepinnumber" placeholder="핀번호를 입력해 주세요."></div>
				</div>
				<div class="center_btn">
					<button type="button" class="btn1 block f15 leavebt">확인</button>
				</div>
			</div>
		</form>
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

function chkchk(){	//password
    var okno = confirm("비밀번호를 변경하시겠습니까?");
    if(okno == true){
        if(!$('.old_pass').val()){
            alert("현재 비밀번호를 입력해주세요.");
            return false;
        }
        if(!$('.new_pass').val()){
            alert("새 비밀번호를 입력해주세요.");
            return false;
        }
        if(!$('.new_pass_re').val()){
            alert("새 비밀번호 확인을 입력해주세요.");
            return false;
        }
        if($('.new_pass').val() !== $('.new_pass_re').val()){
            alert("새 비밀빈호가 서로 다릅니다");
            return false;
        }		
        $("#new_pass_form").submit()
    } else if(okno == false){
    }		
    return false;	
}

function chkchk2(){	//pin leave
    var pinok = confirm("정말로 탈퇴 하시겠습니까?\n돌이킬수 없습니다.");
    if(pinok == true){
        if(!$('.leavepinnumber').val()){
            alert("핀번호를 입력해주세요.");
            return false;
        }
        $("#leave_pin_form").submit()
    } else if(pinok == false){
    }		
    return false;	
}

$(".pass_change_bt").click(function(){
    chkchk();
})
$(".leavebt").click(function(){
    chkchk2();
})
</script>

<?php
include_once(G5_PATH.'/tail.php');
?>
