<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/naver_syndi.lib.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

$case = isset($_GET['case']) ? $_GET['case'] : '';

if($bo_table == 'genuine' && $case =='member'){
	

} else if($bo_table == 'product_application' && $wr_10 == '1'){

} else if($bo_table == 'guardians' && $wr_10 == '1'){

} else {
// 토큰체크
check_write_token($bo_table);
}

$g5['title'] = '게시글 저장';

$msg = array();
$uid = isset($_POST['uid']) ? preg_replace('/[^0-9]/', '', $_POST['uid']) : 0;

if($board['bo_use_category']) {
    $ca_name = isset($_POST['ca_name']) ? trim($_POST['ca_name']) : '';
    if(!$ca_name) {
        $msg[] = '<strong>분류</strong>를 선택하세요.';
    } else {
        $categories = array_map('trim', explode("|", $board['bo_category_list'].($is_admin ? '|공지' : '')));
        if(!empty($categories) && !in_array($ca_name, $categories))
            $msg[] = '분류를 올바르게 입력하세요.';

        if(empty($categories))
            $ca_name = '';
    }
} else {
    $ca_name = '';
}

$wr_subject = '';
if (isset($_POST['wr_subject'])) {
    $wr_subject = substr(trim($_POST['wr_subject']),0,255);
    $wr_subject = preg_replace("#[\\\]+$#", "", $wr_subject);
}

if($bo_table == 'genuine'){}else{
if ($wr_subject == '') {
    $msg[] = '<strong>제목</strong>을 입력하세요.';
}
}

$wr_content = '';
if (isset($_POST['wr_content'])) {
    $wr_content = substr(trim($_POST['wr_content']),0,65536);
    $wr_content = preg_replace("#[\\\]+$#", "", $wr_content);
}

if($bo_table == 'genuine'){}else{

if ($wr_content == '') {
    $msg[] = '<strong>내용</strong>을 입력하세요.';
}
}

$wr_link1 = '';
if (isset($_POST['wr_link1'])) {
    $wr_link1 = substr($_POST['wr_link1'],0,1000);
    $wr_link1 = trim(strip_tags($wr_link1));
    $wr_link1 = preg_replace("#[\\\]+$#", "", $wr_link1);
}

$wr_link2 = '';
if (isset($_POST['wr_link2'])) {
    $wr_link2 = substr($_POST['wr_link2'],0,1000);
    $wr_link2 = trim(strip_tags($wr_link2));
    $wr_link2 = preg_replace("#[\\\]+$#", "", $wr_link2);
}

$msg = implode('<br>', $msg);
if ($msg) {
    alert($msg);
}

// 090710
if (substr_count($wr_content, '&#') > 50) {
    alert('내용에 올바르지 않은 코드가 다수 포함되어 있습니다.');
    exit;
}

$upload_max_filesize = ini_get('upload_max_filesize');

if($bo_table == 'genuine'){}else{
	if (empty($_POST)) {
		alert("파일 또는 글내용의 크기가 서버에서 설정한 값을 넘어 오류가 발생하였습니다.\\npost_max_size=".ini_get('post_max_size')." , upload_max_filesize=".$upload_max_filesize."\\n게시판관리자 또는 서버관리자에게 문의 바랍니다.");
	}
}

$notice_array = explode(",", $board['bo_notice']);
$wr_password = isset($_POST['wr_password']) ? $_POST['wr_password'] : '';
$bf_content = isset($_POST['bf_content']) ? (array) $_POST['bf_content'] : array();
$_POST['html'] = isset($_POST['html']) ? clean_xss_tags($_POST['html'], 1, 1) : '';
$_POST['secret'] = isset($_POST['secret']) ? clean_xss_tags($_POST['secret'], 1, 1) : '';
$_POST['mail'] = isset($_POST['mail']) ? clean_xss_tags($_POST['mail'], 1, 1) : '';

if ($w == 'u' || $w == 'r') {
    $wr = get_write($write_table, $wr_id);
    if (!$wr['wr_id']) {
        alert("글이 존재하지 않습니다.\\n글이 삭제되었거나 이동하였을 수 있습니다.");
    }
}

// 외부에서 글을 등록할 수 있는 버그가 존재하므로 비밀글은 사용일 경우에만 가능해야 함
if (!$is_admin && !$board['bo_use_secret'] && (stripos($_POST['html'], 'secret') !== false || stripos($_POST['secret'], 'secret') !== false || stripos($_POST['mail'], 'secret') !== false)) {
	alert('비밀글 미사용 게시판 이므로 비밀글로 등록할 수 없습니다.');
}

$secret = '';
if (isset($_POST['secret']) && $_POST['secret']) {
    if(preg_match('#secret#', strtolower($_POST['secret']), $matches))
        $secret = $matches[0];
}

// 외부에서 글을 등록할 수 있는 버그가 존재하므로 비밀글 무조건 사용일때는 관리자를 제외(공지)하고 무조건 비밀글로 등록
if (!$is_admin && $board['bo_use_secret'] == 2) {
    $secret = 'secret';
}

$html = '';
if (isset($_POST['html']) && $_POST['html']) {
    if(preg_match('#html(1|2)#', strtolower($_POST['html']), $matches))
        $html = $matches[0];
}

$mail = '';
if (isset($_POST['mail']) && $_POST['mail']) {
    if(preg_match('#mail#', strtolower($_POST['mail']), $matches))
        $mail = $matches[0];
}

$notice = '';
if (isset($_POST['notice']) && $_POST['notice']) {
    $notice = $_POST['notice'];
}

if($bo_table=='guardians'){

for ($i=1; $i<=20; $i++) {
    $var = "wr_$i";
    $$var = "";
    if (isset($_POST['wr_'.$i]) && settype($_POST['wr_'.$i], 'string')) {
        $$var = trim($_POST['wr_'.$i]);
    }
}

}else{

for ($i=1; $i<=10; $i++) {
    $var = "wr_$i";
    $$var = "";
    if (isset($_POST['wr_'.$i]) && settype($_POST['wr_'.$i], 'string')) {
        $$var = trim($_POST['wr_'.$i]);
    }
}

}

if($bo_table=='genuine'){
		
	for ($j=1; $j<=20; $j++) {
		$varr = "input$j";
		$$varr = "";
		if (isset($_POST['input'.$j]) && settype($_POST['input'.$j], 'string')) {
			$$varr = trim($_POST['input'.$j]);
		}
	}

	for ($z=1; $z<=20; $z++) {
		$varrr = "inputtext$z";
		$$varrr = "";
		if (isset($_POST['inputtext'.$z]) && settype($_POST['inputtext'.$z], 'string')) {
			$$varrr = trim($_POST['inputtext'.$z]);
		}
	}

}


if($bo_table=='genuine'){
	
	
	
	
	if($w==''){
		
		
		$inputtext1 = strtoupper($inputtext1);
		
		
		
		
		$wr_1 = $input1.','.$input2.",".$input3.",".$input4.",".$input5.','.$input6.",".$input7.",".$input8.",".$input9.','.$input10.",".$input11.",".$input12.",".$input13.','.$input14.",".$input15.",".$input16.",".$input17.",".$input18.",".$input19.",".$input20;
		$wr_2 = $inputtext1.','.$inputtext2.",".$inputtext3.",".$inputtext4.",".$inputtext5.','.$inputtext6.",".$inputtext7.",".$inputtext8.",".$inputtext9.','.$inputtext10.",".$inputtext11.",".$inputtext12.",".$inputtext13.','.$inputtext14.",".$inputtext15.",".$inputtext16.",".$inputtext17.",".$inputtext18.",".$inputtext19.",".$inputtext20;
		
		
		
		
	}
}

