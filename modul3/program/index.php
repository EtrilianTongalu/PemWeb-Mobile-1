<?php
ini_set("display_errors", 0);

// Buat Database
if ($_POST['btn'] == 'Buat Database') {
    $conn = mysqli_connect("localhost", "root", "");
    $sql = "CREATE DATABASE db_pegawai";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Database (db_pegawai) berhasil dibuat')</script>";
    } else {
        echo "<script>alert('Database gagal dibuat/sudah ada')</script>";
    }
    mysqli_close($conn);
}

// Buat Tabel
if ($_POST['btn'] == 'Buat Tabel') {
    $conn = mysqli_connect("localhost", "root", "", "db_pegawai");
    $sql_p = "CREATE TABLE tb_pegawai (
            nip varchar(20) primary key,
            nama varchar(25),
            alamat text,
            kd_jabatan varchar(255)
            )";
    $sql_j = "CREATE TABLE tb_jabatan (
            kd_jabatan varchar(20) primary key,
            nama_jabatan varchar(255)
            )";

    if (mysqli_query($conn, $sql_p) && mysqli_query($conn, $sql_j)) {
        $sql_j_i = "INSERT INTO tb_jabatan (kd_jabatan, nama_jabatan)
                    VALUES ('001', 'Kepala'),('002','Sekretaris'),('003','Fungsional Perencanaan'),('004','Kepala Sub Bagian'),
                    ('005','Kepala Bidang'),('006','Kepala Sub Bidang'),('007','Sub Bidang'),('008','Staf')";
        mysqli_query($conn, $sql_j_i);

        $sql_p_i = "INSERT INTO tb_pegawai (nip, nama, alamat, kd_jabatan)
                    VALUES ('197008121995121001','Zainal','Anduonohu, Kec. Laloara, Jl. Lumba-Lumba','001'),
                    ('196706171994031010','Yono','Anduonohu, Jl. Jend. AH. Nasution','008'),
                    ('196512312006041114','Amrin','Kambu, Jl. Lasitarda, Lrg. Tekukur','008')";
        mysqli_query($conn, $sql_p_i);

        echo "<script>alert('Tabel pegawai dan jabatan berhasil dibuat')</script>";
    } else {
        echo "<script>alert('Tabel gagal dibuat/sudah ada')</script>";
    }
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 3 - Etrilian Tongalu</title>
</head>

<body>
    <form action="index.php" method="POST">
        <ul style="list-style: none;">
            <li>
                Jika belum memiliki database, lakukan perintah berikut :
                <ul style="margin-top: 5px;">
                    <li>
                        Klik untuk membuat database :
                        <input type="submit" name="btn" value="Buat Database">
                    </li>
                    <li style="margin-top: 10px;">
                        Klik untuk menambahkan tabel :
                        <input type="submit" name="btn" value="Buat Tabel">
                    </li>
                </ul>
            </li>
            <li style="margin-top: 10px;">
                <form method="GET">
                    <h3>Daftar Pegawai</h3>
                    <table border="1">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th colspan="2">Aksi</th>
                        </tr>

                        <?php
                        ini_set("display_errors", 0);
                        $con = mysqli_connect("localhost", "root", "", "db_pegawai");

                        // Hapus Data
                        if ($_GET['btn'] == 'delete') {
                            $sql = "DELETE FROM tb_pegawai WHERE nip='$_GET[id]'";
                            mysqli_query($con, $sql);
                        }

                        // Menyimpan/Menambah Data
                        if ($_POST['btn'] == 'Send') {
                            $nip = $_POST['nip'];
                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $kd_jabatan = $_POST['kd_jabatan'];
                            $sql = "INSERT INTO tb_pegawai (nip,nama,alamat,kd_jabatan) 
                                    VALUES ('$nip','$nama','$alamat','$kd_jabatan')";
                            mysqli_query($con, $sql);
                        }

                        // Update Data
                        if ($_POST['btn'] == 'update') {
                            $sql = "UPDATE tb_pegawai 
                                    SET nip='$_POST[nip]',nama='$_POST[nama]',alamat='$_POST[alamat]',kd_jabatan='$_POST[kd_jabatan]' 
                                    WHERE nip='$_POST[nip]'";
                            mysqli_query($con, $sql);
                        }

                        // Tampilkan Data
                        $sql = "SELECT * FROM tb_pegawai INNER JOIN tb_jabatan ON tb_pegawai.kd_jabatan = tb_jabatan.kd_jabatan";
                        $hasil = mysqli_query($con, $sql);
                        $i = 1;
                        foreach ($hasil as $data) :
                            echo "
                                <td>" . $i++ . "</td>
                                <td>" . $data["nip"] . "</td>
                                <td>" . $data["nama"] . "</td>
                                <td>" . $data["alamat"] . "</td>
                                <td>" . $data["nama_jabatan"] . "</td>
                                <td><a href=\"update.php?id=$data[nip]&btn=update\">update</a</td>
                                <td><a href=\"index.php?id=$data[nip]&btn=delete\">delete</a></td> 
                            </tr>";
                        endforeach;
                        ?>
                    </table>
                    <a href="input.php">Tambah Pegawai</a><br>
                </form>
            </li>
        </ul>
    </form>
</body>

</html>
