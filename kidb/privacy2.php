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
					<h3>KIDB 자금중개 개인정보처리방침</h3>
					<p>케이아이디비자금중개(주)(이하 ‘회사’라 한다)는 개인정보 보호법에 따라 정보주체의 개인정보를 보호하고 이와 관련한 고충을 신속하고
							원활하게 처리할 수 있도록 하기 위하여 개인정보 처리방침을 수립ㆍ공개합니다..</p>
				</div>
				<div class="detail">
					<h4>제1조(개인정보의 처리목적)</h4>
					<p>
						회사는 다음의 목적을 위하여 개인정보를 처리합니다. 처리하고 있는 개인정보는 다음의 목적 이외의 용도로는
						이용되지 않으며, 이용 목적이 변경되는 경우에는 개인정보 보호법에 따라 별도의 동의를 받는 등 필요한 조치를 이행할 예정입니다.<br><br>
						1. 중개거래 참가기관 담당자 : 중개거래 업무처리 <br>
						2. 임직원(퇴직자 포함) : 임직원 개인기록 관리 잋 각종 복리후생 지원<br>
						3. 입사지원자 : 지원자 평가, 채용절차 진행<br>
						4. 파트타임 근로자 및 배송업무 수탁자 : 채용절차 진행, 급여지급, 법령상 의무이행<br>
						5. 계약체결, 유지관련 : 제안서 평가 및 계약체결 유지<br>
					</p>
				</div>
				<div class="detail">
					<h4>제2조(개인정보의 처리 및 보유기간)</h4>
					<p>
						① 회사는 법령에 따른 개인정보 보유ㆍ이용기간 또는 정보주체로부터 개인정보를 수집시에 동의받은
						개인정보 보유ㆍ이용기간 내에서 개인정보를 처리ㆍ보유합니다. 다만, 중개거래 내역의 확인, 제증명서의 발급, 법령에 따른 회사의 의무
						이행, 감독당국의 요청ㆍ명령에 따라 제출 필요성이 있는 것으로 판단되는 정보에 대해서는 파기하지 않고 보유합니다.<br><br>
						1. 임직원(퇴직자 포함) : 개인정보는 수집·이용·제공에 관한 동의일로부터 근로계약 종료 후 3년간. 다만, 연말정산 목적으로 수집된
						   자료는 해당 소득세 등의 법정 신고 기한이 지난 날부터 5년간, 재직자의 건강진단결과표 및 진단결과 5년, 경력증명을 위한 퇴직자
						   본인동의에 의한 경우 또는 법령상 의무준수를 위하여 불가피한 경우 제외<br>
					  2. 중개거래 참가기관 담당자 : 중개거래를 위해 수집된 개인정보는 해당목적이 달성된때까지<br>
					  3. 입사지원자 : 개인정보는 수집·이용·제공에 관한 동의일로부터 채용여부 확정 후 5일이내. 다만, 채용확정자는 제외되며, 우편 및 직접
						   접수된 경우 입사지원자의 반환요청일 또는 채용여부 확정일로부터 180일이내<br>
					  4.파트타임 근로자 및 배송업무 수탁자 : 개인정보는 수집·이용에 관한 동의일로부터 업무위탁약정서 계약 종료일까지 위 이용목적을
						   위하여 보유·이용됩니다. 업무위탁약정서 계약 종료일 이후에는 본인의 요청에 따른 경력증명서 발급 등 민원처리, 분쟁해결 및 법령상
						   의무이행만을 위해 보유·이용됩니다.<br>
					  5. 계약체결, 유지관련 : 계약체결 및 유지를 위해 수집된 개인정보는 해당 목적이 달성된 때까지 보유 이용됩니다. 단 목적 달성 후에는
						   목적과 관련된 사고 조사, 분쟁 해결 및 법령상 의무이행 만을 위하여 보유·이용됩니다.
					</p>
				</div>
				<div class="detail">
					<h4>제3조(개인정보의 제3자 제공)</h4>
					<p>
						① 회사는 정보주체의 동의를 받은 경우를 제외하고는 정보 주체의 개인정보를 제3자에게 제공하지 않습니다.
						다만, 다음 각 호의 경우에는 개인정보의 수집 목적 범위에서 정보주체의 동의 없이 개인정보를 제3자에게 제공할 수 있습니다.<br><br>
						1. 법률에 특별한 규정이 있거나 법령상 의무를 준수하기 위하여 불가피한 경우<br>
						2. 정보주체 또는 그 법정대리인이 의사표시를 할 수 없는 상태에 있거나 주소불명 등으로 사전동의를 받을 수 없는 경우로서 명백히
						정보 주체 또는 제3자의 급박한 생명, 신체, 재산의 이익을 위하여 필요하다고 인정되는 경우<br>
						3. 통계작성 및 학술연구 등의 목적을 위하여 필요한 경우로서 특정 개인을 알아볼 수 없는 형태로 개인정보를 제공하는 경우<br><br>
						② 회사가 ①항에서 정보주체의 동의를 받아 제3자에게 개인정보를 제공하는 경우에는 다음 각 호의 사항을 정보주체에게 알립니다.<br><br>
						1. 개인정보를 제공받는 자<br>
						2. 개인정보를 제공받는 자의 이용 목적<br>
						3. 제공하는 개인정보의 항목<br>
						4. 개인정보를 제공받는 자의 보유 및 이용기간<br>
						5. 동의를 거부할 권리가 있다는 사실 및 동의 거부에 따른 불이익이 있는 경우에는 그 불이익의 내용<br>
					</p>
				</div>
				<div class="detail">
					<h4>제4조(개인정보처리의 위탁) </h4>
					<p>
						① 회사는 원활한 개인정보 업무처리를 위하여 개인정보 처리업무를 위탁하여 처리할 수 있으며, 이 경우 다음 각 호의 내용이 포함된 문서를 통해 위탁합니다. <br><br>
						1. 위탁업무 수행 목적 외 개인정보의 처리 금지에 관한 사항<br>
						2. 개인정보의 기술적·관리적 보호조치에 관한 사항<br>
						3. 위탁업무의 목적 및 범위<br>
						4. 재위탁 제한에 관한 사항<br>
						5. 개인정보에 대한 접근 제한 등 안전성 확보 조치에 관한 사항<br>
						6. 위탁업무와 관련하여 보유하고 있는 개인정보의 관리 현황 점검 등 감독에 관한 사항<br>
						7. 수탁자가 준수하여야 할 의무를 위반한 경우의 손해배상 등 책임에 관한 사항<br><br>
						② 회사는 위탁하는 업무의 내용과 수탁자를 당사 홈페이지와 회사의 그룹웨어를 통하여 공개합니다.<br>
						③ 회사는 업무 위탁으로 인하여 정보주체의 개인정보가 분실·도난·유출·변조 또는 훼손되지 아니하도록 수탁자를 교육하고 처리 현황을 점검합니다.
					</p>
				</div>
				<div class="detail">
					<h4>제5조(정보주체의 권리ㆍ의무 및 행사방법) </h4>
					<p>
						① 정보주체는 회사에 대해 언제든지 다음 각 호의 개인정보 보호 관련 권리를 행사할 수 있습니다.<br><br>
						1. 개인정보 열람요구<br>
						2. 오류 등이 있을 경우 정정 요구<br>
						3. 삭제요구<br>
						4. 처리정지 요구<br><br>
						② 제1항에 따른 권리 행사는 회사에 대해 행사하실 수 있으며 회사는 이에 대해 지체없이 조치하겠습니다.<br>
						③ 정보주체가 개인정보의 오류 등에 대한 정정 또는 삭제를 요구한 경우에는 회사는 정정 또는 삭제를 완료할 때까지 당해 개인정보를 이용하거나 제공하지 않습니다.<br>
						④ 정보주체는 개인정보 보호법 등 관계법령을 위반하여 회사가 처리하고 있는 정보주체 본인이나 타인의 개인정보 및 사생활을 침해하여서는 아니됩니다.<br>
					</p>
				</div>
				<div class="detail">
					<h4>제6조(처리하는 개인정보 항목) </h4>
					<p>
						회사는 다음의 개인정보 항목을 처리하고 있습니다. <br><br>
						① 중개거래 참가기관 담당자의 개인정보 : 회사명, 회사주소, 성명, 소속부서, 전화번호 및 팩스번호, 이메일주소 등<br>
						② 임직원(퇴직자 포함)의 개인정보<br><br>
						가. 개인식별정보 : 사진, 성명, 주민등록번호(외국인의 경우 외국인 등록번호), 국적, 주소, 전화번호, 전자우편주소<br>
						나. 채용전형 관련정보 : 학력·경력·자격증 보유현황·어학능력 및 입증자료, 상벌내역 및 입증자료, 자기소개<br>
						다. 인사관리 정보 : 입·퇴사일, 사원번호, 소속부서, 직위 및 직책, 내선번호, 업무의 내용, 인사발령 내역, 상벌내역, 교육훈련 내역, 건강검진내역<br>
						라. 급여 정보 : 고용형태, 고용 또는 고용갱신일, 계약기간, 근로계약조건, 급여, 상여 또는 성과급 지급내역, 급여 계좌번호, 퇴직연금가입 내역, 사대보험가입내역, 그 밖의 고용에 관한 사항, 해고, 퇴직 또는 사망한 경우에는 그연월일과 사유, 휴직, 야근 및 휴일근무에 대한 사항, 연말정산시 가족에 대한 사항, 급여의 일부를 공제한 경우에는 그 금액 등<br><br>
						③ 입사지원자<br>
						사진, 성명, 생년월일, 성별, 주소, 전화번호, 전자우편주소, 경력, 학력, 활동사항, 성적, 자격증 보유현황, 어학능력, 상훈, 병역, 자기소개<br><br>
						④ 파트타임 근로자 및 배송업무 수탁자의 개인정보<br><br>
						가. 개인식별정보 : 사진, 성명, 주민등록번호(외국인의 경우 외국인 등록번호), 국적, 전화번호, 주소, 전자우편주소<br>
						나. 채용전형 관련정보 : 학력, 경력, 자격증 보유현황, 어학능력, 상벌내역, 자기소개<br>
						다. 인사관리 정보 : 입·퇴사일, 소속부서<br>
						라. 급여 정보 : 급여, 급여계좌번호<br><br>
						⑤ 외부용역계약 체결과 관련한 개인정보 : 계약체결 및 유지관련 담당자 성명, 전화번호, 전자우편주소
					</p>
				</div>
				<div class="detail">
					<h4>제7조(개인정보의 파기)</h4>
					<p>
						① 회사는 개인정보 보유기간의 경과, 처리목적 달성 등 개인정보가 불필요하게 되었을 때에는 지체없이 해당 개인정보를 파기합니다.<br>
						② 정보주체로부터 동의받은 개인정보 보유기간이 경과하거나 처리목적이 달성되었음에도 불구하고 다른 법령에 따라 개인정보를 계속 보존하여야 하는 경우에 보유근거에 따라 보유할수 있습니다.<br>
						③ 개인정보 파기의 절차 및 방법은 다음 각호와 같습니다.<br><br>
						1. 파기절차<br>
						회사는 파기 사유가 발생한 개인정보를 선정하고 회사의 개인정보 보호책임자의 승인을 받아 개인정보를 파기합니다.<br>
						2. 파기방법 <br>
						회사는 전자적 파일 형태로 기록ㆍ저장된 개인정보는 기록을 재생할 수 없도록 파기하며, 종이 문서에 기록ㆍ저장된 개인정보는 분쇄기로 분쇄하거나 소각하여 파기합니다. 단, 개인정보의 일부만을 파기하는 경우, 또는 위의 방법으로 파기하는 것이 어려운 때에는<br>
						▶ 전자적 파일 형태인 경우 : 개인정보를 삭제한 후 복구 및 재생되지 않도록 관리 및 감독<br>
						▶ 기록물, 인쇄물, 서면, 그밖의 기록매체인 경우 : 해당 부분을 마스킹, 천공등으로 삭제하여야 합니다.
					</p>
				</div>
				<div class="detail">
					<h4>제8조(개인정보 보호책임자)</h4>
					<p>① 회사는 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련한 정보주체의 불만처리 및 피해구제 등을 위하여 개인정보 보호책임자를 지정하고 있습니다. <br><br></p>	
					<p style="margin-top:20px">▶ 개인정보 보호책임자</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp성    명 : 송주영</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp직    책 : 상무</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp연락처 : <전화번호 : 02-311-7515></p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<팩스번호 : 02-311-7558></p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<이  메  일 :  jysong@kidbbmbc.co.kr></p>
					<p style="margin-top:20px">
					② 정보주체께서는 회사의 서비스(또는 사업)을 이용하시면서 발생한 모든 개인정보 보호 관련 문의, 불만처리, 피해구제 등에 관한 사항을 개인정보 보호책임자 및 담당부서로 문의하실 수 있습니다. 회사는 정보주체의 문의에 대해 지체없이 답변 및 처리해드릴 것입니다.
					</p>
				</div>
				<div class="detail">
					<h4>제9조(개인정보의 안전성 확보조치) </h4>
					<p>
						회사는 개인정보의 안전성 확보를 위해 다음과 같은 조치를 취하고 있습니다. <br><br>
						1. 관리적 조치 : 내부관리계획 수립ㆍ시행, 정기적 직원 교육 등<br>
						2. 기술적 조치 : 업무용컴퓨터에 저장된 개인정보관련파일 암호화, 해당 업무용컴퓨터 보안프로그램 설치 등<br>
						3. 물리적 조치 : 개인정보문서보관함 시건장치 등의 접근통제
					</p>
				</div>
				<div class="detail">
					<h4>제10조(개인정보 열람청구)</h4>
					<p>
						정보주체는 개인정보 보호법에 따른 개인정보의 열람 청구를 아래의 부서에 할 수 있습니다. 회사는 정보주체의 개인정보 열람청구가 신속하게 처리되도록 노력하겠습니다. <br><br>
					</p>
					<p style="margin-top:20px">▶ 개인정보 열람청구 접수ㆍ처리 부서</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp성    명 : 박세영</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp직    책 : 사원</p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp연락처 : <전화번호 : 02-311-7506></p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<팩스번호 : 02-311-7558></p>
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<이  메  일 :   ksshin@kidbbmbc.co.kr></p>
				</div>
				<div class="detail">
					<h4>제11조(개인정보 처리방침 변경)</h4>
					<p>
						① 이 개인정보 처리방침은 2020. 12. 01.부터 적용됩니다. <br>
						② 내용의 추가, 삭제 및 수정이 있을 시에는 변경되는 내용을 변경전 내용과 함께 회사홈페이지와 화사그룹웨어를 통하여 공지하도록 하겠습니다.<br><br>
					</p>
					<table border="1">
						<thead>
							<tr> 
								<th>위탁받는자</th>
								<th>항목 목적</th>
								<th>개인정보</th>
								<th>보유기간</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>오춘식세무회계사무소</td>
								<td>임직원 급여 및 연말정산</td>
								<td>성명,생년월일 등 고유식별번호</td>
								<td>법정신고 기한이 지난날로부터 5년간 보관후,파기</td>
							</tr>
							<tr>
								<td>유한회사 딜로그, 우리은행</td>
								<td>퇴직급여 계리 평가</td>
								<td>성명,생년월일 등 고유식별번호</td>
								<td>법정신고 기한이 지난날로부터 5년간 보관후,파기</td>
							</tr>
							<tr>
								<td>다산회계법인, 삼일회계법인</td>
								<td>회계감사</td>
								<td>성명,생년월일 등 고유식별번호</td>
								<td>법정신고 기한이 지난날로부터 5년간 보관후,파기</td>
							</tr>
							<tr>
								<td>세브란스체크업</td>
								<td>건강검진</td>
								<td>성명,전화번호,주민등록번호 등 고유식별번호</td>
								<td>5년간 보관후, 파기</td>
							</tr>
							<tr>
								<td>KIMO(키모)</td>
								<td>명함제작</td>
								<td>	성명, 소속부서, 전화번호, e-mail 등 고유식별번호</td>
								<td>목적달성 후,즉시파기</td>
							</tr>
						</tbody>
					</table>
				</div>
		
			</div>
		</div>

	</div>

</div>


<?php
include_once(G5_PATH.'/tail.php');