if($bo_table == 'genuine'){
	//$history = sql_fetch(" select * from g5_write_genuine where mb_id = '{$member['mb_id']}' ");	//이미 등록한적이있냐?
	//$history = sql_fetch(" select * from genuine_list where mb_id = '{$member['mb_id']}' ");	//이미 등록한적이있냐?

	//if($history['wr_2']){		//기존에 시리얼넘버 등록했던적이 한번이라도 있다면,
		//$w = 'u';
		//시리얼넘버 정품등록조회 및 회원상태변경, 적립금 부여
		//include_once ('./genuine_update2.php');
		
	//}else{		//최초라면
		//시리얼넘버 정품등록조회 및 회원상태변경, 적립금 부여
		//include_once ('./genuine_update.php');
	//}
	include_once ('./genuine_update.php');
}

if($bo_table == 'guardians'){

	$wr_1 = "$option1[0]|$option1[1]|$option1[2]|$option1[3]|$option1[4]"; // 옵션1
	$wr_1 = explode('|',$wr_1);
	$wr_1 = array_values(array_filter($wr_1));
	$wr_1 = implode( '|', $wr_1);

	//sql_query(" update $write_table set wr_1 = '$wr_1 where wr_id = '$wr_id' ");
	if($is_member){
		$id = $member['mb_id'];
		$sql = "select * from g5_write_guardians where mb_id = '$id' and wr_1 = '$wr_1'";
		$row = sql_fetch($sql);
		if($row){
			alert('이미 해당 강연을 신청한 이력이 있습니다');
		}
	}
	$sql = " select * from g5_board where bo_table = 'guardians_adm' ";
	$result = sql_query($sql);
	$total = sql_num_rows($result);
	$row = sql_fetch_array($result);

	$date1 = ($option1[0] == $row['bo_1_subj']) ? $row['bo_1'] : $date1;
	$date2 = ($option1[1] == $row['bo_2_subj']) ? $row['bo_2'] : $date2;
	$date3 = ($option1[2] == $row['bo_3_subj']) ? $row['bo_3'] : $date3;
	$date4 = ($option1[3] == $row['bo_4_subj']) ? $row['bo_4'] : $date4;
	$date5 = ($option1[4] == $row['bo_5_subj']) ? $row['bo_5'] : $date5;
	$wr_7 = $date1."|".$date2."|".$date3."|".$date4."|".$date5;
	$wr_7 = explode('|',$wr_7);
	$wr_7 = array_values(array_filter($wr_7));
	$wr_7 = implode( '|', $wr_7);

	$teacher1 = ($option1[0] == $row['bo_1_subj']) ? $row['bo_1_2'] : $teacher1;
	$teacher2 = ($option1[1] == $row['bo_2_subj']) ? $row['bo_2_2'] : $teacher2;
	$teacher3 = ($option1[2] == $row['bo_3_subj']) ? $row['bo_3_2'] : $teacher3;
	$teacher4 = ($option1[3] == $row['bo_4_subj']) ? $row['bo_4_2'] : $teacher4;
	$teacher5 = ($option1[4] == $row['bo_5_subj']) ? $row['bo_5_2'] : $teacher5;
	$wr_8 = $teacher1."|".$teacher2."|".$teacher3."|".$teacher4."|".$teacher5;
	$wr_8 = explode('|',$wr_8);
	$wr_8 = array_values(array_filter($wr_8));
	$wr_8 = implode( '|', $wr_8);

	$adr1 = ($option1[0] == $row['bo_1_subj']) ? $row['bo_1_3'] : $adr1;
	$adr2 = ($option1[1] == $row['bo_2_subj']) ? $row['bo_2_3'] : $adr2;
	$adr3 = ($option1[2] == $row['bo_3_subj']) ? $row['bo_3_3'] : $adr3;
	$adr4 = ($option1[3] == $row['bo_4_subj']) ? $row['bo_4_3'] : $adr4;
	$adr5 = ($option1[4] == $row['bo_5_subj']) ? $row['bo_5_3'] : $adr5;
	$wr_9 = $adr1."|".$adr2."|".$adr3."|".$adr4."|".$adr5;
	$wr_9 = explode('|',$wr_9);
	$wr_9 = array_values(array_filter($wr_9));
	$wr_9 = implode( '|', $wr_9);
}


@include_once($board_skin_path.'/write_update.head.skin.php');

run_event('write_update_before', $board, $wr_id, $w, $qstr);

if ($w == '' || $w == 'u') {

    // 외부에서 글을 등록할 수 있는 버그가 존재하므로 공지는 관리자만 등록이 가능해야 함
    if (!$is_admin && $notice) {
        alert('관리자만 공지할 수 있습니다.');
    }

    //회원 자신이 쓴글을 수정할 경우 공지가 풀리는 경우가 있음 
    if($w =='u' && !$is_admin && $board['bo_notice'] && in_array($wr['wr_id'], $notice_array)){
        $notice = 1;
    }

    // 김선용 1.00 : 글쓰기 권한과 수정은 별도로 처리되어야 함
    if($w =='u' && $member['mb_id'] && $wr['mb_id'] === $member['mb_id']) {
        ;
    } else if ($member['mb_level'] < $board['bo_write_level']) {
        alert('글을 쓸 권한이 없습니다.');
    }

} else if ($w == 'r') {

    if (in_array((int)$wr_id, $notice_array)) {
        alert('공지에는 답변 할 수 없습니다.');
    }

    if ($member['mb_level'] < $board['bo_reply_level']) {
        alert('글을 답변할 권한이 없습니다.');
    }

    // 게시글 배열 참조
    $reply_array = &$wr;

    // 최대 답변은 테이블에 잡아놓은 wr_reply 사이즈만큼만 가능합니다.
    if (strlen($reply_array['wr_reply']) == 10) {
        alert("더 이상 답변하실 수 없습니다.\\n답변은 10단계 까지만 가능합니다.");
    }

    $reply_len = strlen($reply_array['wr_reply']) + 1;
    if ($board['bo_reply_order']) {
        $begin_reply_char = 'A';
        $end_reply_char = 'Z';
        $reply_number = +1;
        $sql = " select MAX(SUBSTRING(wr_reply, $reply_len, 1)) as reply from {$write_table} where wr_num = '{$reply_array['wr_num']}' and SUBSTRING(wr_reply, {$reply_len}, 1) <> '' ";
    } else {
        $begin_reply_char = 'Z';
        $end_reply_char = 'A';
        $reply_number = -1;
        $sql = " select MIN(SUBSTRING(wr_reply, {$reply_len}, 1)) as reply from {$write_table} where wr_num = '{$reply_array['wr_num']}' and SUBSTRING(wr_reply, {$reply_len}, 1) <> '' ";
    }
    if ($reply_array['wr_reply']) $sql .= " and wr_reply like '{$reply_array['wr_reply']}%' ";
    $row = sql_fetch($sql);

    if (!$row['reply']) {
        $reply_char = $begin_reply_char;
    } else if ($row['reply'] == $end_reply_char) { // A~Z은 26 입니다.
        alert("더 이상 답변하실 수 없습니다.\\n답변은 26개 까지만 가능합니다.");
    } else {
        $reply_char = chr(ord($row['reply']) + $reply_number);
    }

    $reply = $reply_array['wr_reply'] . $reply_char;

} else {
    alert('w 값이 제대로 넘어오지 않았습니다.');
}

$is_use_captcha = ((($board['bo_use_captcha'] && $w !== 'u') || $is_guest) && !$is_admin) ? 1 : 0;

if($bo_table == 'genuine'){}else{
	

	if ($is_use_captcha && !chk_captcha() && $wr_10 != 1) {
		alert('자동등록방지 숫자가 틀렸습니다.');
	}
}

if ($w == '' || $w == 'r') {
    if (isset($_SESSION['ss_datetime'])) {
        if ($_SESSION['ss_datetime'] >= (G5_SERVER_TIME - $config['cf_delay_sec']) && !$is_admin)
            alert('너무 빠른 시간내에 게시물을 연속해서 올릴 수 없습니다.');
    }

    set_session("ss_datetime", G5_SERVER_TIME);
}

if($bo_table == 'genuine'){}else{
		
	if (!isset($_POST['wr_subject']) || !trim($_POST['wr_subject']))
		alert('제목을 입력하여 주십시오.');
		
	}
