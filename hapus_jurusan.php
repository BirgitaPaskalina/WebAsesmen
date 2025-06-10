<?php
// Cek apakah parameter NISN tersedia dan tidak kosong
if (isset($_GET['kode_jurusan']) && !empty($_GET['kode_jurusan'])) {
    $nisn = $_GET['kode_jurusan'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'sekolah');

    if ($conn->connect_error) {
        die('Koneksi gagal: ' . $conn->connect_error);
    }

    // Jalankan query DELETE dengan prepared statement
    $stmt = $conn->prepare("DELETE FROM jurusan WHERE kode_jurusan = ?");
    if ($stmt) {
        $stmt->bind_param("s", $nisn);

        if ($stmt->execute()) {
            // Jika data terhapus, redirect
            if ($stmt->affected_rows > 0) {
                header("Location: datajurusan.php");
                exit();
            } else {
                echo "Data dengan kode tersebut tidak ditemukan.";
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
    echo "Kode Jurusan tidak ditemukan.";
}
?>