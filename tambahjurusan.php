<?php
session_start();
include_once "koneksi.php";
$db = new database();

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_jurusan = trim(string: $_POST['kode_jurusan']);
    $nama_jurusan = trim(string: $_POST['nama_jurusan']);
    $result = $db->tambah_jurusan(kode_jurusan: $kode_jurusan, nama_jurusan: $nama_jurusan);
    
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Form Tambah Jurusan</title>
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
        <h3 class="mb-3 text-primary"><i class="bi bi-plus-circle"></i> Tambah Jurusan</h3>
        <?= $pesan ?>
        <form method="post" autocomplete="off" class="needs-validation" novalidate>
          <div class="mb-3">
            <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
            <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" required />
            <div class="invalid-feedback">Kolom tidak boleh kosong</div>
          </div>
          <div class="mb-3">
            <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required />
            <div class="invalid-feedback">Kolom tidak boleh kosong</div>
          </div>
          <div class="d-grid">
            <button class="btn btn-info" type="submit" name="simpan"><i class="bi bi-save"></i> Tambah Jurusan</button>
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