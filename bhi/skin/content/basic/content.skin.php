<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);

?>

<style>
.main .head{display: none;}
#ctt{margin:0; padding:0;}
</style>

<article id="ctt" class="ctt_<?php echo $co_id; ?>">
    

    <div id="ctt_con">
        <?php echo $str; ?>
    </div>

</article>