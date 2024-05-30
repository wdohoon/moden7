<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if (!defined('_SHOP_')) {
    $pop_division = 'comm';
} else {
    $pop_division = 'shop';
}

$sql = " select * from {$g5['new_win_table']}
          where '".G5_TIME_YMDHIS."' between nw_begin_time and nw_end_time
            and nw_device IN ( 'both', 'pc' ) and nw_division IN ( 'both', '".$pop_division."' )
          order by nw_id asc ";
$result = sql_query($sql, false);
?>
<!-- 팝업레이어 시작 { -->
<div id="hd_pop">
    <h2>팝업레이어 알림</h2>

<?php
for ($i=0; $nw=sql_fetch_array($result); $i++)
{
    // 이미 체크 되었다면 Continue
    if (isset($_COOKIE["hd_pops_{$nw['nw_id']}"]) && $_COOKIE["hd_pops_{$nw['nw_id']}"])
        continue;
?>
	
<?
$width = $nw["nw_width"] / 1920 * 100;
$height = $nw['nw_height'] / 1920 * 100;

$top = $nw['nw_top'] / 1920 * 100;
$left = $nw['nw_left'] / 1920 * 100;

$width2 = $nw["nw_width"] / 1600 * 100;
$height2 = $nw['nw_height'] / 1600 * 100;

$top2 = $nw['nw_top'] / 1600 * 100;
$left2 = $nw['nw_left'] / 1600 * 100;

$width3 = $nw["nw_width"] / 1450 * 100;
$height3 = $nw['nw_height'] / 1450 * 100;

$top3 = $nw['nw_top'] / 1450 * 100;
$left3 = $nw['nw_left'] / 1450 * 100;
?>
<style>
	.hd_pops_con{
		/* width: <?=$width?>px;
		height: <?=$height?>px;
		width: 450px;
		height: 450px; */
		/* min-width: 350px;
		min-height: 350px; */
	}
	@media (max-width: 1600px){
		#hd_pops_<?php echo $nw['nw_id']; ?>{
			top: <?php echo $top2;?>vw !important;
			/* left: <?php echo $left2;?>vw !important; */
			left: 2vw !important;
			z-index : -<?php echo floor($left);?>;
		}
		#hd_pops_<?php echo $nw['nw_id']; ?> .hd_pops_con{
			width: <?php echo $width2;?>vw !important;
			height: <?php echo $height2;?>vw !important;
		}
	}
	@media (max-width: 1450px){
		#hd_pops_<?php echo $nw['nw_id']; ?>{
			top: <?php echo $top3;?>vw !important;
			/* left: <?php echo $left3;?>vw !important; */
		}
		#hd_pops_<?php echo $nw['nw_id']; ?> .hd_pops_con{
			width: <?php echo $width3;?>vw !important;
			height: <?php echo $height3;?>vw !important;
		}
	}
	@media (max-width: 768px)  {
		#hd_pops_<?php echo $nw['nw_id']; ?>{
			width: calc(100vw - 20px) !important;
			top:200px !important; 
			left: 10px !important;
			background: #fff; 
		}
		#hd_pops_<?php echo $nw['nw_id']; ?> .hd_pops_con{
			width: 100% !important;
			height: auto !important;
			max-width: unset !important;
			max-height: unset !important;
			min-width: unset !important;
			min-height: unset !important;
		}
		.hd_pops_con img{
			width: 100%;
		}
	}
</style>
    <div id="hd_pops_<?php echo $nw['nw_id'] ?>" class="hd_pops" style="top:<?php echo $top?>vw;left:<?php echo $left?>vw">
        <div class="hd_pops_con" style="width:<?php echo $width ?>vw; max-width:<?php echo $nw["nw_width"]?>px;
		height:<?php echo $height ?>vw;  max-height:<?php echo $nw["nw_height"]?>px;">
            <?php echo conv_content($nw['nw_content'], 1); ?>
        </div>
        <div class="hd_pops_footer">
            <button class="hd_pops_reject hd_pops_<?php echo $nw['nw_id']; ?> <?php echo $nw['nw_disable_hours']; ?>"><strong><?php echo $nw['nw_disable_hours']; ?></strong>시간 동안 다시 열람하지 않습니다.</button>
            <button class="hd_pops_close hd_pops_<?php echo $nw['nw_id']; ?>">닫기 <i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
    </div>
<?php }
if ($i == 0) echo '<span class="sound_only">팝업레이어 알림이 없습니다.</span>';
?>
</div>

<script>
$(function() {
    $(".hd_pops_reject").click(function() {
        var id = $(this).attr('class').split(' ');
        var ck_name = id[1];
        var exp_time = parseInt(id[2]);
        $("#"+id[1]).css("display", "none");
        set_cookie(ck_name, 1, exp_time, g5_cookie_domain);
    });
    $('.hd_pops_close').click(function() {
        var idb = $(this).attr('class').split(' ');
        $('#'+idb[1]).css('display','none');
    });
    $("#hd").css("z-index", 1000);
});
</script>
<!-- } 팝업레이어 끝 -->