<?php
  
include ("conn.php");


    $eid = mysql_real_escape_string($_GET['eid']);
    $gid = mysql_real_escape_string($_GET['gid']);
    $SQL= "SELECT FROM notes WHERE gid='$gid' ";
    $SQL1= "DELETE FROM notes WHERE gid='$gid' AND eid ='$eid' ";
    $res1=mysql_query($SQL1);
   if(!$res1) {
      echo "<p>Erreur de suppression</p>";}
   else {
      echo "<p>note supprimee</p>";
   }
echo "<td><a href=\"notes2.php?eid=$eid\">Retourner a la page precedente</a></td>";

include ("footer.php");

?>
