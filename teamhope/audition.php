<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/audition.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>

<style>
	#audition {
		width: 1280px;
		margin:0 auto;
		padding: 300px 0 210px 0;
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	#audition .audition_tit{
		text-align:center;
	}
	#audition .audition_tit h1{
		font-size: 60px;
		margin-bottom:100px;
	}
	#audition .audition_tit span{
		font-size: 24px;
	}
	#audition .audition_tit p{
		font-size: 16px;
		margin-top: 30px;
		margin-bottom: 90px;
	}
	#audition .procedure .procedure_tit h4{
		font-size: 36px;
		text-align:center;
		margin-bottom:60px;
	}
	#audition .procedure .procedure_img{
		display: flex;
		gap: 60px;
	}
	#audition .procedure .audition_info{
		margin-top: 90px;
	}
	#audition .procedure .audition_info ul{
		display: flex;
		justify-content: space-around;
	}
	#audition .procedure .audition_info ul li h4{
		font-size: 24px;
		margin-bottom: 20px;
	}
	#audition .procedure .audition_info ul li{
		display: flex;
		gap:10px;
		flex-direction: column;
	}
	#audition .procedure .audition_info ul li p{
		font-size: 18px;
	}
	#audition .procedure .audition_info ul li button{
		width: 520px;
		height: 80px;
		border: solid 2px #000;
		background: #fff;
		border-radius: 50px;
		margin: 50px 0 80px 0;
		font-size: 18px;
		font-weight: bold;
		cursor:pointer;
	}
	#audition .notice_wrap{
		background: #f6f6f6;
		border-radius: 100px;
		width: 1065px;
		height: 210px;
		display: flex;
		align-items: center;
		justify-content: space-evenly;
	}
	#audition .notice_wrap .notices{
		border-left: solid 1px #ccc;
		padding-left: 70px;
		height: 140px;
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
	#audition .notice_wrap .notice h4{
		font-size: 24px;
		font-weight: bold;
	}
	#audition .notice_wrap .notices p{
		font-size: 16px;
		opacity: 0.6;
	}
</style>
<div id="audition">
	<div class="audition_tit">
		<h1>AUDITION</h1>
		<span>TEAMHOPE에서 저희와 함께 성장할 신인 배우를 모집합니다. </span>
		<p>현재 TEAMHOPE의 모든 오디션은 아래 안내되는 온라인 접수로만 진행되오니, 참여 방법에 따라 지원해주시기 바랍니다.</p>
	</div>

	<div class="procedure">
		<div class="procedure_tit">
			<h4>오디션 과정</h4>
		</div>

		<div class="procedure_img">
			<img src="/images/au_1.png" alt="">
			<img src="/images/au2.png" alt="">
			<img src="/images/au_3.png" alt="">
		</div>

		<div class="audition_info">
			<ul>
				<li>
					<h4>제출서류</h4>
					<p>· 오디션 지원서</p>
					<p>· 개인 프로필 사진</p>
					<p>· 자기소개영상 (1분 이내 연기 영상)</p>
				</li>
				<li>
					<h4>접수방법</h4>
					<p>하단의 지원서 양식을 다운로드 한 후  </p>
					<p>teamhope.ent@gmail.com 으로 E-Mail 접수,</p> 
					<p>접수 시 파일명과 메일 제목은 <strong>[TEAMHOPE] 성별_성함_연락처</strong>로 통일해주세요.</p>
					<?php
					// 경로는 서버에 업로드된 파일의 경로로 설정해야 합니다.
					$file_path = '/TEAMHOPE_AUDITION.docx';
					?>
					<button onclick="location.href='<?php echo $file_path; ?>'">지원서 다운 받기</button>
				</li>
			</ul>
		</div>
		
		<div class="notice_wrap">
			<div class="notice">
				<h4>유의사항</h4>
			</div>
			<div class="notices">
				<p>· 제출된 모든 오디션 자료는 반환하지 않습니다.</p>
				<p>· 지원 방법과 양식에 벗어난 지원자의 경우 심사 대상에서 제외됩니다.</p>
				<p>· 미성년자의 경우 부모님의 동의서가 필요합니다.</p>
			</div>
		</div>
	</div>
</div>


<?php
include_once(G5_PATH.'/tail.php');