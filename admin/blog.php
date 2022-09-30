<?php

//BLOGA IERAKSTU IEVIETOŠANA
if ((isset($_POST['submit']))&&(!isset($_GET['edit']))) { 
//ievietošana notiek tikai tad, kad tika aizpildīta forma un nospiesta submit poga, kā arī ja saitē nav atrodams "edit"
	
$sql = "SELECT * FROM posts WHERE title='".$_POST["posttitle"]."'";
$result = $conn->query($sql);
$e1=$result->num_rows;

$sql = "SELECT * FROM posts WHERE slug='".$_POST["postslug"]."'";
$result = $conn->query($sql);
$e2=$result->num_rows;


if (($e1>0)or($e2>0)) {
  if ($e1>0) {echo "<p>Šāds ieraksta nosaukums jau eksistē!</p>";}
  if ($e2>0) {echo "<p>Šāds ieraksta īsceļš jau eksistē!</p>";}
  
} else {


$sql = "INSERT INTO posts (id, title, slug, content)
VALUES ('".$_POST["id"]."' , '".$_POST["posttitle"]."', '".$_POST["postslug"]."', '".$_POST["postcontent"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Ieraksts '".$_POST["posttitle"]."' veiksmīgi pievienots!<br><br>";
} else {
  echo "Kļūda pievienojot ierakstu: " . $sql . "<br>" . $conn->error . "<br><br>";
}
} //aizver if (($e1>0)or($e2>0)or($e3>0))
} //aizver if isset

//BLOGA IERAKSTU REDIĢĒŠANA
if ((isset($_POST['submit']))&&(isset($_GET['edit']))) {
	
$sql = "UPDATE posts SET
title='".$_POST["posttitle"]."',
slug='".$_POST["postslug"]."',
content='".$_POST["postcontent"]."'
WHERE id=".$_GET['edit'];

if ($conn->query($sql) === TRUE) {
  echo "Ieraksts '".$_POST["posttitle"]."' veiksmīgi atjaunināts!<br><br>";
  echo '<a href="?action=blog">Pievienot jaunu ierakstu</a>';
} else {
  echo "Kļūda rediģējot ierakstu: " . $sql . "<br>" . $conn->error . "<br><br>";
}	
} // beidzas ierakstu rediģēšana



if(isset($_GET["edit"])) {
$sql = "SELECT * FROM posts WHERE id=".$_GET["edit"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc(); 
}	
}
?>
<h2><?php if(isset($_GET["edit"])) 
	{echo "Rediģēt bloga ierakstu";} else {echo "Pievienot bloga ierakstu";}  ?></h2>
<form action="" method="post">
<input type="text" name="posttitle" placeholder="Ieraksta nosaukums" value="<?php if(isset($_GET["edit"])) {echo $row["title"];} ?>" required><br><br>
<input type="text" name="postslug" placeholder="Ieraksta īsceļš" value="<?php if(isset($_GET["edit"])) {echo $row["slug"];} ?>" required><br><br>
<textarea name="postcontent" placeholder="Ieraksta saturs" rows="7" cols="70"><?php if(isset($_GET["edit"])) {echo $row["content"];} ?></textarea><br><br>
<input type="submit" name="submit" value="<?php if(isset($_GET["edit"])) 
	{echo "Atjaunināt";} else {echo "Saglabāt";}  ?>">
</form>
<h2>Izveidotie bloga ieraksti</h2>
<?php

//Dzēst bloga ierakstus
if(isset($_GET['delete'])){

$sql = "DELETE FROM posts WHERE id=".$_GET["delete"];

if ($conn->query($sql) === TRUE) {
  echo "Ieraksts (id=".$_GET["delete"].") veiksmīgi izdzēsts!<br>";
} else {
  echo "Kļūda dzēšot ierakstu: " . $sql . "<br>" . $conn->error . "<br>";
}
}

//IZDRUKĀT visus izveidotos bloga ierakstus
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo '<p><a href="?action=blog&delete=',$row["id"],'">dzēst</a>';
	echo ' <a href="?action=blog&edit=',$row["id"],'">rediģēt</a>';
   	echo ' ',$row["id"],'. ',$row["title"],' (/',$row["slug"],')</p>';
  }
} else {
  echo "Nav ierakstu!";
}
?>

