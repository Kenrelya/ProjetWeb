<?php
    function GetModules()
    {
        $SQL1="SELECT * FROM modules";
        $modules=mysql_query($SQL1);
        
        return $modules;
    }
    
    function GetModuleById($mid)
    {
        $SQL1= "SELECT * FROM modules WHERE mid='$mid'";
        $res1=mysql_query($SQL1);
        
        return $res1;
    }
    
    function GetModulesAffectes()
    {
        
    }
    
    function DeleteModule($mid)
    {
        $SQL1= "DELETE FROM groupes WHERE mid='$mid'";
        $res1 = mysql_query($SQL1);
        
        return $res1;
    }
    
    function AddModule($intitule, $discipline)
    {
        $SQL = "INSERT INTO modules VALUES ('','$intitule','$discipline')";

        $res=mysql_query($SQL);
        if(!$res) 
        {
            return false;
        }
        else {
            return true;
        }
    }
?>
