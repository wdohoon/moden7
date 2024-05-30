<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

//G5_PATH
$board_skin_path = G5_PATH.'/skin/latest/calendar2';
$board_skin_url = G5_URL.'/skin/latest/calendar2';
$bo_table = 'calendar2';
$write_table = 'g5_write_calendar2';
include_once("$board_skin_path/moonday.php"); // 석봉운님의 음력날짜 함수

if (preg_match('/%/', $width)) {
  $col_width = "14%"; //표의 가로 폭이 100보다 크면 픽셀값입력
} else{
  //$col_width = round($width/7); //표의 가로 폭이 100보다 작거나 같으면 백분율 값을 입력
  $col_width = "14%"; //표의 가로 폭이 100보다 작거나 같으면 백분율 값을 입력
}
//$col_height= 168 ;//내용 들어갈 사각공간의 세로길이를 가로 폭과 같도록
$col_height= 120 ;//내용 들어갈 사각공간의 세로길이를 가로 폭과 같도록
$today = getdate();
$b_mon = $today['mon'];
$b_day = $today['mday'];
$b_year = $today['year'];
if ($year < 1) { // 오늘의 달력 일때
  $month = $b_mon;
  $mday = $b_day;
  $year = $b_year;
}
$today = date('Y-m-d');
if(!$year) 	$year = date("Y");
$file_index = $board_skin_path."/day"; ### 기념일 폴더 위치 지정


### 양력 기념일 파일 지정 : 해당년도 파일이 없으면 기본파일(solar.txt)을 불러온다
if(file_exists($file_index."/".$year.".txt")) {
	$dayfile = file($file_index."/".$year.".txt");
} else {
	$dayfile = file($file_index."/solar.txt");
}

$lastday=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
if ($year%4 == 0) $lastday[2] = 29;
$dayoftheweek = date("w", mktime (0,0,0,$month,1,$year));
?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">

<style>

@media print {
	body { -webkit-print-color-adjust: exact; }
	#bo_list thead th { font-size: 12px; height: 30px; }
	#bo_list tbody td { font-size: 12px; padding: 5px; height: 130px; }
	.btn_bo_user { display: none;}
}

.toptop {position:relative;margin:0px auto 0;}
</style>

<div class="toptop">
<div id="">
	<h2 class="pagetitle">이달의 조인현황</h2>
</div>
<table width="1200" border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
  <tr>
       <td width="100%" height="40" align="left">
		<table border="0" cellspacing="0" cellpadding="0">
    	<tr>
         <!-- <td><a href="<?php echo "?bo_table=".$bo_table."&"; ?><?if ($month == 1) { $year_pre=$year-1; $month_pre=$month; } else {$year_pre=$year-1; $month_pre=$month;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>"><img src="<?=$board_skin_url?>/img/y_prev2.png" border="0" alt="<?=$year_pre?>년" style="margin-right:3px"></a></td>
         <td><a href="<?php echo "?bo_table=".$bo_table."&"; ?><?if ($month == 1) { $year_pre=$year-1; $month_pre=12; } else {$year_pre=$year; $month_pre=$month-1;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>"><img src="<?=$board_skin_url?>/img/m_prev2.png" border="0" alt="<?=$month_pre?>월"></a></td> -->
         <td style="padding:0 40px;font-size:26px;font-weight:bold;"><a href="<?php echo "?bo_table=".$bo_table; ?>" title="오늘로" onfocus="this.blur()" style="color:#121212;"><?php echo $year ?>년 <?php echo $month ?>월</a>
         </td>
         <!-- <td><a href="<?php echo "?bo_table=".$bo_table."&"; ?><?if ($month == 12) { $year_pre=$year+1; $month_pre=1; } else {$year_pre=$year; $month_pre=$month+1;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>"><img src="<?=$board_skin_url?>/img/m_next2.png" border="0" alt="<?=$month_pre?>월"></a></td>
         <td><a href="<?php echo "?bo_table=".$bo_table."&"; ?><?if ($month == 12) { $year_pre=$year+1; $month_pre=$month; } else {$year_pre=$year+1; $month_pre=$month;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>"><img src="<?=$board_skin_url?>/img/y_next2.png" border="0" alt="<?=$year_pre?>년" style="margin-left:3px"></a></td> -->
      </tr>
		</table>
	</td>
  </tr>
