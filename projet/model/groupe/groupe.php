<?php

    function GetGroupes()
    {
        $SQL1="SELECT * FROM groupes GROUP BY intitule";
        $groupes=mysql_query($SQL1);
        
        return $groupes;
    }
    
    function GetGroupesAffectes()
    {
        $SQL = "SELECT * 
        FROM groupes
        WHERE gid
        IN (

        SELECT gid
        FROM affectations)";
        $res = mysql_query($SQL);
        
        return $res;
    }
    
    function GetGroupesDuModule($mid)
    {
        $SQL = "SELECT * 
        FROM groupes
        WHERE mid = '$mid'";
        $res = mysql_query($SQL);
        
        return $res;
    }
    
    function GetGroupeById()
    {
        $SQL = "SELECT gid FROM groupes WHERE gid='$idet'";
        $res = mysql_query($SQL);
        
        return $res;
    }
    
    function AddGroupe($grp)
    {
        $SQL = "INSERT INTO groupes VALUES (DEFAULT,'','$grp')";

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
    
    function DeleteGroupe($gid)
    {
        $gid = mysql_real_escape_string($_POST['gid']);
        $SQL= "DELETE FROM groupes WHERE gid='$gid'; DELETE FROM affectations WHERE gid='$gid'";
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
?>