$wr_seo_title = exist_seo_title_recursive('bbs', generate_seo_title($wr_subject), $write_table, $wr_id);

$options = array($html,$secret,$mail);
$wr_option = implode(',', array_filter(array_map('trim', $options)));


if ($w == '' || $w == 'r') {

    if ($member['mb_id']) {
        $mb_id = $member['mb_id'];
        $wr_name = addslashes(clean_xss_tags($board['bo_use_name'] ? $member['mb_name'] : $member['mb_nick']));
        $wr_password = '';
        $wr_email = addslashes($member['mb_email']);
        $wr_homepage = addslashes(clean_xss_tags($member['mb_homepage']));
    } else {
        $mb_id = '';
        // 비회원의 경우 이름이 누락되는 경우가 있음
        $wr_name = clean_xss_tags(trim($_POST['wr_name']));
        if (!$wr_name)
            alert('이름은 필히 입력하셔야 합니다.');
        $wr_password = get_encrypt_string($wr_password);
        $wr_email = get_email_address(trim($_POST['wr_email']));
        $wr_homepage = clean_xss_tags($wr_homepage);
    }

    if ($w == 'r') {
        // 답변의 원글이 비밀글이라면 비밀번호는 원글과 동일하게 넣는다.
        if ($secret)
            $wr_password = $wr['wr_password'];

        $wr_id = $wr_id . $reply;
        $wr_num = $write['wr_num'];
        $wr_reply = $reply;
    } else {
        $wr_num = get_next_num($write_table);
        $wr_reply = '';
    }

/*
	if($bo_table=='genuine'){
		//시리얼넘버 정품등록조회 및 회원상태변경, 적립금 부여
		include_once ('./genuine_update.php');
		
	}
*/

    $sql = " insert into $write_table
                set wr_num = '$wr_num',
                     wr_reply = '$wr_reply',
                     wr_comment = 0,
                     ca_name = '$ca_name',
                     wr_option = '$wr_option',
                     wr_subject = '$wr_subject',
                     wr_content = '$wr_content',
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

	if($bo_table == 'guardians'){
	    $sql = " insert into $write_table
                set wr_num = '$wr_num',
                     wr_reply = '$wr_reply',
                     wr_comment = 0,
                     ca_name = '$ca_name',
                     wr_option = '$wr_option',
                     wr_subject = '$wr_subject',
                     wr_content = '$wr_content',
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
                     wr_10 = '$wr_10',
                     wr_11 = '$wr_11',
					 wr_12 = '$wr_12',
                     wr_13 = '$wr_13',
                     wr_14 = '$wr_14',
                     wr_15 = '$wr_15',
                     wr_16 = '$wr_16',
                     wr_17 = '$wr_17',
                     wr_18 = '$wr_18',
                     wr_19 = '$wr_19',
					 wr_20 = '$wr_20' ";
	}
	

	

    sql_query($sql);

    $wr_id = sql_insert_id();

    // 부모 아이디에 UPDATE
    sql_query(" update $write_table set wr_parent = '$wr_id' where wr_id = '$wr_id' ");

    // 새글 INSERT
    sql_query(" insert into {$g5['board_new_table']} ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) values ( '{$bo_table}', '{$wr_id}', '{$wr_id}', '".G5_TIME_YMDHIS."', '{$member['mb_id']}' ) ");

    // 게시글 1 증가
    sql_query("update {$g5['board_table']} set bo_count_write = bo_count_write + 1 where bo_table = '{$bo_table}'");

    // 쓰기 포인트 부여
    if ($w == '') {
        if ($notice) {
            $bo_notice = $wr_id.($board['bo_notice'] ? ",".$board['bo_notice'] : '');
            sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
        }

        insert_point($member['mb_id'], $board['bo_write_point'], "{$board['bo_subject']} {$wr_id} 글쓰기", $bo_table, $wr_id, '쓰기');
    } else {
        // 답변은 코멘트 포인트를 부여함
        // 답변 포인트가 많은 경우 코멘트 대신 답변을 하는 경우가 많음
        insert_point($member['mb_id'], $board['bo_comment_point'], "{$board['bo_subject']} {$wr_id} 글답변", $bo_table, $wr_id, '쓰기');
    }
	
	

}  else if ($w == 'u') {
    if (get_session('ss_bo_table') != $_POST['bo_table'] || get_session('ss_wr_id') != $_POST['wr_id']) {
        alert('올바른 방법으로 수정하여 주십시오.', get_pretty_url($bo_table));
    }

    $return_url = get_pretty_url($bo_table, $wr_id);

    if ($is_admin == 'super') // 최고관리자 통과
        ;
    else if ($is_admin == 'group') { // 그룹관리자
        $mb = get_member($write['mb_id']);
        if ($member['mb_id'] != $group['gr_admin']) // 자신이 관리하는 그룹인가?
            alert('자신이 관리하는 그룹의 게시판이 아니므로 수정할 수 없습니다.', $return_url);
        else if ($member['mb_level'] < $mb['mb_level']) // 자신의 레벨이 크거나 같다면 통과
            alert('자신의 권한보다 높은 권한의 회원이 작성한 글은 수정할 수 없습니다.', $return_url);
    } else if ($is_admin == 'board') { // 게시판관리자이면
        $mb = get_member($write['mb_id']);
        if ($member['mb_id'] != $board['bo_admin']) // 자신이 관리하는 게시판인가?
            alert('자신이 관리하는 게시판이 아니므로 수정할 수 없습니다.', $return_url);
        else if ($member['mb_level'] < $mb['mb_level']) // 자신의 레벨이 크거나 같다면 통과
            alert('자신의 권한보다 높은 권한의 회원이 작성한 글은 수정할 수 없습니다.', $return_url);
    } else if ($member['mb_id']) {
        if ($member['mb_id'] != $write['mb_id'])
            alert('자신의 글이 아니므로 수정할 수 없습니다.', $return_url);
    } else {
        if ($write['mb_id'])
            alert('로그인 후 수정하세요.', G5_BBS_URL.'/login.php?url='.urlencode($return_url));
    }

    if ($member['mb_id']) {
        // 자신의 글이라면
        if ($member['mb_id'] === $wr['mb_id']) {
            $mb_id = $member['mb_id'];
            $wr_name = addslashes(clean_xss_tags($board['bo_use_name'] ? $member['mb_name'] : $member['mb_nick']));
            $wr_email = addslashes($member['mb_email']);
            $wr_homepage = addslashes(clean_xss_tags($member['mb_homepage']));
        } else {
            $mb_id = $wr['mb_id'];
            if(isset($_POST['wr_name']) && $_POST['wr_name'])
                $wr_name = clean_xss_tags(trim($_POST['wr_name']));
            else
                $wr_name = addslashes(clean_xss_tags($wr['wr_name']));
            if(isset($_POST['wr_email']) && $_POST['wr_email'])
                $wr_email = get_email_address(trim($_POST['wr_email']));
            else
                $wr_email = addslashes($wr['wr_email']);
            if(isset($_POST['wr_homepage']) && $_POST['wr_homepage'])
                $wr_homepage = addslashes(clean_xss_tags($_POST['wr_homepage']));
            else
                $wr_homepage = addslashes(clean_xss_tags($wr['wr_homepage']));
        }
    } else {
        $mb_id = "";
        // 비회원의 경우 이름이 누락되는 경우가 있음
        if (!trim($wr_name)) alert("이름은 필히 입력하셔야 합니다.");
        $wr_name = clean_xss_tags(trim($_POST['wr_name']));
        $wr_email = get_email_address(trim($_POST['wr_email']));
    }

    $sql_password = $wr_password ? " , wr_password = '".get_encrypt_string($wr_password)."' " : "";

    $sql_ip = '';
    if (!$is_admin)
        $sql_ip = " , wr_ip = '{$_SERVER['REMOTE_ADDR']}' ";

    $sql = " update {$write_table}
                set ca_name = '{$ca_name}',
                     wr_option = '{$wr_option}',
                     wr_subject = '{$wr_subject}',
                     wr_content = '{$wr_content}',
                     wr_seo_title = '$wr_seo_title',
                     wr_link1 = '{$wr_link1}',
                     wr_link2 = '{$wr_link2}',
                     mb_id = '{$mb_id}',
                     wr_name = '{$wr_name}',
                     wr_email = '{$wr_email}',
                     wr_homepage = '{$wr_homepage}',
                     wr_1 = '{$wr_1}',
                     wr_2 = '{$wr_2}',
                     wr_3 = '{$wr_3}',
                     wr_4 = '{$wr_4}',
                     wr_5 = '{$wr_5}',
                     wr_6 = '{$wr_6}',
                     wr_7 = '{$wr_7}',
                     wr_8 = '{$wr_8}',
                     wr_9 = '{$wr_9}',
                     wr_10= '{$wr_10}'
                     {$sql_ip}
                     {$sql_password}
              where wr_id = '{$wr['wr_id']}' ";
    sql_query($sql);

    // 분류가 수정되는 경우 해당되는 코멘트의 분류명도 모두 수정함
    // 코멘트의 분류를 수정하지 않으면 검색이 제대로 되지 않음
    $sql = " update {$write_table} set ca_name = '{$ca_name}' where wr_parent = '{$wr['wr_id']}' ";
    sql_query($sql);

    /*
    if ($notice) {
        //if (!preg_match("/[^0-9]{0,1}{$wr_id}[\r]{0,1}/",$board['bo_notice']))
        if (!in_array((int)$wr_id, $notice_array)) {
            $bo_notice = $wr_id . ',' . $board['bo_notice'];
            sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
        }
    } else {
        $bo_notice = '';
        for ($i=0; $i<count($notice_array); $i++)
            if ((int)$wr_id != (int)$notice_array[$i])
                $bo_notice .= $notice_array[$i] . ',';
        $bo_notice = trim($bo_notice);
        //$bo_notice = preg_replace("/^".$wr_id."[\n]?$/m", "", $board['bo_notice']);
        sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
    }
    */

    $bo_notice = board_notice($board['bo_notice'], $wr_id, $notice);
    sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");

    // 글을 수정한 경우에는 제목이 달라질수도 있으니 static variable 를 새로고침합니다.
    $write = get_write( $write_table, $wr['wr_id'], false);
}

