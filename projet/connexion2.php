<?php
  
include("conn.php");


   if (empty ($_POST['login']) && empty ($_POST['mdp']) && !isset($_POST['login']) && !isset($_POST['mdp'])) 
   {
     include("connexion3.php");
   } 
   else
   {
     $login = mysql_real_escape_string($_POST['login']);
     $mdp = mysql_real_escape_string($_POST['mdp']);
     $SQL = "SELECT * FROM users WHERE login='$login' AND mdp='$mdp'";
     $res=mysql_query($SQL);
    if (!$res || mysql_num_rows($res)==0)
   		{
   			echo"login/mdp incorrecte";
   			include"connexion.php";
   			exit();
   		}
    $_SESSION['AUTH']=1;
    $_SESSION['userid']=$row['userid'];
    $_SESSION['type']=$row['type'];
   
       
       if ($row['type']=='sco')
     {
        include ("indexsco.php");
        }
          
    if ($row['type']=='ens')
      {
        include("indexens.php");
       }

  }
echo "<a href='deco.php'>deconnexion</a>";
//echo "<a href='accueil.php'>Retour à la page d'accueil</a>";

include ("footer.php");

?>
