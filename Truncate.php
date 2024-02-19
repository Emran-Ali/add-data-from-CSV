<?php
global $conn;
include 'Connection.php';
    $conn->query("TRUNCATE TABLE genaralskills;");
    $conn->query("TRUNCATE TABLE specialskills");

header("Location: ../index.php");

