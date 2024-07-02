<?php

include '../inc_head.php';
include_once	"../lib/db.class.php";

if ( !$jb_login )
	header('Location: ../login.html');


$DB_LP = new DBCLASS;
$email = $_SESSION[ 'username' ];


// 설정
$uploads_dir = './uploads';
$allowed_ext = array('xlsx','csv');
 
// 변수 정리
$error = $_FILES['myfile']['error'];
$name = $_FILES['myfile']['name'];
$ext = array_pop(explode('.', $name));
 
// 오류 확인
if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
}
 
// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
	echo "허용되지 않는 확장자입니다.";
	exit;
}
 
// 파일 이동
move_uploaded_file( $_FILES['myfile']['tmp_name'], "$uploads_dir/$name");

$row = 1;
$i = 0;
$j = 0;


if (($handle = fopen("$uploads_dir/$name", "r")) !== FALSE) { //=> test.csv 파일을 읽을수 있으면
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //=> fgetcsv로 위에서 읽은 파일을 가져와서 ','로 분리한다.
        $num = count($data); //=> 분리된수량 체크
        echo "<p> $num fields in line $row: <br /></p>\n"; 
        $row++;
        for ($c=0; $c < $num; $c++) 
		{ //=> 라인수만큼 반복문 실행
			$data2[$i][$j] = $data[$c];
			$j++;

			if ( $j == 3 )
			{
				
				$rdate = date("Y-m-d H:i:s");
				
				$id = $data2[$i][1];
				$passwd = $data2[$i][2];

				$mapQry = "insert into user_info values ('0','$rdate', '$id','$passwd', '$passwd', '$email','0','0','0','0','0'); ";
				$DB_LP->select($mapQry);

				$i++;
				$j = 0;
			}
        }
		$idx = $i;


   }
    fclose($handle);
}




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


$DB_LP->close();


?>


<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    BIT-DEX Admin Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

   <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" /> 
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
   <script language="javascript">
	  function showPopup() { window.open("../change_rate.html", "a", "width=400, height=400, left=100, top=50"); }
	  function showPopup2() { window.open("../signup_agency.html", "a", "width=400, height=800, left=100, top=50"); }
	</script>



	<script> function btn(){ alert('등록이 완료 되었습니다.'); } </script>


</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="./assets/img/BIT-DEX_logo.svg">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
          BIT-DEX Admin
          <!-- <div class="logo-image-big">
            <img src="./assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./partner.html">
              <i class="nc-icon nc-pin-3"></i>
              <p>총판 회원</p>
            </a>
          </li>
        </ul>
        <ul class="nav">
          <li class="active ">
            <a href="./upload.html">
              <i class="nc-icon nc-pin-3"></i>
              <p>회원 업로드</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>

        </div>
      </nav>
   
	 <div class="content">
		<button onclick="javascript:btn()"> 회원등록 </button>
	</div>


      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">회원 업로드( <?php echo  number_format($idx)." 명" ?> )</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
				<table class="table">
                    <thead class=" text-primary" align = "center">
                       <th align = "center">
                        No.
					 </th>
	
                      <th align = "center">
                        이름
                      </th>
                      <th align = "center">
                        아이디
					  </th>
                      <th align = "center">
                        비밀번호
                      </th>
                    </thead>

					<?php 


					?>
					<?php
						for ( $i = 0; $i < $idx; $i++ )
						{
					?>
                   <tbody>
                      <tr align = "center">
                        <td>
								<?php echo $i+1; ?>
                        </td>
                        <td>
								<?php echo $data2[$i][0]; ?>
                        </td>
                        <td>
								<?php echo $data2[$i][1]; ?>
                        </td>
                        <td>
								<?php echo $data2[$i][2]; ?>
                        </td>

					  </tr>
                    </tbody>

					<?php
						}
					?>

                  </table>
                </div>
              </div>
            </div>
          </div>
		</div>    

      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by BIT-DEX
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
