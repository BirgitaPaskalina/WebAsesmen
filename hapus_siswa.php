<?php
// Cek apakah parameter NISN tersedia dan tidak kosong
if (isset($_GET['nisn']) && !empty($_GET['nisn'])) {
    $nisn = $_GET['nisn'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'sekolah');

    if ($conn->connect_error) {
        die('Koneksi gagal: ' . $conn->connect_error);
    }

    // Jalankan query DELETE dengan prepared statement
    $stmt = $conn->prepare("DELETE FROM siswa WHERE nisn = ?");
    if ($stmt) {
        $stmt->bind_param("s", $nisn);

        if ($stmt->execute()) {
            // Jika data terhapus, redirect
            if ($stmt->affected_rows > 0) {
                header("Location: datasiswa.php");
                exit();
            } else {
                echo "Data dengan NISN tersebut tidak ditemukan.";
            }
        } else {
            echo "Gagal menghapus data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Query tidak valid: " . $conn->error;
    }
    $conn->close();
} else {
    echo "NISN tidak ditemukan.";
}
?>