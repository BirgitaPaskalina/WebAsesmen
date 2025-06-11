<?php
include_once "koneksi.php";
$db = new database();
if(isset($_POST['simpan'])){
  $db->tambah_siswa(
    $_POST['nisn'],
    $_POST['nama'],
    $_POST['jeniskelamin'],
    $_POST['kodejurusan'],
    $_POST['kelas'],
    $_POST['alamat'],
    $_POST['agama'],
    $_POST['nohp']
  );
  header("location: datasiswa.php");
  exit;
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
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      <?php include "sidebar.php"; ?>
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Form Data Siswa</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form Data Siswa</li>
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
                  <div class="card-header"><div class="card-title">Form Data Siswa</div></div>
                  <form class="needs-validation" novalidate method="POST" action="">
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label for="nisn" class="form-label">NISN</label>
                          <input type="number" class="form-control" id="nisn" name="nisn" required />
                          <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                        </div>
                        <div class="col-md-6">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama" required />
                          <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                        </div>
                        <div class="col-md-6">
                          <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                          <select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
                            <option selected disabled value="">Pilih</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                          </select>
                          <div class="invalid-feedback">Pilih salah satu</div>
                        </div>
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                          <label for="kelas" class="form-label">Kelas</label>
                          <select class="form-select" id="kelas" name="kelas" required>
                            <option selected disabled value="">Pilih</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                          </select>
                          <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                        </div>
                        <div class="col-md-6">
                          <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" class="form-control" id="alamat" name="alamat" required />
                          <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                        </div>
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                          <label for="nohp" class="form-label">No HP</label>
                          <input type="text" class="form-control" id="nohp" name="nohp" required maxlength="13" minlength="10"/>
                          <div class="invalid-feedback">Kolom tidak boleh kosong</div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-info" type="submit" name="simpan">Tambah Siswa</button>
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