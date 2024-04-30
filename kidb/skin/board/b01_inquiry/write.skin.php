<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);


?>
<style>
	 .banner_wrap .banner ul{
		display: flex;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
		padding-left: 260px;
	}
	 .banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	 .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	 .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	 .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	 .banner_wrap .banner ul li a{
		color: #fff;
	}
	#fwrite{
		padding: 150px 260px 150px 260px;
	}

	.inquiry_tit span{
		color: #002e6c;
		font-size: 14px;
		font-weight: bold;
		letter-spacing: 4px;
	}
	.inquiry_tit h2{
		font-size: 44px;
		width: 50%;
	}

	.bo_w_info .info_wrap{
		display: flex;
	}
	#bo_w .bo_w_info .frm_input{
		width: 100%;
		height: 60px;
		padding: 0 25px;
		font-size: 16px;
		border: none;
		background: #f8f8f8;
		color: #ccc;
		margin-bottom: 40px;
	}
	.bo_w_info .info_wrap .name,
	.bo_w_info .info_wrap .phone,
	.bo_w_info .info_wrap .email{
		display: flex;
		flex-direction: column;
	}
	.bo_w_info .info_wrap .name span,
	.bo_w_info .info_wrap .phone span,
	.bo_w_info .info_wrap .email span,
	.categorys .categorys_tit span,
	.write_div .write_tit span{
		margin-bottom: 10px;
		font-weight: bold;
		font-size: 20px;
		color: #002e6c;
	}
	.categorys .categorys_tit,
	.write_div .write_tit {
		margin-bottom: 10px;
	}
	.bo_w_info .info_wrap > div {
        flex: 1; /* 각 항목에 동일한 공간 할당 */
        padding: 0 10px; /* 각 항목 사이에 여백 추가 */
        box-sizing: border-box; /* 패딩을 포함한 너비 계산 */
    }
    /* 첫 번째와 마지막 항목의 여백 조정 */
    .bo_w_info .info_wrap > div:first-child {
        padding-left: 0;
    }
    .bo_w_info .info_wrap > div:last-child {
        padding-right: 0;
    }

	.categorys .category{
		display: flex;
		gap: 10px;
		font-size: 16px;
		margin-bottom: 50px;
	}
	.categorys .category label{
		margin-right: 20px;
		color: #ccc;
		font-weight: bold;
	}
	.categorys .category input{
		cursor: pointer;
	}
	.categorys .category .category_box{
		gap: 10px;
		display: flex;
		align-items: center;
	}
	.categorys .category input[type="checkbox"] {
		-webkit-appearance: none;
		appearance: none;
		background-color: #ccc;
		margin: 0;
		font: inherit;
		color: currentColor;
		width: 2em;
		height: 2em;
		border: none;
		border-radius: 50%;
		transform: translateY(-0.075em);
		display: grid;
		place-content: center;
	}

	.categorys .category input[type="checkbox"]:checked {
		background-color: #002e6c;
	}

	.categorys .category input[type="checkbox"]:checked:after {
		content: '';
		width: 1em;
		height: 1em;
		border-radius: 50%;
		background: white;
	}
	#bo_w .bo_w_flie .file_wr{
		height: 80px;
		border: none;
		background: #f8f8f8;
	}
	#bo_w .bo_w_flie .file_wr span{
		color: #ccc;
		font-size: 16px;
	}
	.wr_content textarea{
		border: none;
		background: #f8f8f8;
	}
	.bo_w_flie .file_wr img{
		cursor: pointer;
	}
	::placeholder{ 
	  color: #ccc;
	}
	#bo_w .btn_submit{
		background: #002e6c;
		font-size: 16px;
		height: auto;
		padding: 10px 50px;
		font-weight: bold;
	}
	/* 커스텀 체크박스 스타일 */
	.custom-checkbox {
		display: none; /* 원래 체크박스 숨기기 */
	}

	.checkbox-label {
		display: inline-block;
		width: 20px; /* 체크박스 크기 */
		height: 20px; /* 체크박스 크기 */
		border: 1px solid #ccc;
		cursor: pointer;
	}

	/* 체크박스가 선택될 때의 스타일 */
	.custom-checkbox:checked + .checkbox-label {
		background-color: #002e6c;
		/* 체크 표시 추가 */
		background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><polyline points="4 10 8 15 16 4" style="fill:none;stroke:white;stroke-width:2"/></svg>');
		background-repeat: no-repeat;
		background-position: center; 
	}
	/* 라디오 버튼 커스텀 스타일 */
	.categorys .category .category_box input[type="radio"] {
		-webkit-appearance: none; 
		-moz-appearance: none; 
		appearance: none; 
		background-color: #ccc;
		width: 20px; 
		height: 20px; 
		border-radius: 50%; 
		vertical-align: middle; 
		border: none;
		cursor: pointer;
		margin-right: 10px; 
	}

	/* 라디오 버튼이 선택될 때의 스타일 */
	.categorys .category .category_box input[type="radio"]:checked {
		background-color: #002e6c; 
		background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="30" style="fill:white;"/></svg>'); /* 체크 표시 */
		background-repeat: no-repeat;
		background-position: center; 
	}
	.banner_wrap  ul{
		background: #002e6c;
		height: 80px;
	}
	 .banner_wrap  ul li{
		height: 80px;
		width: 350px;
	}
	#bo_w .write_div{
		margin-bottom: 30px;
	}
	@media (max-width: 1400px) {
		.banner_wrap  ul{
			height: 5.17vw;
		}
		#fwrite{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
	}
	@media (max-width: 768px) {
		#fwrite{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
		.bo_w_info .info_wrap{
			flex-direction: column;
		}
		.bo_w_info .info_wrap .phone,
		.bo_w_info .info_wrap .email{
			padding:0;
		}
	}
	@media (max-width:1400px){
		 .banner_wrap .banner ul{
			padding-left: 8.6vw;
		}
		 .info_wrapper{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		 .banner_wrap .banner ul{
			font-size: 1.54vw;
			height: 5.17vw;
		}
		 .banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		 .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		 .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}
	}
	@media (max-width: 480px) {
		.categorys .category,
		.btn_confirm{
			flex-wrap:wrap;
		}
		#bo_w .bo_w_flie .file_wr span{
			font-size: 12px;
		}
	}




