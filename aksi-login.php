<?php

// memanggil koneksi di config.php  
include "./config.php";

// echo $_POST['input_email'];
// echo "<br />";
// echo $_POST['input_password'];

// memanggil koneksi di config.php 
include "./config.php";

// query untuk mengambil data dari user dengan email = $_POST['input_email']
$query = "SELECT * FROM users WHERE email='".$_POST['inputan_email']."'";

// menjalankan query dengan koneksi dari $conn
// result di sini akan digunakan untuk memanggil data
$result = $conn->query($query);

// cek jumlah data menggunakan $result
echo "jumlah data: ";
echo $result->num_rows;
echo "<br /> <br />";

// cek jumlah data menggunakan $result
echo "jumlah data: ";
echo $result->num_rows;
echo "<br /> <br />";

// memanggil data dengan $result
$row = $result->fetch_assoc();

if ($result->num_rows == 0) {
  // jika num_rows = 0 berarti tidak ada data yang ditemukan dari database 
  // echo "Akun tidak ditemukan";
  header("location:index.php");
  exit(); // langsung akhiri eksekusi tanpa harus lanjut ke bawah
} else {
  if ($_POST['inputan_password'] == $row['password']) {
    // echo "Anda berhasil login";
    header("location:main.php");
  } else {
    // echo "Password anda salah";
    header("location:index.php");
  }
}