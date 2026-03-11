<?php
if(isset($_POST['login'])){
    $nama = $_POST['nama'];
    $nis  = $_POST['nis'];
    $kode = $_POST['kode'];

    // contoh validasi sederhana
    if($nama == "admin" && $nis == "12345" && $kode == "abc"){
        echo "<script>alert('Login Berhasil');</script>";
    }else{
        echo "<script>alert('Login Gagal');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>

body{
    font-family: Arial, Helvetica, sans-serif;
    background: linear-gradient(135deg,#0c2a4d,#1f4c73);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    width:800px;
    height:350px;
    background:linear-gradient(135deg,#0b2744,#2e5f8a);
    border-radius:8px;
    display:flex;
    padding:40px;
    color:white;
}

/* kiri */
.kiri{
    width:50%;
}

.kiri h1{
    letter-spacing:3px;
}

.kiri p{
    font-size:14px;
    opacity:0.8;
}

/* kanan */
.kanan{
    width:50%;
    display:flex;
    justify-content:center;
    align-items:center;
}

.form-login{
    width:250px;
    padding:20px;
    border:1px solid rgba(255,255,255,0.4);
    border-radius:10px;
    backdrop-filter: blur(5px);
}

.form-login h3{
    text-align:center;
    margin-bottom:15px;
}

.input{
    width:100%;
    padding:8px;
    margin:6px 0;
    border-radius:20px;
    border:none;
    outline:none;
}

.btn{
    width:100%;
    padding:8px;
    margin-top:10px;
    border:none;
    border-radius:20px;
    background:linear-gradient(to right,#c58aa5,#7da7d9);
    color:white;
    cursor:pointer;
}

</style>
</head>

<body>

<div class="container">

<div class="kiri">
<h1>SELAMAT<br>DATANG!</h1>
<p>
Login dengan akun google untuk dapat melakukan penilaian.
</p>
</div>

<div class="kanan">
<div class="form-login">

<h3>Login</h3>

<form method="POST">

<input type="text" name="nama" placeholder="Nama" class="input">

<input type="text" name="nis" placeholder="NIS" class="input">

<input type="password" name="kode" placeholder="Kode" class="input">

<button type="submit" name="login" class="btn">LOGIN</button>

</form>

</div>
</div>

</div>

</body>
</html>