<?php
$dr=$_SERVER["DOCUMENT_ROOT"];
include $dr.'/config.php';
if($setpagey==1){
    include $dr.'/admin/setup/install/welcome.php';
}
?>