<?php

include ("conn.php");
if (!isset($_POST['supmod']) || $_POST["supmod"] == "non")
{
    header('Location: listmod.php');
}
else
{   
    $mid = mysql_real_escape_string($_POST['mid']);
    $SQL= "DELETE FROM modules WHERE mid='$mid'";
    $res=mysql_query($SQL);
    $SQL1= "DELETE FROM groupes WHERE mid='$mid'";
    $res1 = mysql_query($SQL1);
   
   if(!$res||!$res1) 
       {
      echo "<p>Erreur de suppression</p>";
       }
   else {
      echo "<p>Module supprimé</p>";
   }
echo "<p><a href='listmod.php'>Revenir a la page precedente</a></p>";
}
include ("footer.php");

?>