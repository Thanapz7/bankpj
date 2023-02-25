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
    <body>
    <a href="login.php">Back to Login</a>
    </body>
</html>
