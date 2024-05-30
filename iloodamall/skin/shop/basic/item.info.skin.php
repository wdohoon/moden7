<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_CSS_URL.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<style>
#sit_inf_explan{
	font-size:1.2em;
}
@media (max-width:768px){

.sit_info .tr_price td{text-align: right;}
.sit_ov_tbl td{text-align: right;}

}
</style>

<?php if ($default['de_rel_list_use']) { ?>
<!-- 관련상품 시작 { -->
<section id="sit_rel">
    <h2>관련상품</h2>
    <?php
    $rel_skin_file = $skin_dir.'/'.$default['de_rel_list_skin'];
    if(!is_file($rel_skin_file))
        $rel_skin_file = G5_SHOP_SKIN_PATH.'/'.$default['de_rel_list_skin'];

    $sql = " select b.* from {$g5['g5_shop_item_relation_table']} a left join {$g5['g5_shop_item_table']} b on (a.it_id2=b.it_id) where a.it_id = '{$it['it_id']}' and b.it_use='1' ";
    $list = new item_list($rel_skin_file, $default['de_rel_list_mod'], 0, $default['de_rel_img_width'], $default['de_rel_img_height']);
    $list->set_query($sql);
    echo $list->run();
    ?>
</section>
<!-- } 관련상품 끝 -->
<?php } ?>

