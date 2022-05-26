<?php
    session_start();
    if(!isset($_SESSION["admin_name"]))
    {
        header('Location:admin-login.php');
    }
    $con=mysqli_connect("localhost","root","","healthycare");
    if(!$con){	
		die("Cannot connect to DB server");	
    }
    
    if(isset($_POST["update"]))
    {
        $key2=$_GET["key"];
        $reset=0;
        $pin=0;
        $fa2=0;
        $activity=0;
        if (isset($_POST['reset'])){
            $reset=1;
        }
        if (isset($_POST['pin'])) {
            $pin=$key2;
        }
        if (isset($_POST['2fa'])) {
            $fa2=1;
        }
        if (isset($_POST['activity'])) {
            $activity=1;
        }
        $sql2="UPDATE `admin` SET `activity`='".$activity."', `2fa`='".$fa2."', `pin`='".$pin."', `reset_password`='".$reset."' WHERE username='".$_SESSION["admin_name"]."';";
        mysqli_query($con,$sql2);
        
    }
    
?> 
<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="/img/sheet.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        
        <title>Admin | Healthy Care</title>
  </head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar navbar-light shadow p-3 mb-5 bg-white rounded justify-content-between" style="background-color: white;">
  <a class="navbar-brand">Settings</a>
  
  <span class="form-inline">
    <span class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <h7>Welcome <strong><?php echo $_SESSION["admin_name"]; ?></strong></h7>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php"><img src="/img/dashboard.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">Dashboard</a>
            <a class="dropdown-item" href="employee.php"><img src="/img/employee.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">Employee</a>
            <a class="dropdown-item" href="order.php"><img src="/img/order2.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">Order</a>
            <a class="dropdown-item" href="appointment.php"><img src="/img/appointment2.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">Appointment</a>
            <a class="dropdown-item" href="emergency.php"><img src="/img/emergency2.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">Emergency</a>
            <a class="dropdown-item" href="email.php"><img src="/img/email.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">Email</a>
            <a class="dropdown-item" href="setting.php"><img src="/img/setting.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">Setting</a>
            <a class="dropdown-item" href="https://www.stackcp.com/services/3790b5532b220c29/file-manager" target="_blank"><img src="/img/file.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">File</a>
            <a class="dropdown-item" href="https://phpmyadmin.stackcp.com/index.php" target="_blank"><img src="/img/database.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">Database</a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><img src="/img/logout.png" style="float: left; width: 18%; padding-right: 5px; padding-top: 4px;">Logout</a>
        </div>
      </span>
  </span>
</nav>

    <br><br><br><br>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />


<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8 mx-auto">
        <div class="my-4">
            <h5 class="mb-0 mt-5">Security Settings</h5>
            <p>These settings are helps you keep your account secure.</p>
            <div class="list-group mb-5 shadow">
                <?php
                        $sql2 ="SELECT * FROM `admin` WHERE username='".$_SESSION["admin_name"]."';";
                        $result2 = mysqli_query($con,$sql2);
                        if(mysqli_num_rows($result2)>0)
                        {
                    	   while($row = mysqli_fetch_assoc($result2))
                            {
                                $activity=$row['activity'];
                                $fa2=$row['2fa'];
                                $pin=$row['pin'];
                                $reset=$row['reset_password'];
                            }
                        }
                                if($activity==1){
                                    $activity="checked";
                                }else{
                                    $activity="";
                                }
                                if($fa2==1){
                                    $fa2="checked";
                                }else{
                                    $fa2="";
                                }
                                if($pin==0){
                                    $pin="";
                                    $code=random_int(100000, 999999);
                                }else{
                                    $code=$pin;
                                    $pin="checked";
                                }
                                if($reset==1){
                                    $reset="checked";
                                }else{
                                    $reset="";
                                }
                    ?>
                <form action="setting.php?key=<?php echo $code ?>" method="post">
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-2">Enable Activity Logs</strong>
                            <p class="text-muted mb-0">Track Last activities with your account.</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" data-toggle="toggle" data-size="sm" name="activity" <?php echo $activity ?> >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-2">2FA Authentication</strong>
                            <p class="text-muted mb-0">2FA is implemented to better protect both a user's credentials and the resources the user can access.</p>
                        </div>
                        <div class="col-auto">
                            <input type="checkbox" data-toggle="toggle" data-size="sm" name="2fa" <?php echo $fa2 ?> >
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-2">Activate Pin Code</strong>
                            <p class="text-muted mb-0">Use the given pincode for login.</p>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" name="key" id="key" value="<?php echo $code ?>" style="width:10%" disabled> 
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" data-toggle="toggle" data-size="sm" name="pin" <?php echo $pin ?> >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="mb-2">Activate Password Change</strong>
                            <p class="text-muted mb-0">Enable if you want a password change in the login page.</p>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" data-toggle="toggle" data-size="sm" name="reset" <?php echo $reset ?> >
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Save Changes" id="update" name="update" style="float: right;"><br><br>
                </div>
                </form>
                
            </div>
            
            <h5 class="mb-0">Recent Activity</h5>
            <p>Last activities with your account.</p>
            <div class="list-group mb-5 shadow">
            <table class="table border bg-white">
                <thead>
                    <tr>
                        <th>Device</th>
                        <th>IP</th>
                        <th>Time</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2 ="SELECT * FROM ( SELECT * FROM `admin_activity` ORDER BY id DESC LIMIT 5 ) sub ORDER BY id DESC";
                     $result2 = mysqli_query($con,$sql2);
                    if(mysqli_num_rows($result2)>0)
                    {
                	   while($row = mysqli_fetch_assoc($result2))
                        { ?>
                    <tr>
                        <th scope="col"><?php echo $row['device']; ?></th>
                        <td><?php echo $row['ip']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

</div>

    <br><br> 

  
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>