<?php
include_once "_common.php";
if (!$is_admin) {
    alert("관리자만 접근 가능합니다.");
    exit;
}

$excel_down = $g5['write_prefix'] . $_REQUEST['bo_table']; //엑셀 다운로드 테이블
$wr_id = $_REQUEST['wr_id'];

$hp_filename = "설문조사현황";
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
$sql="select * from g5_survey";
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
        <td class='txt'>이메일</td>
        <td class='txt'>병원명</td>
        <td class='txt'>연락처</td>
        <td class='txt'>성함</td>
        <td class='txt'>주소</td>
		<td class='txt'>병원 운영 기간은 어떻게 되십니까?</td>
		<td class='txt'>현재 병원에서 환자들의 선호도가 높은 시술 종류는 무엇입니까?</td>
		<td class='txt'>병원 고객 선호도가 높은 시술은 무엇입니까?</td>
		<td class='txt'>색소치료 시 사용하는 장비는 무엇입니까?</td>
		<td class='txt'>위 제품을 선택한 이유는 무엇인가요?</td>
		<td class='txt'>색소치료 시술을 위해 장비를 구매할 의향이 있나요? 있다면 어떤 장비를 구매할 의향인가요?</td>
		<td class='txt'>위 장비 구매를 희망하는 이유는 무엇입니까?</td>
		<td class='txt'>(주)이루다 라는 회사를 알고 있습니까?</td>
		<td class='txt'>(주)이루다의 제품이나 서비스를 어떻게 알게 되었나요?</td>
		<td class='txt'>병원에서 보유하고 있는 이루다 제품이 있습니까?</td>
		<td class='txt'>보유하고 있는 이루다 제품을 체크해주세요.</td>
		<td class='txt'>이루다 제품의 전체 만족도를 체크해주세요</td>
		<td class='txt'>이루다 제품에 만족하신다면 이유는 무엇입니까?</td>
		<td class='txt'>이루다 제품에 불만족 하신다면 이유는 무엇입니까?</td>
		<td class='txt'>이루다 제품을 다른 사람에게 추천할 의향이 있으신가요?</td>
		<td class='txt'>이루다 제품을 추천할 의향이 있으시다면, 그 이유는 무엇인가요?</td>
		<td class='txt'>이루다 제품 또는 서비스에서 개선되어야 할 부분이 있다면 무엇인지 알려주세요.</td>
		<td class='txt'>이루다 마케팅 콘텐츠를 보시거나, 들어보신적이 있나요?</td>
		<td class='txt'>이루다 제품 또는 서비스를 어떤 미디어나 플랫폼을 통해 더 자주 접할 수 있었으면 좋겠다고 생각하시나요?</td>
		<td class='txt'>피부미용 트렌드나 시장에 대한 피드백이나 의견을 자주 공유하는 플랫폼은 무엇인가요?</td>
		<td class='txt'>이루다 마케팅 콘텐츠에 대한 제안이나 의견을 공유해 주세요.</td>
		<td class='txt'>리팟레이저의 시술 원리 및 원장님들의 강의와 임상, 리팟 시술을 직접 확인하실 수 있는 가디언즈 행사에 참여 할 의사가 있습니까? *</td>
		<td class='txt'>병원명</td>
		<td class='txt'>의사(담당자)성함</td>
		<td class='txt'>연락처</td>
		<td class='txt'>데모를 신청하고 싶은 (주)이루다 제품이 있으십니까?</td>
		<td class='txt'>데모를 신청하고 싶은 (주)이루다 제품이 있으십니까?</td>
		<td class='txt'>마지막으로 (주)이루다는 어떤 느낌 입니까?</td>
    </tr>

