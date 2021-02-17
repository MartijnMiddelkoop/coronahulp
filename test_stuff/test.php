<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coronahulp";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}



    if (isset($_POST['submitBtn'])) {
        $name=$_POST["name"];


        $query = "INSERT INTO sender (`naam`) VALUES ('$name')";
        if ($conn->query($query) === TRUE) {
            echo '<div class="alert alert-success"> Record inserted successfully. </div>';;
        } else {
            echo '<div class="alert alert-danger"> There was an error. </div>' . $conn->error;
        }

    } 
?>


<form method="post">

    <p>
        <input type= "text" name="name" placeholder="name">
    </p>
    <p>
        <!-- <input type= "text" name="address" placeholder="Address">
    </p>
    <p>
        <input type= "text" name="action" placeholder="wat wilt u doen">
    </p>
    <p>
        <input type= "text" name="latitude" placeholder="latitude">
    </p>
    <p>
        <input type= "text" name="longitude" placeholder="longitude">
    </p> -->

    <input type="submit" name="submitBtn">


</form>