<?php

$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "edu"; // Change this to your database name


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    
    $stmt = $conn->prepare("INSERT INTO contact (name, phone, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $subject, $message);

    
    if ($stmt->execute() === TRUE) {
       
        echo "New record created successfully";
    } else {
       
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
}


$conn->close();
?>
