 <?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet" href="../css/index.css">
<style>
	.who_bg .who_box span{
		font-size: 26px ;
	}
	.privacys .privacy_wrap{
		padding: 150px 250px;
	}
	.privacys .privacy_wrap .privacy .privacy_tit span{
		color: #002e6c;
		font-size: 14px;
		font-weight: bold;
		letter-spacing: 4px;
	}
	.privacys .privacy_wrap .privacy .privacy_tit h2{
		font-size: 44px;
	}
	.privacys .privacy_wrap .privacy .solid{
		border: solid 1px #ccc;
		margin: 40px 0 40px 0;
	}
	.privacys .privacy_wrap .privacy .policy_wrap{
		width: 60%;
	}
	.privacys .privacy_wrap .privacy .policy_wrap .policy{
		margin-bottom: 60px;
	}
	.privacys .privacy_wrap .privacy .policy_wrap .policy h3{
		font-size: 24px;
		margin-bottom: 30px;
	}
	.privacys .privacy_wrap .privacy .policy_wrap .policy p{
		font-size: 16px;
	}
	.privacys .privacy_wrap .privacy .policy_wrap .detail{
		margin-bottom: 30px;
	}
	.privacys .privacy_wrap .privacy .policy_wrap .detail h4{
		font-size: 16px;
		margin-bottom: 20px;
	}
	.privacys .privacy_wrap .privacy .policy_wrap .detail p{
		font-size: 16px;
		line-height: 2;
	}
	.privacys .privacy_wrap .privacy .policy_wrap .detail table{
		border-color: #ccc;
		width: 920px;
	}
	.privacys .privacy_wrap .privacy .policy_wrap .detail table thead tr th{
		background: #f5f5f5;
		font-size: 16px;
		width: auto;
		height: 60px;
	}
	.privacys .privacy_wrap .privacy .policy_wrap .detail table tbody tr td{
		font-size: 14px;
		height: 60px;
		padding: 20px 35px 20px 35px;
	}
	@media (max-width: 1680px) {
		.privacys .privacy_wrap {
			padding: 8.93vw 9.52vw;
		}
	}
	@media (max-width: 1440px) {
		.privacys .privacy_wrap .privacy .policy_wrap .detail table{
			width: 63.89vw;
		}
	}
	@media (max-width: 768px) {
		.privacys .privacy_wrap .privacy .policy_wrap{
			width: 100%;
		}
		.privacys .privacy_wrap .privacy .policy_wrap .detail table{
			width: 100%;
		}
		.privacys .privacy_wrap {
			padding: 8.93vw 2.52vw;
		}
		.privacys .privacy_wrap .privacy .policy_wrap .detail table tbody tr td{
			padding: 1.6vw 2.56vw 1.6vw 2.56vw;
		}
	}

