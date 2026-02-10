<?php
include "../config/koneksi.php";
mysqli_query($conn,"DELETE FROM users WHERE id=$_GET[id]");
header("Location: anggota.php");
