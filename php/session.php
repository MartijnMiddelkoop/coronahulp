<?php
session_start();
//the redirect

if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true){
    header("location: welcome.php"); 
    exit;
}
?>