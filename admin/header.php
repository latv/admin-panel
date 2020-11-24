<h1 id="maintitle">Administratora panelis</h1>
<div id="menu">
<ul>
  <li><a href="index.php">Sākums</a></li>
  <li><a href="index.php?action=editpages">Lapas</a></li>
  <li><a href="index.php?action=blog">Blogs</a></li>
  <li><a href="index.php?action=install">Uzstādīt</a></li>
  <li><a href="index.php?action=comment">komentāru administrēšana</a></li>
  <?php
  if (isset($_GET["submit"])){
    setcookie("user", "", time() - 3600);
  }
  
  if (isset($_COOKIE["user"])){
    echo '<li style="float:right"><a href="?submit=">izziet no lietotāja '.$_COOKIE["user"].'</a></li>';
  } 
  
  ?>
  <li style="float:right"><a href="../index.php">Aplūkot mājaslapu</a></li>
  
</ul>
</div>