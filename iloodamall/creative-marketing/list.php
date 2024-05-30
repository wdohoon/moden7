<?php
include_once('../common.php');

if (!$member['mb_id']){
	alert("회원만 이용할 수 있습니다. 회원이시라면 로그인 후 이용해 보십시오.", G5_BBS_URL.'/login.php?url=/creative-marketing/list.php?ca_id=40');
}

$ca_id = isset($_REQUEST['ca_id']) ? safe_replace_regex($_REQUEST['ca_id'], 'ca_id') : '';
$skin = isset($_REQUEST['skin']) ? safe_replace_regex($_REQUEST['skin'], 'skin') : '';

// 상품 리스트에서 다른 필드로 정렬을 하려면 아래의 배열 코드에서 해당 필드를 추가하세요.
if( isset($sort) && ! in_array($sort, array('it_name', 'it_sum_qty', 'it_price', 'it_use_avg', 'it_use_cnt', 'it_update_time')) ){
    $sort='';
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/list.php');
    return;
}

$sql = " select * from {$g5['g5_shop_category_table']} where ca_id = '$ca_id' and ca_use = '1'  ";
$ca = sql_fetch($sql);
if (! (isset($ca['ca_id']) && $ca['ca_id']))
    alert('등록된 분류가 없습니다.');

// 테마미리보기 스킨 등의 변수 재설정
if(defined('_THEME_PREVIEW_') && _THEME_PREVIEW_ === true) {
    $ca['ca_skin']       = (isset($tconfig['ca_skin']) && $tconfig['ca_skin']) ? $tconfig['ca_skin'] : $ca['ca_skin'];
    $ca['ca_img_width']  = (isset($tconfig['ca_img_width']) && $tconfig['ca_img_width']) ? $tconfig['ca_img_width'] : $ca['ca_img_width'];
    $ca['ca_img_height'] = (isset($tconfig['ca_img_height']) && $tconfig['ca_img_height']) ? $tconfig['ca_img_height'] : $ca['ca_img_height'];
    $ca['ca_list_mod']   = (isset($tconfig['ca_list_mod']) && $tconfig['ca_list_mod']) ? $tconfig['ca_list_mod'] : $ca['ca_list_mod'];
    $ca['ca_list_row']   = (isset($tconfig['ca_list_row']) && $tconfig['ca_list_row']) ? $tconfig['ca_list_row'] : $ca['ca_list_row'];
}

// 본인인증, 성인인증체크
if(!$is_admin && $config['cf_cert_use']) {
    $msg = shop_member_cert_check($ca_id, 'list');
    if($msg)
        alert($msg, G5_SHOP_URL);
}

$g5['title'] = $ca['ca_name'].' 상품리스트';

if ($ca['ca_include_head'] && is_include_path_check($ca['ca_include_head']))
    @include_once($ca['ca_include_head']);
else
    include_once('../head2.php');

// 스킨경로
$skin_dir = G5_SHOP_SKIN_PATH;

if($ca['ca_skin_dir']) {
    if(preg_match('#^theme/(.+)$#', $ca['ca_skin_dir'], $match))
        $skin_dir = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/shop/'.$match[1];
    else
        $skin_dir = G5_PATH.'/'.G5_SKIN_DIR.'/shop/'.$ca['ca_skin_dir'];

    if(is_dir($skin_dir)) {
        $skin_file = $skin_dir.'/'.$ca['ca_skin'];

        if(!is_file($skin_file))
            $skin_dir = G5_SHOP_SKIN_PATH;
    } else {
        $skin_dir = G5_SHOP_SKIN_PATH;
    }
}

define('G5_SHOP_CSS_URL', str_replace(G5_PATH, G5_URL, $skin_dir));

if ($is_admin)
    echo '<div class="sct_admin"><a href="'.G5_ADMIN_URL.'/shop_admin/categoryform.php?w=u&amp;ca_id='.$ca_id.'" class="btn_admin btn"><span class="sound_only">분류 관리</span><i class="fa fa-cog fa-spin fa-fw"></i></a></div>';
