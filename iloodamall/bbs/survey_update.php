<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_LIB_PATH.'/register.lib.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// 리퍼러 체크
referer_check();

if($z == 'survey'){
    $mb_id = isset($member['mb_id']) ? trim($member['mb_id']) : '';
}else{
    alert('잘못된 접근입니다', G5_URL);
}

$wr_subject = '';
if (isset($_POST['wr_subject'])) {
    $wr_subject = substr(trim($_POST['wr_subject']),0,255);
    $wr_subject = preg_replace("#[\\\]+$#", "", $wr_subject);
}

$wr_name = addslashes(clean_xss_tags(isset($_POST['wr_name']) ? trim($_POST['wr_name']) : ''));
$wr_email = get_email_address(trim($_POST['wr_email']));

$wr_11_text = '';
if (isset($_POST['wr_11_text'])) {
    $wr_11_text = substr(trim($_POST['wr_11_text']),0,65536);
    $wr_11_text = preg_replace("#[\\\]+$#", "", $wr_11_text);
}

$wr_15_text = '';
if (isset($_POST['wr_15_text'])) {
    $wr_15_text = substr(trim($_POST['wr_15_text']),0,65536);
    $wr_15_text = preg_replace("#[\\\]+$#", "", $wr_15_text);
}

$wr_22_text = '';
if (isset($_POST['wr_22_text'])) {
    $wr_22_text = substr(trim($_POST['wr_22_text']),0,65536);
    $wr_22_text = preg_replace("#[\\\]+$#", "", $wr_22_text);
}

$wr_25_text = '';
if (isset($_POST['wr_25_text'])) {
    $wr_25_text = substr(trim($_POST['wr_25_text']),0,65536);
    $wr_25_text = preg_replace("#[\\\]+$#", "", $wr_25_text);
}

$wr_29_text = '';
if (isset($_POST['wr_29_text'])) {
    $wr_29_text = substr(trim($_POST['wr_29_text']),0,65536);
    $wr_29_text = preg_replace("#[\\\]+$#", "", $wr_29_text);
}


$wr_38_text = '';
if (isset($_POST['wr_38_text'])) {
    $wr_38_text = substr(trim($_POST['wr_38_text']),0,65536);
    $wr_38_text = preg_replace("#[\\\]+$#", "", $wr_38_text);
}

$wr_48_text = '';
if (isset($_POST['wr_48_text'])) {
    $wr_48_text = substr(trim($_POST['wr_48_text']),0,65536);
    $wr_48_text = preg_replace("#[\\\]+$#", "", $wr_48_text);
}

$wr_55_text = '';
if (isset($_POST['wr_55_text'])) {
    $wr_55_text = substr(trim($_POST['wr_55_text']),0,65536);
    $wr_55_text = preg_replace("#[\\\]+$#", "", $wr_55_text);
}

$wr_61_text = '';
if (isset($_POST['wr_61_text'])) {
    $wr_61_text = substr(trim($_POST['wr_61_text']),0,65536);
    $wr_61_text = preg_replace("#[\\\]+$#", "", $wr_61_text);
}

$wr_62_text = '';
if (isset($_POST['wr_62_text'])) {
    $wr_62_text = substr(trim($_POST['wr_62_text']),0,65536);
    $wr_62_text = preg_replace("#[\\\]+$#", "", $wr_62_text);
}

$wr_62_text = '';
if (isset($_POST['wr_62_text'])) {
    $wr_62_text = substr(trim($_POST['wr_62_text']),0,65536);
    $wr_62_text = preg_replace("#[\\\]+$#", "", $wr_62_text);
}

$wr_68_text = '';
if (isset($_POST['wr_68_text'])) {
    $wr_68_text = substr(trim($_POST['wr_68_text']),0,65536);
    $wr_68_text = preg_replace("#[\\\]+$#", "", $wr_68_text);
}

$wr_70_text = '';
if (isset($_POST['wr_70_text'])) {
    $wr_70_text = substr(trim($_POST['wr_70_text']),0,65536);
    $wr_70_text = preg_replace("#[\\\]+$#", "", $wr_70_text);
}

$wr_81_text = '';
if (isset($_POST['wr_81_text'])) {
    $wr_81_text = substr(trim($_POST['wr_81_text']),0,65536);
    $wr_81_text = preg_replace("#[\\\]+$#", "", $wr_81_text);
}

$wr_92_text = '';
if (isset($_POST['wr_92_text'])) {
    $wr_92_text = substr(trim($_POST['wr_92_text']),0,65536);
    $wr_92_text = preg_replace("#[\\\]+$#", "", $wr_92_text);
}

for ($i=1; $i<=93; $i++) {
    $var = "wr_$i";
    $$var = "";
    if (isset($_POST['wr_'.$i]) && settype($_POST['wr_'.$i], 'string')) {
        $$var = trim($_POST['wr_'.$i]);
    }
}

if(!$mb_id)
    alert('회원아이디가 없습니다. 올바른 방법으로 이용해 주십시오.');


