<?php

include '../inc_head.php';
include_once	"../lib/db.class.php";
include_once	"../lib/db.class2.php";

if ( !$jb_login )
{
	header('Location: ../login.html');
    exit(0);
}

$DB_LP = new DBCLASS;
$DB_LP2 = new DBCLASS2;

date_default_timezone_set('Asia/Seoul');

$email = $_GET['email'];
$qur = $_GET['qur'];


//echo $email.$qur;
//exit;

$qry = "select * from bd_config;";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$dfr = $row->d_fee_rate;
$dfp = $row->d_fee_per;
$usdcg = $row->USD_P;
$checkp2p = $row->check_p2p;
$checkp2c = $row->check_p2c;
$minwm = $row->min_w_money;
$maxwm = $row->max_w_money;
$wfp = $row->w_fee_per;

$coinBalance = 0;

$qry = "select * from user_info where email = '$email';";
$DB_LP->select($qry);


$row = $DB_LP->get_data();
$no = $row->no;
$referral  = $row->referral;

$err = 0;

$GOTG = $row->GOTG;


if ( $GOTG < $qur )
{
	header('Location: https://bit-dex.io/defi.html?ret=2');
	exit(0);
}

$uqur = $qur * $usdcg;

if ( $minwm > $uqur )
{
	header('Location: https://bit-dex.io/defi.html?ret=21');
	exit(0);
}

if ( $maxwm < $uqur )
{
	header('Location: https://bit-dex.io/defi.html?ret=22');
	exit(0);
}




$wpasswd = $row->withpasswd;
$passwd = $row->passwd;
$e_id = explode("@",$email);

$passwd = '';

// 로그인 시 최조 한번 실행 해야 합니다.
$password_hash = hash("sha256", $passwd);
$wpasswd_hash = hash("sha256", "1234");
$wpasswd_hash2 = hash("sha256", "3021");

$myObj = array();
$myObj['username'] = $e_id[0];
$myObj['password'] = $password_hash;
$myObj['appId'] = '14';

//print_r( json_encode($myObj));
$secret_key = "91c1dfb9409b24e3212df669fbb89206";
$iv = "6f696e6769737072";
$encData = base64_encode(openssl_encrypt(json_encode($myObj), "AES-256-CBC", $secret_key, true, $iv));
$myObj['encData'] = $encData;

$payload = json_encode($myObj);
# Setup request to send json via POST. This is where all parameters should be entered.


$url = "https://summernight.thenautilus.co.kr/api/v1/user/login";
$curl = curl_init();

curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_POST => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $payload,
		CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"Accept: application/json",
				"content-type: application/json; charset=UTF-8"
		),
));

$raw_response = curl_exec($curl);
$response = json_decode($raw_response);

print_r( $response );

// If the status is not 200, something is wrong
$status = curl_getinfo($curl,CURLINFO_HTTP_CODE);
// If there was no error, this will be an empty string
$curl_error = curl_error($curl);

curl_close($curl);

$memID = $response->memId;
$token = $response->token;
$_SESSION[ 'memID' ] = $memID;
$_SESSION[ 'token' ] = $token;



$qry = "select * from  user_account  where email = '$email';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$v_bank = $row->v_bank;
$bnkCd = $row->bnkCd;
$bankName = $row->bank_name;
$bank_account = $row->bank_account;
$bank_owner = $row->bank_owner;

if ( $v_bank == NULL )
{

	// 사용자 정보 조회 : 로그인 후 반드시 정보 조회 필요
	$myObj = array();
	$myObj['coinType'] = 'KN';
	$myObj['username'] = $e_id[0];
	$myObj['appVersion'] = "1";
	$myObj['appId'] = '14';

//	print_r( json_encode($myObj));
	$secret_key = "91c1dfb9409b24e3212df669fbb89206";
	$iv = "6f696e6769737072";
	$encData = base64_encode(openssl_encrypt(json_encode($myObj), "AES-256-CBC", $secret_key, true, $iv));
	$myObj['encData'] = $encData;

	$payload = json_encode($myObj);
	# Setup request to send json via POST. This is where all parameters should be entered.

	$url = "https://summernight.thenautilus.co.kr/api/v1/user/auth/info";
	$curl = curl_init();

	curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_POST => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $payload,
			CURLOPT_HTTPHEADER => array(
					"cache-control: no-cache",
					"Accept: application/json",
					"Authorization: Bearer ".$token,
					"content-type: application/json; charset=UTF-8"
			),
	));

	$raw_response = curl_exec($curl);

	$response = json_decode($raw_response);

	$bnkCd = $response->userSeyfertInfo->bnkCd;
	$bnkName = $response->userSeyfertInfo->bnkName;
	$accountNo = $response->userSeyfertInfo->accountNo;
	$accountName = $response->userSeyfertInfo->accountName;

	$v_bank = $bnkName." ".$accountNo." ".$accountName;

