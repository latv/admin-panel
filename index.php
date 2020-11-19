<?php include 'admin/config.php';?>
<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Projekts</title>
</HEAD>

<BODY>
<div id="wrapper">

<div id="header">
<?php include 'header.php';?>
</div>

<div id="page">
<?php
if (!isset($_GET["id"])) {
	echo "<h2>Esiet sveicināti pirmajā lapā!</h2>";	
} else {


if (isset($_POST["submit"])){

	
$sql = "INSERT INTO comment (post_id, username, comment)
VALUES ('".$_GET["postid"]."', '".$_POST["username"]."', '".$_POST["comment"]."')";

if ($conn->query($sql) === TRUE) {
	echo "Komentārs veiksmīgi pievienota!<br><br>";
  } else {
	echo "Kļūda pievienojot komentāru<br><br>";
  }


}
	//IZDRUKĀT DATUS NO DATUBĀZES
$sql = "SELECT * FROM pages WHERE id=".$_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $pagerow = mysqli_fetch_row($result);

    if ($pagerow["1"]<>"Blogs") { echo $pagerow["3"]; } else {
		
	if (isset($_GET["postid"])) {
		//ja saitē ir postid, tad mēs drukājam vienu ierakstu
	
	//IZDRUKĀT to ierakstu, kam id sakrīt ar saitē padoto postid
$sql = "SELECT * FROM posts WHERE id=".$_GET["postid"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$post_id=$row["id"];
	echo '<h2><a href="index.php?id=',$pagerow["0"],'&postid=',$row["id"],'">',$row["title"],'</a></h2>';
	echo '<span>Publicēts: ',$row["created_at"],'</span>';
	echo '<div>',$row["content"],'</div>';
  }
  echo "<h3>Komentāri<h3>";
  $sql_comments = "SELECT * FROM comment WHERE post_id=".$_GET["postid"]." order by created_at DESC";
$result_comments = $conn->query($sql_comments);

if ($result_comments->num_rows > 0) {
  // output data of each row
  while($row_comments = $result_comments->fetch_assoc()) {
	
	echo '<h3>',$row_comments["username"],'</h3>';
	// echo '<span>Publicēts: ',$row["created_at"],'</span>';
	echo '<p>',$row_comments["comment"],'</p>';
  }
  


} else {
  echo "Nav komentāru!";
}

		echo '<form action="index.php?id=',$pagerow["0"],'&postid=',$post_id,'"  method="post">';
		echo 'lietotāvārds: <input type="text" name="username" required><br>';
		echo 'komentārs: <input type="text" name="comment" required><br>';
		echo '<input type="submit" name="submit">';
		echo '</form>';


} else {
  echo "Nav ierakstu!";
}
	
	
	} else {
	//pretējā gadījumā drukājam visus ierakstus
	
	//echo "Šeit būs bloga ieraksti!";
//IZDRUKĀT visus izveidotos bloga ierakstus
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo '<h2><a href="index.php?id=',$pagerow["0"],'&postid=',$row["id"],'">',$row["title"],'</a></h2>';
	echo '<span>Publicēts: ',$row["created_at"],'</span>';
	echo '<div>',$row["content"],'</div>';
  }
} else {
  echo "Nav ierakstu!";
}	
	
	} //beidzas pārbaude, vai drukāt vienu vai visus ierakstus
	
	} //beidzas bloga ierakstu drukāšana
  
  
} else {
  echo "tukšs";
}
	
}

?>
</div>

<div id="footer">
</div>

</div><!-- beidzas wrapper -->
</BODY>
</HTML>