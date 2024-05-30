<?php
include_once('./_common.php');

$_POST = array_map('trim', $_POST);

$cpid = $_POST['cp_id']; // 쿠폰번호
$cpsubject = $_POST['cp_subject']; // 쿠폰이름
$cpmethod = $_POST['cp_method']; // 쿠폰종류
$cptarget = $_POST['cp_target']; // 적용상품
$mbid = $_POST['mb_id']; // 회원아이디
$cpstart = $_POST['cp_start']; // 사용시작일
$cpend = $_POST['cp_end']; // 사용종료일
$cpprice = $_POST['cp_price']; // 할인금액
$cptype = $_POST['cp_type']; // 쿠폰타입
$cptrunc = $_POST['cp_trunc']; // 절사금액
$cpminimum = $_POST['cp_minimum']; // 최소주문금액
$cpmaximum = $_POST['cp_maximum']; // 최대할인금액

/*
$check_sanitize_keys = array(
'cp_subject',       // 쿠폰이름
'cp_method',        // 쿠폰종류
'cp_target',        // 적용상품
'mb_id',            // 회원아이디
'cp_start',         // 사용시작일
'cp_end',           // 사용종료일
'cp_type',          // 쿠폰타입
'cp_price',         // 할인금액
'cp_type',          // 할인금액타입
'cp_trunc',         // 절사금액
'cp_minimum',       // 최소주문금액
'cp_maximum',       // 최대할인금액
);

foreach( $check_sanitize_keys as $key ){
    $$key = $_POST[$key] = isset($_POST[$key]) ? strip_tags(clean_xss_attributes($_POST[$key])) : '';
}
*/

if(!$cpid){
    alert('쿠폰번호를 입력해 주십시오.');
}

	$sql = " select * from g5_write_couponlist where wr_subject = '$cpid' ";
    $cp = sql_fetch($sql);
	$coupon = $cp['wr_subject'];

    if(!$cp['wr_subject']){
        alert('쿠폰정보가 존재하지 않습니다.', './couponregist.php');
	}
	
	if($cp['wr_subject'] && !$cp['wr_1'] ){

		$sql2 = " INSERT INTO {$g5['g5_shop_coupon_table']}
					( cp_id, cp_subject, cp_method, cp_target, mb_id, cp_start, cp_end, cp_type, cp_price, cp_trunc, cp_minimum, cp_maximum, cp_datetime )
				VALUES
					( '$cpid', '$cpsubject', '$cpmethod', '$cptarget', '$mbid', '$cpstart', '$cpend', '$cptype', '$cpprice', '$cptrunc', '$cpminimum', '$cpmaximum', '".G5_TIME_YMDHIS."' ) ";

		sql_query($sql2);


		$sql3 = "UPDATE g5_write_couponlist SET wr_1 = '1' where wr_subject = '$coupon' ";

		sql_query($sql3);

		alert('쿠폰이 등록되었습니다.');
		exit;

	} else if($cp['wr_subject'] && $cp['wr_1'] ){
		 alert('이미 등록된 쿠폰입니다.', './couponregist.php');
	}

