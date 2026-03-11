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

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family: Arial, Helvetica, sans-serif;
}

body{
height:100vh;
background:linear-gradient(135deg,#0b2f53,#3d6c94);
display:flex;
justify-content:center;
align-items:center;
}

/* kotak utama */
.container{
width:90%;
height:90vh;
background:linear-gradient(120deg,#041e35,#0f3a5e,#3a6b95);
border:6px solid rgba(255,255,255,0.25);
padding:70px;
display:flex;
color:white;
}

/* kiri */
.left{
width:50%;
}

.left h1{
font-size:48px;
letter-spacing:5px;
line-height:60px;
margin-bottom:20px;
}

.left p{
font-size:13px;
width:260px;
color:#cfd9e4;
}

/* kanan */
.right{
width:50%;
display:flex;
justify-content:center;
align-items:center;
}

/* kotak login */
.login-box{
width:270px;
padding:25px;
border-radius:10px;
border:1px solid rgba(255,255,255,0.5);
background:rgba(255,255,255,0.05);
backdrop-filter:blur(6px);
}

.login-box h3{
text-align:center;
margin-bottom:15px;
}

/* label */
.login-box label{
font-size:12px;
color:#dbe6f1;
}

/* input */
.login-box input{
width:100%;
padding:8px;
margin:6px 0 12px 0;
border-radius:20px;
border:1px solid rgba(255,255,255,0.6);
background:transparent;
color:white;
outline:none;
padding-left:12px;
}

/* tombol */
.login-box button{
width:100%;
padding:9px;
border:none;
border-radius:20px;
background:linear-gradient(to right,#c58aa5,#7fa6d4);
color:white;
cursor:pointer;
margin-top:5px;
font-weight:bold;
}

.login-box button:hover{
opacity:0.9;
}

</style>
</head>

<body>

<div class="container">

<div class="left">
<h1>SELAMAT<br>DATANG!</h1>
<p>Login dengan akun google untuk dapat melakukan penilaian.</p>
</div>

<div class="right">

<div class="login-box">
<h3>Login</h3>

<form>

<label>Nama</label>
<input type="text" placeholder="Masukan ID">

<label>NIS</label>
<input type="text" placeholder="Masukan ID">

<label>KODE</label>
<input type="password" placeholder="Masukan ID">

<button>LOGIN</button>

</form>

</div>

</div>

</div>

</body>
</html>