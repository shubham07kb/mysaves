<?php
if($_GET['base']=='su'){
  if($_GET['page']='installation'){
    header('Content-Type: text/css; charset=utf-8');
    $js='
    function runsetup(n){
        if(n==2){
            document.getElementById("insideboxinstall").innerHTML="<h1>Databse Connect</h1><hr><div><b>Databse Host:</b> <input id='."'dbhost'".'><br><b>Databse Name:</b> <input id='."'dbname'".'><br><b>Databse Username:</b> <input id='."'dbuname'".'><br><b>Databse Password:</b> <input id='."'dbpass'".'><br><b>Databse Postfix:</b> <input><br><div id='."'getsecpostkey'".'></div><b><input onChange='."'secpostfixcheck()'".' id='."'checkboxforpostfixsec'".' type='."'checkbox'".'>Databse Intigrate User</b><br></div><br><div id='."'errorred'".'></div><br><button onClick='."'dbcheckap()'".'>Verify & Procced</button>";
        } else if(n==3){
            document.getElementById("insideboxinstall").innerHTML="<h1>Site Details</h1><hr><div><b>Site Name:</b> <input id='."'sname'".'><br><b>Username:</b> <input id='."'uname'".'><br><b>Passward:</b> <input id='."'pass'".'><br><b>Primary E-Mail:</b> <input id='."'emaila'".'><br><b>Secondary E-Mail:</b> <input id='."'emailb'".'><br><div id='."'errorred'".'></div><br><button onClick='."'sdv()'".'>Save</button>";
        } else if(n==4){
            document.getElementById("insideboxinstall").innerHTML="";
        }
    }
    function secpostfixcheck(){
        if(document.getElementById("checkboxforpostfixsec").checked){
            document.getElementById("getsecpostkey").innerHTML="<b>Databse Infix:</b> <input><br>";
        } else{
            document.getElementById("getsecpostkey").innerHTML="";
        }
    }
    function dbcheckap(){
        var a=document.getElementById("dbhost").value;
        var b=document.getElementById("dbname").value;
        var c=document.getElementById("dbuname").value;
        var d=document.getElementById("dbpass").value;
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
        xhttp.open("POST", "/admin/tools/checkdb.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("host="+a+"&dbname="+b+"&uname="+c+"&pass="+d);
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
        xhttp.open("POST", "/admin/tools/sitedataadd.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("sname="+a+"&uname="+b+"&pass="+c+"&emaila="+d+"&emailb="+e+"&uid="+localStorage.getItem("uid"));
    }
    ';
  }
}
echo $js;
?>