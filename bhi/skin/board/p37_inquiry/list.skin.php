<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<style>
.all_chk { margin-bottom: 3px; }
.list_chk { position: absolute; right: 10px; top: 10px; z-index: 100; }
.list_wr { height: 25px; font-size: 0.92em; line-height: 1; display: inline-block; vertical-align: top; padding: 3px 5px; border-radius: 5px; }
#bo_list{padding:10vw;}
.as{display: flex; gap:10px; font-size:16px;padding:10px;}
</style>

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">

		<div class="as">
			<a href="/bbs/board.php?bo_table=b08">구매</a>
			<a href="/bbs/board.php?bo_table=sell">판매</a>
			<a href="/bbs/board.php?bo_table=swap" >스왑</a>
			<a href="/bbs/board.php?bo_table=inquiry" style="font-weight:bold;font-size:1.2rem;">온라인 문의</a>
			<a href="/bbs/board.php?bo_table=transfer">이체 문의</a>
		</div>
    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div id="bo_btn_top" style="display: none;">

        <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

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

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

	
	<div id="faq_wrap">
		<h2><?php echo $g5['title']; ?> 목록</h2>

		<?php if ($is_checkbox) { ?>
		<div class="all_chk">
			<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
			<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
		</div>
		<?php } ?>

		<?php if(count($list)) {?>

		<div id="faq_con" class="notice-list">
			<ul>
				<?php
				for ($i=0; $i<count($list); $i++) {				
				 ?>
				<li>
					<h3>
						
						<a href="<?php echo $list[$i]['href'] ?>">
							<?php echo cut_str($list[$i]['wr_datetime'], 10, ''); ?><br>
							<?php echo $list[$i]['subject'] ?>
						</a>
						<?php if ($is_checkbox) { ?>
						<div class="list_chk">
							<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
							<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
						</div>
						<?php } ?>
					
					</h3>					
					<style>
						.faq_list_close {position: absolute; top: 20px; right:15px; /* transform:translateY(-50%); -ms-transform:translateY(-50%); */}
						.faq_list_close > a > img {width: 15px; transition:all 0.3s; -webkit-transition:all 0.3s; -moz-transition:all 0.3s;}
						.faq_list_close > a > img.on {transform:rotate(180deg); -ms-transform:rotate(180deg);}
					</style>
				</li>

				<?
				}
				?>
				
			
			</ul>

		</div>

		<?
		}else{
			if($stx){
				echo '<div class="empty_list">검색된 게시물이 없습니다.</div>';
			}else{
				echo '<div class="empty_list">목록이 없습니다.</div>';
			
			}

		}

			
		?>
	</div>
   

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($is_checkbox) { ?>
            <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
            <!-- <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
            <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li> -->
            <?php } ?>
			<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01 btn"><i class="fa fa-list" aria-hidden="true"></i> 목록</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>

    </form>
     
       <!-- 게시판 검색 시작 { -->
    <fieldset id="bo_sch" style="display: none;">
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
            <!-- <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
            <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option> -->
            <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
            <!-- <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option> -->
        </select>
        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="검색어를 입력해주세요">
        <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
        </form>
    </fieldset>
    <!-- } 게시판 검색 끝 -->   
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->
<?php echo $write_pages;  ?>


<script>
$(function() {
    $(".closer_btn").on("click", function() {
        $(this).closest(".con_inner").slideToggle();
    });

	$('.faq_open').click(function(){
		$('.faq_plus').toggleClass('on');
		$('.table_wrap').slideToggle();
		$('.faq_title .line').toggleClass('on');
		$('.product_more').fadeToggle();
		$('.con_inner').slideUp();
		$('.faq_list_close > a > img').removeClass('on');
	})

	$('#faq_wrap h3').click(function(){
		$(this).siblings('.faq_list_close').find('> a > img').toggleClass('on');
		$(this).siblings('.con_inner').slideToggle();
		$(this).parent('li').siblings('li').find('.con_inner').slideUp();
		$(this).parent('li').siblings('li').find('.faq_list_close > a > img').removeClass('on');
	})
	$('.faq_list_close').click(function(){
		$(this).siblings('.con_inner').slideToggle();
		$(this).find('> a > img').toggleClass('on');
		$(this).parent('li').siblings('li').find('.faq_list_close > a > img').removeClass('on');
		$(this).parent('li').siblings('li').find('.con_inner').slideUp();
	})
});

</script>

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
