<?php
$sub_menu = '400900';
include_once('./_common.php');

auth_check_menu($auth, $sub_menu, "r");

$admin_ids = array('admin', 'log_admin', 'sub_admin', 'as_admin', 'shop_admin', 'board_admin', 'member_admin');

if (in_array($member['mb_id'], $admin_ids)) {
    $login_id = $member['mb_id']; 
    $mb_name = $member['mb_name'];  
    $user_ip = $_SERVER['REMOTE_ADDR'];  
    $accessed_page = "무통장 미입금 관리";
    $history_datetime = date('Y-m-d H:i:s'); 
	$action = "조회";

    $sql = "INSERT INTO g5_login_history_save (login_id, user_name, user_ip, accessed_page, history_datetime, action) 
            VALUES ('{$login_id}', '{$mb_name}', '{$user_ip}', '{$accessed_page}', '{$history_datetime}', '{$action}')";
    sql_query($sql);
}
?>
<?php
$sql_common = " from {$g5['g5_shop_coupon_table']} ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_id' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "cp_no";
    $sod = "desc";
}
$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search}
            {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
            {$sql_common}
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$g5['title'] = '무통장 미입금 관리';
include_once (G5_ADMIN_PATH.'/admin.head.php');

$colspan = 9;

$sql = "select * from g5_shop_order where od_status = '주문' and od_settle_case = '무통장' AND date_add(od_time, INTERVAL 3 DAY) < NOW()";
$result = sql_query($sql);
$total_count = sql_num_rows($result);
?>
<style>
.tbl_head01 thead th,
.tbl_head01 tbody td{
	text-align:center !important;
}
.tbl_head01 thead th:nth-child(1){
	width: 10%;
}
.tbl_head01 thead th:nth-child(2){
	width: 10%;
}
.tbl_head01 thead th:nth-child(3){
	width: 15%;
}
.tbl_head01 thead th:nth-child(4){
	width: 20%;
}
.tbl_head01 thead th:nth-child(5){
	width: 10%;
}
.tbl_head01 thead th:nth-child(6){
	width: 10%;
}
.tbl_head01 thead th:nth-child(7){
	width: 10%;
}
</style>
<div class="local_ov">
    <span class="btn_ov01"><span class="ov_txt">전체 </span><span class="ov_num"> <?php echo number_format($total_count) ?> 개</span></span>
</div>
<form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">
<!-- 
<select name="sfl" title="검색대상">
    <option value="mb_id"<?php echo get_selected($sfl, "mb_id"); ?>>회원아이디</option>
    <option value="cp_subject"<?php echo get_selected($sfl, "cp_subject"); ?>>쿠폰이름</option>
    <option value="cp_id"<?php echo get_selected($sfl, "cp_id"); ?>>쿠폰코드</option>
</select>
<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
<input type="submit" class="btn_submit" value="검색"> -->
</form>


<form name="fcouponlist" id="fcouponlist" method="post" action="./couponlist_delete.php" onsubmit="return fcouponlist_submit(this);">
<input type="hidden" name="sst" value="<?php echo $sst; ?>">
<input type="hidden" name="sod" value="<?php echo $sod; ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
<input type="hidden" name="stx" value="<?php echo $stx; ?>">
<input type="hidden" name="page" value="<?php echo $page; ?>">
<input type="hidden" name="token" value="">

<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <thead>
    <tr>
        <!-- <th scope="col">
            <label for="chkall" class="sound_only">쿠폰 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th> -->
        <th scope="col">이름</th>
        <th scope="col"><?php echo subject_sort_link('mb_id') ?>회원아이디</a></th>
        <th scope="col">연락처</th>
        <th scope="col">주문번호</th>
        <th scope="col">금액</th>
        <th scope="col">주문 날자</th>
        <th scope="col">카톡 발송여부</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        
		$od_name = $row['od_name'];
		$od_hp = $row['od_hp'];
		$od_id = $row['od_id'];
		$od_cart_price = $row['od_cart_price'];
		$od_bank_account = $row['od_bank_account'];
		//include '../kakao/deposit_request.php';
    ?>

    <tr class="<?php echo $bg; ?>">
       <!--  <td class="td_chk">
            <input type="hidden" id="cp_id_<?php echo $i; ?>" name="cp_id[<?php echo $i; ?>]" value="<?php echo $row['cp_id']; ?>">
            <input type="checkbox" id="chk_<?php echo $i; ?>" name="chk[]" value="<?php echo $i; ?>" title="내역선택">
        </td> -->
        <td><?php echo $od_name; ?></td>
        <td class="td_name sv_use"><div><?php echo $row['mb_id']; ?></div></td>
        <td><?php echo $od_hp; ?></td>
        <td class="td_left"><?php echo $od_id; ?></td>
        <td><?php echo $od_cart_price; ?></td>
        <td class="td_datetime"><?php echo $row['od_time']; ?></td>
        <td class="td_cntsmall"><?php if($row['od_kakao'] == 1) echo '발송완료'; else echo '미발송' ;?></td>
    </tr>

    <?php
    }

    if ($i == 0)
        echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>';
    ?>
    </tbody>
    </table>
	<!-- <a href="javascript" class="talk_btn">알림톡 보내기</a> -->
</div>
<!-- <div class="btn_fixed_top">
     <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_02">
   <a href="./couponform.php" id="coupon_add" class="btn btn_01">쿠폰 추가</a> 
</div> -->

</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>

<script>
function fcouponlist_submit(f)
{
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}
</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
