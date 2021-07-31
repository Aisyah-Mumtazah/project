<?php
include '../model/Database.php';
$db = new database();

$aksi = $_GET['aksi'];
if($aksi=="tambah"){
	$db->input_tiket($_POST['idtiket'],$_POST['idadmin'],$_POST['idpesan'],$_POST['idkendaraan'],$_POST['tanggal'],$_POST['tujuan'],$_POST['harga']);
	header("location:../view/FormTiket.php");
}elseif($aksi=="hapus"){
	$db->hapus_tiket($_GET['idtiket']);
	header("location:../view/TabelTiket.php");
}elseif($aksi=="update"){
	$db->update_tiket($_POST['idtiket'],$_POST['idadmin'],$_POST['idpesan'],$_POST['idkendaraan'],$_POST['tanggal'],$_POST['tujuan'],$_POST['harga']);
	header("location:../view/TabelTiket.php");
}
?>