<?php
#------------------------------------------------------------------------------
# 작업내용	:	회원 관련
# 인    수	:
# 작성일자	:	2021-05-26
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class MemberManager
{
	private $dbm;

	public function __construct() {
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
	}

	//	아이디 중복 체크
	public function chkIDDuplication($userID)
	{
		global $common;
		$strSQL					=	"
									SELECT count(userID) AS count
									FROM tbl_staff
									WHERE userID = '$userID'
									";
		$msg					=	$this->dbm->execute($strSQL, '1');
		$data					=	$msg->getData();
		$size					=	$data[0]['count'];

		if ( $size == 0 ) {
			return true;
		} else {
			return false;
		}
	}
	//	아이디 중복 체크

	//	직원 로그인
	public function userLoginProc($loginID, $loginPWD)
	{
		$msg					=	new Message();

		if ( $loginID == '' || $loginPWD == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT	userIdx, userID, userName, userGubun
									FROM tbl_staff
									WHERE userID = '$loginID' AND userPWD = PASSWORD('$loginPWD')
									";
		echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	직원 로그인

	//	직원 회원 로그인 이력
	public function setLoginHistoryProc($userID)
	{
		$msg					=	new Message();

		if ( $userID == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$curDate				=	date('Y-m-d H:i:s');

		//	최종 로그인 날짜 업데이트
		$strSQL					=	"
									UPDATE tbl_staff SET
										lastLoginDate			=	'$curDate'
									WHERE userID				=	'$userID'
									";

		//print_r($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	직원 회원 로그인 이력

	//	직원 관리	===================================================================================
	//	직원 리스트 without paging
	public function getStaffListNoPaging($schName, $schState)
	{
		$msg					=	new Message();
		$where1					=	'';
		$where2					=	'';

		if ( $schName ) {
			$where1				=	" AND BINARY userName LIKE '%$schName%'";
		}

		if ( $schState ) {
			$where2				=	" AND state = '$schState'";
		}

		$strSQL					=	"
									SELECT	sf.userIdx, sf.userID, sf.userName, sf.userMobile, sf.userGubun, sf.userPosition1, sf.userPosition2,
											sf.userMemo, sf.state, sf.regDate, sf.modifyDate,
											pc1.codeName AS userPositionName1, pc2.codeName AS userPositionName2
									FROM tbl_staff AS sf
									LEFT OUTER JOIN tbl_pubCode AS pc1 ON
									pc1.pubCode = sf.userPosition1
									LEFT OUTER JOIN tbl_pubCode AS pc2 ON
									pc2.pubCode = sf.userPosition2
									WHERE sf.userIdx IS NOT NULL
									"
									. $where1 . $where2 .
									"
									ORDER BY sf.userName
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	직원 리스트 without paging

	//	직원 리스트 with paging
	public function getStaffList($pageNo, $recordPerPage, $schName, $schUserID, $schMobile, $schPosition1, $schPosition2, $schState)
	{
		global $common;

		$msg					=	new Message();
		$where1					=	'';
		$where2					=	'';
		$where3					=	'';
		$where4					=	'';
		$where5					=	'';
		$where6					=	'';

		//	이름
		if ( $schName ) {
			$where1				=	" AND BINARY sf.userName LIKE '%$schName%'";
		}

		//	사번
		if ( $schUserID ) {
			$where2				=	" AND BINARY sf.userID LIKE '%$schUserID%'";
		}

		//	휴대번호
		if ( $schMobile ) {
			$schMobile			=	str_replace('-','',$schMobile);
			$where3				=	" AND BINARY REPLACE(sf.userMobile, '-', '') LIKE '%$schMobile%'";
		}

		//	직급
		if ( $schPosition1 ) {
			$where4				=	" AND sf.userPosition1 = '$schPosition1'";
		}

		//	직책
		if ( $schPosition2 ) {
			$where5				=	" AND sf.userPosition2 = '$schPosition2'";
		}

		//	재직여부
		if ( $schState ) {
			$where6				=	" AND sf.state = '$schState'";
		}

		$strSQL					=	"
									SELECT	sf.userIdx, sf.userID, sf.userName, sf.userMobile, sf.userGubun, sf.state,
											pc1.codeName AS userPositionName1, pc2.codeName AS userPositionName2
									FROM tbl_staff AS sf
									LEFT OUTER JOIN tbl_pubCode AS pc1 ON
									pc1.pubCode = sf.userPosition1
									LEFT OUTER JOIN tbl_pubCode AS pc2 ON
									pc2.pubCode = sf.userPosition2
									WHERE sf.userIdx IS NOT NULL
									"
									. $where1 . $where2 . $where3 . $where4 . $where5 . $where6 . 
									"
									ORDER BY sf.regDate DESC
									LIMIT $pageNo, $recordPerPage
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');

		$strSQL					=	"
									SELECT	COUNT(sf.userIdx) AS count
									FROM tbl_staff AS sf
									LEFT OUTER JOIN tbl_pubCode AS pc1 ON
									pc1.pubCode = sf.userPosition1
									LEFT OUTER JOIN tbl_pubCode AS pc2 ON
									pc2.pubCode = sf.userPosition2
									WHERE sf.userIdx IS NOT NULL
									"
									. $where1 . $where2 . $where3 . $where4 . $where5 . $where6;
		//echo($strSQL);
		$msg2					=	$this->dbm->execute($strSQL, '1');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	직원 리스트 with paging

	//	직원 상세 정보
	public function getStaffModify($userIdx)
	{
		$msg					=	new Message();

		if ( $userIdx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT	sf.userID, sf.userName, sf.userMobile, sf.userGubun, sf.userPosition1, sf.userPosition2,
											sf.userMemo, sf.state, sf.regDate, sf.lastLoginDate, sf.modifyDate,
											pc1.codeName AS userPositionName1, pc2.codeName AS userPositionName2
									FROM tbl_staff AS sf
									LEFT OUTER JOIN tbl_pubCode AS pc1 ON
									pc1.pubCode = sf.userPosition1
									LEFT OUTER JOIN tbl_pubCode AS pc2 ON
									pc2.pubCode = sf.userPosition2
									WHERE sf.userIdx = '$userIdx'
									";
		//echo $strSQL . '<br>';
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	직원 상세 정보

	//	직원 등록/수정/삭제
	public function setStaffProc($data)
	{
		$msg					=	new Message();

		if ( $data == '' || $data['isAction'] == '' || $data['userID'] == '' || $data['userName'] == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $data['isAction'] == 'D' ) {
			$strSQL				=	"DELETE FROM tbl_staff WHERE userIdx = '$data[userIdx];'";
		} else {

			if ( $data['userIdx'] ) {
				$userIdx		=	$data['userIdx'];
			} else {
				$rs				=	$this->dbm->execute("SELECT (IFNULL(MAX(userIdx), 0) + 1) AS cnt FROM tbl_staff", '1');
				$rs				=	$rs->getData();
				$rs				=	$rs[0];
				if($rs['cnt'] > 0) {
					$userIdx	=	$rs['cnt'];
				}
			}

			$userPosition1		=	$data['userPosition1']; if ( $userPosition1 == '' ) $userPosition1 = 0;
			$userPosition2		=	$data['userPosition2']; if ( $userPosition2 == '' ) $userPosition2 = 0;

			if ( $data['userPWD'] ) {
				$strSQL			=	"
									INSERT INTO tbl_staff
										(userIdx, userID, userPWD, userName, userMobile, userGubun, userPosition1, userPosition2, userMemo, state) VALUES
										($userIdx, '$data[userID]', PASSWORD('$data[userPWD]'), '$data[userName]', '$data[userMobile]', '$data[userGubun]', '$userPosition1', '$userPosition2', '$data[userMemo]', '$data[state]')
									ON DUPLICATE KEY UPDATE
										userPWD				=	PASSWORD('$data[userPWD]'),
										userName			=	'$data[userName]',
										userMobile			=	'$data[userMobile]',
										userGubun			=	'$data[userGubun]',
										userPosition1		=	'$userPosition1',
										userPosition2		=	'$userPosition2',
										userMemo			=	'$data[userMemo]',
										state				=	'$data[state]'
									";
			} else {
				$strSQL			=	"
									INSERT INTO tbl_staff
										(userIdx, userID, userName, userMobile, userGubun, userPosition1, userPosition2, userMemo, state) VALUES
										($userIdx, '$data[userID]', '$data[userName]', '$data[userMobile]', '$data[userGubun]', '$userPosition1', '$userPosition2', '$data[userMemo]', '$data[state]')
									ON DUPLICATE KEY UPDATE
										userName			=	'$data[userName]',
										userMobile			=	'$data[userMobile]',
										userGubun			=	'$data[userGubun]',
										userPosition1		=	'$userPosition1',
										userPosition2		=	'$userPosition2',
										userMemo			=	'$data[userMemo]',
										state				=	'$data[state]'
									";
			}
		}
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');						//	한국
		if ($msg->isResult()) {
			$msg				=	$this->dbm->execute($strSQL, '2');						//	미국

			if ($msg->isResult()) {
				$msg			=	$this->dbm->execute($strSQL, '3');						//	싱가포르
			}
		}
		return $msg;
	}
	//	직원 등록/수정/삭제

	//	직원 비밀번호 변경
	public function adminChgPWDProc($oldPWD, $userPWD)
	{
		global $common;
		$msg					=	new Message();

		if ( $oldPWD == '' || $userPWD == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$userIdx				=	$common['userIdx'];
		$rsSQL					=	"
									SELECT userID
									FROM tbl_staff
									WHERE userIdx = '$userIdx' AND userPWD = PASSWORD('$oldPWD')
									";
		//echo $rsSQL;
		$rs						=	$this->dbm->execute($rsSQL, '1');
		$rs						=	$rs->getData();

		if ( $rs ) {
			$strSQL1			=	"UPDATE tbl_staff SET userPWD = PASSWORD('$userPWD') WHERE userIdx = '$userIdx'";
			$r1					=	$this->dbm->execute($strSQL1, '1');

			if ( $r1->isResult() ) {
				$msg->setMessage('OK');																									//	패스워드 변경
			} else {
				$msg->setMessage('NO');																									//	패스워드 변경 에러
			}
		} else {
			$msg->setMessage('NOPWD');																									//	패스워드 불일치
		}
		return $msg;
	}
	//	직원 비밀번호 변경

 // 직원 미국, 싱가폴 idx
 public function getSiteIdx($userIdx) {
    $msg					=	new Message();

    if (!$userIdx) {
        $msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
        return $msg;
    }

    $strSQL					=	"
         SELECT	usaIdx, sgpIdx
         FROM tbl_staff
         WHERE userIdx = '$userIdx'
         ";
    //echo $strSQL . '<br>';
    $msg					=	$this->dbm->execute($strSQL, '1');
    return $msg;
 }

 // 직원 미국 or 싱가폴 idx 업데이트
 public function setSiteIdx($userIdx, $data) {
    $msg =	new Message();
    $set = array();

    if(!$userIdx){
        $msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
        return $msg;
    }
    
    if(isset($data['usaIdx'])) $set[] = 'usaIdx = '.mysqli_real_escape_string($this->dbm->conn01, $data['usaIdx']);
    if(isset($data['sgpIdx'])) $set[] = 'sgpIdx = '.mysqli_real_escape_string($this->dbm->conn01, $data['sgpIdx']);

    if(count($set) <= 0) {
        $msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
        return $msg;
    }

    $setStr = implode(',', $set);
    $sql = 'UPDATE tbl_staff SET '.$setStr.' where userIdx = ' . mysqli_real_escape_string($this->dbm->conn01, $userIdx);
    $msg	=	$this->dbm->execute($sql, '1');

    return $msg;
 }
	//	직원 관리	===================================================================================
}
?>