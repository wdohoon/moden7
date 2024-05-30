<?php
include_once('./_common.php');

if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL.'/wishlist.php'));

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/wishlist.php');
    return;
}

// 테마에 wishlist.php 있으면 include
if(defined('G5_THEME_SHOP_PATH')) {
    $theme_wishlist_file = G5_THEME_SHOP_PATH.'/wishlist.php';
    if(is_file($theme_wishlist_file)) {
        include_once($theme_wishlist_file);
        return;
        unset($theme_wishlist_file);
    }
}

$g5['title'] = "데모신청 리스트";
include_once('./_head.php');
?>

<style>
.sod_ws_img{width: 100% !important;}
#container {width:100%;max-width:1920px;}
.sub_title {font-size: 48px;font-weight: 900;text-align: center;padding:100px 0 50px;border-bottom:1px solid #000;;}
#sod_ws {width:1400px;margin:0 auto;}
#sod_ws::after {content:"";display:block;clear:both;}
.list_02 ul{
	padding:100px 90px;
}
.list_02 li {
    float: left;
    width: 225px;
    margin: 10px 0 20px 18px;
}
@media (max-width: 1760px)  {
#container {width:100%;max-width:100%;}
.sub_title {font-size: 2.7273vw;padding:5.6818vw 0 2.8409vw;border-bottom:0.0568vw solid #000;;}
#sod_ws {width:79.5455vw;margin:0 auto;}
#sod_ws::after {clear:both;}
.list_02 ul{
	padding:5.6818vw 5.1136vw;
}
.list_02 li {
    
    width: 12.7841vw;
    margin: 0.5682vw 0 1.1364vw 1.0227vw;
}
}

@media (max-width: 1600px)  {
#container {width:100%;}
.sub_title {font-size: 3.0000vw;padding:6.2500vw 0 3.1250vw;border-bottom:0.0625vw solid #000;;}
#sod_ws {width:87.5000vw;margin:0 auto;}
#sod_ws::after {clear:both;}
.list_02 ul{
	padding:6.2500vw 5.6250vw;
}
.list_02 li {
    
    width: 14.0625vw;
    margin: 0.6250vw 0 1.2500vw 1.1250vw;
}
}

@media (max-width: 1400px)  {
#container {width:100%;}
.sub_title {font-size: 3.4286vw;padding:7.1429vw 0 3.5714vw;border-bottom:0.0714vw solid #000;;}
#sod_ws {width:100vw;margin:0 auto;}
#sod_ws::after {clear:both;}
.list_02 ul{
	padding:7.1429vw 6.4286vw;
}
.list_02 li {
    
    width: 16.0714vw;
    margin: 0.7143vw 0 1.4286vw 1.2857vw;
}
}

@media (max-width: 1024px)  {
#container {width:100%;}
.sub_title {font-size: 4.6875vw;padding:9.7656vw 0 4.8828vw;border-bottom:0.0977vw solid #000;;}
#sod_ws {width:100%;margin:0 auto;}
#sod_ws::after {clear:both;}
.list_02 ul{
	padding:9.7656vw 5.7891vw;
}
#sod_ws li .wish_info{height: auto; padding-left:0; padding-right:0;}
}

@media (max-width: 768px)  {
#container {width:100%;}
.sub_title {font-size: 6.2500vw;padding:13.0208vw 0 6.5104vw;border-bottom:0.1302vw solid #000;;}
#sod_ws {width:100%;margin:0 auto;padding: 0 5.2083vw;}
#sod_ws::after {clear:both;}
.list_02 ul{
	padding:13.0208vw 5.7188vw;
}
#sod_ws li{
	margin:0;
	width: 48%;
	margin-right: 2%;
}
#sod_ws li:nth-child(2n){
	margin-right: 0%;
}
}

@media (max-width: 480px)  {
.sub_title {font-size: 10.0000vw;padding:16.6667vw 0 10.4167vw;border-bottom:0.2083vw solid #000;;}
.list_02 ul{
	padding:20.8333vw 18.7500vw;
}

}
</style>

<p class="sub_title">데모신청 리스트</p>
<!-- 위시리스트 시작 { -->
<div id="sod_ws">

    <form name="fwishlist" method="post" action="./cartupdate.php">
    <input type="hidden" name="act" value="multi">
    <input type="hidden" name="sw_direct" value="">
    <input type="hidden" name="prog" value="wish">

    <div class="list_02">
        <ul>
        <?php
			$sql = "select * from g5_write_product_application where mb_id = '{$member['mb_id']}'";
			$result = sql_query($sql);

			for($i=0; $row = sql_fetch_array($result); $i++){
				$image = get_it_image($row['wr_4'], 230, 230, false);
        ?>

        <li>
            <div class="sod_ws_img"><a href="<?php echo '/bbs/board.php?bo_table=product_application&wr_id='.$row['wr_id']; ?>"><?php echo $image; ?></a></div>
            <div class="wish_info">
                <a href="<?php echo '/bbs/board.php?bo_table=product_application&wr_id='.$row['wr_id']; ?>" class="info_link"><?php echo stripslashes($row['wr_7']); ?></a>
                <div class="info_date"><?php echo $row['wr_8'].' ~ '.$row['wr_9']; ?></div>
                <!-- <a href="./wishupdate.php?w=d&amp;wi_id=<?php echo $row['wi_id']; ?>" class="wish_del"><i class="fa fa-trash" aria-hidden="true"></i><span class="sound_only">삭제</span></a> -->
           </div>
        </li>
        <?php
        }

        if ($i == 0)
            echo '<li class="empty_table">보관함이 비었습니다.</li>';
        ?>
        </ul>
    </div>

    <!-- <div id="sod_ws_act">
        <button type="submit" class="btn01" onclick="return fwishlist_check(document.fwishlist,'');">장바구니 담기</button>
        <button type="submit" class="btn02" onclick="return fwishlist_check(document.fwishlist,'direct_buy');">주문하기</button>
    </div> -->
    </form>
</div>

<script>

    function out_cd_check(fld, out_cd)
    {
        if (out_cd == 'no'){
            alert("옵션이 있는 상품입니다.\n\n상품을 클릭하여 상품페이지에서 옵션을 선택한 후 주문하십시오.");
            fld.checked = false;
            return;
        }

        if (out_cd == 'tel_inq'){
            alert("이 상품은 전화로 문의해 주십시오.\n\n장바구니에 담아 구입하실 수 없습니다.");
            fld.checked = false;
            return;
        }
    }

    function fwishlist_check(f, act)
    {
        var k = 0;
        var length = f.elements.length;

        for(i=0; i<length; i++) {
            if (f.elements[i].checked) {
                k++;
            }
        }

        if(k == 0)
        {
            alert("상품을 하나 이상 체크 하십시오");
            return false;
        }

        if (act == "direct_buy")
        {
            f.sw_direct.value = 1;
        }
        else
        {
            f.sw_direct.value = 0;
        }

        return true;
    }

</script>
<!-- } 위시리스트 끝 -->

<?php
include_once('./_tail.php');