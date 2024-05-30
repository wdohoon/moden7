<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<style>
.write_head { max-width:120px;width:15%;min-width:70px;text-align:center; color:#000000; font-size:13px; font-weight:bold; background-color: #f5f5f5; border-right:0px solid #999;border-left:0px;; border-bottom:1px solid #999; }
.write_body { font-size:13px;background-color: #ffffff;  border-right:0px solid #999; border-bottom:1px solid #999; padding:11px 5px 11px 10px; }
.write_body2 { font-size:13px;background-color: #ffffff; width:106px; padding:11px 0 11px 20px; border-right:1px solid #999; border-bottom:1px solid #999; }
.write_contents { background-color: #ffffff; border-bottom:1px solid #999; padding:10px; font-size:13px;}
.field { border:1px solid #ccc;  }
#p_n_datetime{text-align:right; display:block;float:right; padding-right:10px;font-size:13px;}
#writeContents{}
.yoyo_box {margin:0 0 10px 0;text-align:center;padding:0px 12%;padding-top:10px;}
.yoyo_box iframe {width:100%;height:100%;min-height:472px;}

@media (max-width: 1100px) {
.yoyo_box {margin:0 0 10px 0;text-align:center;padding:0px 10%;padding-top:10px;}
.yoyo_box iframe {width:100%;height:100%;min-height:442px;}
}

@media (max-width: 1024px) {
.yoyo_box {padding:10px 8% 0px;}
.yoyo_box iframe {width:100%;height:100%;min-height:412px;}
 }

@media (max-width: 767px) {
.yoyo_box {padding:10px 5% 0px;}
.yoyo_box iframe {width:100%;height:100%;min-height:330px;}

 }


@media (max-width: 460px) {
.yoyo_box {padding:10px 0px 0px;}
.yoyo_box iframe {width:100%;min-height:260px}

}
</style>
<?php 
$v_width = '517	';   // 동영상 넓이 지정
$v_height = '342';  // 동영상 높이 지정
?>

<!-- video-js -->
<link href="<?php echo $board_skin_url ?>/video-js/video-js.css" rel="stylesheet">
<script src="<?php echo $board_skin_url ?>/video-js/video.js"></script>
<script>
  videojs.options.flash.swf = "<?php echo $board_skin_url ?>/video-js/video-js.swf";
</script>
<!-- video-js end -->


<!-- 게시물 읽기 시작 { -->
<!-- <div id="bo_v_table"><?php echo $board['bo_subject']; ?></div> -->

<article id="bo_v" style="width:<?php echo $width; ?>;;">
   <!--  <header>
        <h1 id="bo_v_title">
            <?php
            if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
            echo cut_str(get_text($view['wr_subject']), 80); // 글제목 출력
            ?>
        </h1>
    </header>
    
       <section id="bo_v_info">
        <h2>페이지 정보</h2>
        작성자 <strong><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></strong>
        <span class="sound_only">작성일</span><strong><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong>
        조회<strong><?php echo number_format($view['wr_hit']) ?>회</strong>
        댓글<strong><?php echo number_format($view['wr_comment']) ?>건</strong>
    		메인<strong><?php echo $view['wr_5'] ?></strong>
    </section> 
     -->
	 
    <section id="bo_v_info">
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
        <ul class="bo_v_nb" style="display:none;">
            <?php if ($prev_href) { ?><li><a href="<?php echo $prev_href ?>" class="btn_b01">이전글</a></li><?php } ?>
            <?php if ($next_href) { ?><li><a href="<?php echo $next_href ?>" class="btn_b01">다음글</a></li><?php } ?>
        </ul>
        <?php } ?>

        
        <ul class="bo_v_com">
            <?php if ($update_href) { ?><li><span class="jbutton large black"><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></span></li><?php } ?>
            <?php if ($delete_href) { ?><li><span class="jbutton large black"><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a></span></li><?php } ?>
           <!--  <?php if ($copy_href) { ?><li><span class="jbutton large black"><a href="<?php echo $copy_href ?>" onclick="board_move(this.href); return false;">복사</a></span></li><?php } ?>
            <?php if ($move_href) { ?><li><span class="jbutton large black"><a href="<?php echo $move_href ?>" onclick="board_move(this.href); return false;">이동</a></span></li><?php } ?> -->
            <!-- <?php if ($search_href) { ?><li><span class="jbutton large black"><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></span></li><?php } ?> -->
        <li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li>
        <!--     <?php if ($reply_href) { ?><li><span class="jbutton large black"><a href="<?php echo $reply_href ?>" class="btn_b01">답변</a></span></li><?php } ?> -->
            <?php if ($write_href) { ?><li><span class="jbutton large black"><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></span></li><?php } ?>
        </ul>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>

        <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";

            // 첫번째 이미지 출력안함 $i=0 --> $i=1
            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                  //  echo get_view_thumbnail($view['file'][$i]['view']);
                }
            }

            echo "</div>\n";
        }
         ?>

		<!-- video start -->
		<!-- youtube -->
		<?php if($view['wr_1']){ ?>
		<div class="yoyo_box" style=""> 
			<iframe src="https://www.youtube.com/embed/<?php echo $view['wr_1']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			<!-- <iframe  id="vivi01" style="" src="http://www.youtube.com/embed/<?php echo $view['wr_1']?>?feature=player_embedded" frameborder="0" allowfullscreen></iframe> -->
		</div>
		<?php } ?>

		<!-- vimeo -->
		<?php if($view['wr_2']){ ?>
		<div style="margin:0 0 10px 0;text-align:center;padding-top:20px;">
			<iframe  src="//player.vimeo.com/video/<?php echo $view['wr_2']?>" width="<?php echo $v_width?>" height="<?php echo $v_height?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
		<?php } ?>

		<!-- source code -->
		<?php if($view['wr_3']){ ?>
		<div class="yoyo_box" style=""> 
			<?php echo $view['wr_3']; ?>
		</div>
		<?php } ?>

		<!-- 링크 동영상 video-js로 실행 -->
		<?php 
		if($view['wr_4']){ 
			if ($view['file']['0']['file']) {  // 첨부파일1(썸네일이미지) 있는 경우
				$v_logo = G5_URL."/data/file/".$bo_table."/".$view[file]['0'][file];
			} else { 
				$v_logo = $board_skin_url."/video-js/logo.jpg";
			}
		?>
			<video id="video_link" class="video-js vjs-default-skin" controls preload="none" width="<?php echo $v_width?>" height="<?php echo $v_height?>" poster="<?php echo $v_logo?>" data-setup="{}">
			<source src="<?php echo $view['wr_4']?>" type='video/mp4' />
			</video>
		<?php } ?>

		<!-- 업로드 동영상 video-js로 실행 -->
		<?php 
		if($view['file']['1']['file']){
			if ($view['file']['0']['file']) {  // 첨부파일1(썸네일이미지) 있는 경우
				$v_logo = G5_URL."/data/file/".$bo_table."/".$view['file']['0']['file'];
			} else { 
				$v_logo = $board_skin_url."/video-js/logo.jpg";
			}
		?>
			<video id="video_upload" class="video-js vjs-default-skin" controls preload="none" width="<?php echo $v_width?>" height="<?php echo $v_height?>" poster="<?php echo $v_logo?>" data-setup="{}">
			<source src="<?=G5_URL."/data/file/".$bo_table."/".$view[file]['1'][file]?>" type='video/mp4' />
			</video>
		<?php } ?>

		<!-- video end -->



        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>

        <!-- 스크랩 추천 비추천 시작 { -->
        <?php if ($scrap_href || $good_href || $nogood_href) { ?>
        <div id="bo_v_act" style="display:none;">
            <!-- <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn_b01" onclick="win_scrap(this.href); return false;">스크랩</a><?php } ?> -->
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
        <?php } else {
            if($board['bo_use_good'] || $board['bo_use_nogood']) {
        ?>
        <div id="bo_v_act">
            <?php if($board['bo_use_good']) { ?><span>추천 <strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
            <?php if($board['bo_use_nogood']) { ?><span>비추천 <strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
        </div>
        <?php
            }
        }
        ?>
        <!-- } 스크랩 추천 비추천 끝 -->
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

<table border="0" cellpadding="0" cellspacing="0" width="100%">
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
    <div id="bo_v_bot" style="padding-top:10px;">
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


<script>



$(function(){
$( window ).resize(function() {

		element = document.getElementById("vivi01");
		
		//setIFrameHeight(element);
	});
});


</script>

<!-- } 게시글 읽기 끝 -->