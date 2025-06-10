<?php
include "koneksi.php";
$db = new database();
?>
<!DOCTYPE html>
<html lang="en">
<head>     
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Agama</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Agama</h2>
    <table border="1">
        <tr>
            <th>ID Agama</th>
            <th>Agama</th>
            <th>Option</th>
        </tr>
        <?php 
        $no = 1;
        foreach($db->tampil_data_agama() as $x){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $x['idagama']; ?></td>
            <td><?php echo $x['nama_agama']; ?></td>
            <td>
                <a href="edit_agama.php?idagama=<?php echo $x['idagama']; ?>&aksi=edit">Edit</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>