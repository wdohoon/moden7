<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/couponregist.php');
    return;
}

if ($is_guest)
	goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL."/couponregist.php"));

$g5['title'] = $member['mb_id'].' 님의 쿠폰등록';
include_once(G5_PATH.'/head.sub.php');
/*
$sql = " select cp_id, cp_subject, cp_method, cp_target, cp_start, cp_end, cp_type, cp_price
            from {$g5['g5_shop_coupon_table']}
            where mb_id IN ( '{$member['mb_id']}', '전체회원' )
              and cp_start <= '".G5_TIME_YMD."'
              and cp_end >= '".G5_TIME_YMD."'
            order by cp_no ";
$result = sql_query($sql);
*/
?>

<?
$today = date("Y-m-d"); //현재날짜

$today2 = date("Y-m-d", strtotime($today) + (86400*31)); //한달이내

?>​

<style>
h2{text-align: center; font-size: 24px; margin-bottom: 40px;}
.btn_fixed_top{text-align: center;}
.tbl_frm01{text-align: center;}
.title{font-size: 18px; margin-right: 20px;}
</style>

<h2><?php echo $g5['title']; ?></h2>

<!-- 쿠폰 입력 시작 { -->
<form name="fcouponform" action="./couponformupdate2.php" method="post" onsubmit="return form_check(this);">

<input type="hidden" name="cp_subject" value="쿠폰">
<input type="hidden" name="cp_method" value="2"> <!-- 주문금액할인 -->
<input type="hidden" name="cp_target" value=""> <!-- 적용상품 -->
<input type="hidden" name="mb_id" value="<?php echo $member['mb_id']; ?>">
<input type="hidden" name="cp_start" value="<?php echo $today; ?>">
<input type="hidden" name="cp_end" value="<?php echo $today2; ?>">
<input type="hidden" name="cp_type" value="0"> 
<input type="hidden" name="cp_price" value="10000"> <!--정액할인(원)-->
<input type="hidden" name="cp_trunc" value="1"> 
<input type="hidden" name="cp_minimum" value="100000"> <!-- 상품 최소금액 -->
<input type="hidden" name="cp_maximum" value="0"> 
<input type="hidden" name="od_id" value="0"> 
<input type="hidden" name="cp_datetime" value="0">

<div class="tbl_frm01 tbl_wrap">
	<span class="title"><label for="cp_id">쿠폰번호 입력</label></span>
	<span class="num">
		<input type="text" name="cp_id" value="" id="cp_id" required class="required frm_input" size="50">
	</span>
</div>

<div class="btn_fixed_top">
	
    <input type="submit" value="등록" class="btn_submit btn" accesskey="s">

	
</div>

</form>

<?php
include_once(G5_PATH.'/tail.sub.php');
?>