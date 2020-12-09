<?php
//VEIDOJAM TABULU PAGES
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'pages'"))) {
	echo "Tablula 'pages' jau eksistē!<br>";
} else {

$sql="CREATE TABLE pages (
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title varchar(255),
	slug varchar(255),
	content text,
	order_number int
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabula 'pages' veiksmīgi izveidota!<br>";
} else {
  echo "Kļūda veidojot tabulu 'pages': " . $sql . "<br>" . $conn->error . "<br>";
}
} //beidzas pārbaude, vai tabula pages eksistē

//VEIDOJAM TABULU POSTS
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'posts'"))) {
	echo "Tabula 'posts' jau eksistē!<br>";
} else {
	
$sql="CREATE TABLE posts (
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title varchar(255),
	slug varchar(255),
	content text,
	user varchar(255),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabula 'posts' veiksmīgi izveidota!<br>";
} else {
  echo "Kļūda veidojot tabulu 'posts': " . $sql . "<br>" . $conn->error . "<br>";
}
} //beidzas pārbaude, vai tabula posts eksistē

echo "Uzstādīšana veiksmīga!";

//VEIDOJAM TABULU comments
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'comment'"))) {
	echo "Tabula 'comment' jau eksistē!<br>";
} else {
	
$sql="CREATE TABLE comment (
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	post_id int,
	username varchar(255),
	comment varchar(255),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabula 'comment' veiksmīgi izveidota!<br>";
} else {
  echo "Kļūda veidojot tabulu 'comment': " . $sql . "<br>" . $conn->error . "<br>";
}
} //beidzas pārbaude, vai tabula posts eksistē

echo "Uzstādīšana veiksmīga!";


//VEIDOJAM TABULU comments
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'user'"))) {
	echo "Tabula 'user' jau eksistē!<br>";
} else {
	
$sql="CREATE TABLE user (
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user varchar(255),
	password varchar(255),
	role varchar(255),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabula 'user' veiksmīgi izveidota!<br>";
} else {
  echo "Kļūda veidojot tabulu 'user': " . $sql . "<br>" . $conn->error . "<br>";
}
} //beidzas pārbaude, vai tabula posts eksistē

echo "Uzstādīšana veiksmīga!";

?>