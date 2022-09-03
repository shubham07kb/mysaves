<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$cw=$_SERVER['MC_MAIN_DIR'];
include $cw.'/formatconfig.php';
header('Content-Type: application/json; charset=utf-8');
function mailhere(){
    $mail = new PHPMailer(TRUE);
    try {
        $mail->isSMTP(); 
        $mail->Host       = $mcehost; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = $mce;
        $mail->Password   = $c; 
        $mail->SMTPSecure = $d; 
        $mail->Port       = $e; 
        $mail->setFrom($b, 'MeowCon');
        $mail->addAddress($g);
        $mail->isHTML(true);
        $mail->Subject = 'Installation complete';
        $mail->Body    = 'Installation complete';
        $mail->AltBody = 'Installation complete';
        $mail->send();
        return 1;
    } catch(Exception $e) {
        return 0;
    }
}
if($iid==$_POST['iid']){
    if(isset($_POST['ch'])){
        if($_POST['ch']=='allneedcomplete'){
            try{
                $json['stat']='Done All';
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
if($iid=$_POST['iid']){
    
}
ob_end_clean();
echo json_encode($json);
?>