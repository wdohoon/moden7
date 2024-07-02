<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_LIB_PATH.'/register.lib.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// 리퍼러 체크
referer_check();

if (!($w == '' || $w == 'u')) {
    alert('w 값이 제대로 넘어오지 않았습니다.');
}

if ($w == 'u' && $is_admin == 'super') {
    if (file_exists(G5_PATH.'/DEMO'))
        alert('데모 화면에서는 하실(보실) 수 없는 작업입니다.');
}

/*
if (!chk_captcha()) {
    alert('자동등록방지 숫자가 틀렸습니다.');
}
*/

//===============================================================



if($w=='u'){



$mb_password = $_POST['new_pass'];


}


if($_POST['mb_idt'] && !$member['mb_id']){

	if ($w == 'u') {   

		$sql_password = "";
		if ($mb_password)
			$sql_password = "  mb_password = '".get_encrypt_string($mb_password)."' ";   

	   

		$sql = " update {$g5['member_table']}
					set {$sql_password}                    
				  where mb_id = '".$_POST['mb_idt']."' ";
		sql_query($sql);
	}

	

}else{

alert("잘못된 접근입니다");

}


if ($msg)
    echo '<script>alert(\''.$msg.'\');</script>';

run_event('register_form_update_after', $mb_id, $w);

if ($w == '') {
    //goto_url(G5_HTTP_BBS_URL.'/register_result.php');
    goto_url(G5_URL);
} else if ($w == 'u') {
?>

<link rel="stylesheet" href="/css/front.css">		
<div class="modal" id="modalAlert">
	<div class="modal-dialog" style="max-width:800px">
		<div class="modal-content">
			<div class="modal-header">
				<h5>알림</h5>
				<!--<button class="close" data-dismiss="modal"></button>-->
			</div>
			<div class="modal-body">
				<div class="txt1 text-center">암호 재설정 성공</div>
			</div>
			<div class="modal-footer">
				<button class="btn1 block gohomes" data-dismiss="modal">완료</button>
			</div>
		</div>
	</div>
</div>
<script src="/js/jquery-1.12.4.min.js"></script>
<script src="/js/front.js"></script>
<script>
$('#modalAlert').modal();
$(".gohomes").click(function(){
	location.href="/";
})
</script>


<?php
}
?>