// 게시판그룹접근사용을 하지 않아야 하고 비회원 글읽기가 가능해야 하며 비밀글이 아니어야 합니다.
if (!$group['gr_use_access'] && $board['bo_read_level'] < 2 && !$secret) {
    naver_syndi_ping($bo_table, $wr_id);
}

// 파일개수 체크
$file_count   = 0;
$upload_count = (isset($_FILES['bf_file']['name']) && is_array($_FILES['bf_file']['name'])) ? count($_FILES['bf_file']['name']) : 0;

for ($i=0; $i<$upload_count; $i++) {
    if($_FILES['bf_file']['name'][$i] && is_uploaded_file($_FILES['bf_file']['tmp_name'][$i]))
        $file_count++;
}

if($w == 'u') {
    $file = get_file($bo_table, $wr_id);
    if($file_count && (int)$file['count'] > $board['bo_upload_count'])
        alert('기존 파일을 삭제하신 후 첨부파일을 '.number_format($board['bo_upload_count']).'개 이하로 업로드 해주십시오.');
} else {
    if($file_count > $board['bo_upload_count'])
        alert('첨부파일을 '.number_format($board['bo_upload_count']).'개 이하로 업로드 해주십시오.');
}

// 디렉토리가 없다면 생성합니다. (퍼미션도 변경하구요.)
@mkdir(G5_DATA_PATH.'/file/'.$bo_table, G5_DIR_PERMISSION);
@chmod(G5_DATA_PATH.'/file/'.$bo_table, G5_DIR_PERMISSION);

$chars_array = array_merge(range(0,9), range('a','z'), range('A','Z'));

// 가변 파일 업로드
$file_upload_msg = '';
$upload = array();

if(isset($_FILES['bf_file']['name']) && is_array($_FILES['bf_file']['name'])) {
    for ($i=0; $i<count($_FILES['bf_file']['name']); $i++) {
        $upload[$i]['file']     = '';
        $upload[$i]['source']   = '';
        $upload[$i]['filesize'] = 0;
        $upload[$i]['image']    = array();
        $upload[$i]['image'][0] = 0;
        $upload[$i]['image'][1] = 0;
        $upload[$i]['image'][2] = 0;
        $upload[$i]['fileurl'] = '';
        $upload[$i]['thumburl'] = '';
        $upload[$i]['storage'] = '';

        // 삭제에 체크가 되어있다면 파일을 삭제합니다.
        if (isset($_POST['bf_file_del'][$i]) && $_POST['bf_file_del'][$i]) {
            $upload[$i]['del_check'] = true;

            $row = sql_fetch(" select * from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and bf_no = '{$i}' ");

            $delete_file = run_replace('delete_file_path', G5_DATA_PATH.'/file/'.$bo_table.'/'.str_replace('../', '', $row['bf_file']), $row);
            if( file_exists($delete_file) ){
                @unlink($delete_file);
            }
            // 썸네일삭제
            if(preg_match("/\.({$config['cf_image_extension']})$/i", $row['bf_file'])) {
                delete_board_thumbnail($bo_table, $row['bf_file']);
            }
        }
        else
            $upload[$i]['del_check'] = false;

        $tmp_file  = $_FILES['bf_file']['tmp_name'][$i];
        $filesize  = $_FILES['bf_file']['size'][$i];
        $filename  = $_FILES['bf_file']['name'][$i];
        $filename  = get_safe_filename($filename);

        // 서버에 설정된 값보다 큰파일을 업로드 한다면
        if ($filename) {
            if ($_FILES['bf_file']['error'][$i] == 1) {
                $file_upload_msg .= '\"'.$filename.'\" 파일의 용량이 서버에 설정('.$upload_max_filesize.')된 값보다 크므로 업로드 할 수 없습니다.\\n';
                continue;
            }
            else if ($_FILES['bf_file']['error'][$i] != 0) {
                $file_upload_msg .= '\"'.$filename.'\" 파일이 정상적으로 업로드 되지 않았습니다.\\n';
                continue;
            }
        }

        if (is_uploaded_file($tmp_file)) {
            // 관리자가 아니면서 설정한 업로드 사이즈보다 크다면 건너뜀
            if (!$is_admin && $filesize > $board['bo_upload_size']) {
                $file_upload_msg .= '\"'.$filename.'\" 파일의 용량('.number_format($filesize).' 바이트)이 게시판에 설정('.number_format($board['bo_upload_size']).' 바이트)된 값보다 크므로 업로드 하지 않습니다.\\n';
                continue;
            }

            //=================================================================\
            // 090714
            // 이미지나 플래시 파일에 악성코드를 심어 업로드 하는 경우를 방지
            // 에러메세지는 출력하지 않는다.
            //-----------------------------------------------------------------
            $timg = @getimagesize($tmp_file);
            // image type
            if ( preg_match("/\.({$config['cf_image_extension']})$/i", $filename) ||
                 preg_match("/\.({$config['cf_flash_extension']})$/i", $filename) ) {
                if ($timg['2'] < 1 || $timg['2'] > 18)
                    continue;
            }
            //=================================================================

            $upload[$i]['image'] = $timg;

            // 4.00.11 - 글답변에서 파일 업로드시 원글의 파일이 삭제되는 오류를 수정
            if ($w == 'u') {
                // 존재하는 파일이 있다면 삭제합니다.
                $row = sql_fetch(" select * from {$g5['board_file_table']} where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '$i' ");
                
                if(isset($row['bf_file']) && $row['bf_file']){
                    $delete_file = run_replace('delete_file_path', G5_DATA_PATH.'/file/'.$bo_table.'/'.str_replace('../', '', $row['bf_file']), $row);
                    if( file_exists($delete_file) ){
                        @unlink(G5_DATA_PATH.'/file/'.$bo_table.'/'.$row['bf_file']);
                    }
                    // 이미지파일이면 썸네일삭제
                    if(preg_match("/\.({$config['cf_image_extension']})$/i", $row['bf_file'])) {
                        delete_board_thumbnail($bo_table, $row['bf_file']);
                    }
                }
            }

            // 프로그램 원래 파일명
            $upload[$i]['source'] = $filename;
            $upload[$i]['filesize'] = $filesize;

            // 아래의 문자열이 들어간 파일은 -x 를 붙여서 웹경로를 알더라도 실행을 하지 못하도록 함
            $filename = preg_replace("/\.(php|pht|phtm|htm|cgi|pl|exe|jsp|asp|inc|phar)/i", "$0-x", $filename);

            shuffle($chars_array);
            $shuffle = implode('', $chars_array);

            // 첨부파일 첨부시 첨부파일명에 공백이 포함되어 있으면 일부 PC에서 보이지 않거나 다운로드 되지 않는 현상이 있습니다. (길상여의 님 090925)
            $upload[$i]['file'] = md5(sha1($_SERVER['REMOTE_ADDR'])).'_'.substr($shuffle,0,8).'_'.replace_filename($filename);

            $dest_file = G5_DATA_PATH.'/file/'.$bo_table.'/'.$upload[$i]['file'];

            // 업로드가 안된다면 에러메세지 출력하고 죽어버립니다.
            $error_code = move_uploaded_file($tmp_file, $dest_file) or die($_FILES['bf_file']['error'][$i]);

            // 올라간 파일의 퍼미션을 변경합니다.
            chmod($dest_file, G5_FILE_PERMISSION);

            $dest_file = run_replace('write_update_upload_file', $dest_file, $board, $wr_id, $w);
            $upload[$i] = run_replace('write_update_upload_array', $upload[$i], $dest_file, $board, $wr_id, $w);
        }
    }   // end for
}   // end if

