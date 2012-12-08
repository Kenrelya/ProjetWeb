<?php
    include("conn.php");
    
    $action = "";
    $message = "";
    
    function VerifySco()
    {
        if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'sco')
        {
            header('Location: redirection.php');
        } 
    }
    
    function VerifyEns()
    {
        if (!$_SESSION['AUTH'] || $_SESSION['type'] != 'ens')
        {
            header('Location: redirection.php');
        } 
    }
    
    if(isset($_GET["action"]))
    {
        $action = $_GET["action"];
        
        switch ($action)
        {
            case "AddAffectationEGView":
                VerifySco();
                $etudiants = GetEtudiants();
                $groupes = GetGroupes();
                break;
            
            case "AddAffectationEG":
                VerifySco();
                if(isset($_POST["gid"]) && isset($_POST["eid"]))
                {
                    $eid = $_POST["eid"];
                    $gid = $_POST["gid"];
                    $message = "";
                    if(AddAffectationEG($eid, $gid))
                    {
                        $message = "Affectation effectuee";
                    }
                    else
                    {
                        $message = "Erreur d'insertion";
                    }
                    
                    include("vues/scolarite/indexsco.php");
                }
                else
                {
                    include("vues/scolarite/affectetugrp.php");
                }
                
                break;
                
            case "AddAffectationGMView":
                VerifySco();
                $modules = GetModules();
                $groupes = GetGroupes();
                break;
            
            case "AddAffectationGM":
                VerifySco();
                if (!isset($_POST['mid'])||!isset($_POST['gid'])||!isset($_POST['intitule']))   
                { 
                    $message = "Il y a eu une erreur";
                    include("vues/scolarite/affectgrpmod.php");
                }
                else
                {
                    $mid = $_POST["mid"];
                    $gid = $_POST["gid"];
                    $message = "";
                    if(AddAffectionMG($mid, $gid))
                    {
                        $message = "Affectation effectuee";
                    }
                    else
                    {
                        $message = "Erreur d'insertion";
                    }
                    
                    include("vues/scolarite/indexsco.php");
                }
                
                break;
                
            case "AddEtudiantView":
                VerifySco();
                include("vues/scolarite/listeetu.php");
                break;
            
            case "AddEtudiant":
                VerifySco();
                if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['noet']) || !isset($_POST['annee']) || !isset($_POST['filiere'])) 
                {
                    $message="Il y a eu une erreur.";
                    include("ajoutetu.php");
                }
                else
                {
                    $nom = mysql_real_escape_string($_POST['nom']);
                    $prenom = mysql_real_escape_string($_POST['prenom']);
                    $noet = mysql_real_escape_string($_POST['noet']);
                    $annee = mysql_real_escape_string($_POST['annee']);
                    $filiere = mysql_real_escape_string($_POST['filiere']);
                    if(AddEtudiant($nom, $prenom, $noet, $annee, $filiere))
                    {
                        $message = "Erreur d'insertion.";
                    }
                    else
                    {
                        $message = "Eleve ajoute";
                    }
                    
                    $etudiants = GetEtudiants();
                    include("vues/scolarite/listeetu.php");
                }
                break;
                
            case "ViewListeEtudiant":
                VerifySco();
                $etudiants = GetEtudiantsGroupedByAF();
                include("vues/scolarite/listeetu.php");
                break;
            
            case "AddGroupeView":
                VerifySco();
                include("vues/scolarite/ajoutgrp.php");
                break;
            
            case "AddGroupe":
                VerifySco();
                if (!isset($_POST['groupe'])) 
                {
                    include("ajoutgrp.php");
                }
                else
                {
                    $grp = mysql_real_escape_string($_POST['groupe']);
                    if(AddGroupe($grp))
                    {
                        $message = "Groupe ajoute";
                    }
                    else
                    {
                        $message = "Erreur d'insertion";
                    }
                    
                    $groupes = GetGroupes();
                    include("vues/scolarite/listegrp.php");
                }
                
                break;
                
            case "AddModuleView":
                VerifySco();
                include("vues/scolarite/ajoutmod.php");
                break;
            
            case "AddModule":
                VerifySco();
                if (!isset($_POST['intitule'])||!isset($_POST['discipline']))
                {
                    
                }
                else
                {
                    
                }
                
                break;
            
            default :
                include("vues/utilisateur/accueil.php");
        }
    }
    else
    {
        include("vues/utilisateur/accueil.php");
    }
    
    include ("footer.php");
?>