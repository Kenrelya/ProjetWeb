<?php
include("connexion1.php");
$typ=$_SESSION['type'];

if ($typ=='sco') 
{ 
  header("location:indexsco.php");
}
else 
{
  header("location:indexens.php");
}
