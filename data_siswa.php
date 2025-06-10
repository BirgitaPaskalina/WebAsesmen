<link rel="stylesheet" href="style.css">
<?php
include "koneksi.php";
$db = new database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h2>Data Siswa</h2>
    <table border="1">
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
            <th>Option</th>
        </tr>
        <?php 
        $no = 1;
         foreach($db->tampil_data_siswa() as $x){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $x['nisn']; ?></td>
            <td><?php echo $x['nama']; ?></td>  
            <td>
<?php
$jk = strtoupper(trim($x['jenis_kelamin']));
echo $jk === 'L' ? 'Laki-laki' : ($jk === 'P' ? 'Perempuan' : 'Tidak Diketahui');
?>
</td>

            <td><?php echo $x['nama_jurusan']; ?></td>
            <td><?php echo $x['kelas']; ?></td>  
            <td><?php echo $x['alamat']; ?></td> 
            <td><?php echo $x['nama_agama']; ?></td> 
            <td><?php echo $x['nohp']; ?></td>
            <td>
                <a href="edit_siswa.php?idsiswa=<?php echo $x['id_siswa']; ?>&aksi=edit">Edit</a>
                <a href="proses.php?idsiswa=<?php echo $x['id_siswa']; ?>&aksi=hapus">Hapus</a
                class="btn btn-danger btn-sm">Hapus</a>

            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <a href="tambahsiswa.php">Tambah Siswa</a>
</body>
</html>