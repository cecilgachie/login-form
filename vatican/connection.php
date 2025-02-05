<?php
// db.php - Database connection file

$servername = "localhost"; // Your database server, typically 'localhost'
$username = "root"; // Your database username (default is 'root' for local development)
$password = ""; // Your database password (default is empty for local development)
$dbname = "vatican"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>