<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$g_conf_home_dir  = G5_SHOP_PATH.'/nicepay';
$g_conf_site_name = $default['de_admin_company_name'];

if ($default['de_card_test']) {
    $default['de_nicepay_mid']          = 'nictest00m';
    $default['de_nicepay_merchantkey']  = '33F49GnCMS1mFYlGXisbUDzVf2ATWCl9k3R++d5hDd3Frmuos/XLx8XhXpe+LDYAbpGKZYSwtlyyLOtS/8aD7A==';
    $default['de_nicepay_cancelpw']     = '123456';
}

$g_conf_site_cd  = $default['de_nicepay_mid'];
$g_conf_mer_key  = $default['de_nicepay_merchantkey']; // 상점서명키
$g_conf_cancelpw = $default['de_nicepay_cancelpw']; // 취소비밀번호
$g_conf_goodscl  = $default['de_nicepay_goodscl'] != '' ? $default['de_nicepay_goodscl'] : '1'; // 휴대폰 결제 구분

$PAY_METHOD = array(
    'CARD'      => '신용카드',
    'CELLPHONE' => '휴대폰',
    'VBANK'     => '가상계좌',
    'BANK'      => '계좌이체'
);

function wz_fwrite_log($log_dir, $error) { 
    $log_file = fopen($log_dir, "a");
    fwrite($log_file, $error."\r\n");
    fclose($log_file);
}
?>