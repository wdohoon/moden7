<?php
include_once('./_common.php');

if ($member['mb_10']!='DOCTOR'){
    alert_close('DOCTOR 회원만 조회하실 수 있습니다.');
}

$g5['title'] = get_text($member['mb_nick']).' 님의 MANAGER 등록 현황';
include_once(G5_PATH.'/head.sub.php');

$list = array();

$sql_common = " from {$g5['member_table']} where mb_2 = '{$member['mb_2']}' and mb_10 != 'DOCTOR' ";
$sql_order = " order by mb_no desc ";

$sql = " select count(*) as cnt {$sql_common} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
            {$sql_common}
            {$sql_order}
            limit {$from_record}, {$rows} ";

$result = sql_query($sql);

for ($i=0; $row=sql_fetch_array($result); $i++) {
    $list[] = $row;
}

include_once($member_skin_path.'/manager_list.skin.php');

include_once(G5_PATH.'/tail.sub.php');