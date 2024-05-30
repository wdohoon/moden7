<?php
include_once('./_common.php');

// 상품이 많을 경우 대비 설정변경
set_time_limit ( 0 );
ini_set('memory_limit', '50M');

function only_number($n)
{
    return preg_replace('/[^0-9]/', '', $n);
}

$is_upload_file = (isset($_FILES['excelfile']['tmp_name']) && $_FILES['excelfile']['tmp_name']) ? 1 : 0;

if( ! $is_upload_file){
    alert("엑셀 파일을 업로드해 주세요.");
}

if($is_upload_file) {
    $file = $_FILES['excelfile']['tmp_name'];

    include_once(G5_LIB_PATH.'/PHPExcel/IOFactory.php');

    $objPHPExcel = PHPExcel_IOFactory::load($file);
    $sheet = $objPHPExcel->getSheet(0);

    $num_rows = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();

    $dup_wr_id = array();
    $fail_wr_id = array();
    $dup_count = 0;
    $total_count = 0;
    $fail_count = 0;
    $succ_count = 0;

    for ($i = 2; $i <= $num_rows; $i++) {
        $total_count++;

        $j = 0;

        $rowData = $sheet->rangeToArray('A' . $i . ':' . $highestColumn . $i,
                                            NULL,
                                            TRUE,
                                            FALSE);

        $mb_no          = addslashes($rowData[0][$j++]);
		$mb_datetime          = addslashes($rowData[0][$j++]);
        $mb_id    = addslashes($rowData[0][$j++]);
		$mb_name          = addslashes($rowData[0][$j++]);
        $mb_email          = addslashes($rowData[0][$j++]);
        $mb_hp          = addslashes($rowData[0][$j++]);
        $mb_tel          = addslashes($rowData[0][$j++]);

        $addr          = addslashes($rowData[0][$j++]);
        $addr2          = addslashes($rowData[0][$j++]);
        $zip          = addslashes($rowData[0][$j++]);
        $mb_zip1          = addslashes($rowData[0][$j++]);
        $mb_zip2          = addslashes($rowData[0][$j++]);
        $mb_addr1          = addslashes($rowData[0][$j++]);
        $mb_addr2          = addslashes($rowData[0][$j++]);
        $mb_addr3          = addslashes($rowData[0][$j++]);

		$mb_mailling          = addslashes($rowData[0][$j++]);
		$mb_sms          = addslashes($rowData[0][$j++]);
		$mb_open          = addslashes($rowData[0][$j++]);
		$mb_1          = addslashes($rowData[0][$j++]);
		$mb_2          = addslashes($rowData[0][$j++]);

		

		

        if(!$mb_id && !$mb_name) {
            $fail_count++;
            continue;
        }

		$mb_password = '1234';

        $sql = " insert into {$g5['member_table']}
					set mb_id = '{$mb_id}',
						 mb_password = '".get_encrypt_string($mb_password)."',
						 mb_name = '{$mb_name}',
						 mb_nick = '',
						 mb_nick_date = '".G5_TIME_YMD."',
						 mb_email = '{$mb_email}',
						 mb_homepage = '',
						 mb_tel = '{$mb_tel}',
						 mb_hp = '{$mb_hp}',
						 mb_zip1 = '{$mb_zip1}',
						 mb_zip2 = '{$mb_zip2}',
						 mb_addr1 = '{$mb_addr1}',
						 mb_addr2 = '{$mb_addr2}',
						 mb_addr3 = '{$mb_addr3}',
						 mb_addr_jibeon = 'R',
						 mb_signature = '',
						 mb_profile = '',
						 mb_today_login = '".G5_TIME_YMDHIS."',
						 mb_datetime = '{$mb_datetime}',
						 mb_ip = '{$_SERVER['REMOTE_ADDR']}',
						 mb_level = '{$config['cf_register_level']}',
						 mb_recommend = '',
						 mb_login_ip = '{$_SERVER['REMOTE_ADDR']}',
						 mb_mailling = '{$mb_mailling}',
						 mb_sms = '{$mb_sms}',
						 mb_open = '{$mb_open}',
						 mb_open_date = '{$mb_datetime}',
						 mb_1 = '{$mb_1}',
						 mb_2 = '{$mb_2}',
						 mb_3 = '{$mb_3}',
						 mb_4 = '{$mb_4}',
						 mb_5 = '{$mb_5}',
						 mb_6 = '{$mb_6}',
						 mb_7 = '{$mb_7}',
						 mb_8 = '{$mb_8}',
						 mb_9 = '{$mb_9}',
						 mb_10 = 'DOCTOR'
						 {$sql_certify} ";

		// 이메일 인증을 사용하지 않는다면 이메일 인증시간을 바로 넣는다
		if (!$config['cf_use_email_certify'])
			$sql .= " , mb_email_certify = '".G5_TIME_YMDHIS."' ";
		sql_query($sql);

		// 회원가입 적립금 부여
		insert_point2($mb_id, $config['cf_register_money'], '회원가입 축하', '@member', $mb_id, '회원가입');

    }
}
	

$g5['title'] = '게시글 엑셀일괄등록 결과';
include_once(G5_PATH.'/head.sub.php');
?>

<div class="new_win">
    <h1><?php echo $g5['title']; ?></h1>

    <div class="local_desc01 local_desc">
        <p>게시글등록을 완료했습니다.</p>
    </div>

    <dl id="excelfile_result">
        <dt>총게시글수</dt>
        <dd><?php echo number_format($total_count); ?></dd>
        <dt>완료건수</dt>
        <dd><?php echo number_format($succ_count); ?></dd>
        <dt>실패건수</dt>
        <dd><?php echo number_format($fail_count); ?></dd>
        <?php if($fail_count > 0) { ?>
        <dt>실패 게시글코드</dt>
        <dd><?php echo implode(', ', $fail_wr_id); ?></dd>
        <?php } ?>
        <?php if($dup_count > 0) { ?>
        <dt>게시글코드중복건수</dt>
        <dd><?php echo number_format($dup_count); ?></dd>
        <dt>중복게시글코드</dt>
        <dd><?php echo implode(', ', $dup_wr_id); ?></dd>
        <?php } ?>
    </dl>

    <div class="btn_win01 btn_win">
        <button type="button" onclick="window.close();">창닫기</button>
    </div>

</div>

<?php
include_once(G5_PATH.'/tail.sub.php');