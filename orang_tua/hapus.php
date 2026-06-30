<?php

include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,

"DELETE FROM orang_tua
WHERE id_ortu='$id'");

header("Location:tampil.php");

?>