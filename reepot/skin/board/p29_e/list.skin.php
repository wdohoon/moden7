<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

//echo $board_skin_url;
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

//========================================================
// 페이지 변경시 필요한 소스 시작~!!!!!!!!!!!!!!

function get_paging2($write_pages, $cur_page, $total_page, $url, $add="")
{
	global $board_skin_url;
    $str = "<ul class='pagenation'>";
    if ($cur_page > 1) {
        $str .= "<li><a href='".$url."' class='btn'><img src='{$board_skin_url}/img/btn_firstly.gif' alt='처음' /></a></li>";
        //$str .= "[<a href='" . $url . ($cur_page-1) . "'>이전</a>]";
    }

    $start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
    $end_page = $start_page + $write_pages - 1;

    if ($end_page >= $total_page) $end_page = $total_page;

    if ($start_page > 1) $str .= "<li><a href='" . $url . ($start_page-1) . "{$add}' class='btn'><img src='{$board_skin_url}/img/btn_prev.gif' alt='이전' /></a></li>";

    if ($total_page > 1) {
        for ($k=$start_page;$k<=$end_page;$k++) {
            if ($cur_page != $k)
                $str .= "<li><a href='$url$k{$add}'><span>$k</span></a></li>";
            else
                $str .= "<li class='on'><a href='$url$k{$add}'><b>$k</b></a></li>";
        }
    }

    if ($total_page > $end_page) $str .= " <li><a href='" . $url . ($end_page+1) . "{$add}' class='btn'><img src='{$board_skin_url}/img/btn_next.gif' alt='다음으로' /></a></li>";

    if ($cur_page < $total_page) {
        //$str .= "[<a href='$url" . ($cur_page+1) . "'>다음</a>]";
        $str .= "<li><a href='$url$total_page{$add}' class='btn'><img src='{$board_skin_url}/img/btn_lastly.gif' alt='마지막으로' /></a></li>";
    }
    $str .= "</ul>";

    return $str;
}

$write_pages = get_paging2($config['cf_write_pages'], $page, $total_page, "./board.php?bo_table=$bo_table".$qstr."&page=");

?>

