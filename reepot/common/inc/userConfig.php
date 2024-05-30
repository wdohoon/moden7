<?php
if ( $common['userIdx'] ) {
	$data						=	$common['MemberManager']->getStaffModify($common['userIdx']);
	$data						=	$data->getData();
	$rs							=	$data[0];

	if ( $rs ) {
		$i_userID				=	$rs['userID'];
		$i_userName				=	$rs['userName'];
		$i_userMobile			=	$rs['userMobile'];
		$i_userGubun			=	$rs['userGubun'];
		$i_userPositionName1	=	$rs['userPositionName1'];
		$i_userPositionName2	=	$rs['userPositionName2'];
	}
}
?>