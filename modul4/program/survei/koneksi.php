<?php
$koneksi = new mysqli('localhost', 'root', '', 'perpustakaan');

if ($koneksi->connect_error) {
	die('Database Tidak Terhubung :' . $koneksi->connect_error);
}
?>
