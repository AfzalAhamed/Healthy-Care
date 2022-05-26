<?php
session_start();
if(!isset($_SESSION["c_id"]))
{
    header('Location:clogin.php');
}
$con=mysqli_connect("localhost","root","","healthycare");
                        if(!$con)
                        {
                            die("sorry we are facing a techincal issue");
                        }
if(isset($_POST['upload'])){
            header('Location:ordermedicine.php');
            $des=$_POST["des"];
            $sql="SELECT `order`.`o_id`
                    FROM `order`;";

                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $o_id=$row['o_id']+1;
                        $imgname=$row['o_id'];
                    }
                    
                }else{
                    $imgname=1;
                }

            $target_dir = "uploads/";
            $target_file = $target_dir .$imgname.basename($_FILES["fileToUpload"]["name"]);
           
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            
            
            
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                
              } else {
                echo "Sorry, there was an error uploading your file.";
                $target_file=0;
              }
           
    
            
            $i1=0;
            $go1=0;
            while ($go1==0 && $i1<=20) {
                
                $sql="SELECT `delivery`.`d_id`
                    FROM `delivery`
                    WHERE `delivery`.`d_town`='".$_SESSION["c_town"]."' AND `delivery`.`count`=".$i1." ORDER BY RAND();";
                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $d_id=$row['d_id'];
                    }
                    $go1=1;
                    
                }else{
                    $i1=$i1+1;
                }
            }
    
            $i2=0;
            $go2=0;
            while ($go2==0 && $i2<=20) {
                
                $sql="SELECT `pharmacy`.`p_id`  
                    FROM `pharmacy` 
                    WHERE `pharmacy`.`p_town`='".$_SESSION["c_town"]."' AND `pharmacy`.`count`=".$i2." ORDER BY RAND();";

                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $p_id=$row['p_id'];
                    }
                    $go2=1;
                    
                }else{
                    $i2=$i2+1;
                }
            }
            
            if($i1==20 || $i2==20 ){
                echo "Delivery Agents and Pharmacy are busy right now!, Please try again tomorrow";
            }else{
                $sql1="INSERT INTO `order` (`c_id`, `p_id`, `d_id`, `o_des`, `o_image`) VALUES ('".$_SESSION["c_id"]."', '".$p_id."', '".$d_id."', '".$des."', '".$target_file."');";
                $sql2="UPDATE `delivery` SET `count` = `count`+1 WHERE `delivery`.`d_id` = '".$d_id."';";
                $sql3="UPDATE `pharmacy` SET `count` = `count`+1 WHERE `pharmacy`.`p_id` = '".$p_id."';";
                mysqli_query($con,$sql1);
                mysqli_query($con,$sql2);
                mysqli_query($con,$sql3);
                
                $sql4="select customer.c_email, delivery.d_email, delivery.d_name, pharmacy.p_email, pharmacy.p_name, customer.c_name, customer.c_address, customer.c_telephone 
                FROM delivery, pharmacy, customer
                WHERE delivery.d_id=".$d_id." AND pharmacy.p_id=".$p_id." AND customer.c_id=".$_SESSION["c_id"].";";

                $result=mysqli_query($con,$sql4);
                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $demail	= $row['d_email'];
                        $pemail	= $row['p_email'];
                        $dname	= $row['d_name'];
                        $pname	= $row['p_name'];
                        $cemail	= $row['c_email'];
                        $cname	= $row['c_name'];
                        $cadd	= $row['c_address'];
                        $ctele	= $row['c_telephone'];
                    }
                    $email		= 'order@healthycare.com';
                    $mail_subject = 'New Order From Healthy Care';
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
                    $email_body   .="<h2 style="."text-align:center".">New Order From Healthy Care</h2>";
                    $email_body   .="<p style="."text-align:center".">Dear {$cname} we recived your order and your order is Processing.</p>";
                    $email_body   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
                    $email_body   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
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
                    $email_body2   .="<h2 style="."text-align:center".">New Order From Healthy Care</h2>";
                    $email_body2   .="<p style="."text-align:center".">Dear {$dname} you have recived a new order and your order will be available after the pharmacy update the order.</p>";
                    $email_body2   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body2   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body2   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body2   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body2   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body2   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body2   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
                    $email_body2   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body2   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body2   .="<div class="."container"."><div class="."center"."><a href="."http://healthycare.teamcodeit.com"." class="."button button5".">Website</a></div></div>";
                    $email_body2   .="</div></body></html>";
                    
                    $email_body3   ="<html><head><style>";
                    $email_body3  .="body{font-family:Arial;}";
                    $email_body3   .=".container{height:50px;position:relative;}";
                    $email_body3   .=".center{margin:0;position:absolute;top:50%;left:50%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);}";
                    $email_body3   .="table{border-collapse:collapse;width:100%;}";
                    $email_body3   .="td,th{border:1px solid #dddddd;text-align:left;padding:8px;}";
                    $email_body3   .="tr:nth-child(even){background-color:#dddddd;}";
                    $email_body3   .=".button{background-color:#4CAF50;border-radius:8px;border:none;color:white;padding:16px 50px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;transition-duration: 0.4s;cursor: pointer;}";
                    $email_body3   .=".button5{background-color:white;color:black;border:2px solid #555555;}";
                    $email_body3   .=".button5:hover{background-color:#555555;color:white;}";
                    $email_body3   .="</style></head><body>";
                    $email_body3   .="<div style="."background-color: white".">";
                    $email_body3   .="<img src="."http://healthycare.teamcodeit.com/images/Healthy%20Care-logos_black.png"." width="."50%"." style="."display:block;margin-left:auto;margin-right:auto;".">";
                    $email_body3   .="<h2 style="."text-align:center".">New Order From Healthy Care</h2>";
                    $email_body3   .="<p style="."text-align:center".">Dear {$pname} you have recived a new order, And please update the order ASAP!</p>";
                    $email_body3   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body3   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body3   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body3   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body3   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body3   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body3   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
                    $email_body3   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body3   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body3   .="<div class="."container"."><div class="."center"."><a href="."http://healthycare.teamcodeit.com"." class="."button button5".">Website</a></div></div>";
                    $email_body3   .="</div></body></html>";

                    $header = "From: {$email}\r\nContent-Type: text/html;";
                    $send_mail_result=mail($demail, $mail_subject, $email_body2, $header);
                    $send_mail_result2=mail($pemail, $mail_subject, $email_body3, $header);
                    $send_mail_result3=mail($cemail, $mail_subject, $email_body, $header);
                }
            }
                
                mysqli_close($con);
                
}
?>