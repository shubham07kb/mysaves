<?php
$cw=$_SERVER['MC_MAIN_DIR'];
include $cw.'/config.php';
header('Content-Type: application/json; charset=utf-8');
if($setpage==2){
    if(isset($_POST['host']) and $_POST['host']!=''){
        if(isset($_POST['dbname']) and $_POST['dbname']!=''){
            if(isset($_POST['uname']) and $_POST['uname']!=''){
                if(isset($_POST['pass']) and $_POST['pass']!=''){
                    if(isset($_POST['udbi']) and $_POST['udbi']!=''){
                        if(isset($_POST['pdbs']) and $_POST['pdbs']!='' and notcontainthanalphabet($_POST['pdbs'])==1){
                            if(isset($_POST['sdbs']) and $_POST['sdbs']!='' and notcontainthanalphabet($_POST['sdbs'])==1){
                                try{
                                    $conn=mysqli_connect($_POST['host'],$_POST['uname'],$_POST['pass'],$_POST['dbname']);
                                    if(!$conn){
                                        $json['stat']='Not Connect';
                                        $json['statv']=0;
                                        $p=1;
                                    } else{
                                        $json['uni']=uniqid();
                                        $json['stat']='connect';
                                        $json['statv']=1;
                                        $p=1;
                                        $line='$dbhost='."'".$_POST['host']."'; ".'$dbname='."'".$_POST['dbname']."'; ".'$dbuname='."'".$_POST['uname']."'; ".'$dbpass='."'".$_POST['pass']."'; ";
                                        $file=$cw.'/formatconfig.php';
                                        $lines=file($file);
                                        $lines[1]=$line.PHP_EOL;
                                        $lines[2]='$dbsui="'.$_POST['udbi'].'"; $pdbs="'.$_POST['pdbs'].'"; $sdbs="'.$_POST['sdbs'].'";'.PHP_EOL;
                                        file_put_contents($file, implode('', $lines));
                                        $line='$setpage=3;';
                                        $file=$cw.'/config.php';
                                        $lines=file($file);
                                        $lines[5]=$line.PHP_EOL;
                                        $lines[4]='$uid="'.$json['uni'].'";'.PHP_EOL;
                                        file_put_contents($file, implode('', $lines));
                                    }
                                } catch(Exception $e){
                                    $json['stat']='Not Connect';
                                    $json['statv']=0;
                                    $p=1;
                                }
                            } else{
                                $p=0;
                                $d=1;
                            }
                        } else{
                            $p=0;
                            $d=2;
                        }
                    } else{
                        $p=0;
                        $d=3;
                    }
                } else{
                    $p=0;
                    $d=4;
                }
            } else{
                $p=0;
                $d=5;
            }
        } else{
            $p=0;
            $d=6;
        }
    } else{
        $p=0;
        $d=7;
    }
    if($p==0){
        $json['stat']='Not Connect, Value Not Present';
        $json['statv']=0;
        $json['d']=$d;
    }
} else{
    $json['stat']='Not Connect, Already Entered, Only access to this when installation Complete';
    $json['statv']=0;
}
ob_end_clean();
echo json_encode($json);
?>

