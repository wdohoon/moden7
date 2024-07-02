<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
$code = $member['mb_9'];

$linkurl  = "http://oknawallet.io/bbs/register_form.php?ref=".$member['mb_9'];

$imgfile = "./qr/".$code.".png";
?>
	
<header>
	<div class="left">
		<a href="javascript:history.back();" class="prev"></a>
	</div>
	<h2>초대하기</h2>
</header>
	
	
	
	<div class="mylevel">
		<img src="img/common/card.svg"> 
	</div>
	
	<hr class="hr">
	
	<div class="mycode">
		<h3 class="h3">나의 초대 코드</h3>
		<div class="qr"><img src='<?php echo $imgfile; ?>' style="width:100%"></div>
		<div class="mb10"><input type="text" class="inp" value="<?php echo $code;?>" style="width:100%" maxlength="8" readonly></div>
		<div class="btns">
			<button class="btn1 btn-s" id="BtnCopy">복사하기</button>
			<button class="btn1 btn-s" id="shar_bt">공유하기</button>
		</div>
	</div>
	
	<div class="modal" id="modalAlert">
		<div class="modal-dialog" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<h5>알림</h5>
					<!--<button class="close" data-dismiss="modal"></button>-->
				</div>
				<div class="modal-body">
					<div class="txt1 text-center">초대코드가 복사 되었습니다.</div>
				</div>
				<div class="modal-footer">
					<button class="btn1 block" data-dismiss="modal">완료</button>
				</div>
			</div>
		</div>
	</div>
	
	<script>

	function copyToClipboard(val) 
	{
	  var t = document.createElement("textarea");
	  document.body.appendChild(t);
	  t.value = val;
	  t.select();
	  document.execCommand('copy');
	  document.body.removeChild(t);
	}

	$('#BtnCopy').click(function(){
		copyToClipboard('<?php echo $linkurl;?>');
		$('#modalAlert').modal();
	})
	
	$('#shar_bt').click(function(){
		if(navigator.share){
			navigator.share({
				title: "oikonomia 초대하기",
				text: "oikonomia",
				url: '<?php echo $linkurl;?>',
			})
		}else{
			//alert("n");
		}
	})
	

	</script>


<?php
include_once(G5_PATH.'/tail.php');
?>