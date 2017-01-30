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
				throw new RuntimeException("You're missing a required field.");
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
		if (isset($_FILES["resume"]))
		{
			try //Not a real loop. Just something to break out of if something is wrong
			{
				// Undefined | Multiple Files | $_FILES Corruption Attack
			    // If this request falls under any of them, treat it invalid.
			    if (!isset($_FILES['resume']['error']) || is_array($_FILES['resume']['error'])) 
			    {
			        throw new RuntimeException('Invalid parameters.');
			    }
			    // Check $_FILES['upfile']['error'] value.
			    switch ($_FILES['resume']['error']) {
			        case UPLOAD_ERR_OK:
			            break;
			        case UPLOAD_ERR_NO_FILE:
			            throw new RuntimeException('No file sent.');
			        case UPLOAD_ERR_INI_SIZE:
			        case UPLOAD_ERR_FORM_SIZE:
			            throw new RuntimeException('Exceeded filesize limit.');
			        default:
			            throw new RuntimeException('Unknown errors.');
			    }
				//If it's too big, abort.
				if ($_FILES['resume']['size'] > MAX_FILE_SIZE)
				{
					throw new RuntimeException('This file is too large.');
				}
			    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
			    // Check MIME Type by yourself.
			    $finfo = new finfo(FILEINFO_MIME_TYPE);
			    if (false === $ext = array_search(
				    	$finfo->file($_FILES['resume']['tmp_name']),
				        array(
				            'pdf' => 'image/pdf',
				        ),
				        true)
		    	) 
		    	{
			        throw new RuntimeException('Your resume must be a PDF.');
			    }
				//Try to move it. If it doesn't work, something is wrong.
				$newFileName = sha1_file($_FILES['resume']['tmp_name']);
				$uploadFile = UPLOAD_DIR . "$newFileName.$ext";
				//$uploadFile = UPLOAD_DIR . basename($_FILES['resume']['name']);
				//echo $_FILES['resume']['name'] . "<br/>";
				$moveSuccess = move_uploaded_file($_FILES['resume']['tmp_name'], $uploadFile);
				if (!$moveSuccess) 
				{
					throw new RuntimeException('Failed to move uploaded file.');
				} 
			}
			catch (RuntimeException $e)
			{
				unlink($_FILES['resume']['tmp_name']);
				unlink($uploadFile); //Just to be safe.
				Flasher::set("danger", $e->getMessage());
			    echo $e->getMessage();
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
		$mail->AddAttachment($uploadFile, "Resume");
		if (!$mail->send())
		{
			throw new RuntimeException('Failed to send email.');
		}

		Flasher::set("success", "Your message has been sent.");
	}
	catch (Exception $e)
	{
		Flasher::set("danger", $e->getMessage());
	}
	unlink($_FILES['resume']['tmp_name']);
	unlink($uploadFile); //Just to be safe.
	header("Location: " . $redirectURL);
?>



