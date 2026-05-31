<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include 'config.php';

$user_id = $_SESSION['user_id'];
$nama_user = $_SESSION['nama'];
$voting_event_id = 1; // event aktif

// Ambil id kandidat dari URL
$candidate_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Cek apakah user sudah memilih
$cek = $conn->query("SELECT id FROM votes WHERE user_id = $user_id AND voting_event_id = $voting_event_id");
$sudah_memilih = $cek->num_rows > 0;

// Ambil data kandidat dari tabel options
$query = "SELECT * FROM options WHERE id = $candidate_id AND voting_event_id = $voting_event_id";
$result = $conn->query($query);
if($result->num_rows == 0){
    die("Kandidat tidak ditemukan.");
}
$kandidat = $result->fetch_assoc();

// Proses jika tombol PILIH ditekan
if(isset($_POST['pilih'])){
    if(!$sudah_memilih){
        $insert = $conn->query("INSERT INTO votes (user_id, voting_event_id, option_id) VALUES ($user_id, $voting_event_id, $candidate_id)");
        if($insert){
            echo "<script>alert('Suara Anda tersimpan! Terima kasih.'); window.location='kandidat.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan suara.');</script>";
        }
    } else {
        echo "<script>alert('Anda sudah pernah memilih!'); window.location='kandidat.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Kandidat</title>
    <style>
        body {
            background: linear-gradient(135deg, #345A80, #01162B, #02305E, #6A90B4);
            color: white;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .card {
            background: rgba(255,255,255,0.1);
            border-radius: 30px;
            border: 2px solid #D2DBEC;
            padding: 30px;
            max-width: 500px;
            text-align: center;
            backdrop-filter: blur(10px);
        }
        img {
            max-width: 100%;
            border-radius: 20px;
            margin-bottom: 20px;
        }
        .btn-pilih {
            background: linear-gradient(to right, #9e6074, #4e2e50, #415e81);
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }
        .btn-pilih:disabled {
            opacity: 0.5;
        }
        .back {
            display: inline-block;
            margin-top: 15px;
            color: #D2DBEC;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2><?= htmlspecialchars($kandidat['candidate_name']) ?></h2>
        <img src="<?= htmlspecialchars($kandidat['photo']) ?>" alt="Foto">
        <p><?= nl2br(htmlspecialchars($kandidat['description'])) ?></p>
        <?php if($sudah_memilih): ?>
            <p style="color: #ffb3b3;">Anda sudah memberikan suara sebelumnya. Tidak bisa memilih lagi.</p>
        <?php else: ?>
            <form method="POST">
                <button type="submit" name="pilih" class="btn-pilih">PILIH</button>
            </form>
        <?php endif; ?>
        <br>
        <a href="kandidat.php" class="back">← Kembali ke daftar kandidat</a>
    </div>
</body>
</html>