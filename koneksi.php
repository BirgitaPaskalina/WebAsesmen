<?php
class database{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "sekolah";
    var $koneksi;

 function __construct() {
        // Membuat koneksi
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        // Cek koneksi
        if (!$this->koneksi) {
            die("Koneksi ke database gagal: " . mysqli_connect_error());
        }
    }

    function tampil_data_siswa() {
    $hasil = [];
    $query = "SELECT
        siswa.*,
        jurusan.nama_jurusan,
        agama.nama_agama
        FROM siswa
        JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan
        JOIN agama ON siswa.agama = agama.idagama";

    $data = mysqli_query($this->koneksi, $query);

    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }

    return $hasil;
}


function tampil_data_agama() {
    $hasil = [];
    $query = "SELECT * FROM agama";

    $data = mysqli_query($this->koneksi, $query);

    while($row = mysqli_fetch_array($data)) {   
        $hasil[] = $row;
    }

    return $hasil;
}


function tampil_data_jurusan() {
    $hasil = [];
    $query = "SELECT * FROM jurusan";

    $data = mysqli_query($this->koneksi, $query);

    while($row = mysqli_fetch_array($data)) {   
        $hasil[] = $row;
    }

    return $hasil;
}

function tambah_siswa(
    $nisn,$nama,$jenis_kelamin,$kode_jurusan,$kelas,$alamat,$agama,$nohp) {
        mysqli_query($this->koneksi,
        "insert into siswa (nisn,nama,jenis_kelamin,kode_jurusan,kelas,alamat,agama,nohp) values(
             '$nisn','$nama','$jenis_kelamin','$kode_jurusan','$kelas','$alamat','$agama','$nohp')");
    }

    
function tambah_agama($nama_agama) {
    $query = "INSERT INTO agama (nama_agama) VALUES ('$nama_agama')";
    mysqli_query($this->koneksi, $query);
}

function tambah_user($nama, $email, $password, $role) {
    // Enkripsi password sebelum disimpan
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (nama_lengkap, email, password, role) 
              VALUES ('$nama', '$email', '$password_hash', '$role')";
    return mysqli_query($this->koneksi, $query);
}

 function cek_login($email, $password, $role) {
        $query = "SELECT * FROM users WHERE email = '$email' AND role = '$role'";
        $result = mysqli_query($this->koneksi, $query);

        if ($result && mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return false;
    }

}

    
?>