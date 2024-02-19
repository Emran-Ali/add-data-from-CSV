<?php
$servername = "localhost";
$dbname = "skills";
$uname = "root";
$password = "";

//connectio

$conn = new \mysqli($servername, $uname, $password, $dbname );

if ($conn->connect_error)
    die("Connection Failed :". $conn->connect_error);
else
    echo "<script> console.log('Connected to db')</script>";
?>