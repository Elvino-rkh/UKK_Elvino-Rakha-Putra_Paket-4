<?php
session_start();
if ($_SESSION['role'] != 'anggota') {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Anggota</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="container">
    <div class="dashboard-card">
        <h2>📖 Dashboard Anggota</h2>

        <div class="nav">
            <a href="pinjam.php">📚 Pinjam Buku</a>
            <a href="kembali.php">🔄 Pengembalian</a>
            <a href="../auth/logout.php">🚪 Logout</a>
        </div>
    </div>
</div>

</body>
</html>