//===============================================================
if($z=='survey'){		//z값이 있으면(설문조사했으면)

	$sql = " insert into g5_survey
			set  wr_subject = '$wr_subject',
				 mb_id = '$mb_id',
				 wr_name = '$wr_name',
				 wr_email = '$wr_email',
				 wr_datetime = '".G5_TIME_YMDHIS."',
				 wr_1 = '$wr_1',
				 wr_2 = '$wr_2',
				 wr_3 = '$wr_3',
				 wr_4 = '$wr_4',
				 wr_5 = '$wr_5',
				 wr_6 = '$wr_6',
				 wr_7 = '$wr_7',
				 wr_8 = '$wr_8',
				 wr_9 = '$wr_9',
				 wr_10 = '$wr_10',
				 wr_11 = '$wr_11',
				 wr_11_text = '$wr_11_text',
				 wr_12 = '$wr_12',
				 wr_13 = '$wr_13',
				 wr_14 = '$wr_14',
				 wr_15 = '$wr_15',
				 wr_15_text = '$wr_15_text',
				 wr_16 = '$wr_16',
				 wr_17 = '$wr_17',
				 wr_18 = '$wr_18',
				 wr_19 = '$wr_19',
				 wr_20 = '$wr_20',
				 wr_21 = '$wr_21',
				 wr_22 = '$wr_22',
				 wr_22_text = '$wr_22_text',
				 wr_23 = '$wr_23',
				 wr_24 = '$wr_24',
				 wr_25 = '$wr_25',
				 wr_25_text = '$wr_25_text',
				 wr_26 = '$wr_26',
				 wr_27 = '$wr_27',
				 wr_28 = '$wr_28',
				 wr_29 = '$wr_29',
				 wr_29_text = '$wr_29_text',
				 wr_30 = '$wr_30',
				 wr_31 = '$wr_31',
				 wr_32 = '$wr_32',
				 wr_33 = '$wr_33',
				 wr_34 = '$wr_34',
				 wr_35 = '$wr_35',
				 wr_36 = '$wr_36',
				 wr_37 = '$wr_37',
				 wr_38 = '$wr_38',
				 wr_38_text = '$wr_38_text',
				 wr_39 = '$wr_39',
				 wr_40 = '$wr_40',
				 wr_41 = '$wr_41',
				 wr_42 = '$wr_42',
				 wr_43 = '$wr_43',
				 wr_44 = '$wr_44',
				 wr_45 = '$wr_45',
				 wr_46 = '$wr_46',
				 wr_47 = '$wr_47',
				 wr_48 = '$wr_48',
				 wr_48_text = '$wr_48_text',
				 wr_49 = '$wr_49',
				 wr_50 = '$wr_50',
				 wr_51 = '$wr_51',
				 wr_52 = '$wr_52',
				 wr_53 = '$wr_53',
				 wr_54 = '$wr_54',
				 wr_55 = '$wr_55',
				 wr_55_text = '$wr_55_text',
				 wr_56 = '$wr_56',
				 wr_57 = '$wr_57',
				 wr_58 = '$wr_58',
				 wr_59 = '$wr_59',
				 wr_60 = '$wr_60',
				 wr_61 = '$wr_61',
				 wr_61_text = '$wr_61_text',
				 wr_62 = '$wr_62',
				 wr_62_text = '$wr_62_text',
				 wr_63 = '$wr_63',
				 wr_64 = '$wr_64',
				 wr_65 = '$wr_65',
				 wr_66 = '$wr_66',
				 wr_67 = '$wr_67',
				 wr_68 = '$wr_68',
				 wr_68_text = '$wr_68_text',
				 wr_69 = '$wr_69',
				 wr_70 = '$wr_70',
				 wr_70_text = '$wr_70_text',
				 wr_71 = '$wr_71',
				 wr_72 = '$wr_72',
				 wr_73 = '$wr_73',
				 wr_74 = '$wr_74',
				 wr_75 = '$wr_75',
				 wr_76 = '$wr_76',
				 wr_77 = '$wr_77',
				 wr_78 = '$wr_78',
				 wr_79 = '$wr_79',
				 wr_80 = '$wr_80',
				 wr_81 = '$wr_81',
				 wr_81_text = '$wr_81_text',
				 wr_82 = '$wr_82',
				 wr_83 = '$wr_83',
				 wr_84 = '$wr_84',
				 wr_85 = '$wr_85',
				 wr_86 = '$wr_86',
				 wr_87 = '$wr_87',
				 wr_88 = '$wr_88',
				 wr_89 = '$wr_89',
				 wr_90 = '$wr_90',
				 wr_91 = '$wr_91',
				 wr_92 = '$wr_92',
				 wr_92_text = '$wr_92_text',
				 wr_93 = '$wr_93'";

	sql_query($sql);

	$wr_id = sql_insert_id();

	//echo $sql2;
	//exit;

	$money = 100000;
	// 설문조사 적립금 부여
	insert_point2($mb_id, $config['cf_register_money'], '회원가입 축하', '@member', $mb_id, '회원가입');

}
alert('설문조사에 참여해주셔서 감사합니다.', G5_URL);

//goto_url(G5_HTTP_BBS_URL.'/register_result2.php');