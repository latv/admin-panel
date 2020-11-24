<?php
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
    

    $sql = "DELETE FROM comment WHERE id=".$_GET["delete"];
    
    if ($conn->query($sql) === TRUE) {
      echo "komentārs (id=".$_GET["delete"].") veiksmīgi izdzēsta!<br>";
    } else {
      echo "Kļūda dzēšot komentāru: " . $sql . "<br>" . $conn->error . "<br>";
    }
}


if(isset($_GET['edit'])){
    
    if ($result->num_rows > 0) {
        // output data of each row
        ?>
        <form action="" method="post">
        <?php
        while($row = $result->fetch_assoc()) {
      
      
      
          echo "<input type='checkbox' name='checkboxvar[]' value='".$row["id"]."'</input>";
          echo '<a href="?action=comment&edit=',$row["id"],'">rediģēt</a>';
         
         
        }
        ?>
        <input type="submit" name="submit" value="izdēsts">
      
        </form >
        <?php
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