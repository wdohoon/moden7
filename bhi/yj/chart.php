
<?php

$pair = $_GET['pair'];

if ( $pair == 'ETH' )
	$pair = 'ETHUSDT';
else if ( $pair == 'XRP' )
	$pair = 'XRPUSDT';
else
	$pair = 'BTCUSDT';


echo $pair;




?>
<!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->