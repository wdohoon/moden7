<?php
$sub_menu = "200200";
require_once './_common.php';

// 관리자 로그인 체크 및 메뉴 권한 체크
auth_check_menu($auth, $sub_menu, 'r', 'w', 'd');

$admin_ids = array('admin', 'log_admin', 'sub_admin', 'as_admin', 'shop_admin', 'board_admin', 'member_admin');

// 로그인한 사용자의 ID가 $admin_ids 배열에 있는지 확인
if (in_array($member['mb_id'], $admin_ids)) {
    $login_id = $member['mb_id']; 
    $mb_name = $member['mb_name'];  
    $user_ip = $_SERVER['REMOTE_ADDR'];  
    $accessed_page = "PP관리";
    $history_datetime = date('Y-m-d H:i:s'); 
	$action = "조회";

    // 데이터베이스에 접속 기록 삽입
    $sql = "INSERT INTO g5_login_history_save (login_id, user_name, user_ip, accessed_page, history_datetime, action) 
            VALUES ('{$login_id}', '{$mb_name}', '{$user_ip}', '{$accessed_page}', '{$history_datetime}', '{$action}')";
    sql_query($sql);
}
?>

<?php
$sql_common = " from {$g5['point_table']} po";

$sql_search = " where (1) ";

if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_id':
            $sql_search .= " (po.{$sfl} = '{$stx}') ";
            break;
        default:
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "po_id";
    $sod = "desc";
}
$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt
            {$sql_common}
            {$sql_search}
            {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) {
    $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
}
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select po.*, mb.mb_name, mb.mb_nick, mb.mb_email, mb.mb_homepage, mb.mb_point
            {$sql_common}
            LEFT JOIN {$g5['member_table']} mb ON po.mb_id = mb.mb_id 
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$listall = '<a href="' . $_SERVER['SCRIPT_NAME'] . '" class="ov_listall">전체목록</a>';

$mb = array();
if ($sfl == 'mb_id' && $stx) {
    $mb = get_member($stx);
}

$g5['title'] = 'PP관리';
require_once './admin.head.php';

$colspan = 9;

$po_expire_term = '';
if ($config['cf_point_term'] > 0) {
    $po_expire_term = $config['cf_point_term'];
}

if (strstr($sfl, "mb_id")) {
    $mb_id = $stx;
} else {
    $mb_id = "";
}
?>
<?php
// 필터링 모드에 따라 다른 SQL 쿼리 조건을 적용
if ($mode == 'earned') {
    $sql_search .= " and (po.po_point > 0) ";
} elseif ($mode == 'used') {
    $sql_search .= " and (po_content != '기간만료' and po.po_point <= 0) ";
} elseif ($mode == 'expired') {
    $sql_search .= " and (po_content = '기간만료' and po.po_point <= 0) ";
}

// 새로운 쿼리 실행
$sql = " select po.*, mb.mb_name, mb.mb_nick, mb.mb_email, mb.mb_homepage, mb.mb_point, mb_1
            {$sql_common}
            LEFT JOIN {$g5['member_table']} mb ON po.mb_id = mb.mb_id 
            {$sql_search}
            {$sql_order}
            limit {$from_record}, {$rows} ";
$result = sql_query($sql);

