<?php
include "../koneksi.php";

$id=$_GET['id'];

$data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM kader WHERE id_kader='$id'"));

if(isset($_POST['update'])){

$nama=$_POST['nama_kader'];
$hp=$_POST['no_hp'];

mysqli_query($conn,"UPDATE kader SET nama_kader='$nama',no_hp='$hp' WHERE id_kader='$id'");

header("Location:tampil.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Kader</title>

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
✏ Edit Kader
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Nama Kader</label>
<input type="text"
name="nama_kader"
class="form-control"
value="<?= $data['nama_kader']; ?>">
</div>

<div class="mb-3">
<label>No HP</label>
<input type="text"
name="no_hp"
class="form-control"
value="<?= $data['no_hp']; ?>">
</div>

<button name="update" class="btn btn-success">
Update
</button>

<a href="tampil.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</body>
</html>