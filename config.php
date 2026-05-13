<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "rpl-vote"; 

$conn = new mysql($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>