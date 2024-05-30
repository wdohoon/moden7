<?php
include_once('./_common.php');

$wr_id = $_POST['wrid'];
$brand = $_POST['brand'];


?>
<style>
.water {user-select: none;position:absolute;left:45%;top:45%;z-index:90;font-size: 30px;font-weight: 700;opacity: 0.5;}
.water_for{user-select: none;position:absolute;right:0;top:0;z-index:90;font-size: 18px;font-weight: 700;opacity: 0.5;}
/* @media (max-width:1760px){
.water {user-select: none;left:1.7045vw;top:2.8409vw;font-size: 1.0227vw;opacity: 0.3;}
}

@media (max-width:1600px){
.water {user-select: none;left:1.8750vw;top:3.1250vw;font-size: 1.1250vw;opacity: 0.3;}
}

@media (max-width:1400px){
.water {user-select: none;left:2.1429vw;top:3.5714vw;font-size: 1.2857vw;opacity: 0.3;}
}

@media (max-width:1024px){
.water {user-select: none;left:2.9297vw;top:4.8828vw;font-size: 1.7578vw;opacity: 0.3;}
}

@media (max-width:768px){
.water {user-select: none;left:3.9063vw;top:6.5104vw;font-size: 2.3438vw;opacity: 0.3;}
}

@media (max-width:480px){
.water {user-select: none;left:6.2500vw;top:10.4167vw;font-size: 3.7500vw;opacity: 0.3;}
} */
</style>
<div class="store_pop">
	<p class="water"><?php echo $member['mb_id']?></p>
	<p class="water_for">디지털 포렌식 워터마크(Digital Forensic Watermark),영상유포시 출처 확인됩니다.</p>
	<video id="popupVideo" width="100%" height="100%" autoplay controls="controls">
		<source src="/video/<?php echo $brand; ?>/<?php echo $brand; ?><?php echo $wr_id?>.mp4" type="video/mp4">
	</video>
	<!-- <div class="store_pop_close show720"><a href="javascript:;"><img src="<?php echo G5_URL?>/images/mobile/btn_pop_close.png" alt="팝업창 닫기"></a></div> -->
</div>

<script>

</script>