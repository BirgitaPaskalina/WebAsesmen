<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.html");
    exit;
}

$db = new database();
$pesan = "";

// Ambil data user berdasarkan ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: user.php");
    exit;
}
$id = intval($_GET['id']);
$user = mysqli_fetch_assoc(mysqli_query($db->koneksi, "SELECT * FROM users WHERE id=$id"));
if (!$user) {
    header("Location: user.php");
    exit;
}

// Proses update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];
    $foto = $user['foto'];

    // Jika password diisi, update password
    $update_password = "";
    if (!empty($_POST['password'])) {
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $update_password = ", password='$password_hash'";
    }

    // Upload foto jika ada
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "uploads/";
        $foto = uniqid() . "_" . basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $foto;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    }

    $sql = "UPDATE users SET nama=?, email=?, role=?, foto=? $update_password WHERE id=?";
    $stmt = mysqli_prepare($db->koneksi, $sql);
    if ($update_password) {
        mysqli_stmt_bind_param($stmt, "ssssi", $nama, $email, $role, $foto, $id);
    } else {
        // Jika password tidak diubah, hapus bagian password dari query
        $sql = "UPDATE users SET nama=?, email=?, role=?, foto=? WHERE id=?";
        $stmt = mysqli_prepare($db->koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $nama, $email, $role, $foto, $id);
    }
    if (mysqli_stmt_execute($stmt)) {
        $pesan = '<div class="alert alert-success">User berhasil diupdate!</div>';
        // Refresh data user
        $user = mysqli_fetch_assoc(mysqli_query($db->koneksi, "SELECT * FROM users WHERE id=$id"));
    } else {
        $pesan = '<div class="alert alert-danger">Gagal update user.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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
        .img-preview {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
            border: 1.5px solid #dee2e6;
            margin-bottom: 8px;
        }
    </style>
</head>
<body class="bg-body-tertiary">
    <div class="container">
        <div class="form-container">
            <h3 class="mb-3 text-primary"><i class="bi bi-pencil"></i> Edit User</h3>
            <?= $pesan ?>
            <form method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="mb-3 text-center">
                    <?php if (!empty($user['foto'])): ?>
                        <img src="uploads/<?= htmlspecialchars($user['foto']) ?>" class="img-preview" alt="Foto Profil">
                    <?php else: ?>
                        <img src="uploads/default.png" class="img-preview" alt="Foto Profil">
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required value="<?= htmlspecialchars($user['nama']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="<?= htmlspecialchars($user['email']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small></label>
                    <input type="password" name="password" class="form-control" minlength="4">
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin" <?= $user['role']=='admin'?'selected':''; ?>>Admin</option>
                        <option value="guru" <?= $user['role']=='guru'?'selected':''; ?>>Guru</option>
                        <option value="siswa" <?= $user['role']=='siswa'?'selected':''; ?>>Siswa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
                <div class="mt-3 text-center">
                    <a href="user.php" class="btn btn-link">Kembali ke Data User</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>