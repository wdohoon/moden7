<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<link rel="stylesheet" href="../css/index.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/index.js"></script>

<style type="text/css">
#gall_allchk {margin:5px 10px;}
.gall_box01_wrap {overflow:hidden;position:relative;margin-top:3px}
.gall_box01 {font-size:14px;line-height:1.4em}
.gall_left01 {display:inline-block;width:50px;}
.gall_left02 {display:inline-block;}
	#bo_gall{
		padding: 150px 260px 150px 260px;
	}
	#bo_gall .bo_title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	#bo_gall .bo_title h1{
		font-size: 44px;
	}

	.gall_con{
		height: 100%;	
	}

	.gall_text_href{
		height: 100%;
	}
	#bo_gall .times img{
		position: relative;
	}
	#bo_gall .times{
		bottom: 20px;
		position: relative;
		font-size: 14px;
		color: #979797;
		display: flex;
		justify-content: space-between;
	}
	.gall_row .col-gn-4{
		width: calc(25% - 30px);
		padding: 30px;
	}
	#bo_gall .gall_text_href a{
		color: #002e6c;
		font-size: 18px;
		font-weight: bold;
	}
	.gall_text_href span{
		display: flex;
		font-size: 14px;
		margin-bottom: 10px;
	}
	#bo_sch .search_img{
		background: #f5f5f5;
		height: 60px;
		display: flex;
		align-items: center;
		width: 50px;
		justify-content: center;
	}
	.search-container {
		position: relative;
		display: flex;
	}
	#btn_submit{
		width: 20px;
		height: 20px;
	}
	#bo_sch form{
		display: flex;
		justify-content: flex-end;
		gap: 10px;
		flex-wrap: wrap;
	}
	#stx{
		border-radius: unset;
	}
	.pg_wrap{
		display: flex;
		float: none;
		justify-content: center;
		align-items: center;
	}
	.pg_current{
		background: #002e6c;
		border: none;
		border-radius: inherit;
		width: 40px;
		height: 40px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.pg_page{
		background: #fff;
	}
	.pg_start{
		background: url(../img/prev_btn.png) no-repeat 50% 50%;
		width: 40px;
		height: 40px;
	}
	.pg_end{
		background: url(../img/next_btn.png) no-repeat 50% 50%;
		width: 40px;
		height: 40px;
	}
	.pg_wrap a{
		border: none;
		font-size: 14px;
		width: 40px;
		height: 40px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.pg_wrap span{
		display: flex;
		align-items:center;
	}

	.banner_wrap .banner ul{
		display: flex;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
		padding-left: 260px;
	}
	.banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	.banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.banner_wrap .banner ul li a{
		color: #fff;
	}
	.fixeds_mo .banner_mo img{
		width: 10px;
		height: 10px;
	}
	.fixeds_mo .banner_mos {
		position: relative;
		width: 100%;
	}

	.fixeds_mo .banner_mo ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
	}

	.fixeds_mo .banner_mo li {
		margin-right: 20px;
		width: 100%;
	}

	.fixeds_mo .banner_mo a {
		text-decoration: none;
		color: #fff;
		padding: 30px;
		font-size: 20px;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.fixeds_mo .banner_mo li:hover .dropdown {
		display: block;
	}
	
	.fixeds_mo .dropdown li,
	.fixeds_mo .dropdown2 li{
		padding: 10px;
		width: 100%; 
	}
	.fixeds_mo{
		position: absolute;
		width: 90%;
		display: flex;
		align-items: center;
		margin: 0 30px 0 30px;
		background: #002e6c;
		height: 80px;
		top: 26.04vw;
	}
	@media(max-width:1400px){
		.banner_wrap  ul{
			height: 5.17vw;
		}
		#bo_gall{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		.gall_row .col-gn-4{
			width: calc(33.3333% - 14px);
		}
		#bo_gall #gall_ul{
			gap: 20px;
		}
		.info_wrapper{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		.banner_wrap .banner ul{
			padding-left: 8.6vw;
			font-size: 1.54vw;
			height: 5.17vw;
		}
		.banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		.banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		.banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}
		.info_wrapper .info .left,
		.info_wrapper .info .right{
			width: 100%;
		}
		.fixeds_mo .banner_mo li{
			width: 100%;
		}
	}
	@media (max-width: 950px) {
		.info_wrapper .sub_wrap ul{
			font-size: 14px;
		}
	}
	@media(max-width:768px){
		#bo_gall{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
		.gall_row .col-gn-4{
			width: calc(50% - 10px);
		}
		#bo_sch #stx{
			width: 100% !important;
		}
		.banner_wrap{
			display: none;
		}
		.fixeds_mo .banner_mo ul{
			border-bottom: solid 2px #fff;
		}
		.fixeds_mo .banner_mo li{
			width: 100%;
		}
		.fixeds_mo .all-dropdowns{
			display: none;
		    background: #002e6c;
			position: absolute;
			width: 100%;
			top: 100%;
			left: 0;
			z-index: 2;
		}
		.fixeds_mo .all-dropdowns ul{
			border-bottom: solid 2px #fff;
		}
	}
	@media (min-width: 768px) {
		.fixeds_mo{
			display: none;
		}
	}
	@media(max-width:460px){
		.gall_row .col-gn-4{
			width: 100%;
		}
	}
