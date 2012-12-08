<?php
  include ("conn.php");

  if (!isset($_GET['gid'])) 
  {
    echo "<p>Error</p>";
  } 
  else 
  {
    $gid = mysql_real_escape_string($_GET['gid']);
    $SQL1= "SELECT * FROM groupes WHERE gid='$gid'";
    $res1=mysql_query($SQL1);
    while ($row=mysql_fetch_array($res1))
      {
      echo "$row[intitule]";
      }
    
    //if(!$res || mysql_num_rows($res)==0) die ("Erretretrqetgaertzeryzryqeeur: ".mysql_error());
    //$row = mysql_fetch_array($res);
    $SQL = "SELECT FROM etudiants WHERE eid";
    $res = mysql_query($SQL);
    $SQL2 = "SELECT FROM affectations WHERE eid AND gid=$gid";
    $res2 = mysql_query($SQL2);
    
    if ($res!=$res2)
    {
        echo "<p>Il n'y a pas de d'etudiants dans ce groupe</p>";
    } 
    else 
    {
      $SQL = "SELECT * FROM etudiants WHERE eid";
      $res = mysql_query($SQL);
     
   
      while ($row=mysql_fetch_array($res))
      {
        echo"$row[nom] $row[prenom]";
      }
      $SQL3 = "SELECT * FROM notes WHERE gid=$gid";
      $res3 = mysql_query($SQL3);
      while ($row3=mysql_fetch_array($res3))
      {
        echo"$row3[note]";
      }
    
    
    echo "<p><a href=\"listeetu.php\">Revenir a la page precedente.</a></p>";
  }
  }
 mysql_close($conn); 

  include("footer.php");
?>
