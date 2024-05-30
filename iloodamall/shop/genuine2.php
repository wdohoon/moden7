<?php
include_once('./_common.php');

if (!$is_member){
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL."/genuine.php"));
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/genuine.php');
    return;
}

//define("_INDEX_", TRUE);

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
.sub_title {color:#b1b4b9; font-size: 48px;font-weight: 900;text-align: center; padding:100px 0 50px;border-bottom:1px solid #000;;}

#form_wrap {padding:120px 0px 100px;}
#form_wrap .form_desc {font-size: 30px;font-weight: 700; line-height: 48px;text-align: center;word-break:keep-all;}
#form_wrap .alertmsg {font-size: 20px;font-weight: 400; line-height: 48px;text-align: center;word-break:keep-all; margin-top: 40px;	}
#form_wrap form {width:1400px; margin:80px auto 0px;}
#form_wrap form .ev_btn {margin-bottom: 80px;}
#form_wrap form .ev_btn div { width:100%;}
#form_wrap form .ev_btn div input{width: 100%; border: 1px solid #f1f1f1; background: #f1f1f1; color: #000; padding: 5px 0; margin-top: 10px; text-align: center;  border-radius: 40px; -webkit-transition: none;}

.fd{position:relative; display: flex; flex-wrap:wrap; margin:0 auto; gap:20px; justify-content: center}
.fd h5{width: 17%; margin-bottom: 10px;}
.fd label{display: block; padding:5px 0; border-radius:40px; text-align:center; border: 1px solid #333; color: #333; cursor:pointer; font-size: 20px; font-weight:400; font-family: 'NanumSquareNeo';}
.fd input[type='checkbox']:checked+label {background: #333; color:white; }
.fd .inputtext{visibility:hidden; font-size:18px;}
.fd .inputtext.onn{visibility:visible;}
.new_sch_btn01{justify-content:flex-end;}
.inputt{display: none;}


#form_wrap form input#btn_submit {width: 200px;height: 60px;background:#000;border:none;border-radius:0;color:#fff;cursor:pointer;font-size: 20px;font-weight: 700;margin:0 auto;display: block;padding-left:0;}

.sub_tit {text-align: center;font-size: 30px;font-weight: 700;margin-bottom:25px;}
.sub_div ul {background:#f1f1f1;padding:100px 0px;text-align: center;}
.sub_div ul:after {content:"";display:block;clear:both;}
.sub_div ul li {text-align: center;display:inline-block;width: 280px;height: 280px;border-radius:50%;background:#fff;padding:50px 0;font-family: 'NanumSquare', sans-serif;margin:0 10px;}
.sub_div ul li .num {font-size: 60px;font-weight: 400;line-height:1.2em;}
.sub_div ul li .desc {font-size: 20px;font-weight: 700;line-height: 33px;}


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
.sub_title {font-size: 2.7273vw;padding:5.6818vw 0 2.8409vw;border-bottom:0.0568vw solid #000;;}

#form_wrap {padding:6.8182vw 0.0000vw 5.6818vw;}
#form_wrap .form_desc {font-size: 1.7045vw; line-height: 2.7273vw;word-break:keep-all;}
#form_wrap .alertmsg {font-size: 1.1364vw; line-height: 2.7273vw;word-break:keep-all; margin-top: 2.2727vw;	}
#form_wrap form {width:79.5455vw; margin:4.5455vw auto 0.0000vw;}
#form_wrap form .ev_btn {margin-bottom: 4.5455vw;}
#form_wrap form .ev_btn div { width:100%;}
#form_wrap form .ev_btn div input{width: 100%; border: 0.0568vw solid #f1f1f1; background: #f1f1f1;  padding: 0.2841vw 0; margin-top: 0.5682vw;   border-radius: 2.2727vw; -webkit-transition: none;}

.fd{  flex-wrap:wrap; margin:0 auto; gap:1.1364vw; justify-content: center}
.fd h5{width: 17%; margin-bottom: 0.5682vw;}
.fd label{ padding:0.2841vw 0; border-radius:2.2727vw;  border: 0.0568vw solid #333;  cursor:pointer; font-size: 1.1364vw; }
.fd input[type='checkbox']:checked+label {background: #333;  }
.fd .inputtext{visibility:hidden;  font-size:1.0227vw;}
.fd .inputtext.onn{visibility:visible;}
.new_sch_btn01{justify-}
.inputt{}

#form_wrap form input#btn_submit {width: 11.3636vw;height: 3.4091vw;background:#000;border:none;border-radius:0;cursor:pointer;font-size: 1.1364vw;margin:0 auto;padding-left:0;}

.sub_tit {font-size: 1.7045vw;margin-bottom:1.4205vw;}
.sub_div ul {background:#f1f1f1;padding:5.6818vw 0.0000vw;}
.sub_div ul:after {clear:both;}
.sub_div ul li {width: 15.9091vw;height: 15.9091vw;border-radius:50%;background:#fff;padding:2.8409vw 0;font-family: 'NanumSquare', sans-serif;margin:0 0.5682vw;}
.sub_div ul li .num {font-size: 3.4091vw;line-height:1.2em;}
.sub_div ul li .desc {font-size: 1.1364vw;line-height: 1.8750vw;}

}

@media (max-width: 1600px)  {
#wrapper {background: #fff;}
#container {width:100%;}
#container .is_index {margin-left:0;}

/* sub_w */
.sub_w {}
.s_inner {width:100.0000%;margin:0 auto;}
.s_inner::after {clear:both;}

/* common */
.left {}
.right {}

.sub_div {}
.sub_title {font-size: 3.0000vw;padding:6.2500vw 0 3.1250vw;border-bottom:0.0625vw solid #000;;}

#form_wrap {padding:7.5000vw 0.0000vw 6.2500vw;}
#form_wrap .form_desc {font-size: 1.8750vw; line-height: 3.0000vw;word-break:keep-all;}
#form_wrap .alertmsg {font-size: 1.2500vw; line-height: 3.0000vw;word-break:keep-all; margin-top: 2.5000vw;	}
#form_wrap form {width:87.5000vw; margin:5.0000vw auto 0.0000vw;}
#form_wrap form .ev_btn {margin-bottom: 5.0000vw;}
#form_wrap form .ev_btn div { width:100%;}
#form_wrap form .ev_btn div input{width: 100%; border: 0.0625vw solid #f1f1f1; background: #f1f1f1;  padding: 0.3125vw 0; margin-top: 0.6250vw;   border-radius: 2.5000vw; -webkit-transition: none;}

.fd{  flex-wrap:wrap; margin:0 auto; gap:1.2500vw; justify-content: center}
.fd h5{width: 17%; margin-bottom: 0.6250vw;}
.fd label{ padding:0.3125vw 0; border-radius:2.5000vw;  border: 0.0625vw solid #333;  cursor:pointer; font-size: 1.2500vw; }
.fd input[type='checkbox']:checked+label {background: #333;  }
.fd .inputtext{visibility:hidden; font-size:1.1250vw;}
.fd .inputtext.onn{visibility:visible;}
.new_sch_btn01{justify-}
.inputt{}

#form_wrap form input#btn_submit {width: 12.5000vw;height: 3.7500vw;background:#000;border:none;border-radius:0;cursor:pointer;font-size: 1.2500vw;margin:0 auto;padding-left:0;}

.sub_tit {font-size: 1.8750vw;margin-bottom:1.5625vw;}
.sub_div ul {background:#f1f1f1;padding:6.2500vw 0.0000vw;}
.sub_div ul:after {clear:both;}
.sub_div ul li {width: 17.5000vw;height: 17.5000vw;border-radius:50%;background:#fff;padding:3.1250vw 0;font-family: 'NanumSquare', sans-serif;margin:0 0.6250vw;}
.sub_div ul li .num {font-size: 3.7500vw;line-height:1.2em;}
.sub_div ul li .desc {font-size: 1.2500vw;line-height: 2.0625vw;}

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
.sub_title {font-size: 3.4286vw;padding:7.1429vw 0 3.5714vw;border-bottom:0.0714vw solid #000;;}


#form_wrap {padding:8.5714vw 0.0000vw 7.1429vw;}
#form_wrap .form_desc {font-size: 2.1429vw; line-height: 3.4286vw;word-break:keep-all;}
#form_wrap .alertmsg {font-size: 1.4286vw; line-height: 3.4286vw;word-break:keep-all; margin-top: 2.8571vw;	}
#form_wrap form {width:100.0000%; margin:5.7143vw auto 0.0000vw;}
#form_wrap form .ev_btn {margin-bottom: 5.7143vw;}
#form_wrap form .ev_btn div { width:100%;}
#form_wrap form .ev_btn div input{width: 100%; border: 0.0714vw solid #f1f1f1; background: #f1f1f1;  padding: 0.3571vw 0; margin-top: 0.7143vw;   border-radius: 2.8571vw; -webkit-transition: none;}

.fd{  flex-wrap:wrap; margin:0 auto; gap:1.4286vw; justify-content: center}
.fd h5{width: 17%; margin-bottom: 0.7143vw;}
.fd label{ padding:0.3571vw 0; border-radius:2.8571vw;  border: 0.0714vw solid #333;  cursor:pointer; font-size: 1.4286vw; }
.fd input[type='checkbox']:checked+label {background: #333;  }
.fd .inputtext{visibility:hidden; font-size:1.2857vw;}
.fd .inputtext.onn{visibility:visible;}
.new_sch_btn01{justify-}
.inputt{}

#form_wrap form input#btn_submit {width: 14.2857vw;height: 4.2857vw;background:#000;border:none;border-radius:0;cursor:pointer;font-size: 1.4286vw;margin:0 auto;padding-left:0;}

.sub_tit {font-size: 2.1429vw;margin-bottom:1.7857vw;}
.sub_div ul {background:#f1f1f1;padding:7.1429vw 0.0000vw;}
.sub_div ul:after {clear:both;}
.sub_div ul li {width: 20.0000vw;height: 20.0000vw;border-radius:50%;background:#fff;padding:3.5714vw 0;font-family: 'NanumSquare', sans-serif;margin:0 0.7143vw;}
.sub_div ul li .num {font-size: 4.2857vw;line-height:1.2em;}
.sub_div ul li .desc {font-size: 1.4286vw;line-height: 2.3571vw;}

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
.sub_title {font-size: 4.6875vw;padding:9.7656vw 0 4.8828vw;border-bottom:0.0977vw solid #000;;}

#form_wrap {padding:11.7188vw 0.0000vw 9.7656vw;}
#form_wrap .form_desc {font-size: 2.9297vw; line-height: 4.6875vw;word-break:keep-all;}
#form_wrap .alertmsg {font-size: 1.9531vw; line-height: 4.6875vw;word-break:keep-all; margin-top: 3.9063vw;	}
#form_wrap form {width:100%; margin:7.8125vw auto 0.0000vw;}
#form_wrap form .ev_btn {margin-bottom: 7.8125vw;}
#form_wrap form .ev_btn div { width:100%;}
#form_wrap form .ev_btn div input{width: 100%; border: 0.0977vw solid #f1f1f1; background: #f1f1f1;  padding: 0.4883vw 0; margin-top: 0.9766vw;   border-radius: 3.9063vw; -webkit-transition: none;}

.fd{  flex-wrap:wrap; margin:0 auto; gap:1.9531vw; justify-content: center}
.fd h5{width: 17%; margin-bottom: 0.9766vw;}
.fd label{ padding:0.4883vw 0; border-radius:3.9063vw;  border: 0.0977vw solid #333;  cursor:pointer; font-size: 1.9531vw; }
.fd input[type='checkbox']:checked+label {background: #333;  }
.fd .inputtext{visibility:hidden; font-size:1.7578vw;}
.fd .inputtext.onn{visibility:visible;}
.new_sch_btn01{}
.inputt{}

#form_wrap form input#btn_submit {width: 19.5313vw;height: 5.8594vw;background:#000;border:none;border-radius:0;cursor:pointer;font-size: 1.9531vw;margin:0 auto;padding-left:0;}

.sub_tit {font-size: 2.9297vw;margin-bottom:2.4414vw;}
.sub_div ul {background:#f1f1f1;padding:9.7656vw 0.0000vw;}
.sub_div ul:after {clear:both;}
.sub_div ul li {width: 27.3438vw;height: 27.3438vw;border-radius:50%;background:#fff;padding:4.8828vw 0;font-family: 'NanumSquare', sans-serif;margin:0 0.9766vw;}
.sub_div ul li .num {font-size: 5.8594vw;line-height:1.2em;}
.sub_div ul li .desc {font-size: 1.9531vw;line-height: 3.2227vw;}

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
.sub_title {font-size: 6.2500vw;padding:13.0208vw 0 6.5104vw;border-bottom:0.1302vw solid #000;;}

#form_wrap {padding:15.6250vw 0.0000vw 13.0208vw;}
#form_wrap .form_desc {font-size: 3.9063vw; line-height: 6.2500vw;word-break:keep-all;}
#form_wrap .alertmsg {font-size: 2.6042vw; line-height: 6.2500vw;word-break:keep-all; margin-top: 5.2083vw;	}
#form_wrap form {width:100%; margin:10.4167vw auto 0.0000vw;}
#form_wrap form .ev_btn {margin-bottom: 10.4167vw;}
#form_wrap form .ev_btn div { width:100%;}
#form_wrap form .ev_btn div input{width: 100%; border: 0.1302vw solid #f1f1f1; background: #f1f1f1;  padding: 0.6510vw 0; margin-top: 1.3021vw;   border-radius: 5.2083vw; -webkit-transition: none;}

.fd{  flex-wrap:wrap; margin:0 auto; gap:2.6042vw; justify-content: center}
.fd h5{width: 22%; margin-bottom: 0vw;}
.fd label{ padding:0.6510vw 0; border-radius:5.2083vw;  border: 0.1302vw solid #333;  cursor:pointer; font-size: 2.6042vw; }
.fd input[type='checkbox']:checked+label {background: #333;  }
.fd .inputtext{visibility:hidden; font-size:2.3438vw;}
.fd .inputtext.onn{visibility:visible;}
.new_sch_btn01{justify-}
.inputt{}

#form_wrap form input#btn_submit {width: 26.0417vw;height: 7.8125vw;background:#000;border:none;border-radius:0;cursor:pointer;font-size: 2.6042vw;margin:0 auto;padding-left:0;}

.sub_tit {font-size: 3.6458vw;margin-bottom:3.2552vw;}
.sub_div ul {background:#f1f1f1;padding:13.0208vw 0.0000vw;}
.sub_div ul:after {clear:both;}
.sub_div ul li {width: 36.4583vw;height: 36.4583vw;border-radius:50%;background:#fff;padding:6.5104vw 0;font-family: 'NanumSquare', sans-serif;margin:0 1.3021vw 3.9063vw;}
.sub_div ul li .num {font-size: 6.7708vw;line-height:1.2em;}
.sub_div ul li .desc {font-size: 2.8646vw;line-height: 1.5em;}

}

@media (max-width: 480px)  {

.sub_div {}
.sub_title {font-size: 10.0000vw;padding:16.6667vw 0 10.4167vw;border-bottom:0.2083vw solid #000;;}

#form_wrap {padding:25.0000vw 0.0000vw 20.8333vw;}
#form_wrap .form_desc {font-size: 6.2500vw; line-height: 10.0000vw;word-break:keep-all;}
#form_wrap .alertmsg {font-size: 4.1667vw; line-height: 10.0000vw;word-break:keep-all; margin-top: 8.3333vw;	}
#form_wrap form {width:100%; margin:16.6667vw auto 0.0000vw;}
#form_wrap form .ev_btn {margin-bottom: 16.6667vw;}
#form_wrap form .ev_btn div { width:100%;}
#form_wrap form .ev_btn div input{width: 100%; border: 0.2083vw solid #f1f1f1; background: #f1f1f1;  padding: 1.0417vw 0; margin-top: 2.0833vw;   border-radius: 8.3333vw; -webkit-transition: none;}

.fd{  flex-wrap:wrap; margin:0 auto; gap:4.1667vw; justify-content: center}
.fd h5{width: 21%; margin-bottom: 0vw;}
.fd label{ padding:1.0417vw 0; border-radius:8.3333vw;  border: 0.2083vw solid #333;  cursor:pointer; font-size: 2.7vw; }
.fd input[type='checkbox']:checked+label {background: #333;  }
.fd .inputtext{visibility:hidden; font-size: 2.3vw;}
.fd .inputtext.onn{visibility:visible;}
.new_sch_btn01{justify-}
.inputt{}

#form_wrap form input#btn_submit {width: 33.3333vw;height: 12.5000vw;background:#000;border:none;border-radius:0;cursor:pointer;font-size: 4.1667vw;margin:0 auto;padding-left:0;}

.sub_tit {font-size: 5.0000vw;margin-bottom:5.2083vw;}
.sub_div ul {background:#f1f1f1;padding:16.6667vw 0.0000vw;}
.sub_div ul:after {clear:both;}
.sub_div ul li {width: 58.3333vw;height: 58.3333vw;border-radius:50%;background:#fff;padding:10.4167vw 0;font-family: 'NanumSquare', sans-serif;margin:0 2.0833vw 6.2500vw;}
.sub_div ul li .num {font-size: 10.0000vw;line-height:1.3em;}
.sub_div ul li .desc {font-size: 4.5833vw;line-height: 1.5em;}
}

</style>

<div class="sub_w">
	<!-- 탑 배너 -->
	<div class="sub_div div01">
		<!-- <p class="sub_title">제품등록</p> -->
		<p class="sub_title"><img src="/shop/img/ilooda_lo.png" alt=""></p>
		<div class="s_inner">
			<div id="form_wrap" class="form_wrap nanumS">
				<p class="form_desc">
					제품 정품 등록을 하시면 이루다 몰에서 등록된 제품정보, 등록된 <br/ class="hide720">
					제품의 보증 일자 조회 등의 다양한 서비스 혜택을 받으실 수 있습니다.
				</p>
				<!-- <p class="form_desc">
					정품등록을 하시면 구매한 제품에 대한 <br/ class="hide720">
					가이드 영상 및 마케팅 자료를 다운로드 받으실 수 있습니다.
				</p> -->
				<p class="alertmsg">
					보유중인 기기의 제품명을 클릭하시면 시리얼넘버를 입력하실 수 있습니다.
				</p>
				<!-- <p class="alertmsg">
					보유 중인 의료기기의 제품명을 클릭하고 일련번호를 기입해주세요.
				</p> -->
				<form action="/bbs/write_update.php" method="post" class="qe_form clearfix" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" value="genuine" name="bo_table">
					<input type="hidden" id="mb_id" name="mb_id" value="<?php echo $member['mb_id']?>" />
					<input type="hidden" id="wr_name" name="wr_name" value="<?php echo $member['mb_name']?>" />
					<input type="hidden" id="wr_10" name="wr_10" value="1" />
					<input type="hidden" id="wr_subject" name="wr_subject" value="<?php echo $member['mb_id']?> 님의 정품등록신청" />
					<input type="hidden" id="wr_content" name="wr_content" value="정품등록 신청입니다." />
					<?php  
					$sql = "select * from g5_write_genuine where mb_id = '{$member['mb_id']}'";
					$row = sql_fetch($sql);
					if($row){?>
					<input type="hidden" id="wr_id" name="wr_id" value="<?php echo $row['wr_id']?>"/>
					<?php }?>

					<div class="ev_btn">
						<div class="sCore fd">
							<h5><input type="checkbox" name="input1" value="reepot" id="input1" class="inputt"><label for="input1"><span></span> reepot</label>
							<input type="text" name="inputtext1" id="input1" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input2" value="cuRAS hybrid" id="input2" class="inputt"><label for="input2"><span></span> cuRAS hybrid</label>
							<input type="text" name="inputtext2" id="input2" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input3" value="Pento" id="input3" class="inputt"><label for="input3"><span></span> Pento</label>
							<input type="text" name="inputtext3" id="input3" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input4" value="N.core 3D" id="input4" class="inputt"><label for="input4"><span></span> N.core 3D</label>
							<input type="text" name="inputtext4" id="input4" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input5" value="N.core Prime" id="input5" class="inputt"><label for="input5"><span></span> N.core Prime</label>
							<input type="text" name="inputtext5" id="input5" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input6" value="Secret DUO" id="input6" class="inputt"><label for="input6"><span></span> Secret DUO</label>
							<input type="text" name="inputtext6" id="input6" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input7" value="healer 1064" id="input7" class="inputt"><label for="input7"><span></span> healer 1064</label>
							<input type="text" name="inputtext7" id="input7" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input8" value="vikini" id="input8" class="inputt"><label for="input8"><span></span> vikini</label>
							<input type="text" name="inputtext8" id="input8" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input9" value="VELOCE" id="input9" class="inputt"><label for="input9"><span></span> VELOCE</label>
							<input type="text" name="inputtext9" id="input9" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input10" value="CuRAS" id="input10" class="inputt"><label for="input10"><span></span> CuRAS</label>
							<input type="text" name="inputtext10" id="input10" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input11" value="fraxis" id="input11" class="inputt"><label for="input11"><span></span> fraxis</label>
							<input type="text" name="inputtext11" id="input11" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input12" value="fraxis DUO" id="input12" class="inputt"><label for="input12"><span></span> fraxis DUO</label>
							<input type="text" name="inputtext12" id="input12" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input13" value="velux" id="input13" class="inputt"><label for="input13"><span></span> velux</label>
							<input type="text" name="inputtext13" id="input13" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input14" value="secret RF" id="input14" class="inputt"><label for="input14"><span></span> secret RF</label>
							<input type="text" name="inputtext14" id="input14" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input15" value="acutron" id="input15" class="inputt"><label for="input15"><span></span> acutron</label>
							<input type="text" name="inputtext15" id="input15" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input16" value="hyzer me" id="input16" class="inputt"><label for="input16"><span></span> hyzer me</label>
							<input type="text" name="inputtext16" id="input16" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input17" value="ultra beaujet" id="input17" class="inputt"><label for="input17"><span></span> ultra beaujet</label>
							<input type="text" name="inputtext17" id="input17" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input18" value="i-graft" id="input18" class="inputt"><label for="input18"><span></span> i-graft</label>
							<input type="text" name="inputtext18" id="input18" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input19" value="cure.J" id="input19" class="inputt"><label for="input19"><span></span> cure.J</label>
							<input type="text" name="inputtext19" id="input19" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;"></h5>

							<h5><input type="checkbox" name="input20" value="RetiCapture" id="input20" class="inputt"><label for="input20"><span></span> RetiCapture</label>
							<input type="text" name="inputtext20" id="input20" value="" class="inputtext" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;" ></h5>
						</div>

					</div>
					<input type="submit" value="정품등록" id="btn_submit" accesskey="s" class="">
				</form>

<!-- 				<form action="/bbs/write_update.php" method="post" class="qe_form clearfix" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" value="genuine" name="bo_table">
					<input type="hidden" id="mb_id" name="mb_id" value="<?php echo $member['mb_id']?>" />
					<input type="hidden" id="wr_name" name="wr_name" value="<?php echo $member['mb_name']?>" />
					<input type="hidden" id="wr_10" name="wr_10" value="1" />
					<input type="hidden" id="wr_subject" name="wr_subject" value="<?php echo $member['mb_id']?> 님의 정품등록신청" />
					<input type="hidden" id="wr_content" name="wr_content" value="정품등록 신청입니다." />
				
					<div class="product-serial">
						<select name="product_name" id="product_name" class="product-select">
							<option value="reepot">reepot</option>
							<option value="cuRAS hybrid">cuRAS hybrid</option>
							<option value="Pento">Pento</option>
							<option value="N.core 3D">N.core 3D</option>
							<option value="N.core Prime">N.core Prime</option>
							<option value="Secret DUO">Secret DUO</option>
							<option value="healer 1064">healer 1064</option>
							<option value="vikini">vikini</option>
							<option value="VELOCE">VELOCE</option>
							<option value="CuRAS">CuRAS</option>
							<option value="fraxis">fraxis</option>
							<option value="fraxis DUO">fraxis DUO</option>
							<option value="velux">velux</option>
							<option value="secret RF">secret RF</option>
							<option value="acutron">acutron</option>
							<option value="hyzer me">hyzer me</option>
							<option value="ultra beaujet">ultra beaujet</option>
							<option value="i-graft">i-graft</option>
							<option value="cure.J">cure.J</option>
							<option value="RetiCapture">RetiCapture</option>
						</select>
						<input type="text" name="serial_number" id="serial_number" class="serial-input" placeholder="시리얼 넘버를 입력하세요." style="text-transform: uppercase;">
					</div>
				
					<input type="submit" value="정품등록" id="btn_submit" accesskey="s" class="">
				</form>


			</div>
		</div>
	</div>
	
	<div class="sub_div div02">
		<p class="sub_tit">왜 정품 등록을 해야 될까요?</p>
		<ul>
			<li>
				<p class="num">01</p>
				<p class="desc">
					적립금 & 바우처 발급 <br/>
					소모품 및 마케팅 용품 <br/>
					구매 사용
				</p>
			</li>
			<li>
				<p class="num">02</p>
				<p class="desc">
					무상 수리 기간 연장 <br/>
					기존 1년 + 1년 <br/>
					총 2년
				</p>
			</li>
			<li>
				<p class="num">03</p>
				<p class="desc">
					프리미엄 기프트 <br/>
					리팟 구매 고객 전용 <br/>
					4종 SET
				</p>
			</li>
			<li>
				<p class="num">04</p>
				<p class="desc">
					마케팅 컨텐츠 <br/>
					사후케어 및 <br/>
					시술 경과 이미지
				</p>
			</li>
		</ul>
	</div>
</div>

<!-- } content -->


<script>
$(document).ready(function() {
	$("input:checkbox[id=input1]").click(function(){
        $("input:text[id=input1]").toggleClass("onn");
    });
	$("input:checkbox[id=input2]").click(function(){
        $("input:text[id=input2]").toggleClass("onn");
    });
	$("input:checkbox[id=input3]").click(function(){
        $("input:text[id=input3]").toggleClass("onn");
    });
	$("input:checkbox[id=input4]").click(function(){
        $("input:text[id=input4]").toggleClass("onn");
    });
	$("input:checkbox[id=input5]").click(function(){
        $("input:text[id=input5]").toggleClass("onn");
    });
	$("input:checkbox[id=input6]").click(function(){
        $("input:text[id=input6]").toggleClass("onn");
    });
	$("input:checkbox[id=input7]").click(function(){
        $("input:text[id=input7]").toggleClass("onn");
    });
	$("input:checkbox[id=input8]").click(function(){
        $("input:text[id=input8]").toggleClass("onn");
    });
	$("input:checkbox[id=input9]").click(function(){
        $("input:text[id=input9]").toggleClass("onn");
    });
	$("input:checkbox[id=input10]").click(function(){
        $("input:text[id=input10]").toggleClass("onn");
    });
	$("input:checkbox[id=input11]").click(function(){
        $("input:text[id=input11]").toggleClass("onn");
    });
	$("input:checkbox[id=input12]").click(function(){
        $("input:text[id=input12]").toggleClass("onn");
    });
	$("input:checkbox[id=input13]").click(function(){
        $("input:text[id=input13]").toggleClass("onn");
    });
	$("input:checkbox[id=input14]").click(function(){
        $("input:text[id=input14]").toggleClass("onn");
    });
	$("input:checkbox[id=input15]").click(function(){
        $("input:text[id=input15]").toggleClass("onn");
    });
	$("input:checkbox[id=input16]").click(function(){
        $("input:text[id=input16]").toggleClass("onn");
    });
	$("input:checkbox[id=input17]").click(function(){
        $("input:text[id=input17]").toggleClass("onn");
    });
	$("input:checkbox[id=input18]").click(function(){
        $("input:text[id=input18]").toggleClass("onn");
    });
	$("input:checkbox[id=input19]").click(function(){
        $("input:text[id=input19]").toggleClass("onn");
    });
	$("input:checkbox[id=input20]").click(function(){
        $("input:text[id=input20]").toggleClass("onn");
    });

});

function fwrite_submit(f){
	
	if ((f.input1text.value.length==0) && (f.input2text.value.length==0) && (f.input3text.value.length==0) && (f.input4text.value.length==0) && (f.input5text.value.length==0) && (f.input6text.value.length==0) && (f.input7text.value.length==0) && (f.input8text.value.length==0) && (f.input9text.value.length==0) && (f.input10text.value.length==0) && (f.input11text.value.length==0) && (f.input12text.value.length==0) && (f.input13text.value.length==0) && (f.input14text.value.length==0) && (f.input15text.value.length==0) && (f.input16text.value.length==0) && (f.input17text.value.length==0) && (f.input18text.value.length==0) && (f.input19text.value.length==0) && (f.input20text.value.length==0)) 
	{
		alert("시리얼 넘버는 최소 1개 입력하셔야 합니다.");
		//f.input1.focus();
		return false;
	}
	
}

document.addEventListener('DOMContentLoaded', function() {
    var productSelect = document.getElementById('productSelect');
    var serialNumberInput = document.getElementById('serialNumberInput');

    productSelect.addEventListener('change', function() {
        if (this.value) {
            serialNumberInput.removeAttribute('disabled');
        } else {
            serialNumberInput.setAttribute('disabled', 'disabled');
        }
    });
});

</script>


<?php
include_once(G5_PATH.'/tail.php');