<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<style>
.write_head { width:95px;text-align:center; color:#000000; font-size:11px; font-weight:bold; background-color: #f9f9f9; border-right:1px solid #d7d7d7; border-bottom:1px solid #d7d7d7; font-family:'나눔고딕',Nanum Gothic !important;}
.write_body { background-color: #ffffff;  border-right:1px solid #d7d7d7; border-bottom:1px solid #d7d7d7; padding:11px 5px 11px 20px; font-family:'나눔고딕',Nanum Gothic !important;}
.write_body2 { background-color: #ffffff; width:106px; padding:11px 0 11px 20px; border-right:1px solid #d7d7d7; border-bottom:1px solid #d7d7d7; font-family:'나눔고딕',Nanum Gothic !important;}
.write_contents { background-color: #ffffff; border-bottom:1px solid #d7d7d7; padding:10px; font-family:'나눔고딕',Nanum Gothic !important;}
.field { border:1px solid #ccc; font-family:'나눔고딕',Nanum Gothic !important; }
#p_n_datetime{text-align:right; display:block;float:right; padding-right:10px;}
#writeContents{font-family:"나눔고딕", "Nanum Gothic", "맑은 고딕", "Malgun Gothic";}
#bo_v_info, #bottom_p_n, .sub_bg  {display: none;}
#bo_v{padding-top: 280px; max-width: 660px; margin: 0 auto;}
#container_title{display: none;}
.artist_tit h1{font-size: 60px; display: flex; justify-content:center; margin-bottom: 100px;}
#bo_v_img img{width: 620px;height: 840px;}
#bo_v_img{width: auto;}
#bo_v_atc{display: flex;flex-wrap:wrap;width: 90%;margin:0 auto;}
.names{margin: 110px 0 0 0; display: flex;gap:20px;padding-bottom:20px;border-bottom:solid 1px #ccc;align-items: flex-end;font-size:18px;position: relative;}
.names h4{font-size: 28px;}
.names .sns{position:absolute;right:0;}
#bo_v_act{width: 660px;margin-bottom: 180px;font-family:'Noto Sans KR', sans-serif;}
.info_wrap{margin: 40px 0 0 0;display: flex; flex-direction: column;}
.info{display: flex;font-size: 16px;    align-items: center;}
.info h4{width: 64px;text-align:left;line-height:2;}
.movie_wrap{margin: 50px 0 0 0;gap: 10px;display: flex; flex-direction: column;}
.movie h3{text-align:left; margin-bottom: 20px;font-size:20px;}
.swiper-horizontal{width: 100%;}
.swiper-horizontal img{width: 100%;}
.swiper-pagination-clickable .swiper-pagination-bullet{width: 20px;height: 5px;background-color:#fff;border-radius: 0;}

pre{
	line-height: 2;
	font-family:'Noto Sans KR', sans-serif;
	display: block; /* 또는 inline-block; */
    width: auto; /* 필요에 따라 조정 */
    overflow: hidden;
    text-overflow: ellipsis;
	}
.truncate {

}

</style>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- 게시물 읽기 시작 { -->
<!-- <div id="bo_v_table"><?php echo $board['bo_subject']; ?></div>-->

<article id="bo_v">

	
    <section id="bo_v_info">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr><td height="2" bgcolor="#777777" colspan="4"></td></tr>
    <tr>
		<td class="write_head" style="border-left:1px solid #dbdbdb;">제목</td>
		<td class="write_body"><?php
            if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?></td>
		<td class="write_head">작성일</td>
		<td class="write_body2"><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></td>
	</tr>
    
     <tr>
		<!-- <td class="write_head" style="border-left:1px solid #dbdbdb;">글쓴이</td> -->
		<td class="write_body"><?php echo $view['wr_name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></td>
		<!-- <td class="write_head">조회수</td> -->
		<td class="write_body2"><?php echo number_format($view['wr_hit']) ?></td>
	</tr>
</table>
    </section>

	<div class="artist_tit">
		<h1>ARTIST</h1>
	</div>
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
<!--     <section id="bo_v_link">
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
    </section> -->
    <!-- } 관련링크 끝 -->
    <?php } ?>

    <!-- 게시물 상단 버튼 시작 { -->
    <div id="bo_v_top" style="display:none;">
        <?php
        ob_start();
         ?>
        <?php if ($prev_href || $next_href) { ?>
        <ul class="bo_v_nb">
           
        </ul>
        <?php } ?>

        <ul class="bo_v_com">
            <?php if ($update_href) { ?><li><span class="jbutton large black"><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></span></li><?php } ?>
            <?php if ($delete_href) { ?><li><span class="jbutton large black"><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a></span></li><?php } ?>
            <?php if ($copy_href) { ?><li><span class="jbutton large black"><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">복사</a></span></li><?php } ?>
            <?php if ($move_href) { ?><li><span class="jbutton large black"><a href="<?php echo $move_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">이동</a></span></li><?php } ?>
            <?php if ($search_href) { ?><li><span class="jbutton large black"><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></span></li>
            <li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li><?php } ?>
            <!-- <?php if ($reply_href) { ?><li><span class="jbutton large black"><a href="<?php echo $reply_href ?>" class="btn_b01">답변</a></span></li><?php } ?> -->
            <?php if ($member['mb_level'] >= 10) { // 관리자 레벨이 10 이상인 경우에만 '글쓰기' 버튼 표시 ?>
			<?php if ($write_href) { ?><li><span class="jbutton large black"><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></span></li><?php } ?>
		<?php } ?>

        </ul>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>
<!-- Swiper -->
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php
    $v_img_count = count($view['file']);
    if ($v_img_count) {
        for ($i = 0; $i < count($view['file']); $i++) {
            if ($view['file'][$i]['view']) {
                echo '<div class="swiper-slide">' . get_view_thumbnail($view['file'][$i]['view']) . '</div>';
            }
        }
    }
    ?>
  </div>
  <div class="swiper-pagination"></div>
  <div class="swiper-scrollbar"></div>
</div>

<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    scrollbar: {
      el: ".swiper-scrollbar",
    },
  });
</script>


        <!-- 본문 내용 시작 { -->
        <!-- <div id="bo_v_con"><?php echo $view['rich_content'];echo get_view_thumbnail($view['content']); ?></div> -->
        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>

        <!-- 스크랩 추천 비추천 시작 { -->

<?php

// 게시글 데이터 불러오기
$sql = "SELECT * FROM {$write_table} WHERE wr_id = '{$wr_id}'";
$result = sql_query($sql);
$row = sql_fetch_array($result);

// 변수 설정
$instar_link = $row['wr_link1'];
$cafe_link = $row['wr_link2'];
?>
        <div id="bo_v_act">
<div class="names">
    <h4><?php echo $view['wr_subject'] ?></h4><span><?php echo $view['wr_content'] ?></span>
    <div class="sns">
        <?php if (!empty($instar_link)): // 인스타그램 링크가 있는 경우만 출력 ?>
            <a href="<?php echo $instar_link; ?>" target="_blank"><img src="<?php echo $board_skin_url ?>/img/ins.png" alt="인스타그램"></a>
        <?php endif; ?>

        <?php if (!empty($cafe_link)): // 카페 링크가 있는 경우만 출력 ?>
            <a href="<?php echo $cafe_link; ?>" target="_blank"><img src="<?php echo $board_skin_url ?>/img/daum_pc.png" alt="카페"></a>
        <?php endif; ?>
    </div>
</div>
			</div>

			<div class="info_wrap">
				<div class="info" style="gap:20px;">
					<h4>아티스트</h4><span><?php echo $view['wr_subject'] ?></span>
				</div>
				<div class="info" style="gap:20px;">
					<h4>생년월일</h4><span><?php echo $view['wr_1'] ?></span>
				</div>
				<!-- <div class="info">
					<h4>키</h4><span><?php echo $view['wr_2'] ?></span>
				</div> -->
			</div>

			
<?php if (!empty($view['wr_3']) || !empty($view['wr_4']) || !empty($view['wr_5']) || !empty($view['wr_6']) || !empty($view['wr_7']) || !empty($view['wr_8']) || !empty($view['wr_9']) || !empty($view['wr_10'])): ?>
<div class="movie_wrap">
    <div class="movie">
        <h3>MOVIE</h3>
    </div>
    <?php if (!empty($view['wr_3']) && !empty($view['wr_4'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_3'] ?></h4><span><?php echo $view['wr_4'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_5']) && !empty($view['wr_6'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_5'] ?></h4><span><?php echo $view['wr_6'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_7']) && !empty($view['wr_8'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_7'] ?></h4><span><?php echo $view['wr_8'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_9']) && !empty($view['wr_10'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_9'] ?></h4><span><?php echo $view['wr_10'] ?></span>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>


<?php if (!empty($view['wr_11']) || !empty($view['wr_12']) || !empty($view['wr_13']) || !empty($view['wr_14']) || !empty($view['wr_15']) || !empty($view['wr_16']) || !empty($view['wr_17']) || !empty($view['wr_18'])): ?>
<div class="movie_wrap">
    <div class="movie">
        <h3>TV SERIES</h3>
    </div>
    <?php if (!empty($view['wr_11']) && !empty($view['wr_12'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_11'] ?></h4><span><?php echo $view['wr_12'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_13']) && !empty($view['wr_14'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_13'] ?></h4><span><?php echo $view['wr_14'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_15']) && !empty($view['wr_16'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_15'] ?></h4><span><?php echo $view['wr_16'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_17']) && !empty($view['wr_18'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_17'] ?></h4><span><?php echo $view['wr_18'] ?></span>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if (!empty($view['wr_19']) || !empty($view['wr_20']) || !empty($view['wr_21']) || !empty($view['wr_22']) || !empty($view['wr_23']) || !empty($view['wr_24']) || !empty($view['wr_25']) || !empty($view['wr_26'])): ?>
<div class="movie_wrap">
    <div class="movie">
        <h3>AWARDS</h3>
    </div>
    <?php if (!empty($view['wr_19']) && !empty($view['wr_20'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_19'] ?></h4><span><?php echo $view['wr_20'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_21']) && !empty($view['wr_22'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_21'] ?></h4><span><?php echo $view['wr_22'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_23']) && !empty($view['wr_24'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_23'] ?></h4><span><?php echo $view['wr_24'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_25']) && !empty($view['wr_26'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_25'] ?></h4><span><?php echo $view['wr_26'] ?></span>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if (!empty($view['wr_27']) || !empty($view['wr_28']) || !empty($view['wr_29']) || !empty($view['wr_30']) || !empty($view['wr_31']) || !empty($view['wr_32']) || !empty($view['wr_33']) || !empty($view['wr_34'])): ?>
<div class="movie_wrap">
    <div class="movie">
        <h3>ADVERTISEMENT & AMBASSADOR</h3>
    </div>
    <?php if (!empty($view['wr_27']) && !empty($view['wr_28'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_27'] ?></h4><span><?php echo $view['wr_28'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_29']) && !empty($view['wr_30'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_29'] ?></h4><span><?php echo $view['wr_30'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_31']) && !empty($view['wr_32'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_31'] ?></h4><span><?php echo $view['wr_32'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_33']) && !empty($view['wr_34'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_33'] ?></h4><span><?php echo $view['wr_34'] ?></span>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if (!empty($view['wr_35']) || !empty($view['wr_36']) || !empty($view['wr_37']) || !empty($view['wr_38']) || !empty($view['wr_39']) || !empty($view['wr_40']) || !empty($view['wr_41']) || !empty($view['wr_42'])): ?>
<div class="movie_wrap">
    <div class="movie">
        <h3>MAGAZINE</h3>
    </div>
    <?php if (!empty($view['wr_35']) && !empty($view['wr_36'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_35'] ?></h4><span><?php echo $view['wr_36'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_37']) && !empty($view['wr_38'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_37'] ?></h4><span><?php echo $view['wr_38'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_39']) && !empty($view['wr_40'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_39'] ?></h4><span><?php echo $view['wr_40'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_41']) && !empty($view['wr_42'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_41'] ?></h4><span><?php echo $view['wr_42'] ?></span>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if (!empty($view['wr_43']) || !empty($view['wr_44']) || !empty($view['wr_45']) || !empty($view['wr_46']) || !empty($view['wr_47']) || !empty($view['wr_48']) || !empty($view['wr_49']) || !empty($view['wr_50'])): ?>
<div class="movie_wrap">
    <div class="movie">
        <h3>ETC</h3>
    </div>
    <?php if (!empty($view['wr_43']) && !empty($view['wr_44'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_43'] ?></h4><span class="truncate"><?php echo $view['wr_44'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_45']) && !empty($view['wr_46'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_45'] ?></h4><span class="truncate"><?php echo $view['wr_46'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_47']) && !empty($view['wr_48'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_47'] ?></h4><span><?php echo $view['wr_48'] ?></span>
    </div>
    <?php endif; ?>

    <?php if (!empty($view['wr_49']) && !empty($view['wr_50'])): ?>
    <div class="info">
        <h4><?php echo $view['wr_49'] ?></h4><span><?php echo $view['wr_50'] ?></span>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

			
	
           <!--  <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn_b01" onclick="win_scrap(this.href); return false;">스크랩</a><?php } ?>-->
            <?php if ($good_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="btn_b01">추천 <strong><?php echo number_format($view['wr_good']) ?></strong></a>
                <b id="bo_v_act_good"></b>
            </span>
            <?php } ?>
            <?php if ($nogood_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="btn_b01">비추천  <strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
                <b id="bo_v_act_nogood"></b>
            </span>
            <?php } ?>
        </div>

        <div id="bo_v_act">
            <?php if($board['bo_use_good']) { ?><span>추천 <strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
            <?php if($board['bo_use_nogood']) { ?><span>비추천 <strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
        </div>

        <!-- } 스크랩 추천 비추천 끝 -->
    </section>

	<div id="bo_v_share">
    <?php
    include_once(G5_SNS_PATH."/view.sns.skin.php");
    ?>
	</div>

    <?php
    // 코멘트 입출력
    //include_once('./view_comment.php');
     ?>
     
     <div id="bottom_p_n">

<?
 // 윗글을 얻음
$sql = " select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply < '$write[wr_reply]' $sql_search order by wr_num desc, wr_reply desc limit 1 ";
$prev = sql_fetch($sql);
// 위의 쿼리문으로 값을 얻지 못했다면
if (!$prev[wr_id])     {
	$sql = " select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num < '$write[wr_num]' $sql_search order by wr_num desc, wr_reply desc limit 1 ";
	$prev = sql_fetch($sql);
}

// 아래글을 얻음
$sql = " select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply > '$write[wr_reply]' $sql_search order by wr_num, wr_reply limit 1 ";
$next = sql_fetch($sql);
// 위의 쿼리문으로 값을 얻지 못했다면
if (!$next[wr_id]) {
	$sql = " select wr_id, wr_subject, wr_datetime from $write_table where wr_is_comment = 0 and wr_num > '$write[wr_num]' $sql_search order by wr_num, wr_reply limit 1 ";
	$next = sql_fetch($sql);
}
?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr><td height="1" bgcolor="#dbdbdb" colspan="4"></td></tr>
    <tr>
		<td class="write_head" style="border-left:1px solid #dbdbdb;">이전글</td>
		<td class="write_body"> 
		<? if ($prev_href) { 
		$prev_wr_subject = get_text(cut_str($prev['wr_subject'], 100));
		$prev_wr_datetime = substr($prev['wr_datetime'],0,10);
		echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\">$prev_wr_subject</a>&nbsp;<span id='p_n_datetime'>$prev_wr_datetime</span>"; 
		}else{ 
		echo"이전글이 없습니다."; 
		}?></td>
		
	</tr>
    
     <tr>
		<td class="write_head" style="border-left:1px solid #dbdbdb;">다음글</td>
		<td class="write_body"><? if ($next_href) { 
		$next_wr_subject = get_text(cut_str($next['wr_subject'], 100));
		$next_wr_datetime = substr($next['wr_datetime'],0,10);
		echo "<a href=\"$next_href\" title=\"$next_wr_subject\">$next_wr_subject</a>&nbsp;<span id='p_n_datetime'>$next_wr_datetime</span>"; 
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

	//sns공유
    $(".btn_share").click(function(){
        $("#bo_v_sns").fadeIn();
   
    });

    $(document).mouseup(function (e) {
        var container = $("#bo_v_sns");
        if (!container.is(e.target) && container.has(e.target).length === 0){
        container.css("display","none");
        }	
    });
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
<!-- } 게시글 읽기 끝 -->