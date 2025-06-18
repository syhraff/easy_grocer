<?php
session_start();
include "db.php";

$orders = mysqli_query($conn, "SELECT o.*, u.fullname FROM orders o JOIN users u ON o.user_id = u.id ORDER BY o.payment_date DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - Easy Grocer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f9f9f9; font-family: 'Segoe UI', sans-serif; }
    .container { padding-top: 30px; }
    .table th { background: #0d6efd; color: white; }
  </style>
</head>
<body>
<div class="container">
  <h3 class="mb-4">📊 Senarai Tempahan (Admin)</h3>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Pelanggan</th>
        <th>No Telefon</th>
        <th>Alamat</th>
        <th>Total</th>
        <th>Baucar</th>
        <th>Tarikh</th>
      </tr>
    </thead>
    <tbody>
      <?php while($o = mysqli_fetch_assoc($orders)) { ?>
      <tr>
        <td>#<?php echo $o['id']; ?></td>
        <td><?php echo $o['fullname']; ?></td>
        <td><?php echo $o['phone']; ?></td>
        <td><?php echo $o['address']; ?></td>
        <td>RM <?php echo number_format($o['total'], 2); ?></td>
        <td><?php echo $o['voucher'] ?: '-'; ?></td>
        <td><?php echo $o['payment_date']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
