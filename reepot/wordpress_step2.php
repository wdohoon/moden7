<?php include_once ("./_common.php");
include_once ("./w_common.php");


foreach($_POST['bo_table_arr'] as $val) {
				if(!preg_match("/^([A-Za-z0-9_]{1,20})$/", $val)) {
								// alert('게시판 ID값에 사용할 수 없는 값이 있습니다. (영문자, 숫자, _ 만 가능) : '. $val);
				}
}

$uploadfile = $_POST['uploadfile'];

if(is_file($uploadfile)) {

				$f_tmp = file_get_contents($uploadfile);
				$f_tmp = str_replace("wp:", "wp__", $f_tmp);
				$f_tmp = str_replace("content:", "content__", $f_tmp);


				$xml = simplexml_load_string($f_tmp, 'SimpleXMLElement', LIBXML_NOBLANKS);

				if($xml === false) {
								//deal with error
								echo 'error';
								exit;
				}

}


//wordpress 그룹 삭제
$sql = "delete from {$g5['group_table']} where gr_id = '$_POST[gr_id]' ";
sql_fetch($sql);


//wordpress 그룹 생성


$sql_common = " gr_subject = '{$_POST['gr_subject']}',
                gr_device = '{$_POST['gr_device']}',
                gr_admin  = '{$_POST['gr_admin']}',
                gr_1_subj = '{$_POST['gr_1_subj']}',
                gr_2_subj = '{$_POST['gr_2_subj']}',
                gr_3_subj = '{$_POST['gr_3_subj']}',
                gr_4_subj = '{$_POST['gr_4_subj']}',
                gr_5_subj = '{$_POST['gr_5_subj']}',
                gr_6_subj = '{$_POST['gr_6_subj']}',
                gr_7_subj = '{$_POST['gr_7_subj']}',
                gr_8_subj = '{$_POST['gr_8_subj']}',
                gr_9_subj = '{$_POST['gr_9_subj']}',
                gr_10_subj = '{$_POST['gr_10_subj']}',
                gr_1 = '{$_POST['gr_1']}',
                gr_2 = '{$_POST['gr_2']}',
                gr_3 = '{$_POST['gr_3']}',
                gr_4 = '{$_POST['gr_4']}',
                gr_5 = '{$_POST['gr_5']}',
                gr_6 = '{$_POST['gr_6']}',
                gr_7 = '{$_POST['gr_7']}',
                gr_8 = '{$_POST['gr_8']}',
                gr_9 = '{$_POST['gr_9']}',
                gr_10 = '{$_POST['gr_10']}' ";


$sql = " select count(*) as cnt from {$g5['group_table']} where gr_id = '$_POST[gr_id]' ";
$row = sql_fetch($sql);
if($row['cnt']) alert('이미 존재하는 그룹 ID 입니다.');

$sql = " insert into {$g5['group_table']}
                set gr_id = '$_POST[gr_id]',
                     {$sql_common} ";

sql_query($sql);
//word_write( 'wordpress 게시판 그룹 생성 완료', 2);


///////////게시판 그룹 생성 wordpress 그룹으로 통일. /////////


///////////게시판 생성  /////////


