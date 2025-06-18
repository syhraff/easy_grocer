<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - EasyGrocer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #0d47a1, #00acc1);
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-box {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 380px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h4 class="text-center mb-3">🔐 Log Masuk Admin</h4>
    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger"><?= $_GET['error'] ?></div>
    <?php endif; ?>
    <form method="post" action="admin_login_process.php">
      <input type="email" name="email" class="form-control mb-2" placeholder="Admin Email" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="Kata Laluan" required>
      <button class="btn btn-primary w-100">Masuk</button>
    </form>
  </div>
</body>
</html>
