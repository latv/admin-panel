
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Ielogošanas forma</h2>
<?php 

// include "config.php";
if(isset($_POST["submit"])){
$sql= 'SELECT * FROM `user` WHERE user="'.$_POST["user"].'" AND password="'.md5($_POST["psw"]).'"';
$result = $conn->query($sql);
$e2=$result->num_rows;
if ($e2>0) {
    
echo "<p>Šāds ieraksta lietotājs jau eksistē!</p>";
setcookie("user", $_POST["user"], time()+3600);
header("Location:index.php");

}else 
{
    echo "<p>Šāds ieraksta lietotājs neeksistē!</p>";


}}

?>

<form action="" method="post">
  <div class="container">
    <label for="user"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="submit">Login</button>

  </div>

  <div class="container" style="background-color:#f1f1f1">
    <!-- <button type="button" class="cancelbtn">Cancel</button> -->
    <span class="psw"> <a href="signup.php">piereģistrēt</a></span>
  </div>
</form>

</body>
</html>
