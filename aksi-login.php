<?php

// memanggil koneksi di config.php 
include "./config.php";

// query untuk mengambil data dari user dengan email = $_POST['input_email']
$query = "SELECT * FROM users WHERE email='".$_POST['input_email']."'";

// menjalankan query dengan koneksi dari $conn
// result di sini akan digunakan untuk memanggil data
$result = $conn->query($query);

// cek jumlah data menggunakan $result
echo "jumlah data: ";
echo $result->num_rows;
echo "<br /> <br />";

// echo $_POST['input_email'];
// echo "<br />";
// echo $_POST['input_password'];