<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include 'config.php';

$user_id = $_SESSION['user_id'];
$voting_event_id = 1;
$candidate_id = 2;

$cek = $conn->query("SELECT id FROM votes WHERE user_id = $user_id AND voting_event_id = $voting_event_id");
$sudah_memilih = $cek->num_rows > 0;
if($sudah_memilih){
    header("Location: selesai.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detail Kandidat 2</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Great+Vibes&display=swap" rel="stylesheet">
<style>

*{ margin:0; padding:0; box-sizing:border-box; }
body{
    width:100%; min-height:100vh; display:flex; justify-content:center;
    overflow-x:hidden; font-family:'Poppins', sans-serif;
    background: linear-gradient(90deg, #234A70 0%, #01162B 35%, #00336A 65%, #5279A5 100%);
}
.container{
    position:relative; width:1440px; height:1772px; overflow:hidden;
    background: linear-gradient(90deg, #234A70 5%, #001F45 35%, #00336A 65%, #5279A5 100%);
}
.left-panel{
    position:absolute; left:0; top:0; width:345px; height:100%;
    border-left:2px solid #D2DBEC; border-right:2px solid #D2DBEC;
    background: radial-gradient(circle at top right, #AE6B97 5%, #6A90B4 58%, #EAE8E6 72%, #571E47 90%, #6A90B4 100%);
    overflow:hidden;
}
.foto{ position:absolute; top:10px; right:895px; width:600px; }
.logo{ position: absolute; top: -30px; left: 450px; width: 230px; height: auto; }
.logo img { width: 100%; height: auto; display: block; }
.navbar{
    position:absolute; top:18px; left:650px; width:640px; height:58px;
    border-radius:40px; border:2px solid rgba(255,255,255,0.7);
    box-shadow:0 0 15px rgba(255,255,255,0.25);
    display:flex; align-items:center; justify-content:space-around;
    color:white; font-size:20px; font-weight:400;
}
.nav-active{ position:relative; }
.nav-active::after{
    content:""; position:absolute; left:50%; transform:translateX(-50%);
    bottom:-10px; width:110px; height:3px; border-radius:20px; background:#7BD3FF;
}
.content{ position:absolute; top:150px; left:560px; width:760px; color:white; }
.title{ font-size:72px; font-weight:600; letter-spacing:1px; line-height:1; }
.sub{ margin-top:18px; font-size:22px; font-weight:600; color:#8FD8FF; }
.name-row{ display:flex; justify-content:space-between; align-items:flex-start; }
.name{ margin-top:52px; font-size:145px; line-height:0.9; font-weight:800; letter-spacing:2px; color:#DCE1F2; }
.signature{ margin-top:72px; margin-right:10px; font-family:'Great Vibes', cursive; font-size:88px; color:white; }
.info{ margin-top:42px; margin-left:40px; display:grid; grid-template-columns:1.1fr 0.9fr 0.4fr; gap:50px; }
.label{ color:#8FD8FF; font-size:21px; font-weight:400; margin-bottom:12px; display:block; }
.info p, .hobby p{ font-size:15px; line-height:1.5; font-weight:300; }
.hobby{ margin-top:38px; margin-left:40px; width:95%; }
.horizontal-line{ position:relative; width:108%; height:1px; margin-top:63px; left:-45px; background:rgba(255,255,255,0.65); }
.name-card{
    position:absolute; bottom:55px; top:605px; left:50px; width:485px; height:150px;
    border-radius:0 55px 0 55px; border:1px solid rgba(255,255,255,0.7);
    background: linear-gradient(135deg, rgba(145,189,233,0.78), rgba(53,72,97,0.58));
    backdrop-filter:blur(40px);
    display:flex; flex-direction:column; justify-content:center; align-items:center;
}
.name-card h3{ color:white; font-size:18px; font-weight:300; margin-right:50px; letter-spacing:0.5px; }
.name-card h4{ margin-top:10px; color:white; margin-right:50px; font-size:18px; font-weight:700; }
.lower{ display:flex; margin-top:48px; gap:35px; }
.left-content{ width:48%; }
.right-content{ width:42%; }
.vertical-line{ width:1px; background:rgba(255,255,255,0.6); }
.lower h2{ color:#8FD8FF; font-size:32px; font-weight:500; margin-top:34px; margin-bottom:22px; }
.lower h3{ color:#8FD8FF; font-size:28px; font-weight:500; margin-top:18px; margin-bottom:18px; }
.paragraph{ font-size:15px; line-height:1.55; font-weight:300; text-align:justify; }
.user-box{
    position:absolute; left:35px; bottom:135px; width: 280px; color:white; text-align: center;
}
.user-box p{ font-size:18px; margin-bottom:18px; margin-left:0; margin-right:0; text-align:center; }
.logout-btn{
    width:210px; height:58px; border-radius:50px; border:2px solid rgba(255,255,255,0.8);
    background: linear-gradient(to right, #9e6074, #4e2e50, #415e81);
    color:white; font-size:22px; font-weight:300; cursor:pointer;
    box-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
}
.action-buttons{ width:100%; margin-top:80px; display:flex; justify-content:space-around; }
.action-btn{
    width:210px; height:58px; border-radius:50px; border:2px solid rgba(255,255,255,0.8);
    background: linear-gradient(to right, #9e6074, #4e2e50, #415e81);
    color:white; font-size:20px; font-weight:300; cursor:pointer;
    box-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
    transition:0.3s; text-decoration:none; display:inline-block; text-align:center; line-height:58px;
}
.action-btn:hover, .logout-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 0 20px rgba(255,255,255,0.7), inset 0 0 15px rgba(255,255,255,0.35);
}
.action-btn[disabled]{
    opacity:0.6; background: linear-gradient(to right, #a38d93, #7b6a7d, #8d98a4);
    cursor:not-allowed;
}
</style>
</head>
<body>
<div class="container">
    <div class="left-panel"></div>
    <div class="foto"><img src="betran_hp.png"></div>
    <div class="logo"><img src="logo.png"></div>
    <div class="navbar">
        <a href="kandidat.php" class="nav-active" style="text-decoration:none; color:white;">Voting</a>
        <a href="hasil-voting.php" style="color:white; text-decoration:none; opacity:0.6;">Hasil Voting</a>
    </div>
    <div class="name-card">
        <h3>BETRAN AULIA DIPA</h3>
        <h4>XI TKR 2</h4>
    </div>
    <div class="user-box">
        <p>Halo, <?php echo htmlspecialchars($_SESSION['nama']); ?>!</p>
        <a href="logout.php"><button class="logout-btn">Logout</button></a>
    </div>
    <div class="content">
        <div class="title">DETAIL KANDIDAT</div>
        <div class="sub">KANDIDAT 2</div>
        <div class="name-row">
            <div>
                <div class="name">BETRAN</div>
                <div class="info">
                    <div><span class="label">Nama lengkap</span><p>Betran Aulia Dipa</p></div>
                    <div><span class="label">Tanggal lahir</span><p>2 Februari 2008</p></div>
                    <div><span class="label">Umur</span><p>17 tahun</p></div>
                </div>
                <div class="hobby"><span class="label">Hobi</span><p>Public speaking, catur (asah strategi), dan lari jarak jauh (maraton), bersepeda.</p></div>
            </div>
            <div class="signature">Betran</div>
        </div>
        <div class="horizontal-line"></div>
        <div class="lower">
            <div class="left-content">
                <p class="paragraph">Betrand Aulia Dipa adalah sosok yang menggabungkan ketegasan instruksi dengan kemampuan komunikasi yang persuasif. Ia percaya bahwa keamanan sekolah bukan hanya soal penjagaan fisik, melainkan soal membangun budaya sadar aturan yang dimulai dari komunikasi yang efektif antar-siswa.</p>
                <h2>Latar belakang</h2>
                <p class="paragraph">Memiliki rekam jejak yang kuat dalam organisasi kesiswaan, Betrand sering menjadi orator atau penengah dalam diskusi kelompok. Pengalaman ini membentuknya menjadi pribadi yang tidak ragu mengambil keputusan sulit, namun tetap mampu menjelaskan alasan di balik keputusan tersebut kepada rekan-rekannya.</p>
                <h2>Motivasi</h2>
                <p class="paragraph">Ingin meninggalkan warisan (legacy) berupa lingkungan sekolah yang tertib secara sistematis, bukan karena takut, tapi karena sadar.</p>
            </div>
            <div class="vertical-line"></div>
            <div class="right-content">
                <h2>Visi & Misi</h2>
                <h3>Visi</h3>
                <p class="paragraph">"Menjadikan PKS sebagai pusat pembentukan karakter disiplin siswa dan penggerak utama budaya aman yang berkelanjutan di lingkungan sekolah."</p>
                <h3>Misi</h3>
                <p class="paragraph">Edukasi Disiplin: Mensosialisasikan pentingnya kedisiplinan bukan sebagai beban, melainkan sebagai kebutuhan untuk masa depan. <br><br>Komunikasi Terbuka: Membangun saluran komunikasi antara PKS dan siswa agar tercipta lingkungan yang saling menjaga (budaya aman). <br><br>Standardisasi Tindakan: Memastikan setiap anggota PKS bertindak tegas dan konsisten sesuai aturan sekolah.</p>
            </div>
        </div>
        <div class="action-buttons">
            <a href="kandidat.php" class="action-btn">KEMBALI</a>
            <a href="konfirmasi.php?id=2" class="action-btn">PILIH</a>
        </div>
    </div>
</div>
</body>
</html>