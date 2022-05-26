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
    
    if(isset($_POST["send"]))
    {                
        $reciveremail = $_POST['email'];
        $message= $_POST['message'];
		$sub = $_POST['subject'];
		
		$remail = 'ahamedafzal45@gmail.com';
		$mail_subject = $sub;
        $email_body = "<h3>{$message}</h3>";
        $email		= 'admin@healthycare.com';
        
        $header = "From: {$email}\r\nContent-Type: text/html;";
        $send_mail_result=mail($remail, $mail_subject, $email_body, $header);                    
                
                
                if ( $send_mail_result ) { ?>
                    <br><br><br><br>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:80%; margin:auto;">
                      <strong>Email Successfully Sent!</strong> You have successfully sent the email .
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> <?php
                    
                } else { ?>
                    <br><br><br><br>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:80%; margin:auto;">
                      <strong>Email Couldn't Sent!</strong> You have problem with sending email .
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> <?php
                }
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
        <title>Admin | Healthy Care</title>
  </head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar navbar-light shadow p-3 mb-5 bg-white rounded justify-content-between" style="background-color: white;">
  <a class="navbar-brand">Email Management</a>

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

<div style="width:100%; margin:auto;">
  <div class="row">
    <div class="col">
        <div class="notification3">
         <h5>Recent Email</h5>
<table class="table">     
  <thead>
    <tr>
        <th scope="col">#ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Telephone</th>
        <th scope="col">Date & Time</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php 
    $sql2 ="SELECT * FROM ( SELECT * FROM `email` ORDER BY email_id DESC LIMIT 3 ) sub ORDER BY email_id ASC";
    $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>0) 
    {
	   while($row = mysqli_fetch_assoc($result2))
        {
	?>
    <tr>
        <th><?php echo $row['email_id']; ?></th>
        <td><?php echo $row['sender_name']; ?></td>
        <td><?php echo $row['sender_email']; ?></td>
        <td><?php echo $row['sender_telephone']; ?></td>
        <td><?php echo $row['email_datetime']; ?></td>
        <td><?php 
        if($row['email_status']=="Pending"){
            ?><span class="btn btn-primary btn-sm"><?php echo $row['email_status']; ?></span><?php 
        }else if($row['email_status']=="Read"){
            ?><span class="btn btn-success btn-sm"><?php echo $row['email_status']; ?></span><?php 
        }
        ?>
        </td>
    </tr>
    	<?php
		}
    }else{
    echo "No Emails Available";
    }?>
      
  </tbody>
