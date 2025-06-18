<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) header("Location: login.php");
$id=intval($_GET['id']);
$res=mysqli_query($conn,"SELECT * FROM orders WHERE id=$id AND user_id={$_SESSION['user']['id']}");
if(mysqli_num_rows($res)!=1) die("Order tidak dijumpai");
$o=mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html><head><title>Success</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="p-4 bg-light"><div class="container"><div class="alert alert-success">✅ Pembayaran berjaya! Tempahan ID: <?=$o['id']?></div>
  <ul class="list-group mb-3">
    <li class="list-group-item"><b>Nama:</b> <?=$o['fullname']?></li>
    <li class="list-group-item"><b>Telefon:</b> <?=$o['phone']?></li>
    <li class="list-group-item"><b>Alamat:</b> <?=$o['address']?></li>
    <li class="list-group-item"><b>Baucar:</b> <?= $o['voucher']?:'Tiada'?></li>
    <li class="list-group-item"><b>Jumlah Bayar:</b> RM <?=number_format($o['total'],2)?></li>
    <li class="list-group-item"><b>Tarikh:</b> <?=$o['payment_date']?></li>
  </ul>
  <a href="home.php" class="btn btn-primary">Kembali ke Home</a>
</div></body></html>
