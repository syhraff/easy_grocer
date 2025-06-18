<?php session_start(); include "db.php";
$email=$_POST['email']; $p=$_POST['password'];
if($email=='admin@gmail.com' && $p=='admin123'){
  $_SESSION['admin']=true;
  header("Location: admin_panel.php");
} else header("Location: admin_login.php?error=Maklumat salah");
