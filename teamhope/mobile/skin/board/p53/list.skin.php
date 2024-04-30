<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

?>

<style type="text/css">
.go_susu {position:absolute;width:60px;height:60px;background:#000;color:#fff;right:0px;top:0px;font-size:16px;text-align:center;line-height:60px;}
.gall_chk {z-index:50;}
#fboardlist {border-top:1px solid #fff; background:#fff;}

.board_texts {position:relative;max-width:660px;margin-top:30px;}
.board_texts p {text-align:left;;width:100%;}

.board_title_txt {font-size: 22px;color:#000;margin-bottom:35px;width:100%;overflow:hidden;white-space: nowrap;text-overflow: ellipsis;}
.board_content {font-size: 16px;color:#000;line-height:2;}
.board_content > img {display:none;}
.gall_con {padding:0 0 20px;max-width: 660px;}
.gall_img:after {content:"";clear:both;display: block;}
.gall_con {position:relative;}

.d_view {font-size:9px ;color: #a6a6a6;letter-spacing:2px;margin-top: 30px;padding-bottom: 5px;display: inline-block;width: 90px;}
.d_view:hover {color: #0eadb7;border-bottom: 1px solid #0eadb7;}
#container_title{
	display: none;
}
.p53_tit{
	margin-bottom: 160px;
}
#bo_gall #gall_ul{
	margin: 300px auto;
	max-width: 660px;
}
.p53_tit h1{
	text-align:center;
	font-size: 60px;
}

.board_texts span{
	position:absolute;
	bottom:0;
	font-size: 16px;
}
#bo_gall .gall_img img{
	width: 100%;
	height:auto;
}
.p53_ss{display: flex; gap: 80px; justify-content:center;}
.gall_li{width: 90%;margin:0 auto;}
</style>


<!-- 게시판 목록 시작 { -->
<div id="bo_gall" style="width:<?php echo $width; ?>">

    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
	

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <!-- <div id="bo_btn_top">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>
    
        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i>  글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div> -->
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->
    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">


    <ul id="gall_ul" class="gall_row">
	    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
    </div>
    <?php } ?>
				
		<div class="p53_tit">
			<h1>MEDIA</h1>
		</div>

        <?php
		for ($i=0; $i<count($list); $i++) {

            $classes = array();
            
            $classes[] = 'gall_li';

            if( $wr_id && $wr_id == $list[$i]['wr_id'] ){
                $classes[] = 'gall_now';
            }

			$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);
         ?>
		
        <li class="<?php echo implode(' ', $classes); ?>">
            <div class="gall_box">
                <div class="gall_chk">
                <?php if ($is_checkbox) { ?>
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                <?php } ?>
                <!-- <span class="sound_only">
                    <?php
                    if ($wr_id == $list[$i]['wr_id'])
                        echo "<span class=\"bo_current\">열람중</span>";
                    else
                        echo $list[$i]['num'];
                     ?>
                </span> -->
                </div>
				
                <div class="gall_con">
                    <div class="gall_img">
						<div class="gall_img_wrap" >
						<a href="<?php echo $list[$i]['href'] ?>">	
						<?php						
						if($thumb['src']) {
							$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
						} else {
							$img_content = '<span class="no_image">no image</span>';
						}

						echo $img_content;
						 
						?>
						</a>

						</div>
                        
                        <div class="board_texts">
							<a href="<?php echo $list[$i]['href'] ?>">							
								<p class="board_title_txt"><?php echo $list[$i]['subject']; ?></p>
							</a>
								
                                <!-- <p class="board_content"><?php echo cut_str(strip_tags($list[$i]['wr_content']),200,".."); ?></p> -->

								<!-- <span><?php echo date("Y-m-d", strtotime($list[$i]['wr_datetime'])); ?></span> -->
							
						</div>
						
                    </div><!--gall_img-->

                </div>
            </div>
        </li>
        <?php } ?>
        <?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?>
    </ul>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($is_checkbox) { ?>
            <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
            <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
            <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
            <?php } ?>
			<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01 btn"><i class="fa fa-list" aria-hidden="true"></i> 목록</a></li><?php } ?>

			<?php if ($member['mb_level'] >= 10) { // 관리자 레벨이 10 이상인 경우에만 '글쓰기' 버튼을 표시 ?>
			<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
			<?php } ?>
			<?php if ($is_admin) { // 관리자인 경우에만 '글쓰기' 버튼을 표시 ?>
				<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
			<?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>

    </form>

	

</div>



 <!-- 게시판 검색 시작 { -->
<!-- <fieldset id="bo_sch">
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
		<option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
		<option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
		<option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
	</select>
	<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
	<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="검색어를 입력해주세요">
	<button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
	</form>
</fieldset> -->
<!-- } 게시판 검색 끝 -->  

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