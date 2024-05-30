<?php
include_once('../../../common.php');
if (!$is_admin) {
    alert("관리자만 접근 가능합니다.");
    exit;
}

$excel_down = $g5['write_prefix'] . $_REQUEST['bo_table']; //엑셀 다운로드 테이블
$wr_id = $_REQUEST['wr_id'];

$hp_filename = "정품승인등록";
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

$sql = "select * from g5_write_genuine";

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
        <td class='txts'>성함</td>
        <td class='txts'>연락처</td>
        <td class='txts'>일련번호</td>
		<td class='txts'>등록차수</td>
    </tr>
        <?php
        while($row = sql_fetch_array($qry)) {
            // g5_member 테이블에서 회원 정보 조회
            $sql7 = "SELECT mb_1, mb_name, mb_hp FROM g5_member WHERE mb_id = '{$row['mb_id']}'";
            $row7 = sql_fetch($sql7);

            // genuine_list 테이블에서 number 조회
            // '특정조건'은 해당 row와 관련된 genuine_list의 행을 식별할 수 있는 조건으로 바꿔야 합니다.
            $sql8 = "SELECT number FROM genuine_list WHERE mb_id = '{$row['mb_id']}'";
            $row8 = sql_fetch($sql8);

            echo "
            <tr>
                <td class='txt'>{$row7['mb_1']}</td>
                <td class='txt'>{$row7['mb_name']}</td>
                <td class='txt'>{$row7['mb_hp']}</td>
                <td class='txt'>{$row['wr_2']}</td>
                <td class='txt'>{$row8['number']}</td>
            </tr>
            ";
        }
        ?>
</table>
</body>
</html>