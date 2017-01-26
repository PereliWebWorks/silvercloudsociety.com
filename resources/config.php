<?php
	if (!session_id()) session_start();
	require_once(__DIR__ . "/library/vendor/autoload.php");
	require_once(__DIR__ . "/library/flasher.php");
	define("HOST", "marcus.drewpereli.com");
	define("PROTOCOL", "http");
	ini_set("error_reporting", "true");
	error_reporting(E_ALL|E_STRCT);
?>