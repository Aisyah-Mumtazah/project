<?php
include '../model/Database.php';
$db = new database();

$aksi = $_GET['aksi'];
if($aksi=="tambah"){
	$db->input_pemesanan($_POST['idpesan'],$_POST['nama'],$_POST['alamat'],$_POST['notelp']);
}elseif($aksi=="hapus"){
	$db->hapus_pemesanan($_GET['idpesan']);
	header("location:../view/TabelPemesan.php");
}elseif($aksi=="update"){
	$db->update_pemesanan($_POST['idpesan'],$_POST['nama'],$_POST['alamat'],$_POST['notelp']);
	header("location:../view/TabelPemesan.php");
}
?>