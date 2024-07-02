<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<style>
	.funding-view img{max-width: 100%;}
	.fixed-btn .in a{color: #fff;}
	
</style>
<?php
$thumb = get_list_thumbnail($board['bo_table'], $_GET['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

if($thumb['src']) {
	$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
} else {
	$img_content = '<img src="/img/funding/tmp_thum.jpg">';
}


?>
<div class="funding-view">
		<div class="head">
			<h2><?php echo $view['wr_subject'];?></h2>
			<div class="etc">
				<div class="code">미션코드 : asdasdasd</div>
				<div class="date"><?php echo $view['wr_datetime'];?></div>
			</div>
			<div class="img">
				<?php echo $img_content;?>
			</div>

			 


		</div>
		<hr class="hr">
		
		<div class="body">
			<h3>미션펀딩상세</h3>
			
			<div class="text">
				<?php echo $view['wr_content'];?>
			</div>
			<!-- <div class="img"><img src="/img/funding/tmp_big.jpg"></div>
			<div class="text">미션펀딩의 상세 정보는 텍스트 편집, 동영상 링크 첨부(유튜브, 네이버 등), 이미지 등 일정한 형식없이 일반적인 게시판 형식으로 자유롭게 모바일로 작성해서 올릴 수 있습니다. 
			미션펀딩의 상세 정보는 텍스트 편집, 동영상 링크 첨부(유튜브, 네이버 등), 이미지 등 일정한 형식없이 일반적인 게시판 형식으로 자유롭게 모바일로 작성해서 올릴 수 있습니다. 
			미션펀딩의 상세 정보는 텍스트 편집, 동영상 링크 첨부(유튜브, 네이버 등), 이미지 등 일정한 형식없이 일반적인 게시판 형식으로 자유롭게 모바일로 작성해서 올릴 수 있습니다. 
			미션펀딩의 상세 정보는 텍스트 편집, 동영상 링크 첨부(유튜브, 네이버 등), 이미지 등 일정한 형식없이 일반적인 게시판 형식으로 자유롭게 모바일로 작성해서 올릴 수 있습니다. 
			미션펀딩의 상세 정보는 텍스트 편집, 동영상 링크 첨부(유튜브, 네이버 등), 이미지 등 일정한 형식없이 일반적인 게시판 형식으로 자유롭게 모바일로 작성해서 올릴 수 있습니다. </div> -->
		</div>
		
		<hr class="hr">
		

		
<?php if($is_admin){?>
<section id="bo_v_info">
 <div id="bo_v_top">
<ul class="btn_bo_user bo_v_com" style="display: block;float:none;">
	<li><a href="<?php echo $list_href ?>" class="btn_b01 btn" title="목록"><i class="fa fa-list" aria-hidden="true"></i><span class="sound_only">목록</span></a></li>
	<?php if ($reply_href) { ?><li><a href="<?php echo $reply_href ?>" class="btn_b01 btn" title="답변"><i class="fa fa-reply" aria-hidden="true"></i><span class="sound_only">답변</span></a></li><?php } ?>
	<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
	<?php if($update_href || $delete_href || $copy_href || $move_href || $search_href) { ?>
	<li>
		<button type="button" class="btn_more_opt is_view_btn btn_b01 btn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트 옵션</span></button>
		<ul class="more_opt is_view_btn" style="display: none;"> 
			<?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>">수정<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li><?php } ?>
			<?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" onclick="del(this.href); return false;">삭제<i class="fa fa-trash-o" aria-hidden="true"></i></a></li><?php } ?>
			<?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" onclick="board_move(this.href); return false;">복사<i class="fa fa-files-o" aria-hidden="true"></i></a></li><?php } ?>
			<?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" onclick="board_move(this.href); return false;">이동<i class="fa fa-arrows" aria-hidden="true"></i></a></li><?php } ?>
			<?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>">검색<i class="fa fa-search" aria-hidden="true"></i></a></li><?php } ?>
		</ul> 
	</li>
	<?php } ?>
</ul>
</div>
</section>
<script>

jQuery(function($){
	// 게시판 보기 버튼 옵션
	$(".btn_more_opt.is_view_btn").on("click", function(e) {
		e.stopPropagation();
		$(".more_opt.is_view_btn").toggle();
	})
;
	$(document).on("click", function (e) {
		if(!$(e.target).closest('.is_view_btn').length) {
			$(".more_opt.is_view_btn").hide();
		}
	});
});
</script>


<?php }?>

<div style="clear:both"></div>

		<div class="funding-history">
			<div class="title">
				<h3>참여내역</h3>
				<div>총 <strong>"999"</strong>명이 참여했습니다.</div>
			</div>
			<div  class="history">
				<ul>
					<li>
						<a href="#">
							<div class="date">2021-12-12 13:33</div>
							<div class="subj">
								<div class="name">홍*동(010-****-*478)님</div>
								<div class="coin">
									<strong class="blue">기부하기</strong> 999,999,999.9999 OKNA 참여
								</div>
							</div>
							<div class="msg">좋은 프로젝트입니다 ! 동참합니다 !</div>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="date">2021-12-12 13:33</div>
							<div class="subj">
								<div class="name">홍*동(010-****-*478)님</div>
								<div class="coin">
									<strong class="red">펀딩하기</strong> 999,999,999.9999 OKNA 참여
								</div>
							</div>
							<div class="msg">제가 항상 참여하기 원했던 프로젝트네요 ! 정기적으로 후원하기 원합니다 하시는일 늘 화이팅입니다 !</div>
						</a>
					</li>
					
				</ul>
				<div class="more"><button>더보기 <img src="/img/funding/ico_more.svg"></button></div>
			</div>
		</div>
		
	</div>
	
	
	
	<div class="fixed-btn type2">
		<div class="in">
			<button><a href="/mission_give.php">기부하기</a></button>
			<button class="bg-red"><a href="/mission_pun.php">펀딩하기</a></button><!--/mission_pun.php-->
		</div>
	</div>
	
	<a href="#" class="btn-top"></a>



<!-- 게시물 읽기 시작 { -->

<!-- <article style="width:<?php echo $width; ?>">
	<div class="mining funding">
		<div class="list-head mb10">
			<h2>펀딩하기</h2>
		</div>
		<div class="section">
			<div class="funding-list">
				<ul>
					<li>
						<a href="#" class="item">
							<?php							
							$thumb = get_list_thumbnail($board['bo_table'], $view['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

							if($thumb['src']) {
								$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
							} else {
								$img_content = '<img src="/img/funding/tmp_thum.jpg">';
							}
							?>
							<div class="img"><?php echo run_replace('thumb_image_tag', $img_content, $thumb);?></div>
							<div class="text">
								<h3><?php echo $view['subject'] ?></h3>
								<div class="etc">
									<div class="date"><?php echo cut_str($view['wr_datetime'], 10, ''); ?></div>
									<div class="code">미션코드 : abasdasd</div>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="section">
			<h3>펀딩하실 수량을 입력해 주세요.</h3>
			<div class="count-box">
				<input type="text" class="inp1 text-right" value="999,999,999.0000" style="width:100%;">
				<strong>OKNA</strong>
			</div>
			<div class="bank-status2">
				<div>
					<dl>
						<dt>나의 OKNA잔고 : </dt>
						<dd>
							999,999.0000 OKNA
							<small> =999,999,999.0000 USD</small>
						</dd>
					</dl>
					<dl>
						<dt>펀딩가능수량 :</dt>
						<dd>999,999,999 OKNA</dd>
					</dl>
				</div>				
			</div>
		</div>
		<div class="section">
			<div class="bank-status">
				<dl>
					<dt>기존 펀딩 투입자산 :</dt>
					<dd>0 OKNA</dd>
				</dl>
				<dl>
					<dt>펀딩 추가 예정 :</dt>
					<dd>999,999.0000 OKNA<small>=999,999 USD</small></dd>
				</dl>
				<dl>
					<dt>펀딩 추가 후 투입자산 :</dt>
					<dd>999,999.0000 USD<small>=999,999 USD</small></dd>
				</dl>
			</div>
		</div>
		
		<div class="section">
			<h4>응원의 메시지를 남겨주세요 !</h4>
			<textarea class="textarea" placeholder="댓글을 남겨보세요."></textarea>
		</div>
		
		
		<button class="btn-type1 bg-red block">펀딩하기</button>
	</div>

</article> -->
<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();

    //sns공유
    $(".btn_share").click(function(){
        $("#bo_v_sns").fadeIn();
   
    });

    $(document).mouseup(function (e) {
        var container = $("#bo_v_sns");
        if (!container.is(e.target) && container.has(e.target).length === 0){
        container.css("display","none");
        }	
    });
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->