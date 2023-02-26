<!DOCTYPE html>
<html>
<head>
    <title>IT's Banking</title>
    <style>
        body {
            background-color: #EAFFD0;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            margin-top: 200px;
            font-size: 75px;
            color: #F75940;
        }
        p {
            font-size: 25px;
            font-family: "Lucida Console", "Courier New", monospace;
            color: #334252;
        }
        button {
            margin-top: 30px;
            padding: 20px 40px;
            font-size: 30px;
            background-color: #95E1D3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #FCE38A;
        }
    </style>
</head>
<body>
    <h1>IT's Banking</h1>
    <p>Please select an option below:</p>
    <button onclick="location.href='register.php'">Register</button>
    <button onclick="location.href='login.php'">Login</button>
    <button onclick="location.href='transactions.php'">View Transactions</button>
</body>
</html>
