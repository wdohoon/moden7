<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once("$board_skin_path/moonday.php"); // 석봉운님의 음력날짜 함수

if (preg_match('/%/', $width)) {
  $col_width = "14%"; //표의 가로 폭이 100보다 크면 픽셀값입력
} else{
  $col_width = round($width/7); //표의 가로 폭이 100보다 작거나 같으면 백분율 값을 입력
}
$col_height= 70 ;//내용 들어갈 사각공간의 세로길이를 가로 폭과 같도록
$today = getdate(); 
$b_mon = $today['mon']; 
$b_day = $today['mday']; 
$b_year = $today['year']; 
if ($year < 1) { // 오늘의 달력 일때
  $month = $b_mon;
  $mday = $b_day;
  $year = $b_year;
}

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

$subject_by_date = array();

$cday = 1;
$sel_mon = sprintf("%02d", $month);
$where_sca = "";
if ($sca) {
    $where_sca = " and ca_name = '$sca' ";
}

$query = "SELECT * FROM g5_write_board WHERE left(wr_1,6) <= '$year$sel_mon' and left(wr_2,6) >= '$year$sel_mon' {$where_sca} ORDER BY wr_id ASC";
$result = sql_query($query);
$j = 0; // layer id

while ($row = sql_fetch_array($result)) {
    $start_day = max(1, (int)substr($row['wr_1'], 6, 2));
    $end_day = min($lastday[$month], (int)substr($row['wr_2'], 6, 2));

    for ($i = $start_day; $i <= $end_day; $i++) {
        $subject_by_date[$i][] = $row['wr_subject']; // 각 날짜별 일정 제목 저장
    }
    // 팝업 레이어 등 추가 처리...
}
?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">



<style>
#container_title {display:none;}
    #schedule {
        width: 100%;
        margin: 0 auto;
        padding: 300px 0 0 0;
        text-align: center;
    }
	#schedule h1{
		font-size: 60px;
		margin-bottom: 100px;
	}
	.today_schedule{
		margin: 0 auto 170px;
		width: 90%;
	}
.today_schedule li:after{display: none;}
.td_st{width: 100%;}
i{display: none;}
</style>
	<?php 
		include_once('../include/include_menu.php');
	?>
<div id="schedule">
	<h1>SCHEDULE</h1>
<table width="<?php echo $width ?>" border="0" cellpadding="0" cellspacing="0">
  <tr width="100"	 height="40" align="center">
       <td class="td_st">
		<table border="0" cellspacing="0" cellpadding="0" style="margin-bottom:40px;">
		<tr>
			<td>
			<a href="<?php echo $_SERVER['PHP_SELF']."?bo_table=".$bo_table."&"; ?><?php if ($month == 1) { $year_pre=$year-1; $month_pre=$month; } else {$year_pre=$year-1; $month_pre=$month;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>">
			<img src="/img/left_end.png" border="0" alt="<?php echo $year_pre?>년" style="margin-right:3px">
			</a>
			</td>
			<td><a href="<?php echo $_SERVER['PHP_SELF']."?bo_table=".$bo_table."&"; ?><?php if ($month == 1) { $year_pre=$year-1; $month_pre=12; } else {$year_pre=$year; $month_pre=$month-1;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>"><img src="/img/lefts.png" border="0" alt="<?php echo $month_pre?>월"></a></td>
			<td style="padding:0 30px;font-size:21px;font-weight:500;">
				<a href="<?php echo $_SERVER['PHP_SELF']."?bo_table=".$bo_table; ?>" title="오늘로" onfocus="this.blur()" style="color:#121212;"><?php echo ("$year .&nbsp;0$month"); ?></a>
			</td>
			<td><a href="<?php echo $_SERVER['PHP_SELF']."?bo_table=".$bo_table."&"; ?><?php if ($month == 12) { $year_pre=$year+1; $month_pre=1; } else {$year_pre=$year; $month_pre=$month+1;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>"><img src="/img/rights.png" border="0" alt="<?php echo $month_pre?>월"></a></td>
			<td><a href="<?php echo $_SERVER['PHP_SELF']."?bo_table=".$bo_table."&"; ?><?php if ($month == 12) { $year_pre=$year+1; $month_pre=$month; } else {$year_pre=$year+1; $month_pre=$month;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>"><img src="/img/right_end.png" border="0" alt="<?php echo $year_pre?>년" style="margin-left:3px"></a></td>
		</tr>
		</table>			
	</td>
	<td width="20%" align="right">
        <?php if ($rss_href || $write_href) { ?>
        <!-- <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn">RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><font color="#ffffff">관리자</font></a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn" style="padding: 0 10px !important"><font color="#ffffff">일정추가</font></a></li><?php } ?>
        </ul> -->
        <?php } ?>
