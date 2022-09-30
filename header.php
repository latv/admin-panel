<h1 id="maintitle">Projekts</h1>
<div id="menu">
<ul>
<?php
//IZDRUKĀT sadaļu nosaukumus kā pogas (saites) no datubāzes
$sql = "SELECT * FROM pages order by order_number ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   	echo '<li><a href="index.php?id=',$row["id"],'">',$row["title"],'</a></li>';
  }
} else {
  echo "0 results";
}

//IZDRUKĀT sadaļu nosaukumus kā pogas (saites) no datubāzes
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   	echo '<li><a href="index.php?postid=',$row["id"],'">',$row["title"],'</a></li>';
  }
} else {
  echo "0 results";
}

?>
   <li style="float:right"><a href="admin/index.php">Administrēt</a></li>
</ul>
</div>