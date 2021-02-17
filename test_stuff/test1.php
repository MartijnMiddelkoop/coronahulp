<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coronahulp";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//CHECKING SUBMIT BUTTON PRESS or NOT.
    if(isset($_POST["submitBtn"]) && $_POST["submitBtn"]!=""){ 
        $name=$_POST["name"];
        $email=$_POST["email"];
        $message=$_POST["message"];

//INSERT QUERY
    if(mysqli_query("INSERT INTO contact (name, email, message)
        VALUES ($name,$email,$message)")){
        echo "Record inserted successfully";
    }}
?>