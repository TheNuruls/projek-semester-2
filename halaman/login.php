<?php
session_start();

include 'config.php';

if(isset($_SESSION['user_id'])) {
    // Jika sudah login, cek apakah user sudah voting
    $user_id = $_SESSION['user_id'];
    $check = $conn->query("SELECT id FROM votes WHERE user_id = $user_id AND voting_event_id = 1");
    if($check && $check->num_rows > 0) {
        header("Location: selesai.php");
    } else {
        header("Location: kandidat.php");
    }
    exit();
}

if(isset($_POST['login'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nis = mysqli_real_escape_string($conn, $_POST['nis']);
    $kode = mysqli_real_escape_string($conn, $_POST['kode']);
    
    $query = "SELECT * FROM users WHERE name = '$nama' AND username = '$nis' AND plain_code = '$kode'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['is_admin'] = $user['is_admin'];
        
        // Cek apakah user sudah pernah voting
        $check = $conn->query("SELECT id FROM votes WHERE user_id = ".$user['id']." AND voting_event_id = 1");
        if($check && $check->num_rows > 0) {
            header("Location: selesai.php");
        } else {
            header("Location: kandidat.php");
        }
        exit();
    } else {
        $error = "Nama, NIS, atau Kode salah!";
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
padding:100px;
background: linear-gradient(135deg,#345A80 0%,#01162B 44%,#02305E 71%,#6A90B4 100%);
color:white;
}
.left{
width:40%;
}
.left h1{
font-family:'Poppins';
font-size:75px;
letter-spacing:8px;
line-height:70px;
margin-bottom:30px;
color:#D2DBEC;
}
.line{
width:260px;
height:2px;
background:#D2DBEC;
margin-bottom:30px;
}
.left p{
width:280px;
font-size:20px;
color:#D2DBEC;
opacity:0.9;
}
.login-panel{
width:440px;
height:565px;
margin:40px;
padding:50px;
border-radius:22px;
background: rgba(255,255,255,0.08);
backdrop-filter: blur(10px);
border:2px solid #D2DBEC;
box-shadow: inset 10px 10px 30px -1px #345A80;
}
.login-panel h2{
text-align:center;
font-family:'Poppins',sans-serif;
margin-bottom:14px;
font-size:40px;
}
.login-panel label{
font-size:16px;
display:block;
margin-bottom:6px;
color:#D2DBEC;
}
.login-panel input{
width:100%;
padding:15px 14px;
margin-bottom:25px;
border-radius:25px;
border:2px solid#D2DBEC;
background:transparent;
color:white;
outline:none;
}
.login-panel input::placeholder{
color:#c8d4df;
font-size:12px;
}
.login-panel button{
width:230px;
padding:10px;
margin-top:25px;
margin-left:50px; 
border-radius:30px;
border:2px solid #D2DBEC;
cursor:pointer;
color:white;
font-family:'Poppins',sans-serif;
font-size:25px;
background: linear-gradient(90deg,rgba(235,168,186,0.8),rgba(87,30,71,0.8),rgba(106,144,180,0.8));
box-shadow:0 0 12px #D2DBEC;
transition:0.3s;
}
.login-panel button:hover{
transform:scale(1.03);
box-shadow:0 0 18px rgba(255,255,255,0.6);
}
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
        <p>Login dengan akun untuk dapat melakukan pemilihan.</p>
    </div>
    <div class="login-panel">
        <h2>Login</h2>
        <?php if(isset($error)) { echo '<div class="error">'.$error.'</div>'; } ?>
        <form method="POST">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukan nama" required>
            <label>NIS</label>
            <input type="text" name="nis" placeholder="Masukan NIS" required>
            <label>KODE</label>
            <input type="password" name="kode" placeholder="Masukan kode" required>
            <button type="submit" name="login">LOGIN</button>
        </form>
    </div>
</body>
</html>