<?php
session_start();

$error = false;

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    /* contoh akun */
    $akun_email = "admin@gmail.com";
    $akun_password = "12345";

    if($email == $akun_email && $password == $akun_password){
        echo "<script>alert('Login Berhasil');</script>";
    }else{
        $error = true;
    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI, sans-serif;
}

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;

background: radial-gradient(circle at top left,#1e4c76,#0c2c48 60%,#081d30);
}

/* LOGIN BOX */

.login-box{
background:white;
padding:30px;
border-radius:10px;
width:300px;
text-align:center;
}

.login-box h2{
margin-bottom:15px;
}

.login-box input{
width:100%;
padding:10px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
}

.login-box button{
width:100%;
padding:10px;
background:#0c2c48;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}

/* OVERLAY POPUP */

.overlay{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
display:flex;
justify-content:center;
align-items:center;
}

/* POPUP */

.popup{
width:420px;
padding:35px;
text-align:center;

background:rgba(255,255,255,0.08);
border-radius:15px;
border:1px solid rgba(255,255,255,0.3);

backdrop-filter:blur(10px);
box-shadow:0 10px 25px rgba(0,0,0,0.4);
}

.popup h2{
color:white;
margin-bottom:15px;
}

.popup p{
color:#e0e6ef;
margin-bottom:25px;
line-height:1.5;
}

.popup button{
padding:10px 35px;
border-radius:25px;
border:1px solid white;

background:linear-gradient(#6f7390,#444861);
color:white;

cursor:pointer;
}

</style>
</head>
<body>

<div class="login-box">
<h2>LOGIN</h2>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">LOGIN</button>
</form>

</div>

<?php if($error){ ?>

<div class="overlay">
<div class="popup">

<h2>Peringatan!</h2>

<p>
Autentifikasi Gagal ! <br>
Email dan Password salah.
</p>

<button onclick="kembali()">KEMBALI</button>

</div>
</div>

<script>
function kembali(){
location.href="login.php";
}
</script>

<?php } ?>

</body>
</html>