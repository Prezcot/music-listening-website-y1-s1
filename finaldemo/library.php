<!DOCTYPE html>
<html>
<head>
	<title>NotSpot</title>
	<link rel="stylesheet" href="library.css">
</head>
<body>


<style>
		
	.libraryimage{
	  background-color: #0eadc4;
	  border-radius: 10px;

	}
</style>


	<div class="search">
			<div class="menu">
				<img class='menuimage' src='icons/pngegg.png' width="60px" height="60px">
				<div class="displaymenu">
					<a href="changepswrd.php">Change password</a><br>
					<a href="LoginPage.php" id="logout" >Log out</a><br>
				</div>
			</div>
	</div>

	<div class="navbar">
		<div class="heading">
			<img class="logo" src="icons/logo.png" width="100px" height="100px"><h1>NotSpot</h1>
		</div>
		<div class="navbaricons">
			<a href="home2.html" class="home"><img class="homeimage" src="icons/pic3.png" width="50px" height="50px"></a><h2>Home</h2>
			<a href="library.php" class="library"><img class="libraryimage" src="icons/pic2.png" width="50px" height="50px"></a><h2>Library</h2>
			<a href="aboutus2.html" class="aboutus"><img class="aboutusimage" src="icons/pic1.png" width="50px" height="50px"></a><h2>About Us </h2>
            <a href="contactus2.html" class="contactus"><img class="contactusimage" src="icons/contactus.png" width="50px" height="50px"></a><h2>Contact Us</h2>

		</div>
	</div>



	<div class="songarea" id="songareaid">
		<div class="uploadsongarea">
			<form action="" method="POST" enctype="multipart/form-data">
				<input id="file_select_button" type='file' name='audio_file' required="required" accept="audio/mp3">
				<input id="file_upload_button" type='submit' value='Upload' name='upload_button'>
			</form>
		</div>
	</div>




<?php

error_reporting(0);
echo '<div class="songlist" align="center">';
echo '<h1><u>Song List</u><br><br></h1>';

$filename = $_FILES['audio_file']['name'];
$location = './song_storage/' . $filename;


display_audio();

if(move_uploaded_file($_FILES['audio_file']['tmp_name'],$location))
{

	echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://localhost/finaldemo/library.php'>";

	save_audio_in_database($filename);

}


function save_audio_in_database($filename){

	$conn = mysqli_connect('localhost','root','','audio_database');
	if(!$conn){
		echo "<script>alert('Database Error on connection')</script>";
	}

	else{

		$check_query = "select * from songs where filename='{$filename}'";
		$temp=mysqli_query($conn,$check_query);
		if (mysqli_num_rows($temp)>=1){
			echo "<script> alert('A song with the same name already exists')</script>";
		}
		else{

			$query = "insert into songs(filename) values('{$filename}')";
			mysqli_query($conn,$query);
			if (mysqli_affected_rows($conn)>0) echo "<script>alert('$filename Uploaded to the database and stored locally')</script>";
			else echo "<script>alert('Error has occured on database save')</script>";

			mysqli_close($conn);
		}

	}

}


function display_audio(){
	$conn = mysqli_connect('localhost','root','','audio_database');
	if(!$conn){
		echo "<script>alert('Database Error on connection')</script>";
	}

	$query = 'select * from songs';

	$r = mysqli_query($conn,$query);
	while ($row = mysqli_fetch_array($r)){


		echo '<a href="play.php?name='.$row['filename'].'">' . $row['filename'] . '</a> &nbsp&nbsp&nbsp&nbsp&nbsp';
		echo '<a href="delete.php?id='.$row['id'].'">'."<img src=icons/delete.png width=20 height=20><br>";

	}


}



echo '</div>';
?>



</body>
</html>