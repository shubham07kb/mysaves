<?php
$cw=getcwd();
session_start();
include $cw.'/config.php';
if(isset($_GET['url'])){
    $getl=$_GET['url'];
    $gets=explode("/",$getl);
}
if($setpagey==0){    //a-admin,c-coadmin,t-technical,w-writer,n-normal,u-notverified,l-notloged,s-suspended
    if(isset($_SESSION['role']) and ($_SESSION['role']=='a' or $_SESSION['role']=='c' or $_SESSION['role']=='t' or $_SESSION['role']=='w')){
        include $cw.'/site/role/actw.php';
    } else{
        include $cw.'/site/role/nuls.php';
    }
}
if($setpagey==1){
    include $cw.'/admin/setup/install/welcome.php';
}
?>