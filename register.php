<?php
$fnam=$_POST["name"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$mobile=$_POST["mobile"];
$gen=$_POST["gender"];
$b=$_POST["password"];
$servername="localhost";
$username="root";
$password="";
$db="radha";
$conn=mysqli_connect($servername,$username,$password,$db);
$sql="INSERT INTO `fb1` (`Username`, `email`, `Mobile`,`Dob`,`Gender`,`Password`) VALUES ('$fnam','$email','$mobile','$dob','$gen','$b')";
mysqli_query($conn,$sql);
header('Location:sess.php');
?>