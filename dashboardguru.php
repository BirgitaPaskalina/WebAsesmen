<?php
include "koneksi.php";
$dp = new database();
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'guru') {
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
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE v4 | Dashboard</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard" />
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
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
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
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
              <div class="col-sm-6">
               
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
         <div class="col-lg-3 col-6">
  <!--begin::Small Box Widget 1-->
  <div class="small-box text-bg-primary" style="position: relative;">
    <div class="inner">
      <h3>1024</h3>
      <p>Siswa</p>
    </div>

    <!-- Tambahkan gambar user -->
 <img src="user.png" alt="Major Icon"
     style="position: absolute; top: 0; right: 10px; height: 98%; opacity: 0.1;" />

    <a
      href="datasiswa.php"
      class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
    >
     Selengkapnya <i class="bi bi-link-45deg"></i>
    </a>
  </div>
  <!--end::Small Box Widget 1-->
</div>

              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 2-->
                <div class="small-box text-bg-success">
                  <div class="inner">
                    <h3>7<sup class="fs-5"></sup></h3>
                    <p>Mata Kejuruan </p>
                  </div>
                 <!-- Tambahkan gambar user -->
   <img src="jurusanicon.png" alt="Major Icon"
     style="position: absolute; top: 0; right: 10px; height: 98%; opacity: 0.1;" />


    <a
                    href="datajurusan.php"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    Selengkapnya <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
                <!--end::Small Box Widget 2-->
              </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 3-->
                <div class="small-box text-bg-warning">
                  <div class="inner text-white">
                    <h3>14</h3>
                    <p>Ekstrakurikuler</p>
                  </div>
                  <img src="pie-chart.png" alt="Piechart Icon"
                    style="position: absolute; top: 0; right: 10px; height: 85%; opacity: 0.1;" />
                <a
                  href="javascript:void(0);"
                  onclick="bukaMenuEkstrakurikuler()"
                  class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                  Selengkapnya <i class="bi bi-link-45deg"></i>
                </a>

                </div>
                <!--end::Small Box Widget 3-->
              </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 4-->
                <div class="small-box text-bg-danger">
                  <div class="inner">
                    <h3>A</h3>
                    <p>Akreditasi</p>
                  </div>
                   <img src="book.png" alt="Book Icon"
                      style="position: absolute; top: 0; right: 10px; height: 85%; opacity: 0.09;" />
                  <a
                    href="Tentang.php"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    Selengkapnya <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
                <!--end::Small Box Widget 4-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row">
              <!-- Start col -->
            <div class="col-lg-7 connectedSortable">
  <div class="card mb-4">
    <div class="card-header">
      <h3 class="card-title">Jumlah Peserta Didik</h3>
    </div>
    <div class="position-relative mb-4">
      <div id="sales-chart"></div> <!-- Tinggi ditambahkan di sini -->
    </div>
  </div>
</div>

                <!-- /.card -->
                
                <!-- /.direct-chat -->
              </div>
              <!-- /.Start col -->
              <!-- Start col -->
             
              <!-- /.Start col -->
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      
      <!--end::Footer-->
    </div>
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
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ="
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
      const connectedSortables = document.querySelectorAll('.connectedSortable');
      connectedSortables.forEach((connectedSortable) => {
        let sortable = new Sortable(connectedSortable, {
          group: 'shared',
          handle: '.card-header',
        });
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
   <script>
  const sales_chart_options = {
    series: [
      {
        name: 'Jumlah Peserta Didik',
        data: [1750, 1500, 1580, 1700, 1840, 2000],
      }
    ],
    chart: {
      type: 'bar',
      height: 200,
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '30%',
        endingShape: 'rounded',
        distributed: true, // 👈 Aktifkan warna berbeda per batang
      },
    },
    legend: {
      show: false,
    },
    colors: ['#0d6efd', '#dc3545', '#0d6efd', '#0d6efd', '#0d6efd', '#0d6efd'], // 👈 Warna berbeda per batang
    dataLabels: {
      enabled: false,
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent'],
    },
    xaxis: {
      categories: ['2020', '2021', '2022', '2023', '2024', '2025'],
    },
    yaxis: {
      min: 50,
      max: 2000,
      tickAmount: 5,
      labels: {
        formatter: function (val) {
          return val.toFixed(0);
        }
      }
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + ' siswa';
        },
      },
    },
  };

  const sales_chart = new ApexCharts(
    document.querySelector('#sales-chart'),
    sales_chart_options,
  );
  sales_chart.render();
</script>

<script>
function bukaMenuEkstrakurikuler() {
  const sidebar = document.querySelector('.main-sidebar'); // Ganti selector sesuai layout kamu
  const body = document.body;
  const menuLink = document.getElementById('menu-ekstrakurikuler');
  const treeview = menuLink.nextElementSibling;

  // 1. Jika sidebar sedang collapse (cek class body)
  const isSidebarCollapsed = body.classList.contains('sidebar-collapse');
  if (isSidebarCollapsed) {
    body.classList.remove('sidebar-collapse'); // Buka sidebar
  }

  // Delay agar sidebar selesai membuka dulu sebelum scroll & buka menu
  setTimeout(() => {
    if (treeview && treeview.classList.contains('nav-treeview')) {
      const isVisible = treeview.style.display === 'block';

      if (isVisible) {
        // Jika sudah terbuka, tutup
        treeview.style.display = 'none';
        menuLink.classList.remove('active');
        updatePanah(false);
      } else {
        // Buka submenu Ekstrakurikuler
        treeview.style.display = 'block';
        menuLink.classList.add('active');
        menuLink.scrollIntoView({ behavior: 'smooth' });
        updatePanah(true);
      }
    }
  }, 300); // waktu tunggu animasi buka sidebar (atur sesuai kebutuhan)
}

// Fungsi bantu untuk ubah ikon panah kanan ⇄ bawah
function updatePanah(buka) {
  const ikonPanah = document.getElementById("ikon-panah-ekstrakurikuler");
  if (ikonPanah) {
    if (buka) {
      ikonPanah.classList.remove("bi-chevron-right");
      ikonPanah.classList.add("bi-chevron-down");
    } else {
      ikonPanah.classList.remove("bi-chevron-down");
      ikonPanah.classList.add("bi-chevron-right");
    }
  }
}
</script>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal Konfirmasi Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <div class="modal-header bg-light text-dark border-0 rounded-top-4">
        <h5 class="modal-title d-flex align-items-center gap-2" id="logoutModalLabel">
          <i class="bi bi-box-arrow-right fs-4 text-danger"></i> Konfirmasi Keluar
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body text-center py-4">
        <i class="bi bi-question-circle-fill text-warning fs-1 mb-3"></i>
        <p class="fs-5 mb-0">Apakah Anda yakin ingin keluar?</p>
      </div>
      <div class="modal-footer border-0 d-flex justify-content-center gap-3 pb-4">
        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Tidak</button>
        <a href="logout.php" class="btn btn-danger px-4">Ya, Keluar</a>
      </div>
    </div>
  </div>
</div>

    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>