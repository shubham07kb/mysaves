<?php
$dr=$_SERVER["DOCUMENT_ROOT"];
include $dr.'/config.php';
header('Content-Type: application/json; charset=utf-8');
if($_POST['uid']==$uid){
    if(isset($emailla) and isset($emaillb)){
        $json['stat']='done';
        $json['statv']=1;
        $json['emaila']=$emailla;
        $json['emailb']=$emaillb;
    } else{
        $json['stat']='Not Found Resources, Be sure you completed privous step and not tamper code...';
        $json['statv']=0;
    }
} else{
    $json['stat']='Only Complete using same device';
    $json['statv']=0;
}
ob_end_clean();
echo json_encode($json);
?>