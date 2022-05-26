<?php session_start();
if(!isset($_SESSION["c_id"]))
{
    header('Location:clogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Order Medicine</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <style>
   
    </style>
</head>

<body>


  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">info@healthycare.com</a>
        <i class="bi bi-phone"></i> +94 77 764 789
      </div>
    </div>
  </div>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html"><img src="assets/img/Healthy%20Care-logos_black.png"></a></h1>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          
          <li class="dropdown"><a href="#services"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="ordermedicine.php">Order Medicine</a></li>
              <li><a href="channeldoctor.php">Doctor Appointment</a></li>
              <li><a href="emergencyservice.php">Emergency Service</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#department"><span>Departments</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="delivery.php">Delivery Department</a></li>
              <li><a href="pharmacy.php">Pharmacy Department</a></li>
              <li><a href="channelcenter.php">Channel Center Department</a></li>
            </ul>
          </li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

 <a href="caccount.php" class="appointment-btn scrollto">Account</a>

      
    </div>
  </header>
<br><br><br><br>
  
    
     <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Order Medicine</h2>
          <p>Fill The Form To Order Medicine</p>
        </div>

        <form action="upload.php" method="post" enctype="multipart/form-data">
        

          <div class="form-group mt-3">
            <textarea class="form-control" id="des" name="des" rows="5" placeholder="Message or Medicine Details" required></textarea>
            <div class="validate"></div>
          </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Doctor Prescription: (Optional)</label>
    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
  </div>

          
          <div class="text-center"><button type="submit" id="upload" name="upload" class="appointment-btn" style="border: 0px">Place Order</button></div>
        </form><br><br>
<hr>
          <br><br>
          <div class="section-title">
          <h2>Your Orders</h2>
          <p>Your Order Details will be shown here</p>
        </div>

          <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Delivery</th>
      <th scope="col">Pharmacy</th>
      <th scope="col">Order Description</th>
      <th scope="col">Image</th>
      <th scope="col">DateTime</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php 
                         $con=mysqli_connect("localhost","root","","healthycare");
								  if(!$con){	
										 die("Cannot connect to DB server");		
									  }
								  $sql2 ="SELECT `order`.`o_id`,`order`.`o_des`,`order`.`o_datetime`,`order`.`o_image`,`order`.`o_status`,pharmacy.p_name,delivery.d_name
                                    FROM pharmacy, delivery, `order` 
                                    WHERE `order`.`p_id`=pharmacy.p_id AND `order`.`d_id`=delivery.d_id AND c_id='".$_SESSION["c_id"]."' ORDER BY `order`.`o_id` DESC;";	
								  $result2 = mysqli_query($con,$sql2);
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
      <th scope="row"><?php echo $row['o_id']; ?></th>
      <td><?php echo $row['d_name']; ?></td>
      <td><?php echo $row['p_name']; ?></td>
      <td><?php echo $row['o_des']; ?></td>
      <td><a href="http://healthycare.teamcodeit.com/<?php echo $img ?>">View Image</a></td>
      <td><?php echo $row['o_datetime']; ?></td>
      <td><?php echo $row['o_status']; ?></td>
    </tr>
    <?php
									}
							  	  }else{
								  	 echo "No Orders Found";
							  	  }
      mysqli_close($con); ?>
  </tbody>
</table>
      </div>
         
         
    </section>
    
    
    
    
<br><br> 
  
<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Healthy Care</h3>
            <p>
              Main Street <br>
              Kurunegala, 60000<br>
              Sri Lanka <br><br>
              <strong>Phone:</strong> +94 77 764 789<br>
              <strong>Email:</strong> info@healthycare.com<br>
            </p>
              
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="http://healthycare.teamcodeit.com">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://healthycare.teamcodeit.com/#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://healthycare.teamcodeit.com/#services">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="ordermedicine.php">Order Medicine</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="channeldoctor.php">Make Appointment</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="emergency.php">Request Emergency</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Healthy Care</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
         
          Designed by <a href="index.html">Team Alpha</a>
        </div>
      </div>
    </div>
  </footer>
  

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>