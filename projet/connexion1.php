<?php
include("header.php");

if(!isset($_SESSION['AUTH']))
{
   
	if(!isset($_POST['login']) || !isset($_POST['mdp']))
		{include("accueil.php");
		exit();
                }


  include("db_config.php");
  $conn = mysql_connect($DB_host, $DB_login, $DB_pass); 
  $db = mysql_select_db($DB_select, $conn);

  if (!$conn || !$db) die('Could not connect: ' . mysql_error());

    $login = mysql_real_escape_string($_POST["login"]);
    $mdp = mysql_real_escape_string($_POST["mdp"]);
    

    $SQL = "SELECT *
             FROM users
             WHERE login='$login' AND mdp='$mdp'";
  $res = mysql_query($SQL);

   if (!$res || mysql_num_rows($res)==0)
   		{
   			echo"login ou mot de passe incorrecte";
   			include"connexion.php";
   			exit();
   		}

   	echo "blablabla2";

   	$_SESSION['AUTH']=1;
        $row=mysql_fetch_array($res);
   	$_SESSION['userid']=$row['userid'];
	$_SESSION['type']=$row['type'];
        

     if ($_SESSION['type']=='sco')
    {
        header('Location: indexsco.php');
    }
          
    if ($_SESSION['type']=='ens')
      {
        header('Location: indexens.php');
       }

       include("footer.php");
   
}   
   ?>