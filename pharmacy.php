<?php session_start();
if(!isset($_SESSION["p_id"]))
{
    header('Location:plogin.php');
}
$con=mysqli_connect("localhost","root","","healthycare");
if(!$con){	
	die("Cannot connect to DB server");		
}
 if(isset($_POST["update"]))
    {
        $status=$_POST["txtstatus"];
        $o_id=$_GET['o_id'];
        $d_id=$_GET['d_id'];
        $sql1="UPDATE `order` SET `order`.`o_status`='".$status."' WHERE `order`.`o_id`=".$o_id." ;";
        mysqli_query($con,$sql1);
        
        $sql4="select `order`.`o_des`, `order`.`o_datetime`, customer.c_email, delivery.d_email, delivery.d_name, pharmacy.p_email, pharmacy.p_name, customer.c_name, customer.c_address, customer.c_telephone 
FROM delivery, pharmacy, customer, `order`
WHERE `order`.`c_id`=customer.c_id AND `order`.`p_id`=pharmacy.p_id AND `order`.`d_id`=delivery.d_id AND `order`.`o_id`=".$o_id.";";

                $result=mysqli_query($con,$sql4);
                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $des	= $row['o_des'];
                        $o_datetime	= $row['o_datetime'];
                        $demail	= $row['d_email'];
                        $pemail	= $row['p_email'];
                        $dname	= $row['d_name'];
                        $pname	= $row['p_name'];
                        $cemail	= $row['c_email'];
                        $cname	= $row['c_name'];
                        $cadd	= $row['c_address'];
                        $ctele	= $row['c_telephone'];
                    }
                }
        
        if($status=="Canceled")
        {
            $sql2="UPDATE `pharmacy` SET `count` = `count`-1 WHERE `pharmacy`.`p_id` = ".$_SESSION["p_id"].";";
            $sql3="UPDATE `delivery` SET `count` = `count`-1 WHERE `delivery`.`d_id` = ".$d_id.";";
            mysqli_query($con,$sql2);
            mysqli_query($con,$sql3);
            
            
                    $email		= 'order@healthycare.com';
                    $mail_subject = 'Order Cancellation From Pharmacy';
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
                    $email_body   .="<h2 style="."text-align:center".">Order Cancellation From Pharmacy</h2>";
                    $email_body   .="<p style="."text-align:center".">Dear {$cname} your order has been Cancelled by the Pharmacy.</p>";
                    $email_body   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body   .="<tr><td>Order Date Time:</td><td>{$o_datetime}</td></tr>";
                    $email_body   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
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
                    $email_body2   .="<h2 style="."text-align:center".">Order Cancellation From Pharmacy</h2>";
                    $email_body2   .="<p style="."text-align:center".">Dear {$dname} your order has been Cancelled by the Pharmacy.</p>";
                    $email_body2   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body2   .="<tr><td>Order Date Time:</td><td>{$o_datetime}</td></tr>";
                    $email_body2   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body2   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body2   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body2   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body2   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body2   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
                    $email_body2   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body2   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body2   .="<br><h5 style="."text-align:center".">Please Contact Us +94 77 148 2569. If you have any doubt with this email.</h5>";
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
                    $email_body3   .="<h2 style="."text-align:center".">Order Cancellation From Pharmacy</h2>";
                    $email_body3   .="<p style="."text-align:center".">Dear {$pname} your order has been Cancelled.</p>";
                    $email_body3   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body3   .="<tr><td>Order Date Time:</td><td>{$o_datetime}</td></tr>";
                    $email_body3   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body3   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body3   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body3   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body3   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body3   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
                    $email_body3   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body3   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body3   .="<br><h5 style="."text-align:center".">Please Contact Us +94 77 148 2569. If you have any doubt with this email.</h5>";
                    $email_body3   .="<div class="."container"."><div class="."center"."><a href="."http://healthycare.teamcodeit.com"." class="."button button5".">Website</a></div></div>";
                    $email_body3   .="</div></body></html>";

                    $header = "From: {$email}\r\nContent-Type: text/html;";
                    $send_mail_result=mail($demail, $mail_subject, $email_body2, $header);
                    $send_mail_result2=mail($pemail, $mail_subject, $email_body3, $header);
                    $send_mail_result3=mail($cemail, $mail_subject, $email_body, $header);
                    
        }else if($status=="Packing"){
            
                    $email		= 'order@healthycare.com';
                    $mail_subject = 'Order is Packing by the Pharmacy';
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
                    $email_body   .="<h2 style="."text-align:center".">Order is Packing by the Pharmacy</h2>";
                    $email_body   .="<p style="."text-align:center".">Dear {$cname} your order is Packing by the Pharmacy.</p>";
                    $email_body   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body   .="<tr><td>Order Date Time:</td><td>{$o_datetime}</td></tr>";
                    $email_body   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
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
                    $email_body2   .="<h2 style="."text-align:center".">Order is Packing by the Pharmacy</h2>";
                    $email_body2   .="<p style="."text-align:center".">Dear {$dname} your order is Packing by the Pharmacy and Please collect it .</p>";
                    $email_body2   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body2   .="<tr><td>Order Date Time:</td><td>{$o_datetime}</td></tr>";
                    $email_body2   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body2   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body2   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body2   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body2   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body2   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
                    $email_body2   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body2   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body2   .="<br><h5 style="."text-align:center".">Please Contact Us +94 77 148 2569. If you have any doubt with this email.</h5>";
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
                    $email_body3   .="<h2 style="."text-align:center".">Order is Packing</h2>";
                    $email_body3   .="<p style="."text-align:center".">Dear {$pname} thank you for updating the order to Packing.</p>";
                    $email_body3   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body3   .="<tr><td>Order Date Time:</td><td>{$o_datetime}</td></tr>";
                    $email_body3   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body3   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body3   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body3   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body3   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body3   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
                    $email_body3   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body3   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body3   .="<br><h5 style="."text-align:center".">Please Contact Us +94 77 148 2569. If you have any doubt with this email.</h5>";
                    $email_body3   .="<div class="."container"."><div class="."center"."><a href="."http://healthycare.teamcodeit.com"." class="."button button5".">Website</a></div></div>";
                    $email_body3   .="</div></body></html>";

                    $header = "From: {$email}\r\nContent-Type: text/html;";
                    $send_mail_result=mail($demail, $mail_subject, $email_body2, $header);
                    $send_mail_result2=mail($pemail, $mail_subject, $email_body3, $header);
                    $send_mail_result3=mail($cemail, $mail_subject, $email_body, $header);
                    
        }else if($status=="Hand Overed"){
            
                    $email		= 'order@healthycare.com';
                    $mail_subject = 'Order has been Hand Overed to the Delivery Agent';
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
                    $email_body   .="<h2 style="."text-align:center".">Order has been Hand Overed to the Delivery Agent</h2>";
                    $email_body   .="<p style="."text-align:center".">Dear {$cname} your order has been Hand Overed to the Delivery Agent.</p>";
                    $email_body   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body   .="<tr><td>Order Date Time:</td><td>{$o_datetime}</td></tr>";
                    $email_body   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
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
                    $email_body2   .="<h2 style="."text-align:center".">Order has been Hand Overed to the Delivery Agent</h2>";
                    $email_body2   .="<p style="."text-align:center".">Dear {$dname} your order has been Hand Overed to you. Please Deliver it ASAP!</p>";
                    $email_body2   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body2   .="<tr><td>Order Date Time:</td><td>{$o_datetime}</td></tr>";
                    $email_body2   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body2   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body2   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body2   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body2   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body2   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
                    $email_body2   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body2   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body2   .="<br><h5 style="."text-align:center".">Please Contact Us +94 77 148 2569. If you have any doubt with this email.</h5>";
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
                    $email_body3   .="<h2 style="."text-align:center".">Order has been Hand Overed to the Delivery Agent</h2>";
                    $email_body3   .="<p style="."text-align:center".">Dear {$pname} thank you for Hand Overing the order to the Delivery Agent.</p>";
                    $email_body3   .="<table><tr><td>Order Id:</td><td>#{$o_id}</td></tr>";
                    $email_body3   .="<tr><td>Order Date Time:</td><td>{$o_datetime}</td></tr>";
                    $email_body3   .="<tr><td>Pharmacy Name:</td><td>{$pname}</td></tr>";
                    $email_body3   .="<tr><td>Delivery Agent Name:</td><td>{$dname}</td></tr>";
                    $email_body3   .="<tr><td>Customer Name:</td><td>{$cname}</td></tr>";
                    $email_body3   .="<tr><td>Customer Address:</td><td>{$cadd}</td></tr>";
                    $email_body3   .="<tr><td>Customer Telephone:</td><td>{$ctele}</td></tr>";
                    $email_body3   .="<tr><td>Order Description:</td><td>{$des}</td></tr></table>";
                    $email_body3   .="<br><h3 style="."text-align:center".">Healthy Care</h3>";
                    $email_body3   .="<h5 style="."text-align:center".">Copyright © 2021 Healthy Care. All rights reserved.</h5>";
                    $email_body3   .="<br><h5 style="."text-align:center".">Please Contact Us +94 77 148 2569. If you have any doubt with this email.</h5>";
                    $email_body3   .="<div class="."container"."><div class="."center"."><a href="."http://healthycare.teamcodeit.com"." class="."button button5".">Website</a></div></div>";
                    $email_body3   .="</div></body></html>";

                    $header = "From: {$email}\r\nContent-Type: text/html;";
                    $send_mail_result=mail($demail, $mail_subject, $email_body2, $header);
                    $send_mail_result2=mail($pemail, $mail_subject, $email_body3, $header);
                    $send_mail_result3=mail($cemail, $mail_subject, $email_body, $header);
        }
        
        header('Location:pharmacy.php');
             
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pharmacy</title>
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
    <link rel="stylesheet" href="css/stylesheet.css">
