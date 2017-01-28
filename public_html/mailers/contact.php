<?php
	require_once(__DIR__ . "/../../resources/config.php"); 
	$redirectURL = PROTOCOL . "://" . HOST . "/contact.php";
	try
	{
		$requiredFields = array(
			"category",
			"first_name",
			"last_name",
			"email",
			"subject",
			"message",
			);
		foreach ($requiredFields as $field)
		{
			if (!isset($_POST[$field]))
			{
				Flasher::set("danger", "You're missing a required field.");
				header("Location: " . $redirectURL);
				die();
			}
		}
		$category = $_POST["category"];
		$firstName = $_POST["first_name"];
		$lastName = $_POST["last_name"];
		$email = $_POST["email"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];
		$organization = isset($_POST["organization"]) ? $_POST["organization"] : false;
		//Deal with file stuff here
		if (isset($_POST["resume"]))
		{
			$uploadFile = UPLOAD_DIR . basename($_FILES['resume']['name']);
			if (!move_uploaded_file($_FILES['resume']['tmp_name'], $uploadfile)) 
			{
				Flasher::set("danger", "Possible file upload attack!");
			    header("Location: " . $redirectURL);
				die();  
			} 

		}

		$mail = new PHPMailer;
		$mail->setFrom("admin@" . HOST, "$firstName $lastName");
		$mail->addAddress("drewpereli@gmail.com");
		$mail->addReplyTo($email, "$firstName $lastName");
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->AddAttachment($uploadFile);
		if (!$mail->send())
		{
			Flasher::set("danger", "There was an error. Try again later.");
			header("Location: " . $redirectURL);
			die();
		}
		Flasher::set("success", "Your message has been sent.");
		header("Location: " . $redirectURL);
		die();
	}
	catch (Exception $e)
	{
		Flasher::set("danger", "There was an error.");
		header("Location: " . $redirectURL);
		die();
	}

?>