<?php include 'config.php';?>
<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="admin.css">
<title>Administratora panelis</title>
</HEAD>

<BODY>
<div id="wrapper">

<div id="header">
<?php include 'header.php';?>
</div>

<div id="page">
<?php
if (!isset($_GET["action"])) {
	echo "<h2>Esiet sveicināti administratora panelī!</h2>";	
} else {
	if ($_GET["action"] == 'editpages') { include 'editpages.php'; }
	if ($_GET["action"] == 'install') { include 'install.php'; }
}

?>
</div>

<div id="footer">
</div>

</div><!-- beidzas wrapper -->
</BODY>
</HTML>