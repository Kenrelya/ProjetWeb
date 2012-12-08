<?php 
include("conn.php");
$idet=mysql_real_escape_string($_GET['mid']);
$SQL = "SELECT mid FROM modules WHERE mid='$idet'";
$res = mysql_query($SQL);
?>
<form action="supmod.php" method="post">
Etes-vous sûr de vouloir supprimer ce module ?

<?php

while ($row=mysql_fetch_array($res)){

?>
<input type ="hidden" name="mid" value="<?php echo $row['mid']?>">
<?php } ?>
<label for="supoui">Oui</label><input id="supoui" type="radio" name="supmod" value="oui"/>
<label for="supnon">Non</label><input id="supnon" type="radio" name="supmod" value="non"/>
<input type="submit" value="Envoyer">
</form>
