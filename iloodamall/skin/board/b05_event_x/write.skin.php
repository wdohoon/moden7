<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);


?>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
/* border-top 에서 가져온 css */
.board_title {display:none;}

/* 여기서만 적용 될 css */
.board_wrap {background:#f7f7f7;padding-top: 0px;padding:0px 0px}

/* 이미지 미리보기 css */
/* imaged preview */ 
.filebox .upload-display {/* 이미지가 표시될 지역 */margin-bottom: 5px;} 
.filebox input[type="file"] {position: absolute;width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip:rect(0,0,0,0);border: 0;}
/* .filebox label {display: inline-block;padding: .5em .75em;color: #999;font-size: inherit;line-height: normal;vertical-align: middle;background-color: #fdfdfd;cursor: pointer;border: 1px solid #ebebeb;border-bottom-color: #e2e2e2;border-radius: .25em;} */
/* named upload */
.filebox .upload-name {display: inline-block;padding: .5em .75em;font-size: inherit;font-family: inherit;line-height: normal;vertical-align: middle;background-color: #f5f5f5;border: 1px solid #ebebeb;border-bottom-color: #e2e2e2;border-radius: .25em;-webkit-appearance: none;-moz-appearance: none;appearance: none;}

/* 이미지 미리보기 css 커스텀 */
.filebox  {position:relative;z-index:2;border-radius:0.5em;background: #f7f7f7;}
.file_thumb {position:absolute;left:0;top:0;overflow:hidden;width:100%;height:100%;border-radius:0.5em;}
.file_thumb img {border-radius:0.5em;margin-top:1px;object-fit:cover;overflow:hidden;z-index:3;position:absolute;left:0;top:0;height:100%;}

.jtbl_frm01.tbl_wrap:after {content:"";display:block;clear:both;}
.file_list_ul {width:33.333%;padding:1%;float:left;}
.file_list_ul .file_box_wrap {position:relative;}
.file_list_ul .file_box_wrap .filebox label {
	display: inline-block;width:100%;;max-width:220px;
	color: #999;padding-bottom:100%;
	font-size: inherit;text-align:center;
	vertical-align: middle;
	background:url('/images/profile_plus.png')no-repeat center;
	cursor: pointer;
	border: 1px solid #ebebeb;
	border-bottom-color: #e2e2e2;
	border-radius: .5em;
}
.del_btn_wrap {font-size:0px;position:absolute;z-index:3;left:50%;top:50%;transform:translate(-50%,-50%);width:50%;height:50%;background:url('/images/profile_del.png')no-repeat center}

/* 컨텐츠 제목 */
.box_title_wrap {padding-left:1%;margin-bottom:20px;}
.box_title_wrap:after {content:"";display:block;clear:both;}
.box_title_wrap h2 {font-size:18px;font-weight:700;color:#000;vertical-align:middle;display:inline-block;}
.box_title_wrap span {text-align:right;float:right;font-weight:300;color:#a1a1a1;font-size:14px;font-weight:300;color:#9d9d9d;margin-top:4px;}

/* 취소 , 등록 버튼 */
.btn_confirm{position:relative;height:101px;background:#fff;padding-top:40px;}
.btn_confirm:after {content:"";display:block;clear:both;}

.jbutton.large.black {background:transparent;height:61px;}
.jbutton.large.black.apply_btn_wrap {float:right;margin-right:20px;}
.jbutton.large.black input#btn_submit {padding:0px;background:url('/images/apply_btn02.png')no-repeat center / cover;width:130px;height:61px;}

.back_btn_wrap {float:left;margin-left:20px;}
.back_btn_wrap a {background:transparent;line-height:61px;display:inline-block;width:24px;}
.back_btn_wrap a img {width:100%;}
.back_btn_wrap span {font-size:26px;font-weight:700;color:#000;vertical-align:middle;margin-left:25px;}

/* select css */
select.frm_input {padding:0 6%; /* 여백으로 높이 설정 */ background: url('/images/select_icon.png') no-repeat right 0px top 50%;border-radius: 0px; /* iOS 둥근모서리 제거 */ -webkit-appearance: none; /* 네이티브 외형 감추기 */ -moz-appearance: none; appearance: none;}
.frm_input.half_wrap {width:48%;margin-right:2%;padding:0px;padding-right:6%;}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

@media only screen and (max-width: 1199px) { /* viewport width : 1199 */

}

@media only screen and (max-width: 1024px) { /* viewport width : 1024 */

}

@media only screen and (max-width: 767px) { /* viewport width : 767 */

}

@media only screen and (max-width: 460px) { /* viewport width : 460 */

/* 취소 , 등록 버튼 */
.btn_confirm{position:relative;height:82px;background:#fff;padding-top:40px;}
.jbutton.large.black {background:transparent;height:42px;}
.jbutton.large.black input#btn_submit {padding:0px;background:url('/images/apply_btn02.png')no-repeat center;background-size: 90px 42px;width:90px;height:42px;padding:1px;border:0px solid #333;border-top-left-radius: 21px;border-bottom-left-radius: 21px;border-top-right-radius: 21px;border-bottom-right-radius: 0px;}

.back_btn_wrap a {background:transparent;line-height:42px;display:inline-block;width:20px;}
.back_btn_wrap span {font-size:20px;font-weight:700;color:#000;vertical-align:middle;margin-left:25px;}

/* select css */
select.frm_input {padding:0 10% 0 6%; /* 여백으로 높이 설정 */}
select.frm_input.half_wrap {padding-right:10%;}
select.frm_input.half_wrap.flt_right {float:right;margin-right:0%;margin-left:2%;padding-right:12%;}
select.frm_input.half_wrap.non-r {float:right;margin-right:0%;}


/* 컨텐츠 제목 */
.box_title_wrap h2 {font-size:18px;display:block;}
.box_title_wrap span {text-align:left;float:none;font-size:12px;margin-top:4px;}

/* 미리보기 이미지 css */
.file_list_ul .file_box_wrap .filebox label {background:url('/images/profile_plus.png')no-repeat center / 20%;}
.del_btn_wrap {background:url('/images/profile_del.png')no-repeat center / 40%}
}

@media only screen and (max-width: 375px) { /* viewport width : 375 */

}

@media only screen and (max-width: 320px) { /* viewport width : 320 */

}
</style>

<section id="bo_w">
  <!--   <h2 id="container_title"><?php //echo $g5['title'] ?></h2> -->

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
	<input type="hidden" name="wr_subject" value="회원프로필 제목">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice && $is_admin) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>

	<style>
		#att_zone {
		  width: 660px;
		  min-height: 150px;
		  padding: 10px;
		  border: 1px dotted #00f;
		}

		#att_zone:empty:before {
		  content: attr(data-placeholder);
		  color: #999;
		  font-size: .9em;
		}
		.image-container:after {content:"";display:block;clear:both;}
	</style>

	<?php //for ($i=0; $is_file && $i<1; $i++) { ?>
		<!-- <div class="image-container">
			<div class="img_wrapper" style="position:relative;width:33.3333%;height:auto;float:left;padding:0 1%;">
				
				<?php if($w == 'u' && $file[0]['file']) { ?>
					<img style="width:100%;" id="preview-image" src="/data/file/profile/<?php echo $file[0]['file']?>">
					<img style="width:100%;" id="preview-image" src="https://dummyimage.com/300x300/ffffff/000000.png&text=preview+image">
				<?php } else { ?>
					<img style="width:100%;" id="preview-image" src="https://dummyimage.com/500x500/ffffff/000000.png&text=preview+image">
				<?php } ?>
				<input type="file" id="input-image" class="" name="bf_file[0]" title="파일첨부 1 : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input" style="position:absolute;left:0;bottom:0px;">
				<?php if ($is_file_content) { ?>
				<input type="text" name="bf_content[0]" value="<?php echo ($w == 'u') ? $file[0]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" >
				<?php } ?>
				<?php if($w == 'u' && $file[0]['file']) { ?>
				<input type="checkbox" id="bf_file_del0" name="bf_file_del[0]" value="1" style="position:absolute;left:0;top:2px;"> <label for="bf_file_del1" style="position:absolute;left:20px;top;"><?php echo $file[0]['source'].'('.$file[0]['size'].')';  ?> 파일 삭제</label>
				<?php } ?>
			</div>
		</div> -->
	<?php //} ?>
	<script>
		function readImage(input) {
			// 인풋 태그에 파일이 있는 경우
			if(input.files && input.files[0]) {
				// 이미지 파일인지 검사 (생략)
				// FileReader 인스턴스 생성
				const reader = new FileReader()
				// 이미지가 로드가 된 경우
				reader.onload = e => {
					const previewImage = document.getElementById("preview-image")
					previewImage.src = e.target.result
				}
				// reader가 이미지 읽도록 하기
				reader.readAsDataURL(input.files[0])
			}
		}
		// input file에 change 이벤트 부여
		const inputImage = document.getElementById("input-image")
		inputImage.addEventListener("change", e => {
			readImage(e.target)
	})	
	</script>
	<div class="btn_confirm">
		<span class="jbutton large black apply_btn_wrap"><input type="submit" value="" id="btn_submit" accesskey="s" /></span>
		<?php //if($is_admin) { ?>
		<span class="back_btn_wrap">
			<!-- <a href="./board.php?bo_table=<?php echo $bo_table ?>"><img src="/images/back_btn.png" alt=""></a> -->
			<a href="javascript:history.back();"><img src="/images/back_btn.png" alt=""></a>
			<span>프로필 등록</span>
		</span>
		<?php //} ?> 
	 </div>
	<div class="jtbl_frm01 tbl_wrap">
		<div class="box_title_wrap">
			<h2>대표 사진 </h2>
			<span>· 대표사진은 필수이며, 최대 6장 까지 등록 가능 합니다.</span>
		</div>
		<?php for ($i=0; $is_file && $i<6; $i++) { ?>
        <div class="file_list_ul">
            <div style=""><span class="sound_only">파일 #<?php echo $i+1 ?></span></div>
            <div class="file_box_wrap">
				<div class="filebox filebox<?php echo $i+1 ?> preview-image"> 
					<input type="hidden" class="upload-name<?php echo $i+1 ?>" value="파일선택" disabled="disabled"> 
					<label for="input-file<?php echo $i+1 ?>"></label> 
					<input type="file" name="bf_file[]" id="input-file<?php echo $i+1 ?>" <?php if($i == 0 && !$file[$i]['file']) {?>required<?php }?> class="upload-hidden<?php echo $i+1 ?>"> 
				</div>

                <!-- <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input"> -->
                
				<div class="file_thumb file_thumb<?php echo $i+1 ?>">
                <?php if($w == 'u' && $file[$i]['file']) { ?>	
				<img src="<?php echo $file[$i]['path'].'/'.$file[$i]['file']?>" alt="" style="width: 100%;height:100%;">
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1" style="display:none;"> <a href="javascript:;" onclick="aa('bf_file_del<?php echo $i ?>');" class="del_btn_wrap"> 파일 삭제</a>
                <?php } else { ?>
				
				<?php }?>
				</div>
				<script>
				$(document).ready(function(){
					var fileTarget = $('.filebox<?php echo $i+1 ?> .upload-hidden');

					fileTarget.on('change', function(){
						if(window.FileReader){
							var filename = $(this)[0].files[0].name;
						} else {
							var filename = $(this).val().split('/').pop().split('\\').pop();
						}

						$(this).siblings('.upload-name<?php echo $i+1 ?>').val(filename);
					});
				}); 
				//preview image var 
				imgTarget = $('.upload-hidden<?php echo $i+1 ?>'); 
				imgTarget.on('change', function(){ 
					var thumb = $('.file_thumb<?php echo $i+1 ?>'); 
					if(window.FileReader){ 
						//image 파일만 
						if (!$(this)[0].files[0].type.match(/image\//)) return; 
						var reader = new FileReader(); 
						reader.onload = function(e){ 
							var src = e.target.result; 
							thumb.prepend('<img src="'+src+'" class="upload-thumb" style="width: 100%;">'); 
						} 
						reader.readAsDataURL($(this)[0].files[0]); 
					} else {
						$(this)[0].select(); 
						$(this)[0].blur(); 
						var imgSrc = document.selection.createRange().text; 
						thumb.prepend('<img class="upload-thumb">'); 
						var img = thumb.find('img'); 
						img[0].style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enable='true',sizingMethod='scale',src=\""+imgSrc+"\")"; 
					} 
				});
				</script>
            </div>
        </div>
        <?php } ?>

	</div>
    <div class="jtbl_frm01 tbl_wrap">
		<div class="box_title_wrap">
			<h2>기본정보</h2>
		</div>
        <table>
        <tbody>
        <?php if ($is_name) { ?>
        <tr>
            <th scope="row"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input" size="10" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_password) { ?>
        <tr>
            <th scope="row"><label for="wr_password">비밀번호<strong class="sound_only">필수</strong></label></th>
            <td><input  style="width:35%;min-width:120px;max-width:120px;"  type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_email) { ?>
        <tr>
            <th scope="row"><label for="wr_email">이메일</label></th>
            <td><input  style="width:35%;min-width:180px;;"  type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input email"  maxlength="100"></td>
        </tr>
        <?php } ?>

        <?php //if ($is_homepage) { ?>
		<!-- <tr>
            <th scope="row"><label for="wr_homepage">홈페이지</label></th>
            <td><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input" ></td>
        </tr> -->
        <?php //} ?>

        <?php //if ($option) { ?>
       <!--  <tr>
            <th scope="row">옵션</th>
            <td><?php echo $option ?></td>
        </tr> -->
        <?php // } ?>

        <?php if ($is_category) { ?>
        <tr>
            <th scope="row"><label for="ca_name">분류<strong class="sound_only">필수</strong></label></th>
            <td>
                <select name="ca_name" id="ca_name" required class="required" >
                    <option value="">선택하세요</option>
                    <?php echo $category_option ?>
                </select>
            </td>
        </tr>
        <?php } ?>

		<tr>
            <th scope="row" class=""><label for="wr_7" class="req_icon">닉네임<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_7" value="<?php echo $wr_7 ?>" id="wr_7" required class="frm_input half_input" size="10" maxlength="20" placeholder="닉네임을 입력하세요."></td>
        </tr>
		<tr>
            <th scope="row" class=""><label for="wr_8" class="req_icon">나이<strong class="sound_only">필수</strong></label></th>
            <td><input type="number" max="99" maxlength="2" name="wr_8" value="<?php echo $wr_8 ?>" id="wr_8" required class="frm_input half_input" size="10" maxlength="20" placeholder="ex ) 26"></td>
        </tr>
		<tr>
			<th scope="row" class=""><label for="wr_3" class="req_icon">성별</label></th>
            <td><!-- <input type="text" name="wr_16" value="" id="wr_16"  class="frm_input half_input"> -->
				<select name="wr_3" id="wr_3" class="frm_input half_input">
					<option value="">선택</option>
					<option value="남" <?php if($write['wr_3']=='남') echo 'selected'; ?>>남</option>
					<option value="여" <?php if($write['wr_3']=='여') echo 'selected'; ?>>여</option>
				</select>
			</td>
		</tr>
		<tr>
            <th scope="row" class=""><label for="wr_1" class="req_icon">지역<strong class="sound_only"></strong></label></th>
			<td>
			<?php if($w=="u") { ?>
				<!-- <input type="text" class="frm_input half_wrap" name="wr_1" value="<?=$write['wr_1']?>" readonly="readonly" /> -->
				<!-- <input type="text" class="frm_input half_wrap non-r" name="wr_2" value="<?=$write['wr_2']?>" readonly="readonly" /> -->
				<select class="frm_input select_frm half_wrap" style="" name="wr_1" id="wr_1" required class="required" onchange="fwrite_submits(this)">
					<option value="">지역 (시)</option>
					<?php 
					$sql_mo="SELECT DISTINCT wr_1 FROM post_k order by wr_3 asc";	 
					$result_mo = sql_query($sql_mo);
					$total_record_mo=sql_num_rows($result_mo);
					for($i=0;$i<$total_record_mo;$i++){
						//mysql_data_seek($result_mo,$i);
						$row_mo=sql_fetch_array($result_mo);				
					?>
					<option value="<?=$row_mo['wr_1']?>" <? if($row_mo['wr_1'] == $write['wr_1']) echo " selected "; ?>><?=$row_mo['wr_1']?></option>
					<?php } ?>
				</select>
				<select class="frm_input select_frm half_wrap non-r" style="" name="wr_2" id="wr_2" required>
					<option value="">지역 (군)</option>
				</select>
			<?php }else{ ?> 
				<div class="dong_select_wrap">
					<select class="frm_input select_frm half_wrap" style="" name="wr_1" id="wr_1" required class="required" onchange="fwrite_submits(this)">
						<option value="">지역 (시)</option>
						<?php 
						$sql_mo="SELECT DISTINCT wr_1 FROM post_k order by wr_3 asc";	 
						$result_mo = sql_query($sql_mo);
						$total_record_mo=sql_num_rows($result_mo);
						for($i=0;$i<$total_record_mo;$i++){
							//mysql_data_seek($result_mo,$i);
							$row_mo=sql_fetch_array($result_mo);				
						?>
						<option value="<?=$row_mo['wr_1']?>" <? if($row_mo['wr_1'] == $ddd) echo " selected "; ?>><?=$row_mo['wr_1']?></option>
						<?php } ?>
					</select>
					<select class="frm_input select_frm half_wrap non-r" style="" name="wr_2" id="wr_2" required>
						<option value="">지역 (군)</option>
					</select>
				</div>
			<?php } ?>
            </td>
        </tr>
		<tr>
			<th scope="row" class=""><label for="wr_5" class="req_icon">직업</label></th>
            <td>
				<select name="wr_5" id="wr_5" class="frm_input">
					<option value="">선택</option>
					<option value="사업가" <?php if($write['wr_5']=='사업가') echo 'selected'; ?>>사업가</option>
					<option value="자영업" <?php if($write['wr_5']=='자영업') echo 'selected'; ?>>자영업</option>
					<option value="프리랜서" <?php if($write['wr_5']=='프리랜서') echo 'selected'; ?>>프리랜서</option>
					<option value="전문경영인" <?php if($write['wr_5']=='전문경영인') echo 'selected'; ?>>전문경영인</option>
					<option value="기업임원" <?php if($write['wr_5']=='기업임원') echo 'selected'; ?>>기업임원</option>
					<option value="회사원" <?php if($write['wr_5']=='회사원') echo 'selected'; ?>>회사원</option>
					<option value="고위공무원" <?php if($write['wr_5']=='고위공무원') echo 'selected'; ?>>고위공무원</option>
					<option value="공무원" <?php if($write['wr_5']=='공무원') echo 'selected'; ?>>공무원</option>
					<option value="연구원" <?php if($write['wr_5']=='연구원') echo 'selected'; ?>>연구원</option>
					<option value="언론인" <?php if($write['wr_5']=='언론인') echo 'selected'; ?>>언론인</option>
					<option value="금융인" <?php if($write['wr_5']=='금융인') echo 'selected'; ?>>금융인</option>
					<option value="예술인" <?php if($write['wr_5']=='예술인') echo 'selected'; ?>>예술인</option>
					<option value="교수" <?php if($write['wr_5']=='교수') echo 'selected'; ?>>교수</option>
					<option value="세무사" <?php if($write['wr_5']=='세무사') echo 'selected'; ?>>세무사</option>
					<option value="변호사" <?php if($write['wr_5']=='변호사') echo 'selected'; ?>>변호사</option>
					<option value="회계사" <?php if($write['wr_5']=='회계사') echo 'selected'; ?>>회계사</option>
					<option value="감정평가사" <?php if($write['wr_5']=='감정평가사') echo 'selected'; ?>>감정평가사</option>
					<option value="변리사" <?php if($write['wr_5']=='변리사') echo 'selected'; ?>>변리사</option>
					<option value="프로골퍼" <?php if($write['wr_5']=='프로골퍼') echo 'selected'; ?>>프로골퍼</option>
					<option value="운동선수" <?php if($write['wr_5']=='운동선수') echo 'selected'; ?>>운동선수</option>
					<option value="의사" <?php if($write['wr_5']=='의사') echo 'selected'; ?>>의사</option>
					<option value="한의사" <?php if($write['wr_5']=='한의사') echo 'selected'; ?>>한의사</option>
					<option value="약사" <?php if($write['wr_5']=='약사') echo 'selected'; ?>>약사</option>
					<option value="수의사" <?php if($write['wr_5']=='수의사') echo 'selected'; ?>>수의사</option>
					<option value="간호사" <?php if($write['wr_5']=='간호사') echo 'selected'; ?>>간호사</option>
					<option value="부동산임대업자" <?php if($write['wr_5']=='부동산임대업자') echo 'selected'; ?>>부동산임대업자</option>
					<option value="기타" <?php if($write['wr_5']=='기타') echo 'selected'; ?>>기타</option>
					<option value="없음" <?php if($write['wr_5']=='없음') echo 'selected'; ?>>없음</option>
					<option value="준비중" <?php if($write['wr_5']=='준비중') echo 'selected'; ?>>준비중</option>
					<option value="주부" <?php if($write['wr_5']=='주부') echo 'selected'; ?>>주부</option>
					<option value="아르바이트" <?php if($write['wr_5']=='아르바이트') echo 'selected'; ?>>아르바이트</option>
					<option value="대학/대학원생" <?php if($write['wr_5']=='대학/대학원생') echo 'selected'; ?>>대학/대학원생</option>
					<option value="변호사" <?php if($write['wr_5']=='변호사') echo 'selected'; ?>>변호사</option>
					<!-- <option value="etc" <?php if($write['wr_5']=='Etc') echo 'selected'; ?>>직접입력</option> -->
				</select>
				<!-- <input type="text" id="wr_6" name="wr_6" placeholder="직접입력" class="frm_input other_wrap half_wrap" value="<?php echo $wr_6; ?>"/> -->
			</td>
		</tr>
		
        <!-- <tr>
            <th scope="row" style="" class=""><label for="wr_content" class="">자기소개<strong class="sound_only">필수</strong></label></th>
            <td class="wr_content">
                <?php if($write_min || $write_max) { ?>
                최소/최대 글자 수 사용 시
                <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                <?php } ?>
                <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                <?php if($write_min || $write_max) { ?>
                최소/최대 글자 수 사용 시
                <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                <?php } ?>
            </td>
        </tr> -->
		
		<!-- 골프정보 -->
		

		
        <?php //for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
        <!-- <tr>
            <th scope="row"><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></th>
            <td><input style="width:35%;min-width:180px;;" type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input" ></td>
        </tr> -->
        <?php //} ?>
		
		<style>
		
		</style>

        <?php if ($is_guest) { //자동등록방지  ?>
        <tr>
            <th scope="row">자동등록방지</th>
            <td>
                <?php echo $captcha_html ?>
            </td>
        </tr>
        <?php } ?>

        </tbody>
        </table>
		<div class="wr_content" style="margin-top:40px;">
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
			<?php } ?>
			<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<div id="char_count_wrap"><span id="char_count"></span>글자</div>
			<?php } ?>
		</div>
    </div>


	<!-- 골프정보 -->
	<div class="jtbl_frm01 tbl_wrap">
		<div class="box_title_wrap">
			<h2>골프 정보</h2>
		</div>
		<table class="">
			<tbody>
				<tr>
					<th scope="row" class=""><label for="wr_9" class="req_icon">평균타수</label></th>
					<td>
						<select name="wr_9" id="wr_9" class="frm_input">
							<option value="">선택</option>
							<option value="언더" <?php if($write['wr_9']=='언더') echo 'selected'; ?>>언더</option>
							<option value="이븐" <?php if($write['wr_9']=='이븐') echo 'selected'; ?>>이븐</option>
							<option value="싱글" <?php if($write['wr_9']=='싱글') echo 'selected'; ?>>싱글</option>
							<option value="평균 80타" <?php if($write['wr_9']=='평균 80타') echo 'selected'; ?>>평균 80타</option>
							<option value="평균 90타" <?php if($write['wr_9']=='평균 90타') echo 'selected'; ?>>평균 90타</option>
							<option value="평균 100타" <?php if($write['wr_9']=='평균 100타') echo 'selected'; ?>>평균 100타</option>
							<option value="평균 110타" <?php if($write['wr_9']=='평균 110타') echo 'selected'; ?>>평균 110타</option>
							<option value="평균 120타이상" <?php if($write['wr_9']=='평균 120타이상') echo 'selected'; ?>>평균 120타이상</option>
						</select>
						<!-- <input type="text" id="wr_6" name="wr_6" placeholder="직접입력" class="frm_input other_wrap half_wrap" value="<?php echo $wr_6; ?>"/> -->
					</td>
				</tr>
				<tr>
					<th scope="row" class=""><label for="wr_10" class="req_icon">골프경력</label></th>
					<td>
						<select name="wr_10" id="wr_10" class="frm_input">
							<option value="">선택</option>
							<option value="1년" <?php if($write['wr_10']=='1년') echo 'selected'; ?>>1년</option>
							<option value="2년" <?php if($write['wr_10']=='2년') echo 'selected'; ?>>2년</option>
							<option value="3년" <?php if($write['wr_10']=='3년') echo 'selected'; ?>>3년</option>
							<option value="4년" <?php if($write['wr_10']=='4년') echo 'selected'; ?>>4년</option>
							<option value="5년" <?php if($write['wr_10']=='5년') echo 'selected'; ?>>5년</option>
							<option value="6년" <?php if($write['wr_10']=='6년') echo 'selected'; ?>>6년</option>
							<option value="7년" <?php if($write['wr_10']=='7년') echo 'selected'; ?>>7년</option>
							<option value="8년" <?php if($write['wr_10']=='8년') echo 'selected'; ?>>8년</option>
							<option value="9년" <?php if($write['wr_10']=='9년') echo 'selected'; ?>>9년</option>
							<option value="10년" <?php if($write['wr_10']=='10년') echo 'selected'; ?>>10년</option>
							<option value="10년 이상" <?php if($write['wr_10']=='10년 이상') echo 'selected'; ?>>10년 이상</option>
						</select>
						<!-- <input type="text" id="wr_6" name="wr_6" placeholder="직접입력" class="frm_input other_wrap half_wrap" value="<?php echo $wr_6; ?>"/> -->
					</td>
				</tr>
				<tr>
					<th scope="row" class=""><label for="wr_11" class="">보유회원권</label></th>
					<td>
						<select name="wr_11" id="wr_11" class="frm_input">
							<option value="">선택</option>
							<option value="없음" <?php if($write['wr_11']=='없음') echo 'selected'; ?>>없음</option>
							<option value="1개" <?php if($write['wr_11']=='1개') echo 'selected'; ?>>1개</option>
							<option value="2개" <?php if($write['wr_11']=='2개') echo 'selected'; ?>>2개</option>
							<option value="3개" <?php if($write['wr_11']=='3개') echo 'selected'; ?>>3개</option>
							<option value="4개" <?php if($write['wr_11']=='4개') echo 'selected'; ?>>4개</option>
							<option value="5개이상" <?php if($write['wr_11']=='5개이상') echo 'selected'; ?>>5개이상</option>
						</select>
						<!-- <input type="text" id="wr_6" name="wr_6" placeholder="직접입력" class="frm_input other_wrap half_wrap" value="<?php echo $wr_6; ?>"/> -->
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- 프로골퍼신가요? -->
	<div class="jtbl_frm01 tbl_wrap">
		<div class="box_title_wrap">
			<input type="checkbox" name="wr_14" id="wr_14" value="yes"<? if ($write['wr_14'] == 'yes') echo "checked";?>>
			<label for="wr_14"></label>
			<h2 style="display:inline-block;">프로골퍼신가요? <span>(선택)</span></h2>
		</div>
		<table class="check_show_wrap">
			<tbody>
				<tr>
					<th scope="row" class=""><label for="wr_15" class="">프로유형</label></th>
					<td>
						<select name="wr_15" id="wr_15" class="frm_input">
							<option value="">선택</option>
							<option value="티칭프로" <?php if($write['wr_15']=='티칭프로') echo 'selected'; ?>>티칭프로</option>
							<option value="협회준회원" <?php if($write['wr_15']=='협회준회원') echo 'selected'; ?>>협회준회원</option>
							<option value="협회정회원" <?php if($write['wr_15']=='협회정회원') echo 'selected'; ?>>협회정회원</option>
							<option value="투어프로" <?php if($write['wr_15']=='투어프로') echo 'selected'; ?>>투어프로</option>
						</select>
						<!-- <input type="text" id="wr_6" name="wr_6" placeholder="직접입력" class="frm_input other_wrap half_wrap" value="<?php echo $wr_6; ?>"/> -->
					</td>
				</tr>
				<tr>
					<th scope="row" class=""><label for="wr_16" class="">협회(선택)</label></th>
					<td>
						<select name="wr_16" id="wr_16" class="frm_input half_wrap flt_right">
							<option value="">선택</option>
							<option value="KLPGA" <?php if($write['wr_16']=='KLPGA') echo 'selected'; ?>>KLPGA</option>
							<option value="KPGA" <?php if($write['wr_16']=='KPGA') echo 'selected'; ?>>KPGA</option>
							<option value="LPGA" <?php if($write['wr_16']=='LPGA') echo 'selected'; ?>>LPGA</option>
							<option value="PGA" <?php if($write['wr_16']=='PGA') echo 'selected'; ?>>PGA</option>
							<option value="etc" <?php if($write['wr_16']=='etc') echo 'selected'; ?>>직접입력</option>
						</select>
						<input type="text" id="wr_17" name="wr_17" placeholder="입력해주세요." class="frm_input other_wrap half_wrap" value="<?php echo $write['wr_17']; ?>"/>
					</td>
				</tr>
				<tr>
					<th scope="row" class=""><label for="wr_18" class="">회원번호(선택)<strong class="sound_only">필수</strong></label></th>

					<td><input type="text" name="wr_18" value="<?php echo $write['wr_18'] ?>" id="wr_18" class="frm_input half_input" size="10" maxlength="20" placeholder="영문, 숫자만 입력해주세요"></td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- 골프 라이프 스타일 -->
	<div class="jtbl_frm01 tbl_wrap">
		<div class="box_title_wrap">
			<h2>골프 라이프 스타일</h2>
		</div>
		<table class="">
			<tbody>
				<tr>
					<th scope="row" class=""><label for="wr_12" class="req_icon">월평균 라운딩</label></th>
					<td>
						<select name="wr_12" id="wr_12" class="frm_input">
							<option value="">선택</option>
							<option value="1회" <?php if($write['wr_12']=='1회') echo 'selected'; ?>>1회</option>
							<option value="2회" <?php if($write['wr_12']=='2회') echo 'selected'; ?>>2회</option>
							<option value="3회" <?php if($write['wr_12']=='3회') echo 'selected'; ?>>3회</option>
							<option value="4회" <?php if($write['wr_12']=='4회') echo 'selected'; ?>>4회</option>
							<option value="5회" <?php if($write['wr_12']=='5회') echo 'selected'; ?>>5회</option>
							<option value="6회" <?php if($write['wr_12']=='6회') echo 'selected'; ?>>6회</option>
							<option value="7회" <?php if($write['wr_12']=='7회') echo 'selected'; ?>>7회</option>
							<option value="8회" <?php if($write['wr_12']=='8회') echo 'selected'; ?>>8회</option>
							<option value="9회" <?php if($write['wr_12']=='9회') echo 'selected'; ?>>9회</option>
							<option value="10회" <?php if($write['wr_12']=='10회') echo 'selected'; ?>>10회</option>
						</select>
						<!-- <input type="text" id="wr_6" name="wr_6" placeholder="직접입력" class="frm_input other_wrap half_wrap" value="<?php echo $wr_6; ?>"/> -->
					</td>
				</tr>
				<tr>
					<th scope="row" class=""><label for="wr_13" class="req_icon">해외 골프</label></th>
					<td>
						<select name="wr_13" id="wr_13" class="frm_input">
							<option value="">선택</option>
							<option value="1회" <?php if($write['wr_13']=='1회') echo 'selected'; ?>>1회</option>
							<option value="2회" <?php if($write['wr_13']=='2회') echo 'selected'; ?>>2회</option>
							<option value="3회" <?php if($write['wr_13']=='3회') echo 'selected'; ?>>3회</option>
							<option value="4회" <?php if($write['wr_13']=='4회') echo 'selected'; ?>>4회</option>
							<option value="5회" <?php if($write['wr_13']=='5회') echo 'selected'; ?>>5회</option>
							<option value="6회" <?php if($write['wr_13']=='6회') echo 'selected'; ?>>6회</option>
							<option value="7회" <?php if($write['wr_13']=='7회') echo 'selected'; ?>>7회</option>
							<option value="8회" <?php if($write['wr_13']=='8회') echo 'selected'; ?>>8회</option>
							<option value="9회" <?php if($write['wr_13']=='9회') echo 'selected'; ?>>9회</option>
							<option value="10회" <?php if($write['wr_13']=='10회') echo 'selected'; ?>>10회</option>
						</select>
						<!-- <input type="text" id="wr_6" name="wr_6" placeholder="직접입력" class="frm_input other_wrap half_wrap" value="<?php echo $wr_6; ?>"/> -->
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	
    <!-- <div class="btn_confirm">
    		<span class="jbutton large black"><input type="submit" value="등록" id="btn_submit" accesskey="s" /></span>
    		<?php if($is_admin) { ?>
    		<span class="jbutton large black"><a href="./board.php?bo_table=<?php echo $bo_table ?>">취소</a></span>
    		<?php } ?> 
    	 </div> -->
  </form>

    <script>
	function aa(id) {
		//if (window.confirm("Do you really want to leave?")) {
		if (window.confirm("삭제하겠습니까?")) {
			$('#' + id).prop('checked', true);
			$('#' + id).siblings('img').hide();
			$('#' + id).siblings('a').hide();
		} else {
			console.log('nono')
		}
	}
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }
		
		<?php if($w == '') {?>
		var fileCheck = document.getElementById("input-file1").value;
		if(!fileCheck){
			alert("대표 사진은 필수입니다.");
			return false;
		}
		<?php }?>

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
	<script>
	$('#wr_6').hide();
	$('#wr_5').change(function(){
		if($('#wr_5').val()=='etc'){
			$('#wr_6').show();
		}else{
			$('#wr_6').hide();
		};
	});
	$('#wr_17').hide();
	$('#wr_16').change(function(){
		if($('#wr_16').val()=='etc'){
			$('#wr_17').show();
		}else{
			$('#wr_17').hide();
		};
	});

	<? if ($write['wr_14'] != 'yes') {?>$('.check_show_wrap').hide();<?php }?>	
	$("#wr_14").change(function(){
		if($("#wr_14").is(":checked")){
            $('.check_show_wrap').show();
        }else{
            $('.check_show_wrap').hide();
        }
	});

	$('#wr_1').on('change', function(){
		addrAjax(this.value);
	})

	function addrAjax(adrs) {
		$.ajax({
			url: "<?php echo G5_URL; ?>/ajax.addr.php",
			type: "POST",
			data: {
				"adrs": adrs,
			},
			//dataType: "json",
			async: false,
			success: function(msg) {
				$("#wr_2").html(msg);
			},
			error: function(request,status,error){
			  alert("code = "+ request.status + " message = " + request.responseText + " error = " + error);
			}
		});
	}

	<?php if($write['wr_1']){?>
	addrAjax("<?php echo $write['wr_1']?>");
	optont = document.fwrite.wr_2.options.length;
	for(var i = 0 ; i < optont ; i++) {
		if(document.fwrite.wr_2.options[i].value == "<?php echo $write['wr_2']?>") {
			document.fwrite.wr_2.options[i].selected = true;
			break;
		}
	}
	<?php }?>

	$('#wr_18').keyup(function() {
		var inputVal = $(this).val();
		$(this).val((inputVal.replace(/[ㄱ-힣~!@#$%^&*()_+|<>?:{}= ]/g,'')));
	});
	</script>

</section>
<!-- } 게시물 작성/수정 끝 -->