<?php
require("connect_db.php");

$id=$_GET["id"];


$sql="DELETE FROM account WHERE id=$id";
$conn->query($sql);
header( "location: list_account.php" );
?>

