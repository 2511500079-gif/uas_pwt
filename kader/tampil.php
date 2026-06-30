<?php
session_start();

if($_SESSION['role'] != 'admin'){
    echo "<script>
    alert('Akses Ditolak!');
    window.location='../index.php';
    </script>";
    exit();
}

if(!isset($_SESSION['username'])){
    header("Location:../login.php");
    exit();
}

include "../koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM kader");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Kader</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
font-family:'Poppins',sans-serif;
}

body{
background:#f3f0ff;
}

.sidebar{
width:240px;
height:100vh;
position:fixed;
background:linear-gradient(180deg,#c084fc,#9333ea);
}

.sidebar h3{
color:white;
text-align:center;
padding:25px;
}

.sidebar a{
display:block;
color:white;
text-decoration:none;
padding:12px 20px;
margin:8px;
border-radius:10px;
}

.sidebar a:hover{
background:white;
color:#9333ea;
}

.content{
margin-left:260px;
padding:30px;
}

.card-custom{
background:white;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.08);
overflow:hidden;
}

.table thead{
background:#7c3aed;
color:white;
}

.btn-tambah{
background:#7c3aed;
color:white;
padding:10px 20px;
border-radius:10px;
text-decoration:none;
}

</style>

</head>

<body>

<div class="sidebar">

<h3>🩺 POSYANDU</h3>

<a href="../index.php">🏠 Dashboard</a>
<a href="../orang_tua/tampil.php">👨‍👩‍👧 Orang Tua</a>
<a href="../balita/tampil.php">👶 Balita</a>
<a href="tampil.php">👩‍⚕️ Kader</a>
<a href="../imunisasi/tampil.php">💉 Imunisasi</a>
<a href="../pemeriksaan/tampil.php">📋 Pemeriksaan</a>
<a href="../logout.php">🚪 Logout</a>

</div>

<div class="content">

<h2>👩‍⚕️ Data Kader</h2>

<a href="tambah.php" class="btn-tambah">
+ Tambah Data
</a>

<br><br>

<div class="card-custom">

<table class="table">

<tr>
<th>ID</th>
<th>Nama Kader</th>
<th>No HP</th>
<th>Aksi</th>
</tr>

<?php while($row=mysqli_fetch_array($data)){ ?>

<tr>

<td><?= $row['id_kader']; ?></td>
<td><?= $row['nama_kader']; ?></td>
<td><?= $row['no_hp']; ?></td>

<td>

<a href="edit.php?id=<?= $row['id_kader']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="hapus.php?id=<?= $row['id_kader']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin Hapus?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>