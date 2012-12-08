<?php 
echo "Mauvais mot de passe, reessayez";
?>

<form action="enregistrement2.php" method="post">
Nom:
<input type="text" name="nom" required><br/><br/>
Prénom:
<input type="text" name="prenom" required><br/><br/>
email
<input type="email" name="email" required><br/><br/>
votre login
<input type="text" name="login" required><br/><br/>
votre mot de passe
<input type="password" name="mdp" required><br/><br/>
retapez votre mot de passe
<input type="password" name="mdp1" required><br/><br/>
Profession
<select name="type">

<?php

echo "<option value=\"sco\">Resposable Scolarite</option>";
echo "<option value=\"ens\">Enseignant</option>";
?>



<input type="submit" value="Ajouter">
</form>

