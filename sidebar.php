
<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.php" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="dist/assets/img/logosekolah.png"
              alt="AdminLTE Logo"
              class="brand-image"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">SMKN 6 SURAKARTA</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item menu-open">
                <a href="dashboard.php" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Tentang.php" class="nav-link">
                  <i class="nav-icon bi bi-patch-check-fill"></i>
                  <p>Tentang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-table"></i>
                  <p>
                    Data
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="datasiswa.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Siswa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="datajurusan.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Jurusan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="dataagama.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Agama</p>
                    </a>
                  </li>
                </ul>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-pencil-square"></i>
                  <p>
                    Forms
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="tambahsiswa.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Form Siswa</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="tambahjurusan.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Form Jurusan</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="tambahagama.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Form Agama</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
              <a href="#" class="nav-link" id="menu-ekstrakurikuler">
                <i class="nav-icon bi bi-clipboard-fill"></i>
                <p>
                  Ekstrakurikuler
                  <span class="nav-badge badge text-bg-secondary me-3">14</span>
                 <i id="ikon-panah-ekstrakurikuler" class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>

                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="TARI.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>SENI TARI</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="PASKIBRA.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>PASKIBRA</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="PRAMUKA.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>PRAMUKA</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./layout/sidebar-mini.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>PMR</p>
                    </a>
                  </li>
                 <li class="nav-item">
                    <a href="./layout/fixed-sidebar.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>FUTSAL</p>
                    </a>
                  </li>
                 <li class="nav-item">
                    <a href="./layout/fixed-sidebar.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>BOLA VOLI</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./layout/layout-rtl.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>KIR MADING</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./layout/fixed-sidebar.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>ROHIS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./layout/fixed-sidebar.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>ROHKAT</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./layout/fixed-sidebar.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>ROHKRIS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./layout/fixed-sidebar.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>ELVISKA</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./layout/fixed-sidebar.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>KMVI</p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="./layout/fixed-sidebar.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>NAVISKA</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-header">Akun</li>
              <li class="nav-item">
              
               <li class="nav-item">
                <a href="Profile.php" class="nav-link">
                  <i class="nav-icon bi bi-patch-check-fill"></i>
                  <p>Profil</p>
                </a>
              </li>
  <li class="nav-item">
<!-- Tombol Logout -->
<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
  <i class="nav-icon bi bi-box-arrow-in-right"></i>
  Keluar
</a>

</li>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->

      <script>
  function konfirmasiLogout() {
    return confirm("Apakah Anda yakin ingin keluar?");
  }
</script>

<!-- Modal Konfirmasi Logout -->
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

<!-- Bootstrap 5 CSS (jika belum ada) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS & dependencies (jika belum ada) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  