$tmpNum = 0;
//foreach ($xml->channel->children() as $child)
foreach($_POST['bo_table_arr'] as $val) {


				$bo_table = $val;


				if(!$bo_table) {
								alert('게시판 TABLE명은 반드시 입력하세요.');
				}


				//게시판 목록 테이블에 같은 테이블 삭제.
				$sql = "delete from {$g5['board_table']} where bo_table = '$bo_table' ";
				sql_fetch($sql);


				//게시판 테이블 삭제
				$sql = "DROP TABLE IF EXISTS {$g5['write_prefix']}{$bo_table}";
				sql_fetch($sql);


				$board_path = G5_DATA_PATH.'/file/'.$bo_table;

				// 게시판 디렉토리 생성
				@mkdir($board_path, G5_DIR_PERMISSION);
				@chmod($board_path, G5_DIR_PERMISSION);

				// 디렉토리에 있는 파일의 목록을 보이지 않게 한다.
				$file = $board_path.'/index.php';
				$f = @fopen($file, 'w');
				@fwrite($f, '');
				@fclose($f);
				@chmod($file, G5_FILE_PERMISSION);

				// 분류에 & 나 = 는 사용이 불가하므로 2바이트로 바꾼다.
				$src_char = array('&', '=');
				$dst_char = array('＆', '〓');
				$bo_category_list = str_replace($src_char, $dst_char, $bo_category_list);

				$_POST['bo_subject'] = $bo_subject_arr[$tmpNum];

				$sql_common = " gr_id       = '{$_POST['gr_id']}',
                bo_subject          = '{$_POST['bo_subject']}',
                bo_mobile_subject   = '{$_POST['bo_mobile_subject']}',
                bo_device           = '{$_POST['bo_device']}',
                bo_admin            = '{$_POST['bo_admin']}',
                bo_list_level       = '{$_POST['bo_list_level']}',
                bo_read_level       = '{$_POST['bo_read_level']}',
                bo_write_level      = '{$_POST['bo_write_level']}',
                bo_reply_level      = '{$_POST['bo_reply_level']}',
                bo_comment_level    = '{$_POST['bo_comment_level']}',
                bo_html_level       = '{$_POST['bo_html_level']}',
                bo_link_level       = '{$_POST['bo_link_level']}',
                bo_count_modify     = '{$_POST['bo_count_modify']}',
                bo_count_delete     = '{$_POST['bo_count_delete']}',
                bo_upload_level     = '{$_POST['bo_upload_level']}',
                bo_download_level   = '{$_POST['bo_download_level']}',
                bo_read_point       = '{$_POST['bo_read_point']}',
                bo_write_point      = '{$_POST['bo_write_point']}',
                bo_comment_point    = '{$_POST['bo_comment_point']}',
                bo_download_point   = '{$_POST['bo_download_point']}',
                bo_use_category     = '{$_POST['bo_use_category']}',
                bo_category_list    = '{$_POST['bo_category_list']}',
                bo_use_sideview     = '{$_POST['bo_use_sideview']}',
                bo_use_file_content = '{$_POST['bo_use_file_content']}',
                bo_use_secret       = '{$_POST['bo_use_secret']}',
                bo_use_dhtml_editor = '{$_POST['bo_use_dhtml_editor']}',
                bo_use_rss_view     = '{$_POST['bo_use_rss_view']}',
                bo_use_good         = '{$_POST['bo_use_good']}',
                bo_use_nogood       = '{$_POST['bo_use_nogood']}',
                bo_use_name         = '{$_POST['bo_use_name']}',
                bo_use_signature    = '{$_POST['bo_use_signature']}',
                bo_use_ip_view      = '{$_POST['bo_use_ip_view']}',
                bo_use_list_view    = '{$_POST['bo_use_list_view']}',
                bo_use_list_file    = '{$_POST['bo_use_list_file']}',
                bo_use_list_content = '{$_POST['bo_use_list_content']}',
                bo_use_email        = '{$_POST['bo_use_email']}',
                bo_use_cert         = '{$_POST['bo_use_cert']}',
                bo_use_sns          = '{$_POST['bo_use_sns']}',
                bo_table_width      = '{$_POST['bo_table_width']}',
                bo_subject_len      = '{$_POST['bo_subject_len']}',
                bo_mobile_subject_len      = '{$_POST['bo_mobile_subject_len']}',
                bo_page_rows        = '{$_POST['bo_page_rows']}',
                bo_mobile_page_rows = '{$_POST['bo_mobile_page_rows']}',
                bo_new              = '{$_POST['bo_new']}',
                bo_hot              = '{$_POST['bo_hot']}',
                bo_image_width      = '{$_POST['bo_image_width']}',
                bo_skin             = '{$_POST['bo_skin']}',
                bo_mobile_skin      = '{$_POST['bo_mobile_skin']}',
                bo_include_head     = '{$_POST['bo_include_head']}',
                bo_include_tail     = '{$_POST['bo_include_tail']}',
                bo_content_head     = '{$_POST['bo_content_head']}',
                bo_content_tail     = '{$_POST['bo_content_tail']}',
                bo_mobile_content_head     = '{$_POST['bo_mobile_content_head']}',
                bo_mobile_content_tail     = '{$_POST['bo_mobile_content_tail']}',
                bo_insert_content   = '{$_POST['bo_insert_content']}',
                bo_gallery_cols     = '{$_POST['bo_gallery_cols']}',
                bo_gallery_width    = '{$_POST['bo_gallery_width']}',
                bo_gallery_height   = '{$_POST['bo_gallery_height']}',
                bo_mobile_gallery_width = '{$_POST['bo_mobile_gallery_width']}',
                bo_mobile_gallery_height= '{$_POST['bo_mobile_gallery_height']}',
                bo_upload_count     = '{$_POST['bo_upload_count']}',
                bo_upload_size      = '{$_POST['bo_upload_size']}',
                bo_reply_order      = '{$_POST['bo_reply_order']}',
                bo_use_search       = '{$_POST['bo_use_search']}',
                bo_order            = '{$_POST['bo_order']}',
                bo_write_min        = '{$_POST['bo_write_min']}',
                bo_write_max        = '{$_POST['bo_write_max']}',
                bo_comment_min      = '{$_POST['bo_comment_min']}',
                bo_comment_max      = '{$_POST['bo_comment_max']}',
                bo_sort_field       = '{$_POST['bo_sort_field']}',
                bo_1_subj           = '{$_POST['bo_1_subj']}',
                bo_2_subj           = '{$_POST['bo_2_subj']}',
                bo_3_subj           = '{$_POST['bo_3_subj']}',
                bo_4_subj           = '{$_POST['bo_4_subj']}',
                bo_5_subj           = '{$_POST['bo_5_subj']}',
                bo_6_subj           = '{$_POST['bo_6_subj']}',
                bo_7_subj           = '{$_POST['bo_7_subj']}',
                bo_8_subj           = '{$_POST['bo_8_subj']}',
                bo_9_subj           = '{$_POST['bo_9_subj']}',
                bo_10_subj          = '{$_POST['bo_10_subj']}',
                bo_1                = '{$_POST['bo_1']}',
                bo_2                = '{$_POST['bo_2']}',
                bo_3                = '{$_POST['bo_3']}',
                bo_4                = '{$_POST['bo_4']}',
                bo_5                = '{$_POST['bo_5']}',
                bo_6                = '{$_POST['bo_6']}',
                bo_7                = '{$_POST['bo_7']}',
                bo_8                = '{$_POST['bo_8']}',
                bo_9                = '{$_POST['bo_9']}',
                bo_10               = '{$_POST['bo_10']}' ";


				$row = sql_fetch(" select count(*) as cnt from {$g5['board_table']} where bo_table = '{$bo_table}' ");
				if($row['cnt']) alert($bo_table.' 은(는) 이미 존재하는 TABLE 입니다.');

				$sql = " insert into {$g5['board_table']}
                set bo_table = '{$bo_table}',
                    bo_count_write = '0',
                    bo_count_comment = '0',
                    $sql_common ";
				sql_query($sql);

				// 게시판 테이블 생성
				$file = file('../'.G5_ADMIN_DIR.'/sql_write.sql');
				$sql = implode($file, "\n");

				$create_table = $g5['write_prefix'].$bo_table;

				// sql_board.sql 파일의 테이블명을 변환
				$source = array('/__TABLE_NAME__/', '/;/');
				$target = array($create_table, '');
				$sql = preg_replace($source, $target, $sql);
				sql_query($sql, false);


				$write_table = $create_table;
				//print_r2($xml);
				//exit;
				foreach($xml->channel->children() as $child) {
								//    word_write( 'wp__category_nicename : '.$child->wp__category_nicename,1);
								//    word_write( 'domain nice           : '.$child->category['nicename'],1);
								//    word_write( 'categori              : '.$child->category,1);
								//    word_write( 'bo_table_arr_ori      : '.$_POST['bo_table_arr_ori'][$tmpNum],1);
								//    word_write( 'titel                 : '.$child->title,1);
								//    word_write('',1);

								$xml_cate_nicename = '';
								foreach($child->category as $cate_arr) {
												//word_write($cate_arr['domain'],1);

												if(($cate_arr['domain'] == 'category')) {
																$xml_cate_nicename = $cate_arr['nicename'];
												}

								}


								if(($xml_cate_nicename == $_POST['bo_table_arr_ori'][$tmpNum])) {
												//if (false){
												if($child->wp__post_type == 'post' and $child->wp__status == 'publish') {


																//글 쓰기

																//echo $child->title . '<br />';
																//echo $child->content__encoded . '<br />';


																$_POST['wr_subject'] = $child->title;
																$_POST['wr_content'] = $child->content__encoded;
																$wr_name = 'admin';


																$msg = array();

																$wr_subject = '';
																if(isset($_POST['wr_subject'])) {
																				$wr_subject = substr(trim($_POST['wr_subject']), 0, 255);
																				$wr_subject = preg_replace("#[\\\]+$#", "", $wr_subject);
																				$wr_subject = addslashes($wr_subject);
																}
																if($wr_subject == '') {
																				$wr_subject = '제목이 없음';
																}

																$wr_content = '';
																if(isset($_POST['wr_content'])) {
																				$wr_content = substr(trim($_POST['wr_content']), 0, 65536);
																				$wr_content = preg_replace("#[\\\]+$#", "", $wr_content);
																				$wr_content = addslashes($wr_content);
																}
																if($wr_content == '') {
																				$wr_content = '내용이 없음';
																}

																$wr_link1 = '';
																if(isset($_POST['wr_link1'])) {
																				$wr_link1 = substr($_POST['wr_link1'], 0, 1000);
																				$wr_link1 = trim(strip_tags($wr_link1));
																				$wr_link1 = preg_replace("#[\\\]+$#", "", $wr_link1);
																}

																$wr_link2 = '';
																if(isset($_POST['wr_link2'])) {
																				$wr_link2 = substr($_POST['wr_link2'], 0, 1000);
																				$wr_link2 = trim(strip_tags($wr_link2));
																				$wr_link2 = preg_replace("#[\\\]+$#", "", $wr_link2);
																}

																$msg = implode('<br>', $msg);
																if($msg) {
																				alert($msg);
																}

																// 090710
																if(substr_count($wr_content, '&#') > 50) {
																				alert('내용에 올바르지 않은 코드가 다수 포함되어 있습니다.');
																				exit;
																}

																$upload_max_filesize = ini_get('upload_max_filesize');

																if(empty($_POST)) {
																				alert("파일 또는 글내용의 크기가 서버에서 설정한 값을 넘어 오류가 발생하였습니다.\\npost_max_size=".ini_get('post_max_size')." , upload_max_filesize=".$upload_max_filesize.
																								"\\n게시판관리자 또는 서버관리자에게 문의 바랍니다.");
																}

																$notice_array = explode(",", $board['bo_notice']);


																if($w == '' || $w == 'u') {

																				// 김선용 1.00 : 글쓰기 권한과 수정은 별도로 처리되어야 함
																				if($w == 'u' && $member['mb_id'] && $wr['mb_id'] == $member['mb_id']) {
																								;
																				} else
																								if($member['mb_level'] < $board['bo_write_level']) {
																												alert('글을 쓸 권한이 없습니다.');
																								}

																				// 외부에서 글을 등록할 수 있는 버그가 존재하므로 공지는 관리자만 등록이 가능해야 함
																				if(!$is_admin && $notice) {
																								alert('관리자만 공지할 수 있습니다.');
																				}

																}


																if(!isset($_POST['wr_subject']) || !trim($_POST['wr_subject'])) alert('제목을 입력하여 주십시오.');


																//    if ($member['mb_id']) {
																//        $mb_id = $member['mb_id'];
																//        $wr_name = addslashes(clean_xss_tags($board['bo_use_name'] ? $member['mb_name'] : $member['mb_nick']));
																//        $wr_password = $member['mb_password'];
																//        $wr_email = addslashes($member['mb_email']);
																//        $wr_homepage = addslashes(clean_xss_tags($member['mb_homepage']));
																//    } else {
																//        $mb_id = '';
																//        // 비회원의 경우 이름이 누락되는 경우가 있음
																//        $wr_name = clean_xss_tags(trim($_POST['wr_name']));
																//        if (!$wr_name)
																//            alert('이름은 필히 입력하셔야 합니다.');
																//        $wr_password = sql_password($wr_password);
																//        $wr_email = get_email_address(trim($_POST['wr_email']));
																//        $wr_homepage = clean_xss_tags($wr_homepage);
																//    }


																$wr_num = get_next_num($write_table);
																$wr_reply = '';

																$html = 'html2';
																$sql = " insert into $write_table
                set wr_num = '$wr_num',
                     wr_reply = '$wr_reply',
                     wr_comment = 0,
                     ca_name = '$ca_name',
                     wr_option = '$html,$secret,$mail',
                     wr_subject = '$wr_subject',
                     wr_content = '$wr_content',
                     wr_link1 = '$wr_link1',
                     wr_link2 = '$wr_link2',
                     wr_link1_hit = 0,
                     wr_link2_hit = 0,
                     wr_hit = 0,
                     wr_good = 0,
                     wr_nogood = 0,
                     mb_id = '{$member['mb_id']}',
                     wr_password = '$wr_password',
                     wr_name = '$wr_name',
                     wr_email = '$wr_email',
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

																$wr_id = mysql_insert_id();

																// 부모 아이디에 UPDATE
																sql_query(" update $write_table set wr_parent = '$wr_id' where wr_id = '$wr_id' ");

																// 새글 INSERT
																sql_query(" insert into {$g5['board_new_table']} ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) values ( '{$bo_table}', '{$wr_id}', '{$wr_id}', '".
																				G5_TIME_YMDHIS."', '{$member['mb_id']}' ) ");

																// 게시글 1 증가
																sql_query("update {$g5['board_table']} set bo_count_write = bo_count_write + 1 where bo_table = '{$bo_table}'");


																// 게시판그룹접근사용을 하지 않아야 하고 비회원 글읽기가 가능해야 하며 비밀글이 아니어야 합니다.
																if(!$group['gr_use_access'] && $board['bo_read_level'] < 2 && !$secret) {
																				naver_syndi_ping($bo_table, $wr_id);
																}

																// 디렉토리가 없다면 생성합니다. (퍼미션도 변경하구요.)
																@mkdir(G5_DATA_PATH.'/file/'.$bo_table, G5_DIR_PERMISSION);
																@chmod(G5_DATA_PATH.'/file/'.$bo_table, G5_DIR_PERMISSION);

																$chars_array = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));


																//------------------------------------------------------------------------------

																// 비밀글이라면 세션에 비밀글의 아이디를 저장한다. 자신의 글은 다시 비밀번호를 묻지 않기 위함
																if($secret) set_session("ss_secret_{$bo_table}_{$wr_num}", true);


																delete_cache_latest($bo_table);


																//글쓰기 end


																//echo urldecode($child->wp__category_parent).'<br />';
																//print_r( $child ).'<br />';

												}

								}
				}

				//echo $child->getName() . ": " . urldecode($child->wp__category_nicename) . "<br>";


				$tmpNum++;


}
///////////게시판 생성 end  /////////


echo "마이그레이션 완료~"; ?>