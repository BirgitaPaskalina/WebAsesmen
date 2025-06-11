<?php
include "koneksi.php";
$dp = new database();
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
  header("Location: index.html");
  exit;
}
?>
<link rel="stylesheet" href="styledashboard.css">
<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tentang SMK Negeri 6 Surakarta</title>
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
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
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
          <ul class="navbar-nav ms-auto">
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
              <div class="col-12 text-center">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tentang</li>
                </ol>
                <h2 class="mb-4">It's all about Viska</h2>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-10">
                <div class="card shadow-sm mb-4">
                  <div class="card-body">
                    <p>Bertempat di Gilingan – Banjarsari belakang SD Cemara Dua SMEP Berdiri. SMEP (Sekolah Menengah Ekonomi Pertama) setingkat SMP berbasis Ekonomi. Di Surakarta ada dua SMEP yaitu SMEP Negeri dan SMEP Pemda. SMEP Pemda menempati lahan milik keluarga Kraton Surakarta. Seiring berjalannya waktu, SMEP Pemda kekurangan siswa karena banyak siswa memilih masuk ke SMEP Negeri.</p>
                    <p>Seiring berlakunya peraturan baru bahwa sekolah jenjang SLTP tidak ada kejuruan, maka SMEP Pemda dibubarkan dan diubah fungsinya menjadi SMEA (Sekolah Menengah Ekonomi Atas) Negeri 3 Surakarta tahun 1977. Saat itu ada 2 jurusan yaitu Tata Buku dan Tata Niaga. Kepala Sekolah pertama Bapak Sutoto BA yang selanjutnya dipindah ke SMEA Negeri 1 Surakarta.</p>
                    <p>Karena di lokasi lama SMEA Negeri 3 Surakarta dirasakan tidak bisa berkembang, maka pada tahun 1978 lokasi SMEAN 3 Ska dipindahkan ke Jl. Adisucipto No. 38 Surakarta dengan kepala sekolah Bapak Suharyono. Pada awal berdiri hanya ada 4 ruang kelas, 1 ruang guru, 1 ruang kepala sekolah, dan 1 ruang TU. Jumlah guru hanya 8 orang. Jumlah siswa 4 kelas yaitu kelas 1 Tata Buku 1 kelas, Tata Niaga 2 kelas, dan kelas 2 Tata Buku 1 kelas. Ruangan kelas masih dari papan dan triplek beratap seng. Ruang guru dari triplek, tanpa plafon, dan berlantai tegel kasar.</p>
                    <p>Dibangunlah gedung megah berlantai satu yang dihuni oleh 4 jurusan yakni Tata Buku, Tata Niaga, Tata Usaha, serta Manajemen Koperasi. Jurusan Tata Buku banyak melakukan praktik pembukuan manual, Tata Usaha praktik mengetik manual dan menggunakan mesin stensil, Tata Niaga praktik di koperasi sekolah, dan Manajemen Koperasi praktik membuat laporan koperasi sekolah dan praktik langsung ke Koperasi Unit Desa (KUD).</p>
                    <p>Di era Bapak Walkam ini terjadi perubahan besar pada sekolah yakni SMEAN 3 Surakarta berubah nama menjadi SMK Negeri 6 Surakarta di tahun 1996. Perubahan nama ini juga diiringi dengan penambahan jurusan baru yakni Akomodasi Perhotelan dan Jasa Boga. Siswa baru banyak berdatangan, terutama jurusan baru karena peluang kerja terbuka lebar di hotel-hotel berbintang di kota Solo dan sekitarnya. Selama era Bapak Walkam juga terjadi perubahan gedung besar-besaran dan peningkatan kualitas lulusan.</p>
                    <p>Atas jasa Bapak Mufti, SMK N 6 Surakarta menjadi percontohan sekolah yang mampu mengajarkan kewirausahaan melalui UNIT PRODUKSI TOKO KARINA. Toko ini menjual aneka makanan, alat tulis kantor, dan kebutuhan siswa yang semuanya dilayani langsung oleh siswa jurusan Penjualan dan Perhotelan. Unit produksi lain adalah Karina Catering dan Karina Salon. Semua siswa praktik langsung di unit produksi tersebut sebagai bekal terjun ke dunia kerja dan usaha. Semua aktivitas praktik tersebut didukung dengan sarana dan prasarana yang lengkap dan memadai.</p>
                    <p>Memasuki masa pensiun, Bapak Mufti diganti oleh Bapak Sumarjata Naftali yang mampu melanjutkan prestasi Bapak Mufti bahkan lebih berkembang. Ruang praktik diperluas, laboratorium diperbanyak, dan sekolah sering mendapat juara dalam lomba-lomba kompetensi siswa. Sekolah juga mulai menjalin kerja sama dengan luar negeri yakni Jepang, Australia, dan Eropa.</p>
                    <p>Masa pensiun Bapak Naftali tiba, disusul Ibu Agnes Soerasmini hanya beberapa bulan yakni Maret – Juni 2002. Namun, perubahan positif sudah mulai ditata seperti perbaikan fasilitas guru dan pengadaan alat-alat praktik jurusan Tata Kecantikan. Ibu Agnes melanjutkan tugas sebagai pengawas Dinas Pendidikan Provinsi Jawa Tengah.</p>
                    <p>Ide ini ditangkap Ibu Kepala Sekolah yang baru yakni Ibu Sri Supartini yang melanjutkan SMK N 6 Surakarta maju sebagai SMK RSBI. Sekolah mulai menerapkan pendidikan berbasis internasional dengan mendatangkan guru tamu dari luar negeri dan penguatan Bahasa Inggris untuk seluruh jurusan. Sekolah juga menjadi tempat benchmarking bagi sekolah-sekolah lain di Indonesia.</p>
                    <p>Pada tahun 2015 kepemimpinan SMK N 6 Surakarta beralih kepada Bapak Suratno namun hanya beberapa bulan saja yakni 2015 sampai 2016. Selama kepemimpinan beliau ada tambahan kerja sama dengan dunia industri dan penambahan sarana praktik untuk siswa.</p>
                    <p>Bulan September tahun 2016 kepala sekolah baru bernama Ibu Ties Setyaningsih masuk ke SMK N 6 Surakarta menjadi kepala sekolah. Pada masa beliau sekolah mulai meningkatkan kualitas guru dengan berbagai pelatihan, penguatan karakter siswa, serta renovasi gedung-gedung tua. Banyak alumni mulai kembali ke sekolah untuk berbagi inspirasi dan pengalaman.</p>
                    <p>Pada tanggal 28 Februari 2020 SMK N 6 Surakarta dipimpin oleh kepala sekolah baru bernama Bapak Tenang Pranata, S.Pd, M.Pd. Dengan semangat baru, sekolah menerapkan sistem digital dalam pelayanan pendidikan dan administrasi. Program unggulan kewirausahaan diperkuat dan alumni semakin banyak yang sukses membuka usaha sendiri atau bekerja di perusahaan ternama. SMK N 6 Surakarta terus berinovasi dan berkomitmen menjadi sekolah vokasi terbaik di Surakarta dan sekitarnya.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="dist/js/adminlte.js"></script>
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
  </body>
</html>