
<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
  header("Location: index.html");
  exit;
}

// Contoh data kegiatan (bisa diganti dari database)
$events = [
  '2025-06-09' => ['Upacara Bendera'],
  '2025-06-10' => ['Ekstrakurikuler Pramuka'],
  '2025-06-11' => ['Rapat OSIS'],
  '2025-06-12' => ['Latihan Basket'],
  '2025-06-13' => ['Jumat Bersih'],
  '2025-06-14' => ['Lomba Futsal'],
  '2025-06-15' => ['Libur'],
];

// Kalender bulan dan tahun sekarang
$month = date('m');
$year = date('Y');
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$firstDayOfMonth = date('N', strtotime("$year-$month-01")); // 1=Senin, 7=Minggu

// Nama hari dan bulan
$days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
$months = [
  1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
  7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Kalender Jadwal Kegiatan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="dist/css/adminlte.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
  <style>
    .calendar-table th, .calendar-table td {
      text-align: center;
      vertical-align: top;
      min-width: 60px;
      height: 80px;
      padding: 4px;
      font-size: 0.98em;
    }
    .calendar-table th {
      background: #0d6efd;
      color: #fff;
      font-weight: 600;
    }
    .calendar-table td.today {
      background: #e3f2fd;
      border: 2px solid #0d6efd;
    }
    .event-badge {
      display: block;
      margin: 2px auto 0 auto;
      font-size: 0.85em;
      padding: 2px 6px;
      border-radius: 8px;
      background: #ffc107;
      color: #212529;
      font-weight: 500;
      max-width: 95%;
      white-space: normal;
      word-break: break-word;
    }
    @media (max-width: 768px) {
      .calendar-table th, .calendar-table td {
        min-width: 38px;
        height: 48px;
        font-size: 0.85em;
        padding: 2px;
      }
      .event-badge {
        font-size: 0.75em;
        padding: 1px 3px;
      }
    }
  </style>
</head>
<body class="bg-body-tertiary">
  <div class="container-fluid p-2">
    <div class="card shadow-sm mb-2">
      <div class="card-header py-2 bg-primary text-white">
        <h5 class="mb-0"><i class="bi bi-calendar-week"></i> Kalender Jadwal Kegiatan - <?= $months[(int)$month] . " $year" ?></h5>
      </div>
      <div class="card-body p-2">
        <div class="table-responsive">
          <table class="table table-bordered calendar-table mb-0">
            <thead>
              <tr>
                <?php foreach ($days as $d): ?>
                  <th><?= $d ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $day = 1;
              $start = false;
              for ($week = 0; $week < 6; $week++) {
                echo "<tr>";
                for ($d = 1; $d <= 7; $d++) {
                  if (!$start && $d == $firstDayOfMonth) $start = true;
                  if ($start && $day <= $daysInMonth) {
                    $dateStr = "$year-$month-" . str_pad($day, 2, '0', STR_PAD_LEFT);
                    $isToday = (date('Y-m-d') == $dateStr);
                    echo '<td' . ($isToday ? ' class="today"' : '') . '>';
                    echo "<div><strong>$day</strong></div>";
                    if (isset($events[$dateStr])) {
                      foreach ($events[$dateStr] as $ev) {
                        echo '<span class="event-badge">' . htmlspecialchars($ev) . '</span>';
                      }
                    }
                    echo '</td>';
                    $day++;
                  } else {
                    echo "<td></td>";
                  }
                }
                echo "</tr>";
                if ($day > $daysInMonth) break;
              }
              ?>
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