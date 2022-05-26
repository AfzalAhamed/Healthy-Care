<?php

    /*$con=mysqli_connect("localhost","root","","healthycare");
    if(!$con){	
		die("Cannot connect to DB server");		
	} 
	

		$fullname	= "Afzal Ahamed";
		$email		= "order@healthycare.com";
		$subject	= "New Order From Healthy Care";
		$message	= "Des: 1 Panadol";

		$to	 		  = 'ahamedafzal45@gmail.com';
		$mail_subject = 'New Order From Healthy Care';
		$email_body   = "Message from Contact Us Page of the Website: <br>";
		$email_body   .= "<b>From:</b> {$fullname} <br>";
		$email_body   .= "<b>Message:</b><br>" . nl2br(strip_tags($message));

		$header       = "From: {$email}\r\nContent-Type: text/html;";

		$send_mail_result = mail($to, $mail_subject, $email_body, $header);
		
		if ( $send_mail_result ) {
			echo "Message Sent.";
		} else {
			echo "Message Not Sent.";
		}*/
		
		
                    $demail	= "ahamedafzal45@gmail.com";
                   
                    $email		= 'info@healthycare.com';
                    $mail_subject = 'New Order From Healthy Care';
                    $email_body   = "<h1>New Order From Healthy Care Website, PLease Log in to the website to update the order.<a href=healthycare.com>Click Here To Log In</a> </h1><br>";
                    

                    $header = "From: {$email}\r\nContent-Type: text/html;";
                    $send_mail_result=mail($demail, $mail_subject, $email_body, $header);
                    
                
              
                if ( $send_mail_result ) {
                    echo "Message Sent to delivery";
                } else {
                    echo "Message Not Sent to delivery";
                }
            
 ?>