<?php
include "koneksi.php";
$db = new database();
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
  header("Location: index.html");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Data Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous"/>
    <!-- OverlayScrollbars & AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <!-- Bootstrap & DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" />
    <!-- Custom CSS -->
    <style>
      .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.2em 0.8em !important;
      }
      .btn-edit, .btn-delete {
        padding: 4px 14px;
        border-radius: 6px;
        font-size: 0.97rem;
        margin-right: 4px;
        transition: background 0.2s;
        border: none;
        display: inline-block;
      }
      .btn-edit {
        background:#0056b3;
        color: #fff;
      }
      .btn-edit:hover {
        background: blue;
      }
      .btn-delete {
        background: #dc3545;
        color: #fff;
      }
      .btn-delete:hover {
        background: #c82333;
      }
      .tambah-btn {
        display: inline-block;
        margin: 18px 0 10px 0;
        background: #0d6efd;
        color: #fff;
        padding: 10px 22px;
        border-radius: 7px;
        font-weight: bold;
        font-size: 1rem;
        text-decoration: none;
        transition: background 0.2s;
      }
      .tambah-btn:hover {
        background: #0056b3;
      }
    </style>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="dashboard.php" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="bi bi-search"></i>
              </a>
            </li>
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img src="uploads/<?php echo htmlspecialchars($_SESSION['foto']); ?>" alt="Foto Profil" style="width:35px; height:35px; border-radius:50%;">
                <?php echo htmlspecialchars($_SESSION['nama']); ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-header text-bg-primary text-center">
                  <img src="uploads/<?php echo htmlspecialchars($_SESSION['foto']); ?>" alt="Foto Profil" style="width:50px; height:50px; border-radius:50%;">
                  <p>
                    <?php echo htmlspecialchars($_SESSION['nama']); ?> - <?php echo htmlspecialchars($_SESSION['role']); ?><br>
                    <small><?php echo htmlspecialchars($_SESSION['email']); ?></small>
                  </p>
                </li>
                <li class="user-footer d-flex justify-content-between">
                  <a href="profile.php" class="btn btn-default btn-flat">Profil</a>
                  <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!--end::Header-->
      <?php include "sidebar.php"; ?>
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Data Siswa</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h3 class="card-title">Tabel Data Siswa</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="tabelSiswa">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>No HP</th>
      
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($db->tampil_data_siswa() as $x) {
                          ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($x['nisn']); ?></td>
                            <td><?= htmlspecialchars($x['nama']); ?></td>
                            <td>
                              <?php 
                                $jenis_kelamin = $x['jenis_kelamin'] == 'L' ? 'Laki-laki' : ($x['jenis_kelamin'] == 'P' ? 'Perempuan' : 'Tidak Diketahui');
                                echo htmlspecialchars($jenis_kelamin);
                              ?>
                            </td>
                            <td><?= htmlspecialchars($x['nama_jurusan']); ?></td>
                            <td><?= htmlspecialchars($x['kelas']); ?></td>
                            <td><?= htmlspecialchars($x['alamat']); ?></td>
                            <td><?= htmlspecialchars($x['nama_agama']); ?></td>
                            <td><?= htmlspecialchars($x['nohp']); ?></td>
                            
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
    <!-- OverlayScrollbars -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="dist/js/adminlte.js"></script>
    <script>
      $(document).ready(function (){
        $('#tabelSiswa').DataTable();
      });
    </script>
  </body>
</html>