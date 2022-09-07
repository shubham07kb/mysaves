<?php
$cw=$_SERVER['MC_MAIN_DIR'];
include $cw.'/formatconfig.php';
header('Content-Type: application/json; charset=utf-8');
if($iid==$_POST['iid']){
    if(isset($_POST['ch'])){
        if($_POST['ch']=='allneedcomplete'){
            try{
                $i=0;
                $file=$cw.'/extraconfig.php';
                $lines=file($file);
                $lines[$i]='<?php'.PHP_EOL;
                $i++;
                $lines[$i]='//Do not enter anything till line... '.PHP_EOL;
                $i++;
                $lines[$i]='//Also just edit string till that if know perfectly, see documentaion for more'.PHP_EOL;
                $i++;
                $lines[$i]='$appname="MeowCon"; $appver="v:0.0.2_beta";'.PHP_EOL;
                $i++;
                if($dbsui=="n"){
                    $sdbs=$pdbs;
                }
                $lines[$i]='$dbhost="'.$dbhost.'"; $dbname="'.$dbname.'"; $dbuname="'.$dbuname.'"; $dbpass="'.$dbpass.'"; $dbsui="'.$dbsui.'"; $pdbs="'.$pdbs.'"; $sdbs="'.$sdbs.'"; '.PHP_EOL;
                $i++;
                $lines[$i]='$conn=mysqli_connect($dbhost, $dbuname, $dbpass, $dbname);';
                $i++;
                $lines[$i]='$sitename="'.$sitename.'"; '.PHP_EOL;
                $i++;
                $lines[$i]='$setpage=0; '.PHP_EOL;
                $i++;
                $lines[$i]='if($setpage==2 or $setpage==3 or $setpage==4 or $setpage==5 or $setpage==6){'.PHP_EOL;
                $i++;
                $lines[$i]='    $setpagey=1;'.PHP_EOL;
                $i++;
                $lines[$i]='}'.PHP_EOL;
                $i++;
                $lines[$i]='if($setpage==0){'.PHP_EOL;
                $i++;
                $lines[$i]='    $setpagey=0;'.PHP_EOL;
                $i++;
                $lines[$i]='}'.PHP_EOL;
                $i++;
                $lines[$i]='//you can add line below, if you want, so it not create problem to edit files by system...'.PHP_EOL;
                $i++;
                $lines[$i]='?>'.PHP_EOL;
                file_put_contents($file, implode('', $lines));
                $fileContents=file_get_contents($file);
                $fh = fopen($cw."/config.php", 'w' );
                fclose($fh);
                $fileHandle = fopen($Path . $cw."/config.php", "r+");
                fputs($fileHandle, $fileContents);
                fclose($fileHandle);
                $json['stat']='Config File Ready And Website is Partially Running, Do Not Refresh page, you will automatically ridirect to login page when all things set up!';
                $json['statv']=1;
            } catch(Exception $e){
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