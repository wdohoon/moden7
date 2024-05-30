<?php

include_once('./_common.php');
$result2 = sql_query("SELECT * FROM genuine_list WHERE mb_id = 'admin' AND (division = 0 OR division = 2)");
$genuine_values = array();
while ($row = sql_fetch_array($result2)) {
    $genuine_values[] = $row['pd_name'];
    print_r2($row);
}
$genuine_unique = array_unique($genuine_values);
$genuine_all = implode('/', $genuine_unique);
echo $genuine_all;
?>