<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mini_dictionary"; // Assuming the database is named mydictionary

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
