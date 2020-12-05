<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>

<form action="" method="post">
search: <input type="text" name="name"><br>

<input type="submit" name="submit">
</form>
<?php
if (isset($_POST["submit"])){
  $notFound=TRUE;
    $sql = 'SELECT * from pages WHERE title LIKE "%'.$_POST["name"].'%" or slug LIKE "%'.
    
    $_POST["name"].'%" or content LIKE "%'.$_POST["name"].'%"';
    $result_comments = $conn->query($sql);
    if ($result_comments->num_rows > 0) {
      $notFound=FALSE;
        // output data of each row
        ?>
        <p class="header">Lapas</p>

        <table style="width:100%">
<tr>
  <th>nosaukums</th>
  <th>īscels</th>
  <th>saturs</th>
  <th>rediģēt</th>
  <th>dzēst</th>
</tr>


<?php

        while($row = $result_comments->fetch_assoc()) {
        
          echo "<tr><td>".$row["title"]."</td><td>".$row["slug"]."</td><td>".$row["content"].
          "</td><td>"."<a href='index.php?action=search&editpageid=".$row["id"]."'>rediģēt</a>".
          "</td><td>"."<button>dzēst</button>"."</td><tr>";
         
        }
        ?>
     
        </table>
        <?php
      }
    $sql = 'SELECT * from posts WHERE title LIKE "%'.$_POST["name"].'%" or slug LIKE "%'.$_POST["name"].
    '%" or content LIKE "%'.$_POST["name"].'%"';
    $result_comments = $conn->query($sql);
    if ($result_comments->num_rows > 0) {
      $notFound=FALSE;
        // output data of each row
        ?>
         <p class="header">Blogi</p>
        <table style="width:100%">
<tr>
  <th>tittle</th>
  <th>slug</th>
  <th>content</th>
</tr>


<?php

        while($row = $result_comments->fetch_assoc()) {
        
          echo "<tr><td>".$row["title"]."</td><td>".$row["slug"]."</td><td>".$row["content"]."</td><tr>";
         
        }
        ?>
     
        </table>
        <?php

      }
      $sql = 'SELECT * from comment INNER JOIN posts on comment.post_id=posts.id WHERE username LIKE "%'.
      $_POST["name"].'%" or comment LIKE "%'.$_POST["name"].'%"';
      $result_comments = $conn->query($sql);
      if ($result_comments->num_rows > 0) {
        $notFound=FALSE;
          // output data of each row
          ?>
          <p class="header">Komentāri</p>
          <table style="width:100%">
  <tr>
    <th>nosaukums</th>
    <th>lietotājs</th>
    <th>Komentārs</th>
  </tr>


<?php
  
          while($row = $result_comments->fetch_assoc()) {

            

            echo "<tr><td>" .$row["title"]."</td><td>".$row["username"]."</td><td>".$row["comment"]."</td><tr>";
           
          }
          ?>
     
</table>
<?php
  
        }
        if($notFound===true){
          echo "<p>Nekas netika atrasts!</p>";
        }
}



?>