<?php
$cw=$_SERVER['MC_MAIN_DIR'];
include $cw.'/formatconfig.php';
header('Content-Type: application/json; charset=utf-8');
if($iid==$_POST['iid']){
    if(isset($_POST['ch'])){
        if($_POST['ch']=='allneedcomplete'){
            try{
                $json['stat']='All things are working perfectly.';
                $json['statv']=1;
            }  catch(Exception $e){
                $json['stat']="Error: $e";
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