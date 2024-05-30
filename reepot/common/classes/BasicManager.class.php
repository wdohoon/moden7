<?php
#------------------------------------------------------------------------------
# 작업내용	:	기초 관리
# 인    수	:
# 작성일자	:	2021-05-26
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class BasicManager
{
	private $dbm;

	public function __construct()
	{
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
	}

	//	공통코드	=====================================================================================================
	//	공통코드명 가져오기
	public function getPubCodeName($cCode)
	{
		$msg					=	new Message();

		if ( !$cCode ) return $msg;

		$strSQL					=	"SELECT codeName FROM tbl_pubCode WHERE pubCode = '$cCode'";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		$tmp					=	$msg->getData();
		if ( $tmp ) {
			$msg				=	$tmp[0]['codeName'];
		} else {
			$msg				=	'';
		}

		return $msg;
	}
	//	공통코드명 가져오기

	//	공통코드 리스트 가져오기
	public function getPubCodeList($pCode, $rCnt=0)
	{
		global $common;

		if ( $rCnt > 0 ) {
			$limitPage			=	" LIMIT $rCnt";
		}

		$strSQL					=	"
									SELECT pubCode, codeName
									FROM tbl_pubCode
									WHERE pPubCode = '$pCode' AND isUse = 'Y'
									ORDER BY codeSort
									" . $limitPage;
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	공통코드 리스트 가져오기

	//	공통코드 리스트 가져오기
	public function getPubCodeNoCorpList($pCode, $rCnt=0)
	{
		global $common;

		if ( $rCnt > 0 ) {
			$limitPage			=	" LIMIT $rCnt";
		}

		$strSQL					=	"
									SELECT pubCode, codeName
									FROM tbl_pubCode
									WHERE pPubCode = '$pCode' AND isUse = 'Y'
									ORDER BY codeSort
									" . $limitPage;
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	공통코드 리스트 가져오기

	//	공통코드 수정정보 가져오기
	public function getModifyPubCode($cCode)
	{
		$strSQL					=	"
									SELECT codeName
									FROM tbl_pubCode
									WHERE pubCode				=	'$cCode'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	공통코드 수정정보 가져오기

	//	공통코드 등록/수정/삭제 가져오기
	public function setPubCodeProc($data)
	{
		global $common;

		$msg					=	new Message();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( strtoupper($data['isAction']) == 'D' ) {
			if ( $data['cCode'] == '' ) {
				$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
				return $msg;
			}

			$strSQL				=	"
									UPDATE tbl_pubCode SET
										isUse					=	'N'
									WHERE pubCode				=	'$data[cCode]'
									";
			//echo $strSQL;
			$msg				=	$this->dbm->execute($strSQL, '1');

			//	하위 코드 삭제
			$strSQL1			=	"
									UPDATE tbl_pubCode SET
										isUse					=	'N'
									WHERE pPubCode				=	'$data[cCode]'
									";
			//echo $strSQL1;
			$msg1				=	$this->dbm->execute($strSQL1, '1');

			if ( $data['lvl'] == '1' ) {
				//	2차
				$rsSQL2			=	"SELECT pubCode FROM tbl_pubCode WHERE pPubCode = '$data[cCode]'";
				$rowList2		=	$this->dbm->execute($rsSQL2, '1');
				$rowList2		=	$rowList2->getData();

				if ( $rowList2 ) {
					foreach ( $rowList2 as $key => $val2 )
					{
						$pubCode2		=	$val2['pubCode'];

						//	3차 코드 삭제
						$strSQL2		=	"
											UPDATE tbl_pubCode SET
												isUse					=	'N'
											WHERE pPubCode				=	'$pubCode2'
											";
						//echo $strSQL2;
						$msg2			=	$this->dbm->execute($strSQL2, '1');

						//	3차
						$rsSQL3			=	"SELECT pubCode FROM tbl_pubCode WHERE pPubCode = '$pubCode2'";
						$rowList3		=	$this->dbm->execute($rsSQL3, '1');
						$rowList3		=	$rowList3->getData();

						if ( $rowList3 ) {
							foreach ( $rowList3 as $key => $val3 )
							{
								$pubCode3		=	$val3['pubCode'];

								//	4차 코드 삭제
								$strSQL3		=	"
													UPDATE tbl_pubCode SET
														isUse					=	'N'
													WHERE pPubCode				=	'$pubCode3'
													";
								//echo $strSQL;
								$msg3			=	$this->dbm->execute($strSQL3, '1');
							}
						}
					}
				}
			} else if ( $data['lvl'] == '2' ) {
				//	3차
				$rsSQL3			=	"SELECT pubCode FROM tbl_pubCode WHERE pPubCode = '$data[cCode]'";
				$rowList3		=	$this->dbm->execute($rsSQL3, '1');
				$rowList3		=	$rowList3->getData();

				if ( $rowList3 ) {
					foreach ( $rowList3 as $key => $val3 )
					{
						$pubCode3		=	$val3['pubCode'];

						//	4차 코드 삭제
						$strSQL3		=	"
											UPDATE tbl_pubCode SET
												isUse					=	'N'
											WHERE pPubCode				=	'$pubCode3'
											";
						//echo $strSQL;
						$msg3			=	$this->dbm->execute($strSQL3, '1');
					}
				}
			}
		} else if ( strtoupper($data['isAction']) == 'U' ) {
			if ( $data['cCode'] == '' || $data['cName'] == '' ) {
				$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
				return $msg;
			}

			$strSQL				=	"
									UPDATE tbl_pubCode SET
										codeName				=	'$data[cName]'
									WHERE pubCode				=	'$data[cCode]'
									";
			//echo $strSQL;
			$msg				=	$this->dbm->execute($strSQL, '1');
		} else if ( strtoupper($data['isAction']) == 'N' ) {
			if ( $data['pCode'] == '' || $data['cName'] == '' || $data['lvl'] == '' ) {
				$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
				return $msg;
			}

			$msg				=	$this->getPubCodeSort($table, $data['pCode']);
			$rs					=	$msg->getData();
			$cSort				=	$rs['codeSort'];

			$strSQL				=	"
									INSERT INTO tbl_pubCode
										(pPubCode, codeName, codeLevel, codeSort) VALUES
										('$data[pCode]', '$data[cName]', '$data[lvl]', '$cSort')
									";
			//echo $strSQL;
			$msg				=	$this->dbm->execute($strSQL, '1');
		}
		return $msg;
	}
	//	공통코드 등록/수정/삭제 가져오기

	//	공통코드 순서 가져오기
	public function getPubCodeSort($pCode)
	{
		$strSQL					=	"
									SELECT (IFNULL(MAX(codeSort), 0) + 1) AS codeSort
									FROM tbl_pubCode
									WHERE pPubCode = '$pCode'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		$temp					=	$msg->getData();
		if ( $temp != '' ) $msg->setData($temp[0]);
		return $msg;
	}
	//	공통코드 순서 가져오기

	//	공통코드 순서 수정
	public function setPubCodeOrderProc($codeSort)
	{
		$msg					=	new Message();
		$strSQL					=	array();

		$codeSort				=	str_replace(',,', '', $codeSort);
		$codeSort				=	explode(',', $codeSort);

		for ( $i = 1; $i <= count($codeSort); $i++ )
		{
			$pubCode			=	$codeSort[$i - 1];
			if ( $pubCode ) {
				$strSQL[]		=	"
									UPDATE tbl_pubCode SET
										codeSort					=	$i
									WHERE pubCode					=	" . $pubCode;
			}
		}
		//print_r($strSQL);
		$msg					=	$this->dbm->transaction($strSQL, '1');
		return $msg;
	}
	//	공통코드 순서 수정

	//	공통코드 등록 및 순서 저장
	public function setPubCodeSortProc($data)
	{
		global $common;

		$msg					=	new Message();
		$strSQL					=	array();

		$codeSort				=	str_replace(',,', '', $data['codeSort']);
		$codeSort				=	explode(',', $codeSort);

		for ( $i = 1; $i <= count($codeSort); $i++ )
		{
			$pubCode			=	$codeSort[$i - 1];

			if ( $pubCode ) {
				$sql			=	"SELECT codeName FROM tbl_pubCode WHERE pubCode = '$pubCode'";
				$rs				=	$this->dbm->execute($sql, '2');
				$rs				=	$rs->getData();
				$rs				=	$rs[0];
				$codeName		=	$rs['codeName'];

				$strSQL[]		=	"
									INSERT INTO tbl_pubCode
										(pPubCode, pubCode, codeName, codeLevel, codeSort) VALUES
										('0', '$pubCode', '$codeName', '1', '$i')
									ON DUPLICATE KEY UPDATE
										codeSort						=	$i
									";
			}
		}
		$msg					=	$this->dbm->transaction($strSQL, '1');
		return $msg;
	}
	//	공통코드 등록 및 순서 저장
	//	공통코드	=====================================================================================================

	//	권한 설정	=====================================================================================================
	//	메뉴 리스트 가져오기
	public function getMenuList()
	{
		$strSQL					=	"
									SELECT menuCode, menuLevel, menuName
									FROM tbl_menu
									WHERE isUse = 'Y'
									ORDER BY menuCode
									";

		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	메뉴 리스트 가져오기

	//	개인별 메뉴 권한 등록/수정
	public function setPerAuthProc($data)
	{
		$msg					=	new Message();
		$strSQL					=	array();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		//	삭제 후 다시
		$delSQL					=	"DELETE FROM tbl_menuPerAuth";
		$this->dbm->execute($delSQL, '1');

		$staffIdxs				=	$data['staffIdx'];

		for ($i = 0; $i < count($staffIdxs); $i++)
		{
			$staffIdx			=	$staffIdxs[$i];
			$menuCode			=	'authMenu_' . $staffIdx;
			$menuCodes			=	$data[$menuCode];
			$authMenu			=	'';

			if ( $menuCodes ) {
				for ($j = 0; $j < count($menuCodes); $j++)
				{
					if ( $authMenu ) {
						$authMenu		=	$authMenu . ',' . $menuCodes[$j];
					} else {
						$authMenu		=	$menuCodes[$j];
					}
				}

				if ( $authMenu ) {
					$strSQL[]			=	"
											INSERT INTO tbl_menuPerAuth
												(userIdx, authMenu) VALUES
												('$staffIdx', '$authMenu')
											ON DUPLICATE KEY UPDATE
												authMenu					=	'$authMenu'
											";
				}
			}
		}
		//print_r($strSQL);
		$msg					=	$this->dbm->transaction($strSQL, '1');
		return $msg;
	}
	//	개인별 메뉴 권한 등록/수정

	//	개인별 메뉴 권한 정보 가져오기
	public function getAuthPerMenu($schCode, $schUser)
	{
		$msg					=	new Message();
		if ( $schUser == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT authMenu
									FROM tbl_menuPerAuth
									WHERE userIdx = '$schUser'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	개인별 메뉴 권한 정보 가져오기

	//	개인별 메뉴 권한 정보 가져오기
	public function getPerAuth($schUser)
	{
		if ( $schUser == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT authMenu
									FROM tbl_menuPerAuth
									WHERE userIdx = '$schUser'
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	개인별 메뉴 권한 정보 가져오기
	//	권한 설정	=====================================================================================================

	//	홈페이지 관리	=================================================================================================
	//	홈페이지 정보 가져오기
	public function getSiteConfig()
	{
		$msg					=	new Message();
		$strSQL					=	"
									SELECT serviceAgreement_kr, serviceAgreement_en, personalInfoPolicy_kr, personalInfoPolicy_en, cookieUseNotice_kr, cookieUseNotice_en
									FROM tbl_siteConfig
									WHERE idx = '1'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	홈페이지 정보 가져오기

	//	홈페이지 정보 등록
	public function setSiteConfigProc($data)
	{
		global $common;

		$msg					=	new Message();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$idx					=	1;
		$pageID					=	$data['pageID'];
		$contents				=	$data['contents'];

		if ( $pageID == '1' ) {
			$field				=	'serviceAgreement_kr';
		} else if ( $pageID == '2' ) {
			$field				=	'serviceAgreement_en';
		} else if ( $pageID == '3' ) {
			$field				=	'personalInfoPolicy_kr';
		} else if ( $pageID == '4' ) {
			$field				=	'personalInfoPolicy_en';
		} else if ( $pageID == '5' ) {
			$field				=	'cookieUseNotice_kr';
		} else if ( $pageID == '6' ) {
			$field				=	'cookieUseNotice_en';
		}

		$strSQL					=	"
									INSERT INTO tbl_siteConfig
										(idx, $field) VALUES
										($idx, '$contents')
									ON DUPLICATE KEY UPDATE
										$field			=	'$contents'
									";

		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	홈페이지 정보 등록
	//	홈페이지 관리	=================================================================================================
}
?>