<link rel="stylesheet" href="css/menu2.css">
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

 <a href="paccount.php" class="appointment-btn scrollto">Account</a>
</div>
</header>
<br><br><br><br><br><br>


<h1 style="text-align: center">Orders</h1>
<br><br><br>
<div class="tab" style="min-height: 60vh;">
  <button class="tablinks" onclick="openCity(event, 'New')" id="defaultOpen">New Orders</button>
  <button class="tablinks" onclick="openCity(event, 'Hand Overed')">Hand Overed</button>
  <button class="tablinks" onclick="openCity(event, 'Canceled')">Canceled</button>
</div>

<div id="New" class="tabcontent">
   <table class="table">
  						  <tr class="tr">
							<th width="10%" class="th">Order Number</th>
							<th width="15%" class="th">Customer Name</th>
							<th width="20%" class="th">Delivery Agent Name</th>
							<th width="20%" class="th">Telephone</th>
							<th width="15%" class="th">Order Image</th>
                            <th width="15%" class="th">Order Description</th>
							<th width="10%" class="th">Status</th>
							<th width="10%" class="th"></th>
					  	  </tr>
							<?php 
                            
                                          $sql2 ="SELECT `order`.`o_id`, `customer`.`c_name`, `customer`.`c_id`, `delivery`.`d_name`, `delivery`.`d_id`, `customer`.`c_telephone`,`order`.`o_image`, `order`.`o_des`, `order`.`o_status`
                                            FROM `order`, `customer`, `delivery`	 
                                            WHERE `order`.`c_id`=`customer`.c_id AND `order`.`d_id`=`delivery`.`d_id` AND
                                            `order`.`p_id`=".$_SESSION["p_id"]." AND `order`.`o_status`!='Hand Overed' AND `order`.`o_status`!='Canceled' AND `order`.`o_status`!='Delivered';";
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
										<tr class="tr">
										<td class="td"><?php $o_id=$row['o_id']; echo $o_id ?></td>
										<td class="td"><?php echo $row['c_name']; ?></td>
										<td class="td"><?php echo $row['d_name']; ?></td>
										<td class="td"><?php echo $row['c_telephone']; ?></td>
                                        <td class="td"><a href="http://healthycare.teamcodeit.com/<?php echo $img ?>">View Image</a></td>
										<td class="td"><?php echo $row['o_des']; ?></td>
                                        <td class="td"><?php echo $row['o_status']; ?></td>
										<td class="td">
                                         <form style="text-align: left" action="pharmacy.php?o_id=<?php echo $o_id ?>&d_id=<?php echo $row['d_id']; ?>" method="post">
                                                <select class="input2" id="txtstatus" name="txtstatus">
                                                                <option value="Packing" selected>Packing</option>
                                                                <option value="Hand Overed">Hand Overed</option>
                                                                <option value="Canceled">Canceled</option>
                                                </select>
                                                <input class="button" type="submit" id="update" name="update">
                                            </form> 

                                            
                                        </td>
									  	</tr>
										<?php
									}
							  	  }else{
								  	 echo "No Orders in Order Book";
							  	  }
						    ?>
				</table>
  
