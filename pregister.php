<?php
        if(isset($_POST["pregister"]))
            {
  $con=mysqli_connect("localhost","root","","healthycare");
                 if(!$con)
                 {
                      die("sorry we are facing a techincal issue");
                 }
                $name = $_POST["name"];
                $telephone=$_POST["telephone"];
                $br=$_POST["br"];
                $email=$_POST["email"];
                $password=$_POST["password"];
                $address=$_POST["address"];
                $town=$_POST["town"];
                $cemail=$_POST["cemail"];
                $cpassword=$_POST["cpassword"];
            
                if($password==$cpassword)
                {
                    if($email==$cemail)
                    {
                        
                        $sql="INSERT INTO `pharmacy` (`p_name`, `p_email`, `p_password`, `p_telephone`, `p_licecne`, `p_address`, `p_town`) VALUES ( '".$name."', '".$email."', PASSWORD('".$password."'), '".$telephone."', '".$br."', '".$address."', '".$town."');";
                        mysqli_query($con,$sql);
                        mysqli_close($con);
                        header('Location:plogin.php');

                    }else{
                    echo 'Email Do not match';
                }
                }else{
                    echo 'Password Do not match';
                }
                
            }
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pharmacy | Login</title>
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
    <link href="css/stylesheet.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

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

      <a href="clogin.php" class="appointment-btn scrollto">Log In</a>

    </div>
  </header>
  <br><br><br>  <br><br><br>


  <h1 style="text-align: center">Pharmacy Register</h1>      
<table width="100%">
  <tr>
    <td width="35%"></td>
    <td class="center-form" width="30%">
        
        <form style="text-align: left" action="pregister.php" method="post">
            <table width="100%">
            <tr>
            <td width="50%">
                <label for="name">Name*</label><br>
                <input type="text" id="name" name="name"><br>
                <label for="telephone">Telephone*</label><br>
                <input type="text" id="telephone" name="telephone"><br>
                <label for="br">BR Number*</label><br>
                <input type="text" id="br" name="br"><br>
                <label for="email">Email*</label><br>
                <input type="text" id="email" name="email"><br>
                <label for="password">Password*</label><br>
                <input type="text" id="password" name="password"><br>
                </td>
            <td width="50%">
                <label for="address">Address*</label><br>
                <input type="text" id="address" name="address"><br>
                 <label for="town">Town*</label><br>
                <select name="town" id="town">
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
                </select><br>
                <label for="cemail">Confirm Email*</label><br>
                <input type="text" id="cemail" name="cemail"><br>
                <label for="cpassword">Re-Type Password*</label><br>
                <input type="text" id="cpassword" name="cpassword"><br>
                </td>
            </tr>
            </table>
            <br>
             <input class="button" type="submit" id="pregister" name="pregister">
        </form>
        
        <p>if you already have an account <a href="plogin.php"> Click Here</a></p>
      </td>
    <td width="35%"></td>
  </tr>
</table>  
    <br><br><br>

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