<?php
  include("conn.php");
     if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}
 
  if (!isset($_POST['mid'])||!isset($_POST['gid'])||!isset($_POST['intitule']))   
    { 
    include("affectgrpmod.php");
    }
  else
    {
    $gid = mysql_real_escape_string($_POST['gid']);
    $mid = mysql_real_escape_string($_POST['mid']);
    $intitule = mysql_real_escape_string($_POST['intitule']);
    $SQL = "UPDATE groupes SET mid=$mid WHERE gid =$gid";
    $res=mysql_query($SQL);

    if(!$res) 
      {
        echo $SQL;
      echo "<p>Erreur d'affectation</p>";
      }
    else 
      {
      echo "<p>Affectation effectuee</p>";
      }    
    echo "<p><a href='listgrp.php'>Revenir a la page precedente</a></p>";
      
    }
  
include ("footer.php");

?>