?>
<!-- Link Swiper's CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" /> -->

<link rel="stylesheet" href="/js/swiper/swiper.min.css" media="all">
<script type="text/javascript" src="/js/swiper/swiper.min.js"></script>

<script>
var itemlist_ca_id = "<?php echo $ca_id; ?>";
</script>
<script src="<?php echo G5_JS_URL; ?>/shop.list.js"></script>

<style>
#sct {padding-top:120px;}
#sct .inner {width:100%;max-width:1320px;margin:0 auto;}
#sct .inner p {font-size: 60px;font-weight: 700;letter-spacing:-0.04em;margin-bottom: 50px;}

@media (max-width:1760px){
#sct {padding-top:6.8182vw;}
#sct .inner {}
#sct .inner p {font-size: 3.4091vw;letter-spacing:-0.04em;margin-bottom: 2.8409vw;}

}

@media (max-width:1600px){
#sct {padding-top:7.5000vw;}
#sct .inner {}
#sct .inner p {font-size: 3.7500vw;letter-spacing:-0.04em;margin-bottom: 3.1250vw;}

}

@media (max-width:1400px){
#sct {padding-top:8.5714vw;}
#sct .inner {}
#sct .inner p {font-size: 4.2857vw;letter-spacing:-0.04em;margin-bottom: 3.5714vw;}

}

@media (max-width:1024px){
#sct {padding-top:11.7188vw;}
#sct .inner {padding:0 5.8594vw;}
#sct .inner p {font-size: 5.8594vw;letter-spacing:-0.04em;margin-bottom: 4.8828vw;}

}

@media (max-width:768px){
#sct {padding-top:7.8125vw;}
#sct .inner {padding:0 2.6042vw;}
#sct .inner p {font-size: 7.8125vw;letter-spacing:-0.04em;margin-bottom: 6.5104vw;}

}

@media (max-width:480px){
#sct {padding-top:12.5000vw;}
#sct .inner {padding:0 4.1667vw;}
#sct .inner p {font-size: 8.7500vw;letter-spacing:-0.04em;margin-bottom: 10.4167vw;}

}

</style>
<?php
$list_name = 'Creative - Marketing';

?>

