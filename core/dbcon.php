<?php 
$host="localhost";
$user="root";
$pass="";
$db="green";

$cn=mysqli_connect($host,$user,$pass,$db);
if(mysqli_connect_errno())
	{
		echo "<b style='color:red'>Failed to connect to your Hosting Database</b>:".mysqli_connect_error();
	}

?>