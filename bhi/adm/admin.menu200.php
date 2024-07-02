<?php
$menu['menu200'] = array (
    array('200000', '회원관리', G5_ADMIN_URL.'/member_list.php', 'member'),
    array('200100', '회원관리', G5_ADMIN_URL.'/member_list.php', 'mb_list'),
    //array('200300', '회원메일발송', G5_ADMIN_URL.'/mail_list.php', 'mb_mail'),
    //array('200800', '접속자집계', G5_ADMIN_URL.'/visit_list.php', 'mb_visit', 1),
    //array('200810', '접속자검색', G5_ADMIN_URL.'/visit_search.php', 'mb_search', 1),
    //array('200820', '접속자로그삭제', G5_ADMIN_URL.'/visit_delete.php', 'mb_delete', 1),
    array('200200', 'G-POINT 관리', G5_ADMIN_URL.'/point_list.php', 'mb_point'),
	array('200500', 'BTC 지급', G5_ADMIN_URL.'/insert_btc.php', 'insert_btc'),
	array('200600', 'ETH 지급', G5_ADMIN_URL.'/insert_eth.php', 'insert_eth'),
	array('200700', 'TRX 지급', G5_ADMIN_URL.'/insert_trx.php', 'insert_trx'),
	array('200800', 'ERC-20 지급', G5_ADMIN_URL.'/insert_erc20.php', 'insert_erc20'),
	array('200900', 'TRC-20 지급', G5_ADMIN_URL.'/insert_trc20.php', 'insert_trc20'),
    //array('200900', '투표관리', G5_ADMIN_URL.'/poll_list.php', 'mb_poll')
);