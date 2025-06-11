<?php
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

$pesan = "";

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
        $pesan = '<div class="alert alert-success">Data jurusan berhasil diperbarui.</div>';
    } else {
        $pesan = '<div class="alert alert-danger">Gagal memperbarui data: ' . htmlspecialchars($stmt->error) . '</div>';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <style>
        .form-container {
            max-width: 480px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            padding: 32px 28px;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body class="bg-body-tertiary">
    <div class="container">
        <div class="form-container">
            <h3 class="mb-3 text-primary"><i class="bi bi-pencil"></i> Edit Data Jurusan</h3>
            <?= $pesan ?>
            <form method="post" autocomplete="off" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                    <input type="text" id="kode_jurusan" name="kode_jurusan" class="form-control" value="<?= htmlspecialchars($kode_jurusan) ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                    <input type="text" id="nama_jurusan" name="nama_jurusan" class="form-control" value="<?= htmlspecialchars($nama_jurusan) ?>" required>
                    <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
                <div class="mt-3 text-center">
                    <a href="datajurusan.php" class="btn btn-link">Kembali ke Data Jurusan</a>
                </div>
            </form>
        </div>
    </div>
    <script>
      (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach((form) => {
          form.addEventListener(
            'submit',
            (event) => {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            },
            false,
          );
        });
      })();
    </script>
</body>
</html>