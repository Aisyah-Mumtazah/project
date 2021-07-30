<?php
include '../model/Database.php';
$db = new database();

$aksi = $_GET['aksi'];
if($aksi=="tambah"){
	$db->input_login($_POST['idadmin'],$_POST['username'],$_POST['password'],$_POST['status']);
	header("location:../view/DaftarLogin.php");
}elseif($aksi=="hapus"){
	$db->hapus_login($_GET['idadmin']);
	header("location:../view/DaftarLogin.php");
}elseif($aksi=="update"){
	$db->update_login($_POST['idadmin'],$_POST['username'],$_POST['password'],$_POST['status']);
	header("location:../view/DaftarLogin.php");
}
?>