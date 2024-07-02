<?php 
	include 'inc_head.php';
	include_once	"../lib/db.class.php";

    $email = $_POST[ 'email' ];
    $passwd = $_POST[ 'passwd' ];

	$DB_LP = new DBCLASS;

	$login = false;

	if ( $email == 'admin' && $passwd == 'a1234$' )
	{
			$login = true;
			$_SESSION[ 'username' ] = $email;
	}



	$DB_LP->close();

	if ( $login )
	{
		?>
			<meta http-equiv="refresh" content="0;url=./index.html" />

		<?php		
	}
	else
	{
		?>
		<meta http-equiv="refresh" content="0;url=./login.html?type=1" />

		<?php

	}


		



?>

