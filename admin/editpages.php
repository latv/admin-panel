<?php
if ((isset($_POST['submit']))&&(!isset($_GET['edit']))) { 
//ievietošana notiek tikai tad, kad tika aizpildīta forma un nospiesta submit poga, kā arī ja saitē nav atrodams "edit"
	
$sql = "SELECT * FROM pages WHERE title='".$_POST["pagetitle"]."'";
$result = $conn->query($sql);
$e1=$result->num_rows;

$sql = "SELECT * FROM pages WHERE slug='".$_POST["pageslug"]."'";
$result = $conn->query($sql);
$e2=$result->num_rows;


if (($e1>0)or($e2>0)) {
  if ($e1>0) {echo "<p>Šāds lapas nosaukums jau eksistē!</p>";}
  if ($e2>0) {echo "<p>Šāds lapas īsceļš jau eksistē!</p>";}
  
} else {


$sql = "INSERT INTO pages (title, slug, content)
VALUES ('".$_POST["pagetitle"]."', '".$_POST["pageslug"]."', '".$_POST["pagecontent"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Lapa '".$_POST["pagetitle"]."' veiksmīgi pievienota!<br><br>";
} else {
  echo "Kļūda pievienojot lapu: " . $sql . "<br>" . $conn->error . "<br><br>";
}
} //aizver if (($e1>0)or($e2>0)or($e3>0))
} //aizver if isset

if ((isset($_POST['submit']))&&(isset($_GET['edit']))) {
//lapas atjaunināšana
	
$sql = "UPDATE pages SET
title='".$_POST["pagetitle"]."',
slug='".$_POST["pageslug"]."',
content='".$_POST["pagecontent"]."'
WHERE id=".$_GET['edit'];

if ($conn->query($sql) === TRUE) {
  echo "Lapa '".$_POST["pagetitle"]."' veiksmīgi atjaunināta!<br><br>";
  echo '<a href="?action=editpages">Pievienot jaunu lapu</a>';
} else {
  echo "Kļūda rediģējot lapu: " . $sql . "<br>" . $conn->error . "<br><br>";
}	
	
} // beidzas lapas atjaunināšana



if(isset($_GET["edit"])) {
$sql = "SELECT * FROM pages WHERE id=".$_GET["edit"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc(); 
}	
}
?>
<h2><?php if(isset($_GET["edit"])) 
	{echo "Rediģēt lapu";} else {echo "Pievienot lapu";}  ?></h2>
<form action="" method="post">
<input type="text" name="pagetitle" placeholder="Lapas nosaukums" value="<?php if(isset($_GET["edit"])) {echo $row["title"];} ?>" required><br><br>
<input type="text" name="pageslug" placeholder="Lapas īsceļš" value="<?php if(isset($_GET["edit"])) {echo $row["slug"];} ?>" required><br><br>
<textarea name="pagecontent" placeholder="Lapas saturs" rows="7" cols="70"><?php if(isset($_GET["edit"])) {echo $row["content"];} ?></textarea><br><br>
<input type="submit" name="submit" value="<?php if(isset($_GET["edit"])) 
	{echo "Atjaunināt";} else {echo "Saglabāt";}  ?>">
</form>
<h2>Izveidotās sadaļas</h2>
<?php

//Dzēst sadaļas
if(isset($_GET['delete'])){

$sql = "DELETE FROM pages WHERE id=".$_GET["delete"];

if ($conn->query($sql) === TRUE) {
  echo "Sadaļa (id=".$_GET["delete"].") veiksmīgi izdzēsta!<br>";
} else {
  echo "Kļūda dzēšot sadaļu: " . $sql . "<br>" . $conn->error . "<br>";
}
}

//IZDRUKĀT visas izveidotās sadaļas
$sql = "SELECT * FROM pages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo '<p><a href="?action=editpages&delete=',$row["id"],'">dzēst</a>';
	echo ' <a href="?action=editpages&edit=',$row["id"],'">rediģēt</a>';
   	echo ' ',$row["id"],'. ',$row["title"],' (/',$row["slug"],')</p>';
  }
} else {
  echo "nav sadaļu";
}
?>












