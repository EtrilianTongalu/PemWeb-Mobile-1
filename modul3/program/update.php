<h3>Update Pegawai</h3>
<?php
$con = mysqli_connect("localhost", "root", "", "db_pegawai");
$sql = "SELECT * FROM tb_pegawai WHERE nip ='$_GET[id]'";
$hasil = mysqli_query($con, $sql);
$data = mysqli_fetch_row($hasil);
?>
<form method="post" action="index.php">
    NIP : <input type="text" name="nip" value="<?php echo $data[0] ?>"><br>
    Nama : <input type="text" name="nama" value="<?php echo $data[1] ?>"><br>
    Alamat : <input type="text" name="alamat" value="<?php echo $data[2] ?>"><br>
    Jabatan :
    <select name="kd_jabatan">
        <option value="001" <?= $data[3] == '001' ? "selected='selected'" : "" ?>>Kepala</option>
        <option value="002" <?= $data[3] == '002' ? "selected='selected'" : "" ?>>Sekretaris</option>
        <option value="003" <?= $data[3] == '003' ? "selected='selected'" : "" ?>>Fungsional Perencanaan</option>
        <option value="004" <?= $data[3] == '004' ? "selected='selected'" : "" ?>>Kepala Sub Bagian</option>
        <option value="005" <?= $data[3] == '005' ? "selected='selected'" : "" ?>>Kepala Bidang</option>
        <option value="006" <?= $data[3] == '006' ? "selected='selected'" : "" ?>>Kepala Sub Bidang</option>
        <option value="007" <?= $data[3] == '007' ? "selected='selected'" : "" ?>>Sub Bidang</option>
        <option value="008" <?= $data[3] == '008' ? "selected='selected'" : "" ?>>Staf</option>
    </select>
    <input type="submit" name="btn" value="update">
</form>