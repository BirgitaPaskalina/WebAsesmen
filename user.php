<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.html");
    exit;
}

$db = new database();

// Hapus user
if (isset($_GET['hapus']) && is_numeric($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    mysqli_query($db->koneksi, "DELETE FROM users WHERE id=$id");
    header("Location: user.php");
    exit;
}

// Ambil data user
$users = mysqli_query($db->koneksi, "SELECT * FROM users ORDER BY id ASC");
?>
<!doctype html>
<html lang="en">
<head>
    
    <meta charset="utf-8"/>
    <title>Manajemen User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
</head>
<body class="bg-body-tertiary"
    class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="container py-4">
    <h3 class="mb-4">Manajemen Akun User</h3>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password (hash)</th>
                    <th>Role</th>
                    <th>Foto Profil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($u = mysqli_fetch_assoc($users)): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['nama']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td style="font-size:0.9em;word-break:break-all;"><?= htmlspecialchars($u['password']) ?></td>
                    <td><?= htmlspecialchars($u['role']) ?></td>
                    <td>
                        <?php if (!empty($u['foto'])): ?>
                            <img src="uploads/<?= htmlspecialchars($u['foto']) ?>" alt="Foto" style="width:38px;height:38px;border-radius:50%;">
                        <?php else: ?>
                            <span class="text-muted">-</span>
                        <?php endif; ?>
                    </td>
                    <td>
    <a href="edit_user.php?id=<?= $u['id'] ?>" class="btn btn-sm btn-warning">
        <i class="bi bi-pencil"></i> Edit
    </a>
    <a href="user.php?hapus=<?= $u['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus user ini?')">
        <i class="bi bi-trash"></i> Hapus
    </a>
</td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <a href="tambahuser.php" class="btn btn-primary mt-3"><i class="bi bi-person-plus"></i> Tambah User</a>
</div>
</body>
</html>