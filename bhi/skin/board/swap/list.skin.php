<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
   
// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

//echo $board_skin_url;
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<?php
//========================================================
// 페이지 변경시 필요한 소스 시작~!!!!!!!!!!!!!!

// 게시물 번호 내림차순으로 정렬
usort($list, function($a, $b) {
    return $b['wr_num'] - $a['wr_num'];
});

$write_pages = get_paging2($config['cf_write_pages'], $page, $total_page, "./board.php?bo_table=$bo_table".$qstr."&page=");
?>

<style>
#bo_list{width: 1280px;margin:0 auto;padding: 200px 0;}
/* pagenation */
.pagenation             {padding:0; text-align:center; margin: 30px 0;}
.pagenation li           {display:inline; padding:7px 0; border:1px solid #b6b6b6; margin:0 3px;}

.pagenation li a          {color:#424242; padding:0px 10px;}
.pagenation li a img      {vertical-align:middle;}
.pagenation li:hover        {background:#f8f8f8;}

.pagenation li.on          {background:#777777 ; border:1px solid #777777;}
.pagenation li.on a         {color:#ffffff;}
</style>
<style type="text/css">
#bo_list .jtbl_head01 .td_hit {width:79px;text-align:center; }
@media (min-width: 1400px)  {}
@media  (min-width: 1200px) and (max-width: 1399px) {}

@media (min-width: 1200px) {

 }
@media (max-width: 1199px) and (min-width: 1025px)  {

 }
 @media (max-width: 1024px) {

 }

@media (max-width: 767px) {
#bo_list .jtbl_head01 .td_numbig {width:80px;text-align:center; }
#bo_list .jtbl_head01 .td_name {width:105px; text-align:center; }
#bo_list .jtbl_head01 .td_date {width:105px; text-align:center; }
#bo_list .jtbl_head01 .td_hit {width:79px;text-align:center; }
/* #bo_list .jtbl_head01 .td_subject{padding:0 15px 0 20px;} */
.hide_mo {display:none ;}
/* .th_bg012 {background:none !important;} */
 }
 @media (max-width: 460px) {
#bo_list .jtbl_head01 .td_num {width:34px;text-align:center; }
#bo_list .jtbl_head01 .td_numbig {width:80px;text-align:center; }
#bo_list .jtbl_head01 .td_name {width:85px; text-align:center; }
#bo_list .jtbl_head01 .td_date {width:85px; text-align:center; }
#bo_list .jtbl_head01 .td_hit {width:79px;text-align:center; }
#bo_list .jtbl_head01 .td_subject{padding:0 10px 0 10px;}
.hide_mo {display:none ;}
/* .th_bg012 {background:none !important;} */
 }
.status_select {
    width: 100%;
    border: solid 1px #000;
    padding: 3px;
    -webkit-appearance: none; /* 기본 화살표 제거 */
    -moz-appearance: none; /* 기본 화살표 제거 */
    appearance: none; /* 기본 화살표 제거 */
    background: url('/images/select_down.png') no-repeat right 10px center; /* 화살표 이미지 추가 */
    background-color: #fff; /* 배경색 추가 */
    background-size: 12px; /* 이미지 크기 조절 */
}
.as{display: flex; gap:10px; font-size:16px;padding:10px;}
</style>

<!-- <h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>-->

<!-- 게시판 목록 시작 { -->
<div id="bo_list">

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

    <div class="jtbl_head01 jtbl_wrap">
		<div class="as">
			<a href="/bbs/board.php?bo_table=b08">구매</a>
			<a href="/bbs/board.php?bo_table=sell">판매</a>
			<a href="/bbs/board.php?bo_table=swap" style="font-weight:bold;font-size:1.2rem;">스왑</a>
			<a href="/bbs/board.php?bo_table=inquiry">온라인 문의</a>
			<a href="/bbs/board.php?bo_table=transfer">이체 문의</a>
		</div>
        <table>
        <caption><?php echo $board['bo_subject'] ?> 목록</caption>
        <thead>
        <tr>
            <th scope="col" class=" ">NO</th>
            <?php if ($is_checkbox && $is_admin == 'super') { ?>
            <th scope="col" class="">
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            </th>
            <?php } ?>
            <th scope="col" class=" ">내용</th>
            <th scope="col" class="hide_mo ">신청자</th>
            <th class="" scope="col" class=""><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>작성일</a></th>
            <!-- <th class="hide_mo" scope="col" <?php if ($is_good) { ?>class=""<? } ?>><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회수</a></th> -->
            <th class="hide_mo" scope="col">진행여부</th>
            <?php if ($is_good) { ?><th scope="col" class=""><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
            <?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
        </tr>
		
        </thead> 
        <tbody>
        <?php
        for ($i=0; $i<count($list); $i++) {
         ?>
        <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
            <td class="td_num">
            <?php
            if ($list[$i]['is_notice']) // 공지사항
                echo '<strong>공지</strong>';
            else if ($wr_id == $list[$i]['wr_id'])
                echo "<span class=\"bo_current\">열람중</span>";
            else
                echo $list[$i]['wr_num'];
             ?>
            </td>
            <?php if ($is_checkbox && $is_admin == 'super') { ?>
            <td class="td_chk">
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
            </td>
            <?php } ?>
			<td class="td_subject">
				<?php
				echo $list[$i]['icon_reply'];
				if ($is_category && $list[$i]['ca_name']) {
				?>
				<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
				<?php } ?>

				<a href="<?php echo $list[$i]['href'] ?>">
					<?php 
					// 내용이 100자 이상일 경우 "..."으로 표시
					$content = $list[$i]['wr_2'];
					if (mb_strlen($content) > 100) {
						echo mb_strimwidth($content, 0, 100, "...", "UTF-8");
					} else {
						echo $content;
					}
					?>
					<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span>[<?=$list[$i]['comment_cnt']; ?>]<span class="sound_only">개</span><?php } ?>
				</a>

				<?php
				// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
				// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

				/*  if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
					if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];

					if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];*/
				//  if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
				if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

				?>
			</td>

            <td class="td_name hide_mo sv_use"><?php echo $list[$i]['mb_id'] ?></td>
            <td class="td_date "><?php echo $list[$i]['datetime'] ?></td>
            <!-- <td class="td_hit hide_mo"><?php echo $list[$i]['wr_hit'] ?></td> -->
            <td class="td_hit hide_mo">
			<select name="wr_<?php echo $list[$i]['wr_id'] ?>" id="wr_6" class="status_select">
				<option value='1' <?php if($list[$i]['wr_6'] == '1') echo "selected"; ?>>진행중</option>
				<option value='2' <?php if($list[$i]['wr_6'] == '2') echo "selected"; ?>>완료</option>
				<option value='3' <?php if($list[$i]['wr_6'] == '3') echo "selected"; ?>>환불</option>
			</select>
			</td>
            <?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
            <?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
        </tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox && $is_admin == 'super') { ?>
        <ul class="btn_bo_adm">
            <li><span class="jbutton large black" ><input style="background:none" type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택저장" onclick="document.pressed=this.value"></span></li> <!-- 추가 -->
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
        	 <?php if ($admin_href) { ?><li><span class="jbutton large black"><a href="<?php echo $admin_href ?>">관리자</a></span></li><?php } ?>
            <?php if ($list_href) { ?><li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li><?php } ?>
            <?php if ($write_href) { ?><li><span class="jbutton large black"><a href="<?php echo $write_href ?>" class="width_j">글쓰기</a></span></li><?php } ?>
        </ul>
        <?php } ?>
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
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
<!--         <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option> -->
        <!-- <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option> -->
      <!--   <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option> -->
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input" size="15" maxlength="15">
    <span class="jbutton large black" style="margin-left:1px; ;"><input type="submit" class="width_j2" id="btn_submit" value="검색"></span>
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
