<?php
include_once('./_common.php');

$wr_id = $_GET['wr_id'];
$sql = "update g5_write_kyc set wr_10 = '1' where wr_id = '{$wr_id}' ";
sql_query($sql);
header("Location: {$_SERVER['HTTP_REFERER']}");
//echo $sql;
//exit;

// 접근 권한 확인
if (!$is_admin) {
    alert('접근 권한이 없습니다.');
}

// wr_id 값을 통해 게시물 확인
$wr_id = isset($_GET['wr_id']) ? (int)$_GET['wr_id'] : 0;
if ($wr_id == 0) {
    alert('잘못된 접근입니다.');
}

// g5_write_kyc 테이블에서 해당 게시물을 업데이트
$sql = "UPDATE g5_write_kyc SET wr_homepage = '1' WHERE wr_id = '$wr_id' AND wr_homepage != '1'";
$result = sql_query($sql);

if ($result) {
    alert('승인 처리되었습니다.', '/path/to/your/page.php');
} else {
    alert('승인 처리에 실패했습니다.');
}
?>