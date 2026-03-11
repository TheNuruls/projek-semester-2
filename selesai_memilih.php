<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Votify PKS</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
height:100vh;
display:flex;
font-family:'Inter',sans-serif;
background: linear-gradient(
135deg,
#345A80 0%,
#01162B 45%,
#02305E 70%,
#6A90B4 100%
);
color:white;
}

/* SIDEBAR */
.sidebar{
width:240px;
height:100vh;
padding:40px 20px;
display:flex;
flex-direction:column;
justify-content:space-between;
align-items:center;
background: rgba(255,255,255,0.08);
backdrop-filter: blur(12px);
border-right:1px solid rgba(255,255,255,0.3);
}

/* LOGO */
.logo{
font-family:'Poppins';
text-align:center;
font-size:18px;
line-height:26px;
color:#D2DBEC;
margin-bottom:40px;
}

/* MENU */
.menu{
width:200px;
display:flex;
flex-direction:column;
align-items:center;
}

/* BUTTON VOTING */
.voting{
display:block;
width:100%;
padding:12px;
margin-bottom:15px;
text-align:center;
text-decoration:none;
color:white;
font-size:14px;

/* FILL */
background:#6A90B4;
/* STROKE */
border:2px solid #D2DBEC;
/* RADIUS */
border-radius:100px;
/* GLASS */
backdrop-filter: blur(6px);
/* DROP SHADOW */
box-shadow:
0 4px 12px rgba(0,0,0,0.25),
inset 0 0 10px rgba(255,255,255,0.15);
transition:0.3s;
}

/* HOVER */
.voting:hover{
transform:scale(1.03);
box-shadow:
0 6px 18px rgba(0,0,0,0.35),
0 0 10px rgba(255,255,255,0.3);
}

/* HASIL VOTING BUTTON */
.menu a{
display:block;
width:100%;
padding:12px;
text-align:center;
border-radius:100px;
text-decoration:none;
font-size:14px;
color:white;
border:2px solid #D2DBEC;
background:rgba(255,255,255,0.1);
margin-bottom:15px;
}

/* LOGOUT */
.logout{
padding:8px 55px;
border-radius:100px;
text-decoration:none;
font-size:14px;
color:white;
border:2px solid #D2DBEC;
background: linear-gradient(
90deg,
rgba(235,168,186,0.8),
rgba(87,30,71,0.8),
rgba(106,144,180,0.8)
);
box-shadow:0 0 10px rgba(255,255,255,0.4);
}

/* CONTENT */
.content{
flex:1;
display:flex;
justify-content:center;
align-items:flex-start;
padding-top:80px;
text-align:center;
}

.content h1{
font-family:'Poppins';
font-size:48px;
margin-bottom:10px;
color:#D2DBEC;
}

.content p{
font-size:16px;
color:#D2DBEC;
}

.small{
font-size:13px;
opacity:0.8;
}

</style>
</head>

<body>
<div class="sidebar">
<div>
<div class="logo">
Votify<br>PKS
</div>
<div class="menu">
<a href="#" class="voting">Voting</a>
<a href="#">Hasil Voting</a>
</div>

</div>
<a href="#" class="logout">Logout</a>
</div>
<div class="content">

<div>
<h1>Selamat!</h1>
<p>Kamu telah berhasil melakukan pemilihan.</p>
<p class="small">
Kamu hanya dapat memilih sebanyak satu kali<br>
dapat melakukan pemilihan lagi
</p>
</div>

</div>

</body>
</html>