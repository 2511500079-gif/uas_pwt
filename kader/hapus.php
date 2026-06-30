<?php

include "../koneksi.php";

$id=$_GET['id'];

mysqli_query($conn,
"DELETE FROM kader
WHERE id_kader='$id'");

header("Location:tampil.php");

?>