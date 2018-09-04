<?php
if(($_POST["user"]==="admin" && $_POST["password"]==="a")){
     //pusti dalje
     session_start();
        $_SESSION["user"]= $_POST["user"];
        header("location:admin.php"); 
    }
    else{
        header("location:page.php?greska=4");
    }
if(empty($_POST["password"]) and empty($_POST["user"])){
    header("location:page.php?greska=1");
    exit;
    }
if(empty($_POST["user"])){
     header("location:page.php?greska=2");
     exit;
}
if(empty($_POST["password"])){
    header("location:page.php?greska=3");
    exit;
}
