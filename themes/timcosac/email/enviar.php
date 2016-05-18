<?php
	

	//Obtenemos las valores enviados
	$name    = $_POST['nombre'];
	$email   = $_POST['email'];
	$message = $_POST['message'];


	//Email A quien se le rinde cuentas
	$webmaster_email = "jgomez.4net@gmail.com";

	include("./class.phpmailer.php");
 	include("./class.smtp.php");

	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = 'ssl'; 

	$mail->Host      = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port      = 25;
	$mail->SMTPAuth  = true; // turn on SMTP authentication
	$mail->Username  = "jgomez.4net@gmail.com"; // Enter your SMTP username
	$mail->Password  = "ARLAC_1RINOEVER"; // SMTP password

	$mail->From     = $email;
	$mail->FromName = $name;
	$mail->AddAddress( $webmaster_email );

	$mail->IsHTML(true); // send as HTML
	$mail->Subject = "Consulta - Mensaje Timco Formulario";
	$mail->Body    = "hola";

	if($mail->Send()){
		echo "Message has been sent"; 
	} else {
		echo "Mailer Error: " . $mail->ErrorInfo ; 
	}

?>