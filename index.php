<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Presentation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create a users table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
)";

// Execute query to create table
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $username = $_POST["username"];
    $email = $_POST["email"];

    // SQL query to insert data into users table
    $sql_insert_data = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

    // Execute query to insert data
    if ($conn->query($sql_insert_data) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql_insert_data . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjap Singh Brar - New Technology</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="text"],
        input[type="email"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .social-links {
            margin-top: 30px;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #007bff;
            text-decoration: none;
            font-size: 20px;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Harjap Singh Brar's Page</h1>
        <p>Student ID: 202105634</p>
        <p>Exploring New Technology</p>
        <p>This website is dedicated to exploring and learning about the latest advancements in technology. Whether it's artificial intelligence, blockchain, or augmented reality, we're here to discover and discuss the future of tech!</p>
        <form action="submit_data.php" method="post">
            <input type="text" name="username" placeholder="Enter your username">
            <input type="email" name="email" placeholder="Enter your email">
            <input type="submit" value="Get Updates">
        </form>
        <div class="social-links">
            <p>Follow me on social media:</p>
            <a href="https://twitter.com/harjapsbrar" target="_blank">Twitter</a>
            <a href="https://www.linkedin.com/in/harjap-singh-brar/" target="_blank">LinkedIn</a>
        </div>
    </div>
</body>
</html>
