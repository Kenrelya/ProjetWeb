<?php 
include("conn.php");
$idet=mysql_real_escape_string($_GET['gid']);
$SQL = "SELECT gid FROM groupes WHERE gid='$idet'";
$res = mysql_query($SQL);
?>
<form action="supgrp.php" method="post">
Etes-vous sûr de vouloir supprimer ce groupe ?

<?php

while ($row=mysql_fetch_array($res)){

?>
<input type ="hidden" name="gid" value="<?php echo $row['gid']?>">
<?php } ?>
<label for="supoui">Oui</label><input id="supoui" type="radio" name="supgrp" value="oui"/>
<label for="supnon">Non</label><input id="supnon" type="radio" name="supgrp" value="non"/>
<input type="submit" value="Envoyer">
</form>

