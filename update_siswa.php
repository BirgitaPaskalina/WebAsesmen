<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'sekolah');

if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

// Cek apakah data dikirim lewat POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kode_jurusan = $_POST['kode_jurusan'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $nohp = $_POST['nohp'];

    // Gunakan prepared statement untuk update data
    $stmt = $conn->prepare("UPDATE siswa SET nama = ?, jenis_kelamin = ?, kode_jurusan = ?, kelas = ?, alamat = ?, agama = ?, nohp = ? WHERE nisn = ?");
    $stmt->bind_param("ssssssss", $nama, $jenis_kelamin, $kode_jurusan, $kelas, $alamat, $agama, $nohp, $nisn);

    if ($stmt->execute()) {
        // Redirect ke halaman datasiswa.php setelah berhasil update
        header('Location: datasiswa.php');
        exit();
    } else {
        echo "Error saat memperbarui data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Permintaan tidak valid.";
}

$conn->close();
?>