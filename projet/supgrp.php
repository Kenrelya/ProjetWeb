<?php

include ("conn.php");
if (!isset($_POST['supgrp']) || $_POST["supgrp"] == "non")
{
    header('Location: listgrp.php');
}
else
{
    $gid = mysql_real_escape_string($_POST['gid']);
    $SQL= "DELETE FROM groupes WHERE gid='$gid'";
    $res=mysql_query($SQL);
   if(!$res) {
      echo "<p>Erreur de suppression</p>";}
   else {
      echo "<p>groupe supprime</p>";
   }
echo "<p><a href='listgrp.php'>Revenir a la page precedente</a></p>";

}
include ("footer.php");

?>