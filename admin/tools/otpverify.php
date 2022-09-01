<?php
$dr=$_SERVER["DOCUMENT_ROOT"];
include $dr.'/config.php';
header('Content-Type: application/json; charset=utf-8');
if(isset($_POST['uid']) and $_POST['uid']==$uid){
    if(isset($_POST['otpa']) and $_POST['otpa']!=''){
        if(isset($_POST['otpb']) and $_POST['otpb']!=''){
            if($_POST['otpa']==$otpa and $_POST['otpb']==$otpb){
                $file=$dr.'/config.php';
                $lines=file($file);
                $uiid=uniqid();
                $lines[5]='$setpage=6; $emailla="'.$emailla.'"; $emaillb="'.$emaillb.'"; $iid="'.$uiid.'";'.PHP_EOL;
                file_put_contents($file, implode('', $lines));
                $json['stat']='Done';
                $json['iid']=$uiid;
                $json['statv']=1;
            } else{
                $json['stat']='InCorrect OTP';
                $json['statv']=0;
            }
        } else{
            $json['a']="b";
            $json['stat']='OTP not recived by your side';
            $json['statv']=0;
        }
    } else{
        $json['a']="a";
        $json['stat']='OTP not recived by your side';
        $json['statv']=0;
    }
} else{
    $json['stat']='Same device please';
    $json['statv']=0;
}
ob_end_clean();
echo json_encode($json);
?>