<?php

/********************
    ��� ����
********************/

define('G5_VERSION', '�״�����5');
define('G5_GNUBOARD_VER', '5.4.5.5');
define('G5_YOUNGCART_VER', '5.4.5.5.1');

// �� ����� ���ǵ��� ������ ������ ���� �������� ������ ����� �� ����
define('_GNUBOARD_', true);

// �⺻ �ð��� ����
date_default_timezone_set("Asia/Seoul");

/********************
    ��� ���
********************/

/*
���ȼ��� ������
ȸ������, �۾��⿡ ���Ǵ� https �� ���۵Ǵ� �ּҸ� ���մϴ�.
��Ʈ�� �ִٸ� ������ �ڿ� :443 �� ���� �Է��ϼ���.
���ȼ����ּҰ� ���ٸ� �������� �νø� �Ǹ� ���ȼ����ּ� �ڿ� / �� ������ �ʽ��ϴ�.
�Է¿�) https://www.domain.com:443/gnuboard5
*/
define('G5_DOMAIN', '');
define('G5_HTTPS_DOMAIN', '');

// ����� ���, ���� ������� false �� ������ ������.
define('G5_DEBUG', false);

// Set Databse table default engine is Databse default_storage_engine, If you want to use MyISAM or InnoDB, change to MyISAM or InnoDB.
define('G5_DB_ENGINE', '');

// Set Databse table default Charset
// utf8, utf8mb4 �� ���� ���� �⺻���� utf8, ��ġ���� utf8mb4 ���� ������ ��� ���̺� �̸��� �Է��� �����մϴ�. utf8mb4 �� mysql �Ǵ� mariadb 5.5 ���� �̻��� �䱸�մϴ�.
define('G5_DB_CHARSET', 'utf8');

/*
www.sir.kr �� sir.kr �������� ���� �ٸ� ���������� �ν��մϴ�. ��Ű�� �����Ϸ��� .sir.kr �� ���� �Է��ϼ���.
�̰��� �Է��� ���ٸ� www ���� �����ΰ� �׷��� ���� �������� ��Ű�� �������� �����Ƿ� �α����� Ǯ�� �� �ֽ��ϴ�.
*/
define('G5_COOKIE_DOMAIN',  '');

define('G5_DBCONFIG_FILE',  'dbconfig.php');

define('G5_ADMIN_DIR',      'adm');
define('G5_BBS_DIR',        'bbs');
define('G5_CSS_DIR',        'css');
define('G5_DATA_DIR',       'data');
define('G5_EXTEND_DIR',     'extend');
define('G5_IMG_DIR',        'img');
define('G5_JS_DIR',         'js');
define('G5_LIB_DIR',        'lib');
define('G5_PLUGIN_DIR',     'plugin');
define('G5_SKIN_DIR',       'skin');
define('G5_EDITOR_DIR',     'editor');
define('G5_MOBILE_DIR',     'mobile');
define('G5_OKNAME_DIR',     'okname');

define('G5_KCPCERT_DIR',    'kcpcert');
define('G5_LGXPAY_DIR',     'lgxpay');

define('G5_SNS_DIR',        'sns');
define('G5_SYNDI_DIR',      'syndi');
define('G5_PHPMAILER_DIR',  'PHPMailer');
define('G5_SESSION_DIR',    'session');
define('G5_THEME_DIR',      'theme');

define('G5_GROUP_DIR',      'group');
define('G5_CONTENT_DIR',    'content');

// URL �� �������󿡼��� ��� (���������� ������)
if (G5_DOMAIN) {
    define('G5_URL', G5_DOMAIN);
} else {
    if (isset($g5_path['url']))
        define('G5_URL', $g5_path['url']);
    else
        define('G5_URL', '');
}

if (isset($g5_path['path'])) {
    define('G5_PATH', $g5_path['path']);
} else {
    define('G5_PATH', '');
}