</table> 
        </div>
    </div>
    <div class="col">
      <div class="notification4">
         <h5>Analytics</h5><hr>
                <?php
              $today=date("Y-m-d");
              $sql2 ="SELECT COUNT(*) FROM `email` WHERE `email`.`email_datetime` LIKE '".$today."%';";
              $result2 = mysqli_query($con,$sql2);
                if(mysqli_num_rows($result2)>0)
                {
                   while($row = mysqli_fetch_assoc($result2))
                    {
                       $orders=$row['COUNT(*)'];
                    }
                }
                $today=date("Y-m-d", strtotime("+1 day"));
                $last30=date("Y-m-d", strtotime("-1 month"));
                $last7=date("Y-m-d", strtotime("-7 day"));
                $last15=date("Y-m-d", strtotime("-15 day"));
                
                $sql3 ="SELECT COUNT(*) FROM `email` WHERE `email`.`email_datetime` BETWEEN '".$last30."' AND '".$today."';";
                $result3 = mysqli_query($con,$sql3);
                if(mysqli_num_rows($result3)>0)
                {
                   while($row = mysqli_fetch_assoc($result3))
                    {
                       $orders2=$row['COUNT(*)'];
                    }
                }
                $sql4 ="SELECT COUNT(*) FROM `email` WHERE `email`.`email_datetime` BETWEEN '".$last7."' AND '".$today."';";
                $result4 = mysqli_query($con,$sql4);
                if(mysqli_num_rows($result4)>0)
                {
                   while($row = mysqli_fetch_assoc($result4))
                    {
                       $orders3=$row['COUNT(*)'];
                    }
                }
                $sql5 ="SELECT COUNT(*) FROM `email` WHERE `email`.`email_datetime` BETWEEN '".$last15."' AND '".$today."';";
                $result5 = mysqli_query($con,$sql5);
                if(mysqli_num_rows($result5)>0)
                {
                   while($row = mysqli_fetch_assoc($result5))
                    {
                       $orders4=$row['COUNT(*)'];
                    }
                }
            ?>
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td><h2><?php echo $orders ?></h2></td>
                  <td><h2><?php echo $orders3 ?></h2></td>
                  <td><h2><?php echo $orders4 ?></h2></td>
                  <td><h2><?php echo $orders2 ?></h2></td>
                </tr>
                <tr>
                  <td>Today</td>
                  <td>Last Week</td>
                  <td>Last 15 Days</td>
                  <td>Last 30 Days</td>
                </tr>
              </tbody>
            
            <?php 
            $c1=0;
            $c2=0;
            $sql6 ="SELECT COUNT(*) FROM `email` WHERE `email`.`email_status`='Pending';";
            $result6 = mysqli_query($con,$sql6);
            if(mysqli_num_rows($result6)>0)
            {
                while($row = mysqli_fetch_assoc($result6))
                {
                    $c1=$row['COUNT(*)'];
                }
            } 
            $sql7 ="SELECT COUNT(*) FROM `email` WHERE `email`.`email_status`='Read';";
            $result7 = mysqli_query($con,$sql7);
            if(mysqli_num_rows($result7)>0)
            {
                while($row = mysqli_fetch_assoc($result7))
                {
                    $c2=$row['COUNT(*)'];
                }
            } 
            
            
            ?>
            
            </table>
             <table class="table table-bordered">
              <tbody>
                <tr>
                  <td class="bg-primary text-white"><h2><?php echo $c1 ?></h2></td>
                  <td class=""><h2><?php echo $c2 ?></h2></td>
                  
                  
                </tr>
                <tr>
                  <td class="">Pending</td>
                  <td class="bg-success text-white">Read</td>
                  
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>
</div>
    <br><br>
    <div class="notification2" id="email">
       <h3>Email</h3>
                
         
  <div class="row">
    <div class="col">
        <div class="overflow-auto" style="max-height: 70vh;">         
            <div class="list-group">
                <?php 
                    $sql2 ="select * from email";
                    $result2 = mysqli_query($con,$sql2);
                    if(mysqli_num_rows($result2)>0)
                    {
                	   while($row = mysqli_fetch_assoc($result2))
                        {  ?> 
                             
                                    <a href="email.php?email_id=<?php echo $row['email_id']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                          <h5 class="mb-1"><?php echo $row['sender_subject']; ?></h5>
                                          <small class="text-muted"><?php echo $row['email_status']; ?></small>
                                        </div>
                                        <p class="mb-1"><?php echo $row['sender_message']; ?></p>
                                        <small class="text-muted"><?php echo $row['email_datetime']; ?></small>
                                      </a>
                            <?php
                        }
                    } ?>
            </div>
        </div>
        
    </div>
    <div class="col">
        <?php
    if (isset($_GET['email_id']))
    {
        ?>
      <form action="email.php" method="post">
          <?php
            $sql2 ="update email set email_status='Read' where email_id='".$_GET['email_id']."';";
            mysqli_query($con,$sql2);
            $sql3 ="select * from email where email_id='".$_GET['email_id']."';";
            $result3 = mysqli_query($con,$sql3);
            if(mysqli_num_rows($result3)>0)
            {
               while($row = mysqli_fetch_assoc($result3))
               {  ?>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="<?php echo $row['email_id']; ?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="<?php echo $row['sender_name']; ?>" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" value="<?php echo $row['sender_email']; ?>" name="email" id="email" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Telephone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="<?php echo $row['sender_telephone']; ?>"disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Subject</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="<?php echo $row['sender_subject']; ?>" name="subject" id="subject" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Date & Time</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="<?php echo $row['email_datetime']; ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Message</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" disabled><?php echo $row['sender_message']; ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Reply Message</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" name="message" id="message" required></textarea>
            </div>
          </div>
          
          
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="submit" class="btn btn-primary" value="Send Reply" id="send" name="send">
            </div>
          </div>
          <?php }} ?>
        </form>
        <?php  } ?>
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