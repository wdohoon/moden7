<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<style>
#bo_v{padding:10vw}
.write_head { max-width:120px;width:15%;min-width:70px;text-align:center; color:#000000; font-size:13px; font-weight:bold; background-color: #f5f5f5; border-right:0px solid #999;border-left:0px; border-bottom:1px solid #999; }
.write_body { font-size:13px;background-color: #ffffff; border-right:0px solid #999; border-bottom:1px solid #999; padding:11px 5px 11px 10px; }
.write_body2 { font-size:13px;background-color: #ffffff; width:106px; padding:11px 0 11px 20px; border-right:1px solid #999; border-bottom:1px solid #999; }
.write_contents { background-color: #ffffff; border-bottom:1px solid #999; padding:10px; font-size:13px;}
.field { border:1px solid #ccc; }
#p_n_datetime{text-align:right; display:block;float:right; padding-right:10px;font-size:13px;}
#writeContents{}
</style>

<article id="bo_v" style="width:<?php echo $width; ?>">

    <section id="bo_v_info">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr><td height="2" bgcolor="#646c6f" colspan="4"></td></tr>
            <tr>
                <td class="write_head">제목</td>
                <td class="write_body"><?php
                    if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
                    echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
                ?></td>
            </tr>
            <tr>
                <td class="write_head">날짜</td>
                <td class="write_body"><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></td>
            </tr>
            <tr>
                <td class="write_head">글쓴이</td>
                <td class="write_body"><?php echo $view['mb_id'] ?></td>
            </tr>
            <tr>
                <td class="write_head">판매 수량</td>
                <td class="write_body"><?php echo $view['wr_1'] ?></td>
            </tr>
            <tr>
                <td class="write_head">은행명</td>
                <td class="write_body"><?php echo $view['wr_2'] ?></td>
            </tr>
            <tr>
                <td class="write_head">계좌번호</td>
                <td class="write_body"><?php echo $view['wr_3'] ?></td>
            </tr>
            <tr>
                <td class="write_head">예금주</td>
                <td class="write_body"><?php echo $view['wr_4'] ?></td>
            </tr>
        </table>
    </section>



    <div id="bo_v_bot">
        <?php if ($prev_href || $next_href) { ?>
        <ul class="bo_v_nb">
        </ul>
        <?php } ?>

        <ul class="bo_v_com">
            <?php if ($update_href) { ?><li><span class="jbutton large black"><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></span></li><?php } ?>
            <?php if ($delete_href) { ?><li><span class="jbutton large black"><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a></span></li><?php } ?>
            <?php if ($search_href) { ?><li><span class="jbutton large black"><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></span></li><?php } ?>
            <li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li>
            <?php if ($write_href) { ?><li><span class="jbutton large black"><a href="<?php echo $write_href ?>" class="btn_b01">글쓰기</a></span></li><?php } ?>
        </ul>
    </div>

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>

        <?php
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";
            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    echo get_view_thumbnail($view['file'][$i]['view']);
                }
            }
            echo "</div>\n";
        }
        ?>

        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
    </section>



    <div id="bottom_p_n">
    <?php
    $sql = "select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply < '$write[wr_reply]' $sql_search order by wr_num desc, wr_reply desc limit 1";
    $prev = sql_fetch($sql);
    if (!$prev['wr_id']) {
        $sql = "select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num < '$write[wr_num]' $sql_search order by wr_num desc, wr_reply desc limit 1";
        $prev = sql_fetch($sql);
    }

    $sql = "select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply > '$write[wr_reply]' $sql_search order by wr_num, wr_reply limit 1";
    $next = sql_fetch($sql);
    if (!$next['wr_id']) {
        $sql = "select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num > '$write[wr_num]' $sql_search order by wr_num, wr_reply limit 1";
        $next = sql_fetch($sql);
    }
    ?>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr><td height="1" bgcolor="#999" colspan="4"></td></tr>
        <tr>
            <td class="write_head">이전글</td>
            <td class="write_body">
            <?php if ($prev_href) { 
                $prev_wr_subject = get_text(cut_str($prev['wr_subject'], 100));
                $prev_wr_datetime = substr($prev['wr_datetime'],0,10);
                echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\">$prev_wr_subject</a>&nbsp;<span id='p_n_datetime'>$prev_wr_datetime</span>"; 
            } else { 
                echo "이전글이 없습니다."; 
            } ?>
            </td>
        </tr>
        <tr>
            <td class="write_head">다음글</td>
            <td class="write_body">
            <?php if ($next_href) { 
                $next_wr_subject = get_text(cut_str($next['wr_subject'], 100));
                $next_wr_datetime = substr($next['wr_datetime'],0,10);
                echo "<a href=\"$next_href\" title=\"$next_wr_subject\">$next_wr_subject</a>&nbsp;<span id='p_n_datetime'>$next_wr_datetime</span>"; 
            } else { 
                echo "다음글이 없습니다."; 
            } ?>
            </td>
        </tr>
    </table>
    </div>

    <div id="bo_v_bot">
        <?php echo $link_buttons ?>
    </div>

</article>

