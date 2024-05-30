<?
if ( strpos( $selfPage , $common['adminURL'] ) !== false ) {
	$goPage						=	$common['adminURL'];
} else {
	$goPage						=	'/';
}

if ( $bID ) {
	$data						=	$common['BoardManager']->getBoardInfo($bID);
	$data						=	$data->getData();
	$rs							=	$data[0];

	if ( $rs ) {
		$boardIcon				=	$rs['boardIcon'];
		$boardName				=	$rs['boardName'];
		$isCategory				=	$rs['isCategory'];
		$category				=	$rs['category'];
		$categoryNum			=	$rs['categoryNum'];
		$isUpload				=	$rs['isUpload'];
		$uploadCnt				=	$rs['uploadCnt'];
		$isImage				=	$rs['isImage'];
		$imageCnt				=	$rs['imageCnt'];
		$isDate					=	$rs['isDate'];
		$sortGubun				=	$rs['sortGubun'];
		$isTop					=	$rs['isTop'];
		$isThumb				=	$rs['isThumb'];
		$isState				=	$rs['isState'];
		$isPhone				=	$rs['isPhone'];
		$isMail					=	$rs['isMail'];
		$isName					=	$rs['isName'];
		$isSchedule				=	$rs['isSchedule'];
		$isCorp					=	$rs['isCorp'];
		$isJob					=	$rs['isJob'];
		$isCountry1				=	$rs['isCountry1'];
		$isCountry2				=	$rs['isCountry2'];
		$isMovieLink			=	$rs['isMovieLink'];
		$menuCode				=	$rs['menuCode'];
	} else {
		$common['CommonManager']->goPage($goPage, $msg = '필요한 정보가 없습니다1. 다시 시도해 주세요.', '');
		exit();
	}
} else {
	$common['CommonManager']->goPage($goPage, $msg = '필요한 정보가 없습니다2. 다시 시도해 주세요.', '');
	exit();
}
?>