<?php
if ( $common['userIdx'] == '' ) {
?>
<script>
	//alert("관리자로 로그인 후 사용해 주세요.");
	top.location.href			=	"/admin/dist/public/login.php";
</script>
<?php
	exit;
} else {
	include $_SERVER['DOCUMENT_ROOT'] . '/common/inc/userConfig.php';
}
?>