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
        <style>
            body {
                background-color: #EAFFD0;
                font-family: Arial, sans-serif;
                text-align: center;
            }
            h2{
                margin-top: 50px;
                font-size: 75px;
                color: #F75940;
            }
            label{
                font-size: 30px;
                font-family: Arial, sans-serif;
                color: #334252;
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