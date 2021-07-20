<?php 
include '../model/Database.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysql_query("select * from login where username='$username' and password='$password'");
$cek = mysql_num_rows($login);
header("location:../view/index.html");
/*if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	
}else{
	header("location:../view/index.html");	
}*/
 
?>