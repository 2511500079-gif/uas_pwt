<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:../login.php");
    exit();
}

include "../koneksi.php";

$data = mysqli_query($conn,"
SELECT * FROM pemeriksaan
");
?>

<!DOCTYPE html>
<html>
<head>

<title>Data Pemeriksaan</title>

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
    position:fixed;
    background:linear-gradient(180deg,#c084fc,#9333ea);
    left:0;
    top:0;
}

.sidebar h3{
    color:white;
    text-align:center;
    padding:25px;
    font-weight:bold;
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

.btn-tambah{
    background:#7c3aed;
    color:white;
    padding:10px 20px;
    border-radius:10px;
    text-decoration:none;
}

.btn-tambah:hover{
    background:#6d28d9;
    color:white;
}

.table thead{
    background:#9333ea;
    color:white;
}

.badge-bb{
    background:#dcfce7;
    color:#15803d;
    padding:6px 12px;
    border-radius:20px;
}

.badge-tb{
    background:#dbeafe;
    color:#2563eb;
    padding:6px 12px;
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
<a href="../imunisasi/tampil.php">💉 Imunisasi</a>
<a href="tampil.php">📋 Pemeriksaan</a>
<a href="../logout.php">🚪 Logout</a>

</div>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">

<h1 class="fw-bold">
📋 Data Pemeriksaan
</h1>

<a href="tambah.php" class="btn-tambah">
+ Tambah Data
</a>

</div>

<div class="card-table">

<table class="table table-hover">

<thead>

<tr>

<th>ID</th>
<th>ID Balita</th>
<th>ID Kader</th>
<th>Tanggal</th>
<th>Berat Badan</th>
<th>Tinggi Badan</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_array($data)){ ?>

<tr>

<td><?= $row['id_periksa']; ?></td>

<td><?= $row['id_balita']; ?></td>

<td><?= $row['id_kader']; ?></td>

<td><?= $row['tanggal']; ?></td>

<td>
<span class="badge-bb">
<?= $row['berat_badan']; ?> Kg
</span>
</td>

<td>
<span class="badge-tb">
<?= $row['tinggi_badan']; ?> Cm
</span>
</td>

<td>

<a
href="edit.php?id=<?= $row['id_periksa']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?= $row['id_periksa']; ?>"
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