?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    <span class="btn_ov01"><span class="ov_txt">전체 </span><span class="ov_num"> <?php echo number_format($total_count) ?> 건 </span></span>

    <?php
    // PHP 태그 내에서 링크 생성
    echo '&nbsp;<span class="btn_ov01"><span class="ov_txt"><a href="'.$_SERVER["SCRIPT_NAME"].'">전체 합계</a></span><span class="ov_num"> ' . number_format($row2['sum_point']) . '점 </span></span>';

    $row2 = sql_fetch(" select sum(po_point) as sum_point from {$g5['point_table']} where po_point > 0");
    echo '&nbsp;<span class="btn_ov01"><span class="ov_txt"><a href="'.$_SERVER["SCRIPT_NAME"].'?mode=earned">전체 지급량</a></span><span class="ov_num"> ' . number_format($row2['sum_point']) . '점 </span></span>';

    $row2 = sql_fetch(" select sum(po_point) as sum_point from {$g5['point_table']} where po_content != '기간만료' and po_point <= 0");
    echo '&nbsp;<span class="btn_ov01"><span class="ov_txt"><a href="'.$_SERVER["SCRIPT_NAME"].'?mode=used">실 사용량</a></span><span class="ov_num"> ' . number_format($row2['sum_point']) . '점 </span></span>';

    $row2 = sql_fetch(" select sum(po_point) as sum_point from {$g5['point_table']} where po_content = '기간만료' and po_point <= 0");
    echo '&nbsp;<span class="btn_ov01"><span class="ov_txt"><a href="'.$_SERVER["SCRIPT_NAME"].'?mode=expired">소멸 PP</a></span><span class="ov_num"> ' . number_format($row2['sum_point']) . '점 </span></span>';
    ?>
</div>


<form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="mb_id" <?php echo get_selected($sfl, "mb_id"); ?>>회원아이디</option>
        <option value="po_content" <?php echo get_selected($sfl, "po_content"); ?>>내용</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
    <input type="submit" class="btn_submit" value="검색">
</form>

<form name="fpointlist" id="fpointlist" method="post" action="./point_list_delete.php" onsubmit="return fpointlist_submit(this);">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="token" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?> 목록</caption>
            <thead>
                <tr>
                    <th scope="col">
                        <label for="chkall" class="sound_only">포인트 내역 전체</label>
                        <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
                    </th>
                    <th scope="col"><?php echo subject_sort_link('mb_id') ?>회원아이디</a></th>
                    <th scope="col">이름</th>
                    <th scope="col">병원명</th>
                    <th scope="col"><?php echo subject_sort_link('po_content') ?>포인트 내용</a></th>
                    <th scope="col"><?php echo subject_sort_link('po_point') ?>포인트</a></th>
                    <th scope="col"><?php echo subject_sort_link('po_datetime') ?>일시</a></th>
                    <th scope="col">만료일</th>
                    <th scope="col">포인트합</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $row = sql_fetch_array($result); $i++) {
                    $mb_nick = get_sideview($row['mb_id'], $row['mb_nick'], $row['mb_email'], $row['mb_homepage']);

                    $link1 = $link2 = '';
                    if (!preg_match("/^\@/", $row['po_rel_table']) && $row['po_rel_table']) {
                        $link1 = '<a href="' . get_pretty_url($row['po_rel_table'], $row['po_rel_id']) . '" target="_blank">';
                        $link2 = '</a>';
                    }

                    $expr = '';
                    if ($row['po_expired'] == 1) {
                        $expr = ' txt_expired';
                    }

                    $bg = 'bg' . ($i % 2);
                ?>

                    <tr class="<?php echo $bg; ?>">
                        <td class="td_chk">
                            <input type="hidden" name="mb_id[<?php echo $i ?>]" value="<?php echo $row['mb_id'] ?>" id="mb_id_<?php echo $i ?>">
                            <input type="hidden" name="po_id[<?php echo $i ?>]" value="<?php echo $row['po_id'] ?>" id="po_id_<?php echo $i ?>">
                            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo $row['po_content'] ?> 내역</label>
                            <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
                        </td>
                        <td class="td_left"><a href="?sfl=mb_id&amp;stx=<?php echo $row['mb_id'] ?>"><?php echo $row['mb_id'] ?></a></td>
                        <td class="td_left"><?php echo get_text($row['mb_name']); ?></td>
                        <td class="td_left sv_use">
                            <div><?php echo $row['mb_1'] ?></div>
                        </td>
                        <td class="td_left"><?php echo $link1 ?><?php echo $row['po_content'] ?><?php echo $link2 ?></td>
                        <td class="td_num td_pt"><?php echo number_format($row['po_point']) ?></td>
                        <td class="td_datetime"><?php echo $row['po_datetime'] ?></td>
                        <td class="td_datetime2<?php echo $expr; ?>">
                            <?php if ($row['po_expired'] == 1) { ?>
                                만료<?php echo substr(str_replace('-', '', $row['po_expire_date']), 2); ?>
                            <?php } else {
                                echo $row['po_expire_date'] == '9999-12-31' ? '&nbsp;' : $row['po_expire_date'];
                            } ?>
                        </td>
                        <td class="td_num td_pt"><?php echo number_format($row['po_mb_point']) ?></td>
                    </tr>

                <?php
                }

                if ($i == 0) {
                    echo '<tr><td colspan="' . $colspan . '" class="empty_table">자료가 없습니다.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="btn_fixed_top">
		<a href="/adm/excel_pp.php" class="btn btn_01">회원별 PP 현황</a>
        <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_02">
    </div>

</form>

<?php
// 모드에 따른 total_count 재계산
switch ($mode) {
    case 'earned':
        $sql2 = "SELECT COUNT(*) AS cnt FROM {$g5['point_table']} WHERE po_point > 0";
        break;
    case 'used':
        $sql2 = "SELECT COUNT(*) AS cnt FROM {$g5['point_table']} WHERE po_content != '기간만료' AND po_point <= 0";
        break;
    case 'expired':
        $sql2 = "SELECT COUNT(*) AS cnt FROM {$g5['point_table']} WHERE po_content = '기간만료' AND po_point <= 0";
        break;
    default:
        $sql2 = "SELECT COUNT(*) AS cnt {$sql_common} {$sql_search} {$sql_order}";
        break;
}
$row2 = sql_fetch($sql2);
$total_count = $row2['cnt'];

// 총 페이지 수 계산
$total_page = ceil($total_count / $rows);

// 쿼리 문자열 생성
$qstr = "sfl=$sfl&stx=$stx&sod=$sod&sst=$sst&page=$page";
if (isset($mode)) {
    $qstr .= "&mode=$mode"; // 필터링 모드가 설정된 경우 쿼리 문자열에 추가
}

// 페이징 링크 생성
echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr);

