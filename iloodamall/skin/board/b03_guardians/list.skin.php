<?php
$admin_ids = array('admin', 'log_admin', 'sub_admin', 'as_admin', 'shop_admin', 'board_admin', 'member_admin');

// 로그인한 사용자의 ID가 $admin_ids 배열에 있는지 확인
if (in_array($member['mb_id'], $admin_ids)) {
    $login_id = $member['mb_id']; 
    $mb_name = $member['mb_name'];  
    $user_ip = $_SERVER['REMOTE_ADDR'];  
    $accessed_page = "가디언즈 신청목록";
    $history_datetime = date('Y-m-d H:i:s'); 
	$action = "조회";

    // 데이터베이스에 접속 기록 삽입
    $sql = "INSERT INTO g5_login_history_save (login_id, user_name, user_ip, accessed_page, history_datetime, action) 
            VALUES ('{$login_id}', '{$mb_name}', '{$user_ip}', '{$accessed_page}', '{$history_datetime}', '{$action}')";
    sql_query($sql);
}
?>
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 6;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<style>
/* .date_wrap{display: flex; align-items:center; font-size:16px;}
.date_box{text-align:center;} */
#bo_list{padding-bottom:50px;}
 .date_wrap{padding-left:10px;}
.date_box span{display: block;}
.mmm{display: none !important;}

