<?php
include_once('./_common.php');

$brand = $_POST['brand'];

?>
<style>
.video_list {width:1320px;margin:0 auto;padding:50px 0px 110px;}
.video_list ul {display: flex; flex-wrap:wrap; gap:5px;}
.video_list ul:after {content:"";display:block;clear:both;}
.video_list ul li {width:435px;height:250px;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

@media (max-width:1760px){
.video_list {width:75.0000vw;margin:0 auto;padding:2.8409vw 0.0000vw 6.2500vw;}
.video_list ul { gap:0.2841vw;}
.video_list ul:after {clear:both;}
.video_list ul li {width:24.7159vw;height:14.2045vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}
}

@media (max-width:1600px){
.video_list {width:82.5000vw;margin:0 auto;padding:3.1250vw 0.0000vw 6.8750vw;}
.video_list ul { gap:0.3125vw;}
.video_list ul:after {clear:both;}
.video_list ul li {width:27.1875vw;height:15.6250vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}
}

@media (max-width:1400px){
.video_list {width:94.2857vw;margin:0 auto;padding:3.5714vw 0.0000vw 7.8571vw;}
.video_list ul {gap:0.3571vw;}
.video_list ul:after {clear:both;}
.video_list ul li {width:31.0714vw;height:17.8571vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

}

@media (max-width:1024px){
.video_list {width:100%;margin:0 auto;padding:4.8828vw 3.9063vw 10.7422vw;}
.video_list ul {gap:0.4883vw;}
.video_list ul:after {clear:both;}
.video_list ul li {width:32.97%;height:auto;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}
}

@media (max-width:768px){
.video_list {width:100%;margin:0 auto;padding:6.5104vw 0vw 14.3229vw;}
.video_list ul { gap:unset; justify-content:space-between;}
.video_list ul:after {display: none;}
.video_list ul li {width:49%;height:auto; margin-bottom:2vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}
}

@media (max-width:480px){
.video_list {width:100%;margin:0 auto;padding:10.4167vw 0.0000vw 22.9167vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:100%;height:auto;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}
}
</style>
<?php 
$path =$_SERVER['DOCUMENT_ROOT']."/video/".$brand."";
$num = count(scandir($path))-2;
//print_r2(scandir($path));
?>

<div class="video_list on <?php echo $brand; ?>">
	<ul>
		<!-- 각 브랜드명 폴더안에 영상 갯수만큼 li있어야함 -->
		<?php 
			for($i=0; $i<$num; $i++){
		?>
		<li>
			<a href="javascript:;" onclick="view_pp2('<?php echo $brand; ?>', '<?php echo $i+1; ?>');">
				<img src="/video/thumb/<?php echo $brand; ?><?php echo $i+1; ?>.png" alt="" style="border:1px solid #ccc">
			</a>
		</li>
		<?php 
			} 
		?>
	</ul>
</div>

<script>
function view_pp2(brand, id) {
	$('.gnb_wrap').addClass('off');
	$.ajax({
		url : "/ajax_video.php",
		type: "POST",
		data: {'brand':brand,'wrid':id},
		async: false,
		success: function(msg) {
			$("#store_pop").html(msg).show();
		},error: function(request,status,error){
			alert("code = "+ request.status + " message = " + request.responseText + " error2 = " + error);
		}
	})
}
</script>