?>


<section id="point_mng">
    <h2 class="h2_frm">개별회원 포인트 증감 설정</h2>

    <form name="fpointlist2" method="post" id="fpointlist2" action="./point_update.php" autocomplete="off">
        <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
        <input type="hidden" name="stx" value="<?php echo $stx ?>">
        <input type="hidden" name="sst" value="<?php echo $sst ?>">
        <input type="hidden" name="sod" value="<?php echo $sod ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <input type="hidden" name="token" value="<?php echo isset($token) ? $token : ''; ?>">

        <div class="tbl_frm01 tbl_wrap">
            <table>
                <colgroup>
                    <col class="grid_4">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row"><label for="mb_id">회원아이디<strong class="sound_only">필수</strong></label></th>
                        <td><input type="text" name="mb_id" value="<?php echo $mb_id ?>" id="mb_id" class="required frm_input" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="po_content">포인트 내용<strong class="sound_only">필수</strong></label></th>
                        <td><input type="text" name="po_content" id="po_content" required class="required frm_input" size="80"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="po_point">포인트<strong class="sound_only">필수</strong></label></th>
                        <td><input type="text" name="po_point" id="po_point" required class="required frm_input"></td>
                    </tr>
                    <?php if ($config['cf_point_term'] > 0) { ?>
                        <tr>
                            <th scope="row"><label for="po_expire_term">포인트 유효기간</label></th>
                            <td><input type="text" name="po_expire_term" value="<?php echo $po_expire_term; ?>" id="po_expire_term" class="frm_input" size="5"> 일</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="btn_confirm01 btn_confirm">
            <input type="submit" value="확인" class="btn_submit btn">
        </div>

    </form>

</section>

<script>
    function fpointlist_submit(f) {
        if (!is_checked("chk[]")) {
            alert(document.pressed + " 하실 항목을 하나 이상 선택하세요.");
            return false;
        }

        if (document.pressed == "선택삭제") {
            if (!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
                return false;
            }
        }

        return true;
    }
</script>

<?php
require_once './admin.tail.php';
