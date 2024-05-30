<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

/*

if(!$is_admin){
	alert('준비중입니다.');
}

*/
?>

<style>
.btn_wrap li a{
	font-size: 16px;	
}
.gall_row .col-gn-3{
	width: 22%;
	height: 29vw;
}
.gall_row .col-gn-3:nth-child(3n){
	margin-right:50px;
}
.gall_row .col-gn-3:nth-child(4n){
	margin-right:0;
}

.select {
  display: inline-block;
  width: 370px;
  height: 45px; 
  line-height: 45px;
  border: 1px solid #666666;
  border-radius:25px;
  position: relative;
}

.select .selected {
  width: 100%;
  display: flex;
  justify-content: space-between;
  font-size: 16px;
  font-weight: bold;
  padding: 0 25px;
}

.select .selected .arrow {
  width: 20px;
  background: url("/images/schicon.png") no-repeat center center;
}

.select ul {
  width: 100%;
  border: 1px solid #e0e0e0;
  border-radius:25px;
  position: absolute;
  z-index:999;
  background: #fff;
  margin-top: -1px;
  padding: 20px 0;
  display: none;
}

.select ul li {
  line-height: 30px;
}

.select ul li a{
  padding-left: 30px;
  font-size: 16px;
  color:#a6a6a6;
  font-weight: 500;
  display: block;
}

/*
.select ul li,
.select .selected .selected-value {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
*/
.select ul li:hover {
  background: rgba(240, 240, 240)
}

.select.active ul {
  display: block;
}

