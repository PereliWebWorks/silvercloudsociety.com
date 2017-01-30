<?php require_once(__DIR__ . "/../resources/config.php"); ?>
<?php include(__DIR__ . "/../resources/templates/head.php"); ?>
	<form enctype="multipart/form-data" method="post" action="file-test2.php">
		<!--<input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
      	<input type="file" id="contact-resume" name="resume" />
      	<input type="submit" value="Submit" />
	</form>
<?php include(__DIR__ . "/../resources/templates/foot.php"); ?>
