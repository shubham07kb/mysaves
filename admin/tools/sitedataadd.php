<?php
$dr=$_SERVER["DOCUMENT_ROOT"];
include $dr.'/config.php';
header('Content-Type: application/json; charset=utf-8');
if($setpage==3){
    if(isset($_POST['uid']) and $_POST['uid']==$uid){
        if(isset($_POST['sname']) and $_POST['sname']!=''){
            if(isset($_POST['uname']) and $_POST['uname']!=''){
                if(isset($_POST['pass']) and $_POST['pass']!=''){
                    if(isset($_POST['emaila']) and $_POST['emaila']!=''){
                        if(isset($_POST['emailb']) and $_POST['emailb']!=''){
                            
                        }
                    }
                }
            }
        }
    } else{
        $json['stat']='No access, You acn online install site from same device you started';
        $json['statv']=0;
    }
}  else{
    $json['stat']='Not Connect, Already Entered, Only access to this when installation Complete';
    $json['statv']=0;
}
?>