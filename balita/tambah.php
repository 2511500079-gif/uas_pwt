<?php
include "../koneksi.php";

if(isset($_POST['simpan'])){

$id         = $_POST['id_balita'];
$nama       = $_POST['nama_balita'];
$jk         = $_POST['jk'];
$ortu       = $_POST['nama_ortu'];
$alamat     = $_POST['alamat'];

mysqli_query($conn,

"INSERT INTO balita VALUES(
'$id',
'$nama',
'$jk',
'$ortu',
'$alamat'
)");

header("Location:tampil.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Balita</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f3f0ff;
}

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
👶 Tambah Data Balita
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>ID Balita</label>
<input type="text" name="id_balita" class="form-control" required>
</div>

<div class="mb-3">
<label>Nama Balita</label>
<input type="text" name="nama_balita" class="form-control" required>
</div>

<div class="mb-3">
<label>Jenis Kelamin</label>
<select name="jk" class="form-control">
<option>Laki-Laki</option>
<option>Perempuan</option>
</select>
</div>

<div class="mb-3">
<label>Nama Orang Tua</label>
<input type="text" name="nama_ortu" class="form-control" required>
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat" class="form-control"></textarea>
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