</div>

<div id="Canceled" class="tabcontent">
   <table class="table">
  						  <tr class="tr">
							<th width="10%" class="th">Order Number</th>
							<th width="15%" class="th">Customer Name</th>
							<th width="20%" class="th">Delivery Agent Name</th>
							<th width="20%" class="th">Telephone</th>
                            <th width="15%" class="th">Order Description</th>
							<th width="10%" class="th">Status</th>
							
					  	  </tr>
							<?php 
                          
								  $sql2 ="SELECT `order`.`o_id`, `customer`.`c_name`, `delivery`.`d_name`, `customer`.`c_telephone`,`order`.`o_image`, `order`.`o_des`, `order`.`o_status`
                                    FROM `order`, `customer`, `delivery`	 
                                    WHERE `order`.`c_id`=`customer`.c_id AND `order`.`d_id`=`delivery`.`d_id` AND
                                    `order`.`p_id`=".$_SESSION["p_id"]." AND `order`.`o_status`='Canceled';";	
								  $result2 = mysqli_query($con,$sql2);
								  if(mysqli_num_rows($result2)> 0){
									while($row = mysqli_fetch_assoc($result2))
									{
										?>
										<tr class="tr">
										<td class="td"><?php $o_id=$row['o_id']; echo $o_id ?></td>
										<td class="td"><?php echo $row['c_name']; ?></td>
										<td class="td"><?php echo $row['d_name']; ?></td>
										<td class="td"><?php echo $row['c_telephone']; ?></td>
										<td class="td"><?php echo $row['o_des']; ?></td>
                                        <td class="td"><?php echo $row['o_status']; ?></td>
									  	</tr>
										
										<tr class="tr">
										<td class="td"></td>
										<td class="td"></td>
										<td class="td"></td>
										<td class="td"></td>
                                        <td class="td"></td>
										<td class="td"></td>
									  	</tr>
										<?php
									}
							  	  }else{
								  	 echo "No Orders in Order Book";
							  	  }
						    ?>
				</table>
  
