<?php
require("connect_db.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM account WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])) {
        $_SESSION["username"] = $username;
        header("location: account.php");
    } else {
        echo "Invalid username or password.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form method="post">
            <label>Username:</label>
            <input type="text" name="username" required>
            <br>
            <label>Password:</label>
            <input type="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>