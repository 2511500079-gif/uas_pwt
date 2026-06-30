<?php
include "../koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_array(
mysqli_query($conn,
"SELECT * FROM balita
WHERE id_balita='$id'")
);

if(isset($_POST['update'])){

$nama   = $_POST['nama_balita'];
$jk     = $_POST['jk'];
$ortu   = $_POST['nama_ortu'];
$alamat = $_POST['alamat'];

mysqli_query($conn,

"UPDATE balita SET

nama_balita='$nama',
jk='$jk',
nama_ortu='$ortu',
alamat='$alamat'

WHERE id_balita='$id'
");

header("Location:tampil.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Balita</title>

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
✏ Edit Data Balita
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Nama Balita</label>
<input
type="text"
name="nama_balita"
class="form-control"
value="<?= $data['nama_balita']; ?>">
</div>

<div class="mb-3">
<label>Jenis Kelamin</label>

<select name="jk" class="form-control">

<option <?= ($data['jk']=="Laki-Laki")?"selected":""; ?>>
Laki-Laki
</option>

<option <?= ($data['jk']=="Perempuan")?"selected":""; ?>>
Perempuan
</option>

</select>

</div>

<div class="mb-3">
<label>Nama Orang Tua</label>
<input
type="text"
name="nama_ortu"
class="form-control"
value="<?= $data['nama_ortu']; ?>">
</div>

<div class="mb-3">
<label>Alamat</label>

<textarea
name="alamat"
class="form-control"><?= $data['alamat']; ?></textarea>

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