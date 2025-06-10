<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sekolah";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);


// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ada NISN yang dikirim
if (!isset($_GET['nisn'])) {
    echo "NISN tidak ditemukan.";
    exit();
}

$nisn = $_GET['nisn'];

require_once 'koneksi.php'; // Pastikan file koneksi ada

// Ambil data siswa
$stmt = $conn->prepare("SELECT * FROM siswa WHERE nisn = ?");
$stmt->bind_param("s", $nisn);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $nama = $data['nama'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $kode_jurusan = $data['kode_jurusan'];
    $kelas = $data['kelas'];
    $alamat = $data['alamat'];
    $agama = $data['agama'];
    $nohp = $data['nohp'];
} else {
    echo "Data siswa tidak ditemukan.";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="tambahsiswa.css">
    <style>
/* Kotak peringatan di tengah layar dengan animasi */
#alert-box {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -60%);
    background-color: #ff4d4d;
    color: white;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    font-weight: bold;
    text-align: center;
    z-index: 9999;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.4s ease, transform 0.4s ease;
}

/* Saat alert tampil */
#alert-box.alert-show {
    opacity: 1;
    pointer-events: auto;
    transform: translate(-50%, -50%);
}

/* Saat alert disembunyikan */
#alert-box.alert-hidden {
    opacity: 0;
    pointer-events: none;
    transform: translate(-50%, -60%);
}
</style>

</head>
<body>
    <div class="container">
        <h2>Edit Data Siswa</h2>
        <form action="update_siswa.php" method="post">
            <label for="nisn">NISN:</label>
            <input type="text" id="nisn" name="nisn" value="<?= htmlspecialchars($nisn) ?>" readonly>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama) ?>" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <div class="radio-group">
                <div>
                    <input type="radio" id="Laki-laki" name="jenis_kelamin" value="L" <?= ($jenis_kelamin == 'L') ? 'checked' : '' ?> required>
                    <label for="Laki-laki">Laki-laki</label>
                </div>
                <div>
                    <input type="radio" id="Perempuan" name="jenis_kelamin" value="P" <?= ($jenis_kelamin == 'P') ? 'checked' : '' ?> required>
                    <label for="Perempuan">Perempuan</label>
                </div>
            </div>

            <label for="kode_jurusan">Jurusan:</label>
            <input type="text" id="kode_jurusan" name="kode_jurusan" value="<?= htmlspecialchars($kode_jurusan) ?>" required>

            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" value="<?= htmlspecialchars($kelas) ?>" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($alamat) ?>" required>

            <label for="agama">Agama:</label>
            <input type="text" id="agama" name="agama" value="<?= htmlspecialchars($agama) ?>" required>

            <label for="nohp">No HP:</label>
            <input type="text" id="nohp" name="nohp" value="<?= htmlspecialchars($nohp) ?>" required>

            <button type="submit">Update Data</button>
            <style>
        button[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
        </form>
      <div id="alert-box" class="alert-hidden">
        <p id="alert-message"></p>
        </div>


    </div>
<script>
    const form = document.querySelector("form");
    const alertBox = document.getElementById("alert-box");
    const alertMessage = document.getElementById("alert-message");

    function showAlert(message) {
        alertMessage.textContent = message;
        alertBox.classList.remove("alert-hidden");
        alertBox.classList.add("alert-show");

        setTimeout(() => {
            alertBox.classList.remove("alert-show");
            alertBox.classList.add("alert-hidden");
        }, 3000); // Hilang setelah 3 detik
    }

    form.addEventListener("submit", function(e) {
        const jurusan = document.getElementById("kode_jurusan").value.trim();
        const agama = document.getElementById("idagama").value.trim();
        const nohp = document.getElementById("nohp").value.trim();
        const alamat = document.getElementById("alamat").value.trim();

        const regexHuruf = /^[a-zA-Z\s]+$/;
        const regexNoHp = /^\d{10,15}$/;

        if (!regexHuruf.test(jurusan)) {
            e.preventDefault();
            showAlert("Masukkan kode jurusan yang valid!");
            return;
        }

        if (!regexHuruf.test(agama)) {
            e.preventDefault();
            showAlert("Masukkan id agama yang valid!");
            return;
        }

        if (!regexNoHp.test(nohp)) {
            e.preventDefault();
            showAlert("Masukkan angka No HP yang valid!");
            return;
        }

        if (alamat.length < 3) {
            e.preventDefault();
            showAlert("Masukkan alamat yang valid!");
            return;
        }
    });
</script>

</body>
</html>