</style>
	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<li class="first"><a href="/bbs/board.php?bo_table=resources">Contact Us</a></li>
				<li class="fourth"><a href="/bbs/write.php?bo_table=inquiry">Inquiry</a></li>
			</ul>
		</div>
	</div>
<section id="bo_w">
    <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

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
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">HTML</label>';
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

    <?php if ($is_category) { ?>
    <div class="bo_w_select write_div">
        <label for="ca_name"  class="sound_only">분류<strong>필수</strong></label>
        <select name="ca_name" id="ca_name" required>
            <option value="">분류를 선택하세요</option>
            <?php echo $category_option ?>
        </select>
    </div>
    <?php } ?>

			<div class="inquiry_tit">
				<span>KOREA'S NO.1 BROKERAGE FIRM</span>
				<h2>INQUIRY</h2>
			</div>
			<div class="solid"></div>
    <div class="bo_w_info write_div">
		<div class="info_wrap">
			<div class="name">
				<span>이름</span>
				<label for="wr_name" class="sound_only">이름<strong>필수</strong></label>
				<input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input" placeholder="이름을 입력해주세요.">
			</div>

			<div class="phone">
				<span>연락처</span>
				<label for="wr_1" class="sound_only">연락처</label>
				<input type="text" name="wr_1" value="<?php echo $wr_1 ?>" id="wr_1" class="frm_input " placeholder="연락처를 입력해주세요." oninput="validatePhoneNumber(this)">
			</div>

			<div class="email">
				<span>이메일</span>
				<label for="wr_email" class="sound_only">이메일</label>
				<input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input email " placeholder="이메일을 입력해주세요.">
			</div>
		</div>
	</div>

