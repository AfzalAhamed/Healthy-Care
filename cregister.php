<?php 
        if(isset($_POST["cregister"]))
            {
          $con=mysqli_connect("localhost","root","","healthycare");
                 if(!$con)
                 {
                      die("<br><br><br><br><br><br>sorry we are facing a techincal issue");
                 }
                $fname=$_POST["fname"];
                $lname=$_POST["lname"];
                $name = $fname . ' ' . $lname;
    
                $dob=$_POST["dob"];
                $telephone=$_POST["telephone"];
                $nic=$_POST["nic"];
                $email=$_POST["email"];
                $password=$_POST["password"];
                $address=$_POST["address"];
                $gender=$_POST["gender"];
                $town=$_POST["town"];
                $cemail=$_POST["cemail"];
                $cpassword=$_POST["cpassword"];
            
            
            $sql="SELECT * FROM `customer` WHERE c_email='".$email."';";
            $result=mysqli_query($con,$sql);
    
            if(mysqli_num_rows($result)==0)
            {
                if($password==$cpassword)
                {
                    if($email==$cemail)
                    {
                        
                        $sql2="INSERT INTO `customer` (`c_name`, `c_email`, `c_password`, `c_gender`, `c_dob`, `c_address`, `c_town`, `c_telephone`, `c_nic`) 
                        VALUES ('".$name."', '".$email."', PASSWORD('".$password."'), '".$gender."', '".$dob."', '".$address."', '".$town."', '".$telephone."', '".$nic."');";
                        
                        mysqli_query($con,$sql2);
                        mysqli_close($con);
                        header('Location:clogin.php');

                    }else{
                    echo '<br><br><br><br><br><br>Email Do not match';
                }
                }else{
                    echo '<br><br><br><br><br><br>Password Do not match';
                }
            }else{
                 echo '<br><br><br><br><br><br>This Email Alredy Have an Account';
            }
            mysqli_close($con);
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Healthy Care</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


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
    
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

.container2 {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 120vh;
}
.container3 {
	display: flex;
	align-items: center;
	justify-content: center;
}

.screen2 {		
	background: linear-gradient(90deg, #545ca4, #788db8);		
	position: relative;	
	height: 800px;
	width: 400px;	
	box-shadow: 0px 0px 24px #444fb8;
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 800px;
	width: 560px;
	background: #FFF;	
	top: -30px;
	right: 10px;	
	border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #3c448f;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #545da4, #464ca3);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7b95b9;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.login {
	width: 320px;
	padding: 30px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
}

.login__icon {
	position: absolute;
	top: 30px;
	color: #7584b5;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #4553d1;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #4336c2;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #4a42cf;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #394cdb;
}

.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
	padding: 20px 10px;
	color: #fff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #332e8c;
}

.social-login__icon:hover {
	transform: scale(1.5);	
}
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
          <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
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

      <a href="clogin.php" class="appointment-btn scrollto">Log In</a>

    </div>
  </header>
<br>
    <div class="container2">
	<div class="screen2">
		<div class="screen__content">
            <form class="login" style="text-align: left" action="cregister.php" method="post">
                
                <input type="text" class="login__input" placeholder="First Name" id="fname" name="fname" required>
                 <input type="text" class="login__input" placeholder="Last Name" id="lname" name="lname" required>
                <input type="text" class="login__input" placeholder="Date Of Birth" id="dob" name="dob" required>
                <input type="text" class="login__input" placeholder="Telephone" id="telephone" name="telephone" required>
                <input type="text" class="login__input" placeholder="NIC" id="nic" name="nic" required>
                <input type="text" class="login__input" placeholder="Address" id="address" name="address" required>
                <input type="email" class="login__input" placeholder="Email" id="email" name="email" required>
                
                <input type="email" class="login__input" placeholder="Re-Email" id="cemail" name="cemail" required>
                <input type="password" class="login__input" placeholder="Password" id="password" name="password" required>
                <input type="password" class="login__input" placeholder="Re-Password" id="cpassword" name="cpassword" required>
               
                
                <br><label for="gender">Gende*</label>
                <select name="gender" id="gender" class="login__input">
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                </select>
                <label for="town">Town*</label>
                <select name="town" id="town" class="login__input">
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
                <br>
                
				<button class="button login__submit" type="submit" id="cregister" name="cregister">
					<span class="button__text">Register Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>					
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
  <div class="container3">
<p>if you alredy have an account <a href="clogin.php"> Click Here</a></p>
</div>
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

 
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>
