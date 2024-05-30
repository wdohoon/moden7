<?php
defined('webticktock') OR exit('정상적인 접근이 아닙니다');
?>

<div id="dialog-message"></div>
<div id="dialog-confirm"></div>
<div id="contentDetail"></div>
<div id="contentModal"></div>

<iframe id="procFrame" name="procFrame" style="display:none;"></iframe>

<?php
//include $common['wwwPath'] . '/common/commonPage/_footer.php';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_footer.php';
?>