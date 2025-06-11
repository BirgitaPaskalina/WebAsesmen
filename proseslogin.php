<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Hanya cek nama dan password, tidak perlu role
    if (!empty($_POST['nama']) && !empty($_POST['password'])) {
        $nama = strtolower(trim($_POST['nama']));
        $password = $_POST['password'];

        $db = new database();
        $nama = mysqli_real_escape_string($db->koneksi, $nama);

        // Ambil user berdasarkan nama saja
        $sql = "SELECT * FROM users WHERE LOWER(nama)='$nama'";
        $result = mysqli_query($db->koneksi, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            // Cek password hash
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['foto'] = $user['foto'];
                $_SESSION['email'] = $user['email'];

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
            header("Location: index.html?error=" . urlencode("Akun tidak ditemukan."));
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