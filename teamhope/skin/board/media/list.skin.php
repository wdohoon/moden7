<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 4;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

// 글자수
$content_length = 100;

// 컨텐츠 세로 px
// Ex) 이미지가 125 x 100인 경우
$content_height = 50;
?>

<?
//========================================================
// 페이지 변경시 필요한 소스 시작~!!!!!!!!!!!!!!

function get_paging2($write_pages, $cur_page, $total_page, $url, $add="")
{
	global $board_skin_url;
    $str = "<ul class='pagenation'>";
    if ($cur_page > 1) {
        $str .= "<li><a href='".$url."' class='btn'><img src='{$board_skin_url}/img/btn_firstly.gif' alt='처음' /></a></li>";
        //$str .= "[<a href='" . $url . ($cur_page-1) . "'>이전</a>]";
    }

    $start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
    $end_page = $start_page + $write_pages - 1;

    if ($end_page >= $total_page) $end_page = $total_page;

    if ($start_page > 1) $str .= "<li><a href='" . $url . ($start_page-1) . "{$add}' class='btn'><img src='{$board_skin_url}/img/btn_prev.gif' alt='이전' /></a></li>";

    if ($total_page > 1) {
        for ($k=$start_page;$k<=$end_page;$k++) {
            if ($cur_page != $k)
                $str .= "<li><a href='$url$k{$add}'><span>$k</span></a></li>";
            else
                $str .= "<li class='on'><a href='$url$k{$add}'><b>$k</b></a></li>";
        }
    }

    if ($total_page > $end_page) $str .= " <li><a href='" . $url . ($end_page+1) . "{$add}' class='btn'><img src='{$board_skin_url}/img/btn_next.gif' alt='다음으로' /></a></li>";

    if ($cur_page < $total_page) {
        //$str .= "[<a href='$url" . ($cur_page+1) . "'>다음</a>]";
        $str .= "<li><a href='$url$total_page{$add}' class='btn'><img src='{$board_skin_url}/img/btn_lastly.gif' alt='마지막으로' /></a></li>";
    }
    $str .= "</ul>";

    return $str;
}

$write_pages = get_paging2($config['cf_write_pages'], $page, $total_page, "./board.php?bo_table=$bo_table".$qstr."&page=");

?>

