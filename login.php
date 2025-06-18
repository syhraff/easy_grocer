<!DOCTYPE html>
<html>
<head>
  <title>Log Masuk - Bujang Grocer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #0d47a1, #00acc1);
      font-family: 'Segoe UI', sans-serif;
    }
    .login-box {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="height:100vh;">
  <div class="login-box" style="width: 400px;">
    <h4 class="text-center mb-3">🔐 Bujang Grocer Log Masuk</h4>
    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger"><?= $_GET['error'] ?></div>
    <?php endif; ?>
    <form method="post" action="login_process.php">
      <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="Kata Laluan" required>
      <button class="btn btn-primary w-100">Log Masuk</button>
      <p class="text-center mt-3 small">Belum daftar? <a href="register.php">Klik Sini</a></p>
    </form>
  </div>
</body>
</html>
