<?php
$cw=$_SERVER['MC_MAIN_DIR'];
include $cw.'/config.php';
include $cw.'/formatconfig.php';
header('Content-Type: application/json; charset=utf-8');
if($iid==$_POST['iid']){
    if(isset($_POST['ch'])){
        if($_POST['ch']=='allneedcomplete'){
            if(isset($dbhost) and isset($dbname) and isset($dbuname) and isset($dbpass) and isset($dbsui) and isset($pdbs) and isset($sdbs) and isset($sitename) and isset($username) and isset($password) and isset($emaila) and isset($emailb) and isset($ehost) and isset($euname) and isset($epass) and isset($etype) and isset($eport) and $dbhost!='' and $dbname!='' and $dbuname!='' and $dbpass!='' and $dbsui!='' and $pdbs!='' and $sdbs!='' and $sitename!='' and $username!='' and $password!='' and $emaila!='' and $emailb!='' and $ehost!='' and $euname!='' and $epass!='' and $etype!='' and $eport!=''){
                $json['stat']='Value Present';
                $json['statv']=1;
            } else{
                $json['stat']='Value Not Present, or Empty';
                $json['statv']=0;
            }
        } else{
            $json['stat']='Pass Working Parameter Please';
            $json['statv']=0;
        }
    } else{
        $json['stat']='Not understand request';
        $json['statv']=0;
    }
} else{
    $json['stat']='Not requesting From same device';
    $json['statv']=0;
}
ob_end_clean();
echo json_encode($json);
?>