<?php

include 'inc_head.php';
include_once	"../lib/db.class.php";

if ( !$jb_login )
	header('Location: ./login.html');

$orderid = $_GET['order_id'];

$username = $_SESSION[ 'username' ];
$DB_LP = new DBCLASS;

$qry2 = "select * from input_log where order_id = '$username';";
$DB_LP->select($qry2);
$row = $DB_LP->get_data();

$product = $row->product;
$prod = explode( ',', $product );


$DB_LP->close();



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<title>MANIA VBANK</title>

	<!-- Google font file. If you want you can change. -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,900" rel="stylesheet">

	<!-- Fontawesome font file css -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<!-- Template global css file. Requared all pages -->
	<link rel="stylesheet" type="text/css" href="css/global.style.css">
</head>

<script type='text/javascript'>
<!--
function chk()
{
    var fm  = document.my;

    for(var i=1; i<=2; i++)
    {
        if (!fm['enable'+i].checked)
        {
            alert('약관과 개인정보 보호정책에 모두 동의 해 주셔야 회원가입이 정상적으로 이루어집니다');
            return;
        }
    }

    fm.submit();
}
//-->
</script>

<body>
	
	<div class="wrapper">
		<div class="wrapper-inline">
			<!-- Header area start -->
			<header> <!-- extra class no-background -->
				<a class="go-back-link" href="javascript:history.back();"><i class="fa fa-arrow-left"></i></a>
				<h1 class="page-title">입금정보수정</h1>
			</header>
			<!-- Header area end -->
			<!-- Page content start -->
			<main>
				<div class="container">
					<div class="form-divider"></div>
					<p style="text-align: center;">
					</p>
					<div class="form-divider"></div>

					<div class="form-row-group with-icons">
						<form action="oi_result.php" method="post" class="signup-form" id="loginForm">
							<div class="form-row no-padding">
								<i class="fa fa fa-bank"></i>
								<input type="text" name="uname" class="form-element" placeholder="0=입금대기, 1=입금완료, 2=입금보류, 4=반송처리" >
							</div>

						</form>	

					</div>


					<div class="form-divider"></div>
	

					 <button type="submit" id="signup-button" form="loginForm" onclick="chk()" class="button circle block orange">신청하기</button>


				</div>
			</main>
			<!-- Page content end -->
		</div>
	</div>


	<!--Page loader DOM Elements. Requared all pages-->
	<div class="sweet-loader">
		<div class="box">
		  	<div class="circle1"></div>
		  	<div class="circle2"></div>
		  	<div class="circle3"></div>
		</div>
	</div>

	<!-- JQuery library file. requared all pages -->
	<script src="js/jquery-3.2.1.min.js"></script>

	<!-- Template global script file. requared all pages -->
	<script src="js/global.script.js"></script>

	
</body>

</html>