<section id="sit_info" style="<?php if($it['ca_id'] == '10') echo 'display:none'?>">
	<div id="sit_tab">
	    <ul class="tab_tit">
	        <li><button type="button" id="btn_sit_inf" rel="#sit_inf" class="selected">제품상세</button></li>
	        <li><button type="button" id="btn_sit_qa" rel="#sit_qa">상품문의  <span class="item_qa_count"><?php echo $item_qa_count; ?></span></button></li>
	        <li><button type="button" id="btn_sit_dvex" rel="#sit_dex">배송정보</button></li>
	        <li><button type="button" id="btn_sit_use" rel="#sit_use">교환/배송 <!-- <span class="item_use_count"><?php //echo $item_use_count; ?></span> --></button></li>
	    </ul>
	    <ul class="tab_con">
	
	        <!-- 상품 정보 시작 { -->
	        <li id="sit_inf">
	            <h2 class="contents_tit"><span>상품 정보</span></h2>
	
	            <?php if ($it['it_explan']) { // 상품 상세설명 ?>
	            <h3>상품 상세설명</h3>
	            <div id="sit_inf_explan">

	                <?php echo conv_content($it['it_explan'], 1); ?>
	            </div>
	            <?php } ?>
	
	            <?php
	            if ($it['it_info_value']) { // 상품 정보 고시
	                $info_data = unserialize(stripslashes($it['it_info_value']));
	                if(is_array($info_data)) {
	                    $gubun = $it['it_info_gubun'];
	                    $info_array = $item_info[$gubun]['article'];
	            ?>
	            <h3>상품 정보 고시</h3>
	            <table id="sit_inf_open" style="display: none;">
	            <tbody>
	            <?php
	            foreach($info_data as $key=>$val) {
	                $ii_title = $info_array[$key][0];
	                $ii_value = $val;
	            ?>
	            <tr>
	                <th scope="row"><?php echo $ii_title; ?></th>
	                <td><?php echo $ii_value; ?></td>
	            </tr>
	            <?php } //foreach?>
	            </tbody>
	            </table>
	            <!-- 상품정보고시 end -->
	            <?php
	                } else {
	                    if($is_admin) {
	                        echo '<p>상품 정보 고시 정보가 올바르게 저장되지 않았습니다.<br>config.php 파일의 G5_ESCAPE_FUNCTION 설정을 addslashes 로<br>변경하신 후 관리자 &gt; 상품정보 수정에서 상품 정보를 다시 저장해주세요. </p>';
	                    }
	                }
	            } //if
	            ?>
	
	        </li>
	        <!-- 사용후기 시작 { -->
	        <li id="sit_use" >
	            <h2>교환/반품</h2>
	            <!-- <div id="itemuse"><?php //include_once(G5_SHOP_PATH.'/itemuse.php'); ?></div> -->
		     <?php if ($default['de_change_content']) { // 교환/반품 내용이 있다면 ?>
	            <!-- 교환 시작 { -->
	            <div id="sit_dvr">
	               <!--  <h3>교환</h3> -->
	                <?php echo conv_content($default['de_change_content'], 1); ?>
	            </div>
	            <!-- } 교환 끝 -->
	            <?php } ?>
	        </li>
	        <!-- } 사용후기 끝 -->
	
	        <!-- 상품문의 시작 { -->
	        <li id="sit_qa">
	            <h2>상품문의</h2>
	            <div id="itemqa"><?php include_once(G5_SHOP_PATH.'/itemqa.php'); ?></div>
	        </li>
	        <!-- } 상품문의 끝 -->
	        
	        <!-- 배송/교환 시작 { -->
	        <li id="sit_dex">
	            <!-- <h2>배송/교환정보</h2> -->
	            
	            <?php if ($default['de_baesong_content']) { // 배송정보 내용이 있다면 ?>
	            <!-- 배송 시작 { -->
	            <div id="sit_dvr">
	                <!-- <h3>배송</h3> -->
	                <?php echo conv_content($default['de_baesong_content'], 1); ?>
<!-- 			[주문 및 입금안내]
			​
			*모든 주문은 결제 및 입금완료가 되어야 제품 준비 후 배송이되며 결제순으로 배송이 됩니다.
			*주말 공동구매 상품 및 소량인 제품, 특수한 제작상품의 경우 무통장 주문서는 4시간 내에 입금이 완료되지 않으면 주문서는 자동 삭제됩니다.
			(이런 제품의 경우 상세설명에 미리 공지해 드리고 있습니다.)
			부득이한 상황으로 입금이 어려워 주문서 홀드 요청해 주시는 경우엔 정확한 기일을 말씀해 주셔야 홀드가 가능합니다.
			*주말 및 공휴일에는 입금 확인이 지연되는 경우가 있는 점 양해 부탁드립니다.(입금확인 처리가 되지 않아도 입금을 하신 경우에는 주문서가 삭제되지는 않습니다)
			*주문자와 입금자가 상이한 경우 꼭 입금자명을 기입해 주세요(주문이 입금 확인이 하루이상 되지 않는 경우 공지사항에 입금자를 찾습니다를 참고해주세요)
			
			
			[배송안내]
			
			저희 0000는 제작 또는 주문후 상품이 입고되는 방식으로 운영되고 있습니다. 
			배송 시일은 제품 구매일로부터 2~7일 이내에 발송되며, 우체국택배(1588-1300)로 배송해 드리고 있습니다.
			단, 수입제품 같은 예약상품이나 제작상품의 경우 바로 배송이 되지 않는 경우 상세설명에 미리 공지해 드리고 있습니다.
			*일반상품의 경우 결제완료후 2~7일 이내 배송*배송지연이 공지된 상품은 결제순으로 순차적으로 발송해 드리고 있으며, 세페이지에 공지 후 지연이 될 경우 따로 연락드리고 있습니다
			
			*공동구매, 뮤리엘라빈 제작상품의 경우 상세설명에 배송 시작일을 미리 공지해 드리고 있으며 결제순으로 순차적으로 배송됩니다.(신규상품이 아닌 경우 대부분의 제작상품은 바로배송 됩니다)
			*슈즈의 경우 대부분의 상품이 수제화로 주문완료 후 주말제외 약 7~10일 정도 소요됩니다.*코스메틱 제품은 대부분의 제품이 바로 배송이 가능하며 수입 브랜드들의 특성상 재수입 되는 제품에 한해서만 
			시일이 조금 소요되는 점 양해 부탁드리겠습니다.*재고가 확보되어 있는 제품의 경우 바로 배송이 되며 1:1게시판으로 문의 주시면 됩니다.
			(단품주문시 빠른배송가능)*7만원 이상 구매시 무료배송이며 7만원 미만인 경우 배송비 3,000원이 부과됩니다.
			※기본적으로 묶음 배송처리 되고 있으며 부분 배송을 원하시는 경우 주문메세지나 1:1게시판으로 말씀해 주셔야 합니다.
			*부분배송시 - 발송되는 상품금액 기준으로 7만원 이상 금액에 맞춰 무료로 배송이 가능하며 발송금액 7만원 미만인 경우 3천원의 배송비가 부과됩니다.
			부분배송 후 반품시에는 나머지 상품 금액에 따라 초기 배송비가 따로 부과될 수 있습니다.*품절관련주문후 입고되는 사입 제품의 경우 준비되는 과정에서 품절이 발생되기도 하는 점 양해 부탁드리며 
			품절로 확인되는 경우 별도로 안내드린 후 취소나 변경으로 처리해 드리고 있습니다.*취소나 주문 변경을 원하시는 경우는 배송전에만 가능하며 오전중으로 말씀해 주셔야 당일 적용됩니다.
			주문 취소나 사이즈 및 컬러 변경 요청을 하셔도 이미 배송된 상태라면 처리가 불가능합니다.송장번호 입력은 모두 배송이 끝난 후 입력이 되기에 주문서에는 
			배송전으로 표시 되더라도 배송이 완료된 상태일 수 있습니다.※수제화의 경우 배송전 이어도 이미 사이즈 컬러가 주문이 들어간 상태에서 변경이나 취소가 불가능한 점 참고하여 주세요
			
			
			[해외배송]
			
			*해외 배송은 EMS 서비스를 통해 배송해 드리고 있습니다.*주문은 제품 금액만 먼저 결제해 주신 후(무통장 입금의 경우 국내은행에 입금확인 된 후)에 꼭 1:1게시판 또는 주문메세지에 
			받으실 해외 배송지 주소와 POSTAL CODE, 현지 연락 가능한연락처(EMS경우 현지 연락처가 없으면 발송이 제한됩니다)를 남겨주세요*해외 배송비는 저희가 제품 무게 측정 후 해외배송비를 
			개인 결제창으로 열어드리면 결제해 주시면 됩니다(간혹 무게 측정이 우체국과 상이하여 금액을 초과 결제하신 경우에는 안내후 적립금으로 차액을 넣어드리고 있습니다)
			=> EMS요금표링크*해외에서 주문하시는 고객님들께는 이메일로 연락을 드리고 있으니 수시로 이메일 또는 질문하신 1:1게시판을 확인해 주세요[배송추적]저희 몰은 마이페이지에서 
			배송추적 서비스를 제공하고 있으며, 배송조회하기 버튼 클릭 후 우체국택배 사이트에서 송장번호를 입력하시면 배송조회가 가능합니다. -->
	            </div>
	            <!-- } 배송 끝 -->
	            <?php } ?>
	
	           
	            
	        </li>
	        <!-- } 배송/교환  끝 -->
	    </ul>
	</div>
	<script>
	$(function (){
	    $(".tab_con>li").hide();
	    $(".tab_con>li:first").show();   
	    $(".tab_tit li button").click(function(){
	        $(".tab_tit li button").removeClass("selected");
	        $(this).addClass("selected");
	        $(".tab_con>li").hide();
	        $($(this).attr("rel")).show();
	    });
	});
	</script>
	<div id="sit_buy" class="fix" style="display: none;">
		<div class="sit_buy_inner">
	        <?php if($option_item) {    // 선택옵션이 있다면 ?>
	        <!-- 선택옵션 시작 { -->
	        <section class="sit_side_option">
	            <h3>선택옵션</h3>
	            <?php // 선택옵션
	            echo str_replace(array('class="get_item_options"', 'id="it_option_', 'class="it_option"'), array('class="get_side_item_options"', 'id="it_side_option_', 'class="it_side_option"'), $option_item);
	            ?>
	        </section>
	        <!-- } 선택옵션 끝 -->
	        <?php } // end if?>

            <?php if($supply_item) {    // 추가옵션이 있다면 ?>
	        <!-- 추가옵션 시작 { -->
	        <section class="sit_side_option">
	            <h3>추가옵션</h3>
	            <?php // 추가옵션
	            echo str_replace(array('id="it_supply_', 'class="it_supply"'), array('id="it_side_supply_', 'class="it_side_supply"'), $supply_item);
	            ?>
	        </section>
	        <!-- } 추가옵션 끝 -->
	        <?php } // end if?>
            
            <?php if ($is_orderable) { ?>
	        <!-- 선택된 옵션 시작 { -->
	        <section class="sit_sel_option">
	            <h3>선택된 옵션</h3>
	            <ul class="sit_opt_added">
                    <?php if( !$option_item ){ ?>
                    <li>
                        <div class="opt_name">
                            <span class="sit_opt_subj"><?php echo $it['it_name']; ?></span>
                        </div>
                        <div class="opt_count">
                            <label for="ct_qty_<?php echo $i; ?>" class="sound_only">수량</label>
                            <button type="button" class="sit_qty_minus"><i class="fa fa-minus" aria-hidden="true"></i><span class="sound_only">감소</span></button>
                            <input type="text" name="ct_copy_qty[<?php echo $it_id; ?>][]" value="<?php echo $it['it_buy_min_qty']; ?>" id="ct_qty_<?php echo $i; ?>" class="num_input" size="5">
                            <button type="button" class="sit_qty_plus"><i class="fa fa-plus" aria-hidden="true"></i><span class="sound_only">증가</span></button>
                            <span class="sit_opt_prc">+0원</span>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
	        </section>
	        <!-- } 선택된 옵션 끝 -->

			<div class="sum_section">        
		        <div class="sit_tot_price"></div>
				
				<div class="sit_order_btn">
					<button type="submit" onclick="document.pressed=this.value;" value="장바구니" class="sit_btn_cart">장바구니</button>
		            <button type="submit" onclick="document.pressed=this.value;" value="바로구매" class="sit_btn_buy">바로구매</button> 
		       </div>
			</div>
            <?php } ?>
			
	    </div>   
	</div>
</section>

<?php if($it['it_link']){ ?>
<!-- <a href="<?php echo $it['it_link']; ?>" class="maxbottombtn" target="_blank">브랜드사이트 바로가기</a> -->
<?php } ?>

<script>
jQuery(function($){
    var change_name = "ct_copy_qty";

    $(document).on("select_it_option_change", "select.it_option", function(e, $othis) {
        var value = $othis.val(),
            change_id = $othis.attr("id").replace("it_option_", "it_side_option_");
        
        if( $("#"+change_id).length ){
            $("#"+change_id).val(value).attr("selected", "selected");
        }
    });

    $(document).on("select_it_option_post", "select.it_option", function(e, $othis, idx, sel_count, data) {
        var value = $othis.val(),
            change_id = $othis.attr("id").replace("it_option_", "it_side_option_");
        
        $("select.it_side_option").eq(idx+1).empty().html(data).attr("disabled", false);

        // select의 옵션이 변경됐을 경우 하위 옵션 disabled
        if( (idx+1) < sel_count) {
            $("select.it_side_option:gt("+(idx+1)+")").val("").attr("disabled", true);
        }
    });

    $(document).on("add_sit_sel_option", "#sit_sel_option", function(e, opt) {
        
        opt = opt.replace('name="ct_qty[', 'name="'+change_name+'[');

        var $opt = $(opt);
        $opt.removeClass("sit_opt_list");
        $("input[type=hidden]", $opt).remove();

        $(".sit_sel_option .sit_opt_added").append($opt);

    });

    $(document).on("price_calculate", "#sit_tot_price", function(e, total) {

        $(".sum_section .sit_tot_price").empty().html("<span>총 금액 </span><strong>"+number_format(String(total))+"</strong> 원");

    });

    $(".sit_side_option").on("change", "select.it_side_option", function(e) {
        var idx = $("select.it_side_option").index($(this)),
            value = $(this).val();

        if( value ){
            if (typeof(option_add) != "undefined"){
                option_add = true;
            }

            $("select.it_option").eq(idx).val(value).attr("selected", "selected").trigger("change");
        }
    });

    $(".sit_side_option").on("change", "select.it_side_supply", function(e) {
        var value = $(this).val();

        if( value ){
            if (typeof(supply_add) != "undefined"){
                supply_add = true;
            }

            $("select.it_supply").val(value).attr("selected", "selected").trigger("change");
        }
    });

    $(".sit_opt_added").on("click", "button", function(e){
        e.preventDefault();

        var $this = $(this),
            mode = $this.text(),
            $sit_sel_el = $("#sit_sel_option"),
            li_parent_index = $this.closest('li').index();
        
        if( ! $sit_sel_el.length ){
            alert("el 에러");
            return false;
        }

        switch(mode) {
            case "증가":
                $sit_sel_el.find("li").eq(li_parent_index).find(".sit_qty_plus").trigger("click");
                break;
            case "감소":
                $sit_sel_el.find("li").eq(li_parent_index).find(".sit_qty_minus").trigger("click");
                break;
            case "삭제":
                $sit_sel_el.find("li").eq(li_parent_index).find(".sit_opt_del").trigger("click");
                break;
        }

    });

    $(document).on("sit_sel_option_success", "#sit_sel_option li button", function(e, $othis, mode, this_qty) {
        var ori_index = $othis.closest('li').index();

        switch(mode) {
            case "증가":
            case "감소":
                $(".sit_opt_added li").eq(ori_index).find("input[name^=ct_copy_qty]").val(this_qty);
                break;
            case "삭제":
                $(".sit_opt_added li").eq(ori_index).remove();
                break;
        }
    });

    $(document).on("change_option_qty", "input[name^=ct_qty]", function(e, $othis, val, force_val) {
        var $this = $(this),
            ori_index = $othis.closest('li').index(),
            this_val = force_val ? force_val : val;

        $(".sit_opt_added").find("li").eq(ori_index).find("input[name^="+change_name+"]").val(this_val);
    });

    $(".sit_opt_added").on("keyup paste", "input[name^="+change_name+"]", function(e) {
         var $this = $(this),
             val= $this.val(),
             this_index = $("input[name^="+change_name+"]").index(this);

         $("input[name^=ct_qty]").eq(this_index).val(val).trigger("keyup");
    });

    $(".sit_order_btn").on("click", "button", function(e){
        e.preventDefault();

        var $this = $(this);

        if( $this.hasClass("sit_btn_cart") ){
            $("#sit_ov_btn .sit_btn_cart").trigger("click");
        } else if ( $this.hasClass("sit_btn_buy") ) {
            $("#sit_ov_btn .sit_btn_buy").trigger("click");
        }
    });

	if (window.location.href.split("#").length > 1) {
		let id = window.location.href.split("#")[1];
		$("#btn_" + id).trigger("click");
	};
});
</script>