<?php
$dr=$_SERVER["DOCUMENT_ROOT"];
include $dr.'/config.php';
header('Content-Type: application/json; charset=utf-8');
if($setpage==3){
    $p=1;
    if(isset($_POST['uid']) and $_POST['uid']==$uid){
        if(isset($_POST['sname']) and $_POST['sname']!=''){
            if(isset($_POST['uname']) and $_POST['uname']!=''){
                if(isset($_POST['pass']) and $_POST['pass']!=''){
                    if(isset($_POST['emaila']) and $_POST['emaila']!=''){
                        if(isset($_POST['emailb']) and $_POST['emailb']!=''){
                            if(usernamevalidation($_POST['uname'])==1){
                                if(filter_var($_POST['emaila'], FILTER_VALIDATE_EMAIL)){
                                    if(filter_var($_POST['emailb'], FILTER_VALIDATE_EMAIL)){
                                        $file=$dr.'/formatconfig.php';
                                        $lines=file($file);
                                        $lines[3]='$sitename="'.$_POST['sname'].'"; $username="'.$_POST['uname'].'"; $password="'.$_POST['pass'].'"; $emaila="'.$_POST['emaila'].'"; $emailb="'.$_POST['emailb'].'";'.PHP_EOL;
                                        $lines[4]=''.PHP_EOL;
                                        file_put_contents($file, implode('', $lines));
                                        $json['stat']='Done';
                                        $json['statv']=1;
                                    } else{
                                        $json['stat']='Email Secondary Not Valid';
                                        $json['statv']=0;
                                    }
                                } else{
                                    $json['stat']='Email Primary Not Valid';
                                    $json['statv']=0;
                                }
                            } else{
                                $json['stat']='Username Format Not Correct';
                                $json['statv']=0;
                            }
                        } else{
                            $p=0;
                        }
                    } else{
                        $p=0;
                    }
                } else{
                    $p=0;
                }
            } else{
                $p=0;
            }
        } else{
            $p=0;
        }
    } else{
        $json['stat']='No access, You acn online install site from same device you started';
        $json['statv']=0;
    }
}  else{
    $json['stat']='Not Connect, Already Entered, Only access to this when installation Complete';
    $json['statv']=0;
}
ob_end_clean();
echo json_encode($json);
?>