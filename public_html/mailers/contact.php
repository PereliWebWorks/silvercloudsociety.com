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
					throw new RuntimeException('Exceeded filesize limit.');
				}
			    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
			    // Check MIME Type by yourself.
			    $finfo = new finfo(FILEINFO_MIME_TYPE);
			    print_r($finfo->file($_FILES['resume']['tmp_name']));
			    if (false === $ext = array_search(
				    	$finfo->file($_FILES['resume']['tmp_name']),
				        array(
				            'jpg' => 'image/jpeg',
				            'png' => 'image/png',
				            'gif' => 'image/gif',
				            'pdf' => 'image/pdf',
				        ),
				        true)
		    	) 
		    	{
			        throw new RuntimeException('Invalid file format.');
			    }
				//Try to move it. If it doesn't work, something is wrong.
				$newFileName = sha1_file($_FILES['resume']['tmp_name']);
				$uploadFile = UPLOAD_DIR . $newFileName . $ext;
				$moveSuccess = move_uploaded_file($_FILES['resume']['tmp_name'], $uploadfile);
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
			    //header("Location: " . $redirectURL);
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
			Flasher::set("danger", "There was an error. Try again later.");
			header("Location: " . $redirectURL);
			die();
		}
		Flasher::set("success", "Your message has been sent.");
		//header("Location: " . $redirectURL);
		die();
	}
	catch (Exception $e)
	{
		Flasher::set("danger", "There was an error.");
		header("Location: " . $redirectURL);
		die();
	}

?>