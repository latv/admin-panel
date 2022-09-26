<?php
// Start the session
session_start();
?>
<?php include 'config.php'; ?>
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
			<?php include 'header.php'; ?>
		</div>

		<div id="page">
			<?php
			if (!isset($_GET["action"])) {
				echo "<h2>Esiet sveicināti administratora panelī!</h2>";
			} else {
				if ($_GET["action"] == 'editpages' and isset($_SESSION["SIGNED_IN"])) {
					include 'editpages.php';
				} else if ($_GET["action"] == 'editpages' and !isset($_SESSION["SIGNED_IN"])) {
					include 'login.php';
				}
				if ($_GET["action"] == 'blog' and isset($_SESSION["SIGNED_IN"])) {
					include 'blog.php';
				} else if ($_GET["action"] == 'blog' and !isset($_SESSION["SIGNED_IN"])) {
					include 'login.php';
				}
				if ($_GET["action"] == 'comment' and isset($_SESSION["SIGNED_IN"])) {
					include 'comment.php';
				} else if ($_GET["action"] == 'comment' and !isset($_SESSION["SIGNED_IN"])) {
					include 'login.php';
				}
				if ($_GET["action"] == 'login' and isset($_SESSION["SIGNED_IN"])) {
					echo "<p>Esi jau ielogojies</p>";
				} else if ($_GET["action"] == 'login' and !isset($_SESSION["SIGNED_IN"])) {
					include 'login.php';
				}
				if ($_GET["action"] == 'search' and isset($_SESSION["SIGNED_IN"])) {
					include 'search.php';
				} else if ($_GET["action"] == 'search' and !isset($_SESSION["SIGNED_IN"])) {
					include 'login.php';
				}
				// if ($_GET["action"] == 'search') { include 'search.php'; }
				if ($_GET["action"] == 'install') {
					include 'install.php';
				}
				if ($_GET["action"] == 'signup') {
					include 'signup.php';
				}
			}

			?>
		</div>

		<div id="footer">
		</div>

	</div><!-- beidzas wrapper -->
</BODY>

</HTML>