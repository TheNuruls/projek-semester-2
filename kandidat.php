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
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
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
    backdrop-filter: blur(10px);
    padding: 40px 20px;
    display: flex;
    flex-direction: column;
    border-right: 1px solid rgba(255, 255, 255, 0.1);
}

.logo {
    text-align: center;
    margin-bottom: 50px;
}

.btn-nav {
    display: block;
    padding: 12px 20px;
    margin-bottom: 15px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 25px;
    color: #cbd5e1;
    text-decoration: none;
    transition: 0.3s;
}

.btn-nav.active, .btn-nav:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: white;
}

.user-section {
    margin-top: auto;
    text-align: center;
}

.btn-logout {
    width: 80%;
    margin-top: 10px;
    padding: 10px;
    border-radius: 20px;
    border: none;
    background: linear-gradient(to right, #EBA8BA, #571E47, #6A90B4);
    color: white;
    cursor: pointer;
}

/* Main Content Styling */
.main-content {
    flex: 1;
    padding: 40px;
}

header h1 {
    text-align: center;
    letter-spacing: 2px;
    margin-bottom: 40px;
}

.card-container {
    display: flex;
    justify-content: space-around;
    gap: 20px;
    flex-wrap: wrap;
}

.card {
    width: 300px;
    text-align: center;
}

.card h3 {
    margin-bottom: 15px;
    font-size: 1.2rem;
    font-weight: 400;
}

.card-inner {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 20px;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
}

.image-box {
    width: 100%;
    height: 250px;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 15px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.info h4 {
    margin-bottom: 10px;
    font-size: 1.1rem;
}

.info p {
    font-size: 0.85rem;
    color: #94a3b8;
    line-height: 1.4;
    text-align: justify;
    margin-bottom: 20px;
}

.btn-lihat {
    margin-top: auto;
    padding: 10px;
    border-radius: 20px;
    border: none;
    background: linear-gradient(to right, #EBA8BA, #571E47, #6A90B4);
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.btn-lihat:hover {
    transform: scale(1.05);
}
    </style>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="logo_votify.png" alt="Votify PKS">
                <h2>Votify <span>PKS</span></h2>
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