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
    if(isset($_POST["csearch"]))
    {
        $value=$_POST["value"];
        $column=$_POST["column"];
        ?>
        <br><br><br><br>
                <div class="notification2">
                <table class="table">     
                  <thead>
                    <tr>
                      <th scope="col">#ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Gender</th>
                        <th scope="col">DOB</th>
                      <th scope="col">Address</th>
                      <th scope="col">Telephone</th>
                         <th scope="col">Town</th>
                        <th scope="col">NIC</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $sql2 ="SELECT * FROM `customer` WHERE ".$column." LIKE '%".$value."%'";
                      $result2 = mysqli_query($con,$sql2);
                    if(mysqli_num_rows($result2)>0)
                    {
                	   while($row = mysqli_fetch_assoc($result2))
                        {
                	?>
                    <tr>
                      <th><?php echo $row['c_id']; ?></th>
                      <td><?php echo $row['c_name']; ?></td>
                      <td><?php echo $row['c_email']; ?></td>
                      <td><?php echo $row['c_gender']; ?></td>
                        <td><?php echo $row['c_dob']; ?></td>
                      <td><?php echo $row['c_address']; ?></td>
                      <td><?php echo $row['c_telephone']; ?></td>
                    <td><?php echo $row['c_town']; ?></td>
                        <td><?php echo $row['c_nic']; ?></td>
                    </tr>
                    	<?php
                		}
                    }else{ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:80%; margin:auto;">
                          <strong>No Result Found.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php 
                    }?>
                  </tbody>
                </table> 
                 </div>
                 <hr>
                 <?php 
        
    }
    if(isset($_POST["dsearch"]))
    {
        $value=$_POST["value"];
        $column=$_POST["column"];
        ?>
        <br><br><br><br>
                <div class="notification2">
                <table class="table">     
                  <thead>
                    <tr>
                      <th scope="col">#ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                        <th scope="col">DOB</th>
                      <th scope="col">Address</th>
                      <th scope="col">Telephone</th>
                         <th scope="col">Town</th>
                        <th scope="col">License</th>
                        <th scope="col">Jobs</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $sql2 ="SELECT * FROM `delivery` WHERE ".$column." LIKE '%".$value."%'";
                      $result2 = mysqli_query($con,$sql2);
                    if(mysqli_num_rows($result2)>0)
                    {
                	   while($row = mysqli_fetch_assoc($result2))
                        {
                	?>
                    <tr>
                      <th><?php echo $row['d_id']; ?></th>
                      <td><?php echo $row['d_name']; ?></td>
                      <td><?php echo $row['d_email']; ?></td>
                        <td><?php echo $row['d_dob']; ?></td>
                      <td><?php echo $row['d_address']; ?></td>
                      <td><?php echo $row['d_telephone']; ?></td>
                    <td><?php echo $row['d_town']; ?></td>
                        <td><?php echo $row['d_lcence']; ?></td>
                        <td><?php echo $row['count']; ?></td>
                    </tr>
                    	<?php
                		}
                    }else{ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:80%; margin:auto;">
                          <strong>No Result Found.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php 
                    }?>
                  </tbody>
                </table> 
                 </div>
                 <hr>
                 <?php 
        
    }
    if(isset($_POST["psearch"]))
    {
        $value=$_POST["value"];
        $column=$_POST["column"];
        ?>
        <br><br><br><br>
                <div class="notification2">
                <table class="table">     
                  <thead>
                    <tr>
                      <th scope="col">#ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                      <th scope="col">Telephone</th>
                         <th scope="col">Town</th>
                        <th scope="col">License</th>
                        <th scope="col">Jobs</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $sql2 ="SELECT * FROM `pharmacy` WHERE ".$column." LIKE '%".$value."%'";
                      $result2 = mysqli_query($con,$sql2);
                    if(mysqli_num_rows($result2)>0)
                    {
                	   while($row = mysqli_fetch_assoc($result2))
                        {
                	?>
                    <tr>
                      <th><?php echo $row['p_id']; ?></th>
                      <td><?php echo $row['p_name']; ?></td>
                      <td><?php echo $row['p_email']; ?></td>
                      <td><?php echo $row['p_address']; ?></td>
                      <td><?php echo $row['p_telephone']; ?></td>
                    <td><?php echo $row['p_town']; ?></td>
                        <td><?php echo $row['p_licecne']; ?></td>
                        <td><?php echo $row['count']; ?></td>
                    </tr>
                    	<?php
                		}
                    }else{ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:80%; margin:auto;">
                          <strong>No Result Found.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php 
                    }?>
                  </tbody>
                </table> 
                 </div>
                 <hr>
                 <?php 
        
    }
    if(isset($_POST["chsearch"]))
    {
        $value=$_POST["value"];
        $column=$_POST["column"];
        ?>
        <br><br><br><br>
                <div class="notification2">
                <table class="table">     
                  <thead>
                    <tr>
                      <th scope="col">#ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                      <th scope="col">Telephone</th>
                         <th scope="col">Town</th>
                        <th scope="col">License</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $sql2 ="SELECT * FROM `chanelcenter` WHERE ".$column." LIKE '%".$value."%'";
                      $result2 = mysqli_query($con,$sql2);
                    if(mysqli_num_rows($result2)>0)
                    {
                	   while($row = mysqli_fetch_assoc($result2))
                        {
                	?>
                    <tr>
                      <th><?php echo $row['ch_id']; ?></th>
                      <td><?php echo $row['ch_name']; ?></td>
                      <td><?php echo $row['ch_email']; ?></td>
                      <td><?php echo $row['ch_address']; ?></td>
                      <td><?php echo $row['ch_telephone']; ?></td>
                    <td><?php echo $row['ch_town']; ?></td>
                        <td><?php echo $row['ch_licence']; ?></td>
                    </tr>
                    	<?php
                		}
                    }else{ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:80%; margin:auto;">
                          <strong>No Result Found.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php 
                    }?>
                  </tbody>
                </table> 
                 </div>
                 <hr>
                 <?php 
        
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
  <a class="navbar-brand">Dashboard</a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
   <div class="navbar-nav"  style="color:black">
      <a class="nav-item nav-link" href="#customer">Customer</a>
      <a class="nav-item nav-link" href="#delivery">Delivery</a>
      <a class="nav-item nav-link" href="#pharmacy">Pharmacy</a>
      <a class="nav-item nav-link" href="#channel center">Channel Center</a>
    </div>
</div>
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
<div style="width:80%; margin:auto;">
  <div class="row">
    <div class="col">
        <div class="notification">
            <?php
              $today=date("Y-m-d");
              $sql2 ="SELECT COUNT(*) FROM `order` WHERE `order`.`o_datetime` LIKE '".$today."%';";
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
                $sql3 ="SELECT COUNT(*) FROM `order` WHERE `order`.`o_datetime` BETWEEN '".$last30."' AND '".$today."';";
                $result3 = mysqli_query($con,$sql3);
                if(mysqli_num_rows($result3)>0)
                {
                   while($row = mysqli_fetch_assoc($result3))
                    {
                       $orders2=$row['COUNT(*)'];
                    }
                }
            ?>
            <h5>Medicine Orders</h5><br>
            <table class="table1">
              <tbody>
                <tr>
                    <td width="30%">
                        <h2><?php echo $orders ?></h2>
                        <h7 style="color: green">(Today)</h7>
                    </td>
                    <td width="40%">
                        <h2><?php echo $orders2 ?></h2>
                        <h7 style="color: red">(Last 30 Days)</h7>
                    </td>
                    <td><img src="/img/order.png" style="float: right; width: 70%;"></td>
                </tr>
              </tbody>
            </table> 
        </div>
      </div>
    <div class="col">
      <div class="notification">
          <?php
              $today=date("Y-m-d");
              $sql2 ="SELECT COUNT(*) FROM `appointment` WHERE `appointment`.`a_datetiime` LIKE '".$today."%';";
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
                $sql3 ="SELECT COUNT(*) FROM `appointment` WHERE `appointment`.`a_datetiime` BETWEEN '".$last30."' AND '".$today."';";
                $result3 = mysqli_query($con,$sql3);
                if(mysqli_num_rows($result3)>0)
                {
                   while($row = mysqli_fetch_assoc($result3))
                    {
                       $orders2=$row['COUNT(*)'];
                    }
                }
            ?>
            <h5>Appointments</h5><br>
            <table class="table1">
              <tbody>
                <tr>
                    <td width="30%">
                        <h2><?php echo $orders ?></h2>
                        <h7 style="color: green">(Today)</h7>
                    </td>
                    <td width="40%">
                        <h2><?php echo $orders2 ?></h2>
                        <h7 style="color: red">(Last 30 Days)</h7>
                    </td>
                    <td><img src="/img/appointment.png" style="float: right; width: 70%;"></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    <div class="col">
      <div class="notification">
          <?php
              $today=date("Y-m-d");
              $sql2 ="SELECT COUNT(*) FROM `emergency` WHERE `emergency`.`er_datetime` LIKE '".$today."%';";
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
                $sql3 ="SELECT COUNT(*) FROM `emergency` WHERE `emergency`.`er_datetime` BETWEEN '".$last30."' AND '".$today."';";            
                $result3 = mysqli_query($con,$sql3);
                if(mysqli_num_rows($result3)>0)
                {
                   while($row = mysqli_fetch_assoc($result3))
                    {
                       $orders2=$row['COUNT(*)'];
                    }
                }
            ?>
            <h5>Emergency Requests</h5><br>
            <table class="table1" width="100%">
              <tbody>
                <tr>
                    <td width="30%">
                        <h2><?php echo $orders ?></h2>
                        <h7 style="color: green">(Today)</h7>
                    </td>
                    <td width="40%">
                        <h2><?php echo $orders2 ?></h2>
                        <h7 style="color: red">(Last 30 Days)</h7>
                    </td>
                    <td><img src="/img/emergency.png" style="float: right; width: 70%;"></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
      <div class="col">
      <div class="notification">
          <?php
              $today=date("Y-m-d");
              $sql2 ="SELECT COUNT(*) FROM `email` WHERE `email`.`email_datetime` LIKE '".$today."%';";
              $result2 = mysqli_query($con,$sql2);
                if(mysqli_num_rows($result2)>0)
                {
                   while($row = mysqli_fetch_assoc($result2))
                    {
                       $email=$row['COUNT(*)'];
                    }
                }
                $today=date("Y-m-d", strtotime("+1 day"));
                $last30=date("Y-m-d", strtotime("-1 month"));
                $sql3 ="SELECT COUNT(*) FROM `email` WHERE `email`.`email_datetime` BETWEEN '".$last30."' AND '".$today."';";            
                $result3 = mysqli_query($con,$sql3);
                if(mysqli_num_rows($result3)>0)
                {
                   while($row = mysqli_fetch_assoc($result3))
                    {
                       $email2=$row['COUNT(*)'];
                    }
                }
            ?>
            <h5>Contact Forms</h5><br>
            <table class="table1" width="100%">
              <tbody>
                <tr>
                    <td width="30%">
                        <h2><?php echo $email ?></h2>
                        <h7 style="color: green">(Today)</h7>
                    </td>
                    <td width="40%">
                        <h2><?php echo $email2 ?></h2>
                        <h7 style="color: red">(Last 30 Days)</h7>
                    </td>
                    <td><img src="/img/email.png" style="float: right; width: 70%;"></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
  </div>
</div>
    
    <br><br>
    
<div style="width:100%; margin:auto;">
  <div class="row">
    <div class="col">
        <div class="notification3">
         <h5>Recent Orders</h5>
<table class="table">     
  <thead>
    <tr>
        <th scope="col">#ID</th>
        <th scope="col">Customer</th>
        <th scope="col">Delivery</th>
        <th scope="col">Pharmacy</th>
        <th scope="col">Date Time</th>
        <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql2 ="SELECT * FROM ( SELECT * FROM `order` ORDER BY o_id DESC LIMIT 5 ) sub ORDER BY o_id ASC";
      $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>0)
    {
	   while($row = mysqli_fetch_assoc($result2))
        {
	?>
    <tr>
        <th><?php echo $row['o_id']; ?></th>
        <td><?php echo $row['c_id']; ?></td>
        <td><?php echo $row['d_id']; ?></td>
        <td><?php echo $row['p_id']; ?></td>
        <td><?php echo $row['o_datetime']; ?></td>
        <td><?php 
        if($row['o_status']=="Processing"){
           ?><span class="btn btn-primary btn-sm"><?php echo $row['o_status']; ?></span><?php 
        }else if($row['o_status']=="Delivered"){
           ?><span class="btn btn-success btn-sm"><?php echo $row['o_status']; ?></span><?php 
        }else if($row['o_status']=="Canceled"){
           ?><span class="btn btn-danger btn-sm"><?php echo $row['o_status']; ?></span><?php 
        }else if($row['o_status']=="Hand Overed"){
           ?><span class="btn btn-info btn-sm"><?php echo $row['o_status']; ?></span><?php 
        }else if($row['o_status']=="On The Way"){
           ?><span class="btn btn-secondary btn-sm"><?php echo $row['o_status']; ?></span><?php 
        }else if($row['o_status']=="Packing"){
           ?><span class="btn btn-secondary btn-sm"><?php echo $row['o_status']; ?></span><?php 
        }   
        ?>
        </td>
    </tr>
    	<?php
		}
    }else{
    echo "No Orders Available";
    }?>
      
  </tbody>
