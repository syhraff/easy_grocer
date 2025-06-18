<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}
$cat = $_GET['cat'];
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $cat; ?> - Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h3><?php echo $cat; ?> - Produk Berkaitan</h3>
    <div class="row">
      <?php
     $all = [
  ["img"=>"milo.png","name"=>"Milo 3in1","price"=>"10.00","cat"=>"Minuman"],
  ["img"=>"maggi.jpg","name"=>"Maggi Kari","price"=>"4.50","cat"=>"Makanan"],
  ["img"=>"biskut.jpg","name"=>"Biskut Marie","price"=>"3.20","cat"=>"Makanan"],
  ["img"=>"roti.jpg","name"=>"Roti Gardenia","price"=>"2.00","cat"=>"Makanan"],
  ["img"=>"nescafe.jpg","name"=>"Nescafe","price"=>"6.90","cat"=>"Minuman"],
  ["img"=>"telur.jpg","name"=>"Telur","price"=>"6.90","cat"=>"Makanan"]
      ];
      foreach ($all as $p) {
        if ($p["cat"] == $cat) {
          echo '
          <div class="col-md-3 product-card m-2">
            <a href="product.php?name='.urlencode($p["name"]).'&price='.$p["price"].'&img='.$p["img"].'" class="text-decoration-none text-dark">
              <img src="assets/img/'.$p["img"].'" width="100%">
              <h6>'.$p["name"].'</h6>
              <p>RM '.$p["price"].'</p>
            </a>
          </div>';
        }
      }
      ?>
    </div>
    <a href="home.php" class="btn btn-outline-secondary mt-3">← Kembali ke Laman Utama</a>
  </div>
</body>
</html>
