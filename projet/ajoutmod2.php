<?php

  include("conn.php");
     if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}
if (!isset($_POST['intitule'])||!isset($_POST['discipline']))
{
 include("ajoutmod.php");
} else{
   $intitule = mysql_real_escape_string($_POST['intitule']);
   $discipline = mysql_real_escape_string($_POST['discipline']);
   $SQL = "INSERT INTO modules VALUES ('','$intitule','$discipline')";

   $res=mysql_query($SQL);
   if(!$res) {
      echo "<p>Erreur d'insertion</p>";}
   else {
      echo "<p>module ajoute</p>";
   }
echo "<p><a href='listmod.php'>Revenir a la page precedente</a></p>";
} 
include ("footer.php");

?>

