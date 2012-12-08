<form action="enregistrement2.php" method="post">
    <meta charset="UTF-8">
    <fieldset><legend>Ajout d'un utilisateur</legend>
        <table>
            <tr><td>Nom:</td><td><input type="text" name="nom" required></td></tr>
            <tr><td>Prénom:</td><td><input type="text" name="prenom" required></td></tr>
            <tr><td>Adresse mail:</td><td><input type="email" name="email" required></td></tr>
            <tr><td>Login:</td><td><input type="text" name="login" required></td></tr>
            <tr><td>Mot de passe:</td><td><input type="password" name="mdp" required></td></tr>
            <tr><td>Retapez votre mot de passe:</td><td><input type="password" name="mdp1" required></td></tr>
            <tr><td>Profession:</td><td><select name="type">
            <?php
                echo "<option value=\"sco\">Resposable Scolarite</option>";
                echo "<option value=\"ens\">Enseignant</option>"; ?> 
                </select></td></tr>
            <tr><td><input type="submit" value="Ajouter"></td></tr>
        </table>
    </fieldset>
</form>