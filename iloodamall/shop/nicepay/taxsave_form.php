<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<script>
    // 현금영수증 MAIN FUNC
    function  jsf__pay_cash( form )
    {
        jsf__show_progress(true);

        if ( jsf__chk_cash( form ) == false )
        {
            jsf__show_progress(false);
            return;
        }

        form.submit();
    }

    // 진행 바
    function  jsf__show_progress( show )
    {
        if ( show == true )
        {
            window.show_pay_btn.style.display  = "none";
            window.show_progress.style.display = "inline";
        }
        else
        {
            window.show_pay_btn.style.display  = "inline";
            window.show_progress.style.display = "none";
        }
    }

    // 포맷 체크
    function  jsf__chk_cash( form )
    {
        if (  form.ReceiptType[0].checked )
        {
            if ( form.ReceiptTypeNo.value.length != 10 &&
                 form.ReceiptTypeNo.value.length != 11 &&
                 form.ReceiptTypeNo.value.length != 13 )
            {
                alert("주민번호 또는 휴대폰번호를 정확히 입력해 주시기 바랍니다.");
                form.ReceiptTypeNo.select();
                form.ReceiptTypeNo.focus();
                return false;
            }
        }
        else if (  form.ReceiptType[1].checked )
        {
            if ( form.ReceiptTypeNo.value.length != 10 )
            {
                alert("사업자번호를 정확히 입력해 주시기 바랍니다.");
                form.ReceiptTypeNo.select();
                form.ReceiptTypeNo.focus();
                return false;
            }
        }
        return true;
    }

    function  jsf__chk_ReceiptType( form )
    {
        var span_ReceiptType_1 = document.getElementById( "span_ReceiptType_1" );
        var span_ReceiptType_2 = document.getElementById( "span_ReceiptType_2" );

        if ( form.ReceiptType[0].checked )
        {
            span_ReceiptType_1.style.display = "inline";
            span_ReceiptType_2.style.display = "none";
        }
        else if (form.ReceiptType[1].checked )
        {
            span_ReceiptType_1.style.display = "none";
            span_ReceiptType_2.style.display = "inline";
        }
    }

</script>

<div id="scash" class="new_win">
    <h1 id="win_title"><?php echo $g5['title']; ?></h1>

    <section>
        <h2>주문정보</h2>

        <div class="tbl_head01 tbl_wrap">
            <table>
            <colgroup>
                <col class="grid_3">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <th scope="row">주문 번호</th>
                <td><?php echo $od_id; ?></td>
            </tr>
            <tr>
                <th scope="row">상품 정보</th>
                <td><?php echo $goods_name; ?></td>
            </tr>
            <tr>
                <th scope="row">주문자 이름</th>
                <td><?php echo $od_name; ?></td>
            </tr>
            <tr>
                <th scope="row">주문자 E-Mail</th>
                <td><?php echo $od_email; ?></td>
            </tr>
            <tr>
                <th scope="row">주문자 전화번호</th>
                <td><?php echo $od_tel; ?></td>
            </tr>
            </tbody>
            </table>
        </div>
    </section>

    <section>
        <h2>현금영수증 발급 정보</h2>

        <form method="post" action="<?php echo G5_SHOP_URL; ?>/nicepay/taxsave_result.php">
        <input type="hidden" name="tx"               value="<?php echo $tx; ?>">
        <input type="hidden" name="Moid"             value="<?php echo $od_id; ?>">
        <input type="hidden" name="BuyerName"        value="<?php echo $od_name; ?>">
        <input type="hidden" name="GoodsName"        value="<?php echo addslashes($goods_name); ?>">
        <input type="hidden" name="PayMethod"        value="CASHRCPT">
        <input type="hidden" name="ReceiptSubNum"    value=""> <!-- 서브몰사업자번호 -->
        <input type="hidden" name="ReceiptSubCoNm"   value=""> <!-- 서브몰사업자 상호 -->
        <input type="hidden" name="ReceiptSubBossNm" value=""> <!-- 서브몰사업자 대표자 -->
        <input type="hidden" name="ReceiptSubTel"    value=""> <!-- 서브몰사업자 전화번호 -->
        
        <div class="tbl_head01 tbl_wrap">
            <table>
            <colgroup>
                <col class="grid_3">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <th scope="row">원 거래 시각</th>
                <td><?php echo $trad_time; ?></td>
            </tr>
            <tr>
                <th scope="row">발행 용도</th>
                <td>
                    <input type="radio" name="ReceiptType" value="1" id="ReceiptType1" onClick="jsf__chk_ReceiptType( this.form )" checked>
                    <label for="ReceiptType1">소득공제용</label>
                    <input type="radio" name="ReceiptType" value="2" id="ReceiptType2" onClick="jsf__chk_ReceiptType( this.form )">
                    <label for="ReceiptType2">지출증빙용</label>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="ReceiptTypeNo">
                        <span id="span_ReceiptType_1" style="display:inline">주민(휴대폰)번호</span>
                        <span id="span_ReceiptType_2" style="display:none">사업자번호</span>
                    </label>
                </th>
                <td>
                    <div style="margin:2px 0 3px">(국세청현금영수증 Site에서 등록한 주민번호 또는 휴대폰 번호 등)</div>
                    <input type="text" name="ReceiptTypeNo" id="ReceiptTypeNo" class="frm_input" size="16" maxlength="13"> ("-" 생략)
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="BuyerEmail">이메일</label></th>
                <td><input type="text" name="BuyerEmail" id="BuyerEmail" value="<?php echo $od_email; ?>" required class="required frm_input" size="30"></td>
            </tr>
            <tr>
                <th scope="row">거래금액 총합</th>
                <td>
                    <?php echo number_format($amt_tot); ?>원
                </td>
            </tr>
            <tr>
                <th scope="row">공급가액</th>
                <td>
                    <?php echo number_format($amt_sup); ?>원<!-- ((거래금액 총합 * 10) / 11) -->
                </td>
            </tr>
            <tr>
                <th scope="row">봉사료</th>
                <td>
                    <?php echo number_format($amt_svc); ?>원
                </td>
            </tr>
            <tr>
                <th scope="row">부가가치세</th>
                <td>
                    <?php echo number_format($amt_tax); ?>원<!-- 거래금액 총합 - 공급가액 - 봉사료 -->
                </td>
            </tr>
            </tbody>
            </table>
        </div>

        <div id="scash_apply">
            <span id="show_pay_btn">
                <button type="button" onclick="jsf__pay_cash( this.form )">등록요청</button>
            </span>
            <span id="show_progress" style="display:none">
                <b>등록 진행중입니다. 잠시만 기다려주십시오</b>
            </span>
        </div>

        </form>
    </section>

</div>