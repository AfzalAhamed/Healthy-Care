<?php session_start();
if(!isset($_SESSION["c_id"]))
{
    header('Location:clogin.php');
}
$con=mysqli_connect("localhost","root","","healthycare");
                 if(!$con)
                    {
                       die("sorry we are facing a techincal issue");
                    } 
if(isset($_POST["btnupload"])){
        
            $date=$_POST["date"];
            $ill=$_POST["ill"];
            $ch_id=$_POST["owner"];
        
            $sql2="INSERT INTO `appointment`(`ch_id`, `c_id`, `a_illltype`, `a_datetiime`) VALUES ('".$ch_id."', '".$_SESSION["c_id"]."', '".$ill."', '".$date."');";
            mysqli_query($con,$sql2);
            
            $sql2="SELECT `appointment`.a_id FROM `appointment`;";
            $result2 = mysqli_query($con,$sql2);
			if(mysqli_num_rows($result2)> 0)
			{
				while($row = mysqli_fetch_assoc($result2))
			    {
			       $a_id=$raw['a_id'];
			    }
			}
			
            $sql4="SELECT `appointment`.`a_illltype`, `appointment`.`a_datetiime`, customer.c_name, customer.c_email, customer.c_address, customer.c_telephone, chanelcenter.ch_name,chanelcenter.ch_email, chanelcenter.ch_telephone FROM `appointment`, chanelcenter, customer WHERE `appointment`.`c_id`=customer.c_id AND `appointment`.`ch_id`=chanelcenter.ch_id AND `appointment`.`a_id`=".$a_id.";";
            $result=mysqli_query($con,$sql4);
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                        $a_illtype = $row['a_illltype'];
                        $a_datetime= $row['a_datetiime'];
                        $chemail = $row['ch_email'];
                        $chname	= $row['ch_name'];
                        $chtele	= $row['ch_telephone'];
                        $cemail	= $row['c_email'];
                        $cname	= $row['c_name'];
                        $cadd	= $row['c_address'];
                        $ctele	= $row['c_telephone'];
                }
            
              	    $email	= 'appointment@healthycare.com';
                    $mail_subject = 'New Appointment From Healthy Care';
                    $email_body   ="<html><head><style>";
                    $email_body   .="body{font-family:Arial;}";
                    $email_body   .=".container{height:50px;position:relative;}";
                    $email_body   .=".center{margin:0;position:absolute;top:50%;left:50%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);}";
                    $email_body   .="table{border-collapse:collapse;width:100%;}";
                    $email_body   .="td,th{border:1px solid #dddddd;text-align:left;padding:8px;}";
                    $email_body   .="tr:nth-child(even){background-color:#dddddd;}";
                    $email_body   .=".button{background-color:#4CAF50;border-radius:8px;border:none;color:white;padding:16px 50px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;transition-duration: 0.4s;cursor: pointer;}";
                    $email_body   .=".button5{background-color:white;color:black;border:2px solid #555555;}";
                    $email_body   .=".button5:hover{background-color:#555555;color:white;}";
                    $email_body   .="</style></head><body>";
                    $email_body   .="<div style="."background-color: white".">";
                    $email_body   .="<img src="."http://healthycare.teamcodeit.com/images/Healthy%20Care-logos_black.png"." width="."50%"." style="."display:block;margin-left:auto;margin-right:auto;".">";
                    $email_body   .="<h2 style="."text-align:center".">New Appointment From Healthy Care</h2>";
                    $email_body   .="<p style="."text-align:center".">Dear {$cname} your have appointment has been sent to the Channel Center.</p>";
                    $email_body   .="<table><tr><td>Appointment Id:</td><td>#{$a_id}</td></tr>";
                    $email_body   .="<tr><td>Appointment Date Time:</td><td>{$a_datetime}</td></tr>";
                    $email_body   .="<tr><td>Channel Center Name:</td><td>{$chname}</td></tr>";
                    $email_body   .="<tr><td>Channel Center Telephone:</td><td>{$chtele}</td></tr>";
                    $email_body   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body   .="<tr><td>Ill Type:</td><td>{$a_illtype}</td></tr></table>";
                    $email_body   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body   .="<br><h5 style="."text-align:center".">Please Contact Us +94 77 148 2569. If you have any doubt with this email.</h5>";
                    $email_body   .="<div class="."container"."><div class="."center"."><a href="."http://healthycare.teamcodeit.com"." class="."button button5".">Website</a></div></div>";
                    $email_body   .="</div></body></html>";
                    
                    $email_body2   ="<html><head><style>";
                    $email_body2  .="body{font-family:Arial;}";
                    $email_body2   .=".container{height:50px;position:relative;}";
                    $email_body2   .=".center{margin:0;position:absolute;top:50%;left:50%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);}";
                    $email_body2   .="table{border-collapse:collapse;width:100%;}";
                    $email_body2   .="td,th{border:1px solid #dddddd;text-align:left;padding:8px;}";
                    $email_body2   .="tr:nth-child(even){background-color:#dddddd;}";
                    $email_body2   .=".button{background-color:#4CAF50;border-radius:8px;border:none;color:white;padding:16px 50px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;transition-duration: 0.4s;cursor: pointer;}";
                    $email_body2   .=".button5{background-color:white;color:black;border:2px solid #555555;}";
                    $email_body2   .=".button5:hover{background-color:#555555;color:white;}";
                    $email_body2   .="</style></head><body>";
                    $email_body2   .="<div style="."background-color: white".">";
                    $email_body2   .="<img src="."http://healthycare.teamcodeit.com/images/Healthy%20Care-logos_black.png"." width="."50%"." style="."display:block;margin-left:auto;margin-right:auto;".">";
                    $email_body2   .="<h2 style="."text-align:center".">New Appointment From Healthy Care</h2>";
                    $email_body2   .="<p style="."text-align:center".">Dear {$chname} your has a New Appointment From Healthy Care.</p>";
                    $email_body2   .="<table><tr><td>Order Id:</td><td>#{$a_id}</td></tr>";
		            $email_body2   .="<table><tr><td>Appointment Id:</td><td>#{$a_id}</td></tr>";
                    $email_body2   .="<tr><td>Appointment Date Time:</td><td>{$a_datetime}</td></tr>";
                    $email_body2   .="<tr><td>Channel Center Name:</td><td>{$chname}</td></tr>";
                    $email_body2   .="<tr><td>Channel Center Telephone:</td><td>{$chtele}</td></tr>";
                    $email_body2   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body2   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body2   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body2   .="<tr><td>Ill Type:</td><td>{$a_illtype}</td></tr></table>";			  
                    $email_body2   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body2   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body2   .="<br><h5 style="."text-align:center".">Please Contact Us +94 77 148 2569. If you have any doubt with this email.</h5>";
                    $email_body2   .="<div class="."container"."><div class="."center"."><a href="."http://healthycare.teamcodeit.com"." class="."button button5".">Website</a></div></div>";
                    $email_body2   .="</div></body></html>";
                    

                    $header = "From: {$email}\r\nContent-Type: text/html;";
                    $send_mail_result=mail($chemail, $mail_subject, $email_body2, $header);
                    $send_mail_result3=mail($cemail, $mail_subject, $email_body, $header);
                    
            }
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Channel Doctor</title>
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
          <h2>Make An Appointment</h2>
          <p>Fill The Form To Make An Appointment</p>
        </div>

        <form action="channeldoctor.php" method="post" role="form">
        

         <div class="row">
            <div class="col-md-4 form-group mt-3">
            <label>Ill Type:</label><br>
              <input type="text" name="ill" class="form-control" id="ill" placeholder="Ill Type"  required>
            </div>
            
            <div class="col-md-4 form-group mt-3">
                <label>Preferd Channel Center:</label><br>
              <select name="owner" id="owner" class="form-select" >
                <?php 
         
                $sql = mysqli_query($con, "SELECT * FROM chanelcenter");
                while ($row = $sql->fetch_assoc())
                {
                    ?> 
                  <option value="<?php echo $row['ch_id'] ?>"><?php echo $row['ch_name'].", ".$row['ch_town'] ?></option>; <?php
                }
                ?>
            </select>
            </div>
             
            <div class="col-md-4 form-group mt-3">
                <label>Date:</label><br>
            <input type="date" id="date" name="date" class="form-control" required>
            </div>
          </div>



         <br><br><br>
         <div class="text-center"><button type="submit" id="btnupload" name="btnupload" class="appointment-btn" style="border: 0px">Place Appointment</button></div>
        </form><br><br>
<hr>
          <br><br>
          <div class="section-title">
          <h2>Your Appointments</h2>
          <p>Your Appointment Details will be shown here</p>
        </div>

          <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Channel Center</th>
      <th scope="col">Ill Type</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php 
                     
								  $sql2 ="SELECT * FROM `appointment`, chanelcenter WHERE appointment.ch_id= chanelcenter.ch_id AND appointment.c_id='".$_SESSION["c_id"]."' ORDER BY appointment.a_id DESC;";	
								  $result2 = mysqli_query($con,$sql2);
								  if(mysqli_num_rows($result2)> 0){
									while($row = mysqli_fetch_assoc($result2))
									{
										?>
										<tr>
										<th scope="row"><?php echo $row['a_id']; ?></th>
										<td><?php echo $row['ch_name']; ?></td>
										<td><?php echo $row['a_illltype']; ?></td>
										<td><?php echo $row['a_datetiime']; ?></td>
										<td><?php echo $row['a_status']; ?></td>
										
									  	</tr>
										<?php
									}
							  	  }else{
								  	 echo "No Appointment Found";
							  	  }
						    ?>

   
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