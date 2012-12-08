<form action="affectation2.php" method="post">
<select name="gid">

<?php while ($row=mysql_fetch_array($groupes)){ ?>
    <option value=$row[gid]>$row[intitule]</option>
<?php }?>

</select>
<select name="mid">

<?php while ($row1=mysql_fetch_array($modules)){ ?>
    <option value=<?php $row1[mid]; ?>>$row1[intitule]</option>
<?php }?>
</select>
<input type="submit" value="envoyer">
</form>
