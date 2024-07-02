<?php
/*
 * 날짜(등록일)로 조회
 */
require_once("../../lib/message.php");

// 검색 시간은 ISO8601 포맷으로 입력
$startDate = (new DateTime('2021-02-01 00:00:00'))->format(DateTime::ATOM);
$endDate = (new DateTime('2021-02-28 23:59:59'))->format(DateTime::ATOM);

$params = array(
  "limit" => 10, // 한 페이지에 불러올 목록 개수
  "dateCreated[gte]" => $startDate, // 검색 시작 날짜
  "dateCreated[lte]" => $endDate // 검색 끝 날짜
);
print_r(request("GET", "/kakao/v1/templates", $params));