define('G5_ADMIN_URL',      G5_URL.'/'.G5_ADMIN_DIR);
define('G5_BBS_URL',        G5_URL.'/'.G5_BBS_DIR);
define('G5_CSS_URL',        G5_URL.'/'.G5_CSS_DIR);
define('G5_DATA_URL',       G5_URL.'/'.G5_DATA_DIR);
define('G5_IMG_URL',        G5_URL.'/'.G5_IMG_DIR);
define('G5_JS_URL',         G5_URL.'/'.G5_JS_DIR);
define('G5_SKIN_URL',       G5_URL.'/'.G5_SKIN_DIR);
define('G5_PLUGIN_URL',     G5_URL.'/'.G5_PLUGIN_DIR);
define('G5_EDITOR_URL',     G5_PLUGIN_URL.'/'.G5_EDITOR_DIR);
define('G5_OKNAME_URL',     G5_PLUGIN_URL.'/'.G5_OKNAME_DIR);
define('G5_KCPCERT_URL',    G5_PLUGIN_URL.'/'.G5_KCPCERT_DIR);
define('G5_LGXPAY_URL',     G5_PLUGIN_URL.'/'.G5_LGXPAY_DIR);
define('G5_SNS_URL',        G5_PLUGIN_URL.'/'.G5_SNS_DIR);
define('G5_SYNDI_URL',      G5_PLUGIN_URL.'/'.G5_SYNDI_DIR);
define('G5_MOBILE_URL',     G5_URL.'/'.G5_MOBILE_DIR);

// PATH �� �����󿡼��� ������
define('G5_ADMIN_PATH',     G5_PATH.'/'.G5_ADMIN_DIR);
define('G5_BBS_PATH',       G5_PATH.'/'.G5_BBS_DIR);
define('G5_DATA_PATH',      G5_PATH.'/'.G5_DATA_DIR);
define('G5_EXTEND_PATH',    G5_PATH.'/'.G5_EXTEND_DIR);
define('G5_LIB_PATH',       G5_PATH.'/'.G5_LIB_DIR);
define('G5_PLUGIN_PATH',    G5_PATH.'/'.G5_PLUGIN_DIR);
define('G5_SKIN_PATH',      G5_PATH.'/'.G5_SKIN_DIR);
define('G5_MOBILE_PATH',    G5_PATH.'/'.G5_MOBILE_DIR);
define('G5_SESSION_PATH',   G5_DATA_PATH.'/'.G5_SESSION_DIR);
define('G5_EDITOR_PATH',    G5_PLUGIN_PATH.'/'.G5_EDITOR_DIR);
define('G5_OKNAME_PATH',    G5_PLUGIN_PATH.'/'.G5_OKNAME_DIR);

define('G5_KCPCERT_PATH',   G5_PLUGIN_PATH.'/'.G5_KCPCERT_DIR);
define('G5_LGXPAY_PATH',    G5_PLUGIN_PATH.'/'.G5_LGXPAY_DIR);

define('G5_SNS_PATH',       G5_PLUGIN_PATH.'/'.G5_SNS_DIR);
define('G5_SYNDI_PATH',     G5_PLUGIN_PATH.'/'.G5_SYNDI_DIR);
define('G5_PHPMAILER_PATH', G5_PLUGIN_PATH.'/'.G5_PHPMAILER_DIR);
//==============================================================================


//==============================================================================
// ����� ����
// pc ���� �� ����� ��⿡���� PCȭ�� ������
// mobile ���� �� PC������ �����ȭ�� ������
// both ���� �� ���� ��⿡ ���� ȭ�� ������
//------------------------------------------------------------------------------
define('G5_SET_DEVICE', 'both');

define('G5_USE_MOBILE', false); // ����� Ȩ�������� ������� ���� ��� false �� ����
define('G5_USE_CACHE',  true); // �ֽű۵ cache ��� ��� ����


/********************
    �ð� ���
********************/
// ������ �ð��� ���� ����ϴ� �ð��� Ʋ�� ��� �����ϼ���.
// �Ϸ�� 86400 ���Դϴ�. 1�ð��� 3600��
// 6�ð��� ���� ��� time() + (3600 * 6);
// 6�ð��� ���� ��� time() - (3600 * 6);
define('G5_SERVER_TIME',    time());
define('G5_TIME_YMDHIS',    date('Y-m-d H:i:s', G5_SERVER_TIME));
define('G5_TIME_YMD',       substr(G5_TIME_YMDHIS, 0, 10));
define('G5_TIME_HIS',       substr(G5_TIME_YMDHIS, 11, 8));

