<?php 
include("conn.php");
$idet=mysql_real_escape_string($_GET['eid']);
$SQL = "SELECT eid FROM etudiants WHERE eid='$idet'";
$res = mysql_query($SQL);
?>
<form action="supretu.php" method="post">
Etes-vous sûr de vouloir supprimer cet etudiant ?

<?php

while ($row=mysql_fetch_array($res)){

?>
<input type ="hidden" name="eid" value="<?php echo $row['eid']?>">
<?php } ?>
<label for="supoui">Oui</label><input id="supoui" type="radio" name="supretu" value="oui"/>
<label for="supnon">Non</label><input id="supnon" type="radio" name="supretu" value="non"/>
<input type="submit" value="Envoyer">
</form>

