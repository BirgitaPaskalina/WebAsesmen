<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.html");
    exit;
}

$db = new database();
$pesan = "";

// Proses submit form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];
    $foto = "";

    // Upload foto jika ada
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "uploads/";
        $foto = uniqid() . "_" . basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $foto;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    }

    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    $sql = "INSERT INTO users (nama, email, password, role, foto) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($db->koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nama, $email, $password_hash, $role, $foto);
    if (mysqli_stmt_execute($stmt)) {
        $pesan = '<div class="alert alert-success">User berhasil ditambahkan!</div>';
    } else {
        $pesan = '<div class="alert alert-danger">Gagal menambah user.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <style>
        .form-container {
            max-width: 480px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            padding: 32px 28px;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body class="bg-body-tertiary">
    <div class="container">
        <div class="form-container">
            <h3 class="mb-3 text-primary"><i class="bi bi-person-plus"></i> Tambah User</h3>
            <?= $pesan ?>
            <form method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required minlength="4">
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="guru">Guru</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                </div>
                <div class="mt-3 text-center">
                    <a href="user.php" class="btn btn-link">Kembali ke Data User</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>