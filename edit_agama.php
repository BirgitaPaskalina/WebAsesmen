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
        $pesan = '<div class="alert alert-success">Data agama berhasil diperbarui.</div>';
        // Refresh data
        $nama_agama = htmlspecialchars($nama_agama);
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
    <title>Edit Data Agama</title>
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
            <h3 class="mb-3 text-primary"><i class="bi bi-pencil"></i> Edit Data Agama</h3>
            <?= $pesan ?>
            <form method="post" autocomplete="off" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="idagama" class="form-label">Kode Agama</label>
                    <input type="text" id="idagama" name="idagama" class="form-control" value="<?= htmlspecialchars($idagama) ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_agama" class="form-label">Nama Agama</label>
                    <input type="text" id="nama_agama" name="nama_agama" class="form-control" value="<?= htmlspecialchars($nama_agama) ?>" required>
                    <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
                <div class="mt-3 text-center">
                    <a href="dataagama.php" class="btn btn-link">Kembali ke Data Agama</a>
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