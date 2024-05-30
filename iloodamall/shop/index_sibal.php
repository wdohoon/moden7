<?php
include_once('./_common.php');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/index.php');
    return;
}

define("_INDEX_", TRUE);

$chk = '0';
include_once(G5_SHOP_PATH.'/shop.head.php');
?>
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<style>
#wrapper {background: #fff;}
#container {width:100%;max-width:1920px;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100%;margin:0 auto 60px;}
.main_wrap .inner {width:1600px;margin:0 auto;}
.main_wrap .main_box_wrap {position:relative;width:100%;}


/* mc01 */
.content_wrap {position:relative;margin-bottom: 150px;}
.content_wrap .inner {width:1600px;margin:0 auto;}
.content_wrap .inner .content_wrap_tit {font-size: 45px;font-weight:400;width:100%;margin:0 auto 80px;}
.content_wrap .inner .content_wrap_box {width:100%;max-width:1920px;margin:0 auto;overflow:hidden;padding-left:60px;padding-right:60px;}
.content_wrap .inner .content_wrap_box .swiper-container {position:relative;}
.content_wrap .inner .content_wrap_box .swiper-container .swiper-wrapper .swiper-slide {width:400px;}
.content_wrap .inner .content_wrap_box .swiper-container.brand-container .swiper-wrapper .swiper-slide {width:400px;margin-right:40px;}

/* swiper */
.content_wrap .swiper_btn_wrap {width:100%;max-width:1760px;background:pink;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);z-index:99;}
.content_wrap .swiper_btn_wrap .swiper-button-next,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-prev {width:60px;height:60px;right:0;}
.content_wrap .swiper_btn_wrap .swiper-button-prev,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-next {width:60px;height:60px;left:0;}
.content_wrap .swiper-button-next:after,.content_wrap .swiper-rtl .swiper-button-prev:after {content:'';}
.content_wrap .swiper-button-prev:after,.content_wrap .swiper-rtl .swiper-button-next:after {content: '';}

/* brand */
.txt_div {position:relative;height:100px;}
.txt_div .naming_img {margin-top:50px;margin-bottom: 40px;}
.txt_div h1 {font-size: 20px;line-height: 20px;margin-bottom: 15px}
.txt_div p {font-size: 16px;line-height: 24px;}
.txt_div a.detail {position:absolute;right:0;bottom:0;font-size: 16px;}

/* 아코디언 */
.main_box_wrap ul.ac {width:100%;height:670px;margin:0px auto;}
.main_box_wrap ul.ac:after {content:"";display:block;clear:both;}

