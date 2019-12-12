<?php
$servername = "localhost";
$username = "php-user";
$password = "************";
$database = "bd_cafeteria";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);





// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>