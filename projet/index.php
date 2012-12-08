<?php
    include("conn.php");
    
    $action = "";
    if(isset($_GET["action"]))
    {
        if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
        {
            header('Location: redirection.php');
        }
        $action = $_GET["action"];
        
        switch ($action)
        {
            case "AddAffectationEG":
                if(isset($_POST["gid"]) && isset($_POST["eid"]))
                {
                    include("affectetugrp.php");
                    $message = "";
                    if(AddAffectationEG($eid, $gid))
                    {
                        $message = "Affectation effectuee";
                    }
                    else
                    {
                        $message = "Erreur d'insertion";
                    }
                }
                
                include("vues/affectation.php");
                break;
                
            case "AddAffectationGM":
                if (!isset($_POST['mid'])||!isset($_POST['gid'])||!isset($_POST['intitule']))   
                { 
                    include("affectgrpmod.php");
                }
                break;
        }
    }
    else
    {
        include("accueil.php");
    }
    
    include ("footer.php");
?>