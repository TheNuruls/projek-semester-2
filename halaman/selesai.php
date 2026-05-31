<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include 'config.php';

$user_id = $_SESSION['user_id'];
$voting_event_id = 1;
$check = $conn->query("SELECT id FROM votes WHERE user_id = $user_id AND voting_event_id = $voting_event_id");
if(!$check || $check->num_rows == 0) {

    header("Location: kandidat.php");
    exit();
}

$nama_user = $_SESSION['nama'] ?? 'Siswa';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Selesai Voting - Votify PKS</title>

<style>
    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body{
        margin:0;
        min-height:100vh;
        background: linear-gradient(
            135deg,
            #345A80 0%,
            #01162B 44%,
            #02305E 71%,
            #6A90B4 100%
        );
        color:white;
        overflow-x:hidden;
    }

.content-side {
        display: flex;
        min-height: 100vh;
    }

 .sidebar {
        width: 280px;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(15px);
        padding: 40px 25px;
        display: flex;
        flex-direction: column;
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 10px 10px 30px -1px #345A80 inset;
    }

    .logo {
        margin-bottom: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .logo img {
        width: 200px;
        height: auto;
        margin-bottom: 10px;
    }

    .btn-nav {
        display: block;
        padding: 12px 25px;
        margin-bottom: 15px;
        border:2px solid #D2DBEC; 
        border-radius: 30px;
        color: #D2DBEC;
        text-decoration: none;
        font-size: 0.9rem;
        transition: 0.3s;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
    }

    .btn-nav.active {
        color: #D2DBEC;
        background: #6A90B4;
    }

    .user-section {
        margin-top: auto;
        text-align: center;
    }

    .btn-logout {
        width: 150px;
        margin: 15px auto 0;
        padding: 16px;
        border-radius: 30px;
        border: 1.5px solid rgba(255, 255, 255, 0.5);
        background: linear-gradient(to right, #9e6074, #4e2e50, #415e81);
        color: white;
        cursor: pointer;
        font-size: 16px;
        display: block;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
    }

    /* MAIN CONTENT */
    .main-content{
        flex:1;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        padding: 40px;
        text-align:center;
    }

    .main-content h1{
        font-size: 85px;
        margin-top:-5px;
        margin-bottom: -15px;
        font-weight: 600;
        letter-spacing: 2px;
    }
    .sub{
        font-size:35px;
        font-weight:400;
        margin-top:10px;
    }

    .info-text {
        font-size: 25px;
        opacity: 0.9;
        margin:1px;
        margin-top:-10px;
    }

    .kembali-btn{
        width: 220px;
        height: 65px;
        border-radius: 40px;
        border:2px solid #D2DBEC;
        background: linear-gradient(to right, #9e6074, #4e2e50, #415e81);
        color: white;
        font-size: 1.4rem;
        font-weight: 500;
        cursor: pointer;
        box-shadow: 0 0 25px rgba(255,255,255,0.4);
        transition: 0.3s;
    }

    .kembali-btn:hover{
        transform: translateY(-5px);
        box-shadow: 0 0 35px rgba(255,255,255,0.5);
    }

    @media(max-width:900px){
        .content-side{
            flex-direction:column;
        }
        .sidebar{
            width:100%;
            padding: 30px;
        }
        .main-content h1{
            font-size: 2.8rem;
        }
    }
</style>
</head>
<body>

<div class="content-side">
   <aside class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        
        <nav class="menu">
            <a href="#" class="btn-nav active">Voting</a>
            <a href="Hasil-voting.php" class="btn-nav">Hasil Voting</a>
        </nav>

        <div class="user-section">
            <p>Halo, <?php echo htmlspecialchars($nama_user); ?>!</p>
            <a href="logout.php"><button class="btn-logout">Logout</button></a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <h1>Selamat!</h1>
        <p class="sub">Kamu telah berhasil melakukan pemilihan.</p>
        <p class="info-text">
            Kamu hanya dapat memilih sebanyak satu kali dan<br>
            tidak dapat melakukan pemilihan lagi
        </p>
        
        <p style="margin-bottom:20px; opacity:0.85; font-size:15px; margin-top:50px;">
            Tekan tombol di bawah ini atau tombol Logout<br>
            untuk kembali ke halaman login
        </p>

        <a href="logout.php">
            <button class="kembali-btn">Kembali</button>
        </a>
    </main>
</div>

</body>
</html>