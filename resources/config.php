<?php
	if (!session_id()) session_start();
	require_once(__DIR__ . "/library/vendor/autoload.php");
	require_once(__DIR__ . "/library/flasher.php");
	define("HOST", "marcus.drewpereli.com");
	define("PROTOCOL", "http");
	define("UPLOAD_DIR", "/var/www/marcus.drewpereli.com/resources/uploaded_resumes/");
	define("MAX_FILE_SIZE", 500000);
	ini_set("error_reporting", "true");
	error_reporting(E_ALL|E_STRCT);
?>