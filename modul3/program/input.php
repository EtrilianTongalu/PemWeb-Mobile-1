<h3>Tambah Pegawai</h3>
<form method="post" action="index.php">
    NIP : <input type="text" name="nip"><br>
    Nama : <input type="text" name="nama"><br>
    Alamat : <input type="text" name="alamat"><br>
    Jabatan :
    <select name="kd_jabatan">
        <option value="001">Kepala</option>
        <option value="002">Sekretaris</option>
        <option value="003">Fungsional Perencanaan</option>
        <option value="004">Kepala Sub Bagian</option>
        <option value="005">Kepala Bidang</option>
        <option value="006">Kepala Sub Bidang</option>
        <option value="007">Sub Bidang</option>
        <option value="008">Staf</option>
    </select>
    <input type="submit" name="btn" value="Send">
</form>