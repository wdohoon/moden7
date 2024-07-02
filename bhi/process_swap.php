<?php
include_once('./_common.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mb_id = $member['mb_id']; // 현재 로그인한 회원의 아이디
    $wr_subject = "G-POINT 스왑 신청";
    $amount = intval($_POST['amount']);
    $content = sql_real_escape_string($_POST['content']);
    $current_datetime = G5_TIME_YMDHIS;

    // 유효성 검사
    if ($amount <= 0) {
        alert("스왑 수량을 올바르게 입력해 주세요.");
    }
    if (empty($content)) {
        alert("스왑 내용을 입력해 주세요.");
    }

    // 현재 사용자 포인트 가져오기
    $sql = "SELECT mb_point FROM {$g5['member_table']} WHERE mb_id = '$mb_id'";
    $row = sql_fetch($sql);
    $current_point = intval($row['mb_point']);

    // 스왑할 수량이 현재 포인트보다 많은지 확인
    if ($amount > $current_point) {
        alert("스왑할 수량이 현재 보유 포인트를 초과합니다.");
    }

    // 포인트 차감
    $new_point = $current_point - $amount;
    $sql = "UPDATE {$g5['member_table']} SET mb_point = '$new_point' WHERE mb_id = '$mb_id'";
    if (!sql_query($sql)) {
        alert("포인트 차감 중 오류가 발생했습니다.");
    }

    // g5_write_swap 테이블에 wr_num 필드의 최대값을 가져와서 1을 더함
    $sql = "SELECT MAX(wr_num) AS max_wr_num FROM g5_write_swap";
    $row = sql_fetch($sql);
    $max_wr_num = intval($row['max_wr_num']) + 1;

    // g5_write_swap 테이블에 데이터 삽입
    $sql = "INSERT INTO g5_write_swap (wr_num, wr_subject, mb_id, wr_datetime, wr_1, wr_2)
            VALUES ('$max_wr_num', '$wr_subject', '$mb_id', '$current_datetime', '$amount', '$content')";
    $result = sql_query($sql);

    if ($result) {
        // g5_write_swap 테이블에 마지막으로 삽입된 ID 가져오기
        $swap_id = sql_insert_id();

        // g5_point 테이블에 포인트 차감 내역 기록
        $po_content = "G-POINT 스왑 신청";
        $sql = "INSERT INTO {$g5['point_table']} (mb_id, po_datetime, po_content, po_point, po_mb_point, po_rel_table, po_rel_id, po_rel_action)
                VALUES ('$mb_id', '$current_datetime', '$po_content', '-$amount', '$new_point', 'g5_write_swap', '$swap_id', '스왑신청')";
        if (!sql_query($sql)) {
            alert("포인트 내역 기록 중 오류가 발생했습니다.");
        }

        // 성공적으로 삽입되었을 경우
        goto_url('./my_selllist.php?ret=1');
    } else {
        // 삽입 실패했을 경우
        alert('스왑 신청에 실패했습니다. 다시 시도해주세요.');
    }
} else {
    alert('올바르지 않은 접근입니다.');
}
?>
