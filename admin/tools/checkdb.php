<?php
$dr=$_SERVER["DOCUMENT_ROOT"];
include $dr.'/config.php';
header('Content-Type: application/json; charset=utf-8');
if($setpage==2){
    if(isset($_POST['host']) and $_POST['host']!=''){
        if(isset($_POST['dbname']) and $_POST['dbname']!=''){
            if(isset($_POST['uname']) and $_POST['uname']!=''){
                if(isset($_POST['pass']) and $_POST['pass']!=''){
                    if(isset($_POST['udbi']) and $_POST['udbi']!=''){
                        if(isset($_POST['pdbs']) and $_POST['pdbs']!=''){
                            if(isset($_POST['sdbs']) and $_POST['sdbs']!=''){
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
                                        $file=$dr.'/formatconfig.php';
                                        $lines=file($file);
                                        $lines[1]=$line.PHP_EOL;
                                        $lines[2]='$dbsui="'.$_POST['udbi'].'"; $pdbs="'.$_POST['pdbs'].'"; $sdbs="'.$_POST['sdbs'].'";'.PHP_EOL;
                                        file_put_contents($file, implode('', $lines));
                                        $line='$setpage=3;';
                                        $file=$dr.'/config.php';
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
        $p=0;
    }
    if($p==0){
        $json['stat']='Not Connect, Value Not Present';
        $json['statv']=0;
    }
} else{
    $json['stat']='Not Connect, Already Entered, Only access to this when installation Complete';
    $json['statv']=0;
}
ob_end_clean();
echo json_encode($json);
?>

