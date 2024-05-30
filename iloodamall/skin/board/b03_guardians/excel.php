<?php
include_once('../../../common.php');
if (!$is_admin) {
    alert("관리자만 접근 가능합니다.");
    exit;
}

$excel_down = $g5['write_prefix'] . $_REQUEST['bo_table']; //엑셀 다운로드 테이블
$wr_id = $_REQUEST['wr_id'];

$hp_filename = "가디언즈 신청 목록";
//$hp_filename = $bo_table."_".date('Y_md h_m');
//@sql_query("SET CHARACTER SET utf8");  // 한글깨지면 주석해지

if ($ms =="excel"){
    $g5['title'] = "엑셀 문서 다운로드";
    header( "Content-type: application/vnd.ms-excel" );
    header( "Content-Disposition: attachment; filename={$hp_filename}.xls" );
    //header( "Content-Description: PHP4 Generated Data" );
} else if ($ms =="power"){
    $g5['title'] = "파워포인트 문서 다운로드";
    header( "Content-type: application/vnd.ms-powerpoint" );
    header( "Content-Disposition: attachment; filename={$hp_filename}.ppt" );
    // header( "Content-Description: PHP4 Generated Data" );
} else if ($ms =="word"){
    $g5['title'] = "워드 문서 다운로드";
    header( "Content-type: application/vnd.ms-word" );
    header( "Content-Disposition: attachment; filename={$hp_filename}.doc" );
    //header( "Content-Description: PHP4 Generated Data" );
} else if ($ms =="memo"){
    $g5['title'] = "메모 문서 다운로드";
    header( "Content-type: application/vnd.ms-notepad" );
    header( "Content-Disposition: attachment; filename={$hp_filename}.txt" );
} else {
    header( "Content-type: application/vnd.ms-excel" );
    header( "Content-Disposition: attachment; filename={$hp_filename}.xls" );
}
header( "Content-Description: PHP4 Generated Data" );

// 원글 + 코멘트 다운로드
$date = $_GET['date'];

$sql = "select * from g5_write_guardians where wr_1 like'%{$date}%'";

$qry = sql_query($sql);


$number=$temp[0];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.txt {
    mso-style-parent:style0;
    mso-number-format:"\@";
    border:.5pt solid windowtext;
}
</style>
</head>

<body>
<table>
    <tr>
        <td class='txt'>No</td>
        <td class='txt'>회원여부</td>
        <td class='txt'>아이디</td>
        <td class='txt'>가디언즈 신청 횟수</td>
        <td class='txt'>이름</td>
        <td class='txt'>병원</td>
		<td class='txt'>소속</td>
        <td class='txt'>이메일</td>
		<td class='txt'>연락처</td>
		<td class='txt'>신청일시</td>
        <td class='txt'>강의 일정</td>
        <td class='txt'>강의 제목</td>
        <td class='txt'>강연자</td>
        <td class='txt'>강의 장소</td>
        <!-- <td class='txt'>도시락 신청</td>
        <td class='txt'>가디언즈 기념품 신청</td> -->
		<td class='txt'>정품등록여부(가디언즈 신청 시점 기준)</td>
		<td class='txt'>궁금한 점</td>
		<td class='txt'>기타 의견</td>
    </tr>

<?php
while($row=sql_fetch_array($qry)) {
	//회원여부
	$ismem = '';
	if($row['mb_id']){
		$ismem = '회원';
	}else{
		$ismem = '비회원';
	}
	
	//병원명(회원일때만)
	$ishospital = '';
	$hospital = sql_fetch(" select * from g5_member where mb_id = '{$row['mb_id']}' ");
	if($hospital['mb_id']){
		$ishospital = $hospital['mb_1'];
	}else{
		$ishospital = '';
	}
	
	//강의 일정
	$program = explode('|', $row['wr_1']);
	$program = array_filter($program);
	$program = implode('<br>', $program);

	//강의 제목
	$program_subject = explode('|', $row['wr_7']);
	$program_subject = array_filter($program_subject);
	$program_subject = implode('<br>', $program_subject);

	//강연자
	$program_teacher = explode('|', $row['wr_8']);
	$program_teacher = array_filter($program_teacher);
	$program_teacher = implode('<br>', $program_teacher);

	//강의 장소
	$program_place = explode('|', $row['wr_9']);
	$program_place = array_filter($program_place);
	$program_place = implode('<br>', $program_place);

	//정품등록여부
	$isgenuine = '';
	$genuinemember = sql_fetch(" select * from g5_write_genuine where mb_id = '{$row['mb_id']}' and wr_datetime <= '{$row['wr_datetime']}' ");
	if($genuinemember['mb_id']){
		$isgenuine = 'O';
	}else{
		$isgenuine = 'X';
	}
	
	$total_row = sql_fetch("select count(*) as total from g5_write_guardians where mb_id = '{$row['mb_id']}' ");
	$total = $total_row['total'];
    echo "
    <tr>
        <td class='txt'>{$row['wr_id']}</td>
        <td class='txt'>{$ismem}</td>
        <td class='txt'>{$row['mb_id']}</td>
        <td class='txt'>{$total}</td>
		<td class='txt'>{$row['wr_name']}</td>
		<td class='txt'>{$ishospital}</td>
		<td class='txt'>{$row['wr_3']}</td>
		<td class='txt'>{$row['wr_email']}</td>
		<td class='txt'>{$row['wr_2']}</td>
		<td class='txt'>{$row['wr_datetime']}</td>
		<td class='txt'>{$program}</td>
		<td class='txt'>{$program_subject}</td>
		<td class='txt'>{$program_teacher}</td>
		<td class='txt'>{$program_place}</td>
		<td class='txt'>{$isgenuine}</td>
		<td class='txt'>{$row['wr_4']}</td>
		<td class='txt'>{$row['wr_5']}</td>
    </tr>
    ";
    $number--;
}
?>
<!-- <td class='txt'>{$row['wr_19']}</td>
<td class='txt'>{$row['wr_20']}</td> 정품등록여부 위에 셋팅 19 = 도시락 , 20 = 기념품-->
</table>
</body>
</html>