</table> 
        </div>
    </div>
    <div class="col">
      <div class="notification4">
         <h5>Recent Appointments</h5>
<table class="table">     
  <thead>
    <tr>
        <th scope="col">#ID</th>
        <th scope="col">Customer</th>
        <th scope="col">Channel</th>
        <th scope="col">Ill Type</th>
        <th scope="col">Date Time</th>
        <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql2 ="SELECT * FROM ( SELECT * FROM `appointment` ORDER BY a_id DESC LIMIT 5 ) sub ORDER BY a_id ASC";
      $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>0)
    {
	   while($row = mysqli_fetch_assoc($result2))
        {
	?>
    <tr>
        <th><?php echo $row['a_id']; ?></th>
        <td><?php echo $row['c_id']; ?></td>
        <td><?php echo $row['ch_id']; ?></td>
        <td><?php echo $row['a_illltype']; ?></td>
        <td><?php echo $row['a_datetiime']; ?></td>
        <td><?php 
        if($row['a_status']=="Processing"){
           ?><span class="btn btn-primary btn-sm"><?php echo $row['a_status']; ?></span><?php 
        }else if($row['a_status']=="Appointed"){
           ?><span class="btn btn-success btn-sm"><?php echo $row['a_status']; ?></span><?php 
        }else if($row['a_status']=="Canceled"){
           ?><span class="btn btn-danger btn-sm"><?php echo $row['a_status']; ?></span><?php 
        } 
        ?>
        </td>
    </tr>
    	<?php
		}
    }else{
    echo "No Orders Available";
    }?>
      
  </tbody>