</table>
</div>
<style>
#bo_list{float: left;width: 800px;margin-right:0px}
.bo_list-right{float: left;width: 400px;}
#bo_list table { width: 100%;border-collapse:collapse;border-spacing:0; }
#bo_list thead th { height: 35px; font-size: 16px; color: #333; font-weight: 500; background-color: #f7f7f7; border: 1px solid #dcdcdc; }
#bo_list tbody td { font-size: 16px; font-weight: 300; padding: 8px 6px; border: 1px solid #dcdcdc; position:relative}
#bo_list tbody td p {position:absolute;left:10px;bottom:10px;color:#00a95c;font-weight:500;font-size: 20px;}
#bo_list .bo_tit {
	display: block;
	width: 100%; margin: 3px 0; padding: 2px;
	font-size: 11px; color: #fff; font-weight: 300;
	background: #00a95c; border: 1px solid #00a95c; border-radius: 1px;
	letter-spacing: -0.02em;
	text-align: center;
}
#mapList { height:660px;padding-top:25px;}

.wrap {width:1200px;margin:0 auto;}
.wrap:after {content:"";display:block;clear:both;}

</style>

<div class="wrap">

<div id="bo_list" style="margin-top: 25px;">
<table width="<?=$width?>" border="0" cellspacing="0" cellpadding="0">
<thead>
  <tr align="center">
	<th style="color:#c70c0d">일요일</th>
	<th>월요일</th>
	<th>화요일</th>
	<th>수요일</th>
	<th>목요일</th>
	<th>금요일</th>
	<th style="color:#1818c3">토요일</th>
  </tr>
</thead>
<tbody>
<?
$cday = 1;
$sel_mon = sprintf("%02d",$month);

$query = "SELECT * FROM $write_table WHERE left(wr_13,6) <= '$year$sel_mon' and left(wr_13,6) >= '$year$sel_mon' ORDER BY wr_id ASC";

