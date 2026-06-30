<?php
include "../koneksi.php";


if(isset($_POST['simpan'])){

$id   = $_POST['id_kader'];
$nama = $_POST['nama_kader'];
$hp   = $_POST['no_hp'];

mysqli_query($conn,

"INSERT INTO kader VALUES(
'$id',
'$nama',
'$hp'
)");

header("Location:tampil.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Kader</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{background:#f3f0ff;}
.card{
max-width:700px;
margin:auto;
margin-top:40px;
border:none;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.1);
}
.card-header{
background:#7c3aed;
color:white;
font-size:22px;
font-weight:bold;
}
</style>

</head>
<body>

<div class="card">

<div class="card-header">
👩‍⚕️ Tambah Kader
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>ID Kader</label>
<input type="text" name="id_kader" class="form-control">
</div>

<div class="mb-3">
<label>Nama Kader</label>
<input type="text" name="nama_kader" class="form-control">
</div>

<div class="mb-3">
<label>No HP</label>
<input type="text" name="no_hp" class="form-control">
</div>

<button name="simpan" class="btn btn-success">
Simpan
</button>

<a href="tampil.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</body>
</html>