//	print_r($response);




	if ( $accountNo )
	{

		$qry = "update user_account set v_bank = '$v_bank' where email = '$email';";
		$DB_LP->select($qry);

	
		// 사용자 정보 조회 : 로그인 후 반드시 정보 조회 필요
		$myObj = array();
		$myObj['username'] = $e_id[0];
		$myObj['password'] = $wpasswd_hash;
		$myObj['appId'] = '14';

	//	print_r( json_encode($myObj));
		$secret_key = "91c1dfb9409b24e3212df669fbb89206";
		$iv = "6f696e6769737072";
		$encData = base64_encode(openssl_encrypt(json_encode($myObj), "AES-256-CBC", $secret_key, true, $iv));
		$myObj['encData'] = $encData;

		$payload = json_encode($myObj);
		# Setup request to send json via POST. This is where all parameters should be entered.

		$url = "https://summernight.thenautilus.co.kr/api/v1/user/setup";
		$curl = curl_init();

		curl_setopt_array($curl, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_POST => true,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $payload,
				CURLOPT_HTTPHEADER => array(
						"cache-control: no-cache",
						"Accept: application/json",
						"Authorization: Bearer ".$token,
						"content-type: application/json; charset=UTF-8"
				),
		));

		$raw_response = curl_exec($curl);

		$response = json_decode($raw_response);
//		print_r($response);

	}



}

// 사용자 정보 조회 : 로그인 후 반드시 정보 조회 필요
$myObj = array();
$myObj['coinType'] = 'KN';
$myObj['username'] = $e_id[0];
$myObj['appId'] = '14';

//	print_r( json_encode($myObj));
$secret_key = "91c1dfb9409b24e3212df669fbb89206";
$iv = "6f696e6769737072";
$encData = base64_encode(openssl_encrypt(json_encode($myObj), "AES-256-CBC", $secret_key, true, $iv));
$myObj['encData'] = $encData;

$payload = json_encode($myObj);
# Setup request to send json via POST. This is where all parameters should be entered.

$url = "https://summernight.thenautilus.co.kr/api/v1/user/auth/getCoinAddr";
$curl = curl_init();

curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_POST => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "Accept: application/json",
                "Authorization: Bearer ".$token,
                "content-type: application/json; charset=UTF-8"
        ),
));

$raw_response = curl_exec($curl);

$response = json_decode($raw_response);

//	print_r($response);

$coinAmt =  $response->userDetailInfo->coinAmt;
echo "coin : ".$coinAmt;

$coinAddr = $response->userDetailInfo->coinAddr;

//	print_r($response);


$qry = "select * from user_account where email = '$email' and CHAR_LENGTH(v_bank) > 2;";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$no = $row->no;


$qry = "select * from auth where email = '$email';";
$DB_LP->select($qry);
$row = $DB_LP->get_data();
$phone = $row->phone;
$account = $row->account;
$idcard = $row->idcard;

$sum = $phone + $account + $idcard;


$qry = "select * from coinprice;";
$DB_LP->select($qry);

$row = $DB_LP->get_data();

$BTCP = $row->BTC;
$ETHP = $row->ETH;
$XRPP = $row->XRP;
$GOTGP = $row->GOTG;
$NFTDP = $row->NFTD;


$BTCS = $row->BTC_S;
$ETHS = $row->ETH_S;
$XRPS = $row->XRP_S;

$BTCR = number_format( ( $BTCP - $BTCS ) / $BTCS * 100, 2);
$ETHR = number_format(( $ETHP - $ETHS ) / $ETHS * 100 , 2);
$XRPR = number_format(( $XRPP - $XRPS ) / $XRPS * 100, 2);

$qry = "select * from user_info where email = '$email';";
$DB_LP->select($qry);

$row = $DB_LP->get_data();
$no = $row->no;

$BTC = $row->BTC;
$ETH = $row->ETH;
$XRP = $row->XRP;
$GOTG = $row->GOTG;
$NFTD = $row->NFTD;

$total_krw = $BTC * $BTCP + $ETH * $ETHP + $XRP * $XRPP + $GOTG * $GOTGP + $NFTD * $NFTDP;

// 코인 전송
$myObj = array();
$myObj['appId'] = '14';
$myObj['username'] =  $e_id[0];;


//	print_r( json_encode($myObj));
$secret_key = "91c1dfb9409b24e3212df669fbb89206";
$iv = "6f696e6769737072";
$encData = base64_encode(openssl_encrypt(json_encode($myObj), "AES-256-CBC", $secret_key, true, $iv));
$myObj['encData'] = $encData;

