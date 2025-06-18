<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) header("Location: login.php");

$id = $_SESSION['user']['id'];
$fullname = mysqli_real_escape_string($conn, $_POST['fullname'] ?? '');
$dob = $_POST['dob'] ?? null;
$gender = $_POST['gender'] ?? '';
$phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
$address = mysqli_real_escape_string($conn, $_POST['address'] ?? '');

mysqli_query($conn, "UPDATE users SET 
  fullname='$fullname', 
  dob='$dob', 
  gender='$gender', 
  phone='$phone', 
  address='$address' 
  WHERE id=$id");

$_SESSION['user']['fullname'] = $fullname;
$_SESSION['user']['dob'] = $dob;
$_SESSION['user']['gender'] = $gender;
$_SESSION['user']['phone'] = $phone;
$_SESSION['user']['address'] = $address;

header("Location: profile.php");
