<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->
<style type="text/css">
#bo_v_info table {width:100%;}
.write_head { width:200px;height:47px;text-align:center; color:#000000; font-size:16px; font-weight:bold; background-color: #f9f9f9; border-right:1px solid #d7d7d7;border-left:1px solid #d7d7d7; border-bottom:1px solid #d7d7d7; }
.write_body { background-color: #ffffff;  border-right:none; border-bottom:1px solid #d7d7d7; padding:11px 5px 11px 20px; font-size:16px}
.write_body2 { background-color: #ffffff; width:200px; padding:11px 0 11px 20px; border-right:1px solid #d7d7d7; border-bottom:1px solid #d7d7d7; font-size:16px}
.write_contents { background-color: #ffffff; border-bottom:1px solid #d7d7d7; padding:10px; font-size:16px}
.field { border:1px solid #ccc;  }
#p_n_datetime{text-align:right; display:block;float:right; padding-right:10px;}
/* #bo_v {margin-bottom:100px;} */
#bo_v_info span {font-size:16px;}
#bo_v_con p {font-size:16px;}
#bo_v_info .if_date {font-style:normal;font-size:16px;}
.content_copy {display:none;}
#bo_v_img {margin-top: 50px;text-align: center;}
#bo_v{ margin-top: 300px;}
#bo_v table{margin:0 auto;}
#bo_v_con{width: 1280px;	margin:0 auto;}
#container_title{
	display: none;
}
header {
    position: absolute;
    z-index: 2;
    margin: 0 auto;
    padding: 2.1vw 16.7vw;
    top: -300px;
}
</style>
	<?php 
		include_once('../include/include_menu.php');
	?>
<article id="bo_v" style="width:<?php echo $width; ?>">

    <!-- <header>
        <h2 id="bo_v_title">
            <?php if ($category_name) { ?>
            <span class="bo_v_cate"><?php echo $view['ca_name']; // 분류 출력 끝 ?></span> 
            <?php } ?>
            <span class="bo_v_tit">
            <?php
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?></span>
        </h2>
    </header> -->

    <!-- <section id="bo_v_info"> -->
       <!--  <h2>페이지 정보</h2>
        <span class="sound_only">작성자</span> <strong><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></strong>
        <span class="sound_only">댓글</span><strong><a href="#bo_vc"> <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo number_format($view['wr_comment']) ?>건</a></strong>
        <span class="sound_only">조회</span><strong><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($view['wr_hit']) ?>회</strong>
        <strong class="if_date"><span class="sound_only">작성일</span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("Y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong> -->
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr><td height="2" bgcolor="#777777" colspan="4"></td></tr>
		    <tr>
		
		<td class="write_head" colspan='4' style="text-align:center"><?php
		            // 분류 출력 끝
		            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
		            ?></td>
		
			</tr>
		
		    <tr>
		<!-- <td class="write_head" style="border-left:1px solid #dbdbdb;">글쓴이</td>
		<td class="write_body"><?php echo $view['wr_name'] ?><?php // if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></td> -->
		<td class="write_head" >작성일</td>
		<td class="write_body2"><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></td>
			</tr>
		     <tr>
		<!-- <td class="write_head" style="border-left:1px solid #dbdbdb;">분류</td>
		<td class="write_body">
			<?if ($category_name) echo $view['ca_name']; ?> 
		</td> -->
		<!-- <td class="write_head">조회수</td>
		<td class="write_body2"><?php echo number_format($view['wr_hit']) ?></td> -->
			</tr>
			
			
		</table>
	  </section> 
	
    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>
        <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";

            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                    echo get_view_thumbnail($view['file'][$i]['view']);
                }
            }

            echo "</div>\n";
        }
         ?>
        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con">
			<p class="fname"><?php echo get_view_thumbnail($view['content']); ?>	</p>
			<!-- <div class="sp_btn_wrap"><a href="javascript:;" class="sp_btn"><img src="/images/support_btn.jpg" alt="" /></a></div> -->
		</div>
        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>


        <!--  추천 비추천 시작 { -->

        <?php if ( $good_href || $nogood_href) { ?>
        <div id="bo_v_act">
            <?php if ($good_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="bo_v_good"><span class="sound_only">추천</span><strong><?php echo number_format($view['wr_good']) ?></strong></a>
                <b id="bo_v_act_good"></b>
            </span>
            <?php } ?>
            <?php if ($nogood_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="bo_v_nogood"><span class="sound_only">비추천</span><strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
                <b id="bo_v_act_nogood"></b>
            </span>
            <?php } ?>
        </div>
        <?php } else {
            if($board['bo_use_good'] || $board['bo_use_nogood']) {
        ?>
        <div id="bo_v_act">
            <?php if($board['bo_use_good']) { ?><span class="bo_v_good"><span class="sound_only">추천</span><strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
            <?php if($board['bo_use_nogood']) { ?><span class="bo_v_nogood"><span class="sound_only">비추천</span><strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
        </div>
        <?php
            }
        }
        ?>
        <!-- }  추천 비추천 끝 -->
    </section>

    <div id="bo_v_share">
        <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn btn_b03" onclick="win_scrap(this.href); return false;"><i class="fa fa-thumb-tack" aria-hidden="true"></i> 스크랩</a><?php } ?>

        <?php
        include_once(G5_SNS_PATH."/view.sns.skin.php");
        ?>
    </div>

    <?php
    $cnt = 0;
    if ($view['file']['count']) {
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>

    <?php if($cnt) { ?>
    <!-- 첨부파일 시작 { -->
   <!--  <section id="bo_v_file">
        <h2>첨부파일</h2>
        
    </section> -->
    <!-- } 첨부파일 끝 -->
    <?php } ?>

    <?php if(array_filter($view['link'])) { ?>
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
                <i class="fa fa-link" aria-hidden="true"></i> <a href="<?php echo $view['link_href'][$i] ?>" target="_blank">
                    
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
    <div id="bo_v_top">
        <?php
        ob_start();
        ?>

        <ul class="bo_v_left">
            <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="btn_b01 btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 수정</a></li><?php } ?>
            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="btn_b01 btn" onclick="del(this.href); return false;"><i class="fa fa-trash-o" aria-hidden="true"></i> 삭제</a></li><?php } ?>
            <!-- <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="btn_admin btn" onclick="board_move(this.href); return false;"><i class="fa fa-files-o" aria-hidden="true"></i> 복사</a></li><?php } ?>
            <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" class="btn_admin btn" onclick="board_move(this.href); return false;"><i class="fa fa-arrows" aria-hidden="true"></i> 이동</a></li><?php } ?> -->
            <?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>" class="btn_b01 btn"><i class="fa fa-search" aria-hidden="true"></i> 검색</a></li><?php } ?>
        </ul>
		<style type="text/css">
		#board_list {float:right;}
		.next_list {display:inline-block;padding:0 10px;font-size:15px;background:#333;color:#fff;height:35px;line-height:35px;}
		.next_list a {color:#fff;font-size:15px;display:inline-block;}
		.prev_list {display:inline-block;padding:0 10px;font-size:15px;background:#333;color:#fff;height:35px;line-height:35px;}
		.prev_list a {color:#fff;font-size:15px;display:inline-block;}
		</style>
		
        <ul class="bo_v_com">
           <li><a href="<?php echo $list_href ?>" class="btn_b01 btn">목록</a></li>
            <!-- <?php if ($reply_href) { ?><li><a href="<?php echo $reply_href ?>" class="btn_b01 btn"><i class="fa fa-reply" aria-hidden="true"></i> 답변</a></li><?php } ?> -->
           <!--  <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?> -->
        </ul>
		
        <?php if ($prev_href || $next_href) { ?>
        <!-- <ul class="bo_v_nb">
            
        </ul> -->
        <?php } ?>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->

    <?php
    // 코멘트 입출력
    //include_once(G5_BBS_PATH.'/view_comment.php');
     ?>





</article>

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