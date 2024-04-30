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
	#bo_v{
		padding: 150px 260px 150px 260px;
	}
	#bo_v .bo_title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	#bo_v .bo_title h1{
		font-size: 44px;
	}

	.w_id{
		display: flex;
		gap:60px;
		font-size: 14px;
		align-items: center;
		flex-wrap: wrap;
	}
	.w_id p{
		color: #303030;
	}
	.bo_tit{
		font-size: 18px;
	    font-weight: bold;
		color: #002e6c;
		margin-top: 10px;
	}
	#bo_v_con{
		font-size: 14px;
		line-height: 2;
	}
	.paging{
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-wrap: wrap;
	}
	.page_btns{
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 20px;
		font-size: 14px;
	}
	.page_btns a{
		color: #002e6c;
		font-size: 14px;
	}
	.btns{
		background: #002e6c;
		width: 110px;
		height: 40px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.btns a{
		color: #fff;
	}
	#bo_v a.btn_b01{
		background: #fff;
		color: black !important;
		border-bottom: solid 2px #ccc;
		font-size: 14px;
		position: absolute;
		left:50%;
	}
	.jbutton.large{
		position: absolute;
		left:44%;
	}
	.jbutton .black{
		background: #fff;
	}
	.downloads{
		display: flex;
		justify-content: flex-end;
		align-items: center;
	}
	.downloads p{margin-right: 15px;}
	.downloads a{
		display: flex;
		align-items: center;
	}
	.btn_wraps{
		width: 300px;
	}
	.right_wraps{
		display: flex;
		justify-content: flex-end;
	}
	.who_bg .who_box span{
		font-size: 25px !important;
	}
	.banner_wrap  ul{
		background: #002e6c;
		height: 80px;
	}
	 .banner_wrap  ul li{
		height: 80px;
		width: 350px;
	}
	@media(max-width:1400px){
		#bo_v{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		.btn_wraps{
			width: 21.4vw
		}
		.banner_wrap  ul{
			height: 5.17vw;
		}
	}
	@media(max-width:1060px){
		#bo_v a.btn_b01{
			top:100px;
		}
	@media(max-width:768px){
		#bo_v{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
		.right_wraps a,
		.left_wraps{
			display: none;
		}
		.btn_wraps{
			width: 0px;
		}
		#bo_v a.btn_b01{
			top: 40px;
		}
	}
</style>

