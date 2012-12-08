<?php
 
include ("conn.php");
if (isset($_GET['eid'])&& isset($_GET['gid'])) 
 if (isset($_POST['note'])) {
    
    $note=mysql_real_escape_string($_POST['note']);
    $eid=mysql_real_escape_string($_GET['eid']);
    $gid=mysql_real_escape_string($_GET['gid']);
    $SQL= "UPDATE notes SET note=$note WHERE gid=$gid";
    $res=mysql_query($SQL);
   if(!$res) 
     {  
       echo "<p>Erreur de modification</p>";}
     }
   else {
echo"
<form action='modifnote.php?eid=$_GET[eid]&&gid=$_GET[gid]' method='post'>";
echo"Note";
echo"<select name='note'>";
?>
<?php


for($i=0; $i<=20; $i++)
echo "<option value='$i'>$i</option>";
?>

</select>
<input type="submit" value="envoyer">
</form>
   
<?php }

echo "<a href='listeetu.php'>Retourner a la liste des etudiants</a>"; 

include ("footer.php");

?>
