<?php
	require_once(__DIR__ "/../../resources/config.php"); 
	$r = array("success"=>false, "message"=>"There was an error.");
	try
	{
		$category = $_POST["category"];
		$firstName = $_POST["first_name"];
		$lastName = $_POST["last_name"];
		$email = $_POST["email"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];
		$organization = isset($_POST["organization"]) ? $_POST["organization"] : false;

		$mail = new PHPMailer;
		$mail->setFrom("admin@" . HOST, "$firstName $lastName");
		$mail->addAddress("drewpereli@gmail.com");
		$mail->addReplyTo($email, "$firstName $lastName");
		$mail->Subject = $subject;
		$mail->Body = $message;
		if (!$mail->send())
		{
			echo json_encode($r);
			die();
		}
		$r["success"] = true;
		$r["message"] = "Your message has been sent!";
		echo json_encode($r);
	}
	catch (Exception $e)
	{
		$r["message"] = $e->getMessage();
		echo json_encode($r);
	}

?>