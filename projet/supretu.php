<?php

include ("conn.php");
if (!isset($_POST['supretu']) || $_POST["supretu"] == "non")
{
    header('Location: listeetu.php');
}
else
{
    

    $eid = mysql_real_escape_string($_POST['eid']);
    $SQL= "DELETE FROM etudiants WHERE eid='$eid'";
    $res=mysql_query($SQL);
   if(!$res) {
      echo "<p>Erreur de suppression</p>";}
   else {
      echo "<p>etudiant supprime</p>";
   }
echo "<p><a href='listeetu.php'>Revenir a la page precedente</a></p>";

include ("footer.php");
}
?>
