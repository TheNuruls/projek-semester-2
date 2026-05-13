<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Detail Kandidat</title>

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Great+Vibes&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    width:100%;
    min-height:100vh;

    display:flex;
    justify-content:center;

    overflow-x:hidden;

    font-family:'Poppins', sans-serif;

    background:
    linear-gradient(
    90deg,
    #234A70 0%,
    #001F45 35%,
    #00336A 65%,
    #5279A5 100%);
}

/* CONTAINER */

.container{
    position:relative;

    width:1440px;
    height:1772px;

    overflow:hidden;

    background:
    linear-gradient(
    90deg,
    #234A70 0%,
    #001F45 35%,
    #00336A 65%,
    #5279A5 100%);
}

/* LEFT PANEL */

.left-panel{
    position:absolute;
    left:0;
    top:0;

    width:345px;
    height:100%;

    border-right:2px solid #D2DBEC;

    background:
    radial-gradient(
        circle at top left,
        #AE6B97 7%,
        #6A90B4 11%,
        #EAE8E6 14%,
        #571E47 29%,
        #F9F2EC 86%
    );

    overflow:hidden;
}

/* FOTO */

.candidate-photo{
    position:absolute;

    top:88px;
    left:35px;

    width:470px;

    z-index:5;

    object-fit:contain;

    filter:
    grayscale(100%)
    drop-shadow(0 0 18px rgba(255,255,255,0.18));
}

/* LOGO */

.logo{
    position:absolute;

    top:18px;
    left:485px;

    color:white;

    font-size:20px;
    font-weight:700;

    display:flex;
    align-items:center;
    gap:10px;

    z-index:20;
}

.logo-icon{
    width:55px;
    height:55px;

    border:4px solid white;
    border-radius:12px;

    position:relative;
}

.logo-icon::before{
    content:"";

    position:absolute;

    left:10px;
    bottom:10px;

    width:8px;
    height:15px;

    background:white;

    box-shadow:
    12px -8px 0 white,
    24px -20px 0 white;
}

/* NAVBAR */

.navbar{
    position:absolute;

    top:18px;
    left:650px;

    width:640px;
    height:58px;

    border-radius:40px;

    border:2px solid rgba(255,255,255,0.7);

    box-shadow:
    0 0 15px rgba(255,255,255,0.25);

    display:flex;
    align-items:center;
    justify-content:space-around;

    color:white;

    font-size:20px;
    font-weight:400;
}

.nav-active{
    position:relative;
}

.nav-active::after{
    content:"";

    position:absolute;

    left:50%;
    transform:translateX(-50%);

    bottom:-10px;

    width:110px;
    height:3px;

    border-radius:20px;

    background:#7BD3FF;
}

/* CONTENT */

.content{
    position:absolute;

    top:150px;
    left:560px;

    width:760px;

    color:white;
}

/* TITLE */

.title{
    font-size:72px;
    font-weight:600;

    letter-spacing:1px;

    line-height:1;
}

.sub{
    margin-top:18px;

    font-size:22px;
    font-weight:600;

    color:#8FD8FF;
}

/* NAME ROW */

.name-row{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
}

/* NAMA */

.name{
    margin-top:52px;

    font-size:145px;
    line-height:0.9;

    font-weight:800;

    letter-spacing:2px;

    color:#DCE1F2;
}

/* SIGNATURE */

.signature{
    margin-top:72px;
    margin-right:10px;

    font-family:'Great Vibes', cursive;

    font-size:88px;

    color:white;
}

/* INFO */

.info{
    margin-top:42px;
    margin-left:40px;
    display:grid;
    grid-template-columns:1.1fr 0.9fr 0.4fr;

    gap:50px;
}

.label{
    color:#8FD8FF;

    font-size:21px;
    font-weight:400;

    margin-bottom:12px;

    display:block;
}

.info p,
.hobby p{
    font-size:15px;
    line-height:1.5;

    font-weight:300;
}

/* HOBBY */

.hobby{
    margin-top:38px;
    margin-left:40px;
    width:95%;
}

/* GARIS */

.horizontal-line{
    position:relative;
    width:108%;
    height:1px;
    margin-top:63px;
    left:-45px;
    background:rgba(255,255,255,0.65);
}

/* CARD */

.name-card{
    position:absolute;
    bottom:55px;
    top:605px;
    left:50px;
    width:485px;
    height:150px;

    border-radius:0 55px 0 55px;

    border:1px solid rgba(255,255,255,0.7);

    background:
    linear-gradient(
    135deg,
    rgba(145,189,233,0.78),
    rgba(53,72,97,0.58));

    backdrop-filter:blur(20px);

    z-index:20;

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.name-card h3{
    color:white;

    font-size:18px;
    font-weight:300px;
    margin-right:50px;
    letter-spacing:0.5px;
}

.name-card h4{
    margin-top:10px;
    color:white;
    margin-right:50px;
    font-size:18px;
    font-weight:700;
}

/* LOWER */

.lower{
    display:flex;

    margin-top:48px;

    gap:35px;
}

.left-content{
    width:48%;
}

.right-content{
    width:42%;
}

.vertical-line{
    width:1px;

    background:rgba(255,255,255,0.6);
}

/* HEADING */

.lower h2{
    color:#8FD8FF;

    font-size:32px;
    font-weight:500;

    margin-top:34px;
    margin-bottom:22px;
}

.lower h3{
    color:#8FD8FF;

    font-size:28px;
    font-weight:500;

    margin-top:18px;
    margin-bottom:18px;
}

/* PARAGRAF */

.paragraph{
    font-size:15px;
    line-height:1.55;

    font-weight:300;

    text-align:justify;
}

/* USER */

.user-box{
    position:absolute;

    left:60px;
    bottom:135px;

    color:white;
}

.user-box p{
    font-size:18px;
    margin-bottom:18px;
    margin-right:10px;
    margin-left:45px;
}

/* BUTTON */

.logout-btn{
    width:210px;
    height:58px;

    border-radius:50px;

    border:2px solid rgba(255,255,255,0.8);

    background:
    linear-gradient(
    90deg,
    rgba(204,129,168,0.9),
    rgba(110,144,196,0.8));

    color:white;

    font-size:22px;
    font-weight:300;

    cursor:pointer;

    box-shadow:
    0 0 14px rgba(255,255,255,0.45),
    inset 0 0 12px rgba(255,255,255,0.25);
}

/* ACTION BUTTON */

.action-buttons{
    width:100%;

    margin-top:80px;

    display:flex;
    justify-content:space-around;
}

.action-btn{
    width:210px;
    height:58px;

    border-radius:50px;

    border:2px solid rgba(255,255,255,0.8);

    background:
    linear-gradient(
    90deg,
    rgba(200,135,170,0.85),
    rgba(112,145,197,0.8));

    color:white;

    font-size:20px;
    font-weight:300;

    cursor:pointer;

    box-shadow:
    0 0 15px rgba(255,255,255,0.4),
    inset 0 0 10px rgba(255,255,255,0.2);

    transition:0.3s;
}

.action-btn:hover,
.logout-btn:hover{
    transform:translateY(-3px);

    box-shadow:
    0 0 20px rgba(255,255,255,0.7),
    inset 0 0 15px rgba(255,255,255,0.35);
}

</style>
</head>

<body>

<div class="container">

    <!-- LEFT PANEL -->
    <div class="left-panel"></div>

    <!-- FOTO -->
    <img src="dicky-hp.png">

    <!-- LOGO -->
    <div class="logo">

        <div class="logo-icon"></div>

        <div>
            Votify<br>
            <span style="font-size:15px; font-weight:500;">PKS</span>
        </div>

    </div>

    <!-- NAVBAR -->
    <div class="navbar">

        <div class="nav-active">Voting</div>

        <div style="opacity:0.6;">Hasil Voting</div>

    </div>

    <!-- CARD -->
    <div class="name-card">

        <h3>DICKY HENDRY KURNIAWAN</h3>

        <h4>XI TKR 2</h4>

    </div>

    <!-- USER -->
    <div class="user-box">

        <p>Halo, Naraya!</p>

        <button class="logout-btn">Logout</button>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="title">DETAIL KANDIDAT</div>

        <div class="sub">KANDIDAT 1</div>

        <!-- NAME -->
        <div class="name-row">

            <div>

                <div class="name">DICKY</div>

                <div class="info">

                    <div>
                        <span class="label">Nama lengkap</span>
                        <p>Dicky Hendry Kurniawan</p>
                    </div>

                    <div>
                        <span class="label">Tanggal lahir</span>
                        <p>1 Januari 2008</p>
                    </div>

                    <div>
                        <span class="label">Umur</span>
                        <p>17 tahun</p>
                    </div>

                </div>

                <div class="hobby">

                    <span class="label">Hobi</span>

                    <p>
                        Olahraga fisik, latihan baris-berbaris (PBB),
                        membaca literatur kepemimpinan,
                        dan bermain alat musik.
                    </p>

                </div>

            </div>

            <div class="signature">
                Dicky
            </div>

        </div>

        <div class="horizontal-line"></div>

        <!-- LOWER -->
        <div class="lower">

            <!-- LEFT -->
            <div class="left-content">

                <p class="paragraph">
                    Dicky Hendry Kurniawan adalah seorang anggota
                    Patroli Keamanan Sekolah (PKS) yang dikenal
                    memiliki dedikasi tinggi terhadap kedisiplinan.
                    Sebagai pribadi yang bertanggung jawab,
                    ia menonjol dalam kepemimpinan lapangan dan
                    selalu mengedepankan etika serta ketertiban
                    dalam bertugas.
                </p>

                <h2>Latar belakang</h2>

                <p class="paragraph">
                    Tumbuh dalam lingkungan yang menghargai struktur
                    dan aturan, yang kemudian membentuk karakternya
                    menjadi sosok yang taktis dan sigap.
                    Pengalamannya di organisasi PKS telah mengasah
                    kemampuannya dalam manajemen konflik ringan di sekolah
                    serta pengaturan lalu lintas di lingkungan pendidikan.
                </p>

                <h2>Motivasi</h2>

                <p class="paragraph">
                    Ingin membuktikan bahwa disiplin adalah kunci utama
                    menuju kesuksesan dan ingin memberikan kontribusi nyata
                    bagi kenyamanan belajar di sekolah.
                </p>

            </div>

            <!-- LINE -->
            <div class="vertical-line"></div>

            <!-- RIGHT -->
            <div class="right-content">

                <h2>Visi & Misi</h2>

                <h3>Visi</h3>

                <p class="paragraph">
                    "Mewujudkan PKS sebagai organisasi yang sigap,
                    tertib, dan menjadi role model (teladan)
                    bagi seluruh siswa dalam hal kedisiplinan
                    dan kepedulian sosial."
                </p>

                <h3>Misi</h3>

                <p class="paragraph">

                    Meningkatkan Responsivitas:
                    Menjamin setiap anggota PKS selalu siap siaga
                    (sigap) dalam menjaga keamanan lingkungan sekolah.

                    <br><br>

                    Penegakan Ketertiban:
                    Mengimplementasikan aturan sekolah secara tegas
                    namun tetap persuasif dan edukatif.

                    <br><br>

                    Penguatan Karakter:
                    Membentuk anggota yang memiliki integritas tinggi
                    agar layak menjadi contoh bagi rekan sebaya.

                </p>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="action-buttons">

            <button class="action-btn">
                KEMBALI
            </button>

            <button class="action-btn">
                PILIH
            </button>

        </div>

    </div>

</div>

</body>
</html>