</table> 
        </div>
    </div>
  </div>
    <br><br>
      <div class="row">
    <div class="col">
        <div class="notification3">
         <h5>Recent Emergency Requests</h5>
<table class="table">     
  <thead>
    <tr>
        <th scope="col">#ID</th>
        <th scope="col">Customer</th>
        <th scope="col">Emergency Type</th>
        <th scope="col">Date Time</th>
        <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql2 ="SELECT * FROM ( SELECT * FROM `emergency` ORDER BY er_id DESC LIMIT 5 ) sub ORDER BY er_id ASC";
      $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>0)
    {
	   while($row = mysqli_fetch_assoc($result2))
        {
	?>
    <tr>
        <th><?php echo $row['er_id']; ?></th>
        <td><?php echo $row['c_id']; ?></td>
        <td><?php echo $row['er_type']; ?></td>
        <td><?php echo $row['er_datetime']; ?></td>
        <td><?php 
        if($row['er_status']=="Processing"){
           ?><span class="btn btn-primary btn-sm"><?php echo $row['er_status']; ?></span><?php 
        }else if($row['er_status']=="Completed"){
           ?><span class="btn btn-success btn-sm"><?php echo $row['er_status']; ?></span><?php 
        }else if($row['er_status']=="Canceled"){
           ?><span class="btn btn-danger btn-sm"><?php echo $row['er_status']; ?></span><?php 
        }else if($row['er_status']=="Requested"){
           ?><span class="btn btn-info btn-sm"><?php echo $row['er_status']; ?></span><?php 
        }else if($row['er_status']=="On The Way"){
           ?><span class="btn btn-secondary btn-sm"><?php echo $row['er_status']; ?></span><?php 
        }
        ?>
        </td>
    </tr>
    	<?php
		}
    }else{
    echo "No Orders Available";
    }?>
      
  </tbody>
