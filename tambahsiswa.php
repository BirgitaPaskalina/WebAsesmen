<?php
include_once "koneksi.php";
$db = new database();
session_start();

if (!isset($_SESSION['user_id']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'guru')) {
  header("Location: index.html");
  exit;
}

$pesan = "";

// Proses submit form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nisn = trim($_POST['nisn']);
  $nama = trim($_POST['nama']);
  $jeniskelamin = $_POST['jeniskelamin'];
  $kodejurusan = $_POST['kodejurusan'];
  $kelas = $_POST['kelas'];
  $alamat = trim($_POST['alamat']);
  $agama = $_POST['agama'];
  $nohp = trim($_POST['nohp']);

  // Simpan ke database tanpa foto
  $result = $db->tambah_siswa(
    $nisn, $nama, $jeniskelamin, $kodejurusan, $kelas, $alamat, $agama, $nohp
  );

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Form Tambah Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous"/>
    <!-- OverlayScrollbars & AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
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
        <h3 class="mb-3 text-primary"><i class="bi bi-person-plus"></i> Tambah Siswa</h3>
        <?= $pesan ?>
        <form method="post" autocomplete="off" class="needs-validation" novalidate>
          <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="number" class="form-control" id="nisn" name="nisn" required />
            <div class="invalid-feedback">Kolom tidak boleh kosong</div>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required />
            <div class="invalid-feedback">Kolom tidak boleh kosong</div>
          </div>
          <div class="mb-3">
            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
              <option selected disabled value="">Pilih</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
            <div class="invalid-feedback">Pilih salah satu</div>
          </div>
          <div class="mb-3">
            <label for="kodejurusan" class="form-label">Jurusan</label>
            <select class="form-select" id="kodejurusan" name="kodejurusan" required>
              <option selected disabled value="">Pilih Jurusan</option>
              <?php
                foreach($db->tampil_data_jurusan() as $jurusan){
                  echo "<option value='".$jurusan['kode_jurusan']."'>".$jurusan['nama_jurusan']."</option>";
                }
              ?>
            </select>
            <div class="invalid-feedback">Kolom tidak boleh kosong</div>
          </div>
          <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select class="form-select" id="kelas" name="kelas" required>
              <option selected disabled value="">Pilih</option>
              <option value="X">X</option>
              <option value="XI">XI</option>
              <option value="XII">XII</option>
            </select>
            <div class="invalid-feedback">Kolom tidak boleh kosong</div>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required />
            <div class="invalid-feedback">Kolom tidak boleh kosong</div>
          </div>
          <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-select" id="agama" name="agama" required>
              <option selected disabled value="">Pilih Agama</option>
              <?php
                foreach($db->tampil_data_agama() as $agama){
                  echo "<option value='".$agama['idagama']."'>".$agama['nama_agama']."</option>";
                }
              ?>
            </select>
            <div class="invalid-feedback">Kolom tidak boleh kosong</div>
          </div>
          <div class="mb-3">
            <label for="nohp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="nohp" name="nohp" required maxlength="13" minlength="10"/>
            <div class="invalid-feedback">Kolom tidak boleh kosong</div>
          </div>
          <div class="d-grid">
            <button class="btn btn-info" type="submit" name="simpan"><i class="bi bi-save"></i> Tambah Siswa</button>
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