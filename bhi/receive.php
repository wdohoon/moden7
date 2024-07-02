<?php
include_once('./_common.php');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

include_once(G5_PATH.'/head.php');
include_once "./lib/db.class.php";

$DB_LP = new DBCLASS;

$mb_no = $member['mb_no'];

$mapQry = "SELECT * FROM wallet_address WHERE no = '$mb_no';";
$DB_LP->select($mapQry);
$row = $DB_LP->get_data();

$btc_addr = $row->bit;
$eth_addr = $row->eth;
$trx_addr = $row->trx;
$erc_addr = $row->eth; 
$trc_addr = $row->trx; 
$bec_addr = $row->binance;

$DB_LP->close();
?>
<style>
.btns .btn1.bg-red a{color: #fff;}
.jasan{display: none;}
body{background: #F1F1F5;}
.my_container{width: 67vw;margin:4vw auto;background:#fff;padding:2vw;border-radius:16px;}
.header .left{display: flex;justify-content:center;align-items:center;}
.header h2{font-size: 28px;font-weight: 600;line-height: 38px;letter-spacing: -0.025em;text-align: center;padding-bottom:20px;}
.receive{background: #F6F6F6;border-radius:16px;}
.mycode{width: 80%;margin:0 auto;padding:50px 0;}
.mb15{margin: 20px 0;}
.select{width: 100%;}
.jasan h3{margin-bottom:30px;}
.mycode .btns .btn1{margin:40px 0;border-radius:8px;width: 240px;height: 48px;font-size: 16px;font-weight: 600;line-height: 24px;letter-spacing: -0.025em;text-align: center;}
.inp{width: 50%;margin-top:10px;}
.mb10{display: flex;justify-content:center;}
@media screen and (max-width: 1024px) {
    .my_container{width: 90%;}
    .mycode{width: 90%;}
}
</style>  
<div class="my_container">
    <div class="header">
        <a href="javascript:history.back();" class="prev"><img src="/img/vector.png" alt=""></a>
        <div class="left">
        </div>
        <h2>받기</h2>
    </div>

    <div class="receive">
        <div class="mycode">
            <h3 class="h3">전송 받으실 자산을 선택해 주세요.</h3>
            <div class="mb15">
                <select class="select">
                    <option value="btc">BTC</option>
                    <option value="eth">ETH</option>
                    <option value="trx">TRX</option>
                    <option value="erc">USDT(ERC-20)</option>
                    <option value="trc">USDT(TRC-20)</option>
                    <!-- <option value="bec">USDT(BEC-20)</option> -->
                </select>
            </div>
            <!-- btc box -->
            <div class="ex_btc jasan">
                <h3 class="h3">나의 - BTC 주소</h3>
                <div class="qr"><img src="img/common/qr.png"></div>
                <div class="mb10"><input type="text" class="inp btc" value="<?php echo $btc_addr;?>" readonly></div>
                <div class="btns">
                    <button class="btn1 btn-s copy-btn" data-address="<?php echo $btc_addr;?>">복사하기</button>
                </div>
            </div>
            <!-- eth box -->
            <div class="ex_eth jasan">
                <h3 class="h3">나의 - ETH 주소</h3>
                <div class="qr"><img src="img/common/qr.png"></div>
                <div class="mb10"><input type="text" class="inp eth" value="<?php echo $eth_addr;?>" readonly></div>
                <div class="btns">
                    <button class="btn1 btn-s copy-btn" data-address="<?php echo $eth_addr;?>">복사하기</button>
                </div>
            </div>

            <!-- trx box -->
            <div class="ex_trx jasan">
                <h3 class="h3">나의 - TRX 주소</h3>
                <div class="qr"><img src="img/common/qr.png"></div>
                <div class="mb10"><input type="text" class="inp trx" value="<?php echo $trx_addr;?>" readonly></div>
                <div class="btns">
                    <button class="btn1 btn-s copy-btn" data-address="<?php echo $trx_addr;?>">복사하기</button>
                </div>
            </div>

            <!-- usdt box -->
            <div class="ex_erc jasan">
                <h3 class="h3">나의 - USDT(ERC-20) 주소</h3>
                <div class="qr"><img src="img/common/qr.png"></div>
                <div class="mb10"><input type="text" class="inp usdt" value="<?php echo $erc_addr;?>" readonly></div>
                <div class="btns">
                    <button class="btn1 btn-s copy-btn" data-address="<?php echo $erc_addr;?>">복사하기</button>
                </div>
            </div>
            <div class="ex_trc jasan">
                <h3 class="h3">나의 - USDT(TRC-20) 주소</h3>
                <div class="qr"><img src="img/common/qr.png"></div>
                <div class="mb10"><input type="text" class="inp usdt" value="<?php echo $trc_addr;?>" readonly></div>
                <div class="btns">
                    <button class="btn1 btn-s copy-btn" data-address="<?php echo $trc_addr;?>">복사하기</button>
                </div>
            </div>
            <div class="ex_bec jasan">
                <h3 class="h3">나의 - USDT(BEC-20) 주소</h3>
                <div class="qr"><img src="img/common/qr.png"></div>
                <div class="mb10"><input type="text" class="inp usdt" value="<?php echo $bec_addr;?>" readonly></div>
                <div class="btns">
                    <button class="btn1 btn-s copy-btn" data-address="<?php echo $bec_addr;?>">복사하기</button>
                </div>
            </div>

            
            <div class="caution">
                <div class="tit">자산 수령시 유의사항</div>
                <div class="txt">•  자산에 따라 사용되는 주소가 다를 수 있습니다.<br>
                    자산을 받으시는 경우 선택하신 자산주소가 확실한지 한번 더 확인해 주시기 바랍니다. 분실시 찾을 수 없습니다.</div>
            </div>
        </div>
        
        
        <div class="modal" id="modalAlert">
            <div class="modal-dialog" style="max-width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>알림</h5>
                    </div>
                    <div class="modal-body">
                        <div class="txt1 text-center">주소가 복사 되었습니다.</div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn1 block" data-dismiss="modal">완료</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<script>
$(document).ready(function() {
    // 처음에 BTC 주소를 보이게 설정
    $(".ex_btc").show();

    $(".select").change(function(){
        var exex = $(this).val();
        if(exex == "" || !exex){
            alert('전송 받으실 자산을 선택해주세요.');
        }else{
            $(".jasan").hide();
            $(".ex_" + exex).show();
        }
    });

    function copyToClipboard(val) {
        var t = document.createElement("textarea");
        document.body.appendChild(t);
        t.value = val;
        t.select();
        document.execCommand('copy');
        document.body.removeChild(t);
    }

    $('.copy-btn').click(function(){
        var address = $(this).data('address');
        copyToClipboard(address);
        $('#modalAlert').modal();
    });
});
</script>
<?php   
    include(G5_PATH."/tail.php");   
?>
