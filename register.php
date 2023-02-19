<?php
require("connect_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO account (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $query);

    echo "Account created successfully.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h2>Register</h2>
        <form method="post">
            <label>Username:</label>
            <input type="text" name="username" required>
            <br>
            <label>Password:</label>
            <input type="password" name="password" required>
            <br>
            <input type="submit" value="Register">
            <a href="login.php">Login</a>
    
        </form>
    </body>
</html>