$result = sql_query($query);
$j=0; // layer id
// 내용을 보여주는 부분
while ($row = sql_fetch_array($result)) {  // 제목글 뽑아서 링크 문자열 만들기..
  if( substr($row['wr_13'],0,6) <  $year.$sel_mon ) {
	 $start_day =1;
	 $start_day= (int)$start_day;
  } else {
	 $start_day = substr($row['wr_13'],6,2);
     $start_day= (int)$start_day;
  }

  if( substr($row['wr_13'],0,6) >  $year.$sel_mon ) {
	 $end_day = $lastday[$month];
	 $end_day= (int)$end_day;
  } else {
	 $end_day = substr($row['wr_13'],6,2);
	 $end_day= (int)$end_day;
  }

  // 아이디에 따라 다른 아이콘이미지 출력 하고 싶을때 ///주석을 해제
  $imgown = 'icon';

  for ($i = $start_day ; $i <= $end_day;  $i++) {

    if (strlen($row['wr_3']) > 0) {  // 입력된 아이콘 값이 있을 때
      $imgown = $row['wr_3'] ;
	}

    $j++; // layer ID

    $list['comment_cnt'] = " ".$row['wr_comment']; // row에 대하여 코멘트 카운터 정의
    if($row['wr_comment'] == 0) {
      $list['comment_cnt'] = null ;
    } else {
	  if($list['comment_cnt']!=null) $list['comment_cnt'] = "<b><font color=#ff6600>".$list['comment_cnt']."</font></b>";
    }

    $row['wr_subject'] = cut_str(get_text($row['wr_subject']),$board['bo_subject_len'],"…"); // subject length cut

    $list['icon_new'] = '';
	if ($row['wr_datetime'] >= date("Y-m-d H:i:s", G5_SERVER_TIME - ($board['bo_new'] * 3600)))
      $list['icon_new'] = " <img src='$board_skin_url/img/icon_new.gif' align='absmiddle' alt='새글'>";

    if ($member['mb_level'] < $board['bo_read_level']) {
      $showLayer="" ;
    } else {
      $showLayer=" onmouseover=\"PopupShow('".$j."')\" onmouseout=\"PopupHide('".$j."')\" ";
    }
	if($row['wr_5']) {
		$bgcolor[$i] = "style='background-color:".$row['wr_5'].";'";
	}

	// 제목 부분
    //$html_day[$i].= "<br /><img src='$board_skin_url/img/".$imgown.".gif' border=0 align=absmiddle /> <a href='".G5_BBS_URL."/board.php?bo_table=$bo_table&year=$year&month=$month&wr_id=$row[wr_id]&sc_no=$sc_no' id='subject_".$j."' ".$showLayer.">".$row[wr_subject]."</a>".$list[icon_new].$list[comment_cnt];
	$bo_table2 = 'rounding';
	if ($member['mb_level'] < $board['bo_read_level']) {
		//$html_day[$i].= "<span id='subject_".$j."' class='bo_tit'>".$row[wr_subject]."</span>";
	} else {
		//$html_day[$i].= "<a href='".G5_BBS_URL."/board.php?bo_table=$bo_table2&year=$year&month=$month&wr_id=$row[wr_id]&sc_no=$sc_no' id='subject_".$j."' class='bo_tit'>".$row['wr_subject']."</a>";
	}

?>
    <!-- 뷰 팝업레이어 -->
    <DIV ID="popup_<?=$j?>" class="popup_layer">
<?
    $html = 0;
    if (strstr($row['wr_option'], "html1"))
      $html = 1;
    else if (strstr($row['wr_option'], "html2"))
      $html = 2;

      $viewlist = cut_str(conv_content($row['wr_content'], $html),200,"…");
	  echo "( 작성자 : ".$row['wr_name']." )<br />";
      echo $viewlist;
?>
    </DIV>
<?
		//오늘 스케줄 구하기
		if ($row['wr_id'] != $sc_id && date('Ymd', strtotime($row['wr_13'])) <= date('Ymd') && date('Ymd', strtotime($row['wr_13'])) >= date('Ymd')) {
			$today_schedule .= "<p><img src='$board_skin_url/img/".$imgown.".gif' border=0 align=absmiddle />";
			$today_schedule .= " <a href='".G5_BBS_URL."/board.php?bo_table=$bo_table&year=$year&month=$month&wr_id=$row[wr_id]&sc_no=$sc_no'><b>".$row['wr_subject']."</b></a>";
			$today_schedule .= " (".substr($row['wr_13'],4,2)."/".substr($row['wr_13'],6,2)." ~ ".substr($row['wr_13'],4,2)."/".substr($row['wr_13'],6,2).")<br />";
			$today_schedule .= $viewlist."</p>";
		}
		$sc_id = $row['wr_id'];
    }
  }

  // 달력의 틀을 보여주는 부분

  $temp = 7- (($lastday[$month]+$dayoftheweek)%7);

  if ($temp == 7) $temp = 0;
     $lastcount = $lastday[$month]+$dayoftheweek + $temp;

  for ($iz = 1; $iz <= $lastcount; $iz++) { // 42번을 칠하게 된다.
    //$bgcolor = "#ffffff";  // 쭉 흰색으로 칠하고
    //if ($b_year==$year && $b_mon==$month && $b_day==$cday) $bgcolor = "";      //  "#DFFDDF"; // 오늘날짜 연두색으로 표기
    if (($iz%7) == 1) echo ("<tr>"); // 주당 7개씩 한쎌씩을 쌓는다.
    if ($dayoftheweek < $iz  &&  $iz <= $lastday[$month]+$dayoftheweek)	{
	// 전체 루프안에서 숫자가 들어가는 셀들만 해당됨
	// 즉 11월 달에서 1일부터 30 일까지만 해당
	$daytext = "$cday";   // $cday 는 숫자 예> 11월달은 1~ 30일 까지
	//$daytext 은 셀에 써질 날짜 숫자 넣을 공간
	$daycontcolor = "" ;
	$daycolor = "#333";
	if ($iz%7 == 1) $daycolor = "#c70c0d"; // 일요일
	if ($iz%7 == 0) $daycolor = "#1818c3"; // 토요일

	// 여기까지 숫자와 들어갈 내용에 대한 변수들의 세팅이 끝나고
	// 이제 여기 부터 직접 셀이 그려지면서 그 안에 내용이 들어 간다.
	echo ("<td width='$col_width' height='$col_height' valign='top' ".$bgcolor[$cday].">");

	$f_date = $year.sprintf("%02d",$month).sprintf("%02d",$cday);

	// 기념일 파일 내용 비교위한 변수 선언, 월과 일을 두자리 포맷으로 고정
	if (strlen($month) == 1) {
		$monthp = "0".$month ;
	} else {
		$monthp = $month ;
	}
	if (strlen($cday) == 1) {
		$cdayp = "0".$cday ;
	} else {
		$cdayp = $cday ;
	}
	$memday = $year.$monthp.$cdayp;
	$daycont = "" ;

	// 기념일(양력) 표시
	for($i=0 ; $i < sizeof($dayfile) ; $i++) {  // 파일 첫 행부터 끝행까지 루프
		$arrDay = explode("|", $dayfile[$i]);
		if($memday == $year.$arrDay[0]) {
			$daycont = $arrDay[1];
			$daycontcolor = $arrDay[2];
			if(substr($arrDay[2],0,3)=="red") $daycolor = "red"; // 공휴일은 날짜를 빨간색으로 표시
		}
	}

    // 석봉운님의 음력날짜 변수선언
    //$myarray = soltolun($year,$month,$cday);
    if ($myarray['day']==1 || $myarray['day']==11 || $myarray['day']==21) {
      $moonday ="<font color='gray'>&nbsp;(음)$myarray[month].$myarray[day]$myarray[leap]</font>";
    } else {
      $moonday="";
    }

	include($file_index."/lunar.txt"); ### 음력 기념일 파일 지정

    if ($annivmoonday&&$daycont) $blank="<br />"; // 음력절기와 양력기념일이 동시에 있으면 한칸 띔
    else $blank="";
	
	$count_fetch = sql_fetch("select count(mb_id) as cnt from g5_write_calendar2 where wr_13 = '{$f_date}' ");
	$ss = $count_fetch['cnt'];
    if ($write_href) {
      // $write_href (글쓰기 권한)이 있으면
      // 날짜를 클릭하면 글씨쓰기가 가능한 링크를 넣어서 출력하기
      //echo "<a href='$write_href&f_date=$f_date'><font color='$daycolor' title='일정추가'>$daytext</font></a>$moonday <font color='$daycontcolor'>$daycont</font>$blank $annivmoonday";
      echo "<a href='javascript:;' onclick='prprint($f_date)'><font color='$daycolor' title='일정추가'>$daytext</font></a>$moonday <font color='$daycontcolor'>$daycont</font>$blank $annivmoonday";

	  
    } else { // 글쓰기 권한이 없으면 글쓰기 링크는 넣지 않고 그냥 숫자와 기념일 내용만 출력하기
      //echo "<font color='$daycolor'>$daytext</font>$moonday <font color='$daycontcolor'>$daycont</font>$blank $annivmoonday";
	  echo "<a href='javascript:;' onclick='prprint($f_date)'><font color='$daycolor' title='일정추가'>$daytext</font></a>$moonday <font color='$daycontcolor'>$daycont</font>$blank $annivmoonday";
    }
    echo $html_day[$cday];
	echo "<p class='soso'>$ss 건</p>";
    echo ("</td>");  // 한칸을 마무리
    $cday++; // 날짜를 카운팅
  }
  // 유효날짜가 아니면 그냥 회색을 칠한다.
  else { echo ("     <td width='$col_width' height='$col_height'  valign='top'>&nbsp;</td>"); }
  if (($iz%7) == 0) echo ("  </tr>");

} // 반복구문이 끝남
?>
</tbody>
</table>

