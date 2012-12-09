<?php

    function AddUser($nom, $prenom, $email, $login, $mdp, $type)
    {
        $SQL = "INSERT INTO users VALUES ('','$nom','$prenom','$email','$login','$mdp','$type')";
        $res=mysql_query($SQL);
        
        return $res;
    }
?>