$payload = json_encode($myObj);
# Setup request to send json via POST. This is where all parameters should be entered.

$url = "https://summernight.thenautilus.co.kr/api/v1/user/auth/fee";
$curl = curl_init();

curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_POST => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "Accept: application/json",
                "Authorization: Bearer ".$token,
                "content-type: application/json; charset=UTF-8"
        ),
));

$raw_response = curl_exec($curl);

$response = json_decode($raw_response);
echo "---1---";
print_r($response);

$transferFee = $response->transferFee;
$remitFee = $response->remitFee;

///////////////////////////////////
	
// 코인 전송
$myObj = array();
$myObj['appId'] = '14';
$myObj['coinType'] = 'KN';
$myObj['toAddr'] = $coinAddr;
$myObj['sendType'] = 'MOV';	
$myObj['sendAddr'] = '3800548569416567';
$myObj['toMemId'] = $memID;
$myObj['memId'] = 'DX0000085H';
$myObj['amount'] = $uqur + $remitFee - $wfp;
//	$myObj['fee'] = $transferFee;
$myObj['fee'] = 0;
$myObj['tradepw'] = $wpasswd_hash2;



//	print_r( json_encode($myObj));
$secret_key = "91c1dfb9409b24e3212df669fbb89206";
$iv = "6f696e6769737072";
$encData = base64_encode(openssl_encrypt(json_encode($myObj), "AES-256-CBC", $secret_key, true, $iv));
$myObj['encData'] = $encData;

$payload = json_encode($myObj);
# Setup request to send json via POST. This is where all parameters should be entered.

$url = "https://summernight.thenautilus.co.kr/api/v1/send";
$curl = curl_init();

curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_POST => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "Accept: application/json",
                "Authorization: Bearer ".$token,
                "content-type: application/json; charset=UTF-8"
        ),
));

$raw_response = curl_exec($curl);

$response = json_decode($raw_response);
$coinBalance = $response->complete->coinBalance;
echo "---2---";
//print_r($response);

$rdate = date('y-m-d H:i:s');
$qry = "INSERT INTO `auth_log` values ( '0', '$rdate', '$email', 'SELL', '$raw_response');";
//echo $qry;
$DB_LP->select($qry);
echo $raw_response;


if ( $response->status == 100 ||  $response->status == 200 )
    $err = 0;
else
    $err = 4;

if ( $err == 0 )
{
	$amount2 = $GOTG - $qur;
	if ( $amount2 < 0 )
		$err = 2;

	if ( $err == 0 )
	{
			// 나중에 성공 했을 경우에만 돈을 빼자. txid로 남겨야 한다. 
		$qry = "UPDATE `user_info` SET GOTG = GOTG - $qur where email = '$email';";
		$DB_LP->select($qry);
		echo $qry;


		
		$qry = "select * from bd_config;";
		$DB_LP->select($qry);
		$row = $DB_LP->get_data();
		$dfr = $row->d_fee_rate;
		$dfp = $row->d_fee_per;
		$usdcg = $row->USD_P;
		$wfp = $row->w_fee_per;
		
		$cqur = $qur;

		$rdate = date('Y-m-d H:i:s');

		$krwAmt = $qur;
		$knAmt = $qur;
		
		$rfee = $knAmt * $dfr;
		$pfee = $dfp / $usdcg;
		
		$totalfee = $rfee + $pfee;

		$krwtotalfee = $totalfee * $usdcg;
		$coinprice = $usdcg * $knAmt;


		$qry = "select * from ethaddr where no  = '$no';";
		$DB_LP->select($qry);
		$row = $DB_LP->get_data();
		$ethaddr_s = $row->ethaddr;
		
		$GOTG = $GOTG - $qur;

		echo $qry;

		$qur = $qur - $wfp;
		$uqur = $uqur - $wfp;


		////////////////////////
        /*
        $qry = "insert into adm_selllog values ( '0', '$rdate', '$email', '$uqur', '$wfp',  '$ethaddr_s', '$coinBalance','1');";
        echo $qry;
        $DB_LP->select($qry);

        $coin1 = 'USDC-G(C)';
        $qry = "INSERT INTO tx_log VALUES ( '0', '$email', '$rdate', '$ethaddr_s', '$coin1', 'OUT', '$cqur','0');";
        $DB_LP->select($qry);
        */
        
        $coinAmt = $cqur;

        $qry = "update user_info set GOTG = GOTG + '$coinAmt' where email = 'jangkun1201@nate.com';";
        $DB_LP->select($qry);

	}
}	

$DB_LP->close();


echo $err;
