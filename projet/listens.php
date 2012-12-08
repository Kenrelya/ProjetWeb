<?php

  include ("conn.php");
   if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: redirection.php');
}
  $SQL = "SELECT * FROM users WHERE type ='ens'";
  $res = mysql_query($SQL);
  if(!$res || mysql_num_rows($res)==0) 
    {
    echo "<p>Il n'y a pas de d'enseignants</p>";
    }
  else 
    {
 
    while ($row=mysql_fetch_array($res))    
      {
      echo "$row[prenom] $row[nom]</br>";
      }
  
    }

  
  echo "<a href='indexsco.php'>revenir a la page precedente</a><br/>";
  

  mysql_close($conn); 
  include("footer.php");
?>
