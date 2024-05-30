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
.main_wrap {width:1760px;margin:0 auto 150px;}
.main_wrap .inner {}
.main_wrap .main_box_wrap {position:relative;width:100%;height:1062px;}
.main_wrap .main_box_wrap .box {position:absolute;}
.main_wrap .main_box_wrap .box.box01 {left:0;top:0;}
.main_wrap .main_box_wrap .box.box02 {left:0;bottom:0;}
.main_wrap .main_box_wrap .box.box03 {left:50%;transform:translateX(-50%)}
.main_wrap .main_box_wrap .box.box04 {right:0;top:0;}
.main_wrap .main_box_wrap .box.box05 {right:0;top:276px}
.main_wrap .main_box_wrap .box.box06 {right:0;bottom:0;}

.main_wrap .main_box_wrap .box > img {width: 410px;}
.main_wrap .main_box_wrap .box.box03 > img {width: 860px;}

.main_wrap .main_box_wrap .box .txt_box {position:absolute;left:35px;top:30px;}
.main_wrap .main_box_wrap .box .txt_box p {color:#fff;letter-spacing: -0.02em;}
.main_wrap .main_box_wrap .box .txt_box p.tit {font-size: 30px;font-weight: 500;margin-bottom:8px;line-height:30px;}
.main_wrap .main_box_wrap .box .txt_box p.desc {font-size: 18px;font-weight: 300;line-height:26px;}
.main_wrap .main_box_wrap .box .txt_box p.tel {font-size: 24px;font-weight: 400;margin-bottom: 5px;line-height:24px;}

.main_wrap .main_box_wrap .box .view_box {position:absolute;right:35px;bottom:35px;}
.main_wrap .main_box_wrap .box .view_box a {color:#fff;font-size: 18px;font-weight:400;}
.main_wrap .main_box_wrap .box .view_box a img {margin-left:15px;}

/* mc01 */
.content_wrap {position:relative;margin-bottom: 150px;}
.content_wrap .inner .content_wrap_tit {font-size: 45px;font-weight:400;width:1760px;margin:0 auto 80px;}
.content_wrap .inner .content_wrap_box {width:100%;max-width:1920px;margin:0 auto;overflow:hidden;padding-left:80px;padding-right:80px;}
.content_wrap .inner .content_wrap_box .swiper-container {position:relative;}
.content_wrap .inner .content_wrap_box .swiper-container .swiper-wrapper .swiper-slide {width:400px;}
.content_wrap .inner .content_wrap_box .swiper-container.brand-container .swiper-wrapper .swiper-slide {width:400px;margin-right:40px;}

/* swiper */
.content_wrap .swiper_btn_wrap {width:100%;max-width:1920px;background:pink;position:absolute;top:50%;transform:translateY(-50%);z-index:99;}
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


@media (max-width: 1760px)  {
#wrapper {background: #fff;}
#container {width:100%;max-width:109.0909vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100.0000vw;margin:0 auto 8.5227vw;padding:0 1.1364vw;}
.main_wrap .inner {}
.main_wrap .main_box_wrap {width:100%;height:60.3409vw;}
.main_wrap .main_box_wrap .box {}
.main_wrap .main_box_wrap .box.box01 {left:0;top:0;}
.main_wrap .main_box_wrap .box.box02 {left:0;bottom:0;}
.main_wrap .main_box_wrap .box.box03 {left:50%;transform:translateX(-50%)}
.main_wrap .main_box_wrap .box.box04 {right:0;top:0;}
.main_wrap .main_box_wrap .box.box05 {right:0;top:15.6818vw}
.main_wrap .main_box_wrap .box.box06 {right:0;bottom:0;}

.main_wrap .main_box_wrap .box > img {width: 23.2955vw;}
.main_wrap .main_box_wrap .box.box03 > img {width: 48.8636vw;}

.main_wrap .main_box_wrap .box .txt_box {left:1.9886vw;top:1.7045vw;}
.main_wrap .main_box_wrap .box .txt_box p {letter-spacing: -0.02em;}
.main_wrap .main_box_wrap .box .txt_box p.tit {font-size: 1.7045vw;margin-bottom:0.4545vw;line-height:1.7045vw;}
.main_wrap .main_box_wrap .box .txt_box p.desc {font-size: 1.0227vw;line-height:1.4773vw;}
.main_wrap .main_box_wrap .box .txt_box p.tel {font-size: 1.3636vw;margin-bottom: 0.2841vw;line-height:1.3636vw;}

.main_wrap .main_box_wrap .box .view_box {right:1.9886vw;bottom:1.9886vw;}
.main_wrap .main_box_wrap .box .view_box a {font-size: 1.0227vw;}
.main_wrap .main_box_wrap .box .view_box a img {margin-left:0.8523vw;}

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
}

@media (max-width: 1600px)  {
#wrapper {background: #fff;}
#container {width:100%;max-width:120.0000vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100%;margin:0 auto 9.3750vw;padding:0 1.2500vw;}
.main_wrap .inner {}
.main_wrap .main_box_wrap {width:100%;height:60.1250vw;}
.main_wrap .main_box_wrap .box {}
.main_wrap .main_box_wrap .box.box01 {left:0;top:0;}
.main_wrap .main_box_wrap .box.box02 {left:0;bottom:0;}
.main_wrap .main_box_wrap .box.box03 {left:50%;transform:translateX(-50%)}
.main_wrap .main_box_wrap .box.box04 {right:0;top:0;}
.main_wrap .main_box_wrap .box.box05 {right:0;top:17.2500vw}
.main_wrap .main_box_wrap .box.box06 {right:0;bottom:0;}

.main_wrap .main_box_wrap .box > img {width: 22.5000vw;}
.main_wrap .main_box_wrap .box.box03 > img {width: 53.7500vw;}

.main_wrap .main_box_wrap .box .txt_box {left:1.8750vw;top:1.8750vw;}
.main_wrap .main_box_wrap .box .txt_box p {letter-spacing: -0.02em;}
.main_wrap .main_box_wrap .box .txt_box p.tit {font-size: 1.8750vw;margin-bottom:0.5000vw;line-height:1.8750vw;}
.main_wrap .main_box_wrap .box .txt_box p.desc {font-size: 1.1250vw;line-height:1.6250vw;}
.main_wrap .main_box_wrap .box .txt_box p.tel {font-size: 1.5000vw;margin-bottom: 0.3125vw;line-height:1.5000vw;}

.main_wrap .main_box_wrap .box .view_box {right:2.1875vw;bottom:2.1875vw;}
.main_wrap .main_box_wrap .box .view_box a {font-size: 1.1250vw;}
.main_wrap .main_box_wrap .box .view_box a img {margin-left:0.9375vw;}

/* mc01 */
.content_wrap {margin-bottom: 9.3750vw;padding:0 2.5000vw;}
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
}

@media (max-width: 1400px)  {

#wrapper {background: #fff;}
#container {width:100%;max-width:137.1429vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100%;margin:0 auto 10.7143vw;padding:0 1.4286vw;}
.main_wrap .inner {}
.main_wrap .main_box_wrap {width:100%;height:59.8571vw;}
.main_wrap .main_box_wrap .box {}
.main_wrap .main_box_wrap .box.box01 {left:0;top:0;}
.main_wrap .main_box_wrap .box.box02 {left:0;bottom:0;}
.main_wrap .main_box_wrap .box.box03 {left:50%;transform:translateX(-50%)}
.main_wrap .main_box_wrap .box.box04 {right:0;top:0;}
.main_wrap .main_box_wrap .box.box05 {right:0;top:15.7143vw}
.main_wrap .main_box_wrap .box.box06 {right:0;bottom:0;}

.main_wrap .main_box_wrap .box > img {width: 22.8571vw;}
.main_wrap .main_box_wrap .box.box03 > img {width: 61.4286vw;}

.main_wrap .main_box_wrap .box .txt_box {left:1.4286vw;top:1.4286vw;}
.main_wrap .main_box_wrap .box .txt_box p {letter-spacing: -0.02em;}
.main_wrap .main_box_wrap .box .txt_box p.tit {font-size: 1.7143vw;margin-bottom:0.5714vw;line-height:1.7143vw;}
.main_wrap .main_box_wrap .box .txt_box p.desc {font-size: 1.0000vw;line-height:1.7143vw;}
.main_wrap .main_box_wrap .box .txt_box p.tel {font-size: 1.5714vw;margin-bottom: 0.3571vw;line-height:1.5714vw;}

.main_wrap .main_box_wrap .box .view_box {right:1.4286vw;bottom:1.4286vw;}
.main_wrap .main_box_wrap .box .view_box a {font-size: 1.2857vw;}
.main_wrap .main_box_wrap .box .view_box a img {margin-left:1.0714vw;}

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

}

@media (max-width: 1024px)  {

#wrapper {background: #fff;}
#container {width:100%;max-width:187.5000vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100%;margin:0 auto 14.6484vw;padding:0 1.9531vw;}
.main_wrap .inner {}
.main_wrap .main_box_wrap {width:100%;height:59.2773vw;}
.main_wrap .main_box_wrap .box {}
.main_wrap .main_box_wrap .box.box01 {left:0;top:0;}
.main_wrap .main_box_wrap .box.box02 {left:0;bottom:0;}
.main_wrap .main_box_wrap .box.box03 {left:50%;transform:translateX(-50%)}
.main_wrap .main_box_wrap .box.box04 {right:0;top:0;}
.main_wrap .main_box_wrap .box.box05 {right:0;top:15.1vw;height:21.4844vw;}
.main_wrap .main_box_wrap .box.box06 {right:0;bottom:0;height: 20.5078vw;}

.main_wrap .main_box_wrap .box > img {width: 23.4375vw;}
.main_wrap .main_box_wrap .box.box03 > img {width: 83.9844vw;}
.main_wrap .main_box_wrap .box.box05 > img {height:100%;object-fit:cover;}
.main_wrap .main_box_wrap .box.box06 > img {height:100%;object-fit:cover;}

.main_wrap .main_box_wrap .box .txt_box {left:0.9766vw;top:0.9766vw;}
.main_wrap .main_box_wrap .box .txt_box p {letter-spacing: -0.02em;}
.main_wrap .main_box_wrap .box .txt_box p.tit {font-size: 1.7578vw;margin-bottom:0.7813vw;line-height:1.7578vw;}
.main_wrap .main_box_wrap .box .txt_box p.desc {font-size: 1.3672vw;line-height:2.3438vw;}
.main_wrap .main_box_wrap .box .txt_box p.tel {font-size: 1.7578vw;margin-bottom: 0.4883vw;line-height:1.7578vw;}

.main_wrap .main_box_wrap .box .view_box {right:0.9766vw;bottom:0.9766vw;}
.main_wrap .main_box_wrap .box .view_box a {font-size: 1.3672vw;}
.main_wrap .main_box_wrap .box .view_box a img {margin-left:1.4648vw;}

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

}

@media (max-width: 768px)  {

#wrapper {background: #fff;}
#container {width:100%;max-width:250.0000vw;}

#container .is_index {margin-left:0;}

/* 메인 상단 */
.main_wrap {width:100%;max-width:93.7500vw;margin:0 auto 19.5313vw;padding:0 2.6042vw;}
.main_wrap .inner {}
.main_wrap .main_box_wrap {width:100%;height:auto;}
.main_wrap .main_box_wrap .box2 {position:relative;width:100%;height:26.0417vw;margin-bottom: 2.6042vw;}
.main_wrap .main_box_wrap .box2.box03 {position:relative;width:100%;height:109.3750vw;}

.main_wrap .main_box_wrap .box2 > img {width:100%;height:100%;object-fit:cover;}

.main_wrap .main_box_wrap .float_wrap:after {content:"";display:block;clear:both;}
.main_wrap .main_box_wrap .float_wrap .box2 {position:relative;width:42.9688vw;height:52.0833vw;float:left;margin-bottom: 0;}
.main_wrap .main_box_wrap .float_wrap .box2.box06 {float:right;}

.main_wrap .main_box_wrap .box2 .txt_box {position:absolute;left:3.9063vw;top:4.5573vw;}
.main_wrap .main_box_wrap .box2 .txt_box p {color:#fff;letter-spacing: -0.02em;}
.main_wrap .main_box_wrap .box2 .txt_box p.tit {font-size: 4.5573vw;margin-bottom:1.3021vw;line-height:4.5573vw;}
.main_wrap .main_box_wrap .box2 .txt_box p.desc {font-size: 3.1250vw;line-height:4.6875vw;}
.main_wrap .main_box_wrap .box2 .txt_box p.desc2 {font-size: 2.3438vw;line-height:3.1250vw;}
.main_wrap .main_box_wrap .box2 .txt_box p.tel {font-size: 3.1250vw;margin-bottom: 0.6510vw;line-height:4.6875vw;}

.main_wrap .main_box_wrap .box2 .view_box {position:absolute;right:3.9063vw;bottom:3.9063vw;}
.main_wrap .main_box_wrap .box2 .view_box a {color:#fff;font-size: 2.3438vw;}
.main_wrap .main_box_wrap .box2 .view_box a img {margin-left:1.9531vw;width:6.5104vw;}

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

}

@media (max-width: 480px)  {
.content_wrap .inner .content_wrap_box .sct_10 .sct_op_btn button.btn_cart.sct_cart {width:3.3333vw;height:3.3333vw;display:inline-block;padding:0;background:url('/images/cart.png')no-repeat center / cover;}
.content_wrap .inner .content_wrap_box .sct_10 .sct_op_btn button.btn_wish{width:3.3333vw;height:3.3333vw;display:inline-block;padding:0;background:url('/images/wish.png')no-repeat center / contain;}



}
</style>

<div class="main_wrap">
	<div class="inner">
		<div class="main_box_wrap hide720">
			<div class="box box01">
				<img src="/images/main_img01.png" alt="">
				<div class="txt_box">
					<p class="tit mont">EVENT</p>
					<p class="desc">이루다에서 진행하는 이벤트에<br/>참여하여 많은 혜택을 누리세요.</p>
				</div>
				<div class="view_box">
					<a href="<?php echo get_pretty_url('event'); ?>">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div>
			</div>
			
			<div class="box box02">
				<img src="/images/main_img02.png" alt="">
				<div class="txt_box">
					<p class="tit mont">ILOODA GUARDIANS</p>
					<p class="desc">가디언스 프로그램 신청</p>
				</div>
				<div class="view_box">
					<a href="/bbs/write.php?bo_table=guardians">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div>
			</div>

			<div class="box box03">
				<img src="/images/main_img03.png" alt="">
				<!-- <div class="view_box">
					<a href="javascript:;">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div> -->
			</div>
			

			<div class="box box04">
				<img src="/images/main_img04.png" alt="">
				<div class="txt_box">
					<p class="tit mont">ILOODA INTRODUCTION</p>
					<p class="desc">정교하고 섬세한 이루다의 <br/>치료 기술을 소개합니다.</p>
				</div>
				<!-- <div class="view_box">
					<a href="javascript:;">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div> -->
			</div>
			
			<div class="box box05">
				<img src="/images/main_img05.png" alt="">
				<div class="txt_box">
					<p class="tit mont">MEMBERSHIP</p>
					<p class="desc">이루다의 멤버쉽을 가입하시고 <br/>다양한 혜택을 누리세요.</p>
				</div>
				<div class="view_box">
					<a href="<?php echo G5_SHOP_URL ?>/membership.php">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div>
			</div>
			
			<div class="box box06">
				<img src="/images/main_img06.png" alt="">
				<div class="txt_box">
					<p class="tit mont">CUSTOMER CENTER</p>
					<p class="tel">031-278-4660</p>
					<p class="desc">MON-FRI AM 10:00 – PM 17:00 <br/>LUNCH PM 12:30 - 01:30 <br/>주말/공휴일 휴무</p>
				</div>
				<div class="view_box">
					<a href="<?php echo get_pretty_url('notice'); ?>">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div>
			</div>
		</div>

		<div class="main_box_wrap show720">
			<div class="box2 box03">
				<img src="/images/main_img03.png" alt="">
				<!-- <div class="view_box">
					<a href="javascript:;">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div> -->
			</div>
			<div class="box2 box01">
				<img src="/images/main_img01.png" alt="">
				<div class="txt_box">
					<p class="tit mont">EVENT</p>
					<p class="desc">이루다에서 진행하는 이벤트에<br/>참여하여 많은 혜택을 누리세요.</p>
				</div>
				<div class="view_box">
					<a href="<?php echo get_pretty_url('event'); ?>">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div>
			</div>

			<div class="box2 box04">
				<img src="/images/main_img04.png" alt="">
				<div class="txt_box">
					<p class="tit mont">ILOODA INTRODUCTION</p>
					<p class="desc">정교하고 섬세한 이루다의 <br/>치료 기술을 소개합니다.</p>
				</div>
				<!-- <div class="view_box">
					<a href="javascript:;">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div> -->
			</div>
			
			<div class="box2 box05">
				<img src="/images/main_img05.png" alt="">
				<div class="txt_box">
					<p class="tit mont">MEMBERSHIP</p>
					<p class="desc">이루다의 멤버쉽을 가입하시고 <br/>다양한 혜택을 누리세요.</p>
				</div>
				<div class="view_box">
					<a href="<?php echo G5_SHOP_URL ?>/membership.php">VIEW MORE <img src="/images/view_more.png" alt=""></a>
				</div>
			</div>
			
			<div class="float_wrap">
				<div class="box2 box02">
					<img src="/images/main_img02.png" alt="">
					<div class="txt_box">
						<p class="tit mont">ILOODA <br/>GUARDIANS</p>
						<p class="desc">가디언스 프로그램 신청</p>
					</div>
					<div class="view_box">
						<a href="/bbs/write.php?bo_table=guardians">VIEW MORE <img src="/images/view_more.png" alt=""></a>
					</div>
				</div>
				
				<div class="box2 box06">
					<img src="/images/main_img06.png" alt="">
					<div class="txt_box">
						<p class="tit mont">CUSTOMER <br/>CENTER</p>
						<p class="tel">031-278-4660</p>
						<p class="desc desc2">MON-FRI AM 10:00 – PM 17:00 <br/>LUNCH PM 12:30 - 01:30 <br/>주말/공휴일 휴무</p>
					</div>
					<div class="view_box">
						<a href="<?php echo get_pretty_url('notice'); ?>">VIEW MORE <img src="/images/view_more.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- BEST SELLER -->
<div class="content_wrap best_wrap">
	<div class="inner">
		<div class="content_wrap_tit mont">
			BEST MEDICAL DEVICES <span class="more show720"><a href="/shop/list.php?ca_id=10"><img src="/images/m_more.png" alt=""></a></span>
		</div>
		<div class="content_wrap_box hide720">
			<div class="swiper-container best-container best-container1">
				<!-- Additional required wrapper -->
				<?php
				$skin = G5_SHOP_SKIN_PATH.'/list.90.skin.php'; // 스킨
				$sql = " select * from {$g5['g5_shop_item_table']} where ca_id = '10' and it_use = '1' order by it_order, it_id desc limit 12";
				$list = new item_list($skin, $list_mod, $list_row, 400, 400);
				$list->set_query($sql);
				$list->set_type(4);
				$list->set_view('it_img', true);
				$list->set_view('it_id', false);
				$list->set_view('it_name', true);
				$list->set_view('it_basic', true);
				$list->set_view('it_cust_price', true);
				$list->set_view('it_price', true);
				$list->set_view('it_icon', false);
				$list->set_view('sns', false);
				$list->set_view('star', false);
				echo $list->run();
				?>

				<!-- If we need scrollbar -->
				<div class="swiper-scrollbar mc01-scrollbar"></div>
			</div>
		</div>

		<div class="content_wrap_box show720">
			<div class="best-container">
				<!-- Additional required wrapper -->
				<?php
				$skin = G5_SHOP_SKIN_PATH.'/list.80.skin.php'; // 스킨
				$sql = " select * from {$g5['g5_shop_item_table']} where ca_id = '10' and it_use = '1' order by it_order, it_id desc limit 12";
				$list = new item_list($skin, $list_mod, $list_row, 330, 424);
				$list->set_type(4);
				$list->set_view('it_img', true);
				$list->set_view('it_id', false);
				$list->set_view('it_name', true);
				$list->set_view('it_basic', true);
				$list->set_view('it_cust_price', true);
				$list->set_view('it_price', true);
				$list->set_view('it_icon', false);
				$list->set_view('sns', false);
				$list->set_view('star', false);
				echo $list->run();
				?>
			</div>
		</div>

	</div>
	<div class="swiper_btn_wrap">
		<!-- If we need navigation buttons -->
		<div class="swiper-button-prev mc01-prev"><img src="/images/prev_icon.png" alt=""></div>
		<div class="swiper-button-next mc01-next"><img src="/images/next_icon.png" alt=""></div>
	</div>
</div>

<!-- consumables -->
<div class="content_wrap consumables_wrap">
	<div class="inner">
		<div class="content_wrap_tit mont">
			CONSUMABLES <span class="more show720"><a href=""><img src="/images/m_more.png" alt=""></a></span>
		</div>
		<div class="content_wrap_box hide720">
			<div class="swiper-container consumables-container consumables-container1">
				<!-- Additional required wrapper -->
				<?php
				$skin = G5_SHOP_SKIN_PATH.'/list.90.skin.php'; // 스킨
				$sql = " select * from {$g5['g5_shop_item_table']} where ca_id = '20' and it_use = '1' order by it_order, it_id desc limit 12";
				$list = new item_list($skin, $list_mod, $list_row, 400, 400);
				$list->set_query($sql);
				$list->set_type(4);
				$list->set_view('it_img', true);
				$list->set_view('it_id', false);
				$list->set_view('it_name', true);
				$list->set_view('it_basic', true);
				$list->set_view('it_cust_price', true);
				$list->set_view('it_price', true);
				$list->set_view('it_icon', false);
				$list->set_view('sns', false);
				$list->set_view('star', false);
				echo $list->run();
				?>

				<!-- If we need scrollbar -->
				<div class="swiper-scrollbar mc02-scrollbar"></div>
			</div>
		</div>

		<div class="content_wrap_box show720">
			<div class="consumables-container">
				<!-- Additional required wrapper -->
				<?php
				$skin = G5_SHOP_SKIN_PATH.'/list.80.skin.php'; // 스킨
				$sql = " select * from {$g5['g5_shop_item_table']} where ca_id = '20' and it_use = '1' order by it_order, it_id desc limit 12";
				$list = new item_list($skin, $list_mod, $list_row, 330, 424);
				$list->set_query($sql);
				$list->set_type(4);
				$list->set_view('it_img', true);
				$list->set_view('it_id', false);
				$list->set_view('it_name', true);
				$list->set_view('it_basic', true);
				$list->set_view('it_cust_price', true);
				$list->set_view('it_price', true);
				$list->set_view('it_icon', false);
				$list->set_view('sns', false);
				$list->set_view('star', false);
				echo $list->run();
				?>
			</div>
		</div>

	</div>
	<div class="swiper_btn_wrap">
		<!-- If we need navigation buttons -->
		<div class="swiper-button-prev mc02-prev"><img src="/images/prev_icon.png" alt=""></div>
		<div class="swiper-button-next mc02-next"><img src="/images/next_icon.png" alt=""></div>
	</div>
</div>
<!-- brand introduction -->
<div class="content_wrap brand_wrap">
	<div class="inner">
		<div class="content_wrap_tit mont">
			BRAND STORY
		</div>
		<div class="content_wrap_box">
			<div class="swiper-container brand-container">
				<ul class="swiper-wrapper">
					<?php 

					$sql = " select * from g5_write_brand order by wr_id desc";
					$result = sql_query($sql);
					$total = sql_num_rows($result);

					for($i = 0 ; $brand = sql_fetch_array($result) ; $i++) {
					$thumb_pf = get_list_thumbnail('brand', $brand['wr_id'], 400, 400, false, true, 'center', false, '80/0.5/3');
					
					
					if($thumb_pf['src']) {
						$img_content = '<div class="thumb_div"><img src="'.$thumb_pf['src'].'" alt="'.$thumb_pf['alt'].'" ></div>';
					}
					?>
						<li class="swiper-slide">
							<!-- <a href="<?php echo get_pretty_url('brand', $brand['wr_id']);?>"> -->
							<a href="<?php echo $brand['wr_link1']?>" target="_blank">
								<?php		
								$wr_cnt = sql_fetch(" select * from g5_board_file where wr_id = '{$brand['wr_id']}' and bf_no = '1' ");
								?>
								<?php
								echo $img_content;	
								?>
								<div class="txt_div">
									<div class="naming_img">
										<!-- <img src="/data/file/brand/<?php echo $wr_cnt['bf_file']?>" alt=""> -->
										<h1><?php echo $brand['wr_subject']?></h1>
									</div>
									
									<!-- <p><?php echo $brand['wr_content']?></p> -->

									<!--<a href="<?php echo G5_SHOP_URL ?>/brandstory.php" class="detail">-->
									<!-- <a href="<?php echo get_pretty_url('brand');?>" class="detail"> -->
									<!-- <a href="<?php echo $brand['wr_link1']?>" target="_blank" class="detail"> -->
										<!--DETAIL VIEW <img src="/images/detail_view.png" alt="">-->
									<!--</a>-->
								</div>
							</a>
						</li>
					<?php }

					if($total == 0) echo '<li class="no_list">게시글이 없습니다.</li>';
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="swiper_btn_wrap">
		<!-- If we need navigation buttons -->
		<div class="swiper-button-prev mc03-prev"><img src="/images/prev_icon.png" alt=""></div>
		<div class="swiper-button-next mc03-next"><img src="/images/next_icon.png" alt=""></div>
	</div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>

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