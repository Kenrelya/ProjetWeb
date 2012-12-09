<?php
    include("conn.php");
    
    $action = "";
    $message = "";
    
    function DeconnectUser()
    {
        session_destroy();
    }
    function ConnectUser($login, $mdp)
    {
        $utilisateur = GetUtilisateurByLoginAndPassword($login, $mdp);
        if (!$utilisateur || mysql_num_rows($utilisateur)==0)
        {
            return false;
        }
        else
        {
            $_SESSION['AUTH']=1;
            $row=mysql_fetch_array($utilisateur);
            $_SESSION['userid']=$row['userid'];
            $_SESSION['type']=$row['type'];
            
            return true;
        }
    }
    
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
                include("vues/scolarite/ajoutetu.php");
                break;
            
            case "AddEtudiant":
                VerifySco();
                if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['noet']) || !isset($_POST['annee']) || !isset($_POST['filiere'])) 
                {
                    $message="Il y a eu une erreur.";
                    include("vues/scolarite/ajoutetu.php");
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
                    include("vues/scolarite/ajoutgrp.php");
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
                    $message = "Il manque quelque chose...";
                    include("vues/scolarite/ajoutmod.php");
                }
                else
                {
                    $intitule = mysql_real_escape_string($_POST['intitule']);
                    $discipline = mysql_real_escape_string($_POST['discipline']);
                    if(AddModule($intitule, $discipline))
                    {
                        $message = "Module ajoute";
                        $modules = GetModules();
                        include("vues/scolarite/listmod.php");
                    }
                    else
                    {
                        $message = "Erreur d'insertion";
                        include("vues/scolarite/ajoutmod.php");
                    }
                }
                
                break;
                
                case "AddNoteView":
                    VerifyEns();
                    $eid=mysql_real_escape_string($_GET['eid']);
                    $gid=mysql_real_escape_string($_GET['gid']);
                    $etudiant = GetEtudiantById($eid);
                    $groupe = GetEtudiantById($gid);
                    
                    include("vues/enseignant/ajoutnote.php");
                    break;
                
                case "AddNote":
                    VerifyEns();
                    if (!isset($_POST['note']))   
                    { 
                        $message = "Une note sans note... Bizarre";
                        include("vues/enseignant/ajoutnote.php");
                    }
                    else
                    {
                        $note = mysql_real_escape_string($_POST['note']);
                        $eid = mysql_real_escape_string($_POST['eid']);
                        $gid = mysql_real_escape_string($_POST['gid']);
                        if(AddNoteEtudiant($eid, $gid, $note))
                        {
                            $message = "Note ajoutee.";
                        }
                        else
                        {
                            $message = "Erreur d'insertion.";
                        }
                        
                        $groupes = GetGroupes();
                        include("vues/enseignement/listegrp2");
                    }
                    
                    break;
                
                case "ConnexionView":
                    include("vues/utilisateur/connexion.php");
                    break;
                
                case "Connexion":
                    if(!isset($_SESSION['AUTH']))
                    {
                        if(!isset($_POST['login']) || !isset($_POST['mdp']))
                        {
                            include("accueil.php");
                        }
                        else 
                        {
                            $login = mysql_real_escape_string($_POST["login"]);
                            $mdp = mysql_real_escape_string($_POST["mdp"]);
                            
                            if (ConnectUser($login, $mdp))
                            {
                                if ($_SESSION['type']=='sco')
                                {
                                    include("vues/scolarite/indexsco.php");
                                }

                                if ($_SESSION['type']=='ens')
                                {
                                    include("vues/enseignant/indexens.php");
                                }
                            }
                            else
                            {
                                $message = "login ou mot de passe incorrecte";
                                include("vues/utilisateur/connexion.php");
                            }
                        }
                    }
                    break;
                
                case "DeconnexionView":
                    DeconnectUser();
                    include("vues/utilisateur/accueil.php");
                    break;
                
                case "ViewIndexEns":
                    VerifyEns();
                    include("vues/enseignant/indexens.php");
                    break;
                
                case "ViewIndexSco":
                    VerifySco();
                    include("vues/scolarite/indexsco.php");
                    break;
                
                case "ViewListeEnseignants":
                    VerifyEns();
                    $enseignants = GetEnseignants();
                    include("vues/scolarite/listens.php");
                    break;
                
                case "ViewListeGroupesEnseignant":
                    VerifyEns();
                    $groupes = GetGroupesAffectes();
                    if (mysql_num_rows($groupes))
                    {
                        $message = "Il n'y a pas de groupe affecté.";
                    }
                    
                    include("vues/enseignant/listgrp2.php");
                    break;
                
                case "ViewListeGroupesScolarite":
                    VerifySco();
                    $groupes = GetGroupes();
                    include("vues/enseignant/listgrp.php");
                    break;
                
                case "ViewListeModules":
                    VerifySco();
                    $modules = GetModules();
                    if (mysql_num_rows($res) == 0)
                        $message = "Il n'y a pas de module";
                    
                    include("vues/scolarite/listmod.php");
                    break;
                
                case "ModifyNote":
                    VerifyEns();
                    if (isset($_GET['eid']) && isset($_GET['gid']) && isset($_POST['note']))
                    {
                        $note=mysql_real_escape_string($_POST['note']);
                        $eid=mysql_real_escape_string($_GET['eid']);
                        $gid=mysql_real_escape_string($_GET['gid']);
                        if(ModifyNoteEtudiant($eid, $gid, $note))
                        {
                            include("vues/enseignant/listgrp2.php");
                        }
                        else 
                        {
                            $message = "Erreur de modification";
                            include("vues/enseignant/modifnote.php");
                        }
                    }
                    break;
                
                case "ViewModule":
                    VerifySco();
                    $mid = mysql_real_escape_string($_GET['mid']);
                    $groupes = GetGroupesDuModule($mid);
                    
                    if (mysql_num_rows($groupes) == 0)
                    {
                        $message = "Il n'y a pas de groupe dans ce module";
                    }
                    
                    include("vues/scolarite/module.php");
                    break;
                
                case "ViewNotesEtudiant":
                    VerifySco();
                    
                    if (isset($_GET['eid'])) 
                    {
                        $notes = GetNotesEtudiant($eid);
                    } 
                    
                    include("vues/scolarite/notes2.php");
                    break;
                
                case "DeleteGroupeView":
                    VerifySco();
                    $gid=mysql_real_escape_string($_GET['gid']);
                    include("vues/scolarite/suprgrp1.php");
                    break;
                
                case "DeleteGroupe":
                    VerifySco();
                    if (!isset($_POST['supgrp']) || $_POST["supgrp"] == "non")
                    {
                        $groupes = GetGroupes();
                        include("vues/scolarite/listgrp.php");
                    }
                    else
                    {
                        $gid = mysql_real_escape_string($_POST['gid']);
                        if(DeleteGroupe($gid))
                        {
                            $message = "Groupe supprime";
                            $groupes = GetGroupes();
                            include("vues/scolarite/listgrp");
                        }
                        else
                        {
                            $message = "Erreur de suppression";
                            include("vues/scolarite/suprgrp1.php");
                        }
                    }
                    break;
                
                case "DeleteModuleView":
                    VerifySco();
                    $mid=mysql_real_escape_string($_GET['mid']);
                    include("vues/scolarite/supmod1.php");
                    break;
                
                case "DeleteModule":
                    VerifySco();
                    if (!isset($_POST['supmod']) || $_POST["supmod"] == "non")
                    {
                    }
                    else
                    {
                        $mid = mysql_real_escape_string($_POST['mid']);
                        if(DeleteModule($mid))
                        {
                            $message = "Module supprimé";
                        }
                        else
                        {
                            $message = "Erreur de suppression";
                        }
                        
                        $modules = GetModules();
                        include("vues/scolarite/listmod.php");
                    }
                    break;
                
                case "DeleteEtudiantView":
                    VerifySco();
                    $eid=mysql_real_escape_string($_GET['eid']);
                    include("vues/scolarite/supetu1.php");
                    break;
                
                case "DeleteEtudiant":
                    VerifySco();
                    if (!isset($_POST['supretu']) || $_POST["supretu"] == "non")
                    {
                    }
                    else
                    {
                        $eid = mysql_real_escape_string($_POST['eid']);
                        if (DeleteEtudiant($eid))
                        {
                            $message = "Etudiant supprimé";
                        }
                        else
                        {
                            $message = "Erreur de suppression";
                        }
                        
                        $etudiants = GetEtudiants();
                        include("vues/scolarite/listeetu.php");
                    }
                    
                    $etudiants = GetEtudiants();
                    include("vues/scolarite/listeetu.php");
                    break;
                
                case "DeleteNoteView":
                    VerifySco();
                    $gid=mysql_real_escape_string($_GET['gid']);
                    include("vues/scolarite/supnote1.php");
                    break;
                
                case "DeleteNote":
                    VerifyEns();
                    $eid = mysql_real_escape_string($_GET['eid']);
                    $gid = mysql_real_escape_string($_GET['gid']);
                    
                    if (DeleteNoteEtudiant($eid, $gid))
                    {
                        $message = "Note supprimée";
                    }
                    else
                    {
                        $message = "Erreur de suppression";
                    }
                    
                    include("vues/enseignant/notes2.php");
                    break;
                    
                case "EnregistrementView":
                    if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['email']) || !isset($_POST['login']) || !isset($_POST['mdp']) || !isset($_POST['type'])) 
                    {
                        $message = "Il maque quelque chose..";
                        include("vues/utilisateur/enregistrement.php");
                    } 
                    else
                    {
                        $nom = mysql_real_escape_string($_POST['nom']);
                        $prenom = mysql_real_escape_string($_POST['prenom']);
                        $email = mysql_real_escape_string($_POST['email']);
                        $login = mysql_real_escape_string($_POST['login']);
                        $mdp = mysql_real_escape_string($_POST['mdp']);
                        $type = mysql_real_escape_string($_POST['type']);
                        if(AddUser($nom, $prenom, $email, $login, $mdp, $type))
                        {
                            $message = "Vous avez bien été enregistré";
                        }
                        else
                        {
                            $message = "Erreur d'insertion";
                        }
                        
                        include("vues/utilisateur/accueil.php");
                    }
                   break;
               
               case "Enregistrement":
                   include("vues/utilisateur/enregistrment.php");
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