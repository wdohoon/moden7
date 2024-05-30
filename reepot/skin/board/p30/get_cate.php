<?php
include_once($_SERVER['DOCUMENT_ROOT'] ."/common.php");

$a1_key = $_GET['a1_key'];

if($a1_key){	
	$sql_mo2 = "SELECT DISTINCT wr_2 FROM post_k where wr_1='$a1_key' order by wr_2";	
	$result_mo2 = sql_query($sql_mo2);
?>				  

	<select name="wr_2" id="wr_2"  class="store_sel02 frm_input">
		<option value="">선택하세요</option>
		<?php for($i=0;$row_mo2=sql_fetch_array($result_mo2);$i++){ ?>
		<option value="<?php echo $row_mo2['wr_2']?>" ><?php echo $row_mo2['wr_2']?></option>
					
		<?php
		}		
		?>
	</select>
<?php
} else {
?>
<select name="wr_2" id="wr_2"  class="store_sel02 frm_input">
	<option value="">선택하세요</option>
	<option value="">선택하세1요</option>
</select>
<?php } ?>