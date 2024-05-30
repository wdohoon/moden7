<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>	
<div id="point" class="new_win">
    <h1 id="win_title"><?php echo $g5['title'] ?></h1>

    <div class="new_win_con2">
        <ul class="point_all">
        	<li class="full_li">
        		등록된 MANAGER 현황
        		<span><?php echo $total_count; ?>명</span>
        	</li>
		</ul>
        <ul class="point_list">
            <?php            
            $i = 0;
            foreach((array) $list as $row){

            ?>
            <li class="<?php echo $point_use_class; ?>">
				<div>
					<div class="point_top">
						<span class="point_tit"><?php echo $row['mb_id']; ?> / <?php echo $row['mb_name']; ?></span>
					</div>
					<span class="point_date1"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row['mb_datetime']; ?></span>
				</div>
				<a href="javascript:;" onClick="manager_edit(this)" id="<?php echo $row['mb_id'];?>" style="color:red;">삭제</a>
				
            </li>
            <?php
                $i++;
            }   // end foreach

            if ($i == 0){
                echo '<li class="empty_li">자료가 없습니다.</li>';
            }
            ?>

            <!-- <li class="point_status">
                소계
                <span><?php echo $sum_point1; ?></span>
                <span><?php echo $sum_point2; ?></span>
            </li> -->
        </ul>
    </div>
	<script>
		//var manager_id = <?php echo $row['mb_id'];?>;
		let manager_id;
		function manager_edit(e){
			manager_id = $(e).attr('id');
			console.log(manager_id);
			$.ajax({
				type: "POST",
				url: "manager_list_edit.php",
				data: { manager_id : manager_id },
				success: function(response) {
					//console.log(response);
					console.log("업데이트 성공");
				},
				error: function(xhr, status, error) {
					console.error("에러 발생: " + error);
				}
			});
		}
	</script>
    <?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?>

    <button type="button" onclick="javascript:window.close();" class="btn_close">창닫기</button>
</div>