.calendar_wrap{text-align:right;}
.calendar_wrap>a{background: #000 !important; border-radius:5px;}
.calendar_wrap .month_btn{display: flex; justify-content:space-between; font-size:16px; margin:10px 0;}
.calendar_wrap .calendar_box{display: none; width: 300px;}
.calendar_wrap .calendar_box #calendar{overflow:hidden;}
.calendar_wrap .calendar_box #calendar table{width: 100%; border-top:1px solid; font-size:14px;text-align:center;}
.calendar_wrap .calendar_box #calendar table th{line-height:30px; font-weight:400;}
.calendar_wrap .calendar_box #calendar table td{border:1px solid; border-left:0; border-right:0;}
.calendar_wrap .calendar_box #calendar table td a{display: block; width: 100%; height: 30px; line-height:30px;}
.calendar_wrap .calendar_box #calendar table td a:hover{background: #000;color:#fff;}

@media(max-width:768px){
	.calendar_wrap{width: 100%; text-align:center;}
	.calendar_wrap .calendar_box{margin:0 auto 10px;}
}
</style>
<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">


    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div id="bo_btn_top" style="display: none;">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i> 글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

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
	
	
<div id="bo_sch_div" class="clear">

 <!-- 게시판 검색 시작 { -->
    <fieldset id="bo_sch">
        <legend>게시물 검색</legend>
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sop" value="and">
        <label for="sfl" class="sound_only">검색대상</label>
        <select name="sfl" id="sfl" onChange="search(this.value)">
            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
            <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
            <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
            <option value="wr_7"<?php echo get_selected($sfl, 'wr_7'); ?>>신청 날짜</option>
            <!-- <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
            <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option> -->
            <!-- <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>회사명</option> -->
            <!-- <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option> -->
        </select>
        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" maxlength="20">
        <input type="submit" value="검색" class="sch_btn">
		<script>
			function search(value){
				if (value === 'wr_7'){
					$('.sch_input').attr('placeholder', 'ex) 2023-06-07');
				}
			}
		</script>
        </form>
    </fieldset>
    <!-- } 게시판 검색 끝 -->
</div>


    <form name="fboardlist" id="fboardlist" action="./board_list_update4.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head03 tbl_wrap">
        <table>
			<caption><?php echo $board['bo_subject'] ?> 목록</caption>
			<thead>
			<tr>
				<?php if ($is_checkbox) { ?>
				<th scope="col">
					<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
					<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
				</th>
				<?php } ?>
				<th scope="col">NO</th>
				<th scope="col" class="th01 pcc">신청자</th>
				<th scope="col" class="th01 pcc">소속</th>
				<th scope="col" class="th02">제목</th>
				<th scope="col" class="th03 pcc">등록일</th>
			</tr>
			</thead>
			<tbody>
			<?php
			for ($i=0; $i<count($list); $i++) {
			 ?>
			<tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
				<?php if ($is_checkbox) { ?>
				<td class="td_chk">
					<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
					<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
				</td>
				<?php } ?>
				<td class="td_num2">
				<?php
				if ($list[$i]['is_notice']) // 공지사항
					echo '<span>공지</span>';
				else if ($wr_id == $list[$i]['wr_id'])
					echo "<span class=\"bo_current\">열람중</span>";
				else
					echo $list[$i]['num'];
				 ?>
				</td>
				<td class="td_name sv_use pcc"><?php echo $list[$i]['wr_name'] ?></td>
				<td class="td_name sv_use pcc"><?php echo $list[$i]['wr_3'] ?></td>
				<td class="td_subject" style="padding-left:<?php echo $list[$i]['reply'] ? (strlen($list[$i]['wr_reply'])*10) : '5'; ?>px">
					<?php
					if ($is_category && $list[$i]['ca_name']) {
					 ?>
					<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
					<?php } ?>
					<div class="bo_tit">
						
						<a href="<?php echo $list[$i]['href'] ?>">
							<?php echo $list[$i]['icon_reply'] ?>                        
							<?php echo $list[$i]['subject'] ?> &nbsp;
							<?php
								if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']);
							 ?>
						   
						</a>
						<?php
						// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
						//if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file']);
						//if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link']);
						//if (isset($list[$i]['icon_new'])) echo rtrim($list[$i]['icon_new']);
						//if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot']);
						?>
						<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="cnt_cmt">+ <?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span><?php } ?>

						<div class="mo_info mmm">
							<span><?php echo $list[$i]['wr_1'] ?></span> &nbsp;
							<span><?php echo date("Y-m-d",strtotime($list[$i]['wr_datetime'])) ?></span> &nbsp;
						</div>
					</div>

				</td>
				
				<td class="td_datetime pcc"><?php echo $list[$i]['datetime'] ?></td>
			</tr>
			<?php } ?>
			<?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
			</tbody>
        </table>
    </div>
	

	<!-- <div class="date_wrap">
		<?
		$sql = " select * from g5_board where bo_table = 'guardians_adm' ";
		$result = sql_query($sql);
		$total = sql_num_rows($result);
		$row = sql_fetch_array($result);?>
		<div class="date_box">
			<span>다운로드하실 날자를 선택하세요</span>
			<input type="checkbox" name="date1" id="date1" value="<?php echo $row['bo_1_subj'];?>">
			<label for="date1"><?php echo $row['bo_1_subj'];?></label>
			<input type="checkbox" name="date2" id="date2" value="<?php echo $row['bo_2_subj'];?>">
			<label for="date2"><?php echo $row['bo_2_subj'];?></label>
			<input type="checkbox" name="date3" id="date3" value="<?php echo $row['bo_3_subj'];?>">
			<label for="date3"><?php echo $row['bo_3_subj'];?></label>
			<input type="checkbox" name="date4" id="date4" value="<?php echo $row['bo_4_subj'];?>">
			<label for="date4"><?php echo $row['bo_4_subj'];?></label>
			<input type="checkbox" name="date5" id="date5" value="<?php echo $row['bo_5_subj'];?>">
			<label for="date5"><?php echo $row['bo_5_subj'];?></label>
		</div>
		<a href="javascript:;" class="download_btn">엑셀 다운로드</a>
	</div>
	<script>
	$(document).ready(function() {
		let date=[];
		$('input[type="checkbox"]').change(function() {
			if ($(this).is(':checked')) {
				date.push($(this).val());
			} else {
				const index = date.indexOf($(this).val());
				if (index !== -1) {
				  date.splice(index, 1);
				}
			}
			date.sort(function(a, b) {
				  return new Date(a) - new Date(b);
			});
			console.log(date);
		});
		$('.download_btn').on('click',function(){
			console.log(date);
			var queryString = "?date=" + date.join(",");
			window.location.href = "<?php echo $board_skin_url; ?>/excel.php" + queryString;
		});
	});
	</script> -->
    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
			
			<li class="calendar_wrap">
				<a href='<?php echo $board_skin_url ?>/excel_all.php' class="btn_b02 btn">전체 목록 엑셀 다운로드</a>
				<a href="javascript:;" class="btn_b02 btn" onclick="calendar_toggle()">날짜 지정 엑셀 다운로드</a>
				<div class="calendar_box">
					<div class="month_btn">
						<a href="javascript:;" onclick="prevMonth()"><</a>
						<span id="today"></span>
						<a href="javascript:;" onclick="nextMonth()">></a>
					</div>
					<div id="calendar"></div>
				</div>
			</li>
            <?php if ($is_checkbox) { ?>
            <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
            <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
            <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_admin"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
            <?php } ?>
			<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01 btn"><i class="fa fa-list" aria-hidden="true"></i> 목록</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" id="cmcm" class="btn_b02 btn">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>

    </form>     
        
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->
<?php echo $write_pages;  ?>


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
        f.action = "./board_list_update4.php";
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

	<script>
		function calendar_toggle(){
			$('.calendar_box').slideToggle();
		}
		//날짜 정보 얻어오기
		var today = new Date();
		// 년도
		var currentYear = today.getFullYear();
		// 월
		var currentMonth = today.getMonth();

		// 이전 달과 다음 달로 이동하는 함수
		function prevMonth() {
			if (currentMonth === 0) {
				currentYear--;
				currentMonth = 11;
			} else {
				currentMonth--;
			}
			getCalendar(currentYear, currentMonth);
			document.getElementById("today").innerHTML = currentYear + "년" + (currentMonth + 1)+"월";
		}

		function nextMonth() {
			if (currentMonth === 11) {
				currentYear++;
				currentMonth = 0;
			} else {
				currentMonth++;
			}
			getCalendar(currentYear, currentMonth);
			document.getElementById("today").innerHTML = currentYear + "년" + (currentMonth + 1)+"월";
		}

		function getCalendar(year, month) {


			//날짜 정보 얻어오기
			var today = new Date(year, month);
			// 년도
			var thisYear = today.getFullYear();
			// 월
			var thisMonth = today.getMonth();
			// 이번달 1일의 정보
			var thisDay = new Date(thisYear, thisMonth, 1);
			// 이번달 1일은 무슨요일일까
			var thisWeek = thisDay.getDay();
			console.log(thisWeek);
			// 각 달의 마지막 날짜 정보 저장하기
			var lastDate = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
			// 윤년인지 확인하여 2월의 마지막 날짜 수정
			if ((thisYear % 4 === 0 && thisYear % 100 !== 0) || thisYear % 400 === 0) {
				lastDate[1] = 29;
			}
			// 일을 캬운트해줄 변수
			var num = 1;

			var row = Math.ceil((thisWeek + lastDate[thisMonth]) / 7);
			// 달력을 저장할 변수
			var cal = "<table>";
			cal += "<tr>";
			cal += "<th>일</th>";
			cal += "<th>월</th>";
			cal += "<th>화</th>";
			cal += "<th>수</th>";
			cal += "<th>목</th>";
			cal += "<th>금</th>";
			cal += "<th>토</th>";
			cal += "</tr>";
			// 줄
			for (i = 1; i <= row; i++) {
				cal += "<tr>";
				// 칸
				for (j = 1; j <= 7; j++)
					if (i === 1 && j <= thisWeek || num > lastDate[thisMonth]) {
						cal += "<td></td>";
					} else {
						var dayString = thisYear + "-" + (thisMonth + 1).toString().padStart(2, '0') + "-" + num.toString().padStart(2, '0');
						cal += "<td><a href='<?php echo $board_skin_url ?>/excel.php?date=" + dayString + "'>" + num + "</a></td>";
						num++;
					}
				cal += "</tr>";
			}

			cal += "</table>";
			document.getElementById("calendar").innerHTML = cal;
			document.getElementById("today").innerHTML = currentYear + "년" + (currentMonth + 1)+"월";
		}

		// 현재 날짜 정보 얻어오기
		var today = new Date();
		// 년도
		var currentYear = today.getFullYear();
		// 월
		var currentMonth = today.getMonth();

		// 초기 실행
		getCalendar(currentYear, currentMonth);

	</script>