// �Է°� �˻� ��� (���ڸ� �����Ͻø� �ȵ˴ϴ�.)
define('G5_ALPHAUPPER',      1); // ���빮��
define('G5_ALPHALOWER',      2); // ���ҹ���
define('G5_ALPHABETIC',      4); // ����,�ҹ���
define('G5_NUMERIC',         8); // ����
define('G5_HANGUL',         16); // �ѱ�
define('G5_SPACE',          32); // ����
define('G5_SPECIAL',        64); // Ư������

// SEO TITLE ���� ����
define('G5_SEO_TITEL_WORD_CUT', 8);        // SEO TITLE ���� ����

// �۹̼�
define('G5_DIR_PERMISSION',  0777); // ���丮 ������ �۹̼�
define('G5_FILE_PERMISSION', 0777); // ���� ������ �۹̼�

// ����� ���� ���� $_SERVER['HTTP_USER_AGENT']
define('G5_MOBILE_AGENT',   'phone|samsung|lgtel|mobile|[^A]skt|nokia|blackberry|BB10|android|sony');

// SMTP
// lib/mailer.lib.php ���� ���
define('G5_SMTP',      '127.0.0.1');
define('G5_SMTP_PORT', '25');


/********************
    ��Ÿ ���
********************/

// ��ȣȭ �Լ� ����
// ����Ʈ � �� ������ �����ϸ� �α����� �ȵǴ� ���� ������ �߻��մϴ�.
// 5.4 ���� �������� sql_password �� ����, 5.4 �������� �⺻�� create_hash �� ����
//define('G5_STRING_ENCRYPT_FUNCTION', 'sql_password');
define('G5_STRING_ENCRYPT_FUNCTION', 'create_hash');
define('G5_MYSQL_PASSWORD_LENGTH', 41);         // mysql password length 41, old_password �� ��쿡�� 16

// SQL ������ ǥ���� ������ ����
// ������ ǥ���Ϸ��� TRUE �� ����
define('G5_DISPLAY_SQL_ERROR', FALSE);

// escape string ó�� �Լ� ����
// addslashes �� ���� ����
define('G5_ESCAPE_FUNCTION', 'sql_escape_string');

// sql_escape_string �Լ����� ���� ����
//define('G5_ESCAPE_PATTERN',  '/(and|or).*(union|select|insert|update|delete|from|where|limit|create|drop).*/i');
//define('G5_ESCAPE_REPLACE',  '');

// �Խ��ǿ��� ��ũ�� �⺻������ ���մϴ�.
// �ʵ带 �߰��ϸ� �� ���ڸ� �ʵ���� �°� �÷��ֽʽÿ�.
define('G5_LINK_COUNT', 2);

// ����� jpg Quality ����
define('G5_THUMB_JPG_QUALITY', 90);

// ����� png Compress ����
define('G5_THUMB_PNG_COMPRESS', 5);

// ����� ��⿡�� DHTML ������ ��뿩�θ� �����մϴ�.
define('G5_IS_MOBILE_DHTML_USE', true);

// MySQLi ��뿩�θ� �����մϴ�.
define('G5_MYSQLI_USE', true);

// Browscap ��뿩�θ� �����մϴ�.
define('G5_BROWSCAP_USE', true);

// ������ ��� �� Browscap ��뿩�θ� �����մϴ�.
define('G5_VISIT_BROWSCAP_USE', false);

// ip ������ ����
/* 123.456.789.012 ip�� ���� ����� �����ϴ� �����
\\1 �� 123, \\2�� 456, \\3�� 789, \\4�� 012�� ���� �����ǹǷ�
ǥ�õǴ� �κ��� \\1 �� ���� ����Ͻø� �ǰ� ���� �κ��� ������
�ٸ� ���ڸ� �����ֽø� �˴ϴ�.
*/
define('G5_IP_DISPLAY', '\\1.��.\\3.\\4');

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') {   //https ����϶� daum �ּ� js
    define('G5_POSTCODE_JS', '<script src="https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js"></script>');
} else {  //http ����϶� daum �ּ� js
    define('G5_POSTCODE_JS', '<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>');
}