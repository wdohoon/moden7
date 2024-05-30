<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>



<style>
#bg_board_wrap {padding-top:10px;}
.write_head { max-width:120px;width:15%;min-width:70px;text-align:center; color:#000000; font-size:13px; font-weight:bold; background-color: #f5f5f5; border-right:0px solid #999;border-left:0px;; border-bottom:1px solid #999; }
.write_body { font-size:13px;background-color: #ffffff;  border-right:0px solid #999; border-bottom:1px solid #999; padding:11px 5px 11px 10px; }
.write_body2 { font-size:13px;background-color: #ffffff; width:106px; padding:11px 0 11px 20px; border-right:1px solid #999; border-bottom:1px solid #999; }
.write_contents { background-color: #ffffff; border-bottom:1px solid #999; padding:10px; font-size:13px;}
.field { border:1px solid #ccc;  }
#p_n_datetime{text-align:right; display:block;float:right; padding-right:10px;font-size:13px;}
#writeContents{}

/* border-top 에서 가져온 css */
.board_title {display:none;}
.board_wrap {padding:0px;}

/* swiper 페이지 */
.swiper-pagination {}
.swiper-horizontal>.swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal, .swiper-pagination-custom, .swiper-pagination-fraction {bottom:45px;}
.swiper-pagination-bullet {width:12px;height:12px;background:#959595;opacity:1;}
.swiper-pagination-bullet-active {background:#fff;}

.swiper-pagination-custom, .swiper-pagination01.swiper-pagination-fraction {position:absolute;width:40px;height:20px;left:auto;text-align:center;right:20px;top:20px;z-index:2;background:#000;border-radius:50px;color:#fff;line-height:20px;}
.swiper-pagination-current {}
/* 상단에 노출되는 회원 정보 */
.profile_info_name {padding:25px 25px;border-radius:30px 30px 0px 0px;margin-top:-24px;z-index:21;position:relative;background:#fff;}
.profile_info_name::after {content:"";display:block;clear:both;}
.left_info {float:left;width:50%:}
.left_info p {font-size:20px;font-weight: 700;}
.left_info p span {font-weight: 300;}
.left_info p.sub_info {font-weight:300;font-size:16px;;}

.right_info {float:right;width:44%;}
.right_info ul {text-align:center;float:right;margin-top:10px;}
.right_info ul:after {content:"";display:block;clear:both;}
.right_info ul li {float:left;width:30px;margin-left:25px;}
.right_info ul li:first-child {margin-left:0px;}
.right_info ul li a {}
.right_info ul li img {display:block;width:100%;margin-bottom:5px;}
.right_info ul li.rank_icon {width:45px;text-align:center;}
.right_info ul li.rank_icon li {}
.right_info ul li.rank_icon img {width:26px;margin:0 auto;margin-bottom:3px;}

/* 컨텐츠 시작 */
#bg_board_wrap {background:#f7f7f7;}

.board_box {padding:20px;}
h2.pf_tit {font-size:20px;font-weight:700;}

.profile_wrapper {padding:20px 0 20px;border-bottom:1px solid #ebebeb;}
.profile_wrapper h3.pf_sub_tit {font-size:18px;font-weight:700;line-height:40px;margin-bottom:20px;}
p.pf_data {font-size:18px;font-weight:300;margin-bottom:20px;}
p.pf_data span {}
p.pf_data span.name_title {color:#9c9c9c;width:30%;display:inline-block;}
p.pf_data span.dec_title {width:70%;display:inline-block;}

/* 스윙 분석 */
.college_li {}
.college_li img {border-radius:0.5em;}


@media only screen and (max-width: 1199px) { /* viewport width : 1199 */

}

@media only screen and (max-width: 1024px) { /* viewport width : 1024 */

}

@media only screen and (max-width: 767px) { /* viewport width : 767 */

}

@media only screen and (max-width: 460px) { /* viewport width : 460 */
/* 상단에 노출되는 회원 정보 */
.profile_info_name {padding:25px 25px;border-radius:30px 30px 0px 0px;margin-top:-24px;z-index:21;position:relative;background:#fff;}
.profile_info_name::after {content:"";display:block;clear:both;}
.left_info {float:left;width:46%:}
.left_info p {font-size:18px;font-weight: 700;}
.left_info p span {font-weight: 300;}
.left_info p.sub_info {font-weight:300;font-size:14px;letter-spacing:-0.05em;}

.right_info {float:right;width:44%;}
.right_info ul {text-align:center;float:right;margin-top:5px;}
.right_info ul li {float:left;width:25px;margin-left:22px;}
.right_info ul li.rank_icon {width:45px;text-align:center;}
.right_info ul li.rank_icon img {width:23px;margin:0 auto;margin-bottom:3px;}

.board_box {padding:20px;}
h2.pf_tit {font-size:18px;font-weight:700;}

.profile_wrapper {padding:20px 0 20px;border-bottom:1px solid #ebebeb;}
.profile_wrapper h3.pf_sub_tit {font-size:16px;font-weight:700;line-height:40px;margin-bottom:20px;}
p.pf_data {font-size:16px;font-weight:300;margin-bottom:20px;}
p.pf_data span {}
p.pf_data span.name_title {color:#9c9c9c;width:40%;display:inline-block;}
p.pf_data span.dec_title {width:60%;display:inline-block;}

}

@media only screen and (max-width: 375px) { /* viewport width : 375 */
.profile_info_name {padding:25px 25px;}
.profile_info_name::after {content:"";display:block;clear:both;}
.left_info p {font-size:16px;font-weight: 700;}
.left_info p span {font-weight: 300;font-size:14px;}
.left_info p.sub_info {font-weight:300;font-size:13px;letter-spacing:-0.05em;}

.right_info ul li {float:left;width:35px;margin-left:10px;}
.right_info ul li img {display:block;width:24px;margin:0 auto;margin-bottom:5px;}
.right_info ul li.rank_icon {width:45px;text-align:center;}
.right_info ul li.rank_icon img {width:22px;margin:0 auto;margin-bottom:3px;}

}

@media only screen and (max-width: 360px) { /* viewport width : 360 */

.right_info ul li {margin-left:0px;}

}

@media only screen and (max-width: 320px) { /* viewport width : 320 */

.left_info p.sub_info {font-size:12px;}
}
</style>

<!-- 게시물 읽기 시작 { -->
<!-- <div id="bo_v_table"><?php echo $board['bo_subject']; ?></div>-->

<article id="bo_v" style="width:<?php echo $width; ?>">
 <!--    <header>
        <h1 id="bo_v_title">
            <?php
            //if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
            //echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?>
        </h1>
    </header> -->

    <section id="bo_v_info" style="display:none;">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr><td height="2" bgcolor="#646c6f" colspan="4"></td></tr>
    <tr>
		<td class="write_head" style="">제목</td>
		<td class="write_body"><?php
            if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?></td>
		
	</tr>
	<!-- <tr>
		<td class="write_head" style="">날짜</td>
		<td class="write_body"><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></td>
	</tr> -->
    
     <tr>
		<td class="write_head" style="">글쓴이</td>
		<td class="write_body"><?php echo $view['wr_name'] ?></td>

	</tr>
	<!-- <tr>
		<td class="write_head" style="">조회수</td>
		<td class="write_body"><?php echo number_format($view['wr_hit']) ?></td>
	</tr> -->

	<?//if($bo_table!="05_board"){?>
	
<!-- 	<tr>
	<td class="write_head" style="">이메일</td>
		<td class="write_body"><?php echo $view['wr_email'] ?></td>
	</tr> -->
	<?//}?>

</table>
    
    
      
    </section>

    <?php
    if ($view['file']['count']) {
        $cnt = 0;
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>

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

    <?php
    if (implode('', $view['link'])) {
     ?>
     <!-- 관련링크 시작 { -->
    <section id="bo_v_link">
        <h2>관련링크</h2>
        <ul>
        <?php
        // 링크
        $cnt = 0;
        for ($i=1; $i<=count($view['link']); $i++) {
            if ($view['link'][$i]) {
                $cnt++;
                $link = cut_str($view['link'][$i], 70);
         ?>
            <li>
                <a href="<?php echo $view['link_href'][$i] ?>" target="_blank">
                    <img src="<?php echo $board_skin_url ?>/img/icon_link.gif" alt="관련링크">
                    <strong><?php echo $link ?></strong>
                </a>
                <span class="bo_v_link_cnt"><?php echo $view['link_hit'][$i] ?>회 연결</span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 관련링크 끝 -->
    <?php } ?>

    <!-- 게시물 상단 버튼 시작 { -->
   <div id="bo_v_top" style="display:none;">
        <?php
        ob_start();
         ?>
        <?php if ($prev_href || $next_href) { ?>
        <!-- <ul class="bo_v_nb">
           
        </ul> -->
        <?php } ?>

        <ul class="bo_v_com">
            <?php if ($update_href) { ?><li><span class="jbutton large black"><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></span></li><?php } ?>
            <?php if ($delete_href) { ?><li><span class="jbutton large black"><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a></span></li><?php } ?>
          <!--   <?php if ($copy_href) { ?><li><span class="jbutton large black"><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">복사</a></span></li><?php } ?>
            <?php if ($move_href) { ?><li><span class="jbutton large black"><a href="<?php echo $move_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">이동</a></span></li><?php } ?> -->
            <?php if ($search_href) { ?><li><span class="jbutton large black"><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></span></li><?php } ?>
            <li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li>
           <!--  <?php if ($reply_href) { ?><li><span class="jbutton large black"><a href="<?php echo $reply_href ?>" class="btn_b01">답변</a></span></li><?php } ?> -->
            <?php if ($write_href) { ?>
				<?php if($is_admin) { ?>
				<li><span class="jbutton large black"><a href="<?php echo $write_href ?>" class="btn_b01">글쓰기</a></span></li>
				<?php } ?>
			<?php } ?>
        </ul>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->
<style>
.swiper{width:100%;height:100%}
.swiper-slide{text-align:center;font-size:18px;background:#fff;display:-webkit-box;display:-ms-flexbox;display:-webkit-flex;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;-webkit-align-items:center;align-items:center}
.swiper-slide img{display:block;width:100%;height:100%;object-fit:cover}
.college_li a {display: block;width: 100%;}
.college_li span {
    display: block;
    background: #eee;
    text-align: center;
    padding-bottom: 100%;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 1.25em;
    color: #777;
	width: 100%;
}
</style>
    <section id="bo_v_atc">
        <!-- <h2 id="bo_v_atc_title">본문</h2>
         -->
        <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\" class=\"swiper mySwiper\">\n";
			echo "<div class=\"swiper-wrapper\">\n";
            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
					$thumb = get_list_thumbnail2($bo_table, $view['wr_id'], 720, 720, false, true, $i);
                    //echo $view['file'][$i]['view'];
					echo "<div class=\"swiper-slide\">\n";
                    //echo get_view_thumbnail2($view['file'][$i]['view'], 720, 720);
                    echo "<img src=\"".$thumb['src']."\" alt=\"\">";
					echo "</div>\n";
                }
            }

			echo "</div>\n";
			echo "<div class=\"swiper-pagination\"></div>\n";
			echo "<div class=\"swiper-pagination01\"></div>\n";
            echo "</div>\n";
        }
		?>

		<div class="profile_info_name">
			<div class="left_info">
				<p class="">
					<?php echo $view['wr_7'] ?> <span>(<?php echo $view['wr_8'] ?>세 / <?php echo $view['wr_3'] ?>)</span>
				</p>
				<p class="sub_info">
					<?php echo $view['wr_1']?>·<?php echo $view['wr_9']?>·<?php echo $view['wr_10']?>
				</p>
			</div>
			
			<div class="right_info">
				<ul>
					<li class="rank_icon">
						<?php if($member['mb_2'] == '브론즈') { ?>
							<img src="/images/lev_1.png" alt="">
							<span>브론즈</span>
						<?php } else if($member['mb_2'] == '실버') { ?>
							<img src="/images/lev_2.png" alt="">
							<span>실버</span>
						<?php } else if($member['mb_2'] == '골드') { ?>
							<img src="/images/lev_3.png" alt="">
							<span>골드</span>
						<?php } else if($member['mb_2'] == '플래티넘') { ?>
							<img src="/images/lev_4.png" alt="">
							<span>플래티넘</span>
						<?php } else if($member['mb_2'] == '다이아') { ?>
							<img src="/images/lev_5.png" alt="">
							<span>플래티넘</span>
						<?php } else { ?>
							<img src="/images/lev_6.png" alt="">
							<span>골프프로</span>
						<?php } ?>
					</li>
					<li>
						<?php 
						if($write['mb_id'] == $member['mb_id']) {
							$go_memo = "javascript:alert('본인에게는 쪽지를 보낼 수 없습니다.')";
						} else {
							$go_memo = "/bbs/memo_form.php?me_recv_mb_id=".$view['mb_id'];
						}
						?>
						<a href="<?php echo $go_memo; ?>"><img src="/images/message_icon.png" alt=""><span>쪽지</span></a>
						<!-- <a href="/bbs/memo.php"><img src="/images/message_icon.png" alt=""><span>쪽지</span></a> -->
					</li>
					<li>
						<?php
						$good = sql_fetch(" select * from g5_board_good where bo_table = '{$bo_table}' and wr_id = '{$view['wr_id']}' and mb_id = '{$member['mb_id']}' and bg_flag in ('good', 'nogood') ");
						if($good['bg_id']) {
							$heart = 'heart_on_icon.png';
							$color = 'style="color: #de2422"';
						} else {
							$heart = 'heart_icon.png';
							$color = '';
						}?>
						<a href="<?php echo G5_BBS_URL.'/good.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.'&amp;good=good&amp;'.$qstr ?>"><img src="/images/<?php echo $heart;?>" alt=""><span <?php echo $color;?>><?php echo number_format($view['wr_good']) ?></span></a>
					</li>
				</ul>
			</div>
		</div>
		<div id="bg_board_wrap">
			<div class="board_box" style="background:#fff;">
				<h2 class="pf_tit">프로필</h2>
				<div class="profile_wrapper">
					<h3 class="pf_sub_tit">기본정보</h3>
					<p class="pf_data"><span class="name_title">지역</span><span class="dec_title"><?php echo $view['wr_1']?> <?php echo $view['wr_2']?></span></p>
					<p class="pf_data"><span class="name_title">직업</span><span class="dec_title"><?php echo $view['wr_5']?></span></p>
					<p class="pf_data"><span class="name_title">자기소개</span><span class="dec_title"><?php echo $view['wr_content']?></span></p>
				</div>
				<div class="profile_wrapper">
					<h3 class="pf_sub_tit">골프정보</h3>
					<p class="pf_data"><span class="name_title">평균타수</span><span class="dec_title"><?php echo $view['wr_9']?></span></p>
					<p class="pf_data"><span class="name_title">골프경력</span><span class="dec_title"><?php echo $view['wr_10']?></span></p>
					<p class="pf_data"><span class="name_title">보유회원권</span><span class="dec_title"><?php echo $view['wr_11']?></span></p>
				</div>
				<div class="profile_wrapper">
					<h3 class="pf_sub_tit">골프 라이프 스타일</h3>
					<p class="pf_data"><span class="name_title">월평균 라운딩</span><span class="dec_title"><?php echo $view['wr_12']?></span></p>
					<p class="pf_data"><span class="name_title">해외 골프</span><span class="dec_title"><?php echo $view['wr_13']?></span></p>
				</div>
				<?php if($view['wr_14'] == 'yes') { ?>
				<div class="profile_wrapper">
					<h3 class="pf_sub_tit">프로골퍼</h3>
					<p class="pf_data"><span class="name_title">프로유형</span><span class="dec_title"><?php echo $view['wr_15']?></span></p>
					<p class="pf_data"><span class="name_title">협회</span><span class="dec_title">
					<?php if($view['wr_16'] == 'etc') { ?>
					<?php echo $view['wr_17']?></span></p>
					<?php }else { ?>
					<?php echo $view['wr_16']?></span></p>
					<?php } ?>
					<p class="pf_data"><span class="name_title">회원번호</span><span class="dec_title"><?php echo $view['wr_18']?></span></p>
				</div>
				<?php } ?>
				<div class="profile_wrapper">
					<h3 class="pf_sub_tit">G-PRO 스윙 분석</h3>
					<div class="college_team swiper-container" style="">
						<ul class="swiper-wrapper college_wrap" style="">
							<?php
								$mb_idname = $view['mb_id'];
								$sql_nt = ' select * from g5_write_golf_swing where wr_is_comment = 0 and mb_id = "'.$mb_idname.'" order by wr_id desc limit 0, 3 ';
							
								$result_nt = sql_query($sql_nt);
								$row_nt = sql_fetch($sql_nt);
								$total_nt = sql_num_rows($result_nt);
							
								for($i = 0 ; $list = sql_fetch_array($result_nt) ; $i++) {
									$thumb = get_list_thumbnail('golf_swing', $list['wr_id'], 210, 210, false, true, 'center', false, '80/0.5/3');

									if($thumb['src']) {
										$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" style="display:block;width:100%;height:300px;" >';
									} else {
										$img_content = '<img src="/img/no_img.png" alt="">';
									}
								?>
									<li class="swiper-slide college_li" style="">
										<a href="<?php echo get_pretty_url('golf_swing', $list['wr_id'])?>">
											<!-- <img src="<?php echo $thumb['src'];?>" alt="<?php echo $list['wr_subject'];?>" style="display:block;width:100%;height:300px;"> -->
											<?php echo $img_content;?>
										</a>
									</li>
								<?php }?>
								<?php if($total_nt == 0) {?>
									<li class="no_list">등록된 글이 없습니다.</li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
        <!-- 본문 내용 시작 { -->
			<!-- <div id="bo_v_con">
				<?php echo get_view_thumbnail($view['content']); ?>
			</div> -->
		</div>
        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>
    </section>

    <div id="bo_v_share">
        <!-- <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn btn_b03 btn_scrap" onclick="win_scrap(this.href); return false;"><i class="fa fa-thumb-tack" aria-hidden="true"></i> 스크랩</a><?php } ?> -->
		
		<?php
        include_once(G5_SNS_PATH."/view.sns.skin.php");
        ?>
    </div>

    <?php
    // 코멘트 입출력
   // include_once('./view_comment.php');
     ?>
     
     <div id="bottom_p_n">

<?
 // 윗글을 얻음
$sql = " select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply < '$write[wr_reply]' $sql_search order by wr_num desc, wr_reply desc limit 1 ";
$prev = sql_fetch($sql);
// 위의 쿼리문으로 값을 얻지 못했다면
if (!$prev['wr_id'])     {
	$sql = " select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num < '$write[wr_num]' $sql_search order by wr_num desc, wr_reply desc limit 1 ";
	$prev = sql_fetch($sql);
}

// 아래글을 얻음
$sql = " select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply > '$write[wr_reply]' $sql_search order by wr_num, wr_reply limit 1 ";
$next = sql_fetch($sql);
// 위의 쿼리문으로 값을 얻지 못했다면
if (!$next['wr_id']) {
	$sql = " select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num > '$write[wr_num]' $sql_search order by wr_num, wr_reply limit 1 ";
	$next = sql_fetch($sql);
}
?>

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="display:none;">
	<tr><td height="1" bgcolor="#999" colspan="4"></td></tr>
    <tr>
		<td class="write_head" style="">이전글</td>
		<td class="write_body"> 
		<? if ($prev_href) { 
		$prev_wr_subject = get_text(cut_str($prev['wr_subject'], 100));
		$prev_wr_datetime = substr($prev['wr_datetime'],0,10);
		echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\">$prev_wr_subject</a>&nbsp;"; 
		}else{ 
		echo"이전글이 없습니다."; 
		}?></td>
		
	</tr>
    
     <tr>
		<td class="write_head" style="">다음글</td>
		<td class="write_body"><? if ($next_href) { 
		$next_wr_subject = get_text(cut_str($next['wr_subject'], 100));
		$next_wr_datetime = substr($next['wr_datetime'],0,10);
		echo "<a href=\"$next_href\" title=\"$next_wr_subject\">$next_wr_subject</a>&nbsp;"; 
		}else{ 
		echo"다음글이 없습니다."; 
		}?></td>
		
	</tr>
	
	
</table>

</div>

    <!-- 링크 버튼 시작 { -->
    <div id="bo_v_bot">
        <?php echo $link_buttons ?>
    </div>
    <!-- } 링크 버튼 끝 -->

</article>
<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
	pagination: {
		el: ".swiper-pagination",
		
	},
  });
//progress Bar
var pagingSwiper = new Swiper(".mySwiper", {
	pagination: {
		el: ".swiper-pagination01",
		type: "fraction",
	},
});

swiper.controller.control = pagingSwiper;

var swiper4 = new Swiper(".college_team", {
	slidesPerView: 3, // 가로갯수
	spaceBetween: 20, // 간격
	touchRatio: 1, // 드래그 가능여부(1, 0)
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
});
</script>

<!-- } 게시글 읽기 끝 -->