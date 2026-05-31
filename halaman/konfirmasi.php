<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include 'config.php';

$nama_user = $_SESSION['nama'];
$user_id = $_SESSION['user_id'];
$voting_event_id = 1;

// Cek apakah user sudah memilih (untuk mencegah akses langsung ke konfirmasi jika sudah voting)
$cek = $conn->query("SELECT id FROM votes WHERE user_id = $user_id AND voting_event_id = $voting_event_id");
if($cek->num_rows > 0) {
    header("Location: selesai.php");
    exit();
}

$candidate_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if($candidate_id < 1 || $candidate_id > 3){
    header("Location: kandidat.php");
    exit();
}

// Ambil data kandidat dari database
$query = $conn->query("SELECT candidate_name, photo FROM options WHERE id = $candidate_id AND voting_event_id = $voting_event_id");
if($query->num_rows == 0){
    header("Location: kandidat.php");
    exit();
}
$kandidat_db = $query->fetch_assoc();
$candidate_name = $kandidat_db['candidate_name'];
$candidate_photo = $kandidat_db['photo'];

// Proses jika tombol YA ditekan (via GET)
if(isset($_GET['action']) && $_GET['action'] == 'vote'){
    // Cek ulang untuk keamanan
    $cek2 = $conn->query("SELECT id FROM votes WHERE user_id = $user_id AND voting_event_id = $voting_event_id");
    if($cek2->num_rows == 0){
        $insert = $conn->query("INSERT INTO votes (user_id, voting_event_id, option_id) VALUES ($user_id, $voting_event_id, $candidate_id)");
        if($insert){
            // Redirect ke selesai.php, bukan kandidat.php
            header("Location: selesai.php");
            exit();
        } else {
            echo "<script>alert('Gagal menyimpan suara!'); window.location='kandidat.php';</script>";
        }
    } else {
        header("Location: selesai.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Konfirmasi Voting</title>

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

/* MAIN */
.main-content{
    display:flex;
    padding-top:90px;
}

/* TITLE */
.main-content{
    flex:1;
    display:flex;
    flex-direction:column;
    align-items:center;
    padding-top:50px;
}

.main-content h1{
        text-align: center;
        letter-spacing: 2px;
        margin-bottom: 15px;
        font-size: 2rem;
        font-weight: 500;
}

/* CARD */
.card{
    text-align:center;
}

.card h2{
    font-size:25px;
    margin-bottom:18px;
    font-weight:400;
}

/* FOTO */
.photo-box{
    width:230px;
    height:235px;
    margin:auto;
    padding:10px;
    padding-bottom:45px;
    border-radius:30px;
    border: 2px solid #D2DBEC;
    background:rgba(255,255,255,0.05);
    box-shadow: 10px 10px 30px -1px #345A80 inset;
}

.photo-box img{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:20px;
    box-shadow: 0 0 20px rgba(226, 239, 246, 0.6);

}

.nama{
    margin-top:2px;
    font-size:22px;
    color:#E6EEF8;
    font-weight:500;
}

.confirm-box{
    width:620px;
    height:230px;
    margin:55px auto 45px;

    border-radius:28px;
    border: 2px solid #D2DBEC;
    background:rgba(255,255,255,0.05);

    display:flex;
    justify-content:center;
    align-items:center;

    padding:30px;
    box-shadow: 10px 10px 30px -1px #345A80 inset;
}

.confirm-box p{
    font-size:28px;
    line-height:1.4;
    color:#E5EDF8;
}

/* BUTTON */
.button-group{
    display:flex;
    gap:80px;
    justify-content:center;
}

.vote-btn{
    width:170px;
    height:58px;

    border-radius:40px;
    text-decoration:none;
    color:white;
    font-size:24px;

    display:flex;
    justify-content:center;
    align-items:center;

    border:2px solid #D2DBEC;
        background: linear-gradient(to right, #9e6074, #4e2e50, #415e81);

    box-shadow:
    0 0 15px rgba(255,255,255,0.6);

    transition:.3s;
    margin-bottom:50px;
}

.vote-btn:hover{
    transform:translateY(-3px) scale(1.03);
    box-shadow:
    0 0 25px rgba(255,255,255,0.45);
}

@media(max-width:900px){

    .container{
        flex-direction:column;
    }

    .sidebar{
        width:100%;
        height:auto;
    }

    .confirm-box{
        width:90%;
        height:auto;
        padding:40px 20px;
    }

    .confirm-box p{
        font-size:22px;
    }

    .button-group{
        gap:20px;
        flex-wrap:wrap;
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

    <!-- MAIN -->
    <main class="main-content">

        <h1>KONFIRMASI</h1>

        <div class="card">
            <h2>KANDIDAT <?php echo $candidate_id; ?></h2>
            <div class="photo-box">
                <img src="<?php echo htmlspecialchars($candidate_photo); ?>" alt="Foto Kandidat">
                <div class="nama">
                    <?php echo htmlspecialchars($candidate_name); ?>
                </div>
            </div>

            <div class="confirm-box">
                <p>
                    Apakah kamu yakin <br>
                    ingin memilih kandidat <br>
                    tersebut?
                </p>
            </div>

            <div class="button-group">
                <a href="kandidat.php" class="vote-btn">TIDAK</a>
                <a href="konfirmasi.php?id=<?= $candidate_id ?>&action=vote" class="vote-btn">YA</a>
            </div>
        </div>

    </main>
</div>

</body>
</html>