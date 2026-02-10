<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<div class="container">
    <div class="dashboard-card">
        <h2>⚙️ Dashboard Admin</h2>

        <div class="nav">
            <a href="buku.php">📚 Kelola Buku</a>
            <a href="anggota.php">👥 Kelola Anggota</a>
            <a href="transaksi.php">📊 Transaksi</a>
            <a href="../auth/logout.php">🚪 Logout</a>
        </div>
    </div>
</div>

</body>
</html>
