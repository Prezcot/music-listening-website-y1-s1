<html>
	<head>
		<title>Sign Up</title>
		<style>
			.textbox{width:300;
				height:50;
			}
			.vertline{
				border-left: 1px solid black;
				height:600px;
				margin-left:50%;
				position:absolute;
			}	
			.table{
				position:absolute;
			}
            #Descrip
            {
                border:solid 2px; 
            }

		</style>
	</head>
	<body bgColor="#82eefe">
		
	<br> <br> <br>
		
			<table border=0 class="table">
				<tr>
					<td></td>
					<td> <br><br><br> </td>
				</tr>
				<div class="vertline">
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<table border=0>
							<tr>
								<td><img src="icons/logo.png" height="130" width="130"></td>
								<td><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NotSpot</h1></td>
							</tr>
						</table>
						<h1><br>&nbsp;Welcome!</h1></td>
				</tr>
			<tr>
				<td></td>
				<td>&nbsp;&nbsp;&nbsp;Log in to manage your account and get access to the best music with the best features and more.<br>&nbsp;&nbsp;&nbsp;Now's a great time to get online, so let's do this.<br><br></td>
			</tr>
			<tr>
				<td></td>
				<td><h2>&nbsp;&nbsp;Don't have an account?</h2>&nbsp;&nbsp;&nbsp;Start now and start listening now with the best quality.</td>
			</tr>
				
				<form method="post" action="SignUp.php" name="frm">
					<table border=0 align="right">
						<tr>
							<td> <br> </td>
						</tr>
						<tr>
							<td><h1><br>Create your NotSpot Account</h1><br> <br> </td>
						</tr>
						<tr>
							<td><table  border=0 align="right">
								<tr>
									<td><p>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
									<input type="text" name="fname" placeholder="Enter your name" class="textbox"></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								</tr>
							</table>
							<br> <br> <br> <br> <br> <br> <br>
							<table border=0 align="right">
								<tr>
									<td><p>Password</p>
									<input type="password" name="password" placeholder="Minimum 6 characters with a number and a letter" class="textbox"></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><p>Re-type Password</p>
									<input type="password" name="password2" placeholder="Re-type your password" class="textbox"></td>
								</tr>
							</table>
							<br> <br> <br> <br> <br> <br> <br>
							<input type="checkbox" name="termsandconditions">I agree to all Terms and Condtions
							<p align="right"><input type="submit" value="Create Account" ></p>
							<br> <br>
							Already have an account? <a href="LoginPage.php">Login</a>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
					</table>
				</form>
				</div>
		</table>



<?php
error_reporting(0);
$name=$_POST["fname"];
$pswrd=$_POST["password"];
$pswrd2=$_POST['password2'];
$server="localhost";
$user="root";
$pw="";
$db="audio_database";
if (isset($_POST['fname'])){
	if(empty($name))
	{
		echo"<script>alert('Fill all fields before proceeding')</script>";
	}
	elseif(empty($pswrd))
	{
		echo"<script>alert('Fill all fields before proceeding')</script>";
	}
	elseif(empty($pswrd))
	{
		echo"<script>alert('Fill all fields before proceeding')</script>";
	}
	elseif(strlen($pswrd)<6)
	{
		echo "<script>alert('Password length insufficient')</script>";
	}
	elseif($pswrd != $pswrd2)
	{
		echo "<script>alert('Passwords do not match')</script>";
	}


	else
	{
        
	$conn = new mysqli($server,$user,$pw,$db);
	$sql1= "SELECT * FROM user WHERE Name='$name'";
	$result = mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result) > 0) 
	{
	        echo "<script>alert('A user with those credentials already exist in our Db, please use different credentials!')</script>";	

	}
	else
	{

	    $sql="INSERT INTO user(Name,Password) VALUES ('$name','$pswrd')";
	        if($conn->query($sql)==true)
	        {
	            echo"<script>alert('Signed up successfully!')</script>";
	            echo"<script>location.href='home2.html'</script>";
	        }
	}
	}





}
?>
	</body>
</html>

