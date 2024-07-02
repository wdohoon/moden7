<?php
include_once('./_common.php');

print_r($_POST);


$ea = $_POST['ea'];
$ea_price = $_POST['ea_price'];
$price = $_POST['price'];
$it_id = $_POST['it_id'];



?>
<a href="/shop/goome_ok.php?it_id=<?php echo $it_id?>&it_price=<?php echo $it_price?>&ea_price=<?php echo $ea_price?>&ea=<?php echo $ea?>">
결제성공하면 성공페이지로 ㄱ
</a>