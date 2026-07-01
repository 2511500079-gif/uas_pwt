<?php
include "../koneksi.php";

$id=$_GET['id'];

$data=mysqli_fetch_array(
mysqli_query($conn,
"SELECT * FROM imunisasi
WHERE id_imunisasi='$id'")
);

if(isset($_POST['update'])){

$nama=$_POST['nama_imunisasi'];
$ket=$_POST['keterangan'];

mysqli_query($conn,

"UPDATE imunisasi SET

nama_imunisasi='$nama',
keterangan='$ket'

WHERE id_imunisasi='$id'");

header("Location:tampil.php");
}
?>