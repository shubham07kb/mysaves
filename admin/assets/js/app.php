<?php
if($_GET['base']=='su'){
  if($_GET['page']='installation'){
    header('Content-Type: text/css; charset=utf-8');
    $js='
    function runsetup(n){
        if(n==2){
            document.getElementById("insideboxinstall").innerHTML="<h1>Databse Connect</h1><hr><div><b>Databse Host:</b> <input id='."'dbhost'".'><br><b>Databse Name:</b> <input id='."'dbname'".'><br><b>Databse Username:</b> <input id='."'dbuname'".'><br><b>Databse Password:</b> <input id='."'dbpass'".'><br><b>Databse Postfix:</b> <input id='."'postdbn'".'><br><div id='."'getsecpostkey'".'></div><b><input onChange='."'secpostfixcheck()'".' id='."'checkboxforpostfixsec'".' type='."'checkbox'".'>Databse Intigrate User</b><br></div><br><div id='."'errorred'".'></div><br><button onClick='."'dbcheckap()'".'>Verify & Procced</button>";
        } else if(n==3){
            document.getElementById("insideboxinstall").innerHTML="<h1>Site Details</h1><hr><div><b>Site Name:</b> <input id='."'sname'".'><br><b>Username:</b> <input id='."'uname'".'><br><b>Passward:</b> <input id='."'pass'".'><br><b>Primary E-Mail:</b> <input id='."'emaila'".'><br><b>Secondary E-Mail:</b> <input id='."'emailb'".'></div><br><div id='."'errorred'".'></div><br><button onClick='."'sdv()'".'>Save</button>";
        } else if(n==4){
            document.getElementById("insideboxinstall").innerHTML="<h1>Email Account Setup & Validation</h1><hr><div><b>Email Host:</b> <input id='."'ehost'".'><br><b>Username:</b> <input id='."'euname'".'><br><b>Password:</b> <input id='."'epass'".'><br><b>Security Layer:</b> <input id='."'etype'".'><br><b>Port:</b> <input id='."'eport'".'><br></div id='."'otpfeilds'".'><div></div><div id='."'errorred'".'></div><button onClick='."'getotp()'".'>Request OTP</button>";
        } else if(n==5){
            document.getElementById("insideboxinstall").innerHTML="<h1>OTP Verification</h1><hr><div id='."'setgetotp'".'><b>Getting Data</b></div><br><div id='."'errorred'".'></div><button onClick='."'gotoinstallpage()'".'>Verify OTP</button>";
            otpemailget();
        } else if(n==6){
            document.getElementById("insideboxinstall").innerHTML="<div><b>Almost Done, Nice Work</b><hr><button  onClick='."'callfinalinstall()'".'>Click Install to Install</button></div>"
        }
    }
    function callfinalinstall(){
        console.log("started");
    }
    function gotoinstallpage(){
        a=document.getElementById("otpentera").value;
        b=document.getElementById("otpenterb").value;
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var js=JSON.parse(this.responseText);
                if(js.statv==1){
                    localStorage.setItem("iid", js.iid);
                    runsetup(6);
                } else if(js.statv==0){
                    document.getElementById("errorred").innerHTML=js.stat;
                }
            }
        };
        xhttp.open("POST", "/admin/tools/install/otpverify.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("otpa="+a+"&otpb="+b+"&uid="+localStorage.getItem("uid"));
    }
    function otpemailget(){
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var js=JSON.parse(this.responseText);
                if(js.statv==1){
                    document.getElementById("setgetotp").innerHTML="<b>OTP for "+js.emaila+":</b><input id='."'otpentera'".'><br><br><b>OTP for "+js.emailb+":</b><input id='."'otpenterb'".'><br><br>";
                } else if(js.statv==0){
                    document.getElementById("errorred").innerHTML=js.stat;
                }
            }
        };
        xhttp.open("POST", "/admin/tools/install/otpemailgetreq.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("uid="+localStorage.getItem("uid"));
    }
    function secpostfixcheck(){
        if(document.getElementById("checkboxforpostfixsec").checked){
            document.getElementById("getsecpostkey").innerHTML="<b>Databse Infix:</b> <input id='."'secpostdbn'".'><br>";
        } else{
            document.getElementById("getsecpostkey").innerHTML="";
        }
    }
    function dbcheckap(){
        var a=document.getElementById("dbhost").value;
        var b=document.getElementById("dbname").value;
        var c=document.getElementById("dbuname").value;
        var d=document.getElementById("dbpass").value;
        f=document.getElementById("postdbn").value;
        if(document.getElementById("checkboxforpostfixsec").checked){
            e="y";
            g=document.getElementById("secpostdbn").value;
        } else{
            e="n";
            g="n";
        }
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var js=JSON.parse(this.responseText);
                if(js.statv==1){
                    localStorage.setItem("uid", js.uni);
                    runsetup(3);
                } else if(js.statv==0){
                    document.getElementById("errorred").innerHTML=js.stat;
                }
            }
        };
        xhttp.open("POST", "/admin/tools/install/checkdb.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("host="+a+"&dbname="+b+"&uname="+c+"&pass="+d+"&udbi="+e+"&pdbs="+f+"&sdbs="+g);
    }
    function sdv(){
        var a=document.getElementById("sname").value;
        var b=document.getElementById("uname").value;
        var c=document.getElementById("pass").value;
        var d=document.getElementById("emaila").value;
        var e=document.getElementById("emailb").value;
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var js=JSON.parse(this.responseText);
                if(js.statv==1){
                    runsetup(4);
                } else if(js.statv==0){
                    document.getElementById("errorred").innerHTML=js.stat;
                }
            }
        };
        xhttp.open("POST", "/admin/tools/install/sitedataadd.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("sname="+a+"&uname="+b+"&pass="+c+"&emaila="+d+"&emailb="+e+"&uid="+localStorage.getItem("uid"));
    }
    function getotp(){
        var a=document.getElementById("ehost").value;
        var b=document.getElementById("euname").value;
        var c=document.getElementById("epass").value;
        var d=document.getElementById("etype").value;
        var e=document.getElementById("eport").value;
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var js=JSON.parse(this.responseText);
                if(js.statv==1){
                    runsetup(5);
                } else if(js.statv==0){
                    document.getElementById("errorred").innerHTML=js.stat;
                }
            }
        };
        xhttp.open("POST", "/admin/tools/install/emailready.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("ehost="+a+"&euname="+b+"&epass="+c+"&etype="+d+"&eport="+e+"&uid="+localStorage.getItem("uid"));
    }
    ';
  }
}
echo $js;
?>