<?php

include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,

"DELETE FROM pemeriksaan
WHERE id_periksa='$id'");

header("Location:tampil.php");

?>