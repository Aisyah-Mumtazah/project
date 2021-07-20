<?php
include '../model/Database.php';
$db = new database();

$aksi = $_GET['aksi'];
if($aksi=="tambah"){
	$db->input_login($_POST['nama'],$_POST['alamat'],$_POST['usia']);
	header("location:../view/Tampil.php");
}elseif($aksi=="hapus"){
	$db->hapus_login($_GET['id']);
	header("location:../view/Tampil.php");
}elseif($aksi=="update"){
	$db->update_login($_POST['id'],$_POST['nama'],$_POST['alamat'],$_POST['usia']);
	header("location:../view/Tampil.php");
}
?>