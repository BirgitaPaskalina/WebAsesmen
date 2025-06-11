<?php
session_start();
include_once "koneksi.php";
$db = new database();

if (isset($_POST['simpan'])) {
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $result = $db->tambah_jurusan($kode_jurusan, $nama_jurusan);
    if ($result) {
        $_SESSION['message'] = "Jurusan berhasil ditambahkan";
    } else {
        $_SESSION['message'] = "Gagal menambah jurusan";
    }
    header("Location: datajurusan.php");
    exit();
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
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      <?php include "sidebar.php"; ?>
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Form Tambah Jurusan</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="datajurusan.php">Data Jurusan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Jurusan</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="row g-4">
              <div class="col-12">
                <div class="card card-info card-outline mb-4">
                  <div class="card-header"><div class="card-title">Form Tambah Jurusan</div></div>
                  <form class="needs-validation" novalidate method="POST" action="">
                    <div class="card-body">
                      <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-info"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
                      <?php endif; ?>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                          <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" required />
                          <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                        </div>
                        <div class="col-md-6">
                          <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                          <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required />
                          <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-info" type="submit" name="simpan">Tambah Jurusan</button>
                      <a href="datajurusan.php" class="btn btn-secondary ms-2">Kembali</a>
                    </div>
                  </form>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <strong>
          Copyright &copy; 2014-2024&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>