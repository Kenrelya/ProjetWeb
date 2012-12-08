<?php
  session_start();
include("conn.php");
 
  if (!isset($_POST['note']))   
    { 
    include("ajoutnote.php");
    }
  else
    {
    $note = mysql_real_escape_string($_POST['note']);
    $gid = mysql_real_escape_string($_POST['gid']);
    $SQL = "INSERT INTO notes VALUES ('','$eid','$note')";
    $res=mysql_query($SQL);

    if(!$res) 
      {
      echo "<p>Erreur d'insertion</p>";
      }
    else 
      {
      echo "<p>note ajoutee</p>";
      }    
    echo "<p><a href='listeetu.php'>Revenir a la page precedente</a></p>";
      
    }
  
include ("footer.php");

?>

