<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
$uid=$_SESSION['user']['id'];
$name=$_POST['product_name']??'';
$price=$_POST['price']??0;
$img=$_POST['img']??'';
$warna=$_POST['warna']??null;
$saiz=$_POST['saiz']??null;
$qty=intval($_POST['quantity']??1);
$spec=[];
if($warna)$spec[]="Warna: $warna";
if($saiz)$spec[]="Saiz: $saiz";
$spec_txt=implode(', ',$spec);

$stmt=$conn->prepare("INSERT INTO cart (user_id,product_name,price,quantity,image,specification) VALUES (?,?,?,?,?,?)");
if(!$stmt) die("SQL ERR: ".$conn->error);
$stmt->bind_param("isdiss",$uid,$name,$price,$qty,$img,$spec_txt);
$stmt->execute();
$stmt->close();

$_SESSION['added']=$name;
header("Location: cart.php");
exit();
?>
