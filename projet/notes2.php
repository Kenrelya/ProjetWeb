<?php
  
  include("conn.php");
     if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}

  if (!isset($_GET['eid'])) 
  {
    echo "<p>Error</p>";
  } 
  else 
  {
    $eid = mysql_real_escape_string($_GET['eid']);
    $SQL1= "SELECT * FROM etudiants WHERE eid='$eid'";
    $res1=mysql_query($SQL1);
    while ($row=mysql_fetch_array($res1))
      {
      echo "$row[nom] $row[prenom]";
      }
    
    //if(!$res || mysql_num_rows($res)==0) die ("Erretretrqetgaertzeryzryqeeur: ".mysql_error());
    //$row = mysql_fetch_array($res);
    $SQL2 = "SELECT * FROM notes WHERE note";
    $res2 = mysql_query($SQL2);
    
    if(!$res2 || mysql_num_rows($res2)==0) 
      {
      echo "<p>Il n'y a pas de notes</p>";
      } 
    else 
    {
      $SQL = "SELECT * FROM notes WHERE eid='$eid'";
      $res = mysql_query($SQL);
      echo "<table>";
      while ($row=mysql_fetch_array($res))
      {
        echo"<tr><td>$row[note]</td>
        <td><a href=\"suprnote.php?eid=$eid&&gid=$row[gid]\">Supprimer</a></td>
        <td><a href=\"modifnote.php?eid=$eid&&gid=$row[gid]\">Modifier</a></td>
        </tr>";
      }
      echo "</table>"; 
    }
    echo "<p><a href=\"ajoutnote.php?eid=$eid\">Ajouter une note.</a></p>";
    echo "<p><a href=\"supretu1.php?eid=$eid\">Supprimer l'etudiant.</a></p>";
    echo "<p><a href=\"listeetu.php\">Revenir a la page precedente.</a></p>";
  }

 mysql_close($conn); 

  include("footer.php");
?>
