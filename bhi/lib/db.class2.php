<?php
if( !class_exists("DBCLASS2") ) {


CLASS DBCLASS2{
	var $conn = "";
	var $dbhost = "";
	var $dbname = "";
	var $dbuser = "";
	var $dbpw = "";
	var $debug_mode = false;

	function DBCLASS2($dbn=''){
		Global $CFG;
//		$this->debug_mode = $CFG[db_debug_mode];

/*		if( $dbn ) {
			include "$CFG[config_dir]/dbinfo"."_".$dbn.".inc.php";
		} else {
			include "$CFG[config_dir]/dbinfo.inc.php";
		}
		*/
		//include "./config/dbinfo.inc.php";
		$DBHOST = "localhost";
		$DBUSER = "root";
		$DBPASSWD = "skdPwns1!";
		$DBNAME = "bhidex";
		$this->dbhost = $DBHOST;
		$this->dbname = $DBNAME;
		$this->dbuser = $DBUSER;
		$this->dbpw = $DBPASSWD;
		if( $dbn ) $this->dbname = $dbn;
	}

	function connect(){
		$this->conn = @mysqli_connect($this->dbhost,$this->dbuser,$this->dbpw, $this->dbname);
		if( $this->conn ) {
			$this->selectedDB = @mysqli_select_db($this->conn, $this->dbname);
			if( $this->selectedDB ) return true;
			else {
				echo "no db!!";
				return false;
			}
		} else {
			if( !$this->conn ) echo "db connect error!!";
			exit;
			return false;
		}
	}

	function query($qry){
		if( !$this->conn ) $this->connect();
		$this->qry = $qry;
		$this->res = @mysqli_query($this->conn, $this->qry);
		$this->affect = @mysqli_affected_rows($this->conn);
		
		if( $this->debug_mode ) {
			$this->error();
			if( $this->errormsg ) $msg = $this->errormsg;
		}

		return @$this->res;
	}

	function select($qry){
		if( !$this->conn ) $this->connect();
		$this->qry = $qry;
		$this->res = @mysqli_query($this->conn, $this->qry);
		$this->row = @mysqli_num_rows($this->res);
   
   return $this->row;
	}

	function get_data(){
		return @mysqli_fetch_object($this->res);
	}

	function get_array(){
		return @mysqli_fetch_array($this->res);
	}

	function get_id(){
		return @mysqli_insert_id();
	}

	function error(){
		$this->errorno = @mysqli_errno();
		$this->errormsg = @mysqli_error();
		return @mysql_error();
	}

	function close(){
		return @mysqli_close($this->conn);
	}
}

} // end class exist
php?>
	