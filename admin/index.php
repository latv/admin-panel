<?php
// Start the session
session_start();
?>
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
	if ($_GET["action"] == 'editpages' and isset($_COOKIE["user"])) { include 'editpages.php'; } else if ($_GET["action"] == 'editpages' and !isset($_COOKIE["user"])) {include 'login.php';}
	if ($_GET["action"] == 'blog' and isset($_COOKIE["user"])) { include 'blog.php';  }else if ($_GET["action"] == 'blog' and !isset($_COOKIE["user"])) {include 'login.php';}
	if ($_GET["action"] == 'install') { include 'install.php'; }
	
}

?>
</div>

<div id="footer">
</div>

</div><!-- beidzas wrapper -->
</BODY>
</HTML>