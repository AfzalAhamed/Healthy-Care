<?php 
    $con=mysqli_connect("localhost","root","","healthycare");
                 if(!$con)
                 {
                      die("sorry we are facing a techincal issue");
                 }
	if ( isset($_POST['submit']) ) {
		$fullname	= $_POST['fullname'];
		$email		= $_POST['email'];
        $telephone	= $_POST['telephone'];
		$subject	= $_POST['subject'];
		$message	= $_POST['message'];

		$to	 		  = 'ahamedafzal45@gmail.com';
		$mail_subject = 'Message from Website';
		$email_body   = "Message from Contact Us Page of the Website: <br>";
		$email_body   .= "<b>From:</b> {$fullname} <br>";
		$email_body   .= "<b>Subject:</b> {$subject} <br>";
		$email_body   .= "<b>Message:</b><br>" . nl2br(strip_tags($message));

		$header       = "From: {$email}\r\nContent-Type: text/html;";

		$send_mail_result = mail($to, $mail_subject, $email_body, $header);
		
		$sql="INSERT INTO `email` (`sender_name`, `sender_email`, `sender_telephone`, `sender_subject`,`sender_message`, `email_datetime`) VALUES ('".$fullname."', '".$email."', '".$telephone."', '".$subject."','".$message."', current_timestamp());";
        mysqli_query($con,$sql);
        header('Location:index.html');
	}
 ?>