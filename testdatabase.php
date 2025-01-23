<?php
$host = 'localhost'; // Or 'localhost' with a Unix socket if needed
$username = 'root';
$password = 'root'; // Replace with your MySQL password
$database = 'must_have_ideaDB'; // Replace with your database name

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
