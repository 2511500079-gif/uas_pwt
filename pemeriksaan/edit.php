<?php
session_start();

if(!isset($_SESSION['username'])){
header("Location:../login.php");
exit();
}

include "../koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM pemeriksaan WHERE id_periksa='$id'"));

$balita = mysqli_query($conn,"SELECT * FROM balita");
$kader  = mysqli_query($conn,"SELECT * FROM kader");

if(isset($_POST['update'])){

$id_balita = $_POST['id_balita'];
$id_kader  = $_POST['id_kader'];
$tanggal   = $_POST['tanggal'];
$bb        = $_POST['berat_badan'];
$tb        = $_POST['tinggi_badan'];

mysqli_query($conn,"UPDATE pemeriksaan SET id_balita='$id_balita', id_kader='$id_kader', tanggal='$tanggal', berat_badan='$bb', tinggi_badan='$tb' WHERE id_periksa='$id'");

header("Location:tampil.php");

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Pemeriksaan</title>

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
✏ Edit Pemeriksaan
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Balita</label>

<select
name="id_balita"
class="form-control">

<?php while($b=mysqli_fetch_array($balita)){ ?>

<option
value="<?= $b['id_balita']; ?>"
<?= ($data['id_balita']==$b['id_balita']) ? 'selected' : ''; ?>>

<?= $b['nama_balita']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Kader</label>

<select
name="id_kader"
class="form-control">

<?php while($k=mysqli_fetch_array($kader)){ ?>

<option
value="<?= $k['id_kader']; ?>"
<?= ($data['id_kader']==$k['id_kader']) ? 'selected' : ''; ?>>

<?= $k['nama_kader']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="form-control"
value="<?= $data['tanggal']; ?>">

</div>

<div class="mb-3">
<label>Berat Badan</label>

<input
type="number"
step="0.01"
name="berat_badan"
class="form-control"
value="<?= $data['berat_badan']; ?>">

</div>

<div class="mb-3">
<label>Tinggi Badan</label>

<input
type="number"
step="0.01"
name="tinggi_badan"
class="form-control"
value="<?= $data['tinggi_badan']; ?>">

</div>

<button
name="update"
class="btn btn-success">

Update

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