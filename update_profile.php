<?php
session_start();
include "koneksi.php";
$dp = new database();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit;
}

$userId = $_SESSION['user_id'];
$dp = new database();

$updateFields = [];

// Ganti password jika diisi
if (!empty($_POST['password'])) {
    $passwordBaru = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $updateFields[] = "password = '$passwordBaru'";
}

// Ganti foto jika diupload
if (!empty($_FILES['foto']['name'])) {
    $fotoName = uniqid() . '_' . basename($_FILES['foto']['name']);
    $targetPath = "uploads/" . $fotoName;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetPath)) {
        $updateFields[] = "foto = '$fotoName'";
        $_SESSION['foto'] = $fotoName; // Simpan ke session
    }
}

// Lakukan update jika ada data yang diubah
if (!empty($updateFields)) {
    $query = "UPDATE users SET " . implode(", ", $updateFields) . " WHERE id = '$userId'";
    mysqli_query($dp->koneksi, $query);
}

header("Location: dashboard.php");
exit;
