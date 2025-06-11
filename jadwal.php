<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
  header("Location: index.html");
  exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Kegiatan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap & AdminLTE -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="dist/css/adminlte.css" />
  <style>
    .calendar-table th, .calendar-table td {
      text-align: center;
      vertical-align: middle;
      min-width: 90px;
      height: 60px;
    }
    .calendar-table th {
      background: #0d6efd;
      color: #fff;
    }
    .event-badge {
      display: inline-block;
      margin-top: 6px;
      font-size: 0.95em;
      padding: 2px 8px;
      border-radius: 8px;
      background: #ffc107;
      color: #212529;
      font-weight: 500;
    }
  </style>
</head>
<body class="bg-body-tertiary">
  <div class="container-fluid p-2">
    <div class="card shadow-sm mb-2">
      <div class="card-header py-2">
        <h5 class="mb-0">Jadwal Kegiatan Minggu Ini</h5>
      </div>
      <div class="card-body p-2">
        <div class="table-responsive">
          <table class="table table-bordered calendar-table mb-0">
            <thead>
              <tr>
                <th>Senin<br><span class="fw-normal text-secondary">10 Jun</span></th>
                <th>Selasa<br><span class="fw-normal text-secondary">11 Jun</span></th>
                <th>Rabu<br><span class="fw-normal text-secondary">12 Jun</span></th>
                <th>Kamis<br><span class="fw-normal text-secondary">13 Jun</span></th>
                <th>Jumat<br><span class="fw-normal text-secondary">14 Jun</span></th>
                <th>Sabtu<br><span class="fw-normal text-secondary">15 Jun</span></th>
                <th>Minggu<br><span class="fw-normal text-secondary">16 Jun</span></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <span class="event-badge">Upacara Bendera</span>
                </td>
                <td>
                  <span class="event-badge">Ekstrakurikuler Pramuka</span>
                </td>
                <td>
                  <span class="event-badge">Rapat OSIS</span>
                </td>
                <td>
                  <span class="event-badge">Latihan Basket</span>
                </td>
                <td>
                  <span class="event-badge">Jumat Bersih</span>
                </td>
                <td>
                  <span class="event-badge">Lomba Futsal</span>
                </td>
                <td>
                  <span class="event-badge">Libur</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-2 text-end">
          <small class="text-muted">* Jadwal dapat berubah sewaktu-waktu</small>
        </div>
      </div>
    </div>
  </div>
</body>
</html>