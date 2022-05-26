<?php

    session_start();
    if(!isset($_SESSION["email"]))
    {
        header('Location:login.php');
    }
$con=mysqli_connect("localhost","root","","healthycare");
								  if(!$con){	
										 die("Cannot connect to DB server");		
									  }
$sql2 ="select `order`.o_id, delivery.d_name, pharmacy.p_name, customer.c_name, `order`.o_des, `order`.o_des, `order`.o_datetime, `order`.o_status, `order`.o_image
                                        FROM delivery, pharmacy, customer, `order`
                                        WHERE delivery.d_id=`order`.d_id AND pharmacy.p_id=`order`.p_id AND customer.c_id=`order`.c_id;";	
								  $result2 = mysqli_query($con,$sql2);

								  $sql3 ="select appointment.a_id, chanelcenter.ch_name, customer.c_name, appointment.a_illltype, appointment.a_datetiime, appointment.a_status
                                            FROM appointment, chanelcenter, customer
                                            WHERE chanelcenter.ch_id=appointment.ch_id AND customer.c_id=`appointment`.c_id;";	
								  $result3 = mysqli_query($con,$sql3);
								  
$sql4 ="select emergency.er_id, customer.c_name, emergency.er_type, emergency.er_datetime, emergency.er_status
FROM emergency, customer
WHERE customer.c_id=`emergency`.c_id;";	
$result4 = mysqli_query($con,$sql4);

$sql5 ="SELECT * FROM customer";	
$result5 = mysqli_query($con,$sql5);

$sql6 ="SELECT * FROM delivery";	
$result6 = mysqli_query($con,$sql6);

$sql7 ="SELECT * FROM pharmacy";	
$result7 = mysqli_query($con,$sql7);

$sql8 ="SELECT * FROM chanelcenter";	
$result8 = mysqli_query($con,$sql8);


if(isset($_POST["oupdate"]))
    {
        $status=$_POST["status"];
        $o_id=$_GET['o_id'];
        $sql2="UPDATE `order` SET `order`.`o_status`='".$status."' WHERE `order`.`o_id`=".$o_id." ;";
        mysqli_query($con,$sql2);
        header('Location:index.php#order');
    }
if(isset($_POST["aupdate"]))
    {
        $status=$_POST["status"];
        $a_id=$_GET['a_id'];
        $sql2="UPDATE `appointment` SET `appointment`.`a_status`='".$status."' WHERE `appointment`.`a_id`=".$a_id." ;";
        mysqli_query($con,$sql2);
        header('Location:index.php#appointment');
    }
