<?php
$uploaddir = './wp_upload/';


function word_write ($msg,$brNum=0){

    for($i=0;$i<$brNum;$i++){
    $brTmp .= '<br />';
    }
    echo $msg.$brTmp;
}
?>