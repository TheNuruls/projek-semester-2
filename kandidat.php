<?php
// Simulasi data kandidat dari database
$kandidat = [
    [
        "no" => 1,
        "nama" => "Dicky Hendry K.",
        "foto" => "1.png",
        "deskripsi" => "Anggota PKS berpengalaman, disiplin, dan bertanggung jawab. Bertekad menciptakan PKS yang sigap, tertib, dan menjadi teladan siswa."
    ],
    [
        "no" => 2,
        "nama" => "Betran Aulia Dipa",
        "foto" => "2.png",
        "deskripsi" => "Memiliki jiwa kepemimpinan dan kepedulian tinggi. Bervisi membangun PKS yang kompak, profesional, dan aktif menjaga keamanan sekolah."
    ],
    [
        "no" => 3,
        "nama" => "Keysha Oktavia",
        "foto" => "4.png",
        "deskripsi" => "Pribadi tegas dan komunikatif. Berharap PKS menjadi wadah pembentukan karakter disiplin serta budaya aman di lingkungan sekolah."
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votify PKS - Daftar Kandidat</title>
    <link rel="stylesheet" href="style.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        /* Gradasi background sesuai gambar contoh */
        background: linear-gradient(
135deg,
#345A80 0%,
#01162B 44%,
#02305E 71%,
#6A90B4 100%
);
        color: white;
        min-height: 100vh;
    }

    .container {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar Styling */
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

   /* Sidebar Styling */
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

.logo h2 {
    font-size: 1.2rem;
    letter-spacing: 1px;
}

.logo span {
    font-weight: bold;
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
        /* Glow Putih sesuai gambar */
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
    }

    /* Main Content Styling */
    .main-content {
        flex: 1;
        padding: 60px 40px;
    }

    header h1 {
        text-align: center;
        letter-spacing: 2px;
        margin-bottom: 60px;
        font-size: 2rem;
        font-weight: 500;
    }

    .card-container {
        display: flex;
        justify-content: center; 
        gap: 30px;               
    }

    .card {
        width: 300px;
        text-align: center;
    }

    .card h3 {
        margin-bottom: 20px;
        font-size: 1.1rem;
        font-weight: 400;
        letter-spacing: 1px;
    }

    .card-inner {
        background: rgba(255, 255, 255, 0.03);
        border: 2px solid #D2DBEC;
        border-radius: 30px;
        padding: 25px;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Shadow lembut agar card menyatu dengan background */
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        box-shadow: 10px 10px 30px -1px #345A80 inset;
    }

    .image-box {
        width: 100%;
        height: 260px;
        border-radius: 25px;
        overflow: hidden;
        margin-bottom: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
    }

    .image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .info h4 {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 12px;
        color: white;
        text-align: left; 
        padding: 0 15px;
    }

    .info p {
        line-height: 1.5;
        text-align: left; 
        margin-bottom: 25px;
        padding: 0 15px;
        margin-bottom: 25px;
        padding: 0 15px;
        font-size: 16px;
        color: #D2DBEC;
        line-height: 1.5;
        margin-bottom: 25px;
    }

    .btn-lihat {
        width: 160px;
        padding: 16px;
        border-radius: 30px;
        border: 1.5px solid rgba(255, 255, 255, 0.5);
        background: linear-gradient(to right, #9e6074, #4e2e50, #415e81);
        fill: linear-gradient(90deg, rgba(235, 168, 186, 0.80) 0%, rgba(87, 30, 71, 0.80) 50%, rgba(106, 144, 180, 0.80) 100%);
        stroke-width: 2px;
        stroke: #D2DBEC;
        filter: drop-shadow(0 4px 10.9px #6A90B4);
        color: white;
        font-weight:;
        font-size: 16px;
        cursor: pointer;
        /* Glow Putih kuat sesuai contoh */
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        transition: 0.3s;
    }

    .btn-lihat:hover {
        transform: translateY(-3px);
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
    }
</style>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="logo.png">
            </div>
            
            <nav class="menu">
                <a href="#" class="btn-nav active">Voting</a>
                <a href="#" class="btn-nav">Hasil Voting</a>
            </nav>

            <div class="user-section">
                <p>Halo, Naraya!</p>
                <button class="btn-logout">Logout</button>
            </div>
        </aside>

        <main class="main-content">
            <header>
                <h1>DAFTAR KANDIDAT</h1>
            </header>

            <div class="card-container">
                <?php foreach ($kandidat as $k): ?>
                <div class="card">
                    <h3>KANDIDAT <?php echo $k['no']; ?></h3>
                    <div class="card-inner">
                        <div class="image-box">
                            <img src="<?php echo $k['foto']; ?>" alt="<?php echo $k['nama']; ?>">
                        </div>
                        <div class="info">
                            <h4><?php echo $k['nama']; ?></h4>
                            <p><?php echo $k['deskripsi']; ?></p>
                        </div>
                        <button class="btn-lihat">LIHAT</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</body>
</html>