// 나중에 테이블에 저장하는 이유는 $wr_id 값을 저장해야 하기 때문입니다.
for ($i=0; $i<count($upload); $i++)
{
    $upload[$i]['source'] = sql_real_escape_string($upload[$i]['source']);
    $bf_content[$i] = isset($bf_content[$i]) ? sql_real_escape_string($bf_content[$i]) : '';
    $bf_width = isset($upload[$i]['image'][0]) ? (int) $upload[$i]['image'][0] : 0;
    $bf_height = isset($upload[$i]['image'][1]) ? (int) $upload[$i]['image'][1] : 0;
    $bf_type = isset($upload[$i]['image'][2]) ? (int) $upload[$i]['image'][2] : 0;

    $row = sql_fetch(" select count(*) as cnt from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and bf_no = '{$i}' ");
    if ($row['cnt'])
    {
        // 삭제에 체크가 있거나 파일이 있다면 업데이트를 합니다.
        // 그렇지 않다면 내용만 업데이트 합니다.
        if ($upload[$i]['del_check'] || $upload[$i]['file'])
        {
            $sql = " update {$g5['board_file_table']}
                        set bf_source = '{$upload[$i]['source']}',
                             bf_file = '{$upload[$i]['file']}',
                             bf_content = '{$bf_content[$i]}',
                             bf_fileurl = '{$upload[$i]['fileurl']}',
                             bf_thumburl = '{$upload[$i]['thumburl']}',
                             bf_storage = '{$upload[$i]['storage']}',
                             bf_filesize = '".(int)$upload[$i]['filesize']."',
                             bf_width = '".$bf_width."',
                             bf_height = '".$bf_height."',
                             bf_type = '".$bf_type."',
                             bf_datetime = '".G5_TIME_YMDHIS."'
                      where bo_table = '{$bo_table}'
                                and wr_id = '{$wr_id}'
                                and bf_no = '{$i}' ";
            sql_query($sql);
        }
        else
        {
            $sql = " update {$g5['board_file_table']}
                        set bf_content = '{$bf_content[$i]}'
                        where bo_table = '{$bo_table}'
                                  and wr_id = '{$wr_id}'
                                  and bf_no = '{$i}' ";
            sql_query($sql);
        }
    }
    else
    {
        $sql = " insert into {$g5['board_file_table']}
                    set bo_table = '{$bo_table}',
                         wr_id = '{$wr_id}',
                         bf_no = '{$i}',
                         bf_source = '{$upload[$i]['source']}',
                         bf_file = '{$upload[$i]['file']}',
                         bf_content = '{$bf_content[$i]}',
                         bf_fileurl = '{$upload[$i]['fileurl']}',
                         bf_thumburl = '{$upload[$i]['thumburl']}',
                         bf_storage = '{$upload[$i]['storage']}',
                         bf_download = 0,
                         bf_filesize = '".(int)$upload[$i]['filesize']."',
                         bf_width = '".$bf_width."',
                         bf_height = '".$bf_height."',
                         bf_type = '".$bf_type."',
                         bf_datetime = '".G5_TIME_YMDHIS."' ";
        sql_query($sql);

        run_event('write_update_file_insert', $bo_table, $wr_id, $upload[$i], $w);
    }
}

// 업로드된 파일 내용에서 가장 큰 번호를 얻어 거꾸로 확인해 가면서
// 파일 정보가 없다면 테이블의 내용을 삭제합니다.
$row = sql_fetch(" select max(bf_no) as max_bf_no from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ");
for ($i=(int)$row['max_bf_no']; $i>=0; $i--)
{
    $row2 = sql_fetch(" select bf_file from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and bf_no = '{$i}' ");

    // 정보가 있다면 빠집니다.
    if (isset($row2['bf_file']) && $row2['bf_file']) break;

    // 그렇지 않다면 정보를 삭제합니다.
    sql_query(" delete from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and bf_no = '{$i}' ");
}

// 파일의 개수를 게시물에 업데이트 한다.
$row = sql_fetch(" select count(*) as cnt from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ");
sql_query(" update {$write_table} set wr_file = '{$row['cnt']}' where wr_id = '{$wr_id}' ");

// 자동저장된 레코드를 삭제한다.
sql_query(" delete from {$g5['autosave_table']} where as_uid = '{$uid}' ");
//------------------------------------------------------------------------------

// 비밀글이라면 세션에 비밀글의 아이디를 저장한다. 자신의 글은 다시 비밀번호를 묻지 않기 위함
if ($secret)
    set_session("ss_secret_{$bo_table}_{$wr_num}", TRUE);

// 메일발송 사용 (수정글은 발송하지 않음)
if (!($w == 'u' || $w == 'cu') && $config['cf_email_use'] && $board['bo_use_email']) {

    // 관리자의 정보를 얻고
    $super_admin = get_admin('super');
    $group_admin = get_admin('group');
    $board_admin = get_admin('board');

    $wr_subject = get_text(stripslashes($wr_subject));

    $tmp_html = 0;
    if (strstr($html, 'html1'))
        $tmp_html = 1;
    else if (strstr($html, 'html2'))
        $tmp_html = 2;

    $wr_content = conv_content(conv_unescape_nl(stripslashes($wr_content)), $tmp_html);

    $warr = array( ''=>'입력', 'u'=>'수정', 'r'=>'답변', 'c'=>'코멘트', 'cu'=>'코멘트 수정' );
    $str = $warr[$w];

    $subject = '['.$config['cf_title'].'] '.$board['bo_subject'].' 게시판에 '.$str.'글이 올라왔습니다.';

    $link_url = get_pretty_url($bo_table, $wr_id, $qstr);

    include_once(G5_LIB_PATH.'/mailer.lib.php');

    ob_start();
    include_once ('./write_update_mail.php');
    $content = ob_get_contents();
    ob_end_clean();

    $array_email = array();
    // 게시판관리자에게 보내는 메일
    if ($config['cf_email_wr_board_admin']) $array_email[] = $board_admin['mb_email'];
    // 게시판그룹관리자에게 보내는 메일
    if ($config['cf_email_wr_group_admin']) $array_email[] = $group_admin['mb_email'];
    // 최고관리자에게 보내는 메일
    if ($config['cf_email_wr_super_admin']) $array_email[] = $super_admin['mb_email'];

    // 원글게시자에게 보내는 메일
    if ($config['cf_email_wr_write']) {
        if($w == '')
            $wr['wr_email'] = $wr_email;

        $array_email[] = $wr['wr_email'];
    }

    // 옵션에 메일받기가 체크되어 있고, 게시자의 메일이 있다면
    if (isset($wr['wr_option']) && isset($wr['wr_email'])) {
        if (strstr($wr['wr_option'], 'mail') && $wr['wr_email'])
            $array_email[] = $wr['wr_email'];
    }

    // 중복된 메일 주소는 제거
    $unique_email = array_unique($array_email);
    $unique_email = run_replace('write_update_mail_list', array_values($unique_email), $board, $wr_id);

    for ($i=0; $i<count($unique_email); $i++) {
        mailer($wr_name, $wr_email, $unique_email[$i], $subject, $content, 1);
    }
}

