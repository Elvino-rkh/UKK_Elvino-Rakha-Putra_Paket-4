<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login Perpustakaan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/style.css">
</head>

<body>
<div class="center">
  <div class="card">
    <h2>📚 Login Perpustakaan</h2>

    <form action="auth/proses_login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>

    <a href="register.php">Belum punya akun? Register</a>
  </div>
</div>
</body>
</html>
