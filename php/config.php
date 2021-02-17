<?php
if (!defined('DBHOST')) define("DBHOST","localhost");
if (!defined('DBNAME')) define("DBNAME","coronahulp");
if (!defined('DBUSER')) define("DBUSER","root");
if (!defined('DBPASS')) define("DBPASS","");

$con = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
if(!$con or mysqli_connect_error()) {
    echo mysqli_error($con);
}else {
    $con->set_charset("utf8");
    $con->query("SET lc_tine_names = 'nl_NL';");
}

?>