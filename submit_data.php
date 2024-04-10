<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Assuming you're using the default username
$password = ""; // Assuming you're using the default password
$dbname = "Presentation"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Prepare SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $email);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Data inserted successfully
        $stmt->close();
        $conn->close();
        // Redirect back to the main page
        header("Location: index.php");
        exit();
    } else {
        // Error inserting data
        echo "Error: " . $stmt->error;
    }
}

?>
