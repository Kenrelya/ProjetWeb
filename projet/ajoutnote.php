<?php 
include("conn.php");
$idet=mysql_real_escape_string($_GET['eid']);
$SQL = "SELECT eid FROM etudiants WHERE eid='$idet'";
$res = mysql_query($SQL);

?> 
<form action="ajoutnote2.php" method="post">
<tr><td>Note</td><td>
<select name="note">

<?php

while ($row=mysql_fetch_array($res)){
for($i=0; $i<=20; $i++)
echo "<option value=\"$i\">$i</option>";
?>
<input type ="hidden" name="eid" value="<?php echo $row['eid']?>"></select></td></tr>
</table>
<?php } ?>
<input type="submit" value="envoyer">
</form>

<!--<?php 
$SQL = "SELECT eid FROM notes";
$res = mysql_query($SQL);

while ($row=mysql_fetch_array($res)){
echo "<a href='ajoutnote2.php?eid=$row[eid]'>Ajouter</a>\n";}
?>
?>

<!--<input type="text" name="not2"><br/><br/>
<input type="text" name="not3"><br/><br/>
<input type="text" name="not4"><br/><br/>
<input type="text" name="not5"><br/><br/>-->
