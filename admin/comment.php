<?php
// include 'config.php'; Ja lieto vienu pašu
//Dzēst komentāru
if (isset($_POST['submit'])) 
{
    foreach ($_POST['checkboxvar']  as $variable) {
        $sql = "DELETE FROM comment WHERE id=".$variable;
    
        if ($conn->query($sql) === TRUE) {
          echo "komentārs (id=".$variable.") veiksmīgi izdzēsta!<br>";
        } else {
          echo "Kļūda dzēšot komentāru: " . $sql . "<br>" . $conn->error . "<br>";
        }
        }
     
}

if(isset($_GET['delete'])){
    
    if ($_SESSION["role"]==="admin"){
    $sql = "DELETE FROM comment WHERE id=".$_GET["delete"];
    
    if ($conn->query($sql) === TRUE) {
      echo "komentārs (id=".$_GET["delete"].") veiksmīgi izdzēsta!<br>";
    } else {
      echo "Kļūda dzēšot komentāru: " . $sql . "<br>" . $conn->error . "<br>";
    }} else{
      echo "Nav adminastratora tiesības";
    }
}

if (isset($_POST["submit_edit"])){

  $sql = "UPDATE comment SET
  username='".$_POST["username"]."',
  comment='".$_POST["comment"]."'
  WHERE id=".$_GET['edit_id'];

if ($conn->query($sql) === TRUE) {
  echo "Komentārs veiksmīgi atjaunināta!<br><br>";

} else {
  echo "Kļūda rediģējot komentāru: " . $sql . "<br>" . $conn->error . "<br><br>";
}	


}

if(isset($_GET['edit'])){
    $sql_comments = "SELECT * FROM comment WHERE id=".$_GET["edit"];
    $result_comments = $conn->query($sql_comments);
    if ($result_comments->num_rows > 0) {
        // output data of each row

        while($row = $result_comments->fetch_assoc()) {
      
          echo '<form action="?action=comment&edit_id='.$_GET["edit"].'"  method="post">';
          echo 'lietotāvārds: <input type="text" name="username" value="'.$row["username"].'" required><br>';
          echo 'komentārs: <input type="text" name="comment" value="'.$row["comment"].'" required><br>';
          echo '<input type="submit" name="submit_edit">';
          echo '</form>';
         
        }

      }
    
}


//IZDRUKĀT visus izveidotos bloga komentārus
$sql = "SELECT * FROM comment";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  // output data of each row
  ?>
  <form action="" method="post">
  <?php
  while($row = $result->fetch_assoc()) {



    echo "<input type='checkbox' name='checkboxvar[]' value='".$row["id"]."'</input>";
  	echo '<a href="?action=comment&edit=',$row["id"],'">rediģēt</a>';
	  echo '<p><a href="?action=comment&delete=',$row["id"],'">dzēst</a>';
    echo ' ',$row["id"],'. ',$row["post_id"],' (Komentārs : ',$row["comment"],'  Lietotājs: '.$row["username"].')</p>';

   
  }
  ?>
  <input type="submit" name="submit" value="izdēsts">

  </form >
  <?php
} else {
  echo "Nav ierakstu!";
}



?>