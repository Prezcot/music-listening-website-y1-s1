<?php

if (isset($_GET['id'])){

	$conn = mysqli_connect('localhost','root','','audio_database');
	if(!$conn){
		echo "<script>alert('Database Error on connection')</script>";
	}

	$query = 'delete from songs where id='.$_GET['id'];

	if (mysqli_query($conn,$query))
		echo "<script>alert('Song Successfully Deleted')</script>";
	else echo "<script>alert('Song wasn't Deleted')</script>";
	echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://localhost/finaldemo/library.php'>";
}


?>