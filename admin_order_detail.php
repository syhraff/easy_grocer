<?php
session_start();
include "db.php";
if (!isset($_GET['id'])) { echo "ID tempahan diperlukan"; exit(); }
$order_id = intval($_GET['id']);

$order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT o.*, u.fullname FROM orders o JOIN users u ON o.user_id = u.id WHERE o.id=$order_id"));
$items = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id=$order_id");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tempahan #<?php echo $order_id; ?> - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h4>🧾 Butiran Tempahan #<?php echo $order_id; ?></h4>
  <p><b>Nama:</b> <?php echo $order['fullname']; ?></p>
  <p><b>Telefon:</b> <?php echo $order['phone']; ?></p>
  <p><b>Alamat:</b> <?php echo $order['address']; ?></p>
  <p><b>Baucar:</b> <?php echo $order['voucher'] ?: '-'; ?></p>
  <p><b>Jumlah:</b> RM <?php echo number_format($order['total'], 2); ?></p>

  <h5 class="mt-4">📦 Barang Ditempah:</h5>
  <table class="table">
    <thead><tr><th>Produk</th><th>Kuantiti</th><th>Harga</th></tr></thead>
    <tbody>
      <?php while($i = mysqli_fetch_assoc($items)) { ?>
      <tr>
        <td><?php echo $i['product_name']; ?></td>
        <td><?php echo $i['quantity']; ?></td>
        <td>RM <?php echo number_format($i['price'], 2); ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

  <a href="admin_panel.php" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
