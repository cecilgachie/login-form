<?php
session_start();
session_unset(); // Clear session data

// Destroy the session to log out the user
session_destroy();

// Redirect to the login page
header("Location: signin.php");
exit();
?>
