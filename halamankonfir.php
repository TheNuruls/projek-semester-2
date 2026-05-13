<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votify PKS - Voting</title>
    <link rel="stylesheet" href="style.css">
<style>
    {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: radial-gradient(circle at center, #345A80 0%, #01162B 44%, #02305E 71%, #6A90B4 100%);
    height: 100vh;
    display: flex;
    color: white;
    overflow: hidden;
}

.container {
    display: flex;
    width: 100%;
}

.sidebar {
    width: 250px;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    flex-direction: column;
    padding: 40px 20px;
}

.logo {
    text-align: center;
    margin-bottom: 50px;
}

.logo h2 { font-weight: 300; letter-spacing: 2px; }

.menu {
    flex-grow: 1;
}

.menu-btn {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.4);
    border-radius: 20px;
    color: #a0aec0;
    cursor: pointer;
    transition: 0.3s;
}

.menu-btn.active {
    background: rgba(100, 149, 237, 0.4);
    color: white;
    border-color: #6495ed;
}

.logout-btn {
    background: linear-gradient(to right, #4a4e69, #22223b);
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 10px;
    border-radius: 20px;
    color: white;
    cursor: pointer;
}

.main-content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px;
}

header h1 {
    font-size: 1.5rem;
    letter-spacing: 3px;
    margin-bottom: 40px;
}

.voting-area {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    max-width: 600px;
}

.candidate-card {
    text-align: center;
    margin-bottom: 30px;
}

.candidate-card h3 {
    margin-bottom: 10px;
    font-weight: 400;
}

.image-box {
    background: rgba(255, 255, 255, 0.1);
    padding: 15px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    width: 180px;
}

.image-box img {
    width: 100%;
    border-radius: 15px;
    filter: brightness(0.9);
}

.name-tag {
    margin-top: 10px;
    font-size: 0.85rem;
}

.confirmation-box {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 40px;
    width: 100%;
    text-align: center;
    backdrop-filter: blur(5px);
    margin-bottom: 30px;
}

.confirmation-box p {
    font-size: 15px;
    line-height: 1.4;
}


.action-buttons {
    display: flex;
    gap: 40px;
}

.btn {
    width: 150px;
    padding: 12px;
    border-radius: 25px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: transform 0.2s;
}

.btn:active { transform: scale(0.95); }

.btn-secondary { background: linear-gradient(to right, #434343, #000000); }
.btn-primary { background: linear-gradient(to right, #2c3e50, #4b6cb7); }
</style>
</head>
<body>

    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <h2>Votify</h2>
                <p>PKS</p>
            </div>
            <nav class="menu">
                <button class="menu-btn active">Voting</button>
                <button class="menu-btn">Hasil Voting</button>
            </nav>
            <button class="logout-btn">Logout</button>
        </aside>

        <main class="main-content">
            <header>
                <h1>DAFTAR KANDIDAT</h1>
            </header>

            <section class="voting-area">
                <div class="candidate-card">
                    <h3>KANDIDAT 1</h3>
                    <div class="image-box">
                        <img src="dicky.png" alt="Dicky Hendry K.">
                        <div class="name-tag">Dicky Hendry K.</div>
                    </div>
                </div>

                <div class="confirmation-box">
                    <p>Apakah kamu yakin ingin memilih kandidat tersebut?</p>
                </div>

                <div class="action-buttons">
                    <button class="btn btn-secondary">TIDAK</button>
                    <button class="btn btn-primary">YA</button>
                </div>
            </section>
        </main>
    </div>

</body>
</html>