<!--     <div class="bo_w_tit write_div">
        <label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>
        
        <div id="autosave_wrapper write_div">
            <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input required" size="50" maxlength="255" placeholder="제목">
        </div>
        
    </div> -->
	
	<div class="categorys">
		<div class="categorys_tit">
			<span>문의 유형</span>
		</div>
		<div class="category"> 
			<div class="category_box">
				<input type="radio" id="market_funds" name="wr_2" value="funds">
				<label for="market_funds">자금시장</label>
			</div>
			<div class="category_box">
				<input type="radio" id="market_bonds" name="wr_2" value="bonds">
				<label for="market_bonds">채권시장</label>
			</div>
			<div class="category_box">
				<input type="radio" id="market_derivatives" name="wr_2" value="derivatives">
				<label for="market_derivatives">파생시장</label>
			</div>
		</div>
	</div>




    <div class="write_div">
        <label for="wr_content" class="sound_only">내용<strong>필수</strong></label>
		<div class="write_tit">
			<span>문의 내용</span>
		</div>
        <div class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
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

    <?php //for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
    <!-- <div class="bo_w_link write_div">
        <label for="wr_link<?php echo $i ?>"><i class="fa fa-link" aria-hidden="true"></i><span class="sound_only"> 링크  #<?php echo $i ?></span></label>
        <input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo $write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input full_input" size="50" placeholder="링크">
    </div> -->
    <?php //} ?>



	<div class="bo_w_flie write_div">
		<div class="write_tit">
			<span>첨부파일</span>
		</div>
		<div class="file_wr write_div">
			<label for="bf_file_1"><span class="sound_only"> 파일 #1</span></label>
			<img src="../img/file_btn.svg" alt="" id="file_upload_trigger">
			<input type="file" name="bf_file[]" id="bf_file_1" title="파일첨부 1 : 용량 41,943,040 바이트 이하만 업로드 가능" class="frm_file" style="display:none;" onchange="updateFileName(this)">
			<span id="file_name_display">선택된 파일이 없습니다.</span>
		</div>
	</div>


	<!-- <div class="bo_w_flie write_div">
	        <div class="file_wr write_div">
	            <label for="bf_file_2" class="lb_icon"><i class="fa fa-download" aria-hidden="true"></i><span class="sound_only"> 파일 #1</span></label>
	            <input type="file" name="bf_file[]" id="bf_file_2" title="파일첨부 1 : 용량 41,943,040 바이트 이하만 업로드 가능" class="frm_file ">
	        </div>
	    </div>
	<div class="bo_w_flie write_div">
	        <div class="file_wr write_div">
	            <label for="bf_file_3" class="lb_icon"><i class="fa fa-download" aria-hidden="true"></i><span class="sound_only"> 파일 #1</span></label>
	            <input type="file" name="bf_file[]" id="bf_file_3" title="파일첨부 1 : 용량 41,943,040 바이트 이하만 업로드 가능" class="frm_file ">
	        </div>      
	    </div> -->

    <?php if ($is_use_captcha) { //자동등록방지  ?>
    <div class="write_div">
        <?php echo $captcha_html ?>
    </div>
    <?php } ?>


	<div class="btn_confirm write_div" style="display: flex; align-items: center; justify-content: space-between;">
		<!-- 개인정보취급방침 동의 체크박스와 문구 추가 -->
		<div style="display: flex; align-items: center; font-size:16px; color: #ccc; gap: 10px;">
			<input type="checkbox" id="privacy_policy_agreement" name="privacy_policy_agreement" class="custom-checkbox" required>
			<label for="privacy_policy_agreement" class="checkbox-label" style="margin-left: 10px;"></label>
			<span>개인정보취급방침에 동의합니다.</span>
		</div>

		<!-- 기존 제출 버튼 -->
		<input type="submit" value="Send" id="btn_submit" accesskey="s" class="btn_submit btn">
	</div>


    </form>
	
    <script>	
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

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
	// 파일첨부
	document.getElementById('file_upload_trigger').addEventListener('click', function() {
        document.getElementById('bf_file_1').click();
    });

    function updateFileName(input) {
        var fileNameDisplay = document.getElementById('file_name_display');
        if(input.files && input.files.length > 0) {
            fileNameDisplay.textContent = input.files[0].name;
        } else {
            fileNameDisplay.textContent = "선택된 파일이 없습니다.";
        }
    }
	//체크박스
	document.addEventListener('DOMContentLoaded', function () {
        var checkboxes = document.querySelectorAll('.category input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                updateLabelColor(checkbox);
            });
        });
    });

    function updateLabelColor(checkbox) {
        var label = document.querySelector('label[for="' + checkbox.id + '"]');
        if (checkbox.checked) {
            label.style.color = 'black';
        } else {
            label.style.color = ''; // 기본 색상으로 재설정
        }
    }
	document.addEventListener('DOMContentLoaded', function () {
		var radioButtons = document.querySelectorAll('.category input[type="radio"]');
		radioButtons.forEach(function(radio) {
			radio.addEventListener('change', function() {
				updateLabelColors();
			});
		});
		updateLabelColors(); // 초기 상태에 대한 라벨 색상 업데이트
	});

	function updateLabelColors() {
		var radioButtons = document.querySelectorAll('.category input[type="radio"]');
		radioButtons.forEach(function(radio) {
			var label = document.querySelector('label[for="' + radio.id + '"]');
			if (radio.checked) {
				label.style.color = 'black';
			} else {
				label.style.color = ''; // 기본 색상으로 재설정
			}
		});
	}

	//연락처 숫자만 입력
	function validatePhoneNumber(input) {
		var value = input.value;
		var numbersOnly = value.replace(/[^0-9]/g, '');

		if (value !== numbersOnly) {
			alert("숫자만 입력해주세요.");
			input.value = numbersOnly; // 숫자가 아닌 문자 제거
		}
	}

    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->