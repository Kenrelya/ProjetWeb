<?php
    function GetEtudiants()
    {
        $SQL="SELECT * FROM etudiants GROUP BY nom, prenom";
        $etudiants=mysql_query($SQL);
        
        return $etudiants;
    }
    
    function GetEtudiantsGroupedByAF()
    {
        $SQL="SELECT * FROM etudiants GROUP BY annee, filiere";
        $etudiants=mysql_query($SQL);
        
        return $etudiants;
    }
    
    function AddEtudiant($nom, $prenom, $noet, $annee, $filiere)
    {
        $nom = mysql_real_escape_string($_POST['nom']);
        $prenom = mysql_real_escape_string($_POST['prenom']);
        $noet = mysql_real_escape_string($_POST['noet']);
        $annee = mysql_real_escape_string($_POST['annee']);
        $filiere = mysql_real_escape_string($_POST['filiere']);
        $SQL = "INSERT INTO etudiants VALUES ('','$nom','$prenom','$noet','$annee','$filiere')";

        $res=mysql_query($SQL);
        if(!$res) 
        {
            return false;
        }
        else 
        {
            return true;
        }
    }
    
    function GetEtudiantById($id)
    {
        $SQL = "SELECT eid FROM etudiants WHERE eid='$idet'";
        $res = mysql_query($SQL);
        
        return $res;
    }
    
    function GetUtilisateurByLoginAndPassword($login, $mdp)
    {
        $SQL = "SELECT *
                    FROM users
                    WHERE login='$login' AND mdp='$mdp'";
        $res = mysql_query($SQL);
        
        return $res;
    }
    
    function GetEnseignants()
    {
        $SQL = "SELECT * FROM users WHERE type ='ens'";
        $res = mysql_query($SQL);
        
        return $res;
    }
    
    function AddNoteEtudiant($eid, $gid, $note)
    {
        $SQL = "INSERT INTO notes VALUES ('$gid','$eid','$note')";
        $res=mysql_query($SQL);

        echo $SQL;
        if(!$res) 
        {
            return false;
        }
        else 
        {
            return true;
        }    
    }
    
    function GetNotesEtudiant($eid)
    {
        $SQL= "SELECT * FROM notes WHERE eid=$eid";
        $res=mysql_query($SQL);
        
        return $res; 
    }
    
    function ModifyNoteEtudiant($eid, $gid, $note)
    {
        $SQL= "UPDATE notes SET note=$note WHERE gid=$gid AND eid=$eid";
        $res=mysql_query($SQL);
        
        return $res;
    }
    
    function DeleteNoteEtudiant($eid, $gid)
    {
        $SQL1= "DELETE FROM notes WHERE gid='$gid' AND eid ='$eid' ";
        $res1=mysql_query($SQL1);
        
        return $res1;
    }
    
    function DeleteEtudiant($eid)
    {
        $SQL1= "DELETE FROM etudiants WHERE eid='$eid'; DELETE FROM notes WHERE eid ='$eid' ";
        $res1=mysql_query($SQL1);
        
        return $res1;
    }
?>
