<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "vatican";       


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$event = $_POST['event'];
if ($event == 'birthday') {
    $birthday_name = mysqli_real_escape_string($conn, $_POST['birthday_name']);
    $size_kg = mysqli_real_escape_string($conn, $_POST['size_kg']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $date_of_collection = mysqli_real_escape_string($conn, $_POST['date_of_collection']);
    $deposit_amount = mysqli_real_escape_string($conn, $_POST['deposit_amount']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

    
    $sql = "INSERT INTO event (event_type, birthday_name, size_kg, color, date_of_collection, deposit_amount, payment_method) 
            VALUES ('birthday', '$birthday_name', '$size_kg', '$color', '$date_of_collection', '$deposit_amount', '$payment_method')";
} elseif ($event == 'wedding') {
    $cake_name = mysqli_real_escape_string($conn, $_POST['cake_name']);
    $cake_size_kg = mysqli_real_escape_string($conn, $_POST['cake_size_kg']);
    $cake_colors = mysqli_real_escape_string($conn, $_POST['cake_colors']);
    $wedding_date_of_collection = mysqli_real_escape_string($conn, $_POST['wedding_date_of_collection']);
    $wedding_payment_method = mysqli_real_escape_string($conn, $_POST['wedding_payment_method']);

    
    $sql = "INSERT INTO event (event_type, cake_name, cake_size_kg, cake_colors, date_of_collection, payment_method) 
            VALUES ('wedding', '$cake_name', '$cake_size_kg', '$cake_colors', '$wedding_date_of_collection', '$wedding_payment_method')";
} else {
    echo "Please select an event.";
    exit;
}


if ($conn->query($sql) === TRUE) {
    echo "Record saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
