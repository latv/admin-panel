<?php
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'pages'"))) {
	echo "Uzstādīšana jau tika veikta!";
} else {

$sql="CREATE TABLE pages (
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title varchar(255),
	slug varchar(255),
	content text
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabula 'pages' veiksmīgi izveidota!<br>";
} else {
  echo "Kļūda veidojot tabulu 'pages': " . $sql . "<br>" . $conn->error . "<br>";
}


	echo "Uzstādīšana veiksmīga!";
}
?>