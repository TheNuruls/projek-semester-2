<?php
// simulasi gagal login
$gagal = true;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Peringatan Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Inter:wght@400;500&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{

height: 100vh;
display:flex;
align-items:center;
justify-content:center;

font-family:'Inter',sans-serif;

background: linear-gradient(
135deg,
#345A80 0%,
#01162B 44%,
#02305E 71%,
#6A90B4 100%
);

}

/* CONTAINER POPUP */

.popup-box{

width:680px;

padding:70px;

text-align:center;

border-radius:16px;

/* glass */

background: rgba(255,255,255,0.08);

backdrop-filter: blur(14px);

/* stroke */

border:2px solid #D2DBEC;

/* glow */

box-shadow:
0 10px 40px rgba(0,0,0,0.35),
inset 0 0 20px rgba(255,255,255,0.08);

color:#D2DBEC;

}

/* TITLE */

.popup-box h1{

font-family:'Poppins',sans-serif;
font-size:30px;
margin-bottom:20px;
font-weight:600;

}

/* TEXT */

.popup-box p{

font-size:20px;
line-height:24px;
margin-bottom:35px;

}

/* BUTTON */

.popup-box a{

display:inline-block;

padding:10px 35px;

border-radius:25px;

text-decoration:none;

font-family:'Poppins';

font-size:14px;

color:white;

/* stroke */
border:2px solid #D2DBEC;

/* gradient */

background: linear-gradient(
90deg,
rgba(235,168,186,0.8),
rgba(87,30,71,0.8),
rgba(106,144,180,0.8)
);

/* glow */

box-shadow:0 0 10px rgba(255,255,255,0.4);

transition:0.3s;

}

/* hover */

.popup-box a:hover{

transform:scale(1.05);

box-shadow:0 0 18px rgba(255,255,255,0.7);

}

</style>
</head>

<body>

<?php if($gagal){ ?>

<div class="popup-box">

<h1>Peringatan!</h1>

<p>
Autentifikasi Gagal ! <br>
Email dan Password salah.
</p>

<a href="login.php">KEMBALI</a>

</div>

<?php } ?>

</body>
</html>