<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
	
<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2>나의 미션펀딩</h2>
</header>


<div class="tabs">
	<a href="/mymission.php" class="active">내가 쓴 글</a>
	<a href="<?php echo G5_URL?>/mymission_history.php">참여내역</a>
</div>
<hr class="hr">

<div class="funding-list-code">나의 미션코드: abcdabcd</div>
<div class="funding-list-wrap">
	<ul class="funding-list">
		<?php 
		$sql = " select * from g5_write_mission where mb_id = '{$member['mb_id']}' ";
		$result = sql_query($sql);
		$total = sql_num_rows($result);

		for($i = 0 ; $mis = sql_fetch_array($result) ; $i++) {
		?>
		<li>
			<div class="day"><?php echo $mis['wr_datetime'];?></div>
			<div class="item">
				<div class="img"><img src="img/funding/tmp_thum.jpg"></div>
				<div class="text">
					<h3><?php echo $mis['wr_subject'];?></h3>
					<div class="btns">
						<a href="<?php echo get_pretty_url('mission', $mis['wr_id']);?>" class="b1">글 보기</a>
						<a href="<?php echo short_url_clean(G5_BBS_URL.'/write.php?bo_table=mission&w=u&wr_id='.$mis['wr_id']);?>" class="b2">글 편집</a>
						<a href="<?php echo G5_URL?>/mymission_funding.php" class="b3">펀딩 현황</a>
						<button class="b4">심사승인</button>
					</div>
				</div>
			</div>
		</li>
		<?php }

		if($total == 0) {
			echo '<li>내가 쓴 글이 없습니다.</li>';
		}
		?>
		
	</ul>
</div>

<?php
include_once(G5_PATH.'/tail.php');
	
	