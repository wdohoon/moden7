<?php
include_once('./_common.php');

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
    }

    $sql = "SELECT COUNT(*) AS cnt FROM g5_write_couponlist WHERE wr_subject = '$randomString'";
    $row = sql_fetch($sql);

    if ($row['cnt'] > 0) {
        // 중복된 코드가 발생한 경우, 함수를 재귀 호출하여 새로운 코드 생성 시도
        return generateRandomString($length);
    } else {
        // 중복이 없으면 쿠폰 코드 반환
        return $randomString;
    }
}

for ($i = 1; $i <= 300; $i++) {
    $coupon = generateRandomString(8);
    $sql = "INSERT INTO g5_write_couponlist SET wr_subject = '$coupon', wr_seo_title = '$coupon', wr_1 = '0'";
	//echo $sql."<Br>";
    //sql_query($sql);
}
?>