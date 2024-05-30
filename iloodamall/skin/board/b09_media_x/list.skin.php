<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// 썸네일 크기 설정
$thumb_width = '451';    //썸네일 넓이
$thumb_height = '256';    //썸네일 높이

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<style type="text/css">
#gall_allchk {margin:5px 0;}
.gall_li {margin-bottom:10px;}
.gall_box01_wrap {overflow:hidden;position:relative;margin-top:5px}
.gall_box01 {font-size:14px;line-height:1.4em;height:40px;text-overflow:ellipsis;white-space: nowrap;overflow:hidden;letter-spacing:-0.8px}
.gall_left01 {display:inline-block;width:50px;}
.gall_left02 {display:inline-block;}
 .g_play_btn {
    width: 62px;
    height: 62px;
    position: absolute;
    left: 50%;
    margin-left: -31px;
    top: 50%;
    margin-top: -31px;}
</style>
<style>
.new_cate03 {position:relative;margin-top:0px;margin-bottom:80px;text-align:center;}
.new_cate03 ul {overflow:hidden;display:inline-block;}
.new_cate03 ul li {float:left;margin-left:65px;}
.new_cate03 ul li:first-child {display:none !important;margin-left:0px;}
.new_cate03 ul li.bobo0 {margin-left:0px;}
.new_cate03 ul li a {display:block;/* min-width:180px; */line-height:22px;font-size:15px;color:#231f20;letter-spacing:-0.5px;padding:0px 5px;word-break:keep-all;font-weight:bold}

.new_cate03 ul li a#bo_cate_on {background-image:url(/images/new_ca03_bg.png);background-repeat:repeat-x;;background-position:center;}
.new_cate03 ul li a:hover {background-image:url(/images/new_ca03_bg.png);background-repeat:repeat-x;;background-position:center;}
.new_con {margin-top:10px}
@media (max-width: 1100px) {
.new_cate03 {margin-bottom:60px;}
.new_cate03 ul li {float:left;margin-left:55px;}
.new_cate03 ul li a#bo_cate_on {background-position:bottom;}
.new_cate03 ul li a:hover {background-position:bottom;}

}
@media (max-width: 1024px) {
.new_cate03 ul li {float:left;margin-left:45px;}
 }
@media (max-width: 767px) {
.new_cate03 {margin-bottom:50px}
.new_cate03 ul {overflow:hidden;display:block;}
.new_cate03 ul li a {display:inline-block;font-size:14px;}
.new_cate03 ul li {float:left;width:33.33333333%;margin-left:0px;padding:0.5% 0.5%;}

 }
@media (max-width: 460px) {

}
</style>

<?php
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
.pagenation             {padding:0; text-align:center; margin: 30px 0;}
.pagenation li           {display:inline; padding:7px 0; border:1px solid #b6b6b6; margin:0 3px;}

.pagenation li a          {color:#424242; padding:0px 10px;}
.pagenation li a img      {vertical-align:middle;}
.pagenation li:hover        {background:#f8f8f8;}

.pagenation li.on          {background:#777777 ; border:1px solid #777777;}
.pagenation li.on a         {color:#ffffff;}
</style>
<?php
// 비메오 썸네일 추출 함수
function get_vimeo($url){
	if (!function_exists('curl_init')) die('CURL is not installed!');
	$ch = curl_init(); 
	curl_setopt ($ch, CURLOPT_URL,$url); 
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	$result=curl_exec($ch);                        // 긁어온것을 $result에 저장
	curl_close($ch); 
	return $result;
}
?>

<!-- <h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2> -->

<!-- 게시판 목록 시작 { -->
<div id="bo_gall" style="width:<?php echo $width; ?>">

    <?php if ($is_category) { ?>

    <div class="new_cate03">
        <ul class="">
            <?php echo $category_option ?>
        </ul>
	</div>
    <?php } ?>

    <div class="bo_fx" style="display:none;">
       <!--  <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div> -->

        <?php if ($rss_href || $write_href) { ?>
        <!-- <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul> -->
        <?php } ?>
    </div>
	
	<!-- 게시물 검색 시작 { -->
<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
     <!--    <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option> -->
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
      <!--   <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option> -->
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
	<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input " size="15" maxlength="15">
      <span class="jbutton large black" style=""><input type="submit" class="width_j2" id="btn_submit" value="검색"></span>
    </form>
</fieldset>
<!-- } 게시물 검색 끝 -->

    <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
    </div>
    <?php } ?>

     <ul id="gall_ul" class="gall_row">
        <?php for ($i=0; $i<count($list); $i++) {

            $classes = array();
            
            $classes[] = 'gall_li';
            $classes[] = 'col-gn-'.$bo_gallery_cols;

            if( $i && ($i % $bo_gallery_cols == 0) ){
                $classes[] = '';
            }

            if( $wr_id && $wr_id == $list[$i]['wr_id'] ){
                $classes[] = 'gall_now';
            }
         ?>
        <li class="<?php echo implode(' ', $classes); ?>">
			  <div class="gall_chk">
                <?php if ($is_checkbox) { ?>
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                <?php } ?>
				<span class="sound_only">
                    <?php
                    if ($wr_id == $list[$i]['wr_id'])
                        echo "<span class=\"bo_current\">열람중</span>";
                    else
                        echo $list[$i]['num'];
                     ?>
                </span>
              </div>
              <div class="gall_box">
              
                
                <div class="gall_con">
			
                    <div class="gall_img">

				<?if($list[$i]['wr_1'] != "" || $list[$i]['wr_2'] != "" || $list[$i]['wr_3'] != "" || $list[$i]['wr_4'] != ""){?>
					<div class="g_play_btn">
                    <a href="<?php echo $list[$i]['href'] ?>"><img src="<?=$board_skin_url?>/img/play_btn01_n1.png" style="border:0px solid #dcdcdc;" alt="play" border="0" /></a>
                    </div>
				<?}?>
                    <a href="<?php echo $list[$i]['href'] ?>">
                    <?php
                    if ($list[$i]['is_notice']) { // 공지사항  ?>
                        <strong style="width:<?php echo $thumb_width ?>px;height:45px">공지</strong>
                    <?php } else {
                      //  $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $thumb_width, $thumb_height); // 썸네일 크기를 위에서 선언한 크기사용
					$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);
						//  유튜브, 비메오 썸네일 추출
						if(!$thumb){ // 썸네일이 없는 경우
							if($list[$i]['wr_1']) { // 유튜브 이미지 출력
								$thumb['src'] = "http://img.youtube.com/vi/{$list[$i][wr_1]}/mqdefault.jpg";
							} elseif ($list[$i]['wr_2']){ // 비메오 이미지 출력
								$output=get_vimeo("http://vimeo.com/api/v2/video/".$list[$i]['wr_2'].".php");
								$output=unserialize($output);
								// echo "<img src='".$output[0][thumbnail_medium]."'>"; //thumbnail_small, thumbnail_medium, thumbnail_large
								$thumb['src'] = $output[0][thumbnail_medium];
							} 
						}
						//  유튜브, 비메오 썸네일 추출 end 

						
						if($thumb['src']) {
                            $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
                        } 
						else if ($list[$i]['wr_file'] >1) {
							echo '<img src="/images/button_video_play.png" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
							
						}
						else {
							$img_content = '<span style="width:'.$board['bo_gallery_width'].'px;height:'.$board['bo_gallery_height'].'px">no image</span>';
                        }

                        echo $img_content;
                    }
                     ?>
                    </a>
                  </div>
			

         <div class="gall_text_href">
                        <?php
                        // echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
                        if ($is_category && $list[$i]['ca_name']) {
                         ?>
                        <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link">[<?php echo $list[$i]['ca_name'] ?>]</a>
                        <?php } ?>
                        <a href="<?php echo $list[$i]['href'] ?>" class="bo_tit">
                           <?php echo cut_str($list[$i]['subject'],50,'..') ?>
                         <?
								$wr_content1 = nl2br(stripslashes(get_text($list[$i]['wr_content'])));			
							?>
						  <div class="gall_box01_wrap">
						 							 <div class="gall_box01">
						 								<?php echo cut_str($wr_content1,118);?>
						 							 </div>
						 </div>
						 </a>

                    </div>
				
                    
                </div>
            </div>
        </li>
        <?php } ?>
        <?php if (count($list) == 0) { echo "<li class=\"empty_list\">등록된 게시물이 없습니다.</li>"; } ?>
    </ul>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx" style="padding-top:20px;">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></span></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($admin_href) { ?><li><span class="jbutton large black"><a href="<?php echo $admin_href ?>">관리자</a></span></li><?php } ?>
          <!--   <?if($is_admin){?><?php if ($list_href) { ?><li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li><?php } ?><?php } ?> -->
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

    if (sw == 'copy')
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
