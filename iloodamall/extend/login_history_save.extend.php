<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$g5['login_history_table'] = G5_TABLE_PREFIX.'login_history_save'; // 로그인 기록을 하는 테이블

// 아래 주석을 풀면 사용안함
//return;

define('G5_LOGIN_HISTORY_SAVE_DAYS', 365);      // 1년 동안 기록이 유효함, 0으로 설정시 삭제하지 않음

G5_LOGIN_HISTORY::getInstance();

class G5_LOGIN_HISTORY {
    // Hook 포함 클래스 작성 요령
    // https://github.com/Josantonius/PHP-Hook/blob/master/tests/Example.php
    /**
     * Class instance.
     */
    
    public $admin_number = 200710;
    public $str_call = 'login_history_list';

    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new self();
        }

        return $instance;
    }

    public static function singletonMethod()
    {
        return self::getInstance();
    }

    public function __construct() {
        $this->add_hooks();
    }

    private function add_hooks() {
        add_event('password_is_wrong', array($this, 'login_fail'), 9, 3);
        add_event('member_login_check', array($this, 'login_success'), 9, 3);
        add_replace('admin_menu', array($this, 'add_admin_menu'), 1, 1);
        add_event('admin_get_page_'.$this->str_call, array($this, 'admin_page_config'), 1, 2);
    }

    
	public function db_create() {
		global $g5;

		if(isset($g5['login_history_table']) && !sql_query(" DESC {$g5['login_history_table']} ", false)) {
			$create_sql = "CREATE TABLE IF NOT EXISTS `{$g5['login_history_table']}` (
				`lh_id` int(11) NOT NULL auto_increment,
				`login_type` varchar(10) NOT NULL DEFAULT '',
				`login_id` VARCHAR(255) NOT NULL DEFAULT '',
				`user_name` VARCHAR(255) NOT NULL DEFAULT '', 
				`user_ip` VARCHAR(20) NOT NULL DEFAULT '',
				`user_agent` VARCHAR(255) NOT NULL DEFAULT '',
				`history_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
				`action` varchar(255) DEFAULT NULL,
				`target_id` varchar(255) DEFAULT NULL,
				PRIMARY KEY  (`lh_id`),
				KEY `login_type` (`login_type`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
			sql_query($create_sql, false);
		}
	}



	public function add_admin_menu($admin_menu){
		
		$admin_menu['menu200'][] = array(
			$this->admin_number, '', G5_ADMIN_URL.'/view.php?call='.$this->str_call, $this->str_call
			);
		
		return $admin_menu;
	}

public function admin_page_config($arr_query, $token){
    global $is_admin, $member, $config, $page, $g5, $qstr, $sfl, $stx;

    // 관리자인지 확인
    if(!$is_admin) return;

    // 관리자 아이디 목록
    $admin_ids = array('admin', 'log_admin', 'sub_admin', 'as_admin', 'shop_admin', 'board_admin', 'member_admin');
    if(!in_array($member['mb_id'], $admin_ids)) return;

    $call = $this->str_call;
    $ltype = isset($_REQUEST['ltype']) ? preg_replace('/[^0-9a-z]/i', '', $_REQUEST['ltype']) : '';
    $sql_searchs = array();

    if(!$page){
        $this->delete_history();
    }

    if($ltype){
        $sql_searchs[] = "and login_type = '{$ltype}'";
    }

    if($sfl && !in_array($sfl, array('login_id', 'user_ip', 'user_agent', 'user_name', 'history_datetime'))){
        $sfl = '';
        $stx = '';
    }

    if($sfl && $stx){
        $sql_search = " and ( ";
        switch($sfl){
            case 'user_agent':
                $sql_search .= " ({$sfl} like '%{$stx}%') ";
                break;
            default:
                $sql_search .= " ({$sfl} like '{$stx}%') ";
                break;
        }
        $sql_search .= " ) ";
        $sql_searchs[] = $sql_search;
    }

    $qstr .= '&amp;call='.$this->str_call.'&amp;ltype='.$ltype;
    $page_rows = 200;
    if(!$page) $page = 1;
    $from_record = ($page - 1) * $page_rows;

    $sql = "select count(*) as cnt from `{$g5['login_history_table']}` where (1) ".implode(' ', $sql_searchs);
    $row = sql_fetch($sql);
    $total_count = $row['cnt'];
    $total_page = ceil($total_count / $page_rows);

    $sql = "select * from `{$g5['login_history_table']}` where 1=1 ".implode(' ', $sql_searchs)." order by lh_id desc limit $from_record, $page_rows";
    $result = sql_query($sql, false);

    $list = array();
    while($row = sql_fetch_array($result)){
        $list[] = $row;
    }

    if(empty($list)){
        echo '<tr><td colspan="7">데이터가 없습니다.</td></tr>';
    }
    include_once(G5_PLUGIN_PATH.'/login_history/skin/login_history.list.skin.php');
}




	//public function login_fail($type, $wr=array(), $qstr='') {
		//$mb_id = isset($_POST['mb_id']) ? trim($_POST['mb_id']) : '';
		//$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';  // 사용자 이름 가져오기

		//if($type === 'login' && $mb_id) {
			//$login_type = 'fail';
			//$this->db_insert($login_type, $mb_id, $user_name);
		//}
	//}

	public function login_success($mb, $link, $is_social_login) {
		// 관리자 아이디 목록
		$admin_ids = array('admin', 'log_admin', 'sub_admin', 'as_admin', 'shop_admin', 'board_admin', 'member_admin');

		// 로그인 성공한 사용자의 ID 확인
		$login_id = isset($mb['mb_id']) ? $mb['mb_id'] : '';
		
		// 해당 사용자가 관리자 목록에 있는지 확인
		if (!in_array($login_id, $admin_ids)) {
			return; // 관리자가 아닐 경우 함수 종료
		}

		// 로그인 타입 설정 (성공)
		$login_type = 'success';
		// 회원 이름을 가져옵니다 (필드명 확인 필요)
		$user_name = isset($mb['mb_name']) ? $mb['mb_name'] : '';

		// 관리자만 로그인 기록 저장
		$this->db_insert($login_type, $login_id, $user_name);
	}



	public function db_insert($login_type, $login_id='', $user_name='', $action='', $target_id='') {
		global $g5;

		$user_ip = get_real_client_ip();
		$user_agent = $_SERVER['HTTP_USER_AGENT'];

		$sql_common = "set 
			login_type = '{$login_type}',
			login_id = '{$login_id}',
			user_name = '{$user_name}',
			action = '{$action}',
			target_id = '{$target_id}',
			user_ip = '{$user_ip}',
			user_agent = '{$user_agent}',
			history_datetime = '".G5_TIME_YMDHIS."'
		";

		$sql = "insert into `{$g5['login_history_table']}` $sql_common";
		sql_query($sql, false);
	}




    public function delete_history(){
        global $g5;

        if (defined('G5_LOGIN_HISTORY_SAVE_DAYS') && G5_LOGIN_HISTORY_SAVE_DAYS > 0) {
            $sql_datetime = date("Y-m-d H:i:s", G5_SERVER_TIME - (G5_LOGIN_HISTORY_SAVE_DAYS * 86400));
            
            $sql = "delete from ".$g5['login_history_table']." where history_datetime < '".$sql_datetime."'";

            sql_query($sql, false);
        }
    }

}