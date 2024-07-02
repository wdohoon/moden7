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

.new{position: absolute; right:40px; top:50%; margin-top:-9px; width:35px; height:18px; line-height: 17px; border-radius:3px; background: #0F1A8D; font-size:11px; color: #fff; text-align: center;}

</style>

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">


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
			

			$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'],false,true);



				 ?>
				<li>
					<h3>
						
						<a href="javascript:;">
							<?php echo cut_str($list[$i]['wr_datetime'], 10, ''); ?><br>
							<?php echo $list[$i]['subject'] ?>
						</a>
						<?php if ($is_checkbox) { ?>
						<div class="list_chk">
							<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
							<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
						</div>
						<?php } if (isset($list[$i]['icon_new'])){ //echo $list[$i]['icon_new']; ?><div class="new">New</div>
						<?php } ?>
						
					</h3>
					<div class="con_inner">
						<!-- <span class="tit_bg">A</span> -->

						<div>
						<?php echo get_view_thumbnail(conv_content($list[$i]['wr_content'], 2)); ?>
						</div>

						<?php
						// 파일 정보 불러오기
						$file = get_file($bo_table, $list[$i]['wr_id']);	
						
						$cnt = 0;
						if ($file['count']) {
							for($j=0; $j<$file['count']; $j++){
								if (isset($file[$j]['source']) && $file[$j]['source'] && !$file[$j]['view'])
									$cnt++;
							}
						}
						
						//이미지
						for($j=0; $j<$file['count']; $j++){
							if($file[$j]['image_type']){
								echo get_view_thumbnail($file[$j]['view']).'<br>';
								//echo $file[$j][view]."<br>";
							}
						}

						?>

						<?php
						if ($cnt) {
							$ss_name = 'ss_view_'.$bo_table.'_'.$list[$i]['wr_id'];
							if (!get_session($ss_name)) {
								set_session($ss_name, TRUE);
							}
						?>
						<!-- 첨부파일 시작 { -->
						<div id="bo_v_file" style="margin-top: 20px;">
							<h2>첨부파일</h2>
							<ul>

							<?
							// 파일
							for($j=0; $j<$file['count']; $j++){
								if(!$file[$j]['image_type']){
									echo '<li style="border:0;background:0;margin:0;">';
									echo '<i class="fa fa-download" aria-hidden="true"></i> ';
									echo '<a href="'.$file[$j]['href'].'" ><strong>'.$file[$j]['source'].'</strong></a> ('.$file[$j]['size'].')';
									echo '</li>';
								}
								if($j == $file['count']-1)
									echo "";
							}
							?>
							</ul>

						</div>
						<!-- } 첨부파일 끝 -->
						<?}?>


						<?php if(isset($list[$i]['link'][1]) && $list[$i]['link'][1]) { ?>
						<!-- 관련링크 시작 { -->
						<div id="bo_v_link">
							<h2>관련링크</h2>
							<ul>
							<?php
							// 링크
							$cnt = 0;
							for ($j=1; $j<=count($list[$i]['link']); $j++) {
								if ($list[$i]['link'][$j]) {
									$cnt++;
									$link = cut_str($list[$i]['link'][$j], 70);
							?>
								<li style="border:0;background:0;margin:0;">
									<i class="fa fa-link" aria-hidden="true"></i>
									<a href="<?php echo $list[$i]['link_href'][$j] ?>" target="_blank"><strong><?php echo $link ?></strong></a>
									<span class="bo_v_link_cnt"><?php echo $list[$i]['link_hit'][$j] ?>회 연결</span>
								</li>
								<?php
								}
							}
							?>
							</ul>
						</div>
						<!-- } 관련링크 끝 -->
						<?php } ?>

						<?php if($is_admin) { ?>
						<div class="con_closer">
						<?if($write_href){?>
						<a href="<?php echo $list[$i]['href'] ?>" class="list_wr btn_b03">수정</a>
						<?}?>
						<button type="button" class="closer_btn btn_b03">닫기</button>					
						
						</div>
						<?php } ?>
					</div>
					<style>
						.faq_list_close {position: absolute; top: 20px; right:15px; /* transform:translateY(-50%); -ms-transform:translateY(-50%); */}
						.faq_list_close > a > img {width: 15px; transition:all 0.3s; -webkit-transition:all 0.3s; -moz-transition:all 0.3s;}
						.faq_list_close > a > img.on {transform:rotate(180deg); -ms-transform:rotate(180deg);}
					</style>
					<div class="faq_list_close">
						<!-- <a href="javascript:;"><img src="<?php echo $board_skin_url ?>/img/plus_small.png" alt=""></a> -->
						<a href="javascript:;"><img src="<?php echo $board_skin_url ?>/img/arrow_small.png" alt=""></a>
					</div>
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
            <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
            <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
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
