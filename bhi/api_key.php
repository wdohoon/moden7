<?php
   include_once('./_common.php');
       

             
   $apiToken = '7l43bkblvs4g8scc4gkk8gsc0cokg8w4ocswosc44kgk0g4k00s0c00sskcc40cs'; // chaingateway api 키 api문서 주소 : https://docs.chaingateway.io/     moden7@naver.com 계정
   
   
   $contract = "TQqWAGhgrEEwDDLhcFXFXCLDHEi6q7r3LG"; // dcpc 

   
   function Encrypt($str, $secret_key='secret key', $secret_iv='#@$%^&*()_+=-')
   {
      $key = hash('sha256', $secret_key);
      $iv = substr(hash('sha256', $secret_iv), 0, 16)    ;
      return str_replace("=", "", base64_encode(
         openssl_encrypt($str, "AES-256-CBC", $key, 0, $iv))
      );
   }

   function Decrypt($str, $secret_key='secret key', $secret_iv='#@$%^&*()_+=-')
   {
      $key = hash('sha256', $secret_key);
      $iv = substr(hash('sha256', $secret_iv), 0, 16);
      return openssl_decrypt(
         base64_decode($str), "AES-256-CBC", $key, 0, $iv
      );
   }

   // 지갑잔액 - 트론
   $curl1 = curl_init();

   curl_setopt_array($curl1, array(
     CURLOPT_URL => 'https://api.chaingateway.io/v2/tron/balances/'.$member['wallet_address'],
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'GET',
     CURLOPT_HTTPHEADER => array(
      'Accept: application/json',
      'Authorization: '.$apiToken
     ),
   ));
   $response1 = curl_exec($curl1);
   curl_close($curl1);
   // 지갑잔액 - 트론

   // 지갑잔액 - dcpc
   $curl2 = curl_init();

   curl_setopt_array($curl2, array(
     CURLOPT_URL => 'https://api.chaingateway.io/v2/tron/balances/'.$member['wallet_address'].'/trc20/'.$contract,
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'GET',
     CURLOPT_HTTPHEADER => array(
      'Accept: application/json',
      'Authorization: '.$apiToken
     ),
   ));

   $response2 = curl_exec($curl2);

   curl_close($curl2);
   // 지갑잔액 - dcpc

   $response_dcpc = json_decode($response2, true);
   $response_trx = json_decode($response1, true);
   //print_r2($response_dcpc);
   //print_r2($response_trx);
   // 잔액값을 변수에 저장
   $balanceWei = $response_dcpc['data']['balance'] ; // 받아온 wei 잔액 값
   $decimals = $response_dcpc['data']['decimals'];

   $dcpc = $balanceWei * (10 ** $decimals);
   $dcpc = $dcpc / 1000000000000000000;
   $trx = $response_trx['data']['balance'];
   

   $sql = " select * from g5_coin ";
   $coin = sql_fetch($sql);
   $_dcpc = $coin['dcpc']; // 토큰 시세
   $_trx = $coin['trx']; // 토큰시세
   $_usd = $coin['usd']; // 달러 환율
   $_dcpckrw = $_dcpc * $_usd;
   //$_dcpckrw = 200; // dcpc토큰 시세 원화로 200원 
   $_trxkrw = $_trx * $_usd;
   $total = ($_dcpc * $dcpc) + ($trx * $_trx);
   $totalkrw = $total * $_usd;

   if($is_admin) {
      $allow = $dcpc;
   } else {
      $allow = $member['allow'];
   }
   
   //$gwei = $response_gwei['payload']['gasPrice'] + 100; //가스비 = 평균가스비 + 100;
   $gasLimit = '30000000'; // 거래에 사용될 최대 가스 (선택적, 기본값 90000)

   // 전송할 코인 단위를 wei로 변환하는 함수
   function convertToWei($amount, $tokenDecimals = 18) {
      $weiValue = bcmul($amount, bcpow(10, $tokenDecimals));
      return $weiValue;
   }
   
?>