<?php
  

  include("conn.php");
     if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}

?>

<form action="affectation2.php" method="post">
<select name="gid">

<?php
$SQL="SELECT * FROM groupes";
$res=mysql_query($SQL);
while ($row=mysql_fetch_array($res))
{
  
  echo "<option value=$row[gid]>$row[intitule]</option>";
}
?>
</select>
<select name="mid">

<?php
$SQL1="SELECT * FROM modules";
$res1=mysql_query($SQL1);
while ($row1=mysql_fetch_array($res1))
{
  
  echo "<option value=$row1[mid]>$row1[discipline]</option>";
}
?>
</select>
    <select name="intitule">

<?php
$SQL2="SELECT * FROM modules";
$res2=mysql_query($SQL1);
while ($row2=mysql_fetch_array($res2))
{
  
  echo "<option value=$row2[mid]>$row2[intitule]</option>";
}
?>
</select>
<input type="submit" value="envoyer">
</form>
