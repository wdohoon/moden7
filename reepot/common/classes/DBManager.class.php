<?php
#------------------------------------------------------------------------------
# 작업내용	:	DB 연결 관련
# 인    수	:
# 작성일자	:	2021-05-26
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------
//include_once $common['DOCUMENTROOT'] . '/common/classes/dbinfo.php';
//include_once $common['DOCUMENTROOT'] . '/common/classes/Message.class.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/dbinfo.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/Message.class.php';
//print_r($common);

class DBManager
{
	private $conn;

	public function __construct()
	{
		global $dbHost01, $dbName01, $dbID01, $dbPWD01, $dbPort01;

		$this->conn01			=	@mysqli_connect($dbHost01, $dbID01, $dbPWD01, $dbName01, $dbPort01);

		if ( !$this->conn01 ) {
			//echo 'Error: Unable to connect to MySQL.' . PHP_EOL;
			//echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;
			//echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;

			echo 'DB01 작업중이거나 연결 되지 않았습니다.11';
			exit;
		} else {
			$result01				=	@mysqli_select_db($this->conn01, $dbName01);
		}

		if ( !$result01 ) {
			//echo 'Database selecttion error !!<br/>';
			//echo 'Check DB name.';

			echo 'DB01 작업중이거나 연결 되지 않았습니다.21';
			exit;
		} else {
			@mysqli_query($this->conn01, 'set names utf8');
			//@mysqli_query($this->conn01);
		}
	}

	public function __destruct()
	{
		$this->dbClose('1');
	}

	//	I면 로그 기록 후 insert_id 가져오기, Y면 로그 기록만 하기, N 이면 로그 기록 안하기
	public function execute($query, $connNo = '1', $logSave = '')
	{
		global $common;

		$msg					=	new Message();
		$data					=	array();
		$i						=	0;

		if ( $connNo == '1' ) {
			$thisConn			=	$this->conn01;
		} else if ( $connNo == '2' ) {
			global $dbHost02, $dbName02, $dbID02, $dbPWD02, $dbPort02;
			$this->conn02		=	@mysqli_connect($dbHost02, $dbID02, $dbPWD02, $dbName02, $dbPort02);

			if ( !$this->conn02 ) {
				@mysqli_close($this->conn02);
			} else {
				$result2		=	@mysqli_select_db($this->conn02, $dbName02);
			}

			if ( !$result2 ) {
				@mysqli_close($this->conn02);
			} else {
				@mysqli_query($this->conn02, 'set names utf8');
			}

			$thisConn			=	$this->conn02;
		} else if ( $connNo == '3' ) {
			global $dbHost03, $dbName03, $dbID03, $dbPWD03, $dbPort03;
			$this->conn03		=	@mysqli_connect($dbHost03, $dbID03, $dbPWD03, $dbName03, $dbPort03);

			if ( !$this->conn03 ) {
				@mysqli_close($this->conn03);
			} else {
				$result2		=	@mysqli_select_db($this->conn03, $dbName03);
			}

			if ( !$result2 ) {
				@mysqli_close($this->conn03);
			} else {
				@mysqli_query($this->conn03, 'set names utf8');
			}

			$thisConn			=	$this->conn03;
		}

		$result					=	@mysqli_query($thisConn, $query);

		if ( !$result ) {
			//$msg->setResult(false);
			//$msg->setMessage(mysqli_error($thisConn));
		} else {
			$size				=	$result->num_rows;

			if ( $logSave == 'I' ) {
				$lastID			=	$thisConn->insert_id;
				$msg->setData($lastID);
			}

			if ( $size != 0 ) {
				while ( $row = @mysqli_fetch_assoc($result) )
				{
					$data[$i++]	=	$row;
				}
				$msg->setData($data);
			}

			@mysqli_free_result($result);
			$msg->setResult(true);
		}

		if ( $logSave == 'Y' || $logSave == 'I' ) {
			$ipAddr				=	$_SERVER['REMOTE_ADDR'];
			$logfile			=	fopen($common['DOCUMENTROOT'] . '/saveLog/DBSave_' . date('Y-m-d',time()) . '.log', 'a+');
			fwrite( $logfile, "\r\n\r\n");
			fwrite( $logfile, "======================================================================\r\n");
			fwrite( $logfile, date('Y-m-d H:i:s',time()) . "\r\n" . $common['adminIdx'] . " | " . $ipAddr . " | " . $_SERVER['PHP_SELF'] . "\r\n");
			fwrite( $logfile, "\r\n" . $query . "\r\n");
			fclose( $logfile );
		} else if ( $logSave == 'D' ) {
			$ipAddr				=	$_SERVER['REMOTE_ADDR'];
			$logfile			=	fopen($common['DOCUMENTROOT'] . '/saveLog/debug/DBSave_' . date('Y-m-d',time()) . '.log', 'a+');
			fwrite( $logfile, "\r\n\r\n");
			fwrite( $logfile, "======================================================================\r\n");
			fwrite( $logfile, date('Y-m-d H:i:s',time()) . "\r\n" . $common['adminIdx'] . " | " . $ipAddr . " | " . $_SERVER['PHP_SELF'] . "\r\n");
			fwrite( $logfile, "\r\n" . $query . "\r\n");
			fclose( $logfile );
		} else if ( $logSave == 'T' ) {
			$ipAddr				=	$_SERVER['REMOTE_ADDR'];
			$logfile			=	fopen($common['DOCUMENTROOT'] . '/saveLog/testLog/DBSave_' . date('Y-m-d',time()) . '.log', 'a+');
			fwrite( $logfile, "\r\n\r\n");
			fwrite( $logfile, "======================================================================\r\n");
			fwrite( $logfile, date('Y-m-d H:i:s',time()) . "\r\n" . $common['adminIdx'] . " | " . $ipAddr . " | " . $_SERVER['PHP_SELF'] . "\r\n");
			fwrite( $logfile, "\r\n" . $query . "\r\n");
			fclose( $logfile );
		} else if ( $logSave == 'S' ) {
			$ipAddr				=	$_SERVER['REMOTE_ADDR'];
			$logfile			=	fopen($common['DOCUMENTROOT'] . '/saveLog/smartCounselLog/DBSave_' . date('Y-m-d',time()) . '.log', 'a+');
			fwrite( $logfile, "\r\n\r\n");
			fwrite( $logfile, "======================================================================\r\n");
			fwrite( $logfile, date('Y-m-d H:i:s',time()) . "\r\n" . $common['adminIdx'] . " | " . $ipAddr . " | " . $_SERVER['PHP_SELF'] . "\r\n");
			fwrite( $logfile, "\r\n" . $query . "\r\n");
			fclose( $logfile );
		}

		return $msg;
	}

