<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jurusan</title>
    <link rel="stylesheet" href="tambahjurusan.css">
</head>
<body>
    <div class="container">
        <h2>Form Tambah Jurusan</h2>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <form action="" method="post">
            <label for="kode_jurusan">Kode Jurusan:</label>
            <input type="text" id="kode_jurusan" name="kode_jurusan" required>

            <label for="nama_jurusan">Nama Jurusan:</label>
            <input type="text" id="nama_jurusan" name="nama_jurusan" required>

            <input type="submit" name="simpan" value="Tambah Jurusan">
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sekolah";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO jurusan (kode_jurusan, nama_jurusan) VALUES (?, ?)");
    $stmt->bind_param("ss", $kode_jurusan, $nama_jurusan);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Jurusan berhasil ditambahkan";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: datajurusan.php");
    exit();
}
?>