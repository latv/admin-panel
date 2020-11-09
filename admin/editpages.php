<?php
if(isset($_POST['submit'])){ 
//ievietošana notiek tikai tad, kad tika aizpildīta forma un nospiesta submit poga
	
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

?>
<h2>Pievienot lapu</h2>
<form action="" method="post">
<input type="text" name="pagetitle" placeholder="Lapas nosaukums" value="<?php if(isset($_POST['pagetitle'])){echo $_POST['pagetitle'];} ?>" required><br><br>
<input type="text" name="pageslug" placeholder="Lapas īsceļš" value="<?php if(isset($_POST['pageslug'])){echo $_POST['pageslug'];} ?>" required><br><br>
<textarea name="pagecontent" placeholder="Lapas saturs" rows="7" cols="50"><?php if(isset($_POST['pagecontent'])){echo $_POST['pagecontent'];} ?></textarea><br><br>
<input type="submit" name="submit" value="Saglabāt">
</form>