</td>
  </tr>
</table>
</div>


<style>
	#bo_list table { border-collapse:collapse;border-spacing:0; }
	#bo_list thead th { height: 40px; font-size: 13px; color: #121212; font-weight: 400; background-color: #f7f7f7; border: 1px solid #e1e1e1; text-align: center; }
	#bo_list tbody td { font-size: 13px; color: #121212; font-weight: 400; letter-spacing: -0.02em; padding: 8px; border: 1px solid #e1e1e1; }
	#bo_list .bo_tit { display: block; font-size: 12px; color: red; font-weight: 400; line-height: 18px;  }
	.today_schedule ul li{display: flex;flex-direction: column;}
	.today_schedule ul li a{border-bottom: 1px dashed #d6d6d6;}
</style>

<div id="bo_list" style="margin: 0 0 40px;">


<!-- 게시판 카테고리 시작 { -->
<?php if ($is_category) { ?>
<nav id="bo_cate">
	<h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
	<ul id="bo_cate_ul">
		<?php echo $category_option ?>
	</ul>
</nav>
<?php } ?>
<!-- } 게시판 카테고리 끝 -->

<table width="90%;" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
<thead>
  <tr>
	<th style="color:#e30000">SUN</th>
	<th>MON</th>
	<th>TUE</th>
	<th>WED</th>
	<th>THU</th>
	<th>FRI</th>
	<th style="color:#0060e3">SAT</th>
  </tr>
</thead>
<tbody>


<?php
$cday = 1;
$sel_mon = sprintf("%02d",$month);

$where_sca = "";
if($sca) {
	$where_sca = " and ca_name = '$sca' ";
}
	
$query = "SELECT * FROM $write_table WHERE left(wr_1,6) <= '$year$sel_mon' and left(wr_2,6) >= '$year$sel_mon' {$where_sca} ORDER BY wr_id ASC";
$result = sql_query($query);
$j=0; // layer id
// 내용을 보여주는 부분
while ($row = sql_fetch_array($result)) {  // 제목글 뽑아서 링크 문자열 만들기..
  if( substr($row['wr_1'],0,6) <  $year.$sel_mon ) {
	 $start_day =1; 
	 $start_day= (int)$start_day;
  } else {
	 $start_day = substr($row['wr_1'],6,2);
     $start_day= (int)$start_day;
  }

  if( substr($row['wr_2'],0,6) >  $year.$sel_mon ) {
	 $end_day = $lastday[$month];
	 $end_day= (int)$end_day;
  } else {
	 $end_day = substr($row['wr_2'],6,2);
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
	// 제목 부분

    //$html_day[$i].= "<br /><img src='$board_skin_url/img/".$imgown.".gif' border=0 align=absmiddle /> <a href='".G5_BBS_URL."/board.php?bo_table=$bo_table&year=$year&month=$month&wr_id=$row[wr_id]&sc_no=$sc_no' id='subject_".$j."' ".$showLayer.">".$row[wr_subject]."</a>".$list[icon_new].$list[comment_cnt];
$is_admin = false;
if ($member['mb_level'] >= 10) { // 예를 들어 회원 레벨이 10 이상인 경우를 관리자로 간주합니다.
    $is_admin = true;
}

if ($member['mb_level'] < $board['bo_read_level']) {
    $html_day[$i] .= "<span class='bo_tit'>*</span>";

} else {
    if ($is_admin) {
        // 관리자인 경우에만 링크 생성
        $html_day[$i] .= "<a href='".G5_BBS_URL."/board.php?bo_table=$bo_table&year=$year&month=$month&wr_id=$row[wr_id]&sc_no=$sc_no' id='subject_".$j."' class='bo_tit'>-".cut_str($row['wr_subject'],12,'...')."</a>";
    } else {
        // 관리자가 아닌 경우에는 텍스트만 표시
        $html_day[$i] .= "<span class='bo_tit'>*</span>";

    }
}
	
?>
    <!-- 뷰 팝업레이어 -->
    <div id="popup_<?php echo $j?>" class="popup_layer"> 
    <?php
    $html = 0;
    if (strstr($row[wr_option], "html1"))
      $html = 1;
    else if (strstr($row[wr_option], "html2"))
      $html = 2;
    
      $viewlist = cut_str(conv_content($row[wr_content], $html),200,"…");
    	  echo "( 작성자 : ".$row[wr_name]." )<br />";
      echo $viewlist;
    ?>
    </div>
	
<?php
		//오늘 스케줄 구하기
		if ($row['wr_id'] != $sc_id && date('Ymd', strtotime($row['wr_1'])) <= date('Ymd') && date('Ymd', strtotime($row['wr_2'])) >= date('Ymd')) {
			//$today_schedule .= "<p><img src='$board_skin_url/img/".$imgown.".gif' border=0 align=absmiddle />";
			$today_schedule .= " <a href='".G5_BBS_URL."/board.php?bo_table=$bo_table&year=$year&month=$month&wr_id=$row[wr_id]&sc_no=$sc_no'><b>".$row['wr_subject']."</b></a>";
			//$today_schedule .= " (".substr($row['wr_1'],4,2)."/".substr($row['wr_1'],6,2)." ~ ".substr($row['wr_2'],4,2)."/".substr($row['wr_2'],6,2).")<br />";
			//$today_schedule .= $viewlist."</p>";
		}		
		$sc_id = $row['wr_id'];
    }
  }

  // 달력의 틀을 보여주는 부분

  $temp = 7- (($lastday[$month]+$dayoftheweek)%7);

  if ($temp == 7) $temp = 0;
     $lastcount = $lastday[$month]+$dayoftheweek + $temp;

  for ($iz = 1; $iz <= $lastcount; $iz++) { // 42번을 칠하게 된다.
    $bgcolor = "#ffffff";  // 쭉 흰색으로 칠하고
    if ($b_year==$year && $b_mon==$month && $b_day==$cday) $bgcolor = "#fff8ed";      // 오늘날짜 배경색
    if (($iz%7) == 1) echo ("<tr>"); // 주당 7개씩 한쎌씩을 쌓는다.
    if ($dayoftheweek < $iz  &&  $iz <= $lastday[$month]+$dayoftheweek)	{
	// 전체 루프안에서 숫자가 들어가는 셀들만 해당됨
	// 즉 11월 달에서 1일부터 30 일까지만 해당
	$daytext = "$cday";   // $cday 는 숫자 예> 11월달은 1~ 30일 까지
	//$daytext 은 셀에 써질 날짜 숫자 넣을 공간
	$daycontcolor = "" ; 
	$daycolor = "#121212"; 
	if ($iz%7 == 1) $daycolor = "#e30000"; // 일요일
	if ($iz%7 == 0) $daycolor = "#0060e3"; // 토요일
	if ($b_year==$year && $b_mon==$month && $b_day==$cday) $daycolor = "#ff7505";      // 오늘날짜 글자색
	if ($dayoftheweek < $iz  &&  $iz <= $lastday[$month]+$dayoftheweek)
	// 여기까지 숫자와 들어갈 내용에 대한 변수들의 세팅이 끝나고 
	// 이제 여기 부터 직접 셀이 그려지면서 그 안에 내용이 들어 간다.
	$subject_by_date[$i][] = $row['wr_subject'];
	$t_subject = isset($subject_by_date[$cday]) ? implode('|', $subject_by_date[$cday]) : '';
	$f_date = $year.sprintf("%02d",$month).sprintf("%02d",$cday);
	
	echo ("<td width=$col_width height=$col_height bgcolor=$bgcolor valign=top data-date='$f_date' data-subject='$t_subject' onclick='updateSchedule(this)'>");

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


	include($file_index."/lunar.txt"); ### 음력 기념일 파일 지정

    if ($annivmoonday&&$daycont) $blank="<br />"; // 음력절기와 양력기념일이 동시에 있으면 한칸 띔
    else $blank="";

$is_admin = false;
if ($member['mb_level'] >= 10) { // 예를 들어 회원 레벨이 10 이상인 경우를 관리자로 간주합니다.
    $is_admin = true;
}

// 관리자인 경우에만 일정 추가 링크를 생성
if ($is_admin && $write_href) { 
    // $write_href (글쓰기 권한)이 있으면
    // 날짜를 클릭하면 글씨쓰기가 가능한 링크를 넣어서 출력
    echo "<a href='$write_href&f_date=$f_date' style='display:inline-block;margin-bottom:5px;'><font color='$daycolor' title='일정추가'>$daytext</font></a>$moonday <font color='$daycontcolor'></font>$blank $annivmoonday";
} else {
    // 관리자가 아닌 경우에는 링크를 생성하지 않음
    // 단순히 숫자와 기념일 내용만 출력합니다.
    echo "<font color='$daycolor' style='display:inline-block;margin-bottom:5px;'>$daytext</font>$moonday <font color='$daycontcolor'></font>$blank $annivmoonday";
}

    echo $html_day[$cday];
    echo ("</td>");  // 한칸을 마무리
    $cday++; // 날짜를 카운팅
  } 
  // 유효날짜가 아니면 그냥 회색을 칠한다.
  else { echo ("     <td width='$col_width' height='$col_height' bgcolor='ffffff' valign='top'>&nbsp;</td>"); }
  if (($iz%7) == 0) echo ("  </tr>");
   
} // 반복구문이 끝남
?>
</tbody>
</table>
</div>
<div style="clear:both;"></div>
<section id="today_schedule" style="display: none;">
<h3>오늘 일정</h3>
<div><?php echo $today_schedule; ?></div>
</section>

<div class="today_schedule">
    <span class="today"><?php echo isset($_GET['date']) ? $_GET['date'] : date('Y. m. d', G5_SERVER_TIME); ?></span>
    <ul id="daily_schedule"> <!-- id 추가하여 이곳에 동적으로 일정을 추가할 수 있도록 함 -->
        <!-- 동적으로 일정을 추가할 예정이므로 초기에는 빈 상태로 두거나 기본 메시지만 표시 -->
        <li><span style='cursor:auto;'>일정</span></li>
    </ul>
</div>

<script language="JavaScript">
	function updateSchedule(element) {
		var dateStr = element.getAttribute('data-date');
		var subjects = element.getAttribute('data-subject').split('|'); // 여러 일정이 JSON 배열 형식이나 구분자로 분리된 문자열로 저장될 수 있음

		// 날짜 문자열을 Date 객체로 변환
		var year = parseInt(dateStr.substring(0, 4), 10);
		var month = parseInt(dateStr.substring(4, 6), 10) - 1; // JavaScript의 월은 0부터 시작합니다.
		var day = parseInt(dateStr.substring(6, 8), 10);

		var dateObj = new Date(year, month, day);

		// 날짜에 하루를 추가

		// 날짜 형식 변환 및 출력
		var formattedDate = dateObj.getFullYear() + '. ' + ('0' + (dateObj.getMonth() + 1)).slice(-2) + '. ' + ('0' + dateObj.getDate()).slice(-2);
		document.querySelector('.today').innerText = formattedDate; // 날짜 출력

		var scheduleList = document.getElementById('daily_schedule');
		scheduleList.innerHTML = ''; // 기존 내용을 지우고 새로운 일정을 추가

			if (subjects.length > 0 && subjects[0] !== '') {
				subjects.forEach(function(subject) {
					var listItem = document.createElement('li');
					listItem.textContent = subject; // 텍스트로 일정 추가
					scheduleList.appendChild(listItem);
				});
			} else {
				scheduleList.innerHTML = "<li><span style='cursor:auto;'>이 날짜에는 특정 일정이 없습니다.</span></li>";
			}
	}
</script>

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