<!-- 게시물 읽기 시작 { -->
<!-- <div id="bo_v_table"><?php echo $board['bo_subject']; ?></div>-->

<article id="bo_v" style="width:<?php echo $width; ?>">
		<div class="bo_title">
			<span>CONNECTING THE WORLD</span>
			<h1>RESOURCES</h1>
		</div>
		<div class="solid"></div>
			<div class="w_id">
				<span>NO.&nbsp;&nbsp;<?php echo $view['wr_id'];?></span>
				<!-- <p>작성일 &nbsp;&nbsp; <?php echo date("Y.m.d", strtotime($view['wr_datetime'])) ?></p> -->
				<!-- <p>작성일 &nbsp;&nbsp; <?php echo $view['wr_3'];?></p> -->
				<?php
					if(isset($view['wr_3']) && !empty($view['wr_3'])) { 
						echo "<p>작성일 &nbsp;&nbsp; " . $view['wr_3'] . "</p>";
					} else {
						echo "<p>작성일 &nbsp;&nbsp; " . date("Y.m.d", strtotime($view['wr_datetime'])) . "</p>";
					}
				?>

				<p>조회수 &nbsp;&nbsp; <?php echo number_format($view['wr_hit']) ?></p>
			</div>
				<div class="downloads">
				<?php 
					$abc = sql_fetch("select * from g5_board_file where bo_table = '$bo_table' and wr_id = '{$view['wr_id']}' ");
				?>
                
                <?php
				
				if($view['wr_1'] && $view['wr_2']){  
				?>
                <p>첨부파일&nbsp;&nbsp; :&nbsp;&nbsp; <?php echo $view['wr_2']?> </p>
                 <a href="/data/kidb/<?php echo $view['wr_2'];  ?>" download="<?php echo $view['wr_2']?>"><img src="../img/down.png" alt=""></a>
                 
                 
                <?php				
				}else if($view['wr_1'] && !$view['wr_2']){   // db이전. 첨부파일 없는경우
				?>
				
				&nbsp;
                
				<?php
				}else{                
				?>
                
					<p>첨부파일&nbsp;&nbsp; :&nbsp;&nbsp; </p>
					<a href="<?php echo '/data/file/'.$board['bo_table'].'/'.$abc['bf_file'];  ?>" download="<?php echo $abc['bf_source']?>">
						<?php echo $abc['bf_source']?>&nbsp;&nbsp;&nbsp;&nbsp;<img src="../img/down.png" alt="">
					</a>
                    
                    
            <?php
				}
			?>
            
               
				</div>
                
         
                       
            

			<div class="bo_tit">
				<span><?php if ($category_name) echo $view['ca_name'].' | '; echo cut_str(get_text($view['wr_subject']), 70); ?><?php if (isset($list[$i]['icon_new'])) echo rtrim($list[$i]['icon_new']);?></span>
			</div>
            
           


	<div class="solid"></div>	
    <!-- <section id="bo_v_info">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr><td height="2" bgcolor="#646c6f" colspan="4"></td></tr>
    <tr>
    		<td class="write_head" style="">제목</td>
    		<td class="write_body"><?php
            if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?></td>
    	</tr>
    	<tr>
    		<td class="write_head" style="">날짜</td>
    		<td class="write_body"><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></td>
    	</tr> 
    
     <tr>
    		<td class="write_head" style="">글쓴이</td>
    		<td class="write_body"><?php echo $view['wr_name'] ?></td>
    
    	</tr>
    	 <tr>
    		<td class="write_head" style="">조회수</td>
    		<td class="write_body"><?php echo number_format($view['wr_hit']) ?></td>
    	</tr>  -->

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
   <!--  <section id="bo_v_file">
        <h2>첨부파일</h2>
        <ul>
        <?php
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
    </section> -->
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
            
           <!--  <?php if ($reply_href) { ?><li><span class="jbutton large black"><a href="<?php echo $reply_href ?>" class="btn_b01">답변</a></span></li><?php } ?> -->
    <!--      <?php if ($write_href) { ?><li><span class="jbutton large black"><a href="<?php echo $write_href ?>" class="btn_b01">글쓰기</a></span></li><?php } ?> -->
        </ul>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>


        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>

        <!-- 스크랩 추천 비추천 시작 { -->
        <?php if ($scrap_href || $good_href || $nogood_href) { ?>
        <div id="bo_v_act">
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
		<div class="solid"></div>

		<div class="paging">
			<div class="page_btns">
				<!--<div class="btns">
					<a href="<?php echo $prev_href; ?>" class="btns"><span>< PREV</span></a>
				</div> -->
				<div class="btn_wraps">
					<div class="left_wraps">
						<? if ($prev_href) { 
						$prev_wr_subject = get_text(cut_str($prev['wr_subject'], 20,'...'));
						$prev_wr_datetime = substr($prev['wr_datetime'],0,10);
						echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\">$prev_wr_subject</a>&nbsp;"; 
						}else{ 
						//echo"이전글이 없습니다."; 
						}?>
					</div>
				</div>
			</div>

			<span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록으로</a></span>
<!--
			<div class="page_btns">
				<div class="btn_wraps">
					<div class="right_wraps">
						<? if ($next_href) { 
						$next_wr_subject = get_text(cut_str($next['wr_subject'], 20,'...'));
						$next_wr_datetime = substr($next['wr_datetime'],0,10);
						echo "<a href=\"$next_href\" title=\"$next_wr_subject\">$next_wr_subject</a>&nbsp;"; 
						}else{ 
						//echo"다음글이 없습니다."; 
						}?>
					</div>
				</div>
				<div class="btns">
					<a href="<?php echo $next_href; ?>"><span>NEXT ></span></a>
				</div>
			</div>
		</div>

-->


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
<!-- } 게시글 읽기 끝 -->