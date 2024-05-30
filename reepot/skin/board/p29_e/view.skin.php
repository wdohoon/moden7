<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<script src="<?php echo G5_JS_URL; ?>/jquery.bxslider.js"></script>
<style>
.write_head { max-width:120px;width:15%;min-width:70px;text-align:center; color:#10100f; font-size:13px; font-weight:bold; background-color: #f5f5f5; border-right:0px solid #999;border-left:0px;; border-bottom:1px solid #ddd; font-family: 'NanumSquare', sans-serif; font-size: 17px;}
.write_body { font-size:13px;background-color: #ffffff;  border-right:0px solid #999; border-bottom:1px solid #dddddd; padding:23px 20px; font-family: 'NanumSquare', sans-serif; font-size: 17px;}
.write_body2 { font-size:13px;background-color: #ffffff; width:240px; padding:23px 20px; border-right:0px solid #999; border-bottom:1px solid #dddddd; font-family: 'NanumSquare', sans-serif; font-size: 17px;}
.write_contents { background-color: #ffffff; border-bottom:1px solid #dddddd; padding:10px; font-size:12px;}
.field { border:1px solid #ccc;  }
#p_n_datetime{text-align:right; display:block;float:right; padding-right:10px;font-size:12px;}
#writeContents{}
.field { border:1px solid #ccc;  }
#p_n_datetime{text-align:right; display:block;float:right; padding-right:10px;font-size:15px; }
#writeContents{}
#bo_v_info table {border-collapse: separate;}
.show_con_th {vertical-align:top;line-height:1.3em;background-position: top right;}
.show_con_td {min-height:100px !important;line-height:1.3em;}
.stock_txt01 {display:block;position:relative;max-width:1114px;margin:0 auto;text-align:left;line-height:1.6em;font-size:14px}
.stock_txt01 span {display:inline-block; width:50px;margin-right:5px;}
.view_mo {display:none;}
.new_map {width: 100%; height:540px;}
.bx-wrapper {position: relative;}
/* .bx-viewport {height:100% !important;} */
.bo_v_img > a {height:100%;}
.bx-controls {display:none;position: absolute; width: 100%; top:50%; transform:translateY(-50%) !important;}
.bx-controls-direction a {display: inline-block; width: 45px; height: 45px; text-indent:-9999em;}
.bx-prev {background: url(<?php echo $board_skin_url?>/img/store_slide_prev.png) no-repeat;}
.bx-next {background: url(<?php echo $board_skin_url?>/img/store_slide_next.png) no-repeat; position: absolute; right:0}
.store_text {font-family: 'NanumSquare', sans-serif; font-size: 25px; font-weight: 900; color: #10100f; margin-bottom: 25px;}
.store_text {
    margin-top: 160px;}
#bo_v{width:1200px;margin:50px auto}
 @media (max-width: 1280px) {
#bo_v {
    width: 100%;
    padding: 0 4%;
       margin: 100px auto;
}
.store_text {
    margin-top: 100px;
}
 }
@media (min-width: 1100px) {

 }

 @media (max-width: 1024px) {
.view_mo {display:table-row;}
.hide_mo {display:none ;}
 }

@media (max-width: 767px) {
.view_mo {display:table-row;}
.hide_mo {display:none ;}
.write_head { width:90px;}
.write_body {line-height:1.2em;}
.new_map {max-width:825px;width:80%;height:360px;margin-top:20px;margin:0 auto;}
 }
 @media (max-width: 460px) {
 .view_mo {display:table-row;}
.hide_mo {display:none ;}
.write_head { width:85px;}
.write_body {line-height:1.2em;}
#bo_v_atc {padding:0px 5px 30px}
.stock_txt01 {letter-spacing:-0.5px;}
.new_map {max-width:825px;width:90%;height:300px;margin-top:20px;margin:0 auto;}
 }
</style>


<!-- 게시물 읽기 시작 { -->
<h2 class="store_text"><?php echo $view['wr_3'] ?></h2>
<article id="bo_v" >
    <!-- <header>
        <h1 id="bo_v_title">
            <?php
            //if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
            //echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?>
        </h1>
    </header> -->

    <section id="bo_v_info">
    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<!-- <tr><td height="1" bgcolor="#bebebe" colspan="4"></td></tr> -->
	<!-- <tr>

		<td class="write_head" style="">제목</td>
		<td class="write_body"><?php
	            if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
	            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
	            ?></td>

	</tr> -->
	<tr><td height="1" bgcolor="#a4a4a4" colspan="4"></td></tr>
	<tr>
		<td class="write_head" style="">주소</td>
		<td class="write_body" colspan="3">
		<?php echo $view['wr_9'] ?>&nbsp;<?php echo $view['wr_10'] ?></td>
	</tr>

		<tr>

		<!-- <td class="write_head" >지역 | 지점명</td>
		<td class="write_body"><?php
		            if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
		            echo cut_str(get_text($view['wr_3']), 70); // 글제목 출력
		            ?></td> -->
		<td class="write_head hide_mo" style="">전화번호</td>
		<td class="write_body2 hide_mo"><?php echo $view['wr_5']?></td>

	</tr>
	<tr class="view_mo">

		<td class="write_head" style="">작성일</td>
		<td class="write_body"><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></td>

	</tr>
	 <tr>
		<td class="write_head" style="border-bottom:1px solid #a4a4a4;">영업시간</td>
		<td class="write_body" style="border-bottom:1px solid #a4a4a4;"><?php echo $view['wr_4'] ?></td>
		<!-- <td class="write_head hide_mo" style="">조회수</td>
		<td class="write_body2 hide_mo"><?php echo number_format($view['wr_hit']) ?></td> -->

	</tr>
	<tr class="view_mo">

		<td class="write_head " style="">조회수</td>
		<td class="write_body " ><?php echo number_format($view['wr_hit']) ?></td>

	</tr>



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
        <ul class="bo_v_nb">

        </ul>
        <?php } ?>

        <ul class="bo_v_com">
            <?php if ($update_href) { ?><li><span class="jbutton large black"><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></span></li><?php } ?>
            <?php if ($delete_href) { ?><li><span class="jbutton large black"><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a></span></li><?php } ?>
           <!--  <?php if ($copy_href) { ?><li><span class="jbutton large black"><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">복사</a></span></li><?php } ?>
            <?php if ($move_href) { ?><li><span class="jbutton large black"><a href="<?php echo $move_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">이동</a></span></li><?php } ?> -->
            <?php if ($search_href) { ?><li><span class="jbutton large black"><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></span></li><?php } ?>
            <li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li>
           <!--  <?php if ($reply_href) { ?><li><span class="jbutton large black"><a href="<?php echo $reply_href ?>" class="btn_b01">답변</a></span></li><?php } ?> -->
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
			echo "<div id=\"bo_v_img_arrow\">\n";
            echo "<div id=\"bo_v_img\">\n";


            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                    echo get_view_thumbnail($view['file'][$i]['view']);
                }
            }
			echo "</div>\n";
            echo "</div>\n";
		 }
         ?>

  <?
  if($view['wr_7'] && $view['wr_8']){

  ?>

        <!--지도 ------------------------------------------------------------------------------------------->


     <?
	/*
	$a=37.4894981;  // 위도

	$b=126.9057967;  // 경도

	$c ="서울 구로구 영등포구 대림동";

	$d ="모든미디어";

	*/


	$a=$view['wr_7'];  // 위도

	$b=$view['wr_8'];  // 경도

	//$c =$view['wr_10'];

	//$d =$view['wr_3'];

	?>
	<div id="map" class="new_map" style=""></div><br />
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=b72ce03f5ab697530bdcb38c9b6157d7"></script>
	<script>
	var mapContainer = document.getElementById('map'), // 지도를 표시할 div
		mapOption = {
			center: new daum.maps.LatLng(<?=$a?>, <?=$b?>), // 지도의 중심좌표
			level: 5 // 지도의 확대 레벨
		};

	var map = new daum.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

	// 마커가 표시될 위치입니다
	var markerPosition  = new daum.maps.LatLng(<?=$a?>, <?=$b?>);

	// 마커를 생성합니다
	var marker = new daum.maps.Marker({
		position: markerPosition
	});

	// 마커가 지도 위에 표시되도록 설정합니다
	marker.setMap(map);

	// 아래 코드는 지도 위의 마커를 제거하는 코드입니다
	// marker.setMap(null);
	</script>


	<!-- <div id="roadview" style="width:1200px;height:398px;"></div> -->


</body>
</html>




        <!--지도 끝 ---------------------------------------------------------------------------------------->


<?
}
?>

<!-- <p class="stock_txt01"><span>주  소</span>: &nbsp;<?=$view['wr_10']?></p>
<p class="stock_txt01"><span>연락처</span>: &nbsp;<?=$view['wr_subject']?> </p> -->
      <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>


		<style type="text/css">
			.dd {padding-bottom:10px; margin-top:20px;margin-bottom:10px; border-bottom:1px solid #bebebe;
			color:#000; font-size:15px; font-weight:bold;}
		</style>
		<!-- <div class="dd">
			지점소개
		</div>
		        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div> -->
    </section>

    <?php
    //include_once(G5_SNS_PATH."/view.sns.skin.php");
    ?>

    <?php
    // 코멘트 입출력
   // include_once('./view_comment.php');
     ?>

     <div id="bottom_p_n" style="display:none;">

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

<script>
	$(function(){
		var slide = $('#bo_v_img').bxSlider({
			mode: 'horizontal',
			controls:true,
			pager:false,
			auto:true
		  });

	})
</script>
<!-- } 게시글 읽기 끝 -->