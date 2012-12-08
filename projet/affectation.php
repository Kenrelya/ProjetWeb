<?php
  
  include("conn.php");
     if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}
 
  if (!isset($_POST['eid'])||!isset($_POST['gid']))   
    { 
    include("affectetugrp.php");
    }
  else
    {
    $gid = mysql_real_escape_string($_POST['gid']);
    $eid = mysql_real_escape_string($_POST['eid']);
    $SQL = "INSERT INTO affectations VALUES ('$eid','$gid')";
    $res=mysql_query($SQL);

    if(!$res) 
      {
      echo "<p>Erreur d'insertion</p>";
      }
    else 
      {
      echo "<p>Affectation effectuee</p>";
      }    
    echo "<p><a href='listeetu.php'>Revenir a la page precedente</a></p>";
      
    }
  
include ("footer.php");

?>

