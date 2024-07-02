<?php

$sql_item = sql_query("select * from g5_shop_item order by it_order asc, it_time desc");
$sql_num = sql_num_rows($sql_item);
?>

<div class="prd-list">
	<div class="head">
		<h2>전체상품</h2>
	</div>
	<ul>
		<?php if($sql_num>0){?>
		<?php for($k=0;$row=sql_fetch_array($sql_item);$k++){?>
		<li>
			<a href="/shop/shop_view.php?it_id=<?php echo $row['it_id']?>">
				<div class="img"><p><img src="/data/item/<?php echo $row['it_img1']?>" alt="이미지"></p></div>
				<div class="subj"><?php echo $row['it_name']?></div>
				<div class="price"><?php echo $row['it_price']?> OKNA</div>
			</a>
		</li>
		<?php }}?>		
	</ul>
</div>