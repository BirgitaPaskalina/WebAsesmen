<?php
include 'koneksi.php';
$db = new database(); // Membuat objek

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role     = $_POST['role'];

// Gunakan koneksi dari objek $db
$cek = mysqli_query($db->koneksi, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "Email sudah terdaftar. Silakan gunakan email lain.";
} else {
    $sql = "INSERT INTO users (nama, email, password, role) 
            VALUES ('$nama', '$email', '$password', '$role')";

    if (mysqli_query($db->koneksi, $sql)) {
        // Redirect ke halaman login jika berhasil
        header("Location: index.html");
        exit(); // Penting untuk menghentikan eksekusi setelah redirect
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db->koneksi);
    }
}
?>