.main_box_wrap ul.ac li.slide_box:nth-child(odd) {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box:nth-child(even) {background:#d5dbe7;}

.main_box_wrap ul.ac li.slide_box {float:left;width:270px;height:100%;transition:0.8s;background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom01 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom01.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02.color {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom04 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.on {width: 790px;display: block;}

.main_box_wrap ul.ac li.slide_box.nom01.on {background:url('/images/main_img001.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom02.on {background:url('/images/main_img002.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom03.on {background:url('/images/main_img003.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom04.on {background:url('/images/main_img004.png')no-repeat center / cover;}

.main_box_wrap ul.ac li.slide_box .text_div {display: block;position:relative;width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .text_div.on {display: none;}

.main_box_wrap ul.ac li.slide_box .img_div {display: none;position:relative;width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .img_div.on {display: block;}

/* 아코디언 닫혔을 때 */
.txt_wrapper {padding:0 28px;position:absolute;left:0px;top:350px;}
.txt_wrapper img {width: 211px;margin-bottom:15px;display:block;}
.txt_wrapper p.ilooda_title {padding:0 20px;background:#000;color:#fff;border-radius:50px;display:inline-block;line-height:25px;margin-bottom:28px;font-size:14px;font-weight:500;}
.txt_wrapper p.ilooda_desc {font-size: 15px;line-height:24px;letter-spacing:-0.05em;font-weight:400;}

.btnbtn {position:absolute;left:30px;bottom:30px;}
.btnbtn img {width: 40px;height: 40px;}

/* 아코디언 열렸을 때 */
.txt_boxer {text-align: right;position:absolute;right:50px;bottom:30px;display: none;}
.main_box_wrap ul.ac li.slide_box .img_div.on .txt_boxer {display: block;}
.txt_boxer .img_title {font-size: 18px;font-weight: 500;margin-bottom: 20px;}
.txt_boxer .main_title {font-size: 60px;font-weight: 400;line-height:72px;letter-spacing:-0.02em;}
.txt_boxer .submit_btn {font-size: 16px;background:#e78983;color:#fff;padding:0 30px;line-height:44px;display:inline-block;margin-top:70px;}

@media (max-width: 1760px)  {
#wrapper {background: #fff;}
#container {width:100%;max-width:109.0909vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100.0000vw;margin:0 auto 8.5227vw;padding:0 1.1364vw;}
.main_wrap .inner {}

.main_wrap .inner {width: 100%;}

/* mc01 */
.content_wrap {position:relative;margin-bottom: 8.5227vw;padding:0 2.2727vw;}
.content_wrap .inner .content_wrap_tit {font-size: 2.5568vw;font-weight:400;width:100.0000vw;margin:0 auto 4.5455vw;}
.content_wrap .inner .content_wrap_box {width:100%;max-width:100%;;margin:0 auto;overflow:hidden;padding-left:0;padding-right:0;}
.content_wrap .inner .content_wrap_box .swiper-container {position:relative;}
.content_wrap .inner .content_wrap_box .swiper-container .swiper-wrapper .swiper-slide {width:22.7273vw;}
.content_wrap .inner .content_wrap_box .swiper-container.brand-container .swiper-wrapper .swiper-slide {width:22.7273vw;margin-right:2.2727vw;}

/* swiper */
.content_wrap .swiper_btn_wrap {width:100%;max-width:100%;background:pink;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);z-index:99;}
.content_wrap .swiper_btn_wrap .swiper-button-next,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-prev {width:3.4091vw;height:3.4091vw;right:0;}
.content_wrap .swiper_btn_wrap .swiper-button-prev,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-next {width:3.4091vw;height:3.4091vw;left:0;}

/* brand */
.txt_div {height:5.6818vw;}
.txt_div .naming_img {margin-top:2.8409vw;margin-bottom: 2.2727vw;}
.txt_div h1 {font-size: 1.1364vw;line-height: 1.1364vw;margin-bottom: 0.8523vw}
.txt_div p {font-size: 0.9091vw;line-height: 1.3636vw;}
.txt_div a.detail {right:0;bottom:0;font-size: 0.9091vw;}

/* 아코디언 */
.main_box_wrap ul.ac {width:100%;height:38.0682vw;margin:0.0000vw auto;}
.main_box_wrap ul.ac:after {clear:both;}

.main_box_wrap ul.ac li.slide_box:nth-child(odd) {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box:nth-child(even) {background:#d5dbe7;}

.main_box_wrap ul.ac li.slide_box {width:20%;height:100%;transition:0.8s;background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom01 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom01.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02.color {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom04 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.on {width: 40%;}

.main_box_wrap ul.ac li.slide_box.nom01.on {background:url('/images/main_img001.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom02.on {background:url('/images/main_img002.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom03.on {background:url('/images/main_img003.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom04.on {background:url('/images/main_img004.png')no-repeat center / cover;}

.main_box_wrap ul.ac li.slide_box .text_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .text_div.on {}

.main_box_wrap ul.ac li.slide_box .img_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .img_div.on {}

/* 아코디언 닫혔을 때 */
.txt_wrapper {padding:0 1.5909vw;left:0.0000vw;top:19.8864vw;}
.txt_wrapper img {width: 11.9886vw;margin-bottom:0.8523vw;}
.txt_wrapper p.ilooda_title {padding:0 1.1364vw;background:#000;border-radius:2.8409vw;line-height:1.4205vw;margin-bottom:1.5909vw;font-size:0.7955vw;}
.txt_wrapper p.ilooda_desc {font-size: 0.8523vw;line-height:1.3636vw;letter-spacing:-0.05em;}

.btnbtn {left:1.7045vw;bottom:1.7045vw;}
.btnbtn img {width: 2.2727vw;height: 2.2727vw;}

/* 아코디언 열렸을 때 */
.txt_boxer {right:2.8409vw;bottom:1.7045vw;}
.main_box_wrap ul.ac li.slide_box .img_div.on .txt_boxer {}
.txt_boxer .img_title {font-size: 1.0227vw;margin-bottom: 1.1364vw;}
.txt_boxer .main_title {font-size: 3.4091vw;line-height:4.0909vw;letter-spacing:-0.02em;}
.txt_boxer .submit_btn {font-size: 0.9091vw;background:#e78983;padding:0 1.7045vw;line-height:2.5000vw;margin-top:3.9773vw;}
}

@media (max-width: 1600px)  {
#wrapper {background: #fff;}
#container {width:100%;max-width:120.0000vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100%;margin:0 auto 9.3750vw;padding:0 1.2500vw;}
.main_wrap .inner {width: 100%;}


/* mc01 */
.content_wrap {margin-bottom: 9.3750vw;padding:0 2.5000vw;}
.content_wrap .inner {width:100%;}
.content_wrap .inner .content_wrap_tit {font-size: 2.8125vw;width:100%;margin:0 auto 5.0000vw;}
.content_wrap .inner .content_wrap_box {width:100%;max-width:100%;;margin:0 auto;padding-left:0;padding-right:0;}
.content_wrap .inner .content_wrap_box .swiper-container {}
.content_wrap .inner .content_wrap_box .swiper-container .swiper-wrapper .swiper-slide {width:25.0000vw;}
.content_wrap .inner .content_wrap_box .swiper-container.brand-container .swiper-wrapper .swiper-slide {width:25.0000vw;margin-right:2.5000vw;}

/* swiper */
.content_wrap .swiper_btn_wrap {width:100%;max-width:100%;background:pink;left:50%;top:50%;transform:translate(-50%,-50%);}
.content_wrap .swiper_btn_wrap .swiper-button-next,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-prev {width:3.7500vw;height:3.7500vw;right:0;}
.content_wrap .swiper_btn_wrap .swiper-button-prev,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-next {width:3.7500vw;height:3.7500vw;left:0;}

/* brand */
.txt_div {height:6.25vw;}
.txt_div .naming_img {margin-top:3.1250vw;margin-bottom: 2.5000vw;}
.txt_div h1 {font-size: 1.2500vw;line-height: 1.2500vw;margin-bottom: 0.9375vw}
.txt_div p {font-size: 1.0000vw;line-height: 1.5000vw;}
.txt_div a.detail {right:0;bottom:0;font-size: 1.0000vw;}

/* 아코디언 */
.main_box_wrap ul.ac {width:100%;height:41.8750vw;margin:0.0000vw auto;}
.main_box_wrap ul.ac:after {clear:both;}

.main_box_wrap ul.ac li.slide_box:nth-child(odd) {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box:nth-child(even) {background:#d5dbe7;}

.main_box_wrap ul.ac li.slide_box {width:17%;height:100%;transition:0.8s;background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom01 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom01.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02.color {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom04 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.on {width: 49%;}

.main_box_wrap ul.ac li.slide_box.nom01.on {background:url('/images/main_img001_1600.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom02.on {background:url('/images/main_img002_1600.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom03.on {background:url('/images/main_img003_1600.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom04.on {background:url('/images/main_img004_1600.png')no-repeat center / cover;}

.main_box_wrap ul.ac li.slide_box .text_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .text_div.on {}

.main_box_wrap ul.ac li.slide_box .img_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .img_div.on {}

/* 아코디언 닫혔을 때 */
.txt_wrapper {padding:0 1.7500vw;left:0.0000vw;top:21.8750vw;}
.txt_wrapper img {width: 13.1875vw;margin-bottom:0.9375vw;}
.txt_wrapper p.ilooda_title {padding:0 1.2500vw;background:#000;border-radius:3.1250vw;line-height:1.5625vw;margin-bottom:1.7500vw;font-size:0.8750vw;}
.txt_wrapper p.ilooda_desc {font-size: 0.9375vw;line-height:1.5000vw;letter-spacing:-0.05em;}

.btnbtn {left:1.8750vw;bottom:1.8750vw;}
.btnbtn img {width: 2.5000vw;height: 2.5000vw;}

/* 아코디언 열렸을 때 */
.txt_boxer {right:3.1250vw;bottom:1.8750vw;}
.main_box_wrap ul.ac li.slide_box .img_div.on .txt_boxer {}
.txt_boxer .img_title {font-size: 1.1250vw;margin-bottom: 1.2500vw;}
.txt_boxer .main_title {font-size: 3.7500vw;line-height:4.5000vw;letter-spacing:-0.02em;}
.txt_boxer .submit_btn {font-size: 1.0000vw;background:#e78983;padding:0 1.8750vw;line-height:2.7500vw;margin-top:4.3750vw;}
}

@media (max-width: 1400px)  {

#wrapper {background: #fff;}
#container {width:100%;max-width:137.1429vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100%;margin:0 auto 10.7143vw;padding:0 1.4286vw;}
.main_wrap .inner {}


/* mc01 */
.content_wrap {margin-bottom: 10.7143vw;padding:0 2.8571vw;}
.content_wrap .inner .content_wrap_tit {font-size: 3.2143vw;width:100%;margin:0 auto 5.7143vw;}
.content_wrap .inner .content_wrap_box {width:100%;max-width:100%;;margin:0 auto;padding-left:0;padding-right:0;}
.content_wrap .inner .content_wrap_box .swiper-container {}
.content_wrap .inner .content_wrap_box .swiper-container .swiper-wrapper .swiper-slide {width:28.5714vw;}
.content_wrap .inner .content_wrap_box .swiper-container.brand-container .swiper-wrapper .swiper-slide {width:28.5714vw;margin-right:2.8571vw;}

/* swiper */
.content_wrap .swiper_btn_wrap {width:100%;max-width:100%;background:pink;left:50%;top:50%;transform:translate(-50%,-50%);}
.content_wrap .swiper_btn_wrap .swiper-button-next,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-prev {width:4.2857vw;height:4.2857vw;right:0;}
.content_wrap .swiper_btn_wrap .swiper-button-prev,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-next {width:4.2857vw;height:4.2857vw;left:0;}

/* brand */
.txt_div {height:7.14285vw;}
.txt_div .naming_img {margin-top:3.5714vw;margin-bottom: 2.8571vw;}
.txt_div h1 {font-size: 1.4286vw;line-height: 1.4286vw;margin-bottom: 1.0714vw}
.txt_div p {font-size: 1.1429vw;line-height: 1.7143vw;}
.txt_div a.detail {right:0;bottom:0;font-size: 1.1429vw;}

/* 아코디언 */
.main_box_wrap ul.ac {width:100%;height:47.8571vw;margin:0.0000vw auto;}
.main_box_wrap ul.ac:after {clear:both;}

.main_box_wrap ul.ac li.slide_box:nth-child(odd) {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box:nth-child(even) {background:#d5dbe7;}

.main_box_wrap ul.ac li.slide_box {width:19%;height:100%;transition:0.8s;background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom01 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom01.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02.color {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom04 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.on {width: 43%;}

.main_box_wrap ul.ac li.slide_box.nom01.on {background:url('/images/main_img001_1400.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom02.on {background:url('/images/main_img002_1400.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom03.on {background:url('/images/main_img003_1400.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom04.on {background:url('/images/main_img004_1400.png')no-repeat center / cover;}

.main_box_wrap ul.ac li.slide_box .text_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .text_div.on {}

.main_box_wrap ul.ac li.slide_box .img_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .img_div.on {}

/* 아코디언 닫혔을 때 */
.txt_wrapper {padding:0 1.4286vw;left:0.0000vw;top:25.0000vw;}
.txt_wrapper img {width: 15.0714vw;margin-bottom:1.0714vw;}
.txt_wrapper p.ilooda_title {padding:0 1.4286vw;background:#000;border-radius:3.5714vw;line-height:1.7857vw;margin-bottom:2.0000vw;font-size:1.0000vw;}
.txt_wrapper p.ilooda_desc {font-size: 1.0714vw;line-height:1.7143vw;letter-spacing:-0.05em;}

.btnbtn {left:2.1429vw;bottom:2.1429vw;}
.btnbtn img {width: 2.8571vw;height: 2.8571vw;}

/* 아코디언 열렸을 때 */
.txt_boxer {right:2.8571vw;bottom:2.1429vw;}
.main_box_wrap ul.ac li.slide_box .img_div.on .txt_boxer {}
.txt_boxer .img_title {font-size: 1.2857vw;margin-bottom: 1.4286vw;}
.txt_boxer .main_title {font-size: 3.4286vw;line-height:4.2857vw;letter-spacing:-0.02em;}
.txt_boxer .submit_btn {font-size: 1.1429vw;background:#e78983;padding:0 2.1429vw;line-height:3.1429vw;margin-top:5.0000vw;}
}

@media (max-width: 1024px)  {

#wrapper {background: #fff;}
#container {width:100%;max-width:187.5000vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100%;margin:0 auto 14.6484vw;padding:0 1.9531vw;}
.main_wrap .inner {}


/* mc01 */
.content_wrap {margin-bottom: 14.6484vw;padding:0 3.9063vw;}
.content_wrap .inner .content_wrap_tit {font-size: 4.3945vw;width:100%;margin:0 auto 7.8125vw;}
.content_wrap .inner .content_wrap_box {width:100%;max-width:100%;;margin:0 auto;padding-left:0;padding-right:0;}
.content_wrap .inner .content_wrap_box .swiper-container {}
.content_wrap .inner .content_wrap_box .swiper-container .swiper-wrapper .swiper-slide {width:39.0625vw;}
.content_wrap .inner .content_wrap_box .swiper-container.brand-container .swiper-wrapper .swiper-slide {width:39.0625vw;margin-right:3.9063vw;}

/* swiper */
.content_wrap .swiper_btn_wrap {width:100%;max-width:100%;background:pink;left:50%;top:50%;transform:translate(-50%,-50%);}
.content_wrap .swiper_btn_wrap .swiper-button-next,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-prev {width:5.8594vw;height:5.8594vw;right:0;}
.content_wrap .swiper_btn_wrap .swiper-button-prev,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-next {width:5.8594vw;height:5.8594vw;left:0;}

/* brand */
.txt_div {height:9.76565vw;}
.txt_div .naming_img {margin-top:4.8828vw;margin-bottom: 3.9063vw;}
.txt_div h1 {font-size: 1.9531vw;line-height: 1.9531vw;margin-bottom: 1.4648vw}
.txt_div p {font-size: 1.5625vw;line-height: 2.3438vw;}
.txt_div a.detail {right:0;bottom:0;font-size: 1.5625vw;}

/* 아코디언 */
.main_box_wrap ul.ac {width:100%;height:65.4297vw;margin:0.0000vw auto;}
.main_box_wrap ul.ac:after {clear:both;}

.main_box_wrap ul.ac li.slide_box:nth-child(odd) {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box:nth-child(even) {background:#d5dbe7;}

.main_box_wrap ul.ac li.slide_box {width:20%;height:100%;transition:0.8s;background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom01 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom01.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02.color {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom04 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.on {width: 40%;}

.main_box_wrap ul.ac li.slide_box.nom01.on {background:url('/images/main_img001_1024.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom02.on {background:url('/images/main_img002_1024.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom03.on {background:url('/images/main_img003_1024.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom04.on {background:url('/images/main_img004_1024.png')no-repeat center / cover;}

.main_box_wrap ul.ac li.slide_box .text_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .text_div.on {}

.main_box_wrap ul.ac li.slide_box .img_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .img_div.on {}

/* 아코디언 닫혔을 때 */
.txt_wrapper {padding:0 1.4648vw;left:0.0000vw;top:34.1797vw;}
.txt_wrapper img {width: 20.6055vw;margin-bottom:1.4648vw;}
.txt_wrapper p.ilooda_title {padding:0 1.4648vw;background:#000;border-radius:4.8828vw;line-height:2.4414vw;margin-bottom:2.7344vw;font-size:1.2695vw;}
.txt_wrapper p.ilooda_desc {font-size: 1.4648vw;line-height:2.3438vw;letter-spacing:-0.05em;word-break:keep-all;}
.txt_wrapper p.ilooda_desc br {display: none;}

.btnbtn {left:2.9297vw;bottom:2.9297vw;}
.btnbtn img {width: 3.9063vw;height: 3.9063vw;}

/* 아코디언 열렸을 때 */
.txt_boxer {right:3.9063vw;bottom:2.9297vw;}
.main_box_wrap ul.ac li.slide_box .img_div.on .txt_boxer {}
.txt_boxer .img_title {font-size: 1.7578vw;margin-bottom: 1.9531vw;}
.txt_boxer .main_title {font-size: 3.9063vw;line-height:5.0781vw;letter-spacing:-0.02em;}
.txt_boxer .submit_btn {font-size: 1.5625vw;background:#e78983;padding:0 2.9297vw;line-height:4.2969vw;margin-top:6.8359vw;}
}

@media (max-width: 768px)  {

#wrapper {background: #fff;}
#container {width:100%;max-width:250.0000vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100%;max-width:100%;margin:0 auto 19.5313vw;padding:0 2.6042vw;}
.main_wrap .inner {}


/* mc01 */
.content_wrap {margin-bottom: 19.5313vw;padding:0 5.2083vw;}
.content_wrap .inner .content_wrap_tit {font-size: 4.5573vw;width:100%;margin:0 auto 10.4167vw;position:relative;}
.content_wrap .inner .content_wrap_tit span.more {position:absolute;right:2.6042vw;top:0;width:22.7865vw;}
.content_wrap .inner .content_wrap_box {width:100%;max-width:100%;;margin:0 auto;padding-left:0;padding-right:0;}
.content_wrap .inner .content_wrap_box {}
.content_wrap .inner .content_wrap_box .sct_10.lists-row {margin:0;padding:0;}
.content_wrap .inner .content_wrap_box .sct_10 .sct_li {float:left;margin-right:2.6042vw;width:42.9688vw;}
.content_wrap .inner .content_wrap_box .sct_10 .sct_li:nth-child(2n) {margin-right: 0;}

.content_wrap .inner .content_wrap_box .sct_10 .sct_li .sct_txt{border:none;margin:0;padding:0;margin-bottom: 1.9531vw;}
.content_wrap .inner .content_wrap_box .sct_10 .sct_li .sct_basic{margin:0;margin-bottom:1.9531vw;}
.content_wrap .inner .content_wrap_box .sct_10 .sct_li .sct_bottom{font-size: 3.1250vw;line-height:3.1250vw;margin-top:10px;}
.content_wrap .inner .content_wrap_box .sct_10 .sct_li .sct_bottom p {font-size: 3.1250vw;font-weight:500;}

.content_wrap .inner .content_wrap_box .sct_10 .sct_op_btn {position: absolute;right: 0.6510vw;bottom: auto;top:0;/* width:7.8125vw; */}
.content_wrap .inner .content_wrap_box .sct_10 .sct_op_btn button.btn_wish {background:red;}
.content_wrap .inner .content_wrap_box .sct_10 .sct_op_btn button.btn_cart.sct_cart {width:2.6042vw;height:2.6042vw;display:inline-block;padding:0;background:url('/images/cart.png')no-repeat center / cover;}
.content_wrap .inner .content_wrap_box .sct_10 .sct_op_btn button.btn_wish{width:2.6042vw;height:2.6042vw;display:inline-block;padding:0;background:url('/images/wish.png')no-repeat center / contain;}



/* swiper */
.content_wrap.best_wrap .swiper_btn_wrap {display: none;}
.content_wrap.consumables_wrap .swiper_btn_wrap {display: none;}
.content_wrap .swiper_btn_wrap {width:100%;max-width:100%;background:pink;left:50%;top:50%;transform:translate(-50%,-50%);}
.content_wrap .swiper_btn_wrap .swiper-button-next,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-prev {width:7.8125vw;height:7.8125vw;right:0;}
.content_wrap .swiper_btn_wrap .swiper-button-prev,.content_wrap .swiper_btn_wrap  .swiper-rtl .swiper-button-next {width:7.8125vw;height:7.8125vw;left:0;}

/* brand */
.txt_div {height:15.625vw;}
.txt_div .naming_img {margin-top:5.2083vw;margin-bottom: 5.2083vw;display: inline-block;}
.txt_div .naming_img img {width:80%;max-width:60%;}
.txt_div h1 {font-size: 2.6042vw;line-height: 2.6042vw;margin-bottom: 1.9531vw}
.txt_div p {font-size: 2.0833vw;line-height: 3.1250vw;}
.txt_div a.detail {right:0;bottom:0;font-size: 2.0833vw;}
.txt_div a.detail img {width:6.7708vw;}

/* 아코디언 */
.main_box_wrap ul.ac {width:100%;height:auto;margin:0.0000vw auto;}
.main_box_wrap ul.ac:after {clear:both;}

.main_box_wrap ul.ac li.slide_box:nth-child(odd) {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box:nth-child(even) {background:#d5dbe7;}

.main_box_wrap ul.ac li.slide_box {width:100%;height:20.8333vw;transition:0.8s;background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom01 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom01.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02.color {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom04 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.on {width: 100%;height:79.6875vw}

.main_box_wrap ul.ac li.slide_box.nom01.on {background:url('/images/main_img001.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom02.on {background:url('/images/main_img002.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom03.on {background:url('/images/main_img003.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom04.on {background:url('/images/main_img004.png')no-repeat center / cover;}

.main_box_wrap ul.ac li.slide_box .text_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .text_div.on {}

.main_box_wrap ul.ac li.slide_box .img_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .img_div.on {}

/* 아코디언 닫혔을 때 */
.txt_wrapper {padding:0 2.6042vw;left:0.0000vw;top:50%;transform:translateY(-50%)}
.txt_wrapper img {width: 27.4740vw;margin-bottom:1.9531vw;}
.txt_wrapper p.ilooda_title {padding:0 2.6042vw;background:#000;border-radius:6.5104vw;line-height:3.2552vw;margin-bottom:3.6458vw;font-size:2.0833vw;}
.txt_wrapper p.ilooda_desc {font-size: 2.0833vw;line-height:3.1250vw;letter-spacing:-0.05em;word-break:keep-all;}
.txt_wrapper p.ilooda_desc br {}

.btnbtn {right:3.9063vw;left:auto;bottom:auto;top:50%;transform:translateY(-50%)}
.btnbtn img {width: 5.2083vw;height: 5.2083vw;}

/* 아코디언 열렸을 때 */
.txt_boxer {width: 100%;right:auto;bottom:6.5104vw;padding-right:5.2083vw;}
.main_box_wrap ul.ac li.slide_box .img_div.on .txt_boxer {}
.txt_boxer .img_title {font-size: 2.3438vw;margin-bottom: 2.6042vw;	}
.txt_boxer .main_title {font-size: 6.2500vw;line-height:7.8125vw;letter-spacing:-0.02em;}
.txt_boxer .submit_btn {font-size: 2.0833vw;background:#e78983;padding:0 3.9063vw;line-height:5.7292vw;margin-top:6.5104vw;}
}

@media (max-width: 480px)  {
.content_wrap .inner .content_wrap_box .sct_10 .sct_op_btn button.btn_cart.sct_cart {width:3.3333vw;height:3.3333vw;display:inline-block;padding:0;background:url('/images/cart.png')no-repeat center / cover;}
.content_wrap .inner .content_wrap_box .sct_10 .sct_op_btn button.btn_wish{width:3.3333vw;height:3.3333vw;display:inline-block;padding:0;background:url('/images/wish.png')no-repeat center / contain;}

/* 아코디언 */
.main_box_wrap ul.ac {width:100%;height:auto;margin:0.0000vw auto;}
.main_box_wrap ul.ac:after {clear:both;}

.main_box_wrap ul.ac li.slide_box:nth-child(odd) {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box:nth-child(even) {background:#d5dbe7;}

.main_box_wrap ul.ac li.slide_box {width:100%;height:33.3333vw;transition:0.8s;background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom01 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom01.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom02.color {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03 {background:#b0c4df;}
.main_box_wrap ul.ac li.slide_box.nom03.color {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.nom04 {background:#d5dbe7;}
.main_box_wrap ul.ac li.slide_box.on {width: 100%;height:79.7917vw}

.main_box_wrap ul.ac li.slide_box.nom01.on {background:url('/images/main_img001.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom02.on {background:url('/images/main_img002.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom03.on {background:url('/images/main_img003.png')no-repeat center / cover;}
.main_box_wrap ul.ac li.slide_box.nom04.on {background:url('/images/main_img004.png')no-repeat center / cover;}

.main_box_wrap ul.ac li.slide_box .text_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .text_div.on {}

.main_box_wrap ul.ac li.slide_box .img_div {width:100%;height:100%;}
.main_box_wrap ul.ac li.slide_box .img_div.on {}

/* 아코디언 닫혔을 때 */
.txt_wrapper {padding:0 4.1667vw;left:0.0000vw;top:50%;transform:translateY(-50%);width:80%;}
.txt_wrapper img {width: 43.9583vw;margin-bottom:3.1250vw;}
.txt_wrapper p.ilooda_title {padding:0 4.1667vw;background:#000;border-radius:10.4167vw;line-height:5.2083vw;margin-bottom:5.8333vw;font-size:3.3333vw;}
.txt_wrapper p.ilooda_desc {font-size: 3.3333vw;line-height:5.0000vw;letter-spacing:-0.05em;word-break:keep-all;}
.txt_wrapper p.ilooda_desc br {}

.btnbtn {right:6.2500vw;left:auto;bottom:auto;top:50%;transform:translateY(-50%)}
.btnbtn img {width: 8.3333vw;height: 8.3333vw;}

/* 아코디언 열렸을 때 */
.txt_boxer {width: 100%;right:auto;bottom:10.4167vw;padding-right:6.2500vw;}
.main_box_wrap ul.ac li.slide_box .img_div.on .txt_boxer {}
.txt_boxer .img_title {font-size: 3.7500vw;margin-bottom: 4.1667vw;	}
.txt_boxer .main_title {font-size: 7.5000vw;line-height:10.0000vw;letter-spacing:-0.02em;}
.txt_boxer .submit_btn {font-size: 3.3333vw;background:#e78983;padding:0 6.2500vw;line-height:9.1667vw;margin-top:4.1667vw;}


}
</style>

<div class="main_wrap" style="">
	<div class="inner">
		<div class="main_box_wrap">
			<ul class="ac">
				<li class="slide_box nom01 on">
					<div class="text_div on">
						<div class="txt_wrapper">
							<p class="ilooda_title mont">ilooda GUADIANS</p>
							<img src="/images/main_title_sub.png" alt="">
							<p class="ilooda_desc">
								리팟, 그 모든 비밀이 공개되는 순간! <br/>
								가디언즈 프로그램에서 확인하세요.
							</p>
						</div>
						<a href="javascript:;" class="btnbtn"><img src="/images/main_more.png" alt=""></a>
					</div>
					<div class="img_div on">
						<div class="txt_boxer">
							<p class="img_title mont">ilooda GUARDIANS</p>
							<p class="main_title">
								가디언즈<br/>프로그램 신청
							</p>
							<a href="/bbs/write.php?bo_table=guardians" class="submit_btn">신청하러가기</a>
						</div>
						
					</div>
				</li>

				<li class="slide_box nom02">
					<div class="text_div">
						<div class="txt_wrapper">
							<p class="ilooda_title mont">ilooda DEMO</p>
							<p class="ilooda_desc">
								여러분이 원하는 이루다의 <br/>
								혁신적인 제품을 데모신청을 <br/>
								통해 미리 체험해보세요.
							</p>
						</div>
						<a href="javascript:;" class="btnbtn"><img src="/images/main_more.png" alt=""></a>
					</div>
					<div class="img_div">
						<div class="txt_boxer">
							<p class="img_title mont">ilooda DEMO</p>
							<p class="main_title">
								이루다 제품<br/>데모신청
							</p>
							<a href="/shop/list.php?ca_id=10" class="submit_btn">신청하러가기</a>
						</div>
						
					</div>
				</li>
				
				<li class="slide_box nom03">
					<div class="text_div">
						<div class="txt_wrapper">
							<p class="ilooda_title mont">ilooda EVENT</p>
							<p class="ilooda_desc">
								이루다에서 진행하는 <br/>
								이벤트에 참여하여 <br/>
								많은 혜택을 누리세요.
							</p>
						</div>
						<a href="javascript:;" class="btnbtn"><img src="/images/main_more.png" alt=""></a>
					</div>
					<div class="img_div">
						<a href="<?php echo get_pretty_url('event'); ?>" style="display:block;width:100%;height:100%;"></a>
					</div>
				</li>

				<li class="slide_box nom04">
					<div class="text_div">
						<div class="txt_wrapper">
							<p class="ilooda_title mont">ilooda BEST SELLER</p>
							<p class="ilooda_desc">
								이루다의 베스트 상품을 <br/>
								소개합니다.
							</p>
						</div>
						<a href="javascript:;" class="btnbtn"><img src="/images/main_more.png" alt=""></a>
					</div>
					<div class="img_div">
						<div class="txt_boxer">
							<p class="img_title mont">ilooda BEST SELLER</p>
							<p class="main_title">
								이루다의<br/>베스트셀러를<br/>소개합니다
							</p>
							<a href="/shop/list.php?ca_id=10" class="submit_btn">신청하러가기</a>
						</div>
						
					</div>
				</li>

			</ul>
		</div>
	</div>
</div>

<style>
.swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
.autoplay-progress {
      position: absolute;
      right: 16px;
      bottom: 16px;
      z-index: 10;
      width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: var(--swiper-theme-color);
    }

    .autoplay-progress svg {
      --progress: 0;
      position: absolute;
      left: 0;
      top: 0px;
      z-index: 10;
      width: 100%;
      height: 100%;
      stroke-width: 4px;
      stroke: var(--swiper-theme-color);
      fill: none;
      stroke-dashoffset: calc(125.6 * (1 - var(--progress)));
      stroke-dasharray: 125.6;
      transform: rotate(-90deg);
    }
	.swiper-slide {width: 300px;}
.swiper-slide.swiper-slide-active {width:600px;}
</style>
<div style="width:1600px;margin:0 auto;">
<div class="swiper mySwiper" style="height:700px">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background:pink;">Slide 1</div>
      <div class="swiper-slide" style="background:tomato;">Slide 2</div>
      <div class="swiper-slide" style="background:skyblue;">Slide 3</div>
      <div class="swiper-slide" style="background:gray;">Slide 4</div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    <div class="autoplay-progress">
      <svg viewBox="0 0 48 48">
        <circle cx="24" cy="24" r="20"></circle>
      </svg>
      <span></span>
    </div>
  </div>
</div>
<!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");
    var swiper = new Swiper(".mySwiper", {
	slidesPerView: 4,
      spaceBetween: 0,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      on: {
        autoplayTimeLeft(s, time, progress) {
          progressCircle.style.setProperty("--progress", 1 - progress);
          progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        }
      }
    });
  </script>

<script>
$(function(){
	//setInterval(function () { alert('hello'); }, 3000);
});

/*
var timer = setInterval(setColor, 1000);
setTimeout(stopColor, 10000);
 
function setColor() {
  var x = document.body;
  x.style.backgroundColor = x.style.backgroundColor == 'red' ? 'blue' : 'red';
}
 
function stopColor() {
  clearInterval(timer);
}
*/

$(function(){
	//setInterval(function () { alert('hello'); }, 3000);

	$('.slide_box .btnbtn').on('click',function(){
		$('.txt_boxer').fadeOut(); //아코디언 변경
		$('.slide_box').removeClass('color'); //아코디언 변경
		$('.slide_box').removeClass('on'); //아코디언 변경
		$('.text_div').removeClass('on'); //아코디언 썸네일 내용
		$('.img_div').removeClass('on'); //아코디언 본문 내용

		$(this).parents('li').addClass('on'); //아코디언 변경
		$(this).parents('li').find('.txt_boxer').fadeIn(1200); //
		$(this).parents('li').find('.text_div').addClass('on'); //아코디언 썸네일 내용
		$(this).parents('li').find('.img_div').addClass('on'); //아코디언 본문 내용
	});
});

$(function(){
	$('.slide_box.nom01').on('click',function(){ //첫번째 누를 때 바뀌는 배경컬러만 조절

	});

	$('.slide_box.nom02 .btnbtn').on('click',function(){ //첫번째 누를 때 바뀌는 배경컬러만 조절
		$('.slide_box.nom01').addClass('color'); //아코디언 변경
	});

	$('.slide_box.nom03 .btnbtn').on('click',function(){ //첫번째 누를 때 바뀌는 배경컬러만 조절
		$('.slide_box.nom01').addClass('color'); //아코디언 변경
		$('.slide_box.nom02').addClass('color'); //아코디언 변경
	});

	$('.slide_box.nom04 .btnbtn').on('click',function(){ //첫번째 누를 때 바뀌는 배경컬러만 조절
		$('.slide_box.nom01').addClass('color'); //아코디언 변경
		$('.slide_box.nom02').addClass('color'); //아코디언 변경
		$('.slide_box.nom03').addClass('color'); //아코디언 변경
	});


});



$(function(){
	//best seller 영역
	var mySwiper = new Swiper('.best-container1', {
		speed: 400,
		spaceBetween: 0,
		slidesPerView: 'auto',
		navigation: {
			nextEl: '.mc01-next',
			prevEl: '.mc01-prev',
		  },
		scrollbar: {
			el: '.mc01-scrollbar',
			draggable: true,
		  },
	});
	
	//best seller 영역
	var mySwiper2 = new Swiper('.consumables-container1', {
		speed: 400,
		spaceBetween: 0,
		slidesPerView: 'auto',
		navigation: {
			nextEl: '.mc02-next',
			prevEl: '.mc02-prev',
		  },
		scrollbar: {
			el: '.mc02-scrollbar',
			draggable: true,
		  },
	});
	
	//best seller 영역
	var mySwiper3 = new Swiper('.brand-container', {
		speed: 400,
		spaceBetween: 0,
		slidesPerView: "auto",
		navigation: {
			nextEl: '.mc03-next',
			prevEl: '.mc03-prev',
		  },
	});
});

</script>
<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');