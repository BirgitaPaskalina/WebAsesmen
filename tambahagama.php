<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Agama</title>
    <link rel="stylesheet" href="tambahjurusan.css">
</head>
<body>
    <div class="container">
        <h2>Form Tambah Agama</h2>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <form action="" method="post">
            <label for="idagama">Kode Agama:</label>
            <input type="text" id="idagama" name="idagama" required>

            <label for="nama_agama">Nama Agama:</label>
            <input type="text" id="nama_agama" name="nama_agama" required>

            <input type="submit" name="simpan" value="Tambah Agama">
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idagama = $_POST['idagama'];
    $nama_agama = $_POST['nama_agama'];

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
    $stmt = $conn->prepare("INSERT INTO agama (idagama, nama_agama) VALUES (?, ?)");
    $stmt->bind_param("ss", $idagama, $nama_agama);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: dataagama.php");
    exit();
}
?>