<?php 
include '../model/Database.php';
$db=new database();
/*$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query("select * from login where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:../view/index.html");
}else{
	header("location:../view/login.html");	
}*/
session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT id FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($data,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location:../view/index.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
 /*  $username = $_POST['username'];
   $password = $_POST['password'];

//$login = mysqli_query("select * from login where username='$username' and password='$password' and status='admin'");
//$cek = mysqli_num_rows($login);
  cek_admin();
if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:../view/index.html");
}else{
	header("location:../view/login.html");	
}*/
?>