</style>
<?php if($bo_table == 'archive'){?>
	<style>
		.banner_wrap .banner ul li,
		.fixeds_mo{
			display: none;
		}
	
		@media(max-width : 768px){
			.banner_wrap{
				display: block;
			}
		}
	</style>
<?php }?>

<!-- 게시판 목록 시작 { -->
	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<?php 
					if($bo_table == 'reousrces_2'){
						echo'<li><a href="/fixedincome.php">FIXED INCOME</a></li>';
					}else if($bo_table == 'resources'){
						echo'<li> <a href="/derivatives.php">DERIVATIVES</a></li>';
					} else if($bo_table == 'money'){
						echo'<li> <a href="/moneymarket.php" >MONEY MARKET</a></li>';
					} 
				?>
				<li class="first"><a href="/bbs/board.php?bo_table=resources">RESOURCES</a></li>
			</ul>
		</div>
	</div>

<div class="fixeds_mo">
    <div class="banner_mos">
        <div class="banner_mo">
            <ul>                            
                <li>
					<a href="/bbs/board.php?bo_table=reousrces_2" id="fixedIncomeBtn">RESOURCES<img src="../img/drop.png" alt=""></a>
						<div class="all-dropdowns" id="resourcesDropdown">
                        <ul class="dropdown">
                            <li>
								<?php 
									if($bo_table == 'reousrces_2'){
										echo '<a href="/fixedincome.php" id="fixedIncomeBtn">FIXED INCOME <img src="../img/drop.png" alt=""></a>';
									} else if($bo_table == 'resources'){
										echo '<a href="/moneymarket.php" id="fixedIncomeBtn">MONEY MARKET <img src="../img/drop.png" alt=""></a>';
									}
								?>
							</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


<div id="bo_gall" style="width:<?php echo $width; ?>">

    <?php if ($is_category) { ?>
    <div class="new_cate01">
        <!-- <h2><?php echo $board['bo_subject'] ?> 카테고리</h2> -->
        <ul >
            <?php echo $category_option ?>
        </ul>
    </div>
    <?php } ?>



    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
     <div id="bo_btn_top" style="display:none;">
        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i>  글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->
	<div class="bo_title">
		<span>CONNECTING THE WORLD</span>
		<?php if($bo_table == 'archive'){?>
			<h1>NOTICE</h1>	
		<?php } else if($bo_table == 'COMPLAINT'){ ?>
			<h1>COMPLAINT</h1>
		<?php } else {?>
			<h1>RESOURCES</h1>	
		<?php }?>
	</div>
	<div class="solid"></div>

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
		</select>
		<div class="search-container">
			<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
			<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input " onclick="document.getElementById('fsearch').submit();">
			<div class="search_img">
				<input type="image" src="../img/search.png" class="width_j2" id="btn_submit" alt="검색">
			</div>
		</div>
		</form>
	</fieldset>

	<!-- } 게시물 검색 끝 -->

    <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
	<?if(count($list)  > 0){?>
    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
    </div>
    <?php } ?>
    <?php } ?>

    <ul id="gall_ul" class="gall_row">
        <?php 
		for ($i=0; $i<count($list); $i++) {

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
            <div class="gall_box">
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
                <div class="gall_con">
			
                    <div class="gall_img">
                        <a href="<?php echo $list[$i]['href'] ?>">
                        <?php
                        if ($list[$i]['is_notice']) { // 공지사항  ?>
                            <span class="is_notice">공지</span>
                        <?php } else {
                            $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

                            if($thumb['src']) {
                                $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
                            } else {
                                $img_content = '<span class="no_image">no image</span>';
                            }

                           //echo $img_content;
                        }
                         ?>
                        </a>
                    </div>
					 <div class="gall_text_href">
                        <?php
                        // echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
                        if ($is_category && $list[$i]['ca_name']) {
                         ?>
                        <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                        <?php } ?>
						<span>NO.<?php echo $list[$i]['wr_id'];?></span>
                        <a href="<?php echo $list[$i]['href'] ?>" class="bo_tit">
                            <?php echo cut_str($list[$i]['subject'],27,'...') ?>
                            <?php
                            // if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
                            // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

                            //if (isset($list[$i]['icon_new'])) echo rtrim($list[$i]['icon_new']);
                           // if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot']);
                            //if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file']);
                            //if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link']);
                          //  if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']);
                             ?>
                         </a>
						 
						<!--  <div class="gall_box01_wrap">
						 							 <div class="gall_box01">
						 								 <div class="gall_left01">작성자</div><div class="gall_left02"><?php echo $list[$i]['wr_name'] ?></div>
						 							 </div>
						 							  <div class="gall_box01">
						 								 <div class="gall_left01">작성일</div><div class="gall_left02"><?php echo date("y-m-d ", strtotime($list[$i]['datetime'])) ?></div>
						 							 </div>
						 							  <div class="gall_box01">
						 								 <div class="gall_left01">조회수</div><div class="gall_left02"><?php echo $list[$i]['wr_hit'] ?></div>
						 							 </div>
						 </div> -->
                    </div>
					<div class="times">
						<span><?php echo date("Y.m.d", strtotime($list[$i]['wr_datetime'])) ?></span>
						<div class="downloads">
							<?php 
								$row = sql_fetch("select * from g5_board_file where bo_table = '$bo_table' and wr_id = '{$list[$i]['wr_id']}' ");
							?>
							
                            
                            <?php
							
							if($list[$i]['wr_1'] && $list[$i]['wr_2']){    // db이전
							?>	
							
                            <a href="/data/kidb/<?php echo $list[$i]['wr_2'];  ?> " download="<?php echo $list[$i]['wr_2']?>"><img src="../img/down.png" alt=""></a>
                            	
                                
							<?php	
							}else if($list[$i]['wr_1'] && !$list[$i]['wr_2']){   // db이전. 첨부파일 없는경우
							?>	
							
                            &nbsp;
                            
                            
                            <?php	
							}							
							   
							else{  // 원래 게시판 글쓰기.
							
                            ?>
                            
                            <a href="<?php echo '/data/file/'.$board['bo_table'].'/'.$row['bf_file'];  ?>" download="<?php echo $row['bf_source']?>"><img src="../img/down.png" alt=""></a>

                            <?php
							}
							?>
                            
                            
                            
						</div>
					 </div>
                    
                </div>
            </div>
        </li>
        <?php } ?>
        <?php if (count($list) == 0) { echo "<li class=\"empty_list\">등록된 게시물이 없습니다.</li>"; } ?>
    </ul>

    <?php if($cnt) { ?>
    <!-- 첨부파일 시작 { -->
    <section id="bo_v_file">
        <h2>첨부파일</h2>
        <ul>
        <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
            <li>
                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                    <img src="<?php echo $board_skin_url ?>/img/icon_file.gif" alt="첨부">
                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
                    <?php echo $view['file'][$i]['bf_content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                </a>
                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드</span>
                <span>DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 첨부파일 끝 -->
    <?php } ?>

<?php if ( ($bo_table == 'reousrces_2' && ($member['mb_id'] == 'manager1' || $member['mb_id'] == 'admin')) || ($bo_table == 'money' && ($member['mb_id'] == 'manager2' || $member['mb_id'] == 'admin')) || ($bo_table == 'resources' && ($member['mb_id'] == 'manager3' || $member['mb_id'] == 'admin')) || ($bo_table == 'archive' && ($member['mb_id'] == 'manager4' || $member['mb_id'] == 'admin')) || ($bo_table == 'COMPLAINT' && ($member['mb_id'] == 'manager4' || $member['mb_id'] == 'admin')) ) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox && $is_admin == 'super') { ?>
        <ul class="btn_bo_adm">
            <li><span class="jbutton large black" ><input style="background:none" type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></span></li>
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
     
<?php echo $write_pages;  ?>

</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->

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