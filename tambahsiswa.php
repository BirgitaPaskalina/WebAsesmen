<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kode_jurusan = $_POST['kode_jurusan'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $nohp = $_POST['nohp'];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sekolah";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO siswa (nisn, nama, jenis_kelamin, kode_jurusan, kelas, alamat, agama, nohp) 
            VALUES ('$nisn', '$nama', '$jenis_kelamin', '$kode_jurusan', '$kelas', '$alamat', '$agama', '$nohp')";

    if ($conn->query($sql) === TRUE) {
        header("Location: datasiswa.php");
        exit(); // Penting: hentikan eksekusi setelah redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="tambahsiswa.css">
    <style>
/* Kotak peringatan animasi tengah */
#alert-box {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -60%);
    background-color: #f44336;
    color: white;
    padding: 20px 30px;
    border-radius: 10px;
    font-weight: bold;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    opacity: 0;
    pointer-events: none;
    z-index: 1000;
    transition: opacity 0.3s ease, transform 0.3s ease;
}
#alert-box.alert-show {
    opacity: 1;
    pointer-events: auto;
    transform: translate(-50%, -50%);
}
</style>

</head>
<body>
    <div class="container">
        <h2>Form Tambah Data Siswa</h2>
        <form action="" method="post">
            <label for="nisn">NISN:</label>
            <input type="text" id="nisn" name="nisn" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="jenis_kelamin">Jenis Kelamin :</label>
            <div class="radio-group">
                <div>
                    <input type="radio" id="Laki-laki" name="jenis_kelamin" value="L" required>
                    <label for="Laki-laki">Laki-laki</label>
                </div>
                <div>
                    <input type="radio" id="Perempuan" name="jenis_kelamin" value="P" required>
                    <label for="P  erempuan">Perempuan</label>
                </div>
            </div>

            <label for="kode_jurusan">Jurusan :</label>
            <input type="text" id="kode_jurusan" name="kode_jurusan" required>

            <label for="kelas">Kelas :</label>
            <input type="text" id="kelas" name="kelas" required>

            <label for="alamat">Alamat :</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="agama">Agama :</label>
            <input type="text" id="agama" name="agama" required>

            <label for="nohp">No HP :</label>
            <input type="text" id="nohp" name="nohp" required>

            <input type="submit" name="simpan" value="Tambah Siswa">
        </form>
        <div id="alert-box">
    <span id="alert-message"></span>
</div>

    </div>
    
 <script>
const form = document.querySelector("form");
const alertBox = document.getElementById("alert-box");
const alertMessage = document.getElementById("alert-message");

function showAlert(message) {
    alertMessage.innerHTML = message;
    alertBox.classList.add("alert-show");

    setTimeout(() => {
        alertBox.classList.remove("alert-show");
    }, 5000);
}

form.addEventListener("submit", function(e) {
    const jurusan = document.getElementById("kode_jurusan").value.trim();
    const agama = document.getElementById("agama").value.trim();
    const kelas = document.getElementById("kelas").value.trim().toUpperCase();
    const alamat = document.getElementById("alamat").value.trim();
    const nohp = document.getElementById("nohp").value.trim();

    let errors = [];

    // Jurusan: angka 1-12
    const jurusanNum = parseInt(jurusan);
    if (isNaN(jurusanNum) || jurusanNum < 1 || jurusanNum > 12) {
        errors.push("Masukkan kode jurusan yang valid!");
    }

    // Agama: angka 1-7
    const agamaNum = parseInt(agama);
    if (isNaN(agamaNum) || agamaNum < 1 || agamaNum > 7) {
        errors.push("Masukkan id agama yang valid!");
    }

    // Kelas: hanya X, XI, atau XII
    const validKelas = ["X", "XI", "XII"];
    if (!validKelas.includes(kelas)) {
        errors.push("Kelas harus diisi dengan X, XI, atau XII!");
    }

    // Alamat: huruf dan spasi minimal 5 karakter
    const regexAlamat = /^[a-zA-Z\s]{5,}$/;
    if (!regexAlamat.test(alamat)) {
        errors.push("Masukkan alamat yang valid!");
    }

    // No HP: hanya angka, minimal 10 digit
    const regexNoHp = /^\d{10,}$/;
    if (!regexNoHp.test(nohp)) {
        errors.push("Masukkan nomor HP yang valid (minimal 10 digit)!");
    }

    if (errors.length > 0) {
        e.preventDefault();
        showAlert(errors.join("<br>"));
    }
});
</script>


</body>
</html>

