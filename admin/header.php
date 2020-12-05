<h1 id="maintitle">Administratora panelis</h1>
<div id="menu">
<ul>
  <li><a href="index.php">Sākums</a></li>
  <li><a href="index.php?action=editpages">Lapas</a></li>
  <li><a href="index.php?action=blog">Blogs</a></li>
  <li><a href="index.php?action=install">Uzstādīt</a></li>
  <li><a href="index.php?action=comment">komentāru administrēšana</a></li>
  <li><a href="index.php?action=login">Ielogošana</a></li>
  <li><a href="index.php?action=search">Meklēt</a></li>
  <?php
  if (isset($_GET["submit"])){
    
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
  }
  
  if (isset($_SESSION["user"])){
    echo '<li style="float:right"><a href="?submit=">izziet no lietotāja '.$_SESSION["user"].'</a></li>';
  } 
  
  ?>
  <li style="float:right"><a href="../index.php">Aplūkot mājaslapu</a></li>
  
</ul>
</div>