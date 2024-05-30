<?php
$sub_menu = "300120";
require_once './_common.php';

// 관리자 로그인 체크 및 메뉴 권한 체크
auth_check_menu($auth, $sub_menu, 'r', 'w', 'd');

$admin_ids = array('admin', 'log_admin', 'sub_admin', 'as_admin', 'shop_admin', 'board_admin', 'member_admin');

// 로그인한 사용자의 ID가 $admin_ids 배열에 있는지 확인
if (in_array($member['mb_id'], $admin_ids)) {
    $login_id = $member['mb_id']; 
    $mb_name = $member['mb_name'];  
    $user_ip = $_SERVER['REMOTE_ADDR'];  
    $accessed_page = "가디언즈 강연 목록";
    $history_datetime = date('Y-m-d H:i:s'); 
	$action = "조회";

    // 데이터베이스에 접속 기록 삽입
    $sql = "INSERT INTO g5_login_history_save (login_id, user_name, user_ip, accessed_page, history_datetime, action) 
            VALUES ('{$login_id}', '{$mb_name}', '{$user_ip}', '{$accessed_page}', '{$history_datetime}', '{$action}')";
    sql_query($sql);
}
?>

<?
$g5['title'] = '가디언즈 강연 목록 업데이트';

require_once './admin.head.php';
?>
<style>
.adm-table1 {
    width: 100%;
    border-top: 2px solid #333;
    border-collapse: collapse;
    table-layout: fixed;
}

.adm-table1 tbody th {
	padding: 11px 10px 11px 10px;
	color: #2d4492;
	text-align: left;
	font-size: 14px;
	font-weight: bold;
	line-height: 23px;
	background-color: #e0e8ef;
	border-bottom: 1px solid #ccc;
}

.adm-table1 tbody th {
	width: 10%;
	text-align: center;
}

.adm-table1 thead th {
	text-align: center;
	padding: 11px 10px 11px 20px;
	color: #2d4492;
	font-size: 14px;
	font-weight: bold;
	line-height: 23px;
	background-color: #e0e8ef;
	border-bottom: 1px solid #ccc;
}

.adm-table1 td {
	padding: 11px 15px 11px 10px;
	font-size: 14px;
	font-weight: normal;
	color: #666;
	line-height: 23px;
	border-bottom: 1px solid #ccc;
	background-color: #fff;
}
.submit-btns {
    text-align: center;
    margin: 20px 0 0;
}

    .submit-btns a {
        line-height: 42px;
        height: 45px;
        display: inline-block;
        color: #fff;
        padding: 0 15px;
        min-width: 100px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin: 0 5px;
    }

    .submit-btns .btn-submit {
        background-color: #2d4492;
    }

        .submit-btns .btn-submit:hover {
            background-color: #182f7a;
        }

    .submit-btns .btn-cancle {
        background-color: #707070;
    }

        .submit-btns .btn-cancle:hover {
            background-color: #5d5d5d;
        }

    .submit-btns .btn-search {
        min-width: 120px;
        background-color: #707070;
    }

        .submit-btns .btn-search:hover {
            background-color: #5d5d5d;
        }

