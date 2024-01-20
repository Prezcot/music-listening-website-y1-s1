<html>
    <head>
        <title>Change Password</title>
    </head>

    <style type="text/css">
        *{
            font-family: monospace;
            font-size: 20px;

        }
        form{
            text-align: center;
            background:white; 
            width:500px;
            height:auto;
            border-radius:20px;
            margin-top: 10%;
        }

        .formthingy{
            text-align: center;
            padding-top: 35px;
        }

    </style>



    <body bgcolor="#82eefe"><center>
        <form method="post" action=""><div class="formthingy">
            <p>Username</p><input type="text" name="uname"><br>
            <p>Current Password</p><input type="password" name="current"><br>
            <p>New Password</p><input type="password" name="new"><br>
            <p>Confirm New Password</p><input type="password" name="confirm"><br><br>
            <input type="submit" value="Submit"><br>
            <a href="home2.html"><img src="icons/go_back.png" width="70px" height="70px"></a>
        </div></form></center>
    </body>
</html>
<?php
error_reporting(0);
$currentpswrd=$_REQUEST["current"];
$newpswrd=$_REQUEST["new"];
$username=$_REQUEST["uname"];
$server="localhost";
$user="root";
$pw="";
$db="audio_database";  

if (isset($_REQUEST["uname"])){

    if (strlen($newpswrd)>5){
        $conn = new mysqli($server,$user,$pw,$db);
        $sql1= "SELECT ID FROM user WHERE Name='$username' AND Password='$currentpswrd'";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) 
        {
                        $sql2="UPDATE user SET Password = '$newpswrd' WHERE Name = '$username'";
                        if($conn->query($sql2)===true)
                        {
                            echo "<script>alert('Password Updated Successfully! Please login again!!!')</script>";
                            echo "<script>location.href='LoginPage.php'</script>";
                        }
        }
        else
            {
                echo "<script>alert('User not found, Enter credentials again!')</script>";
            }
        
    }
    else echo "<script>alert('Password must be greater than 5 characters')</script>";
}
?>