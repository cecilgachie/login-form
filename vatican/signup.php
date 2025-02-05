<?php
// Include the database connection
include('connection.php');

// Initialize error and success messages
$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input
    if (empty($username) || empty($email) || empty($contact) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 8 || !preg_match("/[0-9]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[\W_]/", $password)) {
        $error = "Password must be at least 8 characters long and include numbers, lowercase letters, and special characters.";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if username or email already exists
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $error = "Username or Email already exists.";
        } else {
            // Insert the user into the database
            $sql = "INSERT INTO users (username, email, contact, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $username, $email, $contact, $hashed_password);

            if ($stmt->execute()) {
                $success = "Sign Up successful. You can now log in.";
            } else {
                $error = "Error: " . $stmt->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>

        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php elseif ($success): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="signup.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="contact">Contact</label>
            <input type="tel" id="contact" name="contact" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" required>

            <button type="submit" name="submit">Sign Up</button>
        </form>

        <p>Already have an account? <a href="signin.php">Log in</a></p>
    </div>
</body>
</html>


