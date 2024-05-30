<?php
include_once('./_common.php');

if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL."/mypage.php"));

// 읽지 않은 쪽지수
$memo_not_read = isset($member['mb_memo_cnt']) ? (int) $member['mb_memo_cnt'] : 0;

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/mypage.php');
    return;
}

// 테마에 mypage.php 있으면 include
if(defined('G5_THEME_SHOP_PATH')) {
    $theme_mypage_file = G5_THEME_SHOP_PATH.'/mypage.php';
    if(is_file($theme_mypage_file)) {
        include_once($theme_mypage_file);
        return;
        unset($theme_mypage_file);
    }
}

$g5['title'] = '마이페이지';
include_once('./_head.php');

// 쿠폰
$cp_count = 0;
$sql = " select cp_id
            from {$g5['g5_shop_coupon_table']}
            where mb_id IN ( '{$member['mb_id']}', '전체회원' )
              and cp_start <= '".G5_TIME_YMD."'
              and cp_end >= '".G5_TIME_YMD."' ";
$res = sql_query($sql);

for($k=0; $cp=sql_fetch_array($res); $k++) {
    if(!is_used_coupon($member['mb_id'], $cp['cp_id']))
        $cp_count++;
}
?>

<style>
#container {width:100%;max-width:1920px;}
.sub_title {color:#b1b4b9; font-size: 48px;font-weight: 900;text-align: center;padding:100px 0 50px;border-bottom:1px solid #000;;}
#smb_my {width:1400px;margin:0 auto;}
#smb_my::after {content:"";display:block;clear:both;}
#smb_my_ov{margin-top: 110px;}

/* 정품등록 완료 */
#genuine{margin-top: 110px; text-align: center;}
#genuine h3{font-size: 36px; font-family: 'NanumSquareNeo'; font-weight: 400; margin-bottom: 25px;}
#genuine h4{width: 500px; margin:0 auto; text-align: center; background: #e7e7e7; line-height: 40px; margin-bottom: 80px;}
#genuine h4 span{font-size: 20px; font-family: 'NanumSquareNeo';}
#genuine ul{width: 500px; margin:0 auto; display:flex; justify-content:center;}
#genuine ul li{border:1px solid #ccc; width: 135px; height: 135px; border-radius:50%; background: #fff; position: relative;}
#genuine ul li:hover{background: #000;}
#genuine ul li:hover > a{color:#fff;}
#genuine ul li a{position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); display: block; width: 100%; font-size: 16px; line-height: 24px; text-align: center;  font-family: 'NanumSquareNeo';}


@media (max-width: 1760px)  {
#container {width:100%;max-width:100%;}
.sub_title {font-size: 2.7273vw;padding:5.6818vw 0 2.8409vw;border-bottom:0.0568vw solid #000;;}
#smb_my {width:79.5455vw;margin:0 auto;}
#smb_my::after {clear:both;}

/* 정품등록 완료 */
#genuine{margin-top: 6.2500vw; text-align: center;}
#genuine h3{font-size: 2.0455vw; font-family: 'NanumSquareNeo'; font-weight: 400; margin-bottom: 1.4205vw;}
#genuine h4{width: 28.4091vw; margin:0 auto; text-align: center; background: #e7e7e7; line-height: 2.2727vw; margin-bottom: 4.5455vw;}
#genuine h4 span{font-size: 1.1364vw; font-family: 'NanumSquareNeo';}
#genuine ul{width: 28.4091vw; margin:0 auto;}
#genuine ul li{border:0.0568vw solid #ccc; width: 7.6705vw; height: 7.6705vw; border-radius:50%; background: #fff; position: relative;}
#genuine ul li:hover{background: #000;}
#genuine ul li:hover > a{color:#fff;}
#genuine ul li a{position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); display: block; width: 100%; font-size: 0.9091vw; line-height: 1.3636vw; text-align: center;  font-family: 'NanumSquareNeo';}

}

@media (max-width: 1600px)  {
#container {width:100%;}
.sub_title {font-size: 3.0000vw;padding:6.2500vw 0 3.1250vw;border-bottom:0.0625vw solid #000;;}
#smb_my {width:87.5000vw;margin:0 auto;}
#smb_my::after {clear:both;}

/* 정품등록 완료 */
#genuine{margin-top: 6.8750vw; text-align: center;}
#genuine h3{font-size: 2.2500vw; font-family: 'NanumSquareNeo'; font-weight: 400; margin-bottom: 1.5625vw;}
#genuine h4{width: 31.2500vw; margin:0 auto; text-align: center; background: #e7e7e7; line-height: 2.5000vw; margin-bottom: 5.0000vw;}
#genuine h4 span{font-size: 1.2500vw; font-family: 'NanumSquareNeo';}
#genuine ul{width: 31.2500vw; margin:0 auto;}
#genuine ul li{border:0.0625vw solid #ccc; width: 8.4375vw; height: 8.4375vw; border-radius:50%; background: #fff; position: relative;}
#genuine ul li:hover{background: #000;}
#genuine ul li:hover > a{color:#fff;}
#genuine ul li a{position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); display: block; width: 100%; font-size: 1.0000vw; line-height: 1.5000vw; text-align: center;  font-family: 'NanumSquareNeo';}

}

@media (max-width: 1400px)  {
#container {width:100%;}
.sub_title {font-size: 3.4286vw;padding:7.1429vw 0 3.5714vw;border-bottom:0.0714vw solid #000;;}
#smb_my {width:100vw;margin:0 auto;}
#smb_my::after {clear:both;}

/* 정품등록 완료 */
#genuine{margin-top: 7.8571vw; text-align: center;}
#genuine h3{font-size: 2.5714vw; font-family: 'NanumSquareNeo'; font-weight: 400; margin-bottom: 1.7857vw;}
#genuine h4{width: 35.7143vw; margin:0 auto; text-align: center; background: #e7e7e7; line-height: 2.8571vw; margin-bottom: 5.7143vw;}
#genuine h4 span{font-size: 1.4286vw; font-family: 'NanumSquareNeo';}
#genuine ul{width: 35.7143vw; margin:0 auto;}
#genuine ul li{border:0.0714vw solid #ccc; width: 9.6429vw; height: 9.6429vw; border-radius:50%; background: #fff; position: relative;}
#genuine ul li:hover{background: #000;}
#genuine ul li:hover > a{color:#fff;}
#genuine ul li a{position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); display: block; width: 100%; font-size: 1.1429vw; line-height: 1.7143vw; text-align: center;  font-family: 'NanumSquareNeo';}

}

@media (max-width: 1024px)  {
#container {width:100%;}
.sub_title {font-size: 4.6875vw;padding:9.7656vw 0 4.8828vw;border-bottom:0.0977vw solid #000;;}
#smb_my {width:100%;margin:0 auto;}
#smb_my::after {clear:both;}

/* 정품등록 완료 */
#genuine{margin-top: 10.7422vw; text-align: center;}
#genuine h3{font-size: 3.5156vw; font-family: 'NanumSquareNeo'; font-weight: 400; margin-bottom: 2.4414vw;}
#genuine h4{width: 48.8281vw; margin:0 auto; text-align: center; background: #e7e7e7; line-height: 3.9063vw; margin-bottom: 7.8125vw;}
#genuine h4 span{font-size: 1.9531vw; font-family: 'NanumSquareNeo';}
#genuine ul{width: 48.8281vw; margin:0 auto;}
#genuine ul li{border:0.0977vw solid #ccc; width: 13.1836vw; height: 13.1836vw; border-radius:50%; background: #fff; position: relative;}
#genuine ul li:hover{background: #000;}
#genuine ul li:hover > a{color:#fff;}
#genuine ul li a{position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); display: block; width: 100%; font-size: 1.5625vw; line-height: 2.3438vw; text-align: center;  font-family: 'NanumSquareNeo';}

}

@media (max-width: 768px)  {
#container {width:100%;}
.sub_title {font-size: 6.2500vw;padding:13.0208vw 0 6.5104vw;border-bottom:0.1302vw solid #000;;}
#smb_my {width:100%;margin:0 auto;padding: 0 5.2083vw;}
#smb_my::after {clear:both;}

/* 정품등록 완료 */
#genuine{margin-top: 14.3229vw; text-align: center;}
#genuine h3{font-size: 4.6875vw; font-family: 'NanumSquareNeo'; font-weight: 400; margin-bottom: 3.2552vw;}
#genuine h4{width: 65.1042vw; margin:0 auto; text-align: center; background: #e7e7e7; line-height: 5.2083vw; margin-bottom: 10.4167vw;}
#genuine h4 span{font-size: 2.6042vw; font-family: 'NanumSquareNeo';}
#genuine ul{width: 65.1042vw; margin:0 auto;}
#genuine ul li{border:0.1302vw solid #ccc; width: 20vw; height: 20vw; border-radius:50%; background: #fff; position: relative;}
#genuine ul li:hover{background: #000;}
#genuine ul li:hover > a{color:#fff;}
#genuine ul li a{position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); display: block; width: 100%; font-size: 2.0833vw; line-height: 3.1250vw; text-align: center;  font-family: 'NanumSquareNeo';}

}

@media (max-width: 480px)  {
.sub_title {font-size: 10.0000vw;padding:16.6667vw 0 10.4167vw;border-bottom:0.2083vw solid #000;;}


}

.sub_title01{font-size: 32px;font-weight: 600;display:flex;justify-content:center;align-items:center;padding: 80px 0 30px 0;}
#smb_my_od h2,#smb_my_wish h2{font-size: 22px;}
.regist{height: 40px;}
#smb_my_ov{margin:90px 0 20px;}
.sv_tx02{font-size: 34px !important;padding: 40px 0 !important;}
#smb_my_wish .smb_my_tit{display: block; white-space: nowrap; overflow: hidden; text-overflow:ellipsis;}
@media (max-width: 1280px){
.my_bg{background:url(/images/my_bg.png)no-repeat;width:93.7500vw;height:15.4688vw;margin:0 auto;padding:0 1.5625vw;}
.my_bg .my_logo{width:25%;padding:6.1719vw 0}
.my_bg .my_logo img{width:14.0625vw;height:3.1250vw;}
.my_bg .my_name1{font-size:1.7188vw;line-height:3.1250vw;padding:4.6094vw 0}
#smb_my_ov{margin:7.0313vw 0 1.5625vw;}
.sv_tx02{font-size: 2.3611vw !important;}

}
@media (max-width: 768px){
.my_bg{background:url(/images/my_bg.png)no-repeat;width:169.4915vw;height:27.9661vw;margin:0 auto;padding:0 2.8249vw;}
.my_bg .my_logo{width:25%;padding:11.1582vw 0}
.my_bg .my_logo img{width:25.4237vw;height:5.6497vw;}
.my_bg .my_name1{font-size:3.1073vw;line-height:5.6497vw;padding:8.3333vw 0}
#smb_my_ov{margin:12.7119vw 0 2.8249vw;}
.sv_tx02{font-size: 4.3611vw !important;}

.op_area dt,.op_area dd{font-size: 2vw !important;}
#smb_my_ovaddd{width: 70.3472vw !important;}
#smb_my_od{margin: 40px 0;}
}

</style>
<p class="sub_title">마이페이지</p>
<!-- 마이페이지 시작 { -->
<div id="smb_my">
	<!-- 정품인증회원만 노출 -->
	<?php 
		$mygenuine = sql_fetch("select * from g5_write_genuine where mb_id = '{$member['mb_id']}'");
		if($mygenuine['mb_id']){ 
	?>
	<section id="genuine">
		<h3>정품등록이 완료되었습니다.</h3>
		<h4 class="<?php if($i == ($sncnt-1)){ echo 'last'; } ?>">
		<?php 
			$product = explode(",", $mygenuine['wr_1']);
			$prdcnt = count($product);	//제품명 갯수

			$sn = explode(",", $mygenuine['wr_2']);
			$sncnt = count($sn);	//시리얼넘버 갯수

			$resultGenuine = array();

			foreach ($sn as $value) {
				$stmt = "SELECT wr_subject FROM g5_write_serial WHERE wr_1 = '{$value}'";
				$row = sql_fetch($stmt);
				if ($row) {
					$wr_subject = $row['wr_subject'];
					$resultGenuine[$wr_subject][] = $value;
				}
			}
			//print_r2($row);

			// 결과 출력
			foreach ($resultGenuine as $wr_sbuject => $values) {
		?>

		<span><?php echo "- ".$wr_subject; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo  implode(' , ', $values); ?></span><br>
		<?php } ?>
		</h4>
		<ul>
			<!-- <li><a href="/shop/guide.php">가이드영상<br>보러가기 ></a></li>
			<li><a href="<?php echo get_pretty_url('as'); ?>">A/S<br>신청하기 ></a></li> -->
			<li><a href="/creative-marketing" target="_blank">마케팅몰<br>바로가기</a></li>
		</ul>
	</section>
	<?php
		}
	?>

    <!-- 회원정보 개요 시작 { -->
    <section id="smb_my_ov">
        <h2>회원정보 개요</h2>
        <strong class="my_ov_name"><?php //echo get_member_profile_img($member['mb_id']); ?> <?php echo $member['mb_name']; ?></strong>
        <dl class="cou_pt">
            <dt>PP</dt>
            <dd><a href="<?php echo G5_BBS_URL; ?>/point.php" target="_blank" class="win_point"><?php echo number_format($member['mb_point']); ?></a>점</dd>
            <dt>MP</dt>
            <dd><a href="<?php echo G5_BBS_URL; ?>/point2.php" target="_blank" class="win_point"><?php echo number_format($member['mb_point2']); ?></a>원</dd>
			<dt>보유쿠폰</dt>
            <dd><a href="<?php echo G5_SHOP_URL; ?>/coupon.php" target="_blank" class="win_coupon"><?php echo number_format($cp_count); ?></a></dd>
        </dl>
        <div id="smb_my_act">
            <ul>
                <?php if ($is_admin == 'super') { ?><li><a href="<?php echo G5_ADMIN_URL; ?>/" class="btn_admin">관리자</a></li><?php } ?>
                <!-- <li><a href="<?php echo G5_BBS_URL; ?>/memo.php" target="_blank" class="win_memo btn01">쪽지함</a></li> -->
				<?php if($member['mb_10']=='DOCTOR'){ ?>
				<li><a href="<?php echo G5_BBS_URL; ?>/manager_list.php" target="_blank" class="win_memo btn01 win_coupon">MANAGER 현황</a></li>
				<?php } else { ?>
				<li><a href="http://iloodashop.com/" class="btn01">구 이루다몰 바로가기 (이전 주문 내역 확인)</a></li>
				<li><a href="javascript:;"  class="btn01" onClick="manager_edit()">등록 병원 삭제</a></li>
				<script>
					function manager_edit (){
						var okok = confirm("등록 병원을 삭제하시겠습니까?");
						if(okok==true){
							$.ajax({
								url:"<?php echo G5_SHOP_URL; ?>/manager_edit.php", 
								success:function(result){
									alert('등록 병원이 초기화 되었습니다.');
									location.reload();
								}
							});
						}	
					}
				</script>
				<?php }?>
				<li><a href="<?php echo G5_SHOP_URL; ?>/couponregist.php" target="_blank" class="win_memo btn01 win_coupon">쿠폰등록</a></li>
                <li><a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php" class="btn01">회원정보수정</a></li>
                <li><a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=member_leave.php" onclick="return member_leave();" class="btn01">회원탈퇴</a></li>
            </ul>
        </div>

        <dl class="op_area">
			<dt>아이디</dt>
            <dd><?php echo $member['mb_id']; ?></dd>

			<dt>구분</dt>
            <dd><?php echo $member['mb_10']; ?></dd>
			
			
			<dt>소속 병원</dt>
            <dd><?php if($member['mb_1']) echo $member['mb_1']; else echo '-'; ?></dd>
			<dt>사업자 등록번호</dt>
            <dd><?php if($member['mb_2']) echo $member['mb_2']; else echo '-'; ?></dd>

            <dt>연락처</dt>
            <dd><?php echo ($member['mb_hp'] ? $member['mb_hp'] : '미등록'); ?></dd>
            <dt>E-Mail</dt>
            <dd><?php echo ($member['mb_email'] ? $member['mb_email'] : '미등록'); ?></dd>
            <dt>최종접속일시</dt>
            <dd><?php echo $member['mb_today_login']; ?></dd>
            <dt>회원가입일시</dt>
            <dd><?php echo $member['mb_datetime']; ?></dd>
			
            <dt id="smb_my_ovaddt">주소</dt>
            <dd id="smb_my_ovaddd"><?php echo sprintf("(%s%s)", $member['mb_zip1'], $member['mb_zip2']).' '.print_address($member['mb_addr1'], $member['mb_addr2'], $member['mb_addr3'], $member['mb_addr_jibeon']); ?></dd>
			
        </dl>
        <div class="my_ov_btn"><button type="button" class="btn_op_area"><i class="fa fa-caret-up" aria-hidden="true"></i><span class="sound_only">상세정보 보기</span></button></div>

    </section>
    <script>
    
        $(".btn_op_area").on("click", function() {
            $(".op_area").toggle();
            $(".fa-caret-up").toggleClass("fa-caret-down")
        });

    </script>
    <!-- } 회원정보 개요 끝 -->

    <!-- 최근 주문내역 시작 { -->
    <section id="smb_my_od">
        <h2>최근 주문내역</h2>
        <?php
        // 최근 주문내역
        define("_ORDERINQUIRY_", true);

        $limit = " limit 0, 5 ";
        include G5_SHOP_PATH.'/orderinquiry.sub.php';
        ?>
        <div class="smb_my_more">
            <a href="./orderinquiry.php">더보기</a>
        </div>
    </section>
    <!-- } 최근 주문내역 끝 -->
	
	<!-- 데모신청 목록 -->

	<section id="smb_my_inquiry">
		<h2>데모신청 목록</h2>
		<div class="list_02">
		<ul>
			<?php 
			$sql = "select * from g5_write_product_application where mb_id = '{$member['mb_id']}'";
			$result = sql_query($sql);

			for($i=0; $row = sql_fetch_array($result); $i++){
				$image = get_it_image($row['wr_4'], 230, 230, false);
			?>
				<li>
					<div class="smb_my_img"><a href="<?php echo '/bbs/board.php?bo_table=product_application&wr_id='.$row['wr_id']; ?>"><?php echo $image; ?></a></div>
					<div class="smb_my_tit"><a href="<?php echo '/bbs/board.php?bo_table=product_application&wr_id='.$row['wr_id']; ?>"><?php echo stripslashes($row['wr_7']); ?></a></div>
					<div class="smb_my_date"><?php echo $row['wr_8'].' ~ '.$row['wr_9']; ?></div>
				</li>
			<?php } ?>
		</ul>
		</div>
		
        <div class="smb_my_more">
            <a href="./inquirylist.php">더보기</a>
        </div>
	</section>

    <!-- 최근 위시리스트 시작 { -->
    <section id="smb_my_wish">
        <h2>최근 위시리스트</h2>

        <div class="list_02">
            <ul>

            <?php
            $sql = " select *
                       from {$g5['g5_shop_wish_table']} a,
                            {$g5['g5_shop_item_table']} b
                      where a.mb_id = '{$member['mb_id']}'
                        and a.it_id  = b.it_id
                      order by a.wi_id desc
                      limit 0, 8 ";
            $result = sql_query($sql);
            for ($i=0; $row = sql_fetch_array($result); $i++)
            {
                $image = get_it_image($row['it_id'], 230, 230, true);
            ?>

            <li>
                <div class="smb_my_img"><?php echo $image; ?></div>
                <div class="smb_my_tit"><a href="<?php echo shop_item_url($row['it_id']); ?>"><?php echo stripslashes($row['it_name']); ?></a></div>
                <div class="smb_my_date"><?php echo $row['wi_time']; ?></div>
            </li>

            <?php
            }

            if ($i == 0)
                echo '<li class="empty_li">보관 내역이 없습니다.</li>';
            ?>
            </ul>
        </div>

        <div class="smb_my_more">
            <a href="./wishlist.php">더보기</a>
        </div>
    </section>
    <!-- } 최근 위시리스트 끝 -->
</div>

<script>
function member_leave()
{
    return confirm('정말 회원에서 탈퇴 하시겠습니까?')
}
</script>
<!-- } 마이페이지 끝 -->

<?php
include_once("./_tail.php");