if(isset($_POST["erupdate"]))
    {
        $status=$_POST["status"];
        $er_id=$_GET['er_id'];
        $sql2="UPDATE `emergency` SET `emergency`.`er_status`='".$status."' WHERE `emergency`.`er_id`=".$er_id." ;";
        mysqli_query($con,$sql2);
        header('Location:index.php#emergency');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Employee</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <style>
      body{
    background-color:rgb(221,220,225);
    margin: auto;
    }
    .notification{
       
        padding: 10px;
        background-color: white;
        width: 100%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgb(201,199,216);
        padding: 15px 20px;
    }
      
  </style>
</head>

<body>


  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Healthy Care</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/download.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Ruchira</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li>
              <a class="dropdown-item d-flex align-items-center" href="signout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>


  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="http://healthycare.teamcodeit.com/emp/index.php#order">
          <i class="bi bi-layout-text-window-reverse"></i><span>Orders</span>
        </a>
      </li>
        
              <li class="nav-item">
        <a class="nav-link collapsed" href="http://healthycare.teamcodeit.com/emp/index.php#appointment">
          <i class="bi bi-layout-text-window-reverse"></i><span>Appointment</span>
        </a>
      </li>
              <li class="nav-item">
        <a class="nav-link collapsed" href="http://healthycare.teamcodeit.com/emp/index.php#emergency">
          <i class="bi bi-layout-text-window-reverse"></i><span>Emergency</span>
        </a>
      </li>
              <li class="nav-item">
        <a class="nav-link collapsed" href="http://healthycare.teamcodeit.com/emp/index.php#customer">
          <i class="bi bi-layout-text-window-reverse"></i><span>Customer</span>
        </a>
      </li>
        
                      <li class="nav-item">
        <a class="nav-link collapsed" href="http://healthycare.teamcodeit.com/emp/index.php#delivery">
          <i class="bi bi-layout-text-window-reverse"></i><span>Delivery</span>
        </a>
      </li>
        
                      <li class="nav-item">
        <a class="nav-link collapsed" href="http://healthycare.teamcodeit.com/emp/index.php#pharmacy">
          <i class="bi bi-layout-text-window-reverse"></i><span>Pharmacy</span>
        </a>
      </li>

                              <li class="nav-item">
        <a class="nav-link collapsed" href="http://healthycare.teamcodeit.com/emp/index.php#channel">
          <i class="bi bi-layout-text-window-reverse"></i><span>Channel Center</span>
        </a>
      </li>

</ul>
      

  </aside> 
  <main id="main" class="main">
      
     
            

    <div class="pagetitle">
      <h1>Dashboard</h1>

    </div>

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">
           
          <div class="table-responsive notification">
              <h1 class="card-title" id="order">Order</h1>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Delivery</th>
                  <th scope="col">Pharmacy</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                  
								  if(mysqli_num_rows($result2)> 0){
									while($row = mysqli_fetch_assoc($result2))
									{
                                        if($row['o_image']=="0"){
                                            $img="uploads/noimage.jpg";
                                        }else{
                                            $img=$row['o_image'];
                                        }
										?>
                <tr>
                    
										
										<td><?php echo $row['o_id']; ?></td>
                                        <td><?php echo $row['c_name']; ?></td>
										<td><?php echo $row['d_name']; ?></td>
										<td><?php echo $row['p_name']; ?></td>
										<td><?php echo $row['o_des']; ?></td>
                                        <td><a href="http://healthycare.teamcodeit.com/<?php echo $img ?>">View Image</a></td>
										<td><?php echo $row['o_datetime']; ?></td>
										<td><?php echo $row['o_status']; ?></td>
                                        <td>
                                            <form action="index.php?o_id=<?php echo $row['o_id']; ?>" method="post">
                                            <select class="form-control" id="status" name="status">
                                              <option value="Processing">Processing</option>
                                              <option value="Packing">Packing</option>
                                              <option value="Hand Overed">Hand Overed</option>
                                              <option value="On The Way">On The Way</option>
                                              <option value="Delivered">Delivered</option>
                                              <option value="Canceled">Canceled</option>
                                            </select>
                                           <input class="btn btn-primary" type="submit" value="Update" id="oupdate" name="oupdate">
                                        </form>
                                        </td>
										
                </tr>
                <?php
									}
							  	  }
                            
						    ?>
              </tbody>
            </table>
          </div><br><br><hr><br><br>
              

           <div class="table-responsive notification">
              <h1 class="card-title" id="appointment">Appointment</h1>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Chaneel Center</th>
                  <th scope="col">Ill Type</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                         
								  if(mysqli_num_rows($result3)> 0){
									while($row = mysqli_fetch_assoc($result3))
									{
                                        ?>
                <tr>
                    
										
										<td><?php echo $row['a_id']; ?></td>
                                        <td><?php echo $row['c_name']; ?></td>
                                        <td><?php echo $row['ch_name']; ?></td>
										<td><?php echo $row['a_illltype']; ?></td>
										<td><?php echo $row['a_datetiime']; ?></td>
										<td><?php echo $row['a_status']; ?></td>
                                        <td>
                                            <form action="index.php?a_id=<?php echo $row['a_id']; ?>" method="post">
                                            <select class="form-control" id="status" name="status">
                                             <option value="Processing">Processing</option>
                                              <option value="Appointed">Appointed</option>
                                              <option value="Canceled">Canceled</option>
                                            </select>
                                           <input type="submit" class="btn btn-primary" value="Update" id="aupdate" name="aupdate">
                                        </form>
                                        </td>
										
                </tr>
                <?php
									}
							  	  }
                            
						    ?>
              </tbody>
            </table>
          </div><br><br><hr><br><br>
              

            <div class="table-responsive notification">
              <h1 class="card-title" id="emergency">Emergency</h1>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Emergency Type</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                </tr>
              </thead>
               <tbody>
                  <?php 
                         
								  if(mysqli_num_rows($result4)> 0){
									while($row = mysqli_fetch_assoc($result4))
									{
                                        ?>
                <tr>
                    
										
										<td><?php echo $row['er_id']; ?></td>
                                        <td><?php echo $row['c_name']; ?></td>
										<td><?php echo $row['er_type']; ?></td>
										<td><?php echo $row['er_datetime']; ?></td>
										<td><?php echo $row['er_status']; ?></td>
                                        <td>
                                            <form action="index.php?er_id=<?php echo $row['er_id']; ?>" method="post">
                                            <select class="form-control" id="status" name="status">
                                            <option value="Processing">Processing</option>
                                              <option value="Requested">Requested</option>
                                              <option value="On The Way">On The Way</option>
                                              <option value="Completed">Completed</option>
                                              <option value="Canceled">Canceled</option>
                                            </select>
                                           <input type="submit" class="btn btn-primary" value="Update" id="erupdate" name="erupdate">
                                        </form>
                                        </td>
										
                </tr>
                <?php
									}
							  	  }
                            
						    ?>
              </tbody>
            </table>
          </div><br><br><hr><br><br>


            <div class="table-responsive notification">
              <h1 class="card-title" id="customer">Customer</h1>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
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
                         
								  if(mysqli_num_rows($result5)> 0){
									while($row = mysqli_fetch_assoc($result5))
									{
                                        ?>
                <tr>
                    
										
										<td><?php echo $row['c_id']; ?></td>
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
							  	  }
                            
						    ?>
              </tbody>
            </table>
          </div><br><br><hr><br><br>
              

             <div class="table-responsive notification">
              <h1 class="card-title" id="delivery">Delivery</h1>
            <table class="table datatable">
              <thead>
                <tr>
                     <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">DOB</th>
                  <th scope="col">Address</th>
                  <th scope="col">Telephone</th>
                  <th scope="col">Town</th>
                  <th scope="col">License</th>
                </tr>
              </thead>
                 <tbody>
                  <?php 
                         
								  if(mysqli_num_rows($result6)> 0){
									while($row = mysqli_fetch_assoc($result6))
									{
                                        ?>
                <tr>
                    
										
									<td><?php echo $row['d_id']; ?></td>
                                      <td><?php echo $row['d_name']; ?></td>
                                      <td><?php echo $row['d_email']; ?></td>
                                        <td><?php echo $row['d_dob']; ?></td>
                                      <td><?php echo $row['d_address']; ?></td>
                                      <td><?php echo $row['d_telephone']; ?></td>
                                    <td><?php echo $row['d_town']; ?></td>
                                        <td><?php echo $row['d_lcence']; ?></td>
										
                </tr>
                <?php
									}
							  	  }
                            
						    ?>
              </tbody>
            </table>
          </div><br><br><hr><br><br>
              

            <div class="table-responsive notification">
              <h1 class="card-title" id="pharmacy">Pharmacy</h1>
            <table class="table datatable">
              <thead>
                <tr>
                     <th scope="col">#</th>
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
                         
								  if(mysqli_num_rows($result7)> 0){
									while($row = mysqli_fetch_assoc($result7))
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
										
                </tr>
                <?php
									}
							  	  }
                            
						    ?>
              </tbody>
            </table>
          </div><br><br><hr><br><br>
              

             <div class="table-responsive notification">
              <h1 class="card-title" id="channel">Channel Center</h1>
            <table class="table datatable">
              <thead>
                <tr>
                     <th scope="col">#</th>
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
                         
								  if(mysqli_num_rows($result8)> 0){
									while($row = mysqli_fetch_assoc($result8))
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
							  	  }
                            
						    ?>
              </tbody>
            </table>
          </div>
              
              
          </div>
        </div><!-- End Left side columns -->

      

      </div>
    </section>

  </main><!-- End #main -->


  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Team Alpha</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
  
      Designed by <a href="http://healthycare.teamcodeit.com/">Team Alpha</a>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>