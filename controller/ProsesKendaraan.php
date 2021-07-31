<?php
include '../model/Database.php';
$db = new database();

$aksi = $_GET['aksi'];
if($aksi=="tambah"){
	$db->input_kendaraan($_POST['idkendaraan'],$_POST['nama'],$_POST['jenis'],$_POST['supir']);
	header("location:../view/FormKendaraan.php");
}elseif($aksi=="hapus"){
	$db->hapus_kendaraan($_GET['idkendaraan']);
	header("location:../view/TabelKendaraan.php");
}elseif($aksi=="update"){
	$db->update_kendaraan($_POST['idkendaraan'],$_POST['nama'],$_POST['jenis'],$_POST['supir']);
	header("location:../view/TabelKendaraan.php");
}
?>