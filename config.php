<?php
//Do not enter anything till line... 
//Also just edit string till that if know perfectly, see documentaion for more
$appname='MeowCon';
$uid="6311103cafe31"; $otpa="6311104c77b35"; $otpb="63111050b5446";
$setpage=6; $emailla="kumarbansal.shubham07@gmail.com"; $emaillb="shubhamkumarbansal07@gmail.com"; $iid="63111071b4797";
if($setpage!=0){
    $setpagey=1;
}
if($setpage!=1){
    $setpagey=1;
}
$k=1;
if($k==0){
    $file=$cw.'/.htaccess';
    $lines=file($file);
    $lines[1]='SetEnv MC_MAIN_DIR "'.$cw.'"'.PHP_EOL;
    file_put_contents($file, implode('', $lines));
    $file=$cw.'/config.php';
    $lines=file($file);
    $lines[12]='$k=1;'.PHP_EOL;
    file_put_contents($file, implode('', $lines));
    $file=$cw.'/index.php';
    $lines=file($file);
    $lines[1]='$cw=$_SERVER["MC_MAIN_DIR"];'.PHP_EOL;
    file_put_contents($file, implode('', $lines));
}
include $cw.'/site/tools/functions.php';
?>