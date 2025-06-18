<!DOCTYPE html><html><head><title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>body{background:#eee;font-family:'Segoe UI'} .box{max-width:336px;margin:80px auto;padding:20px;background:white;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,0.1)}</style>
</head><body><div class="box text-center">
<h4>🔐 Admin Login</h4>
<?php if(isset($_GET['error'])) echo "<div class='alert alert-danger'>".$_GET['error']."</div>";?>
<form method="post" action="admin_login_process.php">
<input type="email" name="email" placeholder="Admin Email" class="form-control mb-2" required>
<input type="password" name="password" placeholder="Password" class="form-control mb-3" required>
<button class="btn btn-primary w-100">Log Masuk</button>
</form></div></body></html>
