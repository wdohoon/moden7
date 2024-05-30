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

include_once(G5_SHOP_PATH.'/shop.head.php');
?>

<style>
#wrapper {background: #fff;}
#container {width:100%;max-width:1920px;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/*추가*/
.sub_w, .s_wrap{width:1200px;margin:0 auto}
.sub_title{font-size:45px;text-align:center;margin-bottom:30px}
.header_wrap{border-bottom: 1px solid #efefef;}
.register_before{padding:187px 0 287px 0}
.register_before ul{display:flex}
.register_before ul li{width:50%;}
.register_before ul li:last-of-type{width:48%;margin-left:2%}
.register_before ul li .border{display: flex;flex-direction: column;align-items: center;padding: 70px 0;text-align: center;border:1px solid #ccc;border-radius:12px}
.register_before ul li:last-of-type .border{border:1px solid #0c0c0c !important}
.register_before ul .title{font-weight:bold;font-size:28px;margin-bottom:10px}
.register_before ul span{color:#aaa;font-size:18px}
.register_before .btn{display:block;width:155px;font-size:18px;line-height:50px;height:50px;background:#373737;color:#fff;border-radius:7px;margin-top:50px}
.register_pro #fregisterform{border-top: 2px solid #4472c4;}
.register_pro.register .btn_confirm .btn_submit {background: #4472c4;}

@media (max-width:1760px){
#wrapper {background: #fff;}
#container {width:100%;max-width:109.0909vw;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/*추가*/
.sub_w, .s_wrap{width:68.1818vw;margin:0 auto}
.sub_title{font-size:2.5568vw;margin-bottom:1.7045vw}
.header_wrap{border-bottom: 0.0568vw solid #efefef;}
.register_before{padding:10.6250vw 0 16.3068vw 0}
.register_before ul{display:flex}
.register_before ul li{width:50%;}
.register_before ul li:last-of-type{width:48%;margin-left:2%}
.register_before ul li .border{flex-direction: column;align-items: center;padding: 3.9773vw 0;border:0.0568vw solid #ccc;border-radius:0.6818vw}
.register_before ul li:last-of-type .border{border:0.0568vw solid #0c0c0c !important}
.register_before ul .title{font-size:1.5909vw;margin-bottom:0.5682vw}
.register_before ul span{font-size:1.0227vw}
.register_before .btn{width:8.8068vw;font-size:1.0227vw;line-height:2.8409vw;height:2.8409vw;background:#373737;border-radius:0.3977vw;margin-top:2.8409vw}
.register_pro #fregisterform{border-top: 0.1136vw solid #4472c4;}
.register_pro.register .btn_confirm .btn_submit {background: #4472c4;}

}

@media (max-width:1600px){
#wrapper {background: #fff;}
#container {width:100%;max-width:120.0000vw;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/*추가*/
.sub_w, .s_wrap{width:75.0000vw;margin:0 auto}
.sub_title{font-size:2.8125vw;margin-bottom:1.8750vw}
.header_wrap{border-bottom: 0.0625vw solid #efefef;}
.register_before{padding:11.6875vw 0 17.9375vw 0}
.register_before ul{display:flex}
.register_before ul li{width:50%;}
.register_before ul li:last-of-type{width:48%;margin-left:2%}
.register_before ul li .border{flex-direction: column;align-items: center;padding: 4.3750vw 0;border:0.0625vw solid #ccc;border-radius:0.7500vw}
.register_before ul li:last-of-type .border{border:0.0625vw solid #0c0c0c !important}
.register_before ul .title{font-size:1.7500vw;margin-bottom:0.6250vw}
.register_before ul span{font-size:1.1250vw}
.register_before .btn{width:9.6875vw;font-size:1.1250vw;line-height:3.1250vw;height:3.1250vw;background:#373737;border-radius:0.4375vw;margin-top:3.1250vw}
.register_pro #fregisterform{border-top: 0.1250vw solid #4472c4;}
.register_pro.register .btn_confirm .btn_submit {background: #4472c4;}

}

@media (max-width:1400px){
#wrapper {background: #fff;}
#container {width:100%;max-width:137.1429vw;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/*추가*/
.sub_w, .s_wrap{width:85.7143vw;margin:0 auto}
.sub_title{font-size:3.2143vw;margin-bottom:2.1429vw}
.header_wrap{border-bottom: 0.0714vw solid #efefef;}
.register_before{padding:13.3571vw 0 20.5000vw 0}
.register_before ul{display:flex}
.register_before ul li{width:50%;}
.register_before ul li:last-of-type{width:48%;margin-left:2%}
.register_before ul li .border{flex-direction: column;align-items: center;padding: 5.0000vw 0;border:0.0714vw solid #ccc;border-radius:0.8571vw}
.register_before ul li:last-of-type .border{border:0.0714vw solid #0c0c0c !important}
.register_before ul .title{font-size:2.0000vw;margin-bottom:0.7143vw}
.register_before ul span{font-size:1.2857vw}
.register_before .btn{width:11.0714vw;font-size:1.2857vw;line-height:3.5714vw;height:3.5714vw;background:#373737;border-radius:0.5000vw;margin-top:3.5714vw}
.register_pro #fregisterform{border-top: 0.1429vw solid #4472c4;}
.register_pro.register .btn_confirm .btn_submit {background: #4472c4;}

}

@media (max-width:1024px){
#wrapper {background: #fff;}
#container {width:100%;max-width:187.5000vw;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/*추가*/
.sub_w, .s_wrap{width:100%;margin:0 auto;}
.sub_title{font-size:4.3945vw;margin-bottom:2.9297vw}
.header_wrap{border-bottom: 0.0977vw solid #efefef;}
.register_before{padding:18.2617vw 3.9063vw 28.0273vw}
.register_before ul{display:flex}
.register_before ul li{width:50%;}
.register_before ul li:last-of-type{width:48%;margin-left:2%}
.register_before ul li .border{flex-direction: column;align-items: center;padding: 6.8359vw 0;border:0.0977vw solid #ccc;border-radius:1.1719vw}
.register_before ul li:last-of-type .border{border:0.0977vw solid #0c0c0c !important}
.register_before ul .title{font-size:2.7344vw;margin-bottom:0.9766vw}
.register_before ul span{font-size:1.7578vw}
.register_before .btn{width:15.1367vw;font-size:1.7578vw;line-height:4.8828vw;height:4.8828vw;background:#373737;border-radius:0.6836vw;margin-top:4.8828vw}
.register_pro #fregisterform{border-top: 0.1953vw solid #4472c4;}
.register_pro.register .btn_confirm .btn_submit {background: #4472c4;}

}

@media (max-width:768px){
#wrapper {background: #fff;}
#container {width:100%;max-width:250.0000vw;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/*추가*/
.sub_w, .s_wrap{width:100%;margin:0 auto;}
.sub_title{font-size:5.8594vw;margin-bottom:3.9063vw}
.header_wrap{border-bottom: 0.1302vw solid #efefef;}
.register_before{padding:15.6250vw 5.2083vw 15.6250vw}
.register_before ul{display:block}
.register_before ul li{width:100%;}
.register_before ul li:last-of-type{width:100%;margin-left:0%;margin-top:2%;}
.register_before ul li .border{flex-direction: column;align-items: center;padding: 9.1146vw 0;border:0.1302vw solid #ccc;border-radius:1.5625vw}
.register_before ul li:last-of-type .border{border:0.1302vw solid #0c0c0c !important}
.register_before ul .title{font-size:3.6458vw;margin-bottom:1.3021vw}
.register_before ul span{font-size:2.3438vw}
.register_before .btn{width:20.1823vw;font-size:2.3438vw;line-height:6.5104vw;height:6.5104vw;background:#373737;border-radius:0.9115vw;margin-top:6.5104vw}
.register_pro #fregisterform{border-top: 0.2604vw solid #4472c4;}
.register_pro.register .btn_confirm .btn_submit {background: #4472c4;}

}

@media (max-width:480px){
#wrapper {background: #fff;}
#container {width:100%;max-width:400.0000vw;}
#container .is_index {margin-left:0;}
#container .shop-content {padding:0;}

/*추가*/
.sub_w, .s_wrap{width:100%;margin:0 auto;}
.sub_title{font-size:9.3750vw;margin-bottom:6.2500vw}
.header_wrap{border-bottom: 0.2083vw solid #efefef;}
.register_before{padding:25.0000vw 8.3333vw 25.0000vw}
.register_before ul{display:block}
.register_before ul li{width:100%;}
.register_before ul li:last-of-type{width:100%;margin-left:0%;margin-top:5%;}
.register_before ul li .border{flex-direction: column;align-items: center;padding: 12.5000vw 0;border:0.2083vw solid #ccc;border-radius:2.5000vw}
.register_before ul li:last-of-type .border{border:0.2083vw solid #0c0c0c !important}
.register_before ul .title{font-size:5.8333vw;margin-bottom:2.0833vw}
.register_before ul span{font-size:3.7500vw}
.register_before .btn{width:32.2917vw;font-size:3.7500vw;line-height:10.4167vw;height:10.4167vw;background:#373737;border-radius:1.4583vw;margin-top:10.4167vw}
.register_pro #fregisterform{border-top: 0.4167vw solid #4472c4;}
.register_pro.register .btn_confirm .btn_submit {background: #4472c4;}

}


</style>

<div class="register_before sub_w ">
    <ul>
        <li>
            <div class="border">
                <p class="title">일반 회원가입</p>
                <span>일반 회원가입에 대한 간략한 임시 문구입니다.</span>
                <a href="<?php echo G5_BBS_URL ?>/register.php" class="btn">회원가입</a>
            </div>
        </li>
        <li>
             <div class="border">
                <p class="title">상담실장 회원가입</p>
                <span>상담실장 회원가입에 대한 간략한 임시 문구입니다.</span>
                <a href="<?php echo G5_BBS_URL ?>/register2.php" class="btn">회원가입</a>
             </div>
        </li>
    </ul>
</div>


<?php
include_once(G5_SHOP_PATH.'/shop.tail.php');