if($bo_table == 'product_application') {
	$email_to = array();
	$mb_id = $member['mb_name'];

	$row = ['sales0201@ilooda.com', 'hahakangwon@ilooda.com'];
	//$row = ['moden7@naver.com', 'moden7@naver.com'];

	for ($i = 0; $i <= 10; $i++) { 
		if (isset($row[$i]) && $row[$i] !== '') {
			$email_to[$i] = $row[$i];
		}
	}
	
	$email_subject = $mb_id."님의 문의가 등록되었습니다.";   //   메일 제목
	$email_subject = '=?UTF-8?B?'.base64_encode($email_subject).'?=';

    function died($error) {
        // your error code can go here
        echo "<script> alert('글 작성이 실패하였습니다.');";
		echo "history.go(-1);";
		echo "</script>";
        die();
    }

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$/';

	if(!preg_match($email_exp,$wr_email)) {
		$error_message .= '이메일 형식에 맞지 않습니다.<br />';
	}

	if(strlen($error_message) > 0) {
		died($error_message);
	}
    $email_message = "";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	
	$tel = $member['mb_hp'];

    $email_message .= "이름 : ".clean_string($wr_name)."<br><br>";
    $email_message .= "이메일 : ".clean_string($wr_email)."<br><br>";
    $email_message .= "연락처 : ".clean_string($tel)."<br><br>";
    $email_message .= "문의종류 : ".clean_string($wr_1)."<br><br>";
    $email_message .= "요청메모 : ".clean_string($wr_content)."<br><br>";
	$email_message .= "문의 게시글 링크 : <a href='https://www.iloodamall.com/bbs/board.php?bo_table=product_application&wr_id=" . $wr_id . "'>문의 게시글 보기</a><br><br>";

	$headers = 'From: ' . $wr_email . "\r\n";
	$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";

	foreach ($email_to as $email) {
		@mail($email, $email_subject, $email_message, $headers);
	}

	// API 엔드포인트 및 요청 데이터 설정
	$api_url = "https://apis.aligo.in/send/";
	// 현재 날짜를 YYYYMMDD 형식으로 가져오기
	$currentDate = date("Ymd");
	// 현재 시간을 HHMM 형식으로 가져오기
	$currentTime = date("Hi");

	/****************** 인증정보 시작 ******************/
	$sms_url = "https://apis.aligo.in/send/"; // 전송요청 URL
	$sms['user_id'] = "boreumyeom"; // SMS 아이디
	$sms['key'] = "m370468sq29qmd7m80da2fd5z71trytr";//인증키
	/****************** 인증정보 끝 ********************/

	/****************** 전송정보 설정시작 ****************/
	$_POST['msg'] = '이루다몰 문의사항이 들어왔습니다'; // 메세지 내용 : euc-kr로 치환이 가능한 문자열만 사용하실 수 있습니다. (이모지 사용불가능)
	$_POST['receiver'] = '01029390902'; // 수신번호
	$_POST['destination'] = '01029390902|김강원담당자'; // 수신인 %고객명% 치환
	$_POST['sender'] ="0312784660"; // 발신번호
	$_POST['rdate'] = ''; // 예약일자 - 20161004 : 2016-10-04일기준
	$_POST['rtime'] = ''; // 예약시간 - 1930 : 오후 7시30분
	$_POST['testmode_yn'] = ''; // Y 인경우 실제문자 전송X , 자동취소(환불) 처리
	$_POST['subject'] = '이루다몰 문의사항이 들어왔습니다.'; //  LMS, MMS 제목 (미입력시 본문중 44Byte 또는 엔터 구분자 첫라인)
	// $_POST['image'] = '/tmp/pic_57f358af08cf7_sms_.jpg'; // MMS 이미지 파일 위치 (저장된 경로)
	$_POST['msg_type'] = 'SMS'; //  SMS, LMS, MMS등 메세지 타입을 지정
	// ※ msg_type 미지정시 글자수/그림유무가 판단되어 자동변환됩니다. 단, 개행문자/특수문자등이 2Byte로 처리되어 SMS 가 LMS로 처리될 가능성이 존재하므로 반드시 msg_type을 지정하여 사용하시기 바랍니다.
	/****************** 전송정보 설정끝 ***************/

	$sms['msg'] = stripslashes($_POST['msg']);
	$sms['receiver'] = $_POST['receiver'];
	$sms['destination'] = $_POST['destination'];
	$sms['sender'] = $_POST['sender'];
	$sms['rdate'] = $_POST['rdate'];
	$sms['rtime'] = $_POST['rtime'];
	$sms['testmode_yn'] = empty($_POST['testmode_yn']) ? '' : $_POST['testmode_yn'];
	$sms['title'] = $_POST['subject'];
	$sms['msg_type'] = $_POST['msg_type'];
	// 만일 $_FILES 로 직접 Request POST된 파일을 사용하시는 경우 move_uploaded_file 로 저장 후 저장된 경로를 사용하셔야 합니다.
	if(!empty($_FILES['image']['tmp_name'])) {
		$tmp_filetype = mime_content_type($_FILES['image']['tmp_name']); 
		if($tmp_filetype != 'image/png' && $tmp_filetype != 'image/jpg' && $tmp_filetype != 'image/jpeg') $_POST['image'] = '';
		else {
			$_savePath = "./".uniqid(); // PHP의 권한이 허용된 디렉토리를 지정
			if(move_uploaded_file($_FILES['file']['tmp_name'], $_savePath)) {
				$_POST['image'] = $_savePath;
			}
		}
	}
	// 이미지 전송 설정
	if(!empty($_POST['image'])) {
		if(file_exists($_POST['image'])) {
			$tmpFile = explode('/',$_POST['image']);
			$str_filename = $tmpFile[sizeof($tmpFile)-1];
			$tmp_filetype = mime_content_type($_POST['image']);
			if ((version_compare(PHP_VERSION, '5.5') >= 0)) { // PHP 5.5버전 이상부터 적용
				$sms['image'] = new CURLFile($_POST['image'], $tmp_filetype, $str_filename);
				curl_setopt($oCurl, CURLOPT_SAFE_UPLOAD, true);
			} else {
				$sms['image'] = '@'.$_POST['image'].';filename='.$str_filename. ';type='.$tmp_filetype;
			}
		}
	}
	/*****/
	$host_info = explode("/", $sms_url);
	$port = $host_info[0] == 'https:' ? 443 : 80;

	$oCurl = curl_init();
	curl_setopt($oCurl, CURLOPT_PORT, $port);
	curl_setopt($oCurl, CURLOPT_URL, $sms_url);
	curl_setopt($oCurl, CURLOPT_POST, 1);
	curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($oCurl, CURLOPT_POSTFIELDS, $sms);
	curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
	$ret = curl_exec($oCurl);
	curl_close($oCurl);

}

