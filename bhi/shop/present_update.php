<?php
include_once('./_common.php');






print_r($_POST);


$ea = $_POST['ea'];
$ea_price = $_POST['ea_price'];
$price = $_POST['price'];
$it_id = $_POST['it_id'];
$rname = $_POST['r_name'];
$rphone = $_POST['r_phone']; 


?>
<a href="/shop/present_ok.php?it_id=<?php echo $it_id?>&it_price=<?php echo $it_price?>&ea_price=<?php echo $ea_price?>&ea=<?php echo $ea?>&rphone=<?php echo $rphone?>&rname=<?php echo $rname;?>">
결제성공하면 성공페이지로 ㄱ
</a>