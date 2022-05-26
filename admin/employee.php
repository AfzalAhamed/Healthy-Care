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
    if(isset($_POST["addemp"]))
    {
        $name=$_POST["name"];
        $status=$_POST["txtstatus"];
        $email=$_POST["email"];
        $tele=$_POST["telephone"];
        $nic=$_POST["nic"];
        $add=$_POST["address"];
        $dob=$_POST["dob"];
        $sql2="INSERT INTO `employee` (`e_email`, `e_telephone`, `e_name`, `e_nic`, `e_address`, `e_dob`) VALUES ('".$email."', '".$tele."', '".$name."', '".$nic."', '".$add."', '".$dob."');";
        mysqli_query($con,$sql2);
        ?><br><br><br><br>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:80%; margin:auto;">
          <strong>Record Added!</strong> You have successfully added the employee .
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }

    if(isset($_POST["edelete"]))
    {
        $e_id=$_GET["e_id"];
        $sql2="DELETE FROM `employee` WHERE `employee`.e_id=".$e_id.";";
        mysqli_query($con,$sql2);
        ?>
        <br><br><br><br>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:80%; margin:auto;">
          <strong>Record Deleted!</strong> You have successfully deleted the employee .
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div><?php
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
  <a class="navbar-brand">Employee Management</a>
  
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
   <div class="notification2" id="employee">
              
                    <span style="font-size:25px; vertical-align:center">Employee </span>
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="button" data-toggle="modal" data-target="#exampleModalCenter">ADD</button>
                
         <br>
     <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Telephone</th>
        <th scope="col">NIC</th>
      <th scope="col">DOB</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql2 ="SELECT * FROM `employee`";
      $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2)>0)
    {
	   while($row = mysqli_fetch_assoc($result2))
        {
	?>
    <tr>
      <th><?php $e_id=$row['e_id']; echo $e_id ?></th>
      <td><?php echo $row['e_name']; ?></td>
      <td><?php echo $row['e_email']; ?></td>
      <td><?php echo $row['e_address']; ?></td>
      <td><?php echo $row['e_telephone']; ?></td>
        <td><?php echo $row['e_nic']; ?></td>
    <td><?php echo $row['e_dob']; ?></td>
    <td>
        <form action="employee.php?e_id=<?php echo $e_id; ?>" method="POST" onsubmit="return confirmDesactiv()">
            <input class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="DELETE" id="edelete" name="edelete">
        </form>
        </td>
        <script>
        function confirmDesactiv()
        {
           if(confirm("Are you sure, you want to Delete?"))
             return true;

          return false;
        }
        </script>
        
    </tr>
    	<?php
		}
    }else{
    echo "No Employee Records Found";
    }?>
  </tbody>
</table> 
 </div> 
    <br><br> 

  
    
    
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="employee.php" method="post">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Employee Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Employee email" required>
            </div>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Employee Telephone Number" required>
            </div>
            <div class="form-group">
                <label for="nic">NIC Number</label>
                <input type="text" class="form-control" id="nic" name="nic" placeholder="Employee NIC Number" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Employee Address" required>
            </div>
            <div class="form-group">
                <label for="dob">DOB</label>
                <input type="text" class="form-control" id="dob" name="dob" placeholder="Employee Date of Birth (YYYY-MM-DD)" required>
            </div>
              <input type="submit" class="btn btn-primary" value="Add Employee" id="addemp" name="addemp">
        </form>  
      </div>
    </div>
  </div>
</div>
      
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>