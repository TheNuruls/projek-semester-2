<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include 'config.php';

$voting_event_id = 1; // event yang sama

$query = "SELECT o.id, o.candidate_name, COUNT(v.id) as jumlah 
          FROM options o 
          LEFT JOIN votes v ON v.option_id = o.id AND v.voting_event_id = $voting_event_id
          WHERE o.voting_event_id = $voting_event_id
          GROUP BY o.id";
$result = $conn->query($query);
$total = 0;
$data = [];
while($row = $result->fetch_assoc()){
    $data[] = $row;
    $total += $row['jumlah'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Voting</title>
    <style>
        body { background: linear-gradient(135deg,#345A80,#01162B,#02305E,#6A90B4); color:white; font-family:Arial; padding:50px; }
        .card { background:rgba(255,255,255,0.1); border-radius:20px; padding:20px; margin:20px auto; max-width:500px; }
        .bar { background:#4CAF50; height:30px; border-radius:15px; margin-top:5px; line-height:30px; padding-left:10px; }
        .btn { display:block; width:200px; margin:20px auto; text-align:center; background:#6A90B4; padding:10px; border-radius:30px; text-decoration:none; color:white; }
    </style>
</head>
<body>
    <h1 style="text-align:center">HASIL VOTING</h1>
    <div class="card">
        <?php foreach($data as $d): 
            $persen = $total > 0 ? ($d['jumlah'] / $total) * 100 : 0;
        ?>
        <div>
            <strong><?= htmlspecialchars($d['candidate_name']) ?></strong><br>
            <div class="bar" style="width: <?= $persen ?>%;">
                <?= $d['jumlah'] ?> suara (<?= round($persen,1) ?>%)
            </div>
        </div>
        <?php endforeach; ?>
        <p style="text-align:center; margin-top:20px;">Total pemilih: <?= $total ?> orang</p>
    </div>
    <a href="kandidat.php" class="btn">Kembali ke Voting</a>
</body>
</html>