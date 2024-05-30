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

    for ($i = 3; $i <= $num_rows; $i++) {
        $total_count++;

        $j = 0;

		//wr_subject: 제품명
		//wr_1: 시리얼넘버
		//wr_2: 출고일자
		//wr_3: 출고처
		//wr_4: 수량
		//wr_5: 출고장소

        $rowData = $sheet->rangeToArray('A' . $i . ':' . $highestColumn . $i,
                                            NULL,
                                            TRUE,
                                            FALSE);

        $wr_2          = addslashes($rowData[0][$j++]);
		$wr_3          = addslashes($rowData[0][$j++]);
        $wr_subject    = addslashes($rowData[0][$j++]);
		$wr_1          = addslashes($rowData[0][$j++]);
        $wr_4          = addslashes($rowData[0][$j++]);
        $wr_5          = addslashes($rowData[0][$j++]);
		

        if(!$wr_1 && !$wr_subject) {
            $fail_count++;
            continue;
        }

		$wr_num = get_next_num('g5_write_serial');

        $sql = " INSERT INTO g5_write_serial
                     SET wr_reply = '$wr_reply',
					 wr_num = '$wr_num',
                     wr_comment = 0,
                     ca_name = '$ca_name',
                     wr_option = '$html,$secret,$mail',
                     wr_subject = '$wr_subject',
                     wr_content = '.',
                     wr_seo_title = '$wr_seo_title',
                     wr_link1 = '$wr_link1',
                     wr_link2 = '$wr_link2',
                     wr_link1_hit = 0,
                     wr_link2_hit = 0,
                     wr_hit = 0,
                     wr_good = 0,
                     wr_nogood = 0,
                     mb_id = '{$member['mb_id']}',
                     wr_password = '$wr_password',
                     wr_name = '최고관리자',
                     wr_email = 'admin@domain.com',
                     wr_homepage = '$wr_homepage',
                     wr_datetime = '".G5_TIME_YMDHIS."',
                     wr_last = '".G5_TIME_YMDHIS."',
                     wr_ip = '{$_SERVER['REMOTE_ADDR']}',
                     wr_1 = '$wr_1',
                     wr_2 = '$wr_2',
                     wr_3 = '$wr_3',
                     wr_4 = '$wr_4',
                     wr_5 = '$wr_5',
                     wr_6 = '$wr_6',
                     wr_7 = '$wr_7',
                     wr_8 = '$wr_8',
                     wr_9 = '$wr_9',
                     wr_10 = '$wr_10' ";

        sql_query($sql);
		
		$wr_id = sql_insert_id();
		
		// 부모 아이디에 UPDATE
		sql_query(" update g5_write_serial set wr_parent = '$wr_id' where wr_id = '$wr_id' ");

		// 게시글 1 증가
		sql_query("update {$g5['board_table']} set bo_count_write = bo_count_write + {$succ_count} where bo_table = 'product'");

        $succ_count++;
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