</table> 
        </div>
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
    
    <br><br>
    <div class="notification2" id="customer">
         <table class="table">
             <tbody>
                <tr>
                <th scope="col" width="70%"><h3>Customer</h3></th>
                <form class="form-inline form-group" action="index.php" method="post">
                <th scope="col" width="20%"><input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="value" name="value"></th>
                <th scope="col" width="20%">
                <select class="form-control" id="column" name="column">
                  <option value="c_id">ID</option>
                  <option value="c_name">Name</option>
                  <option value="c_email">Email</option>
                  <option value="c_gender">Gender</option>
                  <option value="c_dob">DOB</option>
                  <option value="c_address">Address</option>
                  <option value="c_telephone">Telephone</option>
                  <option value="c_town">Town</option>
                  <option value="c_nic">NIC</option>
                </select>
                </th>
                <th scope="col" width="10%">
                    <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Search" id="csearch" name="csearch">
                    </th>
                </form>
                </tr>
             </tbody>
         </table>
         <br>
<table class="table">     
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
        <th scope="col">DOB</th>
      <th scope="col">Address</th>
      <th scope="col">Telephone</th>
         <th scope="col">Town</th>
        <th scope="col">NIC</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql2 ="SELECT * FROM customer";
      $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>0)
    {
	   while($row = mysqli_fetch_assoc($result2))
        {
	?>
    <tr>
      <th><?php echo $row['c_id']; ?></th>
      <td><?php echo $row['c_name']; ?></td>
      <td><?php echo $row['c_email']; ?></td>
      <td><?php echo $row['c_gender']; ?></td>
        <td><?php echo $row['c_dob']; ?></td>
      <td><?php echo $row['c_address']; ?></td>
      <td><?php echo $row['c_telephone']; ?></td>
    <td><?php echo $row['c_town']; ?></td>
        <td><?php echo $row['c_nic']; ?></td>
    </tr>
    	<?php
		}
    }else{
    echo "No Orders in Order Book";
    }?>
  </tbody>
