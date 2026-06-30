<?php
include "../koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM orang_tua WHERE id_ortu='$id'"));

if(isset($_POST['update'])){

$nama   = $_POST['nama_ortu'];
$jk     = $_POST['jenis_kelamin'];
$hp     = $_POST['no_hp'];
$alamat = $_POST['alamat'];

mysqli_query($conn,"UPDATE orang_tua SET nama_ortu='$nama', jenis_kelamin='$jk', no_hp='$hp', alamat='$alamat' WHERE id_ortu='$id'");

header("Location:tampil.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Orang Tua</title>

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
✏ Edit Data Orang Tua
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Nama Orang Tua</label>

<input
type="text"
name="nama_ortu"
class="form-control"
value="<?= $data['nama_ortu']; ?>">
</div>

<div class="mb-3">

<label>Jenis Kelamin</label>

<select name="jenis_kelamin" class="form-control">

<option
<?= ($data['jenis_kelamin']=="Laki-Laki")?"selected":""; ?>>
Laki-Laki
</option>

<option
<?= ($data['jenis_kelamin']=="Perempuan")?"selected":""; ?>>
Perempuan
</option>

</select>

</div>

<div class="mb-3">
<label>No HP</label>

<input
type="text"
name="no_hp"
class="form-control"
value="<?= $data['no_hp']; ?>">

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

<a href="tampil.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</body>
</html>