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

$data = mysqli_query($conn,"SELECT * FROM balita");
?>

<!DOCTYPE html>
<html>
<head>

<title>Data Balita</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f3f0ff;
}

/* SIDEBAR */

.sidebar{
    width:240px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    background:linear-gradient(180deg,#c084fc,#9333ea);
}

.sidebar h3{
    color:white;
    text-align:center;
    padding:25px 0;
    font-weight:700;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    margin:8px 12px;
    border-radius:10px;
    transition:.3s;
    font-size:14px;
}

.sidebar a:hover{
    background:white;
    color:#9333ea;
}

/* CONTENT */

.content{
    margin-left:260px;
    padding:30px;
}

/* TITLE */

.judul{
    font-size:30px;
    font-weight:700;
    color:#7c3aed;
}

/* CARD */

.card-custom{
    background:white;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
    overflow:hidden;
}

/* BUTTON */

.btn-tambah{
    background:#7c3aed;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:10px;
    font-size:14px;
    font-weight:500;
}

.btn-tambah:hover{
    background:#6d28d9;
    color:white;
}

/* TABLE */

.table{
    margin-bottom:0;
}

.table thead{
    background:#7c3aed;
    color:white;
}

.table thead th{
    border:none;
    font-size:14px;
    padding:15px;
}

.table tbody td{
    font-size:13px;
    padding:15px;
    vertical-align:middle;
}

.table tbody tr:hover{
    background:#faf5ff;
}

/* BADGE */

.badge-lk{
    background:#3b82f6;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:11px;
}

.badge-pr{
    background:#ec4899;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:11px;
}

/* BUTTON AKSI */

.btn-edit{
    background:#facc15;
    color:black;
    text-decoration:none;
    padding:6px 10px;
    border-radius:8px;
    font-size:12px;
    margin-right:5px;
}

.btn-hapus{
    background:#ef4444;
    color:white;
    text-decoration:none;
    padding:6px 10px;
    border-radius:8px;
    font-size:12px;
}

.btn-edit:hover{
    color:black;
}

.btn-hapus:hover{
    color:white;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h3>🩺 POSYANDU</h3>

<a href="../index.php">🏠 Dashboard</a>

<a href="../orang_tua/tampil.php">
👨‍👩‍👧 Orang Tua
</a>

<a href="tampil.php">
👶 Balita
</a>

<a href="../kader/tampil.php">
👩‍⚕️ Kader
</a>

<a href="../imunisasi/tampil.php">
💉 Imunisasi
</a>

<a href="../pemeriksaan/tampil.php">
📋 Pemeriksaan
</a>

<a href="../logout.php">
🚪 Logout
</a>

</div>

<!-- CONTENT -->

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="judul">
👶 Data Balita
</h2>

<a href="tambah.php" class="btn-tambah">
+ Tambah Data
</a>

</div>

<div class="card-custom">

<div class="table-responsive">

<table class="table">

<thead>

<tr>
<th>ID</th>
<th>Nama Balita</th>
<th>Jenis Kelamin</th>
<th>Nama Orang Tua</th>
<th>Alamat</th>
<th width="140">Aksi</th>
</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_array($data)){ ?>

<tr>

<td><?= $row['id_balita']; ?></td>

<td>
<b><?= $row['nama_balita']; ?></b>
</td>

<td>

<?php
if($row['jk']=="Laki-Laki"){
echo "<span class='badge-lk'>Laki-Laki</span>";
}else{
echo "<span class='badge-pr'>Perempuan</span>";
}
?>

</td>

<td><?= $row['nama_ortu']; ?></td>

<td><?= $row['alamat']; ?></td>

<td style="white-space:nowrap;">

<a href="edit.php?id=<?= $row['id_balita']; ?>"
class="btn-edit">

✏ Edit

</a>

<a href="hapus.php?id=<?= $row['id_balita']; ?>"
class="btn-hapus"
onclick="return confirm('Yakin Hapus?')">

🗑 Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>