</table> 
 </div> 
    <br><br>
      <div class="notification2" id="delivery">
           <table class="table">
             <tbody>
                <tr>
                <th scope="col" width="70%"><h3>Delivery</h3></th>
                <form class="form-inline form-group" action="index.php" method="post">
                <th scope="col" width="20%"><input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="value" name="value"></th>
                <th scope="col" width="20%">
                <select class="form-control" id="column" name="column">
                  <option value="d_id">ID</option>
                  <option value="d_name">Name</option>
                  <option value="d_email">Email</option>
                  <option value="d_dob">DOB</option>
                  <option value="d_address">Address</option>
                  <option value="d_telephone">Telephone</option>
                  <option value="d_town">Town</option>
                  <option value="d_lcence">License</option>
                  <option value="count">Jobs</option>
                </select>
                </th>
                <th scope="col" width="10%">
                    <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Search" id="dsearch" name="dsearch">
                    </th>
                </form>
                </tr>
             </tbody>
         </table>
         <br>
     <table class="table">
         <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
        <th scope="col">DOB</th>
      <th scope="col">Address</th>
      <th scope="col">Telephone</th>
         <th scope="col">Town</th>
        <th scope="col">License</th>
        <th scope="col">Jobs</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql2 ="SELECT * FROM delivery";
      $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>0)
    {
	   while($row = mysqli_fetch_assoc($result2))
        {
	?>
    <tr>
      <th><?php echo $row['d_id']; ?></th>
      <td><?php echo $row['d_name']; ?></td>
      <td><?php echo $row['d_email']; ?></td>
        <td><?php echo $row['d_dob']; ?></td>
      <td><?php echo $row['d_address']; ?></td>
      <td><?php echo $row['d_telephone']; ?></td>
    <td><?php echo $row['d_town']; ?></td>
        <td><?php echo $row['d_lcence']; ?></td>
        <td><?php echo $row['count']; ?></td>
    </tr>
    	<?php
		}
    }else{
    echo "No Orders in Order Book";
    }?>
  </tbody>