	/**
	 * 다수의 쿼리를 배열로 받아 트랜잭션 처리합니다.
	 **/
	public function transaction($queries, $connNo = '1', $logSave = '')
	{
		global $common;
		$msg					=	new Message();

		if ( $connNo == '1' ) {
			$thisConn			=	$this->conn01;
		}

		@mysqli_query($thisConn, 'Start Transaction');

		foreach ( $queries as $query_no=>$query )
		{
			if ( $logSave == 'Y' ) {
				$ipAddr			=	$_SERVER['REMOTE_ADDR'];
				$logfile		=	fopen($common['DOCUMENTROOT'] . '/saveLog/DBSave_' . date('Y-m-d',time()) . '.log', 'a+');
				fwrite( $logfile, "\r\n\r\n");
				fwrite( $logfile, "======================================================================\r\n");
				fwrite( $logfile, date('Y-m-d H:i:s',time()) . "\r\n" . $common['adminIdx'] . " | " . $ipAddr . " | " . $_SERVER['PHP_SELF'] . "\r\n");
				fwrite( $logfile, "\r\n" . $query . "\r\n");
				fclose( $logfile );
			} else if ( $logSave == 'D' ) {
				$ipAddr			=	$_SERVER['REMOTE_ADDR'];
				$logfile		=	fopen($common['DOCUMENTROOT'] . '/saveLog/debug/DBSave_' . date('Y-m-d',time()) . '.log', 'a+');
				fwrite( $logfile, "\r\n\r\n");
				fwrite( $logfile, "======================================================================\r\n");
				fwrite( $logfile, date('Y-m-d H:i:s',time()) . "\r\n" . $common['adminIdx'] . " | " . $ipAddr . " | " . $_SERVER['PHP_SELF'] . "\r\n");
				fwrite( $logfile, "\r\n" . $query . "\r\n");
				fclose( $logfile );
			} else if ( $logSave == 'T' ) {
				$ipAddr			=	$_SERVER['REMOTE_ADDR'];
				$logfile		=	fopen($common['DOCUMENTROOT'] . '/saveLog/testLog/DBSave_' . date('Y-m-d',time()) . '.log', 'a+');
				fwrite( $logfile, "\r\n\r\n");
				fwrite( $logfile, "======================================================================\r\n");
				fwrite( $logfile, date('Y-m-d H:i:s',time()) . "\r\n" . $common['adminIdx'] . " | " . $ipAddr . " | " . $_SERVER['PHP_SELF'] . "\r\n");
				fwrite( $logfile, "\r\n" . $query . "\r\n");
				fclose( $logfile );
			} else if ( $logSave == 'S' ) {
				$ipAddr				=	$_SERVER['REMOTE_ADDR'];
				$logfile			=	fopen($common['DOCUMENTROOT'] . '/saveLog/smartCounselLog/DBSave_' . date('Y-m-d',time()) . '.log', 'a+');
				fwrite( $logfile, "\r\n\r\n");
				fwrite( $logfile, "======================================================================\r\n");
				fwrite( $logfile, date('Y-m-d H:i:s',time()) . "\r\n" . $common['adminIdx'] . " | " . $ipAddr . " | " . $_SERVER['PHP_SELF'] . "\r\n");
				fwrite( $logfile, "\r\n" . $query . "\r\n");
				fclose( $logfile );
			}

			if ( !mysqli_query($thisConn, $query) ) {
				mysqli_query($thisConn, 'ROLLBACK');
				$msg->setMessage(($query_no + 1) . '번 쿼리에서 오류가 발생했습니다.' . $query);
				return $msg;
			}
		}

		mysqli_query($thisConn, 'COMMIT');
		$msg->setResult(true);
		return $msg;
	}

	//	data Reset
	public function dataReset($result)
	{
		mysqli_data_seek($result, 0);
	}

	//	db close
	public function dbClose($connNo='1')
	{
		@mysqli_close($this->conn01);
	}
}
?>