<style>
/* pagenation */
.pagenation             {padding:0; text-align:center; margin: 30px 0;}
.pagenation li           {display:inline; padding:7px 0; border:1px solid #b6b6b6; margin:0 3px;}

.pagenation li a          {color:#424242; padding:0px 10px;}
.pagenation li a img      {vertical-align:middle;}
.pagenation li:hover        {background:#f8f8f8;}

.pagenation li.on          {background:#777777 ; border:1px solid #777777;}
.pagenation li.on a         {color:#ffffff;}


</style>

	<script type="text/javascript">
		$(document).ready(function(e){
			$(".stoer_map map area").on("mouseenter",function(e){
				var id=$(this).index()
					//alert(id);
				$(".store_info img").stop().fadeOut(100)
				$(".store_info img").eq(id).fadeIn(160)
				//	$(".store_info img").removeClass('on');
				//	$(".store_info img").eq(id).addClass('on');

			})
			$(".stoer_map map area").on("mouseleave",function(e){
				//	var id=$(this).index();
				//	$(".store_info img").eq(id).removeClass('on');
				$(".store_info img:not(.on)").stop().fadeOut(100);
				$(".store_info img.on").fadeIn(160);

			})
		})
	</script>
<style>
 .m-only{display:none}

#stroe_wrap {    position: relative;overflow:hidden;width:100%; min-height:274px; background:#f9f9f9; position:relative;margin-bottom:50px;padding:30px 9%;}
.store_sel {float:left;display:table;width:50%; height:386px;position:relative; margin:0 auto;}
#bo_cate {display:table-cell;vertical-align:middle}
.store_sel01 {position:absolute; width:120px; height:30px; top:98px; left:47px;font-size:15px;font-family:'Noto Sans KR', sans-serif;background:#fff;}
.store_sel02 {position:absolute; width:170px; height:30px; top:98px; left:170px;font-size:15px;font-family:'Noto Sans KR', sans-serif;background:#fff;}
.store_sel03 {position:absolute; width:293px; height:30px; top:136px; left:47px;font-size:15px;font-family:'Noto Sans KR', sans-serif;}
.store_sel04 {position:absolute; width:77px; height:67px; top:98px; left:345px;
	background:#000; color:#fff; border:0; cursor:pointer;font-size:14px;font-family:'Noto Sans KR', sans-serif;
}
.map_wrap {position:relative;float:left;width:35%;height:386px;margin-left:5%}
.stoer_map {display:block;position:absolute; left:0; top:0px; margin-left:0;background:url("/skin/board/<?=$board['bo_skin']?>/map00.jpg") no-repeat;}
.stoer_map img {position:relative; z-index:33333;}
.store_info {display:block;position:absolute;width:288px;height:386px; left:0; top:0px; margin-left:0;}
.store_info img {position:absolute; top:0; display:none;}
.store_info img.on {display:block;}
.dong_view {position:absolute;width:1200px;left:0;top:0;margin:0;z-index:1000;background:#fff}
.new_noti {display:inline-block;padding:8px;background:#9c2929;color:#fff;font-weight:bold;}
 .jtbl_head01 .td_num {width:90px;text-align:center}
 .jtbl_head01 .td_date {width:165px;text-align:center}

/*추가*/
#stroe_wrap{padding:0;background: 0;width:1200px;margin:0 auto 0}
#bo_list{position: absolute;top: 300px;right: 0;width: 55%;margin-right:5%;float: right;}
.store_sel{width:1200px;margin:160px auto 80px;float: none;    height: auto;}
#bo_sch{display:none}
.bottom_wrap{width:1200px;margin:0 auto 160px;}
body{background: #FBFBFB; position: relative;}
.top_wrap .inner_bg{position: relative;background: url(/images/sub05-p26.png) ;width:100%;height:41.6667vw;text-align: left;padding: 14.625vw 0 0 19.2708vw;}
.top_wrap .inner_bg .text-top h3{color:#fff;font-size:3.9063vw}
.top_wrap .inner_bg .text-top p{margin-top: 10px;color:#fff;font-size:1.56vw}
.top_wrap .text-bottom{position: absolute;bottom: 40px;right: 0;margin-right: 14.3229vw;font-size:1.0417vw;color:#fff}
.top_wrap .text-bottom img{vertical-align: bottom;margin-right:10px}
.bo_fx{width: 700px;position: absolute;top: 0;right: 0;z-index: 1;margin-right: -3.6771vw;margin-top:-54vw}
.jbutton.black a{background-image: none;color: #fff!important;font-size: 0.8854vw;border: 1px solid #fff;border-radius: 5px;height: 40px;line-height: 40px;width: 160px;}
.jbutton.black {background-image:none}
.jbutton *:hover,.jbutton {background-image: none !important}

#bo_cate a:focus, #bo_cate a:hover, #bo_cate a:active {text-decoration: none;color: #fff;background: 0;border-bottom: 1px solid #DDDDDD;}
#bo_cate a{ font-size:0.9375vw; background: 0;border: 0;border-bottom: 1px solid #DDDDDD;}
#bo_cate #bo_cate_on {color: #27AAE1;background: 0;font-weight: 500;border: 0;border-bottom: 3px solid #27AAE1;}

#bo_cate li {width: 11%;}
.all_wrap{position: relative;width: 1200px;
    margin: 0 auto;}
#bo_cate a:focus, #bo_cate a:hover, #bo_cate a:active {text-decoration: none;color: #000;background: 0;border: 0;    border-bottom: 3px solid #27AAE1;}
#bo_cate ul{    display: flex;
    flex-wrap: wrap;}
@media (max-width: 1280px) {
/*추가*/

.top_wrap .inner_bg { padding: 10.625vw 0 0 10.2708vw;}
.jbutton.black a {background-image: none;color: #fff!important;font-size: 1.54vw;}
.top_wrap .text-bottom {position: absolute;bottom: 40px;right: 0;margin-right: 2.3229vw;font-size: 1.5417vw;}
.all_wrap{width: 100%;padding:0 4%;margin:0}
.store_sel {width: 100%;}
#stroe_wrap { width: 100%;}
#bo_cate li {  width: 33.3333%;}
#bo_list { top: 390px;}
.bo_fx { margin-top: -73vw;}
 }


@media (max-width: 1100px) {

 }

 @media (max-width: 1024px) {
.jtbl_head01 .td_num {width:65px;text-align:center; }
.jtbl_head01 .td_date {width:100px; text-align:center; }
.jtbl_head01 .td_group1 {width:110px;text-align:center}

.map_wrap {float: none;width: 100%;    margin-left: 0;}
#bo_list {position: relative;width: 100%;top: 30px;margin-right: 0;    margin-bottom: 160px;}
.stoer_map,.store_info { left: 50%;margin-left: -144px;}
.bo_fx { margin-top: -121vw;}
}
@media (max-width: 767px) {
.jtbl_head01 .td_num {width:65px;text-align:center; }
.jtbl_head01 .td_date {width:140px; text-align:center; }
 .jtbl_head01 .td_group1 {width:140px;text-align:center}
.hide_mo {display:none ;}
/* .th_bg012 {background:none !important;} */
.map_wrap {display:none;}
#stroe_wrap {min-height:auto;padding:3%;margin-bottom:30px}
.store_sel {float:none;width:100%;height:auto;}
#bo_cate a {height:34px;line-height:32px;}
 }

 @media (max-width: 720px) {
 .m-only{display:block}
.top_wrap .inner_bg { background: url(/images/m-sub05-p26.png);    padding:18.0556vw 0 0 8.3333vw;height:500px}
.top_wrap .inner_bg .text-top h3 {font-size: 8.8889vw;}
.top_wrap .inner_bg .text-top p{font-size:4.7222vw}
.top_wrap .text-bottom{color:#CCCCCC;padding-left:  8.3333vw;margin-right: 0;font-size:3.3333vw;    text-indent: -42px;padding-left: 15.3333vw;padding-right: 20px;}
.top_wrap .inner_bg .text-top p {font-size: 4.7222vw;line-height: 1.5;}
.jbutton.black a { font-size: 3.6111vw;}
 }

 @media (max-width: 460px) {
.jtbl_head01 .td_num {width:48px;text-align:center; }
.jtbl_head01 .td_date {width:110px; text-align:center; }
 .jtbl_head01 .td_group1 {width:125px;text-align:center}
 .jtbl_head01 td {letter-spacing:-0.8px}

 #stroe_wrap {min-height:auto;padding:1%;margin-bottom:30px}

.hide_mo {display:none ;}
/* .th_bg012 {background:none !important;} */
 }
.bx-wrapper  {margin:0 auto 85px !important; position: relative;}
.info_wrap {float:left; margin-right:15px; }
.info_wrap:last-child {margin-right: 0;}
.text_box {text-align: center; margin-top:30px; font-family: 'NanumSquare', sans-serif;}
.text_box h2 {color: #10100f; font-size: 23px; font-weight: 900;font-family: 'NanumSquare', sans-serif; }
.s_address {color: #10100f; font-size: 17px; margin:30px auto 15px;}
.first_text {margin-bottom:9px;}
.info_btn a {color: #b48225; font-size: 19px; font-weight: bold;	}
.bx-controls {position: absolute; width: 100%; top:93px;}
.bx-controls-direction a {display: inline-block; width: 45px; height: 45px; text-indent:-9999em;}
.bx-prev {background: url(/images/store_slide_prev.png) no-repeat;}
.bx-next {background: url(/images/store_slide_next.png) no-repeat; position: absolute; right:0}


</style>

<?if($sca){?>
<style>
	.scrollhide, .scrollhide4 {opacity: 1 !important;}
</style>
<?}?>
<!-- <h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>-->

<div class="top_wrap">
  <div class="inner_bg">
    <div class="top_btn"></div>
    <div class="text-top">
      <h3>Find a hospital</h3>
      <p>Find a reepot Querencia near you.</p>
    </div>
    <div class="text-bottom"><img src="/images/find-icon.png" alt="">This page was created not for the recommendation or recommendation of the hospital, but for the purpose of information delivery</div>
  </div>
</div>

<div class="all_wrap">
  <div id="stroe_wrap">

    <div class="store_sel">
         <!-- 게시판 카테고리 시작 { -->

      <?php if ($is_category) { ?>
      <div id="bo_cate">
          <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>


          <ul id="bo_cate_ul">
              <?php echo $category_option ?>
          </ul>


      </div>
      <?php } ?>

      <!-- } 게시판 카테고리 끝 -->

    </div>

    <div class="map_wrap">
      <div class="stoer_map">
        <img src="/skin/board/<?=$board['bo_skin']?>/store_map.png" usemap="#map11" alt="" />

        <map name="map11" id="map11">
          <area shape="poly" coords="81,97,68,105,73,114,84,116,92,111" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=서울&kjh=sss&wr_1=서울" />
          <area shape="poly" coords="205,275,183,291,190,301,201,294,207,280" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=부산&kjh=sss&wr_1=부산" />
          <area shape="poly" coords="157,232,168,227,177,235,170,245,163,248,160,254,154,254,154,248" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=대구&kjh=sss&wr_1=대구" />
          <area shape="poly" coords="51,102,67,101,69,112,81,119,69,121,53,108" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=인천&kjh=sss&wr_1=인천" />
          <area shape="poly" coords="94,192,108,194,101,206,95,213,86,211,89,199,85,203" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=대전&kjh=sss&wr_1=대전" />
          <area shape="poly" coords="49,283,64,280,72,288,62,297,51,290" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=광주&kjh=sss&wr_1=광주" />
          <area shape="poly" coords="190,262,201,248,217,255,217,269,208,272" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=울산&kjh=sss&wr_1=울산" />
          <area shape="poly" coords="92,164,87,173,90,186,100,181,98,172" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=세종&kjh=sss&wr_1=세종" />
          <area shape="poly" coords="69,100,56,94,41,88,41,74,52,65,63,61,76,57,85,57,86,64,96,70,104,74,110,83,110,86,107,89,107,98,107,104,115,110,123,112,119,119,119,137,113,145,98,153,89,160,77,157,70,154,62,145,61,140,66,127,84,119,93,112,87,101,83,96" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=경기도&kjh=sss&wr_1=경기도" />
          <area shape="poly" coords="151,315,143,312,134,312,129,306,116,305,110,276,112,251,127,238,132,238,141,252,153,257,164,260,174,265,190,263,200,270,183,292,176,295,166,295,159,299,149,309" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=경상남도&kjh=sss&wr_1=경상남도" />
          <area shape="poly" coords="147,248,135,237,126,233,131,220,137,209,127,194,124,178,139,169,148,165,158,165,170,155,177,151,192,151,207,152,213,145,215,154,215,186,212,224,222,230,215,248,203,246,190,260,181,263,165,256,177,239,171,227,153,228" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=경상북도&kjh=sss&wr_1=경상북도" />
          <area shape="poly" coords="58,264,44,274,32,271,26,302,34,318,36,347,44,346,60,342,72,328,80,337,83,342,99,341,108,328,114,312,114,295,109,278,94,278,77,278,73,278,70,273,70,267" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=전라남도&kjh=sss&wr_1=전라남도" />
          <area shape="poly" coords="107,277,90,272,72,274,68,263,50,261,44,269,42,256,48,246,52,226,69,214,82,221,102,221,110,228,128,228,108,248" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=전라북도&kjh=sss&wr_1=전라북도" />
          <area shape="poly" coords="47,154,44,166,33,166,36,178,48,201,48,219,63,216,75,216,85,221,100,224,108,222,103,208,97,217,88,213,85,206,90,194,92,188,87,166,66,169" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=충청남도&kjh=sss&wr_1=충청남도" />
          <area shape="poly" coords="135,210,121,225,110,220,104,210,109,199,110,189,96,193,95,188,100,185,98,163,105,152,118,147,124,148,131,141,147,139,151,141,149,146,174,148,156,161,128,170,121,182,127,202" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=충청북도&kjh=sss&wr_1=충청북도" />
          <area shape="poly" coords="82,55,70,57,57,43,59,32,77,20,89,12,95,3,98,20,99,26,106,14,114,4,136,12,146,30,203,135,211,145,193,148,175,147,152,142,140,137,131,134,124,145,119,144,125,116,109,107,111,91,111,83,92,65" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=강원도&kjh=sss&wr_1=강원도" />
          <area shape="poly" coords="86,364,70,369,68,380,87,380,104,378,114,372,113,364,99,361" href="/bbs/board.php?bo_table=<?php echo $bo_table ?>&sca=제주도&kjh=sss&wr_1=제주도" />
        </map>

      </div>
      <div class="store_info">

        <img class="<?if($sca=="서울"){?>on<?}?>" style="<?if($sca=="서울"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map01.jpg" alt="" />
        <img class="<?if($sca=="부산"){?>on<?}?>" style="<?if($sca=="부산"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map02.jpg" alt="" />
        <img class="<?if($sca=="대구"){?>on<?}?>" style="<?if($sca=="대구"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map03.jpg" alt="" />
        <img class="<?if($sca=="인천"){?>on<?}?>" style="<?if($sca=="인천"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map04.jpg" alt="" />
        <img class="<?if($sca=="대전"){?>on<?}?>" style="<?if($sca=="대전"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map05.jpg" alt="" />
        <img class="<?if($sca=="광주"){?>on<?}?>" style="<?if($sca=="광주"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map06.jpg" alt="" />
        <img class="<?if($sca=="울산"){?>on<?}?>" style="<?if($sca=="울산"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map07.jpg" alt="" />
        <img class="<?if($sca=="세종"){?>on<?}?>" style="<?if($sca=="세종"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map08.jpg" alt="" />
        <img class="<?if($sca=="경기도"){?>on<?}?>" style="<?if($sca=="경기도"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map09.jpg" alt="" />
        <img class="<?if($sca=="경상남도"){?>on<?}?>" style="<?if($sca=="경상남도"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map10.jpg" alt="" />
        <img class="<?if($sca=="경상북도"){?>on<?}?>" style="<?if($sca=="경상북도"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map11.jpg" alt="" />
        <img class="<?if($sca=="전라남도"){?>on<?}?>" style="<?if($sca=="전라남도"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map12.jpg" alt="" />
        <img class="<?if($sca=="전라북도"){?>on<?}?>" style="<?if($sca=="전라북도"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map13.jpg" alt="" />
        <img class="<?if($sca=="충청남도"){?>on<?}?>" style="<?if($sca=="충청남도"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map14.jpg" alt="" />
        <img class="<?if($sca=="충청북도"){?>on<?}?>" style="<?if($sca=="충청북도"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map15.jpg" alt="" />
        <img class="<?if($sca=="강원도"){?>on<?}?>" style="<?if($sca=="강원도"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map16.jpg" alt="" />
        <img class="<?if($sca=="제주도"){?>on<?}?>" style="<?if($sca=="제주도"){?>display:block;<?}?>" src="/skin/board/<?=$board['bo_skin']?>/map17.jpg" alt="" />
      </div>
    </div>
  </div>

  <!-- 게시판 목록 시작 { -->
  <div id="bo_list" >

      <!-- 게시판 카테고리 시작 { -->

      <!--
      <?php if ($is_category) { ?>
      <nav id="bo_cate">
          <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>


          <ul id="bo_cate_ul">
              <?php echo $category_option ?>
          </ul>


      </nav>
      <?php } ?>
      -->

      <!-- } 게시판 카테고리 끝 -->


      <!-- 게시판 페이지 정보 및 버튼 시작 { -->
     <!-- <div class="bo_fx">
          <div id="bo_list_total">
              <span>Total <?php echo number_format($total_count) ?>건</span>
              <?php echo $page ?> 페이지
          </div>

          <?php if ($rss_href || $write_href) { ?>
          <ul class="btn_bo_user">
              <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
              <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
              <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
          </ul>
          <?php } ?>
      </div>-->
      <!-- } 게시판 페이지 정보 및 버튼 끝 -->

      <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
      <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
      <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
      <input type="hidden" name="stx" value="<?php echo $stx ?>">
      <input type="hidden" name="spt" value="<?php echo $spt ?>">
      <input type="hidden" name="sca" value="<?php echo $sca ?>">
      <input type="hidden" name="page" value="<?php echo $page ?>">
      <input type="hidden" name="sw" value="">

      <div class="jtbl_head01 jtbl_wrap">
          <table>
          <thead>
          <tr>
              <th scope="col" class="">지역</th>
              <th scope="col" class="">지점명</a></th>
        <th scope="col" class="" >연락처</a></th>
              <th scope="col" class="hide_mo">주소</a></th>
             <!--  <th scope="col" class="">상세보기</a></th> -->
          </tr>

          </thead>
          <tbody>
          <?php
          for ($i=0; $i<count($list); $i++) {
           ?>
          <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">

              <td class="td_num">

           <?php echo $list[$i]['ca_name'] ?>

              </td>

              <style type="text/css">
          .td_44 {text-align:center;}
        </style>
              <td class="td_date"><?php echo $list[$i]['wr_3'] ?></td>
              <td class="td_44 td_group1"><?php echo $list[$i]['wr_5'] ?></td>
        <!-- <td class="td_44"><?php echo $list[$i]['wr_10'] ?></td> -->
        <td class="td_44 hide_mo"><a href="/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?php echo $list[$i]['wr_id'] ?>"><?php echo $list[$i]['wr_9'] ?>&nbsp;<?php echo $list[$i]['wr_10'] ?></a></td>
        <!-- <td class="td_44" style="min-width:62px;">

                        <a href="/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?php echo $list[$i]['wr_id'] ?>">




                          <img style="width:18px;height:22px;" src="/skin/board/<?=$board['bo_skin']?>/view_ot222.jpg" alt="" />


                       <a href="/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?php echo $list[$i]['wr_id'] ?>">
        </td> -->

          </tr>
          <?php } ?>
          <?php if (count($list) == 0) { echo '<tr><td colspan="8" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
          </tbody>
          </table>
      </div>

      <?php if ($list_href || $is_checkbox || $write_href) { ?>
      <div class="bo_fx">


          <?php if ($list_href || $write_href) { ?>
          <ul class="btn_bo_user">
             <?php if ($admin_href) { ?><li><span class="jbutton large black"><a href="<?php echo $admin_href ?>">관리자</a></span></li><?php } ?>
              <?php if ($list_href) { ?><li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li><?php } ?>
              <?php if ($write_href) { ?><li><span class="jbutton large black"><a href="<?php echo $write_href ?>" class="width_j">Branch registration</a></span></li><?php } ?>
          </ul>
          <?php } ?>
      </div>
      <?php } ?>
      </form>
  </div>
</div>
<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>


    <!-- 게시판 검색 시작 { -->
<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <div>
		<form name="fsearch" method="get">
			<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<input type="hidden" name="sop" value="and">
			<label for="sfl" class="sound_only">검색대상</label>
			<select name="sfl" id="sfl">
				<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>지점명</option>
				<option value="wr_9 || wr_10"<?php echo get_selected($sfl, 'wr_9 || wr_10'); ?>>내용</option>
				<option value="wr_9 || wr_10"<?php echo get_selected($sfl, 'wr_9 || wr_10'); ?>>지점명+내용</option>
				<!-- <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option> -->
			  <!--   <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option> -->
				<!-- <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option> -->
				<!-- <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option> -->
			</select>
			<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
			<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input" size="15" maxlength="15">
			<span class="jbutton large black" style=""><input type="submit" class="width_j2" id="btn_submit" value="검색"></span>
		</form>
    </div>
</fieldset>
<!-- } 게시판 검색 끝 -->

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
