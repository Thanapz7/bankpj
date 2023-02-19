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
    } else if (isset($_POST["withdraw"])) {
        $amount = $_POST["amount"];
        $query = "UPDATE account SET balance = balance - '$amount' WHERE username = '$username'";
        mysqli_query($conn, $query);
    }
}

$query = "SELECT * FROM account WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$balance = $row["balance"];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Account</title>
    </head>
    <body>
        <h2>Welcome, <?php echo $username; ?>!</h2>
        <p>Balance: $<?php echo number_format($balance, 2); ?></p>
        <h3>Deposit</h3>
        <form method="post">
            <label>Amount:</label>
            <input type="number" name="amount" step="0.01" min="0" required>
            <br>
            <input type="submit" name="deposit" value="Deposit">
        </form>
        <h3>Withdraw</h3>
        <form method="post">
            <label>Amount:</label>
            <input type="number" name="amount" step="0.01" min="0" max="<?php echo $balance; ?>" required>
            <br>
            <input type="submit" name="withdraw" value="Withdraw">
        </form>
        <h4>----------------------</h4>
        <p>Delete Account</p>
        <a href="delete_account.php?id=<?php print($row["id"]);?>" 
      onclick="return confirm('Are you sure to delete <?php print($row["username"]);?>')">Delete</a>
    </body>
</html>