<?php

include "../koneksi.php";

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM imunisasi WHERE id_imunisasi='$id'");

header("Location:tampil.php");

?>