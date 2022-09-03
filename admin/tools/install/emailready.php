<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function domail($a,$b,$c,$d,$e,$f,$g){
    $cw=$_SERVER['MC_MAIN_DIR'];
    require $cw.'/site/tools/phpmailer/vendor/autoload.php';
    $mail = new PHPMailer(TRUE);
    try {
        $mail->isSMTP(); 
        $mail->Host       = $a; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = $b; 
        $mail->Password   = $c; 
        $mail->SMTPSecure = $d; 
        $mail->Port       = $e; 
        $mail->setFrom($b, 'MeowCon');
        $mail->addAddress($g);
        $mail->isHTML(true);
        $mail->Subject = "OTP for ".$g;
        $mail->Body    = $f;
        $mail->AltBody = $f;
        $mail->send();
        return 1;
    } catch(Exception $e) {
        return 0;
    }
}
$cw=$_SERVER['MC_MAIN_DIR'];
include $cw.'/config.php';
header('Content-Type: application/json; charset=utf-8');
if($setpage==4){
    if(isset($_POST['ehost']) and $_POST['ehost']!=''){
        if(isset($_POST['euname']) and $_POST['euname']!=''){
            if(isset($_POST['epass']) and $_POST['epass']!=''){
                if(isset($_POST['etype']) and $_POST['etype']!=''){
                    if(isset($_POST['eport']) and $_POST['eport']!=''){
                        if($_POST['uid']==$uid){
                            $ua=uniqid();
                            //$ra=domail($_POST['ehost'],$_POST['euname'],$_POST['epass'],$_POST['etype'],$_POST['eport'],$ua,$emailla);
                            $ub=uniqid();
                            $ra=1; $rb=1;
                            //$rb=domail($_POST['ehost'],$_POST['euname'],$_POST['epass'],$_POST['etype'],$_POST['eport'],$ub,$emaillb); 
                            if($ra==1 and $rb==1){
                                $line='$ehost='."'".$_POST['ehost']."'; ".'$euname='."'".$_POST['euname']."'; ".'$epass='."'".$_POST['epass']."'; ".'$etype='."'".$_POST['etype']."'; ".'$eport='."'".$_POST['eport']."';";
                                $file=$cw.'/formatconfig.php';
                                $lines=file($file);
                                $lines[5]=$line.PHP_EOL;
                                $lines[6]=''.PHP_EOL;
                                file_put_contents($file, implode('', $lines));
                                $file=$cw.'/config.php';
                                $lines=file($file);
                                $lines[4]='$uid="'.$uid.'"; $otpa="'.$ua.'"; $otpb="'.$ub.'";'.PHP_EOL;
                                $lines[5]='$setpage=5; $emailla="'.$emailla.'"; $emaillb="'.$emaillb.'";'.PHP_EOL;
                                file_put_contents($file, implode('', $lines));
                                $json['stat']='Send';
                                $json['statv']=1;
                            } else{
                                $json['stat']='Error';
                                $json['statv']=0;
                            }
                        } else{
                            $json['stat']='Only Complete using same device';
                            $json['statv']=0;
                        }
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



<?php
/*
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
*/
?>