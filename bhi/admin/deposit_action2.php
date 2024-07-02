<?php
$knamt = 0;

//////////////////////////////////////
include 'inc_head.php';
include_once	"./lib/db.class.php";

date_default_timezone_set('Asia/Seoul');

if ( !$jb_login )
	header('Location: ./login.html');

$DB_LP = new DBCLASS;
$email = $_SESSION[ 'username' ];
//$knAmt = $_POST['kn_amt'];
$knAmt = $_GET['kn_amt'];

setcookie('username', $email, time() + 3600);

//echo $email;

$qry = "select * from user_info where email = '$email';";
$DB_LP->select($qry);

$row = $DB_LP->get_data();
$no = $row->no;
$wpasswd = $row->withpasswd;
$referral = $row->referral;

$passwd = $row->passwd;
$e_id = explode("@",$email);


// 로그인 시 최조 한번 실행 해야 합니다.
$password_hash = hash("sha256", '');
$wpasswd_hash2 = hash("sha256", "3021");
$wpasswd_hash = hash("sha256", "3021");

if($knAmt > 0 ) //입금금액이 존재
{
    // 사용자 정보 조회
    $myObj = array();
    $myObj['coinType'] = 'KN';
    $myObj['username'] = $e_id[0];
    $myObj['appId'] = '14';

    //print_r( json_encode($myObj));
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
    $checkedKnAmt =  $response->userDetailInfo->coinAmt;
    $coinAddr = $response->userDetailInfo->coinAddr;

    ////////////////////////////////////////////////
    // 코인 전송
    $myObj = array();
    $myObj['appId'] = '14';
    $myObj['username'] =  $e_id[0];;


    //print_r( json_encode($myObj));
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
                    "Authorization: Bearer ".$_SESSION[ 'token' ],
                    "content-type: application/json; charset=UTF-8"
            ),
    ));

    $raw_response = curl_exec($curl);
    $response = json_decode($raw_response);
    //print_r($response);
    $transferFee = $response->transferFee;

    //총 구매처리 코인 량
    $coinAllAmount = 0;
    //500만 이상일경우 1회씩 차감될 kn포인트 amount
    $curr_amt = $knAmt;
    $isSuccess = false;
    do
    {
        if($curr_amt > 5000000)
        {
                $curr_amt = $curr_amt - 5000000;
                $knAmt = 5000000;
        }
        else
        {
                $knAmt = $curr_amt;
                $curr_amt = 0;
        }

        /////////////////////////////////////////////////////////////////////////////
        // 코인 전송
        $myObj = array();
        $myObj['appId'] = '14';
        $myObj['coinType'] = 'KN';
        $myObj['sendAddr'] = $coinAddr;
        $myObj['sendType'] = 'MOV';	
        $myObj['toAddr'] = '3800548569416567';
        $myObj['memId'] = $_SESSION[ 'memID' ];
        $myObj['toMemId'] = 'DX0000085H';
        $myObj['amount'] = $knAmt - $transferFee;
        $myObj['fee'] = $transferFee;
        $myObj['tradepw'] = $wpasswd_hash2;

        $secret_key = "91c1dfb9409b24e3212df669fbb89206";
        $iv = "6f696e6769737072";
        $encData = base64_encode(openssl_encrypt(json_encode($myObj), "AES-256-CBC", $secret_key, true, $iv));

        $myObj['encData'] = $encData;
        //print_r( json_encode($myObj));

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
                        "Authorization: Bearer ".$_SESSION[ 'token' ],
                        "content-type: application/json; charset=UTF-8"
                ),
        ));

        $raw_response = curl_exec($curl);

        $response = json_decode($raw_response);
        //echo "dddd";
        //print_r( $response);

        //DB Update
        //echo "<script>alert('코인 {$knAmt}개 구매가 완료 되었습니다.');</script>";
        
        //	echo "<script>alert('테스트 {$response->status}');</script>";

        if ( $response->status == 400 )
        {
                $rdate = date('y-m-d H:i:s');
                $qry = "INSERT INTO `auth_log` values ( '0', '$rdate', '$email', 'DEPOSIT', '$raw_response');";
                //echo $qry;
                $DB_LP->select($qry);
                echo $raw_response;

                setcookie("check_deposit", "", time() - 3600);
                //echo "<script>alert('$response->message'); document.location.href='/market.html';</script>";
                $isSuccess = false;
                break;
        }
        else
        {
                $qry = "select * from bd_config;";
                $DB_LP->select($qry);
                $row = $DB_LP->get_data();
                $BUY_RATE = $row->d_fee_rate;
                $dfp = $row->d_fee_per;
                $USDCG_PRICE = $row->USD_P;
                $checkp2p = $row->check_p2p;
                $checkp2c = $row->check_p2c;
                $minwm = $row->min_w_money;
                $maxwm = $row->max_w_money;
                $wfp = $row->w_fee_per;

                $rdate = date('Y-m-d H:i:s');
                $fee = $knAmt * $BUY_RATE;
                $coinAmt = $knAmt / $USDCG_PRICE;
                $coinAllAmount += $coinAmt;
                $coinFee = $fee /$USDCG_PRICE;
                $coinPrice = $coinAmt * $USDCG_PRICE;

                $amt = $coinAmt - $coinFee;
                //$qry = "update user_info set GOTG = GOTG + '$knAmt' where email = '$email';";
                $qry = "update user_info set GOTG = GOTG - '$coinAmt' where email = 'jangkun1201@nate.com';";
                $DB_LP->select($qry);

                $qry = "update user_info set GOTG = GOTG + '$coinAmt' where email = '$email';";
                $DB_LP->select($qry);

        //        	$qry = "insert into adm_buylog values ( '0', '$rdate', '$email', '$knAmt', '$fee', 'USDC-G', '$coinAmt', '$coinPrice', '$coinFee', '$coinAddr',  '$USDCG_PRICE', '$referral','1');";
        //      	$DB_LP->select($qry);

                ////
                $qry = "INSERT INTO tx_log(email, rdate, txlog, coin, type, amount, act) VALUES ('$email', '$rdate', 'bit-dex', 'GotG', 'IN', '$coinAmt', 0)";
                $DB_LP->select($qry);
                $qry = "INSERT INTO tx_log(email, rdate, txlog, coin, type, amount, act) VALUES ('bit-dex', '$rdate', '$coinAddr', 'GotG', 'OUT', '$coinAmt', 0)";
                $DB_LP->select($qry);
                $qry = "INSERT INTO tx_log(email, rdate, txlog, coin, type, amount, act) VALUES ('$coinAddr', '$rdate', '$email', 'GotG', 'IN', '$coinAmt', 0)";
                $DB_LP->select($qry); 

                //echo $qry;
        }

    }while($curr_amt > 0);

    if($isSuccess)
    {
        setcookie("check_deposit", "", time() - 3600);

        if($_SESSION[ 'api' ] == '1')
        {
                unset($_COOKIE['check_deposit']);
                echo "<script>alert('USDC-G {$coinAllAmount}개 구매완료 되었습니다.'); document.location.href='/market.html?menu=1';</script>";
        }
        else
        {
                unset($_COOKIE['check_deposit']);
                echo "<script>alert('USDC-G {$coinAllAmount}개 구매완료 되었습니다.'); document.location.href='/market.html';</script>";
        }
    }
    else{
        echo "<script>alert('$response->message'); document.location.href='/market.html';</script>";
    }

}

?>
