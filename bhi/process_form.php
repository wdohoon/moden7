<?php
include_once('./_common.php'); // 공통 설정 파일 포함

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 폼 데이터 받기
    $coin = $_POST['coin'];
    $amount = $_POST['amount'];
    $current_balance = $_POST['current_balance'];
    $g_point_value = $_POST['g_point_value'];
    $coin_name = $_POST['coin_name'];
    $member_id = $member['mb_id'];
    $member_name = $member['mb_name'];

    $wr_subject = "구매 요청: $coin";
    $wr_content = "구매 수량: $amount";

    // wr_num 값을 가장 큰 값에서 1 증가시키도록 설정
    $result = sql_fetch("SELECT IFNULL(MAX(wr_num), 0) + 1 AS max_wr_num FROM g5_write_b08");
    $max_wr_num = $result['max_wr_num'];

    // 데이터베이스에 데이터 삽입
    $sql = "INSERT INTO g5_write_b08 
            (wr_num, wr_reply, wr_parent, wr_is_comment, ca_name, wr_option, wr_subject, wr_content, mb_id, wr_name, wr_datetime, wr_ip, wr_1, wr_2, wr_3, wr_4, wr_5) 
            VALUES 
            ('$max_wr_num', '', 0, 0, '구매', '', '$wr_subject', '$wr_content', '$member_id', '$member_name', NOW(), '{$_SERVER['REMOTE_ADDR']}', '$coin', '$current_balance', '$coin_name', '$amount', '$g_point_value')";

    if (sql_query($sql)) {
        echo "<script>alert('구매 요청이 성공적으로 처리되었습니다.'); location.href='/my_selllist.php';</script>";
    } else {
        echo "<script>alert('구매 요청 처리 중 오류가 발생했습니다.'); history.back();</script>";
    }
}
?>
