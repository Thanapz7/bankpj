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
<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
<style>
            body {
                background-color: #EAFFD0;
                font-family: Arial, sans-serif;
                text-align: center;
            }
            h2{
                margin-top: 50px;
                font-size: 75px;
            }
            label{
                font-size: 30px;
                font-family: Arial, sans-serif;
            }
            input{
                margin-top: 20px;
                padding: 10px 20px;
                font-size: 16px;
                background-color: #95E1D3;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            input:hover{
                background-color: #FCE38A;
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
            button{
                margin-top: 20px;
                padding: 10px 20px;
                font-size: 16px;
                background-color: #95E1D3;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            button:hover{
                background-color: #FCE38A;
            }
            
        </style>
<body>
<form method = "POST">
    <label for="username">Enter your username :</label>
    <input type="text" id="username" name="username">
    <button type="submit" name="submit">Show transactions</button><br>
    <a href=homepage.php>Back to Home page</a>
</form>
</body>
</html>