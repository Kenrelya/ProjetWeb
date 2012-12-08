<?php

  include ("conn.php");
   if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}
  $SQL = "SELECT * FROM modules";
  $res = mysql_query($SQL);
  if(!$res || mysql_num_rows($res)==0) 
    {
    echo "<p>Il n'y a pas de modules</p>";
    }
  else 
    {
    //echo "<ul>\n";
    while ($row=mysql_fetch_array($res))    
    {
      echo "<li><a href=\"modifmod.php?mid=$row[mid]\">$row[intitule]</li>\n  <a href=\"supmod1.php?mid=$row[mid]\">Supprimer module\n </a>";
    }
     
    //echo "</ul>\n";
    }
    // href="modulee.php?action=modify&mid=
  echo "<a href='ajoutmod.php'>ajouter un module</a><br/>";
  echo "<a href='indexsco.php'>revenir a la page precedente</a><br/>";

  mysql_close($conn); 
  include("footer.php");
?>
