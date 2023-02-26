<?php
require("connect_db.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

$username = $_SESSION["username"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["deposit"])) {
        $amount = $_POST["amount"];
        $query = "UPDATE account SET balance = balance + '$amount' WHERE username = '$username'";
        mysqli_query($conn, $query);

        $query = "INSERT INTO transactions (username, type, amount) VALUES ('$username', 'Deposit', '$amount')";
        mysqli_query($conn, $query);

    } else if (isset($_POST["withdraw"])) {
        $amount = $_POST["amount"];
        $query = "UPDATE account SET balance = balance - '$amount' WHERE username = '$username'";
        mysqli_query($conn, $query);

        $query = "INSERT INTO transactions (username, type, amount) VALUES ('$username', 'Withdraw', '$amount')";
        mysqli_query($conn, $query);
    }
}

$query = "SELECT * FROM account WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$balance = $row["balance"];

$query = "SELECT * FROM transactions WHERE username = '$username";
$result = mysqli_query($conn, $query);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Account</title>
        <style>
            body {
                background-color: #EAFFD0;
                font-family: Arial, sans-serif;
                text-align: center;
            }
            p{
                font-size: 25px;
            }
            h2{
                margin-top: 40px;
                font-size: 60px;
            }
            h3{
                font-size: 25px;
                font-family: "Lucida Console", "Courier New", monospace;
            }
            h4{
                font-family: "Lucida Console", "Courier New", monospace;
            }
            label{
                font-size: 18px;
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
                border-style: solid;
                border-width: 2px;
                border-radius: 5px;
                
            }
            a:hover{
                background-color: #FCE38A;
            }
            
        </style>
    </head>
    <body>
        <h2>Welcome, <?php echo $username; ?>!</h2>
        <p>Balance: <?php echo number_format($balance, 2); ?> ฿</p>
        <h3>--------------------->Deposit<---------------------</h3>
        <form method="post">
            <label>Amount:</label>
            <input type="number" name="amount" step="0.01" min="0" required>
            <br>
            <input type="submit" name="deposit" value="Deposit">
        </form>
        <h3>--------------------->Withdraw<---------------------</h3>
        <form method="post">
            <label>Amount:</label>
            <input type="number" name="amount" step="0.01" min="0" max="<?php echo $balance; ?>" required>
            <br>
            <input type="submit" name="withdraw" value="Withdraw">
        </form>
       
        <h4>--------------------------------------------</h4>
        <a href="login.php">Logout</a>  <a href="transactions.php">transactions</a>
        
        <h4>--------------------------------------------</h4>
        <a href="delete_account.php?id=<?php print($row["id"]);?>" 
      onclick="return confirm('Are you sure to delete <?php print($row["username"]);?>')">Delete This Account</a>
    </body>
</html>