<?php
include "koneksi.php";
$dp = new database();

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
  header("Location: index.html");
  exit;

  if (move_uploaded_file($fotoTmp, $targetPath)) {
    $fotoPath = $namaBaru;
    mysqli_query($dp->koneksi, "UPDATE users SET foto = '$fotoPath' WHERE id = '$userId'");
    $_SESSION['foto'] = $fotoPath; // tambahkan ini
}
}

?>
<link rel="stylesheet" href="styledashboard.css">

<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Simple Tables</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Simple Tables" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!-- Custom CSS -->
<link rel="stylesheet" href="datasiswa.css">
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="bi bi-search"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
            <!--end::Messages Dropdown Menu-->
            <!--begin::Notifications Dropdown Menu-->
         
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
     <img src="uploads/<?php echo $_SESSION['foto']; ?>" alt="Foto Profil" style="width:35px; height:35px; border-radius:50%;">
      <?php echo $_SESSION['nama']; ?>
    </span>
  </a>
  <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
    <!--begin::User Image-->
    <li class="user-header text-bg-primary">
     <img src="uploads/<?php echo $_SESSION['foto']; ?>" alt="Foto Profil" style="width:50px; height:50px; border-radius:50%;">
   
      <p>
        <?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['role']; ?>
        <small><?php echo $_SESSION['email']; ?></small>
      </p>
    </li>
    <!--end::User Image-->
    
    <li class="user-footer">
      <a href="profile.php" class="btn btn-default btn-flat">Profil</a>
  <!-- Tombol Logout dengan Modal -->
      <a href="#" class="btn btn-default btn-flat float-end" data-bs-toggle="modal" data-bs-target="#logoutModal">
        Keluar
      </a>
    </li>
  </ul>
</li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <?php include "sidebar.php"; ?>
      <!--begin::App Main-->
    
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ekstrakurikuler</li>
            <li class="breadcrumb-item active" aria-current="page">PASKIBRA</li>
          </ol>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-lg-4 mb-3">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-danger text-white">
              <h5 class="mb-0"><i class="bi bi-flag-fill"></i> Profil PASKIBRA</h5>
            </div>
            <div class="card-body">
              <img src="Paskibra.jpg" alt="Logo Paskibra" class="mb-3 rounded" style="max-width:90px;">
              <p>
                <strong>PASKIBRA (Pasukan Pengibar Bendera)</strong> adalah ekstrakurikuler yang membentuk karakter disiplin, tanggung jawab, dan kepemimpinan siswa. Anggota Paskibra dilatih intensif untuk melaksanakan tugas upacara dengan baik dan penuh kedisiplinan.
              </p>
              <ul class="list-unstyled mb-0">
                <li><i class="bi bi-calendar-event"></i> Periode: 2024/2025</li>
                <li><i class="bi bi-person-badge"></i> Pembina: Bapak Andi, S.Pd</li>
                <li><i class="bi bi-geo-alt"></i> Lokasi: Lapangan Utama</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8 mb-3">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-info text-white">
              <h5 class="mb-0"><i class="bi bi-people"></i> Jadwal & Pembina</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-7">
                  <h6 class="fw-bold mb-2"><i class="bi bi-calendar-week"></i> Jadwal Latihan</h6>
                  <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Senin & Kamis
                      <span class="badge bg-primary rounded-pill">15.30 - 17.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Sabtu
                      <span class="badge bg-primary rounded-pill">08.00 - 10.00</span>
                    </li>
                  </ul>
                </div>
                <div class="col-md-5">
                  <h6 class="fw-bold mb-2"><i class="bi bi-person-lines-fill"></i> Daftar Pembina</h6>
                  <ul class="list-group">
                    <li class="list-group-item">Bapak Andi, S.Pd (Pembina Utama)</li>
                    <li class="list-group-item">Ibu Rina, S.Pd (Pembina Pendamping)</li>
                  </ul>
                </div>
              </div>
              <hr>
              <h6 class="fw-bold mb-2"><i class="bi bi-info-circle"></i> Info Kegiatan</h6>
              <ul>
                <li>Latihan baris-berbaris, pelatihan fisik, dan penguatan mental.</li>
                <li>Berperan dalam upacara bendera setiap Senin dan hari besar nasional.</li>
                <li>Sering mewakili sekolah pada upacara tingkat kota/provinsi.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Daftar Anggota Paskibra (opsional) -->
      <!--
      <div class="row">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
              <h5 class="mb-0"><i class="bi bi-list-ul"></i> Daftar Anggota Paskibra</h5>
            </div>
            <div class="card-body p-2">
              <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle mb-0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Jabatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Putra Pratama</td>
                      <td>XI IPA 2</td>
                      <td>Ketua</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Siti Rahma</td>
                      <td>X IPS 1</td>
                      <td>Wakil Ketua</td>
                    </tr>
                    <!-- Tambahkan anggota lain sesuai kebutuhan -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      -->
    </div>
  </div>
</main>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
