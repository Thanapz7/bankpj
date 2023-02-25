<?php
require("connect_db.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $sql = "SELECT id, type, amount, time FROM transactions WHERE username = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        echo "<table>";
        echo "<tr><th>Order</th> <th>Type</th> <th>Amount</th> <th>Date</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["type"] . "</td>";
            echo "<td>" . $row["amount"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "No transaction found for user : " . $username;
    }
}
$conn->close();
?>

<form method = "POST">
    <label for="username">Enter your username :</label>
    <input type="text" id="username" name="username">
    <button type="submit" name="submit">Show transactions</button><br>
    <a href=homepage.php>Back to Home page</a>
</form>