<?php session_start();
if(!isset($_SESSION["c_id"]))
{
    header('Location:clogin.php');
}
$con=mysqli_connect("localhost","root","","healthycare");
								  if(!$con){	
										 die("Cannot connect to DB server");		
									  }
if(isset($_POST["save"]))
            {
                $name = $_POST["name"];
                $dob=$_POST["dob"];
                $telephone=$_POST["telephone"];
                $nic=$_POST["nic"];
                $address=$_POST["address"];
                $gender=$_POST["gender"];
                $town=$_POST["town"];
                
                  
                        $sql2="UPDATE `customer` SET  `c_name`='".$name."', `c_gender`='".$gender."', `c_dob`='".$dob."', `c_address`='".$address."', `c_town`='".$town."', `c_telephone`='".$telephone."', `c_nic`='".$nic."' WHERE `c_id`='".$_SESSION["c_id"]."';";
                        mysqli_query($con,$sql2);
                        mysqli_close($con);
                        header('Location:caccount.php');
            }
        if(isset($_POST["logout"]))
        {        
            unset($_SESSION["c_id"]);
            unset($_SESSION["c_town"]);
            header("Location:clogin.php");
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Customer | Account</title>
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
     <?php 

								  $sql2 ="SELECT * FROM customer WHERE c_id='".$_SESSION["c_id"]."'";	
								  $result2 = mysqli_query($con,$sql2);
								  if(mysqli_num_rows($result2)>0){
									while($row = mysqli_fetch_assoc($result2))
									{
    ?>

<form style="text-align: left" action="caccount.php" method="post">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $row['c_name']; ?></span><span class="text-black-50"><?php echo $row['c_email']; ?></span><span> </span></div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                
           
            <div class="row mt-3">
                <div class="col-md-6">
                <label class="labels">Name*</label><br>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['c_name']; ?>" required><br>
                </div>
                <div class="col-md-6">
                <label class="labels">Date of Birth*</label><br>
                <input type="text" id="dob" name="dob" class="form-control" value="<?php echo $row['c_dob']; ?>" required><br>
                </div>
                <div class="col-md-6">
                <label class="labels">Telephone*</label><br>
                <input type="text" id="telephone" name="telephone" class="form-control" value="<?php echo $row['c_telephone']; ?>" required><br>
                </div>
                <div class="col-md-6">
                <label class="labels">NIC*</label><br>
                <input type="text" id="nic" name="nic" class="form-control" value="<?php echo $row['c_nic']; ?>" required><br>
                </div>
                <div class="col-md-6">
                <label class="labels">Address*</label><br>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo $row['c_address']; ?>" required><br>
                </div>
                <div class="col-md-6">
                <label class="labels">Gende*</label><br>
                <select name="gender" id="gender" class="form-control" >
                    <option value="<?php echo $row['c_gender']; ?>"><?php echo $row['c_gender']; ?></option>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                </select><br>
                </div>
                <div class="col-md-6">
                <label class="labels">Town*</label><br>
                <select name="town" id="town" class="form-control" >
                    <option value="<?php echo $row['c_town']; ?>"><?php echo $row['c_town']; ?></option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Wariyapola">Wariyapola</option>
                    <option value="Polgahawela">Polgahawela</option>
                    <option value="Maho">Maho</option>
                    <option value="Melsiripura">Melsiripura</option>
                    <option value="Narammala">Narammala</option>
                    <option value="Pannala">Pannala</option>
                    <option value="Ibbagamuwa">Ibbagamuwa</option>
                    <option value="Alawwa">Alawwa</option>
                    <option value="Kuliyapitiya">Kuliyapitiya</option>
                    <option value="Hettipola">Hettipola</option>
                    <option value="Galgamuwa">Galgamuwa</option>
                    <option value="Mawathagama">Mawathagama</option>
                    <option value="Pothuheara">Pothuheara</option>
                </select>
                </div>
            </div>
            
              
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" id="save" name="save">Save Profile</button></div>
                
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" id="logout" name="logout">Log Out</button></div>
     
     
    </div>
</div>
</div></div>
       </form>
<?php
									}
							  	  }else{
								  	 echo "No Data Found";
							  	  }
						  
        ?>
    
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