<?php
for($i=1; $row=sql_fetch_array($qry); $i++) {
	echo "
		<tr>
			<td class='txt'>{$i}</td>
			<td class='txt'>{$row['mb_id']}</td>
			<td class='txt'>{$row['wr_email']}</td>
			<td class='txt'>{$row['wr_subject']}</td>
			<td class='txt'>{$row['wr_1']}</td>
			<td class='txt'>{$row['wr_name']}</td>
			<td class='txt'>{$row['wr_2']}</td>
			<td class='txt'>{$row['wr_3']}{$row['wr_4']}{$row['wr_5']}{$row['wr_6']}</td>
			<td class='txt'>{$row['wr_7']}{$row['wr_8']}{$row['wr_9']}{$row['wr_10']}{$row['wr_11']}{$row['wr_11_text']}</td>
			<td class='txt'>{$row['wr_12']}{$row['wr_13']}{$row['wr_14']}{$row['wr_15']}{$row['wr_15_text']}</td>
			<td class='txt'>{$row['wr_16']}</td>
			<td class='txt'>{$row['wr_17']}{$row['wr_18']}{$row['wr_19']}{$row['wr_20']}{$row['wr_21']}{$row['wr_22']}{$row['wr_22_text']}</td>
			<td class='txt'>{$row['wr_23']}</td>
			<td class='txt'>{$row['wr_24']}{$row['wr_25']}{$row['wr_26']}{$row['wr_27']}{$row['wr_28']}{$row['wr_29']}{$row['wr_29_text']}</td>
			<td class='txt'>{$row['wr_30']}{$row['wr_31']}</td>
			<td class='txt'>{$row['wr_32']}{$row['wr_33']}{$row['wr_34']}{$row['wr_35']}{$row['wr_36']}{$row['wr_37']}{$row['wr_38']}{$row['wr_38_text']}</td>
			<td class='txt'>{$row['wr_39']}{$row['wr_40']}</td>
			<td class='txt'>{$row['wr_41']}{$row['wr_42']}{$row['wr_43']}{$row['wr_44']}{$row['wr_45']}{$row['wr_46']}{$row['wr_47']}{$row['wr_48']}{$row['wr_48_text']}</td>
			<td class='txt'>{$row['wr_49']}</td>
			<td class='txt'>{$row['wr_50']}{$row['wr_51']}{$row['wr_52']}{$row['wr_53']}{$row['wr_54']}{$row['wr_55']}{$row['wr_55_text']}</td>
			<td class='txt'>{$row['wr_56']}{$row['wr_57']}{$row['wr_58']}{$row['wr_59']}{$row['wr_60']}{$row['wr_61']}{$row['wr_61_text']}</td>
			<td class='txt'>{$row['wr_62']}{$row['wr_62_text']}</td>
			<td class='txt'>{$row['wr_63']}{$row['wr_64']}{$row['wr_65']}{$row['wr_66']}{$row['wr_67']}{$row['wr_68']}{$row['wr_68_text']}</td>
			<td class='txt'>{$row['wr_69']}</td>
			<td class='txt'>{$row['wr_70']}{$row['wr_70_text']}</td>
			<td class='txt'>{$row['wr_71']}{$row['wr_72']}{$row['wr_73']}{$row['wr_74']}{$row['wr_75']}{$row['wr_76']}{$row['wr_76_text']}</td>
			<td class='txt'>{$row['wr_77']}{$row['wr_78']}{$row['wr_79']}{$row['wr_80']}{$row['wr_81']}{$row['wr_81_text']}</td>
			<td class='txt'>{$row['wr_82']}</td>
			<td class='txt'>{$row['wr_83']}</td>
			<td class='txt'>{$row['wr_84']}</td>
			<td class='txt'>{$row['wr_85']}</td>
			<td class='txt'>{$row['wr_86']}</td>
			<td class='txt'>{$row['wr_87']}</td>
			<td class='txt'>{$row['wr_88']}{$row['wr_89']}{$row['wr_90']}{$row['wr_91']}{$row['wr_92']}{$row['wr_92_text']}</td>
			<td class='txt'>{$row['wr_93']}</td>
		</tr>
		";
	
    $number--;
}
?>
</table>
</body>
</html>