<?php 
$koneksi = new mysqli('localhost','root','','pemilu');
if ($koneksi->connect_error) 
{
	die('Database Tidak Terhubung :'. $koneksi->connect_error);
} 
?>