.submit-btns {
    text-align: center;
    margin: 20px 0 0;
}
</style>
<?php
$sql = "select * from g5_board where bo_table='guardians_adm'";
$row = sql_fetch($sql);
?>
<div class="page-detail">
	<form action="/adm/guardians_update.php" method="post" enctype="multipart/form-data" id="ffff">
		<input type="hidden" name="bo_table" value="guardians_adm">
        <table class="adm-table1 product">
            <caption>[DETAIL LIST]</caption>
            <tbody>
                <tr>
                    <th>1번 강연 날짜</th>
                    <td colspan="5">
                        <input type="text" id="day1" name="day1" value="<?php echo $row['bo_1_subj']?>"  style="width: 10%;">
                    </td>
                </tr>
				<tr>
                    <th>1번 강연 제목</th>
                    <td>
                        <input type="text" id="name1" name="name1" value="<?php echo $row['bo_1']?>"  style="width:100%;">
                    </td>
					<th>1번 강연 강사</th>
                    <td>
                        <input type="text" id="name1" name="name1_2" value="<?php echo $row['bo_1_2']?>"  style="width:100%;">
                    </td>
					<th>1번 강연 장소</th>
                    <td>
                        <input type="text" id="name1" name="name1_3" value="<?php echo $row['bo_1_3']?>"  style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <th>2번 강연 날짜</th>
                    <td colspan="5">
                        <input type="text" id="day2" name="day2" value="<?php echo $row['bo_2_subj']?>"  style="width: 10%;">
                    </td>
					
                </tr>
				<tr>
                    <th>2번 강연 제목</th>
                    <td>
                        <input type="text" id="name2" name="name2" value="<?php echo $row['bo_2']?>"  style="width:100%;">
                    </td>
					<th>2번 강연 강사</th>
                    <td>
                        <input type="text" id="name1" name="name2_2" value="<?php echo $row['bo_2_2']?>"  style="width:100%;">
                    </td>
					<th>2번 강연 장소</th>
                    <td>
                        <input type="text" id="name1" name="name2_3" value="<?php echo $row['bo_2_3']?>"  style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <th>3번 강연 날짜</th>
                    <td colspan="5">
                        <input type="text" id="day3" name="day3" value="<?php echo $row['bo_3_subj']?>"  style="width: 10%;">
                    </td>
					
                </tr>
				<tr>
                    <th>3번 강연 제목</th>
                    <td>
                        <input type="text" id="name3" name="name3" value="<?php echo $row['bo_3']?>"  style="width:100%;">
                    </td>
					<th>3번 강연 강사</th>
                    <td>
                        <input type="text" id="name1" name="name3_2" value="<?php echo $row['bo_3_2']?>"  style="width:100%;">
                    </td>
					<th>3번 강연 장소</th>
                    <td>
                        <input type="text" id="name1" name="name3_3" value="<?php echo $row['bo_3_3']?>"  style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <th>4번 강연 날짜</th>
                    <td colspan="5">
                        <input type="text" id="day4" name="day4" value="<?php echo $row['bo_4_subj']?>"  style="width: 10%;">
                    </td>
					
                </tr>
				<tr>
                    <th>4번 강연 제목</th>
                    <td>
                        <input type="text" id="name4" name="name4" value="<?php echo $row['bo_4']?>"  style="width:100%;">
                    </td>
					<th>4번 강연 강사</th>
                    <td>
                        <input type="text" id="name1" name="name4_2" value="<?php echo $row['bo_4_2']?>"  style="width:100%;">
                    </td>
					<th>4번 강연 장소</th>
                    <td>
                        <input type="text" id="name1" name="name4_3" value="<?php echo $row['bo_4_3']?>"  style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <th>5번 강연 날짜</th>
                    <td colspan="5">
                        <input type="text" id="day5" name="day5" value="<?php echo $row['bo_5_subj']?>"  style="width: 10%;">
                    </td>
					
                </tr>
				<tr>
                    <th>5번 강연 제목</th>
                    <td>
                        <input type="text" id="name5" name="name5" value="<?php echo $row['bo_5']?>"  style="width:100%;">
                    </td>
					<th>5번 강연 강사</th>
                    <td>
                        <input type="text" id="name1" name="name5_2" value="<?php echo $row['bo_5_2']?>"  style="width:100%;">
                    </td>
					<th>5번 강연 장소</th>
                    <td>
                        <input type="text" id="name1" name="name5_3" value="<?php echo $row['bo_5_3']?>"  style="width:100%;">
                    </td>
                </tr>
				<tr>
                    <th>담당자 연락처</th>
                    <td colspan="5">
                        <input type="text" id="tel" name="tel" value="<?php echo $row['bo_6']?>" style="width:20%;">
                    </td>
                </tr>
            </tbody>
        </table>
		<div class="submit-btns">
						<a href="<?php echo G5_ADMIN_URL ?>/guardians.php" class="submit_btt btn-cancle">Cancel</a>
						<a href="javascript:;" class="aaa submit_btt btn-submit" onClick="guardians_edit()">Update</a>

			<!-- <a href="javascript:;" class="dels btn-submit" data-wrid="2">Delete</a> -->
		</div>
    </form>
</div>

<script>
	function guardians_edit (){
		var okok = confirm("업데이트 하시겠습니까?");
		if(okok==true){
			$("#ffff").submit();
			alert('가디언즈 강연 목록이 업데이트 되었습니다.');
		}
	}
</script>


<noscript>
	<p>
		귀하께서 사용하시는 브라우저는 현재 <strong>자바스크립트를 사용하지 않음</strong>으로 설정되어 있습니다.<br>
		<strong>자바스크립트를 사용하지 않음</strong>으로 설정하신 경우는 수정이나 삭제시 별도의 경고창이 나오지 않으므로 이점 주의하시기 바랍니다.
	</p>
</noscript>

<?php
require_once './admin.tail.php';