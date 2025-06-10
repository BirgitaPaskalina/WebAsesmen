<?php
// filepath: d:\laragon\www\sekolah\edit_agama.php

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

// Ambil data agama berdasarkan idagama
if (!isset($_GET['idagama'])) {
    echo "ID Agama tidak ditemukan.";
    exit();
}

$idagama = $_GET['idagama'];

// Ambil data agama
$stmt = $conn->prepare("SELECT * FROM agama WHERE idagama = ?");
$stmt->bind_param("s", $idagama);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $nama_agama = $data['nama_agama'];
} else {
    echo "Data agama tidak ditemukan.";
    exit();
}
$stmt->close();

// Proses update jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idagama = $_POST['idagama'];
    $nama_agama = $_POST['nama_agama'];

    $stmt = $conn->prepare("UPDATE agama SET nama_agama = ? WHERE idagama = ?");
    $stmt->bind_param("ss", $nama_agama, $idagama);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Data agama berhasil diperbarui.";
        header("Location: dataagama.php");
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
    <title>Edit Data Agama</title>
    <link rel="stylesheet" href="tambahjurusan.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Agama</h2>
        <form action="" method="post">
            <label for="idagama">Kode Agama:</label>
            <input type="text" id="idagama" name="idagama" value="<?= htmlspecialchars($idagama) ?>" readonly>

            <label for="nama_agama">Nama Agama:</label>
            <input type="text" id="nama_agama" name="nama_agama" value="<?= htmlspecialchars($nama_agama) ?>" required>

            <input type="submit" value="Update Data">
        </form>
    </div>
</body>
</html>