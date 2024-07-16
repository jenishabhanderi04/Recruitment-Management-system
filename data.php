<?php
$servername = "localhost";
$username ="root";
$password = " ";
$db = "jobs";

$conn = mysqli_connect($servername,$username,$password,$db);

 if(!$conn)
 {
 	echo" not connected ";
 }
 else
 {
 	echo"connected";
 }
?>