<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) header("Location: login.php");

$id = $_SESSION['user']['id'];

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
  $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
  $newName = 'user_' . $id . '_' . time() . '.' . strtolower($ext);
  $path = 'uploads/' . $newName;

  if (move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
    mysqli_query($conn, "UPDATE users SET profile_img='$newName' WHERE id=$id");

    // Dapatkan latest user data dari DB
    $res = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $_SESSION['user'] = mysqli_fetch_assoc($res);
  }
}
header("Location: profile.php");
