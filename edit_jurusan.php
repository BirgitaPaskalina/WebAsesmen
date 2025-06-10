<?php
// filepath: d:\laragon\www\sekolah\edit_jurusan.php

session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sekolah";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data jurusan berdasarkan kode_jurusan
if (!isset($_GET['kode_jurusan'])) {
    echo "Kode Jurusan tidak ditemukan.";
    exit();
}

$kode_jurusan = $_GET['kode_jurusan'];

// Ambil data jurusan
$stmt = $conn->prepare("SELECT * FROM jurusan WHERE kode_jurusan = ?");
$stmt->bind_param("s", $kode_jurusan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $nama_jurusan = $data['nama_jurusan'];
} else {
    echo "Data jurusan tidak ditemukan.";
    exit();
}
$stmt->close();

// Proses update jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];

    $stmt = $conn->prepare("UPDATE jurusan SET nama_jurusan = ? WHERE kode_jurusan = ?");
    $stmt->bind_param("ss", $nama_jurusan, $kode_jurusan);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Data jurusan berhasil diperbarui.";
        header("Location: datajurusan.php");
        exit();
    } else {
        echo "Gagal memperbarui data: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Jurusan</title>
    <link rel="stylesheet" href="tambahjurusan.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Jurusan</h2>
        <form action="" method="post">
            <label for="kode_jurusan">Kode Jurusan:</label>
            <input type="text" id="kode_jurusan" name="kode_jurusan" value="<?= htmlspecialchars($kode_jurusan) ?>" readonly>

            <label for="nama_jurusan">Nama Jurusan:</label>
            <input type="text" id="nama_jurusan" name="nama_jurusan" value="<?= htmlspecialchars($nama_jurusan) ?>" required>

            <input type="submit" value="Update Data">
        </form>
    </div>
</body>
</html>