.tab_title{width: 1386px; text-align: center;margin:0px auto 0; display:flex; justify-content:flex-start; align-items:center; flex-wrap: wrap;}
.tab_title li {cursor: pointer;width: 126px;height: 40px;text-align: center;line-height: 40px;font-size: 16px;background: #EBEBEB;color: #434343;border:1px solid #E3E3E3;font-family: 'NanumSquareNeo';  padding:0 4px;}
.tab_title li.on{background: #fff;height: 50px;border-bottom:none;}
.tab_title li.on:first-child{background: #fff;height: 50px;border-bottom:none;border-right:none;}
.tab_title li.on:nth-child(n+2):nth-child(-n+10) {
    border-right: none;
    border-bottom: none;
	border-left:none;
}
.tab_title li.on:last-child{background: #fff;height: 50px;border-bottom:none;border-left:none;}
.tab_title li a{display: block;}

.tab_title2 li.on{
	font-weight:800;
	background: transparent;
}

@media (max-width: 1760px)  {

	.gall_row .col-gn-3{
		height: 30vw;
	}
	.select {
	  width: 21.0227vw;
	  height: 2.5568vw; 
	  line-height: 2.5568vw;
	  border: 0.0568vw solid #666666;
	  border-radius:1.4205vw;
	}

	.select .selected {
	  width: 100%;
	  font-size: 0.9091vw;
	  padding: 0 1.4205vw;
	}

	.select .selected .arrow {
	  width: 1.1364vw;
	}

	.select ul {
	  width: 100%;
	  border: 0.0568vw solid #e0e0e0;
	  border-radius:1.4205vw;
	  margin-top: -0.0568vw;
	  padding: 1.1364vw 0;
	}

	.select ul li {
	  line-height: 1.7045vw;
	}

	.select ul li a{
	  padding-left: 1.7045vw;
	  font-size: 0.9091vw;  
	}
	.tab_title{width: 75.0000vw; align-items:center; flex-wrap: wrap;}
	.tab_title li {cursor: pointer;width: 7.1591vw;height: 2.2727vw;line-height: 2.2727vw;font-size: 0.9091vw; padding:0 0.2273vw;}

}


@media (max-width: 1600px)  {

	.select {
	  width: 23.1250vw;
	  height: 2.8125vw; 
	  line-height: 2.8125vw;
	  border: 0.0625vw solid #666666;
	  border-radius:1.5625vw;
	}

	.select .selected {
	  width: 100%;
	  font-size: 1.0000vw;
	  padding: 0 1.5625vw;
	}
	
	.gall_row .col-gn-3{
		height: 33vw;
	}
	.select .selected .arrow {
	  width: 1.2500vw;
	}

	.select ul {
	  width: 100%;
	  border: 0.0625vw solid #e0e0e0;
	  border-radius:1.5625vw;
	  margin-top: -0.0625vw;
	  padding: 1.2500vw 0;
	}

	.select ul li {
	  line-height: 1.8750vw;
	}

	.select ul li a{
	  padding-left: 1.8750vw;
	  font-size: 1.0000vw;  
	}
	.tab_title{width: 82.5000vw; align-items:center; flex-wrap: wrap; }
	.tab_title li {cursor: pointer;width: 7.8750vw;height: 2.5000vw;line-height: 2.5000vw;font-size: 1vw; padding:0 0.2500vw;}

}

@media (max-width: 1400px)  {
	.gall_row .col-gn-3{
		height: 36vw;
	}
	.select {
	  width: 26.4286vw;
	  height: 3.2143vw; 
	  line-height: 3.2143vw;
	  border: 0.0714vw solid #666666;
	  border-radius:1.7857vw;
	}

	.select .selected {
	  width: 100%;
	  font-size: 1.1429vw;
	  padding: 0 1.7857vw;
	}

	.select .selected .arrow {
	  width: 1.4286vw;
	}

	.select ul {
	  width: 100%;
	  border: 0.0714vw solid #e0e0e0;
	  border-radius:1.7857vw;
	  margin-top: -0.0714vw;
	  padding: 1.4286vw 0;
	}

	.select ul li {
	  line-height: 2.1429vw;
	}

	.select ul li a{
	  padding-left: 2.1429vw;
	  font-size: 1.1429vw;  
	}
	.tab_title{width: 94.2857vw; align-items:center; flex-wrap: wrap; }
	.tab_title li {cursor: pointer;width: 9.0000vw;height: 2.8571vw;line-height: 2.8571vw;font-size: 1.1429vw;padding:0 0.2857vw;}
}

@media (max-width: 1024px)  {
.gall_row .col-gn-3:nth-child(3n){
	margin-right:2%;
}
	.gall_row .col-gn-3{
		height: 39vw;
	}
	.select {
	  width: 36.1328vw;
	  height: 4.3945vw; 
	  line-height: 4.3945vw;
	  border: 0.0977vw solid #666666;
	  border-radius:2.4414vw;
	}

	.select .selected {
	  width: 100%;
	  font-size: 1.5625vw;
	  padding: 0 2.4414vw;
	}

	.select .selected .arrow {
	  width: 1.9531vw;
	}

	.select ul {
	  width: 100%;
	  border: 0.0977vw solid #e0e0e0;
	  border-radius:2.4414vw;
	  margin-top: -0.0977vw;
	  padding: 1.9531vw 0;
	}

	.select ul li {
	  line-height: 2.9297vw;
	}

	.select ul li a{
	  padding-left: 2.9297vw;
	  font-size: 1.5625vw;  
	}
	.btn_wrap li.left.center{width: 25%;}
	.tab_title{width: 100%; justify-content:space-between; align-items:center; flex-wrap: wrap;}
	.tab_title li {cursor: pointer;width: 12.3047vw;height: 3.9063vw;line-height: 3.9063vw;font-size: 1.5625vw;padding:0 0.3906vw;}
}

@media (max-width: 768px)  {
.gall_row .col-gn-3{width: 48%;}
.gall_row .col-gn-3:nth-child(3n){
	margin-right:2%;
}
	.gall_row .col-gn-3{
		height: 80vw;
	}
	.btn_wrap li.left.center{width: 49%;}
	.select {
	  width: 50%;
	  height: 5.8594vw; 
	  line-height: 5.8594vw;
	  border: 0.1302vw solid #666666;
	  border-radius:3.2552vw;
	}

	.select .selected {
	  font-size: 2.0833vw;
	  padding: 0 3.2552vw;
	}

	.select .selected .arrow {
	  width: 2.6042vw;
	}

	.select ul {
	  border: 0.1302vw solid #e0e0e0;
	  border-radius:3.2552vw;
	  margin-top: -0.1302vw;
	  padding: 2.6042vw 0;
	}

	.select ul li {
	  line-height: 4.9063vw;
	}

	.select ul li a{
	  padding-left: 3.9063vw;
	  font-size: 2.5833vw;  
	}

	.tab_title{width: 100%; justify-content:flex-start !important;  flex-wrap: wrap; }
	.tab_title li {cursor: pointer;width: 25%;height: 5.2083vw;line-height: 5.2083vw;font-size: 2.2135vw;padding:0 0.5208vw;}
	.btn_wrap li a{font-size: 1.3438vw;}
	.tab_title li.on{height: auto !important;}
}
@media (max-width: 480px)  {
	.gall_row .col-gn-3{
		height: 100vw;
	}
	.select {
	  width: 50%;
	  height: 9.3750vw; 
	  line-height: 9.3750vw;
	  border: 0.2083vw solid #666666;
	  border-radius:5.2083vw;
	}

	.select .selected {
	  font-size: 3.3333vw;
	  padding: 0 5.2083vw;
	}

	.select .selected .arrow {
	  width: 5vw;
	}

	.select ul {
	  border: 0.2083vw solid #e0e0e0;
	  border-radius:5.2083vw;
	  margin-top: -0.2083vw;
	  padding: 4.1667vw 0;
	}

	.select ul li {
	  line-height: 7.3750vw;
	}

	.select ul li a{
	  padding-left: 6.2500vw;
	  font-size: 4.0000vw;  
	}

	.tab_title li {cursor: pointer;width: 29.25vw;height: 8.3333vw;line-height: 8.3333vw;font-size: 3.5417vw;padding:0 0.8333vw;}
}


</style>

<!-- 카테고리 영역 -->
<?php if ($is_category) { ?>
	<!-- <div class="select">
		<div class="selected">
			<div class="selected-value"><?php if($sca){ echo $sca; }else{ echo 'All'; } ?></div>
			<div class="arrow"></div>
		</div>
		<ul>
			<?php echo $category_option ?>
		</ul>
	</div> -->
</div><!--newbox 클래스 끝-->
<ul class="clearfix tab_title">
<?php 
    $is_category = true;
    $category_href = get_pretty_url($bo_table);

    // 'ALL' 카테고리 추가
    $category_option = '<li';
    if ($sca == '' || $sca == 'ALL') {
        $category_option .= ' class="on"';
    }
    $category_option .= '><a href="'.get_pretty_url($bo_table).'">ALL</a></li>';

    $categories = explode('|', $board['bo_category_list']); // 구분자가 | 로 되어 있음
    for ($i=0; $i<count($categories); $i++) {
        $category = trim($categories[$i]);

        $category_option .= '<li';
        $category_msg = '';
        if ($category == $sca) { // 현재 선택된 카테고리라면
            $category_option .= ' class="on"';
            $category_msg = '<span class="sound_only">열린 분류 </span>';
        }
        $category_option .= '><a href="'.get_pretty_url($bo_table, '', 'sca='.urlencode($category)).'">'.$category_msg.$category.'</a></li>';
    }
    echo $category_option;
?>
</ul>
<!-- <ul class="clearfix tab_title">
	<?php 
		$is_category = false;
		$category_option = '';

		$is_category = true;
		$category_href = get_pretty_url($bo_table);

		$categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
		for ($i=0; $i<count($categories); $i++) {
			$category = trim($categories[$i]);
			
			$category_option .= '<li';
			$category_msg = '';
			if ($category==$sca) { // 현재 선택된 카테고리라면
				$category_option .= ' class="on"';
				$category_msg = '<span class="sound_only">열린 분류 </span>';
			}else if($sca==''){	//주소창에 카테고리가 없으면
				if($i==0){
					$category_option .= ' class="on"';
					$category_msg = '<span class="sound_only">열린 분류 </span>';
				}
			}
			$category_option .= '><a href="'.(get_pretty_url($bo_table,'','sca='.urlencode($category))).'">'.$category_msg.$category.'</a></li>';
		}
		echo $category_option;

		$url = '/bbs/board.php?bo_table=marketing&sca='.$sca;
		$basic_url = '/bbs/board.php?bo_table=marketing&sca=reepot';
	?>
</ul> -->
<?php 
    if($sca == 'ALL'){ 
        // Code for when $sca is 'ALL'
        ?>
        <ul class="tab_title tab_title2">
            <li style="border:none;" class="<?php if(!$wr_1) echo 'on'; ?>"><a href="<?php echo $url; ?>">전체</a></li>
            <li style="border:none;" class="<?php if($wr_1 == '제품/로고') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=제품/로고'; ?>">제품 로고</a></li>
            <li style="border:none;" class="<?php if($wr_1 == '영상 자료') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=영상 자료'; ?>">영상 자료</a></li>
            <li style="border:none;" class="<?php if($wr_1 == '이미지 자료') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=이미지 자료'; ?>">이미지 자료</a></li>
        </ul>
        <?php
    } elseif($sca){
        // Existing code for when $sca is set but not 'ALL'
        ?>
        <ul class="tab_title tab_title2">
            <li style="border:none;" class="<?php if(!$wr_1) echo 'on'; ?>"><a href="<?php echo $url; ?>">전체</a></li>
            <li style="border:none;" class="<?php if($wr_1 == '제품/로고') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=제품/로고'; ?>">제품 로고</a></li>
            <li style="border:none;" class="<?php if($wr_1 == 'SNS 콘텐츠') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=SNS 콘텐츠'; ?>">SNS 콘텐츠</a></li>
            <li style="border:none;" class="<?php if($wr_1 == '이미지 자료') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=이미지 자료'; ?>">이미지 자료</a></li>
        </ul>
        <?php 
    } else {
        // Existing code for when $sca is not set
        ?>
        <ul class="tab_title tab_title2">
            <li style="border:none;" class="<?php if(!$wr_1) echo 'on'; ?>"><a href="<?php echo $basic_url; ?>">전체</a></li>
            <li style="border:none;" class="<?php if($wr_1 == '제품/로고') echo 'on'; ?>"><a href="<?php echo $basic_url.'&wr_1=제품/로고'; ?>">제품 로고</a></li>
            <li style="border:none;" class="<?php if($wr_1 == 'SNS 콘텐츠') echo 'on'; ?>"><a href="<?php echo $basic_url.'&wr_1=SNS 콘텐츠'; ?>">SNS 콘텐츠</a></li>
            <li style="border:none;" class="<?php if($wr_1 == '이미지 자료') echo 'on'; ?>"><a href="<?php echo $basic_url.'&wr_1=이미지 자료'; ?>">이미지 자료</a></li>
        </ul>
        <?php 
    }
?>

<!-- <?php if($sca){?>
	<ul class="tab_title tab_title2">
		<li style="border:none;" class="<? if(!$wr_1) echo 'on'?>"><a href="<?php echo $url;?>">전체</a></li>
		<li style="border:none;" class="<? if($wr_1 == 'PPT 자료') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=PPT 자료';?>">PPT 자료</a></li>
		<li style="border:none;" class="<? if($wr_1 == '제품/로고') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=제품/로고';?>">제품&로고</a></li>
		<li style="border:none;" class="<? if($wr_1 == 'SNS 콘텐츠') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=SNS 콘텐츠';?>">SNS 콘텐츠</a></li>
		<li style="border:none;" class="<? if($wr_1 == '영상 자료') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=영상 자료';?>">영상 자료</a></li>
		<li style="border:none;" class="<? if($wr_1 == '이미지 자료') echo 'on'; ?>"><a href="<?php echo $url.'&wr_1=이미지 자료';?>">이미지 자료</a></li>
	</ul>
<?php } else { ?>
	<ul class="tab_title tab_title2">
		<li style="border:none;" class="<? if(!$wr_1) echo 'on'?>"><a href="<?php echo $basic_url;?>">전체</a></li>
		<li style="border:none;" class="<? if($wr_1 == 'PPT 자료') echo 'on'; ?>"><a href="<?php echo $basic_url.'&wr_1=PPT 자료';?>">PPT 자료</a></li>
		<li style="border:none;" class="<? if($wr_1 == '제품/로고') echo 'on'; ?>"><a href="<?php echo $basic_url.'&wr_1=제품/로고';?>">제품&로고</a></li>
		<li style="border:none;" class="<? if($wr_1 == 'SNS 콘텐츠') echo 'on'; ?>"><a href="<?php echo $basic_url.'&wr_1=SNS 콘텐츠';?>">SNS 콘텐츠</a></li>
		<li style="border:none;" class="<? if($wr_1 == '영상 자료') echo 'on'; ?>"><a href="<?php echo $basic_url.'&wr_1=영상 자료';?>">영상 자료</a></li>
		<li style="border:none;" class="<? if($wr_1 == '이미지 자료') echo 'on'; ?>"><a href="<?php echo $basic_url.'&wr_1=이미지 자료';?>">이미지 자료</a></li>
	</ul>
<?php }
	} 
?> -->

<script>
const selectBoxElements = document.querySelectorAll(".select");

function toggleSelectBox(selectBox) {
  selectBox.classList.toggle("active");
}

function selectOption(optionElement) {
  const selectBox = optionElement.closest(".select");
  const selectedElement = selectBox.querySelector(".selected-value");
  selectedElement.textContent = optionElement.textContent;
}

selectBoxElements.forEach(selectBoxElement => {
  selectBoxElement.addEventListener("click", function (e) {
    const targetElement = e.target;
    const isOptionElement = targetElement.classList.contains("option");

    if (isOptionElement) {
      selectOption(targetElement);
    }

    toggleSelectBox(selectBoxElement);
  });
});

document.addEventListener("click", function (e) {
  const targetElement = e.target;
  const isSelect = targetElement.classList.contains("select") || targetElement.closest(".select");

  if (isSelect) {
    return;
  }

  const allSelectBoxElements = document.querySelectorAll(".select");

  allSelectBoxElements.forEach(boxElement => {
    boxElement.classList.remove("active");
  });
});
</script>

<style type="text/css">
#gall_allchk {margin:5px 10px;}
.gall_li {margin-bottom:10px;}
.gall_box01_wrap {overflow:hidden;position:relative;margin-top:3px}
.gall_box01 {font-size:14px;line-height:1.4em}
.gall_left01 {display:inline-block;width:50px;}
.gall_left02 {display:inline-block;}


@media (max-width: 1760px)  {

}

@media (max-width: 1600px)  {

}

@media (max-width: 1400px)  {

}

@media (max-width: 1024px)  {
	.gall_row .col-gn-3:nth-child(2n){
		margin-right: 2%;
	}
}

@media (max-width: 768px)  {

}

@media (max-width: 480px)  {

}
.cate_wrap,
.size_wrap{
	display: flex;
	align-items:center;
	justify-content: space-between;
}
.gall_text .gt_size{
	font-size: 12px;
}
.gt_cate{
	border: solid 1px #ccc;
	border-radius: 20px;
	background:#D4DBE7;
	width: 35px;
	text-align: center;	
}
.tab_title2 li{
	background: #fff;
}
.tab_title2{
	border: solid 1px #EBEBEB;
	height: 100px;
	border-top: none;
}
.btn_wrap{
	display: flex;
}

</style>


<!-- 게시판 목록 시작 { -->
<div id="bo_gall" style="width:<?php echo $width; ?>">
    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
     <div id="bo_btn_top" style="display:none;">
        

        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="fa fa-pencil" aria-hidden="true"></i>  글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->
	
	<!-- 게시물 검색 시작 { -->
	<fieldset id="bo_sch" style="display:none;">
		<legend>게시물 검색</legend>

		<form name="fsearch" method="get">
		<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
		<input type="hidden" name="sca" value="<?php echo $sca ?>">
		<input type="hidden" name="sop" value="and">
		<label for="sfl" class="sound_only">검색대상</label>
	   <select name="sfl" id="sfl">
			<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
			<option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
			<option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
			<!-- <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option> -->
		 <!--    <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option> -->
			<!-- <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option> -->
		  <!--   <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option> -->
		</select>
		<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
		<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input " size="15" maxlength="15">
		  <span class="jbutton large black" style=""><input type="submit" class="width_j2" id="btn_submit" value="검색"></span>
		</form>
	</fieldset>
	<!-- } 게시물 검색 끝 -->

    <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
	<?if(count($list)  > 0){?>
    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
    </div>
    <?php } ?>
    <?php } ?>

    <ul id="gall_ul" class="gall_row">
        <?php for ($i=0; $i<count($list); $i++) {

            $classes = array();
            
            $classes[] = 'gall_li';
            $classes[] = 'col-gn-'.$bo_gallery_cols;

            if( $i && ($i % $bo_gallery_cols == 0) ){
                $classes[] = '';
            }

            if( $wr_id && $wr_id == $list[$i]['wr_id'] ){
                $classes[] = 'gall_now';
            }
         ?>
        <li class="<?php echo implode(' ', $classes); ?>">
            <div class="gall_box">
                <div class="gall_chk">
                <?php if ($is_checkbox) { ?>
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                <?php } ?>
                <span class="sound_only">
                    <?php
                    if ($wr_id == $list[$i]['wr_id'])
                        echo "<span class=\"bo_current\">열람중</span>";
                    else
                        echo $list[$i]['num'];
                     ?>
                </span>
                </div>
                <div class="gall_con">
			
                    <div class="gall_img">
                        <a href="<?php echo $list[$i]['href'] ?>">
                        <?php
                        if ($list[$i]['is_notice']) { // 공지사항  ?>
                            <span class="is_notice">공지</span>
                        <?php } else {
                            $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

                            if($thumb['src']) {
                                $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
                            } else {
                                $img_content = '<span class="no_image">no image</span>';
                            }

                            echo $img_content;
                        }
                         ?>
                        </a>
                    </div>
					<div class="gall_text">
						<div class="cate_wrap">
							<p class="gt_tit"><?php echo $list[$i]['wr_subject']?></p>
							<p class="gt_cate"><?php echo $list[$i]['wr_4']?></p>
						</div>
						<div class="size_wrap">
							<p class="gt_size"><?php echo $list[$i]['wr_2']?></p>
							<p class="gt_size"><?php echo $list[$i]['wr_3']?></p>
						</div>
					</div>
					<div class="event_wrap">
                        <?php
                        // echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
                        if ($is_category && $list[$i]['ca_name']) {
                         ?>
                       <!--  <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a> -->
                        <?php } ?>
                        <a href="<?php echo $list[$i]['href'] ?>" class="event_tit">
                            <?php //echo cut_str($list[$i]['subject'],50,'..') ?>
                            <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="cnt_cmt">+ <?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span><?php } ?>
                        </a>
						<ul class="btn_wrap">
							<?php
								$sql = " select * from g5_board_file  where bo_table = '{$bo_table}' and wr_id = '{$list[$i]['wr_id']}' order by bf_no desc";
								$result = sql_query($sql);
								$row = sql_fetch_array($result);
								
							?>

							<?php if($row['bf_source']) { ?>
                            
                         <?
                       			$sqla = " select * from g5_board_file  where bo_table = '{$bo_table}' and wr_id = '{$list[$i]['wr_id']}' and bf_no = '1' order by bf_no desc";
								$resulta = sql_query($sqla);
								$rowa = sql_fetch_array($resulta);
								
								
								$sqlb = " select * from g5_board_file  where bo_table = '{$bo_table}' and wr_id = '{$list[$i]['wr_id']}' and bf_no = '2' order by bf_no desc";
								$resultb = sql_query($sqlb);
								$rowb = sql_fetch_array($resultb);
                           ?>                             
                            
							<!-- <li class="left"><a href="<?php echo $list[$i]['href'] ?>" class="more_more">상세보기 <span></span></a></li> 다운로드 버튼이 있을때 절반만 차지하는 상세버튼--> 
							
                            
                            <? if($rowa['bf_file']){?>
                            <li class="left center"><a href="<?php echo $rowa['bf_file'] ?>" target="_blank" class="more_more">다운로드</a></li>
							<? } ?>
                            
                            <? if($rowb['bf_file']){?>
                            <li class="left center"><a href="/data/file/marketing/<?php echo $rowb['bf_file'] ?>" target="_blank" class="more_more"> 미리보기</a></li>
                            <? } ?>
                            
                            
							<?php }  ?>

							
							<?php if($row['bf_source']) { ?>
								<?php if($is_member) { ?>
								<!-- <li class="right"><a href="/bbs/download.php?bo_table=<?=$bo_table?>&wr_id=<?=$list[$i]['wr_id']?>&no=1" class="down_down">다운로드 <span></span></a></li> 
								1번 첨부파일이 있을경우 나타나는 다운로드버튼-->
								<?php } ?>
							<?php } else { ?>

							<?php } ?>
						</ul>
						
						<!-- <span class="event_time">
							<?php echo $list[$i]['wr_1']?>
						</span>
						<div class="event_txt">
							<p class="event_desc">
								<?php echo $list[$i]['wr_content'] ?>
							</p>
						</div> -->
                    </div>
                </div>
            </div>
        </li>


        <?php } ?>
        <?php if (count($list) == 0) { echo "<li class=\"empty_list\">등록된 게시물이 없습니다.</li>"; } ?>
    </ul>

     <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox && $is_admin == 'super') { ?>
        <ul class="btn_bo_adm">
            <li><span class="jbutton large black" ><input style="background:none" type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></span></li>
    <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></span></li>
            <li><span class="jbutton large black"><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></span></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
        	 <?php if ($admin_href) { ?><li><span class="jbutton large black"><a href="<?php echo $admin_href ?>">관리자</a></span></li><?php } ?>
            <?php if ($list_href) { ?><li><span class="jbutton large black"><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></span></li><?php } ?>
            <?php if ($write_href) { ?><li><span class="jbutton large black"><a href="<?php echo $write_href ?>" class="width_j">글쓰기</a></span></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->
<?php echo $write_pages;  ?>
<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->