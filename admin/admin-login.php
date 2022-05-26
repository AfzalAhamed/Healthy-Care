<?php
    session_start();
    if(isset($_SESSION["admin_name"]))
    {
        header('Location:index.php');
    }
        if(isset($_POST["login"]))
            {
                $con=mysqli_connect("localhost","root","","healthycare");
                    if(!$con)
                    {
                        die("sorry we are facing a techincal issue");
                    }
                $user=$_POST["user"];
                $password=$_POST["password"];
            //$sql="SELECT * FROM `admin` WHERE username='".$user."' AND password=PASSWORD('".$password."');";
            $sql="SELECT * FROM `admin` WHERE username='".$user."' AND password='".$password."';";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0)
            {
				while($row = mysqli_fetch_assoc($result))
				{
                   $_SESSION["admin_name"]=$row['username'];
                   $_SESSION["admin_email"]=$row['email'];
                   $_SESSION["activity"]=$row['activity'];
                   $_SESSION["2fa"]=$row['2fa'];
                   $_SESSION["pin"]=$row['pin'];
                   $_SESSION["reset_password"]=$row['reset_password'];
				}
            }else{
                echo "Please Enter a correct email and password";
            }
            if(isset($_SESSION["activity"])&&$_SESSION["activity"]!=0)
            {
                $ip=$_SERVER['REMOTE_ADDR'];
                $string=$_SERVER['HTTP_USER_AGENT'];
                $str_arr = explode (" ", $string); 
                $device=$str_arr[1]." ".$str_arr[3]." ".$str_arr[4]." ".$str_arr[5]." ".$str_arr[10]; 
                $sql1="INSERT INTO `admin_activity` (`device`, `ip`, `time`) VALUES ('".$device."', '".$ip."', current_timestamp());";
                mysqli_query($con,$sql1);
                unset($_SESSION["activity"]);
            }
            if(isset($_SESSION["2fa"])&&$_SESSION["2fa"]!=0)
            {
                header('Location:2fa.php');
            }else if(isset($_SESSION["pin"])&&$_SESSION["pin"]!=0)
            {
                header('Location:pin.php');
            }else if(isset($_SESSION["reset_password"])&&$_SESSION["reset_password"]!=0)
            {
                header('Location:resetpassword.php');
            }else{
                header('Location:index.php');
            }
            mysqli_close($con);
            } 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Login</title>
      <style>
          body{
              background-color: darkslategray
          }
      </style>
  </head>
  <body>

      
      <div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col" style="background-color:white"><br>
        <img src="/img/logo.png" style="width: 50%;"><br>
    <form action="admin-login.php" method="post">
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" id="user" name="user" placeholder="Enter Username" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      </div>
      <input type="submit" class="btn btn-primary" value="Log In" id="login" name="login">
    </form><br><br>
    </div>
    <div class="col"></div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>