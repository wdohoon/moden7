<?php
#------------------------------------------------------------------------------
# 작업내용	:	게시판 관리
# 인    수	:
# 작성일자	:	2021-05-26
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class BoardManager
{
	private $dbm;

	public function __construct()
	{
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
		$this->cm				=	new CommonManager();
	}

	//	게시판 관리	=======================================================================================================
	//	게시판 리스트
	public function getBoardList($pageNo, $recordPerPage)
	{
		global $common;
		$msg					=	new Message();

		$strSQL					=	"
									SELECT	boardID, boardName, isCategory, category, categoryNum, isUpload, uploadCnt, isImage, imageCnt, isDate, sortGubun, isTop, isThumb, isUse
									FROM tbl_bbsmaster
									ORDER BY boardID
									LIMIT $pageNo, $recordPerPage
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');

		$strSQL					=	"
									SELECT IFNULL(count(boardID), 0) AS count
									FROM tbl_bbsmaster
									";
		//echo($strSQL);
		$msg2					=	$this->dbm->execute($strSQL, '1');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	게시판 리스트

	//	게시판 정보 가져오기
	public function getBoardInfo($boardID)
	{
		$strSQL					=	"
									SELECT	boardIcon, boardName, isCategory, category, categoryNum, isUpload, uploadCnt, isImage, imageCnt, isDate, sortGubun,
											isTop, isThumb, isState, isPhone, isMail, isName, isSchedule, isCorp, isJob, isCountry1, isCountry2,
											isMovieLink, isUse, menuCode
									FROM tbl_bbsmaster
									WHERE boardID = $boardID
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시판 정보 가져오기

	//	게시판 저장 / 수정
	public function setBoardProc($data)
	{
		global $common;
		$msg					=	new Message();

		if ( !is_array($data) ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $data['boardID'] ) {
			$boardID			=	$data['boardID'];
		} else {
			$boardID			=	'NULL';
		}

		$boardName				=	$data['boardName'];
		$isCategory				=	$data['isCategory']; if ( $isCategory == '' ) $isCategory = 'N';
		$category				=	$data['category']; if ( $category == '' ) $category = '0';
		$isUpload				=	$data['isUpload']; if ( $isUpload == '' ) $isUpload = 'N';
		$uploadCnt				=	$data['uploadCnt']; if ( $uploadCnt == '' ) $uploadCnt = '0';
		$isImage				=	$data['isImage']; if ( $isImage == '' ) $isImage = 'N';
		$imageCnt				=	$data['imageCnt']; if ( $imageCnt == '' ) $imageCnt = '0';
		$isDate					=	$data['isDate']; if ( $isDate == '' ) $isDate = 'N';
		$sortGubun				=	$data['sortGubun']; if ( $sortGubun == '' ) $sortGubun = 'N';
		$isTop					=	$data['isTop']; if ( $isTop == '' ) $isTop = 'N';
		$isThumb				=	$data['isThumb']; if ( $isThumb == '' ) $isThumb = 'N';

		$strSQL					=	"
									INSERT INTO tbl_bbsmaster
										(boardID, boardName, isCategory, category, isUpload, uploadCnt, isImage, imageCnt, isDate, sortGubun, isTop, isThumb) VALUES
										($boardID, '$boardName', '$isCategory', '$category', '$isUpload', '$uploadCnt', '$isImage', '$imageCnt', '$isDate', '$sortGubun', '$isTop', '$isThumb')
									ON DUPLICATE KEY UPDATE
										isCategory				=	'$isCategory',
										category				=	'$category',
										isUpload				=	'$isUpload',
										uploadCnt				=	'$uploadCnt',
										isImage					=	'$isImage',
										imageCnt				=	'$imageCnt',
										isDate					=	'$isDate',
										sortGubun				=	'$sortGubun',
										isTop					=	'$isTop',
										isThumb					=	'$isThumb'
									";
		//echo($strSQL.'<br>');
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시판 저장 / 수정
	//	게시판 관리	=======================================================================================================

	//	게시물 관리	=======================================================================================================
	//	게시판 최상위 글 리스트
	public function getHighBBSList($boardID, $sortGubun, $schSDate, $schEDate, $sch_s_sDate, $sch_e_sDate, $schCate1, $schCate2, $schWord, $schMobile, $schMail, $sch_s_Name, $schCountry, $schCountryCode, $schState, $sch_h_Name='')
	{
		global $common;
		$msg					=	new Message();

		if ( $boardID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$where1					=	'';
		$where2					=	'';
		$where3					=	'';
		$where4					=	'';
		$where5					=	'';
		$where6					=	'';
		$where7					=	'';
		$where8					=	'';
		$where9					=	'';
		$where10				=	'';
		$where11				=	'';

		if ( $schSDate && $schEDate ) {
			$where1				=	" AND bbs.regDate >= '$schSDate 00:00:00' AND bbs.regDate <= '$schEDate 23:59:59'";
		}

		if ( $sch_s_sDate && $sch_e_sDate ) {
			$where2				=	" AND bbs.s_date >= '$sch_s_sDate' AND bbs.s_date <= '$sch_e_sDate'";
		}

		if ( $schCate1 ) {
			$where3				=	" AND bbs.boardCategory1 = '$schCate1'";
		}

		if ( $schCate2 ) {
			$where4				=	" AND bbs.boardCategory2 = '$schCate2'";
		}

		if ( $schWord ) {
			$where5				=	" AND BINARY bbs.subject LIKE '%$schWord%'";
		}

		if ( $schMobile ) {
			$str				=	array('-', '');
			$schMobile			=	str_replace($str, '', $schMobile);
			$where6				=	" AND BINARY REPLACE(bbs.mobile, '-', '') LIKE '%$schMobile%'";
		}

		if ( $schMail ) {
			$where7				=	" AND BINARY bbs.email LIKE '%$schMail%'";
		}

		if ( $sch_s_Name ) {
			$where8				=	" AND BINARY bbs.s_Name LIKE '%$sch_s_Name%'";
		}

		if ( $schCountry ) {
			$where9				=	" AND BINARY bbs.country LIKE '%$schCountry%'";
		}

		if ( $schCountryCode ) {
			$where10			=	" AND BINARY bbs.countryCode = '$schCountryCode'";
		}

		if ( $schState ) {
			$where11			=	" AND BINARY bbs.state = '$schState'";
		}

		if ( $sortGubun ) {
			if ( $sortGubun == 'regDate' ) {
				$orderBy		=	' ORDER BY bbs.regDate DESC';
			} else {
				$orderBy		=	' ORDER BY bbs.hitCount DESC';
			}
		} else {
			$orderBy			=	' ORDER BY bbs.boardRef DESC, bbs.boardStep ASC';
		}

		if ( $sch_h_Name ) {
			$where12				=	" AND BINARY bbs.hospitalName LIKE '%$sch_h_Name%'";
		}

		$strSQL					=	"
									SELECT	bbs.idx, bbs.boardRef, bbs.boardStep, bbs.boardLevel, bbs.subject, sf.userName,
											bbs.s_Name, bbs.s_date, bbs.s_sTime, bbs.s_eTime, bbs.mobile, bbs.email, bbs.corpName, bbs.country,
											pc.codeName AS countryName, bbs.isReservation, bbs.sendDate, bbs.hitCount, bbs.isDisplay,
											bbs.hospitalName, bbs.hospitalNumber, bbs.isSendMail,
											bbs.state, bbs.regDate,
											(
												SELECT codeName
												FROM tbl_pubCode
												WHERE pubCode = bbs.boardCategory1
											) AS bbsCateName1,
											(
												SELECT codeName
												FROM tbl_pubCode
												WHERE pubCode = bbs.boardCategory2
											) AS bbsCateName2
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_staff AS sf ON
									sf.userIdx = bbs.writerIdx
									LEFT OUTER JOIN tbl_pubCode AS pc ON
									pc.pubCode = bbs.countryCode
									WHERE bbs.boardID = '$boardID' AND bbs.highYN = 'Y'
									"
									. $where1 . $where2 . $where3 . $where4 . $where5 . $where6 . $where7 . $where8 . $where9 . $where10 . $where11 . $where12. $orderBy;
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시판 최상위 글 리스트

	//	게시판 글 리스트 with paging
	public function getBBSList($pageNo, $recordPerPage, $boardID, $sortGubun, $schSDate, $schEDate, $sch_s_sDate, $sch_e_sDate, $schCate1, $schCate2, $schWord, $schMobile, $schMail, $sch_s_Name, $schCountry, $schCountryCode, $schState, $sch_h_Name='')
	{
		global $common;
		$msg					=	new Message();

		if ( $boardID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$where1					=	'';
		$where2					=	'';
		$where3					=	'';
		$where4					=	'';
		$where5					=	'';
		$where6					=	'';
		$where7					=	'';
		$where8					=	'';
		$where9					=	'';
		$where10				=	'';
		$where11				=	'';

		if ( $schSDate && $schEDate ) {
			$where1				=	" AND bbs.regDate >= '$schSDate 00:00:00' AND bbs.regDate <= '$schEDate 23:59:59'";
		}

		if ( $sch_s_sDate && $sch_e_sDate ) {
			$where2				=	" AND bbs.s_date >= '$sch_s_sDate' AND bbs.s_date <= '$sch_e_sDate'";
		}

		if ( $schCate1 ) {
			$where3				=	" AND bbs.boardCategory1 = '$schCate1'";
		}

		if ( $schCate2 ) {
			$where4				=	" AND bbs.boardCategory2 = '$schCate2'";
		}

		if ( $schWord ) {
			$where5				=	" AND BINARY bbs.subject LIKE '%$schWord%'";
		}

		if ( $schMobile ) {
			$str				=	array('-', '');
			$schMobile			=	str_replace($str, '', $schMobile);
			$where6				=	" AND BINARY REPLACE(bbs.mobile, '-', '') LIKE '%$schMobile%'";
		}

		if ( $schMail ) {
			$where7				=	" AND BINARY bbs.email LIKE '%$schMail%'";
		}

		if ( $sch_s_Name ) {
			$where8				=	" AND BINARY bbs.s_Name LIKE '%$sch_s_Name%'";
		}

		if ( $schCountry ) {
			$where9				=	" AND BINARY bbs.country LIKE '%$schCountry%'";
		}

		if ( $schCountryCode ) {
			$where10			=	" AND BINARY bbs.countryCode = '$schCountryCode'";
		}

		if ( $schState ) {
			$where11			=	" AND BINARY bbs.state = '$schState'";
		}

		if ( $sch_h_Name ) {
			$where12				=	" AND BINARY bbs.hospitalName LIKE '%$sch_h_Name%'";
		}

		if ( $sortGubun ) {
			if ( $sortGubun == 'regDate' ) {
				$orderBy		=	' ORDER BY bbs.regDate DESC';
			} else {
				$orderBy		=	' ORDER BY bbs.hitCount DESC';
			}
		} else {
			$orderBy			=	' ORDER BY bbs.boardRef DESC, bbs.boardStep ASC';
		}

		$strSQL					=	"
									SELECT	bbs.idx, bbs.boardRef, bbs.boardStep, bbs.boardLevel, bbs.subject, sf.userName,
											bbs.s_Name, bbs.s_date, bbs.s_sTime, bbs.s_eTime, bbs.mobile, bbs.email, bbs.corpName, bbs.country,
											pc.codeName AS countryName, bbs.isReservation, bbs.sendDate, bbs.hitCount, bbs.isDisplay,
											bbs.hospitalName, bbs.hospitalNumber, bbs.isSendMail,
											bbs.state, bbs.regDate,
											(
												SELECT codeName
												FROM tbl_pubCode
												WHERE pubCode = bbs.boardCategory1
											) AS bbsCateName1,
											(
												SELECT codeName
												FROM tbl_pubCode
												WHERE pubCode = bbs.boardCategory2
											) AS bbsCateName2
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_staff AS sf ON
									sf.userIdx = bbs.writerIdx
									LEFT OUTER JOIN tbl_pubCode AS pc ON
									pc.pubCode = bbs.countryCode
									WHERE bbs.boardID = '$boardID' AND bbs.highYN = 'N'
									"
									. $where1 . $where2 . $where3 . $where4 . $where5 . $where6 . $where7 . $where8 . $where9 . $where10 . $where11 . $where12 . $orderBy .
									"
									LIMIT $pageNo, $recordPerPage
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL, '1');

		$strSQL					=	"
									SELECT IFNULL(count(bbs.idx), 0) AS count
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_staff AS sf ON
									sf.userIdx = bbs.writerIdx
									LEFT OUTER JOIN tbl_pubCode AS pc ON
									pc.pubCode = bbs.countryCode
									WHERE bbs.boardID = '$boardID' AND bbs.highYN = 'N'
									" . $where1 . $where2 . $where3 . $where4 . $where5 . $where6 . $where7 . $where8 . $where9 . $where10 . $where11 . $where12;
		//echo $strSQL;
		$msg2					=	$this->dbm->execute($strSQL, '1');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	게시판 글 리스트 with paging

	//	게시판 글 정보 가져오기
	public function getBBSInfo($bID, $idx, $isHit = '')
	{
		global $common;

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $isHit == 'Y' ) {
			if ( $common['userIdx'] != '1' ) {
				$strSQL1		=	"UPDATE tbl_bbs SET hitCount = hitCount + 1 WHERE idx = $idx";
				//echo($strSQL1);
				$r1				=	$this->dbm->execute($strSQL1, '1');
			}
		}

		$strSQL					=	"
									SELECT	bbs.boardRef, bbs.boardStep, bbs.boardLevel, bbs.boardCategory1, bbs.boardCategory2,
											bbs.subject, bbs.writerIdx, sf.userName, bbs.s_Name, bbs.s_date, bbs.s_sTime, bbs.s_eTime,
											bbs.mobile, bbs.email, bbs.corpName, bbs.jobName, bbs.country, bbs.countryCode, pc2.codeName AS countryName,
											bbs.contents, bbs.infoSubject, bbs.infoContents, bbs.bbsMemo, bbs.thumbImgPC, bbs.thumbImgMO,
											bbs.isReservation, bbs.sendDate, bbs.startDate, bbs.endDate, bbs.movieLink, bbs.hitCount, bbs.highYN, bbs.isDisplay,
											bbs.hospitalName, bbs.hospitalNumber, bbs.upIdx,
											bbs.enWriteGubun, bbs.state, bbs.regDate, pc1.codeName AS stateName,
											(
												SELECT codeName
												FROM tbl_pubCode
												WHERE pubCode = bbs.boardCategory1
											) AS bbsCateName1,
											(
												SELECT codeName
												FROM tbl_pubCode
												WHERE pubCode = bbs.boardCategory2
											) AS bbsCateName2
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_staff AS sf ON
									sf.userIdx = bbs.writerIdx
									LEFT OUTER JOIN tbl_pubCode AS pc1 ON
									pc1.pubCode = bbs.state
									LEFT OUTER JOIN tbl_pubCode AS pc2 ON
									pc2.pubCode = bbs.countryCode
									WHERE bbs.idx = $idx
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시판 글 정보 가져오기

	//	게시판 글 파일 리스트
	public function getBBSFileList($idx)
	{
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT	idx, upFileName, fileName, filePath
									FROM tbl_bbsFile
									WHERE bIdx = '$idx'
									ORDER BY fileSort
									";
		//echo $strSQL . '<br>';
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시판 글 파일 리스트

	//	게시판 글 파일 개별 리스트
	public function getBBSFile($idx, $sort)
	{
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT	idx, upFileName, fileName, filePath
									FROM tbl_bbsFile
									WHERE bIdx = '$idx' AND fileSort = '$sort'
									ORDER BY fileSort
									";
		//echo $strSQL . '<br>';
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시판 글 파일 개별 리스트

	//	게시판 글 이미지 리스트
	public function getBBSImageList($idx)
	{
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT	idx, upImageName
									FROM tbl_bbsImage
									WHERE bIdx = '$idx'
									ORDER BY fileSort
									";
		//echo $strSQL . '<br>';
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시판 글 파일 리스트

	//	게시판 글 이미지 개별 리스트
	public function getBBSImage($idx, $sort)
	{
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT	idx, upImageName
									FROM tbl_bbsImage
									WHERE bIdx = '$idx' AND fileSort = '$sort'
									ORDER BY fileSort
									";
		//echo $strSQL . '<br>';
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시판 글 파일 개별 리스트

	//	게시판 글 등록/수정/삭제
	public function setBBSProc($data, $file)
	{
		global $common;
		$msg					=	new Message();
		$strSQL					=	array();

		if ( !is_array($data) || !$data['isAction'] ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$newFileName			=	date('YmdHis');
		$basicUploadPath		=	$this->fm->setMakeDir($common['defaultPath'], 'boardFile', $data['bID'], '', '', $common['dirPermission']);

		if ( $data['isAction'] == 'D' ) {
			//	썸네일 삭제
			$rsSQL				=	"
									SELECT thumbImgPC, thumbImgMO
									FROM tbl_bbs
									WHERE bIdx = '$data[idx]'
									";
			//echo $rsSQL3;
			$rsData				=	$this->dbm->execute($rsSQL, '1');
			$rsData				=	$rsData->getData();

			if ( $rsData ) {
				foreach ( $rsData as $val )
				{
					$delFile1	=	$basicUploadPath . $val['thumbImgPC'];
					if ( file_exists($delFile1) ) {
						@unlink($delFile1);
					}

					$delFile2	=	$basicUploadPath . $val['thumbImgMO'];
					if ( file_exists($delFile2) ) {
						@unlink($delFile2);
					}
				}
			}

			//	원본파일 삭제
			$rsSQL				=	"
									SELECT filePath, fileName
									FROM tbl_bbsFile
									WHERE bIdx = '$data[idx]'
									";
			//echo $rsSQL3;
			$rsData				=	$this->dbm->execute($rsSQL, '1');
			$rsData				=	$rsData->getData();

			if ( $rsData ) {
				foreach ( $rsData as $val )
				{
					$delFile	=	$common['wwwPath'] . $val['filePath'] . $val['fileName'];
					if ( file_exists($delFile) ) {
						@unlink($delFile);
					}
				}
			}

			$strSQL[]			=	"DELETE FROM tbl_bbsFile WHERE bIdx = '$data[idx]'";
			$strSQL[]			=	"DELETE FROM tbl_bbs WHERE idx = '$data[idx]'";
			$strSQL[]			=	"DELETE FROM tbl_bbsImage WHERE bIdx = '$data[idx]'";
		} else {
			if ( $data['isAction'] == 'U' ) {
				$idx						=	$data['idx'];
			} else {
				$rs							=	$this->dbm->execute("SELECT (IFNULL(MAX(idx), 0) + 1) AS cnt FROM tbl_bbs", '1');
				$rs							=	$rs->getData();
				$rs							=	$rs[0];
				if ( $rs['cnt'] > 0 ) {
					$idx					=	$rs['cnt'];
				}

				if ( $data['isAction'] == 'R' ) {
					$rsSQL					=	"UPDATE tbl_bbs SET boardStep = boardStep + 1 WHERE boardRef = $data[boardRef] AND boardStep > $data[boardStep]";
					$msg1					=	$this->dbm->execute($rsSQL, '1');

					$boardStep				=	$data['boardStep'] + 1;
					$boardLevel				=	$data['boardLevel'] + 1;

					$rs						=	$this->dbm->execute("SELECT idx, writerIdx FROM tbl_bbs WHERE idx = $data[boardRef] AND boardLevel = 0", '1');
					$rs						=	$rs->getData();
					$boardRef				=	$rs[0]['idx'];
				} else {
					$boardRef				=	$idx;
					$boardStep				=	0;
					$boardLevel				=	0;
				}
			}

			if ( $boardRef == '' ) $boardRef = 0;																							//	부모글번호
			if ( $boardStep == '' ) $boardStep = 0;																							//	답변글번호
			if ( $boardLevel == '' ) $boardLevel = 0;																						//	답변위치
			$boardCategory1		=	$data['boardCategory1'];	if ( $boardCategory1 == '' )	$boardCategory1			= 0;
			$boardCategory2		=	$data['boardCategory2'];	if ( $boardCategory2 == '' )	$boardCategory2			= 0;
			$writerIdx			=	$common['userIdx'];			if ( $writerIdx == '' )			$writerIdx				= 'NULL';			//	작성자 일련번호
			$isReservation		=	$data['isReservation'];		if ( $isReservation == '' )		$isReservation			= 'N';				//	예약여부(Y/N)
			$highYN				=	$data['highYN'];			if ( $highYN == '' )			$highYN					= 'N';				//	최상위(공지) 여부(Y/N)
			$isDisplay			=	$data['isDisplay'];			if ( $isDisplay == '' )			$isDisplay				= 'Y';				//	출력여부(Y/N)
			$writerIP			=	$common['connIP'];																						//	작성자 IP
			$bbsMemo			=	$data['bbsMemo'];
			$state				=	$data['state'];				if ( $state == '' )				$state					=	0;

			$s_hour				=	$data['s_hour'];
			$s_minute			=	$data['s_minute'];
			$e_hour				=	$data['e_hour'];
			$e_minute			=	$data['e_minute'];
			if ( $s_hour && $s_minute ) {
				$s_sTime		=	$s_hour . ':' . $s_minute;
			}
			if ( $e_hour && $e_minute ) {
				$s_eTime		=	$e_hour . ':' . $e_minute;
			}
			$countryCode		=	$data['countryCode'];		if ( $countryCode == '' )		$countryCode			=	0;

			// 병원명 및 사업자등록번호 추가
			$hospitalName		=	$data['hospitalName'];
			$hospitalNumber		=	$data['hospitalNumber'];
			$upIdx = $data['upIdx'] ? $data['upIdx'] : 0;

			$regDate			=	$data['regDate'];			if ( $regDate == '' )			$regDate				=	DATE('Y-m-d H:i:s');

			//	첨부 이미지
			for ( $i = 1; $i <= $data['iCnt']; $i++ )
			{
				$upImgName		=	'upImg' . $i;
				$oldImg			=	'oldImg' . $i;

				$upload			=	$file[$upImgName];
				$oldImg			=	$data[$oldImg];

				if (is_uploaded_file($upload['tmp_name']) == '') {
					${'upImg' . $i}				=	$oldImg;
				} else {
					$ext						=	substr(strrchr($upload['name'], '.'), 1);
					$fileName					=	$newFileName . '_' . $i .  '.' . $ext;
					${'upImg' . $i}				=	$fileName;

					$sizeInfo					=	$this->fm->getImageResizeInfo($upload['tmp_name']);
					$msg2						=	$this->fm->uploadImg($upload['tmp_name'], $basicUploadPath . $fileName, $basicUploadPath . $fileName, $sizeInfo['width'], $sizeInfo['height']);
					//$msg2						=	$this->fm->uploadImg($upload['tmp_name'], $basicUploadPath . $fileName, '', '', '');
					if ( $msg2->isResult() ) {
						//	원본파일 삭제 및 회사 용량 빼준다...
						if (file_exists($basicUploadPath . $oldImg)) {
							@unlink($basicUploadPath . $oldImg);
						}
					}
				}
			}
			//	첨부 이미지

			$strSQL[]			=	"
									INSERT INTO tbl_bbs
										(boardID, idx, boardRef, boardStep, boardLevel, boardCategory1, boardCategory2, subject, writerIdx, writerIP, s_Name, s_date, s_sTime, s_eTime, mobile, email, corpName, jobName, country, countryCode, contents, infoSubject, infoContents, bbsMemo, thumbImgPC, thumbImgMO, isReservation, sendDate, startDate, endDate, movieLink, highYN, isDisplay, state, regDate, hospitalName, hospitalNumber, upIdx) VALUES
										('$data[bID]', $idx, $boardRef, $boardStep, $boardLevel, $boardCategory1, $boardCategory2, '$data[subject]', $writerIdx, '$writerIP', '$data[s_Name]', '$data[s_date]', '$s_sTime', '$s_eTime', '$data[mobile]', '$data[email]', '$data[corpName]', '$data[jobName]', '$data[country]', '$countryCode', '$data[contents]', '$data[infoSubject]', '$data[infoContents]', '$bbsMemo', '$upImg1', '$upImg2', '$isReservation', '$data[sendDate]', '$data[startDate]', '$data[endDate]', '$data[movieLink]', '$highYN', '$isDisplay', '$state', '$regDate','$hospitalName','$hospitalNumber', '$upIdx')
									ON DUPLICATE KEY UPDATE
										boardCategory1			=	'$boardCategory1',
										boardCategory2			=	'$boardCategory2',
										subject					=	'$data[subject]',
										writerIP				=	'$data[writerIP]',
										s_Name					=	'$data[s_Name]',
										s_date					=	'$data[s_date]',
										s_sTime					=	'$s_sTime',
										s_eTime					=	'$s_eTime',
										mobile					=	'$data[mobile]',
										email					=	'$data[email]',
										corpName				=	'$data[corpName]',
										jobName					=	'$data[jobName]',
										country					=	'$data[country]',
										countryCode				=	'$countryCode',
										contents				=	'$data[contents]',
										infoSubject				=	'$data[infoSubject]',
										infoContents			=	'$data[infoContents]',
										bbsMemo					=	'$bbsMemo',
										thumbImgPC				=	'$upImg1',
										thumbImgMO				=	'$upImg2',
										isReservation			=	'$isReservation',
										sendDate				=	'$data[sendDate]',
										startDate				=	'$data[startDate]',
										endDate					=	'$data[endDate]',
										movieLink				=	'$data[movieLink]',
										highYN					=	'$highYN',
										isDisplay				=	'$isDisplay',
										state					=	'$state',
										regDate					=	'$regDate',
										hospitalName			=	'$hospitalName',
										hospitalNumber			=	'$hospitalNumber',
										upIdx					=	'$upIdx'
									";

			//	첨부 파일
			for ( $i = 1; $i <= $data['fCnt']; $i++ )
			{
				$fileIdx					=	'oldFileIdx' . $i;
				$upFileName					=	'upFile' . $i;
				$oldFile					=	'oldFile' . $i;
				$oldFileName				=	'oldFileName' . $i;
				$oldFilePath				=	'oldFilePath' . $i;

				$fileIdx					=	$data[$fileIdx]; if ( $fileIdx == '' ) $fileIdx = 'NULL';
				$upload						=	$file[$upFileName];
				$oldFile					=	$data[$oldFile];
				$oldFileName				=	$data[$oldFileName];
				$oldFilePath				=	$data[$oldFilePath];

				if ( is_uploaded_file($upload['tmp_name']) == '' ) {
					$upFile					=	$oldFile;
					$upFileName				=	$oldFileName;
					$uploadPath				=	$common['wwwPath'] . $oldFilePath;
				} else {
					$uploadPath				=	$basicUploadPath;
					$ext					=	substr(strrchr($upload['name'], '.'), 1);
					$upFile					=	$newFileName . '_file_' . $i .  '.' . $ext;
					$upFileName				=	$upload['name'];

					$msg2					=	$this->fm->uploadFile($upload['tmp_name'], $uploadPath . $upFile);
					if ( $msg2->isResult() ) {
						//	원본파일 삭제
						if (file_exists($oldFilePath . $oldFile)) {
							@unlink($oldFilePath . $oldFile);
						}
					}
				}

				$uploadPath					=	str_replace($common['wwwPath'], '', $uploadPath);

				if ( $upFile ) {
					$strSQL[]	=	"
									INSERT INTO tbl_bbsFile
										(boardID, bIdx, idx, upFileName, fileName, filePath, fileSort) VALUES
										('$data[bID]', '$idx', $fileIdx, '$upFileName', '$upFile', '$uploadPath', '$i')
									ON DUPLICATE KEY UPDATE
										upFileName				=	'$upFileName',
										fileName				=	'$upFile',
										filePath				=	'$uploadPath',
										fileSort				=	'$i'
									";
				}
			}
			//	첨부 파일

			//	첨부 이미지 시작 --
			for ( $i = 1; $i <= $data['imageCnt']; $i++ )
			{
				$oldImageIdx				=	'oldImageIdx' . $i;
				$oldImageName				=	'oldImageName' . $i;
				$upImage					=	'upImage' . $i;

				$upload						=	$file[$upImage];

				$imgIdx					=	$data[$oldImageIdx]; if ( $imgIdx == '' ) $imgIdx = 'NULL';

				if ( is_uploaded_file($upload['tmp_name']) == '' ) {
					$upImageName			=	$data[$oldImageName];
				} else {
					$ext					=	substr(strrchr($upload['name'], '.'), 1);
					$upImageName			=	$newFileName . '_' . $i .  '.' . $ext;

					$sizeInfo					=	$this->fm->getImageResizeInfo($upload['tmp_name']);
					$msg2						=	$this->fm->uploadImg($upload['tmp_name'], $basicUploadPath . $fileName, $basicUploadPath . $fileName, $sizeInfo['width'], $sizeInfo['height']);

					//$msg2					=	$this->fm->uploadImg($upload['tmp_name'], $basicUploadPath . $upImageName, '', '', '');
					//if ( $msg2->isResult() ) {
					//	//	원본파일 삭제 및 회사 용량 빼준다...
					//	if (file_exists($basicUploadPath . $oldImageName)) {
					//		@unlink($basicUploadPath . $oldImageName);
					//	}
					//}
				}

				if ( $upImageName ) {
					$strSQL[]	=	"
									INSERT INTO tbl_bbsImage
										(boardID, bIdx, idx, upImageName, fileSort) VALUES
										('$data[bID]', '$idx', $imgIdx,'$upImageName', '$i')
									ON DUPLICATE KEY UPDATE
										upImageName				=	'$upImageName',
										fileSort				=	'$i'
									";
//					print_r($strSQL); exit;
				}
			}
			//	첨부 이미지 종료 --
		}

		//print_r($strSQL);
		$msg					=	$this->dbm->transaction($strSQL, '1');
		return $msg;
	}
	//	게시판 글 등록/수정/삭제

	//	게시판 글 삭제
	public function setBBSDelProc($data)
	{
		global $common;
		$msg					=	new Message();
		$strSQL					=	array();

		if ( !is_array($data) ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$basicUploadPath		=	$this->fm->setMakeDir($common['defaultPath'], 'boardFile', $data['bID'], '', '', $common['dirPermission']);

		//	썸네일 삭제
		$rsSQL					=	"
									SELECT thumbImgPC, thumbImgMO
									FROM tbl_bbs
									WHERE bIdx = '$data[idx]'
									";
		//echo $rsSQL3;
		$rsData					=	$this->dbm->execute($rsSQL, '1');
		$rsData					=	$rsData->getData();

		if ( $rsData ) {
			foreach ( $rsData as $val )
			{
				$delFile1		=	$basicUploadPath . $val['thumbImgPC'];
				if ( file_exists($delFile1) ) {
					@unlink($delFile1);
				}

				$delFile2		=	$basicUploadPath . $val['thumbImgMO'];
				if ( file_exists($delFile2) ) {
					@unlink($delFile2);
				}
			}
		}

		//	원본파일 삭제
		$rsSQL					=	"
									SELECT filePath, fileName
									FROM tbl_bbsFile
									WHERE bIdx = '$data[idx]'
									";
		//echo $rsSQL3;
		$rsData					=	$this->dbm->execute($rsSQL, '1');
		$rsData					=	$rsData->getData();

		if ( $rsData ) {
			foreach ( $rsData as $val )
			{
				$delFile		=	$common['wwwPath'] . $val['filePath'] . $val['fileName'];
				if ( file_exists($delFile) ) {
					@unlink($delFile);
				}
			}
		}

		$strSQL[]				=	"DELETE FROM tbl_bbsFile WHERE bIdx = '$data[idx]'";
		$strSQL[]				=	"DELETE FROM tbl_bbs WHERE idx = '$data[idx]'";

		//print_r($strSQL);
		$msg					=	$this->dbm->transaction($strSQL, '1');
		return $msg;
	}
	//	게시판 글 삭제

	//	선택 게시글 노출 수정
	public function setBBSDisplayChgProc($idx, $state)
	{
		$msg					=	new Message();

		if ( $idx == '' || $state == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									UPDATE tbl_bbs SET
										isDisplay					=	'$state'
									WHERE idx						=	'$idx'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	선택 게시글 노출 수정

	//	선택 게시글 처리상태 변경
	public function setBBSStateChgProc($idx, $state)
	{
		$msg					=	new Message();

		if ( $idx == '' || $state == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									UPDATE tbl_bbs SET
										state						=	'$state'
									WHERE idx						=	'$idx'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	선택 게시글 처리상태 변경

	//	선택 파일 삭제
	public function setBBSFileDelProc($idx, $gubun, $fIdx)
	{
		global $common;
		$msg					=	new Message();

		if ( $idx == '' || $gubun == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $gubun == 'file' ) {
			//	원본파일 삭제
			$rsSQL				=	"
									SELECT filePath, fileName
									FROM tbl_bbsFile
									WHERE bIdx = '$idx' AND idx = '$fIdx'
									";
			//echo $rsSQL3;
			$rsData				=	$this->dbm->execute($rsSQL, '1');
			$rsData				=	$rsData->getData();

			if ( $rsData ) {
				foreach ( $rsData as $val )
				{
					$delFile	=	$common['wwwPath'] . $val['filePath'] . $val['fileName'];
					if ( file_exists($delFile) ) {
						@unlink($delFile);
					}
				}
			}

			$strSQL				=	"DELETE FROM tbl_bbsFile WHERE bIdx = '$idx' AND idx = '$fIdx'";
			$msg				=	$this->dbm->execute($strSQL, '1');
			return $msg;
		} else {
			$rsSQL				=	"
									SELECT boardID, thumbImgPC, thumbImgMO
									FROM tbl_bbs
									WHERE idx = '$idx'
									";
			//echo $rsSQL3;
			$rsData				=	$this->dbm->execute($rsSQL, '1');
			$rsData				=	$rsData->getData();

			if ( $rsData ) {
				foreach ( $rsData as $val )
				{
					$uploadPath			=	$common['defaultPath'] . '/boardFile/' . $val['boardID'] . '/';

					if ( $gubun == 'PC' ) {
						$delFile		=	$uploadPath . $val['thumbImgPC'];
						if ( file_exists($delFile) ) {
							@unlink($delFile);
						}

						$strSQL			=	"UPDATE tbl_bbs SET thumbImgPC = '' WHERE idx = $idx";
						$msg			=	$this->dbm->execute($strSQL, '1');
						return $msg;
					} else {
						$delFile		=	$uploadPath . $val['thumbImgMO'];
						if ( file_exists($delFile) ) {
							@unlink($delFile);
						}

						$strSQL			=	"UPDATE tbl_bbs SET thumbImgMO = '' WHERE idx = $idx";
						$msg			=	$this->dbm->execute($strSQL, '1');
						return $msg;
					}
				}
			}
		}
	}
	//	선택 파일 삭제


	//	선택 이미지 삭제
	public function setBBSImageDelProc($idx, $fIdx)
	{
		global $common;
		$msg					=	new Message();

		if ( $idx == '') {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		//	원본이미지 삭제
		$rsSQL				=	"
								SELECT boardID, bIdx, upImageName
								FROM tbl_bbsImage
								WHERE bIdx = '$idx' AND idx = '$fIdx'
								";
		//echo $rsSQL3;
		$rsData				=	$this->dbm->execute($rsSQL, '1');
		$rsData				=	$rsData->getData();

//		if ( $rsData ) {
//			foreach ( $rsData as $val )
//			{
//				$delFile	=	'/uploadFiles/boardFile/' . $val['boardID'] . '/' . $val['fileName'];
//				
//				if ( file_exists($delFile) ) {
//					@unlink($delFile);
//				}
//			}
//		}

		$strSQL				=	"DELETE FROM tbl_bbsImage WHERE bIdx = '$idx' AND idx = '$fIdx'";
		$msg				=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	선택 이미지 삭제


	//	메일 발송
	public function setSendMailProc($bID, $idx)
	{
		global $common;
		$msg					=	new Message();

		if ( $bID == '' || $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$rsSQL1					=	"SELECT subject, contents FROM tbl_bbs WHERE idx = '$idx'";
		//echo $rsSQL1;
		$rs						=	$this->dbm->execute($rsSQL1, '1');
		$rs						=	$rs->getData();
		if ( $rs ) {
			$homeURL			=	'https://' . $common['wwwURL'];
			$subject			=	$rs[0]['subject'];
			$contents			=	$rs[0]['contents'];
			//$contents			=	str_replace('/uploadFiles/boardImg/', $homeURL . '/uploadFiles/boardImg/', $contents);

			preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $contents, $matches1);
			foreach ( $matches1[1] as $k => $val1 )
			{
				if ( strpos($val1, 'http://') === false ) {
					$fImgSrc1	=	$homeURL . $val1;
					$contents	=	str_replace($val1, $fImgSrc1, $contents);
				}
			}

			if ( $bID == '11' ) {
				$pageID			=	'1';
			} else {
				$pageID			=	'3';
			}

			$rsSQL2				=	"SELECT mailAddr FROM tbl_newsEmail WHERE pageID = '$pageID' AND isAuth = 'Y' AND isMail = 'Y'";
			//echo $rsSQL2;
			$rsRow				=	$this->dbm->execute($rsSQL2, '1');
			$rsRow				=	$rsRow->getData();

			if ( $rsRow ) {
				foreach ( $rsRow as $val )
				{
					$nameFrom	=	$common['sendName'];
					$mailFrom	=	$common['sendMail'];
					$mailTo		=	$val['mailAddr'];

					$headers	.=	"From: ". $nameFrom ." <". $mailFrom .">" . "\n";
					$headers	.=	"Return-Path: " . $mailFrom . "\n";
					$headers	.=	"MIME-Version: 1.0" . "\n";
					$headers	.=	"X-Priority: 3" . "\n";
					$headers	.=	"X-MSMail-Priority: Normal" . "\n";
					$headers	.=	"X-Mailer: PHP " . phpversion() . "\n";
					$headers	.=	"Content-Type: text/html; charset=utf-8";

					$result		=	mail($mailTo, $subject, $contents, $headers);
				}
				return true;
			} else {
				return false;
			}
		}
	}
	//	메일 발송






	//	메일 리스트
	public function getMailList($pageNo, $recordPerPage, $pageID, $schSDate, $schEDate, $schMail, $schIsAuth, $schIsMail)
	{
		global $common;
		$msg					=	new Message();

		if ( $pageID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$where1					=	'';
		$where2					=	'';
		$where3					=	'';
		$where4					=	'';

		if ( $schSDate && $schEDate ) {
			$where1				=	" AND regDate >= '$schSDate 00:00:00' AND regDate <= '$schEDate 23:59:59'";
		}

		if ( $schMail ) {
			$where2				=	" AND BINARY mailAddr LIKE '%$schMail%'";
		}

		if ( $schIsAuth ) {
			$where3				=	" AND isAuth = '$schIsAuth'";
		}

		if ( $schIsMail ) {
			$where4				=	" AND isMail = '$schIsMail'";
		}

		$strSQL					=	"
									SELECT	mailAddr, isAuth, isMail, regDate
									FROM tbl_newsEmail
									WHERE pageID = '$pageID'
									"
									. $where1 . $where2 . $where3 . $where4 .
									"
									ORDER BY regDate DESC
									LIMIT $pageNo, $recordPerPage
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL, '1');

		$strSQL					=	"
									SELECT IFNULL(count(pageID), 0) AS count
									FROM tbl_newsEmail
									WHERE pageID = '$pageID'
									" . $where1 . $where2 . $where3 . $where4;
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg2					=	$this->dbm->execute($strSQL, '1');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	메일 리스트

	//	메일 수신여부 변경
	public function setMailChgProc($pageID, $mailAddr, $isMail)
	{
		$msg					=	new Message();

		if ( $pageID == '' || $mailAddr == '' || $isMail == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									UPDATE tbl_newsEmail SET
										isMail						=	'$isMail'
									WHERE pageID = '$pageID' AND mailAddr = '$mailAddr'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	메일 수신여부 변경

	//	메일 삭제
	public function setMailDelProc($data)
	{
		global $common;
		$msg					=	new Message();

		if ( !is_array($data) ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"DELETE FROM tbl_newsEmail WHERE pageID = '$data[pageID]' AND mailAddr = '$data[mailAddr]'";
		//print_r($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	메일 삭제

	// 메일 발송 히스토리 업데이트
	public function setWebinarVideoProc($bID, $idx)
	{
		$msg					=	new Message();

		if ( $idx == '') {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									UPDATE tbl_bbs SET
										isSendMail					=	'1'
									WHERE idx						=	'$idx'
									AND	boardID = '$bID'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	// 메일 발송 히스토리 업데이트














	//	Main Page
	public function getMainBBS($gubun)
	{
		global $common;
		$msg					=	new Message();

		if ( $gubun == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		//	오늘
		$schDate1				=	DATE('Y-m-d');

		//	7일전
		$schDate2				=	DATE('Y-m-d', strtotime('-7 Day', strtotime($schDate1)));

		//	30일전
		$schDate3				=	DATE('Y-m-d', strtotime('-30 Day', strtotime($schDate1)));

		if ( $gubun == '1' ) {																				//	고객센터 문의-국문 총합으로 계산(bID=15, bID=17, bID=19, bID=21, bID=23, bID=25, bID=27)
			$strSQL1			=	"
									SELECT count(idx) AS cnt
									FROM tbl_bbs
									WHERE boardID IN ('15', '17', '19', '21', '23', '25', '27') AND regDate >= '$schDate1 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL1);
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt1			=	$tmp[0]['cnt'];
			} else {
				$cnt1			=	0;
			}

			$strSQL2			=	"
									SELECT count(idx) AS cnt
									FROM tbl_bbs
									WHERE boardID IN ('15', '17', '19', '21', '23', '25', '27') AND regDate >= '$schDate2 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL2);
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt2			=	$tmp[0]['cnt'];
			} else {
				$cnt2			=	0;
			}

			$strSQL3			=	"
									SELECT count(idx) AS cnt
									FROM tbl_bbs
									WHERE boardID IN ('15', '17', '19', '21', '23', '25', '27') AND regDate >= '$schDate3 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL3, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt3			=	$tmp[0]['cnt'];
			} else {
				$cnt3			=	0;
			}
		} else if ( $gubun == '2' ) {																		//	웨비나 참가 신청-국문의 행(레코드) 수로 계산(bID=29)
			$strSQL1			=	"
									SELECT count(idx) AS cnt
									FROM tbl_bbs
									WHERE boardID = '29' AND regDate >= '$schDate1 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL1, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt1			=	$tmp[0]['cnt'];
			} else {
				$cnt1			=	0;
			}

			$strSQL2			=	"
									SELECT count(idx) AS cnt
									FROM tbl_bbs
									WHERE boardID = '29' AND regDate >= '$schDate2 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL2, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt2			=	$tmp[0]['cnt'];
			} else {
				$cnt2			=	0;
			}

			$strSQL3			=	"
									SELECT count(idx) AS cnt
									FROM tbl_bbs
									WHERE boardID = '29' AND regDate >= '$schDate3 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL3, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt3			=	$tmp[0]['cnt'];
			} else {
				$cnt3			=	0;
			}
		} else if ( $gubun == '3' ) {																		//	뉴스레터 신청-국문의 행(레코드) 수로 계산
			$strSQL				=	"
									SELECT count(pageID) AS cnt
									FROM tbl_newsEmail
									WHERE pageID = '1' AND regDate >= '$schDate1 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt1			=	$tmp[0]['cnt'];
			} else {
				$cnt1			=	0;
			}

			$strSQL2			=	"
									SELECT count(pageID) AS cnt
									FROM tbl_newsEmail
									WHERE pageID = '1' AND regDate >= '$schDate2 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL2, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt2			=	$tmp[0]['cnt'];
			} else {
				$cnt2			=	0;
			}

			$strSQL3			=	"
									SELECT count(pageID) AS cnt
									FROM tbl_newsEmail
									WHERE pageID = '1' AND regDate >= '$schDate3 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL3, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt3			=	$tmp[0]['cnt'];
			} else {
				$cnt3			=	0;
			}
		} else if ( $gubun == '4' ) {																		//	웨비나 알림 이메일-국문의 행(레코드) 수로 계산
			$strSQL				=	"
									SELECT count(pageID) AS cnt
									FROM tbl_newsEmail
									WHERE pageID = '3' AND regDate >= '$schDate1 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt1			=	$tmp[0]['cnt'];
			} else {
				$cnt1			=	0;
			}

			$strSQL2			=	"
									SELECT count(pageID) AS cnt
									FROM tbl_newsEmail
									WHERE pageID = '3' AND regDate >= '$schDate2 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL2, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt2			=	$tmp[0]['cnt'];
			} else {
				$cnt2			=	0;
			}

			$strSQL3			=	"
									SELECT count(pageID) AS cnt
									FROM tbl_newsEmail
									WHERE pageID = '3' AND regDate >= '$schDate3 00:00:00' AND regDate <= '$schDate1 23:59:59'
									";
			$msg				=	$this->dbm->execute($strSQL3, '1');
			$tmp				=	$msg->getData();
			if ( $tmp ) {
				$cnt3			=	$tmp[0]['cnt'];
			} else {
				$cnt3			=	0;
			}
		}

		$strSQL					=	"SELECT $cnt1 AS todayCnt, $cnt2 AS weekCnt1, $cnt3 AS monthCnt";
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}

	//	해당 게시판 갯수
	public function getMainBBSCnt($bID)
	{
		global $common;
		$msg					=	new Message();

		if ( $bID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT count(idx) AS cnt
									FROM tbl_bbs
									WHERE boardID = '$bID'
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$tmp					=	$msg->getData();
		if ( $tmp ) {
			$cnt				=	$tmp[0]['cnt'];
		} else {
			$cnt				=	0;
		}
		return $cnt;
	}
	//	해당 게시판 글 수
	//	게시물 관리	=======================================================================================================














	//	사용자단	=======================================================================================================
	//	뉴스레터 구독 신청
	public function setNewsLetterRequestProc($data)
	{
		$msg					=	new Message();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$pageID					=	$data['pageID'];
		$mailAddr				=	$data['mailAddr'];

		$strSQL					=	"
									INSERT INTO tbl_newsEmail
										(pageID, mailAddr) VALUES
										('$pageID', '$mailAddr')
									ON DUPLICATE KEY UPDATE
										blank						=	''
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	뉴스레터 구독 신청

	//	뉴스레터 구독 신청 API
	public function apiNewsLetterRequestProc($data)
	{
		$msg					=	new Message();

		if ( count($data) <= 0 ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$pageID					=	1;
		$mailAddr				=	$data['mailAddr'];
		$referer				=	2;

		$strSQL					=	"
									INSERT INTO tbl_newsEmail
										(pageID, mailAddr, referer) VALUES
										('$pageID', '$mailAddr', '$referer')
									ON DUPLICATE KEY UPDATE
										blank						=	''
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	뉴스레터 구독 신청

	//	뉴스레터 구독 신청 인증
	public function setNewsLetterRequestAuthProc($pageID, $mailAddr)
	{
		$msg					=	new Message();

		if ( $pageID == '' || $mailAddr == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									UPDATE tbl_newsEmail SET
										isAuth						=	'Y'
									WHERE pageID = '$pageID' AND mailAddr = '$mailAddr'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	뉴스레터 구독 신청 인증


	//	게시판 글 리스트 with paging
	public function getFrontBBSList($pageNo, $recordPerPage, $boardID, $schCate1, $schCate2, $schCate3, $schField, $schWord, $sortGubun)
	{

		global $common;
		$msg					=	new Message();

		if ( $boardID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$where1					=	'';
		$where2					=	'';
		$where3					=	'';
		$where4					=	'';

		if ( $schCate1 ) {
            if ($schCate1=='246'){
                $where1				=	" AND (bbs.boardCategory1 = '29' OR bbs.boardCategory1 = '246' OR bbs.boardCategory1 = '163') ";
            }else{
                $where1				=	" AND bbs.boardCategory1 = '$schCate1'";
            }

		}

		if ( $schCate2 ) {
			$where2				=	" AND bbs.boardCategory2 = '$schCate2'";
		}

		if ( $schCate3 ) {
			$where3				=	" AND bbs.boardCategory3 = '$schCate3'";
		}

		if ( $schField && $schWord ) {
			if ( $schField == '1' ) {
				$where4			=	" AND BINARY bbs.subject LIKE '%$schWord%'";
			} else {
				$where4			=	" AND BINARY bbs.contents LIKE '%$schWord%'";
			}
		}

		if ( $sortGubun ) {
			if ( $sortGubun == 'regDate' ) {
				$orderBy		=	' ORDER BY bbs.regDate DESC';
			} else {
				$orderBy		=	' ORDER BY bbs.hitCount DESC';
			}
		} else {
			$orderBy			=	' ORDER BY bbs.boardRef DESC, bbs.boardStep ASC';
		}

		$strSQL					=	"
									SELECT	bbs.idx, bbs.boardRef, bbs.boardStep, bbs.boardLevel, bbs.subject, bbs.contents,
											bbs.thumbImgPC, bbs.thumbImgMO, bbs.s_Name, bbs.s_date, bbs.s_sTime, bbs.s_eTime,
											bbs.mobile, bbs.email, bbs.corpName, bbs.country, bbs.isReservation, bbs.sendDate,
											bbs.hitCount, bbs.isDisplay, bbs.state, bbs.regDate, sf.userName
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_staff AS sf ON
									sf.userIdx = bbs.writerIdx
									WHERE bbs.boardID = '$boardID' AND isDisplay = 'Y'
									"
									. $where1 . $where2 . $where3 . $where4 . $orderBy .
									"
									LIMIT $pageNo, $recordPerPage
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
        
		$msg					=	$this->dbm->execute($strSQL, '1');

		$strSQL					=	"
									SELECT IFNULL(count(bbs.idx), 0) AS count
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_staff AS sf ON
									sf.userIdx = bbs.writerIdx
									WHERE bbs.boardID = '$boardID' AND isDisplay = 'Y'
									" . $where1 . $where2 . $where3 . $where4;
		//echo $strSQL;
		$msg2					=	$this->dbm->execute($strSQL, '1');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	게시판 글 리스트 with paging

	//	게시판 글 정보 가져오기
	public function getFrontBBSInfo($bID, $idx, $schCate, $sortGubun, $isHit = '')
	{
		global $common;

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $isHit == 'Y' ) {
			if ( $common['userIdx'] != '1' ) {
				$strSQL1		=	"UPDATE tbl_bbs SET hitCount = hitCount + 1 WHERE idx = $idx";
				//echo($strSQL1);
				$r1				=	$this->dbm->execute($strSQL1, '1');
			}
		}

		if ( $schCate ) {
			$where				=	" AND bbs.boardCategory1 = '$schCate'";
		} else {
			$where				=	'';
		}

		if ( $sortGubun ) {
			if ( $sortGubun == 'regDate' ) {
				$orderBy		=	' ORDER BY bbs.regDate DESC';
				$orderBy1		=	' ORDER BY bbs.regDate ASC';
			} else {
				$orderBy		=	' ORDER BY bbs.hitCount DESC';
				$orderBy1		=	' ORDER BY bbs.hitCount ASC';
			}
		} else {
			$orderBy			=	' ORDER BY bbs.boardRef DESC, bbs.boardStep ASC';
			$orderBy1			=	' ORDER BY bbs.boardRef ASC, bbs.boardStep DESC';
		}

		//	현재글의 등록일
		$strSQL					=	"
									SELECT regDate
									FROM tbl_bbs
									WHERE idx = $idx
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$temp					=	$msg->getData();
		if ( $temp ) {
			$regDate			=	$temp[0]['regDate'];
		}
		//	현재글의 등록일

		//	이전 글번호
		$strSQL					=	"
									SELECT IFNULL(bbs.idx, 0) AS prevIdx, bbs.subject AS prevSub, bbs.regDate AS prevDate
									FROM tbl_bbs AS bbs
									WHERE bbs.boardID = '$bID' AND idx <> '$idx' AND isDisplay = 'Y' AND bbs.regDate <= '$regDate'
									"
									. $where . $orderBy .
									"
									LIMIT 1
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$temp					=	$msg->getData();
		if ( $temp ) {
			$prevIdx			=	$temp[0]['prevIdx'];
			$prevSub			=	addslashes($temp[0]['prevSub']);
		} else {
			$prevIdx			=	0;
			$prevSub			=	0;
		}
		//	이전 글번호

		//	다음 글번호
		$strSQL					=	"
									SELECT IFNULL(bbs.idx, 0) AS nextIdx, bbs.subject AS nextSub, bbs.regDate AS nextDate
									FROM tbl_bbs AS bbs
									WHERE bbs.boardID = '$bID' AND idx <> '$idx' AND isDisplay = 'Y' AND bbs.regDate >= '$regDate'
									"
									. $where . $orderBy1 .
									"
									LIMIT 1
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$temp					=	$msg->getData();
		if ( $temp ) {
			$nextIdx			=	$temp[0]['nextIdx'];
			$nextSub			=	addslashes($temp[0]['nextSub']);
		} else {
			$nextIdx			=	0;
			$nextSub			=	0;
		}
		//	다음 글번호

		$strSQL					=	"
									SELECT	bbs.boardRef, bbs.boardStep, bbs.boardLevel, bbs.boardCategory1, bbs.boardCategory2,
											bbs.subject, bbs.writerIdx, sf.userName, bbs.s_Name, bbs.s_date, bbs.s_sTime, bbs.s_eTime,
											bbs.mobile, bbs.email, bbs.corpName, bbs.jobName, bbs.country, bbs.countryCode, pc2.codeName AS countryName,
											bbs.contents, bbs.bbsMemo, bbs.thumbImgPC, bbs.thumbImgMO, bbs.isReservation, bbs.sendDate,
											bbs.startDate, bbs.endDate, bbs.hitCount, bbs.highYN, bbs.isDisplay, bbs.state, bbs.regDate,
											pc1.codeName AS stateName,
											(
												SELECT codeName
												FROM tbl_pubCode
												WHERE pubCode = bbs.boardCategory1
											) AS bbsCateName1,
											(
												SELECT codeName
												FROM tbl_pubCode
												WHERE pubCode = bbs.boardCategory2
											) AS bbsCateName2,
											'$prevIdx' AS prevIdx, '$prevSub' AS prevSub, '$nextIdx' AS nextIdx, '$nextSub' AS nextSub
									FROM tbl_bbs AS bbs
									INNER JOIN tbl_staff AS sf ON
									sf.userIdx = bbs.writerIdx
									LEFT OUTER JOIN tbl_pubCode AS pc1 ON
									pc1.pubCode = bbs.state
									LEFT OUTER JOIN tbl_pubCode AS pc2 ON
									pc2.pubCode = bbs.countryCode
									WHERE bbs.idx = $idx
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시판 글 정보 가져오기
	//	사용자단	=======================================================================================================
}
?>