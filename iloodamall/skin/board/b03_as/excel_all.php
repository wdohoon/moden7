<?php
include_once('../../../common.php');
if (!$is_admin) {
    alert("관리자만 접근 가능합니다.");
    exit;
}

$excel_down = $g5['write_prefix'] . $_REQUEST['bo_table']; //엑셀 다운로드 테이블
$wr_id = $_REQUEST['wr_id'];

$hp_filename = "A/S 신청 관리";
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

$sql = "select * from g5_write_as";

$qry = sql_query($sql);


$number=$temp[0];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.txts {
    mso-style-parent:style0;
    mso-number-format:"\@";
    border:.5pt solid windowtext;
	width: 150px;
	background: #cce7fa;
}
.txt{
    mso-style-parent:style0;
    mso-number-format:"\@";
    border:.5pt solid windowtext;
}
</style>
</head>

<body>
<table>
    <tr>
        <td class='txts'>병원명</td>
        <td class='txts'>이름</td>
        <td class='txts'>이메일</td>
        <td class='txts'>제목</td>
        <td class='txts'>제품종류</td>
        <td class='txts'>연락처</td>
		<td class='txts'>내용</td>
        <td class='txts'>파일1</td>
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

	//정품등록여부
	$isgenuine = '';
	$genuinemember = sql_fetch(" select * from g5_write_as where mb_id = '{$row['mb_id']}' and wr_datetime <= '{$row['wr_datetime']}' ");
	if($genuinemember['mb_id']){
		$isgenuine = 'O';
	}else{
		$isgenuine = 'X';
	}
	
	$total_row = sql_fetch("select count(*) as total from g5_write_as where mb_id = '{$row['mb_id']}' ");
	$total = $total_row['total'];
    echo "
    <tr>
        <td class='txt'>{$row['wr_3']}</td>
        <td class='txt'>{$row['wr_name']}</td>
        <td class='txt'>{$row['wr_email']}</td>
        <td class='txt'>{$row['wr_subject']}</td>
		<td class='txt'>{$row['wr_1']}</td>
		<td class='txt'>{$row['wr_2']}</td>
		<td class='txt'>{$row['wr_content']}</td>
		<td class='txt'>{$row['wr_file']}</td>
    </tr>
    ";
    $number--;
}
?>
</table>
</body>
</html>