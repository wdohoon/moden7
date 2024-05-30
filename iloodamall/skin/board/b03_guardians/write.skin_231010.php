<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<style>
.req { color: #568fee; }
input.frm_input { max-width: 715px; }
input.half_input { width: 49%; max-width: 355px; }
#wr_content { width: 100% !important; max-width: 715px !important; height: 130px !important; resize:none;}
.td_job > span { display: inline-block; padding: 3px 0; }

#priv { position: relative; }
#priv textarea { width: 100%; height:200px; resize: none; border: 1px solid #dfdfdf; padding: 5px; }
#priv > div { margin: 25px 0 50px; text-align: center; }
#priv label { font-size: 15px; color: #888; font-weight: 400; letter-spacing: -0.02em; }


.poll{font-family:'NanumSquareNeo';}	
.poll-top{width: 100%; line-height:143px; text-align:center; background:#c4c4c4; font-size:20px;}
.poll-info{width: 100%; background: #ededed;padding:100px 0px 180px;}
.poll-info .poll_mid{margin:0 auto; max-width:1080px;font-size:20px; line-height:28px;margin-bottom:70px;}
.poll-info .poll_mid .poll-tit{font-size:30px; font-weight:bold; margin-bottom:30px;}
.poll-info .poll_mid .poll-desc{font-size:18px; margin-bottom:100px;} 
.poll-info .poll_mid .input-tit{display:block; margin-top:60px;font-size:24px; font-weight:700;}
.poll-info .poll_mid .input-box{position:relative; background: white; padding:45px; margin-top:20px;}
.poll-info .poll_mid .input-box:nth-child(2)::after{content:'* 표시는 필수 질문입니다.'; position:absolute; right:0; top:-40px; font-size:16px;}

.poll-info .poll_mid .input-box:nth-child(8) .input-tit{margin-top:0; margin-bottom:10px;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box{margin-bottom:50px;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box:last-child{margin-bottom:0px;}
.poll-info .poll_mid .input-box .input-tit{font-size:20px;}
.poll-info .poll_mid .input-box input{background: white; height:65px; line-height:65px; text-indent:20px; width: 100%; border:1px solid black;}
.poll-info .poll_mid .input-box .input-box-top{display:flex; width:100%; flex-wrap:wrap; justify-content:space-between;}
.poll-info .poll_mid .input-box .input-box-top li{width: 48.5%;}
.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-top:45px; margin-bottom:5px;font-size:20px;}
.poll-info .poll_mid .input-box .radio-box{display:flex; flex-wrap:wrap;text-align:left;}
.poll-info .poll_mid .input-box .radio-box li{width: 100%;}
.poll-info .poll_mid .input-box .radio-box label{font-size:18px; font-weight:500; margin:0 10px;}
.poll-info .poll_mid .input-box .radio-box input[type="checkbox"],
.poll-info .poll_mid .input-box .radio-box input[type="radio"]{height: 25px; width: 25px; margin:10px 0;  accent-color:black;}
.poll-info .poll_mid .input-box .radio-box input[type="text"]{height: 40px; width: 300px; border: 1px solid #ebebeb; font-size:16px;}

#container {width:100%;}
.img_wrap {text-align: center;background:#fff;position:relative;width:100%;height:1660px}
/* .img_wrap .img {padding:90px 120px;width:1320px;margin:0 auto;position:absolute;left:50%;top:-100px;transform:translateX(-50%);background:#fff;} */
.img_wrap .img {padding:90px 120px;width:1320px;margin:0 auto;position:absolute;left:50%;top:0px;transform:translateX(-50%);background:#fff;}

.wrapper_inner {width:1320px;margin:0 auto;}
.text_wrap2 .wrapper_inner{text-align: center;}


/* 텍스트 영역 */
.reepot_wrap {padding:130px 0px 160px;}
.reepot_wrap:after {content:"";display:block;clear:both;}
.text_wrap {float:left;width:50%}
.text_wrap .txt_title {font-size: 61px;font-weight: 500;line-height:1.1em;margin-bottom:30px;}
.text_wrap .txt_desc {font-size:30px;font-weight: 400;line-height: 45px;}
.text_wrap .txt_desc:after {content:"";display:block;width:386px;height:2px;background:#262626;margin-top:40px;}
.text_wrap .txt_desc2 {font-size: 24px;font-weight: 500;line-height: 36px; letter-spacing: -0.01em; margin:90px 0;}
.text_wrap .txt_e_title {font-size: 36px;font-weight:700;;line-height:1.1em;margin-top:70px;}
.text_wrap2 {padding:130px 0px 0px;}
.text_wrap2 .wrapper_inner img{width: 444px; height: 58px;}

.txt_section2 {margin-top:40px;}
.txt_section2 .tsec01 {font-size: 24px;font-weight: 700;letter-spacing:-0.025em;margin-bottom:5px;}
.txt_section2 .tsec02 {font-size: 22px;font-weight: 400;letter-spacing:-0.025em;}

.txt_section3 {margin-top:30px;}
.txt_section3 span {background:#262626;border-radius:50px;padding:0 10px;line-height:32px;display:inline-block;color:#fff;font-size: 15px;font-weight: 400;letter-spacing: -0.01em;margin-bottom:5px;margin-right: 5px;}


/**/
.video_wrap {float:right;width:580px;height:378px;}
.video_list {width:580px;height:450px;}
.video_list img {width:100%;height:410px;object-fit:cover;}
.video_text {font-size: 18px;font-weight: 400;line-height:18px;margin-bottom:20px;}

/* 팝업 */
#store_pop {display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); z-index:999;}
.store_pop {position: relative;width:1280px; height:720px; position:fixed; top:50%; left:50%; transform: translate(-50%, -50%);z-index:99;background:#fff;}


@media (max-width:1760px){
.poll{}	
.poll-top{width: 100%; line-height:8.1250vw;  background:#c4c4c4; font-size:1.1364vw;}
.poll-info{width: 100%; background: #ededed;padding:5.6818vw 0.0000vw 10.2273vw;}
.poll-info .poll_mid{margin:0 auto; max-width:61.3636vw;font-size:1.1364vw; line-height:1.5909vw;margin-bottom:3.9773vw;}
.poll-info .poll_mid .poll-tit{font-size:1.7045vw;  margin-bottom:1.7045vw;}
.poll-info .poll_mid .poll-desc{font-size:1.0227vw; margin-bottom:5.6818vw;} 
.poll-info .poll_mid .input-tit{ margin-top:3.4091vw;font-size:1.3636vw; }
.poll-info .poll_mid .input-box{ background: white; padding:2.5568vw; margin-top:1.1364vw;}
.poll-info .poll_mid .input-box:nth-child(2)::after{content:'* 표시는 필수 질문입니다.';  right:0; top:-2.2727vw; font-size:0.9091vw;}

.poll-info .poll_mid .input-box:nth-child(8) .input-tit{margin-top:0; margin-bottom:0.5682vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box{margin-bottom:2.8409vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box:last-child{margin-bottom:0.0000vw;}
.poll-info .poll_mid .input-box .input-tit{font-size:1.1364vw;}
.poll-info .poll_mid .input-box input{background: white; height:3.6932vw; line-height:3.6932vw; text-indent:1.1364vw; width: 100%; border:0.0568vw solid black;}
.poll-info .poll_mid .input-box .input-box-top{ width:100%; flex-wrap:wrap; justify-}
.poll-info .poll_mid .input-box .input-box-top li{width: 48.5%;}
.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-top:2.5568vw; margin-bottom:0.2841vw;font-size:1.1364vw;}
.poll-info .poll_mid .input-box .radio-box{ flex-wrap:wrap;}
.poll-info .poll_mid .input-box .radio-box li{width: 100%;}
.poll-info .poll_mid .input-box .radio-box label{font-size:1.0227vw;  margin:0 0.5682vw;}
.poll-info .poll_mid .input-box .radio-box input[type="checkbox"],
.poll-info .poll_mid .input-box .radio-box input[type="radio"]{height: 1.4205vw; width: 1.4205vw; margin:0.5682vw 0;  accent-}
.poll-info .poll_mid .input-box .radio-box input[type="text"]{height: 2.2727vw; width: 17.0455vw; border: 0.0568vw solid #ebebeb; font-size:0.9091vw;}

#container {width:100%;}
.img_wrap {background:#fff;width:100%;height:94.3182vw}
/* .img_wrap .img {padding:5.1136vw 6.8182vw;width:75.0000vw;margin:0 auto;left:50%;top:-5.6818vw;transform:translateX(-50%);background:#fff;} */
.img_wrap .img {padding:5.1136vw 6.8182vw;width:75.0000vw;margin:0 auto;left:50%;top:0;transform:translateX(-50%);background:#fff;}

.wrapper_inner {width:75.0000vw;margin:0 auto;}

/* 텍스트 영역 */
.reepot_wrap {padding:7.3864vw 0.0000vw 9.0909vw;}
.reepot_wrap:after {clear:both;}
.text_wrap {width:50%}
.text_wrap .txt_title {font-size: 3.4659vw;line-height:1.1em;margin-bottom:1.7045vw;}
.text_wrap .txt_desc {font-size:1.7045vw;line-height: 2.5568vw;}
.text_wrap .txt_desc:after {width:21.9318vw;height:0.1136vw;background:#262626;margin-top:2.2727vw;}
.text_wrap .txt_desc2 {font-size: 1.3636vw;line-height: 2.0455vw; letter-spacing: -0.01em; margin:5.1136vw 0;}
.text_wrap .txt_e_title {font-size: 2.0455vw;;line-height:1.1em;margin-top:3.9773vw;}
.text_wrap2 {padding:7.3864vw 0.0000vw 0.0000vw;}
.text_wrap2 .wrapper_inner img{width: 25.2273vw; height: 3.2955vw;}

.txt_section2 {margin-top:2.2727vw;}
.txt_section2 .tsec01 {font-size: 1.3636vw;letter-spacing:-0.025em;margin-bottom:0.2841vw;}
.txt_section2 .tsec02 {font-size: 1.2500vw;letter-spacing:-0.025em;}

.txt_section3 {margin-top:1.7045vw;}
.txt_section3 span {background:#262626;border-radius:2.8409vw;padding:0 0.5682vw;line-height:1.8182vw;font-size: 0.8523vw;letter-spacing: -0.01em;margin-bottom:0.2841vw;margin-right: 0.2841vw;}


/**/
.video_wrap {width:32.9545vw;height:21.4773vw;}
.video_list {width:32.9545vw;height:25.5682vw;}
.video_list img {width:100%;height:23.2955vw;object-fit:cover;}
.video_text {font-size: 1.0227vw;line-height:1.0227vw;margin-bottom:1.1364vw;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:72.7273vw; height:40.9091vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}
}

@media (max-width:1600px){
.poll{}	
.poll-top{width: 100%; line-height:8.9375vw;  background:#c4c4c4; font-size:1.2500vw;}
.poll-info{width: 100%; background: #ededed;padding:6.2500vw 0.0000vw 11.2500vw;}
.poll-info .poll_mid{margin:0 auto; max-width:67.5000vw;font-size:1.2500vw; line-height:1.7500vw;margin-bottom:4.3750vw;}
.poll-info .poll_mid .poll-tit{font-size:1.8750vw;  margin-bottom:1.8750vw;}
.poll-info .poll_mid .poll-desc{font-size:1.1250vw; margin-bottom:6.2500vw;} 
.poll-info .poll_mid .input-tit{ margin-top:3.7500vw;font-size:1.5000vw; }
.poll-info .poll_mid .input-box{ background: white; padding:2.8125vw; margin-top:1.2500vw;}
.poll-info .poll_mid .input-box:nth-child(2)::after{content:'* 표시는 필수 질문입니다.';  right:0; top:-2.5000vw; font-size:1.0000vw;}

.poll-info .poll_mid .input-box:nth-child(8) .input-tit{margin-top:0; margin-bottom:0.6250vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box{margin-bottom:3.1250vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box:last-child{margin-bottom:0.0000vw;}
.poll-info .poll_mid .input-box .input-tit{font-size:1.2500vw;}
.poll-info .poll_mid .input-box input{background: white; height:4.0625vw; line-height:4.0625vw; text-indent:1.2500vw; width: 100%; border:0.0625vw solid black;}
.poll-info .poll_mid .input-box .input-box-top{ width:100%; flex-wrap:wrap; justify-}
.poll-info .poll_mid .input-box .input-box-top li{width: 48.5%;}
.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-top:2.8125vw; margin-bottom:0.3125vw;font-size:1.2500vw;}
.poll-info .poll_mid .input-box .radio-box{ flex-wrap:wrap;}
.poll-info .poll_mid .input-box .radio-box li{width: 100%;}
.poll-info .poll_mid .input-box .radio-box label{font-size:1.1250vw;  margin:0 0.6250vw;}
.poll-info .poll_mid .input-box .radio-box input[type="checkbox"],
.poll-info .poll_mid .input-box .radio-box input[type="radio"]{height: 1.5625vw; width: 1.5625vw; margin:0.6250vw 0;  accent-}
.poll-info .poll_mid .input-box .radio-box input[type="text"]{height: 2.5000vw; width: 18.7500vw; border: 0.0625vw solid #ebebeb; font-size:1.0000vw;}

#container {width:100%;}
.img_wrap {background:#fff;width:100%;height:103.7500vw}
/* .img_wrap .img {padding:5.6250vw 7.5000vw;width:82.5000vw;margin:0 auto;left:50%;top:-6.2500vw;transform:translateX(-50%);background:#fff;} */
.img_wrap .img {padding:5.6250vw 7.5000vw;width:82.5000vw;margin:0 auto;left:50%;top:0;transform:translateX(-50%);background:#fff;}

.wrapper_inner {width:82.5000vw;margin:0 auto;}

/* 텍스트 영역 */
.reepot_wrap {padding:8.1250vw 0.0000vw 10.0000vw;}
.reepot_wrap:after {clear:both;}
.text_wrap {width:50%}
.text_wrap .txt_title {font-size: 3.8125vw;line-height:1.1em;margin-bottom:1.8750vw;}
.text_wrap .txt_desc {font-size:1.8750vw;line-height: 2.8125vw;}
.text_wrap .txt_desc:after {width:24.1250vw;height:0.1250vw;background:#262626;margin-top:2.5000vw;}
.text_wrap .txt_desc2 {font-size: 1.5000vw;line-height: 2.2500vw; letter-spacing: -0.01em; margin:5.6250vw 0;}
.text_wrap .txt_e_title {font-size: 2.2500vw;;line-height:1.1em;margin-top:4.3750vw;}
.text_wrap2 {padding:8.1250vw 0.0000vw 0.0000vw;}
.text_wrap2 .wrapper_inner img{width: 27.7500vw; height: 3.6250vw;}

.txt_section2 {margin-top:2.5000vw;}
.txt_section2 .tsec01 {font-size: 1.5000vw;letter-spacing:-0.025em;margin-bottom:0.3125vw;}
.txt_section2 .tsec02 {font-size: 1.3750vw;letter-spacing:-0.025em;}

.txt_section3 {margin-top:1.8750vw;}
.txt_section3 span {background:#262626;border-radius:3.1250vw;padding:0 0.6250vw;line-height:2.0000vw;font-size: 0.9375vw;letter-spacing: -0.01em;margin-bottom:0.3125vw;margin-right: 0.3125vw;}


/**/
.video_wrap {width:36.2500vw;height:23.6250vw;}
.video_list {width:36.2500vw;height:28.1250vw;}
.video_list img {width:100%;height:25.6250vw;object-fit:cover;}
.video_text {font-size: 1.1250vw;line-height:1.1250vw;margin-bottom:1.2500vw;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:80.0000vw; height:45.0000vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

}

@media (max-width:1400px){
.poll{}	
.poll-top{width: 100%; line-height:10.2143vw;  background:#c4c4c4; font-size:1.4286vw;}
.poll-info{width: 100%; background: #ededed;padding:7.1429vw 0.0000vw 12.8571vw;}
.poll-info .poll_mid{margin:0 auto; max-width:77.1429vw;font-size:1.4286vw; line-height:2.0000vw;margin-bottom:5.0000vw;}
.poll-info .poll_mid .poll-tit{font-size:2.1429vw;  margin-bottom:2.1429vw;}
.poll-info .poll_mid .poll-desc{font-size:1.2857vw; margin-bottom:7.1429vw;} 
.poll-info .poll_mid .input-tit{ margin-top:4.2857vw;font-size:1.7143vw; }
.poll-info .poll_mid .input-box{ background: white; padding:3.2143vw; margin-top:1.4286vw;}
.poll-info .poll_mid .input-box:nth-child(2)::after{content:'* 표시는 필수 질문입니다.';  right:0; top:-2.8571vw; font-size:1.1429vw;}

.poll-info .poll_mid .input-box:nth-child(8) .input-tit{margin-top:0; margin-bottom:0.7143vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box{margin-bottom:3.5714vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box:last-child{margin-bottom:0.0000vw;}
.poll-info .poll_mid .input-box .input-tit{font-size:1.4286vw;}
.poll-info .poll_mid .input-box input{background: white; height:4.6429vw; line-height:4.6429vw; text-indent:1.4286vw; width: 100%; border:0.0714vw solid black;}
.poll-info .poll_mid .input-box .input-box-top{ width:100%; flex-wrap:wrap; justify-}
.poll-info .poll_mid .input-box .input-box-top li{width: 48.5%;}
.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-top:3.2143vw; margin-bottom:0.3571vw;font-size:1.4286vw;}
.poll-info .poll_mid .input-box .radio-box{ flex-wrap:wrap;}
.poll-info .poll_mid .input-box .radio-box li{width: 100%;}
.poll-info .poll_mid .input-box .radio-box label{font-size:1.2857vw;  margin:0 0.7143vw;}
.poll-info .poll_mid .input-box .radio-box input[type="checkbox"],
.poll-info .poll_mid .input-box .radio-box input[type="radio"]{height: 1.7857vw; width: 1.7857vw; margin:0.7143vw 0;  accent-}
.poll-info .poll_mid .input-box .radio-box input[type="text"]{height: 2.8571vw; width: 21.4286vw; border: 0.0714vw solid #ebebeb; font-size:1.1429vw;}

#container {width:100%;}
.img_wrap {background:#fff;width:100%;height:118.5714vw}
/* .img_wrap .img {padding:6.4286vw 8.5714vw;width:94.2857vw;margin:0 auto;left:50%;top:-7.1429vw;transform:translateX(-50%);background:#fff;} */
.img_wrap .img {padding:6.4286vw 8.5714vw;width:94.2857vw;margin:0 auto;left:50%;top:0;transform:translateX(-50%);background:#fff;}

.wrapper_inner {width:94.2857vw;margin:0 auto;}

/* 텍스트 영역 */
.reepot_wrap {padding:9.2857vw 0.0000vw 11.4286vw;}
.reepot_wrap:after {clear:both;}
.text_wrap {width:50%}
.text_wrap .txt_title {font-size: 4.3571vw;line-height:1.1em;margin-bottom:4.2857vw;}
.text_wrap .txt_desc {font-size:1.3750vw;line-height: 3.0000vw;}
.text_wrap .txt_desc2 {font-size: 1.7143vw;line-height: 2.5714vw; letter-spacing: -0.01em; margin:6.4286vw 0;}
.text_wrap .txt_e_title {font-size: 2.5714vw;;line-height:1.1em;margin-top:5.0000vw;}
.text_wrap2 {padding:9.2857vw 0.0000vw 0.0000vw;}
.text_wrap2 .wrapper_inner img{width: 31.7143vw; height: 4.1429vw;}


/**/
.video_wrap {width:41.4286vw;height:27.0000vw;}
.video_list {width:41.4286vw;height:27.0000vw;}
.video_list img {width:100%;height:100%;object-fit:cover;}
.video_text {font-size: 1.2857vw;line-height:1.2857vw;margin-bottom:1.4286vw;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:91.4286vw; height:51.4286vw;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

}

@media (max-width:1024px){
.poll{}	
.poll-top{width: 100%; line-height:13.9648vw;  background:#c4c4c4; font-size:1.9531vw;}
.poll-info{width: 100%; background: #ededed;padding:9.7656vw 3.9063vw 14.6484vw;}
.poll-info .poll_mid{margin:0 auto; max-width:105.4688vw;font-size:1.9531vw; line-height:2.7344vw;margin-bottom:6.8359vw;}
.poll-info .poll_mid .poll-tit{font-size:2.9297vw;  margin-bottom:2.9297vw;}
.poll-info .poll_mid .poll-desc{font-size:1.7578vw; margin-bottom:9.7656vw;} 
.poll-info .poll_mid .input-tit{ margin-top:5.8594vw;font-size:2.3438vw; }
.poll-info .poll_mid .input-box{ background: white; padding:4.3945vw; margin-top:1.9531vw;}
.poll-info .poll_mid .input-box:nth-child(2)::after{content:'* 표시는 필수 질문입니다.';  right:0; top:-3.9063vw; font-size:1.5625vw;}

.poll-info .poll_mid .input-box:nth-child(8) .input-tit{margin-top:0; margin-bottom:0.9766vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box{margin-bottom:4.8828vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box:last-child{margin-bottom:0.0000vw;}
.poll-info .poll_mid .input-box .input-tit{font-size:1.9531vw;}
.poll-info .poll_mid .input-box input{background: white; height:6.3477vw; line-height:6.3477vw; text-indent:1.9531vw; width: 100%; border:0.0977vw solid black;}
.poll-info .poll_mid .input-box .input-box-top{ width:100%; flex-wrap:wrap; justify-}
.poll-info .poll_mid .input-box .input-box-top li{width: 48.5%;}
.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-top:4.3945vw; margin-bottom:0.4883vw;font-size:1.9531vw;}
.poll-info .poll_mid .input-box .radio-box{ flex-wrap:wrap;}
.poll-info .poll_mid .input-box .radio-box li{width: 100%;}
.poll-info .poll_mid .input-box .radio-box label{font-size:1.7578vw;  margin:0 0.9766vw;}
.poll-info .poll_mid .input-box .radio-box input[type="checkbox"],
.poll-info .poll_mid .input-box .radio-box input[type="radio"]{height: 2.4414vw; width: 2.4414vw; margin:0.9766vw 0;  accent-}
.poll-info .poll_mid .input-box .radio-box input[type="text"]{height: 3.9063vw; width: 29.2969vw; border: 0.0977vw solid #ebebeb; font-size:1.5625vw;}

#container {width:100%;}
.img_wrap {background:#fff;width:100%;height:105.4688vw}
/* .img_wrap .img {padding:8.7891vw 11.7188vw;width:90%;margin:0 auto;left:50%;top:-9.7656vw;transform:translateX(-50%);background:#fff;} */
.img_wrap .img {padding:8.7891vw 11.7188vw;width:90%;margin:0 auto;left:50%;top:0;transform:translateX(-50%);background:#fff;}

.wrapper_inner {width:100%;margin:0 auto;padding:0 3.9063vw;}

/* 텍스트 영역 */
.reepot_wrap {padding:12.6953vw 0.0000vw 15.6250vw;text-align: center;}
.reepot_wrap:after {clear:both;}
.text_wrap {width:100%;float:none;margin-bottom:4.8828vw;}
.text_wrap .txt_title {font-size: 5.9570vw;line-height:1.1em;margin-bottom:2.9297vw;}
.text_wrap .txt_desc {font-size:2.9297vw;line-height: 4.3945vw;}
.text_wrap .txt_desc:after {width:37.6953vw;height:0.1953vw;background:#262626;margin:0 auto;margin-top:3.9063vw;}
.text_wrap .txt_desc2 {font-size: 2.3438vw;line-height: 3.5156vw; letter-spacing: -0.01em; margin:8.7891vw 0;}
.text_wrap .txt_e_title {font-size: 3.5156vw;;line-height:1.1em;margin-top:6.8359vw;}
.text_wrap2 {padding:12.6953vw 0.0000vw 0.0000vw;}
.text_wrap2 .wrapper_inner img{width: 43.3594vw; height: 5.6641vw;}

.txt_section2 {margin-top:3.9063vw;}
.txt_section2 .tsec01 {font-size: 2.3438vw;letter-spacing:-0.025em;margin-bottom:0.4883vw;}
.txt_section2 .tsec02 {font-size: 2.1484vw;letter-spacing:-0.025em;}

.txt_section3 {margin-top:2.9297vw;}
.txt_section3 span {background:#262626;border-radius:4.8828vw;padding:0 0.9766vw;line-height:3.1250vw;font-size: 1.4648vw;letter-spacing: -0.01em;margin-bottom:0.4883vw;margin-right: 0.4883vw;}


/**/
.video_wrap {width:100%;height:auto;float:none;}
.video_list {width:56.6406vw;height:auto;margin:0 auto;}
.video_list img {width:100%;height:100%;object-fit:cover;}
.video_text {font-size: 1.7578vw;line-height:1.7578vw;margin-bottom:1.9531vw;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:95%; height:auto;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}

}

@media (max-width:768px){
.poll{}	
.poll-top{width: 100%; line-height:18.6198vw;  background:#c4c4c4; font-size:2.6042vw;}
.poll-info{width: 100%; background: #ededed;padding:5.2083vw 5.2083vw 10.4167vw;}
.poll-info .poll_mid{margin:0 auto; max-width:140.6250vw;font-size:2.6042vw; line-height:3.6458vw;margin-bottom:9.1146vw;}
.poll-info .poll_mid .poll-tit{font-size:3.9063vw;  margin-bottom:3.9063vw;}
.poll-info .poll_mid .poll-desc{font-size:2.3438vw; margin-bottom:13.0208vw;} 
.poll-info .poll_mid .input-tit{ margin-top:7.8125vw;font-size:3.1250vw; }
.poll-info .poll_mid .input-box{ background: white; padding:2.6042vw; margin-top:2.6042vw;}
.poll-info .poll_mid .input-box:nth-child(2)::after{content:'* 표시는 필수 질문입니다.';  right:0; top:-5.2083vw; font-size:2.0833vw;}

.poll-info .poll_mid .input-box:nth-child(8) .input-tit{margin-top:0; margin-bottom:1.3021vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box{margin-bottom:6.5104vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box:last-child{margin-bottom:0.0000vw;}
.poll-info .poll_mid .input-box .input-tit{font-size:2.6042vw;}
.poll-info .poll_mid .input-box input{background: white; height:8.4635vw; line-height:8.4635vw; text-indent:2.6042vw; width: 100%; border:0.1302vw solid black;}
.poll-info .poll_mid .input-box .input-box-top{ width:100%; flex-wrap:wrap; justify-}
.poll-info .poll_mid .input-box .input-box-top li{width: 48.5%;}
.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-top:5.8594vw; margin-bottom:0.6510vw;font-size:2.6042vw;}
.poll-info .poll_mid .input-box .radio-box{ flex-wrap:wrap;}
.poll-info .poll_mid .input-box .radio-box li{width: 100%;}
.poll-info .poll_mid .input-box .radio-box label{font-size:2.3438vw;  margin:0 1.3021vw;}
.poll-info .poll_mid .input-box .radio-box input[type="checkbox"],
.poll-info .poll_mid .input-box .radio-box input[type="radio"]{height: 3.2552vw; width: 3.2552vw; margin:1.3021vw 0;  accent-}
.poll-info .poll_mid .input-box .radio-box input[type="text"]{height: 5.2083vw; width: 39.0625vw; border: 0.1302vw solid #ebebeb; font-size:2.0833vw;}

#container {width:100%;}
.img_wrap {background:#fff;width:100%;height:111.9792vw}
/* .img_wrap .img {padding:7.8125vw 7.8125vw;width:90%;margin:0 auto;left:50%;top:-13.0208vw;transform:translateX(-50%);background:#fff;} */
.img_wrap .img {padding:7.8125vw 7.8125vw;width:90%;margin:0 auto;left:50%;top:0;transform:translateX(-50%);background:#fff;}

.wrapper_inner {width:100%;margin:0 auto;padding:0 5.2083vw;}

/* 텍스트 영역 */
.reepot_wrap {padding:16.9271vw 0.0000vw 20.8333vw;}
.reepot_wrap:after {clear:both;}
.text_wrap {width:100%;margin-bottom:6.5104vw;}
.text_wrap .txt_title {font-size: 7.9427vw;line-height:1.1em;margin-bottom:3.9063vw;}
.text_wrap .txt_desc {font-size:3.9063vw;line-height: 5.8594vw;}
.text_wrap .txt_desc:after {width:50.2604vw;height:0.2604vw;background:#262626;margin-top:5.2083vw;}
.text_wrap .txt_desc2 {font-size: 3.1250vw;line-height: 4.6875vw; letter-spacing: -0.01em; margin:11.7188vw 0;}
.text_wrap .txt_e_title {font-size: 4.6875vw;;line-height:1.1em;margin-top:9.1146vw;}
.text_wrap2 {padding:16.9271vw 0.0000vw 0.0000vw;}
.text_wrap2 .wrapper_inner img{width: 57.8125vw; height: 7.5521vw;}

.txt_section2 {margin-top:5.2083vw;}
.txt_section2 .tsec01 {font-size: 3.1250vw;letter-spacing:-0.025em;margin-bottom:0.6510vw;}
.txt_section2 .tsec02 {font-size: 2.8646vw;letter-spacing:-0.025em;}

.txt_section3 {margin-top:3.9063vw;}
.txt_section3 span {background:#262626;border-radius:6.5104vw;padding:0 1.3021vw;line-height:4.1667vw;font-size: 1.9531vw;letter-spacing: -0.01em;margin-bottom:0.6510vw;margin-right: 0.6510vw;}


/**/
.video_wrap {width:100%;height:auto;}
.video_list {width:75.5208vw;height:auto;margin:0 auto;}
.video_list img {width:100%;height:100%;object-fit:cover;}
.video_text {font-size: 2.3438vw;line-height:2.3438vw;margin-bottom:2.6042vw;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:95%; height:auto;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}
}

@media (max-width:480px){
.poll{}	
.poll-top{width: 100%; line-height:29.7917vw;  background:#c4c4c4; font-size:4.1667vw;}
.poll-info{width: 100%; background: #ededed;padding:8.3333vw 8.3333vw 16.6667vw;}
.poll-info .poll_mid{margin:0 auto; max-width:225.0000vw;font-size:4.1667vw; line-height:5.8333vw;margin-bottom:14.5833vw;}
.poll-info .poll_mid .poll-tit{font-size:6.2500vw;  margin-bottom:6.2500vw;}
.poll-info .poll_mid .poll-desc{font-size:3.7500vw; margin-bottom:20.8333vw;} 
.poll-info .poll_mid .input-tit{ margin-top:12.5000vw;font-size:4.1667vw; }
.poll-info .poll_mid .input-box{ background: white; padding:4.1667vw; margin-top:4.1667vw;}
.poll-info .poll_mid .input-box:nth-child(2)::after{content:'* 표시는 필수 질문입니다.';  right:0; top:-8.3333vw; font-size:3.3333vw;}

.poll-info .poll_mid .input-box:nth-child(8) .input-tit{margin-top:0; margin-bottom:2.0833vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box{margin-bottom:10.4167vw;}
.poll-info .poll_mid .input-box:nth-child(8) .radio-box:last-child{margin-bottom:0.0000vw;}
.poll-info .poll_mid .input-box .input-tit{font-size:4.1667vw;}
.poll-info .poll_mid .input-box input{background: white; height:13.5417vw; line-height:13.5417vw; text-indent:4.1667vw; width: 100%; border:0.2083vw solid black;}
.poll-info .poll_mid .input-box .input-box-top{ width:100%; flex-wrap:wrap; justify-}
.poll-info .poll_mid .input-box .input-box-top li{width:100%;}
.poll-info .poll_mid .input-box .input-box-top li:nth-child(1) {margin-bottom: 3.1250vw;}
.poll-info .poll_mid .input-box .input-box-top li .input-tit{margin-top:9.3750vw; margin-bottom:1.0417vw;font-size:4.1667vw;}
.poll-info .poll_mid .input-box .radio-box{ flex-wrap:wrap;}
.poll-info .poll_mid .input-box .radio-box li{width: 100%;}
.poll-info .poll_mid .input-box .radio-box label{font-size:3.3333vw;  margin:0 2.0833vw;}
.poll-info .poll_mid .input-box .radio-box input[type="checkbox"],
.poll-info .poll_mid .input-box .radio-box input[type="radio"]{height: 5.2083vw; width: 5.2083vw; margin:2.0833vw 0;  accent-}
.poll-info .poll_mid .input-box .radio-box input[type="text"]{height: 8.3333vw; width: 62.5000vw; border: 0.2083vw solid #ebebeb; font-size:3.3333vw;}

#container {width:100%;}
.img_wrap {background:#fff;width:100%;height:116.6667vw}
/* .img_wrap .img {padding:6.2500vw 6.2500vw;width:90%;margin:0 auto;left:50%;top:-12.5000vw;transform:translateX(-50%);background:#fff;} */
.img_wrap .img {padding:6.2500vw 6.2500vw;width:90%;margin:0 auto;left:50%;top:0;transform:translateX(-50%);background:#fff;}

.wrapper_inner {width:100%;margin:0 auto;padding:0 4.1667vw;}

/* 텍스트 영역 */
.reepot_wrap {padding:27.0833vw 0.0000vw 33.3333vw;}
.reepot_wrap:after {clear:both;}
.text_wrap {width:100%;margin-bottom:10.4167vw;}
.text_wrap .txt_title {font-size: 12.7083vw;line-height:1.1em;margin-bottom:6.2500vw;}
.text_wrap .txt_desc {font-size:6.2500vw;line-height: 9.3750vw;}
.text_wrap .txt_desc:after {width:80.4167vw;height:0.4167vw;background:#262626;margin-top:8.3333vw;}
.text_wrap .txt_desc2 {font-size: 5.0000vw;line-height: 7.5000vw; letter-spacing: -0.01em; margin:18.7500vw 0;}
.text_wrap .txt_e_title {font-size: 7.5000vw;;line-height:1.1em;margin-top:14.5833vw;}
.text_wrap2 {padding:27.0833vw 0.0000vw 0.0000vw;}
.text_wrap2 .wrapper_inner img{width: 92.5000vw; height: 12.0833vw;}

.txt_section2 {margin-top:8.3333vw;}
.txt_section2 .tsec01 {font-size: 5.0000vw;letter-spacing:-0.025em;margin-bottom:1.0417vw;}
.txt_section2 .tsec02 {font-size: 4.5833vw;letter-spacing:-0.025em;}

.txt_section3 {margin-top:6.2500vw;}
.txt_section3 span {background:#262626;border-radius:10.4167vw;padding:0 2.0833vw;line-height:6.6667vw;font-size: 3.1250vw;letter-spacing: -0.01em;margin-bottom:1.0417vw;margin-right: 1.0417vw;}


/**/
.video_wrap {width:100%;height:auto;}
.video_list {width:120.8333vw;height:auto;margin:0 auto;}
.video_list img {width:100%;height:100%;object-fit:cover;}
.video_text {font-size: 3.7500vw;line-height:3.7500vw;margin-bottom:4.1667vw;}

/* 팝업 */
#store_pop {  top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.3); }
.store_pop {width:95%; height:auto;  top:50%; left:50%; transform: translate(-50%, -50%);background:#fff;}
}


@media (max-width: 800px) {
	#priv textarea { height: 100px; }
	#priv > div { margin: 15px 0 30px; }
	#priv label { font-size: 13px; }
}

</style>
<?php
$option1 = explode(",", $write['wr_1']); //옵션1

//$sql = " select * from g5_write_guardians_adm order by wr_id desc";
$sql = " select * from g5_board where bo_table = 'guardians_adm' ";
$result = sql_query($sql);
$total = sql_num_rows($result);
$row = sql_fetch_array($result);
?>

<div class="text_wrap2">
	<div class="wrapper_inner">
		<img src="/images/reepotbanner.png" alt="">
	</div>
</div>

<div class="reepot_wrap">
	<div class="wrapper_inner">
	<div class="text_wrap">
		<p class="txt_title spoqa">리팟 가디언즈란?</p>
		<p class="txt_desc spoqa">
			백자레이저 리팟에 대한 모든 궁금증을 해결하는 시간 <br/>
			리팟 개발배경부터 시술 시연까지!
		</p>
		<div class="txt_section2 spoqa">
			<p class="tsec01">리팟 시술 총 5,000 케이스</p>
			<p class="tsec02">가디언 원장님들의 다양한 시술 노하우와 시술 경과 데이터들을 공개합니다.</p>
		</div>
		<div class="txt_section3 spoqa">
			<span>#개발과정</span>
			<span>#시술시연</span>
			<span>#ROI</span><br/>
			<span>#마케팅전략</span>
			<span>#시술노하우</span>
			<span>#시술레퍼런스</span><br/>
		</div>
		<!-- <p class="txt_e_title roboto">Your All in One Total Solution</p> -->

	</div>

	<div class="video_wrap">
		<div class="video_list on">
			<p class="video_text">가디언즈 미리보기</p>
			<a href="javascript:;" onclick="view_pp('num1');">
				<img src="/images/video_thumb_cm.png" alt="">
			</a><!-- 이미지 -->
		</div>
		

		<!-- 유튜브 팝업 -->
		<div id="store_pop">
			
		</div>
	</div>
	</div>
</div>
<script>
function view_pp(id) {
	$('.gnb_wrap').addClass('off');
	$.ajax({
		url : "/ajax_video.php",
		type: "POST",
		data : {
			"wrid" : id,
		},
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
	}
});

// 메뉴 팝업 닫기
$('.store_pop_close a').on('click', function(){
	$("#store_pop").hide();
	$('.gnb_wrap').removeClass('off');
});

</script>

<div class="img_wrap">
	<?php
		$sql2 = sql_fetch(" select * from g5_board_file where bo_table = 'guardians_adm' limit 0,1");
	?>
	<div class="img">
		<img src="/data/file/guardians_adm/<?php echo $sql2['bf_file'];?>" alt="">
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
    <input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
    <input type="hidden" name="wr_subject" value="가디언즈 신청이 완료되었습니다.">
    <input type="hidden" name="wr_content" value="가디언즈 신청이 완료되었습니다.">
    <input type="hidden" name="wr_6" value="<?php echo $row['bo_6']?>">
    <input type="hidden" name="wr_10" value="1">
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

	<div class="poll">

		<div class="poll-info">
			<div class="poll_mid">
				<span class="input-tit">9월 가디언즈 프로그램 참여 날짜를 선택해 주세요 *</span>
				<div class="input-box">
					<ul class="radio-box">
						
						<li>
							<input type="checkbox" name="option1[0]" id="option1[0]" value="<?php echo $row['bo_1_subj']?>"> 
							<label for="option1[0]"><?php echo $row['bo_1_subj']?> / <?php echo $row['bo_1']?> / <?php echo $row['bo_1_2']?> / <?php echo $row['bo_1_3']?></label>
						</li>
						<li>
							<input type="checkbox" name="option1[1]" id="option1[1]" value="<?php echo $row['bo_2_subj']?>"> 
							<label for="option1[1]"><?php echo $row['bo_2_subj']?> / <?php echo $row['bo_2']?> / <?php echo $row['bo_2_2']?> / <?php echo $row['bo_2_3']?></label>
						</li>
						<li>
							<input type="checkbox" name="option1[2]" id="option1[2]" value="<?php echo $row['bo_3_subj']?>"> 
							<label for="option1[2]"><?php echo $row['bo_3_subj']?> / <?php echo $row['bo_3']?> / <?php echo $row['bo_3_2']?> / <?php echo $row['bo_3_3']?></label>
						</li>
						<li>
							<input type="checkbox" name="option1[3]" id="option1[3]" value="<?php echo $row['bo_4_subj']?>"> 
							<label for="option1[3]"><?php echo $row['bo_4_subj']?> / <?php echo $row['bo_4']?> / <?php echo $row['bo_4_2']?> / <?php echo $row['bo_4_3']?></label>
						</li>
						<li>
							<input type="checkbox" name="option1[4]" id="option1[4]" value="<?php echo $row['bo_5_subj']?>"> 
							<label for="option1[4]"><?php echo $row['bo_5_subj']?> / <?php echo $row['bo_5']?> / <?php echo $row['bo_5_2']?> / <?php echo $row['bo_5_3']?></label>
						</li>
					</ul>
				</div>

				<span class="input-tit">도시락 및 기념품 신청 여부 *</span>
				<div class="input-box">
					<ul class="radio-box">
						<li>
							<input type="checkbox" name="wr_19" id="wr_19" value="신청">
							<label for="wr_19">도시락 신청</label>
						</li>
						<li>
							<input type="checkbox" name="wr_20" id="wr_20" value="신청">
							<label for="wr_20">가디언즈 기념품 신청</label>
						</li>
					</ul>
				</div>

				<span class="input-tit">휴대폰번호와 소속을 입력해 주세요 *</span>
				<div class="input-box">
					<ul class="input-box-top">
						<li>
							<input type="text" name="wr_2" id="wr_2" required size="10" placeholder="010-0000-0000">
						</li>
						<li>
							<input type="text" name="wr_3" id="wr_3" required size="10" placeholder="병원명을 입력해주세요">
						</li>
					</ul>
				</div>

				<span class="input-tit">이름 *</span>
				<div class="input-box">
					<input type="text" name="wr_name" id="wr_name"<?php echo $required ?> value="<?php if($is_member){ echo $member['mb_name']; } ?>" size="10" placeholder="홍길동">
				</div>
				
				<span class="input-tit">이메일 *</span>
				<div class="input-box">
					<input type="text" name="wr_email" id="wr_email"<?php echo $required ?> value="<?php echo $email ?>" size="10" placeholder="eggene0003@naver.com">
				</div>
				
				<span class="input-tit">리팟에 대한 궁금한 점이 있나요?</span>
				<div class="input-box">
					<input type="text" name="wr_4" id="wr_4" value="<?php echo $write['wr_4'] ?>" size="10" placeholder="지금 질문해주세요">
				</div>

				<span class="input-tit">리팟 가디언즈 프로그램에 대한 기타 의견이 있으시면 알려주세요!</span>
				<div class="input-box">
					<input type="text" name="wr_5" id="wr_5" value="<?php echo $write['wr_5'] ?>" size="10" placeholder="기타의견을 입력해주세요">
				</div>
				
			</div>

			<div class="write_btn_div">
				<?php if($is_admin) { ?>
				<!-- <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel btn">목록보기</a> -->
				<?php } ?>
				<input type="submit" value="신청하기" id="btn_submit" accesskey="s" class="btn_submit btn">
			</div>
		</div>
	</div>

    
    </form>

	<script>
	$(function() {
		$("input[name=wr_8], input[name=wr_9]").keyup(function(){
			var val= $(this).val();
			if(val != "") {
				if(val.replace(/[0-9\-]/g, "").length > 0) {
					alert("연락처는 숫자나 하이픈(-)만 입력해 주십시오.");
					$(this).val("");
				}
			}
		});
	});
	</script>
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
		if (!f.agree.checked) {
            alert("개인정보 수집 안내에 동의해주세요.");
            f.agree.focus();
            return false;
        }

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
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->