</style>
<div class="privacys">
	<?php 
		$sv_tit = 'PRIVACY';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/privacy.php';
		$sv_title = 'PRIVACY';
		include_once('./include/sv_01.php');
	
	?>
	
	<div class="privacy_wrap">
		<div class="privacy">
			<div class="privacy_tit">
				<span>KOREA'S NO.1 BROKERAGE FIRM</span>
				<h2>PRIVACY</h2>
			</div>
			<div class="solid"></div>
			<div class="policy_wrap">
				<div class="policy">
					<h3>KIDB 채권중개 개인정보처리방침</h3>
					<p>케이아이디비채권중개(주)(이하 ‘회사’라 한다)는 「개인정보 보호법」 제30조에 따라 정부주체의 개인정보를 보호하고 이와 관련한 고충을 신속하고 원활하게 처리할 수 있도록 하기 위하여 다음과 같이 개인정보 처리방침을 수립·공개합니다.</p>
				</div>
				<div class="detail">
					<h4>제1조(개인정보의 처리목적)</h4>
					<p>① 회사에서 처리하고 있는 개인정보는 이용목적에만 사용되며 목적 이외의 용도로는 사용되지 않습니다. 또한, 이용 목적이 변경되는 경우에는 개인정보 보호법에 따라 별도의 동의를 받는 등 필요한 조치를 이행할 예정입니다.</p>
					<p>② 각각의 개인정보 처리목적은 [별표1. 개인정보 보유현황 및 처리방침]의 처리 목적과 같습니다.</p>
				</div>
				<div class="detail">
					<h4>제2조(개인정보의 처리목적)</h4>
					<p>① 회사는 법령에 따른 개인정보 보유ㆍ이용기간 또는 정보주체로부터 개인정보를 수집시에 동의받은 개인정보 보유ㆍ이용기간 내에서 개인정보를 처리ㆍ보유합니다.</p>
					<p>② 각각의 개인정보 처리 및 보유 기간은 [별표1. 개인정보 보유현황 및 처리방침]의 보유방법 및 보유기간(파기날짜)과 같습니다.</p>
				</div>
				<div class="detail">
					<h4>제9조(개인정보의 처리목적)</h4>
					<p>① 회사는 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련한 정보주체의 불만처리 및 피해구제 등을 위하여 개인정보 보호책임자를 지정하고 있습니다.</p>
					<p style="margin-top:20px">▶ 개인정보 보호책임자</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp성    명 : 오윤정</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp부    서 : 경영지원본부</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp직    책 : 본부장</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp연락처 : <전화번호 : 02-772-7866></p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<팩스번호 : 02-772-7869></p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<이  메  일 : euniceoh@kidbbond.net></p>
					<p style="margin-top:20px">② 정보주체께서는 회사의 서비스(또는 사업)을 이용하시면서 발생한 모든 개인정보 보호 관련 문의, 불만처리 피해구제 등에 관한 사항을 개인정보 보호책임자 및 담당부서로 문의하실 수 있습니다. 회사는 정보주체의 문의에 대해 지체없이 답변 및 처리해드릴 것입니다.</p>
				</div>
				<div class="detail">
					<h4>제13조(개인정보의 처리방침 변경)</h4>
					<p>① 이 개인정보 처리방침은 2020. 12. 24.부터 적용됩니다.</p>
					<p>② 내용의 추가, 삭제 및 수정이 있을 시에는 변경되는 내용을 회사내에 공지하도록 하겠습니다.</p>
					<p>&nbsp&nbsp&nbsp&nbsp - 2015. 11. 01 ~ 2020. 12. 23 적용</p>
				</div>
				<div class="detail">
					<h4>[별표1. 개인정보 보유현황 및 처리방침]</h4>
					<table border="1">
						<thead>
							<tr> 
								<th>위탁,제공받는자</th>
								<th>항목 목적</th>
								<th>개인정보</th>
								<th>보유기간</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>오춘식세무회계사무소(위탁)</td>
								<td>임직원 급여 및 연말정산</td>
								<td>성명,생년월일 등 고유식별번호</td>
								<td>법정신고 기한이 지난날로부터 5년간 보관후,파기</td>
							</tr>
							<tr>
								<td>유한회사 딜로그 (위탁)</td>
								<td>퇴즉급여 계리 평가</td>
								<td>성명,생년월일 등 고유식별번호</td>
								<td>법정신고 기한이 지난날로부터 5년간 보관후,파기</td>
							</tr>
							<tr>
								<td>다산회계법인, 삼일회계법인 (위탁)</td>
								<td>회계감사</td>
								<td>성명,생년월일 등 고유식별번호</td>
								<td>법정신고 기한이 지난날로부터 5년간 보관후,파기</td>
							</tr>
							<tr>
								<td>세브란스체크업 (위탁)</td>
								<td>건강검진</td>
								<td>성명,전화번호,주민등록번호 등 고유식별번호</td>
								<td>5년간 보관후, 파기</td>
							</tr>
							<tr>
								<td>유한회사 딜로그 (위탁)</td>
								<td>퇴직급여 계리 평가</td>
								<td>성명,생년월일 등 고유식별번호</td>
								<td>퇴사후 재 갱신 시,자동파기</td>
							</tr>
							<tr>
								<td>오춘식세무회계사무소(위탁)</td>
								<td>임직원 급여 및 연말정산</td>
								<td>성명,소속부서,전화번호,e-mail 등 고유식별번호</td>
								<td>목적달성 후,즉시파기</td>
							</tr>
						</tbody>
					</table>
				</div>
		
			</div>
		</div>

<!-- 		<?php
			$co_id = 'privacy';
			$co = get_content_db($co_id);
			$str = conv_content($co['co_content'], $co['co_html'], $co['co_tag_filter_use']);
			echo $str;
		?> -->
	</div>

</div>


<?php
include_once(G5_PATH.'/tail.php');