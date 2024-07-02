<?php
include_once('./_common.php');
include_once(G5_PATH.'/vendor/autoload.php');

// API KEY 불러오기
include_once(G5_PATH.'/api_key.php');

$type = $_POST['type'];
$coin = $_POST['coin'];


$qty = $_POST['qty']; // 사용자가 입력한 값 받기
$amount = number_format((float)$qty, 18, '.', '');    // 금액 형식을 올바르게 맞추기

//$amount = floatval(preg_replace('/[^0-9.]/', '', $_POST['qty']));

$to_addr = $_POST['to_addr'];	
$from_addr = $member['wallet_address'];
$private_key = $member['private_key'];
$wallet_password = $_POST['wallet_password'];
$fee = floatval(preg_replace('/[^0-9.]/', '', $_POST['fee']));
$total = $amount + $fee;

$blockSDK = new BlockSDK($apiKey);
$bscClient = $blockSDK->createBinanceSmart();

if( $type == 'withdrawal' ) {
	$ty = '출금';
} else {
	$ty = '스왑';
}


//echo $member['mb_id'];
//echo $wallet_password;
//exit;



$bscBalance = $bscClient->getAddressBalance([ // bnc 잔고
	"address" => $from_addr
]);
$BSC = floatval($bscBalance['payload']['balance']);

if($BSC < 0.01) {
	alert('최소 0.1BSC 이상 보유해야 거래가 가능합니다.');
}

if(!$is_admin) {
	if(!check_password($wallet_password, $member['wallet_password'])){
		alert('지갑 비밀번호가 맞지 않습니다.');
	}
}




if(!$is_admin) {
	$private_key = Decrypt($private_key, $wallet_password);   // $wallet_password 사용자가 폼에서 입력한 지갑 비밀번호..
} else {
//	$private_key = Decrypt($private_key, $member['mb_id']);
	$private_key = $private_key;
}


//echo $private_key;
//exit;


