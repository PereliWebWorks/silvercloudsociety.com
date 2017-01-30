<?php
	require_once(__DIR__ . "/../resources/config.php");
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	$uploadFile = UPLOAD_DIR . basename($_FILES['resume']['name']);
	$success = move_uploaded_file($_FILES['resume']['tmp_name'], $uploadFile);
	var_dump($success);
?>

