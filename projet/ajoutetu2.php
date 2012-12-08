<?php
 
include("conn.php");

 if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
{
    header('Location: accueil.php');
}
if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['noet']) || !isset($_POST['annee']) || !isset($_POST['filiere'])) {
   include("ajoutetu.php");
} else{
   $nom = mysql_real_escape_string($_POST['nom']);
   $prenom = mysql_real_escape_string($_POST['prenom']);
   $noet = mysql_real_escape_string($_POST['noet']);
   $annee = mysql_real_escape_string($_POST['annee']);
   $filiere = mysql_real_escape_string($_POST['filiere']);
   $SQL = "INSERT INTO etudiants VALUES ('','$nom','$prenom','$noet','$annee','$filiere')";

   $res=mysql_query($SQL);
   if(!$res) {
      echo "<p>Erreur d'insertion</p>";}
   else {
      echo "<p>Eleve ajoute</p>";
   }
echo "<p><a href='listeetu.php'>Revenir a la page precedente</a></p>";
} 
include ("footer.php");

?>

