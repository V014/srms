<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "srms";
$connection = mysqli_connect($host, $username, $password, $database) 
or die ("We are experiencing a problem while connecting to the database");
if(!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>