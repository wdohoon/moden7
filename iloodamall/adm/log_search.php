<?php
$sub_menu = '200810';
include_once('./_common.php');
include_once(G5_LIB_PATH.'/log.lib.php');

auth_check_menu($auth, $sub_menu, 'r');

$g5['title'] = '접속 로그';
include_once('./admin.head.php');
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');

$colspan = 6;
$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'">처음</a>'; //페이지 처음으로 (초기화용도)
$sql_search = '';

if(isset($sfl) && $sfl && !in_array($sfl, array('log_name','log_history','log_work','log_date','log_result','log_use','log_userid','log_ip')) ) {
    $sfl = '';
}
?>

<div class="local_sch local_sch01">
    <form name="fvisit" method="get" onsubmit="return fvisit_submit(this);">
    <?php echo $listall?>
    <label for="sch_sort" class="sound_only">검색분류</label>
    <select name="sfl" id="sch_sort" class="search_sort">
        <option value="log_ip"<?php echo get_selected($sfl, 'log_ip'); ?>>IP</option>
        <option value="log_date"<?php echo get_selected($sfl, 'log_date'); ?>>날짜</option>
        <option value="log_userid"<?php echo get_selected($sfl, 'log_userid'); ?>>아이디</option>
        <option value="log_work"<?php echo get_selected($sfl, 'vi_read'); ?>>읽기</option>
        <option value="log_work"<?php echo get_selected($sfl, 'vi_append'); ?>>추가</option>
        <option value="log_work"<?php echo get_selected($sfl, 'vi_change'); ?>>변경</option>
        <option value="log_work"<?php echo get_selected($sfl, 'vi_delete'); ?>>삭제</option>
    </select>
    <label for="sch_word" class="sound_only">검색어</label>
    <input type="text" name="stx" size="20" value="<?php echo stripslashes($stx); ?>" id="sch_word" class="frm_input">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</div>

<div class="tbl_wrap tbl_head01">
    <table>
    <thead>
    <tr>
        <th scope="col">메뉴 이름</th>
        <th scope="col">상세내역</th>
        <th scope="col">작업</th>
        <th scope="col">일시</th>
        <th scope="col">사용</th>
        <th scope="col">사용자 계정</th>
        <th scope="col">사용자 이름</th>
        <th scope="col">IP</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql_common = " from {$g5['log_table']} ";
    if ($sfl) {
        if($sfl=='log_ip' || $sfl=='log_date'){
            $sql_search = " where $sfl like '$stx%' ";
        }else{
            $sql_search = " where $sfl like '%$stx%' ";
        }
    }
    $sql = " select count(*) as cnt
                {$sql_common}
                {$sql_search} ";
    $row = sql_fetch($sql);
    $total_count = $row['cnt'];

    $rows = $config['cf_page_rows'];
    $total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
    if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
    $from_record = ($page - 1) * $rows; // 시작 열을 구함

    $sql = " select *
                {$sql_common}
                {$sql_search}
                order by vi_id desc
                limit {$from_record}, {$rows} ";
    $result = sql_query($sql);

    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $brow = $row['vi_browser'];
        if(!$brow)
            $brow = get_brow($row['vi_agent']);

        $os = $row['vi_os'];
        if(!$os)
            $os = get_os($row['vi_agent']);

        $device = $row['vi_device'];

        $link = "";
        $referer = "";
        $title = "";
        if ($row['vi_referer']) {

            $referer = get_text(cut_str($row['vi_referer'], 255, ""));
            $referer = urldecode($referer);

            if (!is_utf8($referer)) {
                $referer = iconv('euc-kr', 'utf-8', $referer);
            }

            $title = str_replace(array("<", ">"), array("&lt;", "&gt;"), $referer);
            $link = '<a href="'.get_text($row['vi_referer']).'" target="_blank" title="'.$title.'">';
        }

        if ($is_admin == 'super')
            $ip = $row['log_ip'];
        else
            $ip = preg_replace("/([0-9]+).([0-9]+).([0-9]+).([0-9]+)/", G5_IP_DISPLAY, $row['log_ip']);

        $bg = 'bg'.($i%2);
    ?>
    <tr class="<?php echo $bg; ?>">
        <td class="td_id"><a href=""></a></td>
        <td class="td_id"><a href=""></a></td>
        <td class="td_id"><a href=""></a></td>
        <td class="td_datetime"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sfl=log_date&amp;stx=<?php echo $row['log_date']; ?>"><?php echo $row['log_date']; ?></a> <?php echo $row['log_date']; ?></td>
        <td class="td_id"><a href=""></a></td>
        <td class="td_id"><a href=""></a></td>
        <td class="td_id"><a href=""></a></td>
        <td class="td_id"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sfl=log_ip&amp;stx=<?php echo $ip; ?>"><?php echo $ip; ?></a></td>
    </tr>
    <?php } ?>
    <?php if ($i == 0) echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>'; ?>
    </tbody>
    </table>
</div>

<?php
$domain = isset($domain) ? $domain : '';
$pagelist = get_paging($config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;domain='.$domain.'&amp;page=');
if ($pagelist) {
    echo $pagelist;
}
?>

<script>
$(function(){
    $("#sch_sort").change(function(){ // select #sch_sort의 옵션이 바뀔때
        if($(this).val()=="vi_date"){ // 해당 value 값이 vi_date이면
            $("#sch_word").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+0d" }); // datepicker 실행
        }else{ // 아니라면
            $("#sch_word").datepicker("destroy"); // datepicker 미실행
        }
    });

    if($("#sch_sort option:selected").val()=="vi_date"){ // select #sch_sort 의 옵션중 selected 된것의 값이 vi_date라면
        $("#sch_word").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+0d" }); // datepicker 실행
    }
});

function fvisit_submit(f)
{
    return true;
}
</script>

<?php
include_once('./admin.tail.php');
