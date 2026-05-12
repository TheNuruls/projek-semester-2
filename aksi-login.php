<?php
// Mulai session
session_start();
// Panggil koneksi database
include 'config.php';

if(isset($_POST['login'])) {
    
    // Ambil data dari form
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nis = mysqli_real_escape_string($conn, $_POST['nis']);
    $kode = mysqli_real_escape_string($conn, $_POST['kode']);
    
    // Query cek user berdasarkan name, username, dan plain_code
    $query = "SELECT * FROM users WHERE name = '$nama' AND username = '$nis' AND plain_code = '$kode'";
    $result = mysqli_query($conn, $query);
    
    // Cek apakah user ditemukan
    if(mysqli_num_rows($result) == 1) {l
        // User ditemukan, ambil datanya
        $user = mysqli_fetch_assoc($result);
        
        // Simpan data ke session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['is_admin'] = $user['is_admin'];
        
        // Redirect ke halaman kandidat (atau main.php seperti kode kamu)
        header("Location: kandidat.php");
        exit();
    } else {
        // User tidak ditemukan, redirect ke halaman gagal
        header("Location: autentifikasi.php");
        exit();
    }
    
} else {
    // Jika tidak ada submit login, balik ke halaman login
    header("Location: login.php");
    exit();
}
?>