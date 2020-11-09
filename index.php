<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pages where id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<p> ID: " . $row["id"]. " title: " . $row["title"]. " content: " . $row["content"]. "</p>";
  }
} else {
  echo "0 results";
}
$conn->close();

?>