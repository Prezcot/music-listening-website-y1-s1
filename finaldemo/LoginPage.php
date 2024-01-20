<html>
	<head>
		<title>Login</title>
		<style>
			
			.textbox{
				width:370;
				height:55;
                border-radius:10px;
			}
			.loginbutton{
				font-size: 20px;
				width:350px;
				height:45;
                border-radius:10px;
                  background-color: #2196f3;
                  color: white;
                  padding: 14px 20px
                  margin: 8px 0;
                  border: none;
                  cursor: pointer;
			}
            #bottom_portion
            {
                
            }
            h1
            {
                color:black;
                font-family:sans-serif;
            }
            #formdiv
            {
                background:white; 
                width:500px;
                height:500px;
                border-radius:20px;
            }
            .loginbutton:hover {opacity: 0.8;}



		</style>
        <script>
			function function01()
			{
				if(document.frm.fname.value.length==0)
				{
					alert("Fill all fields before proceeding");
				}
				else if(document.frm.password.value.length==0)
				{
					alert("Fill all fields before proceeding");
				}
				else if(document.frm.password.value.length<6)
				{
					alert("Password length insufficient");
				}
                else
                {
                    location.href="LoginPage.php";
                }
			}
			</script>
	</head>
	<body bgColor="aqua">
        <div id="top_portion">
		
        </div>
        <div id="bottom_portion">
		<br> <br>
		<center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div id="formdiv">
                <form method="post" action="LoginPage.php" name="frm">
			
				<br>
					<table border=0>
            <tr>
                <td><img src="icons/logo.png" height="100" width="100">
                    <td><h1><br>NotSpot</h1></td>
            </tr>
        </table>
					
					<p>Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
					<input type="text" name="fname" placeholder="Enter your Username" class="textbox">
					
				<p>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
					<input type="password" name="password" placeholder="Enter password" class="textbox">
					<br> <br>
								
								<br><input type="submit" value="Login" class="loginbutton" onclick="function01()"><br><br><br>Don't have an account? <a href="SignUp.php">Sign In</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 </form>
            </div>
		</center>
        </div>

<?php
error_reporting(0);
$name=$_POST["fname"];
$pswrd=$_POST["password"];
$server="localhost";
$user="root";
$pw="";
$db="audio_database";
    


if(!empty($name) || !empty($pswrd)){
	$conn = new mysqli($server,$user,$pw,$db);
	$sql1= "SELECT * FROM user WHERE Name='$name' AND Password='$pswrd';";
	$result = $conn->query($sql1);
	unset($_POST['fname']);
	unset($_POST['pswrd']);
	$_POST = array();
	if ($result->num_rows > 0) 
	{
	    echo"<script> location.href='home2.html'; </script>";
	}
	else
	{
	    echo "<script>alert('User not found! Please try signing up, or using different credentials.')</script>";
	}
}


?>
	</body>
</html>