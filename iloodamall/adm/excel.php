<?php
include_once "_common.php";
if ($is_admin != 'super' && $member['mb_id'] != 'member_admin') {
    alert("관리자만 접근 가능합니다.");
    exit;
}

$excel_down = $g5['write_prefix'] . $_REQUEST['bo_table']; //엑셀 다운로드 테이블
$wr_id = $_REQUEST['wr_id'];
$cate = $_GET['cate'];

$hp_filename = $cate."회원 목록";
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
//$temp=sql_fetch_array(sql_query("select count(*) from {$excel_down} "));
$sql="select * from g5_member where mb_10 = '{$cate}'";
$qry=sql_query($sql);

// 원글만 다운로드 (코멘트 제외) ,  2013-10-21 추가
//$temp=sql_fetch_array(sql_query("select count(*) from {$excel_down} where wr_is_comment = '0' and wr_content = '{$wr_id}' "));
//$sql="select * from {$excel_down} {$search} where wr_is_comment = '0'  and wr_content = '{$wr_id}' order by wr_datetime desc"; 
//$qry=sql_query($sql); 

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
        <td class='txt'>NO</td>
        <td class='txt'>회원 아이디</td>
        <td class='txt'>회원 이름</td>
        <td class='txt'>회원 닉네임</td>
        <td class='txt'>회원 이메일</td>
        <td class='txt'>회원 등급</td>
		<?php if($cate =="doctor"){?>
		<td class='txt'>정품인증유무</td>
		<?}?>
		<td class='txt'>전화번호</td>
		<td class='txt'>회원 주소</td>
		<td class='txt'>추천인</td>
		<td class='txt'>포인트</td>
		<td class='txt'>적립금</td>
		<td class='txt'>병원 명</td>
		<td class='txt'>사업자 번호</td>
		<td class='txt'>분류</td>
    </tr>

<?php
for($i=1; $row=sql_fetch_array($qry); $i++) {
	if($cate =="doctor"){
		$ok="X";
		if($row['mb_level']==3){
			$ok="O";
		}
		echo "
		<tr>
			<td class='txt'>{$i}</td>
			<td class='txt'>{$row['mb_id']}</td>
			<td class='txt'>{$row['mb_name']}</td>
			<td class='txt'>{$row['mb_nick']}</td>
			<td class='txt'>{$row['mb_email']}</td>
			<td class='txt'>{$row['mb_level']}</td>
			<td class='txt'>{$ok}</td>
			<td class='txt'>{$row['mb_hp']}</td>
			<td class='txt'>{$row['mb_zip1']}{$row['mb_zip2']}{$row['mb_addr1']}{$row['mb_addr2']}{$row['mb_addr3']}</td>
			<td class='txt'>{$row['mb_recomend']}</td>
			<td class='txt'>{$row['mb_point']}</td>
			<td class='txt'>{$row['mb_point2']}</td>
			<td class='txt'>{$row['mb_1']}</td>
			<td class='txt'>{$row['mb_2']}</td>
			<td class='txt'>{$row['mb_10']}</td>
		</tr>
		";
	} else{
		echo "
		<tr>
			<td class='txt'>{$i}</td>
			<td class='txt'>{$row['mb_id']}</td>
			<td class='txt'>{$row['mb_name']}</td>
			<td class='txt'>{$row['mb_nick']}</td>
			<td class='txt'>{$row['mb_email']}</td>
			<td class='txt'>{$row['mb_level']}</td>
			<td class='txt'>{$row['mb_hp']}</td>
			<td class='txt'>{$row['mb_zip1']}{$row['mb_zip2']}{$row['mb_addr1']}{$row['mb_addr2']}{$row['mb_addr3']}</td>
			<td class='txt'>{$row['mb_recomend']}</td>
			<td class='txt'>{$row['mb_point']}</td>
			<td class='txt'>{$row['mb_point2']}</td>
			<td class='txt'>{$row['mb_1']}</td>
			<td class='txt'>{$row['mb_2']}</td>
			<td class='txt'>{$row['mb_10']}</td>
		</tr>
		";
	}
	
    $number--;
}
?>
</table>
</body>
</html>