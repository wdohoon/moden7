<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->


<article id="bo_v" style="width:<?php echo $width; ?>">
    <header>
        <h2 id="bo_v_title" style="display: none;">
            <?php if ($category_name) { ?>
            <span class="bo_v_cate"><?php echo $view['ca_name']; // 분류 출력 끝 ?></span> 
            <?php } ?>
            <span class="bo_v_tit">
            <?php
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?></span>
        </h2>
    </header>

    <section id="bo_v_info">
        <h2>페이지 정보</h2>
        <span class="sound_only">작성자</span> <strong><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></strong>
        <!-- <span class="sound_only">댓글</span><strong><a href="#bo_vc"> <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo number_format($view['wr_comment']) ?>건</a></strong> -->
        <!-- <span class="sound_only">조회</span><strong><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($view['wr_hit']) ?>회</strong> -->
        <strong class="if_date"><span class="sound_only">작성일</span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("Y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong>

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

		<?php
		// 게시글 작성자의 mb_id를 사용하여 g5_member 테이블에서 정보 조회
		$member_sql = "SELECT * FROM g5_member WHERE mb_id = '{$view['mb_id']}'";
		$member_result = sql_fetch($member_sql);

		// mb_1 필드에서 병원명, mb_hp 필드에서 연락처 가져오기
		$hospital_name = $member_result['mb_1'];
		$contact_number = $member_result['mb_hp'];
		?>

        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con">		
			<div class="jtbl_frm01 tbl_wrap" style="margin-bottom: 0;">
				<table>
				<tbody>
				<tr><td colspan="2" class="td_border"></td></tr>

				<tr>
					<th scope="row"><label for="wr_name">병원명</label></th>
					<td>
						<?php echo $hospital_name; ?>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="wr_name">성함</label></th>
					<td>
						<?php echo $view['name'] ?>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="wr_name">연락처</label></th>
					<td>
						<?php echo $contact_number; ?>
					</td>
				</tr>

				<!-- <tr>
					<th scope="row"><label for="wr_9">승인여부</label></th>
					<td style="color:red;">
						<?php if($view['wr_9']==1){ echo '승인완료'; }else{ echo '미승인'; } ?>
					</td>
				</tr> -->
				<tr>
					<th scope="row"><label for="wr_1">신청 제품명</label></th>
					<td>
						<?php echo get_text($view['wr_1']) ?>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="wr_1">일련번호</label></th>
					<td>
						<?php echo get_text($view['wr_2']) ?>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="wr_1">등록차수</label></th>
					<td>
					<?
					
					
					
		
					$sql9 = "SELECT * FROM genuine_list where mb_id= '{$view['mb_id']}'  and   pd_name ='{$view['wr_1']}' and  pd_num  ='{$view['wr_2']}'    ";
					
					//echo $sql9;
					//exit;
					
					
					$row9 = sql_fetch($sql9);
					echo $row9['number'];
					
					
					
					
					?>
					</td>
				</tr>

				<!-- <?php 
					$wr_2 = explode(',',$view['wr_2']);
					$wr_2 = array_unique(array_values(array_filter($wr_2)));
				
					for($i = 0 ; $i < count($wr_2) ; $i++) {
						$ssql = " select * from g5_write_serial where wr_1 = '{$wr_2[$i]}' ";
						$fet = sql_fetch($ssql);
					?>
					<tr>
						<th scope="row"><label for="wr_2">시리얼넘버 - 제품명</label></th>
						<td>
							<?php echo $wr_2[$i] ?> - <?php echo $fet['wr_subject']; ?>
							<span>
								<button class="button<?php echo $i?>">정품인증 확인</button> 
								<div id="windo<?php echo $i?>"></div>
								<div class="alert_pop<?php echo $i; ?>">
									<p class="sub_conf_title<?php echo $i?>" style="color:red; font-weight:500;"></p>
									<input type="hidden" name="brand<?php echo $i?>" id="brand">
								</div>
							</span>
						</td>
					</tr>
					<script>
						var brand<?php echo $i; ?> = '';
				
						$(".button<?php echo $i; ?>").on('click',function(){
							var wr_id = "<?=$view['wr_id']?>";
							var mb_id = "<?=$view['mb_id']?>";
							var serial = "<?=$wr_2[$i];?>";
							$.ajax({
								url : "/ajax.serial.php",
								type: "POST",
								data : {
									"wr_id" : wr_id,
									"mb_id" : mb_id,
									"serial" : serial
								},
								async: false,
								success: function(msg){
									if(msg=="not-brand"){
										$(".alert_pop<?php echo $i; ?>").show();
										$(".alert_pop<?php echo $i; ?> .sub_conf_title<?php echo $i; ?>").html('시리얼 넘버가 존재하지 않습니다.');
									}else{
										$(".alert_pop<?php echo $i; ?>").show();
										$(".alert_pop<?php echo $i; ?> .sub_conf_title<?php echo $i; ?>").html('시리얼 넘버가 존재합니다.');
										$('input[name=brand<?php echo $i; ?>]').attr('value',msg);
									}
								 
								},
								
							});
							
						});
						
					</script>
				<?php 
					}
				?> -->

				<tr>
					<th scope="row"><label for="wr_subject">제목</label></th>
					<td>
						<?php echo $view['wr_subject'] ?>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="wr_content">내용</label></th>
					<td>
						<?php echo $view['wr_content'] ?>
						<?php 
							$sql = "select * from genuine_list where mb_id = '{$view['mb_id']}' and pd_name = '{$view['wr_1']}' and pd_num = '{$view['wr_2']}' and division = 1";
							//echo $sql;
							$row = sql_fetch($sql);
							if($row){
						?>
						<br><br>
						<a href="./genuine_app.php?mb_id=<?php echo get_text($view['mb_id']) ?>&pd_name=<?php echo get_text($view['wr_1']) ?>&pd_num=<?php echo get_text($view['wr_2']) ?>" onclick="return confirm('<?php echo $view['wr_1'].' / '.$view['wr_2'];?> 정품등록 하시겠습니까?')" class="btn_b01 btn" id="" style="text-decoration:none; border:2px solid; border-radius:5px;">승인하기</a>
						<?php }?>
					</td>
				</tr>
				
				</tbody>
				</table>

				

			</div>
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

    <div id="bo_v_share" style="display: none;">
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
    <section id="bo_v_file">
        <h2>첨부파일</h2>
        <ul>
        <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
            <li>
                <i class="fa fa-download" aria-hidden="true"></i>
                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
                </a>
                <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드 | DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
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

			<!-- <?php if ($is_admin) { ?><li><a href="javascript:;" id="ttee" class="btn_b01 btn"> 승인</a></li><?php } ?> -->
			<!--
			<?php if ($is_admin) { ?><li><a href="javascript:;" id="ttee" class="btn_b01 btn"> 비승인</a></li><?php } ?>
			-->

        </ul>

        <ul class="bo_v_com">
           <li><a href="<?php echo $list_href ?>" class="btn_b01 btn"><i class="fa fa-list" aria-hidden="true"></i> 목록</a></li>
            <?php if ($reply_href) { ?><li><a href="<?php echo $reply_href ?>" class="btn_b01 btn"><i class="fa fa-reply" aria-hidden="true"></i> 답변</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" id="cmcm" class="btn_b02 btn"> 글쓰기</a></li><?php } ?>
        </ul>

        <?php if ($prev_href || $next_href) { ?>
        <ul class="bo_v_nb" style="display: none;">
            <?php if ($prev_href) { ?><li class="btn_prv"><span class="nb_tit"><i class="fa fa-caret-up" aria-hidden="true"></i> 이전글</span><a href="<?php echo $prev_href ?>"><?php echo $prev_wr_subject;?></a> <span class="nb_date"><?php echo str_replace('-', '.', substr($prev_wr_date, '2', '8')); ?></span></li><?php } ?>
            <?php if ($next_href) { ?><li class="btn_next"><span class="nb_tit"><i class="fa fa-caret-down" aria-hidden="true"></i> 다음글</span><a href="<?php echo $next_href ?>"><?php echo $next_wr_subject;?></a>  <span class="nb_date"><?php echo str_replace('-', '.', substr($next_wr_date, '2', '8')); ?></span></li><?php } ?>
        </ul>
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
<!-- } 게시판 읽기 끝 -->
<?php
// 시리얼 넘버 게시판에서 값을 비교하는 식을 넣어야 함
$sql2 = " select * from g5_write_serial ";
$result2 = sql_query($sql2);
$row2 = sql_fetch_array($result2);

//for($i = 0 ; $new_p = $row2 ; $i++) {
?>
<script>
/*
$("#ttee").click(function() {
	var first = $('input[name=brand0]').val();
	var second = $('input[name=brand1]').val();
	var third = $('input[name=brand2]').val();
	var fouth = $('input[name=brand3]').val();
	var fifth = $('input[name=brand4]').val();

	

	if(first=='' || first===undefined){
		var first = '';
	}else{
		var first = $('input[name=brand0]').val();
	}

	if(second=='' || second===undefined){
		var second = '';
	}else{
		var second = $('input[name=brand1]').val();
	}

	if(third=='' || third===undefined){
		var third = '';
	}else{
		var third = $('input[name=brand2]').val();
	}

	if(fouth=='' || fouth===undefined){
		var fouth = '';
	}else{
		var fouth = $('input[name=brand3]').val();
	}

	if(fifth=='' || fifth===undefined){
		var fifth = '';
	}else{
		var fifth = $('input[name=brand4]').val();
	}


	var botable = "<?php echo $bo_table; ?>";
	var wrid = "<?php echo $view['wr_id']; ?>";

	console.log(first);
	console.log(second);
	console.log(third);
	console.log(fouth);
	console.log(fifth);

	location.href="/bbs/check.php?bo_table=" + botable + "&wr_id=" + wrid + "&s=c&first=" + first + "&second=" + second + "&third=" + third + "&fouth=" + fouth + "&fifth=" + fifth;
	
});
*/
</script>

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