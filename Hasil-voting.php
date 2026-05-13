<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Voting - Votify PKS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #011628 0%, #023050 50%, #345A80 100%);
            min-height: 100vh;
            width: 100%;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background: rgba(0, 0, 0, 0.2);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 50px;
            text-align: center;
            line-height: 1.3;
        }

        .logo-img {
            width: 180px;
            height: auto;
            margin-bottom: 10px;
        }

        .menu-item {
            width: 100%;
            max-width: 220px;
            margin: 10px 0; /* Memberi jarak antar tombol */
        }

        /* Style Tombol Menu (Voting & Hasil Voting) */
        .menu-btn {
            width: 100%;
            padding: 12px 0;
            border: 2px solid #ffffff; /* Border Putih */
            border-radius: 50px; /* Bentuk Pill */
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            text-decoration: none;
            display: block;
            color: white;
            transition: all 0.3s;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.4); /* Efek Glow */
        }

        /* Kondisi Default / Tidak Aktif (Seperti tombol Voting di gambar) */
        .menu-btn {
            background: rgba(144, 189, 219, 0.7); /* Biru Muda Transparan */
        }

        /* Kondisi Aktif (Seperti tombol Hasil Voting di gambar) */
        .menu-btn.active {
            background: rgba(15, 40, 66, 0.85); /* Biru Tua Gelap Transparan */
        }

        .menu-btn:hover {
            transform: scale(1.02); /* Efek zoom sedikit saat hover */
        }

        /* Logout Container */
        .logout-container {
            margin-top: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .user-greeting {
            color: white;
            font-size: 22px;
            font-weight: 400; /* Tidak bold */
            margin-bottom: 18px;
            text-align: center;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .logout-btn {
            width: 207.42px;
            height: 51.73px;
            background: linear-gradient(135deg, #EBABBA 0%, #571E47 50%, #6A90B4 100%);
            border: 2px solid #D2DBEC;
            border-radius: 100px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10.95px 0 rgba(106, 144, 180, 0.3);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px 0 rgba(106, 144, 180, 0.4);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title {
            color: white;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 40px;
            text-align: center;
        }

        .candidates-container {
            display: flex;
            gap: 40px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .candidate-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 25px;
            width: 290px;
            text-align: center;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .candidate-label {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.95);
        }

        .photo-container {
            width: 200px;
            height: 200px;
            margin: 0 auto 20px;
            border-radius: 20px;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .candidate-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .candidate-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .total-voting {
            font-size: 14px;
            margin-bottom: 10px;
            opacity: 0.85;
        }

        .vote-count {
            font-size: 56px;
            font-weight: bold;
            color: #ffb6c1;
            margin: 10px 0;
            line-height: 1;
        }

        .suara {
            font-size: 16px;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Votify PKS" class="logo-img">
        </div>
        
        <div class="menu-item">
            <!-- Class menu-btn memberikan warna biru muda -->
            <a href="#" class="menu-btn">Voting</a>
        </div>
        <div class="menu-item">
            <!-- Class active memberikan warna biru tua -->
            <a href="#" class="menu-btn active">Hasil Voting</a>
        </div>
        
        <div class="logout-container">
            <div class="user-greeting">Halo, Naraya!</div>
            <a href="#" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <h1 class="title">HASIL VOTING</h1>
        
        <div class="candidates-container">
            <div class="candidate-card">
                <div class="candidate-label">KANDIDAT 1</div>
                <div class="photo-container">
                    <img src="1.png" alt="Dicky Hendry K." class="candidate-photo">
                </div>
                <div class="candidate-name">Dicky Hendry K.</div>
                <div class="total-voting">Total voting</div>
                <div class="vote-count">0 %</div>
                <div class="suara">Suara</div>
            </div>

            <div class="candidate-card">
                <div class="candidate-label">KANDIDAT 2</div>
                <div class="photo-container">
                    <img src="2.png" alt="Betran Aulia Dipa" class="candidate-photo">
                </div>
                <div class="candidate-name">Betran Aulia Dipa</div>
                <div class="total-voting">Total voting</div>
                <div class="vote-count">0 %</div>
                <div class="suara">Suara</div>
            </div>

            <div class="candidate-card">
                <div class="candidate-label">KANDIDAT 3</div>
                <div class="photo-container">
                    <img src="4.png" alt="Keysha Oktavia" class="candidate-photo">
                </div>
                <div class="candidate-name">Keysha Oktavia</div>
                <div class="total-voting">Total voting</div>
                <div class="vote-count">0 %</div>
                <div class="suara">Suara</div>
            </div>
        </div>
    </div>
</body>
</html>