/*
// 쿠폰생성알림 발송
if($w == '' && ($_POST['cp_sms_send'] || $_POST['cp_email_send'])) {
    include_once(G5_LIB_PATH.'/mailer.lib.php');

    $sms_count = 0;
    $arr_send_list = array();
    $sms_messages = array();

    if($_POST['chk_all_mb']) {
        $sql = " select mb_id, mb_name, mb_hp, mb_email, mb_mailling, mb_sms
                    from {$g5['member_table']}
                    where mb_leave_date = ''
                      and mb_intercept_date = ''
                      and ( mb_mailling = '1' or mb_sms = '1' )
                      and mb_id <> '{$config['cf_admin']}' ";
    } else {
        $sql = " select mb_id, mb_name, mb_hp, mb_email, mb_mailling, mb_sms
                    from {$g5['member_table']}
                    where mb_id = '$mb_id' ";
    }

    $result = sql_query($sql);

    for($i=0; $row = sql_fetch_array($result); $i++) {
        $arr_send_list[] = $row;
    }

    $count = count($arr_send_list);

    for($i=0; $i<$count; $i++) {
        if(!$arr_send_list[$i]['mb_id'])
            continue;

        // SMS
        if($config['cf_sms_use'] == 'icode' && $_POST['cp_sms_send'] && $arr_send_list[$i]['mb_hp'] && $arr_send_list[$i]['mb_sms']) {
            $sms_contents = $cp_subject.' 쿠폰이 '.get_text($arr_send_list[$i]['mb_name']).'님께 발행됐습니다. 쿠폰만료 : '.$cp_end.' '.str_replace('http://', '', G5_URL);

            if($sms_contents) {
                $receive_number = preg_replace("/[^0-9]/", "", $arr_send_list[$i]['mb_hp']);   // 수신자번호
                $send_number = preg_replace("/[^0-9]/", "", $default['de_admin_company_tel']); // 발신자번호

                if($receive_number)
                    $sms_messages[] = array('recv' => $receive_number, 'send' => $send_number, 'cont' => $sms_contents);
            }
        }

        // E-MAIL
        if($config['cf_email_use'] && $_POST['cp_email_send'] && $arr_send_list[$i]['mb_email'] && $arr_send_list[$i]['mb_mailling']) {
            $mb_name = get_text($arr_send_list[$i]['mb_name']);
            switch($cp_method) {
                case 2:
                    $coupon_method = '결제금액할인';
                    break;
                case 3:
                    $coupon_method = '배송비할인';
                    break;
                default:
                    $coupon_method = '개별상품할인';
                    break;
            }
            $contents = '쿠폰명 : '.$cp_subject.'<br>';
            $contents .= '적용대상 : '.$coupon_method.'<br>';
            $contents .= '쿠폰만료 : '.$cp_end;

            $title = $config['cf_title'].' - 쿠폰발행알림 메일';
            $email = $arr_send_list[$i]['mb_email'];

            ob_start();
            include G5_SHOP_PATH.'/mail/couponmail.mail.php';
            $content = ob_get_contents();
            ob_end_clean();

            mailer($config['cf_admin_email_name'], $config['cf_admin_email'], $email, $title, $content, 1);
        }
    }

    // SMS발송
    $sms_count = count($sms_messages);
    if($sms_count > 0) {
        if($config['cf_sms_type'] == 'LMS') {
            include_once(G5_LIB_PATH.'/icode.lms.lib.php');

            $port_setting = get_icode_port_type($config['cf_icode_id'], $config['cf_icode_pw']);

            // SMS 모듈 클래스 생성
            if($port_setting !== false) {
                $SMS = new LMS;
                $SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], $port_setting);

                for($s=0; $s<$sms_count; $s++) {
                    $strDest     = array();
                    $strDest[]   = $sms_messages[$s]['recv'];
                    $strCallBack = $sms_messages[$s]['send'];
                    $strCaller   = iconv_euckr(trim($default['de_admin_company_name']));
                    $strSubject  = '';
                    $strURL      = '';
                    $strData     = iconv_euckr($sms_messages[$s]['cont']);
                    $strDate     = '';
                    $nCount      = count($strDest);

                    $res = $SMS->Add($strDest, $strCallBack, $strCaller, $strSubject, $strURL, $strData, $strDate, $nCount);

                    $SMS->Send();
                    $SMS->Init(); // 보관하고 있던 결과값을 지웁니다.
                }
            }
        } else {
            include_once(G5_LIB_PATH.'/icode.sms.lib.php');

            $SMS = new SMS; // SMS 연결
            $SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], $config['cf_icode_server_port']);

            for($s=0; $s<$sms_count; $s++) {
                $recv_number = $sms_messages[$s]['recv'];
                $send_number = $sms_messages[$s]['send'];
                $sms_content = iconv_euckr($sms_messages[$s]['cont']);

                $SMS->Add($recv_number, $send_number, $config['cf_icode_id'], $sms_content, "");
            }

            $SMS->Send();
            $SMS->Init(); // 보관하고 있던 결과값을 지웁니다.
        }
    }
}
*/


?>