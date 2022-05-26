<?php
    session_start();
    if(!isset($_SESSION["admin_name"]))
    {
        header('Location:login.php');
    }
    if(isset($_SESSION["2fa"]))
    {
        $code=random_int(100000, 999999);
        $_SESSION["code"]=$code;
        $remail	= $_SESSION["admin_email"];
        $email		= 'info@healthycare.com';
        $mail_subject = '2FA Code From Website';
        $email_body   = "<h1>Your 2FA Code for the login is <strong>{$code}<strong></h1><br>";
                    

        $header = "From: {$email}\r\nContent-Type: text/html;";
        $send_mail_result=mail($remail, $mail_subject, $email_body, $header);
                    
        if ( $send_mail_result ) {
            echo "Code Sent";
        } else {
            echo "Code Not Sent!";
        }
        unset($_SESSION["2fa"]);
    }
                      
    if(isset($_POST["login"]))
    {
        $password=$_POST["password"];
        if($_SESSION["code"]==$password){
            if(isset($_SESSION["pin"])&&$_SESSION["pin"]!=0)
            {
                header('Location:pin.php');
            }else if(isset($_SESSION["reset_password"])&&$_SESSION["reset_password"]!=0){
                header('Location:resetpassword.php');
            }else{
                header('Location:index.php');
            }
        }else{
        echo "Wrong Code";
        }
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
    <form action="2fa.php" method="post">
      <div class="form-group">
        <label>2FA Code</label>
        <p>Please check your email for the code.</p>
        <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
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