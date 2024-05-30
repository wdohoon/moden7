<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if (!defined("_ORDERINQUIRY_")) exit; // 개별 페이지 접근 불가

// 테마에 orderinquiry.sub.php 있으면 include
if(defined('G5_THEME_SHOP_PATH')) {
    $theme_inquiry_file = G5_THEME_SHOP_PATH.'/orderinquiry.sub.php';
    if(is_file($theme_inquiry_file)) {
        include_once($theme_inquiry_file);
        return;
        unset($theme_inquiry_file);
    }
}

?>

<!-- 주문 내역 목록 시작 { -->
<?php if (!$limit) { ?>총 <?php echo $cnt; ?> 건<?php } ?>

<style>
.sv_tx02{font-size: 40px;padding: 80px 0;text-align:center}
.tbl_head03{padding-bottom: 80px;}
.mo_sod_con{display: none;
}
@media only screen and (max-width: 1024px) { /* viewport width : 1024 */

.tbl_head03{display: none;} 
.mo_sod_con{display: block;padding: 0 20px;}
}
</style>

<div class="tbl_head03 tbl_wrap">
    <table>
    <thead>
    <tr>
        <th scope="col">주문서번호</th>
        <th scope="col">주문일시</th>
        <th scope="col">상품수</th>
        <th scope="col">주문금액</th>
        <th scope="col">입금액</th>
        <th scope="col">미입금액</th>
        <th scope="col">상태</th>
        <th scope="col">거래명세서</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = " select *
               from {$g5['g5_shop_order_table']}
              where mb_id = '{$member['mb_id']}'
              order by od_id desc
              $limit ";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++)
    {
        $uid = md5($row['od_id'].$row['od_time'].$row['od_ip']);

        switch($row['od_status']) {
            case '주문':
                $od_status = '<span class="status_01">입금확인중</span>';
                break;
            case '입금':
                $od_status = '<span class="status_02">입금완료</span>';
                break;
            case '준비':
                $od_status = '<span class="status_03">상품준비중</span>';
                break;
            case '배송':
                $od_status = '<span class="status_04">상품배송</span>';
                break;
            case '완료':
                $od_status = '<span class="status_05">배송완료</span>';
                break;
            default:
                $od_status = '<span class="status_06">주문취소</span>';
                break;
        }
    ?>

    <tr>
        <td>
            <a href="<?php echo G5_SHOP_URL; ?>/orderinquiryview.php?od_id=<?php echo $row['od_id']; ?>&amp;uid=<?php echo $uid; ?>"><?php echo $row['od_id']; ?></a>
        </td>
        <td><?php echo substr($row['od_time'],2,14); ?> (<?php echo get_yoil($row['od_time']); ?>)</td>
        <td class="td_numbig"><?php echo $row['od_cart_count']; ?></td>
        <td class="td_numbig text_right"><?php echo display_price($row['od_cart_price'] + $row['od_send_cost'] + $row['od_send_cost2']); ?></td>
        <td class="td_numbig text_right"><?php echo display_price($row['od_receipt_price']); ?></td>
        <td class="td_numbig text_right"><?php echo display_price($row['od_misu']); ?></td>
        <td><?php echo $od_status; ?></td>
		<td>
            <?php
            if ($row['od_settle_case'] == '무통장' && $row['od_status'] == '완료') {
            ?>
                <a href="<?php echo G5_SHOP_URL; ?>/orderinquiryview2.php?od_id=<?php echo $row['od_id']; ?>&amp;uid=<?php echo $uid; ?>" target="_blank">출력</a>
            <?php
            }
            if ($row['od_settle_case'] == '무통장' && $row['od_status'] == '취소') {
            ?>
                <a href="<?php echo G5_SHOP_URL; ?>/order_cancelview.php?od_id=<?php echo $row['od_id']; ?>&amp;uid=<?php echo $uid; ?>" target="_blank">출력</a>
            <?php
            }
            ?>
        </td>
		<?php ?>
    </tr>

    <?php
    }

    if ($i == 0)
        echo '<tr><td colspan="7" class="empty_table">주문 내역이 없습니다.</td></tr>';
    ?>
    </tbody>
    </table>
</div>
	<div class="mo_sod_con">
		<?php include G5_MSHOP_PATH.'/orderinquiry.sub.php'; ?>	
	</div>
<!-- } 주문 내역 목록 끝 -->