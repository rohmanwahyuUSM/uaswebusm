<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "exampledb";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Membuat tabel jika belum ada
$sql = "CREATE TABLE IF NOT EXISTS data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    value FLOAT NOT NULL
)";
$conn->query($sql);
?