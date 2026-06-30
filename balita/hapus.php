<?php

include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM pemeriksaan
WHERE id_balita='$id'");

mysqli_query($conn,
"DELETE FROM balita
WHERE id_balita='$id'");

header("Location:tampil.php");
exit();

?>