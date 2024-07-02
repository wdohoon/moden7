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
	<h2>설정</h2>
</header>
	
	
	<div class="setting">
		<div>
			<ul>
				<li><a href="/mypage.php">내 정보</a></li>
				<li><a href="/bbs/board.php?bo_table=notice">공지사항 및 이벤트</a></li>
				<li><a href="/invite.php">초대하기</a></li>
				<li><a href="/ver_info.php">버전정보</a></li>
				<li><a href="#" data-toggle="modal" data-target="#modalLogout">로그아웃</a></li>
			</ul>
		</div>
		<div>
			<div class="tit">약관 및 정책</div>
			<ul>
				<li><a href="/agree1.php">이용약관</a></li>
				<li><a href="/agree2.php">개인정보 처리방침</a></li>
			</ul>
		</div>
		<div>
			<ul>
				<li><a href="/csc.php">고객센터</a></li>
				<li class="last"><a href="/lang.php">언어설정</a></li>
			</ul>
		</div>
	</div>
	
	
	
	
	
	<div class="modal" id="modalLogout">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>알림</h5>
					<button class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="modal-logout">
						<strong>로그아웃 하시겠습니까?</strong>
						<p>다시 월렛에 로그인하면 서비스 이용이 가능합니다.</p>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn1 block btn-s" data-dismiss="modal">예</button>
					<button class="btn2 block btn-s" data-dismiss="modal">취소</button>
				</div>
			</div>
		</div>
	</div>
	
	<script>
	//$('#modalAlert11').modal();
	$(".modal-footer .btn1").click(function(){
		location.href="/bbs/logout.php";
	})
	</script>
	
	
	
<?php
include_once(G5_PATH.'/tail.php');
?>