<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function domail(){
    require $dr.'/site/tools/phpmailer/vendor/autoload.php';
    require $dr.'/site/tools/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
    require $dr.'/site/tools/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require $dr.'/site/tools/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
    $mail = new PHPMailer(TRUE);
    try {
        $mail->isSMTP($a,$b,$c,$d,$e,$f,$g); 
        $mail->Host       = $a; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = $b; 
        $mail->Password   = $c; 
        $mail->SMTPSecure = $d; 
        $mail->Port       = $e; 
        $mail->setFrom($b, 'MeowCon');
        $mail->addAddress($g);
        $mail->isHTML($emailishtml);
        $mail->Subject = "OTP";
        $mail->Body    = $f;
        $mail->AltBody = $f;
        $mail->send();
        return 1;
    } catch (Exception $e) {
        return 0;
    }
}
$dr=$_SERVER["DOCUMENT_ROOT"];
include $dr.'/config.php';
header('Content-Type: application/json; charset=utf-8');
if($setpage==4){
    if(isset($_POST['ehost']) and $_POST['ehost']!=''){
        if(isset($_POST['euname']) and $_POST['euname']!=''){
            if(isset($_POST['epass']) and $_POST['epass']!=''){
                if(isset($_POST['etype']) and $_POST['etype']!=''){
                    if(isset($_POST['eport']) and $_POST['eport']!=''){
                        $ua=uniqid();
                        $ra=domail($_POST['ehost'],$_POST['euname'],$_POST['epass'],$_POST['etype'],$_POST['eport'],$u,$emailla);
                        $ub=uniqid();
                        $rb=domail($_POST['ehost'],$_POST['euname'],$_POST['epass'],$_POST['etype'],$_POST['eport'],$u,$emailla);
                    }
                }
            }
        }
    }
} else{
    $json['stat']='Not Connect, Already Entered, Only access to this when installation Complete';
    $json['statv']=0;
}
ob_end_clean();
echo json_encode($json);
?>





$emailhost="smtp.gmail.com";    /
$emailsmtpauth=true;            /
$emailusername="kumarbansal.shubham07@gmail.com";    /
$emailpassword="jplqmmfsqlhqfndn";     /
$emailport=587;    /
$emailsender="kumarbansal.shubham07@gmail.com";
$emailto="19BCS4309@cuchd.in";
$emailishtml=true;
$emailsubject="OTP";    /
$emailbody="";    /
$emailbodyp="";    /