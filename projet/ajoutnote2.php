<?php
  

  include("conn.php");
     if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}
 
  if (!isset($_POST['note']))   
    { 
    include("ajoutnote.php");
    }
  else
    {
    $note = mysql_real_escape_string($_POST['note']);
    $eid = mysql_real_escape_string($_POST['eid']);
    $SQL = "INSERT INTO notes VALUES ('0','$eid','$note')";
    $res=mysql_query($SQL);

    echo $SQL;
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

