<?php
$host = "localhost";
$user = "root";  // Sesuaikan dengan user database Anda
$pass = "";      // Sesuaikan dengan password database Anda
$dbname = "my_database";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
