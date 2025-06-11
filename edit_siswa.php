<?php
include_once "koneksi.php";
$db = new database();
session_start();

if (!isset($_SESSION['user_id']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'guru')) {
    header("Location: index.html");
    exit;
}

$pesan = "";

// Ambil data siswa berdasarkan NISN
if (!isset($_GET['nisn'])) {
    echo "NISN tidak ditemukan.";
    exit();
}
$nisn = $_GET['nisn'];
$siswa = $db->get_siswa_by_nisn($nisn); // Pastikan fungsi ini ada di class database

if (!$siswa) {
    echo "Data siswa tidak ditemukan.";
    exit();
}

// Proses update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $jeniskelamin = $_POST['jeniskelamin'];
    $kodejurusan = $_POST['kodejurusan'];
    $kelas = $_POST['kelas'];
    $alamat = trim($_POST['alamat']);
    $agama = $_POST['agama'];
    $nohp = trim($_POST['nohp']);

    $result = $db->update_siswa(
        $nisn, $nama, $jeniskelamin, $kodejurusan, $kelas, $alamat, $agama, $nohp
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <style>
        .form-container {
            max-width: 540px;
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
            <h3 class="mb-3 text-primary"><i class="bi bi-pencil"></i> Edit Data Siswa</h3>
            <?= $pesan ?>
            <form method="post" autocomplete="off" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" id="nisn" name="nisn" class="form-control" value="<?= htmlspecialchars($siswa['nisn']) ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= htmlspecialchars($siswa['nama']) ?>" required>
                    <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                </div>
                <div class="mb-3">
                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
<select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
    <option value="" disabled <?= empty($siswa['jenis_kelamin']) ? 'selected' : '' ?>>Pilih Jenis Kelamin</option>
    <option value="L" <?= $siswa['jenis_kelamin']=='L'?'selected':''; ?>>Laki-laki</option>
    <option value="P" <?= $siswa['jenis_kelamin']=='P'?'selected':''; ?>>Perempuan</option>
</select>
                    <div class="invalid-feedback">Pilih salah satu</div>
                </div>
                <div class="mb-3">
                    <label for="kodejurusan" class="form-label">Jurusan</label>
                    <select class="form-select" id="kodejurusan" name="kodejurusan" required>
                        <option selected disabled value="">Pilih Jurusan</option>
                        <?php
                        foreach($db->tampil_data_jurusan() as $jurusan){
                            $selected = ($jurusan['kode_jurusan'] == $siswa['kodejurusan']) ? 'selected' : '';
                            echo "<option value='".$jurusan['kode_jurusan']."' $selected>".$jurusan['nama_jurusan']."</option>";
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-select" id="kelas" name="kelas" required>
                        <option value="X" <?= $siswa['kelas']=='X'?'selected':''; ?>>X</option>
                        <option value="XI" <?= $siswa['kelas']=='XI'?'selected':''; ?>>XI</option>
                        <option value="XII" <?= $siswa['kelas']=='XII'?'selected':''; ?>>XII</option>
                    </select>
                    <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="<?= htmlspecialchars($siswa['alamat']) ?>" required>
                    <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <select class="form-select" id="agama" name="agama" required>
                        <option selected disabled value="">Pilih Agama</option>
                        <?php
                        foreach($db->tampil_data_agama() as $agama){
                            $selected = ($agama['idagama'] == $siswa['agama']) ? 'selected' : '';
                            echo "<option value='".$agama['idagama']."' $selected>".$agama['nama_agama']."</option>";
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" id="nohp" name="nohp" class="form-control" value="<?= htmlspecialchars($siswa['nohp']) ?>" required maxlength="13" minlength="10"/>
                    <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
                <div class="mt-3 text-center">
                    <a href="datasiswa.php" class="btn btn-link">Kembali ke Data Siswa</a>
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