</table> 
 </div> 
    <br><br>
     <div class="notification2" id="pharmacy">
          <table class="table">
             <tbody>
                <tr>
                <th scope="col" width="70%"><h3>Pharmacy</h3></th>
                <form class="form-inline form-group" action="index.php" method="post">
                <th scope="col" width="20%"><input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="value" name="value"></th>
                <th scope="col" width="20%">
                <select class="form-control" id="column" name="column">
                  <option value="p_id">ID</option>
                  <option value="p_name">Name</option>
                  <option value="p_email">Email</option>
                  <option value="p_address">Address</option>
                  <option value="p_telephone">Telephone</option>
                  <option value="p_town">Town</option>
                  <option value="p_licecne">License</option>
                  <option value="count">Jobs</option>
                </select>
                </th>
                <th scope="col" width="10%">
                    <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Search" id="psearch" name="psearch">
                    </th>
                </form>
                </tr>
             </tbody>
         </table>
         <br>
     <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Telephone</th>
         <th scope="col">Town</th>
        <th scope="col">License</th>
        <th scope="col">Jobs</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql2 ="SELECT * FROM pharmacy";
      $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>0)
    {
	   while($row = mysqli_fetch_assoc($result2))
        {
	?>
    <tr>
      <th><?php echo $row['p_id']; ?></th>
      <td><?php echo $row['p_name']; ?></td>
      <td><?php echo $row['p_email']; ?></td>
      <td><?php echo $row['p_address']; ?></td>
      <td><?php echo $row['p_telephone']; ?></td>
    <td><?php echo $row['p_town']; ?></td>
        <td><?php echo $row['p_licecne']; ?></td>
        <td><?php echo $row['count']; ?></td>
    </tr>
    	<?php
		}
    }else{
    echo "No Orders in Order Book";
    }?>
  </tbody>
</table> 
 </div> 
    <br><br>
         <div class="notification2" id="channel center">
              <table class="table">
             <tbody>
                <tr>
                <th scope="col" width="70%"><h3>Channel Center</h3></th>
                <form class="form-inline form-group" action="index.php" method="post">
                <th scope="col" width="20%"><input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="value" name="value"></th>
                <th scope="col" width="20%">
                <select class="form-control" id="column" name="column">
                  <option value="ch_id">ID</option>
                  <option value="ch_name">Name</option>
                  <option value="ch_email">Email</option>
                  <option value="ch_address">Address</option>
                  <option value="ch_telephone">Telephone</option>
                  <option value="ch_town">Town</option>
                  <option value="ch_licence">License</option>
                </select>
                </th>
                <th scope="col" width="10%">
                    <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Search" id="chsearch" name="chsearch">
                    </th>
                </form>
                </tr>
             </tbody>
         </table>
         <br>
     <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Telephone</th>
         <th scope="col">Town</th>
        <th scope="col">License</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql2 ="SELECT * FROM `chanelcenter`";
      $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>0)
    {
	   while($row = mysqli_fetch_assoc($result2))
        {
	?>
    <tr>
      <th><?php echo $row['ch_id']; ?></th>
      <td><?php echo $row['ch_name']; ?></td>
      <td><?php echo $row['ch_email']; ?></td>
      <td><?php echo $row['ch_address']; ?></td>
      <td><?php echo $row['ch_telephone']; ?></td>
    <td><?php echo $row['ch_town']; ?></td>
        <td><?php echo $row['ch_licence']; ?></td>
    </tr>
    	<?php
		}
    }else{
    echo "No Orders in Order Book";
    }?>
  </tbody>
</table> 
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