if( $type == 'withdrawal' ) { // 출금 일때

	$sql = " select * from g5_member where wallet_address = '{$to_addr}' ";
	$row = sql_fetch($sql);
	$mb = get_member($row['mb_id']);
	$to_mb_id = $mb['mb_id'];

	if( $coin == 'BSC' ) { // BSC 일때

		if ( $BSC < $total )
		{
			alert('잔고가 부족합니다.');
		}
		else
		{
			
			
			$tx = $bscClient->sendToAddress([
				"from" => $from_addr,
				"to" => $to_addr,
				"amount" => $amount,
				"private_key" => $private_key,
				"gas_limit" => 90000,
				"gwei" => 10
			]);
			
			$hash = $tx['payload']['hash'] ?? 'No hash'; // null 체크
			$status = $tx['state']['success'] ?? 'Failed'; // null 체크
			$error = $tx['error']['message'] ?? 'No error'; // null 체크
			/*
			echo $hash;
			echo "<br>";
			
			echo $status;
			echo "<br>";
			
			echo $error;
			echo "<br>";
			
			exit;
			*/
			
			

			if($status == false) {
				alert('네트워크 수수료(BNB)가 부족합니다.');
			}
		}
	}

	if( $coin == 'WPC' ) { // World Pay Coin 일때
		$WPCBalance = $bscClient->getBep20Balance([ // WPC 잔고
			"contract_address" => $contract,
			"from" => $from_addr
		]);

		if($is_admin) { // 관리자는 잔금
			$WPC = floatval($WPCBalance['payload']['balance']);
		} else { // 회원은 허용가능
			//$WPC = $member['allow'];
			$WPC = floatval($WPCBalance['payload']['balance']);
			
		}

		if ( $WPC < $total )
		{
			alert('잔고가 부족합니다.');
		}
		else
		{
			// WPC 출금
			$tx = $bscClient->getBep20Transfer([
				"contract_address" => $contract,
				"from" => $from_addr,
				"to" => $to_addr,
				"amount" => $amount,
				"private_key" => $private_key,
				"gas_limit" => 90000,
				"gwei" => 10
			]);
			
			$hash = $tx['payload']['hash'];
			$status = $tx['state']['success'];
			$error = $tx['error']['message'];

			//if($to_mb_id == 'hongtest'){
				
				/*
				echo $hash;
				echo "<br>";
				echo $status;
				echo "<br>";
				echo $amount;
				echo "<br>";
				echo "-------------";
				echo "<br>";
				*/
				
			//}

			if($status == false) {
				alert('출금 오류가 발생했습니다.\n ERROR : '.$error.'.');
			}

			if(!$is_admin) {
				// 수수료 납부
				$adm = get_member('admin');
				$feetx = $bscClient->getBep20Transfer([
					"contract_address" => $contract,
					"from" => $from_addr,
					"to" => $adm['wallet_address'],
					"amount" => $fee,
					"private_key" => $private_key,
					"gas_limit" => 90000,
					"gwei" => 10
				]);
				
				$feehash = $feetx['payload']['hash'];
				$feestatus = $feetx['state']['success'];
				$error = $feetx['error']['message'];

				//if($to_mb_id == 'hongtest'){
				
				/*
				echo $feehash;
				echo "<br>";
				echo $feestatus;
				echo "<br>";
				echo $error;
				echo "<br>";
				echo $fee;
				exit;
				*/

				//}

				if($feestatus == false) {
					alert('출금 오류가 발생했습니다.. ERROR : '.$error.'\n 재시도하시기 바랍니다..');
				}
			}

		}
	}

	if($is_admin && $coin == 'WPC' && $to_mb_id != '') { // 관리자가 지급 -> 락업됨 (회원만)
		$lockup_date = date("Y-m-d",strtotime ("+90 days"));
		$day_amount = round($amount / 100 * 3, 6);
		$percent = 100;
		$remain_amount = $amount;

		// DB에 락업 저장
		$sql = " insert into g5_lockup (`mb_id`, `tx_hash`, `amount`, `day_amount`, `remain_amount`, `percent`, `datetime`, `lockup_datetime`, `chk_datetime`) values ('{$to_mb_id}', '{$hash}', '{$amount}', '{$day_amount}', '{$remain_amount}', '{$percent}', '".G5_TIME_YMD."', '{$lockup_date}', '{$lockup_date}') ";
		sql_query($sql);
	}

	// DB에 log 저장
	$sql = " insert into tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) values ('{$member['mb_id']}', '{$to_mb_id}', '{$hash}', '{$type}', '{$coin}', '{$total}') ";
	sql_query($sql);

} else { // 스왑 일때
	$adm = get_member('admin');
	$to_addr = $adm['wallet_address'];
	$adm_private_key = Decrypt($adm['private_key'], $adm['mb_id']);

	if( $coin == 'BSC' ) { // BSC 일때

		if ( $BSC < $total )
		{
			alert('잔고가 부족합니다.');
		}
		else
		{
			// BSC 관리자에게 입금
			$tx = $bscClient->sendToAddress([
				"from" => $from_addr,
				"to" => $to_addr,
				"amount" => $total,
				"private_key" => $private_key,
				"gas_limit" => 90000,
				"gwei" => 10
			]);
			
			$hash = $tx['payload']['hash'];
			$status = $tx['state']['success'];

			if($status == false) {
				alert('출금 오류가 발생했습니다. 재시도하시기 바랍니다.');
			}

			// DB에 log 저장
			$sql = " insert into tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) values ('{$member['mb_id']}', 'admin', '{$hash}', '{$type}', 'BSC', '{$total}') ";
			sql_query($sql);
			
			// WPC 회원에게 입금
			$swap_amount = $amount * $_bsc / $_wpc;
			$tx = $bscClient->getBep20Transfer([
				"contract_address" => $contract,
				"from" => $to_addr,
				"to" => $from_addr,
				"amount" => $swap_amount,
				"private_key" => $adm_private_key,
				"gas_limit" => 90000,
				"gwei" => 10
			]);
			
			$hash = $tx['payload']['hash'];
			$status = $tx['state']['success'];

			if($status == false) {
				alert('스왑 오류가 발생했습니다. 관리자에게 문의해주시기 바랍니다.');
			}

			// DB에 log 저장
			$sql = " insert into tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) values ('admin', '{$member['mb_id']}', '{$hash}', '{$type}', 'WPC', '{$swap_amount}') ";
			sql_query($sql);
		}
	}

	if( $coin == 'WPC' ) { // WPC 일때

		$WPCBalance = $bscClient->getBep20Balance([ // WPC 잔고
			"contract_address" => $contract,
			"from" => $from_addr
		]);

		if($is_admin) { // 관리자는 잔금
			$WPC = floatval($WPCBalance['payload']['balance']);
		} else { // 회원은 허용가능
			//$WPC = $member['allow'];
			$WPC = floatval($WPCBalance['payload']['balance']);
		}

		if ( $WPC < $total )
		{
			alert('잔고가 부족합니다.');
		}
		else
		{			
			// WPC 관리자에게 입금
			$tx = $bscClient->getBep20Transfer([
				"contract_address" => $contract,
				"from" => $from_addr,
				"to" => $to_addr,
				"amount" => $total,
				"private_key" => $private_key,
				"gas_limit" => 90000,
				"gwei" => 10
			]);
			
			$hash = $tx['payload']['hash'];
			$status = $tx['state']['success'];

			if($status == false) {
				alert('스왑 오류가 발생했습니다. 재시도하시기 바랍니다.');
			}
			
			// DB에 log 저장
			$sql = " insert into tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) values ('{$member['mb_id']}', 'admin', '{$hash}', '{$type}', 'WPC', '{$total}') ";
			sql_query($sql);

			// BSC 회원에게 입금
			$swap_amount = $amount * $_wpc / $_bsc;
			$tx = $bscClient->sendToAddress([
				"from" => $to_addr,
				"to" => $from_addr,
				"amount" => $swap_amount,
				"private_key" => $adm_private_key,
				"gas_limit" => 90000,
				"gwei" => 10
			]);
			
			$hash = $tx['payload']['hash'];
			$status = $tx['state']['success'];

			if($status == false) {
				alert('스왑 오류가 발생했습니다. 관리자에게 문의해주시기 바랍니다.');
			}

			// DB에 log 저장
			$sql = " insert into tx_log (`mb_id`, `to_mb_id`, `tx_hash`, `tx_type`, `tx_coin`, `tx_amount`) values ('admin', '{$member['mb_id']}', '{$hash}', '{$type}', 'BSC', '{$swap_amount}') ";
			sql_query($sql);
		}
	}

}

sleep(2);

if($type == 'withdrawal')
	alert('출금이 완료되었습니다.', G5_BBS_URL.'/page.php?pid=wallet');
else	
	alert('스왑이 완료되었습니다.', G5_BBS_URL.'/page.php?pid=wallet');