</div>

<div class="bo_list-right">
	<div id="mapList">
			<ul>
			<?php
			$sql_search = '';
			$sql = " select * from g5_write_rounding where wr_5 = '{$today}' order by wr_id desc, wr_id ";
			$row = sql_fetch($sql);
			$result = sql_query($sql);
			$total = sql_num_rows($result);

			for($i = 0 ; $store = sql_fetch_array($result) ; $i++) {
			?>
				<li <?php if($i == 0) echo 'class="on"';?>>
					<div class="top_div">
						<!-- <a href="javascript:;" onclick="showMap('<?php echo $store['wr_id']?>', '<?php echo $store['wr_subject']?>', '<?php echo $store['wr_2']?>', '<?php echo $store['wr_4']?>');onClass(this);"> -->
						<a href="<?php echo get_pretty_url('rounding', $store['wr_id']);?>">
						<?php
							$popimg_pc = get_list_thumbnail2('rounding', $store['wr_id'], 80, 80, false, false, 0, 'center', false, '80/0.5/3');
						?>
							<div class="img_area">
								<?php
								if($popimg_pc['src']) { ?>
								<img src="<?php echo $popimg_pc['src'];?>" alt="<?php echo $row_basic['wr_subject'];?>" class="hide720">
								<?php } else { ?>
								<img src="/images/new/sm-images.png" alt="">
								<?php }	?>
							</div>
							<?php
							$formattedDate = date('m.d', strtotime($store['wr_5']));
							$timestamp = strtotime($store['wr_5']);
							$dayOfWeek = date('l', $timestamp);
							$dayOfWeekKorean = '';
							switch ($dayOfWeek) {
								case 'Monday':
									$dayOfWeekKorean = '월';
									break;
								case 'Tuesday':
									$dayOfWeekKorean = '화';
									break;
								case 'Wednesday':
									$dayOfWeekKorean = '수';
									break;
								case 'Thursday':
									$dayOfWeekKorean = '목';
									break;
								case 'Friday':
									$dayOfWeekKorean = '금';
									break;
								case 'Saturday':
									$dayOfWeekKorean = '토';
									break;
								case 'Sunday':
									$dayOfWeekKorean = '일';
									break;
							}

							$today = date('Y-m-d');

							// 정한 날짜와 오늘날짜간의 차이
							$start = new DateTime($store['wr_5']);
							$now = new DateTime($today);
							$gap = date_diff($start, $now);
							$gapDay = $gap -> days;

							?>
							<div class="txt_area">
								<p class="date_info"><?php echo $formattedDate;?> (<?php echo $dayOfWeekKorean?>) <?php echo $store['wr_6']?></p>
								<p class="subject_info"><?php echo $store['wr_subject']?></p>
								<p class="price_info"><?php echo number_format($store['wr_7'])?>원</p>
							</div>
						</a>
					</div>

					<div class="bottom_div">
						<?php if($gapDay > 0){ ?>
						<span class="dDay">D-<?php echo $gapDay?></span>
						<?php } else if($gapDay == 0) { ?>
						<span class="dDay">D-Day</span>
						<?php } else { ?>
						<span class="dDay">만료</span>
						<?php } ?>

						<span class="type">라운딩</span>
						<?php
						$count_fetch2 = sql_fetch("select count(mb_id) as cnt from g5_write_rounding_user where wr_1 = '{$store['wr_id']}' and wr_13 = '1' ");
						?>
						<span class="join_member"><span class="icon"><img src="/images/new/join_icon.png" alt=""></span><?php echo number_format($count_fetch2['cnt'])?>명</span>
					</div>

				</li>
			<?php }

			if($total == 0) echo "<li class=\"no_list\">".$date."<br/>오늘은 라운딩 일정이 없습니다.</li>";
			?>
			</ul>
		</div>
</div>

</div>
<script language="JavaScript">
<!--
// 미리보기 팝업 보이기
function PopupShow(n) {
	var position = $("#subject_"+n).position();
	$("#popup_"+n).animate({left:position.left-10+"px", top:position.top+30+"px"},0);
	$("#popup_"+n).show();
}

// 미리보기 팝업 숨기기
function PopupHide(n) {
	$("#popup_"+n).hide();
}
//-->
</script>
<script>

// 탭 클릭시 ajax 실행
function prprint(cmdatetime){
	console.log(cmdatetime);
	$.ajax({
		url : "/ajax.calendar2.php",
		type: "POST",
		data : {
			"dates" : cmdatetime
		},
		async: false,
		success: function(msg) {
			$("#mapList").html(msg);
		},error: function(request,status,error){
			alert("code = "+ request.status + " message = " + request.responseText + " error = " + error);
		}
	});
};
</script>