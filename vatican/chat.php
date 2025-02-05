<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'vatican'); // Adjust these settings for your DB

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Action based on request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'send') {
        $message = $_POST['message'];
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; // Use session if logged in

        // Save the message in the database
        $stmt = $conn->prepare("INSERT INTO chat_messages (username, message) VALUES (?, ?)");
        $stmt->bind_param('ss', $username, $message);
        $stmt->execute();
        $stmt->close();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action'])) {
    if ($_GET['action'] == 'load') {
        // Retrieve all messages
        $result = $conn->query("SELECT * FROM chat_messages ORDER BY timestamp ASC");
        while ($row = $result->fetch_assoc()) {
            echo '<div><strong>' . htmlspecialchars($row['username']) . ':</strong> ' . htmlspecialchars($row['message']) . '</div>';
        }
    }
}

$conn->close();
?>
