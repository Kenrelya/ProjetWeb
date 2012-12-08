<?php
  
     if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}

?>

<form action="affectation.php" method="post">
<select name="eid">

<?php
$SQL="SELECT * FROM etudiants";
$res=mysql_query($SQL);
while ($row=mysql_fetch_array($res))
{
  
  echo "<option value=$row[eid]>$row[prenom] $row[nom]</option>";
}
?>
</select>
<select name="gid">

<?php
$SQL1="SELECT * FROM groupes";
$res1=mysql_query($SQL1);
while ($row1=mysql_fetch_array($res1))
{
  
  echo "<option value=$row1[gid]>$row1[intitule]</option>";
}
?>
</select>
<input type="submit" value="envoyer">
</form>
