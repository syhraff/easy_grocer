<?php 
session_start();
include "db.php";
if(!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit();
}
?>
<!DOCTYPE html>
<html><head><title>Admin Panel - Easy Grocer</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>body{font-family:'Segoe UI';background:#f7f7f7;} .card-order{border:0;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.1);}</style>
</head>
<body class="p-4">
<div class="container">
  <div class="d-flex justify-content-between mb-3">
    <h3>Admin Panel – 📦 Tempahan Masuk</h3>
    <a href="logout.php" class="btn btn-danger">Log Keluar</a>
  </div>
  <?php
  $res = mysqli_query($conn, "SELECT * FROM orders ORDER BY payment_date DESC");
  while($o = mysqli_fetch_assoc($res)):
  ?>
  <div class="card mb-3 card-order p-3">
    <div class="row">
      <div class="col-md-8">
        <strong><?=$o['fullname']?></strong> – RM <?=number_format($o['total'],2)?><br>
        <small class="text-muted"><?=$o['phone']?> | <?=$o['address']?></small><br>
        <em>Baucar: <?=($o['voucher']?:'Tiada')?></em>
      </div>
      <div class="col-md-4 text-end">
        <small><?=$o['payment_date']?></small>
      </div>
    </div>
  </div>
  <?php endwhile;?>
  <?php if(mysqli_num_rows($res)==0): ?>
    <div class="alert alert-info">Tiada tempahan buat masa ini.</div>
  <?php endif; ?>
</div>
</body></html>