if($bo_table == 'as') {
	require_once G5_LIB_PATH . '/mailer.lib.php';
	$email_to = array();
	$mb_id = $member['mb_name'];

	$row = ['bklee@ilooda.com'];
	//$row = ['moden7@naver.com'];

	for ($i = 0; $i <= 10; $i++) { 
		if (isset($row[$i]) && $row[$i] !== '') {
			$email_to[$i] = $row[$i];
		}
	}
	
	$email_subject = $mb_id."님의 A/S 신청이 등록되었습니다.";   //   메일 제목
	$email_subject = '=?UTF-8?B?'.base64_encode($email_subject).'?=';

    function died($error) {
        // your error code can go here
        echo "<script> alert('글 작성이 실패하였습니다.');";
		echo "history.go(-1);";
		echo "</script>";
        die();
    }

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$/';

	if(!preg_match($email_exp,$wr_email)) {
		$error_message .= '이메일 형식에 맞지 않습니다.<br />';
	}

	if(strlen($error_message) > 0) {
		died($error_message);
	}
    $email_message = "";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	
	$tel = $member['mb_hp'];

    $email_message .= "이름 : ".clean_string($wr_name)."<br><br>";
    $email_message .= "이메일 : ".clean_string($wr_email)."<br><br>";
    $email_message .= "연락처 : ".clean_string($wr_2)."<br><br>";
    $email_message .= "제품종류 : ".clean_string($wr_1)."<br><br>";
    $email_message .= "내용 : ".clean_string($wr_content)."<br><br>";
	$email_message .= "A/S 게시글 링크 : <a href='https://www.iloodamall.com/bbs/board.php?bo_table=as&wr_id=" . $wr_id . "'>A/S 게시글 보기</a><br><br>";

	$headers = 'From: ' . $wr_email . "\r\n";
	$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";

	foreach ($email_to as $email) {
		@mail($email, $email_subject, $email_message, $headers);
		//mailer($config['cf_title'], $email, $email, $email_subject, $email_message, 1);
	}

	/****************** 인증정보 시작 ******************/
	$sms_url = "https://apis.aligo.in/send/"; // 전송요청 URL
	$sms['user_id'] = "boreumyeom"; // SMS 아이디
	$sms['key'] = "m370468sq29qmd7m80da2fd5z71trytr";//인증키
	/****************** 인증정보 끝 ********************/

	/****************** 전송정보 설정시작 ****************/
	$_POST['msg'] = '이루다몰 A/S 신청이 들어왔습니다'; // 메세지 내용 : euc-kr로 치환이 가능한 문자열만 사용하실 수 있습니다. (이모지 사용불가능)
	$_POST['receiver'] = '01023238889'; // 수신번호
	$_POST['destination'] = '01023238889|이병규담당자'; // 수신인 %고객명% 치환
	$_POST['sender'] ="0312784660"; // 발신번호
	$_POST['rdate'] = ''; // 예약일자 - 20161004 : 2016-10-04일기준
	$_POST['rtime'] = ''; // 예약시간 - 1930 : 오후 7시30분
	$_POST['testmode_yn'] = ''; // Y 인경우 실제문자 전송X , 자동취소(환불) 처리
	$_POST['subject'] = '이루다몰 문의사항이 들어왔습니다.'; //  LMS, MMS 제목 (미입력시 본문중 44Byte 또는 엔터 구분자 첫라인)
	// $_POST['image'] = '/tmp/pic_57f358af08cf7_sms_.jpg'; // MMS 이미지 파일 위치 (저장된 경로)
	$_POST['msg_type'] = 'SMS'; //  SMS, LMS, MMS등 메세지 타입을 지정
	// ※ msg_type 미지정시 글자수/그림유무가 판단되어 자동변환됩니다. 단, 개행문자/특수문자등이 2Byte로 처리되어 SMS 가 LMS로 처리될 가능성이 존재하므로 반드시 msg_type을 지정하여 사용하시기 바랍니다.
	/****************** 전송정보 설정끝 ***************/

	$sms['msg'] = stripslashes($_POST['msg']);
	$sms['receiver'] = $_POST['receiver'];
	$sms['destination'] = $_POST['destination'];
	$sms['sender'] = $_POST['sender'];
	$sms['rdate'] = $_POST['rdate'];
	$sms['rtime'] = $_POST['rtime'];
	$sms['testmode_yn'] = empty($_POST['testmode_yn']) ? '' : $_POST['testmode_yn'];
	$sms['title'] = $_POST['subject'];
	$sms['msg_type'] = $_POST['msg_type'];
	// 만일 $_FILES 로 직접 Request POST된 파일을 사용하시는 경우 move_uploaded_file 로 저장 후 저장된 경로를 사용하셔야 합니다.
	if(!empty($_FILES['image']['tmp_name'])) {
		$tmp_filetype = mime_content_type($_FILES['image']['tmp_name']); 
		if($tmp_filetype != 'image/png' && $tmp_filetype != 'image/jpg' && $tmp_filetype != 'image/jpeg') $_POST['image'] = '';
		else {
			$_savePath = "./".uniqid(); // PHP의 권한이 허용된 디렉토리를 지정
			if(move_uploaded_file($_FILES['file']['tmp_name'], $_savePath)) {
				$_POST['image'] = $_savePath;
			}
		}
	}
	// 이미지 전송 설정
	if(!empty($_POST['image'])) {
		if(file_exists($_POST['image'])) {
			$tmpFile = explode('/',$_POST['image']);
			$str_filename = $tmpFile[sizeof($tmpFile)-1];
			$tmp_filetype = mime_content_type($_POST['image']);
			if ((version_compare(PHP_VERSION, '5.5') >= 0)) { // PHP 5.5버전 이상부터 적용
				$sms['image'] = new CURLFile($_POST['image'], $tmp_filetype, $str_filename);
				curl_setopt($oCurl, CURLOPT_SAFE_UPLOAD, true);
			} else {
				$sms['image'] = '@'.$_POST['image'].';filename='.$str_filename. ';type='.$tmp_filetype;
			}
		}
	}
	/*****/
	$host_info = explode("/", $sms_url);
	$port = $host_info[0] == 'https:' ? 443 : 80;

	$oCurl = curl_init();
	curl_setopt($oCurl, CURLOPT_PORT, $port);
	curl_setopt($oCurl, CURLOPT_URL, $sms_url);
	curl_setopt($oCurl, CURLOPT_POST, 1);
	curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($oCurl, CURLOPT_POSTFIELDS, $sms);
	curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
	$ret = curl_exec($oCurl);
	curl_close($oCurl);
}

