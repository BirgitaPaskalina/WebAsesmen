<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['nama']) && !empty($_POST['password']) && !empty($_POST['role'])) {
        $nama = strtolower(trim($_POST['nama']));
        $password = $_POST['password'];
        $role = strtolower(trim($_POST['role']));

        $db = new database();
        $nama = mysqli_real_escape_string($db->koneksi, $nama);
        $role = mysqli_real_escape_string($db->koneksi, $role);

        $sql = "SELECT * FROM users WHERE LOWER(nama)='$nama' AND LOWER(role)='$role'";
        $result = mysqli_query($db->koneksi, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['foto'] = $user['foto'];
                $_SESSION['email'] = $user['email']; // tambahkan ini


                switch (strtolower($user['role'])) {
                    case 'admin':
                        header("Location: dashboard.php");
                        break;
                    case 'guru':
                        header("Location: dashboardguru.php");
                        break;
                    case 'siswa':
                        header("Location: dashboardsiswa.php");
                        break;
                    default:
                        header("Location: index.html?error=" . urlencode("Peran tidak dikenali."));
                }
                exit;
            } else {
                header("Location: index.html?error=" . urlencode("Password salah!"));
                exit;
            }
        } else {
            header("Location: index.html?error=" . urlencode("Akun tidak ditemukan atau peran salah."));
            exit;
        }
    } else {
        header("Location: index.html?error=" . urlencode("Semua field harus diisi."));
        exit;
    }
} else {
    header("Location: index.html");
    exit;
}