<?php
$nama_benar = "naraya";
$nis_benar = "248222";
$kode_benar = "12345";

if(isset($_POST['login'])){

    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kode = $_POST['kode'];

    if($nama == $nama_benar && $nis == $nis_benar && $kode == $kode_benar){
        header("Location: kandidat.php");
        exit();
    }else{
        header("Location: autentifikasi.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
height:100vh;
font-family:'Inter',sans-serif;
display:flex;
align-items:center;
justify-content:space-between;
padding:120px;

background: linear-gradient(
135deg,
#345A80 0%,
#01162B 44%,
#02305E 71%,
#6A90B4 100%
);

color:white;
}

/* kiri */

.left{
width:40%;
}

.left h1{
font-family:'Poppins',sans-serif;
font-size:64px;
letter-spacing:8px;
line-height:70px;
margin-bottom:30px;
color:#D2DBEC;
}

.line{
width:160px;
height:2px;
background:#D2DBEC;
margin-bottom:30px;
}

.left p{
width:280px;
font-size:14px;
color:#D2DBEC;
opacity:0.9;
}

/* panel */

.login-panel{
width:360px;
padding:40px;
border-radius:22px;
background: rgba(255,255,255,0.08);
backdrop-filter: blur(10px);
border:1px solid rgba(255,255,255,0.4);
box-shadow: inset 10px 10px 30px -1px #345A80;
}

.login-panel h2{
text-align:center;
font-family:'Poppins',sans-serif;
margin-bottom:25px;
font-weight:600;
}

.login-panel label{
font-size:14px;
display:block;
margin-bottom:6px;
color:#D2DBEC;
}

.login-panel input{
width:100%;
padding:10px 14px;
margin-bottom:18px;
border-radius:25px;
border:1px solid rgba(255,255,255,0.6);
background:transparent;
color:white;
outline:none;
}

.login-panel input::placeholder{
color:#c8d4df;
font-size:12px;
}

.login-panel button{
width:100%;
padding:12px;
border-radius:30px;
border:2px solid #D2DBEC;
cursor:pointer;
color:white;
font-family:'Poppins',sans-serif;
font-size:16px;

background: linear-gradient(
90deg,
rgba(235,168,186,0.8),
rgba(87,30,71,0.8),
rgba(106,144,180,0.8)
);

box-shadow:0 0 12px rgba(255,255,255,0.4);
transition:0.3s;
}

.login-panel button:hover{
transform:scale(1.03);
box-shadow:0 0 18px rgba(255,255,255,0.6);
}

/* pesan error */

.error{
color:#ffb3b3;
font-size:13px;
margin-bottom:10px;
text-align:center;
}

</style>

</head>

<body>

<div class="left">

<h1>SELAMAT<br>DATANG!</h1>

<div class="line"></div>

<p>
Login dengan akun google untuk dapat melakukan pemilihan.
</p>

</div>

<div class="login-panel">

<h2>Login</h2>

<div id="error" class="error"></div>

<form method="POST" onsubmit="return validasiForm()">

<label>Nama</label>
<input type="text" id="nama" name="nama" placeholder="Masukan nama">

<label>NIS</label>
<input type="text" id="nis" name="nis" placeholder="Masukan NIS">

<label>KODE</label>
<input type="password" id="kode" name="kode" placeholder="Masukan kode">

<button type="submit" name="login">LOGIN</button>

</form>

</div>

<script>

function validasiForm(){

let nama = document.getElementById("nama").value;
let nis = document.getElementById("nis").value;
let kode = document.getElementById("kode").value;
let error = document.getElementById("error");

if(nama == ""){
error.innerHTML = "Nama harus diisi";
return false;
}

if(nis == ""){
error.innerHTML = "NIS harus diisi";
return false;
}

if(kode == ""){
error.innerHTML = "Kode harus diisi";
return false;
}

return true;

}

</script>

</body>
</html>