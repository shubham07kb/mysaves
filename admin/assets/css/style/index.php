<?php
if($_GET['base']=='su'){
  if($_GET['page']='installation'){
    header('Content-Type: text/css; charset=utf-8');
    $stylesheet='
    body, html {
      height: 100%;
      margin: 0;
    }
    .bg{
        background-color: white;
        height: 100%;
        background-position: center;
        background-size: cover;
        position: relative;
        color: white;
        font-family: "Courier New", Courier, monospace;
        font-size: 25px;
      }
      .topleft {
        color: black;
        position: absolute;
        top: 0;
        left: 16px;
      }
      .middle {
        color: black;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
      }
      hr {
        margin: auto;
        width: 40%;
      }
      ';
  }
}
echo $stylesheet;
?>