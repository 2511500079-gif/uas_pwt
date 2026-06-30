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

$data = mysqli_query($conn,"SELECT * FROM imunisasi");
?>

<!DOCTYPE html>
<html>
<head>

<title>Data Imunisasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    font-family:'Poppins',sans-serif;
}

body{
    background:#f3f0ff;
    margin:0;
}

.sidebar{
    width:230px;
    height:100vh;
    background:linear-gradient(180deg,#c084fc,#9333ea);
    position:fixed;
    left:0;
    top:0;
    padding-top:20px;
}

.sidebar h3{
    color:white;
    text-align:center;
    margin-bottom:30px;
    font-weight:700;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    margin:5px 10px;
    border-radius:10px;
}

.sidebar a:hover{
    background:white;
    color:#9333ea;
}

.content{
    margin-left:250px;
    padding:30px;
}

.card-table{
    background:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.table{
    margin-bottom:0;
}

.table thead{
    background:#9333ea;
    color:white;
}

.table th{
    border:none;
}

.table td{
    vertical-align:middle;
}

.btn-tambah{
    background:#7c3aed;
    color:white;
    border:none;
    border-radius:10px;
    padding:10px 20px;
    text-decoration:none;
}

.btn-tambah:hover{
    background:#6d28d9;
    color:white;
}

.badge-imun{
    background:#ede9fe;
    color:#6d28d9;
    padding:8px 15px;
    border-radius:20px;
}

</style>

</head>

<body>

<div class="sidebar">

<h3>🩺 POSYANDU</h3>

<a href="../index.php">🏠 Dashboard</a>
<a href="../orang_tua/tampil.php">👨‍👩‍👧 Orang Tua</a>
<a href="../balita/tampil.php">👶 Balita</a>
<a href="../kader/tampil.php">👩‍⚕️ Kader</a>
<a href="tampil.php">💉 Imunisasi</a>
<a href="../pemeriksaan/tampil.php">📋 Pemeriksaan</a>
<a href="../logout.php">🚪 Logout</a>

</div>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">

<h1 class="fw-bold text-purple">
💉 Data Imunisasi
</h1>

<a href="tambah.php" class="btn-tambah">
+ Tambah Data
</a>

</div>

<div class="card-table">

<table class="table">

<thead>
<tr>
<th>ID</th>
<th>Nama Imunisasi</th>
<th>Keterangan</th>
<th width="150">Aksi</th>
</tr>
</thead>

<tbody>

<?php while($row=mysqli_fetch_array($data)){ ?>

<tr>

<td><?= $row['id_imunisasi']; ?></td>

<td>
<span class="badge-imun">
<?= $row['nama_imunisasi']; ?>
</span>
</td>

<td><?= $row['keterangan']; ?></td>

<td>

<a href="edit.php?id=<?= $row['id_imunisasi']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $row['id_imunisasi']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin Hapus Data?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>