<style>
.tab_wrapper {width:1320px;margin:0 auto;}
.tab_ul {width:100%; text-align: center;margin:30px auto 0; display:flex; justify-content:flex-start; align-items:center; flex-wrap: wrap; gap:6px;}
.tab_ul li {}
.tab_ul li a {display: block; width: 126px; height: 40px; text-align: center;line-height: 40px;font-size: 16px; font-family: 'NanumSquareNeo'; margin-bottom: 1%; padding:0 4px; border: 1px solid #cfcfcf; color: #434343; background: #f9f8f6; border-radius:10px;}
.tab_ul li.on a{border: 1px solid #da1403; background: #da1403; color:#fff;}

@media (max-width:1760px)  {
.tab_wrapper{width: 75.0000vw; }
.tab_ul {width:100%; margin:1.7045vw auto 0; align-items:center; flex-wrap: wrap; gap:0.3409vw;}
.tab_ul li {}
.tab_ul li a { width: 7.1591vw; height: 2.2727vw; line-height: 2.2727vw;font-size: 0.9091vw;  margin-bottom: 1%; padding:0 0.2273vw; border: 0.0568vw solid #cfcfcf; border-radius:0.5682vw;}
.tab_ul li.on a{border: 0.0568vw solid #da1403;}
}

@media (max-width:1600px)  {
.tab_wrapper{width: 82.5000vw;}
.tab_ul {width:100%; margin:1.8750vw auto 0; align-items:center; flex-wrap: wrap; gap:0.3750vw;}
.tab_ul li {}
.tab_ul li a { width: 7.8750vw; height: 2.5000vw; line-height: 2.5000vw;font-size: 1.0000vw;  margin-bottom: 1%; padding:0 0.2500vw; border: 0.0625vw solid #cfcfcf; border-radius:0.6250vw;}
.tab_ul li.on a{border: 0.0625vw solid #da1403;}
}

@media (max-width:1400px)  {
.tab_wrapper{width: 94.2857vw;}
.tab_ul {width:100%; margin:2.1429vw auto 0; align-items:center; flex-wrap: wrap; gap:0.4286vw;}
.tab_ul li {}
.tab_ul li a { width: 9.0000vw; height: 2.8571vw; line-height: 2.8571vw;font-size: 1.1429vw;  margin-bottom: 1%; padding:0 0.2857vw; border: 0.0714vw solid #cfcfcf;  border-radius:0.7143vw;}
.tab_ul li.on a{border: 0.0714vw solid #da1403;}
}

@media (max-width:1024px)  {
.tab_wrapper{width: 100%;}
.tab_ul {width:100%; margin:2.9297vw auto 0; align-items:center; flex-wrap: wrap; gap:0.5859vw; justify-content:space-between}
.tab_ul li {}
.tab_ul li a { width: 12.3047vw; height: 3.9063vw; line-height: 3.9063vw;font-size: 1.5625vw;  margin-bottom: 1%; padding:0 0.3906vw; border: 0.0977vw solid #cfcfcf;  border-radius:0.9766vw;}
.tab_ul li.on a{border: 0.0977vw solid #da1403;}
}

@media (max-width:768px)  {
.tab_wrapper{width: 100%;}
.tab_ul{width:100%; margin:3.9063vw auto 0; align-items:center; flex-wrap: wrap; gap:0.7813vw; justify-content:center}
.tab_ul li a{width: 16.4063vw;height: 5.2083vw;line-height: 5.2083vw;font-size: 2.2135vw;background: #fff;border:0.1302vw solid #a0a7ad; margin-bottom: 1%; padding:0 0.5208vw;}
.tab_ul li.on a{border: 0.1302vw solid #da1403;}
}

@media (max-width:480px)  {
.tab_wrapper{width: 100%;}
.tab_ul{width:100%; margin:6.2500vw auto 0; align-items:center; flex-wrap: wrap; gap:1.2500vw;}
.tab_ul li a{width: 26.2500vw;height: 8.3333vw;line-height: 8.3333vw;font-size: 3.5417vw;background: #fff;border:0.2083vw solid #a0a7ad; margin-bottom: 1%; padding:0 0.8333vw;}
.tab_ul li.on a{border: 0.2083vw solid #da1403;}
}

</style>



<!-- 상품 목록 시작 { -->
<div id="sct">
	<div class="inner" style="">
		<!-- <p><?php echo $list_name;?></p> -->

		<!-- <div class="tab_wrapper">
      <ul class="tab_ul">
        <li class="<?php if($ca_id == '40') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=40">All</a></li>
        <li class="<?php if($ca_id == '4010') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=4010">reepot</a></li>
        <li class="<?php if($ca_id == '4020') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=4020">cuRAS hybrid</a></li>
        <li class="<?php if($ca_id == '4030') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=4030">Pento</a></li>
        <li class="<?php if($ca_id == '4040') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=4040">N.core 3D</a></li>
        <li class="<?php if($ca_id == '4050') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=4050">Secret DUO</a></li>
        <li class="<?php if($ca_id == '4060') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=4060">VELOCE</a></li>
        <li class="<?php if($ca_id == '4070') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=4070">fraxis DUO</a></li>
        <li class="<?php if($ca_id == '4080') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=4080">secret RF</a></li>
        <li class="<?php if($ca_id == '4090') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=4090">acutron</a></li>
        <li class="<?php if($ca_id == '40a0') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=40a0">hyzer me</a></li>
        <li class="<?php if($ca_id == '40b0') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=40b0">cure.J</a></li>
        <li class="<?php if($ca_id == '40c0') echo 'on';?>"><a href="/creative-marketing/list.php?ca_id=40c0">Reticapture</a></li>
      </ul>
    </div> -->
	</div>
    <?php
    $nav_skin = $skin_dir.'/navigation.skin.php';
    if(!is_file($nav_skin))
        $nav_skin = G5_SHOP_SKIN_PATH.'/navigation.skin.php';
    //include $nav_skin;

    // 상단 HTML
    echo '<div id="sct_hhtml">'.conv_content($ca['ca_head_html'], 1).'</div>';

    $cate_skin = $skin_dir.'/listcategory.skin.php';
    if(!is_file($cate_skin))
        $cate_skin = G5_SHOP_SKIN_PATH.'/listcategory.skin.php';
    //include $cate_skin;

    // 상품 출력순서가 있다면
    if ($sort != "")
        $order_by = $sort.' '.$sortodr.' , it_order, it_id desc';
    else
        $order_by = 'it_order, it_id desc';

    $error = '<p class="sct_noitem">등록된 상품이 없습니다.</p>';

    // 리스트 스킨
    $skin_file = '../creative-marketing/skin/list.10.skin.php';

    if (file_exists($skin_file)) {

		echo '<div id="sct_sortlst" style="display:none;">';
        $sort_skin = $skin_dir.'/list.sort.skin.php';
        if(!is_file($sort_skin))
            $sort_skin = G5_SHOP_SKIN_PATH.'/list.sort.skin.php';
        //include $sort_skin;

        // 상품 보기 타입 변경 버튼
        $sub_skin = $skin_dir.'/list.sub.skin.php';
        if(!is_file($sub_skin))
            $sub_skin = G5_SHOP_SKIN_PATH.'/list.sub.skin.php';
        //include $sub_skin;
        echo '</div>';

        // 총몇개 = 한줄에 몇개 * 몇줄
        $items = $ca['ca_list_mod'] * $ca['ca_list_row'];
        // 페이지가 없으면 첫 페이지 (1 페이지)
        if ($page < 1) $page = 1;
        // 시작 레코드 구함
        $from_record = ($page - 1) * $items;

        $list = new item_list($skin_file, $ca['ca_list_mod'], $ca['ca_list_row'], $ca['ca_img_width'], $ca['ca_img_height']);
        $list->set_category($ca['ca_id'], 1);
        $list->set_category($ca['ca_id'], 2);
        $list->set_category($ca['ca_id'], 3);
        $list->set_is_page(true);
        $list->set_order_by($order_by);
        $list->set_from_record($from_record);
        $list->set_view('it_img', true);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        echo $list->run();

        // where 된 전체 상품수
        $total_count = $list->total_count;
        // 전체 페이지 계산
        $total_page  = ceil($total_count / $items);
    }
    else
    {
        echo '<div class="sct_nofile">'.str_replace(G5_PATH.'/', '', $skin_file).' 파일을 찾을 수 없습니다.<br>관리자에게 알려주시면 감사하겠습니다.</div>';
    }

    $qstr1 = 'ca_id='.$ca_id;
    $qstr1 .='&amp;sort='.$sort.'&amp;sortodr='.$sortodr;
    echo get_paging($config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr1.'&amp;page=');

    // 하단 HTML
    echo '<div id="sct_thtml">'.conv_content($ca['ca_tail_html'], 1).'</div>';

?>
</div>
<!-- } 상품 목록 끝 -->

<!-- Swiper JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> -->

<script>
const Swiper_1 = new Swiper('.slidebanner', {
	slidesPerView: 'auto',
	centeredSlides: true,
	loop:true,
	speed: 1000,
	spaceBetween: 20,
	autoplay: {     //자동슬라이드 (false-비활성화)
	  delay: 2000, // 시간 설정
	  disableOnInteraction: false, // false-스와이프 후 자동 재생
	},
	pagination: {   //페이징 사용자 설정
		el: ".pagination_fraction",   //페이징 태그 클래스 설정
		type : 'fraction'
	},
	navigation: {
		nextEl: '.next',
		prevEl: '.prev',
	},
});
</script>

<?php
if ($ca['ca_include_tail'] && is_include_path_check($ca['ca_include_tail']))
    @include_once($ca['ca_include_tail']);
else
    include_once('../tail2.php');

echo "\n<!-- {$ca['ca_skin']} -->\n";