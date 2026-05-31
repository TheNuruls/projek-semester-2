<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include 'config.php';

$user_id = $_SESSION['user_id'];
$nama_user = $_SESSION['nama'] ?? 'Pengguna'; // <-- tambahkan ini
$voting_event_id = 1;
$cek = $conn->query("SELECT id FROM votes WHERE user_id = $user_id AND voting_event_id = $voting_event_id");
$sudah_memilih = $cek->num_rows > 0;




// Ambil data kandidat dari tabel options untuk event ini
$query_kandidat = "SELECT id, candidate_name, photo FROM options WHERE voting_event_id = $voting_event_id";
$kandidat_result = $conn->query($query_kandidat);
$kandidat = [];
while($row = $kandidat_result->fetch_assoc()){
    $kandidat[$row['id']] = [
        'nama' => $row['candidate_name'],
        'foto' => $row['photo']
    ];
}

// Hitung suara per kandidat dari tabel votes
$query_suara = "SELECT option_id, COUNT(*) as jumlah FROM votes WHERE voting_event_id = $voting_event_id GROUP BY option_id";
$suara_result = $conn->query($query_suara);
$suara = [];
while($row = $suara_result->fetch_assoc()){
    $suara[$row['option_id']] = $row['jumlah'];
}

// Default 0 untuk kandidat yang belum dapat suara
foreach($kandidat as $id => $val){
    if(!isset($suara[$id])) $suara[$id] = 0;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Voting - Votify PKS</title>
    <style>
        /* ===== DESAIN ASLI ANDA (TIDAK DIUBAH) ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #345A80 0%, #01162B 44%, #02305E 71%, #6A90B4 100%);
            color: white;
            min-height: 100vh;
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
            border: 2px solid #D2DBEC; 
            border-radius: 30px;
            color: #D2DBEC;
            text-decoration: none;
            font-size: 1rem;
            transition: 0.3s;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }

        .btn-nav.active {
            background: #6A90B4;
        }

        .user-section {
            margin-top: auto;
            text-align: center;
        }

        .btn-logout {
            width: 160px;
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

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 40px 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title {
            font-size: 42px;
            font-weight: 500;
            margin-bottom: 50px;
            text-align: center;
            letter-spacing: 2px;
        }

        .candidates-container {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .candidate-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid #D2DBEC;
            border-radius: 25px;
            padding: 25px 20px;
            width: 320px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(40, 71, 84, 0.4);
            box-shadow: 10px 10px 30px -1px #345A80 inset;
        }

        .candidate-label {
            font-size: 21px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #D2DBEC;
        }

        .photo-container {
            width: 280px;
            height: 250px;
            margin: 0 auto 20px;
            border-radius: 20px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 20px hsla(224, 37%, 86%, 0.40);
        }

        .candidate-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .candidate-name {
            font-size: 19px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .total-voting {
            font-size: 15px;
            opacity: 0.85;
            margin-bottom: 5px;
        }

        .vote-count {
            font-size: 58px;
            font-weight: bold;
            color: #ffb6c1;
            line-height: 1;
            margin: 8px 0;
        }

        .suara {
            font-size: 17px;
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="content-side">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Votify PKS">
        </div>
        
<nav class="menu">
    <?php if($sudah_memilih): ?>
        <a href="selesai.php" class="btn-nav">Voting</a>
    <?php else: ?>
        <a href="kandidat.php" class="btn-nav">Voting</a>
    <?php endif; ?>
    <a href="hasil-voting.php" class="btn-nav active">Hasil Voting</a>
</nav>

        <div class="user-section">
            <p>Halo, <?php echo htmlspecialchars($nama_user); ?>!</p>
            <a href="logout.php"><button class="btn-logout">Logout</button></a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <h1 class="title">HASIL VOTING</h1>
        
        <div class="candidates-container">
            <?php
            $no = 1;
            foreach($kandidat as $id => $data):
                $foto = !empty($data['foto']) ? $data['foto'] : 'default.png';
                $jumlah_suara = $suara[$id];
            ?>
            <div class="candidate-card">
                <div class="candidate-label">KANDIDAT <?php echo $no; ?></div>
                <div class="photo-container">
                    <img src="<?php echo htmlspecialchars($foto); ?>" alt="<?php echo htmlspecialchars($data['nama']); ?>" class="candidate-photo">
                </div>
                <div class="candidate-name"><?php echo htmlspecialchars($data['nama']); ?></div>
                <div class="total-voting">Total Voting</div>
                <div class="vote-count"><?php echo $jumlah_suara; ?></div>
                <div class="suara">Suara</div>
            </div>
            <?php 
            $no++;
            endforeach; 
            ?>
        </div>
    </div>
</div>

</body>
</html>