<?php
 
include("conn.php");
 if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'ens')
{
    header('Location: redirection.php');
}


$SQL = "SELECT * 
FROM groupes
WHERE gid
IN (

SELECT gid
FROM affectations)";
$res = mysql_query($SQL);
if(!$res || mysql_num_rows($res)==0) {
echo "<p>Il n'y a pas de groupes</p>";
} else {
echo "<ul>\n";
while ($row=mysql_fetch_array($res)){
echo "<li><a href=\"modifgrp.php?eid=$row[gid]\">$row[intitule]</li>\n";
}
echo "</ul>\n";
}
echo "<a href='ajoutgrp.php'>ajouter un groupe</a><br/>";
echo "<a href='indexens.php'>revenir a la page precedente</a><br/>";

 mysql_close($conn); 