// inquiry
if($bo_table == 'inquiry') {
	require_once G5_LIB_PATH . '/mailer.lib.php';
	$email_to = array();
	$mb_id = $member['mb_name'];

	$row = ['sale0201@ilooda.com'];
	//$row = ['moden7@naver.com'];

	for ($i = 0; $i <= 10; $i++) { 
		if (isset($row[$i]) && $row[$i] !== '') {
			$email_to[$i] = $row[$i];
		}
	}
	
	$email_subject = $mb_id."님의 1:1 문의 신청이 등록되었습니다.";   //   메일 제목
	$email_subject = '=?UTF-8?B?'.base64_encode($email_subject).'?=';

    function died($error) {
        // your error code can go here
        echo "<script> alert('글 작성이 실패하였습니다.');";
		echo "history.go(-1);";
		echo "</script>";
        die();
    }

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$/';

	if(!preg_match($email_exp,$wr_email)) {
		$error_message .= '이메일 형식에 맞지 않습니다.<br />';
	}

	if(strlen($error_message) > 0) {
		died($error_message);
	}
    $email_message = "";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	
	$tel = $member['mb_hp'];

    $email_message .= "이름 : ".clean_string($wr_name)."<br><br>";
    $email_message .= "이메일 : ".clean_string($wr_email)."<br><br>";
    $email_message .= "연락처 : ".clean_string($wr_2)."<br><br>";
    $email_message .= "제품종류 : ".clean_string($wr_1)."<br><br>";
    $email_message .= "내용 : ".clean_string($wr_content)."<br><br>";
	$email_message .= "A/S 게시글 링크 : <a href='https://www.iloodamall.com/bbs/board.php?bo_table=as&wr_id=" . $wr_id . "'>A/S 게시글 보기</a><br><br>";

	$headers = 'From: ' . $wr_email . "\r\n";
	$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";

	foreach ($email_to as $email) {
		@mail($email, $email_subject, $email_message, $headers);
		//mailer($config['cf_title'], $email, $email, $email_subject, $email_message, 1);
	}

	/****************** 인증정보 시작 ******************/
	$sms_url = "https://apis.aligo.in/send/"; // 전송요청 URL
	$sms['user_id'] = "boreumyeom"; // SMS 아이디
	$sms['key'] = "m370468sq29qmd7m80da2fd5z71trytr";//인증키
	/****************** 인증정보 끝 ********************/

	/****************** 전송정보 설정시작 ****************/
	$_POST['msg'] = '이루다몰 1:1문의 신청이 들어왔습니다'; // 메세지 내용 : euc-kr로 치환이 가능한 문자열만 사용하실 수 있습니다. (이모지 사용불가능)
	$_POST['receiver'] = '01023238889'; // 수신번호
	$_POST['destination'] = '01023238889|이병규담당자'; // 수신인 %고객명% 치환
	$_POST['sender'] ="0312784660"; // 발신번호
	$_POST['rdate'] = ''; // 예약일자 - 20161004 : 2016-10-04일기준
	$_POST['rtime'] = ''; // 예약시간 - 1930 : 오후 7시30분
	$_POST['testmode_yn'] = ''; // Y 인경우 실제문자 전송X , 자동취소(환불) 처리
	$_POST['subject'] = '이루다몰 문의사항이 들어왔습니다.'; //  LMS, MMS 제목 (미입력시 본문중 44Byte 또는 엔터 구분자 첫라인)
	// $_POST['image'] = '/tmp/pic_57f358af08cf7_sms_.jpg'; // MMS 이미지 파일 위치 (저장된 경로)
	$_POST['msg_type'] = 'SMS'; //  SMS, LMS, MMS등 메세지 타입을 지정
	// ※ msg_type 미지정시 글자수/그림유무가 판단되어 자동변환됩니다. 단, 개행문자/특수문자등이 2Byte로 처리되어 SMS 가 LMS로 처리될 가능성이 존재하므로 반드시 msg_type을 지정하여 사용하시기 바랍니다.
	/****************** 전송정보 설정끝 ***************/

	$sms['msg'] = stripslashes($_POST['msg']);
	$sms['receiver'] = $_POST['receiver'];
	$sms['destination'] = $_POST['destination'];
	$sms['sender'] = $_POST['sender'];
	$sms['rdate'] = $_POST['rdate'];
	$sms['rtime'] = $_POST['rtime'];
	$sms['testmode_yn'] = empty($_POST['testmode_yn']) ? '' : $_POST['testmode_yn'];
	$sms['title'] = $_POST['subject'];
	$sms['msg_type'] = $_POST['msg_type'];
	// 만일 $_FILES 로 직접 Request POST된 파일을 사용하시는 경우 move_uploaded_file 로 저장 후 저장된 경로를 사용하셔야 합니다.
	if(!empty($_FILES['image']['tmp_name'])) {
		$tmp_filetype = mime_content_type($_FILES['image']['tmp_name']); 
		if($tmp_filetype != 'image/png' && $tmp_filetype != 'image/jpg' && $tmp_filetype != 'image/jpeg') $_POST['image'] = '';
		else {
			$_savePath = "./".uniqid(); // PHP의 권한이 허용된 디렉토리를 지정
			if(move_uploaded_file($_FILES['file']['tmp_name'], $_savePath)) {
				$_POST['image'] = $_savePath;
			}
		}
	}
	// 이미지 전송 설정
	if(!empty($_POST['image'])) {
		if(file_exists($_POST['image'])) {
			$tmpFile = explode('/',$_POST['image']);
			$str_filename = $tmpFile[sizeof($tmpFile)-1];
			$tmp_filetype = mime_content_type($_POST['image']);
			if ((version_compare(PHP_VERSION, '5.5') >= 0)) { // PHP 5.5버전 이상부터 적용
				$sms['image'] = new CURLFile($_POST['image'], $tmp_filetype, $str_filename);
				curl_setopt($oCurl, CURLOPT_SAFE_UPLOAD, true);
			} else {
				$sms['image'] = '@'.$_POST['image'].';filename='.$str_filename. ';type='.$tmp_filetype;
			}
		}
	}
	/*****/
	$host_info = explode("/", $sms_url);
	$port = $host_info[0] == 'https:' ? 443 : 80;

	$oCurl = curl_init();
	curl_setopt($oCurl, CURLOPT_PORT, $port);
	curl_setopt($oCurl, CURLOPT_URL, $sms_url);
	curl_setopt($oCurl, CURLOPT_POST, 1);
	curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($oCurl, CURLOPT_POSTFIELDS, $sms);
	curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
	$ret = curl_exec($oCurl);
	curl_close($oCurl);
}
// 사용자 코드 실행
@include_once($board_skin_path.'/write_update.skin.php');
@include_once($board_skin_path.'/write_update.tail.skin.php');

if($bo_table=='genuine'){
	if($w == ''){
		//alert("정품등록 신청이 완료되었습니다.\\n실제 등록된 제품이면 등록 현황은 마이페이지에서 확인가능하시며\\n완료 시 A/S신청과 가이드영상, 병원마케팅센터 사용가능합니다.");
		if($ge_check == 1){ // 관리자 승인이 필요한 정품등록이면 텍스트 다르게
//			alert("정품등록 신청이 완료되었습니다.\\n관리자 승인이 필요한 정품번호이며\\n승인완료 시 포인트가 지급됩니다.", "/bbs/board.php?bo_table=genuine");
			alert("정품등록 신청이 완료되었습니다.\\n관리자 승인이 필요한 정품번호이며\\n승인완료 시 포인트가 지급됩니다.","/");
		} else {
			alert("정품등록 신청이 완료되었습니다.\\n실제 등록된 제품이면 등록 현황은 마이페이지에서 확인가능하시며\\n완료 시 A/S신청과 가이드영상, 병원마케팅센터 사용가능합니다.","/");
			
		}
	}
}

if($bo_table=='genuine'){
	alert('완료 되었습니다.\\n감사합니다.', 'https://iloodamall.com/');
}


if($bo_table=='inquiry' || $bo_table=='mb_inquiry'){
	alert('고객님,문의가 정상적으로 접수되었습니다.', '/');
}

if($bo_table=='guardians'){
	alert('가디언즈 신청이 정상적으로 접수되었습니다.\\n감사합니다.', '/');
}
if($bo_table=='product_application'){
	alert('제품 신청이 정상적으로 접수되었습니다.\\n감사합니다.', '/');
}

if($bo_table=='as'){
	alert('고객님의 요청이 정상적으로 접수되었습니다. \\nCS팀 담당자가 1시간 이내로 연락드리도록 하겠습니다. \\n불편을 끼쳐드려 죄송합니다.\\n감사합니다.', '/');
}



delete_cache_latest($bo_table);

$redirect_url = run_replace('write_update_move_url', short_url_clean(G5_HTTP_BBS_URL.'/board.php?bo_table='.$bo_table.'&amp;wr_id='.$wr_id.$qstr), $board, $wr_id, $w, $qstr, $file_upload_msg);

run_event('write_update_after', $board, $wr_id, $w, $qstr, $redirect_url);

if($bo_table =='guardians_adm'){
	goto_url('/bbs/write.php?bo_table=guardians');
}


if ($file_upload_msg)
    alert($file_upload_msg, $redirect_url);
else
    goto_url($redirect_url);