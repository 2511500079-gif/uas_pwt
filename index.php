<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

include "koneksi.php";

$ortu = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orang_tua"));
$balita = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM balita"));
$kader = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kader"));
$imunisasi = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM imunisasi"));
$periksa = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pemeriksaan"));
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistem Informasi Posyandu Balita</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    background:#f3f0ff;
    font-family:'Segoe UI',sans-serif;
}

/* SIDEBAR */

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100%;
    background:linear-gradient(180deg,#c084fc,#9333ea);
    padding-top:20px;
}

.logo{
    text-align:center;
    color:white;
    font-size:30px;
    font-weight:bold;
}

.admin{
    text-align:center;
    margin-top:20px;
    color:white;
}

.admin img{
    width:80px;
    height:80px;
    border-radius:50%;
    background:white;
    padding:5px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    margin:8px;
    border-radius:10px;
    transition:0.3s;
}

.sidebar a:hover{
    background:white;
    color:#9333ea;
}

.active{
    background:white;
    color:#9333ea !important;
}

/* CONTENT */

.content{
    margin-left:250px;
    padding:30px;
}

.header{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0px 3px 10px rgba(0,0,0,0.1);
    margin-bottom:25px;
}

.header h2{
    margin:0;
}

.card-box{
    background:white;
    border-radius:20px;
    padding:30px;
    text-align:center;
    box-shadow:0px 3px 10px rgba(0,0,0,0.1);
    border-left:8px solid #9333ea;
}

.card-box h1{
    font-size:50px;
    color:#9333ea;
}

.card-box p{
    font-size:20px;
    font-weight:bold;
}

.footer{
    margin-top:30px;
    text-align:center;
    color:gray;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">
        🩺 POSYANDU
    </div>

    <div class="admin">

        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">

        <h5><?= $_SESSION['username']; ?></h5>

        <small>
            <?= ucfirst($_SESSION['role']); ?>
        </small>

    </div>

    <br>

    <a href="index.php" class="active">
        🏠 Dashboard
    </a>

    <?php if($_SESSION['role']=='admin'){ ?>

    <a href="orang_tua/tampil.php">
        👨‍👩‍👧 Orang Tua
    </a>

    <a href="balita/tampil.php">
        👶 Balita
    </a>

    <a href="kader/tampil.php">
        👩‍⚕️ Kader
    </a>

    <a href="imunisasi/tampil.php">
        💉 Imunisasi
    </a>

    <?php } ?>

    <a href="pemeriksaan/tampil.php">
        📋 Pemeriksaan
    </a>

    <a href="logout.php">
        🚪 Logout
    </a>

</div>

<!-- CONTENT -->

<div class="content">

    <div class="header">

        <h2>Sistem Informasi Posyandu Balita</h2>

        <p>
            Selamat Datang,
            <b><?= $_SESSION['username']; ?></b>
            (<?= ucfirst($_SESSION['role']); ?>)
        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-4">

            <div class="card-box">

                <h1><?= $ortu ?></h1>

                <p>Orang Tua</p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card-box">

                <h1><?= $balita ?></h1>

                <p>Balita</p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card-box">

                <h1><?= $kader ?></h1>

                <p>Kader</p>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card-box">

                <h1><?= $imunisasi ?></h1>

                <p>Imunisasi</p>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card-box">

                <h1><?= $periksa ?></h1>

                <p>Pemeriksaan</p>

            </div>

        </div>

    </div>

    <div class="footer">
        © 2026 Sistem Informasi Posyandu Balita
    </div>

</div>

</body>
</html>