<style>
/* pagenation */
.pagenation             {padding:0;font-size:12px; text-align:center;margin-top:60px;}
.pagenation li           {display:inline; padding:7px 0; border:1px solid #b6b6b6; margin:0 3px;}

.pagenation li a          {color:#424242; padding:0px 10px;}
.pagenation li a img      {vertical-align:middle;}
.pagenation li:hover        {background:#f8f8f8;}

.pagenation li.on          {background:#777777 ; border:1px solid #777777;}
.pagenation li.on a         {color:#ffffff;}
#bo_list{padding:200px 0 200px 0;}
#container_title{display: none;}
#bo_list h1{font-size:60px; text-align:center;margin-bottom:100px;}
#bo_list{width: 1124px;margin: 0 auto;}
.title_icon{display: none;}
#bo_sch{display: none;}
#aaa{display: none;}
</style>
	<?php 
		include_once('../include/include_menu.php');
	?>
<!-- <h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>-->

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php //echo $width; ?>">
	<h1>NOTICE</h1>
    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

	


	

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <!-- <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>-->
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
    </div>
    <?php } ?>

    <div class="jtbl_head01 jtbl_wrap">
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
       <!--  <thead>
        <tr>
            <th scope="col">번호</th>
            <?php if ($is_checkbox) { ?>
            <th scope="col">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col">소개</th>
            <?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
        </thead>-->
        <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
         ?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
            
           <!--  <td class="td_num">
            <?php
            if ($list[$i]['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list[$i]['num'];
             ?>
            </td>-->
            
            <!--     
            <td class="td_chk">
                   
            </td>
            -->   
			
			<td class="td_subject">
            
				<div style="position:relative;">
                <?php
				$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);

				if($thumb['src']) {
					$img_content = '<div style="float:left;width:'.$board['bo_gallery_width'].'px;height:'.$board['bo_gallery_height'].'px;margin-right:16px; margin-bottom:11px"><a href="'.$list[$i]['href'].'"><img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'" style="border:1px solid #ddd"></a></div>';
					echo "<div class='yoon_webzine_icon' style='position:absolute;top:0;left:0;'>" . $list[$i]['icon_new'] . $list[$i]['icon_hot']."</div>";

                } else {
					$img_content = '';
                }

                echo $img_content;
                ?>


				<!-- 제목 -->
			
                <?php
				echo '<div class="webzine_subject">';
				echo '<p>Date : ';
				echo $list[$i]['datetime'];
				echo '</p>';
				?>
                <?php if ($is_checkbox) { ?> 
               	<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
               <?php } ?>
                <?
	                echo $list[$i]['icon_reply'];
                if ($is_category && $list[$i]['ca_name']) {
                 ?>
                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                <?php } ?>

                <a href="<?php echo $list[$i]['href'] ?>">
                    <b><?php echo $list[$i]['subject'] ?></b>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="comeent01">(<?php echo $list[$i]['comment_cnt']; ?>)</span><span class="sound_only">개</span><?php } ?>
                </a>

                <?php
                // if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
                // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

                //if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                //if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
               // if (isset($list[$i]['icon_file'])) echo  $list[$i]['icon_file'];
                //if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
                //if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];
				echo '</div>';
			?>
            <!-- 제목끝 -->
			<script type="text/javascript">
				var str = getElementById("aaa");
				var res = str.substr(20);
				document.getElementById("aaa").innerHTML=res;
			</script>	
				<?php
				$wr_content = preg_replace("/<(.*?)\>/"," ",$list[$i]['wr_content']);
				$wr_content = preg_replace("/&nbsp;/"," ",$wr_content);
				$wr_content = str_replace("//##", " ", $wr_content);
				$wr_content = cut_str(get_text($wr_content), $content_length, '…');
				if($list[$i]['wr_option'] =="secret"){
				
				}else{
				echo '<div id="aaa" class="webzine_centents">';
				//echo '<br>';
				
				echo $wr_content;
				
				echo '</div>';
				}
				
				//echo '<div style="display:block;padding:10px 10px 5px 0;text-align:right;">';
				//echo '작성자 : '.$list[$i]['name'].' | 작성일 : '.$list[$i]['datetime'].' | 조회수 : '.$list[$i]['wr_hit'];
	            //if ($is_good) echo " | 추천 : ".$list[$i]['wr_good'];
		        //if ($is_nogood) echo " | 비추천 : ".$list[$i]['wr_nogood'];
				//echo '</div>';
				?>
				</div>
            </td>
			<td class="view_btn_td">
				<a href='<?=$list[$i]['href']?>'>
					<!-- <img src="<?php echo $board_skin_url ?>/img/view_n.gif" alt="자세히보기" border="0"	align="absmiddle" /> -->
				</a>
			</td>
        </tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></span></li>
        </ul>
        <?php } ?>

        <?php
// 기존 코드 ...

// 관리자인 경우에만 글쓰기 버튼 보이도록 조건 추가
if ($is_admin) {
    if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($admin_href) { ?><li><span class="jbutton large black"><a href="<?php echo $admin_href ?>">관리자</a></span></li><?php } ?>
            <?php if ($list_href) { ?><li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li><?php } ?>
            <?php if ($write_href) { ?><li><span class="jbutton large black"><a href="<?php echo $write_href ?>" class="width_j">글쓰기</a></span></li><?php } ?>
        </ul>
    <?php }
}

// 나머지 코드 ...
?>

    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>

	 <!-- 게시판 검색 시작 { -->
<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <div>
    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
<!--         <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option> -->
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input" size="15" maxlength="15">
    <span class="jbutton large black" style="margin-left:1px;  vertical-align:bottom;"><input type="submit" class="width_j2" id="btn_submit" value="검색"></span>
    </form>
    </div>
</fieldset>
<!-- } 게시판 검색 끝 -->

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
