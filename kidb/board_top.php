<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.php');

if($bo_table == 'inquiry'){
		$sv_tit = 'INQUIRY';
		$sv_links = '/contactus.php';
		$sv_titles = 'CONTACT US';
		$sv_link = '/bbs/write.php?bo_table=inquiry';
		$sv_title = 'INQUIRY';
		include_once(G5_PATH.'/include/sv_05.php');
} else if($bo_table == 'resources'){
		$sv_tit = 'DERIVATIVES';
		$sv_links = '/derivatives.php';
		$sv_titles = 'MONEY MARKET';
		$sv_link = '/bbs/board.php?bo_table=resource';
		$sv_title = 'RESOURCES';
		include_once(G5_PATH.'/include/sv_06.php');
} else if($bo_table == 'leadership'){
		$sv_tit = 'KIDB';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/leadership.php';
		$sv_title = 'LEADERSHIP';
		include_once(G5_PATH.'/include/sv_02.php');
} else if($bo_table == 'reousrces_2'){
		$sv_tit = 'FIXED INCOME';
		$sv_links = '/fixedincome.php';
		$sv_titles = 'FIXED INCOME';
		$sv_link = '/bbs/board.php?bo_table=reousrces_2';
		$sv_title = 'RESOURCES';
		include_once(G5_PATH.'/include/sv_07.php');
} else if($bo_table == 'archive'){
		$sv_tit = 'NOTICE';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/bbs/board.php?bo_table=archive';
		$sv_title = 'NOTICE';
		include_once(G5_PATH.'/include/sv_05.php');
}else if($bo_table == 'COMPLAINT'){
		$sv_tit = 'COMPLAINT';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/bbs/board.php?bo_table=COMPLAINT';
		$sv_title = 'COMPLAINT';
		include_once(G5_PATH.'/include/sv_03.php');
}else if($bo_table == 'money'){
		$sv_tit = 'MONEY MARKET';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/bbs/board.php?bo_table=money';
		$sv_title = 'RESOURCES';
		include_once(G5_PATH.'/include/sv_03.php');
}
		
		//include_once(G5_PATH.'/include/sv_01.php');
?>