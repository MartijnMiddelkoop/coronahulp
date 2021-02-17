<?php 
require 'config.php';
session_start();

if (isset($_SESSION['username']) == true) {

} else {
header("Location: test.php");
}


echo "hallo luitjes";
?>