<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "pageant_voting_db";   
$port = 3306;

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    echo "Connection Failed: " . $conn->connect_error;
}
?>