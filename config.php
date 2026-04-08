<?php
$host = "localhost";
$user = "root";
$pass = "";
<<<<<<< HEAD
$db   = "rpl_vote";
=======
$db   = "projek-semester-2";
>>>>>>> 708efa0c21c081f3ce198838bef4439f45c52cd4

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}