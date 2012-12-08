<?php

include("conn.php");

   if ($_POST['mdp']!=$_POST['mdp1'])
      {
      include("enregistrement3.php");
      }
   else 
{
   if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['email']) || !isset($_POST['login']) || !isset($_POST['mdp']) || !isset($_POST['type'])) 
   {
     include("enregistrement.php");
   } 
   else
   {
   $nom = mysql_real_escape_string($_POST['nom']);
   $prenom = mysql_real_escape_string($_POST['prenom']);
   $email = mysql_real_escape_string($_POST['email']);
   $login = mysql_real_escape_string($_POST['login']);
   $mdp = mysql_real_escape_string($_POST['mdp']);
   $type = mysql_real_escape_string($_POST['type']);
   $SQL = "INSERT INTO users VALUES ('','$nom','$prenom','$email','$login','$mdp','$type')";
   $res=mysql_query($SQL);
   }

   if(!$res) {
      echo "<p>Erreur d'enregistrement, recommencez</p>";
             }
   else {
      echo "<p>Vous avez bien été enregistré</p>";
        } 

echo "<a href='accueil.php'>Retour à la page d'accueil</a>";
}
include ("footer.php");

?>
