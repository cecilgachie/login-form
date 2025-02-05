<?php
// Start the session
session_start();

// Initialize error variable
$error = "";

// Include database connection file
include('connection.php'); // Ensure this file contains the correct connection setup

// Check if the user is already logged in, redirect them to homepage if they are
if (isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to index if already logged in
    exit();
}

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input (check if fields are not empty)
    if (empty($username) || empty($password)) {
        $error = "Both username and password are required.";
    } else {
        // Prepare a SQL query to fetch the user's data by username
        $sql = "SELECT * FROM users WHERE username = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if the user exists
            if ($result->num_rows > 0) {
                // Fetch user data
                $user = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Password is correct, set session variables
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['user_id'] = $user['id'];

                   
                    // var_dump($_SESSION); // Uncomment this to check session variables

                    // Redirect to homepage
                    header("Location: index.php");
                    exit(); // Ensure no further code is executed after redirect
                } else {
                    // Incorrect password
                    $error = "Invalid password.";
                }
            } else {
                // Username not found
                $error = "User not found.";
            }

            $stmt->close(); // Close the prepared statement
        } else {
            // Error in preparing the SQL query
            $error = "There was an error with the login process. Please try again.";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <h2>Log In</h2>

        <!-- Display error message if any -->
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Login form -->
        <form action="login.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="login">Log In</button>
        </form>

        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</body>
</html>