</div>

<div id="Hand Overed" class="tabcontent">
   <table class="table">
  						  <tr class="tr">
							<th width="10%" class="th">Order Number</th>
							<th width="15%" class="th">Customer Name</th>
							<th width="20%" class="th">Delivery Agent Name</th>
							<th width="20%" class="th">Telephone</th>
                            <th width="15%" class="th">Order Description</th>
							<th width="10%" class="th">Status</th>
							
					  	  </tr>
							<?php 
                       
								  $sql2 ="SELECT `order`.`o_id`, `customer`.`c_name`, `delivery`.`d_name`, `customer`.`c_telephone`,`order`.`o_image`, `order`.`o_des`, `order`.`o_status`
                                    FROM `order`, `customer`, `delivery`	 
                                    WHERE `order`.`c_id`=`customer`.c_id AND `order`.`d_id`=`delivery`.`d_id` AND
                                    `order`.`p_id`=".$_SESSION["p_id"]." HAVING `order`.`o_status`='Hand Overed' OR `order`.`o_status`='Delivered';";	
								  $result2 = mysqli_query($con,$sql2);
								  if(mysqli_num_rows($result2)> 0){
									while($row = mysqli_fetch_assoc($result2))
									{
										?>
										<tr class="tr">
										<td class="td"><?php $o_id=$row['o_id']; echo $o_id ?></td>
										<td class="td"><?php echo $row['c_name']; ?></td>
										<td class="td"><?php echo $row['d_name']; ?></td>
										<td class="td"><?php echo $row['c_telephone']; ?></td>
										<td class="td"><?php echo $row['o_des']; ?></td>
                                        <td class="td"><?php echo $row['o_status']; ?></td>
									  	</tr>
										
										<tr class="tr">
										<td class="td"></td>
										<td class="td"></td>
										<td class="td"></td>
										<td class="td"></td>
                                        <td class="td"></td>
										<td class="td"></td>
									  	</tr>
										<?php
									}
							  	  }else{
								  	 echo "No Orders in Order Book";
							  	  }
							  	  mysqli_close($con);
						    ?>
				</table>
  
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
      tabcontent[i].style.minHeight = "60vh";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</script>

<br><br> <br><br> <br><br> 
  
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