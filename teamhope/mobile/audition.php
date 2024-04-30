<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

include_once(G5_MOBILE_PATH.'/head.php');
?>

<!-- 메인화면 최신글 시작 -->

<style>
	#audition {
		padding: 200px 0 200px 0;
		display: flex;
		flex-direction: column;
		align-items: center;
		margin:0 auto;
		max-width: 660px;
		text-align:center;
		line-height:2;
	}
	#audition .audition_tit{
		text-align:center;
		width: 90%;
	}
	#audition .audition_tit h1{
		font-size: 60px;
		margin-bottom:100px;
	}
	#audition .audition_tit span{
		font-size: 24px;
		font-weight:bold;
	}
	#audition .audition_tit p{
		font-size: 16px;
		margin-top: 50px;
		margin-bottom: 90px;
	}
	#audition .procedure .procedure_tit h4{
		font-size: 36px;
		text-align:center;
		margin-bottom:60px;
	}
	#audition .procedure .procedure_img{
		display: flex;
		gap: 20px;
		width: 100%;
		justify-content: center;
		flex-direction: column;
		align-items: center;
	}
	#audition .procedure .audition_info{
		width: 90%;
		margin: 30px auto;
	}
	#audition .procedure .audition_info ul{
		display: flex;
		flex-direction: column;
		gap:100px;
	}
	#audition .procedure .audition_info ul li h4{
		font-size: 24px;
		margin-bottom: 20px;
	}
	#audition .procedure .audition_info ul li{
		display: flex;
		flex-direction: column;
	}
	#audition .procedure .audition_info ul li p{
		font-size: 16px;
	}
	#audition .procedure .audition_info ul li button{
		width: 100%;
		height: 100px;
		border: solid 2px #000;
		background: #fff;
		border-radius: 50px;
		margin: 50px 0 80px 0;
		font-size: 28px;
		font-weight: bold;
		cursor:pointer;
	}
	#audition .notice_wrap{
		border-radius: 100px;
		max-width: 660px;
		height: 326px;
		display: flex;
		align-items: center;
		flex-direction: column;
	}
	#audition .notice_wrap .notice{padding: 40px 0 40px 0;}
	#audition .notice_wrap .notices{
		width: 90%;
		border-top: solid 1px #ccc;
		display: flex;
		flex-direction: column;
		justify-content: center;
		padding: 48px 0 64px 0;
	}
	#audition .notice_wrap .notice h4{
		font-size: 24px;
		font-weight: bold;
	}
	#audition .notice_wrap .notices p{
		font-size: 16px;
		text-align:center;
	}
	#audition .procedure .procedure_img .au1,
	#audition .procedure .procedure_img .au2{width: 50%; display: flex;justify-content:center; align-items:center;}
	#audition .procedure .procedure_img .au3{width: 50%;display: flex;justify-content:center; align-items:center;}

	#audition .procedure .procedure_img .au1 img,
	#audition .procedure .procedure_img .au2 img,
	#audition .procedure .procedure_img .au3 img{width: 100%;}
</style>
<div id="audition">

	<div class="audition_tit">
		<h1>AUDITION</h1>
		<span>TEAMHOPE에서 저희와 함께 <br>성장할 신인 배우를 모집합니다. </span>
		<p>현재 TEAMHOPE의 모든 오디션은 <br>아래 안내되는 온라인 접수로만 진행되오니, <br>참여 방법에 따라 지원해주시기 바랍니다.</p>
	</div>

	<div class="procedure">
		<div class="procedure_tit">
			<h4>오디션 과정</h4>
		</div>

		<div class="procedure_img">
			<div class="au1">
				<img src="/images/au1_mo.png" alt="">
			</div>
			<div class="au2">
				<img src="/images/au2_mo.png" alt="">
			</div>
			<div class="au3">
				<img src="/images/au3_mo.png" alt="">
			</div>
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
					<p>접수 시 파일명과 메일 제목은</p>
					<p style="letter-spacing:-1px;"><strong>[TEAMHOPE] 성별_성함_연락처</strong>로 통일해주세요.</p>
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
				<p>· 지원 방법과 양식에 벗어난 지원자의 경우 심사</p>
				<p>대상에서 제외됩니다.</p> 
				<p style="letter-spacing:-1px;">· 미성년자의 경우 부모님의 동의서가 필요합니다.</p>
			</div>
		</div>
	</div>
</div>

<!-- 메인화면 최신글 끝 -->

<?php
include_once(G5_MOBILE_PATH.'/tail.php');