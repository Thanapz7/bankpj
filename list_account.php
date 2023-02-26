<?php
require("connect_db.php");

$sql = "SELECT id, username, balance FROM account";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Username: " . $row["username"]. " Balance:" . $row["balance"]. "฿" ."<br>";
   
    }
  } else {
    echo "0 results";
  }
  
$conn->close();
?>

<!DOCTYPE html>
<html>
    <style>
      body {
        background-color: #EAFFD0;
        font-family: Arial, sans-serif;
      }
      a{
        margin-top: 20px;
        border-style: solid;
        border-width: 2px;
        border-radius: 5px;    
      }
      a:hover{
       background-color: #FCE38A;
      }
    </style>
    <body>
    <a href="login.php">Back to Login</a>
    </body>
</html>
