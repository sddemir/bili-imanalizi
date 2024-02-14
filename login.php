<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bilgi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL injection prevention (not exhaustive)
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Fetch user from database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful
        // Redirect to fatura_bilgi.php
        header("Location: app.php");
        exit();
    } else {
        // Authentication failed
        echo "Invalid username or password";
    }
}


$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
      <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        text-align: center;
        margin-top: 100px;
      }

      #login-container {
        width: 300px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
      }

      button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
      }
    </style>
    </style>
</head>
<body>
    <div id="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required />

            <label for="password">Password:</label>
            <input type="password" name="password" required />

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>