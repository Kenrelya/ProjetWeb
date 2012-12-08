<?php
  
include("conn.php");
 if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}

$SQL = "SELECT * FROM groupes";
$res = mysql_query($SQL);
if(!$res || mysql_num_rows($res)==0) {
echo "<p>Il n'y a pas de groupes</p>";
} else {
echo "<ul>\n";
while ($row=mysql_fetch_array($res)){
echo "<li><a href=\"modifgrp.php?gid=$row[gid]\">$row[intitule]</a> <a href=\"suprgrp1.php?gid=$row[gid]\">Supprimer groupe\n";
}
echo "</ul>\n";
}
echo "<a href='ajoutgrp.php'>ajouter un groupe</a><br/>";
echo "<a href='affectgrpmod'>affecter un groupe a un module</a></br>";
echo "<a href='indexsco.php'>revenir a la page precedente</a><br/>";

 mysql_close($conn); 

