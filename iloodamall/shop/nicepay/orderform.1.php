<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<script src="https://web.nicepay.co.kr/flex/js/nicepay_tr_utf.js" language="javascript"></script>

<script type="text/javascript">
<!--
    NicePayUpdate(); // Active-x Control 초기화

    function nicepay(f) {

        $('#display_pay_button').hide();
        $('#display_pay_process').show();

        // 필수 사항들을 체크하는 로직을 삽입해주세요.
        goPay(f);
    }

    /**
	결제 결과를 submit 합니다.
	알맞게 form을 수정하십시요.
    */
    function nicepaySubmit() {

        document.forderform.submit();
    }

    /**
    결제를 취소 할때 호출됩니다.
    */
    function nicepayClose() {

        $('#display_pay_button').show();
        $('#display_pay_process').hide();

        alert('결제가 취소 되었습니다');
    }
//-->
</script>