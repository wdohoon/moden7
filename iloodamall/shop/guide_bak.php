<?php
include_once('./_common.php');

//정품인증회원만 노출
$mygenuine = sql_fetch("select * from g5_write_genuine where mb_id = '{$member['mb_id']}'");

if(!$is_admin){
	if(!$mygenuine['mb_id']){ 
		alert("정품인증 회원만 접속 가능합니다.", G5_SHOP_URL."/genuine.php");
	}
}

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/guide.php');
    return;
}

//define("_INDEX_", TRUE);

$on = '1';

include_once(G5_SHOP_PATH.'/shop.head.php');

?>

<style>
#wrapper {background: #fff;}
#container {width:100%;max-width:1920px;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/* sub_w */
.sub_w {}
.s_inner {width:1600px;margin:0 auto;}
.s_inner::after {content:"";display:block;clear:both;}

/* common */
.left {float:left;}
.right {float:right;}

.sub_div {}
.sub_title {color:#b1b4b9; font-size: 48px;font-weight: 700;text-align: center;padding:100px 0 50px;font-family: 'Noto Sans KR', sans-serif !important;}


.video_list {width:1320px;margin:0 auto;padding:50px 0px 110px;}
.video_list ul {display: flex; flex-wrap:wrap;}
.video_list ul:after {content:"";display:block;clear:both;}
.video_list ul li {width:440px;height:250px;float:left;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); z-index:99999;}
.store_pop {position: relative;width:1280px; height:720px; position:fixed; top:50%; left:50%; transform: translate(-50%, -50%);z-index:99;background:#fff;}


.tab_title{width: 1386px; text-align: center;margin:30px auto 0; display:flex; justify-content:flex-start; align-items:center; flex-wrap: wrap;}
.tab_title li {cursor: pointer;width: 126px;height: 40px;text-align: center;line-height: 40px;font-size: 16px;background: #EBEBEB;color: #434343;border:1px solid #E3E3E3;font-family: 'NanumSquareNeo'; padding:0 4px;}
.tab_title li.on {background: #fff;}

.tab_title1{width: 1386px;margin:0 auto; display:flex; justify-content:flex-start; align-items:center; flex-wrap: wrap;text-align:center;height: 100px; border:solid 1px #E3E3E3; border-top: none;}
.tab_title1 li {cursor: pointer;width: 126px;height: 40px;line-height: 40px;font-size: 16px;font-family: 'NanumSquareNeo'; margin-bottom: 1%; padding:0 4px;}
.tab_title1 li.on {color: #000; font-weight:800;}

.tab_cont {clear: both;}
.tab_cont > div {display: none;text-align: center;}
.tab_cont > div.on {display: block;}


@media (max-width: 1760px)  {
#wrapper {background: #fff;}
#container {width:100%;max-width:100%;}
#container .is_index {margin-left:0;}
/* sub_w */
.sub_w {}
.s_inner {width:90.9091vw;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 2.7273vw;padding:5.6818vw 0 2.8409vw;}


.video_list {width:75.0000vw;margin:0 auto;padding:2.8409vw 0.0000vw 6.2500vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:25.0000vw;height:14.2045vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:72.7273vw; height:40.9091vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

.tab_title{width: 75.0000vw; margin:1.7045vw auto 0; align-items:center; flex-wrap: wrap;}
.tab_title li {cursor: pointer;width: 7.1591vw;height: 2.2727vw;line-height: 2.2727vw;font-size: 0.9091vw;}

.tab_title1{width: 75.0000vw; margin:1.7045vw auto 0; flex-wrap: wrap; gap:0.3409vw;}
.tab_title1 li {cursor: pointer;width: 7.1591vw;height: 2.2727vw;line-height: 2.2727vw;margin-bottom: 1%; padding:0 0.2273vw;}
}

@media (max-width: 1600px)  {
#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100.0000vw;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 3.0000vw;padding:6.2500vw 0 3.1250vw;}

.video_list {width:82.5000vw;margin:0 auto;padding:3.1250vw 0.0000vw 6.8750vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:27.5000vw;height:15.6250vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:80.0000vw; height:45.0000vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

.tab_title{width: 82.5000vw; margin:1.8750vw auto 0; align-items:center; flex-wrap: wrap;}
.tab_title li {cursor: pointer;width: 7.8750vw;height: 2.5000vw;line-height: 2.5000vw;font-size: 1vw;}

}

@media (max-width: 1400px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100%;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 3.4286vw;padding:7.1429vw 0 3.5714vw;}

.video_list {width:94.2857vw;margin:0 auto;padding:3.5714vw 0.0000vw 7.8571vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:31.4286vw;height:17.8571vw;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:91.4286vw; height:51.4286vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

.tab_title{width: 94.2857vw; margin:2.1429vw auto 0; align-items:center; flex-wrap: wrap;}
.tab_title li {cursor: pointer;width: 9.0000vw;height: 2.8571vw;line-height: 2.8571vw;font-size: 1.1429vw;}

}

@media (max-width: 1024px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100%;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 4.6875vw;padding:9.7656vw 0 4.8828vw;}

.video_list {width:100%;margin:0 auto;padding:4.8828vw 3.9063vw 10.7422vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:33.3333%;height:auto;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:93.7500vw; height:52.7344vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

.tab_title{width: 100%; margin:2.9297vw auto 0; align-items:center; flex-wrap: wrap; padding: 0vw 3.9063vw}
.tab_title li {cursor: pointer;width: 12.3047vw;height: 3.9063vw;line-height: 3.9063vw;font-size: 1.5625vw;}

}

@media (max-width: 768px)  {

#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100%;margin:0 auto;padding: 0 5.2083vw;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 6.2500vw;padding:13.0208vw 0 6.5104vw;}

.video_list {width:100%;margin:0 auto;padding:6.5104vw 0vw 14.3229vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:50%;height:auto;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:83.3333vw; height:46.8750vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}


.tab_title li.on{height: auto !important;border-bottom:none;}
.tab_title{width: 100%;margin:3.9063vw auto 0; justify-content:flex-start; align-items:center; flex-wrap: wrap;padding: 0;}
.tab_title li {cursor: pointer;width:25%;height: 5.2083vw;line-height: 5.2083vw;font-size: 2.2135vw;}
.tab_title1{display:flex;justify-content:space-between;width: 100%;}
.tab_title1 li{text-align: center;width: 33%;}

}

@media (max-width: 480px)  {

.sub_div {}
.sub_title {font-size: 10.0000vw;padding:16.6667vw 0 10.4167vw;}

.video_list {width:100%;margin:0 auto;padding:10.4167vw 0.0000vw 22.9167vw;}
.video_list ul {}
.video_list ul:after {clear:both;}
.video_list ul li {width:50%;height:auto;}
.video_list ul li img {width:100%;height:100%;object-fit:cover;}

.tab_title{margin:6.2500vw auto 0;padding: 0;}
.tab_title li {cursor: pointer;width: 29.2500vw;height: 8.3333vw;line-height: 8.3333vw;font-size: 3.5417vw;}

}

.tab_title li.on{background: #fff;height: auto;border-bottom:none;}
.tab_title li.on:first-child{background: #fff;height: 50px;border-bottom:none;border-right:none;}
.tab_title li.on:nth-child(n+2):nth-child(-n+10) {
    border-right: none;
    border-bottom: none;
	border-left:none;
}

</style>

<div class="sub_w">
	<!-- 탑 배너 -->
	<div class="sub_div div01">
		<p class="sub_title">제품 가이드</p>
		<div class="s_inner">
			<ul class="tab_title">
				<?php 
					$ordered_categories = array(
						'reepot',
						'curas hybrid',
						'secret RF',
						'secret DUO',
						'fraxis DUO',
						'n.core 3D',
						'pento',
						'veloce',
						'hyzer me',
						'acutron',
						'redicapture'
					);
					$sql = "select * from g5_write_genuine where mb_id='{$member['mb_id']}' ";
					$result = sql_query($sql);
					$row = sql_fetch($sql);

					$brbr = explode(',', $row['wr_1']);

					// 원하는 순서대로 카테고리를 정의합니다
					$ordered_list = "'reepot', 'curas hybrid', 'secret MAX', 'fortra', 'secret DUO', 'secret RF', 'n.core 3D', 'pento', 'veloce', 'fraxis DUO', 'hyzer me', 'acutron', 'redicapture'";

					// SQL 쿼리에서 ORDER BY FIELD 구문을 사용하여 원하는 순서대로 정렬합니다
					$sql = "SELECT DISTINCT TRIM(LEADING ' ' FROM wr_subject) AS wr_subject 
							FROM g5_write_serial 
							WHERE wr_subject NOT IN ('N.CORE PRIME', 'HEALER 1064', 'VIKINI', 'CURAS', 'FRAXIS', 'VELUX', 'ultra BEAUJET', 'I-GRAFT', 'RetiCapture') 
							ORDER BY FIELD(wr_subject, $ordered_list)";
					$result = sql_query($sql);

					//for($i = 0 ; $i < count($brbr) ; $i++) {
					for($i = 0 ; $row = sql_fetch_array($result) ; $i++) {
						if($row['wr_subject']=='N.CORE PRIME' || $row['wr_subject']=='HEALER 1064' || $row['wr_subject']=='VIKINI' || $row['wr_subject']=='CURAS' || $row['wr_subject']=='FRAXIS' || $row['wr_subject']=='VELUX' || $row['wr_subject']=='ultra BEAUJET' || $row['wr_subject']=='I-GRAFT'|| $row['wr_subject']=='RetiCapture'){

						}else{
					?>
					<li class="<?php if($i==0){ echo 'on'; } ?>" onClick="view_cate('<?php echo $row['wr_subject']; ?>')"><?php echo $row['wr_subject']; ?></li>
				<?php	}
					} 
				?>
			</ul>
			<ul class="tab_title1">
				<li>전체</li>
				<li>스토리</li>
				<li>가이드</li>
			</ul>
			<div id="tab_cont" class="tab_cont">
				<?php 
					$pathh =$_SERVER['DOCUMENT_ROOT']."/video/".$row['wr_subject']."";
					$numm = count(scandir($pathh))-2;
					//print_r2(scandir($pathh));
				?>
				<div class="video_list on <?php echo $row['wr_subject']; ?>">
					<!-- reepot -->
					<ul>
						<!-- 각 브랜드명 폴더안에 영상 갯수만큼 li있어야함 -->
						<?php 
							for($z=0; $z<$numm; $z++){
						?>
						<li>
							<a href="javascript:;" onclick="view_pp('<?php echo $row['wr_subject']; ?>', '<?php echo $z+1; ?>');">
								<img src="/video/thumb/<?php echo $row['wr_subject']; ?><?php echo $z+1; ?>.png" alt="" style="border:1px solid #ccc">
							</a>
						</li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
			<!-- 유튜브 팝업 -->
			<div id="store_pop">
				
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
    // 탭 클릭 이벤트 핸들러
    $(".tab_title1 li").click(function() {
        var category = $(this).text().trim(); // "전체", "스토리", "가이드"
        $(".tab_title1 li").removeClass("on");
        $(this).addClass("on");
        filterVideos(category);
    });

    // 페이지 로드 시 초기 필터링 - "전체" 탭을 기본값으로 설정
    $(".tab_title1 li").eq(0).addClass("on");
    filterVideos("전체");

    // 비디오 필터링 함수
	function filterVideos(category) {
		console.log("선택된 카테고리:", category); // 카테고리 확인

		if(category === "전체") {
			$(".video_list li").show();
		} else {
			$(".video_list li").each(function() {
				var videoCategory = $(this).data("category");
				console.log($(this).text(), videoCategory); // 비디오 카테고리 확인
				$(this).toggle(videoCategory === category);
			});
		}
	}

});
</script>
<!-- } content -->
<script>
$(document).ready(function() {
    // Existing click event handler for tab_title1 li
    $(".tab_title1 li").click(function() {
        var idx = $(this).index();
        $(".tab_title1 li").removeClass("on");
        $(".tab_title1 li").eq(idx).addClass("on");
    });

    // Set the "on" class to the "전체" tab on page load
    $(".tab_title1 li").eq(0).addClass("on");
});
</script>
<script>
$(document).ready(function() {
    // Handle tab click
    $(".tab_title1 li").click(function() {
        var category = $(this).text().trim(); // "전체", "스토리", "가이드"
        $(".tab_title1 li").removeClass("on");
        $(this).addClass("on");
        filterVideos(category);
    });

    // Initial filter
    filterVideos("전체");

    function filterVideos(category) {
        if(category === "전체") {
            $(".video_list li").show();
        } else {
            $(".video_list li").each(function() {
                $(this).toggle($(this).data("category") === category);
            });
        }
    }
});
</script>

<script>
$(document).ready(function() {
  $(".tab_title li").click(function() {
    var idx = $(this).index();
    $(".tab_title li").removeClass("on");
    $(".tab_title li").eq(idx).addClass("on");
  })
});
  </script>
<script>
$(document).ready(function() {
  $(".tab_title1 li").click(function() {
    var idx = $(this).index();
    $(".tab_title1 li").removeClass("on");
    $(".tab_title1 li").eq(idx).addClass("on");
  })
});
  </script>
<script>
view_cate('reepot');
function view_cate(brand) {
	//$('.gnb_wrap').addClass('off');
	$.ajax({
		url : "/ajax_guide.php",
		type: "POST",
		data : {
			"brand" : brand,
		},
		async: false,
		success: function(msg) {
			$(".tab_cont").html(msg).show();
		},error: function(request,status,error){
			alert("code = "+ request.status + " message = " + request.responseText + " error = " + error);
		}
	})
}

function view_pp(brand,id) {
	$('.gnb_wrap').addClass('off');
	$.ajax({
		url : "/ajax_video.php",
		type: "POST",
		data: {'brand':brand,'wrid':id},
		async: false,
		success: function(msg) {
			$("#store_pop").html(msg).show();
		},error: function(request,status,error){
			alert("code = "+ request.status + " message = " + request.responseText + " error = " + error);
		}
	})
}


	
// 메뉴 팝업 닫기
$(document).mouseup(function (e){
	var container = $("#store_pop");
	if( container.has(e.target).length === 0) {
		container.hide();
		$('.gnb_wrap').removeClass('off');
		var video = document.getElementById('popupVideo');
		video.pause();
	}
});

// 메뉴 팝업 닫기
$('.store_pop_close a').on('click', function(){
	$("#store_pop").hide();
	$('.gnb_wrap').removeClass('off');
	var video = document.getElementById('popupVideo');
        video.pause();
});

</script>

<?php
include_once(G5_PATH.'/tail.php');