<?php

  include ("conn.php");
   if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}
  $SQL = "SELECT * FROM etudiants";
  $res = mysql_query($SQL);
  if(!$res || mysql_num_rows($res)==0) 
    {
    echo "<p>Il n'y a pas de d'etudiants</p>";
    }
  else 
    {
      $SQL1 = "SELECT FROM etudiants WHERE filiere";
      $res1 = mysql_query($SQL1);
      $SQL2 = "SELECT * FROM etudiants WHERE filiere";
      $res2 = mysql_query($SQL2)
     ?> <table>
      <tr><td>Prenom</td><td>Nom</td><td>Filiere</td><td>Annee</td></tr>
    <?php while ($row=mysql_fetch_array($res))    
      { ?>
      
      <a href=notes2.php?eid=$row[eid]"><?php $row[prenom]; ?> <?php $row[nom]; ?> </a> <?php $row[filiere]; ?> <?php $row[annee] ; ?> \n
      <?php } ?>
     ?> </table> <?php
  
    }
  echo "<a href='ajoutetu.php'>ajouter un etudiant</a><br/>";
  echo "<a href='affectetugrp.php'>affecter un etudiant a un groupe</a></br>";
  
  echo "<a href='indexsco.php'>revenir a la page precedente</a><br/>";
  

  mysql_close($conn); 
  include("footer.php");
?>
