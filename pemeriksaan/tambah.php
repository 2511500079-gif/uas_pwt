<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:../login.php");
    exit();
}

include "../koneksi.php";

$balita = mysqli_query($conn,"SELECT * FROM balita");
$kader  = mysqli_query($conn,"SELECT * FROM kader");

if(isset($_POST['simpan'])){

$id      = $_POST['id_periksa'];
$balita  = $_POST['id_balita'];
$kader   = $_POST['id_kader'];
$tanggal = $_POST['tanggal'];
$bb      = $_POST['berat_badan'];
$tb      = $_POST['tinggi_badan'];

mysqli_query($conn,"INSERT INTO pemeriksaan VALUES('$id','$balita','$kader','$tanggal','$bb','$tb')");

header("Location:tampil.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Pemeriksaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f3f0ff;
}

.card{
max-width:800px;
margin:auto;
margin-top:40px;
border:none;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.1);
}

.card-header{
background:#9333ea;
color:white;
font-size:24px;
font-weight:bold;
}

</style>

</head>
<body>

<div class="card">

<div class="card-header">
📋 Tambah Pemeriksaan
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>ID Pemeriksaan</label>
<input type="text"
name="id_periksa"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Balita</label>

<select
name="id_balita"
class="form-control"
required>

<option value="">-- Pilih Balita --</option>

<?php while($b=mysqli_fetch_array($balita)){ ?>

<option value="<?= $b['id_balita']; ?>">
<?= $b['nama_balita']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Kader</label>

<select
name="id_kader"
class="form-control"
required>

<option value="">-- Pilih Kader --</option>

<?php while($k=mysqli_fetch_array($kader)){ ?>

<option value="<?= $k['id_kader']; ?>">
<?= $k['nama_kader']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Tanggal Pemeriksaan</label>
<input type="date"
name="tanggal"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Berat Badan (Kg)</label>
<input type="number"
step="0.01"
name="berat_badan"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Tinggi Badan (Cm)</label>
<input type="number"
step="0.01"
name="tinggi_badan"
class="form-control"
required>
</div>

<button
type="submit"
name="simpan"
class="btn btn-success">

Simpan

</button>

<a
href="tampil.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</body>
</html>