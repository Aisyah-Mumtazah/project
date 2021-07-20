<?php
class database{
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "travel";
	var $con;

	function __construct(){
		$this->con=mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
		mysqli_select_db($this->con,$this->db);
	}

	function tampil_data_login(){
		$data=mysqli_query($this->con,"select*from login");
		while($d=mysqli_fetch_array($data)){
			$hasil[]=$d;
		}
		return $hasil;
	}
	function tampil_data_kendaraan(){
		$data=mysqli_query($this->con,"select*from kendaraan");
		while($d=mysqli_fetch_array($data)){
			$hasil[]=$d;
		}
		return $hasil;
	}
	function tampil_data_pemesanan(){
		$data=mysqli_query($this->con,"select*from pemesanan");
		while($d=mysqli_fetch_array($data)){
			$hasil[]=$d;
		}
		return $hasil;
	}
	function tampil_data_tiket(){
		$data=mysqli_query($this->con,"select*from tiket");
		while($d=mysqli_fetch_array($data)){
			$hasil[]=$d;
		}
		return $hasil;
	}
	function input_login($id,$username,$password,$status){
		mysqli_query($this->con,"insert into login values('$id','$username','$password','$status')");
	}
	function input_kendaraan($id,$anama,$jenis,$supir){
		mysqli_query($this->con,"insert into kendaraan values('$id','$nama','$jenis','$supir')");
	}
	function input_pemesanan($id,$nama,$alamat,$notelp){
		mysqli_query($this->con,"insert into pemesanan values('$id','$nama','$alamat','$notelp')");
	}
	function input_tiket($idtiket,$idadmin,$idpesan,$idkendaraan,$tanggal,$tujuan,$harga){
		mysqli_query($this->con,"insert into user values('$idtiket','$idadmin','$idpesan','$idkendaraan','$tanggal','$tujuan','$harga')");
	}
	function hapus_login($id){
		mysqli_query($this->con,"delete from login where id='$id'");
	}
	function hapus_kendaraan($id){
		mysqli_query($this->con,"delete from kendaraan where id_kendaraan='$id'");
	}
	function hapus_pemesanan($id){
		mysqli_query($this->con,"delete from pemesanan where id_pemesanan='$id'");
	}
	function hapus_tiket($id){
		mysqli_query($this->con,"delete from tiket where id_tiket='$id'");
	}
	function edit_login($id){
		$data=mysqli_query($this->con,"select*from login where id='$id'");
		while($d=mysqli_fetch_array($data)){
			$hasil[]=$d;
		}
		return $hasil;
	}
	function edit_pemesanan($id){
		$data=mysqli_query($this->con,"select*from pemesanan where id_pemesanan='$id'");
		while($d=mysqli_fetch_array($data)){
			$hasil[]=$d;
		}
		return $hasil;
	}
	function edit_kendaraan($id){
		$data=mysqli_query($this->con,"select*from kendaraan where id_kendaraan='$id'");
		while($d=mysqli_fetch_array($data)){
			$hasil[]=$d;
		}
		return $hasil;
	}
	function edit_tiket($id){
		$data=mysqli_query($this->con,"select*from tiket where id_tiket='$id'");
		while($d=mysqli_fetch_array($data)){
			$hasil[]=$d;
		}
		return $hasil;
	}
	function update_login($id,$username,$password,$status){
		mysqli_query("update login set username='$username',password='$password',status='$status' where id='$id'");
	}
	function update_kendaraan($id,$nama,$jenis,$supir){
		mysqli_query("update kendaraan set nama_kendaraan='$nama',jenis='$jenis',nama_supir='$supir' where id_kendaraan='$id'");
	}
	function update_pemesanan($id,$nama,$alamat,$notelp){
		mysqli_query("update pemesanan set nama='$nama',alamat='$alamat',no_telp='$notelp' where id_pemesanan='$id'");
	}
	function update_tiket($idtiket,$idadmin,$idpesan,$idkendaraan,$tanggal,$tujuan,$harga){
		mysqli_query("update user set id_admin='$idadmin',id_pemesanan='$idpesan',id_kendaraan='$idkendaraan',tanggal='$tanggal',tujuan='$tujuan',harga='$harga' where id_tiket='$idtiket'");
	}
}
?>