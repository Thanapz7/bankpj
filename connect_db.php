<?php
$servername = "localhost";
$username = "cpe1595";
$password = "0950911129";
$dbname = "bp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>