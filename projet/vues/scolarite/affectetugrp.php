<form action="affectation.php" method="post">
<select name="eid">

<?php while ($row=mysql_fetch_array($etudiants)){?>
    <option value=$row[eid]><?php $row[prenom]; ?> <?php $row[nom]; ?></option>
<?php }?>
</select>
<select name="gid">

<?php while ($row1=mysql_fetch_array($groupes)){?>
    <option value=$row1[gid]><?php $row1[intitule]; ?></option>
<?php }?>
</select>
<input type="submit" value="envoyer">
</form>
