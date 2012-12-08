<?php

include("conn.php");

     if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}
if (!isset($_POST['groupe'])) {
   include("ajoutgrp.php");
} else{


   $grp = mysql_real_escape_string($_POST['groupe']);
   $SQL = "INSERT INTO groupes VALUES (DEFAULT,'','$grp')";

   $res=mysql_query($SQL);
   if(!$res) {
      echo "<p>Erreur d'insertion</p>";}
   else {
      echo "<p>Groupe ajoute</p>";
   }
echo "<p><a href='listgrp.php'>Revenir a la page precedente</a></p>";
} 
include ("footer.php");

?>

