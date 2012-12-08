<?php 



  $page_title="Accueil Scolarité";
  include("conn.php");
     if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: accueil.php');
}
  if (isset($_SESSION))
  {
  
  echo "<br/>";

  }
  include("db_config.php");

  $conn = mysql_connect($DB_host, $DB_login, $DB_pass); 

  $db = mysql_select_db($DB_select, $conn);

  if (!$conn || !$db) die('Could not connect: ' . mysql_error()); 

echo "<a href='listeetu.php'>liste étudiants</a><br/>";
echo "<a href='listmod.php'>liste modules</a><br/>";
echo "<a href='listgrp.php'>liste groupes</a><br/>";
echo "<a href='listens.php'>liste enseignants</a><br/>";

 mysql_close($conn); 

  include("footer.php");


?>
