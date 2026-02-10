<?php
include "../config/koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

mysqli_query($conn,"INSERT INTO users VALUES(NULL,'$nama','$username','$password','$role')");

header("Location: ../index.php");
?>
