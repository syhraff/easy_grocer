<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
$id=intval($_GET['id']??0);
$uid=$_SESSION['user']['id'];
if($id>0){
  mysqli_query($conn,"DELETE FROM cart WHERE id=$id AND user_id=$uid");
}
header("Location: cart.php");
exit();
?>
